<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hotel extends CI_Controller{
	function __construct(){
        parent::__construct(); 
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('backoffice');
            redirect($url);
		};
		$this->load->database();
		$this->load->model('m_destinasi');
		$this->load->model('m_hotel');
		$this->load->model('m_pengguna');
		$this->load->model('m_hotelfasilitas'); 
		$this->load->model('m_orders');
		$this->load->library('upload');
	}

/*hotel */

	function index(){
		if($this->session->userdata('level')=='1'){ 
			$x['data']=$this->m_hotel->get_all_hotel();
			$x['fas']=$this->m_hotelfasilitas->get_fasilitasroom(); 
			$this->backend->display('backend/hotel/list',$x);
			$this->load->view('backend/sidebar.php',$x); 
			
		}elseif($this->session->userdata('level')=='4'){
		$x['data']=$this->m_hotel->get_all_hotel();
		$x['fas']=$this->m_hotelfasilitas->get_fasilitasroom();
		$this->backend->display('backend/hotel/list',$x);
		$this->load->view('backend/sidehotel.php',$x); 	
		}else{
            echo "Halaman tidak ditemukan";
        }	
}

	function add_hotel(){
		if($this->session->userdata('level')=='1'){ 
			$x['des']=$this->m_destinasi->get_all_destinasi();
			$x['fas']=$this->m_hotelfasilitas->get_fasilitas();
			$this->backend->display('backend/hotel/add',$x);
			$this->load->view('backend/sidebar.php',$x); 
			
		}elseif($this->session->userdata('level')=='4'){
			$x['des']=$this->m_destinasi->get_all_destinasi();
			$x['fas']=$this->m_hotelfasilitas->get_fasilitas();
			$this->backend->display('backend/hotel/add',$x);
			$this->load->view('backend/sidehotel.php',$x); 	
		}else{
            echo "Halaman tidak ditemukan";
        }	
}

	function get_edit(){
		if($this->session->userdata('level')=='1'){ 
		$kode=$this->uri->segment(4);
		$x['data']=$this->m_hotel->get_hotel_by_kode($kode);
		$x['des']=$this->m_destinasi->get_all_destinasi();
		$x['fas']=$this->m_hotelfasilitas->get_fasilitas();
		$x['gal']=$this->m_hotel->galleri($kode);
		$this->backend->display('backend/hotel/edit',$x);
		$this->load->view('backend/sidebar.php',$x); 
			
		}elseif($this->session->userdata('level')=='4'){
			$kode=$this->uri->segment(4);
			$x['data']=$this->m_hotel->get_hotel_by_kode($kode);
			$x['des']=$this->m_destinasi->get_all_destinasi();
			$x['fas']=$this->m_hotelfasilitas->get_fasilitas(); 
			$x['gal']=$this->m_hotel->galleri($kode);
			$this->backend->display('backend/hotel/edit',$x);
			$this->load->view('backend/sidehotel.php',$x); 
		}else{
            echo "Halaman tidak ditemukan";
        }	
}

	function get_detail(){
		if($this->session->userdata('level')=='1'){ 
			$kode=$this->uri->segment(4);
			$x['data']=$this->m_hotel->get_hotel_by_kode($kode);
			$x['rm']=$this->m_hotel->room($kode);
			$x['gal']=$this->m_hotel->galleri($kode);
			$this->backend->display('backend/hotel/detail',$x);
			$this->load->view('backend/sidebar.php',$x); 
			
		}elseif($this->session->userdata('level')=='4'){
			$kode=$this->uri->segment(4);
		$x['data']=$this->m_hotel->get_hotel_by_kode($kode);
		$x['rm']=$this->m_hotel->room($kode);
		$x['gal']=$this->m_hotel->galleri($kode);
		$this->backend->display('backend/hotel/detail',$x);
		$this->load->view('backend/sidehotel.php',$x); 
		}else{
            echo "Halaman tidak ditemukan";
        }	
}

	
	function hapus_hotel(){
		$kode=$this->input->post('kode');
		$gambar=$this->input->post('gambar');
		$path='./assets/images/hotel/'.$gambar;
		unlink($path);
		$pathtbl='./assets/images/hotel/thumb/'.$gambar;
		unlink($pathtbl);
		$this->m_hotel->hapus_hotel($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('backend/hotel');
	}

	function simpan_hotel(){
				$config['upload_path'] = './assets/images/hotel/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/hotel/'.$gbr['file_name'];
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 1400;
							$config['height']= 470;
							$config['master_dim'] = 'width';
	                        $config['new_image']= './assets/images/hotel/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
							$this->image_lib->resize();
							//Thumb
							$gbr = $this->upload->data();
	                        $config['image_library']='gd2';
							$config['source_image']='./assets/images/hotel/'.$gbr['file_name'];
							$config['new_image']= './assets/images/hotel/thumb/'.$gbr['file_name'];
							$config['create_thumb']= TRUE;
							$config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 800;
	                        $config['height']= 533;
							$this->load->library('image_lib', $config);
							$this->image_lib->initialize($config);
	                        $this->image_lib->resize();

							$gambar=$gbr['file_name'];
							$destinasi_id=$this->input->post('destinasi_id');
							$judul=strip_tags($this->input->post('judul'));
							$filter=str_replace("?", "", $judul);
							$filter2=str_replace("$", "", $filter);
							$pra_slug=$filter2.'.html'; 
							$slug=strtolower(str_replace(" ", "-", $pra_slug));
							$rate=strip_tags($this->input->post('rate'));
							$deskripsi=$this->input->post('deskripsi');
							$alamat=strip_tags($this->input->post('alamat'));
							$lat=strip_tags($this->input->post('lat'));
							$lng=strip_tags($this->input->post('lng'));
							$email=strip_tags($this->input->post('email'));
							$phone=strip_tags($this->input->post('telp'));
							$web=strip_tags($this->input->post('web'));	
							$this->m_hotel->simpan_hotel($destinasi_id,$judul,$slug,$rate,$deskripsi,$alamat,$lat,$lng,$email,$phone,$web,$gambar);
							echo $this->session->set_flashdata('msg','success');
							redirect('backend/hotel');  
							}else{
								echo $this->session->set_flashdata('msg','warning');
								redirect('backend/hotel');
							}
										
							}else{
								redirect('backend/hotel');
							}
						}


		function edit_hotel(){
				$config['upload_path'] = './assets/images/hotel/'; //path folder
	            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	            $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	            $this->upload->initialize($config);
	            if(!empty($_FILES['filefoto']['name']))
	            {
	                if ($this->upload->do_upload('filefoto'))
	                {
	                        $gbr = $this->upload->data();
	                        //Compress Image
	                        $config['image_library']='gd2';
	                        $config['source_image']='./assets/images/hotel/'.$gbr['file_name'];
	                        $config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 1400;
							$config['height']= 470;
							$config['master_dim'] = 'width';
	                        $config['new_image']= './assets/images/hotel/'.$gbr['file_name'];
	                        $this->load->library('image_lib', $config);
							$this->image_lib->resize();
							//Thumb
							$gbr = $this->upload->data();
	                        $config['image_library']='gd2';
							$config['source_image']='./assets/images/hotel/'.$gbr['file_name'];
							$config['new_image']= './assets/images/hotel/thumb/'.$gbr['file_name'];
							$config['create_thumb']= TRUE;
							$config['maintain_ratio']= FALSE;
	                        $config['quality']= '60%';
	                        $config['width']= 800;
	                        $config['height']= 533;
							$this->load->library('image_lib', $config);
							$this->image_lib->initialize($config);
	                        $this->image_lib->resize();

							$gambar=$gbr['file_name'];
							$id_hotel=$this->input->post('id_hotel');							
							$judul=strip_tags($this->input->post('judul'));
							$filter=str_replace("?", "", $judul);
							$filter2=str_replace("$", "", $filter);
							$pra_slug=$filter2.'.html';
							$slug=strtolower(str_replace(" ", "-", $pra_slug));
							$deskripsi=$this->input->post('deskripsi');
							$alamat=strip_tags($this->input->post('alamat'));
							$lat=strip_tags($this->input->post('lat'));
							$lng=strip_tags($this->input->post('lng'));
							$email=strip_tags($this->input->post('email'));
							$phone=strip_tags($this->input->post('telp'));
							$web=strip_tags($this->input->post('web'));	 
							$images=$this->input->post('gambar');
							$path='./assets/images/hotel/'.$images;
							unlink($path);
							$pathtbl='./assets/images/hotel/thumb/'.$images;
							unlink($pathtbl);		
								
							$this->m_hotel->update_hotel($id_hotel,$judul,$slug,$deskripsi,$alamat,$lat,$lng,$email,$phone,$web,$gambar);
							echo $this->session->set_flashdata('msg','info');
							redirect('backend/hotel/get_detail/'.$id_hotel);       
					
						}else{
							echo $this->session->set_flashdata('msg','warning');
							redirect('backend/hotel/get_detail/'.$id_hotel);
						}
						
					}else{
							$id_hotel=$this->input->post('id_hotel');							
							$judul=strip_tags($this->input->post('judul'));
							$filter=str_replace("?", "", $judul);
							$filter2=str_replace("$", "", $filter);
							$pra_slug=$filter2.'.html';
							$slug=strtolower(str_replace(" ", "-", $pra_slug));
							$deskripsi=strip_tags($this->input->post('deskripsi'));
							$alamat=strip_tags($this->input->post('alamat'));
							$lat=strip_tags($this->input->post('lat'));
							$lng=strip_tags($this->input->post('lng'));
							$email=strip_tags($this->input->post('email'));
							$phone=strip_tags($this->input->post('telp'));
							$web=strip_tags($this->input->post('web'));	
							
							$this->m_hotel->update_hotel_noimg($id_hotel,$judul,$slug,$deskripsi,$alamat,$lat,$lng,$email,$phone,$web);
							echo $this->session->set_flashdata('msg','info');
							redirect('backend/hotel/get_detail/'.$id_hotel);  
					}
				}

/*Galleri Manajemen */
function upload_galeri() 
    { 
		$id_hotel=$this->input->post('id_hotel');
		$slug=$this->input->post('slug');    
        if(isset($_FILES['userfile']) && $_FILES['userfile']['error'] != '4') :
            $files = $_FILES;
            $count = count($_FILES['userfile']['name']); // count element 
            for($i=0; $i<$count; $i++):
                $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                $config['upload_path'] = './uploads/hotel/';
                $target_path = './uploads/hotel/thumbs/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '30000'; //limit 1 mb
				$config['overwrite'] = true;
				

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                $this->upload->do_upload('userfile');
                $fileName = $_FILES['userfile']['name'];
                $data = array('upload_data' => $this->upload->data()); 
                if(!$this->upload->do_upload('userfile'))
                {
                   $error = array('upload_error' => $this->upload->display_errors());
                   $this->session->set_flashdata('error',  $error['upload_error']); 
                   echo $files['userfile']['name'][$i].' '.$error['upload_error']; exit;

                } // resize code
                $path=$data['upload_data']['full_path'];
                 $q['name']=$data['upload_data']['file_name'];
                 $configi['image_library'] = 'gd2';
                 $configi['source_image']   = $path;
                 $configi['new_image']   = $target_path;
				 $configi['maintain_ratio'] = FALSE;
				 $configi['master_dim'] = 'width';
                 $configi['width']  = 1000; // new size
				 $configi['height'] = 667;
				
//Remove space error
                $this->load->library('image_lib');
                $this->image_lib->initialize($configi);    
                $this->image_lib->resize();
                $images[] = $fileName;
                $image_upload = array('hotel_id' => $id_hotel, 'slug_hotel' => $slug, 'nama_foto' => $fileName);
                $this ->db-> insert ('hotel_file',$image_upload); 
                         
        endfor;
        endif;
        echo $this->session->set_flashdata('msg','info');
		redirect('backend/hotel/get_detail/'.$id_hotel);  
	}
	
	


/* End Gambar */

/* Fasilitas Hotel*/

function add_fasilitas(){
	$hotel_id=$this->input->post('hotel_id');
	$fasilitas_id=$this->input->post('fasilitas');
	foreach($fasilitas_id as $fashotel)
	$this->m_hotel->add_fasilitas($hotel_id,$fashotel);
	echo $this->session->set_flashdata('msg','info');
	redirect('backend/hotel');  


}

/* End Fasilitas Hotel*/

/*end hotel */

/*Transaki Hotel */


		function deals(){
			if($this->session->userdata('level')=='1'){  
				$x['data']=$this->m_hotel->deals();
				$x['des']=$this->m_destinasi->get_all_destinasi();
				$this->backend->display('backend/V_Hotelords',$x);
				$this->load->view('backend/sidebar.php',$x); 
				
			}elseif($this->session->userdata('level')=='4'){
				$x['data']=$this->m_hotel->deals();
				$x['des']=$this->m_destinasi->get_all_destinasi();
				$this->backend->display('backend/V_Hotelords',$x);
				$this->load->view('backend/sidehotel.php',$x); 
			}elseif($this->session->userdata('level')=='5'){
				$x['hoteloff']=$this->m_hotel->deals();
				$x['paket']=$this->m_orders->get_pembayaran();
				$x['des']=$this->m_destinasi->get_all_destinasi();
				$this->backend->display('backend/V_dashkasir',$x);
				$this->load->view('backend/sidekasir.php',$x);
			}
	}

		function save(){  
			error_reporting(0);
			$no_order=$this->m_hotel->get_no_order();
			$hotel=$this->input->post('hotel');
			$room=$this->input->post('room');
			$start=($this->input->post('date_start')); 
			$date_start= date('Y-m-d', strtotime($start));
			$end=($this->input->post('end_date'));
			$end_date= date('Y-m-d', strtotime($end));			
			$total_room=$this->input->post('total_room');
			$name=strip_tags($this->input->post('name'));
			$email=strip_tags($this->input->post('email'));
			$adult=strip_tags($this->input->post('adult'));
			$kids=strip_tags($this->input->post('kids'));
			$req=strip_tags($this->input->post('req'));
			$price=$this->input->post('price');
			$kat=$this->input->post('kat');
			$id=$this->session->userdata('idadmin');
			$user=$this->m_pengguna->getadmin_username($id); 
			$p=$user->row_array();
			$user_id=$p['idadmin'];
			$con=strip_tags($this->input->post('con'));
			$this->m_hotel->save_deals($no_order,$hotel,$room,$date_start,$end_date,$total_room,$name,$email,$adult,$kids,$req,$price,$kat,$user_id,$con);
			echo $this->session->set_flashdata('msg','success-hapus');
		redirect('backend/hotel/deals');       
		}

		function edit(){
			$kode=$this->input->post('kode');
			$name=$this->input->post('name');
			$adult=$this->input->post('adult');
			$kids=$this->input->post('kids');
			$date_start=($this->input->post('start'));
			$start= date('Y-m-d', strtotime($date_start));
			$end_date=($this->input->post('end'));
			$end= date('Y-m-d', strtotime($end_date));	
			$total_room=$this->input->post('total_room');
			$req=$this->input->post('req');
			$kat=$this->input->post('kat');
			$con=$this->input->post('con');
			$this->m_hotel->update_deals($kode,$name,$adult,$kids,$start,$end,$total_room,$req,$kat,$con);
			echo $this->session->set_flashdata('msg','info');
			redirect('backend/hotel/deals');
		}



		function done(){
			if($this->session->userdata('level')=='1'){ 
				$kode=$this->uri->segment(4);
				$this->m_hotel->done($kode);
				echo $this->session->set_flashdata('msg','success');
				redirect('backend/hotel/deals'); 
			}elseif($this->session->userdata('level')=='4'){
				$kode=$this->uri->segment(4);
			$this->m_hotel->done($kode);
			echo $this->session->set_flashdata('msg','success');
			redirect('backend/hotel/deals'); 
			}elseif($this->session->userdata('level')=='5'){
				$kode=$this->uri->segment(4);
			$this->m_hotel->done($kode);
			echo $this->session->set_flashdata('msg','success');
			redirect('backend/dashboard'); 
			}
	}

	
		function send(){

			$this->load->library('m_pdf');
			$kode=$this->uri->segment(4);
			$x['data']=$this->m_hotel->itemMail($kode);
			$html = $this->load->view('backend/Voucher',$x, TRUE);		
			$this->pdf->AddPage('P', 'A5', 0, 'Trebuchet MS', 0, 0, 0, 0, 0, 0, 'P');
			$this->pdf->SetWatermarkText('No Cancellation & Non Refundable');
			$this->pdf->watermarkTextAlpha = 0.081;
			$this->pdf->watermark_font = 'DejaVuSansCondensed';
			$this->pdf->showWatermarkText = true;
		   
			$this->pdf->WriteHTML(utf8_encode($html));
			$content = $this->pdf->Output('', 'S');
			$filename = "BAFAGEH VOUCHER HOTEL.pdf";

			$this->load->library('email');
			$kode=$this->uri->segment(4);
			$x['data']=$this->m_hotel->itemMail($kode);
			$toemail=$this->m_hotel->selectMail($kode);
			$x['up']=$this->m_hotel->updatestatus($kode);
		
			foreach ($toemail->result_array() as $hotel_email){
				$hotel_email['hotel_email'];
			}
			
			$subject = "Bafageh Hotel Reservation | Voucher Hotel";
			$data=array();
		
			$mesg = $this->load->view("template/email", $x, TRUE);

			$config=array(
				'useragent' => 'CodeIgniter',
				'protocol'  => 'smtp',
				'mailpath'  => '/usr/sbin/sendmail',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_user' => 'bafageh.hotel@gmail.com',   
				'smtp_pass' => 'hotel1234',     
				'smtp_port' => 465,
				'smtp_keepalive' => TRUE,
				'smtp_crypto' => 'SSL',
				'wordwrap'  => TRUE,
				'wrapchars' => 80,
				'mailtype'  => 'html',
				'charset'   => 'utf-8',
				'validate'  => TRUE,
				'crlf'      => "\r\n",
				'newline'   => "\r\n",
			);
				

			$this->email->initialize($config);
			$this->email->to($hotel_email);
			$this->email->from('no-reply@bafageh.com', 'Bafageh Hotel Reservation');
			$this->email->subject($subject);
			$this->email->attach($content, 'attachment', $filename, 'application/libraries/M_pdf');
			$this->email->message($mesg);

			if ($mail =$this->email->send()) 
			{
				echo $this->session->set_flashdata('msg','mail');
				redirect('backend/hotel/deals');
			}
			else
			{
				echo $this->session->set_flashdata('msg','gagal');
				redirect('backend/hotel/deals');
			}
		}

		function cetak()
		{
			$this->load->library('m_pdf');
			$kode=$this->uri->segment(4);
			$x['data']=$this->m_hotel->itemMail($kode);
			$html = $this->load->view('backend/Voucher',$x, TRUE);		

			$this->pdf->SetWatermarkText('No Cancellation & Non Refundable');
			$this->pdf->watermarkTextAlpha = 0.081;
			$this->pdf->watermark_font = 'DejaVuSansCondensed';
			$this->pdf->showWatermarkText = true;


			$this->pdf->AddPage('P', 'A5', 0, 'Trebuchet MS', 0, 0, 0, 0, 0, 0, 'P');		   
			$this->pdf->WriteHTML($html);
			$this->pdf->Output("Bafageh-Invoice.pdf", 'I');
			
		}

		function test(){
			$kode=$this->uri->segment(4);
			$x['data']=$this->m_hotel->itemMail($kode);
			$this->load->view('template/email',$x); 

		}
 
		
		/*end Transaksi */



		function orders(){
			if($this->session->userdata('level')=='1'){ 
				$x['data']=$this->m_hotel->listbook();
				$x['des']=$this->m_destinasi->get_all_destinasi();
				$this->backend->display('backend/V_Hotelbook',$x);
				$this->load->view('backend/sidebar.php',$x); 
				
			}elseif($this->session->userdata('level')=='4'){
				$x['data']=$this->m_hotel->listbook();
				$x['des']=$this->m_destinasi->get_all_destinasi();
				$this->backend->display('backend/V_Hotelbook',$x);
				$this->load->view('backend/sidehotel.php',$x); 
			}elseif($this->session->userdata('level')=='5'){
				$x['data']=$this->m_hotel->listbook();
				$x['des']=$this->m_destinasi->get_all_destinasi();
				$this->backend->display('backend/V_Hotelbook',$x);
				$this->load->view('backend/sidekasir.php',$x); 
			}	
	}

	function pembayaran_selesai(){
		if($this->session->userdata('level')=='1'){ 
			$id=$this->uri->segment(4);
			$this->m_hotel->bayar_selesai($id);
			echo $this->session->set_flashdata('msg','success');
			redirect('backend/hotel/orders'); 
		}elseif($this->session->userdata('level')=='4'){
			$id=$this->uri->segment(4);
			$this->m_hotel->bayar_selesai($id);
			echo $this->session->set_flashdata('msg','success');
			redirect('backend/hotel/orders'); 
		}elseif($this->session->userdata('level')=='5'){
			$id=$this->uri->segment(4);
			$this->m_hotel->bayar_selesai($id);
		echo $this->session->set_flashdata('msg','success');
		redirect('backend/dashboard'); 
		}
}
	

}