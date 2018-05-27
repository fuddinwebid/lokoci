<div class="row">
      <div class="col-lg-12">
      <div class="panel panel-default">
      <div class="panel-heading">
          Basic Form Elements
      </div>
      <div class="panel-body">
      <div class="row">
      <div class="col-lg-12">
			<form method="POST" action="<?php echo base_url(); ?>latihan/editAksi">
			<?php foreach ($siswa as $sw): 
				echo "<div class='form-group'>
				  <input type='hidden' class='form-control' name='id' value='$sw->id_mahasiswa'>
					<label>NIM</label>
					<input type='text' class='form-control' name='nim' value='$sw->nim' required>
				</div>
				<div class='form-group'>
					<label>Nama</label>
					<input type='text' class='form-control' name='nama' value='$sw->nama_siswa' required>
				</div>";
				?>
				<div class="form-group">
					<label>Mata Kuliah</label>
					<select name='matkul' class="form-control" required> 
					<option value=''>-- Pilih Mata Kuliah --</option>
					<?php foreach ($matkul as $mk): ?>
					<option value="<?php echo $mk->id; ?>" <?php if($sw->nama_matkul == $mk->nama_matkul){ echo 'selected'; } ?>>
					<?php echo $mk->nama_matkul; ?></option>
					<!-- echo "<option value='$mk->id'>$mk->nama_matkul</option>"; -->
					<?php endforeach; ?>
					</select>
				</div>
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Submit</button>
			</form>
			<?php endforeach; ?>
		</div>
	</div>
</div>
</div>
</div>
</div>
