<?php

 
class Estudiante extends CI_Controller{
    function __construct()
    {
        parent::__construct();
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
        $data['estudiante'] = $this->Estudiante_model->get_all_estudiante();
        
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
            $params = array(
				'idSemestreAcademico' => $this->input->post('idSemestreAcademico'),
				'idEscuelaProfesional' => $this->input->post('idEscuelaProfesional'),
				'idPersona' => $this->input->post('idPersona'),
            );
            
            $estudiante_id = $this->Estudiante_model->add_estudiante($params);
            redirect('estudiante/index');
        }
        else
        {            
            $data['_view'] = 'estudiante/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a estudiante
     */
    function edit($idEstudiante)
    {   
        // check if the estudiante exists before trying to edit it
        $data['estudiante'] = $this->Estudiante_model->get_estudiante($idEstudiante);
        
        if(isset($data['estudiante']['idEstudiante']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'idSemestreAcademico' => $this->input->post('idSemestreAcademico'),
					'idEscuelaProfesional' => $this->input->post('idEscuelaProfesional'),
					'idPersona' => $this->input->post('idPersona'),
                );

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
    
}
