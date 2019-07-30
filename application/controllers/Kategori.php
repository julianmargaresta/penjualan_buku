<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('m_kategori','kat');
	}
	public function index()
	{
		$data['tampil_kategori']=$this->kat->tampil_kat();
		$data['konten']="v_kategori";
		$data['judul']="Kategori";
		$this->load->view('template', $data);
	}
	public function edit_kategori($id)
	{
		$data=$this->kat->detail($id);
		echo json_encode($data);
	}
	public function tambah()
	{
		if($this->input->post('simpan')){
			if($this->kat->simpan_kat()){
				$this->session->set_flashdata('pesan', 'Menambah Kategori');
				redirect('kategori','refresh');
			} else {
				$this->session->set_flashdata('pesan', 'Gagal Menambah Kategori');
				redirect('kategori','refresh');
			}
		}
	}
	public function hapus($id='')
	{
		if($this->kat->hapus_kat($id)){
			$this->session->set_flashdata('pesan', 'Sukses Hapus Kategori');
			redirect('kategori','refresh');
		} else {
			$this->session->set_flashdata('pesan', 'Gagal Hapus Kategori');
			redirect('kategori','refresh');	
		}
	}
	public function kategori_update()
	{
		if($this->input->post('edit')){
			if($this->kat->edit_kat()){
			$this->session->set_flashdata('pesan', 'Sukses Hapus Kategori');
			redirect('kategori','refresh');
		} else {
			$this->session->set_flashdata('pesan', 'Gagal Hapus Kategori');
			redirect('kategori','refresh');	
		}
		}
	}
}

/* End of file kategori.php */
/* Location: ./application/controllers/kategori.php */