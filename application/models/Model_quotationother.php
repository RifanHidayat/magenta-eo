
<?php

class model_quotationother extends CI_Model
{
     var $table = "quotation_other";

     var $select_column = array("quotation_number", "sisa_bast", "discount", "date_quotation", "date_expired", "customer", "tittle_event", "netto", "pic_name", "pic_email", "asf", "note", "ppn", "pph23", "asfp", "total", "image", "id", "pic_event", "customer_event", "email_event", "status", "id_customer", "id_event", "id_po", "noteStatus", "sub_total", 'po_number');

     var $order_column = array("quotation_number", null, null, "tittle_event", null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);


     public function __construct()
     {
          parent::__construct();
     }


     function make_query()
     {
          $this->db->select($this->select_column);
          $this->db->from($this->table);
          if (isset($_POST["search"]["value"])) {
               $this->db->like("quotation_number", $_POST["search"]["value"]);
               $this->db->or_like("tittle_event", $_POST["search"]["value"]);
          }
          if (isset($_POST["order"])) {
               $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
          } else {
               $this->db->order_by('id', 'DESC');
          }
     }
     function make_datatables()
     {
          $this->make_query();
          if ($_POST["length"] != -1) {
               $this->db->limit($_POST['length'], $_POST['start']);
          }
          $query = $this->db->get();
          return $query->result();
     }
     function get_filtered_data()
     {
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
