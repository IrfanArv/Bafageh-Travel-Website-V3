 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_pkthotel extends CI_Model{

	function gethotel($kode){
		$hasil=$this->db->query("SELECT * FROM pkt_hotel JOIN paket ON paketid=idpaket  where paketid='$kode' order by id_hotel ASC ");
		return $hasil;
	}
	
	function count_hotel($kode){
		$hasil=$this->db->query("select * from pkt_hotel where paketid='$kode'");
		return $hasil;
	}
	function jml_hotel(){ 
		$hasil=$this->db->query("select * from pkt_hotel");
		return $hasil;
	}
	function get_paket(){
		$hasil=$this->db->query("select * from paket");
		return $hasil;
	}
	function tampil_hotel(){
		$hasil=$this->db->query("SELECT pkt_hotel.*,nama_paket FROM pkt_hotel JOIN paket ON paketid=idpaket");
		return $hasil;
	}
	function SimpanHotel($nama_hotel,$room,$rate,$harga0,$harga1,$harga2,$harga3,$paketid,$linkweb){
		$this->db->query("insert into pkt_hotel (nama_hotel,room,rate,harga0,harga1,harga2,harga3,paketid,linkweb) values ('$nama_hotel','$room','$rate', '$harga0' ,'$harga1','$harga2','$harga3','$paketid','$linkweb')");
		$this->db->query("UPDATE paket SET jml=jml+1 WHERE idpaket='$paketid'");
	$this->db->trans_complete();
	if($this->db->trans_status()==true)
	return true;
	else
	return false;
	}

	function update_hotel($kode,$nama_hotel,$room,$rate,$harga0,$harga1,$harga2,$harga3,$paketid,$linkweb){
		$this->db->query("UPDATE pkt_hotel SET nama_hotel='$nama_hotel' ,room='$room' ,rate='$rate' ,harga0='$harga0' ,harga1='$harga1' ,harga2='$harga2' ,harga3='$harga3' ,paketid='$paketid' ,linkweb='$linkweb' WHERE id_hotel='$kode'");
	$this->db->trans_complete();
	if($this->db->trans_status()==true)
	return true;
	else
	return false;
	}
	function hapus_hotel($id){
		$hasil=$this->db->query("delete from pkt_hotel WHERE id_hotel='$id'");
		return $hasil;
	}
	function get_hotel(){
		$hasil=$this->db->query("select * from pkt_hotel");
		return $hasil;
	}

}
