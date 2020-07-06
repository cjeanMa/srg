<?php
class Page extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['_view'] = 'page/index';
        $this->load->view('layouts/page', $data);
    }
}

?>