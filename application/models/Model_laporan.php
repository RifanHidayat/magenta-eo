
<?php 

class model_laporan extends CI_Model
{
    var $table = "quotations";
      
        var $select_column = array("quotation_number", "date_quotation", "customer", "tittle_event","pic_name","pic_email","venue_event","asf","date_event","comissionable_cost","ppn","pph","date_expired","asfp","total_summary","nonfee","image","id","pic_event","customer_event","email_event","status","id_customer","id_pic_event","id_po","noteStatus"); 

        var $order_column = array("quotation_number", null, null, "tittle_event",null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null); 
  

  public function __construct()
  {
    parent::__construct();
  }


      function make_query()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("quotation_number", $_POST["search"]["value"]); 
                $this->db->or_like("tittle_event", $_POST["search"]["value"]);  
           
            
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