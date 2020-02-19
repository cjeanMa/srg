<?php

class Asignacion extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Asignacion_model');
    } 

    /*
     * Listing of asignacion
     */
    function index()
    {
        $data['asignacion'] = $this->Asignacion_model->get_all_asignacion();
        
        $data['_view'] = 'asignacion/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new asignacion
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'idDocente' => $this->input->post('idDocente'),
				'idSemestreAcademico' => $this->input->post('idSemestreAcademico'),
				'idUnidadDidactica' => $this->input->post('idUnidadDidactica'),
            );
            
            $asignacion_id = $this->Asignacion_model->add_asignacion($params);
            redirect('asignacion/index');
        }
        else
        {            
            $data['_view'] = 'asignacion/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a asignacion
     */
    function edit($idAsignacion)
    {   
        // check if the asignacion exists before trying to edit it
        $data['asignacion'] = $this->Asignacion_model->get_asignacion($idAsignacion);
        
        if(isset($data['asignacion']['idAsignacion']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'idDocente' => $this->input->post('idDocente'),
					'idSemestreAcademico' => $this->input->post('idSemestreAcademico'),
					'idUnidadDidactica' => $this->input->post('idUnidadDidactica'),
                );

                $this->Asignacion_model->update_asignacion($idAsignacion,$params);            
                redirect('asignacion/index');
            }
            else
            {
                $data['_view'] = 'asignacion/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The asignacion you are trying to edit does not exist.');
    } 

    /*
     * Deleting asignacion
     */
    function remove($idAsignacion)
    {
        $asignacion = $this->Asignacion_model->get_asignacion($idAsignacion);

        // check if the asignacion exists before trying to delete it
        if(isset($asignacion['idAsignacion']))
        {
            $this->Asignacion_model->delete_asignacion($idAsignacion);
            redirect('asignacion/index');
        }
        else
            show_error('The asignacion you are trying to delete does not exist.');
    }
    
}
