<?php
        error_reporting(0);
        $b=$data->row_array(); 
        $fasilitas=$b['facilities'];
        $data = explode (",", $fasilitas);

?>
<section class="content-header">
		
  <h1>
   Detail Room Type
   <small>  <a class="btn btn-danger btn-flat" href="<?php echo base_url().'backend/room/edit/'.$b['id_room'];?>"><span class="fa fa-pencil"></span> Edit</a> 
   <a class="btn btn-info btn-flat" href="<?php echo base_url().'backend/room';?>"><span class="fa fa-history"></span> List Room</a>
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
    <li class="active"> Detail Room Type</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">


          <!-- /.box -->
        

    <div class="col-md-5">
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Ruangan</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-location-arrow margin-r-5"></i> Destinasi</strong>
              <p class="text-muted">
              <?php echo $b['destinasi'];?>
              </p>
              <hr>

              <strong><i class="fa fa-h-square margin-r-5"></i> Hotel</strong>
              <p class="text-muted">
              <?php echo $b['judul'];?> |  <?php echo $b['rate'];?>
              </p>
              <hr>

              <strong><i class="fa fa-bed margin-r-5"></i> Nama Kamar</strong>
              <p class="text-muted"> <?php echo $b['title'];?></p>
              <hr>

               

      <div class="col-xs-6 form-group">
      <span class="label label-danger"> <strong><i class="fa fa-money margin-r-5"></i> Harga Modal | Weekday </strong></span>
              <p class="text-muted"><?php echo 'Rp '.number_format($b['hm_wd']);?>/ Malam</p>
              <hr>
      </div>
      <div class="col-xs-6 form-group">
      <span class="label label-info"> <strong><i class="fa fa-money margin-r-5"></i>Harga Modal | Weekend</strong></span>
              <p class="text-muted"><?php echo 'Rp '.number_format($b['hm_we']);?>/ Malam</p>
              <hr>
      </div>
      <div class="col-xs-6 form-group">
      <span class="label label-success"> <strong><i class="fa fa-money margin-r-5"></i> Harga Jual | Weekday </strong></span>
              <p class="text-muted"><?php echo 'Rp '.number_format($b['hj_wd']);?>/ Malam</p>
              <hr>
      </div>
      <div class="col-xs-6 form-group">
      <span class="label label-primary"> <strong><i class="fa fa-money margin-r-5"></i> Harga Jual | Weekend </strong></span>
              <p class="text-muted"><?php echo 'Rp '.number_format($b['hj_we']);?>/ Malam</p>
              <hr>
      </div>

              <strong><i class="fa fa-percent margin-r-5"></i> Diskon </strong>
              <p class="text-muted"> <?php echo $b['disc'];?> %</p>
              <hr>
              <strong><i class="fa fa-archive margin-r-5"></i> Jumlah Kamar Tersedia</strong>
              <p class="text-muted"> <?php echo $b['stock'];?> Unit</p>
              <hr>
              <strong><i class="fa fa-child margin-r-5"></i> Maks. Anak</strong>
              <p class="text-muted"> <?php echo $b['max_children'];?> Orang</p>
              <hr>
              <strong><i class="fa fa-users margin-r-5"></i> Maks. Dewasa</strong>
              <p class="text-muted"> <?php echo $b['max_adults'];?> Orang</p>
              <hr>
              <strong><i class="fa fa-users margin-r-5"></i> Maks. Tamu</strong>
              <p class="text-muted"> <?php echo $b['max_people'];?> Orang</p>
              <hr>
              <strong><i class="fa fa-user margin-r-5"></i> Min. Tamu</strong>
              <p class="text-muted"> <?php echo $b['max_people'];?> Orang</p>
              
             </div>
            <!-- /.box-body -->
          </div>
     
    </div>

    <div class="col-md-7">
      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title"><i class="fa fa-file-text-o margin-r-5"></i> Deskripsi Hotel</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="box-body">
       

<p><?php echo $b['descr'];?></p>
        </div>
      </div>
    </div>
    <div class="col-md-7">
      <div class="box box-warning">
        <div class="box-header">
          <h3 class="box-title">Gallery Hotel</h3>
          <div class="timeline-item">
            <div class="timeline-body"><br>
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
        </div>
        <div class="box-body">
        </div>
        <!-- /.box-body -->

      </div>
    </div>
  </div>
  
  </div>
</section>

<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/fullcalendar/fullcalendar.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/fullcalendar/moment.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/datetime/js/bootstrap-datetimepicker.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
<script type="text/javascript">
$(document).ready(function () {
  $('#calendar').fullCalendar({
    header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
    
    events: [{
        eventBackgroundColor: '#0c7037',
        eventColor: 'transparent',
        eventBorderColor: 'transparent',
        start: '<?php echo $b['start'];?>',
        end: '<?php echo $b['end'];?>',
        rendering: 'background'
      },
      {
        title: 'Book By <?php echo $b['name'];?>',
        start: '<?php echo $b['date_start'];?>',
        end: '<?php echo $b['end_date'];?>'
      },
     
    ]
  });
});
</script>

<?php if($this->session->flashdata('msg')=='error'):?>
    
    <?php elseif($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Data Berhasil di Simpan Ke Server Database",
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
                    text: "Data Berhasil di Update. ",
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
                    text: "Data Berhasil dihapus",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>
