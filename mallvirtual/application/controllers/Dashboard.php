<?php

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if ($this->session->userdata("login")) {
            $data['_view'] = 'dashboard';
            $this->load->view('layouts/main', $data);
        } else {
            $this->load->view('vitrina/login');
        }
    }
}
