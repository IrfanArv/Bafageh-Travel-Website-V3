<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
      
  
    if ( ! function_exists('cleantgl'))
    {
        function cleantgl($date){
            $BulanIndo = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        
            $tahun = substr($date, 0, 4);
            $bulan = substr($date, 5, 2);
            $tgl   = substr($date, 8, 2);
            $jam	 = substr($date, 11, 8);
        
            $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun . ", " .  $jam  . " WIB " ;
            return($result);
        }
    }
       
    