<?php

 
class Tipomatricula extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tipomatricula_model');
    } 

    /*
     * Listing of tipomatricula
     */
    function index()
    {
        $data['tipomatricula'] = $this->Tipomatricula_model->get_all_tipomatricula();
        
        $data['_view'] = 'tipomatricula/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new tipomatricula
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'nombre' => $this->input->post('nombre'),
				'descripcion' => $this->input->post('descripcion'),
            );
            
            $tipomatricula_id = $this->Tipomatricula_model->add_tipomatricula($params);
            redirect('tipomatricula/index');
        }
        else
        {            
            $data['_view'] = 'tipomatricula/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a tipomatricula
     */
    function edit($idtipoMatricula)
    {   
        // check if the tipomatricula exists before trying to edit it
        $data['tipomatricula'] = $this->Tipomatricula_model->get_tipomatricula($idtipoMatricula);
        
        if(isset($data['tipomatricula']['idtipoMatricula']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'nombre' => $this->input->post('nombre'),
					'descripcion' => $this->input->post('descripcion'),
                );

                $this->Tipomatricula_model->update_tipomatricula($idtipoMatricula,$params);            
                redirect('tipomatricula/index');
            }
            else
            {
                $data['_view'] = 'tipomatricula/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The tipomatricula you are trying to edit does not exist.');
    } 

    /*
     * Deleting tipomatricula
     */
    function remove($idtipoMatricula)
    {
        $tipomatricula = $this->Tipomatricula_model->get_tipomatricula($idtipoMatricula);

        // check if the tipomatricula exists before trying to delete it
        if(isset($tipomatricula['idtipoMatricula']))
        {
            $this->Tipomatricula_model->delete_tipomatricula($idtipoMatricula);
            redirect('tipomatricula/index');
        }
        else
            show_error('The tipomatricula you are trying to delete does not exist.');
    }
    
}
