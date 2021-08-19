
<?php 

class model_faktur extends CI_Model
{
    
       var $table = "faktur";
        
    

        var $order_column = array('quotation_number'); 
      
  

  public function __construct()
  {
    parent::__construct();
  }


    
    

         function make_query()  
      {  
            $this->db->select('faktur.quotation_number,faktur_number,faktur.image,ser_faktur,quotations.customer,tittle_event,total_faktur,quotations.status as statusQuotations,bast.status as statusBast,faktur.status as status,date_faktur,id_faktur,faktur.noteStatus,faktur.pembayaran');
       $this->db->from('quotations');
       $this->db->join('bast','bast.quotation_number = quotations.quotation_number');
       $this->db->join('faktur','faktur.id_bast= bast.id_bast'); 
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("faktur.quotation_number", $_POST["search"]["value"]);
                 $this->db->or_like("faktur.faktur_number", $_POST["search"]["value"]); 
                 $this->db->or_like("quotations.tittle_event", $_POST["search"]["value"]);    
                // $this->db->or_like("bast_number", $_POST["search"]["value"]);
                
            
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id_faktur', 'DESC');  
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
             $this->db->select('faktur.quotation_number,faktur_number,faktur.image,ser_faktur,quotation_other.customer_event as customer,tittle_event,total_faktur,quotation_other.status as statusQuotations,bast.status as statusBast,faktur.status as status,date_faktur,id_faktur,faktur.noteStatus,faktur.pembayaran');
       // $this->db->from('quotation_other');
       //      $this->db->join('faktur','faktur.quotation_number = quotation_other.quotation_number');    
       //       $this->db->join('bast','bast.quotation_number = faktur.quotation_number');  

              $this->db->from('quotation_other');
       $this->db->join('bast','bast.quotation_number = quotation_other.quotation_number');
       $this->db->join('faktur','faktur.id_bast= bast.id_bast'); 

           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("faktur.quotation_number", $_POST["search"]["value"]);
                 $this->db->or_like("faktur.faktur_number", $_POST["search"]["value"]); 
                 $this->db->or_like("quotation_other.tittle_event", $_POST["search"]["value"]);    
                // $this->db->or_like("bast_number", $_POST["search"]["value"]);
                
            
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id_faktur', 'DESC');  
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