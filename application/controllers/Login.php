<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

		public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
	}


public function index()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
			$this->load->library('form_validation');
		$this->form_validation->set_rules('email','email','required|trim');
		$this->form_validation->set_rules('password','Password','required|trim');
		$this->form_validation->set_message('required',' *{field} masih kosong silakan diisi');

		if ($this->form_validation->run()==false){
				
		$this->load->view('login/index');
	
		}else{
			$this->aksi_login();

		}
	}

public function login(){
		$this->form_validation->set_rules('email','Email','required|trim');
		$this->form_validation->set_rules('password','Password','required|trim');
		$this->form_validation->set_message('required',' *{field} masih kosong silakan diisi');

		if ($this->form_validation->run()==false){
		$this->load->view('login/head');
		$this->load->view('login/index');
		$this->load->view('login/footer');
		}else{
			$this->aksi_login();

		}
	
	}
	public function aksi_login(){
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$user=$this->db->get_where('tb_users',['username'=>$email])->row_array();
	 	
		
		// var_dump($user);
		// die;
		if ($user!=''){
				//$user1=$this->db->get_where('tb_users',['password'=>$password])->row_array();
			  if (password_verify($password,$user['password'])){

			  	  if ($user['is_active']==1){
			  	  	$data=[
					'email'=>$user['email'],
					'fname'=>$user['firstname'],
					'lname'=>$user['lastname'],
					'id'=>$user['id'],
					'username'=>$user['username']
				];
				$this->session->set_userdata($data);
				$this->session->set_flashdata('flashdataa','Login Sukses');
			
			redirect('dashboard');

			  	  }else{
				
			  	  		$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
			Account belum active ,silahkan lakukan aktivasi terlebih dahulu
			</div>');
			redirect('login');
			



			  	  }
	
		
		
			}else{
			
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
			Username atau password salah!
			</div>');
			redirect('login');
			
			}

		}else{

			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
		Username atau password salah!
		</div>');
		redirect('login');

		}

	}
		public function logout(){
		$this->session->unset_userdata('email');
		redirect('login');

	}

	
}