<?php
 
class Telefono extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Telefono_model');
    } 

    /*
     * Listing of telefonos
     */
    function index()
    {
        $data['telefonos'] = $this->Telefono_model->get_all_telefonos();
        
        $data['_view'] = 'telefono/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new telefono
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'dueno' => $this->input->post('dueno'),
				'numero' => $this->input->post('numero')
            );
            
            $telefono_id = $this->Telefono_model->add_telefono($params);
            redirect('telefono/index');
        }
        else
        {            
            $data['_view'] = 'telefono/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a telefono
     */
    function edit($id)
    {   
        // check if the telefono exists before trying to edit it
        $data['telefono'] = $this->Telefono_model->get_telefono($id);
        
        if(isset($data['telefono']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'dueno' => $this->input->post('dueno'),
					'numero' => $this->input->post('numero')
                );

                $this->Telefono_model->update_telefono($id,$params);            
                redirect('telefono/index');
            }
            else
            {
                $data['_view'] = 'telefono/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The telefono you are trying to edit does not exist.');
    } 

    /*
     * Deleting telefono
     */
    function remove($id)
    {
        $telefono = $this->Telefono_model->get_telefono($id);

        // check if the telefono exists before trying to delete it
        if(isset($telefono['id']))
        {
            $this->Telefono_model->delete_telefono($id);
            redirect('telefono/index');
        }
        else
            show_error('The telefono you are trying to delete does not exist.');
    }
    
}
