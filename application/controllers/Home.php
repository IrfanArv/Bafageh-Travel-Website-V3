<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
		$this->load->model('m_valas');
		$this->load->model('m_destinasi');
		$this->load->model('m_hotel');
		$this->load->model('m_hotelfasilitas'); 
		$this->load->model('m_paket');
	}
	function index(){
		$x['get_hotel']=$this->m_hotel->hotel_home();
		$x['data']=$this->m_valas->tampil_valas();
		$x['tgl_update']=$this->m_valas->get_tgl(true);
		$x['paket']=$this->m_paket->tampil_paket();
		$x['paket']=$this->m_paket->harga_hotel();
		$x['des']=$this->m_destinasi->get_all_destinasi();
		$this->frontend->display('front/HomeV', $x);
	}

	function findhotel(){
		$hotel=$this->input->post('hotel',TRUE);
		$kota=$this->input->post('kota', TRUE);
		$x['data']=$this->m_hotel->cari_hotel($hotel,$kota);
		$this->frontend->display('front/findhtl',$x);
	}


}