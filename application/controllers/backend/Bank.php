<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Bank extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('backoffice');
            redirect($url);
		};
		$this->load->model('m_bank');
		$this->load->library('upload');
    } 

    function index(){
		if($this->session->userdata('level')=='1'){ 
            $x['data']=$this->m_bank->tampil_bank();
            $this->backend->display('backend/v_bank',$x);
			$this->load->view('backend/sidebar.php',$x);
			
		}elseif($this->session->userdata('level')=='3'){
            $x['data']=$this->m_bank->tampil_bank();
            $this->backend->display('backend/v_bank',$x);
			$this->load->view('backend/sidepaket.php',$x);
			
		}else{
            echo "Halaman tidak ditemukan";
        }	
}
	
	function simpan_rekening(){
        $config['upload_path'] = './assets/images/bank'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat dilevel bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/bank'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['max_size']  = '8000';
                $config['new_image']= './assets/images/bank'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
				$norek=$this->input->post('norek');
				$bank=$this->input->post('bank');
				$atasnama=$this->input->post('atasnama');
				$this->m_bank->simpan_rekening($norek,$bank,$atasnama,$gambar);
                echo $this->session->set_flashdata('msg','success');
                redirect('backend/bank');
        }else{
            echo $this->session->set_flashdata('msg','warning');
            redirect('backend/bank');
        }
                     
        }else{
            redirect('backend/bank');
        }
    }

	function update_rekening(){
        $config['upload_path'] = './assets/images/bank'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat dilevel bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/bank'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['max_size']  = '8000';
                $config['new_image']= './assets/images/bank'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $kode=$this->input->post('kode');
				$norek=$this->input->post('norek');
				$bank=$this->input->post('bank');
				$atasnama=$this->input->post('atasnama');

                $this->m_bank->update_rekening_img($kode,$norek,$bank,$atasnama,$gambar);
                echo $this->session->set_flashdata('msg','info');
                redirect('backend/bank');
                        
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('backend/bank');
            }       
        }else{
			$kode=$this->input->post('kode');
			$norek=$this->input->post('norek');
			$bank=$this->input->post('bank');
			$atasnama=$this->input->post('atasnama');
			$this->m_bank->update_rekening($kode,$norek,$bank,$atasnama);
            echo $this->session->set_flashdata('msg','info');
            redirect('backend/bank');
        } 

    }


    function hapus_rekening(){
    	$kode=$this->input->post('kode');
    	$this->m_bank->hapus_rekening($kode);
    	echo $this->session->set_flashdata('msg','success-hapus');
    	redirect('backend/bank');
    }
}