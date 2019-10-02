<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_product extends CI_Model{

	function count_product(){
		$hasil=$this->db->query("select * from product");
		return $hasil;
	}

	function get_product($offset,$limit){
		$hasil=$this->db->query("select * from product order by id ASC limit $offset,$limit");
		return $hasil;
	}
	function simpan_product($icon,$title,$content){
		$hasil=$this->db->query("INSERT INTO product(icon,title,content) VALUES ('$icon,$title','$content')");
		return $hasil;
	}
	function tampil_product(){
		$hasil=$this->db->query("select * from product order by id ASC");
		return $hasil;
	}
	function getproduct($kode){
		$hasil=$this->db->query("select * from product where id='$kode'");
		return $hasil;
	}

	function update_product($kode,$icon,$title,$content){
		$hasil=$this->db->query("UPDATE product SET icon='$icon',title='$title',content='$content' WHERE id='$kode'");
		return $hasil;
	}
	function hapus_product($id){
		$hasil=$this->db->query("delete from product where id='$id'");
		return $hasil;
	}

}
