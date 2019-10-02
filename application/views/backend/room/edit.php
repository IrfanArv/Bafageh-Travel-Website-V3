<?php
        $b=$data->row_array(); 
    ?>
<form action="<?php echo base_url().'backend/room/edit_room'?>" method="post" enctype="multipart/form-data">

<section class="content-header">
		
  <h1>
    Edit Room Type
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
      <a href="<?php echo base_url().'backend/backend'?>">Hotel List</a>
    </li>
    <li class="active">Edit Room Type</li>
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
            <label>Hotel</label> 
            <select class="form-control select2" style="width: 100%;" disabled>
            <option value=""><?php echo $b['judul'];?></option>
            </select>
          </div> 
          <div class="form-group">
            <label>Tipe Ruangan</label>
            <input type="hidden" name="kode" value="<?php echo $b['id_room'];?>">
            <input type="hidden" value="<?php echo $b['cover_room'];?>" name="gambar">
            <input type="text" name="title" value="<?php echo $b['title'];?>" class="form-control" placeholder="Tipe Ruangan " required>
          </div>
          <div class="form-group">
            <label>Jumlah Ruangan</label>
            <input type="number" name="stock" class="form-control" placeholder="Jumlah Ruangan">
          </div>

         <div class="row">
        <div class="col-xs-6 form-group has-warning">
        <label>Harga Modal | Weekday</label>
        <input type="number" name="hm_wd" value="<?php echo $b['hm_wd'];?>" class="form-control" placeholder="Harga Modal Weekday">
        </div>

        <div class="col-xs-6 form-group has-warning">
        <label>Harga Modal | Weekend</label>
        <input type="number" name="hm_we" value="<?php echo $b['hm_we'];?>" class="form-control" placeholder="Harga Modal Weekend">
        </div>
      </div></br>
      
      <div class="row">
        <div class="col-xs-6 form-group has-success">
        <label>Harga Jual | Weekday</label>
        <input type="number" name="hj_wd" value="<?php echo $b['hj_wd'];?>" class="form-control" placeholder="Harga Jual Weekday">
        </div>

        <div class="col-xs-6 form-group has-success">
        <label>Harga Jual | Weekend</label>
        <input type="number" name="hj_we" value="<?php echo $b['hj_we'];?>" class="form-control" placeholder="Harga Jual Weekend">
        </div>
      </div></br>
        <div class="form-group">
            <label>Diskon</label>
            <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-percent"></i>
                  </div>
            <input type="number" name="disc" class="form-control" placeholder="Diskon">
          </div>
          </div>

          <div class="form-group">
            <label>Avability Start</label>
            <input type="text" name="date_start"  data-date-format="d M yyyy" id="date_start" class="form-control" placeholder="Ketersediaan Kamar Awal" >
          </div>

          <div class="form-group">
            <label>Avability End</label>
            <input type="text" name="end_date"  data-date-format="d M yyyy" id="end_date" class="form-control"  placeholder="Ketersediaan Kamar Akhir" >
          </div>
          
          <div class="form-group">
            <label>Maks. Anak</label>
            <input type="number" name="max_children"  class="form-control" placeholder="Maks. Anak" >
          </div>
          <div class="form-group">
            <label>Maks. Dewasa</label>
            <input type="number" name="max_adults"  class="form-control" placeholder="Maks. Dewasa" >
          </div>
          <div class="form-group">
            <label>Maks. Tamu</label>
            <input type="number" name="max_people" class="form-control" placeholder="Maks. Tamu" >
          </div>
          <div class="form-group">
            <label>Min. Tamu</label>
            <input type="number" name="min_people"  class="form-control" placeholder="Min. Tamu" >
          </div>
          <div class="form-group">
            <label>Ganti Cover Hotel <span> (Sistem Akan Otomatis Resize Gambar Yang Terupload) </span></label>
            <input type="file" name="filefoto"/>
          </div>

        </div>
        <!-- /.box-body -->
      </div>

      </form>
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
          <textarea id="ckeditor" name="descr" ><?php echo $b['descr'];?></textarea>
        </div>
      </div>
    </div>
   
  </div>
</section>
</from>

<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/iCheck/icheck.min.js'?>"></script>
<script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datepicker/bootstrap-datepicker.js'?>"></script>
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

<script type="text/javascript">

 
 // source: https://github.com/edomaru/ci_dropzone/
Dropzone.autoDiscover = false;
 
 var myDropzone = new Dropzone(".dropzone", {
     url: "simpan_galleri",
     acceptedFiles: "image/*",
     maxFilesize: 2, 
     paramName:"userfile",
     dictInvalidFileType:"Type file ini tidak dizinkan",
     addRemoveLinks: true,
     // previewTemplate: document.querySelector('#preview-template').innerHTML,
     clickable: true,
  
     sending: function(a,b,c) {
         a.token     = Math.random();
         c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
     },
  
     removedfile: function(file) {
  
         var token= file.token;
  
         $.ajax({
             type: "post",
             url: "remove.php"+token,
             data:{token:token},
             dataType: 'json',
             cache:false,
         });
         // remove the thumbnail
         var previewElement;
         return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
     },
 
 init: function() {
     var me = this;
     $.get("<?php echo site_url();?>get_edit", function(data) { //alert(data);
         // if any files already in server show all here
         if (data.length > 0) {
             $.each(data, function(key, value) {
                 var mockFile = value;
                 me.emit("addedfile", mockFile);
                 me.emit("thumbnail", mockFile, "<?php echo ROOTURL; ?>/uploads/hotel/" + value.name);
                 me.emit("complete", mockFile);

                 var a = document.createElement('a');
                 a.setAttribute('href',"<?php echo ROOTURL; ?>/uploads/hotel/" + value.name);
                 a.innerHTML = "Download<b>";
                 value.previewTemplate.appendChild(a);

             });
         }
     });
 }
 });
</script>