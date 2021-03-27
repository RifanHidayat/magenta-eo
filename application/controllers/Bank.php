<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {
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

	public function add_bank(){
	  	 $id=$this->session->userdata('id');
	     $group_data = $this->model_groups->getGroupData($id);
		 $this->data['group_data'] = $group_data;
	  	 $this->form_validation->set_rules('Total','Deposi','required|trim');
	  	  $this->form_validation->set_rules('hasil','Deposit','required|trim');
		 $this->form_validation->set_message('required',' *{field}  belum diisi,silahkan diisi! ');

	 	if ($this->form_validation->run()==false){
			$this->load->view('tamplate/header',$this->data);
			$this->load->view('tamplate/sidebar',$this->data);
			$this->load->view('bank/add_bank',$this->data);
			$this->load->view('tamplate/footer',$this->data);
		}else{
			$this->aksi_add_bank_item();

		}
	
	}

	 public function aksi_add_bank_item(){


	$deposit_number = $this->input->post('deposit_number');
	$totalcashin = $this->input->post('hasil');
	$availability = $this->input->post('id');

	if ($totalcashin!=""){
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
	'total_cashin'=>$totalcashin,
	'availability'=>$availability			
	];
	$this->db->insert('bank',$data);
   

    $arr['success'] = true;
    $arr['notif']  = '<div class="alert alert-success">
      <i class="fa fa-check"></i> Data Berhasil Disimpan
    </div>';

    return $this->output->set_output(json_encode($arr));

 }else{
  $arr['success'] = false;
    $arr['notif']  = '<div class="alert alert-success">
      <i class="fa fa-check"></i> gagal menyimpan data
    </div>';
  			$this->load->view('tamplate/header',$this->data);
			$this->load->view('tamplate/sidebar',$this->data);
			$this->load->view('bank/add_bank',$this->data);
			$this->load->view('tamplate/footer',$this->data);



 }
	 
 }
public function manage_bank(){
	   	  $id=$this->session->userdata('id');
	      $group_data = $this->model_groups->getGroupData($id);
		  $this->data['group_data'] = $group_data;
	   	  $this->db->select('*');
      	  $this->db->from('bank');
      	  $this->db->join('bank_item','bank.availability = bank_item.bank_id');      
      	  $this->data['bank'] = $this->db->get()->result();	   
	 	  $this->load->view('tamplate/header',$this->data);
		  $this->load->view('tamplate/sidebar',$this->data);
		  $this->load->view('bank/manage_bank',$this->data);
		  $this->load->view('tamplate/footer',$this->data);

	 }

public function edit_bank($id){


	 
      	$this->db->select('*');
     	$this->db->from('bank');
     	$this->db->where('availability',$id);
     	$row=$this->db->get()->row_array();
	

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
		

			$this->load->view('tamplate/header',$this->data);
			$this->load->view('tamplate/sidebar',$this->data);
			$this->load->view('bank/edit',$this->data);
			$this->load->view('tamplate/footer',$this->data);
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
     $data = [
          'total_cashin'=>$row
        ];

       	$where=array('deposit_number'=>$deposit_number);
        $this->db->where($where);
		$update=$this->db->update('bank',$data);
	


       $arr['success'] = true;
    $arr['notif']  = '<div class="alert alert-success">
      <i class="fa fa-check"></i> Data Berhasil diupdate
    </div>';

    return $this->output->set_output(json_encode($arr));
	 }



	 public function AmbilIDBank(){
	 	$this->db->select_max('id');
     	$this->db->from('bank');
     	$data=$this->db->get()->row_array();
	  $id = $data['id'];

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

	function TampilData(){
		$where_bank_item=array('bank_id'=>$id);
	  	$data['bank_item']=$this->db->get_where('bank_item',$where_bank_item)->result();
		
		echo json_encode($data);

	}
	
}
