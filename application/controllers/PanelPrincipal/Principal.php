<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("PanelPrincipal/ModelPrincipal");
    }
	public function index()
	{
        date_default_timezone_set("America/Lima");
        $time = time();
        $fecha = date("Y", $time);
        $totalNI = $this->ModelPrincipal->total_prestamos("No infantil",$fecha);
        $totalI = $this->ModelPrincipal->total_prestamos("Infantil",$fecha);
        $data = array(
            'prestamos' => $this->ModelPrincipal->mostrar_datos(),
            'TInfantil' => $totalI,
            'TNoInfantil' => $totalNI
		);
        if($this->session->userdata('Login'))
		{
            if($this->session->userdata('Tipo')=="Admin")
            {
                $this->load->view('Layout/Header');
                $this->load->view('Layout/MenuBarAdmin');
                $this->load->view('Layout/NavBar');
                $this->load->view('Principal/VistaPrincipal',$data);
                $this->load->view('Layout/Footer');
                $this->load->view('Principal/ScriptVistaPrincipal');
            }
            else
            {
                $this->load->view('Layout/Header');
                $this->load->view('Layout/MenuBar');
                $this->load->view('Layout/NavBar');
                $this->load->view('Principal/VistaPrincipal',$data);
                $this->load->view('Layout/Footer'); 
                $this->load->view('Principal/ScriptVistaPrincipal');
            }
		}
		else
		{
			$this->load->view('Login/VistaLogin');
		}     
    }
    public function insertar()
    {
        if($this->input->is_ajax_request())
        {
            $nro = $this->input->post('nro');
            $nombre = $this->input->post('nombre');
            $apellidos = $this->input->post('apellidos');
            $dni = $this->input->post('dni');
            $sexo = $this->input->post('sexo');
            $grado = $this->input->post('grado');
            $tipo = $this->input->post('tipo');
            $aray = $this->input->post('libros');
            //Obtener la fecha de formato y solo la fecha
            $time = time();
            $fecha = date("d"."/"."m"."/"."Y", $time);
            $nro_prestamo = strval($nro)."-".$fecha;
            //Obtener el año
            $año = date("Y", $time);
            //Obtener la hora
            date_default_timezone_set("America/Lima");
            $hora = date("G:i"); 
            //echo $nro_prestamo." ".$nombre." ".$apellidos." ".$dni." ".$sexo." ".$grado." ".$tipo." ".$hora;
            //Para extraer los codigos de los tags
            $codigos = array();
            for($i=0;$i<sizeof($aray);$i++)
            {
                $codigos[] =  $this->ModelPrincipal->mostrar_libros_codigos($aray[$i]);
            }
            $codigos_libros = array();
            foreach ($codigos as $cd)
            {
                foreach ($cd as $key)
                {
                    $codigos_libros[] = $key->Codigo." ";
                }
            }
            $flag = $this->ModelPrincipal->comprobarDuplicados($nro_prestamo);
            if($flag==1)
            {
                $data = "Duplicado";
            }
            else
            {
                $data = array(
                    'Nro' => $nro_prestamo,
                    'Hora_inicio' => $hora,
                    'Nombre' => $nombre,
                    'Apellidos' => $apellidos,
                    'DNI' => $dni,
                    'Sexo' => $sexo,
                    'Grado' => $grado,
                    'Tipo_lector' => $tipo,
                    'Fecha_prestamo' => $fecha
                );
                $data_registro = array(
                    'Nro' => $nro_prestamo,
                    'Nombre' => $nombre,
                    'Apellidos' => $apellidos,
                    'DNI' => $dni,
                    'Sexo' => $sexo,
                    'Grado' => $grado,
                    'Tipo_lector' => $tipo,
                    'Fecha_prestamo' => $fecha,
                    'Hora_prestamo' => $hora,
                    'Año' => $año
                );
                if($this->ModelPrincipal->insertar_datos($data))
                {
                    $this->ModelPrincipal->registrar_prestamo($data_registro);
                    //Ingresar libros prestados a los usuarios
                    for($i=0;$i<sizeof($codigos_libros);$i++)
                    {
                        $data_libro = array(
                            'Prestamo_Nro' => $nro_prestamo,
                            'Libro_Codigo' => $codigos_libros[$i]
                        );
                        $this->ModelPrincipal->insertar_datos_libros_prestados($data_libro);
                        $data_libro_reg = array(
                            'Prestamo_Nro' => $nro_prestamo,
                            'Codigo_Libro' => $codigos_libros[$i]
                        );
                        $this->ModelPrincipal->registrar_libros_prestados($data_libro_reg);
                        //Descontar un libro : hace el efecto que si prestas un libro es obvio que queda menos uno en el inventario

                    }
                    $data = "Insertado";
                }
                else 
                {
                    $data = "No insertado"; 
                }
            }
            echo json_encode($data);
        }
        else
        {
            echo "Error";
        }
    }
    public function finalizar()
	{
		if($this->input->is_ajax_request())
		{
            $del_id = $this->input->post('nro');
            echo $del_id;
			$this->ModelPrincipal->eliminar($del_id);
		}
    }
}