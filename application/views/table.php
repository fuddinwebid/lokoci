<?php

if(!$this->session->userdata('nama')){
header('location:login');
}
?>
                <label class="pesan"><?php echo $this->session->flashdata('message');?></label>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Users</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                     <div class="col-md-12">
                     	<a href="<?php echo base_url(); ?>index.php/latihan/add" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah Data</a>
                     </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                   
                     
                   
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Data Users
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                               <th>#</th>
																								<th>NIM</th>
																								<th>Nama Mahasiswa</th>
																								<th>Matakuliah</th>
																								<th>Jumlah SKS</th>
																								<th>Nama Dosen</th>
																								<th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
          <?php
					$no=1;
					foreach($kursus as $list):
					?>
              <tr>
              <td><?php echo $no; ?></td>
							<td><?php echo $list->nim; ?></td>
							<td><?php echo $list->nama_siswa; ?></td>
							<td><?php echo $list->nama_matkul; ?></td>
							<td><?php echo $list->sks; ?></td>
							<td><?php echo $list->nama_dosen; ?></td>
							<td><a href="<?php echo base_url(); ?>latihan/edit/<?php echo $list->id_mahasiswa; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Ubah</a> <a href="<?php echo base_url(); ?>latihan/hapus/<?php echo $list->id_mahasiswa; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
							</tr>
          <?php 
          endforeach;
          ?>
                                           
                                        </tbody>


                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <?php echo $pagination; ?>
                        </div>
                    </div>
                </div>
                



    