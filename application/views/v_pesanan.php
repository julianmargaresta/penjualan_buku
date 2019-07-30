<h2>Daftar Pesanan</h2>
<?php if ($this->session->flashdata('pesan')): ?>
	<div class="alert alert-success">
		<?= $this->session->flashdata('pesan');?>
	</div>
<?php endif ?>

<table class="table table-hover table-striped" id="example">
	<thead>
	<tr>
		<td>NO</td><td>NO NOTA</td><td>GRAND TOTAL</td><td>STATUS</td><td>KONFIRM</td><td>DETAIL</td>
	</tr>
	</thead>
	<tbody>
	<?php
	$no=0;
	foreach ($daftar_pesanan as $pesan): 
		$no++;?>
	<tr>
		<td><?=$no?></td><td><?=$pesan->id_nota?></td><td align="right"><?= number_format($pesan->grandtotal)?></td><td><?=$pesan->status?></td><td>
<?php if ($pesan->status!=null): ?>
	Lunas
<?php else: ?>
	<a href="<?=base_url('index.php/pesanan/konfirmasi/'.$pesan->id_nota)?>">Konfirm Pembayaran</a> | <a href="<?=base_url('index.php/pesanan/hapus_pesanan/'.$pesan->id_nota)?>" onclick="return confirm('Apakah anda yakin menghapus Pesanan?')">Hapus</a>
<?php endif ?>
		

		</td><td><a href="#detail<?=$pesan->id_nota?>" data-toggle="modal">Lihat Barang</a>

		<!-- modal menampilkan detail barang yang dipesan-->
		<div class="modal fade" id="detail<?=$pesan->id_nota?>">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title">Modal title</h4>
		      </div>
		      <div class="modal-body">
		        
			<?php 
			foreach ($this->pesan->trans($pesan->id_nota) as $value): ?>
			<div class="row">
				<div class="col-md-3">
					<div class="thumbnail">
						<img src="<?=base_url('asset/gambar/'.$value->gambar_buku)?>">
					</div>
				</div>
				<div class="col-md-9">
					<table class="table table-hover table-striped">
						<tr>
							<td>Judul Buku</td><td><?= $value->judul_buku?></td>
						</tr>
						<tr>
							<td>Kategori</td><td><?= $value->nama_kategori?></td>
						</tr>
						<tr>
							<td>Harga</td><td><?= number_format($value->harga)?></td>
						</tr>
					</table>
				</div>
				</div>
			<?php endforeach ?>

		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary">Save changes</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

		</td>
	</tr>
	<?php endforeach ?>
	</tbody>
</table>
<script type="text/javascript">
  $(document).ready(function(){
    $('#example').DataTable();
  });
 
</script>