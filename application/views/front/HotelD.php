<?php
		
        $b=$data->row_array();
        $url=base_url().'hotel/'.$b['hotel_slug'];
	    $img=$b['cover_hotel'];
	    $title=$b['judul'];
	    $rate=$b['rate'];
        $destinasi_id=$b['destinasi_id'];
        $destinasi=$b['destinasi'];
	    $deskripsi=$b['hotel_deskripsi'];
        $rate=$b['rate'];
		$alamat=$b['hotel_alamat'];
		$lat=$b['lat'];
		$lng=$b['lng'];
		$jual=$b['jual'];
		

    ?>
<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>
	<section class="parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url().'assets/images/hotel/'.$img; ?>" >
		<div class="parallax-content-2">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-8">
                    <span class="rating">
                    <?php if($rate=='★'):?>
									<i class="icon-star voted"> </i>
									<?php endif;?>
                                	<?php if($rate=='★★'):?>
                                    <i class="icon-star voted"> </i>
									<i class="icon-star voted"> </i>
                                    <?php endif;?>
                                    <?php if($rate=='★★★'):?>
									<i class="icon-star voted"> </i>
									<i class="icon-star voted"> </i>
									<i class="icon-star voted"> </i>
									<?php endif;?>
                                	<?php if($rate=='★★★★'):?>
									<i class="icon-star voted"> </i>
									<i class="icon-star voted"> </i>
									<i class="icon-star voted"> </i>
									<i class="icon-star voted"> </i>
                                    <?php endif;?>
                                    <?php if($rate=='★★★★★'):?>
									<i class="icon-star voted"> </i>
									<i class="icon-star voted"> </i>
									<i class="icon-star voted"> </i>
									<i class="icon-star voted"> </i>
									<i class="icon-star voted"> </i>
                                    <?php endif;?>
                    </span>
                    <h1><?php echo $title;?></h1>
                    <span><?php echo $alamat;?></span>
					</div>
					<div class="col-md-4 col-sm-4">
						 <div id="price_single_main" class="hotel">
                        Starting From
                        <span>
                            <sup>Rp.</sup><?php echo ''.number_format($jual);?></span>
                    </div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End section -->

	<main>
    <div id="position"> 
        <div class="container">
            <ul>
            <li><a href="<?php echo base_url(); ?>">Home</a>
					</li>
					<li><a href="<?php echo base_url(). 'hotels/'; ?>">Hotels</a>
					</li>
					<li>Detail Hotels</li> 
            </ul>
        </div>
    </div>
		<!-- End Position -->

		<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>
		<!-- End Map -->

		<div class="container margin_60">
			<div class="row">
				<div class="col-md-8" id="single_tour_desc">
					<div id="single_tour_feat">
                    <ul>
                        <?php

						$no=0; 
						foreach ($fas->result_array() as $f) :
						$no++;
						$id=$f['id_hotel'];
						
						$fasilitas_id=$f['fasilitas_id'];
						$id_fasilitas=$f['id_fasilitas'];
						$nama=$f['nama'];
						$gambar=$f['gambar'];
							?>
                        <li>
                            <img src="<?php echo base_url('uploads/fasilitas_hotel/').$gambar;?>"/>
                            <?php echo $nama;?></li>
                        <?php endforeach;?>
                    </ul>
					</div>
					<p class="visible-sm visible-xs"><a class="btn_map" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
					</p>
					<!-- Map button for tablets/mobiles -->
					<div id="Img_carousel" class="slider-pro">
                    <div class="sp-slides">
                        <?php
                    		$no=0;
                        		foreach($gal->result_array() as $g):
                            $no++;
                            $id=$g['id'];
                            $nama_foto=$g['nama_foto'];
                            $slug=$g['slug_hotel'];
                    	?>
                        <div class="sp-slide">

                            <img
                                alt="Image"
                                class="sp-image"
                                src="<?php echo base_url().'uploads/hotel/'.$nama_foto; ?>"
                                data-src="<?php echo base_url().'uploads/hotel/'.$nama_foto; ?>"
                                data-small="<?php echo base_url().'uploads/hotel/'.$nama_foto; ?>"
                                data-medium="<?php echo base_url().'uploads/hotel/'.$nama_foto; ?>"
                                data-large="<?php echo base_url().'uploads/hotel/'.$nama_foto; ?>"
                                data-retina="<?php echo base_url().'uploads/hotel/'.$nama_foto; ?>">

                        </div>
                        <?php endforeach;?>
                    </div>
                </div>

					<hr>

					<div class="row">
						<div class="col-md-3">
							<h3>Description</h3>
						</div>
						<div class="col-md-9">
							<p>
                            <?php echo $deskripsi;?>	
                            </p>
							
							
						</div>
						<!-- End col-md-9  -->
					</div>
					<!-- End row  -->

					<hr>

					<div class="row">
						<div class="col-md-3">
							<h3>Rooms Types</h3>
						</div>
						<div class="col-md-9">
						<?php

						$no=0; 
						foreach ($room->result_array() as $r) :
						$room=$r['id_room'];
						$title=$r['title'];
                        $descr=$r['descr']; 
						$harga=$r['hj_we'];
						$gambar=$r['cover_room'];
						?>

                       <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s">
						    <div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">
								
								<div class="img_list">
									<img
                                        src="<?php echo base_url('assets/images/hotel/room/thumb/').$gambar;?>"
                                        alt="Image">

										
									</a>
								</div>
							</div>
							<div class="clearfix visible-xs-block"></div>
							<div class="col-lg-5 col-md-5 col-sm-5">
								<div class="tour_list_desc">
                                <ul class="add_info">
                                <?php

$no=0; 
foreach ($roomfas->result_array() as $rf) :
$id=$rf['id'];
$room_id=$rf['room_id'];
$fasilitas_id=$rf['fasilitas_id'];
$id_fasilitas=$rf['id_fasilitas'];
$nama=$rf['nama'];
$gambar=$rf['gambar'];


?>
       <li><a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="<?php echo $nama;?>"><img src="<?php echo base_url('uploads/fasilitas_hotel/').$gambar;?>" height="30px"/></a>
										</li>
        <?php endforeach;?>
									
									</ul>
									<h3> <?php echo $title;?></h3>
									<p><?php echo $descr;?></p>
                                    <ul class="list_icons">
                              
                                </ul>
                                <div class="carousel magnific-gallery">
                        <?php

                                $no=0; 
                                foreach ($galroom->result_array() as $gl) :
                                $id=$gl['id'];  
                                $namafoto=$gl['nama_foto'];
                                $room_id=$gl['room_id'];
                                $hotel_id_gal=$gl['hotel_id_gal'];
                                $id_room=$gl['id_room'];                                                       
                                $id_hotel=$gl['id_hotel'];
                                $hotel_slug=$gl['hotel_slug'];
                                ?>
                            <div class="item">
                            
                                <a href="<?php echo base_url().'uploads/room/'.$namafoto; ?>"><img src="<?php echo base_url().'uploads/room/thumbs/'.$namafoto; ?>" alt="Image">
                                
                                </a>
                                
                            </div>
                            <?php endforeach;?>
                           
                        </div>
                       
								</div>
                                
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3">
								<div class="price_list">
									<div><sup><?php echo 'Rp '.number_format($harga);?></sup><small>*From/Per night</small>
										<p><a href="<?php echo base_url().'hotel/book/'.$room;?>" class="btn_1">Book Now</a>
										</p>
									</div>
								</div>
							</div>
						</div>
                       
					</div>
                    <?php endforeach;?>
                    </div>
              
						
						<!-- End col-md-9  -->
					</div>
					<!-- End row  -->

				</div>
				<!--End  single_tour_desc-->

				 <aside class="col-md-4">
                <p class="hidden-sm hidden-xs">
                    <a
                        class="btn_map"
                        data-toggle="collapse"
                        href="#collapseMap"
                        aria-expanded="false"
                        aria-controls="collapseMap"
                        data-text-swap="Hide map"
                        data-text-original="View on map">View on map</a>
                </p>
               
                <div class="box_style_4">
                    <i class="icon_set_1_icon-90"></i>
                    <h4>Book By
                        <span>Phone</span></h4>
                    <a href="tel://8254159" class="phone">(0251) 8254159</a>
                    <small>Open Daily from hour 09.00 to 21.00 WIB.</small>
                </div>

            </aside>
			</div>
			<!--End row -->
		</div>
		<!--End container -->
        
        <div id="overlay"></div>
		<!-- Mask on input focus -->
    
	</main>
	<!-- End main -->

	<footer class="revealed">
        <div class="container">
            
            <div class="row">
                <div class="col-md-12">
                    <div id="social_footer">
                        <<ul>
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
                </div>
            </div><!-- End row -->
        </div><!-- End container -->
    </footer><!-- End footer -->

	<div id="toTop"></div><!-- Back to top button -->
    <script>
    function initMap() {
        var uluru = {
            lat: <?php echo $lat;?>,
            lng: <?php echo $lng;?>
        };
        var map = new google
            .maps
            .Map(document.getElementById('map'), {
                zoom: 17,
                center: uluru
            });
        var marker = new google
            .maps
            .Marker({position: uluru, map: map});
    }
</script>
<script
    async="async"
    defer="defer"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQjEstZfASnGpOXmRNzjE2Py8fsr74_Sw&callback=initMap"></script>