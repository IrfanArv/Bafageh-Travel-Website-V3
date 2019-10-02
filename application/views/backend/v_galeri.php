	<?php 
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }
                
    ?>
    <section class="content-header">
      <h1>
        Tipe Villa
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'backend/dashboard'?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Tipe Villa</li>
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
          					<th>Gambar</th>
                            <th>Tipe Villa</th>
                            <th>Villa</th>
                            <th>Harga</th>
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
          				<?php
                    $no=0;
                        foreach($data->result_array() as $a):
                            $no++;
                            $id=$a['id_galeri'];
                            $jdl_galeri=$a['jdl_galeri'];
                            $gambar=$a['gbr_galeri'];
                            $idalbum=$a['albumid'];
                            $jdl_album=$a['jdl_album'];
                            $harga=$a['harga'];
                    ?>
                <tr>
                  <td><img class="img-thumbnail" width="90" height="80" src="<?php echo base_url().'assets/images/gallery/'.$gambar; ?>"></td>
                  <td style="vertical-align:middle;"><?php echo $jdl_galeri; ?></td>
                  <td style="vertical-align:middle;"><?php echo $jdl_album; ?></td>
                  <td style="vertical-align:middle;"><?php echo 'Rp. '.number_format($harga);?></td>
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
<!-- ============ MODAL ADD PHOTO =============== -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Tipe Villa</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/galeri/simpan_galeri'?>" enctype="multipart/form-data">
        <div class="modal-body">

            <div class="form-group">
                <label class="control-label col-xs-3" >Tipe Villa</label>
                <div class="col-xs-8">
                    <input name="judul" class="form-control" type="text" placeholder="Judul" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Villa</label>
                <div class="col-xs-8">
                    <select name="album" class="form-control" required>
                        <?php               
                            foreach($alm->result_array() as $i){
                              $kode=$i['idalbum'];
                              $nama=$i['jdl_album'];
                        ?>
                            <option value='<?php echo $kode?>'><?php echo $nama?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3" >Harga</label>
                <div class="col-xs-8">
                    <input name="harga" class="form-control" type="text" placeholder="Harga" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Gambar</label>
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
      $id=$a['id_galeri'];
      $jdl_galeri=$a['jdl_galeri'];
      $gambar=$a['gbr_galeri'];
      $idalbum=$a['albumid'];
      $jdl_album=$a['jdl_album'];
      $harga=$a['harga'];
?>
<!-- ============ MODAL UPDATE PHOTO =============== -->
<div class="modal fade" id="ModalUpdate<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Update Tipe Villa</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/galeri/update_galeri'?>" enctype="multipart/form-data">
        <div class="modal-body">

            <div class="form-group">
                <label class="control-label col-xs-3" >Tipe Villa</label>
                <div class="col-xs-8">
                    <input name="judul" value="<?php echo $jdl_galeri;?>" class="form-control" type="text" placeholder="Tipe Villa" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Nama Villa</label>
                <div class="col-xs-8">
                    <select name="album" class="form-control" required>
                        <?php               
                            foreach($alm->result_array() as $i):
                              $kode=$i['idalbum'];
                              $nama=$i['jdl_album'];
                        ?>
                          <?php if($idalbum==$kode):?>
                            <option value='<?php echo $kode?>' selected><?php echo $nama?></option>
                          <?php else:?>
                            <option value='<?php echo $kode?>'><?php echo $nama?></option>
                          <?php endif;?>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Harga</label>
                <div class="col-xs-8">
                    <input name="harga" value="<?php echo $harga;?>" class="form-control" type="text" placeholder="Harga" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Gambar</label>
                <div class="col-xs-9">
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
            $id=$a['id_galeri'];
            $jdl_galeri=$a['jdl_galeri'];
            $gambar=$a['gbr_galeri'];
            $idalbum=$a['albumid'];
            $jdl_album=$a['jdl_album'];
            $harga=$a['harga'];
  ?>
	<!--Modal Hapus PHOTO-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Photo</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'backend/galeri/hapus_galeri'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
							       <input type="hidden" name="kode" value="<?php echo $id;?>"/> 
                          <p>Apakah Anda yakin mau menghapus Photo <b><?php echo $jdl_galeri;?></b> ?</p>
                               
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
    <script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
	
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
   
    <?php if($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Photo Berhasil disimpan ke database.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Photo berhasil di update",
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
                    text: "Photo Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>