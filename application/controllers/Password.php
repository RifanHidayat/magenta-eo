<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller {
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
			$this->load->model('model_api');

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


public function change_password(){
	$this->form_validation->set_rules('password','password','required');
	$this->form_validation->set_message('required',' *{field} masih kosong silakan diisi');


		if ($this->form_validation->run()==false){

		$this->load->view('tamplate/header',$this->data);
          	$this->load->view('tamplate/sidebar',$this->data);
          	$this->load->view('Password/change_password',$this->data);
           	$this->load->view('tamplate/footer',$this->data);

		}else{
			$this->aksi_change_password();
			//echo "string";
			
		}

		
	
	}

public function aksi_change_password(){
	$password=$this->input->post('password');
	$user_id = $this->session->userdata('id');
	$where=array('id'=>$user_id);


  	$data=['password'=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),];
  	$this->db->where($where);
	$this->db->update('tb_users',$data);
	  $this->session->set_flashdata('success', 'Successfully updated');
	redirect('Password/change_password');


	}

	public function quotation(){

$data=$this->model_api->getQuotation('quotations')->result();

$respon=[
	"status"=>"ok",
	"code"=>200,
	"data"=>$data
];
echo json_encode($respon);


}

	
}
