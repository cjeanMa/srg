<?php

class Dashboard extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sexo_model');
        $this->load->model('Discapacidad_model');
        $this->load->model('Semestre_model');
        $this->load->model('Semestreacademico_model');
        
    }

    function index()
    {
        $data['_view'] = 'dashboard';
        $this->load->view('layouts/main',$data);
    }
    function administrator()
    {

        $data['semestreAcademico'] = $this->Semestreacademico_model->get_all_semestreacademico();
        $data['semestres'] = $this->Semestre_model->get_all_semestre();
        $data['discapacidades'] = $this->Discapacidad_model->get_all_discapacidad();
        $data['sexos'] = $this->Sexo_model->get_all_sexo();
        //para cargar el js 
        $data['javascript'] = array('dashboard/administrator.js');
        $data['_view'] = 'administrator';
        $this->load->view('layouts/main', $data);

    }

    function addSemestreAcademicoAjax(){
        if ($this->input->is_ajax_request()) {
        $datos = $this->input->post();
            if (isset($datos)) {
                $datos_add = array(
                    'anio' => $datos['anioSA'],
                    'periodo' => $datos['periodoSA'],
                );
                $this->Semestreacademico_model->add_semestreacademico($datos_add);
                $data['semestreAcademico'] = $this->Semestreacademico_model->get_all_semestreacademico();
                $this->load->view('ajax/tableSemestreAcademico', $data);
            }
        }
    }

    function addSemestreAjax(){
        if($this->input->is_ajax_request()){
            $datos = $this->input->post();
            if(isset($datos)){
                $datos_add = array(
                    'romanos' => $datos['romanos'],
                    'nombre' => $datos['nombreSemestre'],
                    'prenombre' => $datos['preNombre'],
                );
                $this->Semestre_model->add_semestre($datos_add);
                $data['semestres'] = $this->Semestre_model->get_all_semestre();
                $this->load->view('ajax/tableSemestre', $data);
            }
        }
    }
    function addDiscapacidadAjax(){
        if($this->input->is_ajax_request()){
            $datos = $this->input->post();
            if(isset($datos)){
                $datos_add = array(
                    'nombreDiscapacidad' => $datos['nombreDiscapacidad'],
                );
                $this->Discapacidad_model->add_discapacidad($datos_add);
                $data['discapacidades'] = $this->Discapacidad_model->get_all_discapacidad();
                $this->load->view('ajax/tableDiscapacidad',$data);

            }
        }
    }
    function addGeneroAjax(){
        if($this->input->is_ajax_request()){
            $datos = $this->input->post();
            if(isset($datos)){
                $datos_add = array(
                    'nombreSexo' => $datos['nombreSexo'],
                    'letraSexo' => $datos['abreviacionSexo'],
                );
                $this->Sexo_model->add_sexo($datos_add);
                $data['sexos'] = $this->Sexo_model->get_all_sexo();
                $this->load->view('ajax/tableGenero',$data);
            }
        }
    }
    function updateSemestreAcademicoAjax(){
        if($this->input->is_ajax_request()){
            $datos = $this->input->post();
            if(isset($datos)){
                $this->Semestreacademico_model->update_semestreacademico($datos['idSemestreAcademico'],$datos);
                $data['semestreAcademico'] = $this->Semestreacademico_model->get_all_semestreacademico();
                $this->load->view('ajax/tableSemestreAcademico', $data);
            }
        }
    }

    function updateSemestreAjax(){
        if($this->input->is_ajax_request()){
            $datos = $this->input->post();
            if(isset($datos)){
                $this->Semestre_model->update_semestre($datos['idSemestre'],$datos);
                $data['semestres'] = $this->Semestre_model->get_all_semestre();
                $this->load->view('ajax/tableSemestre', $data);
            }
        }
    }

    function updateDiscapacidadAjax(){
        if($this->input->is_ajax_request()){
            $datos = $this->input->post();
            if(isset($datos)){
                $this->Discapacidad_model->update_discapacidad($datos['idDiscapacidad'],$datos);
                $data['discapacidades'] = $this->Discapacidad_model->get_all_discapacidad();
                $this->load->view('ajax/tableDiscapacidad',$data);
            }
        }
    }
    function updateGeneroAjax(){
        if($this->input->is_ajax_request()){
            $datos = $this->input->post();
            if(isset($datos)){
                $this->Sexo_model->update_sexo($datos['idSexo'],$datos);
                $data['sexos'] = $this->Sexo_model->get_all_sexo();
                $this->load->view('ajax/tableGenero',$data);
            }
        }
    }
}

 