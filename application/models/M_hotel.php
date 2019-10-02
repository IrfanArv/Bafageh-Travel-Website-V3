<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_hotel extends CI_Model{ 

/*deals*/
	function get_no_order(){
		$q = $this->db->query("SELECT MAX(RIGHT(id_order,4)) AS kd_max FROM hotel_orders where date(tanggal)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp); 
            }
        }else{
            $kd = "0001";
        }
        return "VCR".date('dmy').$kd;
	}

	function deals(){
		$hasil=$this->db->query("SELECT *, DATEDIFF(end_date,date_start) as jml_hari,  (SELECT jml_hari) * jml_kamar * price AS total_paid, (SELECT jml_hari) * jml_kamar AS rn FROM hotel_orders JOIN hotel ON hotel_id_order=id_hotel JOIN hotel_room ON room_order_id=id_room JOIN tbl_destinasi ON destinasi_id=id_destinasi JOIN tbl_admin ON user_id=idadmin ORDER BY id_order ");
		return $hasil;
	}

	function dealskasir(){
		$hasil=$this->db->query("SELECT *, DATEDIFF(end_date,date_start) as jml_hari,  (SELECT jml_hari) * jml_kamar * price AS total_paid, (SELECT jml_hari) * jml_kamar AS rn FROM hotel_orders JOIN hotel ON hotel_id_order=id_hotel JOIN hotel_room ON room_order_id=id_room JOIN tbl_destinasi ON destinasi_id=id_destinasi JOIN tbl_admin ON user_id=idadmin WHERE status IS NULL ORDER BY id_order ");
		return $hasil;
	}

	function itemMail($kode){
		$hasil=$this->db->query("SELECT *, DATEDIFF(end_date,date_start) as jml_hari,  (SELECT jml_hari) * jml_kamar * price AS total_paid FROM hotel_orders JOIN hotel ON hotel_id_order=id_hotel JOIN hotel_room ON room_order_id=id_room JOIN tbl_destinasi ON destinasi_id=id_destinasi JOIN tbl_admin ON user_id=idadmin WHERE id_order='$kode' ");
		return $hasil;
	}
	function updatestatus($kode){
		$hasil=$this->db->query("UPDATE hotel_orders SET mail_status=1 WHERE id_order='$kode'");
		return $hasil;
	}
 
	function save_deals($no_order,$hotel,$room,$date_start,$end_date,$total_room,$name,$email,$adult,$kids,$req,$price,$kat,$user_id,$con){
		$hasil=$this->db->query("INSERT INTO hotel_orders (id_order,hotel_id_order,room_order_id,date_start,end_date,jml_kamar,name,email,dewasa,anak,keterangan,price,kat,user_id,con,tanggal) 
		VALUES ('$no_order', '$hotel', '$room', '$date_start', '$end_date', '$total_room', '$name', '$email', '$adult', '$kids', '$req', '$price' , '$kat' ,'$user_id','$con',CURDATE())");
		return $hasil;
	}

	function update_deals($kode,$name,$adult,$kids,$start,$end,$total_room,$req,$kat,$con){
        $hasil=$this->db->query("UPDATE hotel_orders SET name='$name', dewasa='$adult', anak='$kids', date_start='$start', end_date='$end', jml_kamar='$total_room', keterangan='$req', kat='$kat', con='$con'  WHERE id_order='$kode'");
		return $hasil;
	}

	function done($kode){
        $hasil=$this->db->query("UPDATE hotel_orders SET status='LUNAS' WHERE id_order='$kode'");
        return $hasil;
	}

	function selectMail($kode){
		$hasil=$this->db->query("SELECT hotel_email FROM hotel_orders JOIN hotel ON id_hotel=hotel_id_order WHERE id_order='$kode' ");
		return $hasil;
	}
	
	/*End deals*/

	/*BOOK FROM WEB LIST*/

	function listbook(){
		$hasil=$this->db->query("SELECT hotel_bookings.*,id_hotel,judul,rate,hotel_alamat,id_room,title,hj_we, DATEDIFF(end_date,date_start) as jml_hari,  (SELECT jml_hari) * jml_kamar * hj_we AS total_paid, dewasa + anak AS totaltamu FROM hotel_bookings JOIN hotel ON hotel_id_order=id_hotel JOIN hotel_room ON room_order_id=id_room ORDER BY id_order DESC");
		return $hasil;
	}

	function bayar_selesai($id){
        $hasil=$this->db->query("UPDATE hotel_bookings SET status='LUNAS' WHERE id_order='$id'");
        return $hasil;
    }

	/*END BOOK FROM WEB LIST*/

	/*hotel*/
	function get_all_hotel(){
		$hsl=$this->db->query("SELECT hotel.*,destinasi FROM hotel JOIN tbl_destinasi ON destinasi_id=id_destinasi ORDER BY destinasi_id DESC");
		return $hsl;
	}

	function room($kode){ 
		$hasil=$this->db->query("SELECT * FROM hotel_room WHERE hotel_id='$kode' ");
		return $hasil;
	}

	function simpan_hotel($destinasi_id,$judul,$slug,$rate,$deskripsi,$alamat,$lat,$lng,$email,$phone,$web,$gambar){
		$hasil=$this->db->query("INSERT INTO hotel (destinasi_id,judul,hotel_slug,rate,hotel_deskripsi,hotel_alamat,lat,lng,hotel_email,hotel_phone,web,cover_hotel)
		VALUES ('$destinasi_id','$judul','$slug','$rate','$deskripsi','$alamat','$lat','$lng','$email','$phone','$web', '$gambar')");
		return $hasil;
	}


	function update_hotel($id_hotel,$judul,$slug,$deskripsi,$alamat,$lat,$lng,$email,$phone,$web,$gambar){
		$hasil=$this->db->query("UPDATE hotel SET judul='$judul',hotel_slug='$slug' ,hotel_deskripsi='$deskripsi',hotel_alamat='$alamat',lat='$lat',lng='$lng',hotel_email='$email',hotel_phone='$phone',web='$web', cover_hotel='$gambar'  where id_hotel='$id_hotel'");
		return $hasil;
	}

	function update_hotel_noimg($id_hotel,$judul,$slug,$deskripsi,$alamat,$lat,$lng,$email,$phone,$web){
		$hasil=$this->db->query("UPDATE hotel SET judul='$judul',hotel_slug='$slug' ,hotel_deskripsi='$deskripsi',hotel_alamat='$alamat',lat='$lat',lng='$lng',hotel_email='$email',hotel_phone='$phone',web='$web' where id_hotel='$id_hotel'");
		return $hasil;
	}

	function get_hotel_by_kode($kode){
		$hsl=$this->db->query("SELECT hotel.*,destinasi FROM hotel JOIN tbl_destinasi ON destinasi_id=id_destinasi where id_hotel='$kode'");
		return $hsl; 
	}

	function hapus_hotel($kode){
		$hsl=$this->db->query("DELETE FROM hotel WHERE id_hotel='$kode'");
		return $hsl;
	}

	

	function add_fasilitas($hotel_id,$fashotel){
		$this->db->trans_start();
		$this->db->query("INSERT INTO hotel_fasilitas (hotel_id,fasilitas_id) VALUES ('$hotel_id', '$fashotel') ");
            $this->db->query("UPDATE hotel SET status_fas='1' WHERE id_hotel='$hotel_id'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}

	/*end Hotel */


function galleri($kode){
	$hasil=$this->db->query("SELECT * FROM hotel_file WHERE hotel_id='$kode'");
	return $hasil;
}

function updategalerihotel($id,$gambar){
	$hasil=$this->db->query("UPDATE hotel_file SET nama_foto='$gambar'  where id='$id'");
	return $hasil;
}

	


	//Front-End

	function hotel_home(){
		$hsl=$this->db->query("SELECT hotel.*,destinasi,min(hj_wd) AS harga FROM hotel JOIN tbl_destinasi ON destinasi_id=id_destinasi JOIN hotel_room ON hotel_id=id_hotel GROUP BY views DESC limit 10");
		return $hsl;
	}

	function galleridepan($slug){
		$hasil=$this->db->query("SELECT * FROM hotel_file WHERE slug_hotel='$slug'");
		return $hasil;
	}

	function get_hotel_by_slug($slug){
		$hsl=$this->db->query("SELECT hotel.*,min(hj_wd) AS jual, id_destinasi,destinasi, DATE_FORMAT(created,'%d/%m/%Y') AS tanggal FROM hotel JOIN hotel_room ON id_hotel=hotel_id JOIN tbl_destinasi ON id_destinasi=destinasi_id where hotel_slug='$slug'");
		return $hsl;
	}


        function listHotel(){
		$hsl=$this->db->query("SELECT id_hotel,judul,hotel_deskripsi,cover_hotel,rate,hotel_slug,id_room,id_destinasi,destinasi,hj_wd FROM hotel JOIN hotel_room ON id_hotel=hotel_id JOIN tbl_destinasi GROUP BY id_hotel");
		return $hsl;
	}

	function hotel_perpage($offset,$limit){
		$hsl=$this->db->query("SELECT id_hotel,judul,hotel_deskripsi,cover_hotel,rate,hotel_slug,id_room,id_destinasi,destinasi,hj_wd FROM hotel JOIN hotel_room ON id_hotel=hotel_id JOIN tbl_destinasi GROUP BY id_hotel DESC limit $offset,$limit");
		return $hsl;
	}

	function listFasilitas($slug){
		$hasil=$this->db->query("SELECT * FROM hotel_fasilitas JOIN fasilitas ON fasilitas_id=id_fasilitas JOIN hotel ON hotel_id=id_hotel WHERE hotel_slug='$slug' ");
		return $hasil;
	}

	
    function get_hotel_populer(){
		$hasil=$this->db->query("SELECT hotel.*,min(hj_wd) AS jual,DATE_FORMAT(created,'%d %M %Y') AS tanggal FROM hotel JOIN hotel_room ON id_hotel=hotel_id  ORDER BY views DESC limit 10");
		return $hasil;
	}

	function get_hotel_terbaru(){
		$hasil=$this->db->query("SELECT hotel.*,min(hj_wd) AS jual,DATE_FORMAT(created,'%d %M %Y') AS tanggal FROM hotel JOIN hotel_room ON id_hotel=hotel_id  ORDER BY id_hotel DESC limit 10");
		return $hasil;
	}

	function get_destinasi(){
		$hasil=$this->db->query("SELECT COUNT(destinasi_id) AS jml,id_destinasi,destinasi FROM hotel JOIN tbl_destinasi ON destinasi_id=id_destinasi GROUP BY destinasi_id");
		return $hasil;
	}
	
	function cari_hotel($hotel,$kota){
		$hsl=$this->db->query("SELECT hotel.*,tbl_destinasi.*,hotel_room.*,min(hj_wd) AS harga FROM hotel JOIN tbl_destinasi ON destinasi_id=id_destinasi JOIN hotel_room ON hotel_id=id_hotel WHERE judul LIKE '%$hotel%' AND destinasi LIKE '%$kota%' GROUP BY id_hotel");
		return $hsl;
	}

	function roomslug($slug){
		$hasil=$this->db->query("SELECT id_room,hotel_id,title,descr,hj_we,cover_room,id_hotel,hotel_slug FROM hotel_room JOIN hotel ON hotel_id=id_hotel WHERE hotel_slug='$slug' ");
		return $hasil;
	}

	function roomkode($kode){
		$hasil=$this->db->query("SELECT id_room,hotel_id,title,descr,hj_we,id_hotel,hotel_slug,judul,rate FROM hotel_room JOIN hotel ON hotel_id=id_hotel WHERE id_room='$kode' ");
		return $hasil;
	}
/*
	function roomfas($slug,$room){
		$hasil=$this->db->query("SELECT id,room_id,fasilitas_id,hotel_id_room,id_room,id_fasilitas,nama,gambar,id_hotel,hotel_slug FROM room_fasilitas JOIN fasilitas ON fasilitas_id=id_fasilitas JOIN hotel_room ON room_id=id_room JOIN hotel ON hotel_id_room=id_hotel WHERE hotel_slug='$slug' AND room_id='$room' ");
		return $hasil;
	}

	QUERY FASILITAS OK CUMA ARRAY FASILITAS DI FRONTEND BERMASALAH
*/	

function roomfas($slug){
	$hasil=$this->db->query("SELECT id,room_id,fasilitas_id,hotel_id_room,id_room,id_fasilitas,nama,gambar,id_hotel,hotel_slug FROM room_fasilitas JOIN fasilitas ON fasilitas_id=id_fasilitas JOIN hotel_room ON room_id=id_room JOIN hotel ON hotel_id_room=id_hotel WHERE hotel_slug='$slug' ");
	return $hasil;
}

function galroom($slug){
	$hasil=$this->db->query("SELECT id,nama_foto,room_id,hotel_id_gal,id_room,id_hotel,hotel_slug FROM room_file JOIN hotel_room ON room_id=id_room JOIN hotel ON hotel_id_gal=id_hotel  WHERE hotel_slug='$slug' ");
	return $hasil;
}
	
	function count_views($kode){
        $user_ip=$_SERVER['REMOTE_ADDR'];
        $cek_ip=$this->db->query("SELECT * FROM hotel_views WHERE views_ip='$user_ip' AND views_id_hotel='$kode' AND DATE(views_tanggal)=CURDATE()");
        if($cek_ip->num_rows() <= 0){
            $this->db->trans_start();
				$this->db->query("INSERT INTO hotel_views (views_ip,views_id_hotel) VALUES('$user_ip','$kode')");
				$this->db->query("UPDATE hotel SET views=views+1 where id_hotel='$kode'");
			$this->db->trans_complete();
			if($this->db->trans_status()==TRUE){
				return TRUE;
			}else{
				return FALSE;
			}
        }
	}
	
	/*BOOKING FRONT*/
	function get_no_vcr(){
		$q = $this->db->query("SELECT MAX(RIGHT(id_order,4)) AS kd_max FROM hotel_bookings where date(tanggal)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp); 
            }
        }else{
            $kd = "0001";
        }
        return "VCR".date('dmy').$kd;
	}

	function simpan_order($no_order,$nama,$email,$jenkel,$notelp,$alamat,$room,$hotel,$checkin,$checkout,$adultamt,$kids,$totalroom,$notebox){
		$hasil=$this->db->query("INSERT INTO hotel_bookings(id_order,name,email,jenkel,notelp,alamat,room_order_id,hotel_id_order,date_start,end_date,dewasa,anak,jml_kamar,keterangan,tanggal)VALUES
		('$no_order','$nama','$email','$jenkel','$notelp','$alamat','$room','$hotel','$checkin','$checkout','$adultamt','$kids','$totalroom','$notebox',CURDATE())");
		return $hasil;
	}

	function detail_charthotel(){ 
		$kode=$this->session->userdata('invoices');
		$hasil=$this->db->query("SELECT hotel_bookings.*,id_hotel,judul,rate,hotel_alamat,id_room,title,hj_we, DATEDIFF(end_date,date_start) as jml_hari,  (SELECT jml_hari) * jml_kamar * hj_we AS total_paid, dewasa + anak AS totaltamu FROM hotel_bookings JOIN hotel ON hotel_id_order=id_hotel JOIN hotel_room ON room_order_id=id_room WHERE id_order='$kode' ");
		return $hasil;
	}

	function faktur(){ 
		$inv=$this->session->userdata('invoices');
		$hasil=$this->db->query("SELECT hotel_bookings.*,id_hotel,judul,rate,hotel_alamat,id_room,title,hj_we,id_metode,metode,bank,norek,atasnama, DATEDIFF(end_date,date_start) as jml_hari,  (SELECT jml_hari) * jml_kamar * hj_we AS total_paid, dewasa + anak AS totaltamu FROM hotel_bookings JOIN metode_bayar ON metode_id=id_metode JOIN hotel ON hotel_id_order=id_hotel JOIN hotel_room ON room_order_id=id_room WHERE id_order='$inv' ");
		return $hasil;
	}
	
	function get_metode(){
		$hasil=$this->db->query("SELECT * FROM metode_bayar");
		return $hasil;
	}

	function set_bayar($no_invoice,$id){
		$hasil=$this->db->query("update hotel_bookings set metode_id='$id' where id_order='$no_invoice'");
		return $hasil;
	}

	function get_bayar($kode){
		$hasil=$this->db->query("SELECT * FROM metode_bayar where id_metode='$kode'");
		return $hasil;
	}


}