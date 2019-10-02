<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_faq extends CI_Model{

	function SimpanFaq($title,$content){
            $this->db->query("insert into faq (title,content) values ('$title','$content')");
			return $hasil;
	}

	function UpdateFaq($kode,$title,$content){
		$hasil=$this->db->query("UPDATE faq SET title='$title' ,content='$content' WHERE id_faq='$kode'");
		return $hasil;
	}
	function HapusFaq($id){
		$hasil=$this->db->query("delete from faq WHERE id_faq='$id'");
		return $hasil;
	}
	function TampilFaq(){
		$hasil=$this->db->query("select * from faq");
		return $hasil;
	}

}
