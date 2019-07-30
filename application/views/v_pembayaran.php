<h2>Pembayaran</h2>

Total Bayar : <h3><?= "Rp. ".number_format($total)?></h3>
Silahkan Transfer Ke Rekening BCA an.sugeng rawu No rekening: 044112266
<br>
Jika sudah membayar, klik Tombol Konfirmasi untuk mengkonfirmasi pembayaran.
<br><a href="<?=base_url('index.php/pesanan/konfirmasi/'.$this->uri->segment(3))?>" class="btn btn-warning">KONFIRMASI</a>