<?php
 
class Producto_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get producto by id
     */
    function get_producto($id)
    {
        return $this->db->get_where('productos',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all productos
     */
    function get_all_productos()
    {
        $this->db->select('p.id, p.nombre, p.descripcion, p.precio, p.imagen, p.creado_en, m.nombre as marca, c.nombre as categoria, l.nombre as local');
        $this->db->from('productos p');
        $this->db->join('marcas m', 'm.id = p.marca_fk');
        $this->db->join('categorias c', 'c.id = p.categoria_fk');
        $this->db->join('locales l', 'l.id = p.local_fk');
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
     * function to add new producto
     */
    function add_producto($params)
    {
        $this->db->insert('productos',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update producto
     */
    function update_producto($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('productos',$params);
    }
    
    /*
     * function to delete producto
     */
    function delete_producto($id)
    {
        return $this->db->delete('productos',array('id'=>$id));
    }
}
