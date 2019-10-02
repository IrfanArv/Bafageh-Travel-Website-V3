<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Paket_tour extends CI_Controller{
	function __construct(){
		parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('backoffice');
            redirect($url);
		};
        $this->load->model('m_paket');
        $this->load->library('upload');
    }
   	 
	function index(){
		if($this->session->userdata('level')=='1'){ 
            $x['data']=$this->m_paket->tampil_paket();
			$x['kat']=$this->m_paket->get_kategori();
			$this->backend->display('backend/v_paket_tour',$x);
			$this->load->view('backend/sidebar.php',$x);
			
		}elseif($this->session->userdata('level')=='3'){
			$x['data']=$this->m_paket->tampil_paket();
			$x['kat']=$this->m_paket->get_kategori();
			$this->backend->display('backend/V_paket_tour',$x);
			$this->load->view('backend/sidepaket.php',$x);			
		}else{
            echo "Halaman tidak ditemukan";
        }	
}


    function simpan_paket(){
    	$config['upload_path'] = './assets/images/paket/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	    $this->upload->initialize($config);
	    if(!empty($_FILES['filefoto']['name'])){
	        if ($this->upload->do_upload('filefoto')){
	        	$gbr = $this->upload->data();
	            //Compress Image
				$config['image_library']='gd2';
				$config['source_image']='./assets/images/paket/'.$gbr['file_name'];
				$config['maintain_ratio']= FALSE;
				$config['quality']= '60%';
				$config['width']= 1400;
				$config['height']= 470;
				$config['master_dim'] = 'width';
				$config['new_image']= './assets/images/paket/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				//Thumb
				$gbr = $this->upload->data();
				$config['image_library']='gd2';
				$config['source_image']='./assets/images/paket/'.$gbr['file_name'];
				$config['new_image']= './assets/images/paket/thumb/'.$gbr['file_name'];
				$config['create_thumb']= TRUE;
				$config['maintain_ratio']= FALSE;
				$config['quality']= '60%';
				$config['width']= 800;
				$config['height']= 533;
				$config['new_image']= './assets/images/paket/thumb/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->initialize($config);
				$this->image_lib->resize();

	            $gambar=$gbr['file_name'];
                $nama_paket=$this->input->post('nama_paket');
				$kategori=$this->input->post('kategori');
				$deskripsi=$this->input->post('deskripsi');
				

				$this->m_paket->SimpanPaket($nama_paket,$kategori,$deskripsi,$gambar);
				echo $this->session->set_flashdata('msg','success');
				redirect('backend/paket_tour');
		}else{
	        echo $this->session->set_flashdata('msg','warning');
	        redirect('backend/paket_tour');
	    }
	                 
	    }else{
			redirect('backend/paket_tour');
		}
    }

    function update_paket(){
	    $config['upload_path'] = './assets/images/paket/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	    $this->upload->initialize($config);
	    if(!empty($_FILES['filefoto']['name'])){
	        if ($this->upload->do_upload('filefoto')){
	            $gbr = $this->upload->data();
	            //Compress Image
				$config['image_library']='gd2';
				$config['source_image']='./assets/images/paket/'.$gbr['file_name'];
				$config['maintain_ratio']= FALSE;
				$config['quality']= '60%';
				$config['width']= 1400;
				$config['height']= 470;
				$config['master_dim'] = 'width';
				$config['new_image']= './assets/images/paket/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				//Thumb
				$gbr = $this->upload->data();
				$config['image_library']='gd2';
				$config['source_image']='./assets/images/paket/'.$gbr['file_name'];
				$config['new_image']= './assets/images/paket/thumb/'.$gbr['file_name'];
				$config['create_thumb']= TRUE;
				$config['maintain_ratio']= FALSE;
				$config['quality']= '60%';
				$config['width']= 800;
				$config['height']= 533;
				$config['new_image']= './assets/images/paket/thumb/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->initialize($config);
				$this->image_lib->resize();

	            $gambar=$gbr['file_name'];
	            $kode=$this->input->post('kode');
                $nama_paket=$this->input->post('nama_paket');
				$kategori=$this->input->post('kategori');
				$deskripsi=$this->input->post('deskripsi');
				$images=$this->input->post('gambar');
				$path='./assets/images/paket/'.$images;
				unlink($path);
				$pathtbl='./assets/images/paket/thumb/'.$images;
				unlink($pathtbl);
				

				$this->m_paket->updatedenganimg($kode,$nama_paket,$kategori,$deskripsi,$gambar);
				echo $this->session->set_flashdata('msg','info');
				redirect('backend/paket_tour');
	                    
	    	}else{
	        	echo $this->session->set_flashdata('msg','warning');
	        	redirect('backend/paket_tour');
	        }       
	    }else{
			$kode=$this->input->post('kode');
            $nama_paket=$this->input->post('nama_paket');
			$kategori=$this->input->post('kategori');
			$deskripsi=$this->input->post('deskripsi');
			
			$this->m_paket->updatepaket($kode,$nama_paket,$kategori,$deskripsi);
			echo $this->session->set_flashdata('msg','info');
			redirect('backend/paket_tour');
	    } 

	}

    function hapus_paket(){
	    
			$id=$this->input->post('kode');
			$gambar=$this->input->post('gambar');
			$path='./assets/images/paket/'.$gambar;
			unlink($path);
			$pathtbl='./assets/images/paket/thumb/'.$gambar;
			unlink($pathtbl);
	        $this->m_paket->hapus_paket($id);
	        echo $this->session->set_flashdata('msg','success-hapus');
	        redirect('backend/paket_tour');
	   
    }

}