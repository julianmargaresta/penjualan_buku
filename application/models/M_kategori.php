<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

	public function tampil_kat()
		{
			$tm_kategori=$this->db
					  ->get('kategori')->result();
		return $tm_kategori;
		}	
	public function detail($a)
		{
			return $this->db->where('id_kategori',$a)
						  ->get('kategori')
						  ->row();
		}
	public function simpan_kat(){
		$object=array(
			'id_kategori'=>$this->input->post('id_kategori'),
			'nama_kategori'=>$this->input->post('nama_kategori'),
		);
		return $this->db->insert('kategori', $object);
	}
	public function hapus_kat($id='')
	{
		return $this->db->where('id_kategori',$id)->delete('kategori');
	}
	public function edit_kat()
	{
		$object=array(
			'id_kategori'=>$this->input->post('id_kategori'),
			'nama_kategori'=>$this->input->post('nama_kategori')
		);
		return $this->db->where('id_kategori',$this->input->post('id_kategori_lama'))->update('kategori', $object);
	}

}

/* End of file M_kategori.php */
/* Location: ./application/models/M_kategori.php */