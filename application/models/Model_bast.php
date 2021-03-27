<?php 

class model_bast extends CI_Model
{
    
       var $table = "bast";
        
    

        var $order_column = array('quotation_number'); 
      
  

  public function __construct()
  {
    parent::__construct();
  }


    
    

         function make_query()  
      {  
            $this->db->select('bast_number,bast.quotation_number as quotation_number,gr_number,customer_event as customer,tittle_event,date_bast,bast.status as status,quotations.status as statusQuotations,id_bast,image_po,image_gr,id_bast,bast.noteStatus,bast.totalBast as total,bast.po_number as po_number_bast'); 
           $this->db->from('bast');
           $this->db->join('quotations','quotations.quotation_number=bast.quotation_number');

            //   $this->db->select('bast_number,bast.quotation_number as quotation_number,gr_number,po_number,customer_event as customer,tittle_event,date_bast,bast.status as status,quotation_other.status as statusQuotations,total,id_bast,image_po,image_gr,quotation_other.image,id_bast,bast.noteStatus');
            // $this->db->from('quotation_other');
            // $this->db->join('bast','quotation_other.quotation_number = bast.quotation_number');  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("bast.quotation_number", $_POST["search"]["value"]);
                 $this->db->or_like("bast.bast_number", $_POST["search"]["value"]); 
                 //$this->db->or_like("quotations.tittle_event", $_POST["search"]["value"]);    
                // $this->db->or_like("bast_number", $_POST["search"]["value"]);
                
            
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id_bast', 'DESC');  
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
           $this->db->select("*");  
           $this->db->from($this->table);   
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 
              return $this->db->count_all_results();  
      }  


               function make_query_other()  
      {  
            $this->db->select('bast_number,bast.quotation_number as quotation_number,gr_number,customer_event as customer,tittle_event,date_bast,bast.status as status,quotation_other.status as statusQuotations,id_bast,image_po,image_gr,quotation_other.image,id_bast,bast.noteStatus,bast.totalBast as total,bast.po_number as po_number_bast');
            $this->db->from('quotation_other');
            $this->db->join('bast','quotation_other.quotation_number = bast.quotation_number');   
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("bast.quotation_number", $_POST["search"]["value"]);
                 $this->db->or_like("bast.bast_number", $_POST["search"]["value"]); 
                 $this->db->or_like("quotation_other.tittle_event", $_POST["search"]["value"]);    
                // $this->db->or_like("bast_number", $_POST["search"]["value"]);
                
            
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                 $this->db->order_by('id_bast', 'DESC');  
            // ;$this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']; 
           }  
      }  
      function make_datatables_other(){  
           $this->make_query_other();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
         

}