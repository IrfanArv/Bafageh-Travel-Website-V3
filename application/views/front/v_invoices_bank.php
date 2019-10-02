<?php
       
        $b=$data->row_array();
    ?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Bafageh Invoice</title>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>themes/img/icon.png" type="image/x-icon">
      <link rel="stylesheet" href="<?php echo base_url() ?>assets/invoice/style.css" type="text/css">

</head>

<body >

  <div class="container">
    <div class="row" style="overflow: auto;">
   
        <div class="col left">          
    			<h2 class="invoice-title">PT. BAFAGEH TOUR & TRAVEL</h2>
          Jalan Raya Puncak KM 83 Ruko Bafageh Business Center
          <br>
          <b>Email</b> :  Office@bafageh.com
          <br>
          <b>Phone</b> :  (0251) 8254159
    		</div>
       
        <div class="col right">           
          <img style="float:right;" width="120px" height="101px" src="<?php echo base_url(); ?>themes/img/icon.png" alt="chatesat"><br> 
            <h1 style="margin-bottom:0px;text-align:right"> <br><br> INVOICE</h1>
          </div>
      </div>
    		<hr class="hr clear">
        <div class="row" style="overflow: auto;">
    			<div class="col" style="width:50%;float:left;">
            <b>BILL TO:</b> <br>
            <?php echo $b['nama']?> <br>
            <?php echo $b['alamat'];?><br>
            <?php echo $b['email'];?><br>
            <?php echo $b['notelp'];?> <br>
            Payment Method: <?php echo $b['metode']?>
          </div>
          
          <div class="col" style="width:25%; float:right; text-align:right;">
          <?php echo $b['id_order']?><br>
          <?php echo $b['tanggal']?><br>
          <?php echo $b['nama_paket']?><br>
          <?php echo $b['nama_hotel']?> <?php echo $b['rate']?><br>
          </div>
          <div class="col" style="width:10%; float:right;">
            <b>No Invoice :</b> <br>
            <b>Date :</b> <br>
            <b>Package :</b> <br>
            <b>Hotel :</b> <br>
          </div>
        </div>
        <br>
          <div class="clear">
            <div class="col">
              <table width="100%" style="border:1px solid #ddd;">
                <tr style="background-color:#ddd;height:35px;">
                  <th>Departure</th>
                  <th>Guest Depart</th>
                  <th>Price per Persons</th>
                </tr>
              
                <tr>
                  <td align="center"><?php echo $b['berangkat']; ?></td>
                  <td align="center"> <?php echo $b['adult'].' Person'; ?></td>
                  <td align="center"><?php echo 'Rp. '.number_format( $b['tober']); ?> </td>
                </tr>
               
                <tr>                  
                  <td colspan = "3"><hr> </td>
                </tr>
                <tr>              
                <td><b></b></td>
                  <td align="right" ><b>GRAND TOTAL</b></td>
                  <td align="right" height="40"><b><?php echo 'Rp. '.number_format( $b['total']); ?> &nbsp;</b></td>
                </tr>
              </table>
            </div>
          </div>   
          <br>
  <div class="row">
    <div class="col">
      <b>Transfer to:</b> <br>
      BANK: <?php echo $b['bank']?> <br>
      Account Number: <?php echo $b['norek']?><br>
      Account Owner: <?php echo $b['atasnama']?><br><br><hr>      

    </div>
    
  </div>
    	</div>
    </div>
</div>
</body>

</html>