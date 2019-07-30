<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan extends CI_Controller {
public function __construct()
{
	parent::__construct();
	$this->load->model('m_pesanan','pesan');
}
	public function index()
	{
		$data['judul']="daftar pesanan";
		$data['daftar_pesanan']=$this->pesan->tm_pesanan();
		$data['konten']="v_pesanan"; 
		$this->load->view('template', $data, FALSE);
	}
	public function konfirmasi($id)
	{
		$data['id_nota']=$id;
		$data['det_pesan']=$this->pesan->detail_pesanan($id);
		$data['judul']="Konfirmasi Pembayaran";
		$data['konten']="v_konfirmasi";
		$this->load->view('template', $data, FALSE);
	}
	public function simpan_konfirm()
	{
		if($this->input->post('konfirm')){

			$config['upload_path'] = './asset/bukti/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '1000';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('bukti')){
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('pesan', $error);
				redirect('pesanan/konfirmasi/'.$this->input->post('id_nota'),'refresh');
			}
			else{
					$this->load->model('M_pesanan','pesan');
					$proses=$this->pesan->simp_db($this->input->post('id_nota'),$this->upload->data('file_name'));
					if($proses){						
						$this->session->set_flashdata('pesan', 'sukses mengirim bukti. Mohon Tunggu Konfirmasi dari Admin');
						redirect('pesanan/konfirmasi/'.$this->input->post('id_nota'),'refresh');
					} else {
						$this->session->set_flashdata('pesan', 'gagal mengirim bukti');
						redirect('pesanan/konfirmasi/'.$this->input->post('id_nota'),'refresh');
					}
				
			}
		}
	}
	public function hapus_pesanan($id)
	{
		if($this->pesan->hapus_nota($id)==true){
			$this->session->set_flashdata('pesan', 'Sukses menghapus pesanan');
			redirect('pesanan','refresh');
		} else {
			$this->session->set_flashdata('pesan', 'gagal menghapus pesanan');
			redirect('pesanan','refresh');
		}

	}

}

/* End of file pesanan.php */
/* Location: ./application/controllers/pesanan.php */