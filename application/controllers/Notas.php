<?php

class Notas extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Matricula_model');
        $this->load->model('Estudiante_model');
    }

    /*
     * Listing of modulo
     */
    function index()
    {
        $data['_view'] = 'notas/index';
        $this->load->view('layouts/main',$data);
    }

}




?>