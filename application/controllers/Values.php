<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Values extends CI_Controller {
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


	public function index()
	{
		$this->load->view('welcome_message');
	}


	//function Value attribute
	  public function add_value_item($id){
	  		if((!in_array('createItemvalue', $this->permission)) ) {
			redirect('dashboard', 'refresh');
		}
	  
	  	$this->form_validation->set_rules('value','Attribute Value','required|trim');
		$this->form_validation->set_message('required',' *{field} masih kosong silakan diisi');
		$this->data['id']=$id;

	 	
	 	if ($this->form_validation->run()==false){
	 	$id=$this->session->userdata('id');
	    $group_data = $this->model_groups->getGroupData($id);
		$this->data['group_data'] = $group_data;
		

		$this->load->view('tamplate/header',$this->data);
        $this->load->view('tamplate/sidebar',$this->data);
        $this->load->view('attribute_value/add_values',$this->data);
           $this->load->view('tamplate/footer',$this->data);
		}else{

			$this->aksi_value_add_attribute($id);

		}
	}

	 // public function aksi_value_add_attribute($id){

		// 	$data=[
		// 		'value'=>$this->input->post('value'),
		// 		'attribute_parent_id'=>$id
				
		// 	];

		// 	$this->db->insert('attribute_values',$data);
		// 	$this->session->set_flashdata('flash','Ditambahkan');
		// 	redirect('Values/manage_item_value/'.$id, 'refresh');
	 // }

	  public function aksi_value_add_attribute(){

			$data=[
				'value'=>$this->input->post('value'),
				'attribute_parent_id'=>$this->input->post('id'),
				'satuanf'=>$this->input->post('satuanf'),
				'satuanq'=>$this->input->post('satuanq'),
				'status'=>$this->input->post('status')
				
			];

			$this->db->insert('attribute_values',$data);
				$this->session->set_flashdata('success', 'Successfully created');
	 }
	   public function manage_item_value($id){
	   		if((!in_array('createItemvalue', $this->permission)) AND (!in_array('updateItemvalue', $this->permission)) AND (!in_array('deleteItemvalue', $this->permission))  AND (!in_array('viewItemvalue', $this->permission)) ) {
			redirect('dashboard', 'refresh');
		}
	   	$this->data['id']=$id;
	   	$this->db->select("*");
	   	$this->db->from("attributes");
	   	$this->db->where('id',$id);
	   	$row=$this->db->get()->row_array();
	   	$this->data['nameItem']=$row['name'];


			$where=array('attribute_parent_id'=>$id);
			$this->data['id']=$id;
			$this->data['attribute']=$this->db->get_where('attribute_values',$where)->result();
			$id=$this->session->userdata('id');
	     	$group_data = $this->model_groups->getGroupData($id);
			$this->data['group_data'] = $group_data;
	 		
	 		$this->load->view('tamplate/header',$this->data);
        	$this->load->view('tamplate/sidebar',$this->data);
     		$this->load->view('attribute_value/manage_value',$this->data);
           $this->load->view('tamplate/footer',$this->data);

	 }

	 public function ambilIdValue(){
		$id=$this->input->post("id");
		$where=array('id'=>$id);
		$dataa=$this->model_attribute->AmbilId('attribute_values',$where)->result();
		echo json_encode($dataa);
	}

	 public function aksi_update_data_value_attribute(){
		$name=$this->input->post('value');
		$status=$this->input->post('status');
		$satuanf=$this->input->post('satuanf');
		$satuanq=$this->input->post('satuanq');
		$id=$this->input->post('id');
	
		$data=array(
				'value'=>$name,
				'status'=>$status,
				'satuanf'=>$satuanf,
				'satuanq'=>$satuanq
			);

	
			$where=array(
			'id'=>$id
			);

			$this->db->where($where);
			$this->db->update('attribute_values',$data);
		
	}

			public function hapus_value_attribute($id){
		$id=$this->input->post("id");		
		$this->db->where('id',$id);
		$this->db->delete('attribute_values');
		
	}

	function jml_value($id){	
   

       	$this->db->select('count(*) as jml');
     	$this->db->from('attribute_values');
     	$this->db->where('attribute_parent_id',$id);

     	$row=$this->db->get()->row_array();    
		echo $row['jml'];
	

	}
	// 	public function TampilDatavalueitem(){
	// 		$id=$this->input->post('id');

	// 	$this->db->select('*');
	// 	$this->db->from('attribute_values');
	// 	$this->db->where('attribute_parent_id',$id);
	// 	 $this->db->order_by('id', 'ASC');
	// 	$data=$this->db->get()->result();
	// 	echo json_encode($data);


	// }

	public function TampilDatavalueitem(){
	$id=$this->input->post('id');
		   $this->load->model("model_values");  
           $fetch_data = $this->model_values->make_datatables($id);  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
           	   if(in_array('updateItemvalue', $this->permission)){
                	$edit='<font color="#FFFFFF" size="2px"><a title="Edit" class="btn btn-sm bg-gradient-secondary" onclick="AmbilData('.$row->id.')" data-toggle="modal" data-target="#update"><i class="fa fa-edit"></i></a></font>';

                }else{
                	$edit='';
                }	
                if(in_array('deleteItemvalue', $this->permission)){
                	$delete='<font color="#FFFFFF" size="2px"><a title="Delete" class="btn btn-sm bg-gradient-secondary" onclick="swetalert('.$row->id.')"><i class="fa fa-trash"></i><font size="2px"></font></a></font></center>';

                }else{
                	$delete='';
                	
                } 
                $sub_array = array();  
                $sub_array[] = $row->value;
                $sub_array[] = $row->satuanf;  
                $sub_array[] = $row->satuanq; 
                $sub_array[] = $row->status;
                

                 
                 $sub_array[] = '<center>'.$edit.' '.$delete.'</center>';





                $data[] = $sub_array;  

           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->model_values->get_all_data($id),  
                "recordsFiltered"     =>     $this->model_values->get_filtered_data($id),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  


      }  


}
