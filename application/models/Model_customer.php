
<?php 

class model_customer extends CI_Model
{
	var $table = "customer";  
    var $select_column = array("id","name","address", "phone", "npwp","karakteristik_ppn","karakteristik_pph");  
      	var $order_column = array(null,"name",null,null, "npwp", null,null); 
	public function __construct()
	{
		parent::__construct();
	}

	public function hapus($id){
	//return $this->db->get('tb_info_isyarat');
	$this->db->where('id',$id);
	$this->db->delete('pic_po');
}
public function AmbilId($table,$where){
	return $this->db->get_where($table,$where);

}
public function update($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
}

    function make_query()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("npwp", $_POST["search"]["value"]);  
                $this->db->or_like("name", $_POST["search"]["value"]);

            
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id', 'DESC');  
           }  
      }  
      function make_datatables(){  
           $this->make_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data(){  
           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table);  
           return $this->db->count_all_results();  
      }  

}