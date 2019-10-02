<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Confirmation extends CI_Controller{
	function __construct(){
		parent::__construct();
		
		$this->load->model('m_orders');
        $this->load->library('upload');
		$this->load->model('m_pengunjung');
		$this->m_pengunjung->count_visitor();
	}
	function index(){
		$x['bnk']=$this->m_orders->get_bank();
		$this->frontend->display('front/v_konfirmasi',$x);
	}
	
	function upload(){
		$kode=$this->input->post('invoice');
		$data=$this->m_orders->cek_invoice($kode);
		$q=$data->num_rows();
		if($q>0){
			$nmfile = "file_".time(); 
			$config['upload_path'] = './assets/images/buktitrf/'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '15048'; 
			$config['max_width']  = '9588'; 
			$config['max_height']  = '7000'; 
			$config['file_name'] = $nmfile; 

			$this->upload->initialize($config);
			if($_FILES['filefoto']['name'])
			{
				if ($this->upload->do_upload('filefoto'))
				{
						$gbr = $this->upload->data();
						$gambar=$gbr['file_name'];
						$noinvoice=strip_tags(str_replace("'", "",$this->input->post('invoice')));
						$nama=strip_tags(str_replace("'", "",$this->input->post('nama')));
                        $bank=$this->input->post('bank');
                        $tgl_bayar=$this->input->post('tgl_bayar');
                        $jumlah=strip_tags(str_replace("'", "",$this->input->post('jumlah')));
						
				if($gambar==true){
					$this->m_orders->simpan_bukti($noinvoice,$nama,$bank,$tgl_bayar,$jumlah,$gambar);
				}else{
					redirect('confirmation');
				}
				echo $this->session->set_flashdata('msg','info');
				 redirect('confirmation');
			}  } 

		}else{ 
			echo $this->session->set_flashdata('msg','error');
			redirect('confirmation');
		}
	}
}
