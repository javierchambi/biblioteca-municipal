<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPrincipal extends CI_Model
{
    public function mostrar_datos()
	{
		$resultado = $this->db->get("prestamo");
		return $resultado->result();
    }
    public function mostrar_libros_prestados($id)
    {
        $this->db->select('libro.Titulo');
        $this->db->from('libro_prestado');
        $this->db->join('libro','libro_prestado.Libro_Codigo = libro.Codigo');
        $this->db->where('Prestamo_Nro',$id);
		$resultado =  $this->db->get();
		return $resultado->result();
    }
    public function mostrar_libros()
    {
        $this->db->select('Codigo,Titulo');
        $this->db->from('libro');
		$resultado =  $this->db->get();
		return $resultado->result();
    }
    public function mostrar_libros_codigos($nombre)
    {
        $this->db->select('Codigo');
        $this->db->from('libro');
        $this->db->where('Titulo',$nombre);
		$resultado =  $this->db->get();
		return $resultado->result();
    }
    public function insertar_datos($data)
    {
        return $this->db->insert('prestamo',$data);
    }
    public function insertar_datos_libros_prestados($data)
    {
        return $this->db->insert('libro_prestado',$data);
    }
    public function registrar_prestamo($data)
    {
        return $this->db->insert('registro_prestamo',$data);
    }
    public function registrar_libros_prestados($data)
    {
        return $this->db->insert('registro_libro_prestado',$data);
    }
    public function eliminar($id)
	{
		return $this->db->delete('prestamo',array('Nro' => $id));
    }
    public function comprobarDuplicados($id)
    {
        $this->db->select("*");
		$this->db->from('registro_prestamo');
        $this->db->where("Nro",$id);
        $resultado = $this->db->get()->num_rows();
        return $resultado;
    }
    public function total_prestamos($tipo,$año)
    {
        $this->db->select("Nro");
		$this->db->from('registro_prestamo');
        $this->db->where("Tipo_Lector",$tipo);
        $this->db->where("Año",$año);
        $resultado = $this->db->get()->num_rows();
        return $resultado;
    }
}