<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper('tgl_indo');
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('backoffice');
            redirect($url);
		};
		$this->load->model('m_valas');
        $this->load->library('upload');
		$this->load->model('m_pengunjung'); 
		$this->load->model('m_home');  
		$this->load->model('m_orders');
		$this->load->model('m_hotel'); 
		
	}
	function index(){
		if($this->session->userdata('level')=='1'){  //SUPER ADMINISTRATOR
		$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
		$x['sthotelorders'] = $this->m_home->sthotelorders();
		$this->backend->display('backend/V_dashboard',$x);
		$this->load->view('backend/sidebar',$x);
		}elseif($this->session->userdata('level')=='2'){ //VALAS
			$x['data']=$this->m_valas->tampil_valas();
			$x['tgl_update']=$this->m_valas->get_tgl(true);
			$this->backend->display('backend/v_valas',$x);
			$this->load->view('backend/sidevalas.php',$x);
		
		}elseif($this->session->userdata('level')=='3'){ //PAKET
			$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
			$this->backend->display('backend/V_dashpaket',$x);
			$this->load->view('backend/sidepaket.php',$x);
		
		}elseif($this->session->userdata('level')=='4'){ //HOTEL
			$x['visitor'] = $this->m_pengunjung->statistik_pengujung(); 
			$this->backend->display('backend/V_dashhotel',$x);
			$this->load->view('backend/sidehotel.php',$x);
		
		}elseif($this->session->userdata('level')=='5'){ //KASIR
			$x['visitor'] = $this->m_pengunjung->statistik_pengujung();
			$x['paket']=$this->m_orders->get_pembayaran();
			$x['hoteloff']=$this->m_hotel->dealskasir(); 
			$this->backend->display('backend/V_dashkasir',$x);
			$this->load->view('backend/sidekasir.php',$x);
		
		}		
		
	}
	
}