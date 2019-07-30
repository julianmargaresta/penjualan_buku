<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cart extends CI_Model {

	public function simpan_cart()
	{
	$tgl_deadline=date('Y-m-d',mktime(date('H'),date('i'),date('s'),date('m'),date('d')+7,date('Y')));
	$object=array(
		'id_peminjam'=>$this->session->userdata('id_peminjam'),
		'tgl_deadline'=>$tgl_deadline,
		'tgl_pinjam'=>date('Y-m-d'),
		'tgl_kembali'=>'',
		'denda'=>0,
		'grandtotal'=>$this->input->post('grandtotal'),
		'status'=>'',
		'bukti'=>''
		);
		$this->db->insert('nota', $object);
		$tm_nota=$this->db->order_by('id_nota','desc')
					  ->limit(1)
					  ->get('nota')
					  ->row();
		$hasil=array();
		for($i=0;$i<count($this->input->post('id_buku'));$i++){
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
	public function get_total($id)
	{
		return $this->db->where('id_nota',$id)
						->get('nota')
						->row();
	}
}

/* End of file M_cart.php */
/* Location: ./application/models/M_cart.php */