<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestamos extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Indicadores/ModelPrestamos");
	}
	public function index()
	{
        $data = array(
            'prestamos' => $this->ModelPrestamos->mostrar_datos()
		);
        if($this->session->userdata('Login'))
		{
            if($this->session->userdata('Tipo')=="Admin")
            {
                $this->load->view('Layout/Header');
                $this->load->view('Layout/MenuBarAdmin');
                $this->load->view('Layout/NavBar');
                $this->load->view('Indicadores/VistaPrestamos',$data);
                $this->load->view('Layout/Footer');
                $this->load->view('Indicadores/ScriptVistaPrestamos');
            }
            else
            {
                $this->load->view('Layout/Header');
                $this->load->view('Layout/MenuBar');
                $this->load->view('Layout/NavBar');
                $this->load->view('Indicadores/VistaPrestamos',$data);
                $this->load->view('Layout/Footer'); 
                $this->load->view('Indicadores/ScriptVistaPrestamos');
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
            //$ajax_data = $this->input->post();
            $flag = $this->ModelLibros->comprobarDuplicados($this->input->post('codigo'));
            if($flag==1)
            {
                $data = "Duplicado";
            }
            else
            {
                $data = array(
                    'Codigo' => $this->input->post('codigo'),
                    'Titulo' => $this->input->post('titulo'),
                    'Autor' => $this->input->post('autor'),
                    'Cantidad' => $this->input->post('cantidad'),
                    'Año' => $this->input->post('año'),
                    'Portada' => $this->input->post('portada'),
                    'Clasificacion' => $this->input->post('clasificacion'),
                    'Categoria_Nro' => $this->input->post('categoria'),
                    'Tipo_Nro' => $this->input->post('tipo')
                );
                if($this->ModelLibros->insertar_datos($data))
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
    public function agregar_existencias()
    {
        if($this->input->is_ajax_request())
        {
            //obtener cantidad con el codigo
            $cantidad_array = $this->ModelLibros->seleccionar_cantidad($this->input->post('codigo'));
            foreach ($cantidad_array as $key)
            {
                $cantidad = $key;
            }
            //cantidad actual
            $cantidad_ingresada = $this->input->post('cantidad');
            //cantidad agregada
            $nueva_cantidad = $cantidad + $cantidad_ingresada;
            $data = array(
                'Cantidad' => $nueva_cantidad
            );
            if($this->ModelLibros->agregar_stock($this->input->post('codigo'),$data))
            {
                $data = "Insertado";
            }
            else 
            {
                $data = "No insertado"; 
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
			if($post = $this->ModelLibros->seleccionar_datos_modal($edit_id))
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
            $id = $this->input->post('codigo');
            $data = array(
				'Codigo' => $this->input->post('codigo_ed'),
                'Titulo' => $this->input->post('titulo_ed'),
                'Autor' => $this->input->post('autor_ed'),
                'Cantidad' => $this->input->post('cantidad_ed'),
                'Año' => $this->input->post('año_ed'),
                'Portada' => $this->input->post('imagen'),
                'Clasificacion' => $this->input->post('clasificacion_ed'),
                'Categoria_Nro' => $this->input->post('categoria_ed'),
                'Tipo_Nro' => $this->input->post('tipo_ed'),
				);
            $this->ModelLibros->actualizar($data,$id);
            print_r($data);
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
            echo $del_id;
			$this->ModelLibros->eliminar($del_id);
		}
    }
}