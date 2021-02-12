<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelGraficos extends CI_Model
{
    public function mostrar_datos()
	{
		$resultado = $this->db->get("registro_prestamo");
		return $resultado->result();
    }
    public function mostrar_lectores_por_genero($genero,$año)
    {
        $this->db->select('Sexo');
        $this->db->from('registro_prestamo');
        $this->db->where('Sexo',$genero);
        $this->db->where('Año',$año);
		$resultado =  $this->db->get();
		return $resultado->num_rows();
    }
    public function mostrar_lectores_por_grado($grado,$año)
    {
        $this->db->select('Grado');
        $this->db->from('registro_prestamo');
        $this->db->where('Grado',$grado);
        $this->db->where('Año',$año);
		$resultado =  $this->db->get();
		return $resultado->num_rows();
    }
}