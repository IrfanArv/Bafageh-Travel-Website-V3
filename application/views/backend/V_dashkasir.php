
    <section class="content-header">
      <h1>
        Dashboard
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      
      <div class="row">

      
      <div class="col-md-12">
          <!-- MAP & BOX PANE -->
          <div class="box">
            <div class="box-header">
            <h3 class="box-title">Transaksi Hotel Office</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
                              <th>No Order</th>
                              <th>Order Date</th>
                              <th>Guest</th>
                              <th>Hotel</th>
                              <th>Room Type</th>
                              <th>Chek in</th>
                              <th>Chek Out</th>
                              <th>No Of Night</th>
                              <th>Total Room</th>
                              <th>Price</th>
                              <th>Grand Total</th>
                              <th>Issued By</th>
                           
                    <th style="text-align:right;">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
          					$no=0; 
          					foreach ($hoteloff->result_array() as $i) :
          					   $no++;
                       $id_order=$i['id_order'];
                       $tanggal=$i['tanggal'];
                       $name=$i['name'];
                       $destinasi_id=$i['destinasi'];
                       $destinasi=$i['destinasi'];
                       $id_hotel=$i['id_hotel'];
                       $judul=$i['judul'];
                       $id_room=$i['id_room'];
                       $title=$i['title'];
                       $date_start=$i['date_start'];
                       $end_date=$i['end_date'];
                       $total_room=$i['jml_kamar'];
                       $idadmin=$i['idadmin'];
                       $nama=$i['nama'];
                       $jml_hari=$i['jml_hari'];
                       $price=$i['price'];
                       $total_paid=$i['total_paid'];
                       $status=$i['status'];
                       $stsmail=$i['mail_status'];
                      
          					  ?>

                <tr>
                <td style="vertical-align:middle;"><?php echo $id_order;?></td>
                <td style="vertical-align:middle;"><span class="label label-success"><?php echo date ('d M Y',strtotime ($tanggal)) ?></span></td>
                <td style="vertical-align:middle;"><?php echo $name;?></td>
                <td style="vertical-align:middle;"><?php echo $judul;?></td>
                <td style="vertical-align:middle;"><a href="<?php echo base_url().'backend/room/detail/'.$id_room;?>" target="_blank"><?php echo $title;?></a></td>
                <td style="vertical-align:middle;"><span class="label label-warning"><?php echo date ('d M Y',strtotime ($date_start)) ?></span></td>
                <td style="vertical-align:middle;"><span class="label label-warning"><?php echo date ('d M Y',strtotime ($end_date)) ?></span></td>
                <td style="vertical-align:middle;"><?php echo $jml_hari;?> Night</td>
                <td style="vertical-align:middle;"><?php echo $total_room;?> Room</td>
                <td style="vertical-align:middle;"><span class="label label-info"><?php echo 'Rp '.number_format($price);?></span></td>
                <td style="vertical-align:middle;"><span class="label label-danger"><?php echo 'Rp '.number_format($total_paid);?></span></td>
                <td style="vertical-align:middle;"><?php echo $nama;?></td>
                  
                  <td style="text-align:right;">
                  <?php 
                    if($status=='LUNAS'):?>
                     <a class="btn btn-xs btn-success" href="#ModalVoucher<?php echo $id_order?>" data-toggle="modal" title="Selesai">Selesai </a>
                <?php else:?>
                    <a class="btn btn-xs btn-warning" href="<?php echo base_url().'backend/hotel/done/'.$id_order?>" data-toggle="modal" title="Pembayaran Selesai"><span class="fa fa-check">Konfirmasi</span> </a>
                    
                <?php endif ?></td>
                </tr>
                <?php endforeach;?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>

        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Transaksi Hotel Website</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
              <tr>
					          <th style="text-align:center;width: 120px;vertical-align:middle;">No Invoice</th>
                    <th style="text-align:center;width: 160px;vertical-align:middle;">Tgl Transfer</th>
                    <th style="text-align:center;width: 80px;vertical-align:middle;">Total Bayar</th>
                    <th style="text-align:center;width: 80px;vertical-align:middle;">Jumlah Transfer</th>
                    <th style="text-align:center;width: 200px;vertical-align:middle;">Pengirim</th>
                    <th style="text-align:center;width:100px;">Aksi</th>
                </tr>
                <tbody>
				<?php
					$no=0;
  					foreach ($paket->result_array() as $a) : 
  				$no++;
                $id=$a['id_bayar'];
                $tgl_bayar=$a['tgl_bayar'];
                $metode=$a['metode'];
                $bank=$a['bank'];
                $invoice=$a['order_id'];
                $jml=$a['jumlah'];
                $bukti=$a['bukti_transfer'];
                $status=$a['status'];
                $pengirim=$a['pengirim'];
                $total=$a['total'];
                           
                ?>
            <tr>
                <td style="text-align: center;vertical-align:middle;"><?php echo $invoice; ?></td>
                <td style="text-align: center;vertical-align:middle;"><?php echo $tgl_bayar; ?></td>
                <td style="text-align: right;vertical-align:middle;"><b><?php echo 'Rp. '.number_format($total); ?></b></td>
                <td style="text-align: right;vertical-align:middle;"><b><?php echo 'Rp. '.number_format($jml); ?></b></td>
                <td style="text-align: center;vertical-align:middle;"><?php echo $pengirim; ?></td>
                <td style="text-align: center;vertical-align: middle;">
                    <a class="btn" href="#ModalCheckBukti<?php echo $id?>" data-toggle="modal" title="Lihat Bukti Transfer"><span class="fa fa-eye"></span> </a>
                    <a class="btn" href="#ModalHapus<?php echo $id;?>" data-toggle="modal" title="Hapus"><span class="fa fa-trash"></span> </a>
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

        <div class="col-md-12">
          <!-- MAP & BOX PANE -->
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Konfirmasi Paket Bali & Lombok</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
              <tr>
					          <th style="text-align:center;width: 120px;vertical-align:middle;">No Invoice</th>
                    <th style="text-align:center;width: 160px;vertical-align:middle;">Tgl Transfer</th>
                    <th style="text-align:center;width: 80px;vertical-align:middle;">Total Bayar</th>
                    <th style="text-align:center;width: 80px;vertical-align:middle;">Jumlah Transfer</th>
                    <th style="text-align:center;width: 200px;vertical-align:middle;">Pengirim</th>
                    <th style="text-align:center;width:100px;">Aksi</th>
                </tr>
                <tbody>
				<?php
					$no=0;
  					foreach ($paket->result_array() as $a) :
  				$no++;
                $id=$a['id_bayar'];
                $tgl_bayar=$a['tgl_bayar'];
                $metode=$a['metode'];
                $bank=$a['bank'];
                $invoice=$a['order_id'];
                $jml=$a['jumlah'];
                $bukti=$a['bukti_transfer'];
                $status=$a['status'];
                $pengirim=$a['pengirim'];
                $total=$a['total'];
                           
                ?>
            <tr>
                <td style="text-align: center;vertical-align:middle;"><?php echo $invoice; ?></td>
                <td style="text-align: center;vertical-align:middle;"><?php echo $tgl_bayar; ?></td>
                <td style="text-align: right;vertical-align:middle;"><b><?php echo 'Rp. '.number_format($total); ?></b></td>
                <td style="text-align: right;vertical-align:middle;"><b><?php echo 'Rp. '.number_format($jml); ?></b></td>
                <td style="text-align: center;vertical-align:middle;"><?php echo $pengirim; ?></td>
                <td style="text-align: center;vertical-align: middle;">
                <?php 
                    if($status=='LUNAS'):?>
                    <label class="label label-success">LUNAS</label>
                <?php else:?>
                    <a class="btn" href="#ModalCheckBukti<?php echo $id?>" data-toggle="modal" title="Lihat Bukti Transfer"><span class="fa fa-eye"></span> </a>
                    <a class="btn" href="#ModalHapus<?php echo $id;?>" data-toggle="modal" title="Hapus"><span class="fa fa-trash"></span> </a>
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
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Pengunjung bulan ini</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-8">
                   <div class="chart">
                    <!-- Sales Chart Canvas -->
                    <canvas id="salesChart" style="height: 180px;"></canvas>
                  </div>
                  <!-- /.chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-chrome"></i></span>
            <?php 
                    $query=$this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_perangkat='Chrome'");
                    $jml=$query->num_rows();
              ?>
            <div class="info-box-content">
              <span class="info-box-text">Google Chrome</span>
              <span class="info-box-number"><?php echo number_format($jml);?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                    Penggunjung
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-globe"></i></span>
            <?php 
                    $query=$this->db->query("SELECT * FROM tbl_pengunjung WHERE pengunjung_perangkat='Other' OR pengunjung_perangkat='Internet Explorer'");
                    $jml=$query->num_rows();
              ?>
            <div class="info-box-content">
              <span class="info-box-text">Lainnya</span>
              <span class="info-box-number"><?php echo number_format($jml);?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                    Pengunjung
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
         
        </div>
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-6 col-xs-6">
                <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-hourglass-o"></i></span>
             <?php 
                    $query=$this->db->query("SELECT * FROM tbl_pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(CURDATE(),'%m%y')");
                    $jml=$query->num_rows();
              ?>
            <div class="info-box-content">
              <span class="info-box-text">Pengunjung Bulan Ini</span>
              <span class="info-box-number"><?php echo number_format($jml);?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                    Pengunjung
                  </span> 
            </div>
            <!-- /.info-box-content -->
          </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-6 col-xs-6">
                <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-hourglass"></i></span>
            <?php 
                    $query=$this->db->query("SELECT * FROM tbl_pengunjung WHERE DATE_FORMAT(pengunjung_tanggal,'%m%y')=DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 MONTH),'%m%y')");
                    $jml=$query->num_rows();
              ?>
            <div class="info-box-content">
              <span class="info-box-text">Pengunjung Bulan Lalu</span>
              <span class="info-box-number"><?php echo number_format($jml);?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                    Pengunjung
                  </span>
            </div>
           
          </div>
                </div>
                <!-- /.col -->
              
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
    </section>
    
<!-- ============ MODAL EDIT ORDER =============== -->
<?php
    foreach($paket->result_array() as $a):
            $no++;
            $id=$a['id_bayar'];
            $tgl_bayar=$a['tgl_bayar'];
            $metode=$a['metode'];
            $bank=$a['bank'];
            $invoice=$a['order_id'];
            $jml=$a['jumlah'];
            $bukti=$a['bukti_transfer'];
            $status=$a['status'];
            $pengirim=$a['pengirim'];
            $total=$a['total'];
        ?>
        <div id="ModalCheckBukti<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Bukti Transfer</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/konfirmasi/pembayaran_selesai'?>">
                <div class="modal-body">
                    <input name="kode" type="hidden" value="<?php echo $invoice;?>">
                    <img height="500" src="<?php echo base_url().'assets/images/buktitrf/'.$bukti;?>">

          </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button type="submit" class="btn btn-primary">Lunas</button>
                </div>
            </form>
        </div>
        </div>
        </div>
    <?php endforeach;?>

	
	<?php foreach ($paket->result_array() as $a) :
        $id=$a['id_bayar'];
        $tgl_bayar=$a['tgl_bayar'];
        $metode=$a['metode'];
        $bank=$a['bank'];
        $invoice=$a['order_id'];
        $jml=$a['jumlah'];
        $bukti=$a['bukti_transfer'];
        $status=$a['status'];
        $pengirim=$a['pengirim'];
        $total=$a['total'];
  ?>
	<!--Modal Hapus Order-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Konfirmasi</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'backend/konfirmasi/hapus_konfirmasi'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
							       <input type="hidden" name="kode" value="<?php echo $id;?>"/> 
                            <p>Apakah Anda yakin mau menghapus konfirmasi dari <b><?php echo $pengirim;?></b>?</p>
                               
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
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datepicker/bootstrap-datepicker.js'?>"></script>
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

    $('#date_start').datepicker({
      autoclose: true
    });

     $('#end_date').datepicker({
      autoclose: true
    });

     $('#start').datepicker({
      autoclose: true
    });

     $('#end').datepicker({
      autoclose: true
    });
</script>


   
    <?php if($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Transaksi Selesai.",
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
                    text: "Transaksi telah di update",
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
                    heading: 'Selesai',
                    text: "Transaksi Berhasil, Segera Lakukan Konfirmasi.",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#1575ea'
                });
        </script>
           <?php elseif($this->session->flashdata('msg')=='mail'):?>
           <script type="text/javascript">
                $.toast({
                    heading: 'Terkirim',
                    text: "Voucher Berhasil di kirim ke email Hotel.",
                    showHideTransition: 'fade',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#004080'
                });
        </script>

         <?php elseif($this->session->flashdata('msg')=='gagal'):?>
           <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Voucher Tidak Terkirim.",
                    showHideTransition: 'fade',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#1575ea'
                });
        </script>
    <?php else:?>

    <?php endif;?>
 