<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
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


	//function Customer
	  public function add_customer(){
	  	if((!in_array('createCustomer', $this->permission))) {
			redirect('dashboard', 'refresh');
		}

	 	$this->data['pic']=$this->db->get('pic_po')->result();
	 	$id=$this->session->userdata('id');

	     
	  	$group_data = $this->model_groups->getGroupData($id);
		$this->data['group_data'] = $group_data;
	

	 
	  	$this->form_validation->set_rules('name','Customer Name','required|trim');

	  	$this->form_validation->set_rules('npwp','NPWP Name','required|trim');
	  	$this->form_validation->set_rules('address','address ','required|trim');


		$this->form_validation->set_message('required',' *{field} masih kosong silakan diisi');
		$this->form_validation->set_message('is_unique',' *{field} sudah digunakan silakan ganti');
		$this->form_validation->set_message('matches','* {field} tidak cocok');
		$this->form_validation->set_message('integer','* {field} harus diisi dengan angka');

	 	
	 	if ($this->form_validation->run()==false){
			$this->load->view('tamplate/header',$this->data);
          	$this->load->view('tamplate/sidebar',$this->data);
          	$this->load->view('customer/add_customer',$this->data);
           	$this->load->view('tamplate/footer',$this->data);
		}else{
			$this->aksi_add_customer();

		}

	 }

	 public function payment($id){
		 $this->data['id']=$id;
		$this->load->view('tamplate/header',$this->data);
		$this->load->view('tamplate/sidebar',$this->data);
		$this->load->view('customer/payment',$this->data);
		 $this->load->view('tamplate/footer',$this->data);




	 }

	  public function edit_customer($idd){
	  	if((!in_array('updateCustomer', $this->permission))) {
			redirect('dashboard', 'refresh');
		}
		$this->db->select('*');
	 		$this->db->from('gudang');
	 		$this->db->where('id_customer',$idd);
	 		$itemGudang=$this->db->get()->result();
	 		
	 		$this->data["itemGudang"]=$itemGudang;

	 	$this->data['pic']=$this->db->get('pic_po')->result();
	 	$id=$this->session->userdata('id');

	     
	  	$group_data = $this->model_groups->getGroupData($id);
		$this->data['group_data'] = $group_data;
	

	 
	  	$this->form_validation->set_rules('name','Customer Name','required|trim');

	  	$this->form_validation->set_rules('npwp','NPWP Name','required|trim');
	  	$this->form_validation->set_rules('address','address ','required|trim');


		$this->form_validation->set_message('required',' *{field} masih kosong silakan diisi');
		$this->form_validation->set_message('is_unique',' *{field} sudah digunakan silakan ganti');
		$this->form_validation->set_message('matches','* {field} tidak cocok');
	
	 	
	 	if ($this->form_validation->run()==false){
	 		$this->db->select('*');
	 		$this->db->from('customer');
	 		$this->db->where('id',$idd);
	 		$row=$this->db->get()->row_array();

	 		

	 		$this->data['name']=$row['name'];
	 		$this->data['alamat']=$row['address'];
	 		$this->data['phone']=$row['phone'];
	 		$this->data['npwp']=$row['npwp'];
	 		$this->data['pph']=$row['karakteristik_pph'];
	 		$this->data['ppn']=$row['karakteristik_ppn'];

	 		$this->data['id']=$row['id'];

			$this->load->view('tamplate/header',$this->data);
          	$this->load->view('tamplate/sidebar',$this->data);
          	$this->load->view('customer/edit',$this->data);
           	$this->load->view('tamplate/footer',$this->data);
		}else{
			$this->aksi_update_customer();

		}

	 }
	 public function aksi_add_customer(){

			$data=[
				'name'=>$this->input->post('name'),
				'address'=>$this->input->post('address'),
				'phone'=>$this->input->post('phone'),
				'npwp'=>$this->input->post('npwp'),
				'karakteristik_pph'=>$this->input->post('karakteristikPPh'),
				'karakteristik_ppn'=>$this->input->post('karakteristikPPN'),
		
				
			];

			$this->db->insert('customer',$data);
		

			$this->db->select('id');
			$this->db->from('customer');
			$this->db->where("name",$this->input->post("name"));
			$data=$this->db->get()->row_array();
			$dataID=$data['id'];



	if ($dataID!=""){
  	$i = 0; // untuk loopingnya
    $a = $this->input->post('alamatGudang');
    $b = $this->input->post('picGudang');
    $c = $this->input->post('phoneGudang');
 
    if ($a[0] !== null) 
    {
      foreach ($a as $row) 
      {
        $data = [
          'alamat'=>$row,
          'pic'=>$b[$i],
          'phone'=>$c[$i],
          'id_customer'=>$dataID,
        ];
       // $t=+(int) $c[$i];

        $this->db->insert('gudang', $data);
        
          
          $i++;

        
      }
    }
    	$this->session->set_flashdata('success', 'Successfully created');

 	redirect('Customer/manage_customer', 'refresh');



 }else{
  $arr['success'] = false;
    $arr['notif']  = '<div class="alert alert-success">
      <i class="fa fa-check"></i> gagal menyimpan data
    </div>';
        $this->load->view('tamplate/header',$this->data);
      $this->load->view('tamplate/sidebar',$this->data);
      $this->load->view('bank/add_quatations',$this->data);
      $this->load->view('tamplate/footer',$this->data);




 }
	
	        		
		

	 }

	 	 public function aksi_update_customer(){
	 	 	$id=$this->input->post("idCustomer");
	 	 	$name=$this->input->post('name');

			$data=[
				'name'=>$this->input->post('name'),
				'address'=>$this->input->post('address'),
				'phone'=>$this->input->post('phone'),
				'npwp'=>$this->input->post('npwp'),
				'karakteristik_pph'=>$this->input->post('karakteristikPPh'),
				'karakteristik_ppn'=>$this->input->post('karakteristikPPN'),
		
				
			];

		
		
			$where=array(
					'id'=>$id
					);

			$where_pic=array(
			'id_customer'=>$id
			);
			$data1=array(
				'customer'=>$name
			);

			$dataquotation=array('customer'=>$name,
				'customer_event'=>$name

		);

			
			$this->db->where($where);
			$this->db->update('customer',$data);

			$this->db->where($where_pic);
			$this->db->update('pic_po',$data1);

			$this->db->where($where_pic);
			$this->db->update('pic_event',$data1);

			$this->db->where($where_pic);
			$this->db->update('pic_po',$data1);


			$this->db->where($where_pic);
			$this->db->update('quotations',$dataquotation);

			$this->db->where($where_pic);
			$this->db->update('quotation_other',$dataquotation);




	if ($id!=""){
		
  	$i = 0; // untuk loopingnya
    $a = $this->input->post('alamatGudang');
    $b = $this->input->post('picGudang');
    $c = $this->input->post('phoneGudang');
    $d = $this->input->post('idGudang');
 
    if ($a[0] !== null) 
    {
    	$this->db->where('id_customer',$id);
		$this->db->delete('gudang');
      foreach ($a as $row) 
      {

        $data = [
          'alamat'=>$row,
          'pic'=>$b[$i],
          'phone'=>$c[$i],
          'id_customer'=>$id
          
        ];
        $this->db->insert('gudang', $data);
       //  $this->db->insert('gudang', $data);
       // // $t=+(int) $c[$i];
       //  if ($d[$i]==''){
       //  $this->db->insert('gudang', $data);
       //  }else{
       // 	$where=array('idGudang'=>$d[$i]);
       // 	$this->db->update('gudang',$data);

       //  }
     
       $i++;
      }
    }
    $this->session->set_flashdata('success', 'Successfully created');
 	redirect('Customer/manage_customer', 'refresh');
 }
	
	        		
		

	 }
	   public function manage_customer(){
	   	if((!in_array('updateCustomer', $this->permission))AND (!in_array('deleteCustomer', $this->permission)) AND (!in_array('viewCustomer', $this->permission))  ) {
			redirect('dashboard', 'refresh');
		}
	   		$id=$this->session->userdata('id');
	        $group_data = $this->model_groups->getGroupData($id);
		    $this->data['group_data'] = $group_data;



	   	 	$this->data['customer']=$this->db->get('customer')->result();
	   	 	$this->data['pic']=$this->db->get('pic_po')->result();

	 		$this->load->view('tamplate/header',$this->data);
          	$this->load->view('tamplate/sidebar',$this->data);
          	$this->load->view('customer/manage_customer',$this->data);
           	$this->load->view('tamplate/footer',$this->data);

	 }
	 	public function hapus_customer($id){
		$id=$this->input->post("id");

		$where_pic=array(
			'id_customer'=>$id
			);
			$data1=array(
				'customer'=>""
			);

			
			

			$dataquotation=array('customer'=>"",
				'customer_event'=>""

		);
			
		$this->db->where('id',$id);
		$this->db->delete('customer');



			$this->db->where($where_pic);
			$this->db->update('quotations',$dataquotation);

			$this->db->where($where_pic);
			$this->db->update('quotation_other',$dataquotation);



			$this->db->where($where_pic);
			$this->db->update('pic_po',$data1);

			$this->db->where($where_pic);
			$this->db->update('pic_event',$data1);
		

	}
		public function ambilIdCustomer(){
		$id=$this->input->post("id");
		$where=array('id'=>$id);
		$dataa=$this->model_users->AmbilId('customer',$where)->result();
		echo json_encode($dataa);
	}
		 public function aksi_update_data_customer(){
		$name=$this->input->post('name');
		

		$phone=$this->input->post('phone');
		$address=$this->input->post('address');
		$npwp=$this->input->post('npwp');
		$id=$this->input->post('id');
		$karakteristikPPN=$this->input->post('karakteristikPPN');
		$karakteristikPPh=$this->input->post('karakteristikPPh');
	

		$data=array(
				'name'=>$name,
				'address'=>$address,
				'phone'=>$phone,			
				'npwp'=>$npwp,
				'id'=>$id,
				'karakteristik_ppn'=>$karakteristikPPN,
				'karakteristik_pph'=>$karakteristikPPh
			);

	
			$where=array(
			'id'=>$id
			);

			$where_pic=array(
			'id_customer'=>$id
			);
			$data1=array(
				'customer'=>$name
			);

			$dataquotation=array('customer'=>$name,
				'customer_event'=>$name

		);

			
			

			$this->db->where($where);
			$this->db->update('customer',$data);

			$this->db->where($where_pic);
			$this->db->update('pic_po',$data1);

			$this->db->where($where_pic);
			$this->db->update('pic_event',$data1);

			$this->db->where($where_pic);
			$this->db->update('pic_po',$data1);


			$this->db->where($where_pic);
			$this->db->update('quotations',$dataquotation);

			$this->db->where($where_pic);
			$this->db->update('quotation_other',$dataquotation);

		
	
	}
	//get PIC po untuk quotation Other
		public function AmbilDataPICEventOther(){
		$pic_name=$this->input->post("pic_name");
		$where=array('pic_name'=>$pic_name);
		$dataa=$this->model_pic->AmbilId('pic_event',$where)->result();
		echo json_encode($dataa);

	}
	//get PIC po untuk quotation Other
		public function AmbilDataPIC(){
		$pic_name=$this->input->post("pic_name");
		$where=array('pic_name'=>$pic_name);
		$dataa=$this->model_pic->AmbilId('pic_po',$where)->result();
		echo json_encode($dataa);

	}

	//get PIC po untuk quotation event
	public function AmbilDataPICQuotation(){
	$id=$this->input->post("pic_name");
		
		$this->db->select('pic_po.id,customer,email,jabatan,pic_name,id_customer,customer.karakteristik_pph ,karakteristik_ppn');
		$this->db->from('pic_po');
	 	$this->db->join('customer','customer.id = pic_po.id_customer');  
		$this->db->where('pic_po.id',$id);
		$dataa=$this->db->get()->result();
		echo json_encode($dataa);

		

	}
	//get PIC eve untuk quotation event
	public function AmbilDataPICQuotationEvent(){
		 $pic_name=$this->input->post("pic_name");
		

		$this->db->select('pic_event.id_event,customer,email,jabatan,pic_name,id_customer,customer.karakteristik_pph ,karakteristik_ppn');
		$this->db->from('pic_event');
	 $this->db->join('customer','customer.id = pic_event.id_customer'); 

     
		$this->db->where('pic_event.id_event',$pic_name);
		$dataa=$this->db->get()->result();
		
		echo json_encode($dataa);

	}

	// 	public function TampilDatacustomer(){
	// 	$this->db->select('*');
	// 	$this->db->from('customer');
	// 	$data=$this->db->get()->result();
	// 	echo json_encode($data);


	// }

	public function TampilDatacustomer(){
		   $this->load->model("model_customer");  
           $fetch_data = $this->model_customer->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           { 
           	    if($row->karakteristik_ppn=="ppn"){
                	$ppn="With PPN";
                
             	 }else {
             		 $ppn="No  PPN";
             	 }  
                
                  if($row->karakteristik_pph=="pph"){
                	 $pph="With PPh";
                
                 }else if ($row->karakteristik_pph=="pph21") {
             	   $pph="With  PPh21";
                }else{
                	  $pph="No  PPh";
                }	
                if(in_array('updateCustomer', $this->permission)){
                	$edit='<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary"  href="'.base_url('Customer/edit_customer/'.$row->id).'"  title="Edit" ><i class="fa fa-edit"></i></a>';

                }else{
                	$edit='';
                }	
                if(in_array('deleteCustomer', $this->permission)){
                	$this->db->select("*");
                	$this->db->from('quotations');
                	$this->db->where('id_customer',$row->id);
                	$data1=$this->db->get()->row_array();

                	$this->db->select("*");
                	$this->db->from('quotation_other');
                	$this->db->where('id_customer',$row->id);
                	$data2=$this->db->get()->row_array();
                	if (($data1 !="") || ($data2 !="")){
                		$delete='<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" onclick="alert()" title="Delete"><i class="fa fa-trash"></i><font size="2px"></a> </font></center>';

                	}else{
                		$delete='<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" onclick="swetalert('.$row->id.')" title="Delete"><i class="fa fa-trash"></i><font size="2px"></a> </font></center>';

                	}

                
                }else{
                	$delete='';
                	
                } 
				$payment='<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary"  href="'.base_url('Customer/payment/'.$row->id).'"  title="payment" ><i class="fa fa-dollar-sign"></i></a>';



                $sub_array = array();  
                $sub_array[] = $row->name;
                $sub_array[] = $row->address;  
                $sub_array[] = $row->phone; 
                $sub_array[] = $row->npwp;
           		$sub_array[] = $ppn;
                $sub_array[] = $pph;
                $sub_array[] = '<center>'.$edit." ".$delete." ".$payment.'</center>';

                            
                $data[] = $sub_array;  

           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->model_customer->get_all_data(),  
                "recordsFiltered"     =>     $this->model_customer->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  


      }  




}
