
<?php 

class model_users extends CI_Model
{
		var $table = "tb_users";  
      	var $select_column = array("id", "username", "group_name", "email","firstname","lastname","phone","gender","password");  
      	var $order_column = array(null,"username",null,"email", "firstname", "lastname", null, null,null);  
	

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
	public function hapus($id,$id_hapus,$table,$rev){
	//return $this->db->get('tb_info_isyarat');
	$this->db->where($id,$id_hapus);

	$this->db->delete($table);

}
    
      function make_query()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("firstname", $_POST["search"]["value"]);  
                $this->db->or_like("lastname", $_POST["search"]["value"]);
                $this->db->or_like("username", $_POST["search"]["value"]);
                $this->db->or_like("email", $_POST["search"]["value"]);
            
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