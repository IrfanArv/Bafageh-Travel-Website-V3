<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content--> 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Terms and Conditions</h4>
      </div>
      <?php
                    $no=0;
                        foreach($bayar->result_array() as $f):
                            $no++;
                            $id=$f['id_faq'];
                            $isi=$f['content'];
                    ?>
      <div class="modal-body">
        <p>
        <?php echo $isi;?>
        </p>
      </div>
      <?php endforeach;?>			
      <div class="modal-footer">		
        <button type="button" class="btn_1" data-dismiss="modal">I Agree</button>
        <a href="<?php echo base_url(); ?>" class="btn btn-default">Cancel</a>
      </div>
    </div>
  </div>
</div>
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

			<div class="col-xs-4 bs-wizard-step active">
					<div class="text-center bs-wizard-stepnum">Select Payment Method</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="#" class="bs-wizard-dot"></a> 
				</div>

				<div class="col-xs-4 bs-wizard-step disabled">
					<div class="text-center bs-wizard-stepnum">Finish!</div>
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
			<div class="container">
				<ul>
				<li><a href="<?php echo base_url(); ?>">Home</a>
  					</li>
					<li><a href="<?php echo base_url(). 'hotels/'; ?>">Hotels</a>
  					</li>
  					<li><a href="#">Detail Hotels</a>
  					</li>
					<li><a href="#">Form Order</a>
  					</li>
					<li><a href="#">Booking Details</a>
  					</li>
  					<li>Your Payment Method</li>
				</ul>
			</div>
		</div>
		<!-- End position -->

		<div class="container margin_60">
			<div class="row">
				<div class="col-md-12">
				<div class="content">

	<div class="strip_booking">
							<?php
                                foreach ($data->result_array() as $i) :
                                    $idmetode=$i['id_metode'];
                                    $metode=$i['metode'];
									$bank=$i['bank'];
									$gambar=$i['logo'];
                                    
                            ?>
		<div class="row">
			<div class="col-md-2 col-sm-2">
			<td><img  src="<?php echo base_url().'assets/images/bank/'.$gambar; ?>"></td>
			</div>
			<div class="col-md-2 col-sm-3">
			</div>
			<div class="col-md-6 col-sm-6">
				<h3><?php echo $bank;?><span><?php echo $metode;?></span></h3>
			</div>
			
			<div class="col-md-2 col-sm-2">
				<div class="booking_buttons">
					<a href="<?php echo base_url().'hotel/payment/'.$idmetode;?>" class="btn_1">Select</a>
				</div>
			</div>
		</div>
		<hr>
		<?php endforeach ?>
		<!-- End row -->
	</div>
	<!-- End strip booking -->

</div>
</div>
<script src="<?php echo base_url(); ?>themes/js/jquery-2.2.4.min.js"></script>
<script type="text/javascript">
	 $(window).load(function(){        
   $('#myModal').modal('show');
    }); 
</script>
			</div>
			<!--End row -->
		</div>
		<!--End container -->
	</main>
	<!-- End main -->