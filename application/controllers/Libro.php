<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libro extends CI_Controller {

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

    public function nuevoLibro()
	{
		$this->load->model('ClasificacionModel');
		$this->load->model('AnnoModel');		
	
		$data = array( 
            'clasificacion' => $this->ClasificacionModel->findAll(), 
            'anno' => $this->AnnoModel->findAll()
        );		
		

		$this->load->view('head');
        $this->load->view('libros/form', $data);
        $this->load->view('footer');
	}

	public function listarlibros()
	{
		$this->load->model('LibroModel');		

		//var_dump($libros);
		
        $data['libros'] = $this->LibroModel->findAll();       
		
		$this->load->view('head');
        $this->load->view('libros/listar', $data);
        $this->load->view('footer');
	}
	
	public function insertarLibro() 
	{
		$this->form_validation->set_rules('codigo', 'Código', 'required');
		$this->form_validation->set_rules('titulo', 'Título', 'required');
		$this->form_validation->set_rules('autor', 'Autor', 'required');		
		$this->form_validation->set_rules('descripcion', 'Descripción', 'required');
		$this->form_validation->set_rules('isbn', 'ISBN', 'required');
		$this->form_validation->set_rules('editorial', 'Editorial', 'required');
		$this->form_validation->set_rules('cantidad', 'Cantidad Existente', 'required');
		$this->form_validation->set_rules('precio', 'Precio', 'required');
		$this->form_validation->set_rules('clasificacion', 'Clasificación', 'required');
		$this->form_validation->set_rules('anno', 'Año', 'required');
		    			
		$data = array( 
			"codlibro" => $this->input->post("codigo"),				 
			"titulo" => $this->input->post("titulo"),
			"autor" => $this->input->post("autor"),
			"descripcion" => $this->input->post("descripcion"),
			"isbn" => $this->input->post("isbn"),
			"editorial" => $this->input->post("editorial"),
			"cantidad_existencia" => $this->input->post("cantidad"),
			"precio" => $this->input->post("precio"),
			"clasificacion_idclasificacion" => $this->input->post("clasificacion"),
			"anno_idanno" => $this->input->post("anno")
		);			
					
		if ($this->form_validation->run())
		{
			$this->load->model('LibroModel');
			$libro = $this->LibroModel->find($data['codlibro']);

			if(isset($libro)) 
			{
				$this->load->view('libros/exist');
			}
			else 
			{
				$this->LibroModel->insert($data);
				$this->nuevoLibro();
			}		
		}
		else
		{
			$this->load->view('libros/error');
		}
	}
	public function eliminarLibro($codigo)
	{
		$this->load->model('LibroModel');
		$this->LibroModel->delete($codigo);
		redirect('listar_libros','refresh');		
	}
}
