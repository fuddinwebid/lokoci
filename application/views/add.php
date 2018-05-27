<div class="row">
      <div class="col-lg-12">
      <div class="panel panel-default">
      <div class="panel-heading">
          Basic Form Elements
      </div>
      <div class="panel-body">
      <div class="row">
      <div class="col-lg-12">
			<form method="POST" action="<?php echo base_url(); ?>latihan/addAksi">
				<div class="form-group">
					<label>NIM</label>
					<input type="text" class="form-control" name="nim" required>
				</div>
				<div class="form-group">
					<label>Nama</label>
					<input type="text" class="form-control" name="nama" required>
				</div>
				<div class="form-group">
					<label>Mata Kuliah</label>
					<select name='matkul' class="form-control" required>
					<?php 
					echo "<option value=''>-- Pilih Mata Kuliah --</option>";
					foreach ($matkul as $mk):
					echo "<option value='$mk->id'>$mk->nama_matkul</option>";
					endforeach;		
					?>
					</select>
				</div>
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Submit</button>
			</form>
		</div>
	</div>
</div>
</div>
</div>
</div>
