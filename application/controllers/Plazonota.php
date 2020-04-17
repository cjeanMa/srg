<?php

class Plazonota extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Plazonota_model');
        $this->load->model('Semestreacademico_model');
    } 

    /*
     * Listing of plazonotas
     */
    function index()
    {

        $data['plazonotas'] = $this->Plazonota_model->get_all_plazonotas();
        $data['javascript'] = array('plazos/indexPlazoNota.js');
        $data['_view'] = 'plazonota/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new plazonota
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
				'fechaCreacion' => $fechaCodificada,
				'fechaModificacion' => $fechaCodificada,
				'idSemestreAcademico' => $this->input->post('idSemestreAcademico'),
            );
            
            $plazonota_id = $this->Plazonota_model->add_plazonota($params);
            redirect('plazonota/index');
        }
        else
        {   
            //Para mostrar los semestres que aun no fueron agregados
            $sem_aca = $this->Semestreacademico_model->get_all_semestreacademico();
            $sem_notas= $this->Plazonota_model->get_all_plazonotas();
            // para buscar los semestres academicos que estan disponibles para establecer un nuevo plazo de notas
            $aux_column = array_column($sem_aca, 'idSemestreAcademico');
            foreach($sem_notas as $aux){
                $buscador = array_search($aux['idSemestreAcademico'],$aux_column,true);
                if(isset($buscador)){
                    unset($sem_aca[$buscador]);
                }
            }
            $data['semestreAcademico'] = $sem_aca;
            $data['javascript'] = array('plazos/addPlazos.js');  
            $data['_view'] = 'plazonota/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a plazonota
     */
    function edit($idPlazoNotas)
    {   
        // check if the plazonota exists before trying to edit it
        $data['plazonota'] = $this->Plazonota_model->get_plazonota($idPlazoNotas);
        
        if(isset($data['plazonota']['idPlazoNotas']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $fechaActual = getDate();
                $fechaCodificada = $fechaActual['year']."-".$fechaActual['mon']."-".$fechaActual['mday'];
                $params = array(
					'fechaInicio' => $this->input->post('fechaInicio'),
					'fechaLimite' => $this->input->post('fechaLimite'),
					'fechaCreacion' => $this->input->post('fechaCreacion'),
					'fechaModificacion' => $fechaCodificada,
					'idSemestreAcademico' => $this->input->post('idSemestreAcademico'),
                );

                $this->Plazonota_model->update_plazonota($idPlazoNotas,$params);            
                redirect('plazonota/index');
            }
            else
            {
                $data['javascript'] = array('plazos/editPlazoNota.js');  
                $data['_view'] = 'plazonota/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The plazonota you are trying to edit does not exist.');
    } 

    /*
     * Deleting plazonota
     */
    function remove($idPlazoNotas)
    {
        $plazonota = $this->Plazonota_model->get_plazonota($idPlazoNotas);

        // check if the plazonota exists before trying to delete it
        if(isset($plazonota['idPlazoNotas']))
        {
            $this->Plazonota_model->delete_plazonota($idPlazoNotas);
            redirect('plazonota/index');
        }
        else
            show_error('The plazonota you are trying to delete does not exist.');
    }
    
}
