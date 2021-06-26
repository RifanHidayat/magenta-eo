<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Delivery extends CI_Controller
{
  var $permission = array();
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('form_validation');
    $this->load->model('model_pic');
    $this->load->model('model_users');
    $this->load->model('model_groups');
    $this->load->model('model_attribute');
    $this->load->model('model_bank');

    $group_data = array();
    if (empty($this->session->userdata('email'))) {
    } else {
      $user_id = $this->session->userdata('id');
      $this->load->model('model_groups');
      $group_data = $this->model_groups->getUserGroupByUserId($user_id);

      $this->data['user_permission'] = unserialize($group_data['permission']);
      $this->permission = unserialize($group_data['permission']);
    }
  }
  public function index()
  {
    redirect('Delivery/add_delivery', 'refresh');
  }

  public function create_delivery($id, $id_faktur)
  {
    if ((!in_array('createDelivery', $this->permission))) {
      redirect('dashboard', 'refresh');
    }
    $this->data['id_bast'] = $id_faktur;


    $idd = substr($id, 0, 2);
    if ($idd == "QE") {

      $this->data['controller'] = $this;
      $this->db->select('*');
      $this->db->from('quotations');
      $this->db->where('quotation_number', $id);
      $row = $this->db->get()->row_array();
      $this->data['venue'] = $row['venue_event'];
      $this->data['date'] = $row['date_quotation'];
      $this->data['pic_name'] = $row['pic_event'];
      $this->data['pic_email'] = $row['email_event'];
      $this->data['comissionable_cost'] = $row['comissionable_cost'];
      $this->data['nonfee'] = $row['nonfee'];
      $this->data['asf'] = $row['asf'];
      $this->data['ppn'] = $row['ppn'];
      $this->data['pph'] = $row['pph'];
      $this->data['total'] = $row['total_summary'];
      $this->db->distinct();
      $this->db->select('name ,metode,quotation_number');
      $this->db->from("quotation_sub_item");
      $this->db->where('quotation_number', $id);
      $this->data['quotation_sub_item'] = $this->db->get()->result();


      $this->form_validation->set_rules('Quatations_number', 'Quotation', 'required');






      if ($this->form_validation->run() == false) {



        $this->data['quotation_number'] = $id;
        $this->db->select('*');
        $this->db->from('quotations');
        $this->db->from('customer', 'customer.id=quotations.id_customer');
        $this->db->where("quotation_number", $id);
        $rowId = $this->db->get()->row_array();


        $this->data['quotation_number'] = $id;
        $this->db->select('*');
        $this->db->from('gudang');
        $this->db->where("id_customer", $rowId['id_customer']);
        $row = $this->db->get()->result();
        $this->data['gudang'] = $row;


        $this->load->view('tamplate/header', $this->data);
        $this->load->view('tamplate/sidebar', $this->data);
        $this->load->view('delivery/add_delivery_event', $this->data);
        $this->load->view('tamplate/footer', $this->data);
      } else {
        $this->aksi_add_delivery_event();
      }
    } else {
      $this->data['quotation_number'] = $id;
      $where = array('quotation_number' => $id);
      $this->data['quotation_other'] = $this->db->get_where('quotation_other_item', $where)->result();

      $this->db->select('*');
      $this->db->from('quotation_other');
      $this->db->from('customer', 'customer.id=quotation_other.id_customer');
      $this->db->where("quotation_number", $id);
      $rowId = $this->db->get()->row_array();

      // $this->data['quotation_number']=$id;
      $this->db->select('*');
      $this->db->from('gudang');
      $this->db->where("id_customer", $rowId['id_customer']);
      $row = $this->db->get()->result();
      $this->data['gudang'] = $row;



      $this->load->view('tamplate/header', $this->data);
      $this->load->view('tamplate/sidebar', $this->data);
      $this->load->view('delivery/add_delivery', $this->data);
      $this->load->view('tamplate/footer', $this->data);
    }
  }


  public function edit_delivery($quotation_number, $id_delivery)
  {
    if ((!in_array('updateDelivery', $this->permission))) {
      redirect('dashboard', 'refresh');
    }
    $this->data['id'] = $id_delivery;
    $idd = substr($quotation_number, 0, 2);
    if ($idd == "QE") {


      $this->data['controller'] = $this;
      $this->db->select('*');
      $this->db->from('quotations');
      $this->db->where('quotation_number', $quotation_number);

      $row = $this->db->get()->row_array();
      $this->data['venue'] = $row['venue_event'];
      $this->data['date'] = $row['date_quotation'];
      $this->data['pic_name'] = $row['pic_name'];
      $this->data['pic_email'] = $row['pic_email'];
      $this->data['comissionable_cost'] = $row['comissionable_cost'];
      $this->data['nonfee'] = $row['nonfee'];
      $this->data['asf'] = $row['asf'];
      $this->data['ppn'] = $row['ppn'];
      $this->data['pph'] = $row['pph'];
      $this->data['total'] = $row['total_summary'];
      $this->db->distinct();
      $this->db->select('name ,metode,quotation_number');
      $this->db->from("quotation_sub_item");
      $this->db->where('quotation_number', $quotation_number);
      $this->data['quotation_sub_item'] = $this->db->get()->result();



      $this->form_validation->set_rules('Quatations_number', 'Quotation', 'required');

      if ($this->form_validation->run() == false) {
        $this->db->select('*');
        $this->db->from('quotations');
        $this->db->from('customer', 'customer.id=quotations.id_customer');
        $this->db->where("quotation_number", $quotation_number);
        $rowId = $this->db->get()->row_array();


        $this->db->select('*');
        $this->db->from('gudang');
        $this->db->where("id_customer", $rowId['id_customer']);
        $row = $this->db->get()->result();
        $this->data['gudang'] = $row;


        $this->data['quotation_number'] = $quotation_number;

        $this->db->select('*');
        $this->db->from('delivery');
        $this->db->where('id_delivery', $id_delivery);
        $row = $this->db->get()->row_array();
        $this->data['id'] = $row['id_delivery'];

        $this->load->view('tamplate/header', $this->data);
        $this->load->view('tamplate/sidebar', $this->data);
        $this->load->view('delivery/edit_delivery_event', $this->data);
        $this->load->view('tamplate/footer', $this->data);
      } else {
        $this->aksi_update_delivery_event($id_delivery);
      }
    } else {
      $this->db->select('*');
      $this->db->from('quotation_other');
      $this->db->from('customer', 'customer.id=quotation_other.id_customer');
      $this->db->where("quotation_number", $quotation_number);
      $rowId = $this->db->get()->row_array();


      $this->db->select('*');
      $this->db->from('gudang');
      $this->db->where("id_customer", $rowId['id_customer']);
      $row = $this->db->get()->result();
      $this->data['gudang'] = $row;
      $where = array('quotation_number' => $quotation_number);
      $this->data['quotation_other'] = $this->db->get_where('delivery_item', $where)->result();
      $this->data['quotation_number'] = $quotation_number;
      $this->db->select('*');
      $this->db->from('delivery');
      $this->db->where('id_delivery', $id_delivery);
      $row = $this->db->get()->row_array();
      $this->data['id'] = $row['id_delivery'];
      $this->load->view('tamplate/header', $this->data);
      $this->load->view('tamplate/sidebar', $this->data);
      $this->load->view('delivery/edit_delivery', $this->data);
      $this->load->view('tamplate/footer', $this->data);
    }
  }
  public function view_delivery($quotation_number, $delivery_number)
  {
    if ((!in_array('viewDelivery', $this->permission)) and (!in_array('statusDelivery', $this->permission))) {
      redirect('dashboard', 'refresh');
    }
    $this->data['id_delivery'] = $delivery_number;

    $idd = substr($quotation_number, 0, 2);
    if ($idd == "QE") {

      $this->data['controller'] = $this;
      $this->db->select('*');
      $this->db->from('quotations');
      $this->db->where('quotation_number', $quotation_number);
      $row = $this->db->get()->row_array();

      $this->data['venue'] = $row['venue_event'];

      $this->data['date'] = $row['date_quotation'];
      $this->data['pic_name'] = $row['pic_name'];
      $this->data['pic_email'] = $row['pic_email'];
      $this->data['comissionable_cost'] = $row['comissionable_cost'];
      $this->data['nonfee'] = $row['nonfee'];
      $this->data['asf'] = $row['asf'];
      $this->data['ppn'] = $row['ppn'];
      $this->data['pph'] = $row['pph'];
      $this->data['total'] = $row['total_summary'];
      $this->db->distinct();
      $this->db->select('name ,metode,quotation_number');
      $this->db->from("quotation_sub_item");
      $this->db->where('quotation_number', $quotation_number);
      $this->data['quotation_sub_item'] = $this->db->get()->result();
      $this->form_validation->set_rules('Quatations_number', 'Quotation', 'required');
      if ($this->form_validation->run() == false) {


        $this->data['quotation_number'] = $quotation_number;
        $this->load->view('tamplate/header', $this->data);
        $this->load->view('tamplate/sidebar', $this->data);
        $this->load->view('delivery/view_delivery_event', $this->data);
        $this->load->view('tamplate/footer', $this->data);
      } else {
      }
    } else {

      $this->db->select('*');
      $this->db->from("delivery_item");

      $this->db->where('quotation_number', $quotation_number);
      $this->data['delivery_item'] = $this->db->get()->result();

      $where = array('quotation_number' => $quotation_number);

      $this->data['quotation_other'] = $this->db->get_where('delivery_item', $where)->result();
      $this->data['quotation_number'] = $quotation_number;
      $this->load->view('tamplate/header', $this->data);
      $this->load->view('tamplate/sidebar', $this->data);
      $this->load->view('delivery/view_delivery_other', $this->data);
      $this->load->view('tamplate/footer', $this->data);
    }
  }
  function getStatus()
  {
    $delivery_order = $this->input->post('delivery_order');
    $this->db->select("status");
    $this->db->from('delivery');
    $this->db->where('quotation_number', $delivery_order);
    $data = $this->db->get()->result();
    echo json_encode($data);
  }
  function updateStatus()
  {

    $status = $this->input->post('status');
    $note = $this->input->post('note');
    $delivery_order = $this->input->post('delivery_order');

    $where = array('id_delivery' => $delivery_order);
    $data = [
      'status' => $status,
      'noteStatus' => $note
    ];
    $this->db->where($where);
    $update = $this->db->update('delivery', $data);
    if ($update) {
      $result['pesan'] = "1";
    } else {
      $result['pesan'] = "0";
    }


    echo  json_encode($result);
  }
  public function AmbilData()
  {
    $delivery_number = $this->input->post("delivery_number");


    $this->db->select('*');
    $this->db->from('quotations');
    $this->db->join('bast', 'bast.quotation_number = quotations.quotation_number');
    $this->db->join('customer', 'customer.id = quotations.id_customer');
    $this->db->join('delivery', 'delivery.quotation_number = quotations.quotation_number');

    $this->db->where('delivery.Delivery_number', $delivery_number);
    $dataa = $this->db->get()->result();
    echo json_encode($dataa);
  }


  public function aksi_update_delivery_event($id)
  {

    $data = [
      'quotation_number' => $this->input->post('Quatations_number'),
      'tagihan' => $this->input->post('tagihan'),
      'kirim' => $this->input->post('kirim'),
      'delivery_number' => $this->input->post('delivery_order'),
      'gudang' => $this->input->post('gudang'),
      'date_pengiriman' => $this->input->post('tanggal_pengiriman'),
      'platnomor' => $this->input->post('platnomor'),
      'pengirim' => $this->input->post('pengirim'),

    ];

    $where = array("id_delivery" => $id);

    $this->db->where($where);
    $this->db->update('delivery', $data);

    $this->session->set_flashdata('success', 'Successfully updated');
    redirect('Delivery/manage_delivery', 'refresh');
  }



  function Ambildatagudang()
  {
    $id = $this->input->post('idGudang');

    $this->db->select('*');
    $this->db->from('gudang');
    $this->db->where("id_gudang", $id);
    $row = $this->db->get()->row_array();
    // $this->data['gudang']=$row;
    $result['alamat'] = $row['alamat'];
    echo json_encode($result);
  }
  function Ambildatagudang1()
  {
    $id = $this->input->post('idGudang');

    $this->db->select('*');
    $this->db->from('gudang');
    $this->db->where("alamat", $id);
    $row = $this->db->get()->row_array();
    // $this->data['gudang']=$row;
    $result['alamat'] = $row['alamat'];
    echo json_encode($result);
  }


  public function aksi_add_delivery_event()
  {

    $data = [
      'quotation_number' => $this->input->post('Quatations_number'),
      'tagihan' => $this->input->post('tagihan'),
      'kirim' => $this->input->post('kirim'),
      'delivery_number' => $this->input->post('delivery_order'),
      'gudang' => $this->input->post('gudang'),
      'date_pengiriman' => $this->input->post('tanggal_pengiriman'),
      'platnomor' => $this->input->post('platnomor'),
      'id_bast' => $this->input->post('id_bast'),
      'pengirim' => $this->input->post('pengirim'),
      "status" => "Open"
    ];
    $data1 = [
      'quotation_number' => $this->input->post('Quatations_number'),
      'delivery_number' => $this->input->post('delivery_order')
    ];

    $this->db->insert('delivery', $data);
    $this->db->insert('delivery_item', $data1);
    $this->session->set_flashdata('success', 'Successfully created');

    redirect('Delivery/manage_delivery', 'refresh');
  }

  public function manage_delivery()
  {
    if ((!in_array('updateDelivery', $this->permission)) and (!in_array('deleteDelivery', $this->permission)) and (!in_array('viewDelivery', $this->permission)) and (!in_array('deleteDelivery', $this->permission)) and (!in_array('statusDelivery', $this->permission))) {
      redirect('dashboard', 'refresh');
    }

    $id = $this->session->userdata('id');
    $group_data = $this->model_groups->getGroupData($id);
    $this->data['group_data'] = $group_data;

    $this->db->select('Delivery_number,delivery.quotation_number,quotations.customer_event as customer,tittle_event,gudang,date_pengiriman,bast.status as statusFaktur,bast.status as statusBast,quotations.status as statusQuotations,delivery.status as status,id_delivery');

    $this->db->from('quotations');
    $this->db->join('delivery', 'quotations.quotation_number = delivery.quotation_number');
    $this->db->join('bast', 'bast.id_bast = delivery.id_bast');




    $this->data['delivery'] = $this->db->get()->result();

    $this->db->select('Delivery_number,delivery.quotation_number,quotation_other.customer_event as customer,tittle_event,gudang,date_pengiriman,bast.status as statusFaktur,bast.status as statusBast,quotation_other.status as statusQuotations,delivery.status as status,id_delivery');
    $this->db->from('quotation_other');
    $this->db->join('delivery', 'quotation_other.quotation_number = delivery.quotation_number');
    $this->db->join('bast', 'bast.quotation_number = delivery.quotation_number');




    $this->data['delivery_other'] = $this->db->get()->result();


    $this->load->view('tamplate/header', $this->data);
    $this->load->view('tamplate/sidebar', $this->data);
    $this->load->view('delivery/manage_delivery', $this->data);
    $this->load->view('tamplate/footer', $this->data);
  }
  public function AmbilDataQuotation()
  {
    $quotatoion_number = $this->input->post("quotation_number");
    $this->db->select('*');
    $this->db->from('quotations');
    $this->db->join('bast', 'bast.quotation_number = quotations.quotation_number');
    $this->db->join('customer', 'customer.id = quotations.id_customer');
    $this->db->where('quotations.quotation_number', $quotatoion_number);

    $dataa = $this->db->get()->result();
    echo json_encode($dataa);
  }

  function subtotal($name, $quotation)
  {

    $this->db->select('*');
    $this->db->from('quotation_item');
    $this->db->where('name_item', $name);
    $this->db->where('quotation_number', $quotation);
    $row = $this->db->get()->result();
    $hitung = 0;
    foreach ($row as $k) {
      $subtotal = (str_replace('.', '', $k->subtotal));
      $hitung = $hitung + $subtotal;
    }



    echo "IDR " . number_format($hitung, 0, ",", ".");
  }

  function generet_delivery()
  {



    $this->db->select_max('id_delivery');
    $this->db->from('delivery');
    $data = $this->db->get()->row_array();
    $id = $data['id_delivery'];

    $id++;
    $data = sprintf("%04s", $id);
    $result["data"] = $data;
    echo json_encode($result);
  }

  public function AmbilDataDelivery()
  {
    $delivery_number = $this->input->post("delivery_number");
    $this->db->select('*');
    $this->db->from('quotations');
    $this->db->join('bast', 'bast.quotation_number = quotations.quotation_number');
    $this->db->join('customer', 'customer.id = quotations.id_customer');
    $this->db->join('delivery', 'delivery.quotation_number = quotations.quotation_number');

    $this->db->where('delivery.id_delivery', $delivery_number);
    $dataa = $this->db->get()->result();
    echo json_encode($dataa);
  }

  public function AmbilDataDeliveryO()
  {
    $delivery_number = $this->input->post("quotation_number");

    $this->db->select('*');
    $this->db->from('quotation_other');
    $this->db->join('bast', 'bast.quotation_number = quotation_other.quotation_number');
    $this->db->join('customer', 'customer.id = quotation_other.id_customer');


    $this->db->where('quotation_other.quotation_number', $delivery_number);
    $dataa = $this->db->get()->result();
    echo json_encode($dataa);
  }

  public function AmbilDataQuotationOther()
  {
    $delivery_number = $this->input->post("delivery_number");


    $this->db->select('*');
    $this->db->from('quotation_other');
    $this->db->join('bast', 'bast.quotation_number = quotation_other.quotation_number');
    $this->db->join('customer', 'customer.id = quotation_other.id_customer');
    $this->db->join('delivery', 'delivery.id_bast = bast.id_bast');

    // $this->db->join('delivery','delivery.quotation_number = quotation_other.quotation_number');  

    $this->db->where('delivery.id_delivery', $delivery_number);
    $dataa = $this->db->get()->result();
    echo json_encode($dataa);
  }

  public function aksi_add_delivery()
  {


    $quotation_number = $this->input->post('Quatations_number');





    if ($quotation_number != "") {
      $i = 0; // untuk loopingnya
      $a = $this->input->post('namebarang');
      $b = $this->input->post('deskripsibarang');
      $c = $this->input->post('keteranganbarang');
      $d = $this->input->post('kts');
      $e = $this->input->post('satuan');

      if ($a[0] !== null) {
        foreach ($a as $row) {
          $data = [
            'quotation_number' => $quotation_number,
            'delivery_number' => $this->input->post('delivery_order'),
            'barang' => $row,
            'deskripsi_barang' => $b[$i],
            'keterangan' => $c[$i],
            'kts' => $d[$i],
            'satuan' => $e[$i],



          ];
          // $t=+(int) $c[$i];

          $this->db->insert('delivery_item', $data);


          $i++;
        }

        $data1 = [
          'quotation_number' => $this->input->post('Quatations_number'),
          'tagihan' => $this->input->post('tagihan'),
          'kirim' => $this->input->post('kirim'),
          'delivery_number' => $this->input->post('delivery_order'),
          'gudang' => $this->input->post('gudang'),
          'date_pengiriman' => $this->input->post('tanggal_pengiriman'),
          'platnomor' => $this->input->post('platnomor'),
          'pengirim' => $this->input->post('pengirim'),
          'id_bast' => $this->input->post('id_bast'),
          'status' => 'Open'
        ];

        $this->db->insert('delivery', $data1);
      }
      $this->session->set_flashdata('success', 'Successfully created');
      redirect("Delivery/manage_delivery");
    } else {
      $arr['success'] = false;
      $arr['notif']  = '<div class="alert alert-success">
      <i class="fa fa-check"></i> gagal menyimpan data
    </div>';
      $this->load->view('tamplate/header', $this->data);
      $this->load->view('tamplate/sidebar', $this->data);
      $this->load->view('Bank/add_quatations', $this->data);
      $this->load->view('tamplate/footer', $this->data);
    }
  }

  public function aksi_update_delivery()
  {


    $quotation_number = $this->input->post('Quatations_number');
    $delivery_number = $this->input->post('delivery_order');

    if ($quotation_number != "") {
      $i = 0; // untuk loopingnya
      $a = $this->input->post('namebarang');
      $b = $this->input->post('deskripsibarang');
      $c = $this->input->post('keteranganbarang');
      $d = $this->input->post('kts');
      $e = $this->input->post('satuan');
      $g = $this->input->post('id_delivery');

      if ($a[0] !== null) {
        $this->db->where('quotation_number', $quotation_number);
        $this->db->delete('delivery_item');
        foreach ($a as $row) {
          $data = [
            'quotation_number' => $quotation_number,
            'delivery_number' => $delivery_number,
            'barang' => $row,
            'deskripsi_barang' => $b[$i],
            'keterangan' => $c[$i],
            'kts' => $d[$i],
            'satuan' => $e[$i]


          ];

          $this->db->insert('delivery_item', $data);



          $i++;
        }

        $data1 = [
          'quotation_number' => $this->input->post('Quatations_number'),
          'tagihan' => $this->input->post('tagihan'),
          'kirim' => $this->input->post('kirim'),

          'gudang' => $this->input->post('gudang'),
          'date_pengiriman' => $this->input->post('tanggal_pengiriman'),
          'platnomor' => $this->input->post('platnomor'),
          'pengirim' => $this->input->post('pengirim'),


        ];
        $where = array('delivery_number' => $delivery_number);
        $this->db->where($where);
        $update = $this->db->update('delivery', $data1);
      }

      $this->session->set_flashdata('success', 'Successfully updated');
      redirect("Delivery/manage_delivery");
    } else {
      $arr['success'] = false;
      $arr['notif']  = '<div class="alert alert-success">
      <i class="fa fa-check"></i> gagal menyimpan data
    </div>';
      $this->load->view('tamplate/header', $this->data);
      $this->load->view('tamplate/sidebar', $this->data);
      $this->load->view('Bank/add_quatations', $this->data);
      $this->load->view('tamplate/footer', $this->data);
    }
  }

  public function print_delivery($quotation_number, $id)
  {
    if ((!in_array('viewDelivery', $this->permission))) {
      redirect('dashboard', 'refresh');
    }
    $idd = substr($quotation_number, 0, 2);

    $this->db->select('*');
    $this->db->from("delivery_item");

    $this->db->where('delivery_number', $id);
    $this->data['delivery_item'] = $this->db->get()->result();


    if ($idd == "QE") {
      $this->db->select('*');
      $this->db->from('delivery');
      $this->db->join('quotations', 'quotations.quotation_number=delivery.quotation_number');
      $this->db->join('bast', 'bast.quotation_number = quotations.quotation_number');
      $this->db->join('customer', 'quotations.customer=customer.name');
      $this->db->where('delivery_number', $id);

      // $this->db->join('fa','faktur.quotation_number = quotations.quotation_number');  
      $row = $this->db->get()->row_array();
      $this->data['delivery_number'] = $row['Delivery_number'];
      $this->data['gudang'] = $row['gudang'];
      $this->data['kirim'] = $row['kirim'];
      // $this->data['nama']=$row['customer']; 
      $this->data['nama'] = $row['customer_event'];
      // $this->data['npwp']=$row['npwp'];
      $this->data['tagihan'] = $row['tagihan'];
      $this->data['date_pengiriman'] = $row['date_pengiriman'];
      $this->data['comissionable_cost'] = $row['comissionable_cost'];
      $this->data['nonfee'] = $row['nonfee'];
      $this->data['po_number'] = $row['po_number'];

      $this->data['total'] = $row['total_summary'];
      $this->data['pengirim'] = $row['pengirim'];
      $this->data['delivery_order'] = $row['Delivery_number'];

      // $this->load->view('tamplate/header1',$this->data);
      // //$this->load->view('tamplate/sidebar',$this->data);
      // $this->load->view('delivery/print_delivery_event',$this->data);
      //  $this->load->view('tamplate/footer1',$this->data);

      $cos = str_replace('.', '', $row['comissionable_cost']);
      $nonfee = str_replace('.', '', $row['nonfee']);

      $pembagi = $row['totalBast'] / $row['netto'];
      $diskon_harga = $pembagi * $row['discount'];
      $cos1 = $pembagi * $cos;
      $nonfee1 = $pembagi * $nonfee;
      $material = $cos1 + $nonfee1;
      $asf = $row['asf'] * $pembagi;
      $sub_total = $asf + $material;
      $netto = $sub_total - $diskon_harga;
      $this->data['material'] = number_format(round($material), 0, ',', '.');
      $this->data['asf'] = number_format(round($asf), 0, ',', '.');
      $this->data['sub_total'] = number_format(round($sub_total), 0, ',', '.');
      $this->data['netto'] = number_format(round($netto), 0, ',', '.');

      $this->data['discount'] = number_format(round($diskon_harga), 0, ',', '.');


      $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'margin_right' => '1',
        'margin_left' => '1',
        'margin_bottom' => '5',
        'margin_top' => '5',
        'format' => 'A5', 'defaultPageNumStyle' => '1'
      ]);

      $data = $this->load->view('delivery/print_delivery_event', $this->data, TRUE);





      $mpdf->WriteHTML($data);
      $mpdf->Output();
    } else {
      $this->db->select('*');
      $this->db->from('delivery');
      $this->db->join('quotation_other', 'quotation_other.quotation_number=delivery.quotation_number');
      $this->db->join('bast', 'bast.quotation_number = quotation_other.quotation_number');
      $this->db->join('customer', 'quotation_other.customer=customer.name');
      $this->db->where('delivery_number', $id);
      $row = $this->db->get()->row_array();
      $this->data['delivery_number'] = $row['Delivery_number'];
      $this->data['gudang'] = $row['gudang'];
      $this->data['po_number'] = $row['po_number'];
      $this->data['kirim'] = $row['kirim'];
      // $this->data['nama']=$row['customer'];
      $this->data['nama'] = $row['customer_event'];
      // $this->data['npwp']=$row['npwp'];
      $this->data['tagihan'] = $row['tagihan'];
      $this->data['date_pengiriman'] = $row['date_pengiriman'];
      $this->data['delivery_order'] = $row['Delivery_number'];
      $this->data['pengirim'] = $row['pengirim'];


      $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A5', 'defaultPageNumStyle' => '1',
        'margin_right' => '1',
        'margin_left' => '1',
        'margin_bottom' => '5',
        'margin_top' => '5',
      ]);

      $data = $this->load->view('delivery/print_delivery', $this->data, TRUE);





      $mpdf->WriteHTML($data);

      $mpdf->Output();
    }
  }
  public function hapus($id)
  {
    $id = $this->input->post("id");
    $this->db->select('*');
    $this->db->from('delivery');
    $this->db->where('id_delivery', $id);

    $data = $this->db->get()->row_array();
    $this->db->where('Delivery_number', $data['Delivery_number']);
    $this->db->delete('delivery');

    $this->db->where('delivery_number', $data['Delivery_number']);
    $this->db->delete('delivery_item');
  }

  function cekDelivery()
  {
    $quotation_number = $this->input->post('quotation_number');
    $this->db->select('*');
    $this->db->from('bast');
    $this->db->where('id_bast', $quotation_number);
    $data = $this->db->get()->row_array();
    $this->db->select('*');
    $this->db->from('delivery');
    $this->db->where('id_bast', $quotation_number);
    $data1 = $this->db->get()->row_array();
    if (($data1 != '')) {


      $result['status'] = "tersedia";
      $result['quotation_number'] = $data['quotation_number'];
      $result['id_delivery'] = $data1['id_delivery'];
    } else {
      $result['status'] = "kosong";
      $result['quotation_number'] = $data['quotation_number'];
    }
    echo json_encode($result);
  }
  function cekDelivery1()
  {
    $quotation_number = $this->input->post('quotation_number');
    $delivery_order = $this->input->post('delivery_order');

    $this->db->select('quotation_number');
    $this->db->from('delivery');
    $this->db->where('id_bast', $quotation_number);
    $data1 = $this->db->get()->row_array();
    // $json= json_encode($data1);

    if ($data1 != '') {

      $result['status'] = "tersediaQ";
    } else {
      $this->db->select("*");
      $this->db->from('delivery');
      $this->db->where('Delivery_number', $delivery_order);
      $data2 = $this->db->get()->row_array();
      if ($data2 != '') {
        $result['status'] = "tersediaD";
      } else {
        $result['status'] = "kosong";
      }
    }
    echo json_encode($result);
  }



  public function TampilDatadelivery()
  {
    $this->load->model("model_delivery");
    $fetch_data = $this->model_delivery->make_datatables();
    $fetch_data_other = $this->model_delivery->make_datatables_other();
    $data = array();
    foreach ($fetch_data as $row) {
      if (in_array('updateDelivery', $this->permission)) {
        $edit = '<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" title="Edit" href="' . base_url('Delivery/edit_delivery/' . $row->quotation_number . '/' . $row->id_delivery) . '"  ><font color="white"><i class="fa fa-edit"></i></font> </a>';
      } else {
        $edit = '';
      }
      if (in_array('deleteDelivery', $this->permission)) {
        $delete = '<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" title="Delete" onclick="swetalert(' . $row->id_delivery . ')"><i class="fa fa-trash"></i><font size="2px"> </a>';
      } else {
        $delete = '';
      }
      if (in_array('viewDelivery', $this->permission)) {
        $print = '<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" title="Print"  href="' . base_url('Delivery/print_delivery/' . $row->quotation_number . '/' . $row->Delivery_number) . ' " target="_blank"><i class="fa fa-print"></i><font size="2px"> </a>';
      } else {
        $print = '';
      }


      if (in_array('viewDelivery', $this->permission) || in_array('statusDelivery', $this->permission)) {
        $view = '<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" title="View Data" href="' . base_url('Delivery/view_delivery/' . $row->quotation_number . '/' . $row->id_delivery) . '"><font color="white"><i class="fa fa-eye"></i></font> </a>';
      } else {
        $view = '';
      }
      // if (in_array('createFaktur', $this->permission) and $row->status == "Close") {
      //   $this->db->select('*');
      //   $this->db->from('delivery');
      //   $this->db->where('id_delivery', $row->id_delivery);
      //   $data1 = $this->db->get()->row_array();
      //   if ($data1 != '') {

      //     $faktur = '<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" title="Edit Faktur"   onclick="cekFaktur(' . $row->id_delivery . ')" ><i class="fa fa-check"></i>  Faktur</a></font>';
      //   } else {
      //     $faktur = '<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" title="Create Faktur"   onclick="cekFaktur(' . $row->id_delivery . ')" ><i class="fa fa-plus"></i>  Faktur</a></font>';
      //   }
      // } else {
      //   $faktur = '';
      // }







      if ($row->status == "Open") {
        $status = '<span class="label label-warning">Open</span>';
      } else if ($row->status == "Reject") {
        $status = '<span class="label label-danger">Reject</span>';
      } else if ($row->status == "Close") {
        $status = '<span class="label label-success">Close</span>';
      } else {
        $status = "";
      }
      if (($row->statusQuotations == "Final") and ($row->statusBast == "Close") and ($row->statusFaktur == "Close")) {
        $sub_array = array();
        $sub_array[] = $row->quotation_number;
        $sub_array[] = $row->Delivery_number;
        $sub_array[] = $row->date_pengiriman;
        $sub_array[] = $row->customer;
        $sub_array[] = $row->tittle_event;
        $sub_array[] = $row->gudang;


        $sub_array[] = $status;
        $sub_array[] = $row->noteStatus;

        $sub_array[] = '' . $edit . ' ' . $delete . ' ' . $print . ' ' . $view . '';

        $data[] = $sub_array;
      }
    }
    foreach ($fetch_data_other as $row) {
      if (in_array('updateDelivery', $this->permission)) {
        $edit = '<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" title="Edit" href="' . base_url('Delivery/edit_delivery/' . $row->quotation_number . '/' . $row->id_delivery) . '"   ><font color="white"><i class="fa fa-edit"></i></font> </a>';
      } else {
        $edit = '';
      }
      if (in_array('deleteDelivery', $this->permission)) {
        $delete = '<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" title="Delete" onclick="swetalert(' . $row->id_delivery . ')"><i class="fa fa-trash"></i><font size="2px"> </a>';
      } else {
        $delete = '';
      }
      if (in_array('viewDelivery', $this->permission)) {
        $print = '<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" title="Print"  href="' . base_url('Delivery/print_delivery/' . $row->quotation_number . '/' . $row->Delivery_number) . '" target="_blank"target="_blank"><i class="fa fa-print"></i><font size="2px"> </a>';
      } else {
        $print = '';
      }


      if (in_array('viewDelivery', $this->permission) || in_array('statusDelivery', $this->permission)) {
        $view = '<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" title="View Data" href="' . base_url('Delivery/view_delivery/' . $row->quotation_number . '/' . $row->id_delivery) . '"><font color="white"><i class="fa fa-eye"></i></font> </a>';
      } else {
        $view = '';
      }
      // if (in_array('createFaktur', $this->permission) and $row->status == "Close") {
      //   $this->db->select('*');
      //   $this->db->from('faktur');
      //   $this->db->where('id_delivery', $row->id_delivery);
      //   $data1 = $this->db->get()->row_array();
      //   if ($data1 != '') {

      //     $faktur = '<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" title="Edit Faktur"   onclick="cekFaktur(' . $row->id_delivery . ')" ><i class="fa fa-check"></i>  Faktur</a></font>';
      //   } else {
      //     $faktur = '<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" title="Create Faktur"   onclick="cekFaktur(' . $row->id_delivery . ')" ><i class="fa fa-plus"></i>  Faktur</a></font>';
      //   }
      // } else {
      //   $faktur = '';
      // }




      if ($row->status == "Open") {
        $status = '<span class="label label-warning">Open</span>';
      } else if ($row->status == "Reject") {
        $status = '<span class="label label-danger">Reject</span>';
      } else if ($row->status == "Close") {
        $status = '<span class="label label-success">Close</span>';
      } else {
        $status = "";
      }
      if (($row->statusQuotations == "Final") and ($row->statusBast == "Close") and ($row->statusFaktur == "Close")) {
        $sub_array = array();
        $sub_array[] = $row->quotation_number;
        $sub_array[] = $row->Delivery_number;
        $sub_array[] = $row->date_pengiriman;
        $sub_array[] = $row->customer;
        $sub_array[] = $row->tittle_event;
        $sub_array[] = $row->gudang;


        $sub_array[] = $status;
        $sub_array[] = $row->noteStatus;

        $sub_array[] = '' . $edit . ' ' . $delete . ' ' . $print . ' ' . $view . '';


        $data[] = $sub_array;
      }
    }
    $output = array(
      "draw"                    =>     intval($_POST["draw"]),
      "recordsTotal"          =>      $this->model_delivery->get_all_data(),
      "recordsFiltered"     =>     $this->model_delivery->get_filtered_data(),
      "data"                    =>     $data
    );
    echo json_encode($output);
  }
}
