<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class About extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_pengunjung');
        $this->m_pengunjung->count_visitor();
        $this->load->model('m_product');
        $this->load->model('m_prestasi');
        $this->load->model('m_home');
        $this->load->model('m_visi');
        $this->load->model('m_misi');
        $this->load->model('m_fasilitas');
		
	}
	function index(){
       
        $x['product']=$this->m_product->tampil_product();
        $x['prestasi']=$this->m_prestasi->tampil_prestasi();
       
        $x['sambutan']=$this->m_home->tampil_sambutan();
        $x['filosofi']=$this->m_home->tampil_filosofi();
        $x['sejarah']=$this->m_home->tampil_sejarah();
		$x['visi']=$this->m_visi->tampil_visi();
		$x['misi']=$this->m_misi->tampil_misi();
		$x['fasilitas']=$this->m_fasilitas->tampil_fasilitas();
      
		$this->frontend->display('front/v_about', $x);
	}
}