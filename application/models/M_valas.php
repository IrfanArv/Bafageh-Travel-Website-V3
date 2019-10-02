<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_valas extends CI_Model{

	function count_valas(){
		$hasil=$this->db->query("select * from tbl_valas");
		return $hasil;
	}

	function get_valas($offset,$limit){
		$hasil=$this->db->query("select * from tbl_valas order by id DESC limit $offset,$limit");
		return $hasil;
	}
	function SimpanValas($currency,$price,$gambar,$updated){
		$hasil=$this->db->query("INSERT INTO tbl_valas(currency,price,photo,updated) VALUES ('$currency','$price','$gambar','$updated')");
		return $hasil;
	}
	function tampil_valas(){
		$hasil=$this->db->query("select * from tbl_valas order by id ASC");
		return $hasil;
	}
	function getvalas($kode){
		$hasil=$this->db->query("select * from tbl_valas where id='$kode'");
		return $hasil;
	}
	function update_valas_with_img($kode,$currency,$price,$gambar){
		$hasil=$this->db->query("UPDATE tbl_valas SET currency='$currency',price='$price',photo='$gambar' WHERE id='$kode'");
		return $hasil;
	}
	function update_valas_no_img($kode,$currency,$price){
		$hasil=$this->db->query("UPDATE tbl_valas SET currency='$currency',price='$price' WHERE id='$kode'");
		return $hasil;
	}
	function hapus_valas($id){
		$hasil=$this->db->query("delete from tbl_valas where id='$id'");
		return $hasil;
	}

	public function get_tgl()
	{
	$hasil=$this->db->query('SELECT * FROM tbl_valas ORDER BY updated DESC LIMIT 1');
	return $hasil;
	}
	
}