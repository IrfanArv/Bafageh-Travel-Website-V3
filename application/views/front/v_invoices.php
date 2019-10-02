

	<section id="hero_2">
		<div class="intro_title animated fadeInDown">
		<h1>Your Booking</h1>
			<div class="bs-wizard">

				<div class="col-xs-4 bs-wizard-step complete">
					<div class="text-center bs-wizard-stepnum">Your details</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="#" class="bs-wizard-dot"></a>
				</div>

			<div class="col-xs-4 bs-wizard-step complete">
					<div class="text-center bs-wizard-stepnum">Select Payment Method</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="#" class="bs-wizard-dot"></a> 
				</div>

				<div class="col-xs-4 bs-wizard-step complete">
					<div class="text-center bs-wizard-stepnum">Finish!</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="#" class="bs-wizard-dot"></a>
				</div>
			<!-- End bs-wizard --> 
		</div>
		<!-- End intro-title -->
	</section>
	<!-- End Section hero_2 -->

	<main>
		<div id="position">
			<div class="container">
				<ul>
				<li><a href="<?php echo base_url(); ?>">Home</a>
  					</li>
					<li><a href="<?php echo base_url(). 'tour/'; ?>">Package</a>
  					</li>
  					<li><a href="#">Detail Package</a>
  					</li>
					<li><a href="#">Form Order</a>
  					</li>
					<li><a href="#">Booking Details</a>
					</li>
					<li><a href="#">Your Payment Method</a>
  					</li>
  					<li>Finish</li>
				</ul>
			</div>
		</div>
		<!-- End position -->

		<div class="container margin_60">
			<div class="row">
				<div class="col-md-8 add_bottom_15">
				<?php
						$no=0;
                        foreach($data->result_array() as $b):
                            $no++;
							$id=$b['id_order'];
							$nama=$b['nama'];
							$jenkel=$b['jenkel'];
							$email=$b['email'];
							$alamat=$b['alamat'];
							$notelp=$b['notelp'];
							
							$nama_paket=$b['nama_paket'];
							$id_hotel=$b['id_hotel'];
							$nama_hotel=$b['nama_hotel'];
							$rate=$b['rate'];
							$berangkat=$b['berangkat'];
							$adult=$b['adult'];
							
							$hrg_dewasa=$b['tober'];
							$jml_berangkat=$b['adult'];
							$note=$b['keterangan'];
							$total=$b['total'];
							
                    ?>
					<div class="form_title">
						<h3><strong><i class="icon-ok"></i></strong>Thank you!</h3>
					</div>
					<div class="step">
					<?php
                    $no=0;
                        foreach($tx1->result_array() as $t):
                            $no++;
                            $id=$t['id_faq'];
                            $isi=$t['content'];
                    ?>
						<p>
						<?php echo $isi;?></p>
						<?php endforeach;?>
					</div>
					<!--End step -->

					<div class="form_title">
						<h3><strong><i class="icon-tag-1"></i></strong>Booking summary</h3>
				
					</div>
						<div class="step">
						<table class="table confirm">
							<tbody>
								<tr>
									<td>
										<strong>Full Name</strong>
									</td>
									<td>
									<?php echo $nama;?>
									</td>
								</tr>
								<tr>
									<td>
										<strong>Gender</strong>
									</td>
									<td>
									<?php echo $jenkel;?>
                                   </td>
								</tr>
								<tr>
									<td><strong>Email</strong>
									</td>
									<td>
									<?php echo $email;?>
										<br>
									</td>
								</tr>
								<tr>
									<td><strong>Address</strong>
									</td>
									<td><?php echo $alamat;?></td>
								</tr>
								<tr>
									<td><strong>Phone</strong>
									</td>
									<td><?php echo $notelp;?></td>
								</tr>
							
					
								<tr>
									<td>
										<strong>Package</strong>
									</td>
									<td>
									<?php echo $nama_paket;?>
									</td>
								</tr>
								<tr>
									<td>
										<strong>Hotel</strong>
									</td>
									<td>
									<?php echo $nama_hotel;?>  <?php echo $rate;?>
									</td>
								</tr>
								<tr>
									<td>
										<strong>Departure</strong>
									</td>
									<td>
									<?php echo $berangkat;?>
                                   </td>
								</tr>
								<tr>
									<td><strong> Guest Depart</strong>
									</td>
									<td>
									<?php echo($adult). ' Person'; ?>
										<br>
									</td>
								</tr>
								<tr>
									<td><strong>Price per Person</strong>
									</td>
									<td><?php echo 'Rp '.number_format($hrg_dewasa); ?>
									</td>
								</tr>
								<tr>
									<td><strong>Special Request</strong>
									</td>
									<td>
									<?php echo $note;?>
									</td>
								</tr>
								
								<tr>
										<td><h4><strong>
											Grand Total
										<strong></h4></td>
										<td class="text-right"><h4>
										<?php echo 'Rp. '.number_format($total); ?></h4>
										</td>
									</tr>
							</tbody>
						</table>
					</div>
				</div>
				<?php endforeach;?>	
				<!--End col-md-8 -->

				<aside class="col-md-4">
					<div class="box_style_1">
						<h3 class="inner">Thank you!</h3>
						<?php
                   			 $no=0;
                        foreach($tx2->result_array() as $w):
                            $no++;
                            $id=$w['id_faq'];
                            $isi=$w['content']; 
                    ?>
						<p>
						<?php echo $isi;?></p>
						<?php endforeach;?>
						<hr>
                        <?php
                                foreach ($inv->result_array() as $i) :
                                    $idmetode=$i['id_metode'];                                    
                        ?>
						<a class="btn_full_outline" href="<?php echo base_url().'tour/finish/'.$idmetode;?>" target="_blank">View your invoice</a>
                        <?php endforeach ?>
                    </div>
					<div class="box_style_4">
					
						<i class="icon_set_1_icon-89"></i>
						<h4>Call <span>Center</span></h4>
<a href="tel://8254159" class="phone">(0251) 8254159</a>
<small>Open Daily from hour 09.00 to 21.00 WIB.</small>
             
				
				</aside>
					</div>
				</aside>

			</div>
			<!--End row -->
		</div>
		<!--End container -->
	</main>
	<!-- End main -->
