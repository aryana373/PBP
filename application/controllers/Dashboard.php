<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_buku');

		if (!$this->session->userdata('isLoggedIn')){
			$this->load->view('v_redirect_login');
			return;
		}
	}

	public function index(){

	
		$data['database']= $this->M_buku->total_database_buku();
		$data['katalog']= $this->M_buku->total_katalog_buku();
		$data['pengguna']= $this->M_buku->total_pengguna();
		$data['buku_terpilih']= $this->M_buku->total_buku_terpilih();

		$data['curr']=$this->M_buku->select_curr_tahapan();
	   
		$this->load->view('v_dashboard',$data);

	}


	public function dasboard_data(){

		$data['curr']=$this->M_buku->select_curr_tahapan();
	   
		$this->load->view('v_dashboard_data',$data);

	}
	

	public function update(){
		$data['curr']=$this->M_buku->select_curr_tahapan();

		 $anggaran = $this->input->post('anggaran');
		 $tanggal = $this->input->post('tanggal');
		 $tahap = $this->input->post('tahap');

		 $datax = array(
			'anggaran' => $anggaran,
			'tgl_selesai_input' => $tanggal,
			'tahapan' => $tahap,
			);

		$this->db->where('id','1');
		$this->db->update('tb_curr_tahapan', $datax);
		$this->dasboard_data();

	}



}