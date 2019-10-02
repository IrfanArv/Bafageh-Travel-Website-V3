<?php
        error_reporting(0);
        $b=$data->row_array(); 
        $lat=$b['lat'];
        $lng=$b['lng'];
        $fasilitas=$b['fasilitas'];
        $data = explode (",", $fasilitas);

?>
    <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
<section class="content-header">
		
  <h1>
   Detail  Hotel
   <small>  <a class="btn btn-danger btn-flat" href="<?php echo base_url().'backend/hotel/get_edit/'.$b['id_hotel'];?>"><span class="fa fa-pencil"></span> Edit</a> 
   <a class="btn btn-info btn-flat" href="<?php echo base_url().'backend/hotel';?>"><span class="fa fa-history"></span> List Hotel</a>
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
    <li class="active">Detail Hotel</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">


          <!-- /.box -->
        

    <div class="col-md-5">
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Data Hotel</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-map-marker margin-r-5"></i> Destinasi</strong>

              <p class="text-muted">
              <?php echo $b['destinasi'];?>
              </p>
              <hr>
              <strong><i class="fa fa-bed margin-r-5"></i> Nama Hotel</strong>
              <p class="text-muted"> <?php echo $b['judul'];?></p>
              <hr>

              <strong><i class="fa fa-star margin-r-5"></i> Rate Hotel</strong>
              <p class="text-muted"> <?php echo $b['rate'];?></p>
              <hr>
              <strong><i class="fa fa-envelope-o margin-r-5"></i> Email</strong>
              <p class="text-muted"><a href="mailto:<?php echo $b['hotel_email'];?>" target="_top"><?php echo $b['hotel_email'];?></a></p>
              <hr>
              <strong><i class="fa fa-phone margin-r-5"></i> Telpon</strong>
              <p class="text-muted"> <?php echo $b['hotel_phone'];?></p>
              <hr>
              <strong><i class="fa fa-globe margin-r-5"></i> Website</strong>
              <p class="text-muted"> <?php echo $b['web'];?></p>
              <hr>
              <strong><i class="fa fa-location-arrow margin-r-5"></i> Alamat</strong>
              <p class="text-muted"> <?php echo $b['hotel_alamat'];?></p>
              <hr>
              
             
    </div>
             </div>
            <!-- /.box-body -->
          </div>

          
 
     
 


       <div class="col-md-7">
      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title"><i class="fa fa-bed margin-r-5"></i> List Ruangan</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="box-body">

<div class="table-responsive">
                <table class="table no-margin">
                
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Ruangan</th>
                    <th>Harga Weekday (J)</th>
                    <th>Harga Weekend (J)</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no=0;
                        foreach($rm->result_array() as $a):
                            $no++;
                            $id=$a['id_room'];
                            $title=$a['title'];
                            $hj_wd=$a['hj_wd'];
                            $hj_we=$a['hj_we'];
                    ?>
                  <tr>
                    <td> <?php echo $no;?> </td>
                    <td> <a href="<?php echo base_url().'backend/room/detail/'.$id;?>" target="_blank"><?php echo $title;?></a></td>
                  
                    <td><span class="label label-success"><?php echo 'Rp. ' .number_format($hj_wd);?></span></td>
                    <td><span class="label label-warning"><?php  echo 'Rp. ' .number_format($hj_we);?></span></td>
                  </tr>
                  <?php endforeach;?>
                  </tbody>
                  
                </table>
              </div>        

        </div>
      </div>
    </div>

    <div class="col-md-7">
      <div class="box box-danger">
        <div class="box-header">
          <h3 class="box-title"><i class="fa fa-map-o margin-r-5"></i> Maps</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="box-body">
        <div id="map"></div>
        </div>
      </div>
    </div>

    
    <div class="col-md-12"> 
      <div class="box box-warning">
        <div class="box-header">
          <h3 class="box-title">Gallery Hotel</h3>
          <div class="timeline-item">
            <div class="timeline-body"><br>
            <?php
                    $no=0;
                        foreach($gal->result_array() as $g):
                            $no++;
                            $id=$g['id'];
                            $nama_foto=$g['nama_foto'];
                            $slug=$g['hotel_id'];
                    ?>
 
 <a href="<?php echo base_url().'uploads/hotel/thumbs/'.$nama_foto; ?>"> <img
                                        class="img-thumbnail"
                                        width="180"
                                        height="170"
                                        src="<?php echo base_url().'uploads/hotel/thumbs/'.$nama_foto; ?>"> </a>
                         <?php endforeach;?>
          </div>
        </div>

        </div>

        <div class="box-body">
        </div>
        <!-- /.box-body -->

      </div>
    </div>
  </div>
  
  
</section>
<script>
      function initMap() {
        var uluru = {lat: <?php echo $lat;?>, lng: <?php echo $lng;?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQjEstZfASnGpOXmRNzjE2Py8fsr74_Sw&callback=initMap">
    </script>


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
                    text: "Data Hotel berhasil di update",
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
                    text: "Data Hotel Berhasil dihapus.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php else:?>

    <?php endif;?>

