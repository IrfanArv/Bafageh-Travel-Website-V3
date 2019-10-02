<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Intinerary extends CI_Controller{
	function __construct(){
        parent::__construct();
        if(!isset($_SESSION['logged_in'])){
            $url=base_url('backoffice');
            redirect($url);
        };
        $this->load->model('m_intinerary');
    }

    function index(){
		if($this->session->userdata('level')=='1'){ 
            $x['data']=$this->m_intinerary->tampil_intinerary();
            $x['pkt']=$this->m_intinerary->get_paket();
            $this->backend->display('backend/v_intinerary',$x);
			$this->load->view('backend/sidebar.php',$x);
			
		}elseif($this->session->userdata('level')=='3'){
			$x['data']=$this->m_intinerary->tampil_intinerary();
            $x['pkt']=$this->m_intinerary->get_paket();
            $this->backend->display('backend/v_intinerary',$x);
			$this->load->view('backend/sidepaket.php',$x);			
		}else{
            echo "Halaman tidak ditemukan";
        }	
}

	function simpan_intinerary(){
      
                $title_intinerary=$this->input->post('title_intinerary');
                $content_intinerary=$this->input->post('content_intinerary');
                $nama_paket=$this->input->post('paketid');
                $this->m_intinerary->SimpanIntinerary($title_intinerary,$content_intinerary,$nama_paket);
                echo $this->session->set_flashdata('msg','success');
                redirect('backend/intinerary');
        
        }

        function update_intinerary(){
           
                $id=$this->input->post('kode');
                $title_intinerary=$this->input->post('title_intinerary');
                $content_intinerary=$this->input->post('content_intinerary');
                $paket=$this->input->post('paketid');
                $this->m_intinerary->update_intinerary($id,$title_intinerary,$content_intinerary,$paket);
                echo $this->session->set_flashdata('msg','info');
                redirect('backend/intinerary');
            
        }

    function hapus_intinerary(){
        
            $id=$this->input->post('kode');
            $this->m_intinerary->hapus_intinerary($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('backend/intinerary');
        
    }


}
