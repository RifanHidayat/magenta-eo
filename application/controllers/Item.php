<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {
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


	//function attribute
	  public function add_item(){
	  	 	 if(in_array('createItems', $user_permission)) {
      redirect('dashboard', 'refresh');
    }

	  
	  	$this->form_validation->set_rules('name','Nama attribute','required|trim');
		$this->form_validation->set_rules('status','Status','required|trim');
		$this->form_validation->set_message('required',' *{field} masih kosong silakan diisi');

	 	
	 	if ($this->form_validation->run()==false){
	 	$id=$this->session->userdata('id');
	     $group_data = $this->model_groups->getGroupData($id);
		$this->data['group_data'] = $group_data;
		$this->load->view('tamplate/header',$this->data);
		$this->load->view('tamplate/sidebar',$this->data);
		$this->load->view('attribute/add_item',$this->data);
		$this->load->view('tamplate/footer',$this->data);
		}else{
			$this->aksi_add_attribute();

		}
	}

	 public function aksi_add_attribute(){

			$data=[
				'name'=>$this->input->post('name'),
				'active'=>$this->input->post('status'),
				'metode'=>$this->input->post('metode')
				
			];

			$this->db->insert('attributes',$data);
			$this->session->set_flashdata('flash','Ditambahkan');
			redirect('Item/manage_item', 'refresh');
	 }
	   public function manage_item(){
	  
     		if((!in_array('createItems', $this->permission)) AND (!in_array('updateItems', $this->permission)) AND (!in_array('deleteItems', $this->permission))  AND (!in_array('viewItems', $this->permission)) ) {
			redirect('dashboard', 'refresh');
		}

	   $id=$this->session->userdata('id');
	    $group_data = $this->model_groups->getGroupData($id);
		$this->data['group_data'] = $group_data;
	   	$this->data['controller'] = $this; 
	   	$this->data['attribute']=$this->db->get('attributes')->result();
	 	$this->load->view('tamplate/header',$this->data);
        $this->load->view('tamplate/sidebar',$this->data);
        $this->load->view('attribute/manage_attribute',$this->data);
        $this->load->view('tamplate/footer',$this->data);



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
			$metode=$this->input->post('metode');
		$id=$this->input->post('id');
	
		$data=array(
				'name'=>$name,
				'active'=>$status,
				'metode'=>$metode
			);
		$data1=array(
			
				'metode'=>$metode
			);

	
			$where=array(
			'id'=>$id
			);
			$where1=array(
			'name_item'=>$name
			);
			$where2=array(
			'name'=>$name
			);

			$this->db->where($where);
			$this->db->update('attributes',$data);

			$this->db->where($where1);
			$this->db->update('quotation_item',$data1);

			$this->db->where($where2);
			$this->db->update('quotation_sub_item',$data1);
		
	}

	 public function aksi_add_data_item(){
			$name=$this->input->post('name');
		$status=$this->input->post('status');
		$metode=$this->input->post('metode');
		
		$data=array(
				'name'=>$name,
				'active'=>$status,
				'metode'=>$metode
			);

			$this->db->insert('attributes',$data);
			$this->session->set_flashdata('flash','Ditambahkan');
			redirect('Item/manage_item', 'refresh');
		
	}
		public function hapus_attribute($id){
		$id=$this->input->post("id");		
		$this->db->where('id',$id);
		$this->db->delete('attributes');

		$this->db->where('attribute_parent_id',$id);
		$this->db->delete('attribute_values');
		

	}

		public function jml_value($id){
		$id=$this->input->post("id");		
  
           $this->db->select('COUNT(*) as jml');
     	   $this->db->from('attribute_values');
     	   $this->db->where('attribute_parent_id',$id);
     	   $row=$this->db->get()->row_array();


		return $row['jml'];
	}
	// 	public function TampilDataitem(){
	// 	$this->db->select('*');
	// 	$this->db->from('attributes');
	// 	 $this->db->order_by('name', 'ASC');
	// 	$data=$this->db->get()->result();
	// 	echo json_encode($data);


	// }

	public function TampilDataitem(){
		   $this->load->model("model_item");  
           $fetch_data = $this->model_item->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
           	   if(in_array('updateItems', $this->permission)){
                	$edit='<font color="#FFFFFF" size="2px"><a   title="Edit" class="btn btn-sm bg-gradient-secondary" onclick="AmbilData('.$row->id.')" data-toggle="modal" data-target="#update"><i class="fa fa-edit"></i></a>';

                }else{
                	$edit='';
                }	
                if(in_array('deleteItems', $this->permission)){
                	$delete='<font color="#FFFFFF" size="2px"><a   title="Delete" class="btn btn-sm bg-gradient-secondary" onclick="swetalert('.$row->id.')"><i class="fa fa-trash"></i><font size="2px"></a>';

                }else{
                	$delete='';
                	
                } 
                if(in_array('updateItemvalue', $this->permission) || in_array('viewItemvalue', $this->permission) || in_array('updateItemvalue', $this->permission) || in_array('deleteItemvalue', $this->permission)){
                	
                	$addValue='<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" title="Add Value" href="'.base_url('Values/manage_item_value/'.$row->id).'"><i class="fa fa-plus" hidden></i><font size="2px"><i class="fa fa-gear" > </i>  Manage Value</a></center>';

                }else{
                	$addValue='';

                }
        		$this->db->select('COUNT(*) as jml');
     	   		$this->db->from('attribute_values');
     	   		$this->db->where('attribute_parent_id',$row->id);
     	   		$row1=$this->db->get()->row_array();


		

      

                $sub_array = array();  
                $sub_array[] = $row->name;
                $sub_array[] ='<center>'.$row1['jml'].'</center>';  
                $sub_array[] = $row->active=="Active"?'<center><span class="label label-success">Active</span></center>':'<center><span class="label label-danger">In Active</span></center>'; 
                $sub_array[] = $row->metode=="No-Fee Cost"?"No-Fee Cost":"Commissionable Cost";
          
                $sub_array[] = '<center>'.$edit.' '.$addValue.'</center>';
                $data[] = $sub_array;  

           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->model_item->get_all_data(),  
                "recordsFiltered"     =>     $this->model_item->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  


      }  



}
