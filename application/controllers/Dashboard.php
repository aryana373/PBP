<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// $this->load->model('M_admin');
		// $this->load->model('M_dashboard');
		 //$this->load->library('pdf');

		if (!$this->session->userdata('isLoggedIn')){
			$this->load->view('v_redirect_login');
			return;
		}
	}

	public function index(){
	   
		$this->load->view('v_dashboard');

	}



}