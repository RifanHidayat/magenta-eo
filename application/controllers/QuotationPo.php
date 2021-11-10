<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuotationPo extends CI_Controller {
	
		public function __construct(){
		parent::__construct();
		$this->load->helper('url');
	
		$this->load->model('model_api');

	

}

function create(){
      $quotationNumber= substr($this->input->post('quotation_number'), 0, 2);
      $quotationId = $this->input->post('quotation_id');
      $poNumber = $this->input->post('po_number');
      $datePo = $this->input->post('date');
      $titleEvent = $this->input->post('title_event');
      $amount = $this->input->post('amount');
     
      //insert to add po quotation
      $data=[
        'quotation_id'=>$quotationId,
        'code' => $poNumber,
        'date' => $datePo,
        'name'=>$titleEvent,
        'amount'=>$amount

      ];
      
       
      try{
        $this->db->insert('quotation_po', $data);

      }catch(Exception $e){

      }

      $data = array(
        'po_number' => $poNumber,
        'date_po_number' => $datePo,
  
      );
      $where = array(
        'id' => $quotationId
      );
      $this->db->where($where);
      try{
        if ($quotationNumber=="QE"){
          $this->db->update('quotations', $data);

        }else{
          $this->db->update('quotation_other', $data);

        }
        
      
      }catch(Exception $e){
        


      }    
}

}