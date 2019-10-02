<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Backend {

    protected $_CI;

    function __construct() {
        $this->_CI = &get_instance();
    }

    function display($template, $data = null) {
        $data['_content'] = $this->_CI->load->view($template, $data, true);
        $data['_header'] = $this->_CI->load->view('template/backend/header', $data, true);
        
        $this->_CI->load->view('template/backend/template', $data);
    }

}


