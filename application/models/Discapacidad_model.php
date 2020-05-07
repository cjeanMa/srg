<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Discapacidad_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get discapacidad by idDiscapacidad
     */
    function get_discapacidad($idDiscapacidad)
    {
        return $this->db->get_where('discapacidad',array('idDiscapacidad'=>$idDiscapacidad))->row_array();
    }
        
    /*
     * Get all discapacidad
     */
    function get_all_discapacidad()
    {
        $this->db->order_by('idDiscapacidad', 'asc');
        return $this->db->get('discapacidad')->result_array();
    }
        
    /*
     * function to add new discapacidad
     */
    function add_discapacidad($params)
    {
        $this->db->insert('discapacidad',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update discapacidad
     */
    function update_discapacidad($idDiscapacidad,$params)
    {
        $this->db->where('idDiscapacidad',$idDiscapacidad);
        return $this->db->update('discapacidad',$params);
    }
    
    /*
     * function to delete discapacidad
     */
    function delete_discapacidad($idDiscapacidad)
    {
        return $this->db->delete('discapacidad',array('idDiscapacidad'=>$idDiscapacidad));
    }
}
