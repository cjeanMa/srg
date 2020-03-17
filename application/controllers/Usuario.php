<?php

 
class Usuario extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->model('Sexo_model');
        $this->load->model('Persona_model');
        $this->load->model('Permiso_model');
        $this->load->model('Habilitacion_model');
        $this->load->model('Discapacidad_model');
        
    } 

    /*
     * Listing of usuario
     */
    function index()
    {
        $temp = $this->Usuario_model->get_all_usuario();
        // var_dump($temp);
        foreach ($temp as $key => $value) {
            // $temp_usuario=$this->Usuario_model->get_usuario($value['idUsuario']);
            $temp_persona=$this->Persona_model->get_persona($value['idPersona']);
            // idUsuario
            // var_dump($temp_persona);
            $data['usuario'][]=array(
                'idUsuario'=>$value['idUsuario'],
                'idPersona'=>$value['idPersona'],
                'usuario'=>$value['usuario'],
                'contraseña'=>$value['contraseña'],
                'ultimaSesion'=>$value['ultimaSesion'],
                'permiso'=>$this->Permiso_model->get_permiso($value['idPermiso'])['nombrePermiso'],
                'persona'=>$temp_persona['apellidoPaterno'].' '.$temp_persona['apellidoMaterno'].', '.$temp_persona['nombres'],
                'habilitacion'=>$this->Habilitacion_model->get_habilitacion($value['idHabilitacion'])['nombreHabilitacion'],
            );        
            // var_dump($this->Habilitacion_model->get_habilitacion($value['idHabilitacion'])['nombreHabilitacion']);
            // $this->Habilitacion_model->get_all_habilitacion();
            // $data['all_Permiso'] = $this->Permiso_model->get_all_permisos(); 
        }
    
        
        $data['_view'] = 'usuario/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new usuario
     */
    function add()
    {   
        $usr='';
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params_persona = array(             
                'idPersona' => $this->input->post('dni'),
                'apellidoPaterno' => $this->input->post('apellido_paterno'),
                'apellidoMaterno' => $this->input->post('apellido_materno'),
                'nombres' => $this->input->post('nombres'),
                'idSexo' => $this->input->post('idSexo'),
                'fechaNacimiento' => $this->input->post('fecha_nac'),
                'direccion' => $this->input->post('direccion'),
                'email' => $this->input->post('email'),
                'numCelular' => $this->input->post('telefono'),
                'idDiscapacidad' => $this->input->post('idDiscapacidad'),
            );
            
            
            $this->Persona_model->add_persona($params_persona);
            $persona_id = $this->Persona_model->get_persona($this->input->post('dni'));
            
            // var_dump($persona_id);
            // echo empty($persona_id);
            // echo $persona_id['idPersona'];
            if ($persona_id['idPersona']) {
                $params_usuario = array(             
                    'idPersona' => $persona_id['idPersona'],
                    'usuario' => $this->input->post('usuario'),
                    'contraseña' => $this->input->post('contrase'),
                    'ultimaSesion' => '',
                    'idPermiso' => $this->input->post('idPermiso'),
                    'idHabilitacion' => $this->input->post('idHabilitacion'),
                );
                $usuario_id = $this->Usuario_model->add_usuario($params_usuario);
                // var_dump($usuario_id);
                $usr=$this->Usuario_model->get_usuario($usuario_id);
                // var_dump($usr);
                if (empty($usuario_id)) {
                    $this->Persona_model->delete_persona($persona_id['idPersona']);
                }else{
                    var_dump($usr);
                }
            }
            
            redirect('usuario/index');
        }
        else
        {
            $data['all_Habilitacion'] = $this->Habilitacion_model->get_all_habilitacion();
            $data['all_Permiso'] = $this->Permiso_model->get_all_permisos();   
            $data['all_Persona'] = $this->Persona_model->get_all_persona();   
            $data['all_Sexo'] = $this->Sexo_model->get_all_sexo();   
            $data['all_Discapacidad'] = $this->Discapacidad_model->get_all_discapacidad();
            
                           
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
        $data['persona'] = $this->Persona_model->get_persona($data['usuario']['idPersona']);
        // var_dump($data['usuario']);
        // var_dump($data['persona']);
        if(isset($data['usuario']['idUsuario']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params_persona = array(             
                'idPersona' => $this->input->post('dni'),
                'apellidoPaterno' => $this->input->post('apellido_paterno'),
                'apellidoMaterno' => $this->input->post('apellido_materno'),
                'nombres' => $this->input->post('nombres'),
                'idSexo' => $this->input->post('idSexo'),
                'fechaNacimiento' => $this->input->post('fecha_nac'),
                'direccion' => $this->input->post('direccion'),
                'email' => $this->input->post('email'),
                'numCelular' => $this->input->post('telefono'),
                'idDiscapacidad' => $this->input->post('idDiscapacidad'),
            );
            
            
            $this->Persona_model->update_persona($this->input->post('dni'),$params_persona);   
            $persona_id = $this->Persona_model->get_persona($this->input->post('dni'));
            
                $params_usuario = array(             
                    'idPersona' => $persona_id['idPersona'],
                    'usuario' => $this->input->post('usuario'),
                    'contraseña' => $this->input->post('contrase'),
                    'ultimaSesion' => '',
                    'idPermiso' => $this->input->post('idPermiso'),
                    'idHabilitacion' => $this->input->post('idHabilitacion'),
                );

                $this->Usuario_model->update_usuario($idUsuario,$params_usuario);            
                redirect('usuario/index');
            }
            else
            {
                $data['all_Habilitacion'] = $this->Habilitacion_model->get_all_habilitacion();
                $data['all_Permiso'] = $this->Permiso_model->get_all_permisos();   
                $data['all_Persona'] = $this->Persona_model->get_all_persona();   
                $data['all_Sexo'] = $this->Sexo_model->get_all_sexo();   
                $data['all_Discapacidad'] = $this->Discapacidad_model->get_all_discapacidad();

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
    function remove($idpersona)
    {
        // cambiado para que elimine usuaria y persona
        // $usuario = $this->Usuario_model->get_usuario($idUsuario);
        $persona = $this->Persona_model->get_persona($idpersona);

        // check if the usuario exists before trying to delete it
        if(isset($persona['idPersona']))
        {
            // $this->Usuario_model->delete_usuario($idUsuario);
            $this->Persona_model->delete_persona($idpersona);
            redirect('usuario/index');
        }
        else
            show_error('The usuario you are trying to delete does not exist.');
    }
    
}

