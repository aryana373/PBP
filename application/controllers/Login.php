<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_buku');
		 $this->load->library('session');      
	} 

	public function index()
	{
		if ($this->session->userdata('isLoggedIn')) {

			if ($this->session->userdata('jenis_user')=='admin') {
				$this->load->view('v_dashboard');
			}
			else {
				redirect('User','refresh');
			}
			
			
			
		}
		$this->load->view('v_login', FALSE);
	}
	public function auth()
	{
		if ($this->session->userdata('isLoggedIn')) {
			$this->load->view('v_dashboard');
			
	
		}
		else{
			$user = $this->input->post('username');
			$pass = md5($this->input->post('password'));
			$admin= $this->M_user->getLogin($user,$pass)->row_array();
			if (is_null($admin)) {
				$this->session->set_flashdata('login_failed','username dan password salah');
				redirect($this->agent->referrer(),'refresh');
			} else{

				$admin['isLoggedIn']=true;
				$this->session->set_userdata($admin);
				
					if ($this->session->userdata('jenis_user')=='admin') {
						redirect('Dashboard','refresh');
					}
					else {
						redirect('User','refresh');
					}
			
				}
			
		}
	
	}

	public function unauth()
	{
		$this->session->sess_destroy();
		redirect('Login','refresh');
	}

	
}
