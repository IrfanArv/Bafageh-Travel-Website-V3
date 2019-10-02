<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_visi extends CI_Model{

	function count_visi(){
		$hasil=$this->db->query("select * from visi");
		return $hasil;
	}

	function get_visi($offset,$limit){
		$hasil=$this->db->query("select * from visi order by id ASC limit $offset,$limit");
		return $hasil;
	}
	function simpan_visi($content){
		$hasil=$this->db->query("INSERT INTO visi(content) VALUES ('$content')");
		return $hasil;
	}
	function tampil_visi(){
		$hasil=$this->db->query("select * from visi order by id ASC");
		return $hasil;
	}
	function getvisi($kode){
		$hasil=$this->db->query("select * from visi where id='$kode'");
		return $hasil;
	}

	function update_visi($kode,$content){
		$hasil=$this->db->query("UPDATE visi SET content='$content' WHERE id='$kode'");
		return $hasil;
	}
	function hapus_visi($id){
		$hasil=$this->db->query("delete from visi where id='$id'");
		return $hasil;
	}

}
