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
			$this->load->view('tamplate/header',$this->data);
			$this->load->view('tamplate/sidebar',$this->data);
			$this->load->view('profile/index',$this->data);
			$this->load->view('tamplate/footer',$this->data);
	}
}
