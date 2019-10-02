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
					<li>Result</li>
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
                $no=0;
          					foreach ($data->result_array() as $i) :
          					   $no++;
          					   $id_hotel=$i['id_hotel'];
                               $judul=$i['judul'];
                               $rate=$i['rate'];
          					   $destinasi_id=$i['destinasi_id'];
          					   $destinasi=$i['destinasi'];
                               $email=$i['hotel_email'];
                               $phone=$i['hotel_phone'];
							   $gambar=$i['cover_hotel'];
							   $hotel_slug=$i['hotel_slug'];
							   $harga=$i['harga'];
          	                    ?>
					<div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.7s">
					
                    <div class="row">

<div class="col-lg-4 col-md-4 col-sm-4">
    <div class="img_list">
        <a href="single_hotel.html">
            <img src="<?php echo base_url().'assets/images/hotel/thumb/'.$gambar; ?>" alt="Image">
            <div class="short_info"></div>
        </a>
    </div>
</div>
<div class="clearfix visible-xs-block"></div>
<div class="col-lg-6 col-md-6 col-sm-6">
    <div class="tour_list_desc">
        
        <div class="rating">
        <?php echo $rate;?>
        </div>
        <h3>
            <strong> <?php echo $judul;?></strong></h3>
        <p>Lorem ipsum dolor sit amet, quem convenire interesset ut vix, ad dicat sanctus detracto vis.
            Eos modus dolorum...</p>
        <ul class="add_info">
            <li>
                <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="Free Wifi">
                    <i class="icon_set_1_icon-86"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="Plasma TV with cable channels">
                    <i class="icon_set_2_icon-116"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="Swimming pool">
                    <i class="icon_set_2_icon-110"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="Fitness Center">
                    <i class="icon_set_2_icon-117"></i>
                </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="Restaurant">
                    <i class="icon_set_1_icon-58"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="col-lg-2 col-md-2 col-sm-2">
    <div class="price_list">
        <div>
            <sup>$</sup>89*
            <span class="normal_price_list">$99</span>
            <small>*From/Per night</small>
            <p>
                <a href="single_hotel.html" class="btn_1">Details</a>
            </p>
        </div>
    </div>
</div>

</div>
</div>
<?php endforeach;?>


</div>
<!-- End col lg-9 -->
</div>
<!-- End row -->
</div>
<!-- End container -->
</main>
<!-- End main -->