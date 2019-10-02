<?php
   
    $b=$htl->row_array();
?>
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
                        foreach($syarat->result_array() as $f):
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

				<div class="col-xs-4 bs-wizard-step active">
					<div class="text-center bs-wizard-stepnum">Identity Form</div>
					<div class="progress">
						<div class="progress-bar"></div>
					</div>
					<a href="<?php echo base_url().'paket_tour/detail_paket/'.$b['paketid'];?>" class="bs-wizard-dot"></a>
				</div>

				<div class="col-xs-4 bs-wizard-step disabled">
					<div class="text-center bs-wizard-stepnum">Booking Details</div>
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
  <main>
  		<div id="position">
  			<div class="container">
  				<ul>
  					<li><a href="<?php echo base_url(); ?>">Home</a>
  					</li>
						<li><a href="<?php echo base_url(). 'tour/'; ?>">Package</a>
  					</li>
  					<li><a href="<?php echo base_url().'tour/details/'.$b['paketid'];?>">Detail Package</a>
  					</li>
  					<li>Form Order</li>
  				</ul>
  			</div>
  		</div>
  		<!-- End position -->

  		<div class="container margin_60">
  			<div class="row">
  				<div class="col-md-8 add_bottom_15">
            <form action="<?php echo base_url().'tour/order'?>" method="post">
  					<div class="form_title">
  						<h3><strong>1</strong>Your Identity </h3>
  						<p>
  							Input Identity 
  						</p>
  					</div>
  					<div class="step">
  						<div class="row">
  							<div class="col-md-6 col-sm-6">
  								<div class="form-group">
                    <label for="firstname"><i class="fa fa-user"></i> Full Name</label>
                    <input id="firstname" type="text" name="nama" type="text" class="form-control" placeholder="*Required" required/></div>
  							</div>
  							<div class="col-md-6 col-sm-6">
  								<div class="form-group">
                    <label for="email"><i class="icon-mail-alt"></i> Email</label>
                    <input id="email" type="email" name="email" class="form-control" placeholder="*Required" required>
                  </div>
  							</div>
  						</div>
  						<div class="row">
  							<div class="col-md-6 col-sm-6">
  								<div class="form-group">
                    <label for="payment"><i class="icon-person"></i> Gender</label>
                    <select id="payment" class="form-control" name="jenkel" required>
                        <option value="L">Male</option>
                        <option value="P">Female</option>
                    </select>
                  </div>
  							</div>
  							<div class="col-md-6 col-sm-6">
  								<div class="form-group">
                    <label for="phone"><i class="icon-phone-circled"></i> Phone</label>
                    <input id="phone" type="text" name="notelp" class="form-control" placeholder="*Required" required>
                  </div>
  							</div>
  						</div>
  						<div class="row">
  							<div class="col-md-12 col-sm-6">
  								<div class="form-group">
                    <label for="address" id="address-label"><i class="icon-address-1s"></i> Address</label>
                    <textarea rows="5" id="address" name="alamat" class="form-control" placeholder="*Required" style="height:70px;" required></textarea>
                  </div>
  							</div>
  						</div>
  					</div>

            <div class="form_title">
  						<h3><strong>2</strong>Package Information</h3>
  						<p>
  						Your Package Information
  						</p>
  					</div>
  					<div class="step">
  						<div class="row">
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <label><i class="icon-tag-1"></i> Your Packages</label>
                    <input type="hidden" name="paket" class="form-control" value="<?php echo $b['paketid']?>" />
                    <input type="text" name="nama_paket" class="form-control" value="<?php echo $b['nama_paket']?>"  readonly="readonly" required/>
                  </div> 
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <label><i class="icon-tag-1"></i> Your Hotel</label>
                    <input type="hidden" name="hotel" class="form-control" value="<?php echo $b['id_hotel']?>" />
                    <input type="text" name="nama_hotel" class="form-control" value="<?php echo $b['nama_hotel']?> <?php echo $b['rate']?> "  readonly="readonly" required/>
                  </div> 
                </div>   
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <label  for="checkin"><i class="icon-calendar-7"></i> Departure</label>
                    <input type="text" name="berangkat" id="checkin"  class="date-pick form-control" data-date-format="D, dd M yyyy" required>
                  </div>
                </div>               
                
                <div class="col-md-6 col-sm-6">
                  <div class="form-group">
                    <label></i>Guest </label><span> Min 2 Persons.</span>
                    <div class="numbers-row">
                      <input for="adultamt" type="text" id="adultamt" name="adultamt" value="2"  min="2"  require class="qty2 form-control" >
                    </div>
                  </div>
                  
                </div>
                <div class="col-md-12 col-sm-6">
                  <div class="form-group">
                    <label id="note" for="notebox"><i class="icon-tasks-1"></i> Special request</label>
                    <textarea  id="notebox" name="notebox" rows="5"  class="form-control" placeholder=" Special request" style="height:70px;"></textarea>
                  </div>
                </div>
  						</div>
  						<div class="row">

  						</div>
  						<div class="row">

  						</div>
  					</div>
  					<!--End step -->
  					<div id="policy">
  					<button a class="btn_full"  type="submit" >Book now</button>
  					</div>
  				</div>
        </form>
        <aside class="col-md-4" id="sidebar">

           
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

        </aside>
				
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
		
