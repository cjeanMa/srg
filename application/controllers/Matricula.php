<?php

 
class Matricula extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Matricula_model');
    } 

    /*
     * Listing of matricula
     */
    function index()
    {
        $data['matricula'] = $this->Matricula_model->get_all_matricula();
        
        $data['_view'] = 'matricula/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new matricula
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'idSemestreAcademico' => $this->input->post('idSemestreAcademico'),
				'nota' => $this->input->post('nota'),
				'notaLetra' => $this->input->post('notaLetra'),
				'fechaMatricula' => $this->input->post('fechaMatricula'),
				'observacion' => $this->input->post('observacion'),
				'idEstudiante' => $this->input->post('idEstudiante'),
				'idEstado' => $this->input->post('idEstado'),
				'idEstadoModular' => $this->input->post('idEstadoModular'),
				'tipo_Matricula_idTipo_Matricula' => $this->input->post('tipo_Matricula_idTipo_Matricula'),
            );
            
            $matricula_id = $this->Matricula_model->add_matricula($params);
            redirect('matricula/index');
        }
        else
        {            
            $data['_view'] = 'matricula/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a matricula
     */
    function edit($idMatricula)
    {   
        // check if the matricula exists before trying to edit it
        $data['matricula'] = $this->Matricula_model->get_matricula($idMatricula);
        
        if(isset($data['matricula']['idMatricula']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'idSemestreAcademico' => $this->input->post('idSemestreAcademico'),
					'nota' => $this->input->post('nota'),
					'notaLetra' => $this->input->post('notaLetra'),
					'fechaMatricula' => $this->input->post('fechaMatricula'),
					'observacion' => $this->input->post('observacion'),
					'idEstudiante' => $this->input->post('idEstudiante'),
					'idEstado' => $this->input->post('idEstado'),
					'idEstadoModular' => $this->input->post('idEstadoModular'),
					'tipo_Matricula_idTipo_Matricula' => $this->input->post('tipo_Matricula_idTipo_Matricula'),
                );

                $this->Matricula_model->update_matricula($idMatricula,$params);            
                redirect('matricula/index');
            }
            else
            {
                $data['_view'] = 'matricula/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The matricula you are trying to edit does not exist.');
    } 

    /*
     * Deleting matricula
     */
    function remove($idMatricula)
    {
        $matricula = $this->Matricula_model->get_matricula($idMatricula);

        // check if the matricula exists before trying to delete it
        if(isset($matricula['idMatricula']))
        {
            $this->Matricula_model->delete_matricula($idMatricula);
            redirect('matricula/index');
        }
        else
            show_error('The matricula you are trying to delete does not exist.');
    }
    
}
