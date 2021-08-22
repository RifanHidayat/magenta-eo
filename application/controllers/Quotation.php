<?php
defined('BASEPATH') or exit('No direct script access allowed');
//$sub_total = preg_replace("/[^0-9]/", "", $sub_total1);;

require './vendor/autoload.php';

use Aws\S3\S3Client;

use Aws\Exception\AwsException;

class Quotation extends CI_Controller
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
    $this->load->model('model_quotationevent');
    $this->load->library('aws3');
    $this->load->helper(array('form', 'url'));

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

  public function upload_image_add($quotation_number)
  {

    $config['upload_path']          = './assets/images_/';
    $config["allowed_types"] = "*";
    $config['file_name'] =  $quotation_number;
    // $extension   = end($typefile);

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if (!$this->upload->do_upload('imagenes')) {
      $error = $this->upload->display_errors();
      return "";
    } else {
      $image_data = $this->upload->data();
      $type = explode('.', $_FILES['imagenes']['name']);
      $type = $type[count($type) - 1];
      $filename = $config['file_name'] . '.' . $type;
      $path = 'eo/quotation/' . $filename;
      $image_data['file_name'] = $this->aws3->sendFile("arenzha", $_FILES['imagenes'], $path);
      $data = array('upload_data' =>  $image_data['file_name']);
      return $image_data['file_name'];
    }
  }
  public function upload_image_other($quotation_number)
  {

    $config['upload_path']          = './assets/imageother/';
    $config["allowed_types"] = "*";
    $config['file_name'] =  $quotation_number;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    $this->load->library('upload', $config);
    if (!$this->upload->do_upload('imagenesother')) {
      $error = $this->upload->display_errors();
      return "";
    } else {
      $image_data = $this->upload->data();
      $type = explode('.', $_FILES['imagenesother']['name']);
      $type = $type[count($type) - 1];
      $filename = $config['file_name'] . '.' . $type;
      $path = 'eo/quotation/' . $filename;
      $image_data['file_name'] = $this->aws3->sendFile("arenzha", $_FILES['imagenesother'], $path);
      $data = array('upload_data' =>  $image_data['file_name']);
      return $image_data['file_name'];
    }
  }


  // public function upload_image_add($quotation_number)
  // {
  //   $this->load->helper('file');
  //   $config['upload_path']          = './assets/images/';
  //   $config['allowed_types']        = 'gif|jpg|png|pdf';
  //   $config['max_width']            = 20000;
  //   $config['max_size'] = '30000';
  //   $config['max_width'] = '10240';
  //   $config['file_name'] =  $quotation_number;

  //   $this->load->library('upload', $config);
  //   $this->upload->initialize($config);

  //   if (!$this->upload->do_upload('imagenes')) {

  //     $error = $this->upload->display_errors();
  //     return "";
  //   } else {
  //     $Image_data = $this->upload->data();
  //     $image_data = $this->aws3->sendFile("arenzha", $_FILES['imagenes']);

  //     $data = array('upload_data' => $image_data['file_name']);
  //     // $type = explode('.', $_FILES['imagenes']['name']);
  //     // $type = $type[count($type) - 1];
  //     // $path = $config['file_name'] . '.' . $type;
  //     // return $path;
  //     return $image_data;
  //   }
  // }

  public function manage_quotation_other()
  {
    if ((!in_array('viewQuatationsother', $this->permission)) and (!in_array('updateQuatationsother', $this->permission)) and (!in_array('deleteQuatationsother', $this->permission))) {
      redirect('dashboard', 'refresh');
    }

    $this->db->select('*');
    $this->db->from('quotation_other');

    $this->data['other'] = $this->db->get()->result();
    $this->load->view('tamplate/header', $this->data);
    $this->load->view('tamplate/sidebar', $this->data);
    $this->load->view('QuatationEO/manage_quatations_other', $this->data);
    $this->load->view('tamplate/footer', $this->data);
  }

  public function manage_quotation()
  {
    if ((!in_array('viewQuatations', $this->permission)) and (!in_array('updateQuatations', $this->permission)) and (!in_array('deleteQuatations', $this->permission))) {
      redirect('dashboard', 'refresh');
    }

    $this->db->select('*');
    $this->db->from('quotations');

    $this->data['event'] = $this->db->get()->result();
    $this->load->view('tamplate/header', $this->data);
    $this->load->view('tamplate/sidebar', $this->data);
    $this->load->view('QuatationEO/manage_quatations_event', $this->data);
    $this->load->view('tamplate/footer', $this->data);
  }

  public function add_quotation()
  {
    if ((!in_array('createQuatations', $this->permission)) and (!in_array('createQuatationsother', $this->permission))) {
      redirect('dashboard', 'refresh');
    }

    $this->data['pic'] = $this->db->get('pic_po')->result();
    $this->data['pic_event'] = $this->db->get('pic_event')->result();
    $where = [
      "active" => "Active",
      "metode" => "Comissionable Cost"
    ];
    $where1 = [
      "active" => "Active",
      "metode" => "No-Fee Cost"
    ];

    //$this->data['item']=$this->db->get_where('attributes',$where)->result();
    $this->db->select('*');
    $this->db->from('attributes');
    $this->db->where('active', "Active");
    $this->db->where('metode', "Comissionable Cost");
    $this->db->order_by('id', 'desc');
    $this->data['item'] = $this->db->get()->result();



    //$this->data['item_non']=$this->db->get_where('attributes',$where1)->result();

    $this->db->select('*');
    $this->db->from('attributes');
    $this->db->where('active', "Active");
    $this->db->where('metode', "No-Fee Cost");
    $this->db->order_by('id', 'desc');
    $this->data['item_non'] = $this->db->get()->result();


    $this->form_validation->set_rules('Quatations_number_event', 'Quotation Number', 'required|trim|is_unique[quotations.quotation_number]');
    $this->db->select('*');
    $this->db->from('attributes');
    $this->db->join('attribute_values', 'attributes.id = attribute_values.attribute_parent_id');

    $this->db->where('attribute_values.status', "Active");
    $this->data['core'] = $this->db->get()->result();

    $this->form_validation->set_message('is_unique', ' *{field} sudah digunakan, ');
    if ($this->form_validation->run() == false) {
      $this->load->view('tamplate/header', $this->data);
      $this->load->view('tamplate/sidebar', $this->data);
      $this->load->view('QuatationEO/add_quatations', $this->data);
      $this->load->view('tamplate/footer', $this->data);
    } else {
      $this->aksi_add_quotation();
    }
  }

  function generet_quotation_event()
  {


    $this->db->select_max('id');
    $this->db->from('quotations');
    $data = $this->db->get()->row_array();
    $id = $data['id'];

    $id++;
    $data = sprintf("%04s", $id);
    $result["data"] = $data;
    echo json_encode($result);
  }

  function generet_quotation_other()
  {



    $this->db->select_max('id');
    $this->db->from('quotation_other');
    $data = $this->db->get()->row_array();
    $id = $data['id'];

    $id++;
    $data = sprintf("%04s", $id);
    $result["data"] = $data;
    echo json_encode($result);
  }

  function Simpan_data_Quotation_event()
  {

    $Comissionable_cost = $this->input->post("Comissionable_cost");
    $asf = $this->input->post("asf");
    $total_summary = $this->input->post("total_summary");
    $pph = $this->input->post("pph");
    $ppn = $this->input->post("ppn");
    $quotation_event = $this->input->post("Quatations_number_event");
    $Date_quotation = $this->input->post("Date_quotation");
    $customer_event = $this->input->post("customer_event");
    $title_event = $this->input->post("title_event");
    $Vanue_event = $this->input->post("Vanue_event");
    $date_event = $this->input->post("date_event");
    $pic_event = $this->input->post("pic_event");
    $email_event = $this->input->post("email_event");
    $non_fee = $this->input->post("non_fee");




    $data = [
      'quotation_number ' => $quotation_event,
      'customer' => $customer_event,
      'title_event' => $title_event,
      'venue_event' => $Vanue_event,
      'date_event' => $date_event,
      'commistsioble_cos' => $Comissionable_cost,
      'asf' => $asf,
      'total_summary' => $total_summary,
      'pph' => $pph,
      'ppn' => $ppn,
      'pic_po' => $pic_event,
      'email' => $email_event,
      'tgl_quotation' => $Date_quotation


    ];

    $this->db->insert('quotation', $data);
    $this->session->set_flashdata('flash', 'Ditambahkan');
    redirect('Quotation/manage_quatations', 'refresh');
  }

  public function hapus($id)
  {
    $id = $this->input->post("id");
    $this->db->select('*');
    $this->db->from('quotation_other');
    $this->db->where('id', $id);
    $data = $this->db->get()->row_array();


    $this->db->where('quotation_number', $data['quotation_number']);
    $this->db->delete('quotation_other');

    $this->db->where('quotation_number', $data['quotation_number']);
    $this->db->delete('quotation_other_revisi');

    $this->db->where('quotation_number', $data['quotation_number']);
    $this->db->delete('quotation_other_revisi');

    unlink("assets/imageother/" . $data['image']);

    $this->db->where('quotation_number', $data['quotation_number']);
    $this->db->delete('quotation_other_item');

    $this->db->where('quotation_number', $data['quotation_number']);
    $this->db->delete('faktur');

    $this->db->where('quotation_number', $data['quotation_number']);
    $this->db->delete('faktur_item');

    $this->db->where('quotation_number', $data['quotation_number']);
    $this->db->delete('bast');

    $this->db->where('quotation_number', $data['quotation_number']);
    $this->db->delete('delivery');

    $this->db->where('quotation_number', $data['quotation_number']);
    $this->db->delete('deliery_item');
    unlink("assets/imagebastpo/" . $data['image']);
    unlink("assets/imagebastgr/" . $data['image']);
    unlink("assets/imagefaktur/" . $data['image']);
    unlink("assets/imageother/" . $data['image']);
  }
  public function hapusquotation($id)
  {
    $id = $this->input->post("id");
    $this->db->select("*");
    $this->db->from('quotations');
    $this->db->where('id', $id);
    $data1 = $this->db->get()->row_array();

    $this->db->where('quotation_number', $data1['quotation_number']);
    $this->db->delete('quotations');
    unlink("assets/images_/" . $data1['image']);

    $this->db->where('quotation_number', $data1['quotation_number']);
    $this->db->delete('quotation_sub_item');

    $this->db->where('quotation_number', $data1['quotation_number']);
    $this->db->delete('quotation_item');

    $this->db->where('quotation_number', $data1['quotation_number']);
    $this->db->delete('faktur');
    unlink("assets/imagefaktur/" . $data1['image']);

    $this->db->where('quotation_number', $data1['quotation_number']);
    $this->db->delete('faktur_item');



    $this->db->where('quotation_number', $data1['quotation_number']);
    $this->db->delete('bast');
    unlink("assets/imagebastpo/" . $data1['image']);
    unlink("assets/imagebastgr/" . $data1['image']);

    $this->db->where('quotation_number', $data1['quotation_number']);
    $this->db->delete('delivery');

    $this->db->where('quotation_number', $data1['quotation_number']);
    $this->db->delete('delivery_item');
  }
  //Save image other

  public function aksi_add_quotation_other()
  {

    $title_event = $this->input->post('title_event_otther');
    $quotation_number = $this->input->post('Quatations_number_other');
    $pph_description = $this->input->post('pph_description');
    $ppn_description = $this->input->post('ppn_description');
    $date_event = $this->input->post('date_event');
    $customer_event = $this->input->post('customerOther');
    $name_pic = $this->input->post('picOther1');
    $email_pic = $this->input->post('emailOther');
    $management = $this->input->post('asf_other');
    $date_quotation = $this->input->post('date_quotation');
    $date_expired = $this->input->post('date_expired_other');
    $asf_percen_other = $this->input->post("asf_percen_other");
    $pic_event = $this->input->post("picEventOther1");
    $email_event = $this->input->post("emailEventOther");
    $customer_event = $this->input->post("customerEventOther");
    $id_customer = $this->input->post("id_customerother");
    $id_event = $this->input->post("pic");
    $id_po = $this->input->post("pic_other");
    $grand_total_other = $this->input->post("grand_total_other");

    $sub_total1 = $this->input->post('netto');
    $discount_percent1 = $this->input->post("discount_percent_other");
    $discount1 = $this->input->post("discount_other");
    $netto1 = $this->input->post('netto_other');
    $sub_total = $sub_total1;
    $netto = $netto1;
    $discount_percent = $discount_percent1;
    $discount = preg_replace("/[^0-9]/", "", $discount1);





    if ($quotation_number != "") {
      $i = 0; // untuk loopingnya
      $a = $this->input->post('description');
      $b = $this->input->post('FrequencyDescription');
      $c = $this->input->post('UniPriceDescription');
      $d = $this->input->post('AmmountDescription');
      $e = $this->input->post('QuantityDescription');
      if ($a[0] !== null) {
        foreach ($a as $row) {
          $data = [
            'desciption' => $row,
            'frequency' => $b[$i],
            'unitprice' => (str_replace('.', '', $c[$i])),
            'amount' => (str_replace('.', '', $d[$i])),
            'quantity' => $e[$i],
            'grandtotal' => (str_replace('.', '', $sub_total)),
            'quotation_number' => $quotation_number,
            'revisi' => '0',
          ];
          // $t=+(int) $c[$i];
          $this->db->insert('quotation_other_item', $data);
          $i++;
        }
      }

      $note = $this->input->post('note_desciption');

      $upload_image = $this->upload_image_other($quotation_number);
      if ($upload_image == '') {
        $upload_image = "dafault.png";
      }
      $data1 = [
        'quotation_number' => $quotation_number,
        'quotation_number_revisi' => $quotation_number,
        'date_quotation' => $date_quotation,
        'customer' => $customer_event,
        'tittle_event' => $title_event,
        'pic_name' => $name_pic,
        'pic_email' => $email_pic,
        'netto' => (str_replace('.', '', $netto)),
        'asf' => (str_replace('.', '', $management)),
        'total' => (str_replace('.', '', $sub_total)),
        'note' => $note,
        'ppn' => (str_replace('.', '', $ppn_description)),
        'pph23' => preg_replace("/[^0-9]/", "", $pph_description),
        'date_expired' => $date_expired,
        'asfp' => $asf_percen_other,
        'customer_event' => $customer_event,
        'pic_event' => $pic_event,
        'email_event' => $email_event,
        'image' => $upload_image,
        'id_po' => $id_po,
        'id_event' => $id_event,
        'id_customer' => $id_customer,
        'sisa_bast' => preg_replace("/[^0-9]/", "", $netto),
        'grand_total' => (str_replace('.', '', $grand_total_other)),
        'revisi' => '0',
        'discount_percent' => $discount_percent,
        'discount' => (str_replace('.', '', $discount)),
        'sub_total' => (str_replace('.', '', $sub_total)),
        'revisi' => '0',


      ];
      $this->db->insert('quotation_other', $data1);


      $this->session->set_flashdata('success', 'Successfully created');


      redirect("Quotation/manage_quotation_other");
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
  public function edit_quotation_other($id)
  {
    if ((!in_array('updateQuatationsother', $this->permission))) {
      redirect('dashboard', 'refresh');
    }

    $this->db->select('revisi');
    $this->db->from('quotation_other');
    $this->db->where('quotation_number', $id);
    $row = $this->db->get()->row_array();
    $this->data['quotation_number'] = $id;
    $this->data['pic'] = $this->db->get('pic_po')->result();
    $this->data['pic_event'] = $this->db->get('pic_event')->result();
    $where = array('quotation_number' => $id, 'revisi' => $row['revisi']);
    $this->data['quotation_other'] = $this->db->get_where('quotation_other_item', $where)->result();
    $this->db->select('*');
    $this->db->from('quotation_other');
    $this->db->where('quotation_number', $id);
    $this->data['img'] = $this->db->get()->row_array();
    $this->db->select("*");
    $this->db->from('quotation_other');
    $this->db->where('quotation_number', $id);
    $row = $this->db->get()->row_array();
    $this->data['quotation'] = $row['quotation_number_revisi'];
    $where = array('quotation_number' => $id);
    $this->db->select("COUNT(*) as revisi");
    $this->db->from('quotation_other');
    $this->db->where('quotation_number_revisi', $row['quotation_number_revisi']);
    $row = $this->db->get()->row_array();
    $this->data['revisi'] = $row['revisi'] - 1;

    $this->db->select('*');
    $this->db->from('quotation_other');
    $this->db->where('quotation_number', $id);
    $d = $this->db->get()->row_array();
    $this->data['image'] = $d['image'];

    $id = $this->session->userdata('id');
    $group_data = $this->model_groups->getGroupData($id);
    $this->data['group_data'] = $group_data;



    $this->load->view('tamplate/header', $this->data);
    $this->load->view('tamplate/sidebar', $this->data);
    $this->load->view('QuatationEO/edit_quotation_other', $this->data);
    $this->load->view('tamplate/footer', $this->data);
  }

  public function edit_quotation($id)
  {
    if ((!in_array('updateQuatations', $this->permission))) {
      redirect('dashboard', 'refresh');
    }
    //  $this->db->select('revisi');
    // $this->db->from('quotations');
    // $this->db->where('quotation_number',$id);
    // $row=$this->db->get()->row_array();

    $this->db->select('*');
    $this->db->from('quotation_item');
    $this->db->where('quotation_number', $id);

    $this->data['quotationitem'] = $this->db->get()->result();

    $this->db->select('*');
    $this->db->from('quotations');
    $this->db->where('quotation_number', $id);
    $data = $this->db->get()->row_array();

    $this->data['img'] = $data['image'];


    $this->data['quotation_number'] = $id;





    $this->data['pic'] = $this->db->get('pic_po')->result();
    $this->data['pic_event'] = $this->db->get('pic_event')->result();
    $where = [
      "active" => "Active",
      "metode" => "Comissionable Cost"
    ];
    $where1 = [
      "active" => "Active",
      "metode" => "No-Fee Cost"
    ];
    $where_quotation = array('quotation_number' => $id);
    $this->data['quotation'] = $this->db->get_where('quotation_item', $where_quotation)->result();
    // $this->data['item']=$this->db->get_where('attributes',$where)->result();
    // $this->data['item_non']=$this->db->get_where('attributes',$where1)->result();

    $this->db->select('*');
    $this->db->from('attributes');
    $this->db->where('active', "Active");
    $this->db->where('metode', "Comissionable Cost");
    // $this->db->where('revisi',$row['revisi']);
    $this->db->order_by('id', 'desc');
    $this->data['item'] = $this->db->get()->result();



    $this->db->select('*');
    $this->db->from('attributes');
    $this->db->where('active', "Active");
    $this->db->where('metode', "No-Fee Cost");
    // $this->db->where('revisi',$row['revisi']);
    $this->db->order_by('id', 'desc');
    $this->data['item_non'] = $this->db->get()->result();


    $this->data['customer'] = $this->db->get('customer')->result();

    $where = [
      'Active' => "Active"

    ];
    $this->db->select('*');
    $this->db->from('attributes');
    $this->db->join('attribute_values', 'attributes.id = attribute_values.attribute_parent_id');

    $this->db->where('attribute_values.status', "Active");

    $this->data['data_item'] = $this->db->get()->result();
    $this->db->select('*');
    $this->db->from('attributes');
    $this->db->join('attribute_values', 'attributes.id = attribute_values.attribute_parent_id');
    $this->db->where('attribute_values.status', "Active");
    $this->data['core'] = $this->db->get()->result();




    $this->db->select("*");
    $this->db->from('quotations');
    $this->db->where('quotation_number', $id);
    $row = $this->db->get()->row_array();
    $this->data['quotation'] = $row['quotation_number_revisi'];


    $where = array('quotation_number' => $id);
    $this->db->select("COUNT(*) as revisi");
    $this->db->from('quotations');
    $this->db->where('quotation_number_revisi', $row['quotation_number_revisi']);
    $row = $this->db->get()->row_array();
    $this->data['revisi'] = $row['revisi'] - 1;

    $this->data['quotation_other'] = $this->db->get_where('quotation_other_item', $where)->result();
    $id = $this->session->userdata('id');
    $group_data = $this->model_groups->getGroupData($id);
    $this->data['group_data'] = $group_data;




    $this->load->view('tamplate/header', $this->data);
    $this->load->view('tamplate/sidebar', $this->data);
    $this->load->view('QuatationEO/edit_quotation', $this->data);
    $this->load->view('tamplate/footer', $this->data);
  }

  public function view_quotation_other($id)
  {
    if ((!in_array('viewQuatationsother', $this->permission)) and (!in_array('statusQuatationsother', $this->permission))) {
      redirect('dashboard', 'refresh');
    }
    $this->db->select('revisi,key_quotation');
    $this->db->from('quotation_other');
    $this->db->where('quotation_number', $id);
    $row = $this->db->get()->row_array();
    $this->data['key_quotation'] = $row['key_quotation'];


    $this->db->select('*');
    $this->db->from("quotation_other_item");
    $this->db->where('quotation_number', $id);
    $this->db->where('revisi', $row['revisi']);
    $this->db->order_by('quotation_other_item.id', 'asc');
    $this->data['quotation_other_item'] = $this->db->get()->result();
 

    $this->db->select('*');
    $this->db->from('quotation_other');
    $this->db->where('quotation_number', $id);
    $d = $this->db->get()->row_array();
    $this->data['image'] = $d['image'];

    //revisi 

    $this->db->select('revisi');
    $this->db->from('quotation_other_revisi');
    $this->db->where('quotation_number', $id);
    $revisi = $this->db->get()->result();
    $this->data['revisi'] = $revisi;



    $this->data['quotation_number'] = $id;
    $this->data['pic'] = $this->db->get('pic_po')->result();
    $this->data['pic_event'] = $this->db->get('pic_event')->result();

    $where = array('quotation_number' => $id);
    $this->data['quotation_other'] = $this->db->get_where('quotation_other_item', $where)->result();
    $id = $this->session->userdata('id');
    $group_data = $this->model_groups->getGroupData($id);
    $this->data['group_data'] = $group_data;

    $this->load->view('tamplate/header', $this->data);
    $this->load->view('tamplate/sidebar', $this->data);
    $this->load->view('QuatationEO/view_quotation_other', $this->data);
    $this->load->view('tamplate/footer', $this->data);
  }


  public function view_quotation_event($id)
  {
    if ((!in_array('viewQuatations', $this->permission)) and (!in_array('statusQuatations', $this->permission))) {
      redirect('dashboard', 'refresh');
    }


    $this->db->select("quotation_number,key_quotation");
    $this->db->from('quotations');
    $this->db->where('id', $id);
    $data1 = $this->db->get()->row_array();
    $this->data['quotation_number'] = $data1['quotation_number'];
    $this->data['key_quotation'] = $data1['key_quotation'];

    $this->data['controller'] = $this;
    $this->db->select('revisi');
    $this->db->from('quotations');
    $this->db->where('quotation_number', $data1['quotation_number']);
    $row = $this->db->get()->row_array();

    $this->db->distinct();
    $this->db->select('name ,metode,quotation_number');
    $this->db->from("quotation_sub_item");
    $this->db->where('quotation_number', $data1['quotation_number']);
    $this->data['quotation_sub_item'] = $this->db->get()->result();

    $this->db->select('quotation_item.item_value,attribute_values.satuanq,attribute_values.satuanf,quotation_item.rate,quotation_item.quantity,quotation_item.frrequency,quotation_item.subtotal,quotation_item.name_item');

    $this->db->from("quotation_item");
    $this->db->join('attribute_values', 'attribute_values.value = quotation_item.item_value');
    

    $this->db->where('quotation_number', $data1['quotation_number']);
    $this->db->order_by('quotation_item.id', 'asc');



    $this->data['quotation_item'] = $this->db->get()->result();


    $this->db->select('*');
    $this->db->from('quotation_item');
    $this->db->where('quotation_number', $data1['quotation_number']);
    $this->data['quotationitem'] = $this->db->get()->result();

    // $this->db->select('revisi');
    //   $this->db->from('quotation_other_revisi');
    //   $this->db->where('quotation_number',$id);
    //   $revisi=$this->db->get()->result();
    //   $this->data['revisi']=$revisi;     

    $this->db->select('*');
    $this->db->from('quotations');
    $this->db->where('quotation_number', $data1['quotation_number']);
    $data = $this->db->get()->row_array();

    $this->data['img'] = $data['image'];


    // $this->data['quotation_number']=$id;



    $this->data['pic'] = $this->db->get('pic_po')->result();
    $this->data['pic_event'] = $this->db->get('pic_event')->result();
    $where = [
      "active" => "Active",
      "metode" => "Comissionable Cost"
    ];
    $where1 = [
      "active" => "Active",
      "metode" => "No-Fee Cost"
    ];
    $where_quotation = array('quotation_number' => $data1['quotation_number']);
    $this->data['quotation'] = $this->db->get_where('quotation_item', $where_quotation)->result();
    $this->data['item'] = $this->db->get_where('attributes', $where)->result();
    $this->data['item_non'] = $this->db->get_where('attributes', $where1)->result();
    $this->data['customer'] = $this->db->get('customer')->result();

    $where = [
      'Active' => "Active"

    ];
    $this->db->select('*');
    $this->db->from('attributes');
    $this->db->join('attribute_values', 'attributes.id = attribute_values.attribute_parent_id');

    $this->db->where('attribute_values.status', "Active");

    $this->data['data_item'] = $this->db->get()->result();
    $this->db->select('*');
    $this->db->from('attributes');
    $this->db->join('attribute_values', 'attributes.id = attribute_values.attribute_parent_id');
    $this->db->where('attribute_values.status', "Active");
    $this->data['core'] = $this->db->get()->result();




    $where = array('quotation_number' => $id);
    $this->data['quotation_other'] = $this->db->get_where('quotation_other_item', $where)->result();
    $id = $this->session->userdata('id');
    $group_data = $this->model_groups->getGroupData($id);
    $this->data['group_data'] = $group_data;




    $this->load->view('tamplate/header', $this->data);
    $this->load->view('tamplate/sidebar', $this->data);
    $this->load->view('QuatationEO/view_quotation_event', $this->data);
    $this->load->view('tamplate/footer', $this->data);
  }



  public function AmbilDataQuotationOther()
  {
    $id = $this->input->post("id");

    $this->db->select('*');
    $this->db->from('quotation_other');
    $this->db->join('customer', 'customer.id=quotation_other.id_customer');
    $this->db->join('pic_event', 'pic_event.id_event=quotation_other.id_event');
    $this->db->join('pic_po', 'pic_po.id=quotation_other.id_po');
    $this->db->where('quotation_number', $id);

    $dataa = $this->db->get()->result();
    echo json_encode($dataa);
  }

  public function aksi_update_quotation_other()
  {


    $title_event = $this->input->post('title_event_otther');
    $quotation_number = $this->input->post('Quatations_number_other');
    $pph_description = $this->input->post('pph_description');
    $ppn_description = $this->input->post('ppn_description');
    $date_event = $this->input->post('date_event');
    $customer_event = $this->input->post('customer_other');
    $name_pic = $this->input->post('pic_other1');
    $email_pic = $this->input->post('email_other');
    //column sub total
    $netto = $this->input->post('netto');
    $management = $this->input->post('asf_other');

    //column netto
    $total_description = $this->input->post('total_description');
    $date_quotation = $this->input->post('date_quotation');
    $date_expired = $this->input->post('date_expired_other');
    $asfp = $this->input->post('asf_percen_other');
    $customerEvent = $this->input->post("customerEvent");
    $picEvent = $this->input->post("picEvent1");
    $emailEvent = $this->input->post("emailEvent");
    $grand_total_other = $this->input->post("grand_total_other");
    $btn = $this->input->post("btn");
    $update = $this->input->post("update");
    $revisi = $this->input->post("revisi");
    $imagenesother = $this->input->post("imagenesother");
    $quotation_number_revisii = $this->input->post("quotation_number_revisi");
    $discount_percent_other = $this->input->post("discount_percent_other");
    $discount_other = preg_replace("/[^0-9]/", "", $this->input->post("discount_other"));


    $id_event = $this->input->post("picEvent");
    $id_po = $this->input->post("pic_other");
    $id_customer = $this->input->post("id_customerother");
    $where = array('quotation_number' => $quotation_number);
    if ($btn == "update") {

      if ($quotation_number != "") {
        $i = 0; // untuk loopingnya
        $a = $this->input->post('description');
        $b = $this->input->post('FrequencyDescription');
        $c = $this->input->post('UniPriceDescription');
        $d = $this->input->post('AmmountDescription');
        $e = $this->input->post('id');
        $f = $this->input->post('QuantityDescription');

        if ($a[0] != null) {
          $where = array('quotation_number' => $quotation_number, 'revisi' => $update);
          $this->db->where($where);
          $this->db->delete('quotation_other_item');


          foreach ($a as $row) {
            $data = [
              'desciption' => $row,
              'frequency' => $b[$i],
              'unitprice' => (str_replace('.', '', $c[$i])),
              'amount' => (str_replace('.', '', $d[$i])),
              'quantity' => $f[$i],
              'grandtotal' => (str_replace('.', '', $total_description)),
              'quotation_number' => $quotation_number,
              'revisi' => $update,

            ];
            $this->db->insert('quotation_other_item', $data);
            $i++;
          }
        }else{
          $where = array('quotation_number' => $quotation_number, 'revisi' => $update);
          $this->db->where($where);
          $this->db->delete('quotation_other_item');

        }

        $note = $this->input->post('note_desciption');
        $asf_percen_other = $this->input->post("asf_percen_other");
        $upload_image = $this->upload_image_other($quotation_number);

        if ($upload_image == '') {
          $data1 = [
            'date_quotation' => $date_quotation,
            'customer' => $customer_event,
            'tittle_event' => $title_event,
            'pic_name' => $name_pic,
            'pic_email' => $email_pic,
            'netto' => (str_replace('.', '', $total_description)),
            'asf' => (str_replace('.', '', $management)),
            'total' => (str_replace('.', '', $netto)),
            'note' => $note,
            'ppn' => (str_replace('.', '', $ppn_description)),
            'pph23' =>  preg_replace("/[^0-9]/", "", $pph_description),
            'date_expired' => $date_expired,
            'asfp' => $asfp,
            'customer_event' => $customerEvent,
            'pic_event' => $picEvent,
            'id_po' => $id_po,
            'email_event' => $emailEvent,
            'id_event' => $id_event,
            'id_customer' => $id_customer,
            'grand_total' => (str_replace('.', '', $grand_total_other)),
            'revisi' => $update,
            'sisa_bast' => preg_replace("/[^0-9]/", "", $total_description),
            'discount_percent' => $discount_percent_other,
            'sub_total' => (str_replace('.', '', $netto)),
            'discount' => (str_replace('.', '', $discount_other)),
          ];
        } else {
          $data1 = [

            'date_quotation' => $date_quotation,
            'customer' => $customer_event,
            'tittle_event' => $title_event,
            'pic_name' => $name_pic,
            'pic_email' => $email_pic,
            'netto' => (str_replace('.', '', $total_description)),
            'asf' => (str_replace('.', '', $management)),
            'total' => (str_replace('.', '', $netto)),
            'note' => $note,
            'ppn' => (str_replace('.', '', $ppn_description)),
            'pph23' =>  preg_replace("/[^0-9]/", "", $pph_description),
            'date_expired' => $date_expired,
            'asfp' => $asfp,
            'customer_event' => $customerEvent,
            'pic_event' => $picEvent,
            'email_event' => $emailEvent,
            'id_po' => $id_po,
            'id_event' => $id_event,
            'id_customer' => $id_customer,
            'grand_total' => (str_replace('.', '', $grand_total_other)),
            'revisi' => $update,
            'sisa_bast' => preg_replace("/[^0-9]/", "", $total_description),
            'discount_percent' => $discount_percent_other,
            'discount' => (str_replace('.', '', $discount_other)),
            'sub_total' => (str_replace('.', '', $netto)),
            'image' => $upload_image,

          ];
        }


        $where = array('quotation_number' => $quotation_number);
        $this->db->where($where);
        $this->db->update('quotation_other', $data1);


        $this->session->set_flashdata('success', 'Successfully updated');
        redirect('Quotation/manage_quotation_other');
      }
    } else {

      if ($quotation_number != "") {
        $i = 0; // untuk loopingnya
        $a = $this->input->post('description');
        $b = $this->input->post('FrequencyDescription');
        $c = $this->input->post('UniPriceDescription');
        $d = $this->input->post('AmmountDescription');
        $f = $this->input->post('QuantityDescription');
        $e = $this->input->post('id');

        if ($a[1] != null) {

          foreach ($a as $row) {
            $data = [
              'desciption' => $row,
              'frequency' => $b[$i],
              'unitprice' => (str_replace('.', '', $c[$i])),
              'amount' => (str_replace('.', '', $d[$i])),
              'quantity' => $f[$i],
              'grandtotal' => (str_replace('.', '', $total_description)),
              'quotation_number' => $quotation_number_revisii . '-Rev' . $revisi,
              

              'revisi' => $revisi

            ];
            $insert = $this->db->insert('quotation_other_item', $data);
            $i++;
          }
        }

        $note = $this->input->post('note_desciption');
        $asf_percen_other = $this->input->post("asf_percen_other");
        $upload_image = $this->upload_image_other($quotation_number);

        if ($upload_image == '') {
          $data1 = [
            'date_quotation' => $date_quotation,
            'customer' => $customer_event,
            'tittle_event' => $title_event,
            'pic_name' => $name_pic,
            'pic_email' => $email_pic,
            'netto' => (str_replace('.', '', $total_description)),
            'asf' => (str_replace('.', '', $management)),
            'total' => (str_replace('.', '', $netto)),
            'note' => $note,
            'ppn' => (str_replace('.', '', $ppn_description)),
            'pph23' => preg_replace("/[^0-9]/", "", $pph_description),
            'date_expired' => $date_expired,
            'asfp' => $asfp,
            'customer_event' => $customerEvent,
            'pic_event' =>  $this->input->post("picEvent1"),
            'id_po' => $id_po,
            'email_event' => $emailEvent,
            'id_event' => $id_event,
            'id_customer' => $id_customer,
            'grand_total' => (str_replace('.', '', $grand_total_other)),
            'revisi' => $revisi,
            'sisa_bast' => preg_replace("/[^0-9]/", "", $total_description),
            'quotation_number' => $quotation_number_revisii . '-Rev' . $revisi,
            'discount_percent' => $discount_percent_other,
            'discount' => (str_replace('.', '', $discount_other)),
            'quotation_number_revisi' => $quotation_number_revisii,
            'sub_total' => (str_replace('.', '', $netto)),
            'image' => $this->input->post('filequotation'),

          ];
        } else {
          $data1 = [

            'date_quotation' => $date_quotation,
            'quotation_number' => $quotation_number . '-Rev' . $revisi,
            'customer' => $customer_event,
            'tittle_event' => $title_event,
            'pic_name' => $name_pic,
            'pic_email' => $email_pic,
            'netto' => (str_replace('.', '', $total_description)),
            'asf' => (str_replace('.', '', $management)),
            'total' => (str_replace('.', '', $netto)),
            'note' => $note,
            'ppn' => (str_replace('.', '', $ppn_description)),
            'pph23' => preg_replace("/[^0-9]/", "", $pph_description),
            'date_expired' => $date_expired,
            'asfp' => $asfp,
            'customer_event' => $customerEvent,
            'pic_event' => $picEvent,
            'email_event' => $emailEvent,
            'image' => $upload_image,
            'id_po' => $id_po,
            'id_event' => $id_event,
            'id_customer' => $id_customer,
            'sisa_bast' => preg_replace("/[^0-9]/", "", $total_description),
            'grand_total' => (str_replace('.', '', $grand_total_other)),
            'revisi' => $revisi,
            'quotation_number' => $quotation_number_revisii . '-Rev' . $revisi,
            'quotation_number_revisi' => $quotation_number_revisii,
            'sub_total' => (str_replace('.', '', $netto)),


          ];
        }


        // $where=array('quotation_number'=>$quotation_number);
        // $this->db->where($where);
        // $this->db->update('quotation_other',$data1);


        $this->db->insert('quotation_other', $data1);

        $this->session->set_flashdata('success', 'Successfully updated');
        redirect('Quotation/manage_quotation_other');
      }
    }
  }

  public function print_quotation_other($id)
  {
    if ((!in_array('viewQuatationsother', $this->permission))) {
      redirect('dashboard', 'refresh');
    }
    $this->db->select('revisi');
    $this->db->from('quotation_other');
    $this->db->where('quotation_number', $id);
    $row = $this->db->get()->row_array();

    $this->db->select('*');
    $this->db->from("quotation_other_item");
    $this->db->where('quotation_number', $id);
    $this->db->where('revisi', $row['revisi']);
    $this->db->order_by('quotation_other_item.id', 'asc');
    $this->data['quotation_other_item'] = $this->db->get()->result();

    $this->db->select('*');
    $this->db->from('quotation_other');
    $this->db->join("customer", "customer.name=quotation_other.customer");
    $this->db->where('quotation_number', $id);
    $row = $this->db->get()->row_array();
    $this->data['note'] = $row['note'];
    $this->data['alamat'] = $row['address'];
    $this->data['grand_total'] = number_format($row['grand_total'],0,',','.');
    $this->data['quotation_number'] = $row['quotation_number_revisi'];
    $this->data['netto'] = number_format($row['netto'],0,',','.');
    $this->data['asf'] = number_format($row['asf'],0,',','.');
    $this->data['total'] = number_format($row['total'],0,',','.');
    $this->data['ppn'] = number_format($row['ppn'],0,',','.');
    $this->data['pph23'] = number_format($row['pph23'],0,',','.');
    $this->data['discount'] = $row['discount'];
    $this->data['date_quotation'] = $row['date_quotation'];

    $this->data['title'] = $row['tittle_event'];
    // $this->data['pic_name']=$row['pic_name'];
    //   $this->data['customer']=$row['customer']; 
    $this->data['pic_name'] = $row['pic_event'];
    $this->data['customer'] = $row['customer_event'];


    $this->data['controller'] = $this;
    // $this->load->view('tamplate/header1',$this->data);
    // //$this->load->view('tamplate/sidebar',$this->data);
    // $this->load->view('QuatationEO/print_quotation_other',$this->data);
    //  $this->load->view('tamplate/footer1',$this->data);

    $mpdf = new \Mpdf\Mpdf([
      'mode' => 'utf-8', 'format' =>
      'A4', 'defaultPageNumStyle' => '1',
      'margin_right' => '5',
      'margin_left' => '5',
      'margin_bottom' => '10',
      'margin_top' => '6',

    ]);

    $data = $this->load->view('QuatationEO/download_laoran_other', $this->data, TRUE);
    $mpdf->setFooter('{PAGENO}');




    $mpdf->WriteHTML($data);

    $mpdf->Output();
  }

  public function print_quotation($id)
  {
    if ((!in_array('viewQuatations', $this->permission))) {
      redirect('dashboard', 'refresh');
    }
    $this->data['controller'] = $this;
    $this->db->select('*');
    $this->db->from('quotations');
    $this->db->where('quotation_number', $id);
    $row = $this->db->get()->row_array();


    $this->db->select('*');
    $this->db->from('quotations');
    $this->db->where('quotation_number', $id);
    $row = $this->db->get()->row_array();
    $this->data['venue'] = $row['venue_event'];
    $this->data['date'] = $row['date_quotation'];
    $this->data['pic_name'] = $row['pic_event'];
    $this->data['pic_email'] = $row['email_event'];
    $this->data['title_event'] = $row['tittle_event'];
    $this->data['quotation_number'] = $id;

    //    $this->data['pic_name']=$row['pic_name'];
    // $this->data['pic_email']=$row['pic_email']; 
    $this->data['comissionable_cost'] = $row['comissionable_cost'];
    $this->data['nonfee'] = $row['nonfee'];
    $this->data['asf'] = $row['asf'];
    $this->data['ppn'] = $row['ppn'];
    $this->data['pph'] = $row['pph'];
    $this->data['grand_total'] = $row['grand_total'];
    $this->data['discount'] = $row['discount'];
    $this->data['netto'] = $row['netto'];


    $this->data['total'] = $row['total_summary'];
    $this->db->distinct();
    $this->db->select('name ,metode,quotation_number');
    $this->db->from("quotation_sub_item");
    $this->db->where('quotation_number', $id);
    $this->data['quotation_sub_item'] = $this->db->get()->result();



    // $this->db->distinct(); 
    $this->db->select('quotation_item.item_value,attribute_values.satuanq,attribute_values.satuanf,quotation_item.rate,quotation_item.quantity,quotation_item.frrequency,quotation_item.subtotal,quotation_item.name_item');

    $this->db->from("quotation_item");
    $this->db->join('attribute_values', 'attribute_values.value = quotation_item.item_value');

    $this->db->where('quotation_number', $id);
    $this->db->order_by('quotation_item.id', 'asc');

    $this->data['quotation_item'] = $this->db->get()->result();

    $mpdf = new \Mpdf\Mpdf([
      'mode' => 'utf-8',
      'format' => 'A4',
      'defaultPageNumStyle' => '1',
      'margin_right' => '5',
      'margin_left' => '5',
      'margin_bottom' => '10',
      'margin_top' => '6',
    ]);

    $data = $this->load->view('QuatationEO/download_laporan', $this->data, TRUE);
    $mpdf->setFooter('{PAGENO}');




    $mpdf->WriteHTML($data);

    $mpdf->Output();
  }



  //    public function cekQuotation(){
  //   $quotation_event=$this->input->post("Quatations_number_event");
  //   $this->db->select('*');
  //   $this->db->from('quotations');
  //   $this->db->where('quotation_number',$quotation_event);
  //   $data=$this->db->get()->row_array();
  //   if ($data!=''){
  //     aksi_add_quotation();
  //   }else{

  //   }

  // }


  public function aksi_add_quotation()
  {

    $quotation_event = $this->input->post("Quatations_number_event");
    $Comissionable_cost = $this->input->post("Comissionable_cost");
    $asf = $this->input->post("asf");
    $total_summary = $this->input->post("total_summary");
    $pph = $this->input->post("pph");
    $ppn = $this->input->post("ppn");
    $Date_quotation = $this->input->post("date_quotation_event");
    $customer_event = $this->input->post("customer_event");
    $title_event = $this->input->post("title_event");
    $Vanue_event = $this->input->post("venue_event");
    $date_event = $this->input->post("date_event");
    $pic_event = $this->input->post("pic_event1");
    $id_po = $this->input->post("pic_event");
    $email_event = $this->input->post("email_event");
    $non_fee = $this->input->post("non_fee");
    $asf_percen = $this->input->post("asf_percen");
    $date_expired = $this->input->post("date_expired_event");
    $customerEvent = $this->input->post("customerEvent");
    $picEvent = $this->input->post("picEvent1");
    $id_event = $this->input->post("picEvent");
    $id_customer = $this->input->post("id_customer");
    $emailEvent = $this->input->post("emailEvent");
    $grand_total = $this->input->post("grand_total");

    $netto1 = $this->input->post("netto_event");
    $discount_percent1 = $this->input->post("discount_percent_event");
    $discount1 = $this->input->post("discount_event");
    $netto = preg_replace("/[^0-9]/", "", $netto1);
    $discount_percent = $discount_percent1;
    $discount = preg_replace("/[^0-9]/", "", $discount1);


    if ($quotation_event != "") {
      $i = 0; // untuk loopingnya
      $a = $this->input->post('quantity');
      $b = $this->input->post('frequency');
      $c = $this->input->post('rate');
      $d = $this->input->post('subtotal');
      $e = $this->input->post('name');
      $f = $this->input->post('metode');
      $g = $this->input->post('item_value');

      if ($a[0] !== null) {
        foreach ($a as $row) {
          $data2 = [
            'quotation_number' => $quotation_event,
            'name' => $e[$i],
            'metode' => $f[$i],

          ];



          $data = [
            'quantity' => $row,
            'frrequency' => $b[$i],
            'rate' => (str_replace('.', '', $c[$i])),
            'subtotal' => (str_replace('.', '', $d[$i])),
            'name_item' => $e[$i],
            'quotation_number' => $quotation_event,
            'metode' => $f[$i],
            'item_value' => $g[$i],

          ];

          $this->db->insert('quotation_item', $data);
          $this->db->insert('quotation_sub_item', $data2);





          $i++;
        }
      }


      $upload_image = $this->upload_image_add($quotation_event);
      if ($upload_image == '') {
        $upload_image = "dafault.png";
      }

      //$upload_image = "dafault.png";
      $data1 = [
        'quotation_number' => $quotation_event,
        'quotation_number_revisi' => $quotation_event,
        'date_quotation' => $Date_quotation,
        'customer' => $customer_event,
        'tittle_event' => $title_event,
        'pic_name' => $pic_event,
        'pic_email' => $email_event,
        'venue_event' => $Vanue_event,
        'asf' => (str_replace('.', '', $asf)),
        'date_event' => $date_event,
        'comissionable_cost' => (str_replace('.', '', $Comissionable_cost)),
        'ppn' => (str_replace('.', '', $ppn)),
        'pph' => preg_replace("/[^0-9]/", "", $pph),
        'date_expired' => $date_expired,
        'asfp' => $asf_percen,
        'total_summary' => (str_replace('.', '', $total_summary)),
        'nonfee' => (str_replace('.', '', $non_fee)),
        'pic_event' => $picEvent,
        'email_event' => $emailEvent,
        'customer_event' => $customerEvent,
        'image' => $upload_image,
        'id_customer' => $id_customer,
        'id_pic_event' => $id_event,
        'id_po' => $id_po,
        'grand_total' => (str_replace('.', '', $grand_total)),
        'sisa_bast' => (str_replace('.', '', $netto)),
        'netto' => (str_replace('.', '', $netto)),
        'discount_percent' => $discount_percent,
        'discount' => $discount,

      ];
      $this->db->insert('quotations', $data1);
      //  $this->db->insert('quotations_revisi',$data1);

      $this->session->set_flashdata('success', 'Successfully created');


      redirect("Quotation/manage_quotation");
    }
  }

  public function upload_image($quotation_number)
  {

    $config['upload_path']          = './assets/images/';

    $config["allowed_types"] = "*";

    $config['max_size']             = 10000;

    $config['max_width']            = 2000;

    $config['max_height']           = 1024;
    $config['file_name'] =  $quotation_number;
    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if (!$this->upload->do_upload('imagenes')) {

      $error = $this->upload->display_errors();
      return "";
    } else {
      $data = array('upload_data' => $this->upload->data());
      $type = explode('.', $_FILES['imagenes']['name']);
      $type = $type[count($type) - 1];

      $path = $config['file_name'] . '.' . $type;
      return $path;
    }
  }





  public function aksi_update_quotation()
  {

    $quotation_event = $this->input->post("Quatations_number");
    $Comissionable_cost = $this->input->post("Comissionable_cost");
    $asf = $this->input->post("asf");
    $total_summary = $this->input->post("total_summary");
    $pph = $this->input->post("pph");
    $ppn = $this->input->post("ppn");


    $Date_quotation = $this->input->post("date_quotation_event");
    $customer_event = $this->input->post("customer_event");
    $title_event = $this->input->post("title_event");
    $Vanue_event = $this->input->post("venue_event");
    $date_event = $this->input->post("date_event");
    $pic_event = $this->input->post("pic_event1");
    $id_po = $this->input->post("pic_event");
    $email_event = $this->input->post("email_event");
    $non_fee = $this->input->post("non_fee");
    $asf_percen = $this->input->post("asf_percen");
    $date_expired = $this->input->post("date_expired_event");
    $customerEvent = $this->input->post("customerEvent");
    $picEvent = $this->input->post("picEvent1");
    $id_event = $this->input->post("picEvent");
    $emailEvent = $this->input->post("emailEvent");
    $id_customer = $this->input->post("id_customer");
    $grand_total = $this->input->post("grand_total");
    $revisi = $this->input->post("revisi");
    $update = $this->input->post("update");
    $netto1 = $this->input->post("netto_event");
    $discount_percent1 = $this->input->post("discount_percent_event");
    $discount1 = $this->input->post("discount_event");
    $netto = $netto1;
    $discount_percent = $discount_percent1;
    $discount = $discount1;

    $quotation_number_revisii = $this->input->post("quotation_number_revisi");

    $btn = $this->input->post("btn");
    if ($btn == "update") {

      if ($quotation_event != "") {
        $i = 0; // untuk loopingnya
        $a = $this->input->post('quantity');
        $b = $this->input->post('frequency');
        $c = $this->input->post('rate');
        $d = $this->input->post('subtotal');
        $e = $this->input->post('name');
        $f = $this->input->post('metode');
        $g = $this->input->post('item_value');
        // $h = $this->input->post('id');




        if ($a[0] != null) {
          $this->model_users->hapus("quotation_number", $quotation_event, 'quotation_item', $update);
          $this->model_users->hapus("quotation_number", $quotation_event, 'quotation_sub_item', $update);

          //$this->model_users->hapus("quotation_number",$quotation_event,'quotation_sub_item');
          // $this->model_users->hapus_data($id);
          foreach ($a as $row) {
            $data2 = [
              'quotation_number' => $quotation_event,
              'name' => $e[$i],
              'metode' => $f[$i],

            ];

            $data = [
              'quantity' => $row,
              'frrequency' => $b[$i],
              'rate' => (str_replace('.', '', $c[$i])),
              'subtotal' => (str_replace('.', '', $d[$i])),
              'name_item' => $e[$i],
              'quotation_number' => $quotation_event,
              'metode' => $f[$i],
              'item_value' => $g[$i],

            ];
            $this->db->insert('quotation_item', $data);
            $this->db->insert('quotation_sub_item', $data2);

            $i++;
          }
        }
        $upload_image = $this->upload_image_add($quotation_event);

        if ($upload_image == '') {
          $data1 = [
            'date_quotation' => $Date_quotation,
            'customer' => $customer_event,
            'tittle_event' => $title_event,
            'pic_name' => $pic_event,
            'pic_email' => $email_event,
            'venue_event' => $Vanue_event,
            'asf' => (str_replace('.', '', $asf)),
            'date_event' => $date_event,
            'comissionable_cost' => (str_replace('.', '', $Comissionable_cost)),
            'ppn' => (str_replace('.', '', $ppn)),
            'pph' => preg_replace("/[^0-9]/", "", $pph),
            'date_expired' => $date_expired,
            'asfp' => $asf_percen,
            'total_summary' => (str_replace('.', '', $total_summary)),
            'nonfee' => (str_replace('.', '', $non_fee)),
            'pic_event' => $picEvent,
            'email_event' => $emailEvent,
            'customer_event' => $customerEvent,
            'id_customer' => $id_customer,
            'id_pic_event' => $id_event,
            'id_po' => $id_po,
            'grand_total' => (str_replace('.', '', $grand_total)),
            'sisa_bast' => (str_replace('.', '', $netto)),
            'netto' => (str_replace('.', '', $netto)),
            'discount_percent' => $discount_percent,
            'discount' => preg_replace("/[^0-9]/", "", $discount),
          ];
        } else {
          $data1 = [

            'date_quotation' => $Date_quotation,
            'customer' => $customer_event,
            'tittle_event' => $title_event,
            'pic_name' => $pic_event,
            'pic_email' => $email_event,
            'venue_event' => $Vanue_event,
            'asf' => (str_replace('.', '', $asf)),
            'date_event' => $date_event,
            'comissionable_cost' => (str_replace('.', '', $Comissionable_cost)),
            'ppn' => (str_replace('.', '', $ppn)),
            'pph' => preg_replace("/[^0-9]/", "", $pph),
            'date_expired' => $date_expired,
            'asfp' => $asf_percen,
            'total_summary' => (str_replace('.', '', $total_summary)),
            'nonfee' => (str_replace('.', '', $non_fee)),
            'pic_event' => $picEvent,
            'email_event' => $emailEvent,
            'customer_event' => $customerEvent,
            'image' => $upload_image,
            'id_customer' => $id_customer,
            'id_pic_event' => $id_event,
            'id_po' => $id_po,
            'grand_total' => (str_replace('.', '', $grand_total)),
            'sisa_bast' => (str_replace('.', '', $netto)),
            'netto' => (str_replace('.', '', $netto)),
            'discount_percent' => $discount_percent,
            'discount' => preg_replace("/[^0-9]/", "", $discount),

          ];
        }


        $where = array('quotation_number' => $quotation_event);
        $this->db->where($where);
        $update = $this->db->update('quotations', $data1);
        $this->session->set_flashdata('success', 'Successfully updated');
        redirect("Quotation/manage_quotation");
      }
    } else {
      if ($quotation_event != "") {
        $i = 0; // untuk loopingnya
        $a = $this->input->post('quantity');
        $b = $this->input->post('frequency');
        $c = $this->input->post('rate');
        $d = $this->input->post('subtotal');
        $e = $this->input->post('name');
        $f = $this->input->post('metode');
        $g = $this->input->post('item_value');
        //$h = $this->input->post('id');
        if ($a[0] != null) {
          foreach ($a as $row) {
            $data2 = [
              'quotation_number' => $quotation_number_revisii . '-Rev' . $revisi,
              'name' => $e[$i],
              'metode' => $f[$i],
            ];

            $data = [
              'quantity' => $row,
              'frrequency' => $b[$i],
              'rate' => (str_replace('.', '', $c[$i])),
              'subtotal' => (str_replace('.', '', $d[$i])),
              'name_item' => $e[$i],
              'quotation_number' => $quotation_number_revisii . '-Rev' . $revisi,
              'metode' => $f[$i],
              'item_value' => $g[$i],
            ];
            $this->db->insert('quotation_item', $data);
            $this->db->insert('quotation_sub_item', $data2);
            $i++;
          }
        }
        $upload_image = $this->upload_image_add($quotation_event);
        if ($upload_image == '') {
          $data1 = [
            'quotation_number' => $quotation_number_revisii . '-Rev' . $revisi,
            'quotation_number_revisi' => $quotation_number_revisii,
            'date_quotation' => $Date_quotation,
            'customer' => $customer_event,
            'tittle_event' => $title_event,
            'pic_name' => $pic_event,
            'pic_email' => $email_event,
            'venue_event' => $Vanue_event,
            'asf' => (str_replace('.', '', $asf)),
            'date_event' => $date_event,
            'comissionable_cost' => (str_replace('.', '', $Comissionable_cost)),
            'ppn' => (str_replace('.', '', $ppn)),
            'pph' => preg_replace("/[^0-9]/", "", $pph),
            'date_expired' => $date_expired,
            'asfp' => $asf_percen,
            'total_summary' => (str_replace('.', '', $total_summary)),
            'nonfee' => (str_replace('.', '', $non_fee)),
            'pic_event' => $picEvent,
            'email_event' => $emailEvent,
            'customer_event' => $customerEvent,
            'id_customer' => $id_customer,
            'id_pic_event' => $id_event,
            'id_po' => $id_po,
            'grand_total' => (str_replace('.', '', $grand_total)),
            'sisa_bast' => (str_replace('.', '', $netto)),
            'image' => $this->input->post('filequotation'),
            'netto' => (str_replace('.', '', $netto)),
            'discount_percent' => $discount_percent,
            'discount' => preg_replace("/[^0-9]/", "", $discount),



          ];
        } else {
          $data1 = [
            'quotation_number' => $quotation_number_revisii . '-Rev' . $revisi,

            'quotation_number_revisi' => $quotation_number_revisii,

            'date_quotation' => $Date_quotation,
            'customer' => $customer_event,
            'tittle_event' => $title_event,
            'pic_name' => $pic_event,
            'pic_email' => $email_event,
            'venue_event' => $Vanue_event,
            'asf' => (str_replace('.', '', $asf)),
            'date_event' => $date_event,
            'comissionable_cost' => (str_replace('.', '', $Comissionable_cost)),
            'ppn' => (str_replace('.', '', $ppn)),
            'pph' => preg_replace("/[^0-9]/", "", $pph),
            'date_expired' => $date_expired,
            'asfp' => $asf_percen,
            'total_summary' => (str_replace('.', '', $total_summary)),
            'nonfee' => (str_replace('.', '', $non_fee)),
            'pic_event' => $picEvent,
            'email_event' => $emailEvent,
            'customer_event' => $customerEvent,

            'image' => $upload_image,
            'id_customer' => $id_customer,
            'id_pic_event' => $id_event,
            'id_po' => $id_po,
            'grand_total' => (str_replace('.', '', $grand_total)),
            'sisa_bast' => (str_replace('.', '', $netto)),
            'netto' => (str_replace('.', '', $netto)),
            'discount_percent' => $discount_percent,
            'discount' => preg_replace("/[^0-9]/", "", $discount),


          ];
        }




        $this->db->insert('quotations', $data1);


        $this->session->set_flashdata('success', 'Successfully created revisi');


        redirect("Quotation/manage_quotation");
      }
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



    echo number_format($hitung, 0, ",", ".");
  }

  public function AmbilDataQuotation()
  {
    $quotation_number = $this->input->post("quotation_number");
    $this->db->select('*');

    $this->db->from('quotations');
    $this->db->join('customer', 'customer.id=quotations.id_customer');
    $this->db->join('pic_event', 'pic_event.id_event=quotations.id_pic_event');
    $this->db->join('pic_po', 'pic_po.id=quotations.id_po');
    $this->db->where('quotation_number', $quotation_number);

    $dataa = $this->db->get()->result();
    echo json_encode($dataa);
  }


  public function send_email()
  {
    $user_email = $this->session->userdata('email');
    $quotation_number = $this->input->post('quotation_number');
    $email = $this->input->post('email');
    $subject = $this->input->post('subject');
    $message = $this->input->post('message');
    $idd = substr($quotation_number, 0, 2);

    // Load PHPMailer library
    $this->load->library('phpmailer_lib');

    // PHPMailer object
    $mail = $this->phpmailer_lib->load();

    // SMTP configuration
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'rifanhidayat0811@gmail.com'; //email pengirim
    $mail->Password = 'capucino'; //password pengirim

    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';

    //email pengirim
    $mail->setFrom('rifanhidayat0811@gmail.com', 'Magenta EO');
    $mail->addReplyTo('rifanhidayat0811@gmail.com', 'MagentaEO');

    // Add a recipient
    $mail->addAddress($this->input->post('email')); //email penerima
    $mail->addAddress($this->input->post('email_event'));

    // Add cc or bcc 
    $mail->addCC($user_email);
    // $mail->addBCC('rifanhidayat0811@gmail.com');

    // Email subject
    // $pdf=$this->load->view('QuatationEO/download_laoran_other',$this->data,TRUE);


    $id = $quotation_number;
    if ($idd == "QE") {
      $this->data['controller'] = $this;


      $this->db->select('*');
      $this->db->from('quotations');
      $this->db->where('quotation_number', $id);
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
      $this->data['title_event'] = $row['tittle_event'];
      $this->data['quotation_number'] = $row['quotation_number'];
      $this->data['discount'] = $row['discount'];
      $this->data['netto'] = $row['netto'];


      $this->data['grand_total'] = $row['grand_total'];
      $this->data['total'] = $row['total_summary'];
      $this->db->distinct();
      $this->db->select('name ,metode,quotation_number');
      $this->db->from("quotation_sub_item");
      $this->db->where('quotation_number', $id);
      $this->data['quotation_sub_item'] = $this->db->get()->result();
      $this->db->distinct();
      $this->db->select('quotation_item.item_value,attribute_values.satuanq,attribute_values.satuanf,quotation_item.rate,quotation_item.quantity,quotation_item.frrequency,quotation_item.subtotal,quotation_item.name_item');

      $this->db->from("quotation_item");
      $this->db->join('attribute_values', 'attribute_values.value = quotation_item.item_value');

      $this->db->where('quotation_number', $id);
      $this->data['quotation_item'] = $this->db->get()->result();
      $data = $this->load->view('QuatationEO/download_laporan', $this->data, TRUE);
    } else {

      $this->db->select('*');
      $this->db->from("quotation_other_item");
      $this->db->where('quotation_number', $id);
      $row = $this->db->get()->result();
      $this->data['quotation_other_item'] = $row['quotation_number'];
      $this->data['grand_total'] = $row['grand_total'];

      $this->data['pph'] = $row['pph'];
      $this->db->from('quotation_other');
      $this->db->join("customer", "customer.name=quotation_other.customer");
      $this->db->where('quotation_number', $id);
      $row = $this->db->get()->row_array();
      $this->data['note'] = $row['note'];
      $this->data['alamat'] = $row['address'];

      $this->data['quotation_number'] = $row['quotation_number'];
      $this->data['netto'] = $row['netto'];
      $this->data['asf'] = $row['asf'];
      $this->data['total'] = $row['total'];
      $this->data['discount'] = $row['discount'];
      $this->data['ppn'] = $row['ppn'];
      $this->data['pph23'] = $row['pph23'];
      $this->data['date_quotation'] = $row['date_quotation'];
      $this->data['customer'] = $row['customer'];
      $this->data['title'] = $row['tittle_event'];
      $this->data['pic_name'] = $row['pic_name'];
      $data = $this->load->view('QuatationEO/download_laoran_other', $this->data, TRUE);
    }



    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'defaultPageNumStyle' => '1']);



    $mpdf->setFooter('{PAGENO}');
    $mpdf->WriteHTML($data);
    $pdf = $mpdf->output("", "S");
    $mail->Subject = $subject;
    $mail->addStringAttachment($pdf, $quotation_number . ".pdf");

    // Set email format to HTML
    $mail->isHTML(true);

    // Email body content

    if ($idd == "QE") {
      $mailContent = '<p>' . $message . '</p>';
      // <p>Click to download  :<a href="'.base_url().'Quotation/DownlodEvent?quotation_number='.$quotation_number.'">Download</a></p><br><br>

      // </p>';

      $mail->Body = $mailContent;
      // Send email
      if (!$mail->send()) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed
      
          </div>');
        redirect('Quotation/manage_quotation');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          
          Successfully
          </div>');


        redirect('Quotation/manage_quotation');
      }
    } else {
      $mailContent = '<p>' . $message . '</p>';
      // <p>Click to download  :<a href="'.base_url().'Quotation/DownlodOther?quotation_number='.$quotation_number.'">Download</a></p><br><br>

      // </p>';

      $mail->Body = $mailContent;
      // Send email
      if (!$mail->send()) {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed
      
          </div>');
        redirect('Quotation/manage_quotation_other');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          
          Successfully
          </div>');


        redirect('Quotation/manage_quotation');
      }
    }
  }
  public function DownlodOther()
  {
    $id = $this->input->get('quotation_number');
    $this->db->select('*');
    $this->db->from("quotation_other_item");

    $this->db->where('quotation_number', $id);
    $this->data['quotation_other_item'] = $this->db->get()->result();

    $this->db->select('*');
    $this->db->from('quotation_other');
    $this->db->join("customer", "customer.name=quotation_other.customer");
    $this->db->where('quotation_number', $id);
    $row = $this->db->get()->row_array();
    $this->data['note'] = $row['note'];
    $this->data['alamat'] = $row['address'];

    $this->data['quotation_number'] = $row['quotation_number'];
    $this->data['netto'] = $row['netto'];
    $this->data['asf'] = $row['asf'];
    $this->data['total'] = $row['total'];
    $this->data['ppn'] = $row['ppn'];
    $this->data['pph23'] = $row['pph23'];
    $this->data['customer'] = $row['customer'];
    $this->data['title'] = $row['tittle_event'];
    $this->data['pic_name'] = $row['pic_name'];
    $this->data['grand_total'] = $row['grand_total'];




    // $this->load->view('tamplate/header1',$this->data);
    // $this->load->view('QuatationEO/download_laoran_other',$this->data);
    // $this->load->view('tamplate/footer1',$this->data);

    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L', 'defaultPageNumStyle' => '1']);

    $data = $this->load->view('QuatationEO/download_laoran_other', $this->data, TRUE);
    $mpdf->setFooter('{PAGENO}');




    $mpdf->WriteHTML($data);

    $mpdf->Output();
  }
  public function DownlodEvent()
  {
    $id = $this->input->get('quotation_number');

    $this->data['controller'] = $this;


    $this->db->select('*');
    $this->db->from('quotations');
    $this->db->where('quotation_number', $id);
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
    $this->data['title_event'] = $row['tittle_event'];
    $this->data['quotation_number'] = $id;
    $this->data['grand_total'] = $row['grand_total'];
    $this->data['total'] = $row['total_summary'];
    $this->db->distinct();
    $this->db->select('name ,metode,quotation_number');
    $this->db->from("quotation_sub_item");
    $this->db->where('quotation_number', $id);
    $this->data['quotation_sub_item'] = $this->db->get()->result();



    $this->db->distinct();
    $this->db->select('quotation_item.item_value,attribute_values.satuanq,attribute_values.satuanf,quotation_item.rate,quotation_item.quantity,quotation_item.frrequency,quotation_item.subtotal,quotation_item.name_item');

    $this->db->from("quotation_item");
    $this->db->join('attribute_values', 'attribute_values.value = quotation_item.item_value');

    $this->db->where('quotation_number', $id);
    $this->data['quotation_item'] = $this->db->get()->result();


    // $this->load->view('tamplate/header1',$this->data);
    // $this->load->view('QuatationEO/download_laporan',$this->data);
    // $this->load->view('tamplate/footer1',$this->data);


    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L', 'defaultPageNumStyle' => '1']);

    $data = $this->load->view('QuatationEO/download_laporan', $this->data, TRUE);
    $mpdf->setFooter('{PAGENO}');




    $mpdf->WriteHTML($data);

    $mpdf->Output();
  }

  public function form_submit_laporan($quotation_number)
  {
    $idd = substr($quotation_number, 0, 2);
    if ($idd == "QE") {
      $this->db->select('*');
      $this->db->from('quotations');
      $this->db->where('quotation_number', $quotation_number);
      $row = $this->db->get()->row_array();
      $this->data['email_po'] = $row['pic_email'];
      $this->data['email_event'] = $row['email_event'];
      $this->data['subject'] = $row['tittle_event'];
      $this->data['quotation_number'] = $quotation_number;
    } else {
      $this->db->select('*');
      $this->db->from('quotation_other');
      $this->db->where('quotation_number', $quotation_number);
      $row = $this->db->get()->row_array();
      $this->data['email_po'] = $row['pic_email'];
      $this->data['email_event'] = $row['email_event'];
      $this->data['subject'] = $row['tittle_event'];
      $this->data['quotation_number'] = $quotation_number;
    }
    $this->load->view('tamplate/header', $this->data);
    $this->load->view('tamplate/sidebar', $this->data);
    $this->load->view('QuatationEO/form_submit_email', $this->data);
    $this->load->view('tamplate/footer', $this->data);
  }

  public function aksi_upload($quotation_event)
  {
    $config['upload_path']          = './assets/images_';
    $config['allowed_types']        = 'gif|jpg|png|pdf|jpeg';
    $config['max_size']             = 10000;
    $config['max_width']            = 10000;
    $config['max_height']           = 10000;
    $config['file_name']           = $quotation_event;

    $this->load->library('upload', $config);
    $this->upload->initialize($config);

    if (!$this->upload->do_upload('imagenes')) {
      $error = array('error' => $this->upload->display_errors());
      return $error;
    } else {
      $data = array('upload_data' => $this->upload->data());
      $type = explode('.', $_FILES['imagenes']['name']);
      $type = $type[count($type) - 1];

      $path = $config['file_name'] . '.' . $type;

      echo $path;
    }
  }

  function getStatus()
  {
    $quotation_number = $this->input->post('quotation_number');
    $this->db->select("status");
    $this->db->from('quotations');
    $this->db->where('quotation_number', $quotation_number);
    $data = $this->db->get()->result();
    echo json_encode($data);
  }
  function getStatusother()
  {
    $quotation_number = $this->input->post('quotation_number');
    $this->db->select("status");
    $this->db->from('quotation_other');
    $this->db->where('quotation_number', $quotation_number);
    $data = $this->db->get()->result();
    echo json_encode($data);
  }
  function updateStatus()
  {

    $status = $this->input->post('status');
    $note = $this->input->post('note');
    $quotation_number = $this->input->post('quotation_number');
    $this->db->select('*');
    $this->db->from('quotations');
    $this->db->where('quotation_number', $quotation_number);
    $row = $this->db->get()->row_array();
    if ($status == "Final") {
      $where = array('quotation_number' => $quotation_number);
      $where1 = array('quotation_number_revisi' => $row['quotation_number_revisi']);

      $data1 = [
        'status' => "Reject",
        'key_quotation' => "1"
      ];


      $this->db->where($where1);
      $this->db->update('quotations', $data1);

      $data = [
        'status' => "Final",
        'key_quotation' => "1",
        'noteStatus' => $note
      ];


      $this->db->where($where);
      $update = $this->db->update('quotations', $data);

      if ($update) {
        $result['pesan'] = "1";
      } else {
        $result['pesan'] = "0";
      }
    } else {
      $where = array('quotation_number' => $quotation_number);


      $data = [
        'status' => $status,
        'noteStatus' => $note
      ];



      $this->db->where($where);
      $update = $this->db->update('quotations', $data);

      if ($update) {
        $result['pesan'] = "1";
      } else {
        $result['pesan'] = "0";
      }
    }





    echo  json_encode($result);
  }
  function updateStatusother()
  {

    $status = $this->input->post('status');
    $note = $this->input->post('note');
    $quotation_number = $this->input->post('quotation_number');
    $this->db->select('*');
    $this->db->from('quotation_other');
    $this->db->where('quotation_number', $quotation_number);
    $row = $this->db->get()->row_array();
    if ($status == "Final") {
      $where = array('quotation_number' => $quotation_number);
      $where1 = array('quotation_number_revisi' => $row['quotation_number_revisi']);

      $data1 = [
        'status' => "Reject",
        'key_quotation' => "1"
      ];


      $this->db->where($where1);
      $this->db->update('quotation_other', $data1);

      $data = [
        'status' => "Final",
        'key_quotation' => "1",
        'noteStatus' => $note
      ];


      $this->db->where($where);
      $update = $this->db->update('quotation_other', $data);

      if ($update) {
        $result['pesan'] = "1";
      } else {
        $result['pesan'] = "0";
      }
    } else {
      $where = array('quotation_number' => $quotation_number);


      $data = [
        'status' => $status,
        'noteStatus' => $note
      ];



      $this->db->where($where);
      $update = $this->db->update('quotation_other', $data);

      if ($update) {
        $result['pesan'] = "1";
      } else {
        $result['pesan'] = "0";
      }
    }





    echo  json_encode($result);
  }
  // public function TampilDataquotation(){
  //   $this->db->select('*');
  //   $this->db->from('quotations');
  //   $data=$this->db->get()->result();
  //   echo json_encode($data);


  // }
  function add_ponumber()
  {
    $id = $this->input->post('id');
    $po_number = $this->input->post('po_number');
    $date_po = $this->input->post('date_po');
    $data = array(
      'po_number' => $po_number,
      'date_po_number' => $date_po,

    );
    $where = array(
      'id' => $id
    );
    $this->db->where($where);
    $this->db->update('quotations', $data);
  }

  function add_ponumber_other()
  {
    $id = $this->input->post('id');
    $po_number = $this->input->post('po_number');
    $date_po_number = $this->input->post('date_po');
    $data = array(
      'po_number' => $po_number,
      'date_po_number' => $date_po_number

    );
    $where = array(
      'id' => $id
    );
    $this->db->where($where);
    $this->db->update('quotation_other', $data);
  }
  public function getDataQuotation()
  {
    $id = $this->input->post("id");
    $where = array('id' => $id);
    $dataa = $this->model_users->AmbilId('quotations', $where)->result();
    echo json_encode($dataa);
  }
  public function getDataQuotationother()
  {
    $id = $this->input->post("id");
    $where = array('id' => $id);
    $dataa = $this->model_users->AmbilId('quotation_other', $where)->result();
    echo json_encode($dataa);
  }

  public function showStatus($s)
  {

    if ($s == "Open") {
      $baris = '<span class="label label-warning">Open</span>';
    } else if ($s == "Reject") {
      $baris = '<span class="label label-danger">Reject</span>';
    } else if ($s == "Close") {
      $baris = '<span class="label label-success">Close</span>';
    } else {
      $baris = "";
    }
    return $baris;
  }



  public function TampilDataquotation()
  {
    $this->load->model("model_quotationevent");
    $fetch_data = $this->model_quotationevent->make_datatables();
    $data = array();
    foreach ($fetch_data as $row) {

      if (in_array('updateQuatations', $this->permission)) {
        $this->db->select('*');
        $this->db->from('quotations');
        $this->db->where('quotation_number', $row->quotation_number);
        $d = $this->db->get()->row_array();
        if ($d['key_quotation'] == "1") {
          $edit = '<font color="#FFFFFF" size="2px"><a title="data tidak bisa diolah" class="btn btn-sm bg-gradient-secondary" ><font color="white"><i  class="fa fa-edit" ></i> </font></a>';
        } else {
          $edit = '<font color="#FFFFFF" size="2px"><a title="Edit" class="btn btn-sm bg-gradient-secondary" href="' . base_url('Quotation/edit_quotation/' . $row->quotation_number) . '"><font color="white"><i  class="fa fa-edit" ></i> </font></a>';
        }
      } else {
        $edit = '';
      }
      if (in_array('deleteQuatations', $this->permission)) {
        $delete = '<font color="#FFFFFF" size="2px"><a title="Delete" class="btn btn-sm bg-gradient-secondary" onclick="swetalert(' . $row->id . ')"><i class="fa fa-trash"></i><font size="2px"> </font></a></font>';
      } else {
        $delete = '';
      }
      if (in_array('viewQuatations', $this->permission)) {
        $print = '<font color="#FFFFFF" size="2px"><a title="Print" class="btn btn-sm bg-gradient-secondary"  href="' . base_url('Quotation/print_quotation/' . $row->quotation_number) . '" target="_blank" ><i class="fa fa-print"></i> </a></font>';
      } else {
        $print = '';
      }
      if (in_array('createBast', $this->permission) and $row->status == "Final" and $row->po_number != "") {
        $this->db->select('*');
        $this->db->from('bast');
        $this->db->where('quotation_number', $row->quotation_number);
        $data1 = $this->db->get()->row_array();

        $this->db->select('*');
        $this->db->from('quotations');
        $this->db->where('quotation_number', $row->quotation_number);
        $data2 = $this->db->get()->row_array();

        if (($data1 != '') and ($data2['sisa_bast'] == '0')) {
          $bast = '<font color="#FFFFFF" size="2px"><a title="Edit Bast" class="btn btn-sm bg-gradient-secondary" onclick="Createbast(' . $row->id . ');" ><i class="fa fa-check"></i><font size="2px"> BAST</a>';
        } else {
          $bast = '<font color="#FFFFFF" size="2px"><a title="Create Bast" class="btn btn-sm bg-gradient-secondary" onclick="Createbast(' . $row->id . ');" ><i class="fa fa-plus"></i><font size="2px"> BAST</a>';
        }
      } else {
        $bast = '';
      }

      if (in_array('viewQuatations', $this->permission) || in_array('statusQuatations', $this->permission)) {
        $view = '<font color="#FFFFFF" size="2px"><a   href="' . base_url('Quotation/view_quotation_event/' . $row->id) . '" title="View Data" class="btn btn-sm bg-gradient-secondary btn-view-file"><i class="fa fa-eye"></i><font size="2px"> </font></a>';
      } else {
        $view = '';
      }
      if ($row->status == "Final") {


        if ($row->po_number == "") {
          $po = '<font color="#FFFFFF" size="2px"><a title="Add PO" onclick="AmbilData(' . $row->id . ')" class="btn btn-sm bg-gradient-secondary" data-toggle="modal" data-target="#po_number" ><i class="fa fa-plus"></i><font size="2px" > PO</a>';
        } else {
          $po = '<font color="#FFFFFF" size="2px"><a title="Edit PO" onclick="AmbilData(' . $row->id . ')" class="btn btn-sm bg-gradient-secondary" data-toggle="modal" data-target="#po_number" ><i class="fa fa-edit"></i><font size="2px" > PO</a>';
        }
      } else {
        $po = '';
      }





      $email = '<font color="#FFFFFF" size="2px"><a title="Email" class="btn btn-sm bg-gradient-secondary" href="' . base_url('Quotation/form_submit_laporan/' . $row->quotation_number) . '" ><i class="fa fa-envelope"></i></a></font>';

      if ($row->status == "Open") {
        $status = '<span class="label label-warning">Open</span>';
      } else if ($row->status == "Reject") {
        $this->db->select('*');
        $this->db->from('quotations');
        $this->db->where('quotation_number', $row->quotation_number);
        $d = $this->db->get()->row_array();
        if ($d['key_quotation'] == "1") {
          $status = '<span class="label label-danger fa fa-lock"> Reject</span>';
        } else {
          $status = '<span class="label label-danger">Reject</span>';
        }
      } else if ($row->status == "Close") {
        $status = '<span class="label label-success">Close</span>';
      } else if ($row->status == "Final") {
        $status = '<span class="label infoo fa fa-lock"> Final</span>';
      } else {
        $status = "";
      }

      $sub_array = array();
      $sub_array[] = $row->quotation_number;
      $sub_array[] = $row->date_quotation;
      $sub_array[] = $row->customer;
      $sub_array[] = $row->tittle_event;

      $sub_array[] = number_format($row->comissionable_cost, 0, ",", ".");
      $sub_array[] = number_format($row->nonfee, 0, ",", ".");
      $sub_array[] = number_format($row->netto, 0, ",", ".");
      $sub_array[] = number_format($row->sisa_bast, 0, ",", ".");
      $sub_array[] = $row->po_number;
      $sub_array[] = $status;
      $sub_array[] = $row->noteStatus;

      $sub_array[] = $edit . ' ' . $delete . ' ' . $print . ' ' . $email . ' ' . $view . ' ' . $po . ' ' . $bast;
      $data[] = $sub_array;
    }
    $output = array(
      "draw"                    =>     intval($_POST["draw"]),
      "recordsTotal"          =>      $this->model_quotationevent->get_all_data(),
      "recordsFiltered"     =>     $this->model_quotationevent->get_filtered_data(),
      "data"                    =>     $data
    );
    echo json_encode($output);
  }

  public function TampilDataquotationother()
  {
    $this->load->model("model_quotationother");
    $fetch_data = $this->model_quotationother->make_datatables();
    $data = array();
    foreach ($fetch_data as $row) {
      if (in_array('updateQuatationsother', $this->permission)) {

        $this->db->select('*');
        $this->db->from('quotation_other');
        $this->db->where('quotation_number', $row->quotation_number);
        $d = $this->db->get()->row_array();
        if ($d['key_quotation'] == "1") {
          $edit = '<font color="#FFFFFF" size="2px"><a title="Data tidak bisa diolah" class="btn btn-sm bg-gradient-secondary" ><font color="white"><i  class="fa fa-edit" ></i> </font></a>';
        } else {
          $edit = '<font color="#FFFFFF" size="2px"><a title="Edit" class="btn btn-sm bg-gradient-secondary" href="' . base_url('Quotation/edit_quotation_other/' . $row->quotation_number) . '"><font color="white"><i  class="fa fa-edit" ></i> </font></a>';
        }
      } else {
        $edit = '';
      }

      if (in_array('deleteQuatationsother', $this->permission)) {
        $delete = '<font color="#FFFFFF" size="2px"><a title="Delete" class="btn btn-sm bg-gradient-secondary" onclick="swetalert(' . $row->id . ')"><i class="fa fa-trash"></i><font size="2px"> </font></a></font>';
      } else {
        $delete = '';
      }


      if (in_array('viewQuatationsother', $this->permission)) {
        $print = '<font color="#FFFFFF" size="2px"><a title="Print" class="btn btn-sm bg-gradient-secondary"  href="' . base_url('Quotation/print_quotation_other/' . $row->quotation_number) . '" target="_blank" ><i class="fa fa-print"></i> </a></font>';
      } else {
        $print = '';
      }
      if (in_array('createBast', $this->permission) and  $row->status == "Final" and $row->po_number != "") {
        $this->db->select('*');
        $this->db->from('bast');
        $this->db->where('quotation_number', $row->quotation_number);
        $data1 = $this->db->get()->row_array();

        $this->db->select('*');
        $this->db->from('quotation_other');
        $this->db->where('quotation_number', $row->quotation_number);
        $data2 = $this->db->get()->row_array();

        if (($data1 != '') and ($data2['sisa_bast'] == '0')) {
          $bast = '<font color="#FFFFFF" size="2px"><a title="Edit Bast" class="btn btn-sm bg-gradient-secondary" onclick="Createbast(' . $row->id . ');" ><i class="fa fa-check"></i><font size="2px"> BAST</a>';
        } else {
          $bast = '<font color="#FFFFFF" size="2px"><a title="Create Bast" class="btn btn-sm bg-gradient-secondary" onclick="Createbast(' . $row->id . ');" ><i class="fa fa-plus"></i><font size="2px"> BAST</a>';
        }
      } else {
        $bast = '';
      }

      if (in_array('viewQuatationsother', $this->permission) || in_array('statusQuatationsother', $this->permission)) {
        $view = '<font color="#FFFFFF" size="2px"><a   href="' . base_url('Quotation/view_quotation_other/' . $row->quotation_number) . '" title="View Data" class="btn btn-sm bg-gradient-secondary btn-view-file"><i class="fa fa-eye"></i><font size="2px"> </font></a>';
      } else {
        $view = '';
      }
      if ($row->status == "Final") {

        if ($row->po_number == "") {
          $po = '<font color="#FFFFFF" size="2px"><a title="Add PO" onclick="AmbilData(' . $row->id . ')" class="btn btn-sm bg-gradient-secondary" ><i class="fa fa-plus"></i><font size="2px" data-toggle="modal" data-target="#po_number"> PO</a>';
        } else {
          $po = '<font color="#FFFFFF" size="2px"><a title="Edit PO" onclick="AmbilData(' . $row->id . ')" class="btn btn-sm bg-gradient-secondary" data-toggle="modal" data-target="#po_number" ><i class="fa fa-edit"></i><font size="2px" > PO</a>';
        }
      } else {
        $po = '';
      }




      $email = '<font color="#FFFFFF" size="2px"><a title="Email" class="btn btn-sm bg-gradient-secondary" href="' . base_url('Quotation/form_submit_laporan/' . $row->quotation_number) . '" ><i class="fa fa-envelope"></i></a></font>';





      if ($row->status == "Open") {
        $status = '<span class="label label-warning">Open</span>';
      } else if (($row->status == "Reject")) {
        $this->db->select('*');
        $this->db->from('quotation_other');
        $this->db->where('quotation_number', $row->quotation_number);
        $d = $this->db->get()->row_array();
        if ($d['key_quotation'] == "1") {
          $status = '<span class="label label-danger fa fa-lock"> Reject</span>';
        } else {
          $status = '<span class="label label-danger">Reject</span>';
        }
      } else if ($row->status == "Close") {
        $status = '<span class="label label-success">Close</span>';
      } else if ($row->status == "Final") {
        $note="2";
        $status = '<span class="label infoo fa fa-lock"> Final</span>';
      } else {
        $status = "";
      }
      $sub_array = array();

      $sub_array[] = $row->quotation_number;
      $sub_array[] = $row->date_quotation;
      $sub_array[] = $row->customer;
      $sub_array[] = $row->tittle_event;

      $sub_array[] = number_format($row->asf, 0, ',', '.');
      $sub_array[] = number_format($row->discount, 0, ",", ".");
      $sub_array[] = number_format($row->netto, 0, ',', '.');

      $sub_array[] = number_format($row->sisa_bast, 0, ",", ".");
      $sub_array[] = $row->po_number;

      $sub_array[] = $status;
      $sub_array[] = $row->noteStatus;

      $sub_array[] = $edit . ' ' . $delete . ' ' . $print . ' ' . $email . ' ' . $view . ' ' . $po . ' ' . $bast;
      $data[] = $sub_array;
    }
    $output = array(
      "draw"                    =>     intval($_POST["draw"]),
      "recordsTotal"          =>      $this->model_quotationother->get_all_data(),
      "recordsFiltered"     =>     $this->model_quotationother->get_filtered_data(),
      "data"                    =>     $data
    );
    echo json_encode($output);
  }


  public function cekQuotationEvent()
  {
    $quotation_number = $this->input->post('quotation_number');
    $cek = $this->model_quotationevent->cek('quotations', $quotation_number);
    if ($cek == '') {
      $result['status'] = "kosong";
    } else {
      $result['status'] = "tersedia";
    }
    echo json_encode($result);
  }
  public function cekQuotationOther()
  {
    $quotation_number = $this->input->post('quotation_number');
    $cek = $this->model_quotationevent->cek('quotation_other', $quotation_number);
    if ($cek == '') {
      $result['status'] = "kosong";
    } else {
      $result['status'] = "tersedia";
    }
    echo json_encode($result);
  }
}
