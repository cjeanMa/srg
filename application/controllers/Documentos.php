<?php
Class Documentos extends CI_Controller{

    public $documentos = array();

public function __construct(){
    parent::__construct();
    $this->load->model('Estudiante_model');
    $this->load->model('Escuelaprofesional_model');
    $this->load->model('Modulo_model');
}

function index(){
    
    $data['javascript'] = array('persona/addPersona.js');
    $data['_view'] = 'documentos/index';
    $this->load->view('layouts/main',$data);
}


}


?>