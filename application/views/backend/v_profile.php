
<?php
        $b=$data->row_array(); 
    ?>
<!-- Main content -->
<section class="content">

<div class="row">

  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
      <img src="" class="img-circle" style="width:60px;">
        <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url().'/assets/images/users/'.$b['photo'];?>">

        <h3 class="profile-username text-center"><?php echo $b['nama'];?></h3>

        <p class="text-muted text-center">
        <?php if($b['level']=='1'):?>
                    <small>Super Administrator</small>
                  <?php elseif($b['level']=='2'):?>
                    <small>Valas Backoffice</small>
                    <?php endif;?>
                    <?php if($b['level']=='3'):?>
                    <small>Package Reservation</small>
                    <?php elseif($b['level']=='4'):?>
                    <small>Hotel Reservation</small>
                  <?php endif;?>
                  <?php if($b['level']=='5'):?>
                    <small>Chasier</small>
                    <?php endif;?>
        </p>

      </div>
      <!-- /.box-body -->
    </div>
  
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
        
      </ul>
      <div class="tab-content">
       
     <div class="active tab-pane" id="settings">
          <form class="form-horizontal"  method="post" action="<?php echo base_url().'backend/pengguna/update_profile'?>" enctype="multipart/form-data">
            <div class="form-group">
            <input type="hidden" name="kode" value="<?php echo $b['idadmin'];?>">
            <input type="hidden" value="<?php echo $b['photo'];?>" name="gambar">
              <label for="nama" class="col-sm-2 control-label">Name</label>
              <div class="col-sm-10">
                <input type="nama" name="nama" value="<?php echo $b['nama'];?>" class="form-control" id="nama" placeholder="Nama" required>
              </div>
            </div>

            <div class="form-group">
              <label for="username" class="col-sm-2 control-label">Username</label>
              <div class="col-sm-10">
                <input type="username" name="user" value="<?php echo $b['admin_username'];?>" class="form-control" id="username" placeholder="Username" required>
              </div>
            </div>

            <div class="form-group">
              <label for="password" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="password" name="pass" class="form-control" id="password" placeholder="Masukan Password lama (jika tidak diganti) | Jika diganti Masukan Password Baru" required>
              </div>
            </div>

            <div class="form-group">
              <label for="passulang" class="col-sm-2 control-label">Ulang Password</label>
              <div class="col-sm-10">
                <input type="password" name="pass2" class="form-control" id="passulang" placeholder="Ketik Ulang Password" required>
              </div>
            </div>

            <div class="form-group">
              <label for="nama" class="col-sm-2 control-label">Photo</label>
              <div class="col-sm-10">
                <input type="file"  name="filefoto" class="form-control">
              </div>
            </div>
            
           
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Submit</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

</section>


<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>

<?php if($this->session->flashdata('msg')=='error'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Error',
                    text: "Password dan Ulangi Password yang Anda masukan tidak sama.",
                    showHideTransition: 'slide',
                    icon: 'error',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#FF4859'
                });
        </script>
    
    <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Data Hotel Berhasil disimpan ke database.",
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
                    text: "Data berhasil di update",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='warning'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Gambar yang Anda masukan terlalu besar.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>