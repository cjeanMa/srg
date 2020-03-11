<?php

 
class Semestreacademico extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Semestreacademico_model');
    } 

    /*
     * Listing of semestreacademico
     */
    function index()
    {
        $data['semestreacademico'] = $this->Semestreacademico_model->get_all_semestreacademico();
        
        $data['_view'] = 'semestreacademico/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new semestreacademico
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'anio' => $this->input->post('anio'),
				'periodo' => $this->input->post('periodo'),
            );
            
            $semestreacademico_id = $this->Semestreacademico_model->add_semestreacademico($params);
            redirect('semestreacademico/index');
        }
        else
        {            
            $data['_view'] = 'semestreacademico/add';
            $this->load->view('layouts/main',$data);
        }
    }  
    /*
     * Editing a semestreacademico
     */
    function edit($idSemestreAcademico)
    {   
        // check if the semestreacademico exists before trying to edit it
        $data['semestreacademico'] = $this->Semestreacademico_model->get_semestreacademico($idSemestreAcademico);
        
        if(isset($data['semestreacademico']['idSemestreAcademico']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'anio' => $this->input->post('anio'),
					'periodo' => $this->input->post('periodo'),
                );

                $this->Semestreacademico_model->update_semestreacademico($idSemestreAcademico,$params);            
                redirect('semestreacademico/index');
            }
            else
            {
                $data['_view'] = 'semestreacademico/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The semestreacademico you are trying to edit does not exist.');
    } 

    /*
     * Deleting semestreacademico
     */
    function remove($idSemestreAcademico)
    {
        $semestreacademico = $this->Semestreacademico_model->get_semestreacademico($idSemestreAcademico);

        // check if the semestreacademico exists before trying to delete it
        if(isset($semestreacademico['idSemestreAcademico']))
        {
            $this->Semestreacademico_model->delete_semestreacademico($idSemestreAcademico);
            //modifique la redireccion ya se administrara desde alli
            redirect('dashboard/administrator');
        }
        else
            show_error('The semestreacademico you are trying to delete does not exist.');
    }
    
}
