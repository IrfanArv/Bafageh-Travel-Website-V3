<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Tour and Travel, Travel, Money Changer, Paket Bali Murah, Paket Lombok Murah, Destinasi Bali, Destinasi Lombok, Hotel Jakarta, Hotel Bandung, Hotel Lombok, Hotel Bali.">
    <title>Bafageh Tour and Travel - Package Bali and Lombok</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>themes/img/icon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Gochi+Hand|Lato:300,400|Montserrat:400,400i,700,700i" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css">
  
    <link href="<?php echo base_url(); ?>themes/css/base.css" rel="stylesheet">

	<link href="<?php echo base_url(); ?>themes/css/timeline.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>themes/css/admin.css" rel="stylesheet">

    <!-- HOME PAGE CSS -->
    <link href="<?php echo base_url(); ?>themes/css/grey.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>themes/css/date_time_picker.css" rel="stylesheet">   

    <!-- HOTEL PAGE CSS -->
    <link href="<?php echo base_url(); ?>themes/css/slider-pro.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>themes/css/owl.carousel.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>themes/css/owl.theme.css" rel="stylesheet">
 
	

</head>

<body>
    <div id="preloader">
        <div class="sk-spinner sk-spinner-wave">
            <div class="sk-rect1"></div>
            <div class="sk-rect2"></div>
            <div class="sk-rect3"></div>
            <div class="sk-rect4"></div>
            <div class="sk-rect5"></div>
        </div>
    </div>
   
    <?php echo $_header; ?>
					
    <?php echo $_content; ?>
    </div>
		<!-- End container -->
	</main>

<footer class="revealed">
    
           
            
                
                    <div id="social_footer">
                    <ul>
						<li><a href="#"><i class="icon-facebook"></i></a>
						</li>
						<li><a href="#"><i class="icon-twitter"></i></a>
						</li>
						<li><a href="#"><i class="icon-google"></i></a>
						</li>
						<li><a href="//www.instagram.com/bafagehtourand/" target=_blank><i class="icon-instagram"></i></a>
						</li>
						<li><a href="#"><i class="icon-youtube-play"></i></a>
						</li>
					</ul>
					<p><?php echo "Copyright © " . (int)date('Y') . " <a> Bafageh Group </a>"; ?></p>
				
                    </div>
                
           
       
    </footer><!-- End footer -->

	<div id="toTop"></div><!-- Back to top button -->

 <!-- Common scripts -->
    <script src="<?php echo base_url(); ?>themes/js/jquery-2.2.4.min.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/common_scripts_min.js"></script>
    <script src="<?php echo base_url(); ?>themes/js/functions.js"></script>

 <!-- Specific scripts -->

 <script src="<?php echo base_url(); ?>themes/js/jquery.sliderPro.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function ($) {
			$('#Img_carousel').sliderPro({
				width: 960,
				height: 500,
				fade: true,
				arrows: true,
				buttons: false,
				fullScreen: false,
				smallSize: 500,
				startSlide: 0,
				mediumSize: 1000,
				largeSize: 3000,
				thumbnailArrows: true,
				autoplay: false
			});
		});
	</script>

    <script src="<?php echo base_url(); ?>themes/js/owl.carousel.min.js"></script>
	<script>
		$(document).ready(function () {
			$(".carousel").owlCarousel({
				items: 4,
				itemsDesktop: [1199, 3],
				itemsDesktopSmall: [979, 3]
			});
		});
	</script>

<script src="<?php echo base_url(); ?>themes/js/icheck.js"></script>
<script>
$('input').iCheck({
   checkboxClass: 'icheckbox_square-grey',
   radioClass: 'iradio_square-grey'
 });
 </script>
  <script src="<?php echo base_url(); ?>themes/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo base_url(); ?>themes/js/bootstrap-timepicker.js"></script>
 <script>
  $('input.date-pick').datepicker('setDate', 'today');
  $('input.time-pick').timepicker({
    minuteStep: 15,
    showInpunts: false
})
  </script>
  <script src="<?php echo base_url(); ?>themes/js/jquery.ddslick.js"></script>
   <script>
   $("select.ddslick").each(function(){
            $(this).ddslick({
                showSelectedHTML: true 
            });
        });
        </script>
  </body>
</html>
