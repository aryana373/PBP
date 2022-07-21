<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_buku extends CI_Model {

	public function select_all(){

      $this->db->select('*');
	  return $this->db->get('tb_buku');
	}

	public function select_buku_database(){

      $this->db->select('*');
      $this->db->where('status','1');
	  return $this->db->get('tb_buku');
	}
	public function select_katalog(){

      $this->db->select('*');
      $this->db->where('status','2');
      $this->db->order_by('id_buku',"desc");
	  return $this->db->get('tb_buku');
	}

	public function tambah_katalog($data){
		$this->db->insert('tb_buku', $data);
	}

	public function select($id){

      $this->db->select('*');
	  $this->db->where('id_buku',$id);
	  return $this->db->get('tb_buku');
	}

	public function update_buku($id,$judul,$pengarang, $penerbit, $tahun, $harga, $bahasa)
	{
		 $data = array(
			'judul' => $judul,
			'pengarang' => $pengarang,
			'penerbit' => $penerbit,
			'tahun' => $tahun,
			'status' => '2',
			'harga' => $harga,
			'bahasa' => $bahasa,
			);

		$this->db->where('id_buku',$id);
		$this->db->update('tb_buku', $data);
	} 

}