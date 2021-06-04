<div class="container-fluid">
	<h3><i class="fas fa-edit"></i>Edit Produk</h3>
	<?php foreach ($datamahasiswa as $dt_mhs) : ?>
		<form method="post" action="<?php echo base_url(). 'dashboard/update' ?>">
			<div class="form-group">
				<label>Nama</label>
				<input type="hidden" name="id" class="form-control"
				value="<?php echo $dt_mhs->id ?>">
				<input type="text" name="nama" class="form-control"
				value="<?php echo $dt_mhs->nama ?>">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<input type="text" name="alamat" class="form-control"
				value="<?php echo $dt_mhs->alamat ?>">
			</div>
			<div class="form-group">
				<label>Foto</label>
				<div style ="margin-bottom">
				<img src="<?php echo base_url().'/uploads/'.$dt_mhs->foto ?>" class="card-img-top"style=" width: 250px; height:auto" alt="...">
				</div>
				<input type="file" name="foto" class="form-control">
			</div>
			<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
			
		</form>
	<?php endforeach; ?>
</div>