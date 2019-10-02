<?php
    error_reporting(0);
    $query=$this->db->query("SELECT * FROM tbl_inbox WHERE inbox_status='1'");
    $query2=$this->db->query("SELECT * FROM orders WHERE status IS NULL");
    $query4=$this->db->query("SELECT * FROM orders WHERE status IS NULL");
    $query5=$this->db->query("SELECT * FROM tbl_valas");
    $jum_pesan=$query->num_rows();
    $jum_order=$query2->num_rows();
    $jum_konfirmasi=$query4->num_rows();
   
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
    <li class="header">MENU PINTASAN</li>
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
          <a href="<?php echo base_url().'backend/orders'?>">
            <i class="fa fa-bell"></i> <span>Pemesanan Paket</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?php echo $jum_order;?></small>
            </span>
          </a>
        </li>

      <ul class="sidebar-menu">
        <li class="header">MENU UTAMA</li>
        <li>
          <a href="<?php echo base_url().'backend/kategori'?>">
            <i class="fa fa-hashtag"></i> <span>Kategori Paket</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

         <li>
          <a href="<?php echo base_url().'backend/paket_tour'?>">
            <i class="fa fa-gift"></i> <span>Paket Tour</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li> 
          <a href="<?php echo base_url().'backend/paket_hotel'?>">
            <i class="fa fa-bed"></i> <span>Hotel</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?php echo base_url().'backend/galeri_paket'?>">
            <i class="fa fa-file-image-o"></i> <span>Gallery Paket</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

          <li>
          <a href="<?php echo base_url().'backend/intinerary'?>">
            <i class="fa fa-calendar-check-o"></i> <span>Rencana Perjalanan</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url().'backend/faq'?>">
            <i class="fa fa-question-circle"></i> <span>Syarat dan Ketentuan</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url().'backend/bank'?>">
            <i class="fa fa-bank"></i> <span>Akun Bank</span>
            <span class="pull-right-container">
            </span>
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

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
