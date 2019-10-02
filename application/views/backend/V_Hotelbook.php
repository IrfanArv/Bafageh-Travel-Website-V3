	<?php 
            function limit_words($string, $word_limit){
                $words = explode(" ",$string);
                return implode(" ",array_splice($words,0,$word_limit));
            }
                
    ?>
    <section class="content-header">
      <h1>
      Hotel Deals
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'backend/dashboard'?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">  Hotel Deals</li>
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
              <table id="example1" class="table table-striped" style="font-size:13px;">
                <thead>
                <tr>
                              <th>No Order</th>
                              <th>Order Date</th>
                              <th>Guest</th>
                              <th>Hotel</th>
                              <th>Room Type</th>
                              <th>Check in</th>
                              <th>Check Out</th>
                              <th>No Of Night</th>
                              <th>Total Room</th>
                              <th>Price</th>
                              <th>Grand Total</th>
                             
                           
                    <th style="text-align:right;">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
          					$no=0;
          					foreach ($data->result_array() as $b) :
                      $no++;
                      $id=$b['id_order'];
                      $name=$b['name'];
                      $email=$b['email'];
                      $jenkel=$b['jenkel'];
                      $notelp=$b['notelp'];
                      $alamat=$b['alamat'];
                      $hotel_id_order=$b['hotel_id_order'];
                      $namahotel=$b['judul'];
                      $alamathotel=$b['hotel_alamat'];
                      $rate=$b['rate'];
                      $room_order_id=$b['room_order_id'];
                      $title=$b['title'];
                      $hj_we=$b['hj_we'];
                      $date_start=$b['date_start'];
                      $end_date=$b['end_date'];
                      $totaltamu=$b['totaltamu'];
                      $dewasa=$b['dewasa'];
                      $jml_kamar=$b['jml_kamar'];
                      $jml_hari=$b['jml_hari'];
                      $note=$b['keterangan'];
                      $total_paid=$b['total_paid'];
                      $tanggal=$b['tanggal'];
                      $status=$b['status'];
                      
          					  ?>

                <tr>
                <td style="vertical-align:middle;"><?php echo $id;?></td>
                <td style="vertical-align:middle;"><span class="label label-success"><?php echo date ('d M Y',strtotime ($tanggal)) ?></span></td>
                <td style="vertical-align:middle;"><?php echo $name;?></td>
                <td style="vertical-align:middle;"><?php echo $namahotel;?></td>
                <td style="vertical-align:middle;"><a href="<?php echo base_url().'backend/room/detail/'.$room_order_id;?>" target="_blank"><?php echo $title;?></a></td>
                <td style="vertical-align:middle;"><span class="label label-warning"><?php echo date ('d M Y',strtotime ($date_start)) ?></span></td>
                <td style="vertical-align:middle;"><span class="label label-warning"><?php echo date ('d M Y',strtotime ($end_date)) ?></span></td>
                <td style="vertical-align:middle;"><?php echo $jml_hari;?> Night</td>
                <td style="vertical-align:middle;"><?php echo $jml_kamar;?> Room</td>
                <td style="vertical-align:middle;"><span class="label label-info"><?php echo 'Rp '.number_format($hj_we);?></span></td>
                <td style="vertical-align:middle;"><span class="label label-danger"><?php echo 'Rp '.number_format($total_paid);?></span></td>
               
                  
                <td style="text-align: center;vertical-align: middle;">
                  <?php 
                    if($status=='LUNAS'):?>
                     <a class="btn btn-xs btn-success" href="#ModalVoucher<?php echo $id?>" data-toggle="modal" title="Detail Vocher">SELESAI </a>
                <?php else:?>
                    <a class="btn btn-xs btn-info" href="<?php echo base_url().'backend/hotel/pembayaran_selesai/'.$id?>" data-toggle="modal" title="Pembayaran Selesai"><span class="fa fa-check"></span> </a>
                    <a class="btn btn-xs btn-danger" href="#ModalDetail<?php echo $id?>" data-toggle="modal" title="Detail"><span class="fa fa-eye"></span> </a>
                    
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


                  <?php
          					$no=0;
          					foreach ($data->result_array() as $i) :
          					  $no++;
                      $id=$b['id_order'];
                      $name=$b['name'];
                      $email=$b['email'];
                      $jenkel=$b['jenkel'];
                      $notelp=$b['notelp'];
                      $alamat=$b['alamat'];
                      $hotel_id_order=$b['hotel_id_order'];
                      $namahotel=$b['judul'];
                      $alamathotel=$b['hotel_alamat'];
                      $rate=$b['rate'];
                      $room_order_id=$b['room_order_id'];
                      $title=$b['title'];
                      $hj_we=$b['hj_we'];
                      $date_start=$b['date_start'];
                      $end_date=$b['end_date'];
                      $totaltamu=$b['totaltamu'];
                      $dewasa=$b['dewasa'];
                      $jml_kamar=$b['jml_kamar'];
                      $jml_hari=$b['jml_hari'];
                      $note=$b['keterangan'];
                      $total_paid=$b['total_paid'];
                      $tanggal=$b['tanggal'];
                      $status=$b['status'];
                      
          					  ?>

    <div id="ModalUpdate<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
     <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel"><i class="fa fa-exchange margin-r-5"></i>Edit Transaction</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/hotel/edit'?>" enctype="multipart/form-data">
        <div class="modal-body">
        <input name="kode" type="hidden" value="<?php echo $id;?>">
          <div class="form-group">
                <label class="control-label col-xs-2" ><i class="fa fa-user margin-r-5"></i>Name Of Guest</label>
                <div class="col-xs-3">
                <input type="text" name="name"  class="form-control"  value="<?php echo $name;?>" placeholder="Name Of Guest" required>
                </div>

                <label class="control-label col-xs-2" ><i class="fa fa-calendar-check-o  margin-r-5"></i>Check In</label>
                <div class="col-xs-4">
                <input type="text" name="start" id="start" value="<?php echo date ('d M Y',strtotime ($date_start)) ?>" class="form-control" data-date-format="d M yyyy" placeholder="Check In" required>
                </div>
            </div>

              <div class="form-group">
                <label class="control-label col-xs-2" ><i class="fa fa-user margin-r-5"></i> Adult</label>
                <div class="col-xs-3">
                <input type="number" name="adult" value="<?php echo $adultamt;?>" class="form-control" placeholder="No Of adult" required>
                </div>

                <label class="control-label col-xs-2" ><i class="fa fa-calendar-check-o  margin-r-5"></i>Check Out</label>
                <div class="col-xs-4">
                <input type="text" name="end" id="end" value="<?php echo date ('d M Y',strtotime ($end_date)) ?>" class="form-control" data-date-format="d M yyyy" placeholder="Check Out" required>
                </div>
            </div>

                <div class="form-group">
                <label class="control-label col-xs-2" ><i class="fa fa-child margin-r-5"></i>Children</label>
                <div class="col-xs-3">
                <input type="number" name="kids" value="<?php echo $kids;?>" class="form-control" placeholder="*Leave if blank">
                </div>

                <label class="control-label col-xs-2" ><i class="fa fa-archive margin-r-5"></i>Total Room</label>
                <div class="col-xs-4">
                <input type="number" name="total_room"  class="form-control" value="<?php echo $jml_kamar;?>" placeholder="Total Of Room" required>
                </div>

            </div>

            <div class="form-group">
                <label class="control-label col-xs-2" ><i class="fa fa-check margin-r-5"></i>Special Request</label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="req" rows="5" cols="5"><?php echo $note;?></textarea>
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