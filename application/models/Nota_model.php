<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Nota_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
        
    /*
     * function to add new Nota
     */
    function add_nota($params)
    {
        $this->db->insert('nota',$params);
        return $this->db->insert_id();
        // return $temp;
    }
    function get_list_estudiantes_ep($idDocente,$idUnidadDidactica){
        $query = $this->db->query("SELECT P.idPersona,E.idEstudiante,P.apellidoPaterno,P.apellidoMaterno,P.nombres,S.letraSexo, MA.idMatricula,UDM.nota FROM persona AS P
            LEFT JOIN estudiante AS E
            ON E.idPersona=P.idPersona
            left join matricula AS MA
            ON MA.idEstudiante=E.idEstudiante
            LEFT JOIN sexo as S
            ON S.idSexo=P.idSexo
            LEFT JOIN unidaddidactica_has_matricula AS UDM
            ON MA.idMatricula=UDM.idMatricula
            LEFT JOIN unidaddidactica AS UD
            ON UDM.idUnidadDidactica=UD.idUnidadDidactica
            LEFT JOIN modulo AS MO
            ON MO.idModulo=UD.idModulo
            LEFT JOIN escuelaprofesional AS EP
            ON EP.idEscuelaProfesional=MO.idEscuelaProfesional
            LEFT JOIN asignacion AS ASI
            on UD.idUnidadDidactica=ASI.idUnidadDidactica
            LEFT JOIN docente AS DO
            ON DO.idDocente=ASI.idDocente
            WHERE DO.idDocente=".$idDocente." and UD.idUnidadDidactica=".$idUnidadDidactica.";");
       return $query->result_array();

        
    }
    function get_list_unidadD_docente($idDocente){
        $query = $this->db->query("SELECT EP.idEscuelaProfesional,EP.nombreEscuelaProfesional,UD.idUnidadDidactica,UD.nombreUnidadDidactica from escuelaprofesional as EP
            LEFT JOIN modulo AS MO
            ON EP.idEscuelaProfesional=MO.idEscuelaProfesional
            LEFT JOIN unidaddidactica AS UD
            ON UD.idModulo=MO.idModulo
            LEFT JOIN asignacion AS ASI
            on UD.idUnidadDidactica=ASI.idUnidadDidactica
            LEFT JOIN docente AS DO
            ON DO.idDocente=ASI.idDocente
            WHERE DO.idDocente=".$idDocente.";");
       return $query->result_array();
    }
    function add_nota_unidaddidactica_has_matricula($params_where,$params)
    {
        $this->db->where($params_where);
        return $this->db->update('unidadDidactica_has_matricula',$params);
    }


}
