<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_intinerary extends CI_Model{
	function getintinerary($kode){
		$hasil=$this->db->query("select * from intinerary where paketid='$kode' order by id_intinerary ASC ");
		return $hasil;
	}
	
	function count_intinerary($kode){
		$hasil=$this->db->query("select * from intinerary where paketid='$kode'");
		return $hasil;
	}
	function jml_intinerary(){
		$hasil=$this->db->query("select * from intinerary");
		return $hasil;
	}
	function get_paket(){
		$hasil=$this->db->query("select * from paket");
		return $hasil;
	}
	function tampil_intinerary(){
		$hasil=$this->db->query("SELECT intinerary.*,nama_paket FROM intinerary JOIN paket ON paketid=idpaket order by id_intinerary ASC");
		return $hasil;
	}
	function SimpanIntinerary($title_intinerary,$content_intinerary,$nama_paket){
            $this->db->query("insert into intinerary (title_intinerary,content_intinerary,paketid) values ('$title_intinerary','$content_intinerary','$nama_paket')");
			return $hasil;
	}

	function update_intinerary($kode,$title_intinerary,$content_intinerary,$idpaket){
		$hasil=$this->db->query("UPDATE intinerary SET title_intinerary='$title_intinerary',content_intinerary='$content_intinerary' ,paketid='$idpaket' WHERE id_intinerary='$kode'");
		return $hasil;
	}
	function hapus_intinerary($id){
		$hasil=$this->db->query("delete from intinerary WHERE id_intinerary='$id'");
		return $hasil;
	}
	function get_intinerary(){
		$hasil=$this->db->query("select * from intinerary");
		return $hasil;
	}

}
