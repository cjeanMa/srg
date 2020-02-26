<?php

class Persona extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Persona_model');
        $this->load->model('Discapacidad_model');
        $this->load->model('Sexo_model');
    } 

    /*
     * Listing of persona
     */
    function index()
    {
        $data['persona'] = $this->Persona_model->get_all_persona();
        
        $data['_view'] = 'persona/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new persona
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'apellidoPaterno' => $this->input->post('apellidoPaterno'),
				'apellidoMaterno' => $this->input->post('apellidoMaterno'),
				'nombres' => $this->input->post('nombres'),
				'idSexo' => $this->input->post('idSexo'),
				'fechaNacimiento' => $this->input->post('fechaNacimiento'),
				'direccion' => $this->input->post('direccion'),
				'email' => $this->input->post('email'),
				'numCelular' => $this->input->post('numCelular'),
				'idDiscapacidad' => $this->input->post('idDiscapacidad'),
            );
            
            $persona_id = $this->Persona_model->add_persona($params);
            redirect('persona/index');
        }
        else
        {
            $data['all_discapacidad'] = $this->Discapacidad_model->get_all_discapacidad();
            $data['all_sexo'] = $this->Sexo_model->get_all_sexo();            
            $data['_view'] = 'persona/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a persona
     */
    function edit($idPersona)
    {   
        // check if the persona exists before trying to edit it
        $data['persona'] = $this->Persona_model->get_persona($idPersona);
        
        if(isset($data['persona']['idPersona']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'apellidoPaterno' => $this->input->post('apellidoPaterno'),
					'apellidoMaterno' => $this->input->post('apellidoMaterno'),
					'nombres' => $this->input->post('nombres'),
					'idSexo' => $this->input->post('idSexo'),
					'fechaNacimiento' => $this->input->post('fechaNacimiento'),
					'direccion' => $this->input->post('direccion'),
					'email' => $this->input->post('email'),
					'numCelular' => $this->input->post('numCelular'),
					'idDiscapacidad' => $this->input->post('idDiscapacidad'),
                );

                $this->Persona_model->update_persona($idPersona,$params);            
                redirect('persona/index');
            }
            else
            {
                $data['_view'] = 'persona/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The persona you are trying to edit does not exist.');
    } 

    /*
     * Deleting persona
     */
    function remove($idPersona)
    {
        $persona = $this->Persona_model->get_persona($idPersona);

        // check if the persona exists before trying to delete it
        if(isset($persona['idPersona']))
        {
            $this->Persona_model->delete_persona($idPersona);
            redirect('persona/index');
        }
        else
            show_error('The persona you are trying to delete does not exist.');
    }
    
}
