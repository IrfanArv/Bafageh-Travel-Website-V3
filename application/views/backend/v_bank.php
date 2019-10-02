    <section class="content-header">
      <h1>
        Rekening Bank
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Bank</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
          <div class="box">
             <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#ModalAddNew"><span class="fa fa-plus"></span> Add New</a>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:12px;">
                <thead>
                <tr>
                    <th>Logo Bank</th>
					<th>Metode</th>
                    <th>No Rek.</th>
                    <th>Bank</th>
                    <th>Atas Nama</th>  
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$no=0;
  					foreach ($data->result_array() as $i) :
  					   $no++;
                       $id=$i['id_metode'];
                       $metode=$i['metode'];
                       $bank=$i['bank'];
                       $norek=$i['norek'];
                       $atasnama=$i['atasnama'];
                       $gambar=$i['logo'];
                       
                    ?>
                <tr>
                <td><img class="img-thumbnail" width="90" height="80" src="<?php echo base_url().'assets/images/bank/'.$gambar; ?>"></td>
                  <td><b><?php echo $metode;?></b></td>
                  <td><?php echo $norek;?></td>
                  <td><?php echo $bank;?></td>
                  <td><?php echo $atasnama;?></td>
                  <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id;?>"><span class="fa fa-pencil"></span></a>
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

 	<!--Modal Add New Rekening-->
    <div class="modal fade" id="ModalAddNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
              <h4 class="modal-title" id="myModalLabel">Add New</h4>
            </div>
              <form class="form-horizontal" action="<?php echo base_url().'backend/bank/simpan_rekening'?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">          


            <div class="form-group">
                <label class="control-label col-xs-3" >Logo</label>
                <div class="col-xs-8">
                     <input type="file" name="filefoto" required>
                </div>
            </div>

                  <div class="form-group">
                      <label class="control-label col-xs-3" >No Rek.</label>
                      <div class="col-xs-8">
                          <input name="norek" class="form-control" type="text" placeholder="No Rek." required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label col-xs-3" >Bank</label>
                      <div class="col-xs-8">
                          <input name="bank" class="form-control" type="text" placeholder="Bank" required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label col-xs-3" >Atas Nama</label>
                      <div class="col-xs-8">
                          <input name="atasnama" class="form-control" type="text" placeholder="Atas Nama" required>
                      </div>
                  </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                </div>
              </form>
          </div>
        </div>
    </div>

<?php foreach ($data->result_array() as $i) :
              $id=$i['id_metode'];
              $metode=$i['metode'];
              $bank=$i['bank'];
              $norek=$i['norek'];
              $atasnama=$i['atasnama'];
              $gambar=$i['logo'];
            ?>
  <!--Modal Add New Rekening-->
    <div class="modal fade" id="ModalEdit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
              <h4 class="modal-title" id="myModalLabel">Update Rekening</h4>
            </div>
              <form class="form-horizontal" action="<?php echo base_url().'backend/bank/update_rekening'?>" method="post" enctype="multipart/form-data">
                <div class="modal-body"> 
                
                <div class="form-group">
                <label class="control-label col-xs-3" >Logo</label>
                <div class="col-xs-9">
                     <input type="file" name="filefoto">
                </div>
                </div>         

                  <div class="form-group">
                      <label class="control-label col-xs-3" >No Rek.</label>
                      <div class="col-xs-8">
                          <input name="norek" value="<?php echo $norek;?>" class="form-control" type="text" placeholder="No Rek." required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label col-xs-3" >Bank</label>
                      <div class="col-xs-8">
                          <input name="bank" value="<?php echo $bank;?>" class="form-control" type="text" placeholder="Bank" required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label col-xs-3" >Atas Nama</label>
                      <div class="col-xs-8">
                          <input name="atasnama" value="<?php echo $atasnama;?>" class="form-control" type="text" placeholder="Atas Nama" required>
                      </div>
                  </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="kode" value="<?php echo $id;?>">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat">Update</button>
                </div>
              </form>
          </div>
        </div>
    </div>
<?php endforeach;?>

	<?php foreach ($data->result_array() as $i) :
              $id=$i['id_metode'];
              $metode=$i['metode'];
              $bank=$i['bank'];
              $norek=$i['norek'];
              $atasnama=$i['atasnama'];
              $gambar=$i['logo'];
            ?>
	<!--Modal Hapus Rekening-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Bank</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'backend/bank/hapus_rekening'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
							       <input type="hidden" name="kode" value="<?php echo $id;?>"/> 
                            <p>Apakah Anda yakin mau menghapus rekening bank <b><?php echo $bank;?></b>?</p>
                               
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

    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('.datepicker3').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $('.datepicker4').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    });
    $(".timepicker").timepicker({
      showInputs: true
    });

  });
</script>
    <?php if($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Rekening berhasil di simpan ke database.",
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
                    text: "Rekening berhasil di update",
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
                    text: "Rekening Berhasil dihapus.",
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