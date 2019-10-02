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
        <a href="<?php echo base_url().'office'?>" target="_blank">
            <i class="fa fa-tv"></i> <span>Office Screen</span>
          </a>
        </li>


      <ul class="sidebar-menu">
        <li class="header">MENU UTAMA</li>
        <li>

          <a href="<?php echo base_url().'backend/valas'?>">
            <i class="fa fa-money"></i> <span>Valas</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green"><?php echo $jum_valas;?></small>
            </span>
          </a>
        </li>

           <li class="treeview">
          <a href="#">
            <i class="fa fa-h-square"></i>
            <span>Hotel Manajemen</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?php echo base_url().'backend/hotel'?>"><i class="fa fa-hospital-o"></i> Hotel</a></li>
          <li><a href="<?php echo base_url().'backend/room'?>"><i class="fa fa-bed"></i> Room Type</a></li>   
          <li><a href="<?php echo base_url().'backend/hotel/deals'?>"><i class="fa fa-exchange"></i> Hotel Deals
          <span class="pull-right-container">
              <small class="label pull-right bg-red"><?php echo $jum_hoteldeals;?></small>
            </span>
          </a></li>
          <li><a href="<?php echo base_url().'backend/hotel/orders'?>"><i class="fa fa-book"></i> Book From Web
          <span class="pull-right-container">
              <small class="label pull-right bg-red"><?php echo $jum_order;?></small>
            </span>
          </a></li>         
         </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-bus"></i>
            <span>Paket Tour</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?php echo base_url().'backend/paket_tour'?>"><i class="fa fa-gift"></i> Paket Tour</a></li>
            <li><a href="<?php echo base_url().'backend/paket_hotel'?>"><i class="fa fa-bed"></i> Hotel</a></li>
            <li><a href="<?php echo base_url().'backend/galeri_paket'?>"><i class="fa fa-file-image-o"></i> Galeri Paket</a></li>
            <li><a href="<?php echo base_url().'backend/intinerary'?>"><i class="fa fa-calendar-check-o"></i> Rencana Perjalanan</a></li>
            
           
            <li>
          <a href="<?php echo base_url().'backend/orders'?>">
            <i class="fa fa-bell"></i> <span>Orders</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?php echo $jum_order;?></small>
            </span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url().'backend/konfirmasi'?>">
            <i class="fa fa-check"></i> <span>Konfirmasi</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red"><?php echo $jum_konfirmasi;?></small>
            </span>
          </a>
        </li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-building-o"></i>
            <span>Company Profile</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?php echo base_url().'backend/compro'?>"><i class="fa fa-briefcase"></i> Bafageh Profile</a></li>
          <li><a href="<?php echo base_url().'backend/visi'?>"><i class="fa fa-life-ring"></i> Visi</a></li>
          <li><a href="<?php echo base_url().'backend/misi'?>"><i class="fa fa-line-chart"></i> Misi</a></li>
          <li><a href="<?php echo base_url().'backend/product'?>"><i class="fa fa-ticket"></i> Produk</a></li>
          <li><a href="<?php echo base_url().'backend/prestasi'?>"><i class="fa fa-trophy"></i> Prestasi & Keunggulan</a></li>
          <li><a href="<?php echo base_url().'backend/fasilitas'?>"><i class="fa fa-coffee"></i> Pelayanan & Fasilitas</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil"></i>
            <span>Publikasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?php echo base_url().'backend/wisata'?>"><i class="fa fa-map-signs"></i> Info Wisata</a></li>
          <li>
          <a href="<?php echo base_url().'backend/testimonial'?>">
            <i class="fa fa-comment"></i> <span> Testimonial</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow"><?php echo $jum_testimoni;?></small>
            </span>
          </a>
        </li>
          </ul>
        </li>





        <li class="treeview">
          <a href="#">
            <i class="fa fa-file-image-o"></i>
            <span>Gallery Villa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url().'backend/album'?>"><i class="fa fa-university"></i> Villa</a></li>
            <li><a href="<?php echo base_url().'backend/galeri'?>"><i class="fa fa-building-o"></i> Tipe Villa</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Pengaturan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

          <li class="treeview">
          <a href="#">
            <i class="fa fa-bed"></i>
            <span>Hotel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="<?php echo base_url().'backend/destinasi'?>"><i class="fa fa-plane"></i> Destinasi</a></li>
          <li><a href="<?php echo base_url().'backend/hotel_fasilitas'?>"><i class="fa fa-bicycle"></i> Fasilitas Hotel</a></li>
          </ul>
        </li>

           <li class="treeview">
          <a href="#">
            <i class="fa fa-bus"></i>
            <span>Travel Paket</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

          <li><a href="<?php echo base_url().'backend/kategori'?>"><i class="fa fa-hashtag"></i> Kategori Paket</a></li>
          <li><a href="<?php echo base_url().'backend/faq'?>"><i class="fa fa-question-circle"></i> Syarat dan Ketentuan</a></li>

          </ul>
        </li>

          <li><a href="<?php echo base_url().'backend/pengguna'?>"><i class="fa fa-users"></i> Pengguna</a></li>
          <li><a href="<?php echo base_url().'backend/bank'?>"><i class="fa fa-bank"></i> Akun Bank</a></li>
          </ul>
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
