

<form action="<?php echo base_url().'backend/hotel/simpan_hotel'?>" method="post" enctype="multipart/form-data">

<section class="content-header">
		
  <h1>
    Tambah Hotel
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
      <a href="<?php echo base_url().'backend/hotel'?>">Hotel List</a>
    </li>
    <li class="active">Tambah Hotel</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-5">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Data Hotel</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>

          </div>
        </div>
        <div class="box-body">

        <div class="form-group">
                <label>Cover<span> (Sistem Akan Otomatis Resize Gambar Yang Terupload) </span></label>
                     <input type="file" name="filefoto"  required>
            </div>

          <div class="form-group"> 
            <label>Destinasi</label> 
            <select class="form-control select2" name="destinasi_id" style="width: 100%;" required>
              <option value="">-Pilih-</option>
              <?php
					$no=0;
					foreach ($des->result_array() as $i) :
					   $no++;
                       $id_destinasi=$i['id_destinasi'];
                       $destinasi=$i['destinasi'];
                       
                    ?>
                <option value="<?php echo $id_destinasi;?>">
                  <?php echo $destinasi;?>
                </option>
                <?php endforeach;?>
            </select>
          </div> 
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="judul"class="form-control" placeholder="Nama Hotel ">
          </div>
          <div class="form-group">
            <label>Rate</label>
            <select class="form-control select2" name="rate" style="width: 100%;" required>
            <option value="">-Pilih-</option>
                      <option value="&#9733;">&#9733;</option>
                      <option value="&#9733;&#9733;">&#9733;&#9733;</option>
                      <option value="&#9733;&#9733;&#9733;">&#9733;&#9733;&#9733;</option>
                      <option value="&#9733;&#9733;&#9733;&#9733;">&#9733;&#9733;&#9733;&#9733;</option>
                      <option value="&#9733;&#9733;&#9733;&#9733;&#9733;">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
            </select>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email">
          </div>
          <div class="form-group">
            <label>Telpon</label>
            <input type="text" name="telp" class="form-control" placeholder="Phone">
          </div>
          <div class="form-group">
            <label>Website</label>
            <input type="text" name="web" class="form-control" placeholder="Website (Optional)">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat"></textarea>
          </div>
          <div class="row">

            <div class="col-xs-6">
              <label>Longtitude</label>
              <input type="text" name="lng" class="form-control" placeholder="Maps Longtitude">
            </div>
            <div class="col-xs-6">
              <label>Latitude</label>
              <input type="text" name="lat" class="form-control" placeholder="Maps Lantitude">
            </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
    </div>
    <div class="col-md-7">
      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title">Deskripsi Hotel</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>

          </div>
        </div>
        <div class="box-body">
          <textarea id="ckeditor" name="deskripsi" required></textarea>
        </div>
      </div>
    </div>

     <div class="col-md-7">
      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title">Fasilitas Hotel</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="box-body">
         
        <?php
					$no=0;
					foreach ($fas->result_array() as $q) :
					   $no++;
                       $id_fasilitas=$q['id_fasilitas'];
                       $nama=$q['nama'];
                       
                    ?>
            <b><?php echo $nama;?></b> &nbsp;
            <input type="checkbox" class="flat-red" name="fasilitas[<?php echo $id_fasilitas;?>]" value="<?php echo $id_fasilitas;?>" /> &nbsp;&nbsp;
            <?php endforeach;?>


        </div>
      </div>
    </div>
   
            


  </div> 
</section>
</from>

<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/dropzone/dropzone.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/iCheck/icheck.min.js'?>"></script>
<script src="<?php echo base_url().'assets/ckeditor/ckeditor.js'?>"></script>
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
</script>
