<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	
		public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	
		$this->load->model('model_api');

	

}
public function index(){
	echo "string";
}
public function quotation($id=null){

if ($id==null){

//tampil semua data
$quotation=$this->model_api->getQuotation('quotations');
if ($quotation){
foreach ($quotation as $results) {

$data[]=array(
		"id"=>$results->id,
		"quotation_number"=>$results->quotation_number,
		"quotation_date"=>$results->quotation_date,
		"expired_date"=>$results->expired_date,
		"pic_po"=>$results->pic_po,
		"email_pic_po"=>$results->email_pic_po,
		"pic_event"=>$results->pic_event,
		"email_pic_event"=>$results->email_pic_event,
		"customer"=>$results->customer,
		"title_event"=>$results->tittle_event,
		"venue_event"=>$results->venue_event,
		"event_date"=>$results->event_date,
		"comissionable_cost"=>str_replace('.', '', $results->comissionable_cost),
		"nonfee_cost"=>str_replace('.', '', $results->nonfee_cost),
		"total_summary"=>str_replace('.', '', $results->total_summary),
		"pph"=>str_replace('.', '', $results->pph),
		"ppn"=>str_replace('.', '', $results->ppn),
		"grand_total"=>str_replace('.', '', $results->grand_total),
		"remaining_bast"=>str_replace('.', '', $results->remaining_bast),
		"file"=>$results->file,
		"status"=>$results->status,
		"items"=>$this->model_api->getQuotationitem('quotation_item',$results->quotation_number)
	);
     }
     $respon=[
	"status"=>true,
	"code"=>200,
	"data"=>$data,

	

];            
echo json_encode($respon);
}else{
	$respon=[
	"status"=>false,
	"code"=>404,
	"Message"=>"data tidak tersedia"
];

}


}else{

//tampil semua data
$quotation=$this->model_api->getQuotationbyid('quotations',$id);
if ($quotation){
foreach ($quotation as $results) {
	$tes=$this->item($results->quotation_number);

$data[]=array(
		"id"=>$results->id,
		"quotation_number"=>$results->quotation_number,
		"quotation_date"=>$results->quotation_date,
		"expired_date"=>$results->expired_date,
		"pic_po"=>$results->pic_po,
		"email_pic_po"=>$results->email_pic_po,
		"pic_event"=>$results->pic_event,
		"email_pic_event"=>$results->email_pic_event,
		"customer"=>$results->customer,
		"title_event"=>$results->tittle_event,
		"venue_event"=>$results->venue_event,
		"event_date"=>$results->event_date,
		"comissionable_cost"=>$results->comissionable_cost,
		"nonfee_cost"=>$results->nonfee_cost,
		"total_summary"=>$results->quotation_number,
		"pph"=>$results->pph,
		"ppn"=>$results->ppn,
		"grand_total"=>$results->grand_total,
		"file"=>$results->file,
		"remaining_bast"=>$results->remaining_bast,
		"status"=>$results->status,
		"items"=>$this->model_api->getQuotationitem('quotation_item',$results->quotation_number)
	);
     }
     $respon=[
	"status"=>true,
	"code"=>200,
	"data"=>$data,

	

];            

}else{
	$respon=[
	"status"=>false,
	"code"=>404,
	"Message"=>"data tidak tersedia"
];

}


}

echo json_encode($respon);


}



public function item($quotation_number){

	$item=$this->model_api->getQuotationitem('quotation_item',$quotation_number);
	foreach ($item as $items) {
		$dataItem[]=[
			"item_name"=>$items->item_name,
			"quantity"=>$items->quantity,
			"frequency"=>$items->frequency,
			"rate"=>$items->rate,
			"sub_total"=>$items->sub_total,
			"metode"=>$items->metode,
			"item_value"=>$items->item_value,

		];
		
		

		return $dataItem;

	}
}

public function budget()

{
 $upload_image = $this->upload_image("testing");
$data=[
	
	"pic_name"=>$this->input->post('user_id'),
	"jabatan"=>$this->input->post('photos'),
	"customer"=>$upload_image,
	"id_customer"=>"110",
	"email"=>$this->input->post("lat"),
	
];
$inser=$this->db->insert('pic_po',$data);
if ($inser){
	$respon['status']=true;
	$respon['code']=200;

}else{
	$respon['status']=false;
	$respon['code']=404;


}
echo json_encode($respon);

}
public function checkout()

{
$path="./assets/images_/chej.jpg";
file_put_contents($path,base64_decode($this->input->post('photos')));
$data=[
	
	"pic_name"=>$this->input->post('user_id'),
	"jabatan"=>"33",
	"customer"=>"tes",
	"id_customer"=>"110",
	"email"=>$this->input->post("lat"),
	
];
$inser=$this->db->insert('pic_po',$data);
if ($inser){
	$respon['status']=true;
	$respon['code']=200;

}else{
	$respon['status']=false;
	$respon['code']=404;


}
echo json_encode($respon);

}


  public function upload_image($file_name)
    {
        $name=base64_encode($this->input->post('photos'));
       $config['upload_path']          = './assets/images_';

                $config['allowed_types']        = 'gif|jpg|png|pdf';

                $config['max_size']             = 1000;

                $config['max_width']            = 2000;

                $config['max_height']           = 1024;
                $config['file_name'] =  $file_name;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

        if ( !$this->upload->do_upload('photos')){
        
            $error = $this->upload->display_errors();
            return "";

        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $type = explode('.', $_FILES['photos']['name']);
            $type = $type[count($type) - 1];
            
            $path = $config['file_name'].'.'.$type;
            return $path;
                      
        }
    }


}
