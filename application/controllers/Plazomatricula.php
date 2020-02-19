<?php

class Plazomatricula extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Plazomatricula_model');
    } 

    /*
     * Listing of plazomatricula
     */
    function index()
    {
        $data['plazomatricula'] = $this->Plazomatricula_model->get_all_plazomatricula();
        
        $data['_view'] = 'plazomatricula/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new plazomatricula
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'fechaInicio' => $this->input->post('fechaInicio'),
				'fechaLimite' => $this->input->post('fechaLimite'),
				'fechaCreacion' => $this->input->post('fechaCreacion'),
				'fechaModificacion' => $this->input->post('fechaModificacion'),
				'idSemestreAcademico' => $this->input->post('idSemestreAcademico'),
            );
            
            $plazomatricula_id = $this->Plazomatricula_model->add_plazomatricula($params);
            redirect('plazomatricula/index');
        }
        else
        {            
            $data['_view'] = 'plazomatricula/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a plazomatricula
     */
    function edit($idPlazoMatricula)
    {   
        // check if the plazomatricula exists before trying to edit it
        $data['plazomatricula'] = $this->Plazomatricula_model->get_plazomatricula($idPlazoMatricula);
        
        if(isset($data['plazomatricula']['idPlazoMatricula']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'fechaInicio' => $this->input->post('fechaInicio'),
					'fechaLimite' => $this->input->post('fechaLimite'),
					'fechaCreacion' => $this->input->post('fechaCreacion'),
					'fechaModificacion' => $this->input->post('fechaModificacion'),
					'idSemestreAcademico' => $this->input->post('idSemestreAcademico'),
                );

                $this->Plazomatricula_model->update_plazomatricula($idPlazoMatricula,$params);            
                redirect('plazomatricula/index');
            }
            else
            {
                $data['_view'] = 'plazomatricula/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The plazomatricula you are trying to edit does not exist.');
    } 

    /*
     * Deleting plazomatricula
     */
    function remove($idPlazoMatricula)
    {
        $plazomatricula = $this->Plazomatricula_model->get_plazomatricula($idPlazoMatricula);

        // check if the plazomatricula exists before trying to delete it
        if(isset($plazomatricula['idPlazoMatricula']))
        {
            $this->Plazomatricula_model->delete_plazomatricula($idPlazoMatricula);
            redirect('plazomatricula/index');
        }
        else
            show_error('The plazomatricula you are trying to delete does not exist.');
    }
    
}
