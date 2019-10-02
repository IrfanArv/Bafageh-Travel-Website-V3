<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_galket extends CI_Model{
	function get_galket($kode){
		$hasil=$this->db->query("select * from galeri_paket where paketid='$kode' order by id_galket DESC ");
		return $hasil;
	}
	function galket_photo($offset,$limit){
		$hasil=$this->db->query("select * from galeri_paket order by id_galket DESC limit $offset,$limit");
		return $hasil;
	}
	function count_photo($kode){
		$hasil=$this->db->query("select * from galeri_paket where albumid='$kode'");
		return $hasil;
	}
	function jml_photo(){ 
		$hasil=$this->db->query("select * from galeri_paket");
		return $hasil;
	}
	function get_paket(){
		$hasil=$this->db->query("select * from paket");
		return $hasil;
	}
	function tampil_galket(){
		$hasil=$this->db->query("SELECT galeri_paket.*,nama_paket FROM galeri_paket JOIN paket ON paketid=idpaket");
		return $hasil;
	}
	function SimpanGaleri($gambar,$paket){
		$this->db->trans_start();
            $this->db->query("insert into galeri_paket (gbr_galket,paketid) values ('$paket','$gambar')");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}
	function update_galeri_with_img($kode,$gambar,$paket){
		$hasil=$this->db->query("UPDATE galeri_paket SET gbr_galket='$gambar', paketid='$paket' WHERE id_galket='$kode'");
		return $hasil;
	}
	function update_galeri($kode,$paket){
		$hasil=$this->db->query("UPDATE galeri_paket SET paketid='$paket' WHERE id_galket='$kode'");
		return $hasil;
	}


	function hapus_photo($id){
		$hasil=$this->db->query("delete from galeri_paket WHERE id_galket='$id'");
		return $hasil;
	}
	function get_photo(){
		$hasil=$this->db->query("select * from galeri_paket");
		return $hasil;
	}

}
