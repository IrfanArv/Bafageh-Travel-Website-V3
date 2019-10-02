<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_bank extends CI_Model{

	function tampil_bank(){
		$hsl=$this->db->query("SELECT * FROM metode_bayar");
		return $hsl;
	} 

	function simpan_rekening($norek,$bank,$atasnama,$gambar){
		$hsl=$this->db->query("INSERT INTO metode_bayar(metode,bank,norek,atasnama,logo) VALUES ('Transfer Bank','$bank','$norek','$atasnama','$gambar')");
		return $hsl;
	}

	function hapus_rekening($kode){
		$hsl=$this->db->query("DELETE FROM metode_bayar WHERE id_metode='$kode'");
		return $hsl;
	}

	function update_rekening($kode,$norek,$bank,$atasnama){
		$hsl=$this->db->query("UPDATE metode_bayar SET bank='$bank',norek='$norek',atasnama='$atasnama' WHERE id_metode='$kode'");
		return $hsl;
	}

	function update_rekening_img($kode,$norek,$bank,$atasnama,$gambar){
		$hsl=$this->db->query("UPDATE metode_bayar SET bank='$bank',norek='$norek',atasnama='$atasnama', logo='$gambar' WHERE id_metode='$kode'");
		return $hsl;
	}

}