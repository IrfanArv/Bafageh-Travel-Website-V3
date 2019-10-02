<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
	<?php if($this->session->flashdata('msg')=='success'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Message Sent, Thank You for Contacting Us.",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#cbb258'
                });
        </script>
    <?php endif;?>


<section class="parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url(); ?>themes/img/background.jpg" data-natural-width="1400" data-natural-height="470">
		<div class="parallax-content-1">
			<div class="animated fadeInDown">
			
			</div>
		</div>
	</section>
	<main>
	
	<div id="position">
			<div class="container">
				<ul>
					<li><a href="<?php echo base_url(); ?>">Home</a>
					</li>
					<li>Contact Us</li>
				</ul>
			</div>
		</div>
		<!-- End Position -->

		<div class="container margin_60">
			<div class="row">
				<div class="col-md-8 col-sm-8">
					<div class="form_title">
					<h3><strong><i class="icon-pencil"></i></strong>Please fill out the form below</h3>
						<p>
						We will reply your message to email as soon as possible
						</p>
					</div>
					<div class="step">

						<div id="message-contact"></div>
						<form action="<?php echo base_url().'contact/kirim_pesan'?>" method="post">
							<div class="row">
								<div class="col-md-12 col-sm-6">
									<div class="form-group">
										<label>Full Name </label>
										<input type="text" class="form-control" name="xnama"  placeholder="*Required" required />
									</div>
								</div>

							</div>
							<!-- End row -->
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Email </label>
										<input type="email"  name="xemail" class="form-control" placeholder="*Required" required />
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label>Phone </label>
										<input type="text"  name="xkontak" class="form-control"   />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Your Message </label>
										<textarea rows="5"  name="xpesan" class="form-control" placeholder="*Required" style="height:200px;"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<input type="submit" value="Submit" class="btn_1" />
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- End col-md-8 -->

				<div class="col-md-4 col-sm-4">
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
				</div>
				<!-- End col-md-4 -->
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</main>
	<!-- End main -->
	