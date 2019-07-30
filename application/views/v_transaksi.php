<h2 align="center">Halaman Transaksi</h2>
<div class="col-md-7">
	<table id="example" class="table table-hover table-striped">
		<thead>
			<tr>
				<th>NO</th><th>Nama Buku</th><th>Harga</th><th>Kategori</th><th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=0; foreach ($tampil_buku as $buku): $no++; ?>
				<tr>
					<td><?=$no?></td><td><?=$buku->judul_buku?></td><td><?=$buku->harga?></td><td><?=$buku->nama_kategori?></td><td><a class="btn btn-warning" href="<?=base_url('index.php/transaksi/addcart/'.$buku->id_buku)?>">Pesan</a></td>
				</tr>
			<?php endforeach ?>
			
		</tbody>
	</table>
</div>
<div class="col-md-5">
<form action="<?=base_url('index.php/transaksi/simpan')?>" method="post">
<a class="btn btn-danger" href="<?=base_url('index.php/transaksi/clearcart')?>">Clear Cart</a>
	Nama Peminjam : 
	<select name="id_peminjam" class="form-control" style="display: inline-block;width:200px">
		<option></option>
		<?php foreach ($peminjam as $peminjam): ?>
			<option value="<?=$peminjam->id_peminjam?>"><?=$peminjam->nama?></option>
		<?php endforeach ?>
		
	</select>
	<table class="table table-striped table-hover">
		<tr>
			<th>NO</th><th>Judul Buku</th><th>QTY</th><th>Harga</th><th>Subtotal</th><th>Aksi</th>
		</tr>
		<?php $no=0; foreach ($this->cart->contents() as $items): $no++; ?>
		<input type="hidden" name="id_buku[]" value="<?=$items['id']?>">
		<input type="hidden" name="rowid[]" value="<?=$items['rowid']?>">
			<tr>
				<td><?=$no?></td><td><?=$items['name']?></td><td width="1"><input type="text" name="qty[]" value="<?=$items['qty']?>" class="form-control" style="padding:4px;"></td><td><?=number_format($items['price'])?></td><td><?=number_format($items['subtotal'])?></td><td><a href="<?=base_url('index.php/transaksi/hapus_cart/'.$items['rowid'])?>" class="btn btn-danger">&times;</a></td>
			</tr>
		<?php endforeach ?>
			<input type="hidden" name="grandtotal" value="<?=$this->cart->total()?>">
			<tr style="border-bottom:5px black solid">
				<th colspan="4">Grand Total</th><th><?= number_format($this->cart->total())?></th><th></th>
			</tr>
	</table>
	<input class="btn btn-success" type="submit" name="update" value="Update QTY"> <input type="submit" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger" value="Bayar" name="bayar">
</form>
<?php if ($this->session->flashdata('pesan')): ?>
	<div class="alert alert-warning"><?= $this->session->flashdata('pesan');?></div>
<?php endif ?>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#example').DataTable();
  });
 
</script>