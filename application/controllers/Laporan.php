<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
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
public function index(){
	
		// 	if((!in_array('createLaporan', $this->permission)) AND (!in_array('viewLaporan', $this->permission)) ) {
		// 	redirect('dashboard', 'refresh');
		// }


			$this->load->view('tamplate/header',$this->data);
          	$this->load->view('tamplate/sidebar',$this->data);
          	$this->load->view('laporan/laporan',$this->data);
           	$this->load->view('tamplate/footer',$this->data);

}
public function laporan_perbulan(){

		$this->load->view('tamplate/header',$this->data);
          	$this->load->view('tamplate/sidebar',$this->data);
          	$this->load->view('laporan/laporan_perbulan',$this->data);
           	$this->load->view('tamplate/footer',$this->data);


}
public function laporan_pertanggal(){
			
			$this->data['quotation']=$this->db->get('quotations')->result();
			$this->data['quotation_other']=$this->db->get('quotation_other')->result();
			$this->data['bast']=$this->db->get('bast')->result();
			$this->data['faktur']=$this->db->get('faktur')->result();

			$this->load->view('tamplate/header',$this->data);
          	$this->load->view('tamplate/sidebar',$this->data);
          	$this->load->view('laporan/laporan_pertanggal',$this->data);
           	$this->load->view('tamplate/footer',$this->data);
}

public function laporan_pertahun(){
	
		$this->load->view('tamplate/header',$this->data);
          	$this->load->view('tamplate/sidebar',$this->data);
          	$this->load->view('laporan/laporan_pertahun',$this->data);
           	$this->load->view('tamplate/footer',$this->data);


}
public function aksi_laporan_tanggal(){
	$jenis_laporan=$this->input->post('jenis_laporan');
	$tanggal_mulai=$this->input->post('mulai');
	$tanggal_sampai=$this->input->post('sampai');
	$laporan=$this->input->post('laporan');
	$status=$this->input->post('status');
	
	if ($laporan=="quotations"){
		if ($jenis_laporan=="total"){
			if ($status=="All"){
				$this->db->select('*');
			$this->db->from('quotations');
			$this->db->where('date_quotation BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$fetch_data=$this->db->get()->result();
	
           $result['data']=$fetch_data;  
           echo json_encode($result);  

			}else{
				$this->db->select('*');
			$this->db->from('quotations');
			$this->db->where('date_quotation BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$this->db->where('status',$status);
			$fetch_data=$this->db->get()->result();
			$result['data']=$fetch_data;  
           echo json_encode($result);  


			}
			

		}else{
			if ($status=="All"){
			$this->db->select('*');
			$this->db->from('quotations');
			$this->db->join('quotation_item','quotation_item.quotation_number=quotations.quotation_number');
			$this->db->where('date_quotation BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');


			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 


			}
		   else{
		   	$this->db->select('*');
			$this->db->from('quotations');
			$this->db->join('quotation_item','quotation_item.quotation_number=quotations.quotation_number');
			$this->db->where('date_quotation BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$this->db->where('status',$status);
			

			// $data=$this->db->get()->result();
				$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

		  }
				
	
	}

	}else if ($laporan=="quotation_other"){
			if ($jenis_laporan=="total"){
				if ($status=="All"){
					$this->db->select('*');
				   $this->db->from('quotation_other');
					$this->db->where('date_quotation BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
						$fetch_data=$this->db->get()->result();
			
							$result['data']=$fetch_data;  
           					echo json_encode($result); 
		

				}else{
						$this->db->select('*');
				   $this->db->from('quotation_other');
					$this->db->where('date_quotation BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
					$this->db->where('status',$status);
						$fetch_data=$this->db->get()->result();
			
							$result['data']=$fetch_data;  
           						echo json_encode($result); 
				}
			

		}else{
			if ($status=="All"){
					$this->db->select('*');
			$this->db->from('quotation_other');
			$this->db->join('quotation_other_item','quotation_other_item.quotation_number = quotation_other.quotation_number');
			$this->db->where('date_quotation BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

			}else{
					$this->db->select('*');
			$this->db->from('quotation_other');
			$this->db->join('quotation_other_item','quotation_other_item.quotation_number = quotation_other.quotation_number');
			$this->db->where('date_quotation BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$this->db->where('status',$status);
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 


			}
		

	

			
		}

	}else if ($laporan=="faktur"){
			if ($jenis_laporan=="total"){
				if ($status=="All"){

					$this->db->select('*');
					$this->db->from('faktur');
					$this->db->where('date_faktur BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

				}else{
						$this->db->select('*');
			$this->db->from('faktur');


			$this->db->where('date_faktur BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$this->db->where('status',$status);

			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 


				}
			
		

		}else{
			if ($status=="All"){
			
			$this->db->select('*');
			$this->db->from('faktur');
			$this->db->join('faktur_item','faktur_item.faktur_number = faktur.faktur_number');
			$this->db->where('date_faktur BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
		$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

			}else{
					$this->db->select('*');
			$this->db->from('faktur');
			$this->db->join('faktur_item','faktur_item.faktur_number = faktur.faktur_number');
			$this->db->where('date_faktur BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$this->db->where('status',$status);
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 


			}
		
	

			
		}

	}else if ($laporan=="delivery"){
			if ($jenis_laporan=="total"){
				if ($status=="All"){
					$this->db->select('*');
			$this->db->from('delivery');
			$this->db->where('date_pengiriman BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

				}else{
					$this->db->select('*');
			$this->db->from('delivery');
			$this->db->where('date_pengiriman BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$this->db->where('status',$status);
		$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 


				}
				
	

		}else{
			if ($status=="All"){
				$this->db->select('*');
			$this->db->from('delivery');
			$this->db->join('delivery_item','delivery.Delivery_number = delivery_item.delivery_number');
			$this->db->where('date_pengiriman BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

			}else{
				$this->db->select('*');
			$this->db->from('delivery');
			$this->db->join('delivery_item','delivery.Delivery_number = delivery_item.delivery_number');
			$this->db->where('date_pengiriman BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$this->db->where('status',$status);

			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 


			}
		}


	}else if ($laporan=="bast"){
			if ($jenis_laporan=="total"){
					if ($status=="All"){
					$this->db->select('*');
					$this->db->from('bast');
					$this->db->where('date_bast BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
						$fetch_data=$this->db->get()->result();
			
						$result['data']=$fetch_data;  
           				echo json_encode($result);
  

			}else{
						$this->db->select('*');
						$this->db->from('bast');
						$this->db->where('date_bast BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
						$this->db->where('status',$status); 
						$fetch_data=$this->db->get()->result();
			     
						$result['data']=$fetch_data;  
           				echo json_encode($result);
      
			}
			
	

		}else{
			if ($status=="All"){
					$this->db->select('*');
					$this->db->from('bast');
					$this->db->where('date_bast BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
					$fetch_data=$this->db->get()->result();
			
					$result['data']=$fetch_data;  
           			echo json_encode($result);
  

			}else{
					$this->db->select('*');
					$this->db->from('bast');
					$this->db->where('date_bast BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
					  $this->db->where('status',$status); 
					$fetch_data=$this->db->get()->result();
			   
					$result['data']=$fetch_data;  
           			echo json_encode($result);
      
			}
		}


	}
	

}

public function aksi_laporan_bulan(){
		$jenis_laporan=$this->input->post('jenis_laporan');
	$tanggal_mulai1=$this->input->post('mulai');
	$tanggal_sampai1=$this->input->post('sampai');
	$laporan=$this->input->post('laporan');
	$status=$this->input->post('status');
	$bulanm=date('m', strtotime($tanggal_mulai1));
	$bulans=date('m', strtotime($tanggal_sampai1));
	$tahunm=date('y', strtotime($tanggal_mulai1));
	$tahuns=date('y', strtotime($tanggal_sampai1));

	$tanggal_mulai= date("Y-m-d", strtotime('-1 second', strtotime('+1 month',strtotime($bulanm . '/01/' .$tahunm. ' 00:00:00'))));

	$tanggal_sampai= date("Y-m-d", strtotime('-1 second', strtotime('+1 month',strtotime($bulans . '/01/' .$tahuns. ' 00:00:00'))));
	 
	

	if ($laporan=="quotations"){
		if ($jenis_laporan=="total"){
			 if ($status=="All"){
				$this->db->select('*');
			$this->db->from('quotations');
			$this->db->where('date_quotation BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');

		    $fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

			}else{
				$this->db->select('*');
			$this->db->from('quotations');
			$this->db->where('date_quotation BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$this->db->where('status',$status);
			 $fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

			}
			

		}else{
			if ($status=="All"){
			$this->db->select('*');
			$this->db->from('quotations');
			$this->db->join('quotation_item','quotation_item.quotation_number=quotations.quotation_number');
			$this->db->where('date_quotation BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');


			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 


			}
		   else{
		   	$this->db->select('*');
			$this->db->from('quotations');
			$this->db->join('quotation_item','quotation_item.quotation_number=quotations.quotation_number');
			$this->db->where('date_quotation BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$this->db->where('status',$status);
			

		$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

		  }
				
	
	}

	}else if ($laporan=="quotation_other"){
			if ($jenis_laporan=="total"){
				if ($status=="All"){
					$this->db->select('*');
				   $this->db->from('quotation_other');
					$this->db->where('date_quotation BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
						$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 
		

				}else{
						$this->db->select('*');
				   $this->db->from('quotation_other');
					$this->db->where('date_quotation BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
					$this->db->where('status',$status);
						$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 
				}
			

		}else{
			if ($status=="All"){
					$this->db->select('*');
			$this->db->from('quotation_other');
			$this->db->join('quotation_other_item','quotation_other_item.quotation_number = quotation_other.quotation_number');
			$this->db->where('date_quotation BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

			}else{
					$this->db->select('*');
			$this->db->from('quotation_other');
			$this->db->join('quotation_other_item','quotation_other_item.quotation_number = quotation_other.quotation_number');
			$this->db->where('date_quotation BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$this->db->where('status',$status);
		$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 


			}
		

	

			
		}

	}else if ($laporan=="faktur"){
			if ($jenis_laporan=="total"){
				if ($status=="All"){

					$this->db->select('*');
					$this->db->from('faktur');
					$this->db->where('date_faktur BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

				}else{
						$this->db->select('*');
			$this->db->from('faktur');


			$this->db->where('date_faktur BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$this->db->where('status',$status);

		$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 


				}
			
		

		}else{
			if ($status=="All"){
					$this->db->select('*');
			$this->db->from('faktur');
			$this->db->join('faktur_item','faktur_item.faktur_number = faktur.faktur_number');

			$this->db->where('date_faktur BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			//$this->db->where("faktur.quotation_number LIKE '%QO%' ");
		$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

			}else{
					$this->db->select('*');
			$this->db->from('faktur');
			$this->db->join('faktur_item','faktur_item.faktur_number = faktur.faktur_number');
			$this->db->where('date_faktur BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$this->db->where('status',$status);
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 


			}
		
	

			
		}

	}else if ($laporan=="delivery"){
			if ($jenis_laporan=="total"){
				if ($status=="All"){
					$this->db->select('*');
			$this->db->from('delivery');
			$this->db->where('date_pengiriman BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

				}else{
					$this->db->select('*');
			$this->db->from('delivery');
			$this->db->where('date_pengiriman BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$this->db->where('status',$status);
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 


				}
				
	

		}else{
			if ($status=="All"){
				$this->db->select('*');
			$this->db->from('delivery');
			$this->db->join('delivery_item','delivery.Delivery_number = delivery_item.delivery_number');
			$this->db->where('date_pengiriman BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

			}else{
				$this->db->select('*');
			$this->db->from('delivery');
			$this->db->join('delivery_item','delivery.Delivery_number = delivery_item.delivery_number');
			$this->db->where('date_pengiriman BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			
			$this->db->where('status',$status);
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 


			}
		}


	}else if ($laporan=="bast"){
			if ($jenis_laporan=="total"){
				if ($status=="ALL"){
					$this->db->select('*');
			$this->db->from('bast');
			$this->db->where('date_bast BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$fetch_data=$this->db->get()->result();
	
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

				}else{
					$this->db->select('*');
			$this->db->from('bast');
			$this->db->where('date_bast BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$this->db->where('status',$status);
			$fetch_data=$this->db->get()->result();
			
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 
				}

	

		}else{

			if ($status=="ALL"){
					$this->db->select('*');
			$this->db->from('bast');
			$this->db->where('date_bast BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$fetch_data=$this->db->get()->result();
	
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

				}else{
					$this->db->select('*');
			$this->db->from('bast');
			$this->db->where('date_bast BETWEEN "'. date('Y-m-d', strtotime($tanggal_mulai)). '" and "'. date('Y-m-d', strtotime($tanggal_sampai)).'"');
			$this->db->where('status',$status);
			$fetch_data=$this->db->get()->result();
			
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 
				}
			
		}


	}
	
	

}

public function aksi_laporan_tahun(){
	$jenis_laporan=$this->input->post('jenis_laporan');
	$tanggal_mulai=$this->input->post('mulai');
	$tanggal_sampai=$this->input->post('sampai');
	$laporan=$this->input->post('laporan');
	$status=$this->input->post('status');
	
	if ($laporan=="quotations"){
		if ($jenis_laporan=="total"){
			if ($status=="All"){
				$this->db->select('*');
			$this->db->from('quotations');
			$this->db->where('YEAR(date_quotation) BETWEEN "'.$tanggal_mulai. '" and "'.$tanggal_sampai.'"');
			
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

			}else{
				$this->db->select('*');
			$this->db->from('quotations');
			$this->db->where('YEAR(date_quotation) BETWEEN "'.$tanggal_mulai. '" and "'.$tanggal_sampai.'"');
			$this->db->where('status',$status);
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 


			}
			
		
		}else{
			if ($status=="All"){
					$this->db->select('*');
			$this->db->from('quotations');
			$this->db->join('quotation_item','quotation_item.quotation_number=quotations.quotation_number');
			$this->db->where('YEAR(date_quotation) BETWEEN "'.$tanggal_mulai. '" and "'.$tanggal_sampai.'"');
		$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

			}else{
					$this->db->select('*');
			$this->db->from('quotations');
			$this->db->join('quotation_item','quotation_item.quotation_number=quotations.quotation_number');
			$this->db->where('YEAR(date_quotation) BETWEEN "'.$tanggal_mulai. '" and "'.$tanggal_sampai.'"');
		
			$this->db->where('status',$status);
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 


			}
		

		
		}

	}else if ($laporan=="quotation_other"){
			if ($jenis_laporan=="total"){
				if ($status=="All"){
					$this->db->select('*');
			$this->db->from('quotation_other');
			$this->db->where('YEAR(date_quotation) BETWEEN "'.$tanggal_mulai. '" and "'.$tanggal_sampai.'"');
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

				}else{
					$this->db->select('*');
			$this->db->from('quotation_other');
			$this->db->where('YEAR(date_quotation) BETWEEN "'.$tanggal_mulai. '" and "'.$tanggal_sampai.'"');
			$this->db->where('status',$status);
		$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 


				}
			



		}else{
			if ($status=="All"){
						$this->db->select('*');
			$this->db->from('quotation_other');
			$this->db->from('quotation_other_item','quotation_other.quotation_number = quotation_other_item.quotation_other');
			$this->db->where('YEAR(date_quotation) BETWEEN "'.$tanggal_mulai. '" and "'.$tanggal_sampai.'"');
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

			}else{
						$this->db->select('*');
			$this->db->from('quotation_other');
			$this->db->from('quotation_other_item','quotation_other.quotation_number = quotation_other_item.quotation_other');
			$this->db->where('YEAR(date_quotation) BETWEEN "'.$tanggal_mulai. '" and "'.$tanggal_sampai.'"');
			$this->db->where('status',$status);
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 


			}
	

			
		}

	}else if ($laporan=="faktur"){
			if ($jenis_laporan=="total"){
				if ($status=="All"){
								$this->db->select('*');
			$this->db->from('faktur');
			$this->db->where('YEAR(date_faktur) BETWEEN "'.$tanggal_mulai. '" and "'.$tanggal_sampai.'"');
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

				}else{
								$this->db->select('*');
			$this->db->from('faktur');
			$this->db->where('YEAR(date_faktur) BETWEEN "'.$tanggal_mulai. '" and "'.$tanggal_sampai.'"');
			$this->db->where('status',$status);
		$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

				}
	
	

		}else{
			if ($status=='All'){
			$this->db->select('*');
			$this->db->from('faktur');
			$this->db->from('faktur_item','faktur_item.faktur_number = faktur.faktur_number');
			$this->db->where('YEAR(date_faktur) BETWEEN "'.$tanggal_mulai. '" and "'.$tanggal_sampai.'"');
		$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

			}else{
					$this->db->select('*');
			$this->db->from('faktur');
			$this->db->from('faktur_item','faktur_item.faktur_number = faktur.faktur_number');
			$this->db->where('YEAR(date_faktur) BETWEEN "'.$tanggal_mulai. '" and "'.$tanggal_sampai.'"');
			$this->db->where('status',$status);
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 



			}
		


			
		}

	}else if ($laporan=="delivery"){
			if ($jenis_laporan=="total"){
				if ($status=="All"){
						$this->db->select('*');
			$this->db->from('delivery');
			$this->db->where('YEAR(date_pengiriman) BETWEEN "'.$tanggal_mulai. '" and "'.$tanggal_sampai.'"');
		$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

				}else{
						$this->db->select('*');
			$this->db->from('delivery');
			$this->db->where('YEAR(date_pengiriman) BETWEEN "'.$tanggal_mulai. '" and "'.$tanggal_sampai.'"');
		
				$this->db->where('status',$status);
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 


				}
			


		}else{
			if ($status=='All'){
					$this->db->select('*');
			$this->db->from('delivery');
			$this->db->from('delivery_item','delivery.Delivery_number = delivery_item.delivery_number');
			$this->db->where('YEAR(date_pengiriman) BETWEEN "'.$tanggal_mulai. '" and "'.$tanggal_sampai.'"');
		$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 


			}else{
					$this->db->select('*');
			$this->db->from('delivery');
			$this->db->from('delivery_item','delivery.Delivery_number = delivery_item.delivery_number');
			$this->db->where('YEAR(date_pengiriman) BETWEEN "'.$tanggal_mulai. '" and "'.$tanggal_sampai.'"');
			$this->db->where('status',$status);
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 



			}
		

			
		}


	}else if ($laporan=="bast"){
			if ($jenis_laporan=="total"){
				if ($status=="All"){
							$this->db->select('*');
			$this->db->from('bast');
			$this->db->where('YEAR(date_bast) BETWEEN "'.$tanggal_mulai. '" and "'.$tanggal_sampai.'"');
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

				}else{
							$this->db->select('*');
			$this->db->from('bast');
			$this->db->where('YEAR(date_bast) BETWEEN "'.$tanggal_mulai. '" and "'.$tanggal_sampai.'"');
			$this->db->where('status',$status);
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 


				}
	
		

		}else{
			if ($status=="All"){
					$this->db->select('*');
			$this->db->from('bast');
			$this->db->where('YEAR(date_bast) BETWEEN "'.$tanggal_mulai. '" and "'.$tanggal_sampai.'"');
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

			}else{
					$this->db->select('*');
			$this->db->from('bast');
			$this->db->where('YEAR(date_bast) BETWEEN "'.$tanggal_mulai. '" and "'.$tanggal_sampai.'"');
			$this->db->where('status',$status);
			$fetch_data=$this->db->get()->result();
			
			$result['data']=$fetch_data;  
           echo json_encode($result); 

			}
		
		
	
			
		}


	}
	

}

public function ambilData(){
	$this->input->post('');

}




}


