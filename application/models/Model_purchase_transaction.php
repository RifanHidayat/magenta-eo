
<?php 

class model_purchase_transaction extends CI_Model
{
	var $table = "purchase_transactions";  
    var $select_column = array("id","code","date", "total", "shipping_cost","discount","net_total","pay_amount");  
    var $order_column = array(null,null,null,null,null,null); 
	public function __construct()
	{
		parent::__construct();
	}


    function make_query()  
      {  
           $this->db->select("purchase_order.code,purchase_transactions.code as transactionCode,purchase_order.date as date,purchase_transactions.id as id,purchase_transactions.date as date,supplier.name as supplierName,amount,purchase_transactions.note");  
           $this->db->from('purchase_order');
           $this->db->join('purchase_transactions','purchase_transactions.purchaseOrderId=purchase_order.id');
           $this->db->join('supplier','purchase_transactions.supplierId=supplier.id');



           if(isset($_POST["search"]["value"]))  
           {  
               //  $this->db->like("", $_POST["search"]["value"]);  
               // $this->db->or_like("date", $_POST["search"]["value"]);

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