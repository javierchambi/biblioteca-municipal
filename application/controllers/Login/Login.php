<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Login/ModelLogin");
	}
	public function index()
	{
		if($this->session->userdata('Login'))
		{
			redirect(base_url()."PanelPrincipal/Principal");
		}
		else
		{
			$this->load->view('Login/VistaLogin');
		}
	}
	public function ingresar()
	{
		$a = $this->input->post("usuario");
		$b = $this->input->post("contraseña");
		$resp = $this->ModelLogin->login($a,$b);
		if($resp)
		{
			$data = [
				"Nro" => $resp->Nro,
				"Nombre" => $resp->Nombre,
				"Apellidos" => $resp->Apellidos,
				"Tipo" => $resp->Tipo_usuario,
				"Usuario" => $resp->Username,
				"Sexo" => $resp->Sexo,
				"Login" => true
			];
			$this->session->set_userdata($data);
		}
		else
		{
			echo "Error";
		}
	}
	public function salir()
	{
		$this->session->sess_destroy();
		redirect(base_url()."Login/Login");
	}
}