<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.css'?>"/>
<script src="<?php echo base_url().'assets/plugins/jQuery/jquery-2.2.3.min.js'?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/plugins/toast/jquery.toast.min.js'?>"></script>
	<?php if($this->session->flashdata('msg')=='info'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Success',
                    text: "Thank You for Making Payment Confirmation!",
                    showHideTransition: 'slide',
                    icon: 'success',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#7EC857'
                });
        </script>
    <?php elseif($this->session->flashdata('msg')=='error'):?>
        <script type="text/javascript">
                $.toast({
                    heading: 'Info',
                    text: "No unmatched Invoices, please check again!",
                    showHideTransition: 'slide',
                    icon: 'info',
                    hideAfter: false,
                    position: 'bottom-right',
                    bgColor: '#00C9E6'
                });
		</script>
		<?php endif;?>
<section class="parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url(); ?>themes/img/background.jpg" data-natural-width="1400" data-natural-height="470">
		<div class="parallax-content-1">
			<div class="animated fadeInDown">
			
			</div>
		</div>
	</section>
	<!-- End Section -->

	<main>
		<div id="position">
			<div class="container">
				<ul>
					<li><a href="<?php echo base_url(); ?>">Home</a>
					</li>
					<li>Confirmaation Your Order</li>
				</ul>
			</div>
		</div>
		<!-- End Position -->

		<div class="container margin_60">
			<div class="row">
				<div class="col-md-8 col-sm-8">
					<div class="form_title">
						<h3><strong><i class="icon-pencil"></i></strong>Payment Confirmation</h3>
						<p>
						Fill the data in the form below in accordance with your transfer receipt
						</p>
					</div>
					<div class="step">
							<?php
                                error_reporting(0); 
                                echo $this->session->flashdata('msg');
                            ?>
						<div id="message-contact"></div>
						<form action="<?php echo base_url().'confirmation/upload'?>" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label i class="icon-credit-card"> No. Invoice </label>
										<input  type="text" name="invoice" class="form-control" placeholder=" No. Invoice" required/>
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label i class="icon-user-1"> Name </label>
										<input type="text" name="nama" placeholder="Name Of The Sender" class="form-control" required  />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label i class="icon-home-4"> Select Bank </label>
										<select name="bank" class="form-control" required>
                                        <?php foreach ($bnk->result_array() as $i) {
                                            $id=$i['id_metode'];
                                            $mtd=$i['bank'];
                                        ?>
                                            <option value="<?php echo $id;?>"><?php echo $mtd;?></option>
                                        <?php }?>
                                        </select>	
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label i class="icon-calendar-7"> Transfer Date </label>
										<input name="tgl_bayar" class="date-pick form-control" data-date-format="D, dd M yyyy" required  />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<label i class="icon-money-2"> Transfer Amount </label>
										<input type="number" name="jumlah" placeholder="Transfer Amount" value="" min="0" class="form-control" placeholder="*Required" required/>
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
									<label i class="icon-upload-cloud"> Evidence of transfer</label> <br><span>Format : Jpg, Png, Bmp, Gif.</span>
                                    <input type="file" name="filefoto">
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
			</div>
			<!-- End row -->
		</div>
		<!-- End container -->
	</main>
	<!-- End main -->
	<!-- Specific scripts -->
	