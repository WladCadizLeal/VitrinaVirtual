<?php
 
class Usuarios_model extends CI_Model {
    
    public function Login($correo, $contrasena){
        $this->db->where("correo", $correo);
        $this->db->where("contrasena", $contrasena);
        $resultados = $this->db->get("usuarios");
            if ($resultados->num_rows() > 0){
                return $resultados->row();
            }else{
                return false;
            }


    }
}