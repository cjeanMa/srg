<?php

class Plazonota extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Plazonota_model');
    } 

    /*
     * Listing of plazonotas
     */
    function index()
    {
        $data['plazonotas'] = $this->Plazonota_model->get_all_plazonotas();
        
        $data['_view'] = 'plazonota/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new plazonota
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
            
            $plazonota_id = $this->Plazonota_model->add_plazonota($params);
            redirect('plazonota/index');
        }
        else
        {            
            $data['_view'] = 'plazonota/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a plazonota
     */
    function edit($idPlazoNotas)
    {   
        // check if the plazonota exists before trying to edit it
        $data['plazonota'] = $this->Plazonota_model->get_plazonota($idPlazoNotas);
        
        if(isset($data['plazonota']['idPlazoNotas']))
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

                $this->Plazonota_model->update_plazonota($idPlazoNotas,$params);            
                redirect('plazonota/index');
            }
            else
            {
                $data['_view'] = 'plazonota/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The plazonota you are trying to edit does not exist.');
    } 

    /*
     * Deleting plazonota
     */
    function remove($idPlazoNotas)
    {
        $plazonota = $this->Plazonota_model->get_plazonota($idPlazoNotas);

        // check if the plazonota exists before trying to delete it
        if(isset($plazonota['idPlazoNotas']))
        {
            $this->Plazonota_model->delete_plazonota($idPlazoNotas);
            redirect('plazonota/index');
        }
        else
            show_error('The plazonota you are trying to delete does not exist.');
    }
    
}
