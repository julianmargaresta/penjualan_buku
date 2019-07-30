<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

	public function simpan_cart_db()
	{
		$tgl_deadline=date('Y-m-d',mktime(date('H'),date('i'),date('s'),date('m'),date('d')+7,date('Y')));
		$object=array(
			'id_peminjam'=>$this->input->post('id_peminjam'),
			'tgl_pinjam'=>date('Y-m-d'),
			'tgl_deadline'=>$tgl_deadline,
			'grandtotal'=>$this->input->post('grandtotal'),
			'status'=>'Confirmed',
			'bukti'=>'-'
		);
		$this->db->insert('nota', $object);
		$tm_nota=$this->db->order_by('id_nota','desc')
					  ->where('id_peminjam',$this->input->post('id_peminjam'))
					  ->limit(1)
					  ->get('nota')
					  ->row();

		for($i=0;$i<count($this->input->post('rowid'));$i++){
				$hasil[]=array(
				'id_nota'=>$tm_nota->id_nota,
				'id_buku'=>$this->input->post('id_buku')[$i],
				'jumlah'=>$this->input->post('qty')[$i]
				);
				
			}		
			$proses=$this->db->insert_batch('peminjaman', $hasil);
			if($proses){
				return $tm_nota->id_nota;
			} else {
				return 0;
			}

	}
	public function tm_peminjam()
		{
			return $this->db->get('peminjam')->result();
		}	
	public function detail_nota($id_nota)
	{
		return $this->db->where('id_nota',$id_nota)
					->join('peminjam','peminjam.id_peminjam=nota.id_peminjam')
					->get('nota')->row();
	}
	public function detail_peminjaman($id_nota)
	{
		return $this->db->where('id_nota',$id_nota)
					->join('buku','buku.id_buku=peminjaman.id_buku')
					->join('kategori','kategori.id_kategori=buku.id_kategori')
					->get('peminjaman')->result();
	}
}

/* End of file M_transaksi.php */
/* Location: ./application/models/M_transaksi.php */