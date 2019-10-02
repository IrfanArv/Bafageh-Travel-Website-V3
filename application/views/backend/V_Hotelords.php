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
            <div class="box-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> New Transaction</a>
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
                              <th>Room Night</th>
                              <th>Price</th>
                              <th>Grand Total</th>
                              <th>Issued By</th>
                           
                    <th style="text-align:right;">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
          					$no=0;
          					foreach ($data->result_array() as $i) :
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
                       $rn=$i['rn'];
                       $con=$i['con'];
                      
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
                <td style="vertical-align:middle;"><?php echo $rn;?> R/N</td>
                <td style="vertical-align:middle;"><span class="label label-info"><?php echo 'Rp '.number_format($price);?></span></td>
                <td style="vertical-align:middle;"><span class="label label-danger"><?php echo 'Rp '.number_format($total_paid);?></span></td>
                <td style="vertical-align:middle;"><?php echo $nama;?></td>
                  
                  <td style="text-align:right;">
                  <?php 
                    if($status=='LUNAS'):?>
                     <a class="btn btn-xs btn-success" href="#ModalVoucher<?php echo $id_order?>" data-toggle="modal" title="Detail Vocher">Voucher </a>
                <?php else:?>
                    <a class="btn btn-xs btn-info" href="<?php echo base_url().'backend/hotel/done/'.$id_order?>" data-toggle="modal" title="Pembayaran Selesai"><span class="fa fa-check"></span> </a>
                    <a class="btn btn-xs btn-warning" href="#ModalUpdate<?php echo $id_order?>" data-toggle="modal" title="Edit"><span class="fa fa-pencil"></span> </a>
                <?php endif ?></td>
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
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel"><i class="fa fa-exchange margin-r-5"></i>New Transaction</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/hotel/save'?>" enctype="multipart/form-data">
        <div class="modal-body">

          <div class="form-group">
                <label class="control-label col-xs-2" ><i class="fa fa-plane margin-r-5"></i>Destination</label>
                <div class="col-xs-4">
                    <select name="destinasi_id" id="destinasi_id" class="form-control" required>
                      <option value="">-SELECT-</option>
                      <?php foreach($des->result_array() as $k):
                        $id_destinasi=$k['id_destinasi'];
                        $destinasi=$k['destinasi'];
                      ?>
                      <option value="<?php echo $id_destinasi;?>"><?php echo $destinasi;?></option>
                      <?php endforeach;?>
                    </select>
                </div>

                <label class="control-label col-xs-2" ><i class="fa fa-user margin-r-5"></i>Name Of Guest</label>
                <div class="col-xs-3">
                <input type="text" name="name"  class="form-control" placeholder="Name Of Guest" required>
                </div>

            </div>

              <div class="form-group">
                <label class="control-label col-xs-2" ><i class="fa fa-hospital-o margin-r-5"></i>Hotel</label>
                <div class="col-xs-4">
                <div id="loading">
                     <center> <img src="<?php echo base_url().'assets/200.gif'?>" width="50"> <small>Loading...</small></center>
                </div>
                    <select name="hotel" id="hotel" class="form-control" required>
                    <option value="">-SELECT-</option>
                    </select>
                </div>

                <label class="control-label col-xs-2" ><i class="fa fa-user margin-r-5"></i> Adult</label>
                <div class="col-xs-3">
                <input type="number" name="adult"  class="form-control" placeholder="No Of adult" required>
                </div>
            </div>

                <div class="form-group">
                <label class="control-label col-xs-2" ><i class="fa fa-bed margin-r-5"></i>Room</label>
                <div class="col-xs-4">
                <div id="load">
                <center> <img src="<?php echo base_url().'assets/200.gif'?>" width="50"> <small>Loading...</small></center>
                </div>
                    <select name="room" id="room" class="form-control" required>
                    <option value="">-SELECT-</option>
                    </select>
                </div>

                <label class="control-label col-xs-2" ><i class="fa fa-child margin-r-5"></i>Children</label>
                <div class="col-xs-3">
                <input type="number" name="kids"  class="form-control" placeholder="*Leave if blank">
                </div>
            </div>

        
            <div class="form-group has-error">
                <label class="control-label col-xs-2" ><i class="fa fa-calendar-check-o  margin-r-5"></i>Check In</label>
                <div class="col-xs-4"> 
                <input type="text" name="date_start" id="date_start" class="form-control" data-date-format="M yyyy" placeholder="Check In" autocomplete="off" required>
                </div>

                <label class="control-label col-xs-2" ><i class="fa fa-calendar-check-o  margin-r-5"></i>Check Out</label>
                <div class="col-xs-3">
                <input type="text" name="end_date" id="end_date" class="form-control" data-date-format="M yyyy" placeholder="Check Out" autocomplete="off" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-2" ><i class="fa fa-archive margin-r-5"></i>Total Room</label>
                <div class="col-xs-4">
                <input type="number" name="total_room"  class="form-control" placeholder="Total Of Room" required>
                </div>

                <label class="control-label col-xs-2" ><i class="fa fa-money margin-r-5"></i>Price</label>
                <div class="col-xs-3">
                <div id="proses">
                     <center> <img src="<?php echo base_url().'assets/200.gif'?>" width="50"> <small>Loading...</small></center>
                </div>
                    <select name="price" id="price" class="form-control" required>
                    <option value="">-SELECT-</option>
                    </select>
                </div>
            </div>
                   

            <div class="form-group">
                <label class="control-label col-xs-2" ><i class="fa fa-check margin-r-5"></i>Special Request</label>
                <div class="col-xs-4">
                    <textarea class="form-control" name="req" rows="5" cols="5" placeholder="(Optional)"></textarea>
                </div>

                <label class="control-label col-xs-2" ><i class="fa fa-list-ul margin-r-5"></i>Category</label>
                <div class="col-xs-3">
                <select name="kat" id="kat" class="form-control" required>
                      <option value="">-SELECT-</option>
                      <option value="breakfast">Breakfast</option>
                      <option value="no">Room Only</option>                     
                    </select>
                </div>
            </div>
            <div class="form-group has-error">
                
                <label class="control-label col-xs-2" ><i class="fa fa-check  margin-r-5"></i> Confrimed By</label>
                <div class="col-xs-3">
                <input type="text" name="con" id="con" class="form-control" placeholder="Confrimed By"  required>
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
          					foreach ($data->result_array() as $i) :
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
                       $dewasa=$i['dewasa'];
                       $anak=$i['anak'];
                       $keterangan=$i['keterangan'];
                       $kat=$i['kat'];
                       $stsmail=$i['mail_status'];
                       $rn=$i['rn'];
                       $con=$i['con'];
                      
          					  ?>

    <div id="ModalUpdate<?php echo $id_order?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
     <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel"><i class="fa fa-exchange margin-r-5"></i>Edit Transaction</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/hotel/edit'?>" enctype="multipart/form-data">
        <div class="modal-body">
        <input name="kode" type="hidden" value="<?php echo $id_order;?>">
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
                <input type="number" name="adult" value="<?php echo $dewasa;?>" class="form-control" placeholder="No Of adult" required>
                </div>

                <label class="control-label col-xs-2" ><i class="fa fa-calendar-check-o  margin-r-5"></i>Check Out</label>
                <div class="col-xs-4">
                <input type="text" name="end" id="end" value="<?php echo date ('d M Y',strtotime ($end_date)) ?>" class="form-control" data-date-format="d M yyyy" placeholder="Check Out" required>
                </div>
            </div>

                <div class="form-group">
                <label class="control-label col-xs-2" ><i class="fa fa-child margin-r-5"></i>Children</label>
                <div class="col-xs-3">
                <input type="number" name="kids" value="<?php echo $anak;?>" class="form-control" placeholder="*Leave if blank">
                </div>

                <label class="control-label col-xs-2" ><i class="fa fa-archive margin-r-5"></i>Total Room</label>
                <div class="col-xs-4">
                <input type="number" name="total_room"  class="form-control" value="<?php echo $total_room;?>" placeholder="Total Of Room" required>
                </div>

            </div>

            <div class="form-group">
                <label class="control-label col-xs-2" ><i class="fa fa-check margin-r-5"></i>Confrimed By</label>
                <div class="col-xs-3">
                <input type="text" name="con" value="<?php echo $con;?>" class="form-control" placeholder="Confrimed By">
                </div>


            </div>

            <div class="form-group">
                <label class="control-label col-xs-2" ><i class="fa fa-check margin-r-5"></i>Special Request</label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="req" rows="5" cols="5"><?php echo $keterangan;?></textarea>
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


          <?php
          					$no=0;
          					foreach ($data->result_array() as $i) :
          					   $no++;
                       $id_order=$i['id_order'];
                       $tanggal=$i['tanggal'];
                       $name=$i['name'];
                       $destinasi_id=$i['destinasi'];
                       $destinasi=$i['destinasi'];
                       $id_hotel=$i['id_hotel'];
                       $judul=$i['judul'];
                       $hotel_alamat=$i['hotel_alamat'];
                       $hotel_phone=$i['hotel_phone'];
                       $hotel_email=$i['hotel_email'];
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
                       $dewasa=$i['dewasa'];
                       $anak=$i['anak'];
                       $keterangan=$i['keterangan'];
                       $kat=$i['kat'];
                       $stsmail=$i['mail_status'];
                       $con=$i['con'];
          					  ?>

    <div id="ModalVoucher<?php echo $id_order?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
     <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel"><i class="fa fa-exchange margin-r-5"></i>Detail Transaction</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/hotel/edit'?>" enctype="multipart/form-data">
        <div class="modal-body">
        <input name="kode" type="hidden" value="<?php echo $id_order;?>">
        <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
          <img src="<?php echo base_url(); ?>themes/img/icon.png" width="50px;" height="50px;"> PT. Bafageh Tour & Travel
            <small class="pull-right">Hotel Voucher</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <address>
            <strong>PT. Bafageh Tour & Travel</strong><br>
            Jalan Raya Puncak KM 83<br>
            Ruko Bafageh Business Center<br>
            Phone : (0251) 8254159<br>
            Email : office@bafageh.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <address>
            <strong><?php echo $judul;?></strong><br>
            <?php echo $hotel_alamat;?><br>
            Phone: <?php echo $hotel_phone;?><br>
            Email: <?php echo $hotel_email;?><br>
            <strong>Confirmed By: <?php echo $con;?></strong>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>No Voucher:</b>  <?php echo $id_order;?><br>
          <b>Order Date:</b> <?php echo date ('d M Y',strtotime ($tanggal)) ?><br>
          <b>Name Of Guest:</b> <?php echo $name;?><br>
          <b>Adult:</b> <?php echo $dewasa;?> Persons<br>
          <b>Kids:</b> <?php echo $anak;?> Persons<br>
          <b>Category:</b>
          <?php if($kat=='breakfast'):?>
          Breakfast 
          <?php elseif($kat=='no'):?>
          Room Only
          <?php endif;?>
          <br> <b> Issued By :  <?php echo $nama;?></b><br>
        </div>
        
        <!-- /.col -->
      </div>
      <!-- /.row -->
     
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>Room Type</th>
              <th>Check In</th>
              <th>Check Out</th>
              <th>Total Of Room Night</th>
              <th>Number Of Night</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td><?php echo $title;?></td>
              <td><?php echo date ('d M Y',strtotime ($date_start)) ?></td>
              <td><?php echo date ('d M Y',strtotime ($end_date)) ?></td>
              <td style="vertical-align:middle;"><?php echo $total_room;?> Room</td>
              <td style="vertical-align:middle;"><?php echo $jml_hari;?> Night</td>
            </tr>
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Special Instructions:</p>
          
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          <?php echo $keterangan;?>
          </p>
        </div>
                          
        
    </section>
 </div>
             <div class="modal-footer">
             <div class="row no-print">
               <div class="col-xs-12">
               <button class="btn" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle-o"></i> Tutup</button>


                <?php 
                    if($stsmail=='1'):?>
                     <button class="btn btn-success pull-right" data-dismiss="modal" aria-hidden="true"><i class="fa fa-check"></i> Voucher Terkirim</button>
                     <a class="btn btn-warning" style="margin-right: 5px;" href="<?php echo base_url().'backend/hotel/cetak/'.$id_order?>" target="_blank" data-toggle="modal" title="Generate PDF"> <i class="fa fa-download"></i> Generate PDF </a>
                <?php else:?>
                <a class="btn btn-warning" style="margin-right: 5px;" href="<?php echo base_url().'backend/hotel/cetak/'.$id_order?>" target="_blank" data-toggle="modal" title="Generate PDF"> <i class="fa fa-download"></i> Generate PDF </a>
                <a class="btn btn-primary pull-right" style="margin-right: 5px;" href="<?php echo base_url().'backend/hotel/send/'.$id_order?>" data-toggle="modal" title="Kirim Voucher ke Email Hotel"> <i class="fa fa-share"></i> Kirim Voucher </a>
                    <?php endif;?>
                </div>
              </div>
                   
                    
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
  $(document).ready(function(){ 
    $("#loading").hide();
    
    $("#destinasi_id").change(function(){ 
      $("#hotel").hide(); 
      $("#loading").show(); 
    
      $.ajax({
        type: "POST", 
        url: "<?php echo base_url("backend/room/listHotel"); ?>", 
        data: {destinasi_id : $("#destinasi_id").val()}, 
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 
          $("#loading").hide(); 
          $("#hotel").html(response.list_hotel).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { 
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
        }
      });
    });
  });
  
  </script>



  <script>
  $(document).ready(function(){ 
    $("#load").hide();
    
    $("#hotel").change(function(){ 
      $("#room").hide(); 
      $("#load").show();
    
      $.ajax({
        type: "POST", 
        url: "<?php echo base_url("backend/room/roomList"); ?>", 
        data: {hotel : $("#hotel").val()}, 
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 
          $("#load").hide(); 

          
          $("#room").html(response.list_room).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { 
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
        }
      });
    });
  });
  </script>

  <script>
  $(document).ready(function(){ 
    $("#proses").hide();
    
    $("#room").change(function(){ 
      $("#price").hide(); 
      $("#proses").show(); 
    
      $.ajax({
        type: "POST", 
        url: "<?php echo base_url("backend/room/priceList"); ?>", 
        data: {room : $("#room").val()}, 
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 
          $("#proses").hide(); 
          $("#price").html(response.list_price).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { 
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
        }
      });
    });
  });
  
  </script>


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
      autoclose: true,
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