<?php
 
class Producto_destacado_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get producto_destacado by id
     */
    function get_producto_destacado($id)
    {
        return $this->db->get_where('productos_destacados',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all productos_destacados
     */
    function get_all_productos_destacados()
    {
        $this->db->select('d.id, d.nombre, d.creado_en, p.nombre as producto');
        $this->db->from('productos_destacados d');
        $this->db->join('productos p', 'p.id = d.producto_fk');
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
     * function to add new producto_destacado
     */
    function add_producto_destacado($params)
    {
        $this->db->insert('productos_destacados',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update producto_destacado
     */
    function update_producto_destacado($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('productos_destacados',$params);
    }
    
    /*
     * function to delete producto_destacado
     */
    function delete_producto_destacado($id)
    {
        return $this->db->delete('productos_destacados',array('id'=>$id));
    }
}
