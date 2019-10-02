<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url().'assets/images/favicon.png'?>">
  <link rel="shorcut icon" type="text/css" href="<?php echo base_url().'assets/images/favicon.png'?>">

   	<!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,900,900italic,700italic,400italic%7CFjalla+One' rel='stylesheet' type='text/css'>

    <!-- Icon-Font -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/office/font-awesome/font-awesome/css/font-awesome.min.css" type="text/css">
    <!--[if IE 7]>
    	<link rel="stylesheet" href="font-awesome/font-awesome/css/font-awesome-ie7.min.css" type="text/css">
    <![endif]-->

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/office/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/office/masterslider/style/masterslider.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/office/styles/main.css" type="text/css">

	<title>Bafageh Office</title>

    <script type="text/javascript" src="<?php echo base_url() ?>assets/office/js/modernizr.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/office/pace/pace.min.js"></script>
</head>

<body>
	<div id="page-loader">
        <div class="loader-square loader-square-1">
        	<div class="loader-square-content">
            	<div class="loader-square-inner bg-pattern dark-screen"></div>
            </div>
        </div>
        <div class="loader-square loader-square-2">
        	<div class="loader-square-content">
            	<div class="loader-square-inner bg-pattern dark-screen"></div>
            </div>
        </div>
        <div class="loader-square loader-square-3">
        	<div class="loader-square-content">
            	<div class="loader-square-inner bg-pattern dark-screen"></div>
            </div>
        </div>
        <div class="loader-square loader-square-4">
        	<div class="loader-square-content">
            	<div class="loader-square-inner bg-pattern dark-screen"></div>
            </div>
        </div>
        <div class="loader-square loader-square-5">
        	<div class="loader-square-content">
            	<div class="loader-square-inner bg-pattern dark-screen"></div>
            </div>
        </div>
        <div class="loader-square loader-square-6">
        	<div class="loader-square-content">
            	<div class="loader-square-inner bg-pattern dark-screen"></div>
            </div>
        </div>
        <div class="loader-square loader-square-7">
        	<div class="loader-square-content">
            	<div class="loader-square-inner bg-pattern dark-screen"></div>
            </div>
        </div>
        <div class="loader-square loader-square-8">
        	<div class="loader-square-content">
            	<div class="loader-square-inner bg-pattern dark-screen"></div>
            </div>
        </div>
        <div class="loader-square loader-square-9">
        	<div class="loader-square-content">
            	<div class="loader-square-inner bg-pattern dark-screen"></div>
            </div>
        </div>
        <div class="loader-container">
        	<div class="loader-content">
            	<img class="loader-logo" alt="BAFAGEH GROUP" src="<?php echo base_url() ?>themes/img/icon.png">
            </div>
        </div><!-- .loader-container -->
        <div class="loader-footer">

        </div>
    </div><!-- #page-loader -->

	<div id="all">
    	<div id="menu">
        	<div class="menu-container">
            	<div class="menu-inner">
                    <div class="logo-container">
                        <center><h3>Currencies</h3></center>
                    </div>
                    <?php
            foreach($data->result_array() as $a):
                $gambar=$a['photo'];
                $currency=$a['currency'];
                $price=$a['price'];

        ?>
                    <nav class="main-navigation"></nav>
                            <ul class="list-catgs">
                                <li>
                                    <a href="#">

                                        <span class="list-catg-name"><img src="<?php echo base_url().'assets/images/valas/'.$gambar;?>" style="width:85px;">
                                        </span>
                                        <span class="list-catg-val"><?php echo $currency;?></span>
                                        <span class="list-catg-val"><?php echo number_format($price);?></span>

                                    </a>
                                </li>
                            </ul>
                    </nav>
                    <?php endforeach;?>
        		</div><!-- .menu-inner -->
            </div><!-- .menu-container -->
        </div><!-- #menu -->
        <div class="ms-fullscreen-template" id="slider1-wrapper">
            <div class="master-slider ms-skin-default has-thumbnails" id="masterslider">
            <?php
                    $no=0;
                        foreach($photo->result_array() as $a):
                            $no++;
                            $id=$a['id_galeri'];
                            $jdl_galeri=$a['jdl_galeri'];
                            $gambar=$a['gbr_galeri'];
                            $idalbum=$a['albumid'];
                            $jdl_album=$a['jdl_album']; 
                            $harga=$a['harga']; 
                    ?>
                <div class="ms-slide ms-slide3 text-right" data-delay="7">
                    <div class="ms-slide-pattern bg-pattern dark-screen"></div>
                    <img src="masterslider/blank.gif" data-src="<?php echo base_url().'assets/images/gallery/'.$gambar;?>" alt="lorem ipsum dolor sit">
                    <div class="ms-layer ms-layer1 ms-text-size2" data-type="text" data-effect="rotateleft(5,long,br,true)" data-duration="1500" data-ease="easeInOutQuint">
                        <div class="container">
                            <div class="row">
                                <div class="col-xxl-6">
                                    <h2 class="text-uppercase text-highlight"><?php echo $jdl_galeri;?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ms-layer ms-layer2 ms-text-size5" data-type="text" data-effect="bottom(70, true)" data-duration="2000" data-delay="1000" data-ease="easeInOutQuint">
                        <div class="container text-uppercase">
                            <div class="row">
                                <div class="col-xxl-6">
                                    <h3>
                                    <?php echo $jdl_album;?><br> 
                                        Start Form <?php echo 'Rp. '.number_format($harga);?><br>
                                        Book Here Now
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ms-thumb"><img alt="img" src="<?php echo base_url().'assets/images/gallery/'.$gambar;?>"></div>
                </div><!-- .ms-slide -->
                <?php endforeach;?>
            </div>
            <!-- end of masterslider -->
        </div><!-- .ms-fullscreen-template -->

    </div><!-- #all -->

	<script type="text/javascript" src="<?php echo base_url() ?>assets/office/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/office/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/office/masterslider/jquery.easing.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/office/masterslider/masterslider.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/office/js/jquery.nicescroll.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/office/js/custom.js"></script>
</body>
</html>
