<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPrestamos extends CI_Model
{
    public function mostrar_datos()
	{
		$resultado = $this->db->get("registro_prestamo");
		return $resultado->result();
    }
    public function mostrar_libros_prestados($id)
    {
        $this->db->select('libro.Titulo');
        $this->db->from('registro_libro_prestado');
        $this->db->join('libro','registro_libro_prestado.Codigo_Libro = libro.Codigo');
        $this->db->where('Prestamo_Nro',$id);
		$resultado =  $this->db->get();
		return $resultado->result();
    }
}