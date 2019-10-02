<?php
        $b=$data->row_array(); 
    ?>
<form action="<?php echo base_url().'backend/hotel/edit_hotel'?>" method="post" enctype="multipart/form-data" >

<section class="content-header">
		
  <h1>
    Edit Data Hotel
    <small>
    
      <button type="submit" class="btn btn-primary btn-flat" id="save">
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
    <li class="active">Edit Data Hotel</li>
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
        <input type="hidden" name="id_hotel" id="hotel_id" value="<?php echo $b['id_hotel'];?>">
        <input type="hidden" value="<?php echo $b['cover_hotel'];?>" name="gambar">
        <div class="form-group">
            <label>Destinasi</label> 
            <select class="form-control select2" style="width: 100%;" disabled>
            <option value=""><?php echo $b['destinasi'];?></option>
            </select>
          </div> 
          <div class="form-group">
            <label>Nama</label>
           
            <input type="text" name="judul" value="<?php echo $b['judul'];?>" class="form-control" placeholder="Nama Hotel ">
          </div>
          <div class="form-group">
            <label>Rate</label> 
            <select class="form-control select2" style="width: 100%;" disabled>
            <option value=""><?php echo $b['rate'];?></option>
            </select>
          </div> 
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $b['hotel_email'];?>" class="form-control" placeholder="Email">
          </div>
          <div class="form-group">
            <label>Telpon</label>
            <input type="text" name="telp" value="<?php echo $b['hotel_phone'];?>" class="form-control" placeholder="Phone">
          </div>
          <div class="form-group">
            <label>Website</label>
            <input type="text" name="web" value="<?php echo $b['web'];?>" class="form-control" placeholder="Website (Optional)">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat"><?php echo $b['hotel_alamat'];?></textarea>
          </div>
          <div class="form-group">
            <label>Ganti Cover Hotel <span> (Sistem Akan Otomatis Resize Gambar Yang Terupload) </span></label>
            <input type="file" name="filefoto"/>
          </div>

          <div class="row">

            <div class="col-xs-6">
              <label>Longtitude</label>
              <input type="text" name="lng" value="<?php echo $b['lng'];?>" class="form-control" placeholder="Maps Longtitude">
            </div>
            <div class="col-xs-6">
              <label>Latitude</label>
              <input type="text" name="lat" value="<?php echo $b['lat'];?>" class="form-control" placeholder="Maps Lantitude">
            </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>

      </form>
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
          <textarea id="ckeditor" name="deskripsi" ><?php echo $b['hotel_deskripsi'];?></textarea>
        </div>
      </div>
    </div>    

      <div class="col-md-7">
      <form class="form-horizontal" method="post" action="<?php echo base_url().'backend/hotel/updategaleri/'?>" enctype="multipart/form-data">
      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title">Gallery Hotel</h3>
         
          <div class="box-tools pull-right">
          <button class="btn btn-primary btn-flat">Simpan Gallery Hotel</button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>

          </div>
        </div>
        <div class="box-body">
        <?php
                    $no=0;
                        foreach($gal->result_array() as $g):
                            $no++;
                            $id=$g['id'];
                            $nama_foto=$g['nama_foto'];
                            $slug=$g['hotel_id'];
                    ?>

                         <img class="img-thumbnail"  class="margin" src="<?php echo base_url().'uploads/hotel/thumbs/'.$nama_foto; ?> ">
                          <input type="file" name="filefoto">
                          <input type="hidden" name="id" value="<?php echo $id;?>">
                          <input type="hidden" value="<?php echo $nama_foto;?>" name="gambar">
                          
                         <?php endforeach;?>
        </div>
       
      </div>
     
      </form>
    </div> 
    
   
  </div>
</section>
</from>

<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
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