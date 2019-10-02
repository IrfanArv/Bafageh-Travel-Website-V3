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
    </section>
    <!-- /.sidebar -->
  </aside>
