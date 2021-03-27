
<?php 

class model_delivery extends CI_Model
{
    
       var $table = "delivery";
        
    

        var $order_column = array('quotation_number'); 
      
  

  public function __construct()
  {
    parent::__construct();
  }


    
    

         function make_query()  
      {  
            $this->db->select('Delivery_number,delivery.quotation_number,quotations.customer_event as customer,tittle_event,gudang,date_pengiriman,faktur.status as statusFaktur,bast.status as statusBast,quotations.status as statusQuotations,delivery.status as status,id_delivery,delivery.noteStatus');
    
            $this->db->from('quotations');
            $this->db->join('bast','bast.quotation_number = quotations.quotation_number'); 
            $this->db->join('faktur','bast.id_bast = faktur.id_bast'); 
            $this->db->join('delivery','faktur.id_faktur = delivery.id_faktur'); 
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("delivery.quotation_number", $_POST["search"]["value"]);
                 // $this->db->or_like("delivery.Delivery_number", $_POST["search"]["value"]); 
                 // $this->db->or_like("quotations.tittle_event", $_POST["search"]["value"]);    
                // $this->db->or_like("bast_number", $_POST["search"]["value"]);
                
            
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id_delivery', 'DESC');  
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
            $this->db->select('Delivery_number,delivery.quotation_number,quotation_other.customer_event as customer,tittle_event,gudang,date_pengiriman,faktur.status as statusFaktur,bast.status as statusBast,quotation_other.status as statusQuotations,delivery.status as status,id_delivery,delivery.noteStatus');
            // $this->db->from('quotation_other');
            // $this->db->join('delivery','quotation_other.quotation_number = delivery.quotation_number'); 
            //  $this->db->join('bast','bast.quotation_number = delivery.quotation_number'); 
            // $this->db->join('faktur','faktur.quotation_number = delivery.quotation_number'); 


         $this->db->from('quotation_other');
            $this->db->join('bast','bast.quotation_number = quotation_other.quotation_number'); 
            $this->db->join('faktur','bast.id_bast = faktur.id_bast'); 
            $this->db->join('delivery','faktur.id_faktur = delivery.id_faktur'); 
               
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("delivery.quotation_number", $_POST["search"]["value"]);
                 // $this->db->or_like("delivery.Delivery_number", $_POST["search"]["value"]); 
                 // $this->db->or_like("quotation_other.tittle_event", $_POST["search"]["value"]);   
                // $this->db->or_like("bast_number", $_POST["search"]["value"]);           
           }  
           if(isset($_POST["order"]))  
           {  


                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id_delivery', 'DESC');  
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