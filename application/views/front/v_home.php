<script>
function cek(){
a=parseFloat(document.kalkulator.angka1.value);
b=parseFloat(document.kalkulator.angka2.value);

if(isNaN(a) ||isNaN(b)){
alert(“maaf, silahkan masukan angka”);
}else{
alert(“masukan anda benar”);
}
}
function tambah(){
cek();
hasil=a+b;

document.kalkulator.output.value=hasil;
}

</script>
<main>
<section class="header-video">
			<div id="hero_video">
				<div class="intro_title">
					<h3 class="animated fadeInDown">Welcome To Bafageh Tour and Travel</h3>
					<p class="animated fadeInDown">Hotel Reservation | Package Tour | Money Changer | Villa Reservation</p>
					<a href="tour/" class="animated fadeInUp button_intro">View Tours</a>
					<a href="contact/" class="animated fadeInUp button_intro outline hidden-sm hidden-xs">Esay Booking</a>
				</div>
			</div>
			<img src="" alt="Image" class="header-video--media" data-video-src="" data-teaser-source="<?php echo base_url(); ?>themes/video/opening" data-provider="Youtube" data-video-width="854" data-video-height="480">
		</section>

	<div class="container margin_60">
		<div class="row">
			<div class="col-md-8 col-sm-6 hidden-xs">
				<?php
			foreach($sambutan->result_array() as $w):
					$title=$w['title'];
					$content=$w['content'];
			?>
				<h3><span><?php echo $title;?></span></h3>
				<p><?php echo $content;?></p>
			</div>
	<?php endforeach;?>
			<aside class="col-md-4">
<center><h3>Currencies</h3></center>
					<table class="table table_summary">
            <?php
          foreach($data->result_array() as $a):
              $gambar=$a['photo'];
              $currency=$a['currency'];
              $price=$a['price'];
      ?>
						<tbody>
							<tr>
								<td>
								<img src="<?php echo base_url().'assets/images/valas/'.$gambar;?>" style="width:35px;">
								</td>
								<td>
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp; <?php echo $currency;?>
								</td>
								<td>
								<?php echo $price;?>
								</td>
							</tr>
						</tbody>
					<?php endforeach;?>
					</table>
<small>Last Update On:
  <?php
     foreach ($tgl_update->result_array() as $t):
     $up=$t['updated'];
    ?>

        <?php echo date ('l, d m Y, H:i:s',strtotime ($up)) ?> WIB

</small>
  <?php endforeach;?>
			</aside>
		</div>
		</div>

		<div class="container margin_60">
		<div class="main_title">
				<h2>Popular <span>Tours</span> </h2>
				
			</div>

			<div class="row"> 
			<?php
                            foreach ($news->result_array() as $b) {
                                $idpaket=$b['paketid'];
                                $paket=$b['nama_paket'];
                               
                                $harga=$b['harga'];
                                $gbr=$b['gambar'];
                        ?>
				<div class="col-md-4 col-sm-6 wow zoomIn" data-wow-delay="0.1s">
				
					<div class="tour_container">
						<div class="ribbon_3 popular"><span>Popular</span></div>
						<div class="img_container">
						<a href="<?php echo base_url().'tour/details/'.$idpaket;?>" />
							<img src="<?php echo base_url().'assets/images/paket/'.$gbr;?>" class="img-responsive" alt="image">
								<div class="short_info">
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								&nbsp&nbsp
								Start From <span class="price"><sup><?php echo 'Rp '.number_format($harga);?></sup></span>
								</div>
							</a>
						</div>
						<div class="tour_title">
							<h3><strong><?php echo $paket;?></strong> </h3>
							
							<!-- End wish list-->
						</div>
					</div>
					<!-- End box tour -->
					
				</div>
				<?php
            				}
             			?>
				<!-- End col-md-4 -->
			</div>
			</div>
			<!-- End row -->

			<div class="row">
			<div class="banner colored">
				<div class="main_title">
				<h4>Prestasi & Keunggulan</h4>
			</div>
				<div class="general_icons">
					<ul>
						<?php
		              foreach($prestasi->result_array() as $p):
		                  $icon=$p['icon'];
		                  $title=$p['title'];

		          ?>
						<li><i class="<?php echo $icon;?>"></i><?php echo $title;?></li>
					 <?php endforeach;?>
					</ul>
				</div>
			</div>
		</div>
			<div class="container margin_60">
			<div class="main_title">
				<h2>Produk <span>& </span>Jasa</h2>
				<p>Kami perusahaan yang bergerak di  bidang jasa pelayanan pariwisata yang menyediakan pelayanan.</p>
			</div>

			<div class="row">
        <?php
              foreach($product->result_array() as $a):
                  $icon=$a['icon'];
                  $title=$a['title'];
                  $content=$a['content'];
          ?>
				<div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
					<div class="feature">
						<i class="<?php echo $icon;?>"></i>
						<h3><span><?php echo $title;?></span></h3>
						<p><?php echo $content;?></p>
					</div>
				</div>
				 <?php endforeach;?>
				
				</div>
				
				
		</div>
</main>
<!-- End main -->
