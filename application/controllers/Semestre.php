<?php

 
class Semestre extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Semestre_model');
    } 

    /*
     * Listing of semestre
     */
    function index()
    {
        $data['semestre'] = $this->Semestre_model->get_all_semestre();
        
        $data['_view'] = 'semestre/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new semestre
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'romanos' => $this->input->post('romanos'),
				'nombre' => $this->input->post('nombre'),
				'prenombre' => $this->input->post('prenombre'),
            );
            
            $semestre_id = $this->Semestre_model->add_semestre($params);
            redirect('semestre/index');
        }
        else
        {            
            $data['_view'] = 'semestre/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a semestre
     */
    function edit($idSemestre)
    {   
        // check if the semestre exists before trying to edit it
        $data['semestre'] = $this->Semestre_model->get_semestre($idSemestre);
        
        if(isset($data['semestre']['idSemestre']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'romanos' => $this->input->post('romanos'),
					'nombre' => $this->input->post('nombre'),
					'prenombre' => $this->input->post('prenombre'),
                );

                $this->Semestre_model->update_semestre($idSemestre,$params);            
                redirect('semestre/index');
            }
            else
            {
                $data['_view'] = 'semestre/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The semestre you are trying to edit does not exist.');
    } 

    /*
     * Deleting semestre
     */
    function remove($idSemestre)
    {
        $semestre = $this->Semestre_model->get_semestre($idSemestre);

        // check if the semestre exists before trying to delete it
        if(isset($semestre['idSemestre']))
        {
            $this->Semestre_model->delete_semestre($idSemestre);
            redirect('dashboard/administrator');
        }
        else
            show_error('The semestre you are trying to delete does not exist.');
    }
    
}
