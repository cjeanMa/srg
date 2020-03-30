<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Estudiante_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get estudiante by idEstudiante
     */
    function get_estudiante($idEstudiante)
    {
        return $this->db->get_where('estudiante',array('idEstudiante'=>$idEstudiante))->row_array();
    }
    /*
     * Get estudiante by idPersona
     */
    function get_estudiante_idPersona($idPersona)
    {
        $this->db->from('estudiante e');
        $this->db->join('escuelaProfesional ep','e.idEscuelaProfesional=ep.idEscuelaProfesional','left');
        $this->db->where('e.idPersona',$idPersona);
        return $this->db->get()->result_array();
    }
        
    /*
     * Get all estudiante
     */
    function get_all_estudiante()
    {
        $this->db->order_by('idEstudiante', 'desc');
        return $this->db->get('estudiante')->result_array();
    }
        
    /*
     * function to add new estudiante
     */
    function add_estudiante($params)
    {
        $this->db->insert('estudiante',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update estudiante
     */
    function update_estudiante($idEstudiante,$params)
    {
        $this->db->where('idEstudiante',$idEstudiante);
        return $this->db->update('estudiante',$params);
    }
    
    /*
     * function to delete estudiante
     */
    function delete_estudiante($idEstudiante)
    {
        return $this->db->delete('estudiante',array('idEstudiante'=>$idEstudiante));
    }

            
    /*
     * Get all estudiante con sus datos personales
     */
    function get_all_estudiante_persona()
    {
        $this->db->from('estudiante e');
        $this->db->join('persona p', 'e.idPersona=p.idPersona','left');
        $this->db->join('semestreAcademico sa', 'e.idSemestreAcademico = sa.idSemestreAcademico','left');
        $this->db->join('escuelaProfesional ep', 'e.idEscuelaProfesional = ep.idEscuelaProfesional','left');
        $this->db->order_by('e.idEstudiante', 'desc');
        $this->db->limit(50);
        return $this->db->get()->result_array();
    }
     /*
     * Get estudiante y datos de persona by idEstudiante
     */
    function get_estudiante_persona($idEstudiante)
    {
        $this->db->from('estudiante e');
        $this->db->join('persona p', "e.idPersona=p.idPersona",'left');
        $this->db->join('escuelaProfesional ep', 'e.idEscuelaProfesional = ep.idEscuelaProfesional','left');
        return $this->db->get_where('estudiante',array('e.idEstudiante'=>$idEstudiante))->row_array();
    }
    /*
     * Get datos basicos de estudiante y persona para ajax de practicas 
     */
    function datos_basicosEstudiante_persona(){

    }
        
}
