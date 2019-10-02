<?php 
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }
                
    ?>
  <section class="content-header">
    <h1>
      Fasilitas Tour
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url().'backend/dashboard'?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"> Fasilitas Tour</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">

        <div class="box">
          <div class="box-header">
            <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah Fasilitas</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-striped" style="font-size:13px;">
              <thead>
              <tr>
                          <th>Simbol</th>
                          <th>Nama</th>
                          <th>Konten</th>
                          <th>Paket</th>
                  <th style="text-align:right;">Aksi</th>
              </tr>
              </thead>
              <tbody>
                <?php
                  $no=0;
                      foreach($data->result_array() as $a):
                          $no++;
                          $id=$a['id_include'];
                          $title_include=$a['title_include'];
                          $content=limit_words($a['content'],5);
                          $id_icon=$a['iconid'];
                          $simbol=$a['simbol'];
                          $idpaket=$a['paketid'];
                          $nama_paket=$a['nama_paket'];

                  ?>
              <tr>
                <td><i class='<?php echo $simbol;?>'</td>
                <td style="vertical-align:middle;"><?php echo $title_include; ?></td>
                <td style="vertical-align:middle;"><?php echo $content; ?></td>
                <td style="vertical-align:middle;"><?php echo $nama_paket; ?></td>
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
      <h3 class="modal-title" id="myModalLabel">Tambah Fasilitas Tour</h3>
  </div>
  <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/fasilitas_tour/simpan_include'?>" enctype="multipart/form-data">
      <div class="modal-body">
      
      <div class="form-group">
              <label class="control-label col-xs-3" >Paket</label>
              <div class="col-xs-8">
                  <select name="nama_paket" class="form-control" required>
                      <?php
                          foreach($paket->result_array() as $p){
                            $kode=$p['idpaket'];
                            $nama_paket=$p['nama_paket'];
                      ?>
                          <option value='<?php echo $kode?>'><?php echo $nama_paket?></option>
                      <?php } ?>
                      
                  </select>
              </div>
          </div>

          <div class="form-group">
              <label class="control-label col-xs-3" >Nama</label>
              <div class="col-xs-8">
                  <input name="title_include" class="form-control" type="text" placeholder="Nama" required>
              </div>
          </div>

          <div class="form-group">
              <label class="control-label col-xs-3" >Simbol</label>
              <div class="col-xs-8">
                  <select name="simbol" class="form-control" required>
                      <?php
                          foreach($icn->result_array() as $i){
                            $kode=$i['id_icon'];
                            $title_icon=$i['title_icon'];
                            $simbol=$i['simbol'];
                      ?>
                          <option value='<?php echo $kode?>'><i class="<?php echo $simbol?>"> </i><?php echo $title_icon?></option>
                      <?php } ?>
                      
                  </select>
              </div>
          </div>


          <div class="form-group">
          <label class="control-label col-xs-3" >Konten</label>
          <div class="col-xs-8">
              <textarea class="ckeditor" name="content" rows="10" cols="10"></textarea>
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
                          $id=$a['id_include'];
                          $title_include=$a['title_include'];
                          $content=$a['content'];
                          $id_icon=$a['iconid'];
                          $id_paket=$a['paketid'];
                          $nama_paket=$p['nama_paket'];

                  ?>
<!-- ============ MODAL UPDATE PHOTO =============== -->
<div class="modal fade" id="ModalUpdate<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      <h3 class="modal-title" id="myModalLabel">Update Fasilitas Tour</h3>
  </div>
  <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/fasilitas_tour/update_include'?>" enctype="multipart/form-data">
      <div class="modal-body">
      <div class="form-group">
              <label class="control-label col-xs-3" >Paket</label>
              <div class="col-xs-8">
                  <select name="nama_paket" class="form-control" required>
                      <?php
                          foreach($paket->result_array() as $p){
                            $kode=$p['idpaket'];
                            $nama_paket=$p['nama_paket'];
                      ?>
                          <option value='<?php echo $kode?>'><?php echo $nama_paket?></option>
                      <?php } ?>
                      
                  </select>
              </div>
          </div>
      <div class="form-group">
              <label class="control-label col-xs-3" >Simbol</label>
              <div class="col-xs-8">
                  <select name="icon" class="form-control" required>
                      <?php
                          foreach($icn->result_array() as $i):
                            $kode=$i['id_icon'];
                            $title_icon=$i['title_icon'];
                           
                      ?>
                        <?php if($id_icon==$kode):?>
                          <option value='<?php echo $kode?>' selected><?php echo $title_icon?></option>
                        <?php else:?>
                          <option value='<?php echo $kode?>'><?php echo $title_icon?></option>
                        <?php endif;?>
                      <?php endforeach;?>
                  </select>
              </div>
          </div>

          <div class="form-group">
              <label class="control-label col-xs-3" >Nama</label>
              <div class="col-xs-8">
                  <input name="title_include" value="<?php echo $title_include;?>" class="form-control" type="text" placeholder="Tipe Villa" required>
              </div>
          </div>

          <div class="form-group">
          <label class="control-label col-xs-3" >Konten</label>
          <div class="col-xs-8">
              <textarea class="ckeditor" name="content" rows="10" cols="10"><?php echo $content;?></textarea>
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
                          $id=$a['id_include'];
                          $title_include=$a['title_include'];
                          $content=$a['content'];
                          $id_icon=$a['iconid'];

                  ?>
<!--Modal Hapus PHOTO-->
      <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                      <h4 class="modal-title" id="myModalLabel">Hapus Fasilitas Tour</h4>
                  </div>
                  <form class="form-horizontal" action="<?php echo base_url().'backend/fasilitas_tour/hapus_include'?>" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                   <input type="hidden" name="kode" value="<?php echo $id;?>"/>
                        <p>Apakah Anda yakin mau menghapus <b><?php echo $title_include;?></b> ?</p>

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
