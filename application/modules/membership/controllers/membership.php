<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membership extends MX_Controller 
{
    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('logged_in'))
        { 
            redirect('login');
        }
    }

    function index()
    {
        $data['main'] = 'membership';
	$data['title'] = 'GSM - membership';
        $data['page'] = 'index';
        $this->load->module('templates');
        $this->templates->page($data);
    } 
}