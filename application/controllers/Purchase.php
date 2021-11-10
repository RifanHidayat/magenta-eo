<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends CI_Controller {
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

    $this->data['supplier']=$this->db->select('*')->from('supplier')->get()->result();
   
    $this->load->view('tamplate/header',$this->data);
    $this->load->view('tamplate/sidebar',$this->data);
    $this->load->view('purchase-order/index',$this->data);
    $this->load->view('tamplate/footer',$this->data);

  
} 

function create(){
    $this->db->select_max('id');
    $this->db->from('purchase_order');
    $data = $this->db->get()->row_array();
    $id = sprintf("%05s",$data['id']);
    $this->data['code']="PO-".date('dmY').'-'.$id;
    //$this->data['code']="S-".$id;
    $products=$this->db->select('*')->from('product')->get()->result();
    $this->data['products']=$products;
   
    
  
    $this->load->view('tamplate/header',$this->data);
    $this->load->view('tamplate/sidebar',$this->data);
    $this->load->view('purchase-order/create',$this->data);
    $this->load->view('tamplate/footer',$this->data);
}
function pay($id){


    $purchaseOrder=$this->db->query("SELECT * FROM purchase_order where id=".$id)->row_array();
    $this->data['supplier_id']=$purchaseOrder['supplierId'];
    $this->data['shipping_cost']=$purchaseOrder['shipping_cost'];
    $this->data['discount']=$purchaseOrder['discount'];
    $this->data['code']=$purchaseOrder['code'];
    $this->data['date']=$purchaseOrder['date'];

    $this->data['id']=$id;
    $this->load->view('tamplate/header',$this->data);
    $this->load->view('tamplate/sidebar',$this->data);
    $this->load->view('purchase-order/pay',$this->data);
    $this->load->view('tamplate/footer',$this->data);
}
function receipt($id){

      $purchaseOrder=$this->db->query("SELECT * FROM purchase_order where id=".$id)->row_array();
    $this->data['supplier_id']=$purchaseOrder['supplierId'];
    $this->data['shipping_cost']=$purchaseOrder['shipping_cost'];
    $this->data['discount']=$purchaseOrder['discount'];
    $this->data['code']=$purchaseOrder['code'];
    $this->data['date']=$purchaseOrder['date'];
    $this->data['id']=$id;

    $this->load->view('tamplate/header',$this->data);
    $this->load->view('tamplate/sidebar',$this->data);
    $this->load->view('purchase-order/receipt',$this->data);
    $this->load->view('tamplate/footer',$this->data);
    
}
function return($id){

    $purchaseOrder=$this->db->query("SELECT * FROM purchase_order where id=".$id)->row_array();
    $this->data['supplier_id']=$purchaseOrder['supplierId'];
    $this->data['shipping_cost']=$purchaseOrder['shipping_cost'];
    $this->data['discount']=$purchaseOrder['discount'];
     $this->data['code']=$purchaseOrder['code'];
        $this->data['date']=$purchaseOrder['date'];
    
    $this->data['supplier_id']=$purchaseOrder['supplierId'];
    $this->data['net_total']=$purchaseOrder['net_total'];
    $this->data['total']=$purchaseOrder['total'];
    $this->data['shipping_cost']=$purchaseOrder['shipping_cost'];
      $this->data['discount']=$purchaseOrder['discount'];
      $this->data['pay_amount']=$purchaseOrder['pay_amount'];

    $this->data['id']=$id;
    $this->load->view('tamplate/header',$this->data);
    $this->load->view('tamplate/sidebar',$this->data);
    $this->load->view('purchase-order/return',$this->data);
    $this->load->view('tamplate/footer',$this->data);
}
function detail($id){

    $purchaseOrder=$this->db->query("SELECT * FROM purchase_order where id=".$id)->row_array();
    $this->data['supplier_id']=$purchaseOrder['supplierId'];
    $this->data['shipping_cost']=$purchaseOrder['shipping_cost'];
    $this->data['discount']=$purchaseOrder['discount'];
    $this->data['code']=$purchaseOrder['code'];
    $this->data['date']=$purchaseOrder['date'];
    $this->data['purchase_order_id']=$purchaseOrder['id'];

    $this->data['id']=$id;
    $this->load->view('tamplate/header',$this->data);
    $this->load->view('tamplate/sidebar',$this->data);
    $this->load->view('purchase-order/detail',$this->data);
    $this->load->view('tamplate/footer',$this->data);
}

function save(){
   try{
    $data=[
        'code'=>$this->input->post('code'),
        'name'=>$this->input->post('name'),
        'address'=>$this->input->post('address'),
        'phone'=>$this->input->post('phone'),
        'email'=>$this->input->post('email'),
    ];
    $this->db->insert('supplier',$data);
    header('Content-Type: application/json');
    $response=[
        'message' => 'Data has been saved',
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

function edit($id){
    
  $this->db->select_max('id');
    $this->db->from('purchase_order');
    $data = $this->db->get()->row_array();
    $id = sprintf("%05s",$data['id']);
    $this->data['code']="PO-".date('dmY').'-'.$id;
     $this->data['id']=$id;
     

     $purchaseOrder=$this->db->query("SELECT * FROM purchase_order WHERE id=".$id)->row_array();

     echo json_encode($purchaseOrder);

    $this->data['supplier_id']=$purchaseOrder['supplierId'];
    $this->data['shipping_cost']=$purchaseOrder['shipping_cost'];
    $this->data['discount']=$purchaseOrder['discount'];
    $this->data['code']=$purchaseOrder['code'];
    $this->data['date']=$purchaseOrder['date'];
    $this->data['pay_amount']=$purchaseOrder['pay_amount'];
        $this->data['account_id']=$purchaseOrder['accountId'];
    $this->data['purchase_order_id']=$purchaseOrder['id'];
     
 
    
    $this->load->view('tamplate/header',$this->data);
    $this->load->view('tamplate/sidebar',$this->data);
    $this->load->view('purchase-order/edit',$this->data);
    $this->load->view('tamplate/footer',$this->data);

}

function update($id){
    try{
     $data=[
         'code'=>$this->input->post('code'),
         'name'=>$this->input->post('name'),
         'address'=>$this->input->post('address'),
         'phone'=>$this->input->post('phone'),
         'email'=>$this->input->post('email'),
     ];
     $this->db->where(['id'=>$id]);
     $this->db->update('supplier',$data);
     header('Content-Type: application/json');
     $response=[
         'message' => 'Data has been saved',
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

 public function datatablesProducts(){

    $fetch_data = $this->db->select("*")->from('product')->get()->result();  
    $result['data']=$fetch_data;
    echo json_encode($result);
}

 public function datatablesProductReceipts(){

    $fetch_data = $this->db->select("*")->from('product')->get()->result();  
    $result['data']=$fetch_data;
    echo json_encode($result);
}  

public function datatablesPurchase(){
    $this->load->model("model_purchase_order");  
    $fetch_data = $this->model_purchase_order->make_datatables();  
    $data = array();  
    foreach($fetch_data as $row)  
    { 
 
         $delete='<div class="dropdown">
         <button class="dropbtn"><i class="fa fa-bars"></i></button>
         <div class="dropdown-content">
         <a href="#" class="btn-delete" data-id="' . $row->id . '"><em class="icon fas fa-pencil-alt"></em>
         <span>Edit</span>
         </a>
          <a href="'.base_url("/Purchase/detail/".$row->id).'" class="btn-delete" data-id="' . $row->id . '"><em class="icon fas fa-eye"></em>
          Detail</a>
         <a href="'.base_url("/Purchase/pay/".$row->id).'" class="btn-delete" data-id="' . $row->id . '"><em class="icon fas fa-credit-card"></em>
         Bayar</a>
        
      
         <a href="#"  onclick="destroy('.$row->id.')" class="btn-delete" data-id="' . $row->id . '"><em class="icon fas fa-trash-alt"></em>
        <span>Delete</span>
                   </a>
         </div>
       </div>';
         $edit='<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary"  href="'.base_url('Supplier/edit/'.$row->id).'"  title="Edit" ><i class="fa fa-edit"></i></a>';

        //     <a href="'.base_url("/Purchase/return/".$row->id).'" class="btn-delete" data-id="' . $row->id . '"><em class="icon fas fa-undo"></em>
        //  Retur</a>

        //   <a href="'.base_url("/Purchase/receipt/".$row->id).'" class="btn-delete" data-id="' . $row->id . '"><em class="icon fas fa-receipt"></em>
        //  Penerimaan </a>
         $sub_array = array();  
         $sub_array[] = $row->code;
         $sub_array[] = $row->date;
    
         $sub_array[] = number_format($row->shipping_cost,0,',','.');
         $sub_array[] = number_format($row->discount,0,',','.');
         $sub_array[] = number_format($row->net_total,0,',','.');
              $sub_array[] = number_format($row->total,0,',','.');
      
         $sub_array[] = $delete;

         
       
         //$sub_array[] = $edit.' '.$delete;      
         $data[] = $sub_array;  
    }  

    $output = array(  
         "draw"                    =>     intval($_POST["draw"]),  
         "recordsTotal"          =>      $this->model_purchase_order->get_all_data(),  
         "recordsFiltered"     =>     $this->model_purchase_order->get_filtered_data(),  
         "data"                    =>     $data  
    );  
    echo json_encode($output);  


}  


}