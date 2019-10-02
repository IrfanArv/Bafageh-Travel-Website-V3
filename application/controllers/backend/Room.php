<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Room extends CI_Controller{
	function __construct(){
        parent::__construct(); 
		if(!isset($_SESSION['logged_in'])){
            $url=base_url('backoffice');
            redirect($url);
		};
		$this->load->database();
		$this->load->model('m_hotelroom');
		$this->load->model('m_destinasi');
		$this->load->model('m_hotel');
		$this->load->model('m_pengguna');
		$this->load->model('m_hotelfasilitas'); 
		$this->load->library('upload');
	}


	function index(){
		if($this->session->userdata('level')=='1'){ 
			$x['data']=$this->m_hotelroom->get_all_room(); 
			$x['fas']=$this->m_hotelfasilitas->get_fasilitasroom();
			$this->backend->display('backend/room/list',$x);
			$this->load->view('backend/sidebar.php',$x);
			
		}elseif($this->session->userdata('level')=='4'){
			$x['data']=$this->m_hotelroom->get_all_room();
			$x['fas']=$this->m_hotelfasilitas->get_fasilitasroom();
			$this->backend->display('backend/room/list',$x);
			$this->load->view('backend/sidehotel.php',$x);
		}else{
			echo "Halaman tidak ditemukan";
		}	
}

	

	function listHotel(){
		$destinasi_id = $this->input->post('destinasi_id');
		$hotel = $this->m_hotelroom->viewBydestinasi($destinasi_id);

		$lists = "<option value=''>Pilih</option>";
		
		foreach($hotel as $data){
		  $lists .= "<option value='".$data->id_hotel."'>".$data->judul."</option>"; 
		}
		
		$callback = array('list_hotel'=>$lists); 
	
		echo json_encode($callback); 
	  }

	  function roomList(){
		$hotel = $this->input->post('hotel');
		$room = $this->m_hotelroom->viewByhotel($hotel); 

		$lists = "<option value=''>SELECT</option>";
		
		foreach($room as $data){
		  $lists .= "<option value='".$data->id_room."'>".$data->title."</option>"; 
		}
		
		$callback = array('list_room'=>$lists); 
	
		echo json_encode($callback); 
	  }

	  function priceList(){
		$room = $this->input->post('room');
		$price = $this->m_hotelroom->priceView($room);

		$lists = "<option value=''>SELECT</option>";
		
		foreach($price as $data){
			$lists .= "<option value='".$data->hj_wd."'>".'WEEKDAY'."</option>"; 
			$lists .= "<option value='".$data->hj_we."'>".'WEEKEND'."</option>";
		 
		}
		
		$callback = array('list_price'=>$lists); 
	
		echo json_encode($callback); 
	  }


	function add_room(){
		if($this->session->userdata('level')=='1'){ 
			$x['htl']=$this->m_hotel->get_all_hotel();
			$x['fas']=$this->m_hotelfasilitas->get_fasilitas();
			$x['des']=$this->m_destinasi->get_all_destinasi();
			$this->backend->display('backend/room/add',$x);
			$this->load->view('backend/sidebar.php',$x); 
			
		}elseif($this->session->userdata('level')=='4'){
			$x['htl']=$this->m_hotel->get_all_hotel();
			$x['fas']=$this->m_hotelfasilitas->get_fasilitas();
			$x['des']=$this->m_destinasi->get_all_destinasi();
			$this->backend->display('backend/room/add',$x);
			$this->load->view('backend/sidehotel.php',$x); 
		}else{
			echo "Halaman tidak ditemukan";
		}	
}

	
	function edit(){
		if($this->session->userdata('level')=='1'){ 
			$kode=$this->uri->segment(4);
			$x['data']=$this->m_hotelroom->get_room_by_kode($kode);
			$x['fas']=$this->m_hotelfasilitas->get_fasilitas();
			$this->backend->display('backend/room/edit',$x);
			$this->load->view('backend/sidebar.php',$x); 
			
		}elseif($this->session->userdata('level')=='4'){
			$kode=$this->uri->segment(4);
			$x['data']=$this->m_hotelroom->get_room_by_kode($kode);
			$x['fas']=$this->m_hotelfasilitas->get_fasilitas();
			$this->backend->display('backend/room/edit',$x);
			$this->load->view('backend/sidehotel.php',$x); 
		}else{
			echo "Halaman tidak ditemukan";
		}	
}

	function detail(){
		if($this->session->userdata('level')=='1'){ 
			$kode=$this->uri->segment(4);
			$x['data']=$this->m_hotelroom->get_room_by_kode($kode);
			$this->backend->display('backend/room/detail',$x);
			$this->load->view('backend/sidebar.php',$x);  
			
		}elseif($this->session->userdata('level')=='4'){
			$kode=$this->uri->segment(4);
			$x['data']=$this->m_hotelroom->get_room_by_kode($kode);
			$this->backend->display('backend/room/detail',$x);
			$this->load->view('backend/sidehotel.php',$x); 
		}else{
			echo "Halaman tidak ditemukan";
		}	
}

	function hapus_room(){
		$kode=$this->input->post('kode');
		$this->m_hotelroom->hapus_room($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('backend/room');
	}


function simpan_room(){
	$config['upload_path'] = './assets/images/hotel/room/'; //path folder
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
				$config['source_image']='./assets/images/hotel/room/'.$gbr['file_name'];
				$config['maintain_ratio']= FALSE;
				$config['quality']= '60%';
				$config['width']= 1400;
				$config['height']= 470;
				$config['master_dim'] = 'width';
				$config['new_image']= './assets/images/hotel/room/'.$gbr['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				//Thumb
				$gbr = $this->upload->data();
				$config['image_library']='gd2';
				$config['source_image']='./assets/images/hotel/room/'.$gbr['file_name'];
				$config['new_image']= './assets/images/hotel/room/thumb/'.$gbr['file_name'];
				$config['create_thumb']= TRUE;
				$config['maintain_ratio']= FALSE;
				$config['quality']= '60%';
				$config['width']= 800;
				$config['height']= 533;
				$this->load->library('image_lib', $config);
				$this->image_lib->initialize($config);
				$this->image_lib->resize();

				$gambar=$gbr['file_name'];
				$title=strip_tags($this->input->post('title'));
				$filter=str_replace("?", "", $title);
				$filter2=str_replace("$", "", $filter);
				$pra_slug=$filter2.'.html';
				$slug=strtolower(str_replace(" ", "-", $pra_slug));
				$descr=strip_tags($this->input->post('descr'));
				$stock=($this->input->post('stock'));
				$hm_wd=($this->input->post('hm_wd'));
				$hm_we=($this->input->post('hm_we'));
				$hj_wd=($this->input->post('hj_wd'));
				$hj_we=($this->input->post('hj_we'));
				$disc=($this->input->post('disc'));
				$start=($this->input->post('date_start'));
				$date_start= date('Y-m-d', strtotime($start));
				$end=($this->input->post('end_date'));
				$end_date= date('Y-m-d', strtotime($end));	
				$max_children=($this->input->post('max_children'));
				$max_adults=($this->input->post('max_adults'));
				$max_people=($this->input->post('max_people'));
				$min_people=($this->input->post('min_people'));	
				$hotel_id=$this->input->post('hotel');
				$this->m_hotelroom->simpan_room($title,$slug,$descr,$stock,$hm_wd,$hm_we,$hj_wd,$hj_we,$disc,$date_start,$end_date,$max_children,$max_adults,$max_people,$min_people,$hotel_id,$gambar);
				echo $this->session->set_flashdata('msg','success');
				redirect('backend/room');
						}else{
							echo $this->session->set_flashdata('msg','warning');
							redirect('backend/room');
						}
									
						}else{
							rredirect('backend/room');
						}
					}


		


		function edit_room(){
			$config['upload_path'] = './assets/images/hotel/room/'; //path folder
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
						$config['source_image']='./assets/images/hotel/room/'.$gbr['file_name'];
						$config['maintain_ratio']= FALSE;
						$config['quality']= '60%';
						$config['width']= 1400;
						$config['height']= 470;
						$config['master_dim'] = 'width';
						$config['new_image']= './assets/images/hotel/room/'.$gbr['file_name'];
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
						//Thumb
						$gbr = $this->upload->data();
						$config['image_library']='gd2';
						$config['source_image']='./assets/images/hotel/room/'.$gbr['file_name'];
						$config['new_image']= './assets/images/hotel/room/thumb/'.$gbr['file_name'];
						$config['create_thumb']= TRUE;
						$config['maintain_ratio']= FALSE;
						$config['quality']= '60%';
						$config['width']= 800;
						$config['height']= 533;
						$this->load->library('image_lib', $config);
						$this->image_lib->initialize($config);
						$this->image_lib->resize();

						$gambar=$gbr['file_name'];
						$id_room=$this->input->post('kode');
						$title=strip_tags($this->input->post('title'));
						$filter=str_replace("?", "", $title);
						$filter2=str_replace("$", "", $filter);
						$pra_slug=$filter2.'.html';
						$slug=strtolower(str_replace(" ", "-", $pra_slug));
						$descr=strip_tags($this->input->post('descr'));
						$stock=($this->input->post('stock'));
						$hm_wd=($this->input->post('hm_wd'));
						$hm_we=($this->input->post('hm_we'));
						$hj_wd=($this->input->post('hj_wd'));
						$hj_we=($this->input->post('hj_we'));
						$disc=($this->input->post('disc'));
						$start=($this->input->post('date_start'));
						$date_start= date('Y-m-d', strtotime($start));
						$end=($this->input->post('end_date'));
						$end_date= date('Y-m-d', strtotime($end));	
						$max_children=($this->input->post('max_children'));
						$max_adults=($this->input->post('max_adults'));
						$max_people=($this->input->post('max_people'));
						$min_people=($this->input->post('min_people'));		
						$images=$this->input->post('gambar');
						$path='./assets/images/hotel/room/'.$images;
						unlink($path);
						$pathtbl='./assets/images/hotel/room/thumb/'.$images;
						unlink($pathtbl);			
						$this->m_hotelroom->update_roomimg($id_room,$title,$slug,$descr,$stock,$hm_wd,$hm_we,$hj_wd,$hj_we,$disc,$date_start,$end_date,$max_children,$max_adults,$max_people,$min_people,$gambar);
						echo $this->session->set_flashdata('msg','info');
						redirect('backend/room/detail/'.$id_room);       
				
					}else{
						echo $this->session->set_flashdata('msg','warning');
						redirect('backend/room/edit/'.$id_room);
					}
					
				}else{
					$id_room=$this->input->post('kode');
					$title=strip_tags($this->input->post('title'));
					$filter=str_replace("?", "", $title);
					$filter2=str_replace("$", "", $filter);
					$pra_slug=$filter2.'.html';
					$slug=strtolower(str_replace(" ", "-", $pra_slug));
					$descr=strip_tags($this->input->post('descr'));
					$stock=($this->input->post('stock'));
					$hm_wd=($this->input->post('hm_wd'));
					$hm_we=($this->input->post('hm_we'));
					$hj_wd=($this->input->post('hj_wd'));
					$hj_we=($this->input->post('hj_we'));
					$disc=($this->input->post('disc'));
					$start=($this->input->post('date_start'));
					$date_start= date('Y-m-d', strtotime($start));
					$end=($this->input->post('end_date'));
					$end_date= date('Y-m-d', strtotime($end));	
					
					$max_children=($this->input->post('max_children'));
					$max_adults=($this->input->post('max_adults'));
					$max_people=($this->input->post('max_people'));
					$min_people=($this->input->post('min_people'));		
					$this->m_hotelroom->update_room($id_room,$title,$slug,$descr,$stock,$hm_wd,$hm_we,$hj_wd,$hj_we,$disc,$date_start,$end_date,$max_children,$max_adults,$max_people,$min_people);
					echo $this->session->set_flashdata('msg','info');
					redirect('backend/room/detail/'.$id_room);    
				}
			}

/*Galleri Manajemen */
function upload_galeri() 
    { 
		$id_room=$this->input->post('id_room');
		$hotel_id=$this->input->post('hotel_id'); 
        if(isset($_FILES['userfile']) && $_FILES['userfile']['error'] != '4') :
            $files = $_FILES;
            $count = count($_FILES['userfile']['name']); // count element 
            for($i=0; $i<$count; $i++):
                $_FILES['userfile']['name']= $files['userfile']['name'][$i];
                $_FILES['userfile']['type']= $files['userfile']['type'][$i];
                $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
                $_FILES['userfile']['error']= $files['userfile']['error'][$i];
                $_FILES['userfile']['size']= $files['userfile']['size'][$i];
                $config['upload_path'] = './uploads/room/';
                $target_path = './uploads/room/thumbs/';
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
                 $configi['width']  = 800; // new size
				 $configi['height'] = 533;
				
				
//Remove space error
                $this->load->library('image_lib');
                $this->image_lib->initialize($configi);    
                $this->image_lib->resize();
                $images[] = $fileName;
                $image_upload = array('nama_foto' => $fileName, 'room_id' => $id_room,'hotel_id_gal' =>$hotel_id);
                $this ->db-> insert ('room_file',$image_upload); 
                         
        endfor;
        endif;
        echo $this->session->set_flashdata('msg','info');
		redirect('backend/room/detail/'.$id_room);  
	}
	


/* End Gambar */

/* Fasilitas Hotel*/

function add_fasilitas(){
	$id_room=$this->input->post('id_room');
	$hotel_id=$this->input->post('hotel_id');
	$fasilitas_id=$this->input->post('fasilitas');
	foreach($fasilitas_id as $fasroom)
	$this->m_hotelroom->add_fasilitas($id_room,$fasroom,$hotel_id);
	echo $this->session->set_flashdata('msg','info');
	redirect('backend/room');  


}

/* End Fasilitas Hotel*/
	

}