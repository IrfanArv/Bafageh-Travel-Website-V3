<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_fasilitas extends CI_Model{

	function count_fasilitas(){
		$hasil=$this->db->query("select * from compro_fasilitas");
		return $hasil;
	}

	function get_compro_fasilitas($offset,$limit){
		$hasil=$this->db->query("select * from compro_fasilitas order by id ASC limit $offset,$limit");
		return $hasil;
	}
	function simpan_fasilitas($content){
		$hasil=$this->db->query("INSERT INTO compro_fasilitas(content) VALUES ('$content')");
		return $hasil;
	}
	function tampil_fasilitas(){
		$hasil=$this->db->query("select * from compro_fasilitas order by id ASC");
		return $hasil;
	}
	function getfasilitas($kode){
		$hasil=$this->db->query("select * from compro_fasilitas where id='$kode'");
		return $hasil;
	}

	function update_fasilitas($kode,$content){
		$hasil=$this->db->query("UPDATE compro_fasilitas SET content='$content' WHERE id='$kode'");
		return $hasil;
	}
	function hapus_fasilitas($id){
		$hasil=$this->db->query("delete from compro_fasilitas where id='$id'");
		return $hasil;
	}

}
