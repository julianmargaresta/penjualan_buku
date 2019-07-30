<h2>Kategori</h2>
<?=$this->session->flashdata('pesan');?>
<center><a href="#tambah" data-toggle="modal" class="btn btn-warning">Tambah</a></center>
<table id="example" class="table table-hover table-striped">
	<thead>
		<tr>
			<td>NO</td><td>ID Kategori</td><td>Nama Kategori</td><td>Aksi</td>
		</tr>
	</thead>
	<tbody>
		<?php $no=0;foreach ($tampil_kategori as $kat): 
		$no++;?>
		<tr>
			<td><?=$no?></td><td><?=$kat->id_kategori?></td><td><?=$kat->nama_kategori?></td><td><a href="#edit" onclick="edit('<?=$kat->id_kategori?>')" data-toggle="modal" class="btn btn-success">Ubah</a> <a href="<?=base_url('index.php/kategori/hapus/'.$kat->id_kategori)?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger">Hapus</a></td>
		</tr>
		<?php endforeach ?>
		
	</tbody>
</table>
<div class="modal fade" id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tambah Kategori</h4>
      </div>
      <div class="modal-body">
       <form action="<?=base_url('index.php/kategori/tambah')?>" method="post">
      	<table>
          <tr>
            <td>ID Kategori</td><td><input type="text" name="id_kategori" required class="form-control"></td>
          </tr>
      		<tr>
      			<td>Nama Kategori</td><td><input type="text" name="nama_kategori" required class="form-control"></td>
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
        <h4 class="modal-title">Edit Kategori</h4>
      </div>
      <div class="modal-body">
       <form action="<?=base_url('index.php/kategori/kategori_update')?>" method="post">
        <input type="hidden" name="id_kategori_lama" id="id_kategori_lama">
        <table>
          <tr>
            <td>ID Kategori</td><td><input type="text" name="id_kategori" id="id_kategori" required class="form-control"></td>
          </tr>
          <tr>
            <td>Nama Kategori</td><td><input type="text" id="nama_kategori" name="nama_kategori" required class="form-control"></td>
          </tr>
        </table>
        <input type="submit" name="edit" value="Simpan" class="btn btn-success">
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
  function edit(a){
      $.ajax({
       type:"post",
       url:"<?=base_url()?>index.php/kategori/edit_kategori/"+a, 
       dataType:"json",
       success:function(data){
        $("#id_kategori").val(data.id_kategori);
        $("#nama_kategori").val(data.nama_kategori);
        $("#id_kategori_lama").val(data.id_kategori);
      }
      });
    }
</script>