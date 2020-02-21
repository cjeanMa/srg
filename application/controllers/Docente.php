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
        $data['docente'] = $this->Docente_model->get_all_docente();
        
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
            $params = array(
				'idPersona' => $this->input->post('idPersona'),
				'idEscuelaProfesional' => $this->input->post('idEscuelaProfesional'),
            );
            
            $docente_id = $this->Docente_model->add_docente($params);
            redirect('docente/index');
        }
        else
        {            
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
        $data['docente'] = $this->Docente_model->get_docente($idDocente);
        
        if(isset($data['docente']['idDocente']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'idPersona' => $this->input->post('idPersona'),
					'idEscuelaProfesional' => $this->input->post('idEscuelaProfesional'),
                );

                $this->Docente_model->update_docente($idDocente,$params);            
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
