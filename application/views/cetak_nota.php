<h2 align="center">Nota Peminjaman</h2>
No Nota : <?= $nota->id_nota?><br>
Tanggal Pinjam : <?= $nota->tgl_pinjam?><br>
Tanggal Deadline : <?= $nota->tgl_deadline?><br>
Tanggal Kembali : _________________________<br>

<table border="1" style="border-collapse: collapse;">
	<tr>
		<th>NO</th><th>Nama Buku</th><th>Harga</th><th>QTY</th><th>Subtotal</th>
	</tr>
	<?php $no=0; foreach ($this->trans->detail_peminjaman($nota->id_nota) as $buku): $no++;?>
		<tr>
		<th><?=$no?></th><th><?=$buku->judul_buku?></th><th><?= number_format($buku->harga)?></th><th><?=$buku->jumlah?></th><th><?= number_format(($buku->harga*$buku->jumlah))?></th>
	</tr>
	<?php endforeach ?>
	<tr>
		<th colspan="4">Grand Total</th><th><?= number_format($nota->grandtotal)?></th>
	</tr>
</table>

<script type="text/javascript">
	window.print();
	location.href="<?=base_url('index.php/transaksi')?>";
</script>
