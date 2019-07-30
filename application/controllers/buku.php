<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

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
		$data['tampil_buku']=$this->buku->tampil_buku();
		$data['kategori']=$this->buku->data_kategori();
		$data['konten']="buku";
		$data['judul']="Daftar Buku";
		$this->load->view('template', $data);
	}
	public function tambah()
	{
		$this->form_validation->set_rules('judul_buku', 'judul buku', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './asset/gambar/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '1000';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
			if($_FILES['gambar']['name']!=""){
				$this->load->library('upload', $config);
			
				if ( ! $this->upload->do_upload('gambar')){
					$this->session->set_flashdata('pesan', $this->upload->display_errors());
				}
				else{
					if($this->buku->simpan_buku($this->upload->data('file_name'))){
						$this->session->set_flashdata('pesan', 'sukses menambah');	
					} else {
						$this->session->set_flashdata('pesan', 'gagal menambah');	
					}
					redirect('buku','refresh');		
				}
			} else {
				if($this->buku->simpan_buku('')){
					$this->session->set_flashdata('pesan', 'sukses menambah');	
				} else {
					$this->session->set_flashdata('pesan', 'gagal menambah');	
				}
				redirect('buku','refresh');	
			}
			
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect('buku','refresh');
		}

	}
	public function hapus($id_buku='')
	{
		if($this->buku->hapus_buku($id_buku)){
			$this->session->set_flashdata('pesan', 'Sukses Hapus Buku');
			redirect('buku','refresh');
		} else {
			$this->session->set_flashdata('pesan', 'Gagal Hapus Buku');
			redirect('buku','refresh');	
		}
	}
	public function edit_buku($id)
	{
		$data=$this->buku->detail($id);
		echo json_encode($data);
	}
	public function buku_update()
	{

		if($this->input->post('simpan')){
			if($_FILES['gambar']['name']==""){
				if($this->buku->buku_update_no_foto()){
					$this->session->set_flashdata('pesan', 'Sukses update');
					redirect('buku');
				} else {
					$this->session->set_flashdata('pesan', 'Gagal update');
					redirect('buku');
				}
			} else {
				$config['upload_path'] = './asset/bukti/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']  = '20000';
				$config['max_width']  = '5024';
				$config['max_height']  = '5768';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('gambar')){
					$this->session->set_flashdata('pesan', 'Gagal Upload');
					redirect('buku');
				}
				else{
					if($this->buku->buku_update_dengan_foto($this->upload->data('file_name'))){
						$this->session->set_flashdata('pesan', 'Sukses update');
						redirect('buku');
					} else {
						$this->session->set_flashdata('pesan', 'Gagal update');
						redirect('buku');
					}
				}
			}
			
		}

	}

}

/* End of file buku.php */
/* Location: ./application/controllers/buku.php */