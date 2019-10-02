<?php
class M_home extends CI_Model{

	function tampil_sambutan(){
		$hsl=$this->db->query("SELECT * FROM compro WHERE id='1'");
		return $hsl;
	}

  function tampil_filosofi(){
		$hsl=$this->db->query("SELECT * FROM compro WHERE id='2'");
		return $hsl;
	}

  function tampil_sejarah(){
		$hsl=$this->db->query("SELECT * FROM compro WHERE id='3'");
		return $hsl;
	}

	function syarat_book(){
		$hsl=$this->db->query("SELECT * FROM faq WHERE id_faq='1'");
		return $hsl;
	}

	function bayar(){
		$hsl=$this->db->query("SELECT * FROM faq WHERE id_faq='2'");
		return $hsl;
	}
	function tx1(){
		$hsl=$this->db->query("SELECT * FROM faq WHERE id_faq='3'");
		return $hsl;
	}
	function tx2(){
		$hsl=$this->db->query("SELECT * FROM faq WHERE id_faq='4'");
		return $hsl;
	}

	function sthotelorders(){
		$hsl=$this->db->query("SELECT MONTH(tanggal) AS bulan, COUNT(*) AS jumlah_bulanan
		FROM hotel_orders
		GROUP BY MONTH(tanggal);");
		return $hsl;
	}


}
