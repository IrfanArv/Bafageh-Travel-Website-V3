<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_hotelroom extends CI_Model{ 

	function get_all_room(){
		$hsl=$this->db->query("SELECT hotel_room.*,judul,destinasi_id,id_destinasi,destinasi,rate FROM hotel_room JOIN hotel ON id_hotel=hotel_id JOIN tbl_destinasi ON destinasi_id=id_destinasi ORDER BY id_room DESC");
		return $hsl;
	}

	function viewBydestinasi($destinasi_id){
		$this->db->where('destinasi_id', $destinasi_id);
		$result = $this->db->get('hotel')->result();
		
		return $result; 
	  }

	  function viewByhotel($hotel){ 
		$this->db->where('hotel_id', $hotel);
		$result = $this->db->get('hotel_room')->result();
		return $result; 
	  }

	  function priceView($room){
		$this->db->where('id_room', $room);
		$result = $this->db->get('hotel_room')->result();
		return $result; 
	  }

	function simpan_room($title,$slug,$descr,$stock,$hm_wd,$hm_we,$hj_wd,$hj_we,$disc,$date_start,$end_date,$max_children,$max_adults,$max_people,$min_people,$hotel_id,$gambar){
	$hasil=$this->db->query("INSERT INTO hotel_room (title,slug,descr,stock,hm_wd,hm_we,hj_wd,hj_we,disc,start,end,max_children,max_adults,max_people,min_people,hotel_id,cover_room)
	VALUES ('$title','$slug','$descr','$stock', '$hm_wd', '$hm_we' , '$hj_wd', '$hj_we' ,'$disc', '$date_start' , '$end_date','$max_children','$max_adults','$max_people','$min_people','$hotel_id','$gambar')");
	return $hasil;
	} 

	function update_roomimg($id_room,$title,$slug,$descr,$stock,$hm_wd,$hm_we,$hj_wd,$hj_we,$disc,$date_start,$end_date,$max_children,$max_adults,$max_people,$min_people,$gambar){
		$hsl=$this->db->query("update hotel_room set title='$title',slug='$slug',descr='$descr',stock='$stock', hm_wd='$hm_wd', hm_we='$hm_we', hj_wd='$hj_wd', hj_we='$hj_we',	disc='$disc', start='$date_start', end='$end_date',max_children='$max_children',max_adults='$max_adults',max_people='$max_people',min_people='$min_people', cover_room='$gambar'  where id_room='$id_room'");
		return $hsl;
	}

	function update_room($id_room,$title,$slug,$descr,$stock,$hm_wd,$hm_we,$hj_wd,$hj_we,$disc,$date_start,$end_date,$max_children,$max_adults,$max_people,$min_people){
		$hsl=$this->db->query("update hotel_room set title='$title',slug='$slug',descr='$descr',stock='$stock', hm_wd='$hm_wd', hm_we='$hm_we', hj_wd='$hj_wd', hj_we='$hj_we',	disc='$disc', start='$date_start', end='$end_date',max_children='$max_children',max_adults='$max_adults',max_people='$max_people',min_people='$min_people' where id_room='$id_room'");
		return $hsl;
	}

	function get_idgaleri(){
		$hsl=$this->db->query("SELECT (MAX(id_hotel)) FROM hotel_room AS id_hotel");
		return $hsl;
	}

	function get_room_by_kode($kode){
		$hsl=$this->db->query("SELECT hotel_room.*,judul,destinasi_id,id_destinasi,destinasi,rate FROM hotel_room JOIN hotel ON hotel_id=id_hotel JOIN tbl_destinasi ON destinasi_id=id_destinasi where id_room='$kode'");
		return $hsl; 
	}

	function hapus_room($kode){
		$hsl=$this->db->query("delete FROM hotel_room where id_room='$kode'");
		return $hsl;
	}

	function add_fasilitas($id_room,$fasroom,$hotel_id){
		$this->db->trans_start();
		$this->db->query("INSERT INTO room_fasilitas (room_id,fasilitas_id,hotel_id_room) VALUES ('$id_room', '$fasroom', '$hotel_id')  ");
            $this->db->query("UPDATE hotel_room SET status_fas_room='1' WHERE id_room='$id_room'");
        $this->db->trans_complete();
        if($this->db->trans_status()==true)
        return true;
        else
        return false;
	}


}