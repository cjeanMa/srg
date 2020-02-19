<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Semestre_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get semestre by idSemestre
     */
    function get_semestre($idSemestre)
    {
        return $this->db->get_where('semestre',array('idSemestre'=>$idSemestre))->row_array();
    }
        
    /*
     * Get all semestre
     */
    function get_all_semestre()
    {
        $this->db->order_by('idSemestre', 'desc');
        return $this->db->get('semestre')->result_array();
    }
        
    /*
     * function to add new semestre
     */
    function add_semestre($params)
    {
        $this->db->insert('semestre',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update semestre
     */
    function update_semestre($idSemestre,$params)
    {
        $this->db->where('idSemestre',$idSemestre);
        return $this->db->update('semestre',$params);
    }
    
    /*
     * function to delete semestre
     */
    function delete_semestre($idSemestre)
    {
        return $this->db->delete('semestre',array('idSemestre'=>$idSemestre));
    }
}