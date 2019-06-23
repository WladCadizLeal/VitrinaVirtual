<?php
 
class Producto extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Producto_model');
    } 

    /*
     * Listing of productos
     */
    function index()
    {
        $data['productos'] = $this->Producto_model->get_all_productos();
        
        $data['_view'] = 'producto/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new producto
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $file = $_FILES['file'];
              
            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];
          
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
          
            $allowed = array('jpg', 'jpeg', 'png');
          
            if(in_array($fileActualExt, $allowed)){
              if($fileError === 0){
                  if($fileSize < 1000000){
                      $fileNameNew = uniqid('', true).".".$fileActualExt;
                      $fileDestination = 'includes/img/'.$fileNameNew;
                      move_uploaded_file($fileTmpName, $fileDestination);
                  }
                  else{
                      echo "Tu archivo es demasiado grande";
                  }
              }
              else{
                  echo "Hubo un error al subir tu imagen";
              }
            }else{
              echo "No puedes subir archivos de este tipo";
            }
            $params = array(
				'marca_fk' => $this->input->post('marca_fk'),
                'categoria_fk' => $this->input->post('categoria_fk'),
                'local_fk' => $this->input->post('local_fk'),
				'nombre' => $this->input->post('nombre'),
				'precio' => $this->input->post('precio'),
				'imagen' => $fileDestination,
				'descripcion' => $this->input->post('descripcion'),
            );
            
            $producto_id = $this->Producto_model->add_producto($params);
            redirect('producto/index');
        }
        else
        {
			$this->load->model('Marca_model');
			$data['all_marcas'] = $this->Marca_model->get_all_marcas();

			$this->load->model('Categoria_model');
            $data['all_categorias'] = $this->Categoria_model->get_all_categorias();
            
            $this->load->model('Local_model');
			$data['all_locales'] = $this->Local_model->get_all_locales();
            
            $data['_view'] = 'producto/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a producto
     */
    function edit($id)
    {   
        // check if the producto exists before trying to edit it
        $data['producto'] = $this->Producto_model->get_producto($id);
        
        if(isset($data['producto']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $file = $_FILES['file'];
              
                $fileName = $_FILES['file']['name'];
                $fileTmpName = $_FILES['file']['tmp_name'];
                $fileSize = $_FILES['file']['size'];
                $fileError = $_FILES['file']['error'];
                $fileType = $_FILES['file']['type'];
            
                $fileExt = explode('.', $fileName);
                $fileActualExt = strtolower(end($fileExt));
            
                $allowed = array('jpg', 'jpeg', 'png');
            
                if(in_array($fileActualExt, $allowed)){
                if($fileError === 0){
                    if($fileSize < 1000000){
                        $fileNameNew = uniqid('', true).".".$fileActualExt;
                        $fileDestination = 'includes/img/'.$fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDestination);
                    }
                    else{
                        echo "Tu archivo es demasiado grande";
                    }
                }
                else{
                    echo "Hubo un error al subir tu imagen";
                }
                }else{
                echo "No puedes subir archivos de este tipo";
                }
                $params = array(
					'marca_fk' => $this->input->post('marca_fk'),
                    'categoria_fk' => $this->input->post('categoria_fk'),
                    'local_fk' => $this->input->post('local_fk'),
					'nombre' => $this->input->post('nombre'),
					'precio' => $this->input->post('precio'),
					'imagen' => $fileDestination,
					'descripcion' => $this->input->post('descripcion'),
                );

                $this->Producto_model->update_producto($id,$params);            
                redirect('producto/index');
            }
            else
            {
				$this->load->model('Marca_model');
				$data['all_marcas'] = $this->Marca_model->get_all_marcas();

				$this->load->model('Categoria_model');
                $data['all_categorias'] = $this->Categoria_model->get_all_categorias();
                
                $this->load->model('Local_model');
				$data['all_locales'] = $this->Local_model->get_all_locales();

                $data['_view'] = 'producto/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The producto you are trying to edit does not exist.');
    } 

    /*
     * Deleting producto
     */
    function remove($id)
    {
        $producto = $this->Producto_model->get_producto($id);

        // check if the producto exists before trying to delete it
        if(isset($producto['id']))
        {
            $this->Producto_model->delete_producto($id);
            redirect('producto/index');
        }
        else
            show_error('The producto you are trying to delete does not exist.');
    }
    
}
