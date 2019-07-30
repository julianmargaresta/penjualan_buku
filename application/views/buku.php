<h2>Daftar Buku Perpustakaan</h2>
<?=$this->session->flashdata('pesan');?>
<center><a href="#tambah" data-toggle="modal" class="btn btn-warning">Tambah</a></center>
<table id="example" class="table table-hover table-striped">
	<thead>
		<tr>
			<td>NO</td><td>Gambar</td><td>Nama Buku</td><td>Kategori</td><td>Harga</td><td>Aksi</td>
		</tr>
	</thead>
	<tbody>
		<?php $no=0;foreach ($tampil_buku as $buku): 
		$no++;?>
		<tr>
			<td><?=$no?></td><td><img src="<?=base_url('asset/gambar/'.$buku->gambar_buku )?>" style="width:40px"></td><td><?=$buku->judul_buku?></td><td><?=$buku->nama_kategori?></td><td><?=$buku->harga?></td><td><a href="#edit" onclick="edit(<?=$buku->id_buku?>)" data-toggle="modal" class="btn btn-success">Ubah</a> <a href="<?=base_url('index.php/buku/hapus/'.$buku->id_buku)?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger">Hapus</a></td>
		</tr>
		<?php endforeach ?>
		
	</tbody>
</table>
<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tambah Buku</h4>
      </div>
      <div class="modal-body">
       <form action="<?=base_url('index.php/buku/tambah')?>" method="post" enctype="multipart/form-data">
      	<table>
      		<tr>
      			<td>Judul Buku</td><td><input type="text" name="judul_buku" class="form-control"></td>
      		</tr>
      		<tr>
      			<td>Harga</td><td><input type="number" name="harga" class="form-control"></td>
      		</tr>
      		<tr>
      			<td>Deskripsi</td><td><textarea name="deskripsi" class="form-control"></textarea></td>
      		</tr>
      		<tr>
      			<td>Nama Kategori</td><td><select name="kategori" class="form-control">
      				<option></option>
      				<?php foreach ($kategori as $kat): ?>
      					<option value="<?=$kat->id_kategori?>">
      						<?=$kat->nama_kategori ?></option>
      				<?php endforeach ?>
      			</select></td>
      		</tr>
      		<tr>
      			<td>Gambar</td><td><input type="file" name="gambar" class="form-control"></td>
      		</tr>
      	</table>
      	<input type="submit" name="simpan" value="Simpan" class="btn btn-success">
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Edit user</h4>
      </div>
      <div class="modal-body">
       <form action="<?=base_url('index.php/buku/buku_update')?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_buku" id="id_buku">
        <table>
          <tr>
            <td>Judul Buku</td><td><input id="judul_buku" required type="text" name="judul_buku" class="form-control"></td>
          </tr>
          <tr>
            <td>Harga</td><td><input type="number" id="harga" required name="harga" class="form-control"></td>
          </tr>
          <tr>
            <td>Deskripsi</td><td><textarea name="deskripsi" required id="deskripsi" class="form-control"></textarea></td>
          </tr>
          <tr>
            <td>Nama Kategori</td><td><select name="kategori" required id="kategori" class="form-control">
              <option></option>
              <?php foreach ($kategori as $kat): ?>
                <option value="<?=$kat->id_kategori?>">
                  <?=$kat->nama_kategori ?></option>
              <?php endforeach ?>
            </select></td>
          </tr>
          <tr>
            <td>Gambar</td><td><input type="file" name="gambar" id="gambar" class="form-control"></td>
          </tr>
        </table>
        <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#example').DataTable();
  });
</script>
<script>
  function edit(a){
      $.ajax({
       type:"post",
       url:"<?=base_url()?>index.php/buku/edit_buku/"+a, 
       dataType:"json",
       success:function(data){
        $("#id_buku").val(data.id_buku);
        $("#judul_buku").val(data.judul_buku);
        $("#harga").val(data.harga);
        $("#deskripsi").val(data.deskripsi);
        $("#kategori").val(data.id_kategori);
      }
      });
    }
</script>