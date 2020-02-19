<?php

 
class Habilitacion extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Habilitacion_model');
    } 

    /*
     * Listing of habilitacion
     */
    function index()
    {
        $data['habilitacion'] = $this->Habilitacion_model->get_all_habilitacion();
        
        $data['_view'] = 'habilitacion/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new habilitacion
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'descripcion' => $this->input->post('descripcion'),
            );
            
            $habilitacion_id = $this->Habilitacion_model->add_habilitacion($params);
            redirect('habilitacion/index');
        }
        else
        {            
            $data['_view'] = 'habilitacion/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a habilitacion
     */
    function edit($idHabilitacion)
    {   
        // check if the habilitacion exists before trying to edit it
        $data['habilitacion'] = $this->Habilitacion_model->get_habilitacion($idHabilitacion);
        
        if(isset($data['habilitacion']['idHabilitacion']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'descripcion' => $this->input->post('descripcion'),
                );

                $this->Habilitacion_model->update_habilitacion($idHabilitacion,$params);            
                redirect('habilitacion/index');
            }
            else
            {
                $data['_view'] = 'habilitacion/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The habilitacion you are trying to edit does not exist.');
    } 

    /*
     * Deleting habilitacion
     */
    function remove($idHabilitacion)
    {
        $habilitacion = $this->Habilitacion_model->get_habilitacion($idHabilitacion);

        // check if the habilitacion exists before trying to delete it
        if(isset($habilitacion['idHabilitacion']))
        {
            $this->Habilitacion_model->delete_habilitacion($idHabilitacion);
            redirect('habilitacion/index');
        }
        else
            show_error('The habilitacion you are trying to delete does not exist.');
    }
    
}
