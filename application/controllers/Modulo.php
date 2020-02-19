<?php

class Modulo extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Modulo_model');
    } 

    /*
     * Listing of modulo
     */
    function index()
    {
        $data['modulo'] = $this->Modulo_model->get_all_modulo();
        
        $data['_view'] = 'modulo/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new modulo
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'nombreModulo' => $this->input->post('nombreModulo'),
				'horasModulo' => $this->input->post('horasModulo'),
				'idEscuelaProfesional' => $this->input->post('idEscuelaProfesional'),
            );
            
            $modulo_id = $this->Modulo_model->add_modulo($params);
            redirect('modulo/index');
        }
        else
        {            
            $data['_view'] = 'modulo/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a modulo
     */
    function edit($idModulo)
    {   
        // check if the modulo exists before trying to edit it
        $data['modulo'] = $this->Modulo_model->get_modulo($idModulo);
        
        if(isset($data['modulo']['idModulo']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'nombreModulo' => $this->input->post('nombreModulo'),
					'horasModulo' => $this->input->post('horasModulo'),
					'idEscuelaProfesional' => $this->input->post('idEscuelaProfesional'),
                );

                $this->Modulo_model->update_modulo($idModulo,$params);            
                redirect('modulo/index');
            }
            else
            {
                $data['_view'] = 'modulo/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The modulo you are trying to edit does not exist.');
    } 

    /*
     * Deleting modulo
     */
    function remove($idModulo)
    {
        $modulo = $this->Modulo_model->get_modulo($idModulo);

        // check if the modulo exists before trying to delete it
        if(isset($modulo['idModulo']))
        {
            $this->Modulo_model->delete_modulo($idModulo);
            redirect('modulo/index');
        }
        else
            show_error('The modulo you are trying to delete does not exist.');
    }
    
}