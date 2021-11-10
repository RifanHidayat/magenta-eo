
<?php 

class model_product extends CI_Model
{
	var $table = "product";  
    var $select_column = array("id","code","name", "purchase_price", "selling_price","stock ");  
    var $order_column = array(null,null,null,null,null,null); 
	public function __construct()
	{
		parent::__construct();
	}


    function make_query()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("code", $_POST["search"]["value"]);  
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