<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard1 extends CI_Controller {
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

	       $id=$this->session->userdata('id');
	       $group_data = $this->model_groups->getGroupData($id);
			$this->data['group_data'] = $group_data;
			$this->load->view('dashboard/index', $this->data);	   
	
	}

	  public function add_user(){
	  	$this->data['groups']=$this->db->get('groups')->result();
	
	  	$this->form_validation->set_rules('groups','Groups','required|trim');
	  	$this->form_validation->set_rules('gender','Gender','required|trim');
	  	$this->form_validation->set_rules('phone','phone','required|trim|integer');
	  	$this->form_validation->set_rules('username','Username','required|trim|is_unique[tb_users.username]');
		$this->form_validation->set_rules('email','Email','required|trim|is_unique[tb_users.email]|valid_emails');
		$this->form_validation->set_rules('password','Password','required|trim|min_length[7]|max_length[25]');
		$this->form_validation->set_rules('cpassword','Password','matches[password]');
		$this->form_validation->set_rules('fname','First Name','required|trim');
		$this->form_validation->set_rules('lname','Last Name','required|trim');
	
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
			$this->load->view('users/index',$this->data);
		}else{
			$this->aksi_add_user();

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

			$data=[
				'group_name'=>$this->input->post('groups'),
				'email'=>$this->input->post('email'),
				'firstname'=>$this->input->post('fname'),
				'lastname'=>$this->input->post('lname'),			
				'password'=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'gender'=>$this->input->post('gender'),
				'username'=>$this->input->post('username'),
				'phone'=>$this->input->post('phone')
			];
			

				$this->db->insert('tb_users',$data);
				$kon=mysqli_connect("localhost","root","","db_magentaeo");
     			$query="SELECT id from tb_users  where username='$username'";
      			$response=mysqli_query($kon,$query);
      			if ($response){
      				$query_group="SELECT id from Groups  where group_name='$group_name'";
      				$response_group=mysqli_query($kon,$query_group);
      				if ($response_group){
      						$row=mysqli_fetch_assoc($response);
      						$row1=mysqli_fetch_assoc($response_group);

      					$data_group=[
						'user_id'=>$row['id'],
						'group_id'=>$row1['id']
			
				
					];
							$this->db->insert('user_group',$data_group);



      				}
      				
      				

      				
      			
					

			}
			$this->session->set_flashdata('flash','Ditambahkan');
			redirect('dashboard/manage_users', 'refresh');

	 


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

//function group
		 public function add_group(){
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
        		redirect('dashboard/manage_groups', 'refresh');
        	}
        	else {
        		$this->session->set_flashdata('errors', 'Error occurred!!');
        		redirect('groups/add_group', 'refresh');
        	}
        }
        else {
            // false case
          $this->load->view('groups/index',$this->data);
        }	

	 	

	 }

	   public function manage_groups(){
	   	 $id=$this->session->userdata('id');
	     $group_data = $this->model_groups->getGroupData($id);
		 $this->data['group_data'] = $group_data;
	   	 $this->data['groups']=$this->db->get('groups')->result();
	 	 $this->load->view('groups/manage_groups',$this->data);

	 }
	 	public function edit($id = null)
	{

	

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

	        	$update = $this->model_groups->edit($data, $id);
	        	if($update == true) {
	        		$this->session->set_flashdata('success', 'Successfully updated');
	        		redirect('dashboard/manage_groups', 'refresh');
	        	}
	        	else {
	        		$this->session->set_flashdata('errors', 'Error occurred!!');
	        		redirect('groups/manage_groups/'.$id, 'refresh');
	        	}
	        }
	        else {
	        	$where=array('id'=>$id);
	            // false case
	            $this->data['group_name']=$this->db->get_where('groups',$where)->result();
	            $kon=mysqli_connect("localhost","root","","db_magentaeo");
				$query_group="SELECT * from groups  where id='$id'";
      		     $response_group=mysqli_query($kon,$query_group);
      		     if ($response_group){
      		     	$row=mysqli_fetch_assoc($response_group);

      		     }$this->data['data']=$row['group_name'];




	            $group_data = $this->model_groups->getGroupData($id);
				$this->data['group_data'] = $group_data;
				$this->load->view('groups/edit', $this->data);	
	        }	
		}
	}

//function grouop

	   public function manage_users(){
	   	    $id=$this->session->userdata('id');
	        $group_data = $this->model_groups->getGroupData($id);
		    $this->data['group_data'] = $group_data;
	   		$this->data['groups']=$this->db->get('groups')->result();
	   	 	$this->data['users']=$this->db->get('tb_users')->result();
	 		$this->load->view('users/manage_users',$this->data);

	 }

	 	function aksi_update_data_user(){
		$group=$this->input->post('group_name');
		$email=$this->input->post('email');
		$username=$this->input->post('username');
		$fname=$this->input->post('fname');
		$lname=$this->input->post('lname');
		$phone=$this->input->post('phone');
		$id=$this->input->post('id');

		$data=array(
				'group_name'=>$group,
				'email'=>$email,
				'firstname'=>$fname,
				'lastname'=>$lname,			
				'username'=>$username,
				'phone'=>$phone
			);

	
			$where=array(
			'id'=>$id
			);

			$this->db->where($where);
			$this->db->update('tb_users',$data);

			$kon=mysqli_connect("localhost","root","","db_magentaeo");
			$query_group="SELECT id from groups  where group_name='$group'";
      		
      		$response_group=mysqli_query($kon,$query_group);
      		if ($response_group){
      			$row=mysqli_fetch_assoc($response_group);
      					$data_group=[
						'group_id'=>$row['id']
			
					];

					$where=array(
					'user_id'=>$id
					);
	
					$this->db->where($where);
					$this->db->update('user_group',$data_group);

      				}


		


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

		$data=array(
				'group_name'=>$group,
				'email'=>$email,
				'firstname'=>$fname,
				'lastname'=>$lname,			
				'username'=>$username,
				'password'=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			);

	
			$where=array(
			'id'=>$id
			);

			$this->db->where($where);
			$this->db->update('tb_users',$data);

				$kon=mysqli_connect("localhost","root","","db_magentaeo");
			$query_group="SELECT id from groups  where group_name='$group'";
      		
      		$response_group=mysqli_query($kon,$query_group);
      		if ($response_group){
      			$row=mysqli_fetch_assoc($response_group);
      					$data_group=[
						'group_id'=>$row['id']
			
					];

					$where=array(
					'user_id'=>$id
					);
	
					$this->db->where($where);
					$this->db->update('user_group',$data_group);

      				}
		
	}



	 	public function hapus_groups($id){
		$id=$this->input->post("id");
		$this->model_groups->hapus($id);
	}

	 //function PIC
	  public function add_pic(){
	  	$id=$this->session->userdata('id');
	    $group_data = $this->model_groups->getGroupData($id);
		$this->data['group_data'] = $group_data;
	  
	  	$this->form_validation->set_rules('username','Username','required|trim|is_unique[tb_users.username]');

		$this->form_validation->set_rules('jabatan',' Jabatan PIC PO','required|trim');

		$this->form_validation->set_message('is_unique',' *{field} sudah digunakan silakan ganti');
			$this->form_validation->set_rules('email','Email','required|trim|is_unique[tb_users.email]|valid_emails');
	
		$this->form_validation->set_message('integer','* {field} harus diisi dengan angka');
		$this->form_validation->set_message('valid_emails','* {field} tidak valid');

		$this->form_validation->set_message('required',' *{field} masih kosong silakan diisi');

	 	
	 	if ($this->form_validation->run()==false){
			$this->load->view('PIC/index',$this->data);
		}else{
			$this->aksi_add_pic();

		}

	 }
	 public function aksi_add_pic(){


			$data=[
				'pic_name'=>$this->input->post('username'),
				'jabatan'=>$this->input->post('jabatan'),
				'email'=>$this->input->post('email'),
				
			];

			$this->db->insert('pic_po',$data);
			$this->session->set_flashdata('flash','Ditambahkan');
			redirect('dashboard/manage_pic', 'refresh');
	 }
	   public function manage_pic(){
	   	$id=$this->session->userdata('id');
	    $group_data = $this->model_groups->getGroupData($id);
		$this->data['group_data'] = $group_data;
	   	$this->data['pic']=$this->db->get('pic_po')->result();
	 	$this->load->view('PIC/manage_pic',$this->data);

	 }
	 	public function hapus_pic($id){
		$id=$this->input->post("id");
		$this->model_pic->hapus($id);
	}
	public function ambilIdPIC(){
		$id=$this->input->post("id");
		$where=array('id'=>$id);
		$dataa=$this->model_users->AmbilId('pic_po',$where)->result();
		echo json_encode($dataa);
	}
		 function aksi_update_data_pic(){
		$username=$this->input->post('username');
		$jabatan=$this->input->post('jabatan');
		$email=$this->input->post('email');
		$id=$this->input->post('id');
		$data=[
				'pic_name'=>$username,
				'email'=>$email,
				'jabatan'=>$jabatan
			];
	
			$where=array(
			'id'=>$id
			);

			$this->db->where($where);
			$this->db->update('pic_po',$data);
		
	}

	 //function Customer
	  public function add_customer(){

	 	$this->data['pic']=$this->db->get('pic_po')->result();
	 	$id=$this->session->userdata('id');

	     
	  	$group_data = $this->model_groups->getGroupData($id);
		$this->data['group_data'] = $group_data;
	  $this->form_validation->set_rules('phone','phone','required|trim|integer');

	 
	  	$this->form_validation->set_rules('name','Customer Name','required|trim');
	  	$this->form_validation->set_rules('pic','PIC Name','required|trim');
	  	$this->form_validation->set_rules('npwp','NPWP Name','required|trim');
	  	$this->form_validation->set_rules('address','address ','required|trim');

		$this->form_validation->set_rules('jabatan',' Jabatan PIC PO','required|trim');
		$this->form_validation->set_message('required',' *{field} masih kosong silakan diisi');
		$this->form_validation->set_message('is_unique',' *{field} sudah digunakan silakan ganti');
		$this->form_validation->set_message('matches','* {field} tidak cocok');
		$this->form_validation->set_message('integer','* {field} harus diisi dengan angka');
		$this->form_validation->set_message('valid_emails','* {field} tidak valid');


	 	
	 	if ($this->form_validation->run()==false){
			$this->load->view('customer/index',$this->data);
		}else{
			$this->aksi_add_customer();

		}

	 }
	 public function aksi_add_customer(){

			$data=[
				'name'=>$this->input->post('name'),
				'jabatan'=>$this->input->post('jabatan'),
				'email'=>$this->input->post('email'),
				'address'=>$this->input->post('address'),
				'phone'=>$this->input->post('phone'),
				'npwp'=>$this->input->post('npwp'),
				'pic_name'=>$this->input->post('pic')
				
			];

			$this->db->insert('customer',$data);
			$this->session->set_flashdata('flash','Ditambahkan');
			redirect('dashboard/manage_customer', 'refresh');

	 }
	   public function manage_customer(){
	   		$id=$this->session->userdata('id');
	        $group_data = $this->model_groups->getGroupData($id);
		    $this->data['group_data'] = $group_data;



	   	 	$this->data['customer']=$this->db->get('customer')->result();
	   	 	$this->data['pic']=$this->db->get('pic_po')->result();
	 	$this->load->view('customer/manage_customer',$this->data);

	 }
	 	public function hapus_customer($id){
		$id=$this->input->post("id");		
		$this->db->where('id',$id);
		$this->db->delete('customer');
		

	}
		public function ambilIdCustomer(){
		$id=$this->input->post("id");
		$where=array('id'=>$id);
		$dataa=$this->model_users->AmbilId('customer',$where)->result();
		echo json_encode($dataa);
	}
		 public function aksi_update_data_customer(){
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$jabatan=$this->input->post('jabatan');
		$phone=$this->input->post('phone');
		$address=$this->input->post('address');
		$npwp=$this->input->post('npwp');
		$id=$this->input->post('id');
		$pic_name=$this->input->post('pic_name');

		$data=array(
				'name'=>$name,
				'jabatan'=>$jabatan,
				'email'=>$email,
				'address'=>$address,
				'phone'=>$phone,			
				'pic_name'=>$pic_name,
				'phone'=>$phone,
				'npwp'=>$npwp,
				'id'=>$id,
				'pic_name'=>$pic_name

			);

	
			$where=array(
			'id'=>$id
			);

			$this->db->where($where);
			$this->db->update('customer',$data);
	
	}
	public function AmbilDataPIC(){
		$pic_name=$this->input->post("pic_name");
		$where=array('pic_name'=>$pic_name);
		$dataa=$this->model_pic->AmbilId('pic_po',$where)->result();
		echo json_encode($dataa);

	}

	//function attribute
	  public function add_attribute(){

	  
	  	$this->form_validation->set_rules('name','Nama attribute','required|trim');
		$this->form_validation->set_rules('status','Status','required|trim');
		$this->form_validation->set_message('required',' *{field} masih kosong silakan diisi');

	 	
	 	if ($this->form_validation->run()==false){
	 	$id=$this->session->userdata('id');
	     $group_data = $this->model_groups->getGroupData($id);
		$this->data['group_data'] = $group_data;
		$this->load->view('attribute/index',$this->data);
		}else{
			$this->aksi_add_attribute();

		}
	}

	 public function aksi_add_attribute(){

			$data=[
				'name'=>$this->input->post('name'),
				'active'=>$this->input->post('status')
				
			];

			$this->db->insert('attributes',$data);
			$this->session->set_flashdata('flash','Ditambahkan');
			redirect('dashboard/manage_attribute', 'refresh');
	 }
	   public function manage_attribute(){
	   $id=$this->session->userdata('id');
	    $group_data = $this->model_groups->getGroupData($id);
		$this->data['group_data'] = $group_data;
	   	$this->data['controller'] = $this; 
	   	$this->data['attribute']=$this->db->get('attributes')->result();
	 	$this->load->view('attribute/manage_attribute',$this->data);

	 }
	 	public function ambilIdAttribute(){
		$id=$this->input->post("id");
		$where=array('id'=>$id);
		$dataa=$this->model_attribute->AmbilId('attributes',$where)->result();
		echo json_encode($dataa);
	}
	 
 public function aksi_update_data_attribute(){
		$name=$this->input->post('name');
		$status=$this->input->post('status');
		$id=$this->input->post('id');
	
		$data=array(
				'name'=>$name,
				'active'=>$status
			);

	
			$where=array(
			'id'=>$id
			);

			$this->db->where($where);
			$this->db->update('attributes',$data);
		
	}
		public function hapus_attribute($id){
		$id=$this->input->post("id");		
		$this->db->where('id',$id);
		$this->db->delete('attributes');
		

	}
	 

	//function Value attribute
	  public function add_value_attribute($id){
	  
	  	$this->form_validation->set_rules('value','Attribute Value','required|trim');
		$this->form_validation->set_message('required',' *{field} masih kosong silakan diisi');
		$this->data['id']=$id;

	 	
	 	if ($this->form_validation->run()==false){
	 	$id=$this->session->userdata('id');
	    $group_data = $this->model_groups->getGroupData($id);
		$this->data['group_data'] = $group_data;
		$this->load->view('attribute_value/index',$this->data);
		}else{

			$this->aksi_value_add_attribute($id);

		}
	}

	 public function aksi_value_add_attribute($id){

			$data=[
				'value'=>$this->input->post('value'),
				'attribute_parent_id'=>$id
				
			];

			$this->db->insert('attribute_values',$data);
			$this->session->set_flashdata('flash','Ditambahkan');
			redirect('dashboard/manage_attribute_value/'.$id, 'refresh');
	 }
	   public function manage_attribute_value($id){
			$where=array('attribute_parent_id'=>$id);
			$this->data['id']=$id;
			$this->data['attribute']=$this->db->get_where('attribute_values',$where)->result();
			$id=$this->session->userdata('id');
	     	$group_data = $this->model_groups->getGroupData($id);
			$this->data['group_data'] = $group_data;
	 		$this->load->view('attribute_value/manage_value',$this->data);

	 }

	 public function ambilIdValue(){
		$id=$this->input->post("id");
		$where=array('id'=>$id);
		$dataa=$this->model_attribute->AmbilId('attribute_values',$where)->result();
		echo json_encode($dataa);
	}

	 public function aksi_update_data_value_attribute(){
		$name=$this->input->post('value');
		$id=$this->input->post('id');
	
		$data=array(
				'value'=>$name
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
     $kon=mysqli_connect("localhost","root","","db_magentaeo");
     $query="SELECT count(*) as jml from attribute_values where attribute_parent_id='$id'";
      $response=mysqli_query($kon,$query);
      if ($response){
      $row=mysqli_fetch_assoc($response);
       }
		echo $row['jml'];
	}

	//bank



	//function attribute
	  public function add_bank(){
	  	 $id=$this->session->userdata('id');
	     $group_data = $this->model_groups->getGroupData($id);
		 $this->data['group_data'] = $group_data;
	  	 $this->form_validation->set_rules('Total','Total Cash In','required|trim');
		 $this->form_validation->set_message('required',' *{field} masih kosong ');

	 	if ($this->form_validation->run()==false){
			$this->load->view('bank/index',$this->data);
		}else{
			$this->aksi_add_attribute();

		}
	
	}

	 public function aksi_add_bank_item(){


	$deposit_number = $this->input->post('deposit_number');
	$totalcashin = $this->input->post('hasil');
	$availability = $this->input->post('id');
	$t=0;

	

	$i = 0; // untuk loopingnya
    $a = $this->input->post('bank_name');
    $b = $this->input->post('rek');
    $c = $this->input->post('deposit');
    if ($a[0] !== null) 
    {
      foreach ($a as $row) 
      {
        $data = [
          'bank_name'=>$row,
          'bank_id'=>$availability,
          'deposit'=>$c[$i],
          'norek'=>$b[$i],
        ];
       // $t=+(int) $c[$i];

        $insert = $this->db->insert('bank_item', $data);
        if ($insert) {
        	
          $i++;

        }
      }
    }
    $data=[
	'deposit_number'=>$deposit_number,
	'total_cashin'=>$t,
	'availability'=>$availability			
	];
	$this->db->insert('bank',$data);
    

    $arr['success'] = true;
    $arr['notif']  = '<div class="alert alert-success">
      <i class="fa fa-check"></i> Data Berhasil Disimpan
    </div>';
    return $this->output->set_output(json_encode($arr));
 
	 }
public function manage_bank(){
	   	  $id=$this->session->userdata('id');
	      $group_data = $this->model_groups->getGroupData($id);
		  $this->data['group_data'] = $group_data;
	   	  $this->db->select('*');
      	  $this->db->from('bank');
      	  $this->db->join('bank_item','bank.availability = bank_item.bank_id');      
      	  $this->data['bank'] = $this->db->get()->result();	   
	 	 $this->load->view('bank/manage_bank',$this->data);

	 }

public function edit_bank($id){

	  $kon=mysqli_connect("localhost","root","","db_magentaeo");
      $query="SELECT * from bank where availability='$id'";
      $response=mysqli_query($kon,$query);
      if ($response){
      $row=mysqli_fetch_assoc($response);
       }
	

		$where_bank_item=array('bank_id'=>$id);
	  	$this->data['bank_item']=$this->db->get_where('bank_item',$where_bank_item)->result();
	  	

	 	 $id=$this->session->userdata('id');
	     $group_data = $this->model_groups->getGroupData($id);
		 $this->data['group_data'] = $group_data;
	  	 $this->form_validation->set_rules('Total','Total Cash In','required|trim');
		 $this->form_validation->set_message('required',' *{field} masih kosong ');
		 $this->data['deposit_number']=$row['deposit_number'];
		 $this->data['totalcashin']=$row['total_cashin'];
		 $this->data['id']=$row['availability'];

	 	if ($this->form_validation->run()==false){
			$this->load->view('bank/edit',$this->data);
		}else{
			$this->aksi_add_attribute();

		}

}
public function aksi_update_bank_item(){


	$deposit_number = $this->input->post('deposit_number');
	$totalcashin = $this->input->post('hasil');
	$availability = $this->input->post('id');
	$t=0;
	

	

	$i = 0; // untuk loopingnya
    $a = $this->input->post('bank_name');
    $b = $this->input->post('rek');
    $c = $this->input->post('deposit');
    $d = $this->input->post('id_bank_item');
    if ($a[0] !== null) 
    {
      foreach ($a as $row) 
      {
        $data = [
          'bank_name'=>$row,
          'deposit'=>$c[$i],
          'norek'=>$b[$i],
        ];

       	$where=array('id_bank_item'=>$d[$i]);
        $this->db->where($where);
		$update=$this->db->update('bank_item',$data);
        //$insert = $this->db->insert('bank_item', $data);
        if ($update) {
        	
          $i++;

        }
      }
    }

 
			$this->session->set_flashdata('flash','Ditambahkan');
			redirect('dashboard/manage_bank', 'refresh');
	 }



	 public function AmbilIDBank(){
	  $kon=mysqli_connect("localhost","root","","db_magentaeo");
      $query = mysqli_query($kon, "SELECT max(id) as kodeTerbesar FROM bank");
	  $data = mysqli_fetch_array($query);
	  $id = $data['kodeTerbesar'];

        $id++;
   
		echo $id;
	 }
	
	public function getTableProductRow()
	{
		$products = $this->model_bank->getActiveProductData();
		echo json_encode($products);
	}

		public function hapus_bank($id){
		$id=$this->input->post("id");
		$this->model_bank->hapus($id);
	}




}