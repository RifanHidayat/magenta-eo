
<?php 

class model_attribute extends CI_Model
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
public function AmbilId($table,$where){
	return $this->db->get_where($table,$where);

}
public function update($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
}
public function getDataValue($where,$data,$table){
	$this->db->where($where);
	$this->db->get($table,$data);
}
}