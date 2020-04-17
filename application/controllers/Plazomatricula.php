<?php

class Plazomatricula extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Plazomatricula_model');
        $this->load->model('Semestreacademico_model');
    } 

    /*
     * Listing of plazomatricula
     */
    function index()
    {
        $data['plazomatricula'] = $this->Plazomatricula_model->get_all_plazomatricula();
        $data['javascript']=array('plazos/indexPlazoMatricula.js');
        $data['_view'] = 'plazomatricula/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new plazomatricula
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $fechaActual = getDate();
            $fechaCodificada = $fechaActual['year']."-".$fechaActual['mon']."-".$fechaActual['mday'];
            $params = array(
				'fechaInicio' => $this->input->post('fechaInicio'),
                'fechaLimite' => $this->input->post('fechaLimite'),
                'fechaInicioRezagado' => $this->input->post('fechaInicioRezagado'),
                'fechaLimiteRezagado' => $this->input->post('fechaLimiteRezagado'),
                'fechaInicioExtemporaneo' => $this->input->post('fechaInicioExtemporaneo'),
                'fechaLimiteExtemporaneo' => $this->input->post('fechaLimiteExtemporaneo'),
				'fechaCreacion' => $fechaCodificada,
				'fechaModificacion' => $fechaCodificada,
				'idSemestreAcademico' => $this->input->post('idSemestreAcademico'),
            );
            
            $plazomatricula_id = $this->Plazomatricula_model->add_plazomatricula($params);
            redirect('plazomatricula/index');
        }
        else
        {      
            //Para mostrar los semestres que aun no fueron agregados
            $sem_aca = $this->Semestreacademico_model->get_all_semestreacademico();
            $sem_matricula= $this->Plazomatricula_model->get_all_plazomatricula();
            // para buscar los semestres academicos que estan disponibles para establecer un nuevo plazo de notas
            $aux_column = array_column($sem_aca, 'idSemestreAcademico');
            foreach($sem_matricula as $aux){
                $buscador = array_search($aux['idSemestreAcademico'],$aux_column,true);
                if(isset($buscador)){
                    unset($sem_aca[$buscador]);
                }
            }
            $data['semestreAcademico'] = $sem_aca;
            $data['javascript'] = array('plazos/addPlazos.js');        
            $data['_view'] = 'plazomatricula/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a plazomatricula
     */
    function edit($idPlazoMatricula)
    {   
        // check if the plazomatricula exists before trying to edit it
        $data['plazomatricula'] = $this->Plazomatricula_model->get_plazomatricula($idPlazoMatricula);
        
        if(isset($data['plazomatricula']['idPlazoMatricula']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $fechaActual = getDate();
                $fechaCodificada = $fechaActual['year']."-".$fechaActual['mon']."-".$fechaActual['mday'];
                $params = array(
					'fechaInicio' => $this->input->post('fechaInicio'),
                    'fechaLimite' => $this->input->post('fechaLimite'),
                    'fechaInicioRezagado' => $this->input->post('fechaInicioRezagado'),
                    'fechaLimiteRezagado' => $this->input->post('fechaLimiteRezagado'),
                    'fechaInicioExtemporaneo' => $this->input->post('fechaInicioExtemporaneo'),
                    'fechaLimiteExtemporaneo' => $this->input->post('fechaLimiteExtemporaneo'),
					'fechaModificacion' => $fechaCodificada,
					'idSemestreAcademico' => $this->input->post('idSemestreAcademico'),
                );

                $this->Plazomatricula_model->update_plazomatricula($idPlazoMatricula,$params);            
                redirect('plazomatricula/index');
            }
            else
            {
                $data['javascript'] = array('plazos/editPlazoMatricula.js'); 
                $data['_view'] = 'plazomatricula/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The plazomatricula you are trying to edit does not exist.');
    } 

    /*
     * Deleting plazomatricula
     */
    function remove($idPlazoMatricula)
    {
        $plazomatricula = $this->Plazomatricula_model->get_plazomatricula($idPlazoMatricula);

        // check if the plazomatricula exists before trying to delete it
        if(isset($plazomatricula['idPlazoMatricula']))
        {
            $this->Plazomatricula_model->delete_plazomatricula($idPlazoMatricula);
            redirect('plazomatricula/index');
        }
        else
            show_error('The plazomatricula you are trying to delete does not exist.');
    }
    
}
