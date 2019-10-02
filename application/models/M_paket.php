<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_paket extends CI_Model{
	function get_metode_pembayaran(){
		$hasil=$this->db->query("SELECT * FROM metode_bayar GROUP BY metode");
		return $hasil;
	}
	function ambil_berita($kode){
		$hasil=$this->db->query("select * from berita where idberita='$kode'");
		return $hasil;
	}

	
	function get_kategori(){ 
		$hasil=$this->db->query("select * from kategori_paket");
		return $hasil;
	}
	function get_wisata(){
		$hasil=$this->db->query("select * from wisata order by idwisata desc limit 3");
		return $hasil;
	}
	function get_paket($offset,$limit){
		$hasil=$this->db->query("select * from paket order by idpaket DESC limit $offset,$limit");
		return $hasil;
	}
	function SimpanPaket($nama_paket,$kategori,$deskripsi,$gambar){
		$hasil=$this->db->query("INSERT INTO paket(nama_paket,deskripsi,kategori_id,gambar) VALUES ('$nama_paket','$deskripsi','$kategori','$gambar')");
		return $hasil;
	}
	function tampil_paket(){
		$hasil=$this->db->query("select * from paket JOIN kategori_paket ON kategori_id=id_kategori"); 
		return $hasil;
	}

	function harga_hotel(){
		$hasil=$this->db->query("select idpaket,paketid,nama_paket,deskripsi,gambar,harga3,kategori_id,id_kategori,kategori,jml, min(harga3) AS harga from pkt_hotel JOIN paket ON paketid=idpaket JOIN kategori_paket ON kategori_id=id_kategori GROUP by paketid ");
		return $hasil;
	}

	function get_paket_list($limit, $start){
        $query = $this->db->get('paket', $limit, $start);
        return $query;
    }
	
	function berita(){
		$hasil=$this->db->query("select * from berita order by tglpost DESC limit 8");
		return $hasil;
	}
	function getpaket($kode){
		$hasil=$this->db->query("select paketid,nama_paket,deskripsi,gambar,harga3, min(harga3) AS harga from pkt_hotel JOIN paket ON paketid=idpaket where idpaket='$kode'");
		return $hasil;
	}
	function gethotel($kode){
		$hasil=$this->db->query("select id_hotel,nama_hotel,rate,paketid,nama_paket from pkt_hotel,paket where id_hotel='$kode' and idpaket=(SELECT paketid from pkt_hotel where id_hotel='$kode')");
		return $hasil;
	}


	function updatedenganimg($kode,$nama_paket,$kategori,$deskripsi,$gambar){
		$hasil=$this->db->query("UPDATE paket SET nama_paket='$nama_paket',deskripsi='$deskripsi',kategori_id='$kategori',gambar='$gambar' WHERE idpaket='$kode'");
		return $hasil;
	}
	function updatepaket($kode,$nama_paket,$kategori,$deskripsi){
		$hasil=$this->db->query("UPDATE paket SET nama_paket='$nama_paket',deskripsi='$deskripsi',kategori_id='$kategori' WHERE idpaket='$kode'");
		return $hasil;
	}

	function hapus_paket($id){
			$this->db->query("delete from galeri_paket where paketid='$id'");
			$this->db->query("delete from orders where paket_id_order='$id'");
			$this->db->query("delete from intinerary where paketid='$id'"); 
			$this->db->query("delete from paket where idpaket='$id'");
			$this->db->trans_complete();
			if($this->db->trans_status()==true)
			return true;
			else
			return false; 
	}

	

	function get_no_order(){
		$q = $this->db->query("SELECT MAX(RIGHT(id_order,6)) AS kd_max FROM orders where date(tanggal)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp); 
            }
        }else{
            $kd = "000001";
        }
        return "INV".date('dmy').$kd;
	}
	function simpan_order($no_order,$nama,$jekel,$alamat,$notelp,$email,$berangkat,$dewasa,$paket,$hotel,$ket){
		$hasil=$this->db->query("INSERT INTO orders(id_order,nama,jenkel,alamat,notelp,email,berangkat,adult,paket_id_order,hotel_order_id,keterangan,tanggal)VALUES('$no_order','$nama','$jekel','$alamat','$notelp','$email','$berangkat','$dewasa','$paket','$hotel','$ket',CURDATE())");
		return $hasil;
	}

	function get_metode(){
		$hasil=$this->db->query("SELECT * FROM metode_bayar");
		return $hasil;
	}

	function get_bayar($kode){
		$hasil=$this->db->query("SELECT * FROM metode_bayar where id_metode='$kode'");
		return $hasil;
	}

	function set_bayar($no_invoice,$id){
		$hasil=$this->db->query("update orders set metode_id='$id' where id_order='$no_invoice'");
		return $hasil;
	}
	
	function faktur(){
		$inv=$this->session->userdata('invoices');
		$hasil=$this->db->query("SELECT id_order,tanggal,nama_paket,adult,keterangan,id_hotel,nama_hotel,rate,harga0,harga1,harga2,harga3,
		CASE WHEN  adult < 3 THEN adult*harga0 WHEN adult < 5 THEN adult*harga1 WHEN adult < 7 THEN adult*harga2 WHEN adult < 9 THEN adult*harga3 END AS total,
		CASE WHEN  adult < 3 THEN harga0 WHEN adult < 5 THEN harga1 WHEN adult < 7 THEN harga2 WHEN adult < 9 THEN harga3 END AS tober,
		berangkat,metode,bank,norek,atasnama,nama,IF(jenkel='L','Male','Female')AS jenkel,alamat,notelp,email FROM orders JOIN metode_bayar ON metode_id=id_metode JOIN paket ON paket_id_order=idpaket JOIN pkt_hotel ON hotel_order_id=id_hotel WHERE id_order='$inv'");
		return $hasil;
	}

	function detail_chart(){
		$kode=$this->session->userdata('invoices');
		$hasil=$this->db->query("SELECT id_order,tanggal,nama_paket,adult,keterangan,id_hotel,nama_hotel,rate,harga0,harga1,harga2,harga3,
		CASE WHEN  adult < 3 THEN adult*harga0 WHEN adult < 5 THEN adult*harga1 WHEN adult < 7 THEN adult*harga2 WHEN adult < 9 THEN adult*harga3 END AS total,
		CASE WHEN  adult < 3 THEN harga0 WHEN adult < 5 THEN harga1 WHEN adult < 7 THEN harga2 WHEN adult < 9 THEN harga3 END AS tober,
		berangkat,nama,IF(jenkel='L','Male','Female')AS jenkel,alamat,notelp,email FROM orders JOIN paket ON paket_id_order=idpaket JOIN pkt_hotel ON hotel_order_id=id_hotel WHERE id_order='$kode'");
		return $hasil;
	}



	function add_like($kode){
		$hsl=$this->db->query("UPDATE paket SET likes=likes+1 where idpaket='$kode'");
		return $hsl;	
	}

	
}