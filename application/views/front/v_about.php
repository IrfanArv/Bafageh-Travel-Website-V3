<section class="parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url(); ?>themes/img/background.jpg" data-natural-width="1400" data-natural-height="470">
		
	</section>
	<!-- End Section -->

	<main>
		<div id="position">
			<div class="container">
				<ul>
					<li><a href="/">Beranda</a>
					</li>
					<li>Tentang Kami</li>
				</ul>
			</div>
		</div>
		<!-- End Position -->

		<div class="container margin_60">
			<div class="main_title">
				<h2>Bafageh <span>Group. </span> </h2>
				<p>
					Money Changer, Reservasi Hotel, Reservasi Villa dan Paket Perjalanan
				</p>
			</div>
			<hr>
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<img src="<?php echo base_url(); ?>themes/img/sejarah.jpg" alt="Image" class="img-responsive styled">
				</div>
				<div class="col-md-7 col-md-offset-1 col-sm-6">
          <?php
      	foreach($sejarah->result_array() as $w):
      			$title=$w['title'];
      			$content=$w['content'];
      	?>
					<h3><?php echo $title;?></h3>
					<p align=justify>
				<?php echo $content;?>
					</p>
					<?php endforeach;?>
          <?php
          foreach($filosofi->result_array() as $w):
            $title=$w['title'];
            $content=$w['content'];
          ?>
					<h4><?php echo $title;?> </h4>
					<p align=justify>
					<?php echo $content;?>
					</p>
					<?php endforeach;?>

					<h4>Visi</h4>
					<div class="col-md-12 col-sm-6">
						<ul class="list_ok">
              <?php
          	foreach($visi->result_array() as $w):
          			$content=$w['content'];
          	?>
							<li align=justify><?php echo $content;?></li>
							<?php endforeach;?>
						</ul>
					</div>

					<h4>Misi</h4>
					<div class="col-md-12 col-sm-6">
						<ul class="list_ok">
              <?php
            foreach($misi->result_array() as $w):
                $content=$w['content'];
            ?>
							<li align=justify><?php echo $content;?></li>
							<?php endforeach;?>
						</ul>
					</div>

				</div>

			</div>
			<!-- End row -->
			<hr>
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
