<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

public function __construct()
{
	parent::__construct();
	if($this->session->userdata('login_admin')==TRUE){
			redirect('admin','refresh');
		}
	$this->load->model('m_user');
}

	public function index()
	{
		$this->load->view('login');
	}

	
	public function proses_login()
	{
		if($this->input->post('login')){
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				
				if($this->m_user->get_login()->num_rows()>0){
					$data=$this->m_user->get_login()->row();
					$array = array(
						'login_admin' => TRUE,
						'nama_lengkap'=>$data->nama_admin,
						'username'=>$data->username,
						'password'=>$data->password,
						'id_peminjam'=>$data->id_admin,
						'jabatan'=>$data->jabatan
					);
					
					$this->session->set_userdata( $array );
					$data1['status']=1;
					$data1['keterangan']="Anda Sukses Login";
					echo json_encode($data1);
				} else {
					$data1['status']=0;
					$data1['keterangan']="username dan password salah";
					echo json_encode($data1);
				}
			} else {
				$data1['status']=0;
				$data1['keterangan']=validation_errors();
				echo json_encode($data1);
			}
		}
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */