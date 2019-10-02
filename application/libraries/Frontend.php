<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Frontend {

    protected $_CI;

    function __construct() {
        $this->_CI = &get_instance();
    }

    function display($template, $data = null) {
        $data['_content'] = $this->_CI->load->view($template, $data, true);
        $data['_header'] = $this->_CI->load->view('template/frontend/header', $data, true);
        
        $this->_CI->load->view('template/frontend/template', $data);
    }

}


