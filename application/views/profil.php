<div class="col-md-4">
	<img style="width:100%" src="<?=base_url()?>asset/<?=$user->foto?>">
</div>
<div class="col-md-8">
<form action="<?=base_url('index.php/admin/editprofil')?>" method="post" enctype="multipart/form-data">
	<table class="table table-hover table-striped">
		<tr>
			<td>Nama </td><td><input type="text" class="form-control" name="nama" value="<?= $user->nama?>"></td>
		</tr>
		<tr>
			<td>Alamat </td><td><textarea name="alamat" class="form-control"><?=$user->alamat?></textarea></td>
		</tr>
		<tr>
			<td>Username </td><td><input type="text" name="username" value="<?= $user->username?>" class="form-control"></td>
		</tr>
		<tr>
			<td>Password </td><td><input type="password" name="password" value="<?= $user->password?>" class="form-control"></td>
		</tr>
		<tr>
			<td>Foto </td><td><input type="file" name="foto" class="form-control"></td>
		</tr>
		
	</table>
	<input type="submit" class="btn btn-danger" name="edit" value="EDIT PROFIL">
</form>
</div>