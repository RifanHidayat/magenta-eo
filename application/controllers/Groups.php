<?php 

class Groups extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();



		$this->data['page_title'] = 'Groups';
		

		$this->load->model('model_groups');
	}

	/* 
	* It redirects to the manage group page
	* As well as the group data is also been passed to display on the view page
	*/
	public function index()
	{

		if(!in_array('viewGroup', $this->permission)) {
			redirect('Group', 'refresh');
		}

		$groups_data = $this->model_groups->getGroupData();
		$this->data['groups_data'] = $groups_data;

		$this->render_template('groups/index', $this->data);
	}	

	/*
	* If the validation is not valid, then it redirects to the create page.
	* If the validation is for each input field is valid then it inserts the data into the database 
	* and it stores the operation message into the session flashdata and display on the manage group page
	*/
	public function create()
	{

		if(!in_array('createGroup', $this->permission)) {
			redirect('Group', 'refresh');
		}

		$this->form_validation->set_rules('group_name', 'Group name', 'required');

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
        		redirect('groups/', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('groups/create', 'refresh');
        	}
        }
        else {
            // false case
            $this->render_template('groups/creat', $this->data);
        }	
	}

	/*
	* If the validation is not valid, then it redirects to the edit group page 
	* If the validation is successfully then it updates the data into the database 
	* and it stores the operation message into the session flashdata and display on the manage group page
	*/
	public function edit($id = null)
	{

		
		if($id) {

			$this->form_validation->set_rules('group_name', 'Group name', 'required');

			if ($this->form_validation->run() == TRUE) {
	            // true case
	            $permission = serialize($this->input->post('permission'));
	            
	        	$data = array(
	        		'group_name' => $this->input->post('group_name'),
	        		'permission' => $permission
	        	);
	        	
			


	        	$update = $this->model_groups->edit($data, $id);
	        	if($update == true) {
	        		$where=array(
				'id_group'=>$id
				);
				$data1=[
					'group_name'=>$this->input->post('group_name')

				];

	        		$this->db->where($where);
					$this->db->update('tb_users',$data1);

	        		$this->session->set_flashdata('success', 'Successfully updated');
	        		redirect('groups/manage_groups', 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('groups/edit'.$id, 'refresh');
	        	}
	        }
	        else {
	            // false case
	            $group_data = $this->model_groups->getGroupData($id);
				$this->data['group_data'] = $group_data;
				$this->load->view('groups/manage_groups', $this->data);	
	        }	
		}
	}

	/*
	* It removes the removes information from the database 
	* and it stores the operation message into the session flashdata and display on the manage group page
	*/
	public function delete($id)
	{

		if(!in_array('deleteGroup', $this->permission)) {
			redirect('Group', 'refresh');
		}

		if($id) {
			if($this->input->post('confirm')) {

				$check = $this->model_groups->existInUserGroup($id);
				if($check == true) {
					$this->session->set_flashdata('error', 'Group exists in the users');
	        		redirect('groups/', 'refresh');
				}
				else {
					$delete = $this->model_groups->delete($id);
					if($delete == true) {
		        		$this->session->set_flashdata('success', 'Successfully removed');
		        		redirect('groups/', 'refresh');
		        	}
		        	else {
		        		$this->session->set_flashdata('error', 'Error occurred!!');
		        		redirect('groups/delete/'.$id, 'refresh');
		        	}
				}	
			}	
			else {
				$this->data['id'] = $id;
				$this->render_template('groups/delete', $this->data);
			}	
		}
	}


}