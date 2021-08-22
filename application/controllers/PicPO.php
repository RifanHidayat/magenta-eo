<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PicPO extends CI_Controller {

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


	//function PIC
	  public function add_pic(){
	   	 if((!in_array('createPicPO', $this->permission))) {
      redirect('dashboard', 'refresh');
    }
	  	$id=$this->session->userdata('id');
	  	$this->data['customer']=$this->db->get('customer')->result();
	    $group_data = $this->model_groups->getGroupData($id);
		$this->data['group_data'] = $group_data;
	  

			$this->load->view('tamplate/header',$this->data);
          	$this->load->view('tamplate/sidebar',$this->data);
          	$this->load->view('PIC/add_picpo',$this->data);
           $this->load->view('tamplate/footer',$this->data);
		

	 }
	 //function PIC
	  public function add_pic_event(){
	  	$id=$this->session->userdata('id');
	  	$this->data['customer']=$this->db->get('customer')->result();
	    $group_data = $this->model_groups->getGroupData($id);
		$this->data['group_data'] = $group_data;

			$this->load->view('tamplate/header',$this->data);
          	$this->load->view('tamplate/sidebar',$this->data);
          	$this->load->view('PIC/add_picpo',$this->data);
           $this->load->view('tamplate/footer',$this->data);
	

	 }
	 public function aksi_add_pic(){
	 	$id=$this->input->post('customer');

	 			$this->db->select('*');
	 			$this->db->from('customer');
	 			$this->db->where('id',$id);
	 			$row=$this->db->get()->row_array();
	 			$data=[
				'pic_name'=>$this->input->post('username'),
				'jabatan'=>$this->input->post('jabatan'),
				'email'=>$this->input->post('email'),
				'id_customer'=>$id,
				'customer'=>$row['name'],
				
			];

			$this->db->insert('pic_po',$data);
			$this->session->set_flashdata('success', 'Successfully created');	
			redirect('PicPO/manage_pic', 'refresh');

	 	


		
	 }
	  public function aksi_add_pic_event(){
	  		
	  	

		$id=$this->input->post('customerEvent');

	 			$this->db->select('*');
	 			$this->db->from('customer');
	 			$this->db->where('id',$id);
	 			$row=$this->db->get()->row_array();
	 			$data=[
				'pic_name'=>$this->input->post('usernameEvent'),
				'jabatan'=>$this->input->post('jabatanEvent'),
				'email'=>$this->input->post('emailEvent'),
				'id_customer'=>$id,
				'customer'=>$row['name'],
				
			];


			$this->db->insert('pic_event',$data);
				$this->session->set_flashdata('success', 'Successfully created');
				
			redirect('PicPO/manage_pic_event', 'refresh');
		
	 }
	   public function manage_pic(){
	    	 if((!in_array('viewPicPO', $this->permission))AND(!in_array('updatePicPO', $this->permission)) AND (!in_array('deletePicPO', $this->permission))) {
      redirect('dashboard', 'refresh');
    }
	   		$this->data['customer']=$this->db->get('customer')->result();
	   	// $id=$this->session->userdata('id');
	    // $group_data = $this->model_groups->getGroupData($id);
		// $this->data['group_data'] = $group_data;
	   	// $this->data['pic']=$this->db->get('pic_po')->result();
	
	 	$this->load->view('tamplate/header',$this->data);
        $this->load->view('tamplate/sidebar',$this->data);
        $this->load->view('PIC/manage_pic',$this->data);
         $this->load->view('tamplate/footer',$this->data);

	 }
	    public function manage_pic_event(){
	    	  	 if((!in_array('viewPicPO', $this->permission))AND(!in_array('updatePicPO', $this->permission)) AND (!in_array('deletePicPO', $this->permission))) {
      redirect('dashboard', 'refresh');
    }
	   	$this->data['customer']=$this->db->get('customer')->result();
	   	 $id=$this->session->userdata('id');
	    // $group_data = $this->model_groups->getGroupData($id);
		// $this->data['group_data'] = $group_data;
	   	// $this->data['pic_event']=$this->db->get('pic_event')->result();
	
	 	$this->load->view('tamplate/header',$this->data);
        $this->load->view('tamplate/sidebar',$this->data);
        $this->load->view('PIC/manage_pic_event',$this->data);
         $this->load->view('tamplate/footer',$this->data);

	 }
	 	public function hapus_pic($id){
		$id=$this->input->post("id");
		$this->model_pic->hapus($id);

		$where1=array(
			'id_po'=>$id
			);
		$data1=array('pic_name'=>"");

			$this->db->where($where1);
			$this->db->update('quotations',$data1);

			$this->db->where($where1);
			$this->db->update('quotation_other',$data1);


	}
	 	public function hapus_pic_event($id){
		$id=$this->input->post("id");
		$this->model_pic->hapus_event($id);


			$where1=array(
			'id_pic_event'=>$id
			);
			$data1=array('pic_event'=>"");


		

			$this->db->where($where1);
			$this->db->update('quotations',$data1);

			$this->db->where($where1);
			$this->db->update('quotation_other',$data1);
	}
	public function ambilIdPIC(){
		$id=$this->input->post("id");
		$where=array('id'=>$id);
		$dataa=$this->model_users->AmbilId('pic_po',$where)->result();
		echo json_encode($dataa);
	}
	public function ambilIdPICEvent(){
		$id=$this->input->post("id");
		$where=array('id_event'=>$id);
		$dataa=$this->model_users->AmbilId('pic_event',$where)->result();
		echo json_encode($dataa);
	}

		 function aksi_update_data_pic(){
		$username=$this->input->post('username');
		$jabatan=$this->input->post('jabatan');
		$email=$this->input->post('email');
		$customer=$this->input->post('customer');
		$id=$this->input->post('id');
		
		$data=[
				'pic_name'=>$username,
				'email'=>$email,
				'jabatan'=>$jabatan,
			     'customer'=>$customer
			];
	
			$where=array(
			'id'=>$id
			);

			
			$where1=array(
			'id_po'=>$id
			);
			$data1=array('pic_name'=>$username,
				'pic_email'=>$email,



		);


		
			$this->db->where($where);
			$this->db->update('pic_po',$data);
			

			$this->db->where($where1);
			$this->db->update('quotations',$data1);

			$this->db->where($where1);
			$this->db->update('quotation_other',$data1);

		
	}

			 function aksi_update_data_pic_event(){
		$username=$this->input->post('username');
		$jabatan=$this->input->post('jabatan');
		$email=$this->input->post('email');
		$customer=$this->input->post('customer');
		$id=$this->input->post('id');
		
		$data=[
				'pic_name'=>$username,
				'email'=>$email,
				'jabatan'=>$jabatan,
			     'customer'=>$customer
			];
	
			$where=array(
			'id_event'=>$id
			);
			$where1=array(
			'id_pic_event'=>$id
			);
			$data1=array('pic_event'=>$username,
				'email_event'=>$email

		);


			$this->db->where($where);
			$this->db->update('pic_event',$data);

			$this->db->where($where1);
			$this->db->update('quotations',$data1);

			$this->db->where($where);
			$this->db->update('quotation_other',$data1);
			
		
	}


	public function AmbilDataPIC(){
		$pic_name=$this->input->post("pic_name");
		$where=array('pic_name'=>$pic_name);
		$dataa=$this->model_pic->AmbilId('pic_po',$where)->result();
		echo json_encode($dataa);

	}

	// 	public function TampilDatapicpo(){
	// 	$this->db->select('*');
	// 	$this->db->from('pic_po');
	// 	$data=$this->db->get()->result();
	// 	echo json_encode($data);


	// }
	// 	public function TampilDatapicevent(){
	// 	$this->db->select('*');
	// 	$this->db->from('pic_event');
	// 	$data=$this->db->get()->result();
	// 	echo json_encode($data);


	// }

		public function TampilDatapicpo(){
		   $this->load->model("model_pic");  
           $fetch_data = $this->model_pic->make_datatables_po();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  

           	   
           	   if(in_array('updatePicPO', $this->permission)){
                	$edit='<center><font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" title="Edit" onclick="AmbilData('.$row->id.')" data-toggle="modal" data-target="#update"><i class="fa fa-edit"></i> </a>';

                }else{
                	$edit='';
                }	
                if(in_array('deletePicPO', $this->permission)){
                	$this->db->select("*");
                	$this->db->from('quotations');
                	$this->db->where('id_po',$row->id);
                	$data1=$this->db->get()->row_array();

                	$this->db->select("*");
                	$this->db->from('quotation_other');
                	$this->db->where('id_po',$row->id);
                	$data2=$this->db->get()->row_array();
                	if (($data1 !="") || ($data2 !="")){
                		$delete='<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" onclick="alert()" title="Delete"><i class="fa fa-trash"></i><font size="2px"></a> </font></center>';
                	}else{
                		$delete='<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" title="Delete" onclick="swetalert('.$row->id.')"><i class="fa fa-trash"></i><font size="2px"></a></font></center>';

                	}



                	

                }else{
                	$delete='</center>';
                	
                } 
                $sub_array = array();  
                $sub_array[] = $row->pic_name;
                $sub_array[] = $row->email;  
                $sub_array[] = $row->jabatan; 
                $sub_array[] = $row->customer;
                 $sub_array[] = '<center>'.$edit.' '.$delete.'</center>';





                $data[] = $sub_array;  

           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->model_pic->get_all_data_po(),  
                "recordsFiltered"     =>     $this->model_pic->get_filtered_data_po(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  


      }  


public function TampilDatapicevent(){
		   $this->load->model("model_pic");  
           $fetch_data = $this->model_pic->make_datatables_event();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
           	   if(in_array('updatePicPO', $this->permission)){
                	$edit='<font color="#FFFFFF" size="2px"><a title="Edit" class="btn btn-sm bg-gradient-secondary" onclick="AmbilData('.$row->id_event.')" data-toggle="modal" data-target="#update"><i class="fa fa-edit"></i></a></font>';

                }else{
                	$edit='';
                }	
                if(in_array('deletePicPO', $this->permission)){

                	$this->db->select("*");
                	$this->db->from('quotations');
                	$this->db->where('id_pic_event',$row->id_event);
                	$data1=$this->db->get()->row_array();

                	$this->db->select("*");
                	$this->db->from('quotation_other');
                	$this->db->where('id_event',$row->id_event);
                	$data2=$this->db->get()->row_array();
                	if (($data1 !="") || ($data2 !="")){
                		$delete='<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" onclick="alert()" title="Delete"><i class="fa fa-trash"></i><font size="2px"></a> </font></center>';
                	}else{
                	$delete='<font color="#FFFFFF" size="2px"><a title="Delete" class="btn btn-sm bg-gradient-secondary" onclick="swetalert('.$row->id_event.')"><i class="fa fa-trash"></i><font size="2px"></font></a></font></center>';
                }

                }else{
                	$delete='';
                	
                } 
                $sub_array = array();  
                $sub_array[] = $row->pic_name;
                $sub_array[] = $row->email;  
                $sub_array[] = $row->jabatan; 
                $sub_array[] = $row->customer;
                 $sub_array[] = '<center>'.$edit.' '.$delete.'</center>';





                $data[] = $sub_array;  

           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->model_pic->get_all_data_event(),  
                "recordsFiltered"     =>     $this->model_pic->get_filtered_data_event(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  


      }


}
