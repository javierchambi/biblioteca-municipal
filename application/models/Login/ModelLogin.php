<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLogin extends CI_Model
{
	public function login($usuario,$contraseña)
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
	}

}