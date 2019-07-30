<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
public function __construct()
{
	parent::__construct();
	if($this->session->userdata('login_admin')!=TRUE){
			redirect('login','refresh');
		}
	$this->load->model('m_buku','buku');
}
	public function index()
	{
		$data['konten']="home";
		$data['judul']="DashboardKu";
		$this->load->view('template', $data);		
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login','refresh');
	}
	
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */