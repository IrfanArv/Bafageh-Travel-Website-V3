	<?php 
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }
                
    ?>
    <section class="content-header">
      <h1>
       Rencana Perjalanan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'backend/dashboard'?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">  Rencana Perjalanan</li>
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
          					<th>No</th>
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
                            $id=$a['id_intinerary'];
                            $title_intinerary=$a['title_intinerary'];
                            $content_intinerary=limit_words($a['content_intinerary'],10);
                            $paket=$a['paketid'];
                            $nama_paket=$a['nama_paket'];
                    ?>
                <tr>
                  <td style="vertical-align:middle;"><?php echo $id; ?></td>
                  <td style="vertical-align:middle;"><?php echo $content_intinerary; ?></td>
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
        <h3 class="modal-title" id="myModalLabel">Tambah Rencana Perjalanan</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/intinerary/simpan_intinerary'?>" enctype="multipart/form-data">
        <div class="modal-body">
            
        <div class="form-group">
                <label class="control-label col-xs-3" >Paket</label>
                <div class="col-xs-8">
                    <select name="paketid" class="form-control" required>
                        <?php               
                            foreach($pkt->result_array() as $i){
                              $kode=$i['idpaket'];
                              $nama_paket=$i['nama_paket'];
                        ?>
                            <option value='<?php echo $kode?>'><?php echo $nama_paket?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Judul Rencana</label>
                <div class="col-xs-8">
                    <input name="title_intinerary" class="form-control" type="text" placeholder="Judul Rencana" >
                </div>
            </div>

        <div class="form-group">
          <label class="control-label col-xs-3" >Konten</label>
          <div class="col-xs-8">
              <textarea class="ckeditor" name="content_intinerary" rows="10" cols="10"></textarea>
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
                            $id=$a['id_intinerary'];
                            $title_intinerary=$a['title_intinerary'];
                            $content_intinerary=$a['content_intinerary'];
                            $paket=$a['paketid'];
                            $nama_paket=$a['nama_paket'];
                    ?>
<!-- ============ MODAL UPDATE PHOTO =============== -->
<div class="modal fade" id="ModalUpdate<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Update Rencana Perjalanan</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/intinerary/update_intinerary'?>" enctype="multipart/form-data">
        <div class="modal-body">

              <div class="form-group">
                <label class="control-label col-xs-3" >Paket</label>
                <div class="col-xs-8">
                    <select name="paketid" class="form-control" required>
                        <?php               
                            foreach($pkt->result_array() as $i){
                              $kode=$i['idpaket'];
                              $nama_paket=$i['nama_paket'];
                        ?>
                            <option value='<?php echo $kode?>'><?php echo $nama_paket?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Judul Rencana</label>
                <div class="col-xs-8">
                    <input name="title_intinerary" value="<?php echo $title_intinerary;?>" class="form-control" type="text" placeholder="Judul Rencana" >
                </div>
            </div>

          <div class="form-group">
          <label class="control-label col-xs-3" >Konten</label>
          <div class="col-xs-8">
              <textarea class="ckeditor" name="content_intinerary" rows="10" cols="10"><?php echo $content_intinerary;?></textarea>
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
                            $id=$a['id_intinerary'];
                            $title_intinerary=$a['title_intinerary'];
                            $content_intinerary=$a['content_intinerary'];
                            $paket=$a['paketid'];
                            $nama_paket=$a['nama_paket'];
                    ?>
	<!--Modal Hapus PHOTO-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Rencana Perjalanan</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'backend/intinerary/hapus_intinerary'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
							       <input type="hidden" name="kode" value="<?php echo $id;?>"/> 
                          <p>Apakah Anda yakin mau menghapus Rencana Perjalanan <?php echo $nama_paket;?> <b><?php echo $title_intinerary;?></b> ?</p>
                               
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
                    text: "Rencana Perjalanan Berhasil disimpan ke database.",
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
                    text: "Rencana Perjalanan berhasil di update",
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
                    text: "Rencana Perjalanan Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>