<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengguna extends CI_Controller{
	function __construct(){
        parent::__construct();
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('backoffice');
            redirect($url);
		};
        $this->load->model('m_pengguna');
        $this->load->library('upload');
    }
    function index(){
       
        	$x['data']=$this->m_pengguna->pengguna();
            $this->backend->display('backend/V_pengguna',$x);
            $this->load->view('backend/sidebar.php',$x);
       
    }

  
    function profile(){
		if($this->session->userdata('level')=='1'){  //SUPER ADMINISTRATOR
            $id=$this->uri->segment(4);
            $x['data']=$this->m_pengguna->getadmin_username($id);
            $this->backend->display('backend/v_profile',$x);
            $this->load->view('backend/sidebar.php',$x); 
		}elseif($this->session->userdata('level')=='2'){ //VALAS
			$id=$this->uri->segment(4);
        $x['data']=$this->m_pengguna->getadmin_username($id);
        $this->backend->display('backend/v_profile',$x);
        $this->load->view('backend/sidevalas.php',$x); 
		
		}elseif($this->session->userdata('level')=='3'){ //PAKET
			$id=$this->uri->segment(4);
        $x['data']=$this->m_pengguna->getadmin_username($id);
        $this->backend->display('backend/v_profile',$x);
        $this->load->view('backend/sidepaket.php',$x); 
		
		}elseif($this->session->userdata('level')=='4'){ //HOTEL
			$id=$this->uri->segment(4);
        $x['data']=$this->m_pengguna->getadmin_username($id);
        $this->backend->display('backend/v_profile',$x);
        $this->load->view('backend/sidehotel.php',$x); 
		
		}elseif($this->session->userdata('level')=='5'){ //KASIR
			$id=$this->uri->segment(4);
        $x['data']=$this->m_pengguna->getadmin_username($id);
        $this->backend->display('backend/v_profile',$x);
        $this->load->view('backend/sidekasir.php',$x); 
		
		}		
		
	}

    function simpan_pengguna(){
        $config['upload_path'] = './assets/images/users/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat dilevel bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/users/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                $config['width']= 300;
                $config['height']= 300;
                $config['new_image']= './assets/images/users/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $nama=$this->input->post('nama');
                $username=$this->input->post('user');
                $password=$this->input->post('pass');
                $password2=$this->input->post('pass2');
                $level=$this->input->post('level');

                if($password <> $password2){
                    echo $this->session->set_flashdata('msg','error');
                    redirect('backend/pengguna');
                }else{
                    $this->m_pengguna->simpan_user($nama,$username,$password,$level,$gambar);
                    echo $this->session->set_flashdata('msg','success');
                    redirect('backend/pengguna'); 
                }
                
        }else{
            echo $this->session->set_flashdata('msg','warning');
            redirect('backend/pengguna');
        }
                     
        }else{
            redirect('backend/pengguna');
        }
    }

    function update_pengguna(){
        $config['upload_path'] = './assets/images/users/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat dilevel bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/users/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                $config['width']= 300;
                $config['height']= 300;
                $config['new_image']= './assets/images/users/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $kode=$this->input->post('kode');
                $nama=$this->input->post('nama');
                $username=$this->input->post('user');
                $password=$this->input->post('pass');
                $password2=$this->input->post('pass2');
                $level=$this->input->post('level');

                if($password <> $password2){
                    echo $this->session->set_flashdata('msg','error');
                    redirect('backend/pengguna');
                }else{
                    $this->m_pengguna->update_user_with_img($kode,$nama,$username,$password,$level,$gambar);
                    echo $this->session->set_flashdata('msg','info');
                    redirect('backend/pengguna'); 
                }
                
        }else{
            echo $this->session->set_flashdata('msg','warning');
            redirect('backend/pengguna');
        }
                     
        }else{
            $id=$this->input->post('kode');
            $nama=$this->input->post('nama');
            $username=$this->input->post('user');
            $password=$this->input->post('pass');
            $password2=$this->input->post('pass2');
            $level=$this->input->post('level');

            if($password <> $password2){
                echo $this->session->set_flashdata('msg','error');
                redirect('backend/pengguna');
            }else{
                $this->m_pengguna->edit_user($id,$nama,$username,$password,$level);
                echo $this->session->set_flashdata('msg','info');
                redirect('backend/pengguna'); 
            }
        }
    }

    function update_profile(){
        $config['upload_path'] = './assets/images/users/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat dilevel bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
            if ($this->upload->do_upload('filefoto')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']='gd2';
                $config['source_image']='./assets/images/users/'.$gbr['file_name'];
                $config['create_thumb']= FALSE;
                $config['maintain_ratio']= FALSE;
                $config['quality']= '60%';
                $config['width']= 300;
                $config['height']= 300;
                $config['new_image']= './assets/images/users/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $kode=$this->input->post('kode');
                $nama=$this->input->post('nama');
                $username=$this->input->post('user');
                $password=$this->input->post('pass');
                $password2=$this->input->post('pass2');
                $images=$this->input->post('gambar');
				$path='./assets/images/users/'.$images;
				unlink($path);
                

                if($password <> $password2){
                    echo $this->session->set_flashdata('msg','error');
                    redirect('backend/pengguna/profile/'.$kode);
                }else{
                    $this->m_pengguna->update_profile_with_img($kode,$nama,$username,$password,$gambar);
                    echo $this->session->set_flashdata('msg','info');
                    redirect('backend/pengguna/profile/'.$kode); 
                }
                
        }else{
            echo $this->session->set_flashdata('msg','warning');
            redirect('backend/pengguna/profile/'.$kode);
        }
                     
        }else{
            $kode=$this->input->post('kode');
            $nama=$this->input->post('nama');
            $username=$this->input->post('user');
            $password=$this->input->post('pass');
            $password2=$this->input->post('pass2');
           
            if($password <> $password2){
                echo $this->session->set_flashdata('msg','error');
                redirect('backend/pengguna/profile/'.$kode);
            }else{
                $this->m_pengguna->edit_profile($kode,$nama,$username,$password);
                echo $this->session->set_flashdata('msg','info');
                redirect('backend/pengguna/profile/'.$kode); 
            }
        }
    }
    
    function hapus_user(){
        if($this->session->userdata('level')=='1'){
            $id=$this->input->post('kode');
            $this->m_pengguna->hapus_user($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('backend/pengguna'); 
        }else{
            echo "Halaman tidak ditemukan";
        }
    }

	
}