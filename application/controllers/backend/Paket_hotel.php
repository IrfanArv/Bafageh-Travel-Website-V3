<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Paket_hotel extends CI_Controller{
	function __construct(){
        parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('backoffice');
            redirect($url);
		};
        $this->load->model('m_pkthotel');
        $this->load->library('upload'); 
    }

    function index(){
		if($this->session->userdata('level')=='1'){ 
            $x['data']=$this->m_pkthotel->tampil_hotel();
            $x['pkt']=$this->m_pkthotel->get_paket();
            $this->backend->display('backend/V_paket_hotel',$x);
			$this->load->view('backend/sidebar.php',$x);
			
		}elseif($this->session->userdata('level')=='3'){
            $x['data']=$this->m_pkthotel->tampil_hotel();
            $x['pkt']=$this->m_pkthotel->get_paket();
            $this->backend->display('backend/V_paket_hotel',$x);
			$this->load->view('backend/sidepaket.php',$x);			
		}else{
            echo "Halaman tidak ditemukan";
        }	
}

function simpan_hotel(){
    $nama_hotel=$this->input->post('nama_hotel');
    $room=$this->input->post('room');
    $rate=mysql_real_escape_string($this->input->post('rate'));
    $harga0=$this->input->post('harga0');
    $harga1=$this->input->post('harga1');
    $harga2=$this->input->post('harga2');
    $harga3=$this->input->post('harga3');
    $paketid=$this->input->post('paketid');
    $linkweb=$this->input->post('linkweb');
    $this->m_pkthotel->SimpanHotel($nama_hotel,$room,$rate,$harga0,$harga1,$harga2,$harga3,$paketid,$linkweb);
    echo $this->session->set_flashdata('msg','success');
    redirect('backend/paket_hotel');

}

function edit_hotel(){
    $id=$this->input->post('kode');
    $nama_hotel=$this->input->post('nama_hotel');
    $room=$this->input->post('room');
    $rate=$this->input->post('rate');
    $harga0=$this->input->post('harga0');
    $harga1=$this->input->post('harga1');
    $harga2=$this->input->post('harga2');
    $harga3=$this->input->post('harga3');
    $paketid=$this->input->post('paketid');
    $linkweb=$this->input->post('linkweb');
    $this->m_pkthotel->update_hotel($id,$nama_hotel,$room,$rate,$harga0,$harga1,$harga2,$harga3,$paketid,$linkweb);
    echo $this->session->set_flashdata('msg','info');
    redirect('backend/paket_hotel');
}

function hapus_hotel(){
       
            $id=$this->input->post('kode');
            $this->m_pkthotel->hapus_hotel($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('backend/paket_hotel');
        
    }


}
