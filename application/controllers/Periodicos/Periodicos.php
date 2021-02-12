<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Periodicos extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Periodicos/ModelPeriodicos");
	}
	public function index()
	{
        $data = array(
			'periodico' => $this->ModelPeriodicos->mostrar_datos(),
		);
        if($this->session->userdata('Login'))
		{
            if($this->session->userdata('Tipo')=="Admin")
            {
                $this->load->view('Layout/Header');
                $this->load->view('Layout/MenuBarAdmin');
                $this->load->view('Layout/NavBar');
                $this->load->view('Periodicos/VistaPeriodicos',$data);
                $this->load->view('Layout/Footer');
                $this->load->view('Periodicos/ScriptVistaPeriodicos');
            }
            else
            {
                $this->load->view('Layout/Header');
                $this->load->view('Layout/MenuBar');
                $this->load->view('Layout/NavBar');
                $this->load->view('Periodicos/VistaPeriodicos',$data);
                $this->load->view('Layout/Footer'); 
                $this->load->view('Periodicos/ScriptVistaPeriodicos');
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
            $flag = $this->ModelPeriodicos->comprobarDuplicados($this->input->post('edicion'));
            if($flag==1)
            {
                $data = "Duplicado";
            }
            else
            {
                if($this->ModelPeriodicos->insertar_datos($ajax_data))
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
			if($post = $this->ModelPeriodicos->seleccionar_datos_modal($edit_id))
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
            $id = $this->input->post('edicion');
            $data = array(
				'Edicion' => $this->input->post('edicion_ed'),
                'Fecha' => $this->input->post('fecha_ed'),
                'Imagen' => $this->input->post('imagen')
				);
            $this->ModelPeriodicos->actualizar($data,$id);
            print_r($data);
		}
		else
		{
			echo "no direct";
		}
		//echo json_encode($data);
    }
    public function eliminar()
	{
		if($this->input->is_ajax_request())
		{
            $del_id = $this->input->post('nro');
            echo $del_id;
			$this->ModelPeriodicos->eliminar($del_id);
		}
	}
}