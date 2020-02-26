<?php

class Modulo extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Modulo_model');
        $this->load->model('EscuelaProfesional_model');
    } 

    /*
     * Listing of modulo
     */
    function index()
    {
        $data['modulo'] = $this->Modulo_model->get_all_modulo_ep();
        $data['_view'] = 'modulo/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new modulo
     */
    function add()
    {   
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombreModulo','NombreModulo','max_length[100]|required');
        $this->form_validation->set_rules('horasModulo','HorasModulo','integer|required');
        
        if($this->form_validation->run())     
        {   
            $params = array(
                'idEscuelaProfesional' => $this->input->post('idEscuelaProfesional'),
                'nombreModulo' => $this->input->post('nombreModulo'),
                'horasModulo' => $this->input->post('horasModulo'),
            );
            
            $modulo_id = $this->Modulo_model->add_modulo($params);
            redirect('modulo/index');
        }
        else
        {   
            $data['escuelaProfesional'] = $this->EscuelaProfesional_model->get_all_escuelaprofesional();
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
        $data['modulo'] = $this->Modulo_model->get_modulo_ep($idModulo);
        
        if(isset($data['modulo']['idModulo']))
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nombreModulo','NombreModulo','max_length[100]|required');
            $this->form_validation->set_rules('horasModulo','HorasModulo','integer|required');
        
            if($this->form_validation->run())     
            {   
                $params = array(
                    'idEscuelaProfesional' => $this->input->post('idEscuelaProfesional'),
                    'nombreModulo' => $this->input->post('nombreModulo'),
                    'horasModulo' => $this->input->post('horasModulo'),
                );

                $this->Modulo_model->update_modulo($idModulo,$params);            
                redirect('modulo/index');
            }
            else
            {
                $this->load->model('Escuelaprofesional_model');
                $data['all_escuelaprofesional'] = $this->EscuelaProfesional_model->get_all_escuelaprofesional();

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

    /*
     * Mostrar la lista de modulos correspondientes al programa de estusio elegido
     */
    function modulosByEp($idEscuelaProfesional){
        $data['escuelaprofesional'] = $this->EscuelaProfesional_model->get_escuelaprofesional($idEscuelaProfesional);
        $data['modulo'] = $this->Modulo_model->get_all_modulo_by_ep($idEscuelaProfesional);
        
        $data['_view'] = 'modulo/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new modulo
     */
    function add_modulo_by_ep($idEscuelaProfesional)
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'nombreModulo' => $this->input->post('nombreModulo'),
				'horasModulo' => $this->input->post('horasModulo'),
				'idEscuelaProfesional' => $this->input->post('idEscuelaProfesional'),
            );
            
            $modulo_id = $this->Modulo_model->add_modulo($params);
            redirect('modulo/modulosByEp/'.$idEscuelaProfesional);
        }
        else
        {   $data['only_escuelaProfesional'] = $this->EscuelaProfesional_model->get_escuelaprofesional($idEscuelaProfesional);
            $data['_view'] = 'modulo/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    
}
