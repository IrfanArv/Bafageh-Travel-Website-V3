<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Product extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('backoffice');
            redirect($url);
		};
        $this->load->model('m_product');
        $this->load->library('upload');
    }
    function index(){
	    if($this->session->userdata('level')=='1'){
	    	$x['data']=$this->m_product->tampil_product();
			$this->backend->display('backend/v_product',$x);
			$this->load->view('backend/sidebar.php',$x);
	    }else{
	        echo "Halaman tidak ditemukan";
	    }
    }

		function simpan_product(){
				if($this->session->userdata('level')=='1'){
						$icon=$this->input->post('icon');
						$title=$this->input->post('title');
						$content=$this->input->post('content');
						$this->m_product->simpan_product($icon,$title,$content);
						echo $this->session->set_flashdata('msg','success');
						redirect('backend/product');
				}else{
						echo "Halaman tidak ditemukan";
				}
		}

		function update_product(){
        if($this->session->userdata('level')=='1'){
            $id=$this->input->post('kode');
						$icon=$this->input->post('icon');
						$title=$this->input->post('title');
						$content=$this->input->post('content');
            $this->m_product->update_product($id,$icon,$title,$content);
            echo $this->session->set_flashdata('msg','info');
            redirect('backend/product');
        }else{
            echo "Halaman tidak ditemukan";
        }
    }

    function hapus_product(){
	    if($this->session->userdata('level')=='1'){
	        $id=$this->input->post('kode');
	        $this->m_product->hapus_product($id);
	        echo $this->session->set_flashdata('msg','success-hapus');
	        redirect('backend/product');
	    }else{
	        echo "Halaman tidak ditemukan";
	    }
    }

}
