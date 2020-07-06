<?php

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata("login")) {
            redirect(base_url().'login');
        }
        $this->load->model('Sexo_model');
        $this->load->model('Discapacidad_model');
        $this->load->model('Semestre_model');
        $this->load->model('Semestreacademico_model');
        $this->load->model('Plazomatricula_model');
        $this->load->model('Plazonota_model');
    }

    function index()
    {
        $data['_view'] = 'dashboard';
        $this->load->view('layouts/main', $data);
    }
    function administrator()
    {

        $data['semestreAcademico'] = $this->Semestreacademico_model->get_all_semestreacademico();
        $data['semestres'] = $this->Semestre_model->get_all_semestre();
        $data['discapacidades'] = $this->Discapacidad_model->get_all_discapacidad();
        $data['sexos'] = $this->Sexo_model->get_all_sexo();
        $data['plazoMatricula'] = $this->Plazomatricula_model->get_all_plazomatricula();
        $data['plazoNota'] = $this->Plazonota_model->get_all_plazonotas();
        //Para filtrar los seestersacademicos que se necesitan para agregar plazo nota
        $data['saFiltradoPlazoMatricula'] = $this->searchAvaibleSemestre($data['semestreAcademico'], $data['plazoMatricula']);
        $data['saFiltradoPlazoNota'] = $this->searchAvaibleSemestre($data['semestreAcademico'], $data['plazoNota']);
        //para cargar el js 
        $data['javascript'] = array('dashboard/administrator.js', 'plazos/addPlazos.js');
        $data['_view'] = 'administrator';
        $this->load->view('layouts/main', $data);
    }

    function searchAvaibleSemestre($semestresAcademicos, $semestresPlazoMatricula)
    {
        // para buscar los semestres academicos que estan disponibles para establecer un nuevo plazo de notas
        $sa_column = array_column($semestresAcademicos, 'idSemestreAcademico');
        foreach ($semestresPlazoMatricula as $spm) {
            $buscador = array_search($spm['idSemestreAcademico'], $sa_column, true);
            if (isset($buscador)) {
                unset($semestresAcademicos[$buscador]);
            }
        }
        return $semestresAcademicos;
    }

    function addSemestreAcademicoAjax()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->input->post();
            if (isset($datos)) {
                $datos_add = array(
                    'anio' => $datos['anioSA'],
                    'periodo' => $datos['periodoSA'],
                );
                $this->Semestreacademico_model->add_semestreacademico($datos_add);
                $data['semestreAcademico'] = $this->Semestreacademico_model->get_all_semestreacademico();
                $this->load->view('ajax/tableSemestreAcademico', $data);
            }
        }
    }

    function addSemestreAjax()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->input->post();
            if (isset($datos)) {
                $datos_add = array(
                    'romanos' => $datos['romanos'],
                    'nombre' => $datos['nombreSemestre'],
                    'prenombre' => $datos['preNombre'],
                );
                $this->Semestre_model->add_semestre($datos_add);
                $data['semestres'] = $this->Semestre_model->get_all_semestre();
                $this->load->view('ajax/tableSemestre', $data);
            }
        }
    }

    function addPlazoMatriculaAjax()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->input->post();
            if (isset($datos)) {
                $fechaActual = getDate();
                $fechaCodificada = $fechaActual['year'] . "-" . $fechaActual['mon'] . "-" . $fechaActual['mday'];
                $datos_add = array(
                    "fechaInicio" => $datos['fechaInicio'],
                    "fechaLimite" => $datos['fechaLimite'],
                    "fechaInicioRezagado" => $datos['fechaInicioRezagado'],
                    "fechaLimiteRezagado" => $datos['fechaLimiteRezagado'],
                    "fechaInicioExtemporaneo" => $datos['fechaInicioExtemporaneo'],
                    "fechaLimiteExtemporaneo" => $datos['fechaLimiteExtemporaneo'],
                    "fechaCreacion" => $fechaCodificada,
                    "fechaModificacion" => $fechaCodificada,
                    "idSemestreAcademico" => $datos['idSemestre'],
                );
                $this->Plazomatricula_model->add_plazomatricula($datos_add);
                $data['plazoMatricula'] = $this->Plazomatricula_model->get_all_plazomatricula();
                $this->load->view('ajax/tablePlazoMatricula', $data);
            }
        }
    }

    function addPlazoNotaAjax()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->input->post();
            if (isset($datos)) {
                $fechaActual = getDate();
                $fechaCodificada = $fechaActual['year'] . "-" . $fechaActual['mon'] . "-" . $fechaActual['mday'];
                $datos_add = array(
                    "fechaInicio" => $datos['fi'],
                    "fechaLimite" => $datos['fl'],
                    "fechaCreacion" => $fechaCodificada,
                    "fechaModificacion" => $fechaCodificada,
                    "idSemestreAcademico" => $datos['idSa'],
                );
                $this->Plazonota_model->add_plazonota($datos_add);
                $data['plazoNota'] = $this->Plazonota_model->get_all_plazonotas();
                $this->load->view('ajax/tablePlazoNota', $data);
            }
        }
    }

    function addDiscapacidadAjax()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->input->post();
            if (isset($datos)) {
                $datos_add = array(
                    'nombreDiscapacidad' => $datos['nombreDiscapacidad'],
                );
                $this->Discapacidad_model->add_discapacidad($datos_add);
                $data['discapacidades'] = $this->Discapacidad_model->get_all_discapacidad();
                $this->load->view('ajax/tableDiscapacidad', $data);
            }
        }
    }
    function addGeneroAjax()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->input->post();
            if (isset($datos)) {
                $datos_add = array(
                    'nombreSexo' => $datos['nombreSexo'],
                    'letraSexo' => $datos['abreviacionSexo'],
                );
                $this->Sexo_model->add_sexo($datos_add);
                $data['sexos'] = $this->Sexo_model->get_all_sexo();
                $this->load->view('ajax/tableGenero', $data);
            }
        }
    }
    function updateSemestreAcademicoAjax()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->input->post();
            if (isset($datos)) {
                $this->Semestreacademico_model->update_semestreacademico($datos['idSemestreAcademico'], $datos);
                $data['semestreAcademico'] = $this->Semestreacademico_model->get_all_semestreacademico();
                $this->load->view('ajax/tableSemestreAcademico', $data);
            }
        }
    }

    function updateSemestreAjax()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->input->post();
            if (isset($datos)) {
                $this->Semestre_model->update_semestre($datos['idSemestre'], $datos);
                $data['semestres'] = $this->Semestre_model->get_all_semestre();
                $this->load->view('ajax/tableSemestre', $data);
            }
        }
    }

    function updatePlazoMatriculaAjax()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->input->post();
            if (isset($datos)) {
                $fechaActual = getDate();
                $fechaCodificada = $fechaActual['year'] . "-" . $fechaActual['mon'] . "-" . $fechaActual['mday'];
                $datos_update = array(
                    'fechaInicio' => $datos['fi'],
                    'fechaLimite' => $datos['fl'],
                    'fechaInicioRezagado' => $datos['fir'],
                    'fechaLimiteRezagado' => $datos['flr'],
                    'fechaInicioExtemporaneo' => $datos['fie'],
                    'fechaLimiteExtemporaneo' => $datos['fle'],
                    'fechaModificacion' => $fechaCodificada,
                    'idSemestreAcademico' => $datos['idSa'],
                );
                $this->Plazomatricula_model->update_plazomatricula($datos['idPm'], $datos_update);
                $data['plazoMatricula'] = $this->Plazomatricula_model->get_all_plazomatricula();
                $this->load->view('ajax/tablePlazoMatricula', $data);
            }
        }
    }

    function updatePlazoNotaAjax()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->input->post();
            if (isset($datos)) {
                $fechaActual = getDate();
                $fechaCodificada = $fechaActual['year'] . "-" . $fechaActual['mon'] . "-" . $fechaActual['mday'];
                $datos_update = array(
                    'fechaInicio' => $datos['fi'],
                    'fechaLimite' => $datos['fl'],
                    'fechaModificacion' => $fechaCodificada,
                    'idSemestreAcademico' => $datos['idSa'],
                );
                $this->Plazonota_model->update_plazonota($datos['idPn'], $datos_update);
                $data['plazoNota'] = $this->Plazonota_model->get_all_plazonotas();
                $this->load->view('ajax/tablePlazoNota', $data);
            }
        }
    }

    function updateDiscapacidadAjax()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->input->post();
            if (isset($datos)) {
                $this->Discapacidad_model->update_discapacidad($datos['idDiscapacidad'], $datos);
                $data['discapacidades'] = $this->Discapacidad_model->get_all_discapacidad();
                $this->load->view('ajax/tableDiscapacidad', $data);
            }
        }
    }
    function updateGeneroAjax()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->input->post();
            if (isset($datos)) {
                $this->Sexo_model->update_sexo($datos['idSexo'], $datos);
                $data['sexos'] = $this->Sexo_model->get_all_sexo();
                $this->load->view('ajax/tableGenero', $data);
            }
        }
    }
}
