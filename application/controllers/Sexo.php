<?php

 
class Sexo extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sexo_model');
    } 

    /*
     * Listing of sexo
     */
    function index()
    {
        $data['sexo'] = $this->Sexo_model->get_all_sexo();
        
        $data['_view'] = 'sexo/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new sexo
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'nombreSexo' => $this->input->post('nombreSexo'),
				'letraSexo' => $this->input->post('letraSexo'),
            );
            
            $sexo_id = $this->Sexo_model->add_sexo($params);
            redirect('sexo/index');
        }
        else
        {            
            $data['_view'] = 'sexo/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a sexo
     */
    function edit($idSexo)
    {   
        // check if the sexo exists before trying to edit it
        $data['sexo'] = $this->Sexo_model->get_sexo($idSexo);
        
        if(isset($data['sexo']['idSexo']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'nombreSexo' => $this->input->post('nombreSexo'),
					'letraSexo' => $this->input->post('letraSexo'),
                );

                $this->Sexo_model->update_sexo($idSexo,$params);            
                redirect('sexo/index');
            }
            else
            {
                $data['_view'] = 'sexo/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The sexo you are trying to edit does not exist.');
    } 

    /*
     * Deleting sexo
     */
    function remove($idSexo)
    {
        $sexo = $this->Sexo_model->get_sexo($idSexo);

        // check if the sexo exists before trying to delete it
        if(isset($sexo['idSexo']))
        {
            $this->Sexo_model->delete_sexo($idSexo);
            redirect('sexo/index');
        }
        else
            show_error('The sexo you are trying to delete does not exist.');
    }
    
}
