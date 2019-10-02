<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>BAFAGEH VOUCHER HOTEL</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
       
        font-size: 15px;
        line-height: 24px;
        font-family: 'Roboto', 'Roboto', sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }

    
    </style>
</head>

<body>
                  <?php
          					$no=0;
          					foreach ($data->result_array() as $i) :
          					   $no++;
                       $id_order=$i['id_order'];
                       $tanggal=$i['tanggal'];
                       $name=$i['name'];
                       $destinasi_id=$i['destinasi'];
                       $destinasi=$i['destinasi'];
                       $id_hotel=$i['id_hotel'];
                       $judul=$i['judul'];
                       $hotel_alamat=$i['hotel_alamat'];
                       $hotel_phone=$i['hotel_phone'];
                       $hotel_email=$i['hotel_email'];
                       $id_room=$i['id_room'];
                       $title=$i['title'];
                       $date_start=$i['date_start'];
                       $end_date=$i['end_date'];
                       $total_room=$i['jml_kamar'];
                       $idadmin=$i['idadmin'];
                       $nama=$i['nama'];
                       $jml_hari=$i['jml_hari'];
                       $price=$i['price'];
                       $total_paid=$i['total_paid'];
                       $status=$i['status'];
                       $dewasa=$i['dewasa'];
                       $anak=$i['anak'];
                       $keterangan=$i['keterangan'];
                       $kat=$i['kat'];
                       $con=$i['con'];
                      
          					  ?>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                            <img src="<?php echo base_url(); ?>themes/img/icon.png" width="120px;" height="120px;"></td>
                            
                            <td>
                            <strong>PT. Bafageh Tour & Travel</strong><br>
                            Jalan Raya Puncak KM 83 Ruko Bafageh Business Center<br>
                            Phone : (0251) 8254159<br>
                            Email : office@bafageh.com
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                            <b>No Voucher:</b>  <?php echo $id_order;?><br>
                            <b>Order Date:</b> <?php echo date ('d M Y',strtotime ($tanggal)) ?><br>
                            <b>Name Of Guest:</b> <?php echo $name;?><br>
                            <b>Adult:</b> <?php echo $dewasa;?> Persons<br>
                            <b>Kids:</b> <?php echo $anak;?> Persons<br>
                            <b>Category:</b>
                            
                            <?php if($kat=='breakfast'):?>
                            Breakfast 
                            <?php elseif($kat=='no'):?>
                            Room Only
                            <?php endif;?>
                            <br>
                            <b>Confrimed By:</b><?php echo $con;?><br>
                            </td>
                            
                            <td>
                           <b><u> VOUCHER TO:</b></u><br>
                            <strong><?php echo $judul;?></strong><br>
                            <?php echo $hotel_alamat;?><br>
                            Phone: <?php echo $hotel_phone;?><br>
                            Email: <?php echo $hotel_email;?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                   Details
                </td>
                
                <td>
                  
                </td>
            </tr>
            
            <tr class="item">
                <td>
                <b> Room Type</b>
                </td>
                
                <td>
                <?php echo $title;?>
                </td>
            </tr>
            
            <tr class="item">
                <td>
                <b> Check In</b>
                </td>
                
                <td>
                <?php echo date ('d M Y',strtotime ($date_start)) ?>
                </td>
            </tr>
            
            <tr class="item">
                <td>
                <b> Check Out</b>
                </td>
                
                <td>
                <?php echo date ('d M Y',strtotime ($end_date)) ?>
                </td>
            </tr>

            <tr class="item">
                <td>
                <b> Total Of Room Night</b>
                </td>
                
                <td>
                <?php echo $total_room;?> Room
                </td>
            </tr>
            <tr class="item">
                <td>
               <b> Number Of Night</b>
                </td>
                
                <td>
                <?php echo $jml_hari;?> Night
                </td>
            </tr>
            <br>
            
            

            <tr class="heading">
                <td>
                Special Instructions:
                </td>
                
                
                <td>
                  
                </td>
            </tr>
            
            <tr class="details">
                <td>
                <?php echo $keterangan;?>
                </td>
            </tr>
            <tr class="total">
                <td></td>
              
                <td>
                <b> Issued By :  <?php echo $nama;?></b><br>
                </td>
            </tr>
            
        </table>
        <?php endforeach;?>
    </div>
</body>
</html>