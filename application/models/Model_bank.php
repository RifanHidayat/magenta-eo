
<?php 

class model_bank extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function hapus($id){
	//return $this->db->get('tb_info_isyarat');
	$this->db->where('id_bank_item',$id);
	$this->db->delete('bank_item');
}
public function AmbilId($table,$where){
	return $this->db->get_where($table,$where);

}
public function update($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
}

}