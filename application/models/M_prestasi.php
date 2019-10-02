<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_prestasi extends CI_Model{

	function count_prestasi(){
		$hasil=$this->db->query("select * from prestasi");
		return $hasil;
	}

	function get_prestasi($offset,$limit){
		$hasil=$this->db->query("select * from prestasi order by id ASC limit $offset,$limit");
		return $hasil;
	}
	function simpan_prestasi($icon,$title){
		$hasil=$this->db->query("INSERT INTO prestasi(icon,title) VALUES ('$icon,$title')");
		return $hasil;
	}
	function tampil_prestasi(){
		$hasil=$this->db->query("select * from prestasi order by id ASC");
		return $hasil;
	}
	function getprestasi($kode){
		$hasil=$this->db->query("select * from prestasi where id='$kode'");
		return $hasil;
	}

	function update_prestasi($kode,$icon,$title){
		$hasil=$this->db->query("UPDATE prestasi SET icon='$icon',title='$title' WHERE id='$kode'");
		return $hasil;
	}
	function hapus_prestasi($id){
		$hasil=$this->db->query("delete from prestasi where id='$id'");
		return $hasil;
	}

}
