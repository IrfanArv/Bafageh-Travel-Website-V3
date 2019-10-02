  <?php 
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }
                
    ?>
    <section class="content-header">
      <h1>
        Paket Tour
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Paket</li>
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
                    <th>Paket</th>
                    <th>Kategori Paket</th>
                    <th style="text-align: right;">Jumlah Hotel</th>
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no=0;
                        foreach($data->result_array() as $a):
                            $no++;
                            $id=$a['idpaket'];
                            $gambar=$a['gambar'];
                            $nama_paket=$a['nama_paket'];
                            $kategori=$a['kategori_id'];
                            $nama=$a['kategori'];
                            $jml=$a['jml'];
                    ?>
                <tr>
                  <td><img src="<?php echo base_url().'/assets/images/paket/'.$gambar;?>" style="width:90px;"></td>
                  <td><?php echo $nama_paket;?></td>
                  <td><?php echo $nama;?></td>
                  <td style="text-align: right;"><?php echo $jml;?> Hotel</td>
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
   <!-- ============ MODAL ADD PAKET TOUR =============== -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Paket</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/paket_tour/simpan_paket'?>" enctype="multipart/form-data">
        <div class="modal-body">

            <div class="form-group">
                <label class="control-label col-xs-2" >Paket</label>
                <div class="col-xs-8">
                    <input name="nama_paket" class="form-control" type="text" placeholder="Nama Paket" required>
                </div>
            </div>
                   

            <div class="form-group">
                <label class="control-label col-xs-2" >Deskripsi</label>
                <div class="col-xs-8">
                    <textarea class="ckeditor" name="deskripsi" rows="10" cols="10"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-2" >Kategori</label>
                <div class="col-xs-8">
                    <select name="kategori" class="form-control" required>
                      <option value="">-PILIH-</option>
                      <?php foreach($kat->result_array() as $k):
                        $idkat=$k['id_kategori'];
                        $kate=$k['kategori'];
                      ?>
                      <option value="<?php echo $idkat;?>"><?php echo $kate;?></option>
                      <?php endforeach;?>
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label col-xs-2" >Gambar</label>
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
      $id=$a['idpaket'];
      $gambar=$a['gambar'];
      $nama_paket=$a['nama_paket'];
      $deskripsi=$a['deskripsi'];
     
      $kategori_id=$a['kategori_id'];
?>
<!-- ============ MODAL EDIT PAKET TOUR =============== -->
<div class="modal fade" id="ModalUpdate<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Update Paket</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/paket_tour/update_paket'?>" enctype="multipart/form-data">
        <div class="modal-body">

            <div class="form-group">
                <label class="control-label col-xs-2" >Paket</label>
                <div class="col-xs-8">
                    <input name="nama_paket" value="<?php echo $nama_paket;?>" class="form-control" type="text" placeholder="Nama Paket" required>
                </div>
            </div>
                   

            <div class="form-group">
                <label class="control-label col-xs-2" >Deskripsi</label>
                <div class="col-xs-8">
                    <textarea class="ckeditor" name="deskripsi" rows="10" cols="10"><?php echo $deskripsi;?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-2" >Kategori</label>
                <div class="col-xs-8">
                    <select name="kategori" class="form-control" required>
                      <option value="">-PILIH-</option>
                      <?php foreach($kat->result_array() as $k):
                        $idkat=$k['id_kategori'];
                        $kate=$k['kategori'];
                      ?>
                      <?php if($idkat==$kategori_id):?>
                        <option value="<?php echo $idkat;?>" selected><?php echo $kate;?></option>
                      <?php else:?>
                        <option value="<?php echo $idkat;?>"><?php echo $kate;?></option>
                      <?php endif;?>
                      <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-2" >Gambar</label>
                <div class="col-xs-8">
                    <input type="file" name="filefoto">
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <input type="hidden" name="kode" value="<?php echo $id;?>">
            <input type="hidden" name="gambar" value="<?php echo $gambar;?>">
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
            $id=$a['idpaket'];
            $gambar=$a['gambar'];
            $nama_paket=$a['nama_paket'];
            $deskripsi=limit_words($a['deskripsi'],20);
           
            $kategori_id=$a['kategori_id'];
  ?>
  <!--Modal Hapus Post-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Paket</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'backend/paket_tour/hapus_paket'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
                     <input type="hidden" name="kode" value="<?php echo $id;?>"/> 
                     <input type="hidden" name="gambar" value="<?php echo $gambar;?>">
                          <p>Apakah Anda yakin mau menghapus Paket <b><?php echo $nama_paket;?></b> ?</p>
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
	
    <?php if($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Paket Tour Berhasil disimpan ke database.",
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
                    text: "Paket Tour berhasil di update",
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
                    text: "Paket Tour Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>
</body>
</html>
