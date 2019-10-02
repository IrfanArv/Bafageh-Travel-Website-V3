<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hotel extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_destinasi');
		$this->load->model('m_hotel');
		$this->load->model('m_hotelfasilitas');
		$this->load->model('m_pengunjung');
		$this->load->model('m_home');
        $this->m_pengunjung->count_visitor();
	}

	
	function index(){
		$jum=$this->m_hotel->listHotel(); 
        $page=$this->uri->segment(3);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=5;
        $config['base_url'] = base_url() . 'hotel/index/';
        $config['total_rows'] = $jum->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 3;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last'; 
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev'; 
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
		
		$this->pagination->initialize($config);
        $x['page'] =$this->pagination->create_links();
		$x['data']=$this->m_hotel->hotel_perpage($offset,$limit);
		
		$this->frontend->display('front/HotelList',$x);
	}

	function detail($slug){
		$data=$this->m_hotel->get_hotel_by_slug($slug);
		$q=$data->row_array();
		$x['data']=$this->m_hotel->get_hotel_by_slug($slug);
		$x['populer']=$this->m_hotel->get_hotel_populer();
		$x['terbaru']=$this->m_hotel->get_hotel_terbaru();
		$x['des']=$this->m_hotel->get_destinasi();
		$x['fas']=$this->m_hotel->listFasilitas($slug);
		$x['gal']=$this->m_hotel->galleridepan($slug);
		$x['room']=$this->m_hotel->roomslug($slug);
		$x['roomfas']=$this->m_hotel->roomfas($slug);
		$x['galroom']=$this->m_hotel->galroom($slug);  
		$this->frontend->display('front/HotelD', $x);
	}

	/* BOOK FROM FRONT*/

	function book(){
		
        $x['syarat']=$this->m_home->syarat_book();
		$kode=$this->uri->segment(3);
		$x['room']=$this->m_hotel->roomkode($kode);
        $this->frontend->display('front/v_orderhotel',$x); 
	 }
	 
	 function order(){ 
        error_reporting(0);
        $no_order=$this->m_hotel->get_no_vcr();
        $nama=strip_tags(str_replace("'", "",$this->input->post('nama'))); 
        $email=strip_tags(str_replace("'", "",$this->input->post('email')));
        $jenkel=strip_tags(str_replace("'", "",$this->input->post('jenkel')));
        $notelp=strip_tags(str_replace("'", "",$this->input->post('notelp')));
        $alamat=strip_tags(str_replace("'", "",$this->input->post('alamat')));
		$room=$this->input->post('id_room');
		$hotel=$this->input->post('id_hotel');
		$ci=$this->input->post('checkin');
		$checkin= date('Y-m-d', strtotime($ci));
		$co=$this->input->post('checkout');
		$checkout= date('Y-m-d', strtotime($co));
		$adultamt=$this->input->post('adultamt');
		$kids=$this->input->post('kids');
		$totalroom=$this->input->post('totalroom');   
        $notebox=strip_tags(str_replace("'", "",$this->input->post('notebox'))); 
        $this->m_hotel->simpan_order($no_order,$nama,$email,$jenkel,$notelp,$alamat,$room,$hotel,$checkin,$checkout,$adultamt,$kids,$totalroom,$notebox);
        $this->session->set_userdata('invoices',$no_order);
        $kode=$this->uri->segment(3);
        $no_invoice=$this->session->userdata('invoices');
        $this->m_hotel->detail_charthotel($kode);
        if($kode=='1'){
            $x['data']=$this->m_hotel->detail_charthotel($kode);
            $this->frontend->display('front/v_detail_charthotel',$x);
        }else{
            $x['data']=$this->m_hotel->detail_charthotel($kode);
            $this->frontend->display('front/v_detail_charthotel',$x);
        } 
	}
	
	function method(){
       
        $x['bayar']=$this->m_home->bayar();
        $x['data']=$this->m_hotel->get_metode();
        $this->frontend->display('front/v_metode_bayarhotel',$x); 
	}

	function payment(){
    
        $x['tx1']=$this->m_home->tx1();
        $x['tx2']=$this->m_home->tx2();
        $id=$this->uri->segment(3);
        $kode=$this->uri->segment(3);
        $no_invoice=$this->session->userdata('invoices');
        $this->m_hotel->set_bayar($no_invoice,$id);
        if($id=='1'){
            $x['data']=$this->m_hotel->faktur();
            $x['judul']="Bafageh Group | Invoice";
            $x['inv']=$this->m_hotel->get_bayar($kode);
            $this->frontend->display('front/v_invoiceshotel',$x);
        }else{
            $x['data']=$this->m_hotel->faktur();
            $x['judul']="Bafageh Group | Invoice";
            $x['inv']=$this->m_hotel->get_bayar($kode);
            $this->frontend->display('front/v_invoiceshotel',$x); 
        }
    }

	/*function kategori(){
		$kategori_id=$this->uri->segment(3);
		$jum=$this->m_tulisan->get_tulisan_by_kategori($kategori_id);
        $page=$this->uri->segment(4);
        if(!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $limit=5;
        $config['base_url'] = base_url() . 'blog/kategori/'.$kategori_id.'/';
        $config['total_rows'] = $jum->num_rows();
        $config['per_page'] = $limit;
        $config['uri_segment'] = 4;
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['next_link'] = 'Next >>';
        $config['prev_link'] = '<< Prev';
        $this->pagination->initialize($config);
        $x['page'] =$this->pagination->create_links();
		$x['data']=$this->m_tulisan->get_tulisan_by_kategori_perpage($kategori_id,$offset,$limit);
		$this->load->view('v_blog',$x);
	}

	function search(){
		$keyword=str_replace("'", "", $this->input->post('xfilter',TRUE));
		$x['data']=$this->m_tulisan->search_tulisan($keyword);
		$this->load->view('v_blog',$x);
	}

	function komentar(){
		$tulisan_id=$this->input->post('kode');
		$nama=strip_tags(htmlspecialchars(str_replace("'", "", $this->input->post('nama',TRUE))));
		$email=strip_tags(htmlspecialchars(str_replace("'", "", $this->input->post('email',TRUE))));
		$web=strip_tags(htmlspecialchars(str_replace("'", "", $this->input->post('web',TRUE))));
		$msg=strip_tags(trim(htmlspecialchars(str_replace("'", "", $this->input->post('message',TRUE)))));
		$this->m_tulisan->post_komentar($nama,$email,$web,$msg,$tulisan_id);
		echo $this->session->set_flashdata("msg","<div class='alert alert-info alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><strong>Informasi!</strong> Komentar Anda akan tampil setelah di moderasi oleh admin!</div>");
		redirect('blog/detail/'.$tulisan_id);
	}

	function good($slug){
		$data=$this->m_tulisan->get_berita_by_slug($slug);
		if($data->num_rows() > 0){
			$q=$data->row_array();
			$kode=$q['tulisan_id'];
			$this->m_tulisan->count_good($kode);
			redirect('artikel/'.$slug);
		}else{
			redirect('artikel/'.$slug);
		}
	}

	function like($slug){
		$data=$this->m_tulisan->get_berita_by_slug($slug);
		if($data->num_rows() > 0){
			$q=$data->row_array();
			$kode=$q['tulisan_id'];
			$this->m_tulisan->count_like($kode);
			redirect('artikel/'.$slug);
		}else{
			redirect('artikel/'.$slug);
		}
	}

	function love($slug){
		$data=$this->m_tulisan->get_berita_by_slug($slug);
		if($data->num_rows() > 0){
			$q=$data->row_array();
			$kode=$q['tulisan_id'];
			$this->m_tulisan->count_love($kode);
			redirect('artikel/'.$slug);
		}else{
			redirect('artikel/'.$slug);
		}
	}

	function genius($slug){
		$data=$this->m_tulisan->get_berita_by_slug($slug);
		if($data->num_rows() > 0){
			$q=$data->row_array();
			$kode=$q['tulisan_id'];
			$this->m_tulisan->count_genius($kode);
			redirect('artikel/'.$slug);
		}else{
			redirect('artikel/'.$slug);
		}
	}
	*/


}