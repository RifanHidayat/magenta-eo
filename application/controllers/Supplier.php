<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {
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
    $this->load->view('supplier/index',$this->data);
    $this->load->view('tamplate/footer',$this->data);

  
} 

function create(){
    $this->db->select_max('id');
    $this->db->from('quotations');
    $data = $this->db->get()->row_array();
   
    $id = sprintf("%05s",$data['id']);

    //$this->data['code']="PR-".date('dmY').$id;
    $this->data['code']="S-".$id;
    
  
    $this->load->view('tamplate/header',$this->data);
    $this->load->view('tamplate/sidebar',$this->data);
    $this->load->view('supplier/create',$this->data);
    $this->load->view('tamplate/footer',$this->data);

}

function pay($id){
      
    $this->data['id']=$id;
    
  
    $this->load->view('tamplate/header',$this->data);
    $this->load->view('tamplate/sidebar',$this->data);
    $this->load->view('supplier/pay',$this->data);
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
    
    $supplier=$this->db->select('*')->from('supplier')->where('id',$id)->get()->row_array();
    $response=[
        "code"=>200,
        "message"=>"Successfully",
        "data"=>$supplier,
    ];
    $this->data['code']=$supplier['code'];
    $this->data['name']=$supplier['name'];
    $this->data['address']=$supplier['address'];
    $this->data['phone']=$supplier['phone'];
    $this->data['email']=$supplier['email'];
    $this->data['id']=$supplier['id'];

    $this->load->view('tamplate/header',$this->data);
    $this->load->view('tamplate/sidebar',$this->data);
    $this->load->view('supplier/edit',$this->data);
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

public function datatablesSupplier(){
    $this->load->model("model_supplier");  
    $fetch_data = $this->model_supplier->make_datatables();  
    $data = array();  
    foreach($fetch_data as $row)  
    { 

         
         $delete='<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" onclick="destroy('.$row->id.')" title="Delete"><i class="fa fa-trash"></i><font size="2px"></a> </font>';
         $edit='<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary"  href="'.base_url('Supplier/edit/'.$row->id).'"  title="Edit" ><i class="fa fa-edit"></i></a>';

         	$pay='<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary"  href="'.base_url('supplier/pay/'.$row->id).'"  title="payment" ><i class="fa fa-dollar-sign"></i></a>';

         $sub_array = array();  
         $sub_array[] = $row->code;
         $sub_array[] = $row->name;
         $sub_array[] = $row->address;
         $sub_array[] = $row->phone;
         $sub_array[] = $row->email;
         $sub_array[] = $edit.' '.$delete.' '.$pay;      
         $data[] = $sub_array;  
    }  

    $output = array(  
         "draw"                    =>     intval($_POST["draw"]),  
         "recordsTotal"          =>      $this->model_supplier->get_all_data(),  
         "recordsFiltered"     =>     $this->model_supplier->get_filtered_data(),  
         "data"                    =>     $data  
    );  
    echo json_encode($output);  


}  


}