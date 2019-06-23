<?php
 
class Local_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get local by id
     */
    function get_local($id)
    {
        return $this->db->get_where('locales',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all locales
     */
    function get_all_locales()
    {
        $this->db->select('l.id, l.nombre, l.descripcion, l.imagen, l.creado_en, s.nombre as sucursal, t.numero as telefono');
        $this->db->from('locales l');
        $this->db->join('sucursales s', 's.id = l.sucursal_fk');
        $this->db->join('telefonos t', 't.id = l.telefono_fk');
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        if($query->num_rows() != 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }
        
    /*
     * function to add new local
     */
    function add_local($params)
    {
        $this->db->insert('locales',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update local
     */
    function update_local($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('locales',$params);
    }
    
    /*
     * function to delete local
     */
    function delete_local($id)
    {
        return $this->db->delete('locales',array('id'=>$id));
    }
}
