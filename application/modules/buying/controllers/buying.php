<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Buying extends MX_Controller 
{
    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('logged_in'))
        { 
            redirect('login');
        }
        $this->load->model('activity/activity_model', 'activity_model');
        
        $data_activity = array(
                                'activity' => 'Buying',
                                'time' => date('H:i:s')
                                );
        $this->activity_model->_update_where($data_activity, 'member_id', $this->session->userdata('members_id'));
    }

    function index()
    {
        $data['main'] = 'buying';
	$data['title'] = 'buying';
        $data['page'] = 'index';
        $this->load->module('templates');
        $this->templates->page($data);
    } 
}