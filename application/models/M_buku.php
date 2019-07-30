<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_buku extends CI_Model {

	public function tampil_buku()
	{
		$tm_buku=$this->db
					  ->join('kategori','kategori.id_kategori=buku.id_kategori')
					  ->get('buku')->result();
		return $tm_buku;
	}
	public function detail($a)
	{
		$tm_buku=$this->db
					  ->join('kategori','kategori.id_kategori=buku.id_kategori')
					  ->where('id_buku',$a)
					  ->get('buku')
					  ->row();
		return $tm_buku;
	}

	public function data_kategori()
	{
		return $this->db->get('kategori')->result();
	}
	public function simpan_buku($nama_file)
	{
		if($nama_file==""){
			$object=array(
			'judul_buku'=>$this->input->post('judul_buku'),
			'harga'=>$this->input->post('harga'),
			'deskripsi'=>$this->input->post('deskripsi'),
			'id_kategori'=>$this->input->post('kategori'),
			);	
		} else{
			$object=array(
			'judul_buku'=>$this->input->post('judul_buku'),
			'harga'=>$this->input->post('harga'),
			'deskripsi'=>$this->input->post('deskripsi'),
			'id_kategori'=>$this->input->post('kategori'),
			'gambar_buku'=>$nama_file
			);
		}
		return $this->db->insert('buku', $object);
	}
	public function hapus_buku($id_buku='')
	{
		return $this->db->where('id_buku',$id_buku)->delete('buku');
	}
	public function buku_update_no_foto()
	{
		$object=array(
			'judul_buku'=>$this->input->post('judul_buku'),
			'harga'=>$this->input->post('harga'),
			'deskripsi'=>$this->input->post('deskripsi'),
			'id_kategori'=>$this->input->post('kategori')
		);
		return $this->db->where('id_buku',$this->input->post('id_buku'))
					->update('buku', $object);
	}
	public function buku_update_dengan_foto($nama_foto='')
	{
		$object=array(
			'judul_buku'=>$this->input->post('judul_buku'),
			'harga'=>$this->input->post('harga'),
			'deskripsi'=>$this->input->post('deskripsi'),
			'id_kategori'=>$this->input->post('kategori'),
			'gambar_buku'=>$nama_foto
		);
		return $this->db->where('id_buku',$this->input->post('id_buku'))
					->update('buku', $object);	
	}
}

/* End of file M_buku.php */
/* Location: ./application/models/M_buku.php */