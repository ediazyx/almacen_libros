<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiante extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	 public function index()
	{		
	}

    public function nuevoEstudiante()
	{		
		$this->load->model('SexoModel');
        $this->load->model('AnnoModel');        			
        
        $data['sexo'] = $this->SexoModel->findAll();
		$data['anno'] = $this->AnnoModel->findAll();
                      
        //var_dump($data);
		$this->load->view('head');
        $this->load->view('estudiantes/form', $data);
        $this->load->view('footer');
	}

	public function listarEstudiantes()
	{
		$this->load->model('EstudianteModel');		

		//var_dump($libros);
		
        $data['estudiantes'] = $this->EstudianteModel->findAll();       
		
		$this->load->view('head');
        $this->load->view('estudiantes/listar', $data);
        $this->load->view('footer');
	}
	
	public function insertarEstudiante() 
	{
		$this->form_validation->set_rules('ci', 'Carné Identidad', 'required|numeric|exact_length[11]');
		$this->form_validation->set_rules('nombre', 'Nombre(s) y Apellidos', 'required');
		$this->form_validation->set_rules('direccion', 'Dirección Particular', 'required');		
		$this->form_validation->set_rules('sexo', 'Sexo', 'required');
		$this->form_validation->set_rules('anno', 'Año', 'required');
		    			
		$data = array( 
			"carnet_identidad" => $this->input->post("ci"),				 
			"nombre_completo" => $this->input->post("nombre"),
			"direccion" => $this->input->post("direccion"),
			"sexo_idsexo" => $this->input->post("sexo"),
			"anno_idanno" => $this->input->post("anno")			
		);			
					
		if ($this->form_validation->run())
		{
			$this->load->model('EstudianteModel');
			$estudiante = $this->EstudianteModel->find($data['carnet_identidad']);

			if(isset($estudiante)) 
			{
				$this->load->view('estudiantes/exist');
			}
			else 
			{
				$this->EstudianteModel->insert($data);
				$this->nuevoEstudiante();
			}		
		}
		else
		{
			$this->load->view('estudiantes/error');
		}
	}
	public function eliminarEstudiante($codigo)
	{
		$this->load->model('EstudianteModel');
		$this->EstudianteModel->delete($codigo);
		redirect('listar_estudiantes','refresh');		
	}
}
