<h2>KONFIRMASI PEMBAYARAN</h2>
<?php if ($this->session->flashdata('pesan')): ?>
<div class="alert alert-success">
	<?= $this->session->flashdata('pesan');?>
</div>	
<?php endif ?>

<form action="<?=base_url('index.php/pesanan/simpan_konfirm')?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id_nota" value="<?= $id_nota;?>">
	<input type="file" name="bukti" class="form-control" style="width:200px;display: inline-block;margin-right: 20px">
	<input type="submit" name="konfirm" value="Konfirm" class="btn btn-danger">
</form>
<br>
<div class="col-md-5 col-md-offset-3">
	<div class="thumbnail">
	<?php if ($det_pesan->bukti!=null): ?>
		<img src="<?=base_url('asset/bukti/'.$det_pesan->bukti)?>" >
	<?php else: ?>
		<img src="<?=base_url('asset/bukti/bukti_bayar.png')?>" >
	<?php endif ?>	
	</div>
</div>
