<form action="<?php echo base_url().'backend/room/simpan_room'?>" method="post" enctype="multipart/form-data">

<section class="content-header">
		
  <h1>
    Tambah Tipe Ruangan
    <small>
    
      <button type="submit" class="btn btn-primary btn-flat">
        <span class="fa fa-cloud-upload"></span> Simpan</button>

      
    </small>

  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="<?php echo base_url().'backend/dashboard'?>">
        <i class="fa fa-home"></i> Home</a>
    </li>
    <li>
      <a href="<?php echo base_url().'backend/room'?>">Room Type List</a>
    </li>
    <li class="active">Tambah Tipe Ruangan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-5">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Data Tipe Ruangan</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>

          </div>
        </div>
        <div class="box-body">

          <div class="form-group">
            <label>Lokasi</label> 
            <select class="form-control select2" name="destinasi_id" id="destinasi_id" style="width: 100%;" required>
              <option value="">-Pilih-</option>
              <?php
					$no=0;
					foreach ($des->result_array() as $d) :
					   $no++;
             $id_destinasi=$d['id_destinasi'];
             $destinasi=$d['destinasi'];
                       
                    ?>
                <option value="<?php echo $id_destinasi;?>">
                  <?php echo $destinasi;?>
                </option>
                <?php endforeach;?>
            </select>
          </div> 

            <div class="form-group">
            <label>Hotel</label> 
            <div id="loading">
         <center> <img src="<?php echo base_url().'assets/200.gif'?>" width="50"> <small>Loading...</small></center>
          </div>
            <select class="form-control select2" name="hotel" id="hotel" style="width: 100%;" required>
              <option value="">-Pilih-</option> 
            </select> 
           
          </div> 
          
          <div class="form-group">
            <label>Nama Ruangan</label>
            <input type="text" name="title" class="form-control" placeholder="Nama Tipe Ruangan " required>
          </div>
          <div class="form-group">
            <label>Jumlah Ruangan</label>
            <input type="number" name="stock" class="form-control" placeholder="Kosongin Dulu Aja" >
          </div>

         
      <div class="row">
        <div class="col-xs-6 form-group has-warning">
        <label>Harga Modal | Weekday</label>
        <input type="number" name="hm_wd" class="form-control" placeholder="Harga Modal Weekday" required>
        </div>

        <div class="col-xs-6 form-group has-warning">
        <label>Harga Modal | Weekend</label>
        <input type="number" name="hm_we" class="form-control" placeholder="Harga Modal Weekend" required>
        </div>
      </div></br>
      
      <div class="row">
        <div class="col-xs-6 form-group has-success">
        <label>Harga Jual | Weekday</label>
        <input type="number" name="hj_wd" class="form-control" placeholder="Harga Jual Weekday" required>
        </div>

        <div class="col-xs-6 form-group has-success">
        <label>Harga Jual | Weekend</label>
        <input type="number" name="hj_we" class="form-control" placeholder="Harga Jual Weekend" required>
        </div>
      </div></br>

        <div class="form-group">
            <label>Diskon</label>
            <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-percent"></i>
                  </div>
            <input type="number" name="disc" class="form-control" placeholder="Kosongin Dulu Aja">
          </div>
          </div>

          <div class="form-group">
            <label>Avability Start</label>
            <input type="text" name="date_start" id="date_start" class="form-control" data-date-format="d M yyyy" placeholder="Kosongin Dulu Aja" >
          </div>

          <div class="form-group">
            <label>Avability End</label>
            <input type="text" name="end_date" id="end_date" class="form-control" data-date-format="d M yyyy" placeholder="Kosongin Dulu Aja" >
          </div>

          <div class="form-group">
            <label>Maks. Anak</label>
            <input type="number" name="max_children" class="form-control" placeholder="Maks. Anak (KOSONGIN)" >
          </div>
          <div class="form-group">
            <label>Maks. Dewasa</label>
            <input type="number" name="max_adults" class="form-control" placeholder="Maks. Dewasa (KOSONGIN)" >
          </div>
          <div class="form-group">
            <label>Maks. Tamu</label>
            <input type="number" name="max_people" class="form-control" placeholder="Maks. Tamu (KOSONGIN)" >
          </div>
          <div class="form-group">
            <label>Min. Tamu</label>
            <input type="number" name="min_people" class="form-control" placeholder="Min. Tamu (KOSONGIN)" >
          </div>  

             <div class="form-group">
                <label>Cover<span> (Sistem Akan Otomatis Resize Gambar Yang Terupload) </span></label>
                     <input type="file" name="filefoto"  required>
            </div>   
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <div class="col-md-7">
      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title">Deskripsi Ruangan</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>

          </div>
        </div>
        <div class="box-body">
          <textarea id="ckeditor" name="descr"></textarea>
        </div>
      </div>
    </div>
  
    
</section>
</from>

<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/dropzone/dropzone.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/iCheck/icheck.min.js'?>"></script>
<script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datepicker/bootstrap-datepicker.js'?>"></script>


<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#loading").hide();
    
    $("#destinasi_id").change(function(){ // Ketika user mengganti atau memilih data provinsi
      $("#hotel").hide(); // Sembunyikan dulu combobox kota nya
      $("#loading").show(); // Tampilkan loadingnya
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("backend/room/listHotel"); ?>", // Isi dengan url/path file php yang dituju
        data: {destinasi_id : $("#destinasi_id").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          $("#loading").hide(); // Sembunyikan loadingnya

          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#hotel").html(response.list_hotel).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
  </script>


<script>
  $(function () {
    CKEDITOR.replace('ckeditor');
  });

  //iCheck for checkbox and radio inputs
  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass: 'iradio_minimal-blue'
  });
  //Red color scheme for iCheck
  $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
    checkboxClass: 'icheckbox_minimal-red',
    radioClass: 'iradio_minimal-red'
  });
  //Flat red color scheme for iCheck
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass: 'iradio_flat-green'
  });

  $('#date_start').datepicker({
      autoclose: true
    });

     $('#end_date').datepicker({
      autoclose: true
    });
</script>