<!doctype html>
<html>

<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>BAFAGEH HOTEL RESERVATION</title>
    <style>
    /* -------------------------------------
									  GLOBAL RESETS
								  ------------------------------------- */
    
    img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%;
    }
    
    body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%;
    }
    
    table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%;
    }
    
    table td {
        font-family: sans-serif;
        font-size: 14px;
        vertical-align: top;
    }
    /* -------------------------------------
									  BODY & CONTAINER
								  ------------------------------------- */
    
    .body {
        background-color: #f6f6f6;
        width: 100%;
    }
    /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
    
    .container {
        display: block;
        Margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: auto !important;
        width: 580px;
    }
    /* This should also be a block element, so that it will fill 100% of the .container */
    
    .content {
        box-sizing: border-box;
        display: block;
        Margin: 0 auto;
        max-width: 580px;
        padding: 10px;
    }
    /* -------------------------------------
									  HEADER, FOOTER, MAIN
								  ------------------------------------- */
    
    .main {
        background: #fff;
        border-radius: 3px;
        width: 100%;
    }
    
    .wrapper {
        box-sizing: border-box;
        padding: 20px;
    }
    
    .footer {
        clear: both;
        padding-top: 10px;
        text-align: center;
        width: 100%;
    }
    
    .footer td,
    .footer p,
    .footer span,
    .footer a {
        color: #999999;
        font-size: 12px;
        text-align: center;
    }
    /* -------------------------------------
									  TYPOGRAPHY
								  ------------------------------------- */
    
    h1,
    h2,
    h3,
    h4 {
        color: #000000;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        Margin-bottom: 30px;
    }
    
    h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize;
    }
      
    p,
    ul,
    ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        Margin-bottom: 15px;
    }
    
    p li,
    ul li,
    ol li {
        list-style-position: inside;
        margin-left: 5px;
    }
    
    a {
        color: #3498db;
        text-decoration: underline;
    }
    /* -------------------------------------
									  BUTTONS
								  ------------------------------------- */
    
    .btn {
        box-sizing: border-box;
        width: 100%;
    }
    
    .btn > tbody > tr > td {
        padding-bottom: 15px;
    }
    
    .btn table {
        width: auto;
    }
    
    .btn table td {
        background-color: #ffffff;
        border-radius: 5px;
        text-align: center;
    }
    
    .btn {
        background-color: #ffffff;
        border: solid 1px #3498db;
        /*border-radius: 5px;*/
        box-sizing: border-box;
        color: #3498db;
        cursor: pointer;
        display: inline-block;
        font-size: 14px;
        font-weight: bold;
        margin: 0;
        padding: 12px 25px;
        text-decoration: none;
        text-transform: capitalize;
    }
    
    .btn-primary table td {
        background-color: #3498db;
    }
    
    .btn-primary {
        background-color: #008d4c;
        border-color: #008d4c;
        color: #ffffff;
    }
    
    .well {
        min-height: 20px;
        padding: 19px;
        margin-bottom: 20px;
        background-color: #f5f5f5;
        border: 1px solid #e3e3e3;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
    }
    
    .well blockquote {
        border-color: #ddd;
        border-color: rgba(0, 0, 0, .15);
    }
    
    .well-lg {
        padding: 24px;
        border-radius: 6px;
    }
    
    .well-sm {
        padding: 9px;
        border-radius: 3px;
    }
    /* -------------------------------------
									  OTHER STYLES THAT MIGHT BE USEFUL
								  ------------------------------------- */
    
    .last {
        margin-bottom: 0;
    }
    
    .first {
        margin-top: 0;
    }
    
    .align-center {
        text-align: center;
    }
    
    .align-right {
        text-align: right;
    }
    
    .align-left {
        text-align: left;
    }
    
    .clear {
        clear: both;
    }
    
    .mt0 {
        margin-top: 0;
    }
    
    .mb0 {
        margin-bottom: 0;
    }
    
    .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0;
    }
    
    .powered-by a {
        text-decoration: none;
    }
    
    hr {
        border: 0;
        border-bottom: 2px solid #f6f6f6;
        Margin: 20px 0;
    }
      
    .table-gap {
        padding-top: 20px;
        padding-bottom: 20px;
    }
    /* -------------------------------------
									  RESPONSIVE AND MOBILE FRIENDLY STYLES
								  ------------------------------------- */
    
    @media only screen and (max-width: 620px) {
        table[class=body] h1 {
            font-size: 28px !important;
            margin-bottom: 10px !important;
        }
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
            font-size: 16px !important;
        }
        table[class=body] .wrapper,
        table[class=body] .article {
            padding: 10px !important;
        }
        table[class=body] .content {
            padding: 0 !important;
        }
        table[class=body] .container {
            padding: 0 !important;
            width: 100% !important;
        }
        table[class=body] .main {
            border-left-width: 0 !important;
            border-radius: 0 !important;
            border-right-width: 0 !important;
        }
        table[class=body] .btn table {
            width: 100% !important;
        }
        table[class=body] .btn a {
            width: 100% !important;
        }
        table[class=body] .img-responsive {
            height: auto !important;
            max-width: 100% !important;
            width: auto !important;
        }
    }
    /* -------------------------------------
									  PRESERVE THESE STYLES IN THE HEAD
								  ------------------------------------- */
    
    @media all {
        .ExternalClass {
            width: 100%;
        }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
            line-height: 100%;
        }
        .apple-link a {
            color: inherit !important;
            font-family: inherit !important;
            font-size: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
            text-decoration: none !important;
        }
        /*.btn-primary table td:hover {
            background-color: #34495e !important;
        }
        .btn-primary a:hover {
            background-color: #34495e !important;
            border-color: #34495e !important;
        }*/
    }
    </style>
</head>
                   

<body class="">
    
    <table border="0" cellpadding="0" cellspacing="0" class="body">
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
                      
          					  ?>
        <tr>
            <td>&nbsp;</td>
            <td class="container">
                <div class="content">
                    <!-- START CENTERED WHITE CONTAINER -->
                    <span class="preheader">BAFAGEH HOTEL VOUCHER</span>
                    <table class="main">
                        <!-- START MAIN CONTENT AREA -->
                        <tr>
                            <td class="wrapper">
                                <h2 class="btn btn-primary align-center">PT. BAFAGEH TOUR & TRAVEL<br> HOTEL RESERVATION</h2>
                                <hr>
                                <p>
                                    TO
                                    <br>
                                    <b><?php echo $judul;?></b><br>
                                    <?php echo $hotel_alamat;?><br>
                                    Phone: <?php echo $hotel_phone;?> <br>
                                    Mail : <?php echo $hotel_email;?><br>                                   
                                </p>
                                
                                <div class="well well-lg">
                                    <p><b>Detail Transaction</b>
                                        <br> 
      
                                        <table class="table-gap">
                                            <tr>
                                                <td>Voucher Number</td>
                                                <td><b>: <?php echo $id_order;?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Order Date</td>
                                                <td><b>: <?php echo date ('d M Y',strtotime ($tanggal)) ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Name Of Guest</td>
                                                <td><b>: <?php echo $name;?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Adult</td>
                                                <td><b>: <?php echo $dewasa;?> Persons</b></td>
                                            </tr>
                                            <tr>
                                                <td>Kids</td>
                                                <td><b>: <?php echo $anak;?> Persons</b></td>
                                            </tr>
                                            <tr>
                                            <td></td>
                                            <td></td>
                                          </tr>
                                          <tr>
                                                <td>Room Type</td>
                                                <td><b>: <?php echo $title;?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Check In</td>
                                                <td><b>: <?php echo date ('d M Y',strtotime ($date_start)) ?></b></td>
                                            </tr>
                                            <tr>
                                                <td>Check Out</td>
                                                <td><b>: <?php echo date ('d M Y',strtotime ($end_date)) ?></b></td>
                                             </tr>
                                            <tr>
                                                <td>Total Of Room</td>
                                                <td><b>: <?php echo $total_room;?> Room</b></td>
                                            </tr>
                                            <tr>
                                                <td>Number Of Night</td>
                                                <td><b>: <?php echo $jml_hari;?> Night</b></td>
                                            </tr>
                                           
                                        </table>
                                         
                                  
                                        <p><b>Special Instructions:</b>
                                        <br> <?php echo $keterangan;?>
                                        
                                        <p>Atention:</p>
                                        1. This Voucher is Valid On The Requested Date Only <br>
                                        2. Missing Voucher Cannot Be Replaced, Unless Buy New One
                                </div>
                                <p>
                                Issued By : 
                                    <br>
                                    <br>
                                    <br>
                                    <b> <?php echo $nama;?></b>
                                    <br>
                                    <!--<i><small>$timeStamp</small></i>-->
                                </p>
                            </td>
                        </tr>
                        <!-- END MAIN CONTENT AREA -->
                    </table>
                    <!-- START FOOTER -->
                    <div class="footer">
                        <table border="0" cellpadding="0" cellspacing="0">
                            
                            <tr>
                                <td class="content-block powered-by">
                                Copyright <?php echo date('Y');?> Bafageh Group <br/> All Right Reserved
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!-- END FOOTER -->
                    <!-- END CENTERED WHITE CONTAINER -->
                </div>
            </td>
            <td>&nbsp;</td>
        </tr>
        <?php endforeach;?>
    </table>
</body>



</html>
