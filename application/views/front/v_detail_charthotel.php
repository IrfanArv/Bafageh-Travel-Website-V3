<section id="hero_2">
		<div class="intro_title animated fadeInDown">
			<h1>Your Booking</h1>
			<div class="bs-wizard"> 

			<div class="col-xs-4 bs-wizard-step complete">
					<div class="text-center bs-wizard-stepnum">Identity Form</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="<?php echo base_url().'hotels/book/'.$b['id_room'];?>" class="bs-wizard-dot"></a>
				</div>

			<div class="col-xs-4 bs-wizard-step active">
					<div class="text-center bs-wizard-stepnum">Your details</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="#" class="bs-wizard-dot"></a>
				</div>

				<div class="col-xs-4 bs-wizard-step disabled">
					<div class="text-center bs-wizard-stepnum">Payment Method</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="#" class="bs-wizard-dot"></a>
				</div>

			</div>
			<!-- End bs-wizard -->
		</div>
		<!-- End intro-title -->
	</section>
	<!-- End Section hero_2 -->

	<main>
		<div id="position">
			<<div class="container">
  				<ul>
  					<li><a href="<?php echo base_url(); ?>">Home</a>
  					</li>
					<li><a href="<?php echo base_url(). 'hotels/'; ?>">Hotels</a>
  					</li>
  					<li><a href="#">Detail Hotels</a>
  					</li>
					<li><a href="#">Hotel Orders</a>
  					</li>
  					<li>Booking Details</li>
  				</ul>
  			</div>
		</div>
		<!-- End position -->

		<div class="container margin_60">
			<div class="row">
			<?php
			$no=0;
                        foreach($data->result_array() as $b):
                            $no++;
                            $id=$b['id_order'];
							$name=$b['name'];
							$email=$b['email'];
							$jenkel=$b['jenkel'];
							$notelp=$b['notelp'];
							$alamat=$b['alamat'];
							$hotel_id_order=$b['hotel_id_order'];
							$namahotel=$b['judul'];
							$alamathotel=$b['hotel_alamat'];
							$rate=$b['rate'];
							$room_order_id=$b['room_order_id'];
							$title=$b['title'];
							$hj_we=$b['hj_we'];
							$date_start=$b['date_start'];
							$end_date=$b['end_date'];
							$totaltamu=$b['totaltamu'];
							$dewasa=$b['dewasa'];
							$jml_kamar=$b['jml_kamar'];
							$jml_hari=$b['jml_hari'];
							$note=$b['keterangan'];
							$total_paid=$b['total_paid'];
							
                    ?>
				<div class="col-md-8">
					<div class="form_title">
						<h3><strong><i class="icon-tag-1"></i></strong>Billing Infomartion</h3>
					</div>
					<div class="step">
						<table class="table confirm">
							<tbody>
								<tr>
									<td>
										<strong>Full Name</strong>
									</td>
									<td>
									<?php echo $name;?>
									</td>
								</tr>
								<tr>
									<td>
										<strong>Gender</strong>
									</td>
									<td>
									<?php if($jenkel=='P'):?>
									Female
									<?php endif;?>
                                	<?php if($jenkel=='L'):?>
                                    Male
                                    <?php endif;?>
									
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
							</tbody>
						</table>
					</div>			
						<div class="form_title">
						<h3><strong><i class="icon-tag-1"></i></strong>Booking Details </h3>
					</div>
					<div class="step">
						<table class="table confirm">
							<tbody>
								<tr>
									<td>
										<strong>Room Type</strong>
									</td>
									<td>
									<?php echo $title;?>
									</td>
								</tr>
								<tr>
									<td>
										<strong>Hotel</strong>
									</td>
									<td>
									<?php echo $namahotel;?>  <?php echo $rate;?>
									</td>
									
								</tr>

								<tr>
									<td>
										
									</td>
									<td>
									<?php echo $alamathotel;?>
									</td>
									
								</tr>

								<tr>
									<td>
										<strong>Check In</strong>
									</td>
									<td>
									<?php echo date ('d M Y',strtotime ($date_start)) ?>
                                   </td>
								</tr>

								<tr>
									<td>
										<strong>Check Out</strong>
									</td>
									<td>
									<?php echo date ('d M Y',strtotime ($end_date)) ?>
                                   </td>
								</tr>

								<tr>
									<td>
										<strong>Total Of Room Night</strong>
									</td>
									<td>
									<?php echo $jml_kamar . ' Room';?>
                                   </td>
								</tr>

								<tr>
									<td>
										<strong>Number Of Night </strong>
									</td>
									<td>
									<?php echo $jml_kamar . ' Night';?>
                                   </td>
								</tr>
								
								<tr>
									<td><strong>No Of Guest</strong>
									</td>
									<td><?php echo($totaltamu). ' Person'; ?>
									</td>
								</tr>
								<tr>
									<td><strong>Price </strong>
									</td>
									<td>
									<?php echo 'Rp '.number_format($hj_we); ?>
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
										<?php echo 'Rp. '.number_format($total_paid); ?></h4>
										</td>
									</tr>
									
							</tbody>
						</table>
					</div>
				</div>
				<!-- End col-md-8 -->

				<aside class="col-md-4" id="sidebar">
         		 <p class="visible-sm visible-xs">
          						<a class="btn_map"  href="<?php echo base_url().'hotel/method/';?>" >Process</a>
          					</p>
							  <p class="hidden-sm hidden-xs">
          						<a class="btn_map"  href="<?php echo base_url().'hotel/method/';?>" >Process</a>
          					</p>
       
              <div class="box_style_1">
                <span class="tape"></span>
                <h4>Address <span><i class="icon-pin pull-right"></i></span></h4>

                <p>
                Jalan Raya Puncak KM 83 Ruko Bafageh Business Center
                </p>
              </div>
              <div class="box_style_4">
                <i class="icon_set_1_icon-57"></i>
                <h4>Book By  <span>Phone</span></h4>
                <a href="tel://8254159" class="phone">(0251) 8254159</a>
                <small>Open Daily from hour 09.00 to 21.00 WIB.</small>
              </div>
            
				</aside>

			</div>
			
			<!--End row -->
		</div>
		<?php endforeach;?>	
		<!--End container -->
	</main>
	<!-- End main -->