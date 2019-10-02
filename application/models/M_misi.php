<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_misi extends CI_Model{

	function count_misi(){
		$hasil=$this->db->query("select * from misi");
		return $hasil;
	}

	function get_misi($offset,$limit){
		$hasil=$this->db->query("select * from misi order by id ASC limit $offset,$limit");
		return $hasil;
	}
	function simpan_misi($content){
		$hasil=$this->db->query("INSERT INTO misi(content) VALUES ('$content')");
		return $hasil;
	}
	function tampil_misi(){
		$hasil=$this->db->query("select * from misi order by id ASC");
		return $hasil;
	}
	function getmisi($kode){
		$hasil=$this->db->query("select * from misi where id='$kode'");
		return $hasil;
	}

	function update_misi($kode,$content){
		$hasil=$this->db->query("UPDATE misi SET content='$content' WHERE id='$kode'");
		return $hasil;
	}
	function hapus_misi($id){
		$hasil=$this->db->query("delete from misi where id='$id'");
		return $hasil;
	}

}
