<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public function getLogin($user,$pass)
	{
		$this->db->select('*');
		$this->db->where('username',$user);
		$this->db->where('password',$pass);
		return $this->db->get('user');
	} 
}