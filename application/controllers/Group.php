<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {

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



//function group
		 public function add_group(){
		 	 if((!in_array('createGroup', $this->permission)) ) {
      redirect('dashboard', 'refresh');
    }
		 $id=$this->session->userdata('id');
	     $group_data = $this->model_groups->getGroupData($id);
		$this->data['group_data'] = $group_data;

	
		$this->form_validation->set_message('required',' *{field} masih kosong silakan diisi');
	
		$this->form_validation->set_rules('group_name','Group Name','required|trim|is_unique[groups.group_name]');

		$this->form_validation->set_message('is_unique',' *{field} sudah digunakan silakan ganti');

        if ($this->form_validation->run() == TRUE) {
            // true case
            $permission = serialize($this->input->post('permission'));
        	$data = array(
        		'group_name' => $this->input->post('group_name'),
        		'permission' => $permission
        	);

        	$create = $this->model_groups->create($data);
        	if($create == true) {
        		$this->session->set_flashdata('success', 'Successfully created');
        		redirect('Group/manage_groups', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('Groups/add_group', 'refresh');
        	}
        }
        else {
            // false case
          $this->load->view('tamplate/header',$this->data);
          $this->load->view('tamplate/sidebar',$this->data);
          $this->load->view('groups/add_groups',$this->data);
           $this->load->view('tamplate/footer',$this->data);
        }	

	 	

	 }

	   public function manage_groups(){
	   	 if((!in_array('viewGroup', $this->permission))AND (!in_array('updateGroup', $this->permission)) AND (!in_array('deleteGroup', $this->permission))) {
      redirect('dashboard', 'refresh');
    }
	   	 $id=$this->session->userdata('id');
	     $group_data = $this->model_groups->getGroupData($id);
		 $this->data['group_data'] = $group_data;
	   	 $this->data['groups']=$this->db->get('groups')->result();
	
	 	 $this->load->view('tamplate/header',$this->data);
         $this->load->view('tamplate/sidebar',$this->data);
         $this->load->view('groups/manage_groups',$this->data);
          $this->load->view('tamplate/footer',$this->data);

	 }
	 	public function edit($id = null)
	{
		 	 if((!in_array('viewGroup', $this->permission))) {
      redirect('dashboard', 'refresh');
    }

	

		if($id) {

			$this->form_validation->set_rules('group_name', 'Group name', 'required');
			$this->form_validation->set_message('required',' *{field} masih kosong silakan diisi');

			if ($this->form_validation->run() == TRUE) {
	            // true case
	            $permission = serialize($this->input->post('permission'));
	            
	        	$data = array(
	        		'group_name' => $this->input->post('group_name'),
	        		'permission' => $permission
	        	);
	        			$where=array(
				'id_group'=>$id
				);
				$data1=[
					'group_name'=>$this->input->post('group_name')

				];

	        		


	        	$update = $this->model_groups->edit($data, $id);
	        	if($update == true) {
	        		$this->db->where($where);
					$this->db->update('tb_users',$data1);
	        		$this->session->set_flashdata('success', 'Successfully updated');
	        		redirect('Group/manage_groups', 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('success', 'Successfully updated');
	        		$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('Groups/manage_groups/'.$id, 'refresh');
	        	}
	        }
	        else {
	        	$where=array('id'=>$id);
	            // false case
	             $this->data['group_name']=$this->db->get_where('groups',$where)->result();
      		     $this->db->select('*');
     			 $this->db->from('groups');
     			 $this->db->where('id',$id);
     			 $row=$this->db->get()->row_array();
      		     $this->data['data']=$row['group_name'];


	            $group_data = $this->model_groups->getGroupData($id);
				$this->data['group_data'] = $group_data;
				$this->load->view('tamplate/header',$this->data);
          		$this->load->view('tamplate/sidebar',$this->data);
          		$this->load->view('groups/edit', $this->data);	
           		$this->load->view('tamplate/footer',$this->data);
			
	        }	
		}
	}


	 	public function hapus_groups($id){
		$id=$this->input->post("id");
		$this->model_groups->hapus($id);
	}
		public function TampilDatagroup(){
		$this->db->select('*');
		$this->db->from('groups');
		$data=$this->db->get()->result();
		echo json_encode($data);


	}

}
