<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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

	public function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
	}

	public function index(){

		$curr=$this->M_buku->select_data_curr()->row();
		$tahapan= $curr->tahapan;

		if ($tahapan==0) {
			$status='2';
			$data['pesan']= 'Pengisian Data Permintan Buku Akan Ditutup pada: '.$curr->tgl_selesai_input;
		
			

		} else{
			$status='0';

			$data['pesan']= 'Pengisian Data Sudah Ditutup';
		}
		$data['buku']=$this->M_buku->select_katalog($status);
		$this->load->view('v_pilih_buku',$data);
		
	}

	public function terpilih(){

		$curr=$this->M_buku->select_data_curr()->row();
		$tahapan= $curr->tahapan;
		$cek= $this->M_buku->total_harga_terpilih();

		$total=0;
		foreach ($cek->result() as $harga){
		$total+=$harga->total_harga_terpilih;
		}

		$curr=$this->M_buku->select_data_curr()->row();
		$data['anggaran']= $this->rupiah($curr->anggaran);
		
		$data['total_terpilih']= $this->rupiah($total);
		

		$data['buku']=$this->M_buku->select_buku_terpilih();	
		$data['pesan']= 'Pengisian Data Permintan Buku Akan Ditutup pada: '.$curr->tgl_selesai_input;
		$data['tahapan']= $tahapan;
		
		$this->load->view('v_buku_terpilih',$data);

	}
	public function tabel_katalog(){
		$status='2';
		$data['buku']=$this->M_buku->select_katalog($status);

		$this->load->view('user/v_tabel_buku_terpilih',$data);

	}
	public function tabel_terpilih_user(){

		$cek= $this->M_buku->total_harga_terpilih();

		$total=0;
		foreach ($cek->result() as $harga){
		$total+=$harga->total_harga_terpilih;
		}
		$curr=$this->M_buku->select_data_curr()->row();
		$data['anggaran']= $this->rupiah($curr->anggaran);
		
		$data['total_terpilih']= $this->rupiah($total);

		$data['buku']=$this->M_buku->select_buku_terpilih();

		$this->load->view('user/v_tabel_buku_terpilih_user',$data);

	}

	public function detail_buku($id){
        $detail=$this->M_buku->select($id)->row();
        echo json_encode($detail);
    }

    public function pilih_buku () {

    	$id_buku = $this->input->post('id');
        $jumlah = $this->input->post('jumlah');

        $cek= $this->M_buku->jumlah_sementara($id_buku)->row();
        $jumlah_total= $cek->jumlah+$jumlah;

        $total_harga_terpilih=$jumlah*$cek->harga;
        $total_harga=$jumlah_total*$cek->harga;

        $this->M_buku->pilih_buku($id_buku,$jumlah,$jumlah_total,$total_harga_terpilih,$total_harga);
        $this->tabel_katalog();
       

    }



	public function hapus_pilihan($id_pilih)
    {
      	$cari= $this->M_buku->jumlah_dan_id_sementara($id_pilih)->row();
      	$id_buku = $cari->buku_id;
      	$jumlah_sementara = $cari->jumlah_terpilih;

       	$cek= $this->M_buku->jumlah_sementara($id_buku)->row();
        $jumlah_total= $cek->jumlah-$jumlah_sementara;

        $total_harga=$jumlah_total*$cek->harga;

        // echo $jumlah_total.' '.$total_harga;

        $this->M_buku->hapus_pilihan($id_pilih,$id_buku,$total_harga,$jumlah_total);
        
        $this->tabel_terpilih_user();
    }






}