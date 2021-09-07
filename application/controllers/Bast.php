<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Bast extends CI_Controller
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
    $this->load->library('aws3');

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
    redirect('Bast/create_bast', 'refresh');
  }



  public function upload_image_po($file_name)
  {
    $config['upload_path']          = './assets/imagebastpo/';

    $config["allowed_types"] = "*";
    $config['file_name'] =  $file_name;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('imgpo')) {
      $error = $this->upload->display_errors();
      return "";
    } else {

      $image_data = $this->upload->data();
      $type = explode('.', $_FILES['imgpo']['name']);
      $type = $type[count($type) - 1];
      $filename = $config['file_name'] . '.' . $type;
      $path = 'eo/bast/' . $filename;
      $image_data['file_name'] = $this->aws3->sendFile("arenzha", $_FILES['imgpo'], $path);
      $data = array('upload_data' =>  $image_data['file_name']);
      return $image_data['file_name'];
    }
  }

  //Save image other
  public function upload_image_gr($file_name)
  {
    $name = base64_encode(random_bytes(10));
    $config['upload_path']          = './assets/imagebastgr';
    $config["allowed_types"] = "*";
    $config['file_name'] =  $file_name;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('imggr')) {
      $error = $this->upload->display_errors();
      return "";
    } else {
      $image_data = $this->upload->data();
      $type = explode('.', $_FILES['imggr']['name']);
      $type = $type[count($type) - 1];
      $filename = $config['file_name'] . '.' . $type;
      $path = 'eo/bast/' . $filename;
      $image_data['file_name'] = $this->aws3->sendFile("arenzha", $_FILES['imggr'], $path);
      $data = array('upload_data' =>  $image_data['file_name']);
      return $image_data['file_name'];
    }
  }

  public function create_bast($id)
  {
    if (!in_array('createBast', $this->permission)) {
      redirect('dashboard', 'refresh');
    }
    $this->db->select('*');
    $this->db->from("quotations");
    $this->db->where('id', $id);
    $data1 = $this->db->get()->row_array();

    $this->form_validation->set_rules('Quatations_number', 'Quotation', 'required');
    $this->form_validation->set_message('is_unique', ' *{field} number telah digunakan');

    if ($this->form_validation->run() == false) {
      $this->data['Quotation'] = $this->db->get('quotations')->result();
      $this->data['quotation_number'] = $data1['quotation_number'];
      $this->load->view('tamplate/header', $this->data);
      $this->load->view('tamplate/sidebar', $this->data);
      $this->load->view('bast/add_bast', $this->data);
      $this->load->view('tamplate/footer', $this->data);
    } else {
      $this->aksi_add_bast();
    }
  }
  public function create_bast_other($id)
  {
    if (!in_array('createBast', $this->permission)) {
      redirect('dashboard', 'refresh');
    }
    $this->db->select('*');
    $this->db->from("quotation_other");
    $this->db->where('id', $id);
    $data1 = $this->db->get()->row_array();




    $this->form_validation->set_rules('Quatations_number', 'Quotation', 'required');
    //$this->form_validation->set_message('is_unique',' *{field} number telah digunakan');

    $this->data['quotation_number'] = $data1['quotation_number'];
    if ($this->form_validation->run() == false) {
      $this->data['Quotation'] = $this->db->get('quotations')->result();
      $this->load->view('tamplate/header', $this->data);
      $this->load->view('tamplate/sidebar', $this->data);
      $this->load->view('bast/add_bast', $this->data);
      $this->load->view('tamplate/footer', $this->data);
    } else {
      $this->aksi_add_bast();
    }
  }
  public function aksi_add_bast()
  {
    $date = new DateTime();
    $timestamp = $date->getTimestamp();
    $bast_number = $this->input->post('bast_number');

    $po_number = $this->input->post('po_number');
    $gr_number = $this->input->post('gr_number');
    $quotation_number = $this->input->post('Quatations_number');
    $date_bast = $this->input->post('date_bast');
    $date_po = $this->input->post('po_number');
    $upload_image_po = $this->upload_image_po($timestamp . '_po_' . $quotation_number);
    $upload_image_gr = $this->upload_image_gr($timestamp . '_gr_' . $quotation_number);
    if ($upload_image_po == '') {
      $upload_image_po = "dafault.png";
    }
    if ($upload_image_gr == '') {
      $upload_image_gr = "dafault.png";
    }
   
    $date = date("Y-m-d", strtotime($date_bast));

    $data = [
      'quotation_number' => $this->input->post('Quatations_number'),
      'gr_number' => $this->input->post('gr_number'),
      'po_number' => $this->input->post('po_number'),
      'pic_magenta' => $this->input->post('pic_magenta'),
      'jabatan_magenta' => $this->input->post('jabatan_magenta'),
      'pic_po' => $this->input->post('pic_po'),
      'bast_number' => $this->input->post('bast_number'),
      'date_po' => $this->input->post('date_po'),
      'date_bast' => $date_bast,
      'jabatan' => $this->input->post('jabatan_pic'),
      'image_gr' => $upload_image_gr,
      'image_po' => $upload_image_po,
      'status'=>"Close",
      'totalBast' => str_replace('.', '', $this->input->post('totalBast')),

    ];
    //<?php echo "IDR ".number_format($total,0,",",".");
    $totalBast = str_replace('.', '', $this->input->post('totalBast'));
    // $subtotal=(str_replace('.', '', $k->subtotal))
    $sisaBast = str_replace('.', '', $this->input->post('total_summary'));
    $sisa = $sisaBast - $totalBast;

    $idd = substr($quotation_number, 0, 2);
    $where = array("quotation_number" => $quotation_number);
    $sisa1 = $this->input->post('total_summary');
    $dataupdate = array("sisa_bast" => str_replace('.', '', $this->input->post('sisaBast')));
    if ($idd == "QE") {
      $this->db->where($where);
      $this->db->update('quotations', $dataupdate);
      $this->db->insert('bast', $data);
      $this->session->set_flashdata('success', 'Successfully Created');
  
      redirect('Bast/manage_bast_event', 'refresh');
    } else {
      $this->db->where($where);
      $this->db->update('quotation_other', $dataupdate);
      $this->db->insert('bast', $data);
      $this->session->set_flashdata('success', 'Successfully Created');
  
      redirect('Bast/manage_bast_other', 'refresh');
    }

  
  }
  public function manage_bast_event()
  {
    if ((!in_array('updateBast', $this->permission)) and (!in_array('deleteBast', $this->permission)) and (!in_array('viewBast', $this->permission))) {
      redirect('dashboard', 'refresh');
    }

    $id = $this->session->userdata('id');
    $group_data = $this->model_groups->getGroupData($id);
    $this->data['group_data'] = $group_data;
    // $this->data['bast']=$this->db->get('bast')->result();

    // $this->db->select('bast_number,bast.quotation_number as quotation_number,gr_number,bast.po_number,customer_event as customer,tittle_event,date_bast,bast.status as status,quotations.status as statusQuotations,total_summary,id_bast,image_po,image_gr,id_bast');
    // $this->db->from('quotations');
    // $this->db->join('bast', 'quotations.quotation_number = bast.quotation_number');
    // $this->data['bast'] = $this->db->get()->result();

    // $this->db->select('bast_number,bast.quotation_number as quotation_number,gr_number,bast.po_number,customer_event as customer,tittle_event,date_bast,bast.status as status,quotation_other.status as statusQuotations,total,id_bast,image_po,image_gr,quotation_other.image,id_bast');
    // $this->db->from('quotation_other');
    // $this->db->join('bast', 'quotation_other.quotation_number = bast.quotation_number');
    // $this->data['bast_other'] = $this->db->get()->result();
    $this->load->view('tamplate/header', $this->data);
    $this->load->view('tamplate/sidebar', $this->data);
    $this->load->view('bast/manage_bast_event', $this->data);
    $this->load->view('tamplate/footer', $this->data);
  }

  public function manage_bast_other()
  {
    if ((!in_array('updateBast', $this->permission)) and (!in_array('deleteBast', $this->permission)) and (!in_array('viewBast', $this->permission))) {
      redirect('dashboard', 'refresh');
    }

    $id = $this->session->userdata('id');
    $group_data = $this->model_groups->getGroupData($id);
    $this->data['group_data'] = $group_data;
    // $this->data['bast']=$this->db->get('bast')->result();

    // $this->db->select('bast_number,bast.quotation_number as quotation_number,gr_number,bast.po_number,customer_event as customer,tittle_event,date_bast,bast.status as status,quotations.status as statusQuotations,total_summary,id_bast,image_po,image_gr,id_bast');
    // $this->db->from('quotations');
    // $this->db->join('bast', 'quotations.quotation_number = bast.quotation_number');
    // $this->data['bast'] = $this->db->get()->result();

    // $this->db->select('bast_number,bast.quotation_number as quotation_number,gr_number,bast.po_number,customer_event as customer,tittle_event,date_bast,bast.status as status,quotation_other.status as statusQuotations,total,id_bast,image_po,image_gr,quotation_other.image,id_bast');
    // $this->db->from('quotation_other');
    // $this->db->join('bast', 'quotation_other.quotation_number = bast.quotation_number');
    // $this->data['bast_other'] = $this->db->get()->result();
    $this->load->view('tamplate/header', $this->data);
    $this->load->view('tamplate/sidebar', $this->data);
    $this->load->view('bast/manage_bast_other', $this->data);
    $this->load->view('tamplate/footer', $this->data);
  }


  public function hapus($id)
  {



    $id = $this->input->post("id");
    $this->db->select('*');
    $this->db->from('bast');
    $this->db->where('id_bast', $id);
    //update sisa bast quotation
    $data = $this->db->get()->row_array();
    $quotation_number = $data['quotation_number'];
    $totalBast = $data['totalBast'];
    $idd = substr($quotation_number, 0, 2);
    $where = array("quotation_number" => $quotation_number);
    if ($idd == "QE") {
      $this->db->select('*');
      $this->db->from('quotations');
      $this->db->where('quotation_number', $quotation_number);
      $data = $this->db->get()->row_array();

      $sisaBast = $data['sisa_bast'];
      $totalSisa = $sisaBast + str_replace('.', '', $totalBast);
      $dataupdate = array("sisa_bast" => $totalSisa);
      $this->db->where($where);
      $this->db->update('quotations', $dataupdate);
    } else {
      $this->db->select('*');
      $this->db->from('quotation_other');
      $this->db->where('quotation_number', $quotation_number);
      $data = $this->db->get()->row_array();
      $sisaBast = $data['sisa_bast'];
      $totalSisa = $sisaBast + str_replace('.', '', $totalBast);
      $dataupdate = array("sisa_bast" => $totalSisa);
      $this->db->where($where);
      $this->db->update('quotation_other', $dataupdate);
    }
    //delete bast

    $this->db->where('id_bast', $id);
    $this->db->delete('bast');



    //delete faktur
    $this->db->select('*');
    $this->db->from('faktur');
    $this->db->where('id_bast', $id);
    $data = $this->db->get()->row_array();
    $this->db->where('faktur_number', $data['faktur_number']);
    $this->db->delete('faktur_item');
    $this->db->where('id_bast', $id);
    $this->db->delete('faktur');


    //delete delivery
    $this->db->select('*');
    $this->db->from('delivery');
    $this->db->where('id_faktur', $data['id_faktur']);
    $data1 = $this->db->get()->row_array();
    $this->db->where('faktur_number', $data['faktur_number']);
    $this->db->delete('delivery');
    $this->db->where('quotation_number', $data1['Delivery_number']);
    $this->db->delete('delivery_item');
    unlink("assets/imagebastpo/" . $data['image_po']);
    unlink("assets/imagebastgr/" . $data['image_gr']);
    unlink("assets/imagefaktur/" . $data['image_po']);
  }
  public function edit_bast($quotation_number, $id)
  {
    if ((!in_array('updateBast', $this->permission))) {
      redirect('dashboard', 'refresh');
    }

    $idd = substr($quotation_number, 0, 2);
    if ($idd == "QE") {

      $this->db->select('venue_event,netto,date_event,total_summary,bast.status as statusBast,image_gr,image_po,bast.quotation_number as quotation_number,date_quotation,customer,tittle_event,bast_number,gr_number,bast.po_number,date_bast,jabatan,pic_magenta,jabatan_magenta,date_po,pic_po,id_bast,totalBast,quotations.sisa_bast');
      $this->db->from('bast');
      $this->db->join('quotations', 'quotations.quotation_number = bast.quotation_number');
      $this->db->where('bast.id_bast', $id);
      $row = $this->db->get()->row_array();
      $this->data['venue_event'] = $row['venue_event'];
      $this->data['date_event'] = $row['date_event'];
      $this->data['total_summary'] = $row['total_summary'];
      $this->data['netto'] = $row['netto'];
    } else {
      $this->db->select('total,bast.status as statusBast,image_gr,image_po,bast.quotation_number as quotation_number,date_quotation,customer,tittle_event,bast_number,gr_number,bast.po_number,date_bast,jabatan,pic_magenta,jabatan_magenta,date_po,pic_po,id_bast,totalBast,quotation_other.sisa_bast,netto');
      $this->db->from('bast');
      $this->db->join('quotation_other', 'quotation_other.quotation_number = bast.quotation_number');
      $this->db->where('bast.id_bast', $id);
      $row = $this->db->get()->row_array();
      $this->data['total_summary'] = $row['total'];
      $this->data['venue_event'] = "";
      $this->data['date_event'] = "";
      $this->data['netto'] = $row['netto'];
    }
    $this->data['sisa_bast'] = $row['sisa_bast'];
    $this->data['totalBast'] = $row['totalBast'];
    $this->db->select('*');
    $this->db->from('bast');
    $this->db->where('quotation_number', $quotation_number);
    $img = $this->db->get()->row_array();
    $this->data['imggr'] = $img['image_gr'];
    $this->data['imgpo'] = $img['image_po'];


    $this->data['bast_number'] = $row['bast_number'];
    $this->data['quotation_number'] = $row['quotation_number'];
    $this->data['date_quotation'] = $row['date_quotation'];
    $this->data['customer'] = $row['customer'];
    $this->data['title_event'] = $row['tittle_event'];



    $this->data['bast_number'] = $row['bast_number'];
    $this->data['gr_number'] = $row['gr_number'];
    $this->data['po_number'] = $row['po_number'];
    $this->data['date_bast'] = $row['date_bast'];
    $this->data['pic_customer'] = $row['customer'];
    $this->data['jabatan_pic'] = $row['jabatan'];
    $this->data['pic_magenta'] = $row['pic_magenta'];
    $this->data['jabatan_magenta'] = $row['jabatan_magenta'];
    $this->data['date_po'] = $row['date_po'];
    $this->data['pic_po'] = $row['pic_po'];
    $this->data['id'] = $row['id_bast'];
    $this->data['status'] = $row['statusBast'];

    $this->form_validation->set_rules('Quatations_number', 'Quotation', 'required');

    if ($this->form_validation->run() == false) {
      $id_group = $this->session->userdata('id');
      $group_data = $this->model_groups->getGroupData($id_group);

      $this->data['group_data'] = $group_data;
      $this->load->view('tamplate/header', $this->data);
      $this->load->view('tamplate/sidebar', $this->data);
      $this->load->view('bast/edit_bast', $this->data);
      $this->load->view('tamplate/footer', $this->data);
    } else {
      $this->aksi_update_bast($id);
    }
  }

  public function view_bast($quotation_number, $id)
  {
    if ((!in_array('viewBast', $this->permission)) and (!in_array('statusBast', $this->permission))) {
      redirect('dashboard', 'refresh');
    }
    $this->data['id_bast'] = $id;

    $idd = substr($quotation_number, 0, 2);
    if ($idd == "QE") {

      $this->db->select('venue_event,date_event,total_summary,bast.status as statusBast,image_gr,image_po,bast.quotation_number as quotation_number,date_quotation,customer,tittle_event,bast_number,gr_number,bast.po_number,date_bast,jabatan,pic_magenta,jabatan_magenta,date_po,pic_po,id_bast,quotations.sisa_bast,bast.totalBast,netto');
      $this->db->from('bast');
      $this->db->join('quotations', 'quotations.quotation_number = bast.quotation_number');
      $this->db->where('id_bast', $id);
      $row = $this->db->get()->row_array();
      $this->data['venue_event'] = $row['venue_event'];
      $this->data['date_event'] = $row['date_event'];
      $this->data['total_summary'] = $row['total_summary'];
      $this->data['netto'] = $row['netto'];
    } else {
      $this->db->select('total,bast.status as statusBast,image_gr,image_po,bast.quotation_number as quotation_number,date_quotation,customer,tittle_event,bast_number,gr_number,bast.po_number,date_bast,jabatan,pic_magenta,jabatan_magenta,date_po,pic_po,id_bast,quotation_other.sisa_bast,bast.totalBast,netto');
      $this->db->from('bast');
      $this->db->join('quotation_other', 'quotation_other.quotation_number = bast.quotation_number');
      $this->db->where('id_bast', $id);
      $row = $this->db->get()->row_array();
      $this->data['total_summary'] = $row['total'];
      $this->data['venue_event'] = "";
      $this->data['date_event'] = "";
      $this->data['netto'] = $row['netto'];
    }
    $this->data['sisaBast'] = $row['sisa_bast'];
    $this->data['totalBast'] = $row['totalBast'];
    $this->db->select('*');
    $this->db->from('bast');
    $this->db->where('quotation_number', $quotation_number);
    $img = $this->db->get()->row_array();
    $this->data['imggr'] = $img['image_gr'];
    $this->data['imgpo'] = $img['image_po'];


    $this->data['bast_number'] = $row['bast_number'];
    $this->data['quotation_number'] = $row['quotation_number'];
    $this->data['date_quotation'] = $row['date_quotation'];
    $this->data['customer'] = $row['customer'];
    $this->data['title_event'] = $row['tittle_event'];



    $this->data['bast_number'] = $row['bast_number'];
    $this->data['gr_number'] = $row['gr_number'];
    $this->data['po_number'] = $row['po_number'];
    $this->data['date_bast'] = $row['date_bast'];
    $this->data['pic_customer'] = $row['customer'];
    $this->data['jabatan_pic'] = $row['jabatan'];
    $this->data['pic_magenta'] = $row['pic_magenta'];
    $this->data['jabatan_magenta'] = $row['jabatan_magenta'];
    $this->data['date_po'] = $row['date_po'];
    $this->data['pic_po'] = $row['pic_po'];
    $this->data['id'] = $row['id_bast'];
    $this->data['status'] = $row['statusBast'];





    $this->form_validation->set_rules('Quatations_number', 'Quotation', 'required');


    $id_group = $this->session->userdata('id');
    $group_data = $this->model_groups->getGroupData($id_group);

    $this->data['group_data'] = $group_data;
    $this->load->view('tamplate/header', $this->data);
    $this->load->view('tamplate/sidebar', $this->data);
    $this->load->view('bast/view_bast', $this->data);
    $this->load->view('tamplate/footer', $this->data);
  }

  public function aksi_update_bast($id)
  {
    $quotation_number = $this->input->post('Quatations_number');
    $date_bast = $this->input->post('date_bast');
    $date_po = $this->input->post('po_number');
    $bast_number = $this->input->post('bast_number');
    $po_number = $this->input->post('po_number');
    $gr_number = $this->input->post('gr_number');

    $upload_image_po = $this->upload_image_po($bast_number . '-' . $date_bast . '-' . $po_number);
    $upload_image_gr = $this->upload_image_gr($bast_number . '-' . $gr_number);


    if (($upload_image_po == '') and ($upload_image_gr == '')) {
      $data = [
        'quotation_number' => $this->input->post('Quatations_number'),
        'gr_number' => $this->input->post('gr_number'),
        'po_number' => $this->input->post('po_number'),
        'pic_magenta' => $this->input->post('pic_magenta'),
        'jabatan_magenta' => $this->input->post('jabatan_magenta'),
        'pic_po' => $this->input->post('pic_po'),
        'bast_number' => $this->input->post('bast_number'),
        'date_po' => $this->input->post('date_po'),
        'date_bast' => $this->input->post('date_bast'),
        'jabatan' => $this->input->post('jabatan_pic'),
        'totalBast' => str_replace('.', '', $this->input->post('totalBast')),
      ];
    } else if (($upload_image_po != '') and ($upload_image_gr == '')) {
      $data = [
        'quotation_number' => $this->input->post('Quatations_number'),
        'gr_number' => $this->input->post('gr_number'),
        'po_number' => $this->input->post('po_number'),
        'pic_magenta' => $this->input->post('pic_magenta'),
        'jabatan_magenta' => $this->input->post('jabatan_magenta'),
        'pic_po' => $this->input->post('pic_po'),
        'bast_number' => $this->input->post('bast_number'),
        'date_po' => $this->input->post('date_po'),
        'date_bast' => $this->input->post('date_bast'),
        'jabatan' => $this->input->post('jabatan_pic'),
        'totalBast' => str_replace('.', '', $this->input->post('totalBast')),
        'image_po' => $upload_image_po


      ];
    } else if (($upload_image_po == '') and ($upload_image_gr != '')) {
      $data = [
        'quotation_number' => $this->input->post('Quatations_number'),
        'gr_number' => $this->input->post('gr_number'),
        'po_number' => $this->input->post('po_number'),
        'pic_magenta' => $this->input->post('pic_magenta'),
        'jabatan_magenta' => $this->input->post('jabatan_magenta'),
        'pic_po' => $this->input->post('pic_po'),
        'bast_number' => $this->input->post('bast_number'),
        'date_po' => $this->input->post('date_po'),
        'date_bast' => $this->input->post('date_bast'),
        'jabatan' => $this->input->post('jabatan_pic'),
        'totalBast' => str_replace('.', '', $this->input->post('totalBast')),
        'image_gr' => $upload_image_gr
      ];
    } else {
      $data = [
        'quotation_number' => $this->input->post('Quatations_number'),
        'gr_number' => $this->input->post('gr_number'),
        'po_number' => $this->input->post('po_number'),
        'pic_magenta' => $this->input->post('pic_magenta'),
        'jabatan_magenta' => $this->input->post('jabatan_magenta'),
        'pic_po' => $this->input->post('pic_po'),
        'bast_number' => $this->input->post('bast_number'),
        'date_po' => $this->input->post('date_po'),
        'date_bast' => $this->input->post('date_bast'),
        'totalBast' => str_replace('.', '', $this->input->post('totalBast')),
        'jabatan' => $this->input->post('jabatan_pic'),
        'image_gr' => $upload_image_gr,
        'image_po' => $upload_image_po


      ];
    }



    $where = array("id_bast" => $id);
    $this->db->where($where);
    $this->db->update('bast', $data);
    $this->session->set_flashdata('success', 'Successfully updated');

    $totalBast = str_replace('.', '', $this->input->post('totalBast'));
    $sisaBast = str_replace('.', '', $this->input->post('total_summary'));

    $sisa = $sisaBast - $totalBast;
    $idd = substr($quotation_number, 0, 2);
    $where = array("quotation_number" => $quotation_number);
    $sisa1 = number_format($sisa, 0, ",", ".");
    $dataupdate = array("sisa_bast" =>  str_replace('.', '', $this->input->post('sisaBast')));

    if ($idd == "QE") {
      $this->db->where($where);
      $this->db->update('quotations', $dataupdate);

      redirect('Bast/manage_bast_event', 'refresh');
      $this->session->set_flashdata('success', 'Successfully updated');
    } else {
      $this->db->where($where);
      $this->db->update('quotation_other', $dataupdate);
      
      redirect('Bast/manage_bast_other', 'refresh');
      $this->session->set_flashdata('success', 'Successfully updated');
    }

   
  }


  public function AmbilDataQuotation()
  {
    $quotatoion_number = $this->input->post("quotation_number");
    $this->db->select('*');
    $this->db->from('quotations');
    $this->db->join('pic_event', 'pic_event.
      	  	id_event = quotations.id_pic_event');
    $this->db->where('quotations.quotation_number', $quotatoion_number);

    $dataa = $this->db->get()->result();
    echo json_encode($dataa);
  }
  public function AmbilDataQuotationOther()
  {
    $quotatoion_number = $this->input->post("quotation_number");
    $this->db->select('*');
    $this->db->from('quotation_other');
    $this->db->join('pic_event', 'pic_event.id_event = quotation_other.id_event');
    $this->db->where('quotation_other.quotation_number', $quotatoion_number);

    $dataa = $this->db->get()->result();
    echo json_encode($dataa);
  }

  public function print_bast($quotation_number, $id)
  {
    if ((!in_array('viewBast', $this->permission))) {
      redirect('dashboard', 'refresh');
    }
    $idd = substr($quotation_number, 0, 2);
    if ($idd == "QE") {


      $this->db->select('*');
      $this->db->from('bast');
      $this->db->join('quotations', 'quotations.quotation_number = bast.quotation_number');
      $this->db->join('customer', 'customer.id = quotations.id_customer');
      $this->db->where('bast.id_bast', $id);

      // $this->db->join('fa','faktur.quotation_number = quotations.quotation_number');  
      $row = $this->db->get()->row_array();



      $this->data['bast_number'] = $row['bast_number'];
      $this->data['totalBast'] = $row['totalBast'];
      $this->data['customer'] = $row['customer'];
      $this->data['tgl_bast'] = $row['date_bast'];
      $this->data['gr_number'] = $row['gr_number'];
      $this->data['po_number'] = $row['po_number'];
      // $this->data['npwp']=$row['npwp'];
      $this->data['date_event'] = $row['date_event'];
      $this->data['jabatan_pic'] = $row['jabatan'];
      $this->data['jabatan_magenta'] = $row['jabatan_magenta'];

      // $this->data['customer']=$row['customer'];
      // $this->data['pic_po']=$row['pic_name'];
      $this->data['customer'] = $row['customer_event'];
      $this->data['pic_po'] = $row['pic_po'];


      $this->data['pic_magenta'] = $row['pic_magenta'];
      $this->data['alamat'] = $row['address'];
      $this->data['total'] = $row['total_summary'];
      $this->data['title_event'] = $row['tittle_event'];
      //   $this->load->view('tamplate/header1',$this->data);
      //  //$this->load->view('tamplate/sidebar',$this->data);
      //  $this->load->view('bast/print_bast',$this->data);
      // $this->load->view('tamplate/footer1',$this->data);


      $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'defaultPageNumStyle' => '1']);

      $data = $this->load->view('bast/print_bast', $this->data, TRUE);





      $mpdf->WriteHTML($data);

      $mpdf->Output();
    } else {


      $this->db->select('*');
      $this->db->from('bast');
      $this->db->join('quotation_other', 'quotation_other.quotation_number = bast.quotation_number');
      $this->db->join('customer', 'customer.name = quotation_other.customer');
      $this->db->where('bast.id_bast', $id);

      // $this->db->join('fa','faktur.quotation_number = quotations.quotation_number');  
      $row = $this->db->get()->row_array();



      $this->data['bast_number'] = $row['bast_number'];
      $this->data['totalBast'] = $row['totalBast'];
      $this->data['customer'] = $row['customer'];
      $this->data['tgl_bast'] = $row['date_bast'];
      $this->data['gr_number'] = $row['gr_number'];
      $this->data['po_number'] = $row['po_number'];
      // $this->data['npwp']=$row['npwp'];
      $this->data['date_event'] = $row['date_quotation'];
      $this->data['jabatan_pic'] = $row['jabatan'];
      $this->data['jabatan_magenta'] = $row['jabatan_magenta'];
      $this->data['pic_po'] = $row['pic_po'];
      $this->data['pic_magenta'] = $row['pic_magenta'];
      $this->data['alamat'] = $row['address'];
      $this->data['total'] = $row['total'];
      $this->data['title_event'] = $row['tittle_event'];
      //     $this->load->view('tamplate/header1',$this->data);
      //  //$this->load->view('tamplate/sidebar',$this->data);
      //  $this->load->view('bast/print_bast_other',$this->data);
      // $this->load->view('tamplate/footer1',$this->data);

      $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'defaultPageNumStyle' => '1']);

      $data = $this->load->view('bast/print_bast_other', $this->data, TRUE);





      $mpdf->WriteHTML($data);

      $mpdf->Output();
    }
  }

  //Save image other





  function cekBast1()
  {
    $id = $this->input->post('quotation_number');
    $idd = substr($id, 0, 2);
    if ($idd == "QE") {

      $this->db->select('*');
      $this->db->from('quotations');
      $this->db->where('quotation_number', $id);
      $data = $this->db->get()->row_array();
    } else {

      $this->db->select('*');
      $this->db->from('quotation_other');
      $this->db->where('quotation_number', $id);
      $data = $this->db->get()->row_array();
    }






    $this->db->select('quotation_number');
    $this->db->from('bast');
    $this->db->where('quotation_number', $id);
    $data1 = $this->db->get()->row_array();

    if (($data1 != '') and ($data['sisa_bast'] == '0')) {

      $result['status'] = "tersedia";
      $result['quotation_number'] = $id;
    } else {
      $result['status'] = "kosong";
      $result['quotation_number'] = $id;
    }
    echo json_encode($result);
  }

  function cekBast()
  {
    $id = $this->input->post('quotation_number');
    $this->db->select('*');
    $this->db->from('quotations');

    $this->db->where('id', $id);
    $data = $this->db->get()->row_array();



    $this->db->select('quotation_number');
    $this->db->from('bast');
    $this->db->where('quotation_number', $data['quotation_number']);
    $data1 = $this->db->get()->row_array();

    if (($data1 != '') and ($data['sisa_bast'] == '0')) {

      $result['status'] = "tersedia";
      $result['quotation_number'] = $data['quotation_number'];
    } else {
      $result['status'] = "kosong";
      $result['quotation_number'] = $data['quotation_number'];
    }
    echo json_encode($result);
  }
  function cekBastother()
  {
    $id = $this->input->post('quotation_number');
    $this->db->select('*');
    $this->db->from('quotation_other');

    $this->db->where('id', $id);
    $data = $this->db->get()->row_array();



    $this->db->select('quotation_number');
    $this->db->from('bast');
    $this->db->where('quotation_number', $data['quotation_number']);
    $data1 = $this->db->get()->row_array();

    if (($data1 != '') and ($data['sisa_bast'] == '0')) {

      $result['status'] = "tersedia";
      $result['quotation_number'] = $data['quotation_number'];
    } else {
      $result['status'] = "kosong";
      $result['quotation_number'] = $data['quotation_number'];
    }
    echo json_encode($result);
  }
  function getStatus()
  {
    $quotation_number = $this->input->post('quotation_number');
    $this->db->select("status");
    $this->db->from('bast');
    $this->db->where('id_bast', $quotation_number);
    $data = $this->db->get()->result();
    echo json_encode($data);
  }
  function updateStatus()
  {

    $status = $this->input->post('status');
    $quotation_number = $this->input->post('quotation_number');
    $note = $this->input->post('note');

    $where = array('id_bast' => $quotation_number);
    $data = [
      'status' => $status,
      'noteStatus' => $note
    ];
    $this->db->where($where);
    $update = $this->db->update('bast', $data);

    if ($update) {
      $result['pesan'] = "1";
    } else {
      $result['pesan'] = "0";
    }


    echo  json_encode($result);
  }

  public function TampilDatabastevent()
  {
    $this->load->model("model_bast");
    $fetch_data = $this->model_bast->make_datatables();





    $data = array();
    foreach ($fetch_data as $row) {

      if (in_array('updateBast', $this->permission)) {
        $edit = '<font color="#FFFFFF" size="2px"><a title="Edit" class="btn btn-sm bg-gradient-secondary" title="Edit" href="' . base_url('bast/edit_bast/' . $row->quotation_number . '/' . $row->id_bast) . '"><font color="white"><i class="fa fa-edit"></i> </font></a>';
      } else {
        $edit = '';
      }
      if (in_array('deleteBast', $this->permission)) {
        $delete = '<font color="#FFFFFF" size="2px"><a title="Delete" class="btn btn-sm bg-gradient-secondary" onclick="swetalert(' . $row->id_bast . ')"><i class="fa fa-trash"></i><font size="2px"> </font></a></font>';
      } else {
        $delete = '';
      }
      if (in_array('viewBast', $this->permission)) {
        $print = '<font color="#FFFFFF" size="2px"><a title="Print"  class="btn btn-sm bg-gradient-secondary" href="' . base_url('Bast/print_bast/' . $row->quotation_number . '/' . $row->id_bast) . '"  target="_blank"><i class="fa fa-print"></i><font size="2px"> </a>';
      } else {
        $print = '';
      }

      if (in_array('createFaktur', $this->permission)) {

        $this->db->select('*');
        $this->db->from('faktur');
        $this->db->where('id_bast', $row->id_bast);
        $data1 = $this->db->get()->row_array();


        if ($data1 != '') {

          $faktur = '<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" title="Edit Faktur"   onclick="cekFaktur(' . $row->id_bast . ')" ><i class="fa fa-check"></i>  Faktur</a></font>';
        } else {
          $faktur = '<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" title="Create Faktur"   onclick="cekFaktur(' . $row->id_bast . ')" ><i class="fa fa-plus"></i>  Faktur</a></font>';
        }
      } else {
        $faktur = '';
      }

      if (in_array('createDelivery', $this->permission) and $row->status == "Close") {
        $this->db->select('*');
        $this->db->from('delivery');
        $this->db->where('id_bast', $row->id_bast);


        $data1 = $this->db->get()->row_array();
        if (($data1 != '') and ($data1['id_bast'] == $row->id_bast)) {
          $delivery = '<font color="#FFFFFF" size="2px"><a title="Edit Delivery" class="btn btn-sm bg-gradient-secondary" onclick="cekDelivery(' . $row->id_bast . ')" ><i class="fa fa-check"></i>   Delivery</a></font>';
        } else {
          $delivery = '<font color="#FFFFFF" size="2px"><a title="Create Delivery" class="btn btn-sm bg-gradient-secondary" onclick="cekDelivery(' . $row->id_bast . ')" ><i class="fa fa-plus"></i>   Delivery</a></font>';
        }
      } else {
        $delivery = '';
      }




      if (in_array('viewBast', $this->permission) || in_array('statusBast', $this->permission)) {
        $view = '<font color="#FFFFFF" size="2px"><a href="' . base_url('bast/view_bast/' . $row->quotation_number . '/' . $row->id_bast) . '" title="View Data" class="btn btn-sm bg-gradient-secondary"><i class="fa fa-eye"></i><font size="2px"> </font></a></font>';
      } else {
        $view = '';
      }




      if ($row->status == "Open") {
        $status = '<span class="label label-warning">Open</span>';
      } else if ($row->status == "Reject") {
        $status = '<span class="label label-danger">Reject</span>';
      } else if ($row->status == "Close") {
        $status = '<span class="label label-success">Close</span>';
      } else {
        $status = "";
      }
      if ($row->statusQuotations == "Final") {
        $sub_array = array();
        // $sub_array[] = '<p hidden>'.$row->id_bast.'</p>';

        $sub_array[] = $row->quotation_number;
        $sub_array[] = $row->bast_number;
        $sub_array[] = $row->date_bast;
        // $sub_array[] = $row->gr_number; 
        // $sub_array[] = $row->po_number;
        $sub_array[] = $row->customer;
        $sub_array[] = $row->tittle_event;
        $sub_array[] = $row->po_number_bast;
        $sub_array[] = $row->gr_number;
        $sub_array[] = number_format($row->total, 0, ",", ".");
        // $sub_array[] = $status;
        // $sub_array[] = $row->noteStatus;
        $sub_array[] = $edit . ' ' . $delete . ' ' . $print . ' ' . $view . ' ' . $faktur . ' ' . $delivery;
        $sub_array[] = "";
        $data[] = $sub_array;
      }
    }
 
    $output = array(
      "draw"                    =>     intval($_POST["draw"]),
      "recordsTotal"          =>      $this->model_bast->get_all_data(),
      "recordsFiltered"     =>     $this->model_bast->get_filtered_data(),
      "data"                    =>     $data
    );
    echo json_encode($output);
  }



  public function TampilDatabastother()
  {
    $this->load->model("model_bast");
    $fetch_data = $this->model_bast->make_datatables_other();





    $data = array();
    foreach ($fetch_data as $row) {

      if (in_array('updateBast', $this->permission)) {
        $edit = '<font color="#FFFFFF" size="2px"><a title="Edit" class="btn btn-sm bg-gradient-secondary" title="Edit" href="' . base_url('bast/edit_bast/' . $row->quotation_number . '/' . $row->id_bast) . '"><font color="white"><i class="fa fa-edit"></i> </font></a>';
      } else {
        $edit = '';
      }
      if (in_array('deleteBast', $this->permission)) {
        $delete = '<font color="#FFFFFF" size="2px"><a title="Delete" class="btn btn-sm bg-gradient-secondary" onclick="swetalert(' . $row->id_bast . ')"><i class="fa fa-trash"></i><font size="2px"> </font></a></font>';
      } else {
        $delete = '';
      }
      if (in_array('viewBast', $this->permission)) {
        $print = '<font color="#FFFFFF" size="2px"><a title="Print"  class="btn btn-sm bg-gradient-secondary" href="' . base_url('Bast/print_bast/' . $row->quotation_number . '/' . $row->id_bast) . '"  target="_blank"><i class="fa fa-print"></i><font size="2px"> </a>';
      } else {
        $print = '';
      }

      if (in_array('createFaktur', $this->permission)) {

        $this->db->select('*');
        $this->db->from('faktur');
        $this->db->where('id_bast', $row->id_bast);
        $data1 = $this->db->get()->row_array();


        if ($data1 != '') {

          $faktur = '<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" title="Edit Faktur"   onclick="cekFaktur(' . $row->id_bast . ')" ><i class="fa fa-check"></i>  Faktur</a></font>';
        } else {
          $faktur = '<font color="#FFFFFF" size="2px"><a class="btn btn-sm bg-gradient-secondary" title="Create Faktur"   onclick="cekFaktur(' . $row->id_bast . ')" ><i class="fa fa-plus"></i>  Faktur</a></font>';
        }
      } else {
        $faktur = '';
      }

      if (in_array('createDelivery', $this->permission) and $row->status == "Close") {
        $this->db->select('*');
        $this->db->from('delivery');
        $this->db->where('id_bast', $row->id_bast);


        $data1 = $this->db->get()->row_array();
        if (($data1 != '') and ($data1['id_bast'] == $row->id_bast)) {
          $delivery = '<font color="#FFFFFF" size="2px"><a title="Edit Delivery" class="btn btn-sm bg-gradient-secondary" onclick="cekDelivery(' . $row->id_bast . ')" ><i class="fa fa-check"></i>   Delivery</a></font>';
        } else {
          $delivery = '<font color="#FFFFFF" size="2px"><a title="Create Delivery" class="btn btn-sm bg-gradient-secondary" onclick="cekDelivery(' . $row->id_bast . ')" ><i class="fa fa-plus"></i>   Delivery</a></font>';
        }
      } else {
        $delivery = '';
      }




      if (in_array('viewBast', $this->permission) || in_array('statusBast', $this->permission)) {
        $view = '<font color="#FFFFFF" size="2px"><a href="' . base_url('bast/view_bast/' . $row->quotation_number . '/' . $row->id_bast) . '" title="View Data" class="btn btn-sm bg-gradient-secondary"><i class="fa fa-eye"></i><font size="2px"> </font></a></font>';
      } else {
        $view = '';
      }




      if ($row->status == "Open") {
        $status = '<span class="label label-warning">Open</span>';
      } else if ($row->status == "Reject") {
        $status = '<span class="label label-danger">Reject</span>';
      } else if ($row->status == "Close") {
        $status = '<span class="label label-success">Close</span>';
      } else {
        $status = "";
      }
      if ($row->statusQuotations == "Final") {
        $sub_array = array();
        // $sub_array[] = '<p hidden>'.$row->id_bast.'</p>';

        $sub_array[] = $row->quotation_number;
        $sub_array[] = $row->bast_number;
        $sub_array[] = $row->date_bast;
        // $sub_array[] = $row->gr_number; 
        // $sub_array[] = $row->po_number;
        $sub_array[] = $row->customer;
        $sub_array[] = $row->tittle_event;
        $sub_array[] = $row->po_number_bast;
        $sub_array[] = $row->gr_number;
        $sub_array[] = number_format($row->total, 0, ",", ".");
        // $sub_array[] = $status;
        // $sub_array[] = $row->noteStatus;
        $sub_array[] = $edit . ' ' . $delete . ' ' . $print . ' ' . $view . ' ' . $faktur . ' ' . $delivery;
        $sub_array[] = "";
        $data[] = $sub_array;
      }
    }
 
    $output = array(
      "draw"                    =>     intval($_POST["draw"]),
      "recordsTotal"          =>      $this->model_bast->get_all_data(),
      "recordsFiltered"     =>     $this->model_bast->get_filtered_data(),
      "data"                    =>     $data
    );
    echo json_encode($output);
  }


}
