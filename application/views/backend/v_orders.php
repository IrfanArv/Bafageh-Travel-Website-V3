    <section class="content-header">
      <h1>
        Data Order
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Order</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:12px;">
                <thead>
                <tr>
					          <th style="text-align:center;width: 130px;">No Invoice</th>
                    <th style="text-align:center;">Tgl Invoice</th>
                    <th style="text-align:center;">Atas Nama</th>
                    <th style="text-align:center;">Email</th>
                    <th style="text-align:center;">No Telp</th>
                    <th style="text-align:center;">Paket</th>
                    <th style="text-align:center;">Hotel</th>
                    <th style="text-align:center;">Jumlah Tamu</th>
                    <th style="text-align:center;">Berangkat</th>
                    <th style="text-align:center;">Total Bayar</th>
                    <th style="text-align:center;width:100px;">Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$no=0;
  					foreach ($data->result_array() as $a) :
  					    $no++;
                $id=$a['id_order'];
                $tgl=$a['tanggal'];
                $nama=$a['nama'];
                $email=$a['email'];
                $notelp=$a['notelp'];
                $idpaket=$a['idpaket'];
                $nama_paket=$a['nama_paket'];
                $idhotel=$a['id_hotel']; 
                $nama_hotel=$a['nama_hotel'];
                $rate=$a['rate'];
                $jenkel=$a['jenkel'];
                $alamat=$a['alamat'];
                $berangkat=$a['berangkat'];
                $total=$a['total'];
                $dewasa=$a['adult'];               
                $status=$a['status'];
                       
          ?>
            <tr>
                <td style="vertical-align: middle;"><?php echo $id; ?></td>
                <td style="vertical-align: middle;"><?php echo $tgl; ?></td>
                <td style="vertical-align: middle;"><?php echo $nama; ?></td>
                <td style="vertical-align: middle;"><?php echo $email; ?></td>
                <td style="vertical-align: middle;"><?php echo $notelp; ?></td>
                <td style="vertical-align: middle;"><?php echo $nama_paket; ?></td>
                <td style="vertical-align: middle;"><?php echo $nama_hotel; ?> <?php echo $rate; ?></td>
                <td style="vertical-align: middle;"><?php echo $dewasa; ?> Orang</td>
                <td style="vertical-align: middle;"><?php echo $berangkat; ?></td>
                <td style="vertical-align: middle;"><?php echo 'Rp '.number_format($total); ?></td>
                <td style="text-align: center;vertical-align: middle;">
                <?php 
                    if($status=='LUNAS'):?>
                    <label class="label label-success">LUNAS</label>
                <?php else:?>
                    <a class="btn btn-xs btn-info" href="<?php echo base_url().'backend/orders/pembayaran_selesai/'.$id?>" data-toggle="modal" title="Pembayaran Selesai"><span class="fa fa-check"></span> </a>
                    <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-pencil"></span> </a>
                    <a class="btn btn-xs btn-danger" href="#ModalHapus<?php echo $id;?>" data-toggle="modal" title="Batalkan"><span class="fa fa-close"></span> </a>
                <?php endif ?>
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
<!-- ============ MODAL EDIT ORDER =============== -->
<?php
    foreach($data->result_array() as $a):
            $no++;
            $id=$a['id_order'];
            $tgl=$a['tanggal'];
            $nama=$a['nama'];
            $jenkel=$a['jenkel'];
            $alamat=$a['alamat'];
            $notelp=$a['notelp'];
            $berangkat=$a['berangkat'];
            $dewasa=$a['adult'];
        ?>
        <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Edit Order</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/orders/edit_orders'?>">
                <div class="modal-body">
                    <input name="kode" type="hidden" value="<?php echo $id;?>">

            <div class="form-group">
                <label class="control-label col-xs-3" >Jumlah Tamu</label>
                <div class="col-xs-9">
                    <input name="dewasa" class="form-control" min="1" type="number" value="<?php echo $dewasa;?>" style="width:280px;" required>
                </div>
            </div>
            

          </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        </div>
        </div>
    <?php endforeach;?>

	
	<?php foreach ($data->result_array() as $a) :
        $id=$a['id_order'];
        $tgl=$a['tanggal'];
        $nama=$a['nama'];
        $jenkel=$a['jenkel'];
        $alamat=$a['alamat'];
        $notelp=$a['notelp'];
        $berangkat=$a['berangkat'];
        $total=$a['total'];
        $dewasa=$a['adult'];
       
        $status=$a['status'];
  ?>
	<!--Modal Hapus Order-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Order</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'backend/orders/hapus_order'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
							       <input type="hidden" name="kode" value="<?php echo $id;?>"/> 
                            <p>Apakah Anda yakin mau menghapus orderan dari <b><?php echo $nama;?></b>?</p>
                               
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
    
    <?php if($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "Order berhasil di update",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Pembayaran Selesai",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Order Berhasil dihapus.",
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