
<?php 

class model_quotation extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function hapus_data($id){
	//return $this->db->get('tb_info_isyarat');
	$this->db->where('id',$id);
	$this->db->delete('tb_users');
}
	public function hapus($id,$id_hapus,$table){
	//return $this->db->get('tb_info_isyarat');
	$this->db->where($id,$id_hapus);
	$this->db->delete($table);
}
public function AmbilId($table,$where){
	return $this->db->get_where($table,$where);

}

}