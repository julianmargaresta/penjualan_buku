<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function index()
	{
		$data['konten']="showcart";
		$this->load->view('template', $data, FALSE);
	}

	public function add_cart()
	{
		if($this->input->post('tambah')){
			$this->load->model('m_buku');
			$detail=$this->m_buku->detail($this->input->post('id_buku'));

			$data = array(
				'id'      => $detail->id_buku,
				'qty'     => $this->input->post('qty'),
				'price'   => $detail->harga,
				'name'    => $detail->judul_buku,
				'options' => array('genre'=>$detail->nama_kategori)
			);
			
			$this->cart->insert($data);
			redirect('admin/detail_buku/'.$this->input->post('id_buku'),'refresh');
		} else {
			echo "ss";
		}
	}
	public function hapus_item($id)
	{
		$data = array(
			'rowid' => $id,
			'qty'   => 0
		);
		
		$this->cart->update($data);
		redirect('cart','refresh');
	}
	public function simpan()
	{
		if($this->input->post('simpan')){
			$this->load->model('m_cart');
			$id_nota=$this->m_cart->simpan_cart();
			if($id_nota>0){
				$this->cart->destroy();
				redirect('cart/pembayaran/'.$id_nota,'refresh');
			} else {
				redirect('cart');
			}
		}
	}
	public function pembayaran($id)
	{
		$this->load->model('m_cart');
		$nota=$this->m_cart->get_total($id);
		$data['total']=$nota->grandtotal+$id;
		$data['konten']="v_pembayaran";
		$this->load->view('template', $data, FALSE);
	}
}
