	<?php
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }

    ?>
    <section class="content-header">
      <h1>
        Hotel
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'backend/dashboard'?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Hotel</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

          <div class="box">
            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah Hotel</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
                <th>Nama Hotel</th>
                <th>Room</th>
                <th>Rate</th>
                <th>2 Orang</th>
                <th>3-4 Orang</th>
                <th>5-6 Orang</th>
                <th>7-8 Orang</th>  
                <th>Link Hotel</th> 
                <th>Paket</th>                             
                <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
          <tbody>
          				<?php
                    $no=0;
                        foreach($data->result_array() as $a):
                            $no++;
                            $id=$a['id_hotel'];
                            $nama_hotel=$a['nama_hotel'];
                            $room=$a['room'];
                            $rate=$a['rate'];
                            $harga0=$a['harga0'];
                            $harga1=$a['harga1'];
                            $harga2=$a['harga2'];
                            $harga3=$a['harga3'];
                            $paketid=$a['paketid'];
                            $nama_paket=$a['nama_paket'];
                            $link=$a['linkweb'];
                            
                    ?>
                <tr>
                  <td style="vertical-align:middle;"><a href="//<?php echo $link; ?>/" target="_blank"><?php echo $nama_hotel; ?></td>
                  <td style="vertical-align:middle;"><?php echo $room; ?></td>
                  <td style="vertical-align:middle;"><?php echo $rate; ?></td>
                  <td style="vertical-align:middle;"><?php echo 'Rp '.number_format($harga0);?></td>
                  <td style="vertical-align:middle;"><?php echo 'Rp '.number_format($harga1);?></td>
                  <td style="vertical-align:middle;"><?php echo 'Rp '.number_format($harga2);?></td>
                  <td style="vertical-align:middle;"><?php echo 'Rp '.number_format($harga3);?></td>
                  <td style="vertical-align:middle;"><?php echo $link; ?></td>
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
        <h3 class="modal-title" id="myModalLabel">Tambah Hotel</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/paket_hotel/simpan_hotel'?>" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
                <label class="control-label col-xs-3" >Nama Hotel</label>
                <div class="col-xs-8">
                    <input name="nama_hotel" class="form-control" type="text" placeholder="Nama Hotel" required>
                </div>
            </div>

             <div class="form-group">
                <label class="control-label col-xs-3" >Room Type</label>
                <div class="col-xs-8">
                    <input name="room" class="form-control" type="text" placeholder="Room Type" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Hotel Rate</label>
                <div class="col-xs-8">
                    <select name="rate" class="form-control" required>
                      <option value="">-Pilih-</option>
                      <option value="&#9733;">&#9733;</option>
                      <option value="&#9733;&#9733;">&#9733;&#9733;</option>
                      <option value="&#9733;&#9733;&#9733;">&#9733;&#9733;&#9733;</option>
                      <option value="&#9733;&#9733;&#9733;&#9733;">&#9733;&#9733;&#9733;&#9733;</option>
                      <option value="&#9733;&#9733;&#9733;&#9733;&#9733;">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3" >2 Orang</label>
                <div class="col-xs-8">
                    <input name="harga0" class="form-control" type="text" placeholder="Harga Untuk 2 Orang" required>
                </div>
            </div>

              <div class="form-group">
                <label class="control-label col-xs-3" >3-4 Orang</label>
                <div class="col-xs-8">
                    <input name="harga1" class="form-control" type="text" placeholder="Harga Untuk 3-4 Orang" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3" >5-6 Orang</label>
                <div class="col-xs-8">
                    <input name="harga2" class="form-control" type="text" placeholder="Harga Untuk 5-6 Orang" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3" >7-8 Orang</label>
                <div class="col-xs-8">
                    <input name="harga3" class="form-control" type="text" placeholder="Harga Untuk 7-8 Orang" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Paket</label>
                <div class="col-xs-8">
                    <select name="paketid" class="form-control" required>
                    <option value="">-Pilih-</option>
                        <?php
                            foreach($pkt->result_array() as $p){
                              $kode=$p['idpaket'];
                              $nama_paket=$p['nama_paket'];
                        ?>
                            <option value='<?php echo $kode?>'><?php echo $nama_paket?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Link Hotel</label>
                <div class="col-xs-8">
                    <input name="linkweb" class="form-control" type="text" placeholder="Link Website Hotel" >
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
                            $id=$a['id_hotel'];
                            $nama_hotel=$a['nama_hotel'];
                            $room=$a['room'];
                            $rate=$a['rate'];
                            $harga0=$a['harga0'];
                            $harga1=$a['harga1'];
                            $harga2=$a['harga2'];
                            $harga3=$a['harga3'];
                            $linkweb=$a['linkweb'];
                            $paketid=$a['paketid'];
                            $nama_paket=$a['nama_paket'];
                    ?>
<!-- ============ MODAL UPDATE PHOTO =============== -->
<div class="modal fade" id="ModalUpdate<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Update Harga Hotel</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/paket_hotel/edit_hotel'?>" enctype="multipart/form-data">
        <div class="modal-body">

             <div class="form-group">
                <label class="control-label col-xs-3" >Nama Hotel</label>
                <div class="col-xs-8">
                    <input name="nama_hotel" value="<?php echo $nama_hotel;?>" class="form-control" type="text" placeholder="Nama Hotel" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Room Type</label>
                <div class="col-xs-8">
                    <input name="room" value="<?php echo $room;?>" class="form-control" type="text" placeholder="Room Type" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Hotel Rate</label>
                <div class="col-xs-8">
                    <select name="rate" class="form-control" required>
                    <option value="">-Pilih-</option>
                      <option value="&#9733;">&#9733;</option>
                      <option value="&#9733;&#9733;">&#9733;&#9733;</option>
                      <option value="&#9733;&#9733;&#9733;">&#9733;&#9733;&#9733;</option>
                      <option value="&#9733;&#9733;&#9733;&#9733;">&#9733;&#9733;&#9733;&#9733;</option>
                      <option value="&#9733;&#9733;&#9733;&#9733;&#9733;">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                    
                    </select>
                </div>
            </div>
            
             <div class="form-group">
                <label class="control-label col-xs-3" >2 Orang</label>
                <div class="col-xs-8">
                    <input name="harga0" value="<?php echo $harga0;?>" class="form-control" type="text" placeholder="Harga Untuk 2 Orang" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >3-4 Orang</label>
                <div class="col-xs-8">
                    <input name="harga1" value="<?php echo $harga1;?>" class="form-control" type="text" placeholder="Harga Untuk 3-4 Orang" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3" >5-6 Orang</label>
                <div class="col-xs-8">
                    <input name="harga2" value="<?php echo $harga2;?>" class="form-control" type="text" placeholder="Harga Untuk 5-6 Orang" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3" >7-8 Orang</label>
                <div class="col-xs-8">
                    <input name="harga3" value="<?php echo $harga3;?>" class="form-control" type="text" placeholder="Harga Untuk 7-8 Orang" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Paket</label>
                <div class="col-xs-8">
                    <select name="paketid" class="form-control" required>
                    <option value="">-Pilih-</option>
                        <?php
                            foreach($pkt->result_array() as $p):
                              $kode=$p['idpaket'];
                              $nama_paket=$p['nama_paket'];
                        ?>
                          <?php if($idpaket==$kode):?>
                            <option value='<?php echo $kode?>' selected><?php echo $nama_paket?></option>
                          <?php else:?>
                            <option value='<?php echo $kode?>'><?php echo $nama_paket?></option>
                          <?php endif;?>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Link Hotel</label>
                <div class="col-xs-8">
                    <input name="linkweb" value="<?php echo $linkweb;?>" class="form-control" type="text" placeholder="Link Website Hotel" >
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
                            $id=$a['id_hotel'];
                            $nama_hotel=$a['nama_hotel'];
                            $room=$a['room'];
                            $rate=$a['rate'];
                            $hara0=$a['harga0'];
                            $harga1=$a['harga1'];
                            $harga2=$a['harga2'];
                            $harga3=$a['harga3'];
                            $linkweb=$a['linkweb'];
                            $paketid=$a['paketid'];
                            $nama_paket=$a['nama_paket'];
                    ?>
	<!--Modal Hapus PHOTO-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Hotel</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'backend/paket_hotel/hapus_hotel'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
							       <input type="hidden" name="kode" value="<?php echo $id;?>"/>
                          <p>Apakah Anda yakin mau menghapus Hotel <b><?php echo $nama_hotel;?></b> untuk paket <b><?php echo $nama_paket;?></b> ?</p>

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
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

    <?php if($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Data Hotel Berhasil disimpan ke database.",
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
                    text: "Data Hotel berhasil di update",
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
                    text: "Data Hotel Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>
