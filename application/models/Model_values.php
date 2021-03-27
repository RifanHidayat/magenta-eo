
<?php 

class model_values extends CI_Model
{
    var $table = "attribute_values";  
        var $select_column = array("id", "value", "satuanf", "satuanq","status","attribute_parent_id");  
        var $order_column = array(null,"value",null,null,null);  
  

  public function __construct()
  {
    parent::__construct();
  }


      function make_query($id)  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table); 
           $this->db->where('attribute_parent_id',$id);
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("value", $_POST["search"]["value"]);  
           
            
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
      function make_datatables($id){  
           $this->make_query($id);  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data($id){  
           $this->make_query($id);  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data($id)  
      {  
           $this->db->select("*");  
           $this->db->from($this->table);
           $this->db->where('attribute_parent_id',$id);
           return $this->db->count_all_results();  
      }  

}