<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pesanan extends CI_Model {

	public function simp_db($id,$nama_file)
	{
		$object=array(
			'bukti'=>$nama_file,
			);
		return $this->db->where('id_nota',$id)
					->update('nota', $object);
	}
	public function tm_pesanan()
	{
		return $this->db->get('nota')->result();
	}
	public function detail_pesanan($id)
	{
		return $this->db->where('id_nota',$id)->get('nota')->row();
	}
	public function trans($id_nota)
	{
		return $this->db->where('id_nota',$id_nota)
					->join('buku','buku.id_buku=peminjaman.id_buku')
					->join('kategori','kategori.id_kategori=buku.id_kategori')
					->get('peminjaman')->result();
	}
	public function hapus_nota($id)
	{
		$hapus_pinjam=$this->db->where('id_nota',$id)
					->delete('peminjaman');
		if($hapus_pinjam){
			$hps_nota=$this->db->where('id_nota',$id)
						   ->delete('nota');
			if($hps_nota){
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

}

/* End of file modelName.php */
/* Location: ./application/models/modelName.php */