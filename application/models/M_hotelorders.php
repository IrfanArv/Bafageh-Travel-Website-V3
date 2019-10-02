<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_hotelorders extends CI_Model{

    function cek_invoice($kode){
        $hasil=$this->db->query("SELECT * FROM hotel_orders WHERE id_order='$kode'");
        return $hasil;
    }
  
    function get_pembayaran(){
        $hasil=$this->db->query("SELECT id_bayar,tgl_bayar,metode,bank,order_id,
        CASE WHEN adult < 3 THEN adult*harga0 WHEN adult < 5 THEN adult*harga1 WHEN adult < 7 THEN adult*harga2 WHEN adult < 9 THEN adult*harga3 END AS total,
        jumlah,status,bukti_transfer,pengirim FROM pembayaran JOIN orders ON order_id=id_order JOIN metode_bayar ON metode_id_bayar=id_metode JOIN pkt_hotel ON hotel_order_id=id_hotel JOIN paket ON idpaket=paket_id_order GROUP BY order_id");
        return $hasil;
    }
    function get_orders(){
        $hasil=$this->db->query("SELECT id_order,tanggal,nama_paket,nama_hotel,rate,harga1,harga2,harga3,adult,

        CASE WHEN adult < 3 THEN adult*harga0 WHEN adult < 5 THEN adult*harga1 WHEN adult < 7 THEN adult*harga2 WHEN adult < 9 THEN adult*harga3 END AS total,
		CASE WHEN adult < 3 THEN harga0 WHEN adult < 5 THEN harga1 WHEN adult < 7 THEN harga2 WHEN adult < 9 THEN harga3 END AS tober,
        berangkat,metode,bank,norek,atasnama,nama,IF(jenkel='L','Laki-Laki','Perempuan')AS jenkel,alamat,notelp,email,keterangan,status FROM hotel_orders JOIN metode_bayar ON metode_id=id_metode JOIN pkt_hotel ON hotel_order_id=id_hotel JOIN paket ON paket_id_order=idpaket GROUP BY id_order order by tanggal desc");
        return $hasil;
    }
    function bayar_selesai($id){
        $hasil=$this->db->query("UPDATE orders SET status='LUNAS' WHERE id_order='$id'");
        return $hasil;
    }
    function edit_orders($kode,$dewasa){
        $hasil=$this->db->query("UPDATE orders SET adult='$dewasa' WHERE id_order='$kode'");
        return $hasil;
    }
    function hapus_orders($kode){
        $hasil=$this->db->query("delete FROM hotel_orders WHERE id_order='$kode'");
        return $hasil;
    }
    function get_bank(){
        $hasil=$this->db->query("SELECT * FROM metode_bayar WHERE bank<>''");
        return $hasil;
    }
    function simpan_bukti($noinvoice,$nama,$bank,$tgl_bayar,$jumlah,$gambar){
        $hasil=$this->db->query("INSERT INTO pembayaran(tgl_bayar,metode_id_bayar,order_id,jumlah,pengirim,bukti_transfer)VALUES('$tgl_bayar','$bank','$noinvoice','$jumlah','$nama','$gambar')");
        return $hasil;
    }
    function hapus_bayar($kode){
        $hasil=$this->db->query("delete from pembayaran WHERE id_bayar='$kode'");
        return $hasil;
    }

}
