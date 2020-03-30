<?php

 
class Estudiante extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Estudiante_model');
        $this->load->model('Persona_model');
        $this->load->model('Escuelaprofesional_model');
        $this->load->model('Semestreacademico_model');
        $this->load->model('Sexo_model');
        $this->load->model('Discapacidad_model');
    } 

    /*
     * Listing of estudiante
     */
    function index()
    {
        $data['estudiante'] = $this->Estudiante_model->get_all_estudiante_persona();
        
        $data['_view'] = 'estudiante/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new estudiante
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params_student = array(
				'idSemestreAcademico' => $this->input->post('p_ingreso'),
				'idEscuelaProfesional' => $this->input->post('escuela_tecnica'),
				'idPersona' => $this->input->post('dni'),
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
            
            //Para verificar si es una nueva persona o es una ya existente
            if($this->Persona_model->get_persona($this->input->post('dni'))!=null){
                $this->Persona_model->update_persona($params_person['idPersona'],$params_person);
            }
            else{
                $this->Persona_model->add_persona($params_person);
            }
            $this->Estudiante_model->add_estudiante($params_student);
            //Para crear el usuario del estudiante
            //falta modificaciones en la base de datos, de momento no esta funcional
            $params_user = array(
                'usuario'=> $params_person['idPersona'],
                'contraseña' => substr($params_person['apellidoPaterno'],0,1).$params_person['idPersona'],
                'ultimaSesion' => "",
                'idPermiso' => "4",
                'idPersona' => $params_person['idPersona'],
                'idHabilitacion' => "1",
            );
            $this->Usuario_model->add_usuario($params_user);
            
            redirect('estudiante/index');
        }
        else
        {   
            $data['sexo'] = $this->Sexo_model->get_all_sexo();
            $data['discapacidad'] = $this->Discapacidad_model->get_all_discapacidad();
            $data['semestreAcademico'] = $this->Semestreacademico_model->get_all_semestreacademico();
            $data['escuelaProfesional'] = $this->Escuelaprofesional_model->get_all_escuelaprofesional();
            $data['_view'] = 'estudiante/add';
            $data['javascript'] = array("persona/addPersona.js");
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a estudiante
     */
    function edit($idEstudiante)
    {   
        // check if the estudiante exists before trying to edit it
        $data['estudiante'] = $this->Estudiante_model->get_estudiante_persona($idEstudiante);
        $data['sexo'] = $this->Sexo_model->get_all_sexo();
        $data['discapacidad'] = $this->Discapacidad_model->get_all_discapacidad();
        $data['semestreAcademico'] = $this->Semestreacademico_model->get_all_semestreacademico();
        
        if(isset($data['estudiante']['idEstudiante']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'idSemestreAcademico' => $this->input->post('p_ingreso'),
				'idEscuelaProfesional' => $this->input->post('escuela_tecnica'),
				'idPersona' => $this->input->post('dni'),
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
                $this->Persona_model->update_persona($this->input->post('dni'), $params_person);
                $this->Estudiante_model->update_estudiante($idEstudiante,$params);            
                redirect('estudiante/index');
            }
            else
            {
                $data['_view'] = 'estudiante/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The estudiante you are trying to edit does not exist.');
    } 

    /*
     * Deleting estudiante
     */
    function remove($idEstudiante)
    {
        $estudiante = $this->Estudiante_model->get_estudiante($idEstudiante);

        // check if the estudiante exists before trying to delete it
        if(isset($estudiante['idEstudiante']))
        {
            $this->Estudiante_model->delete_estudiante($idEstudiante);
            redirect('estudiante/index');
        }
        else
            show_error('The estudiante you are trying to delete does not exist.');
    }
    
    function datos_basicosEstudiante_persona(){
        if($this->input->is_ajax_request()){
            $params = $this->input->post();
            if(isset($params)){
                $data['estudiante'] = $this->Estudiante_model->get_estudiante_idPersona($params['idPersona']);
                $data['persona'] = $this->Persona_model->get_Persona($params['idPersona']);
                $this->load->view('ajax/formPracticas',$data);
            }
        }
    }
}
