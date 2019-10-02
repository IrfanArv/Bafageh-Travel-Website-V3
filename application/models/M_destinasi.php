<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_destinasi extends CI_Model{

	function get_all_destinasi(){
		$hsl=$this->db->query("select * from tbl_destinasi");
		return $hsl;
	}
	function simpan_destinasi($destinasi){
		$hsl=$this->db->query("insert into tbl_destinasi(destinasi) values('$destinasi')");
		return $hsl;
	}
	function update_destinasi($kode,$destinasi){
		$hsl=$this->db->query("update tbl_destinasi set destinasi='$destinasi' where id_destinasi='$kode'");
		return $hsl;
	}
	function hapus_destinasi($kode){
		$hsl=$this->db->query("delete from tbl_destinasi where id_destinasi='$kode'");
		return $hsl;
	}
	
	function get_destinasi_byid($id_destinasi){
		$hsl=$this->db->query("select * from tbl_destinasi where id_destinasi='$id_destinasi'");
		return $hsl;
	}

}