<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Faktur extends CI_Controller
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
    $this->load->helper(array('form', 'url'));
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

  // public function upload_image_faktur($quotation_number)
  // {
  //   $config['upload_path']          = './assets/imagefaktur';
  //   $config['allowed_types']        = 'gif|jpg|png|pdf';
  //   $config['max_size']             = 2000;
  //   $config['max_width']            = 2000;
  //   $config['max_height']           = 1024;
  //   $config['file_name'] =  $quotation_number;

  //   $this->load->library('upload', $config);
  //   $this->upload->initialize($config);


  //   // $config['max_width']  = '1024';s
  //   // $config['max_height']  = '768';

  //   $this->load->library('upload', $config);
  //   if (!$this->upload->do_upload('imagenes')) {

  //     $error = $this->upload->display_errors();
  //     return "";
  //   } else {
  //     $data = array('upload_data' => $this->upload->data());
  //     $type = explode('.', $_FILES['imagenes']['name']);
  //     $type = $type[count($type) - 1];

  //     $path = $config['file_name'] . '.' . $type;
  //     return ($data == true) ? $path : false;
  //   }
  // }


  public function upload_image_faktur($faktur_number)
  {

    $config['upload_path']          = './assets/imagefaktur';
    $config['allowed_types']        = 'gif|jpg|png|pdf|jpeg';
    $config['file_name'] =  $faktur_number;

    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('imagenes')) {
      $error = $this->upload->display_errors();
      return "";
    } else {
      $image_data = $this->upload->data();
      $type = explode('.', $_FILES['imagenes']['name']);
      $type = $type[count($type) - 1];
      $filename = $config['file_name'] . '.' . $type;
      $path = 'eo/faktur/' . $filename;
      $image_data['file_name'] = $this->aws3->sendFile("arenzha", $_FILES['imagenes'], $path);
      $data = array('upload_data' =>  $image_data['file_name']);
      return $image_data['file_name'];
    }
  }

  public function index()
  {
    redirect('Faktur/add_faktur', 'refresh');
  }

  public function create_faktur($id, $id_bast)
  {
    if ((!in_array('createFaktur', $this->permission))) {
      redirect('dashboard', 'refresh');
    }


    $this->db->select('*');
    $this->db->from('bast');
    $this->db->where('id_bast', $id_bast);
    $dataBast = $this->db->get()->row_array();
    $this->data['totalBast'] = $dataBast['totalBast'];
    $this->data['bast_number'] = $dataBast['bast_number'];
    $this->data['gr_number'] = $dataBast['gr_number'];
    $this->data['po_number'] = $dataBast['po_number'];

    $this->data['id_bast'] = $id_bast;
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
      $this->data['netto'] = $row['netto'];
      $this->data['discount'] = $row['discount'];

      $this->db->distinct();
      $this->db->select('name ,metode,quotation_number');
      $this->db->from("quotation_sub_item");
      $this->db->where('quotation_number', $id);
      $this->data['quotation_sub_item'] = $this->db->get()->result();


      $this->form_validation->set_rules('Quatations_number', 'Quotation', 'required|is_unique[faktur.quotation_number]');
      $this->form_validation->set_message('is_unique', ' *{field}  number telah digunakan');




      if ($this->form_validation->run() == false) {
        $this->data['quotation_number'] = $id;
        $this->load->view('tamplate/header', $this->data);
        $this->load->view('tamplate/sidebar', $this->data);
        $this->load->view('faktur/add_faktur_event', $this->data);
        $this->load->view('tamplate/footer', $this->data);
      } else {
        $this->aksi_add_faktur_event($id_bast);
      }
    } else {
      $this->db->select('*');
      $this->db->from('quotation_other');
      $this->db->where('quotation_number', $id);
      $row = $this->db->get()->row_array();
      if ($row['sisa_bast'] == '0') {
        $this->db->select('COUNT(*) as jml');
        $this->db->from('bast');
        $this->db->where('quotation_number', $id);
        $jmlBast = $this->db->get()->row_array();
        if ($jmlBast['jml'] > 1) {
          //jumlah lebih besar dari 1
          $this->data['jml'] = '2';
        } else {
          $this->data['jml'] = '1';
        }
      } else {
        //jumlah lebih besar dari 1
        $this->data['jml'] = '2';
      }

      $where = array('quotation_number' => $id);
      $this->data['quotation_other'] = $this->db->get_where('quotation_other_item', $where)->result();

      $this->data['quotation_number'] = $id;
      $this->load->view('tamplate/header', $this->data);
      $this->load->view('tamplate/sidebar', $this->data);
      $this->load->view('faktur/add_faktur', $this->data);
      $this->load->view('tamplate/footer', $this->data);
    }
  }

  public function edit_faktur($quotation_number, $id_faktur)
  {
    if ((!in_array('updateFaktur', $this->permission))) {
      redirect('dashboard', 'refresh');
    }
    $this->data['id_faktur'] = $id_faktur;
    $idd = substr($quotation_number, 0, 2);
    if ($idd == "QE") {

      $this->data['controller'] = $this;
      $this->db->select('venue_event,date_quotation,pic_event.pic_name,email_event,asf,ppn,pph,comissionable_cost,nonfee,total_summary,pic_event.email,netto,discount');
      $this->db->from('quotations');
      $this->db->join('pic_event', 'pic_event.id_event=quotations.id_pic_event');

      $this->db->where('quotation_number', $quotation_number);

      $row = $this->db->get()->row_array();
      $this->data['venue'] = $row['venue_event'];
      $this->data['date'] = $row['date_quotation'];
      $this->data['pic_name'] = $row['pic_name'];
      $this->data['pic_email'] = $row['email'];
      $this->data['netto'] = $row['netto'];
      $this->data['discount'] = $row['discount'];

      $this->data['asf'] = $row['asf'];
      $this->data['ppn'] = $row['ppn'];
      $this->data['pph'] = $row['pph'];
      $this->data['comissionable_cost'] = $row['comissionable_cost'];
      $this->data['nonfee'] = $row['nonfee'];

      $this->data['total'] = $row['total_summary'];
      $this->db->distinct();
      $this->db->select('name ,metode,quotation_number');
      $this->db->from("quotation_sub_item");
      $this->db->where('quotation_number', $quotation_number);
      $this->data['quotation_sub_item'] = $this->db->get()->result();


      $this->form_validation->set_rules('Quatations_number', 'Quotation', 'required');




      if ($this->form_validation->run() == false) {
        $where = array('quotation_number' => $quotation_number);
        $this->data['quotation_other'] = $this->db->get_where('faktur_item', $where)->result();
        //$this->data['faktur_number']=$id;
        $this->data['quotation_number'] = $quotation_number;
        $this->db->select('*');
        $this->db->from('faktur');
        $this->db->where('id_faktur', $id_faktur);
        $img = $this->db->get()->row_array();
        $this->data['img'] = $img['image'];
        $this->load->view('tamplate/header', $this->data);
        $this->load->view('tamplate/sidebar', $this->data);
        $this->load->view('faktur/edit_faktur_event', $this->data);
        $this->load->view('tamplate/footer', $this->data);
      } else {
        $this->aksi_update_faktur_event($id_faktur);
      }
    } else {
      $this->db->select('*');
      $this->db->from('faktur');
      $this->db->where('id_faktur', $id_faktur);
      $row = $this->db->get()->row_array();

      $where = array('faktur_number' => $row['faktur_number']);
      $this->data['quotation_other'] = $this->db->get_where('faktur_item', $where)->result();
      //$this->data['faktur_number']=$id;
      $this->data['quotation_number'] = $quotation_number;
      $this->db->select('*');
      $this->db->from('faktur');
      $this->db->where('id_faktur', $id_faktur);
      $row = $this->db->get()->row_array();
      $this->data['img'] = $row['image'];

      $this->db->select('*');
      $this->db->from('quotation_other');
      $this->db->where('quotation_number', $quotation_number);
      $row = $this->db->get()->row_array();
      if ($row['sisa_bast'] == '0') {
        $this->db->select('COUNT(*) as jml');
        $this->db->from('bast');
        $this->db->where('quotation_number', $quotation_number);
        $jmlBast = $this->db->get()->row_array();
        if ($jmlBast['jml'] > 1) {
          //jumlah lebih besar dari 1
          $this->data['jml'] = '2';
        } else {
          $this->data['jml'] = '1';
        }
      } else {
        //jumlah lebih besar dari 1
        $this->data['jml'] = '2';
      }
      $this->load->view('tamplate/header', $this->data);
      $this->load->view('tamplate/sidebar', $this->data);
      $this->load->view('faktur/edit_faktur', $this->data);
      $this->load->view('tamplate/footer', $this->data);
    }
  }
  public function view_faktur($quotation_number, $id_faktur)
  {
    if ((!in_array('viewFaktur', $this->permission)) and (!in_array('statusFaktur', $this->permission))) {
      redirect('dashboard', 'refresh');
    }
    $this->data['id_faktur'] = $id_faktur;
    $idd = substr($quotation_number, 0, 2);
    if ($idd == "QE") {
      $this->data['controller'] = $this;
      $this->db->select('venue_event,date_quotation,pic_event.pic_name,email_event,asf,ppn,pph,comissionable_cost,nonfee,total_summary,pic_event.email');
      $this->db->from('quotations');
      $this->db->join('pic_event', 'pic_event.id_event=quotations.id_pic_event');
      $this->db->where('quotation_number', $quotation_number);

      $row = $this->db->get()->row_array();

      $this->data['total'] = $row['total_summary'];
      $this->db->distinct();
      $this->db->select('name ,metode,quotation_number');
      $this->db->from("quotation_sub_item");
      $this->db->where('quotation_number', $quotation_number);
      $this->data['quotation_sub_item'] = $this->db->get()->result();

      $this->db->select('*');
      $this->db->from("faktur_item");
      $this->db->where('quotation_number', $quotation_number);
      $this->data['faktur_item'] = $this->db->get()->result();

      $this->db->select('*,faktur.ppn as ppn_faktur');
      $this->db->from('faktur');
      $this->db->join('quotations', 'faktur.quotation_number = quotations.quotation_number');
      $this->db->join('bast', 'bast.id_bast=faktur.id_bast ');
      $this->db->where('faktur.id_faktur', $id_faktur);
      $row = $this->db->get()->row_array();


      $cos = str_replace('.', '', $row['comissionable_cost']);
      $nonfee = str_replace('.', '', $row['nonfee']);

      $pembagi = $row['totalBast'] / $row['netto'];
      $cos1 = $pembagi * $cos;
      $nonfee1 = $pembagi * $nonfee;
      $material = $cos1 + $nonfee1;
      $asf = $row['asf'] * $pembagi;
      $sub_total = $asf + $material;
      $netto = $sub_total - $row['diskon_harga'];
      $this->data['material'] = number_format(round($material), 0, ',', '.');
      $this->data['as'] = number_format(round($asf), 0, ',', '.');
      $this->data['sub_total'] = number_format(round($sub_total), 0, ',', '.');
      $this->data['netto2'] = number_format(round($netto), 0, ',', '.');
      $this->data['ppn_faktur'] = number_format(round($row['ppn_faktur']), 0, ',', '.');


      $totalBast = str_replace('.', '', $row['total_sub']);
      $cos = str_replace('.', '', $row['comissionable_cost']);
      $nonfee = str_replace('.', '', $row['nonfee']);
      $material = $cos + $nonfee;
      $netto = $material + preg_replace("/[^0-9]/", "", $row['asf'] - preg_replace("/[^0-9]/", "", $row['diskon_harga']));

      $asff = (($row['asfp'] / 100)) * $totalBast;
      $material = $totalBast - $asff;
      $material1 = number_format($material, 0, ",", ".");





      $this->data['netto1'] = number_format($netto, 0, ',', '.');



      // $this->data['npwp']=$row['npwp'];
      $this->data['syarat_pembayaran'] = $row['syarat_pembayaran'];
      $this->data['ppn'] = $row['ppn'];

      $this->data['pph23'] = $row['pph23'];

      $this->data['diskon'] = $row['diskon'];
      $this->data['diskon_harga'] = $row['diskon_harga'];
      $this->data['total_faktur'] = $row['total_faktur'];
      $this->data['total_sub'] = $row['total_sub'];



      $this->data['comissionable_cost'] = $row['comissionable_cost'];
      $this->data['nonfee'] = $row['nonfee'];
      $this->data['title'] = $row['tittle_event'];

      $this->data['total'] = $row['total_summary'];
      $this->data['asf'] = $row['asf'];
      $this->data['netto'] = $row['netto'];
      $this->data['discount'] = $row['discount'];


      $this->form_validation->set_rules('Quatations_number', 'Quotation', 'required');




      if ($this->form_validation->run() == false) {
        $where = array('quotation_number' => $quotation_number);
        $this->data['quotation_other'] = $this->db->get_where('faktur_item', $where)->result();

        $this->data['quotation_number'] = $quotation_number;
        $this->db->select('*');
        $this->db->from('faktur');
        $this->db->where('id_faktur', $id_faktur);
        $img = $this->db->get()->row_array();
        $this->data['img'] = $img['image'];

        $this->load->view('tamplate/header', $this->data);
        $this->load->view('tamplate/sidebar', $this->data);
        $this->load->view('faktur/view_faktur_event', $this->data);
        $this->load->view('tamplate/footer', $this->data);
      } else {
        $this->aksi_update_faktur_event($quotation_number);
      }
    } else {
      $this->db->select('*');
      $this->db->from("faktur_item");
      $this->db->where('quotation_number', $quotation_number);
      $this->data['faktur_item'] = $this->db->get()->result();

      $this->db->select('*');
      $this->db->from('faktur');
      $this->db->join('quotation_other', 'quotation_other.quotation_number=faktur.quotation_number');
      $this->db->join('bast', 'bast.id_bast=faktur.id_bast');
      $this->db->where('id_faktur', $id_faktur);

      $row = $this->db->get()->row_array();




      $this->data['ref'] = $row['REF'];
      $this->data['pph23'] = $row['pph23'];
      $this->data['diskon'] = $row['diskon'];
      $this->data['diskon_harga'] = $row['diskon_harga'];
      $this->data['total_faktur'] = $row['total_faktur'];
      $this->data['total_sub'] = $row['total_sub'];
      $this->data['total'] = $row['totalBast'];

      $totalBast = str_replace('.', '', $row['total_sub']);











      $pembagi = $row['totalBast'] / $row['netto'];
      $sub_total = $pembagi * $row['sub_total'];
      $asf = $pembagi * $row['asf'];
      $discount = $pembagi * $row['discount'];
      $netto = $sub_total + $asf - $discount;
      $ppn = 0.1 * $netto;
      $pph = 0.02 * $asf;
      $total_faktur = $netto + $ppn - $pph;

      $this->data['sub_total'] = number_format(round($sub_total), 0, ',', '.');
      $this->data['asf'] = number_format($asf, 0, ',', '.');
      $this->data['netto'] = number_format($netto, 0, ',', '.');
      $this->data['ppn'] = number_format($ppn, 0, ',', '.');
      $this->data['pph'] = number_format($pph, 0, ',', '.');
      $this->data['total_faktur'] = number_format($total_faktur, 0, ',', '.');
      $this->data['discount'] = number_format($discount, 0, ',', '.');
      $this->data['netto'] = number_format($netto, 0, ',', '.');

      $where = array('quotation_number' => $quotation_number);
      $this->data['quotation_other'] = $this->db->get_where('faktur_item', $where)->result();
      $this->data['quotation_number'] = $quotation_number;
      $this->db->select('*');
      $this->db->from('faktur');
      $this->db->where('id_faktur', $id_faktur);
      $row = $this->db->get()->row_array();

      $this->data['img'] = $row['image'];

      $this->db->select('*');
      $this->db->from('quotation_other');
      $this->db->where('quotation_number', $quotation_number);
      $row = $this->db->get()->row_array();
      if ($row['sisa_bast'] == '0') {
        $this->db->select('COUNT(*) as jml');
        $this->db->from('bast');
        $this->db->where('quotation_number', $quotation_number);
        $jmlBast = $this->db->get()->row_array();
        if ($jmlBast['jml'] > 1) {
          //jumlah lebih besar dari 1
          $this->data['jml'] = '2';
        } else {
          $this->data['jml'] = '1';
        }
      } else {
        //jumlah lebih besar dari 1
        $this->data['jml'] = '2';
      }



      $this->load->view('tamplate/header', $this->data);
      $this->load->view('tamplate/sidebar', $this->data);
      $this->load->view('faktur/view_faktur_other', $this->data);
      $this->load->view('tamplate/footer', $this->data);
    }
  }



  function aksi_add_faktur_event($id_bast)
  {
    $quotation_number = $this->input->post('Quatations_number');
    $faktur = $this->input->post('faktur_number');
    $seri_faktur = $this->input->post('seri_faktur');
    $date_faktur = $this->input->post('date_faktur');
    $id_bast = $this->input->post('id_bast');
    $ref = $this->input->post('ref');
    $syarat_pembayaran = $this->input->post('syarat_pembayaran');
    $upload_image = $this->upload_image_faktur($faktur);
    if ($upload_image == '') {
      $upload_image = "dafault.png";
    }

    $data = [
      "quotation_number" => $quotation_number,
      "faktur_number" => $faktur,
      "ser_faktur" => $seri_faktur,
      "date_faktur" => $date_faktur,
      "REF" => $ref,
      "syarat_pembayaran" => $syarat_pembayaran,
      "image" => $upload_image,
      "id_bast" => $id_bast,
    ];
    $this->db->insert('faktur', $data);
    $this->session->set_flashdata('success', 'Successfully created');

    redirect('Faktur/manage_faktur', 'refresh');
  }

  public function aksi_update_faktur_event($id)
  {

    $quotation_number = $this->input->post('Quatations_number');
    $faktur = $this->input->post('faktur_number');
    $seri_faktur = $this->input->post('seri_faktur');
    $date_faktur = $this->input->post('date_faktur');
    $ref = $this->input->post('ref');
    $syarat_pembayaran = $this->input->post('syarat_pembayaran');
    $upload_image = $this->upload_image_faktur($faktur);
    if ($upload_image == '') {
      $data = [
        "quotation_number" => $quotation_number,
        "faktur_number" => $faktur,
        "ser_faktur" => $seri_faktur,
        "date_faktur" => $date_faktur,
        "REF" => $ref,
        "syarat_pembayaran" => $syarat_pembayaran,
      ];
    } else {
      $data = [
        "quotation_number" => $quotation_number,
        "faktur_number" => $faktur,
        "ser_faktur" => $seri_faktur,
        "date_faktur" => $date_faktur,
        "REF" => $ref,
        "syarat_pembayaran" => $syarat_pembayaran,
        "image" => $upload_image

      ];
    }


    $where = array("quotation_number" => $id);

    $this->db->where($where);
    $this->db->update('faktur', $data);
    $this->session->set_flashdata('success', 'Successfully updated');
    redirect('Faktur/manage_faktur', 'refresh');
  }

  public function manage_faktur_event()
  {
    if ((!in_array('updateFaktur', $this->permission)) and (!in_array('statusFaktur', $this->permission)) and (!in_array('deleteFaktur', $this->permission)) and (!in_array('viewFaktur', $this->permission))) {
      redirect('dashboard', 'refresh');
    }

    $id = $this->session->userdata('id');
    $group_data = $this->model_groups->getGroupData($id);
    $this->data['group_data'] = $group_data;
  

    $this->load->view('tamplate/header', $this->data);
    $this->load->view('tamplate/sidebar', $this->data);
    $this->load->view('faktur/manage_faktur', $this->data);
    $this->load->view('tamplate/footer', $this->data);
  }

  public function manage_faktur_other()
  {
    if ((!in_array('updateFaktur', $this->permission)) and (!in_array('statusFaktur', $this->permission)) and (!in_array('deleteFaktur', $this->permission)) and (!in_array('viewFaktur', $this->permission))) {
      redirect('dashboard', 'refresh');
    }

    $id = $this->session->userdata('id');
    $group_data = $this->model_groups->getGroupData($id);
    $this->data['group_data'] = $group_data;
  

    $this->load->view('tamplate/header', $this->data);
    $this->load->view('tamplate/sidebar', $this->data);
    $this->load->view('faktur/manage_faktur_other', $this->data);
    $this->load->view('tamplate/footer', $this->data);
  }

  public function AmbilDataQuotation()
  {
    $quotatoion_number = $this->input->post("quotation_number");


    $this->db->select('*');
    $this->db->from('quotations');
    $this->db->join('pic_event', 'pic_event.email = quotations.email_event');
    $this->db->join('customer', 'customer.name = quotations.customer');
    $this->db->join('bast', 'bast.quotation_number = quotations.quotation_number');
    $this->db->where('quotations.quotation_number', $quotatoion_number);
    $dataa = $this->db->get()->result();
    echo json_encode($dataa);
  }

  public function AmbilDataFaktur()
  {
    $faktur_number = $this->input->post("quotation_number");
    $this->db->distinct();
    $this->db->select('*');
    $this->db->from('quotations');
    $this->db->join('customer', 'customer.id = quotations.id_customer');
    $this->db->join('pic_event', 'pic_event.id_event = quotations.id_pic_event');
    $this->db->join('bast', 'bast.quotation_number = quotations.quotation_number');
    $this->db->join('faktur', 'faktur.id_bast = bast.id_bast');


    $this->db->where('faktur.id_faktur', $faktur_number);

    $dataa = $this->db->get()->result();
    echo json_encode($dataa);
  }
  public function AmbilDataFakturother()
  {
    $faktur_number = $this->input->post("quotation_number");
    $this->db->select('*');
    $this->db->from('quotation_other');
    $this->db->join('pic_event', 'pic_event.id_event = quotation_other.id_event');
    $this->db->join('customer', 'customer.id = quotation_other.id_customer');
    $this->db->join('bast', 'bast.quotation_number = quotation_other.quotation_number');
    // $this->db->join('delivery', 'delivery.id_bast = bast.id_bast');
    $this->db->join('faktur', 'faktur.id_bast = bast.id_bast');
    $this->db->where('faktur.id_faktur', $faktur_number);

    $dataa = $this->db->get()->result();
    echo json_encode($dataa);
  }
  function getStatus()
  {
    $faktur_number = $this->input->post('faktur_number');
    $this->db->select("status");
    $this->db->from('faktur');
    $this->db->where('quotation_number', $faktur_number);
    $data = $this->db->get()->result();
    echo json_encode($data);
  }
  function updateStatus()
  {

    $status = $this->input->post('status');
    $faktur_number = $this->input->post('faktur_number');
    $note = $this->input->post('note');

    $where = array('faktur_number' => $faktur_number);
    $data = [
      'status' => $status,
      'noteStatus' => $note
    ];
    $this->db->where($where);
    $update = $this->db->update('faktur', $data);
    if ($update) {
      $result['pesan'] = "1";
    } else {
      $result['pesan'] = "0";
    }


    echo  json_encode($result);
  }




  function generet_faktur_number()
  {


    $this->db->select_max('id_faktur');
    $this->db->from('faktur');
    $data = $this->db->get()->row_array();
    $id = $data['id_faktur'];

    $id++;
    $data = sprintf("%04s", $id);
    $result["data"] = $data;
    echo json_encode($result);
  }



  public function aksi_add_faktur()
  {


    $quotation_number = $this->input->post('Quatations_number');
    $faktur = $this->input->post('faktur_number');
    $seri_faktur = $this->input->post('seri_faktur');
    $date_faktur = $this->input->post('date_faktur');
    $ref = $this->input->post('ref');
    $syarat_pembayaran = $this->input->post('syarat_pembayaran');
    $subtotal = $this->input->post('subtotal');
    $diskon = $this->input->post('diskon');
    $ppn = $this->input->post('ppn');
    $pph23 = $this->input->post('pph23');
    $total_faktur = $this->input->post('total_faktur');



    if ($quotation_number != "") {
      $i = 0; // untuk loopingnya
      $a = $this->input->post('namebarang');
      $b = $this->input->post('deskripsibarang');
      $c = $this->input->post('keteranganbarang');
      $d = $this->input->post('kts');
      $e = $this->input->post('hargasatuan');
      $f = $this->input->post('amount');
      $g = $this->input->post('quantity');
      if ($a[0] !== null) {
        foreach ($a as $row) {
          $data = [
            'quotation_number' => $quotation_number,
            'faktur_number' => $faktur,
            'barang' => $row,
            'deskripsi_barang' => $b[$i],
            'keterangan' => $c[$i],
            'kts' => $d[$i],
            'quantity' => $g[$i],
            'harga_satuan' => (str_replace('.', '', $e[$i])),
            'amount' => (str_replace('.', '', $f[$i])),

          ];
          // $t=+(int) $c[$i];

          $this->db->insert('faktur_item', $data);

          $i++;
        }
        $upload_image = $this->upload_image_faktur($faktur);
        if ($upload_image == '') {
          $upload_image = "dafault.png";
        }

        $data1 = [
          "quotation_number" => $quotation_number,
          "faktur_number" => $faktur,
          "ser_faktur" => $seri_faktur,
          "date_faktur" => $date_faktur,
          "REF" => $ref,
          "syarat_pembayaran" => $syarat_pembayaran,
          "total_sub" => (str_replace('.', '', $subtotal)),
          "diskon" => $diskon,
          "ppn" => (str_replace('.', '', $ppn)),
          "pph23" => preg_replace("/[^0-9]/", "", $pph23),
          "total_faktur" => (str_replace('.', '', $total_faktur)),
          "image" => $upload_image,
          "diskon_harga" => preg_replace("/[^0-9]/", "", $this->input->post('hasildiskon')),
          "id_bast" => $this->input->post('id_bast')
        ];
        $this->db->insert('faktur', $data1);
      }
      redirect('Faktur/manage_faktur');
      $this->session->set_flashdata('success', 'Successfully created');
      $arr['success'] = true;
      $arr['notif']  = '<div class="alert alert-success">
      <i class="fa fa-check"></i> Data Berhasil Disimpan
    </div>';

      return $this->output->set_output(json_encode($arr));
    } else {
      $arr['success'] = false;
      $arr['notif']  = '<div class="alert alert-success">
      <i class="fa fa-check"></i> gagal menyimpan data
    </div>';
      $this->load->view('tamplate/header', $this->data);
      $this->load->view('tamplate/sidebar', $this->data);
      $this->load->view('Faktur/manage_faktur', $this->data);
      $this->load->view('tamplate/footer', $this->data);
    }
  }


  public function aksi_add_faktur1()
  {


    $quotation_number = $this->input->post('Quatations_number');
    $faktur = $this->input->post('faktur_number');
    $seri_faktur = $this->input->post('seri_faktur');
    $date_faktur = $this->input->post('date_faktur');
    $ref = $this->input->post('ref');
    $syarat_pembayaran = $this->input->post('syarat_pembayaran');
    $subtotal = $this->input->post('subtotal');
    $diskon = $this->input->post('diskon');
    $ppn = $this->input->post('ppn');
    $pph23 = $this->input->post('pph23');
    $total_faktur = $this->input->post('total_faktur');
    $id_bast = $this->input->post('id_bast');



    if ($quotation_number != "") {

      $upload_image = $this->upload_image_faktur($faktur);
      if ($upload_image == '') {
        $upload_image = "dafault.png";
      }

      $data1 = [
        "quotation_number" => $quotation_number,
        "faktur_number" => $faktur,
        "ser_faktur" => $seri_faktur,
        "date_faktur" => $date_faktur,
        "REF" => $ref,
        "syarat_pembayaran" => $syarat_pembayaran,
        "total_sub" => str_replace('.', '', $subtotal),
        "diskon" => $diskon,
        "ppn" => str_replace('.', '', $ppn),
        "pph23" =>  preg_replace("/[^0-9]/", "", $pph23),
        "total_faktur" => str_replace('.', '', $total_faktur),
        "image" => $upload_image,
        "id_bast" => $id_bast,
        "diskon_harga" => preg_replace("/[^0-9]/", "", $this->input->post('hasildiskon'))
      ];
      $data2 = [
        'quotation_number' => $quotation_number,
        'faktur_number' => $faktur,
      ];


      $insert = $this->db->insert('faktur', $data1);

      if ($insert) {
        $this->db->insert('faktur_item', $data2);
        $this->session->set_flashdata('success', 'Successfully created');
        redirect('Faktur/manage_faktur');
      } else {
        $this->session->set_flashdata('error', 'Error');
        redirect('Faktur/manage_faktur');
      }

      redirect('Faktur/manage_faktur');
      $this->session->set_flashdata('success', 'Successfully created');
      $arr['success'] = true;
      $arr['notif']  = '<div class="alert alert-success">
      <i class="fa fa-check"></i> Data Berhasil Disimpan
    </div>';

      return $this->output->set_output(json_encode($arr));
    } else {
      $arr['success'] = false;
      $arr['notif']  = '<div class="alert alert-success">
      <i class="fa fa-check"></i> gagal menyimpan data
    </div>';
      $this->load->view('tamplate/header', $this->data);
      $this->load->view('tamplate/sidebar', $this->data);
      $this->load->view('Faktur/manage_faktur', $this->data);
      $this->load->view('tamplate/footer', $this->data);
    }
  }
  public function aksi_update_faktur1()
  {


    $quotation_number = $this->input->post('Quatations_number');
    $faktur = $this->input->post('faktur_number');
    $seri_faktur = $this->input->post('seri_faktur');
    $date_faktur = $this->input->post('date_faktur');
    $ref = $this->input->post('ref');
    $syarat_pembayaran = $this->input->post('syarat_pembayaran');
    $subtotal = $this->input->post('subtotal');
    $diskon = $this->input->post('diskon');
    $ppn = $this->input->post('ppn');
    $pph23 = $this->input->post('pph23');
    $total_faktur = $this->input->post('total_faktur');



    if ($quotation_number != "") {
      $upload_image = $this->upload_image_faktur($faktur);
      if ($upload_image == '') {


        $data1 = [
          "quotation_number" => $quotation_number,
          "ser_faktur" => $seri_faktur,
          "date_faktur" => $date_faktur,
          "REF" => $ref,
          "syarat_pembayaran" => $syarat_pembayaran,
          "total_sub" => str_replace('.', '', $subtotal),
          "diskon" => $diskon,
          "ppn" => str_replace('.', '', $ppn),
          "pph23" =>  preg_replace("/[^0-9]/", "", $pph23),
          "total_faktur" => str_replace('.', '', $total_faktur),

          "diskon_harga" => preg_replace("/[^0-9]/", "", $this->input->post('hasildiskon'))


        ];
      } else {
        $data1 = [
          "quotation_number" => $quotation_number,
          "ser_faktur" => $seri_faktur,
          "date_faktur" => $date_faktur,
          "REF" => $ref,
          "syarat_pembayaran" => $syarat_pembayaran,
          "total_sub" => str_replace('.', '', $subtotal),
          "diskon" => $diskon,
          "ppn" => str_replace('.', '', $ppn),
          "pph23" =>  preg_replace("/[^0-9]/", "", $pph23),
          "total_faktur" => str_replace('.', '', $total_faktur),
          "image" => $upload_image,
          "diskon_harga" => $this->input->post('hasildiskon'),

        ];
      }


      $where = array('faktur_number' => $faktur);
      $this->db->where($where);
      $update = $this->db->update('faktur', $data1);


      $this->session->set_flashdata('success', 'Successfully updated');


      redirect("Faktur/manage_faktur");

      $arr['success'] = true;
      $arr['notif']  = '<div class="alert alert-success">
      <i class="fa fa-check"></i> Data Berhasil Disimpan
    </div>';

      return $this->output->set_output(json_encode($arr));
    } else {
      $arr['success'] = false;
      $arr['notif']  = '<div class="alert alert-success">
      <i class="fa fa-check"></i> gagal menyimpan data
    </div>';
      $this->load->view('tamplate/header', $this->data);
      $this->load->view('tamplate/sidebar', $this->data);
      $this->load->view('bank/add_quatations', $this->data);
      $this->load->view('tamplate/footer', $this->data);
    }
  }


  public function aksi_update_faktur()
  {


    $quotation_number = $this->input->post('Quatations_number');
    $faktur = $this->input->post('faktur_number');
    $seri_faktur = $this->input->post('seri_faktur');
    $date_faktur = $this->input->post('date_faktur');
    $ref = $this->input->post('ref');
    $syarat_pembayaran = $this->input->post('syarat_pembayaran');
    $subtotal = $this->input->post('subtotal');
    $diskon = $this->input->post('diskon');
    $ppn = $this->input->post('ppn');
    $pph23 = $this->input->post('pph23');
    $total_faktur = $this->input->post('total_faktur');



    if ($quotation_number != "") {
      $i = 0; // untuk loopingnya
      $a = $this->input->post('namebarang');
      $b = $this->input->post('deskripsibarang');
      $c = $this->input->post('keteranganbarang');
      $d = $this->input->post('kts');
      $e = $this->input->post('hargasatuan');
      $f = $this->input->post('amount');
      $g = $this->input->post('id_faktur');
      $j = $this->input->post('quantity');

      if ($a[0] != null) {
        $this->db->where('quotation_number', $quotation_number);
        $this->db->delete('faktur_item');
        foreach ($a as $row) {
          $data = [
            'quotation_number' => $quotation_number,
            'barang' => $row,
            'faktur_number' => $faktur,
            'deskripsi_barang' => $b[$i],
            'keterangan' => $c[$i],
            'kts' => $d[$i],
            'quantity' => $j[$i],
            'harga_satuan' => (str_replace('.', '', $e[$i])),
            'amount' => (str_replace('.', '', $f[$i]))
          ];


          $this->db->insert('faktur_item', $data);
          $i++;
        }
        $upload_image = $this->upload_image_faktur($faktur);

        if ($upload_image == '') {
          $data1 = [
            "quotation_number" => $quotation_number,
            "ser_faktur" => $seri_faktur,
            "date_faktur" => $date_faktur,
            "REF" => $ref,
            "syarat_pembayaran" => $syarat_pembayaran,
            "total_sub" => (str_replace('.', '', $subtotal)),
            "diskon" => $diskon,
            "ppn" => (str_replace('.', '', $ppn)),
            "pph23" => preg_replace("/[^0-9]/", "", $pph23),
            "total_faktur" => (str_replace('.', '', $total_faktur)),
            "diskon_harga" => preg_replace("/[^0-9]/", "", $this->input->post("hasildiskon")),


          ];
        } else {
          $data1 = [
            "quotation_number" => $quotation_number,
            "ser_faktur" => $seri_faktur,
            "date_faktur" => $date_faktur,
            "REF" => $ref,
            "syarat_pembayaran" => $syarat_pembayaran,
            "total_sub" => (str_replace('.', '', $subtotal)),
            "diskon" => $diskon,
            "ppn" => (str_replace('.', '', $ppn)),
            "pph23" => preg_replace("/[^0-9]/", "", $pph23),
            "total_faktur" => (str_replace('.', '', $total_faktur)),
            "image" => $upload_image,
            "diskon_harga" => preg_replace("/[^0-9]/", "", $this->input->post("hasildiskon")),
          ];
        }


        $where = array('faktur_number' => $faktur);
        $this->db->where($where);
        $update = $this->db->update('faktur', $data1);
      }
      $this->session->set_flashdata('success', 'Successfully updated');
      redirect("Faktur/manage_faktur");
    } else {
      $arr['success'] = false;
      $arr['notif']  = '<div class="alert alert-success">
      <i class="fa fa-check"></i> gagal menyimpan data
    </div>';
      $this->load->view('tamplate/header', $this->data);
      $this->load->view('tamplate/sidebar', $this->data);
      $this->load->view('bank/add_quatations', $this->data);
      $this->load->view('tamplate/footer', $this->data);
    }
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

  public function AmbilDataQuotationOther()
  {
    $quotatoion_number = $this->input->post("quotation_number");
    $this->db->select('*');
    $this->db->from('quotation_other');
    $this->db->join('pic_event', 'pic_event.id_event = quotation_other.id_event');
    $this->db->join('customer', 'customer.id = quotation_other.id_customer');
    $this->db->join('bast', 'bast.quotation_number = quotation_other.quotation_number');
    $this->db->where('quotation_other.quotation_number', $quotatoion_number);

    $dataa = $this->db->get()->result();
    echo json_encode($dataa);
  }

  public function hapus($id)
  {
    $id = $this->input->post("id");
    $this->db->select('*');
    $this->db->from('faktur');
    $this->db->where('id_faktur', $id);
    $data = $this->db->get()->row_array();

    $this->db->where('faktur_number', $data['faktur_number']);
    $this->db->delete('faktur');

    $this->db->where('faktur_number', $data['faktur_number']);
    $this->db->delete('faktur_item');

    $this->db->where('id_faktur', $data['id_faktur']);
    $this->db->delete('delivery');

    $this->db->select('*');
    $this->db->from('delivery');
    $this->db->where('id_faktur', $data['id_faktur']);
    $data = $this->db->get()->row_array();

    $this->db->where('delivery_number', $data['Delivery_number']);
    $this->db->delete('delivery_item');

    unlink("assets/imagefaktur/" . $data['image']);
  }


  public function print_faktur($quotation_number, $id)
  {
    if ((!in_array('viewFaktur', $this->permission))) {
      redirect('dashboard', 'refresh');
    }
    $idd = substr($quotation_number, 0, 2);
    if ($idd == "QE") {
      $this->db->select('*');
      $this->db->from("faktur_item");
      $this->db->where('faktur_number', $id);
      $this->data['faktur_item'] = $this->db->get()->result();

      $this->db->select('faktur_number,ser_faktur,date_faktur,syarat_pembayaran,REF,faktur.ppn,faktur.pph23,diskon,total_faktur,total_sub,name,address,comissionable_cost,nonfee,tittle_event,total_summary,asf,npwp,diskon_harga,bast.po_number,gr_number,totalBast,asfp,netto');
      $this->db->from('faktur');
      $this->db->join('bast', 'bast.id_bast = faktur.id_bast');

      $this->db->join('quotations', 'quotations.quotation_number = bast.quotation_number');

      $this->db->join('customer', 'customer.id = quotations.id_customer');
      $this->db->where('faktur_number', $id);

      $row = $this->db->get()->row_array();
      $this->data['diskon_harga'] = $row['diskon_harga'];
      $this->data['faktur_number'] = $row['faktur_number'];
      $this->data['seri_faktur'] = $row['ser_faktur'];
      $this->data['date_faktur'] = $row['date_faktur'];
      // $this->data['npwp']=$row['npwp'];
      $this->data['syarat_pembayaran'] = $row['syarat_pembayaran'];
      $this->data['ppn'] = $row['ppn'];
      $this->data['po_number'] = $row['po_number'];
      $this->data['gr_number'] = $row['gr_number'];
      $this->data['ref'] = $row['REF'];
      $this->data['pph23'] = $row['pph23'];
      $this->data['npwp'] = $row['npwp'];
      $this->data['diskon'] = $row['diskon'];

      $this->data['total_faktur'] = $row['total_faktur'];
      $this->data['total_sub'] = $row['total_sub'];
      $this->data['nama'] = $row['name'];
      $this->data['alamat'] = $row['address'];
      $this->data['comissionable_cost'] = $row['comissionable_cost'];
      $this->data['nonfee'] = $row['nonfee'];
      $this->data['title'] = $row['tittle_event'];

      // $this->data['total'] = $row['total_summary'];
      // $this->data['asf'] = $row['asf'];

      // $totalBast = str_replace('.', '', $row['totalBast']);

      // $asf = ($row['asfp'] / 100) * $totalBast;
      // $asff = round($asf);

      // $jasa = $totalBast - $asff;

      // $this->data['asf'] = number_format($asff, 0, ",", ".");
      // $this->data['jasa'] = number_format($jasa, 0, ",", ".");

      $cos = str_replace('.', '', $row['comissionable_cost']);
      $nonfee = str_replace('.', '', $row['nonfee']);
      $material = $cos + $nonfee;
      $netto = $material + preg_replace("/[^0-9]/", "", $row['asf'] - preg_replace("/[^0-9]/", "", $row['diskon_harga']));


      $this->data['jasa'] = number_format($material, 0, ',', '.');
      $this->data['asf'] = $row['asf'];
      $this->data['netto1'] = number_format($netto, 0, ',', '.');

      $cos = str_replace('.', '', $row['comissionable_cost']);
      $nonfee = str_replace('.', '', $row['nonfee']);

      $pembagi = $row['totalBast'] / $row['netto'];
      $cos1 = $pembagi * $cos;
      $nonfee1 = $pembagi * $nonfee;
      $material = $cos1 + $nonfee1;
      $asf = $row['asf'] * $pembagi;
      $sub_total = $asf + $material;
      $netto = $sub_total - $row['diskon_harga'];
      $this->data['material'] = number_format(round($material), 0, ',', '.');
      $this->data['asf'] = number_format(round($asf), 0, ',', '.');
      $this->data['sub_total'] = number_format(round($sub_total), 0, ',', '.');
      $this->data['netto2'] = number_format(round($netto), 0, ',', '.');
      $this->data['ppn_faktur'] = number_format(round($row['ppn_faktur']), 0, ',', '.');








      // $this->load->view('tamplate/header1',$this->data);
      // //$this->load->view('tamplate/sidebar',$this->data);
      // $this->load->view('faktur/print_faktur_event',$this->data);
      //  $this->load->view('tamplate/footer1',$this->data);


      $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A5', 'defaultPageNumStyle' => '1',
        'margin_right' => '1',
        'margin_left' => '1',
        'margin_bottom' => '5',
        'margin_top' => '5',
      ]);

      $data = $this->load->view('faktur/print_faktur_event', $this->data, TRUE);





      $mpdf->WriteHTML($data);
      $mpdf->SetJS('print();');

      $mpdf->Output();
    } else {

      $this->db->select('*');
      $this->db->from("faktur_item");
      $this->db->where('faktur_number', $id);
      $this->data['faktur_item'] = $this->db->get()->result();

      $this->db->select('*');
      $this->db->from('faktur');
      $this->db->join('bast', 'bast.id_bast = faktur.id_bast');


      $this->db->join('quotation_other', 'bast.quotation_number = quotation_other.quotation_number');
      $this->db->join('customer', 'customer.id = quotation_other.id_customer');
      $this->db->where('faktur_number', $id);



      $row = $this->db->get()->row_array();

      $this->data['faktur_number'] = $row['faktur_number'];
      $this->data['seri_faktur'] = $row['ser_faktur'];
      $this->data['date_faktur'] = $row['date_faktur'];
      // $this->data['npwp']=$row['npwp'];
      $this->data['syarat_pembayaran'] = $row['syarat_pembayaran'];
      $this->data['ppn'] = $row['ppn'];
      $this->data['ref'] = $row['REF'];
      $this->data['pph23'] = $row['pph23'];
      $this->data['diskon'] = $row['diskon'];
      $this->data['diskon_harga'] = $row['diskon_harga'];
      $this->data['total_faktur'] = $row['total_faktur'];
      $this->data['total_sub'] = $row['total_sub'];
      $this->data['nama'] = $row['name'];
      $this->data['alamat'] = $row['address'];
      $totalBast = str_replace('.', '', $row['totalBast']);
      $this->data['npwp'] = $row['npwp'];
      $asf = ($row['asfp'] / 100) * $totalBast;
      $asff = round($asf);

      $jasa = $totalBast - $asff;
      $total = $asff + $jasa;

      $this->data['asf'] = number_format($asff, 0, ",", ".");
      $this->data['jasa'] = number_format($jasa, 0, ",", ".");
      $this->data['total'] = number_format($total, 0, ",", ".");

      $this->db->select('*');
      $this->db->from('quotation_other');
      $this->db->where('quotation_number', $quotation_number);




      $pembagi = $row['totalBast'] / $row['netto'];
      $sub_total = $pembagi * $row['sub_total'];
      $asf = $pembagi * $row['asf'];
      $discount = $pembagi * $row['discount'];
      $netto = $sub_total + $asf - $discount;
      $ppn = 0.1 * $netto;
      $pph = 0.02 * $asf;
      $total_faktur = $netto + $ppn - $pph;

      $this->data['sub_total'] = number_format(round($sub_total), 0, ',', '.');
      $this->data['asf'] = number_format($asf, 0, ',', '.');
      $this->data['netto'] = number_format($netto, 0, ',', '.');
      $this->data['ppn'] = number_format($ppn, 0, ',', '.');
      $this->data['pph'] = number_format($pph, 0, ',', '.');
      $this->data['total_faktur'] = number_format($total_faktur, 0, ',', '.');
      $this->data['discount'] = number_format($discount, 0, ',', '.');
      //$this->data['pembagi'] = $row['totalBast'];


      $row = $this->db->get()->row_array();
      if ($row['sisa_bast'] == '0') {
        $this->db->select('COUNT(*) as jml');
        $this->db->from('bast');
        $this->db->where('quotation_number', $quotation_number);
        $jmlBast = $this->db->get()->row_array();
        if ($jmlBast['jml'] > 1) {
          //jumlah lebih besar dari 1
          $this->data['jml'] = '2';
        } else {
          $this->data['jml'] = '1';
        }
      } else {
        //jumlah lebih besar dari 1
        $this->data['jml'] = '2';
      }


      // $this->load->view('tamplate/header1',$this->data);
      // //$this->load->view('tamplate/sidebar',$this->data);
      // $this->load->view('faktur/print_faktur',$this->data);
      //   $this->load->view('tamplate/footer1',$this->data);

      $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'margin_right' => '1',
        'margin_left' => '1',
        'margin_bottom' => '5',
        'margin_top' => '5',
        'format' => 'A5', 'defaultPageNumStyle' => '1'
      ]);

      $data = $this->load->view('faktur/print_faktur', $this->data, TRUE);





      $mpdf->WriteHTML($data);

      $mpdf->Output();
    }
  }



  function cekFaktur()
  {
    $id_bast = $this->input->post('quotation_number');
    $this->db->select('*');
    $this->db->from('bast');
    $this->db->where('id_bast', $id_bast);
    $data = $this->db->get()->row_array();

    $this->db->select('*');
    $this->db->from('faktur');
    $this->db->where('id_bast', $id_bast);
    $data1 = $this->db->get()->row_array();
    // $json= json_encode($data1);

    if ($data1 != '') {

      $result['status'] = "tersedia";
      $result['quotation_number'] = $data1['quotation_number'];
      $result['id_faktur'] = $data1['id_faktur'];
    } else {
      $result['status'] = "kosong";
      $result['quotation_number'] = $data['quotation_number'];;
    }
    echo json_encode($result);
  }
  function cekFaktur1()
  {
    $quotation_number = $this->input->post('quotation_number');
    $faktur_number = $this->input->post('faktur_number');

    $this->db->select('quotation_number');
    $this->db->from('faktur');
    $this->db->where('id_bast', $quotation_number);
    $data1 = $this->db->get()->row_array();
    // $json= json_encode($data1);

    if ($data1 != '') {

      $result['status'] = "tersediaQ";
    } else {
      $this->db->select("*");
      $this->db->from('faktur');
      $this->db->where('faktur_number', $faktur_number);
      $data2 = $this->db->get()->row_array();
      if ($data2 != '') {
        $result['status'] = "tersediaF";
      } else {
        $result['status'] = "kosong";
      }
    }
    echo json_encode($result);
  }



  public function TampilDatafaktur()
  {
    $this->load->model("model_faktur");
    $fetch_data = $this->model_faktur->make_datatables();
    
    $data = array();
    foreach ($fetch_data as $row) {

      if (in_array('updateFaktur', $this->permission)) {
        $edit = '<font color="#FFFFFF" size="2px"><a title="Edit" class="btn btn-sm bg-gradient-secondary"   href="' . base_url('Faktur/edit_faktur/' . $row->quotation_number . '/' . $row->id_faktur) . '" ><font color="white"><i class="fa fa-edit"></color></i></a>';
      } else {
        $edit = '';
      }
      if (in_array('deleteFaktur', $this->permission)) {
        $delete = '<font color="#FFFFFF" size="2px"><a title="Delete" class="btn btn-sm bg-gradient-secondary" onclick="swetalert(' . $row->id_faktur . ')"><i class="fa fa-trash"></i><font size="2px"> </font></a></font>';
      } else {
        $delete = '';
      }
      if (in_array('viewFaktur', $this->permission)) {
        $print = '<font color="#FFFFFF"  size="2px"><a title="Print" class="btn btn-sm bg-gradient-secondary"   href="' . base_url('Faktur/print_faktur/' . $row->quotation_number . '/' . $row->faktur_number) . '" target="_blank"><i class="fa fa-print"></i><font size="2px"> </a>';
      } else {
        $print = '';
      }
      // if (in_array('createDelivery', $this->permission) and $row->status == "Close") {
      //   $this->db->select('*');
      //   $this->db->from('delivery');
      //   $this->db->where('id_faktur', $row->id_faktur);
      //   $data1 = $this->db->get()->row_array();
      //   if (($data1 != '') and ($data1['id_faktur'] == $row->id_faktur)) {
      //     $delivery = '<font color="#FFFFFF" size="2px"><a title="Edit Delivery" class="btn btn-sm bg-gradient-secondary" onclick="cekDelivery(' . $row->id_faktur . ')" ><i class="fa fa-check"></i>   Delivery</a></font>';
      //   } else {
      //     $delivery = '<font color="#FFFFFF" size="2px"><a title="Create Delivery" class="btn btn-sm bg-gradient-secondary" onclick="cekDelivery(' . $row->id_faktur . ')" ><i class="fa fa-plus"></i>   Delivery</a></font>';
      //   }
      // } else {
      //   $delivery = '';
      // }

      if (in_array('viewFaktur', $this->permission) || in_array('statusFaktur', $this->permission)) {
        $view = ' <font color="#FFFFFF" size="2px"><a title="View Data" class="btn btn-sm bg-gradient-secondary"   href="' . base_url('Faktur/view_faktur/' . $row->quotation_number . '/' . $row->id_faktur) . '" ><font color="white"><i class="fa fa-eye"></color></i></a>';
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

      if (($row->statusQuotations == "Final")  and ($row->statusBast == "Close")) {
        $sub_array = array();
        $sub_array[] = $row->quotation_number;
        $sub_array[] = $row->faktur_number;
        $sub_array[] = $row->date_faktur;

        $sub_array[] = $row->ser_faktur;
        $sub_array[] = $row->customer;
        $sub_array[] = $row->tittle_event;
        $sub_array[] = number_format($row->total_faktur, 0, ',', '.');

        $sub_array[] = $status;
        $sub_array[] = $row->noteStatus;
        $sub_array[] = $edit . ' ' . $delete . ' ' . $print . ' ' . $view;
        $data[] = $sub_array;
      }
    }

    $output = array(
      "draw"                    =>     intval($_POST["draw"]),
      "recordsTotal"          =>      $this->model_faktur->get_all_data(),
      "recordsFiltered"     =>     $this->model_faktur->get_filtered_data(),
      "data"                    =>     $data
    );
    echo json_encode($output);
  }


  public function TampilDatafakturother()
  {
    $this->load->model("model_faktur");
  
    $fetch_data_other = $this->model_faktur->make_datatables_other();
    $data = array();
 
    foreach ($fetch_data_other as $row) {
      if (in_array('updateFaktur', $this->permission)) {
        $edit = '<font color="#FFFFFF" size="2px"><a title="Edit" class="btn btn-sm bg-gradient-secondary"   href="' . base_url('Faktur/edit_faktur/' . $row->quotation_number . '/' . $row->id_faktur) . '"><font color="white"><i class="fa fa-edit"></color></i></a>';
      } else {
        $edit = '';
      }
      if (in_array('deleteFaktur', $this->permission)) {
        $delete = '<font color="#FFFFFF" size="2px"><a title="Delete" class="btn btn-sm bg-gradient-secondary" onclick="swetalert(' . $row->id_faktur . ')"><i class="fa fa-trash"></i><font size="2px"> </font></a></font>';
      } else {
        $delete = '';
      }
      if (in_array('viewFaktur', $this->permission)) {
        $print = '<font color="#FFFFFF" size="2px"><a title="Print" class="btn btn-sm bg-gradient-secondary"   href="' . base_url('Faktur/print_faktur/' . $row->quotation_number . '/' . $row->faktur_number) . '" target="_blank"><i class="fa fa-print"></i><font size="2px"> </a>';
      } else {
        $print = '';
      }
  

      if (in_array('viewFaktur', $this->permission) || in_array('statusFaktur', $this->permission)) {
        $view = ' <font color="#FFFFFF" size="2px"><a title="View Data" class="btn btn-sm bg-gradient-secondary"   href="' . base_url('Faktur/view_faktur/' . $row->quotation_number . '/' . $row->id_faktur) . '"  ><font color="white"><i class="fa fa-eye"></color></i></a>';
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
      if (($row->statusQuotations == "Final") and ($row->statusBast == "Close")) {
        $sub_array = array();
        $sub_array[] = $row->quotation_number;

        $sub_array[] = $row->faktur_number;
        $sub_array[] = $row->date_faktur;
        $sub_array[] = $row->ser_faktur;
        $sub_array[] = $row->customer;
        $sub_array[] = $row->tittle_event;
        $sub_array[] = number_format($row->total_faktur, 0, ',', '.');

        $sub_array[] = $status;
        $sub_array[] = $row->noteStatus;

        $sub_array[] = $edit . ' ' . $delete . ' ' . $print . ' ' . $view;
        $sub_array[] = "";
        $data[] = $sub_array;
      }
    }
    $output = array(
      "draw"                    =>     intval($_POST["draw"]),
      "recordsTotal"          =>      $this->model_faktur->get_all_data(),
      "recordsFiltered"     =>     $this->model_faktur->get_filtered_data(),
      "data"                    =>     $data
    );
    echo json_encode($output);
  }
}
