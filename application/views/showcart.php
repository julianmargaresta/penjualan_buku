<h2>Detail Peminjaman Buku</h2>
<form action="<?= base_url('index.php/cart/simpan')?>" method="post">
<table class="table table-hover table-striped">
	<tr>
		<td>ID Buku</td><td>Nama Buku</td><td>Jumlah</td><td>Harga</td><td>Genre</td><td>Subtotal</td><td>Aksi</td>
	</tr>
	<?php 
	foreach($this->cart->contents() as $items){
	?>
	<tr>
		<td>
		<input type="hidden" name="id_buku[]" value="<?=$items['id']?>">
		<input type="hidden" name="qty[]" value="<?=$items['qty']?>">

		<?=$items['id']?></td><td><?=$items['name']?></td><td><?=$items['qty']?></td><td><?=$items['price']?></td><td>

		<?=$items['options']['genre']?></td><td><?=$items['subtotal']?></td>
		<td><a href="<?=base_url('index.php/cart/hapus_item/'.$items['rowid'])?>" onclick="return confirm('apakah yakin?')">Hps</a></td>
	</tr>

	<?php }?>
	<tr>
	<input type="hidden" name="grandtotal" value="<?=$this->cart->total() ?>">
		<td colspan="5">GrandTotal</td><td><?=$this->cart->total() ?></td>
	</tr>	
</table>
<input type="submit" name="simpan" value="Check-Out" class="btn btn-success">
</form>