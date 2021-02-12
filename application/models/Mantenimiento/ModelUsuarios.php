<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelUsuarios extends CI_Model
{
    public function mostrar_datos()
	{
		$resultado = $this->db->get('usuario');
		return $resultado->result();
	}
    public function insertar_datos($data)
    {
        return $this->db->insert('usuario',$data);
    }
    public function seleccionar_datos_modal($id)
	{
		$this->db->select("*");
		$this->db->from('usuario');
		$this->db->where('Nro',$id);
		$query = $this->db->get();
		return $query->row();
    }
    public function actualizar($data,$id)
	{
		$this->db->where("Nro",$id);
		return $this->db->update("usuario",$data);
    }
    public function eliminar($id)
	{
		return $this->db->delete('usuario',array('Nro' => $id));
    }
    public function comprobarDuplicados($id)
    {
        $this->db->select("*");
		$this->db->from('usuario');
        $this->db->where("Nro",$id);
        $resultado = $this->db->get()->num_rows();
        return $resultado;
    }
}