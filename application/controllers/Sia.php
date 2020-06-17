<?php

class Sia extends CI_Controller{

    public function __construct(){
        parent::__construct();
        // $this->load->model('Matricula_model');
        // $this->load->model('Estudiante_model');
        $this->load->model('Estudiante_model');
        // $this->load->library('../controllers/Matricula'); 
    }

    /*
     * Listing of modulo
     */
    function index()
    {
        $data['_view'] = 'sia/index';
        $this->load->view('layouts/sia',$data);
    }
    function dashboard(){
        $idEstudiante=$_COOKIE["idEstudiante"];
        $idPersona=$_COOKIE["idPersona"];
        if ($idEstudiante) {//si existe idEstudiante
           $estudiante=$this->Estudiante_model->get_estudiante_persona($idEstudiante);


            $data['estudiante']=$estudiante;
            $data['_view'] = 'sia/dashboard';
            $this->load->view('layouts/sia',$data);
        }else{
            $data['_view'] = 'sia/index';
            $this->load->view('layouts/sia',$data);
        }
        
        
    }


}




?>