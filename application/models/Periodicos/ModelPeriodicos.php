<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPeriodicos extends CI_Model
{
    public function mostrar_datos()
	{
		$resultado = $this->db->get("periodico");
		return $resultado->result();
	}
    public function insertar_datos($data)
    {
        return $this->db->insert('periodico',$data);
    }
    public function seleccionar_datos_modal($id)
	{
		$this->db->select("*");
		$this->db->from('periodico');
		$this->db->where('Edicion',$id);
		$query = $this->db->get();
		return $query->row();
    }
    public function actualizar($data,$id)
	{
		$this->db->where("Edicion",$id);
		return $this->db->update("periodico",$data);
    }
    public function eliminar($id)
	{
		return $this->db->delete('periodico',array('Edicion' => $id));
    }
    public function comprobarDuplicados($id)
    {
        $this->db->select("*");
		$this->db->from('periodico');
        $this->db->where("Edicion",$id);
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