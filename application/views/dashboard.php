<div class="container-fluid">
<div class="row d-flex">
	<button class="btn btn-sm btn-primary mb-2 mt-2 mx-auto" data-toggle="modal" data-target="#tambah_data"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>
	</div>
	<table class="table table-bordered">
		<tr>
			<th>NO</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Foto Orang</th>
            <th>Foto KTP</th>
			<th colspan="3">Aksi</th>
		</tr>
		<?php 
		$no=1;
		foreach ($datamahasiswa as $dt_mhs): ?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $dt_mhs->nama ?></td>
				<td><?php echo $dt_mhs->alamat ?></td>
                <td><img src="<?php echo base_url().'/uploads/'.$dt_mhs->foto ?>" class="card-img-top"style=" width: 250px; height:auto" alt="..."></td>
                <td><img src="<?php echo base_url().'/uploads/'.$dt_mhs->foto_ktp ?>" class="card-img-top"style=" width: 250px; height:auto" alt="..."></td>
				<td><?php echo anchor('dashboard/edit/' .$dt_mhs->id, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>'); ?></td>
				<td><?php echo anchor('dashboard/hapus/' .$dt_mhs->id, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>') ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Masukan Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'dashboard/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
        	<div class="form-group">
        		<label>Nama Mahasiswa</label><br>
        		<input type="text" name="nama" class="form-controll">
        	</div>
        	<div class="form-group">
        		<label>Alamat</label><br>
        		<input type="text" name="alamat" class="form-controll">
        	</div>
        	<div class="form-group">
        		<label>Fotoku</label><br>
        		<input type="file" name="foto" class="form-controll">
        	</div>
            <div class="form-group">
        		<label>Foto KTP</label><br>
        		<input type="file" name="foto_ktp" class="form-controll">
        	</div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>