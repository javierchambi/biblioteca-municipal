<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipos extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Mantenimiento/ModelTipos");
	}
	public function index()
	{
        $data = array(
			'tipo' => $this->ModelTipos->mostrar_datos(),
		);
        if($this->session->userdata('Login'))
		{
            if($this->session->userdata('Tipo')=="Admin")
            {
                $this->load->view('Layout/Header');
                $this->load->view('Layout/MenuBarAdmin');
                $this->load->view('Layout/NavBar');
                $this->load->view('Mantenimiento/VistaTipos',$data);
                $this->load->view('Layout/Footer');
                $this->load->view('Mantenimiento/ScriptVistaTipos');
            }
            else
            {
                $this->load->view('Layout/Header');
                $this->load->view('Layout/MenuBar');
                $this->load->view('Layout/NavBar');
                $this->load->view('Mantenimiento/VistaTipos',$data);
                $this->load->view('Layout/Footer'); 
                $this->load->view('Mantenimiento/ScriptVistaTipos');
            }
		}
		else
		{
			$this->load->view('Login/VistaLogin');
		}     
    }
    
    public function insertar()
    {
        if($this->input->is_ajax_request())
        {
            $ajax_data = $this->input->post();
            $flag = $this->ModelTipos->comprobarDuplicados($this->input->post('nro'));
            if($flag==1)
            {
                $data = "Duplicado";
            }
            else
            {
                if($this->ModelTipos->insertar_datos($ajax_data))
                {
                    $data = "Insertado";
                }
                else 
                {
                    $data = "No insertado"; 
                }
            }
            echo json_encode($data);
        }
        else
        {
            echo "Error";
        }
    }
    public function modal_edicion()
	{
		if($this->input->is_ajax_request())
		{
            $edit_id = $this->input->post('edit_id');
			if($post = $this->ModelTipos->seleccionar_datos_modal($edit_id))
			{
				$data = array('post'=>$post);
			}
		}
		echo json_encode($data);
    }
    public function actualizacion()
    {
        if($this->input->is_ajax_request())
		{
            $id = $this->input->post('nro');
            $data = array(
				'Nro' => $this->input->post('nro_ed'),
				'Descripcion_t' => $this->input->post('descripcion_ed'),
				);
			$this->ModelTipos->actualizar($data,$id);
		}
		else
		{
			echo "no direct";
		}
		echo json_encode($data);
    }
    public function eliminar()
	{
		if($this->input->is_ajax_request())
		{
			$del_id = $this->input->post('nro');
			$this->ModelTipos->eliminar($del_id);
		}
	}
}