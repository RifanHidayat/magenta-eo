<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
		public function __construct(){
		parent::__construct();
		//$this->not_logged_in();
		
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
		  $id=$this->session->userdata('id');
	       $group_data = $this->model_groups->getGroupData($id);
			$this->data['group_data'] = $group_data;

	


			if ($this->form_validation->run()==false){
				$this->db->select('*');
				$this->db->from('company');
				$this->db->where('id',1);
				$row=$this->db->get()->row_array();
				$this->data['name']=$row['name'];
				$this->data['phone']=$row['phone'];
				$this->data['fax']=$row['fax'];
				$this->data['signer']=$row['signer'];
				$this->data['address']=$row['address'];
	
	
				$this->load->view('tamplate/header',$this->data);
				$this->load->view('tamplate/sidebar',$this->data);
				$this->load->view('profile/index',$this->data);
				$this->load->view('tamplate/footer',$this->data);
		   }else{
			   $this->aksi_update_profile();
   
		   }
	}


	public function aksi_update_profile(){
		

	  $data=[
		  'name'=>$this->input->post('name'),
		  'address'=>$this->input->post('address'),
		  'phone'=>$this->input->post('phone'),
		  'fax'=>$this->input->post('fax'),
		  'signer'=>$this->input->post('signer'),

  
		  
	  ];

  
	  $where=array(
	  'id'=>1
	  );
	
	  
	  $this->db->where($where);
	  $this->db->update('company',$data);

	  $this->session->set_flashdata('success', 'Successfully created');
	  redirect('Customer/manage_customer', 'refresh');





	}
}
