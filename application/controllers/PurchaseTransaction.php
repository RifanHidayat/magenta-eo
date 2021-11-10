<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseTransaction extends CI_Controller {
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
    $this->load->view('purchase-transaction/index',$this->data);
    $this->load->view('tamplate/footer',$this->data);

  
} 

function create(){


}


function edit($id){
    
 

}
function detail($id){

    $purchaseTransaction=$this->db->query("SELECT * FROM purchase_transactions where id=".$id)->row_array();
    

    $purchaseOrder=$this->db->query("SELECT * FROM purchase_order where id=".$purchaseTransaction['purchaseOrderid'])->row_array();

    

    $this->data['supplier_id']=$purchaseOrder['supplierId'];
    $this->data['shipping_cost']=$purchaseOrder['shipping_cost'];
    $this->data['discount']=$purchaseOrder['discount'];
    $this->data['code']=$purchaseOrder['code'];
    $this->data['date']=$purchaseOrder['date'];
    $this->data['id']=$id;
    $this->data['purchase_order_id']=$purchaseOrder['id'];
    $this->data['purchaseOrderCode']=$purchaseOrder['code'];
    


    
    
    
    $this->load->view('tamplate/header',$this->data);
    $this->load->view('tamplate/sidebar',$this->data);
    $this->load->view('purchase-transaction/detail',$this->data);
    $this->load->view('tamplate/footer',$this->data);
}

function update($id){

 }

 function destroy($id){
     try{
         $this->db->where([
             "id"=>$id
         ]);
         $this->db->delete("supplier");
         header('Content-Type: application/json');
         $response=[
             'message' => 'Data has been deleted',
             'code' => 200,
             'error' => false,
             'data' => "",
         ];
         echo json_encode($response);

     }catch(Exception $e){
        header('Content-Type: application/json');
        $response=[
            'message' => ''.$e,
            'code' => 200,
            'error' => false,
            'data' => "",
        ];
        echo json_encode($response);

     }
 }

public function datatablesPurchaseTransaction(){
    $this->load->model("model_purchase_transaction");  
    $fetch_data = $this->model_purchase_transaction->make_datatables();  
    $data = array();  
    foreach($fetch_data as $row)  
    { 

         
        $action='<div class="dropdown">
         <button class="dropbtn"><i class="fa fa-bars"></i></button>
         <div class="dropdown-content">
         <a href="'.base_url("/purchasetransaction/detail/".$row->id).'" class="btn-delete" data-id="' . $row->id . '"><em class="icon fas fa-credit-card"></em>
         Detail</a>

        
         <a href="#"  onclick="destroy('.$row->id.')" class="btn-delete" data-id="' . $row->id . '"><em class="icon fas fa-trash-alt"></em>
        <span>Delete</span>
                   </a>
         </div>
       </div>';
         $sub_array = array();  
         $sub_array[] = $row->code;
         $sub_array[] = $row->transactionCode;
         $sub_array[] = $row->date;
         $sub_array[] = $row->supplierName;
         $sub_array[] = $row->amount;
         $sub_array[] = $row->note;
          $sub_array[] = $action;
                 
           
         $data[] = $sub_array;  
    }  

    $output = array(  
         "draw"                    =>     intval($_POST["draw"]),  
         "recordsTotal"          =>      $this->model_purchase_transaction->get_all_data(),  
         "recordsFiltered"     =>     $this->model_purchase_transaction->get_filtered_data(),  
         "data"                    =>     $data  
    );  
    echo json_encode($output);  


}  


}