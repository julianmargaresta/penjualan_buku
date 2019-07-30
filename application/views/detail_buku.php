<div class="col-md-4">
	<img style="width:100%" src="<?=base_url()?>asset/gambar/<?= $detail->gambar_buku;?>">
</div>
<div class="col-md-8">
	<table class="table table-hover table-striped">
		<tr>
			<td>Judul Buku </td><td>: 
			<?= $detail->judul_buku;?></td>
		</tr>
		<tr>
			<td>Harga </td><td>: 
			Rp. <?= number_format($detail->harga);?>
			</td>
		</tr>
		<tr>
			<td>Deskripsi </td><td>: 
			<?= $detail->deskripsi;?>
			</td>
		</tr>		
	</table><form action="<?=base_url('index.php/cart/add_cart')?>" method="post">
	<input type="hidden" name="id_buku" value="<?= $detail->id_buku?>">
	<input type="number" class="form-control" style="width:55px;display: inline-block;margin-right: 20px" value="1" name="qty"><?=$url?>
	</form>
</div>