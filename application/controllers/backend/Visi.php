<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Visi extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('backoffice');
            redirect($url);
		};
        $this->load->model('m_visi');
        $this->load->library('upload');
    }
    function index(){
	    if($this->session->userdata('level')=='1'){
	    	$x['data']=$this->m_visi->tampil_visi();
			$this->backend->display('backend/v_visi',$x);
			$this->load->view('backend/sidebar.php',$x);
	    }else{
	        echo "Halaman tidak ditemukan";
	    }
    }

		function simpan_visi(){
				if($this->session->userdata('level')=='1'){
						$content=$this->input->post('content');
						$this->m_visi->simpan_visi($content);
						echo $this->session->set_flashdata('msg','success');
						redirect('backend/visi');
				}else{
						echo "Halaman tidak ditemukan";
				}
		}

		function update_visi(){
        if($this->session->userdata('level')=='1'){
            $id=$this->input->post('kode');
						$content=$this->input->post('content');
            $this->m_visi->update_visi($id,$content);
            echo $this->session->set_flashdata('msg','info');
            redirect('backend/visi');
        }else{
            echo "Halaman tidak ditemukan";
        }
    }

    function hapus_visi(){
	    if($this->session->userdata('level')=='1'){
	        $id=$this->input->post('kode');
	        $this->m_visi->hapus_visi($id);
	        echo $this->session->set_flashdata('msg','success-hapus');
	        redirect('backend/visi');
	    }else{
	        echo "Halaman tidak ditemukan";
	    }
    }

}
