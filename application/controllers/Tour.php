<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tour extends CI_Controller {
	function __construct(){
        parent::__construct();
               
                $this->load->model('m_pengunjung');
                $this->m_pengunjung->count_visitor();
                $this->load->model('m_paket'); 
                $this->load->model('m_galket');
                $this->load->model('m_intinerary');
                $this->load->model('m_faq');
                $this->load->model('m_pkthotel');
                $this->load->model('m_home');
    }
	public function index()
	{
       
        $config['base_url'] = site_url('tour/index'); 
        $config['total_rows'] = $this->db->count_all('paket'); 
        $config['per_page'] = 5;  
        $config["uri_segment"] = 3;  
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
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
        $x['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $x['data'] = $this->m_paket->harga_hotel($config["per_page"],['page']);           
        $x['pagination'] = $this->pagination->create_links();
        $x['news']=$this->m_paket->harga_hotel($config["per_page"], ['page']);
        $x['brt']=$this->m_paket->tampil_paket();
		$this->frontend->display('front/v_paket',$x);
    } 

	function details(){
        $x['brt']=$this->m_paket->tampil_paket();
        $kode=$this->uri->segment(3);
        $x['news']=$this->m_paket->getpaket($kode); 
        $x['int']=$this->m_intinerary->getintinerary($kode);
        $x['ptpkt']=$this->m_galket->get_galket($kode); 
        $x['htl']=$this->m_pkthotel->gethotel($kode);
        $x['hrg']=$this->m_paket->harga_hotel();
		$this->frontend->display('front/v_detail_paket', $x);
    }
    
    function like(){
        $x['brt']=$this->m_paket->tampil_paket();
        $kode=$this->uri->segment(3); 
        $x['int']=$this->m_intinerary->getintinerary($kode);
        $x['ptpkt']=$this->m_galket->get_galket($kode);
        $this->m_paket->add_like($kode);
        $x['news']=$this->m_paket->getpaket($kode);
        $x['htl']=$this->m_pkthotel->gethotel($kode);
		$this->frontend->display('front/v_detail_paket',$x);;
    }
    
    

	function book(){
		
        $x['syarat']=$this->m_home->syarat_book();
        $kode=$this->uri->segment(3);
        $x['pkt']=$this->m_paket->getpaket($kode);
        $x['htl']=$this->m_paket->gethotel($kode);
        $this->frontend->display('front/v_order',$x); 
     }

    function order(){ 
        error_reporting(0);
        $no_order=$this->m_paket->get_no_order();
        $nama=strip_tags(str_replace("'", "",$this->input->post('nama'))); 
        $email=strip_tags(str_replace("'", "",$this->input->post('email')));
        $jekel=strip_tags(str_replace("'", "",$this->input->post('jenkel')));
        $notelp=strip_tags(str_replace("'", "",$this->input->post('notelp')));
        $alamat=strip_tags(str_replace("'", "",$this->input->post('alamat')));
        $paket=strip_tags(str_replace("'", "",$this->input->post('paket')));
        $hotel=strip_tags(str_replace("'", "",$this->input->post('hotel')));
        $berangkat=$this->input->post('berangkat');
        $dewasa=$this->input->post('adultamt');     
        $ket=strip_tags(str_replace("'", "",$this->input->post('notebox'))); 
        $this->m_paket->simpan_order($no_order,$nama,$jekel,$alamat,$notelp,$email,$berangkat,$dewasa,$paket,$hotel,$rate,$ket);
        $this->session->set_userdata('invoices',$no_order);
        $kode=$this->uri->segment(3);
        $no_invoice=$this->session->userdata('invoices');
        $this->m_paket->detail_chart($kode);
        if($kode=='1'){
            $x['data']=$this->m_paket->detail_chart($kode);
            $this->frontend->display('front/v_detail_chart',$x);
        }else{
            $x['data']=$this->m_paket->detail_chart($kode);
            $this->frontend->display('front/v_detail_chart',$x);
        } 
    }

    function method(){
       
        $x['bayar']=$this->m_home->bayar();
        $x['data']=$this->m_paket->get_metode();
        $this->frontend->display('front/v_metode_bayar',$x); 
    }

    function payment(){
    
        $x['tx1']=$this->m_home->tx1();
        $x['tx2']=$this->m_home->tx2();
        $id=$this->uri->segment(3);
        $kode=$this->uri->segment(3);
        $no_invoice=$this->session->userdata('invoices');
        $this->m_paket->set_bayar($no_invoice,$id);
        if($id=='1'){
            $x['data']=$this->m_paket->faktur();
            $x['judul']="Bafageh Group | Invoice";
            $x['inv']=$this->m_paket->get_bayar($kode);
            $this->frontend->display('front/v_invoices',$x);
        }else{
            $x['data']=$this->m_paket->faktur();
            $x['judul']="Bafageh Group | Invoice";
            $x['inv']=$this->m_paket->get_bayar($kode);
            $this->frontend->display('front/v_invoices',$x); 
        }
    }

    function email(){
        $this->load->view('front/Paketmail');
    }

    function finish(){
       
         
        $id=$this->uri->segment(3);
        $no_invoice=$this->session->userdata('invoices');
        $this->m_paket->set_bayar($no_invoice,$id);
        $this->load->library('m_pdf');
        if($id=='1'){
        $x['data']=$this->m_paket->faktur();
         $html = $this->load->view('front/v_invoices_bank',$x, true);
           $this->pdf->AddPage('L');
          
        $this->pdf->WriteHTML($html);
        $this->pdf->Output("Bafageh-Invoice.pdf", 'I');
        
        }else{
            $x['data']=$this->m_paket->faktur();
            $html = $this->load->view('front/v_invoices_bank',$x, true);
            $this->pdf->AddPage('L');
            $this->pdf->WriteHTML($html);
           
            $this->pdf->WriteHTML($html);
            $this->pdf->Output("Bafageh-Invoice.pdf", 'I');
            
        }
    }
}
