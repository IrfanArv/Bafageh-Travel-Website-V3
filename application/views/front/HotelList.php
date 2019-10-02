<section
    class="parallax-window"
    data-parallax="scroll"
    data-image-src="<?php echo base_url(); ?>themes/img/background.jpg"
    data-natural-width="1400"
    data-natural-height="470">
    <div class="parallax-content-1">
        <div class="animated fadeInDown"></div>
    </div>
</section>
<!-- End section -->
<main>
    <div id="position">
        <div class="container">
            <ul>
                <li>
                    <a href="<?php echo base_url(); ?>">Home</a>
                </li>
                <li>Hotels</li>
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
                    <h4>Call
                        <span>Center</span></h4>
                    <a href="tel://8254159" class="phone">(0251) 8254159</a>
                    <small>Open Daily from hour 09.00 to 21.00 WIB.</small>
                </div>
            </aside>
            <!--End aside -->

            <div class="col-lg-9 col-md-9">
                <?php
                  error_reporting(0);
          					$no=0; 
          					foreach ($data->result_array() as $i) :
          					   $no++;
          					   $id_hotel=$i['id_hotel'];
                               $judul=$i['judul'];
                               $rate=$i['rate'];
          					   $destinasi=$i['destinasi'];
							   $gambar=$i['cover_hotel'];
                               $harga=$i['hj_wd'];
                               $hotel_slug=$i['hotel_slug'];
                               $deskripsi=$i['hotel_deskripsi']; 
                               $id_fasilitas=$i['id_fasilitas'];
                               $fasilitas=$i['fasilitas'];
                               $datagambar = explode (',', $fasilitas);
                               $nama=$i['fasilitas'];
                               $datanama = explode (',', $nama);
          	                    ?>
                <div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.7s">
                    <div class="row">

                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="img_list">
                                <a href="<?php echo base_url().'hotels/'.$hotel_slug;?>">
                                    <img
                                        src="<?php echo base_url().'assets/images/hotel/thumb/'.$gambar; ?>"
                                        alt="Image">
                                    <div class="short_info">
                                        <i class="icon-map"></i><?php echo $destinasi;?></div>
                                </a>
                            </div>
                        </div>
                        <div class="clearfix visible-xs-block"></div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="tour_list_desc">

                                <div class="rating">
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
                                </div>
                                <h3>
                                    <strong>
                                        <?php echo $judul;?></strong>
                                </h3>
                                <p>
                                <h3>Nearby attractions</h3>
                                <?php echo $deskripsi;?></p>

                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2">
                            <div class="price_list">
                                <div>

                                    <span class="price">
                                        <sup><?php echo 'Rp '.number_format($harga);?></sup>
                                    </span>
                                    <small>*Start From</small>
                                    <p>
                                        <a href="<?php echo base_url().'hotels/'.$hotel_slug;?>" class="btn_1">Details</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <?php endforeach;?>
                <div class="text-center">
                    <ul class="pagination">

                        <?php echo $page;?>

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