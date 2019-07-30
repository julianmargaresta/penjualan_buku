<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('m_transaksi','trans');
	$this->load->model('m_buku','buku');
}
	public function index()
	{
		$data['peminjam']=$this->trans->tm_peminjam();
		$data['tampil_buku']=$this->buku->tampil_buku();
		$data['judul']="Transaksi";
		$data['konten']="v_transaksi"; 
		$this->load->view('template', $data, FALSE);
	}
	public function addcart($id)
	{
			$detail=$this->buku->detail($id);

			$data = array(
				'id'      => $detail->id_buku,
				'qty'     => 1,
				'price'   => $detail->harga,
				'name'    => $detail->judul_buku,
				'options' => array('genre'=>$detail->nama_kategori)
			);
			
			$this->cart->insert($data);
			redirect('transaksi','refresh');
	}
	public function clearcart()
	{
		$this->cart->destroy();
		redirect('transaksi','refresh');
	}
	public function hapus_cart($id)
	{
		$data = array(
			'rowid' => $id,
			'qty'   => 0
		);
		
		$this->cart->update($data);
		redirect('transaksi','refresh');
	}
	public function simpan()
	{

		if ($this->input->post('update')) {
		
			for($i=0;$i<count($this->input->post('rowid'));$i++){
				$data = array(
					'rowid' => $this->input->post('rowid')[$i],
					'qty'   => $this->input->post('qty')[$i]
				);
				$this->cart->update($data);
			}
		redirect('transaksi','refresh');		
		} elseif($this->input->post('bayar')){
			$this->form_validation->set_rules('id_peminjam', 'Peminjam', 'trim|required');
			if ($this->form_validation->run() == TRUE) {
				$id=$this->trans->simpan_cart_db();
				if($id){
					$data['nota']=$this->trans->detail_nota($id);
					$this->load->view('cetak_nota', $data, FALSE);
				}
			} else {
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('transaksi','refresh');
			}
			
		}
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */