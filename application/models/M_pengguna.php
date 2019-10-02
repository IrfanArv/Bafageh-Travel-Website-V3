<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_pengguna extends CI_Model{

	function simpan_pass($id,$user,$pass){
        $query=$this->db->query("update tbl_admin set admin_username='$user',admin_password=md5('$pass') where idadmin='$id'");
        return $query;
    }
    function ganti_pass($u){
        $query=$this->db->query("select * from tbl_admin where admin_username='$u'");
        return $query;
    }

    function getadmin_username($id){
        $query=$this->db->query("select * from tbl_admin where idadmin='$id'");
        return $query;
    }

    function hapus_user($id){
        $query=$this->db->query("delete from tbl_admin where idadmin='$id'");
        return $query;
    }

    function edit_user($id,$nama,$username,$password,$level){
        $query=$this->db->query("update tbl_admin set nama='$nama',admin_username='$username',admin_password=md5('$password'),level='$level' where idadmin='$id'");
        return $query;
    }

    function update_user_with_img($kode,$nama,$username,$password,$level,$gambar){
        $query=$this->db->query("update tbl_admin set nama='$nama',admin_username='$username',admin_password=md5('$password'),level='$level',photo='$gambar' where idadmin='$kode'");
        return $query;
    }

    function simpan_user($nama,$username,$password,$level,$gambar){
        $query=$this->db->query("insert into tbl_admin(nama,admin_username,admin_password,level,photo)values('$nama','$username',md5('$password'),'$level','$gambar')");
        return $query;
    }
    function pengguna(){
        $query=$this->db->query("SELECT idadmin,nama,admin_username,admin_password,IF(level='1','Super Adminsitrator','Administrator') AS level,photo FROM tbl_admin");
        return $query;
    }

    function edit_profile($kode,$nama,$username,$password){
        $query=$this->db->query("update tbl_admin set nama='$nama',admin_username='$username',admin_password=md5('$password') where idadmin='$kode'");
        return $query;
    }

    function update_profile_with_img($kode,$nama,$username,$password,$gambar){
        $query=$this->db->query("update tbl_admin set nama='$nama',admin_username='$username',admin_password=md5('$password'),photo='$gambar' where idadmin='$kode'");
        return $query;
    }

}