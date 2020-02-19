<?php

 
class Usuario extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
    } 

    /*
     * Listing of usuario
     */
    function index()
    {
        $data['usuario'] = $this->Usuario_model->get_all_usuario();
        
        $data['_view'] = 'usuario/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new usuario
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'usuario' => $this->input->post('usuario'),
				'contrase' => $this->input->post('contrase'),
				'ultimaSesion' => $this->input->post('ultimaSesion'),
				'idPermiso' => $this->input->post('idPermiso'),
				'idPersona' => $this->input->post('idPersona'),
				'idHabilitacion' => $this->input->post('idHabilitacion'),
            );
            
            $usuario_id = $this->Usuario_model->add_usuario($params);
            redirect('usuario/index');
        }
        else
        {            
            $data['_view'] = 'usuario/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a usuario
     */
    function edit($idUsuario)
    {   
        // check if the usuario exists before trying to edit it
        $data['usuario'] = $this->Usuario_model->get_usuario($idUsuario);
        
        if(isset($data['usuario']['idUsuario']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'usuario' => $this->input->post('usuario'),
					'contrase' => $this->input->post('contrase'),
					'ultimaSesion' => $this->input->post('ultimaSesion'),
					'idPermiso' => $this->input->post('idPermiso'),
					'idPersona' => $this->input->post('idPersona'),
					'idHabilitacion' => $this->input->post('idHabilitacion'),
                );

                $this->Usuario_model->update_usuario($idUsuario,$params);            
                redirect('usuario/index');
            }
            else
            {
                $data['_view'] = 'usuario/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The usuario you are trying to edit does not exist.');
    } 

    /*
     * Deleting usuario
     */
    function remove($idUsuario)
    {
        $usuario = $this->Usuario_model->get_usuario($idUsuario);

        // check if the usuario exists before trying to delete it
        if(isset($usuario['idUsuario']))
        {
            $this->Usuario_model->delete_usuario($idUsuario);
            redirect('usuario/index');
        }
        else
            show_error('The usuario you are trying to delete does not exist.');
    }
    
}