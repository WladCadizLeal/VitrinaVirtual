<?php

class Search extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Search_model');
    }

    function search_keyword()
    {
        $keyword    =   $this->input->post('keyword');
        $data['results']    =   $this->Search_model->search($keyword);
        $data['busqueda']    =   $keyword;
        $data['_view'] = 'vitrina/resultado';
        $this->load->view('layouts/index', $data);
    }
}
