<script type="text/javascript">
function sum()
{
var x=document.getElementById("valas").value;

var y=document.getElementById("val2").value;

var sum=(x) * (y); 
document.getElementById("result").value=sum.toString().split( /(?=(?:\d{3})+(?:\.|$))/g ).join( "," );

}
</script>
<section id="search_container">
		<div id="search">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#currencies" data-toggle="tab">Currencies</a></li>
				<li><a href="#hotels" data-toggle="tab">Hotels</a></li>
			</ul>

			<div class="tab-content">
				<div class="tab-pane active" id="currencies">
					<h3>Currencies</h3>
					
					<div class="row">
						<div class="col-md-8">
						<table class="table">
						<?php
          				foreach($data->result_array() as $a):
             			 $gambar=$a['photo'];
             			 $currency=$a['currency'];
             			 $price=$a['price'];
      					?> 
                        <tbody>
                          <tr>
						  <td></td>
                            <td><img src="<?php echo base_url().'assets/images/valas/'.$gambar;?>" style="width:35px;"></td>
                            <td><?php echo $currency;?></td>
                            <td><?php echo 'Rp '.number_format($price);?></td>
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
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label><i class=" icon-money"></i> Select Currency</label>
								<select name="valas" id="valas" class="form-control" required>
                       			 <?php
                           		 foreach($data->result_array() as $p){
                              $id=$p['id'];
							  $currency=$p['currency'];
							  $price=$p['price'];
                       		 ?>
                            <option value='<?php echo $price?>'><?php echo $currency?></option>
                        <?php } ?>
                    </select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label><i class=" icon-list-add"></i> Nominal Input</label>
								<input type="number" id="val2" class="form-control">
							</div>
							<button onclick="sum()" class="btn_1 green">Calculate</button>
						</div>
						<div class="col-md-3">
							<div class="form-group">
							<label><i class=" icon-money-1"></i> Result</label>
								<input type="text" id="result" class="form-control" class="money" disabled>
							</div>
							
						</div>
						
					</div>
					
					
				</div>
				<!-- End rab -->
				<div class="tab-pane" id="hotels">
				<form class="search_form" action="<?php echo base_url().'home/findhotel'?>" method="post">
					<h3>Search Hotels</h3>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label><i class="icon-calendar-7"></i> Check in</label>
								<input class="date-pick form-control" data-date-format="D, dd M yyyy" type="text">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label><i class="icon-calendar-7"></i> Check out</label>
								<input class="date-pick form-control" data-date-format="D, dd M yyyy" type="text">
							</div>
						</div>
						<div class="col-md-2 col-sm-3 col-xs-5">
							<div class="form-group">
								<label>Adults</label>
								<div class="numbers-row">
									<input type="text" value="1" id="adults" class="qty2 form-control" name="adults_2">
								</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-3 col-xs-5">
							<div class="form-group">
								<label>Children</label>
								<div class="numbers-row">
									<input type="text" value="0" id="children" class="qty2 form-control" name="children_2">
								</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-3 col-xs-12">
							<div class="form-group">
								<label>Rooms</label>
								<div class="numbers-row">
									<input type="text" value="1" id="children" class="qty2 form-control" name="rooms">
								</div>
							</div>
						</div>
					</div>
					<!-- End row -->
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label>Hotel name</label>
								<input type="text" class="form-control" id="hotel" name="hotel" placeholder="Optionally type hotel name">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Preferred city area</label>
								<select  name="kota" id="kota" class="form-control">
								<option value="">-SELECT-</option>
								<?php foreach($des->result_array() as $k):
									$id_destinasi=$k['id_destinasi']; 
									$destinasi=$k['destinasi'];
								?>
								<option value="<?php echo $destinasi;?>"><?php echo $destinasi;?></option>
                     			 <?php endforeach;?>
								</select>
							</div>
						</div>
					</div>
					<!-- End row -->
					<hr>
					<button type="submit" class="btn_1 green"><i class="icon-search"></i>Search now</button>
					</form>
				</div>
				
		</div>
	</section>
	<!-- End hero -->

<main>
		<div class="container margin_60">

			<div class="main_title">
				<h2>TOP <span>RATED</span> HOTELS</h2>
			</div>

			<div class="row">
			<?php
          					$no=0;
          					foreach ($get_hotel->result_array() as $i) :
          					   $no++;
          					   $id_hotel=$i['id_hotel'];
                               $judul=$i['judul'];
                               $rate=$i['rate'];
          					   $destinasi_id=$i['destinasi_id'];
          					   $destinasi=$i['destinasi'];
                               $email=$i['hotel_email'];
                               $phone=$i['hotel_phone'];
							   $gambar=$i['cover_hotel'];
							   $hotel_slug=$i['hotel_slug'];
							   $harga=$i['harga'];
          	 ?>
				<div class="col-md-4 col-sm-6 wow zoomIn" data-wow-delay="0.1s">
					<div class="ribbon_3 popular"><span>TOP RATED</span></div>
					<div class="tour_container">
						<div class="img_container">
							<a href="<?php echo base_url().'hotels/'.$hotel_slug;?>">
								<img src="<?php echo base_url().'assets/images/hotel/thumb/'.$gambar; ?>" class="img-responsive" alt="Image">
								<div class="short_info">
									<i class="icon-map"></i><?php echo $destinasi;?>
									<span class="price"><sup>Start From <?php echo 'Rp '.number_format($harga);?></sup></span>
								</div>
							</a>
						</div>
						<div class="tour_title">
							<h3><strong><?php echo $judul;?></strong></h3>
							<div class="rating">
							<?php echo $rate;?>
							</div>
							
							<!-- End wish list-->
						</div>
					</div>
					<!-- End box tour -->
				</div>
							  <?php endforeach;?>
			</div>
			<!-- End row -->
			<p class="text-center nopadding">
				<a href="<?php echo base_url().'hotels/'?>" class="btn_1 medium"><i class="icon-eye-7"></i>View all hotel </a>
			</p>
</div>
<div class="container margin_60">
				<div class="main_title">
				<h2>POPULAR <span>TOUR</span> PACKAGES</h2>
				</div>

			<div class="row">
			<?php
                    $no=0;
                        foreach($paket->result_array() as $a):
                            $no++;
                            $id=$a['idpaket'];
                            $gambar=$a['gambar'];
                            $nama_paket=$a['nama_paket'];
                            $kategori=$a['kategori_id'];
							$nama=$a['kategori'];
							$harga=$a['harga'];
                            $jml=$a['jml'];
                    ?>
				<div class="col-md-4 col-sm-6 wow zoomIn" data-wow-delay="0.1s">
					<div class="ribbon_3"><span>POPULAR</span></div>
					<div class="tour_container">
						<div class="img_container">
							<a href="<?php echo base_url().'tour/details/'.$id;?>">
								<img src="<?php echo base_url().'/assets/images/paket/thumb/'.$gambar;?>" class="img-responsive" alt="Image">
								<div class="short_info">
									<i class="icon_set_1_icon-30"></i><?php echo $nama;?>
									<span class="price"><sup>Start From <?php echo 'Rp '.number_format($harga);?></sup></span>
									
								</div>
							</a>
						</div>
						<div class="tour_title">
							<h3><strong><?php echo $nama_paket;?></strong></h3>
							
						</div>
					</div>
					<!-- End box tour -->
				</div>
							  <?php endforeach;?>
			</div> 
			<!-- End row -->
			<p class="text-center nopadding">
				<a href="#" class="btn_1 medium"><i class="icon-eye-7"></i>View all tours </a>
			</p>
		
		</div>
		</div>