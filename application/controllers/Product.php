<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class product extends CI_Controller {
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
    $this->load->view('product/index',$this->data);
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
    $this->load->view('product/create',$this->data);
    $this->load->view('tamplate/footer',$this->data);

}

function save(){
   try{
    $data=[
        'code'=>$this->input->post('code'),
        'name'=>$this->input->post('name'),
        'amount'=>$this->input->post('amount'),
        'stock'=>$this->input->post('stock'),
      
    ];
    $this->db->insert('product',$data);
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
    
    $product=$this->db->select('*')->from('product')->where('id',$id)->get()->row_array();
    
    $this->data['code']=$product['code'];
    $this->data['name']=$product['name'];
    $this->data['purchase_price']=$product['purchase_price'];
    $this->data['selling_price']=$product['selling_price'];
    $this->data['stock']=$product['stock'];
    $this->data['id']=$product['id'];

 

    $this->load->view('tamplate/header',$this->data);
    $this->load->view('tamplate/sidebar',$this->data);
    $this->load->view('product/edit',$this->data);
    $this->load->view('tamplate/footer',$this->data);

}

function update($id){
    try{
    $data=[
            'code'=>$this->input->post('code'),
            'name'=>$this->input->post('name'),
            'amount'=>$this->input->post('amount'),
            'stock'=>$this->input->post('stock'),
          
    ];
     $this->db->where(['id'=>$id]);
     $this->db->update('product',$data);
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
         $this->db->delete("product");
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
    $this->load->model("model_product");  
    $fetch_data = $this->model_product->make_datatables();  
    $data = array();  
    foreach($fetch_data as $row)  
    { 

         
         $delete='<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary"  onclick="destroy('.$row->id.')"  title="Delete"><i class="fa fa-trash"></i><font size="2px"></a> </font>';
         $edit='<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary"  href="'.base_url('Customer/edit_customer/'.$row->id).'"  title="Edit" ><i class="fa fa-edit"></i></a>';
         $sub_array = array();  
         $sub_array[] = $row->code;
         $sub_array[] = $row->name;
         $sub_array[] = $row->stock;
         $sub_array[] = $row->purchase_price;
         $sub_array[] = $row->selling_price;   
         $sub_array[] = $edit.' '.$delete;   
         $data[] = $sub_array;  
    }  


    $output = array(  
         "draw"                    =>     intval($_POST["draw"]),  
         "recordsTotal"          =>      $this->model_product->get_all_data(),  
         "recordsFiltered"     =>     $this->model_product->get_filtered_data(),  
         "data"                    =>     $data  
    );  
    echo json_encode($output);  


}   

}