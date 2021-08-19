<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends CI_Controller {
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



	 public function payment($id){
		 $this->data['id']=$id;
		$this->load->view('tamplate/header',$this->data);
		$this->load->view('tamplate/sidebar',$this->data);
		$this->load->view('customer/payment',$this->data);
		 $this->load->view('tamplate/footer',$this->data);




	 }



	   public function manage(){
	   		$id=$this->session->userdata('id');
	        $group_data = $this->model_groups->getGroupData($id);
		    $this->data['group_data'] = $group_data;



	   	 	$this->data['customer']=$this->db->get('customer')->result();
	   	 	$this->data['pic']=$this->db->get('pic_po')->result();

	 		$this->load->view('tamplate/header',$this->data);
          	$this->load->view('tamplate/sidebar',$this->data);
          	$this->load->view('transactions/manage',$this->data);
           	$this->load->view('tamplate/footer',$this->data);

	 }

     public function detail($transaction_id){
        $id=$this->session->userdata('id');
        $group_data = $this->model_groups->getGroupData($id);
        $this->data['group_data'] = $group_data;

        $this->data['transaction_id']=$transaction_id;

       
        $this->load->view('tamplate/header',$this->data);
        $this->load->view('tamplate/sidebar',$this->data);
        $this->load->view('transactions/detail',$this->data);
        $this->load->view('tamplate/footer',$this->data);

		
}

public function print($id)
{
//   if ((!in_array('viewFaktur', $this->permission))) {
// 	redirect('dashboard', 'refresh');
//   }
// $this->db->select('*');
// $this->db->from("faktur_item");
// $this->db->where('faktur_number', $id);
// $this->data['faktur_item'] = $this->db->get()->result();

$this->db->select('*,faktur.faktur_number as faktur_number,payment_faktur.amount as total_payment,payment_faktur.date as date_payment');
$this->db->from('payment_faktur');
$this->db->join('payment_faktur_item', 'payment_faktur.transaction_number =payment_faktur_item.transaction_number');
$this->db->join('faktur', 'faktur.faktur_number =payment_faktur_item.faktur_number');
$this->db->where("payment_faktur.id",$id);
$transaction=$this->db->get()->result();
$this->data['transactions'] =$transaction;


//customer
$this->db->select('*,payment_faktur.date as date_payment,payment_faktur.amount as total_payment');
$this->db->from('payment_faktur');
$this->db->join('customer', 'customer.id=payment_faktur.customer_id');
$this->db->where("payment_faktur.id",$id);
$customer=$this->db->get()->row_array();
$this->data['customer'] =$customer;
$this->data['total_payment']=$customer['total_payment'];
$this->data['transaction_number']=$customer['transaction_number'];
$this->data['date_payment']=$customer['date_payment'];
$this->data['name']=$customer['name'];
$this->data['address']=$customer['address'];

$account_id=$customer['account_id'];

//account id
$db2 = $this->load->database('magenta_hrd', TRUE);
$account=$db2->query("SELECT * FROM  bank_accounts where id='$account_id'");
$db2->select('*');
$db2->from('bank_accounts');
$db2->where('id',$customer['account_id']);
$account=$db2->get()->row_array();

$this->data['account_number']=$account['account_number'];
$this->data['bank_name']=$account['bank_name'];












// $row = $this->db->get()->row_array();
// $this->data['diskon_harga'] = $row['diskon_harga'];
// $this->data['faktur_number'] = $row['faktur_number'];
// $this->data['seri_faktur'] = $row['ser_faktur'];
// $this->data['date_faktur'] = $row['date_faktur'];
// // $this->data['npwp']=$row['npwp'];
// $this->data['syarat_pembayaran'] = $row['syarat_pembayaran'];
// $this->data['ppn'] = $row['ppn'];
// $this->data['po_number'] = $row['po_number'];
// $this->data['gr_number'] = $row['gr_number'];
// $this->data['ref'] = $row['REF'];
// $this->data['pph23'] = $row['pph23'];
// $this->data['npwp'] = $row['npwp'];
// $this->data['diskon'] = $row['diskon'];

// $this->data['total_faktur'] = $row['total_faktur'];
// $this->data['total_sub'] = $row['total_sub'];
// $this->data['nama'] = $row['name'];
// $this->data['alamat'] = $row['address'];
// $this->data['comissionable_cost'] = $row['comissionable_cost'];
// $this->data['nonfee'] = $row['nonfee'];
// $this->data['title'] = $row['tittle_event'];

// $this->data['total'] = $row['total_summary'];
// $this->data['asf'] = $row['asf'];

// $totalBast = str_replace('.', '', $row['totalBast']);

// $asf = ($row['asfp'] / 100) * $totalBast;
// $asff = round($asf);

// $jasa = $totalBast - $asff;

// $this->data['asf'] = number_format($asff, 0, ",", ".");
// $this->data['jasa'] = number_format($jasa, 0, ",", ".");










// $this->load->view('tamplate/header1',$this->data);
// //$this->load->view('tamplate/sidebar',$this->data);
// $this->load->view('faktur/print_faktur_event',$this->data);
//  $this->load->view('tamplate/footer1',$this->data);


$mpdf = new \Mpdf\Mpdf([
  'mode' => 'utf-8',
  'format' => 'A4-p', 'defaultPageNumStyle' => '1',
  'margin_right' => '10',
  'margin_left' => '10',
  'margin_bottom' => '10',
  'margin_top' => '1',
]);
$mpdf->shrink_tables_to_fit = 1;


$data = $this->load->view('transactions/print', $this->data, TRUE);
$mpdf->WriteHTML($data);
$mpdf->SetJS('print();');
$mpdf->Output();

}

	



	

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
