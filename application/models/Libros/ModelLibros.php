<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLibros extends CI_Model
{
    public function mostrar_datos()
	{
        $this->db->select('Codigo,Titulo,Autor,Cantidad,Año,Portada,Clasificacion,categoria.Descripcion_c,tipo.Descripcion_t');
        $this->db->from('libro');
        $this->db->join('tipo','libro.Tipo_Nro = tipo.Nro');
        $this->db->join('categoria','libro.Categoria_Nro = categoria.Nro');
		$resultado =  $this->db->get();
		return $resultado->result();
    }
    public function mostrar_tipos()
    {
        $resultado = $this->db->get("tipo");
		return $resultado->result();
    }
    public function mostrar_categorias()
    {
        $resultado = $this->db->get("categoria");
		return $resultado->result();
    }
    public function mostrar_solo_libros()
    {
        $resultado = $this->db->get("libro");
		return $resultado->result();
    }
    public function insertar_datos($data)
    {
        return $this->db->insert('libro',$data);
    }
    public function seleccionar_codigo($id)
	{
		$this->db->select("Codigo");
		$this->db->from('libro');
		$this->db->where('Codigo',$id);
		$query = $this->db->get();
		return $query->row();
    }
    public function seleccionar_cantidad($id)
	{
		$this->db->select("Cantidad");
		$this->db->from('libro');
		$this->db->where('Codigo',$id);
		$query = $this->db->get();
		return $query->row();
    }
    public function agregar_stock($codigo,$data)
    {
        $this->db->where("Codigo",$codigo);
		return $this->db->update("libro",$data);
    }
    public function seleccionar_datos_modal($id)
	{
		$this->db->select("*");
		$this->db->from('libro');
		$this->db->where('Codigo',$id);
		$query = $this->db->get();
		return $query->row();
    }
    public function actualizar($data,$id)
	{
		$this->db->where("Codigo",$id);
		return $this->db->update("libro",$data);
    }
    public function eliminar($id)
	{
		return $this->db->delete('libro',array('Codigo' => $id));
    }
    public function comprobarDuplicados($id)
    {
        $this->db->select("*");
		$this->db->from('libro');
        $this->db->where("Codigo",$id);
        $resultado = $this->db->get()->num_rows();
        return $resultado;
    }
}