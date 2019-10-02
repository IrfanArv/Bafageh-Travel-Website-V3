
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

      <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-bell"></i></span>
            <?php 
                    $query=$this->db->query("SELECT * FROM orders WHERE status IS NULL");
                    $jml=$query->num_rows();
              ?>
            <div class="info-box-content">
              <span class="info-box-text">New Orders</span>
              <span class="info-box-number"><?php echo $jml;?></span> 
              <span class="info-box-text"><a href="<?php echo base_url().'backend/orders'?>"> Lihat</span></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        

               <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-hashtag"></i></span>
              <?php 
                  $query=$this->db->query("SELECT * FROM kategori_paket");
                  $jml=$query->num_rows();
              ?>
            <div class="info-box-content">
              <span class="info-box-text">Kategori Paket</span>
              <span class="info-box-number"><?php echo $jml;?></span>
              <span class="info-box-text"><a href="<?php echo base_url().'backend/kategori'?>"> Lihat</span></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-envelope"></i></span>
              <?php 
                    $query=$this->db->query("SELECT * FROM tbl_inbox");
                    $jml=$query->num_rows();
              ?>
            <div class="info-box-content">
              <span class="info-box-text">Semua Pesan</span>
              <span class="info-box-number"><?php echo $jml;?> </span>
              <span class="info-box-text"><a href="<?php echo base_url().'backend/inbox'?>"> Lihat</span></a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Currency Exchange</h3>

              <table class="table">
              <?php 
                  $query=$this->db->query("SELECT * FROM tbl_valas ORDER BY id ASC");
                  foreach ($query->result_array() as $a) :
                    $id=$a['id'];
                    $gambar=$a['photo'];
                    $currency=$a['currency'];
                    $price=$a['price'];
              ?>

                  <tr>
                    <td><img src="<?php echo base_url().'assets/images/valas/'.$gambar;?>" style="width:50px;"></td>
                    <td><?php echo $currency;?></td>
                    <td><?php echo 'Rp '.number_format($price);?></td>
                  </tr>
              <?php endforeach;?>
              </table>
              
            </div>
            
            <!-- /.box-body -->
          </div>
          
          <!-- /.box -->
          
          <!-- /.box -->
        </div>
     
        <div class="col-md-4">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Paket</h3>
             
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
                 
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                <?php 
                  $query=$this->db->query("SELECT * FROM paket");
                 $no=0;
                  foreach ($query->result_array() as $b) :
                    $id=$b['idpaket'];
                    $gambar=$b['gambar'];
                    $nama=$b['nama_paket'];
                    $jml=$b['jml'];
              ?>
                  <tr>
                    <td><img src="<?php echo base_url().'assets/images/paket/'.$gambar;?>" style="width:80px;"></td>
                    <td><?php echo $nama;?></td>
                    <td><span class="label label-success"><?php echo $jml;?> Hotel</span></td>
                    <?php endforeach;?>
                  </tr>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
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
 