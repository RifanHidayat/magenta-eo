
<?php 

class model_pic extends CI_Model
{

	var $table_po = "pic_po";  
      	var $select_column_po = array("id", "pic_name","email", "jabatan", "customer","id_customer");  
      	var $order_column_po = array(null,"pic_name","email","jabatan","customer",null); 

      	var $table_event = "pic_event";  
      	var $select_column_event = array("id_event", "pic_name","email", "jabatan", "customer","id_customer");  
      	var $order_column_event = array(null,"pic_name","email","jabatan","customer",null);  

	public function __construct()
	{
		parent::__construct();
	}

	public function hapus($id){
	//return $this->db->get('tb_info_isyarat');
	$this->db->where('id',$id);
	$this->db->delete('pic_po');
}
	public function hapus_event($id){
	//return $this->db->get('tb_info_isyarat');
	$this->db->where('id_event',$id);
	$this->db->delete('pic_event');
}
public function AmbilId($table,$where){
	return $this->db->get_where($table,$where);

}
public function update($where,$data,$table){
	$this->db->where($where);
	$this->db->update($table,$data);
}

       function make_query_po()  
      {  
           $this->db->select($this->select_column_po);  
           $this->db->from($this->table_po);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("pic_name", $_POST["search"]["value"]);  
                $this->db->or_like("jabatan", $_POST["search"]["value"]);
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
      function make_datatables_po(){  
           $this->make_query_po();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data_po(){  
           $this->make_query_po();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_po()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table_po);  
           return $this->db->count_all_results();  
      }  



          function make_query_event()  
      {  
           $this->db->select($this->select_column_event);  
           $this->db->from($this->table_event);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("pic_name", $_POST["search"]["value"]);  
                $this->db->like("email", $_POST["search"]["value"]);  
                $this->db->like("jabatan", $_POST["search"]["value"]);  
                
            
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id_event', 'DESC');  
           }  
      }  
      function make_datatables_event(){  
           $this->make_query_event();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data_event(){  
           $this->make_query_event();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_event()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table_event);  
           return $this->db->count_all_results();  
      }  


}