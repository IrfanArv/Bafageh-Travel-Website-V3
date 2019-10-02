<?php
   
    $n=$news->row_array();
  
  
?>
	<section class="parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url().'assets/images/paket/'.$n['gambar'];?>" >
		<div class="parallax-content-2">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-8">
						<h1><?php echo $n['nama_paket'];?></h1>
						</div>
					<div class="col-md-4 col-sm-4">
						<div id="price_single_main">
							<span><sup><?php echo 'Rp'?></sup><?php echo number_format($n['harga']);?></span>
                  Start From
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
					<li><a href="<?php echo base_url(). 'tour/'; ?>">Package</a>
					</li>
					<li>Detail Package</li> 
				</ul>
			</div>
		</div>
		<!-- End Position -->

		<div class="container margin_60"> 
			<div class="row">
				<div class="col-md-8" id="single_tour_desc">
					
					<div id="Img_carousel" class="slider-pro">
					<?php
                    $no=0;
                        foreach($ptpkt->result_array() as $p):
                            $no++;
                            $id=$p['id_galket'];
                            $gambar=$p['gbr_galket'];
                    ?>
						<div class="sp-slides">
							<div class="sp-slide">
							<img alt="Image" class="sp-image" src="<?php echo base_url().'assets/images/paket/galeri_paket/'.$gambar; ?>" data-src="<?php echo base_url().'assets/images/paket/galeri_paket/'.$gambar; ?>" data-small="<?php echo base_url().'assets/images/paket/galeri_paket/'.$gambar; ?>" data-medium="<?php echo base_url().'assets/images/paket/galeri_paket/'.$gambar; ?>" data-large="<?php echo base_url().'assets/images/paket/galeri_paket/'.$gambar; ?>" data-retina="<?php echo base_url().'assets/images/paket/galeri_paket/'.$gambar; ?>">
							</div>						
						</div>
						<?php endforeach;?>

					</div>	

					<hr>

					<div class="row">
                  <div class="col-md-12"> 
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#home" data-toggle="tab">Description</a></li>
                        <li><a href="#profile" data-toggle="tab">Itinerary</a></li>
                        <li><a href="#messages" data-toggle="tab">Hotel</a></li>
                    </ul>                    
                    <div class="tab-content">
                        <div class="tab-pane" id="home">
						<h4><b><?php echo $n['nama_paket'];?></b></h4>
						<br> <?php echo $n['deskripsi'];?>
                    </div>

                    <div class="tab-pane" id="profile">
					<?php
                    $no=0;
                        foreach($int->result_array() as $i):
                            $no++;
							$id_intinerary=$i['id_intinerary'];
							$title_intinerary=$i['title_intinerary'];
                            $content_intinerary=$i['content_intinerary'];
                    ?>
					<ul class="cbp_tmtimeline">
				<li>
				
					<time class="cbp_tmtime" datetime="09:30"><span>DAY</span> <span><?php echo $no;?></span>
					</time>
					<div class="cbp_tmicon icon-calendar"></div>
					<div class="cbp_tmlabel">
						<h2><?php echo $title_intinerary;?></h2>
						<p><?php echo $content_intinerary;?>
						</p>
					</div>
						
				</li>
				<?php endforeach;?>
			</ul>
			</div>
            <div class="tab-pane" id="messages">
			<div class=" table-responsive">
                          <table class="table">
                                <thead>
                                  <tr>
                                    <th>Nama Hotel</th>
                                    <th>Rate</th>
                                    <th>Room</th>
                                    <th>2 Persons</th>
                                    <th>3-4 Persons</th>
                                    <th>5-6 Persons</th>
                                    <th>7-8 Persons</th>  
                                    <th style="text-align:center;">Book</th>           
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($htl->result_array() as $a):
                                    $no++;
                                    $id=$a['id_hotel'];
                                    $nama_hotel=$a['nama_hotel'];
                                    $room=$a['room'];
                                    $rate=$a['rate'];
                                    $harga0=$a['harga0'];
                                    $harga1=$a['harga1'];
                                    $harga2=$a['harga2'];
                                    $harga3=$a['harga3'];
                                    $paketid=$a['paketid'];
                                    $nama_paket=$a['nama_paket'];
                                    $link=$a['linkweb'];
                                ?>
                                  <tr>
                                  
                                    <td style="vertical-align:middle;"><a href="//<?php echo $link; ?>/" target="_blank"><?php echo $nama_hotel; ?></td>
                                    <td style="vertical-align:middle;"><?php echo $rate; ?></td>
                                    <td style="vertical-align:middle;"><?php echo $room; ?></td>
                                    <td style="vertical-align:middle;"><?php echo 'Rp '.number_format($harga0);?></td>
                                    <td style="vertical-align:middle;"><?php echo 'Rp '.number_format($harga1);?></td>
                                    <td style="vertical-align:middle;"><?php echo 'Rp '.number_format($harga2);?></td>
                                    <td style="vertical-align:middle;"><?php echo 'Rp '.number_format($harga3);?></td>
                                   
                                    <td style="text-align:right;"><a href="<?php echo base_url().'tour/book/'.$id;?>" class="btn_1 outline">Book</a></td>
                                  </tr>
                                  <?php endforeach;?>
                                </tbody>
                               
                              </table>
                              </div>
            </div>
            <div class="tab-pane active" id="settings">
			<h4><b><?php echo $n['nama_paket'];?></b></h4>
			<br> <?php echo $n['deskripsi'];?>
           </div>
            </div>
                          
                  </div><!-- End col-md-12-->
                  </div><!-- End row-->
					
					
				</div>
				<!--End  single_tour_desc-->

				<aside class="col-md-4" id="sidebar">
				<p class="nav nav-tabs">
          		<a class="btn_map"  href="#messages" data-toggle="tab">Select Hotel</a>
          		</p><br>
              <div class="box_style_1">
                <span class="tape"></span>
                <h4>Address <span><i class="icon-pin pull-right"></i></span></h4>

               <p>
						Jalan Raya Puncak KM 83 Ruko Bafageh Business Center
				</p>
              </div>
              <div class="box_style_4">
                <i class="icon_set_1_icon-57"></i>
                <h4>Call <span>Center</span></h4>
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
