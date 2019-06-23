<?php
 
class Producto_destacado extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Producto_destacado_model');
    } 

    /*
     * Listing of productos_destacados
     */
    function index()
    {
        $data['productos_destacados'] = $this->Producto_destacado_model->get_all_productos_destacados();
        
        $data['_view'] = 'producto_destacado/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new producto_destacado
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'producto_fk' => $this->input->post('producto_fk'),
				'nombre' => $this->input->post('nombre')
            );
            
            $producto_destacado_id = $this->Producto_destacado_model->add_producto_destacado($params);
            redirect('producto_destacado/index');
        }
        else
        {
			$this->load->model('Producto_model');
			$data['all_productos'] = $this->Producto_model->get_all_productos();
            
            $data['_view'] = 'producto_destacado/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a producto_destacado
     */
    function edit($id)
    {   
        // check if the producto_destacado exists before trying to edit it
        $data['producto_destacado'] = $this->Producto_destacado_model->get_producto_destacado($id);
        
        if(isset($data['producto_destacado']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'producto_fk' => $this->input->post('producto_fk'),
					'nombre' => $this->input->post('nombre')
                );

                $this->Producto_destacado_model->update_producto_destacado($id,$params);            
                redirect('producto_destacado/index');
            }
            else
            {
				$this->load->model('Producto_model');
				$data['all_productos'] = $this->Producto_model->get_all_productos();

                $data['_view'] = 'producto_destacado/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The producto_destacado you are trying to edit does not exist.');
    } 

    /*
     * Deleting producto_destacado
     */
    function remove($id)
    {
        $producto_destacado = $this->Producto_destacado_model->get_producto_destacado($id);

        // check if the producto_destacado exists before trying to delete it
        if(isset($producto_destacado['id']))
        {
            $this->Producto_destacado_model->delete_producto_destacado($id);
            redirect('producto_destacado/index');
        }
        else
            show_error('The producto_destacado you are trying to delete does not exist.');
    }
    
}
