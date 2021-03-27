
<?php 

class model_api extends CI_Model
{
//get all data
public function getQuotation($table){
	   // $where = array('quotation_number' => $id);
	//quptatioon
	$this->db->select('quotations.id,quotations.quotation_number,date_quotation as quotation_date,date_expired as expired_date,pic_name as pic_po,pic_email as email_pic_po,pic_event,email_event as email_pic_event,customer,tittle_event as tittle_event,venue_event,date_event as event_date,comissionable_cost,nonfee as nonfee_cost,total_summary,ppn,pph,grand_total,image as file,sisa_bast as remaining_bast,status');
		$this->db->from($table);
	
    $quotation = $this->db->get()->result();
    return $quotation;

   	
}
//get  by id data
public function getQuotationbyid($table,$id){
	   // $where = array('quotation_number' => $id);
	//quptatioon
	$this->db->select('quotations.id,quotations.quotation_number,date_quotation as quotation_date,date_expired as expired_date,pic_name as pic_po,pic_email as email_pic_po,pic_event,email_event as email_pic_event,customer,tittle_event as tittle_event,venue_event,date_event as event_date,comissionable_cost,nonfee as nonfee_cost,total_summary,ppn,pph,grand_total,image as file,sisa_bast as remaining_bast,status');
		$this->db->from($table);
	$this->db->where("id",$id);
		$this->db->or_where("status",$id);
    $quotation = $this->db->get()->result();
    return $quotation;

   	
}
public function getQuotationitem($table,$quotation_number){
	   // $where = array('quotation_number' => $id);
	//quptatioon
	$this->db->select('name_item as item_name,frrequency as frequency,quantity,rate,subtotal as sub_total,metode,item_value as item_value');
	$this->db->from($table);
	$this->db->where("quotation_number",$quotation_number);
    $item = $this->db->get()->result();
    return $item;

   	
}


}