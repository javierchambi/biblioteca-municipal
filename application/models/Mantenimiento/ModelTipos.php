<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelTipos extends CI_Model
{
    public function mostrar_datos()
	{
		$resultado = $this->db->get("tipo");
		return $resultado->result();
	}
    public function insertar_datos($data)
    {
        return $this->db->insert('tipo',$data);
    }
    public function seleccionar_datos_modal($id)
	{
		$this->db->select("*");
		$this->db->from('tipo');
		$this->db->where('Nro',$id);
		$query = $this->db->get();
		return $query->row();
    }
    public function actualizar($data,$id)
	{
		$this->db->where("Nro",$id);
		return $this->db->update("tipo",$data);
    }
    public function eliminar($id)
	{
		return $this->db->delete('tipo',array('Nro' => $id));
    }
    public function comprobarDuplicados($id)
    {
        $this->db->select("*");
		$this->db->from('tipo');
        $this->db->where("Nro",$id);
        $resultado = $this->db->get()->num_rows();
        return $resultado;
    }
    /*public function login($usuario,$contraseña)
	{
        $this->db->where("Username",$usuario);
        $this->db->where("Password",$contraseña);
        $resultado = $this->db->get("usuario");
        if($resultado->num_rows()>0)
        {
            return $resultado->row();
        }
        else
        {
            return false;
        }
	}*/
}