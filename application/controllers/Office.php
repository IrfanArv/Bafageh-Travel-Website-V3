<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Office extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_valas');
        $this->load->model('M_galeri');
    }
    function index(){
        $x['data']=$this->m_valas->tampil_valas();
        $x['photo']=$this->M_galeri->tampil_galeri();
		$this->load->view('v_office',$x);
    } 

}
