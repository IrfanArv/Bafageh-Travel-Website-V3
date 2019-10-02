<?php
    error_reporting(0);
    $query=$this->db->query("SELECT * FROM hotel_orders WHERE status IS NULL");
    $query2=$this->db->query("SELECT * FROM hotel_bookings WHERE status IS NULL");
    $query4=$this->db->query("SELECT * FROM pembayaran");
    $query5=$this->db->query("SELECT * FROM tbl_valas");
    $jum_hoteldeals=$query->num_rows();
    $jum_order=$query2->num_rows();

    $jum_konfirmasi=$query4->num_rows();
    $jum_valas=$query5->num_rows();
?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    <div class="user-panel">
    <?php
              $id_admin=$this->session->userdata('idadmin');
              $q=$this->db->query("SELECT * FROM tbl_admin WHERE idadmin='$id_admin'");
              $c=$q->row_array();
          ?>
      <div class="pull-left image">
      <img src="<?php echo base_url().'assets/images/users/'.$c['photo'];?>" class="img-circle" alt="">
      </div>
      <div class="pull-left info">
        <p><?php echo $c['nama'];?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
    <li class="header">MENU UTAMA</li>
    <li class="active">
          <a href="<?php echo base_url().'backend/dashboard'?>">
            <i class="fa fa-home"></i> <span>Beranda</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>
        <li>
        <a href="<?php echo base_url().''?>" target="_blank">
            <i class="fa fa-globe"></i> <span>Website</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url().'backend/hotel/deals'?>">
            <i class="fa fa-exchange"></i> <span>Transaksi Hotel</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url().'backend/hotel/orders'?>">
            <i class="fa fa-bell"></i> <span>Book From Web</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?php echo $jum_order;?></small>
            </span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url().'backend/hotel'?>">
            <i class="fa fa-hospital-o"></i> <span>Data Hotel</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url().'backend/room'?>">
            <i class="fa fa-bed"></i> <span>Data Ruangan</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url().'backend/hotel_fasilitas'?>">
            <i class="fa fa-bicycle"></i> <span>Fasilitas</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url().'backend/destinasi'?>">
            <i class="fa fa-plane"></i> <span>Destinasi</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url().'backoffice/logout'?>">
            <i class="fa fa-sign-out"></i> <span>Sign Out</span>
            <span class="pull-right-container">
              <small class="label pull-right"></small>
            </span>
          </a>
        </li>

      
    </section>
    <!-- /.sidebar -->
  </aside>
