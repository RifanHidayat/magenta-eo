<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseReturn extends CI_Controller {
var $permission = array();

public function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('form_validation');
    $this->load->model('model_pic');
    $this->load->model('model_users');
    $this->load->model('model_groups');
    $this->load->model('model_attribute');
    $this->load->model('model_bank');
    $this->load->model('model_customer');
    $this->load->model("model_supplier");  

    $group_data = array();
    if(empty($this->session->userdata('email'))) {
        
        
    }
    else {
        $user_id = $this->session->userdata('id');
        $this->load->model('model_groups');
        $group_data = $this->model_groups->getUserGroupByUserId($user_id);
        $this->data['user_permission'] = unserialize($group_data['permission']);
        $this->permission = unserialize($group_data['permission']);
    }

}


function index(){
    
    $this->load->view('tamplate/header',$this->data);
    $this->load->view('tamplate/sidebar',$this->data);
    $this->load->view('purchase-return/index',$this->data);
    $this->load->view('tamplate/footer',$this->data);

  
} 

function create(){
   

}
function pay($id){
 
   // $purchaseOrder=$this->db->query("SELECT * FROM purchase_order where id=".$id)->row_array();
    $purchaseReturnTransactions=$this->db->query("SELECT * FROM purchase_return WHERE id=".$id)->row_array();
    
   // echo json_encode($purchaseReturnTransactions);
    $this->data['purchase_order_id']=$purchaseReturnTransactions['purchaseOrderId'];
    $this->data['date']=$purchaseReturnTransactions['date'];
    $this->data['return_quantity']=$purchaseReturnTransactions['quantity'];
    $this->data['return_amount']=$purchaseReturnTransactions['amount'];
    $this->data['note']=$purchaseReturnTransactions['note'];
      $this->data['code']=$purchaseReturnTransactions['code'];
     $this->data['id']=$id;
     

    
    $this->data['supplier_id']=1;
    $this->data['id']=$id;
    $this->load->view('tamplate/header',$this->data);
    $this->load->view('tamplate/sidebar',$this->data);
    $this->load->view('purchase-return/pay',$this->data);
    $this->load->view('tamplate/footer',$this->data);
}



function edit($id){
    

}

function update($id){

 }

 function destroy($id){

 }

  function detail($id){
    $purchaseReceipt=$this->db->query("SELECT * FROM purchase_return where id=".$id)->row_array();
    //echo json_encode($purchaseReceipt);

    $purchaseOrder=$this->db->query("SELECT * FROM purchase_order where id=".$purchaseReceipt['purchaseOrderId'])->row_array();
     
    $this->data['supplier_id']=$purchaseOrder['supplierId'];
    $this->data['shipping_cost']=$purchaseOrder['shipping_cost'];
    $this->data['discount']=$purchaseOrder['discount'];
    $this->data['code']=$purchaseOrder['code'];
    $this->data['purchaseOrderId']=$purchaseOrder['id'];
    $this->data['net_total']=$purchaseOrder['net_total'];

    $this->data['codePurchaseReceipt']=$purchaseReceipt['code'];
    $this->data['date']=$purchaseReceipt['date'];
    $this->data['purchaseReceiptId']=$purchaseReceipt['id'];


    $this->data['id']=$id;
    $this->load->view('tamplate/header',$this->data);
    $this->load->view('tamplate/sidebar',$this->data);
    $this->load->view('purchase-return/detail',$this->data);
    $this->load->view('tamplate/footer',$this->data);
}

public function datatablesPurchaseReturn(){
    $this->load->model("model_purchase_return");  
    $fetch_data = $this->model_purchase_return->make_datatables();  
    $data = array();  
    foreach($fetch_data as $row)  
    { 
 
         $delete='<div class="dropdown">
         <button class="dropbtn"><i class="fa fa-bars"></i></button>
         <div class="dropdown-content">
         <a href="'.base_url("/purchasereturn/detail/".$row->id).'" class="btn-delete" data-id="' . $row->id . '"><em class="icon fas fa-credit-card"></em>
         Detail</a>

        
         <a href="#"  onclick="destroy('.$row->id.')" class="btn-delete" data-id="' . $row->id . '"><em class="icon fas fa-trash-alt"></em>
        <span>Delete</span>
                   </a>
         </div>
       </div>';
         $edit='<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary"  href="'.base_url('Supplier/edit/'.$row->id).'"  title="Edit" ><i class="fa fa-edit"></i></a>';

         $sub_array = array();  
         $sub_array[] = $row->code;
         $sub_array[] = $row->date;
         $sub_array[] = $row->quantity;
          $sub_array[] = $row->amount;
         $sub_array[] = $row->note;
      
         $sub_array[] = $delete;

         
       
         //$sub_array[] = $edit.' '.$delete;      
         $data[] = $sub_array;  
    }  

    $output = array(  
         "draw"                    =>     intval($_POST["draw"]),  
         "recordsTotal"          =>      $this->model_purchase_return->get_all_data(),  
         "recordsFiltered"     =>     $this->model_purchase_return->get_filtered_data(),  
         "data"                    =>     $data  
    );  
    echo json_encode($output);  

}  

}