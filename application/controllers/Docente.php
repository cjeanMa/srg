<?php

class Docente extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Docente_model');
        $this->load->model('Persona_model');
        $this->load->model('Escuelaprofesional_model');
        $this->load->model('Sexo_model');
        $this->load->model('Discapacidad_model');
    } 

    /*
     * Listing of docente
     */
    function index()
    {
        $data['docente'] = $this->Docente_model->get_all_docente_persona();
        
        $data['_view'] = 'docente/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new docente
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params_tutor = array(
				'idPersona' => $this->input->post('dni'),
				'idEscuelaProfesional' => $this->input->post('escuela_tecnica'),
            );

            $params_person = array(
                'idPersona' => $this->input->post('dni'),
                'apellidoPaterno' => strtolower($this->input->post('apellidoPaterno')),
				'apellidoMaterno' => strtolower($this->input->post('apellidoMaterno')),
				'nombres' => strtolower($this->input->post('nombres')),
				'idSexo' => $this->input->post('sexo'),
				'fechaNacimiento' => $this->input->post('fechaNacimiento'),
				'direccion' => $this->input->post('direccion'),
				'email' => $this->input->post('email'),
				'numCelular' => $this->input->post('numCelular'),
				'idDiscapacidad' => $this->input->post('discapacidad'),
            );
            
            if($this->Persona_model->get_persona($params_person['idPersona'])!=null){
                $this->Persona_model->update_persona($params_person['idPersona'],$params_person);
            }
            else{   
                $this->Persona_model->add_persona($params_person);
            }
            $docente_id = $this->Docente_model->add_docente($params_tutor);
            redirect('docente/index');
        }
        else
        {   
            $data['sexo'] = $this->Sexo_model->get_all_sexo();
            $data['discapacidad'] = $this->Discapacidad_model->get_all_discapacidad();
            $data['escuelaProfesional'] = $this->Escuelaprofesional_model->get_all_escuelaprofesional();
            $data['javascript'] = 'persona/addPersona.js';
            $data['_view'] = 'docente/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a docente
     */
    function edit($idDocente)
    {   
        // check if the docente exists before trying to edit it
        $data['docente'] = $this->Docente_model->get_docente_persona($idDocente);
        $data['sexo'] = $this->Sexo_model->get_all_sexo();
        $data['discapacidad'] = $this->Discapacidad_model->get_all_discapacidad();
        
        if(isset($data['docente']['idDocente']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params_tutor = array(
					'idPersona' => $this->input->post('dni'),
					'idEscuelaProfesional' => $this->input->post('escuela_tecnica'),
                );

                $params_person = array(
                    'idPersona' => $this->input->post('dni'),
                    'apellidoPaterno' => strtolower($this->input->post('apellidoPaterno')),
                    'apellidoMaterno' => strtolower($this->input->post('apellidoMaterno')),
                    'nombres' => strtolower($this->input->post('nombres')),
                    'idSexo' => $this->input->post('sexo'),
                    'fechaNacimiento' => $this->input->post('fechaNacimiento'),
                    'direccion' => $this->input->post('direccion'),
                    'email' => $this->input->post('email'),
                    'numCelular' => $this->input->post('numCelular'),
                    'idDiscapacidad' => $this->input->post('discapacidad'),
                );

                $this->Docente_model->update_docente($idDocente,$params_tutor);
                $this->Persona_model->update_persona($params_person['idPersona'], $params_person);            
                redirect('docente/index');
            }
            else
            {
                $data['_view'] = 'docente/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The docente you are trying to edit does not exist.');
    } 

    /*
     * Deleting docente
     */
    function remove($idDocente)
    {
        $docente = $this->Docente_model->get_docente($idDocente);

        // check if the docente exists before trying to delete it
        if(isset($docente['idDocente']))
        {
            $this->Docente_model->delete_docente($idDocente);
            redirect('docente/index');
        }
        else
            show_error('The docente you are trying to delete does not exist.');
    }
    
}
