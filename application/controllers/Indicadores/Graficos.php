<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Graficos extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Indicadores/ModelGraficos");
	}
	public function index()
	{
        if($this->session->userdata('Login'))
		{
            if($this->session->userdata('Tipo')=="Admin")
            {
                $this->load->view('Layout/Header');
                $this->load->view('Layout/MenuBarAdmin');
                $this->load->view('Layout/NavBar');
                $this->load->view('Indicadores/VistaGraficos');
                $this->load->view('Layout/Footer');
                $this->load->view('Indicadores/ScriptVistaGraficos');
            }
            else
            {
                $this->load->view('Layout/Header');
                $this->load->view('Layout/MenuBar');
                $this->load->view('Layout/NavBar');
                $this->load->view('Indicadores/VistaGraficos');
                $this->load->view('Layout/Footer'); 
                $this->load->view('Indicadores/ScriptVistaGraficos');
            }
		}
		else
		{
			$this->load->view('Login/VistaLogin');
		}     
    }
    public function data_genero()
    {
        $time = time();
        $año = date("Y", $time);
        //echo $año;
        $hombre = $this->ModelGraficos->mostrar_lectores_por_genero("H",$año);
        $mujer = $this->ModelGraficos->mostrar_lectores_por_genero("M",$año);
        $generos = array();
        array_push($generos,$hombre,$mujer);
        //print_r($generos);
        echo json_encode($generos);
    }
    public function data_grado()
    {
        $time = time();
        $año = date("Y", $time);
        //echo $año;
        $inicial = $this->ModelGraficos->mostrar_lectores_por_grado("Inicial",$año);
        $primaria = $this->ModelGraficos->mostrar_lectores_por_grado("Primaria",$año);
        $secundaria = $this->ModelGraficos->mostrar_lectores_por_grado("Secundaria",$año);
        $tecnica_ic = $this->ModelGraficos->mostrar_lectores_por_grado("Superior tecnica incompleta",$año);
        $tecnica_c = $this->ModelGraficos->mostrar_lectores_por_grado("Superior tecnica completa",$año);
        $Univ_ic = $this->ModelGraficos->mostrar_lectores_por_grado("Superior universitaria incompleta",$año);
        $Univ_c = $this->ModelGraficos->mostrar_lectores_por_grado("Superior universitaria completa",$año);
        $grados = array();
        array_push($grados,$inicial,$primaria,$secundaria,$tecnica_ic,$tecnica_c,$Univ_ic,$Univ_c);
        //print_r($generos);
        echo json_encode($grados);
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
    
}