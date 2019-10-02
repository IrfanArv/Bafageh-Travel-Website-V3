<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Hotelfasilitas extends CI_Model{

	function get_fasilitas(){
		$hasil=$this->db->query("SELECT id_fasilitas,nama,gambar,id,hotel_id,fasilitas_id,id_hotel,hotel_slug FROM fasilitas JOIN hotel_fasilitas ON fasilitas_id=id_fasilitas JOIN hotel ON hotel_id=id_hotel  "); 
		return $hasil;
	}

	function get_fasilitasroom(){
		$hasil=$this->db->query("SELECT * FROM fasilitas"); 
		return $hasil;
	}

	function s($slug){
		$hasil=$this->db->query("SELECT id_fasilitas,nama,gambar,id,hotel_id,fasilitas_id,id_hotel,hotel_slug FROM fasilitas JOIN hotel_fasilitas ON fasilitas_id=id_fasilitas JOIN hotel ON hotel_id=hotel_slug WHERE hotel_id='$slug' "); 
		return $hasil;
	}



	function simpan_fasilitas($nama,$gambar){
		$hasil=$this->db->query("insert into fasilitas (nama,gambar) values ('$nama','$gambar')");
		return $hasil;
	}
	function update_fasilitas_img($kode,$nama,$gambar){
		$hasil=$this->db->query("UPDATE fasilitas SET nama='$nama',gambar='$gambar' WHERE id_fasilitas='$kode'");
		return $hasil;
	}
	function update_fasilitas($kode,$nama){
		$hasil=$this->db->query("UPDATE fasilitas SET nama='$nama' WHERE id_fasilitas='$kode'");
		return $hasil;
	}
	function hapus_fasilitas($id){
		$hasil=$this->db->query("delete from fasilitas where id_fasilitas='$id'");
		return $hasil;
      
	}
}