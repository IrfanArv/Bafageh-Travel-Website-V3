    <section class="content-header">
      <h1>
        Pengguna
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pengguna</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
          <div class="box">
            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Add New</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
          			<th>Photo</th>
          			<th>Nama</th>
                    <th>Username</th>
                    <th>Level</th>
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
          				<?php
                    $no=0;
                        foreach($data->result_array() as $a):
                            $no++;
                            $id=$a['idadmin'];
                            $nama=$a['nama'];
                            $username=$a['admin_username'];
                            $level=$a['level'];
                            $photo=$a['photo'];
                    ?>
                <tr>
                  <td><img src="<?php echo base_url().'/assets/images/users/'.$photo;?>" class="img-circle" style="width:60px;"></td>
                  <td><?php echo $nama;?></td>
                  <td><?php echo $username;?></td>
                  <td><?php echo $level;?></td>
                  <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalUpdate<?php echo $id;?>"><span class="fa fa-pencil"></span></a>
                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id;?>"><span class="fa fa-trash"></span></a>
                  </td>
                </tr>
				      <?php endforeach;?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    
<!-- ============ MODAL ADD PENGGUNA =============== -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Add Pengguna</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/pengguna/simpan_pengguna'?>" enctype="multipart/form-data">
        <div class="modal-body">

            <div class="form-group">
                <label class="control-label col-xs-3" >Nama</label>
                <div class="col-xs-8">
                    <input name="nama" class="form-control" type="text" placeholder="Nama" required>
                </div>
            </div>
                   
            <div class="form-group">
                <label class="control-label col-xs-3" >Username</label>
                <div class="col-xs-8">
                    <input name="user" class="form-control" type="text" placeholder="username" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Password</label>
                <div class="col-xs-8">
                    <input name="pass" class="form-control" type="password" placeholder="Password" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Ulangi Password</label>
                <div class="col-xs-8">
                    <input name="pass2" class="form-control" type="password" placeholder="Ulangi Password" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Level</label>
                <div class="col-xs-8">
                    <select name="level" class="form-control" required>
                      <option value="">-Pilih-</option>
                      <option value="1">Super Administrator</option>
                      <option value="2">Valas Backoffice</option>
                      <option value="3">Pacakage Reservation</option>
                      <option value="4">Hotel Reservation</option>
                      <option value="5">Cashier</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Photo</label>
                <div class="col-xs-8">
                    <input type="file" name="filefoto" required>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button class="btn btn-flat" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-primary btn-flat">Simpan</button>
        </div>
    </form>
    </div>
    </div>
</div>

<?php
    $no=0;
    foreach($data->result_array() as $a):
      $no++;
      $id=$a['idadmin'];
      $nama=$a['nama'];
      $username=$a['admin_username'];
      $password=$a['admin_password'];
      $level=$a['level'];
      $photo=$a['photo'];
?>
<!-- ============ MODAL ADD PENGGUNA =============== -->
<div class="modal fade" id="ModalUpdate<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Update Pengguna</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/pengguna/update_pengguna'?>" enctype="multipart/form-data">
        <div class="modal-body">

            <div class="form-group">
                <label class="control-label col-xs-3" >Nama</label>
                <div class="col-xs-8">
                    <input name="nama" value="<?php echo $nama;?>" class="form-control" type="text" placeholder="Nama" required>
                </div>
            </div>
                   
            <div class="form-group">
                <label class="control-label col-xs-3" >Username</label>
                <div class="col-xs-8">
                    <input name="user" value="<?php echo $username;?>" class="form-control" type="text" placeholder="username" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Password</label>
                <div class="col-xs-8">
                    <input name="pass" class="form-control" type="password" placeholder="Password" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Ulangi Password</label>
                <div class="col-xs-8">
                    <input name="pass2" class="form-control" type="password" placeholder="Ulangi Password" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Level</label>
                <div class="col-xs-8">
                    <select name="level" class="form-control" required>
                      <option value="">-Pilih-</option>
                      <?php if($level=='Admin'):?> 
                      <option value="1">Super Administrator</option>
                      <option value="2">Valas Backoffice</option>
                      <option value="3">Pacakage Reservation</option>
                      <option value="4">Hotel Reservation</option>
                      <option value="5">Cashier</option>
                      <?php else:?>
                      <option value="1">Super Administrator</option>
                      <option value="2">Valas Backoffice</option>
                      <option value="3">Pacakage Reservation</option>
                      <option value="4">Hotel Reservation</option>
                      <option value="5">Cashier</option>
                      <?php endif;?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Photo</label>
                <div class="col-xs-8">
                    <input type="file" name="filefoto">
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <input type="hidden" name="kode" value="<?php echo $id;?>">
            <button class="btn btn-flat" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-primary btn-flat">Update</button>
        </div>
    </form>
    </div>
    </div>
</div>

<?php endforeach;?>
	
	<?php
        $no=0;
        foreach($data->result_array() as $a):
            $no++;
            $id=$a['idadmin'];
            $nama=$a['nama'];
            $username=$a['admin_username'];
            $password=$a['admin_password'];
            $level=$a['level'];
            $photo=$a['photo'];
  ?>
	<!--Modal Hapus Post-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Pengguna</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'backend/pengguna/hapus_user'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
							       <input type="hidden" name="kode" value="<?php echo $id;?>"/> 
                          <p>Apakah Anda yakin mau menghapus Pengguna <b><?php echo $nama;?></b> ?</p>
                               
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	<?php endforeach;?>
	
	
  <!--Modal Reset Password-->
        <div class="modal fade" id="ModalResetPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Reset Password</h4>
                    </div>
                    
                    <div class="modal-body">
                                
                            <table>
                                <tr>
                                    <th style="width:120px;">Username</th>
                                    <th>:</th>
                                    <th><?php echo $this->session->flashdata('uname');?></th>
                                </tr>
                                <tr>
                                    <th style="width:120px;">Password Baru</th>
                                    <th>:</th>
                                    <th><?php echo $this->session->flashdata('upass');?></th>
                                </tr>
                            </table>                     
                                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>


<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
    CKEDITOR.replace('ckeditor');
  });
</script>
    <script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
	
    <?php if($this->session->flashdata('msg')=='error'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Error',
                    text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FF4859'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Pengguna Berhasil disimpan ke database.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='warning'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Warning',
                    text: "Gambar yang Anda masukan terlalu besar.",
                    showHideTransition: 'slide',
                    icon: 'warning',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FFC017'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Pengguna berhasil di update",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Pengguna Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='show-modal'):?>
        <script type="text/javascript">
                $('#ModalResetPassword').modal('show');
        </script>
    <?php else:?>

    <?php endif;?>
</body>
</html>
