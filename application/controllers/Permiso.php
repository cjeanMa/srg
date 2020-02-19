<?php

 
class Permiso extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Permiso_model');
    } 

    /*
     * Listing of permisos
     */
    function index()
    {
        $data['permisos'] = $this->Permiso_model->get_all_permisos();
        
        $data['_view'] = 'permiso/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new permiso
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'nombrePermiso' => $this->input->post('nombrePermiso'),
				'descripcion' => $this->input->post('descripcion'),
            );
            
            $permiso_id = $this->Permiso_model->add_permiso($params);
            redirect('permiso/index');
        }
        else
        {            
            $data['_view'] = 'permiso/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a permiso
     */
    function edit($idPermiso)
    {   
        // check if the permiso exists before trying to edit it
        $data['permiso'] = $this->Permiso_model->get_permiso($idPermiso);
        
        if(isset($data['permiso']['idPermiso']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'nombrePermiso' => $this->input->post('nombrePermiso'),
					'descripcion' => $this->input->post('descripcion'),
                );

                $this->Permiso_model->update_permiso($idPermiso,$params);            
                redirect('permiso/index');
            }
            else
            {
                $data['_view'] = 'permiso/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The permiso you are trying to edit does not exist.');
    } 

    /*
     * Deleting permiso
     */
    function remove($idPermiso)
    {
        $permiso = $this->Permiso_model->get_permiso($idPermiso);

        // check if the permiso exists before trying to delete it
        if(isset($permiso['idPermiso']))
        {
            $this->Permiso_model->delete_permiso($idPermiso);
            redirect('permiso/index');
        }
        else
            show_error('The permiso you are trying to delete does not exist.');
    }
    
}
