<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_compro extends CI_Model{

	function count_compro(){
		$hasil=$this->db->query("select * from compro");
		return $hasil;
	}

	function get_compro($offset,$limit){
		$hasil=$this->db->query("select * from compro order by id ASC limit $offset,$limit");
		return $hasil;
	}
	function simpan_compro($title,$content){
		$hasil=$this->db->query("INSERT INTO compro(title,content) VALUES ('$title','$content')");
		return $hasil;
	}
	function tampil_compro(){
		$hasil=$this->db->query("select * from compro order by id ASC");
		return $hasil;
	}
	function getcompro($kode){
		$hasil=$this->db->query("select * from compro where id='$kode'");
		return $hasil;
	}

	function update_compro($kode,$title,$content){
		$hasil=$this->db->query("UPDATE compro SET title='$title',content='$content' WHERE id='$kode'");
		return $hasil;
	}
	function hapus_compro($id){
		$hasil=$this->db->query("delete from compro where id='$id'");
		return $hasil;
	}

}
