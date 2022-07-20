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

		$data['buku']=$this->M_buku->select_buku_database();

		$this->load->view('v_koleksi_buku',$data);

	}

	public function katalog(){

		$data['buku']=$this->M_buku->select_katalog();

		$this->load->view('v_katalog',$data);

	}

	// public function tambah_katalog(){
	// 	$judul = $this->input->post('judul');
	// 	$pengarang = $this->input->post('pengarang');
	// 	$penerbit = $this->input->post('penerbit');
	// 	$tahun = $this->input->post('tahun');
	// 	$harga = $this->input->post('harga');
 
	// 	$data = array(
	// 		'judul' => $judul,
	// 		'pengarang' => $pengarang,
	// 		'penerbit' => $penerbit,
	// 		'tahun' => $tahun,
	// 		'status' => '2',
	// 		'harga' => $harga
	// 		);
	// 	$this->M_buku->tambah_katalog($data);
	// 	redirect('Buku/katalog','refresh');
	// }

	public function tambah_katalog()
        {
          $judul = $this->input->post('judul');
          $pengarang = $this->input->post('pengarang');
          $penerbit = $this->input->post('penerbit');
          $tahun = $this->input->post('tahun');
          $harga = $this->input->post('harga');
          $bahasa = $this->input->post('bahasa');
          $tgl_input = date('Y-m-d');
           
          
          $data = array(
			'judul' => $judul,
			'pengarang' => $pengarang,
			'penerbit' => $penerbit,
			'tahun' => $tahun,
			'status' => '2',
			'harga' => $harga,
			'bahasa' => $bahasa,
			'tgl_input' => $tgl_input
			);


          $this->M_buku->tambah_katalog($data);
          
          $this->detail();
          }


    public function detail()
        {
          $data['buku']=$this->M_buku->select_katalog();
		  $this->load->view('v_detail_katalog',$data);

        }



	public function hapus_katalog($id)
    {
      
        $this->db->where('id_buku', $id);
        $this->db->delete('tb_buku');
        $this->detail();
    }



}