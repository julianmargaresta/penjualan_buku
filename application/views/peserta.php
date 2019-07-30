<table class="table table-hover table-striped">
	<tr> 
		<td>Nama</td><td>Kelas</td><td>Nilai</td><td>Detail</td>
	</tr>
	<?php 
	foreach($peserta as $pes){
		echo '<tr>
			<td>'.$pes['nama'].'</td><td>'.$pes['kelas'].'</td><td>'.$pes['nilai'].'</td><td><a href="'.base_url().'index.php/admin/data_diri">Tampil</td>
	</tr>';
	}
	?>
</table>