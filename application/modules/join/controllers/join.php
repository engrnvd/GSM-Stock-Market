<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Join extends MX_Controller 
{
    function __construct()
    {
        ob_start();
        parent::__construct();
        $this->session->set_userdata('logged_in', 1);

    }

    function index()
    {  
        $this->load->model('member/member_model', 'member_model');
        $this->load->model('company/company_model', 'company_model');
        $this->load->model('country/country_model', 'country_model');

        //$data['member'] = $this->member_model->get_where($this->session->userdata('members_id'));
        //$data['company'] = $this->company_model->get_where($this->member_model->get_where($this->session->userdata('members_id'))->company_id);
        $data['country'] = $this->country_model->_custom_query("SELECT * FROM country ORDER BY country ASC");

        $data['main'] = 'profile';
        $data['title'] = 'GSM - Edit Profile';
        $data['page'] = 'edit-profile';
        $this->load->view('index', $data);
        $this->session->unset_userdata('logged_in');
    }
    
    function profileCreate()
    {
        echo '<pre>';
        print_r($_POST);
        
    }
}