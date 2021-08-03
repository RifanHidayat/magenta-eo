<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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

		$id = $this->session->userdata('id');
		$group_data = $this->model_groups->getGroupData($id);

		$this->db->select('total_summary');
		$this->db->from('quotations');
		$quotations = $this->db->get()->result();
		$dataquotation = 0;
		foreach ($quotations as $key) {
			$total = (str_replace('.', '', $key->total_summary));
			$dataquotation = $dataquotation + $total;
			# code...
		}


		$this->db->select('total');
		$this->db->from('quotation_other');
		$quotation_other = $this->db->get()->result();
		$dataquotationother = 0;
		$totalquotationother = 0;
		foreach ($quotation_other as $key) {
			$totalquotationother = (str_replace('.', '', $key->total));
			$dataquotationother = $dataquotationother + $totalquotationother;
			# code...
		}
		$datafakturevent = 0;
		$faktur = $this->db->query("SELECT total_faktur from faktur where quotation_number like '%QE%'")->result();

		foreach ($faktur as $key) {
			$totalfakturevent = (str_replace('.', '', $key->total_faktur));
			$datafakturevent = $datafakturevent + $totalfakturevent;
			# code...
		}


		$fakturother = $this->db->query("SELECT total_faktur from faktur where quotation_number like '%QO%'")->result();
		$datafakturother = 0;
		foreach ($fakturother as $key) {
			$totalfakturother = (str_replace('.', '', $key->total_faktur));
			$datafakturother = $datafakturother + $totalfakturother;
			# code...
		}




		$this->data['totalquotation'] = $dataquotation;
		$this->data['totalquotationother'] = $dataquotationother;
		$this->data['totalfaktur'] = $datafakturevent;
		$this->data['totalfakturother'] = $datafakturother;
		$this->data['group_data'] = $group_data;

		$this->load->view('tamplate/header', $this->data);
		$this->load->view('tamplate/sidebar', $this->data);
		$this->load->view('dashboard/index', $this->data);
		$this->load->view('tamplate/footer', $this->data);
	}

	function getStatatusEvent()
	{


		$query = $this->db->query("SELECT date_quotation as date,SUM(IF(status='open',1,0)) as Open ,SUM(IF(status='Reject',1,0)) as Reject ,SUM(IF(status='Close',1,0)) as Close ,SUM(IF(status='Final',1,0)) as Final ,COUNT(*) as jml FROM quotations GROUP BY YEAR(date_quotation),MONTH(date_quotation)")->result();
		echo  json_encode($query);
	}


	function getStatatusOther()
	{


		$query = $this->db->query("SELECT date_quotation as date,SUM(IF(status='open',1,0)) as Open ,SUM(IF(status='Reject',1,0)) as Reject ,SUM(IF(status='Close',1,0)) as Close ,SUM(IF(status='Final',1,0)) as Final ,COUNT(*) as jml FROM quotation_other GROUP BY YEAR(date_quotation),MONTH(date_quotation)")->result();
		echo  json_encode($query);
	}
	function getStatatusFaktur()
	{


		$query = $this->db->query("SELECT date_faktur as date,SUM(IF(status='open',1,0)) as Open ,SUM(IF(status='Reject',1,0)) as Reject ,SUM(IF(status='Close',1,0)) as Close ,COUNT(*) as jml FROM faktur GROUP BY YEAR(date_faktur),MONTH(date_faktur)")->result();
		echo  json_encode($query);
	}
	function getStatatusBast()
	{


		$query = $this->db->query("SELECT date_bast as date,SUM(IF(status='open',1,0)) as Open ,SUM(IF(status='Reject',1,0)) as Reject ,SUM(IF(status='Close',1,0)) as Close ,COUNT(*) as jml FROM bast GROUP BY YEAR(date_bast),MONTH(date_bast)")->result();
		echo  json_encode($query);
	}
	function getStatatusDelivery()
	{


		$query = $this->db->query("SELECT date_pengiriman as date,SUM(IF(status='open',1,0)) as Open ,SUM(IF(status='Reject',1,0)) as Reject ,SUM(IF(status='Close',1,0)) as Close ,COUNT(*) as jml FROM delivery GROUP BY YEAR(date_pengiriman),MONTH(date_pengiriman)")->result();
		echo  json_encode($query);
	}
}
