<?php

 
class Discapacidad extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Discapacidad_model');
    } 

    /*
     * Listing of discapacidad
     */
    function index()
    {
        $data['discapacidad'] = $this->Discapacidad_model->get_all_discapacidad();
        
        $data['_view'] = 'discapacidad/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new discapacidad
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'nombreDiscapacidad' => $this->input->post('nombreDiscapacidad'),
            );
            
            $discapacidad_id = $this->Discapacidad_model->add_discapacidad($params);
            redirect('discapacidad/index');
        }
        else
        {            
            $data['_view'] = 'discapacidad/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a discapacidad
     */
    function edit($idDiscapacidad)
    {   
        // check if the discapacidad exists before trying to edit it
        $data['discapacidad'] = $this->Discapacidad_model->get_discapacidad($idDiscapacidad);
        
        if(isset($data['discapacidad']['idDiscapacidad']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'nombreDiscapacidad' => $this->input->post('nombreDiscapacidad'),
                );

                $this->Discapacidad_model->update_discapacidad($idDiscapacidad,$params);            
                redirect('discapacidad/index');
            }
            else
            {
                $data['_view'] = 'discapacidad/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The discapacidad you are trying to edit does not exist.');
    } 

    /*
     * Deleting discapacidad
     */
    function remove($idDiscapacidad)
    {
        $discapacidad = $this->Discapacidad_model->get_discapacidad($idDiscapacidad);

        // check if the discapacidad exists before trying to delete it
        if(isset($discapacidad['idDiscapacidad']))
        {
            $this->Discapacidad_model->delete_discapacidad($idDiscapacidad);
            redirect('dashboard/administrator');
        }
        else
            show_error('The discapacidad you are trying to delete does not exist.');
    }
    
}
