<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_buku');
		// $this->load->model('M_dashboard');
		 //$this->load->library('pdf');

		if (!$this->session->userdata('isLoggedIn')){
			$this->load->view('v_redirect_login');
			return;
		}
	}

	public function index(){

		$data['buku']=$this->M_buku->select_all();

		$this->load->view('v_koleksi_buku',$data);

	}



}