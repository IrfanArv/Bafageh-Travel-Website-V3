<?php
    function limit_words($string, $word_limit){
     $words = explode(" ",$string);
	return implode(" ",array_splice($words,0,$word_limit));
    }
?>
	<section class="parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url(); ?>themes/img/background.jpg" data-natural-width="1400" data-natural-height="470">
	<div class="parallax-content-1">
			<div class="animated fadeInDown">
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
					<li>Tour Package</li>
				</ul>
			</div>
		</div>
		<!-- Position -->

		<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>
		<!-- End Map -->

		<div class="container margin_60">

			<div class="row">
				<aside class="col-lg-3 col-md-3">
					<div class="box_style_2">
						<i class="icon_set_1_icon-57"></i>
						<h4>Call <span>Center</span></h4>
						<a href="tel://8254159" class="phone">(0251) 8254159</a>
						<small>Open Daily from hour 09.00 to 21.00 WIB.</small>
					
					</div>
				</aside>
				<!--End aside -->

				<div class="col-lg-9 col-md-9">
				<?php
                            foreach ($news->result_array() as $b) {
                                $idpaket=$b['paketid'];
                                $paket=$b['nama_paket'];
                                $isi=limit_words($b['deskripsi'],50);
                                $harga=$b['harga'];
								$gbr=$b['gambar'];
								$kategori=$b['kategori_id'];
								$nama=$b['kategori'];
                        ?>
					<div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.7s">
					
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-4">
								<div class="img_list">
								<a href="<?php echo base_url().'tour/details/'.$idpaket;?>"><img src="<?php echo base_url().'assets/images/paket/thumb/'.$gbr;?>"  alt="Paket">
										<div class="short_info">
										<i class="icon_set_1_icon-30"></i><?php echo $nama;?>
										<span class="price"><sup><?php echo 'Rp '.number_format($harga);?></sup></span>
										</div>
									</a>
								</div>
							</div>
							<div class="clearfix visible-xs-block"></div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="tour_list_desc">
									
									<h3><strong><?php echo $paket;?></strong></h3>
									<p><?php echo $isi;?> ...</p>
									
								</div>
							</div>
							<div class="col-lg-2 col-md-2 col-sm-2">
								<div class="price_list">
								<div><small>*Start From</small><sup><?php echo 'Rp '.number_format($harga);?></sup> <span class="normal_price_list"></span>
										<p><a href="<?php echo base_url().'tour/details/'.$idpaket;?>" class="btn_1">Details</a>
										</p>
									</div>

								</div>
							</div>
						</div>						
					</div>
					<?php
            				}
             			?>
					<!--End strip -->

					<div class="text-center">
						<ul class="pagination">
						<?php echo $pagination; ?>			
						</ul>
					</div>
					<!-- end pagination-->

				</div>
				<!-- End col lg-9 -->
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</main>
	<!-- End main -->