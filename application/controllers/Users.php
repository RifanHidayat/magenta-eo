<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class users extends CI_Controller {
	var $permission = array();


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

	  public function add_user(){
	  	if(!in_array('createUser', $this->permission)) {
			redirect('dashboard', 'refresh');
		}
	  	$this->data['groups']=$this->db->get('groups')->result();
	
	
	  	$this->form_validation->set_rules('username','Username','is_unique[tb_users.username]');
		$this->form_validation->set_rules('email','Email','required|trim|is_unique[tb_users.email]|valid_emails');
		
		$this->form_validation->set_rules('password','Password','required|trim|min_length[7]|max_length[25]');
		$this->form_validation->set_rules('cpassword','Password','matches[password]');
		
	
		$this->form_validation->set_message('required',' *{field} masih kosong silakan diisi');

		//validasi pesan
		$this->form_validation->set_message('min_length','* {field} nimimal 7 karakter');
		$this->form_validation->set_message('max_length','* {field} nimimal 20 karakter');
		$this->form_validation->set_message('required',' *{field} masih kosong silakan diisi');
		$this->form_validation->set_message('is_unique',' *{field} sudah digunakan silakan ganti');
		$this->form_validation->set_message('matches','* {field} tidak cocok');
		$this->form_validation->set_message('integer','* {field} harus diisi dengan angka');
		$this->form_validation->set_message('valid_emails','* {field} tidak valid');


		


	 	
	 	if ($this->form_validation->run()==false){
	       $id=$this->session->userdata('id');
	       $group_data = $this->model_groups->getGroupData($id);
			$this->data['group_data'] = $group_data;
			$this->load->view('tamplate/header',$this->data);
			$this->load->view('tamplate/sidebar',$this->data);
			$this->load->view('users/add_users',$this->data);
			$this->load->view('tamplate/footer',$this->data);
			//$this->render_template('users/add_users', $this->data);
		}else{
			$this->aksi_add_user();

		}

	 }

	 public function sendEmail($token,$type){


                 
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
      	$mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rifanhidayat0811@gmail.com';//email pengirim
        $mail->Password = 'capucino';//password pengirim
    
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
        
        //email pengirim
        $mail->setFrom('rifanhidayat0811@gmail.com', 'Magenta EO');
        $mail->addReplyTo('rifanhidayat0811@gmail.com', 'MagentaEO');
        
        // Add a recipient
        $mail->addAddress($this->input->post('email'));//email penerima
        
        // Add cc or bcc 
        $mail->addCC('rifanhidayat0811@gmail.com');
        $mail->addBCC('bcc@example.com');
        
        // Email subject
        $mail->Subject = 'Mohon verfikasi email anda';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = '<h1></h1>
            <p>Gunakan link berikut untuk melakukan verifikasi email  :<a href="'.base_url().'Users/verify?email='.$this->input->post('email').'&token='.$token.'">Activate</a></p><br><br>

            <p>Password Anda :'.$this->input->post('password').'</p>';

        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
          
        }else{
           
        }

		 

		
}
public function verify(){
	$this->session->unset_userdata('email');
	$email=$this->input->get('email');
	$token=$this->input->get('token');
	$user= $this->db->get_where('tb_users',['email'=>$email])->row_array(); 
	if ($user){
		$token= $this->db->get_where('user_token',['token'=>$token])->row_array();
		if ($token){
			$this->db->set('is_active',1);
			$this->db->where('email',$email);
			$this->db->update('tb_users');
			$this->db->delete('user_token',['email'=>$email]);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			Account Has been Activated
					</div>');
					redirect('login');
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
			Failed Token
					</div>');
					redirect('login');

		}

	}else{
		$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
			Failed Email
					</div>');
					redirect('login');

	}

}

public function aksi_add_user(){
	 			$email=$this->input->post('email');
	 			$username=$this->input->post('username');
	 			$password=$this->input->post('password');
	 			$fname=$this->input->post('fname');
	 			$lname=$this->input->post('lname');
	 			$phone=$this->input->post('phone');
	 			$group_name=$this->input->post('groups');

	 			$this->db->select('*');
	 			$this->db->from('groups');
	 			$this->db->where('group_name',$group_name);
	 			$row=$this->db->get()->row_array();

				$data=[
					'group_name'=>$this->input->post('groups'),
					'email'=>$this->input->post('email'),
					'firstname'=>$this->input->post('fname'),
					'lastname'=>$this->input->post('lname'),			
					'password'=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
					'gender'=>$this->input->post('gender'),
					'username'=>$this->input->post('username'),
					'phone'=>$this->input->post('phone'),
					'is_active'=>0,
					'id_group'=>$row['id'],
					'finance_permission'=>json_encode($this->input->post('finance'))
			];
			
				$email=$this->input->post("email");
			
				$token=base64_encode(random_bytes(32));
				$user_token=[
					'email'=>$email,
					'token'=>$token,
					'date_create'=>time()
				];
					$this->db->insert('user_token',$user_token);
					$this->sendEmail($token,"verify");

					
			

				$this->db->insert('tb_users',$data);

				$this->session->set_flashdata('success', 'Successfully created');
				
			redirect('Users/manage_users', 'refresh');
	 }

	 	public function hapus($id){
		$id=$this->input->post("id");
		$this->model_users->hapus_data($id);
	}
public function ambilId(){
		$id=$this->input->post("id");
		$where=array('id'=>$id);
		$dataa=$this->model_users->AmbilId('tb_users',$where)->result();
		echo json_encode($dataa);
	}



	 public function manage_users(){
	 	if((!in_array('updateUser', $this->permission)) AND (!in_array('deleteUser', $this->permission)) AND (!in_array('viewUser', $this->permission))) {
			redirect('dashboard', 'refresh');
		}

	   	    $id=$this->session->userdata('id');
	        $group_data = $this->model_groups->getGroupData($id);
		    $this->data['group_data'] = $group_data;
	   		$this->data['groups']=$this->db->get('groups')->result();
	   	 	$this->data['users']=$this->db->get('tb_users')->result();
	 		$this->load->view('tamplate/header',$this->data);
	 		$this->load->view('tamplate/sidebar',$this->data);
	 		$this->load->view('users/manage_users',$this->data);
	 		$this->load->view('tamplate/footer',$this->data);

	 		//$this->render_template('users/manage_users', $this->data);

	 }

	 	function aksi_update_data_user(){
		$group=$this->input->post('group_name');
		$email=$this->input->post('email');
		$username=$this->input->post('username');
		$fname=$this->input->post('fname');
		$lname=$this->input->post('lname');
		$phone=$this->input->post('phone');
		$id=$this->input->post('id');


		$this->db->select('*');
	 	$this->db->from('groups');
	 	$this->db->where('group_name',$group);
	 	$row=$this->db->get()->row_array();


		$data=array(
				'group_name'=>$group,
				'email'=>$email,
				'firstname'=>$fname,
				'lastname'=>$lname,			
				'username'=>$username,
				'phone'=>$phone,
				'id_group'=>$row['id'],
				'finance_permission'=>json_encode($this->input->post('finance'))
			);

	
			$where=array(
			'id'=>$id
			);

			$this->db->where($where);
			$this->db->update('tb_users',$data);

	}
		function aksi_update_data_user_password(){
		$group=$this->input->post('group_name');
		$email=$this->input->post('email');
		$username=$this->input->post('username');
		$fname=$this->input->post('fname');
		$lname=$this->input->post('lname');
		$phone=$this->input->post('phone');
		$id=$this->input->post('id');
		$password=$this->input->post('password');
		$id_group=$this->input->post('id_group');
			$this->db->select('*');
	 	$this->db->from('groups');
	 	$this->db->where('group_name',$group);
	 	$row=$this->db->get()->row_array();


		$data=array(
				'group_name'=>$group,
				'email'=>$email,
				'firstname'=>$fname,
				'lastname'=>$lname,			
				'username'=>$username,
				'password'=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'id_group'=>$row['id'],
				'finance_permission'=>json_encode($this->input->post('finance'))
			);

	
			$where=array(
			'id'=>$id
			);

			$this->db->where($where);
			$this->db->update('tb_users',$data);	
      		
      				
		
	}
	public function TampilDatauser(){
		   $this->load->model("model_users");  
           $fetch_data = $this->model_users->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
           	   if(in_array('updateUser', $this->permission)){
                	$edit='<font color="#FFFFFF" size="2px"><a title="Edit" class="btn btn-sm bg-gradient-secondary" onclick="AmbilData('.$row->id.')" data-toggle="modal" data-target="#update"><i class="fa fa-edit"></i></a></font>';

                }else{
                	$edit='';
                }	
                if(in_array('deleteUser', $this->permission)){
                	$delete='<font color="#FFFFFF" size="2px"><a title="Delete" class="btn btn-sm bg-gradient-secondary" onclick="swetalert('.$row->id.')"><i class="fa fa-trash"></i><font size="2px"></font></a></font></center>';

                }else{
                	$delete='';
                	
                } 
				$status='';
				if ($row->is_active==1){
					$status='<span class="label label-success">Active</span>';
 
				}else{
				 $status='<span class="label label-danger">In Active</span>';
 
				}
                $sub_array = array();  
                $sub_array[] = $row->username;
                $sub_array[] = $row->email;  
                $sub_array[] = $row->firstname." ".$row->lastname; 
                $sub_array[] = $row->phone;
                $sub_array[] = $row->group_name;
				$sub_array[] = $status;  

                 
                 $sub_array[] = '<center>'.$edit.' '.$delete.'</center>';





                $data[] = $sub_array;  

           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->model_users->get_all_data(),  
                "recordsFiltered"     =>     $this->model_users->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  


      }  




function fetch_user(){  
           $this->load->model("model_users");  
           $fetch_data = $this->model_users->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
			   $status='';
			   if ($row->is_active==1){
				   $status='<span classs="label label-success">Active</span>';

			   }else{
				$status='<span classs="label label-danger">In Active</span>';

			   }
                $sub_array = array();  
                $sub_array[] = $row->username;
                $sub_array[] = $row->email;  
                $sub_array[] = $row->firstname." ".$row->lastname; 
                 $sub_array[] = $row->phone;  
				 $sub_array[] = $status;  

                $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs">Update</button>';  
                $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs">Delete</button>';  
                $data[] = $sub_array;  

           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->model_users->get_all_data(),  
                "recordsFiltered"     =>     $this->model_users->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }  

}
