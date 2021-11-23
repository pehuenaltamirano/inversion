<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	protected $datos=array();

	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata("uid")){
			redirect("auth");
		}

		$this->datos["usuario_logueado"]=$this->session->userdata("usuario");
		$this->load->model("montos_model");
        $this->load->model("usuarios_model");
	}

	public function index()
	{
        $this->datos["aculmulado"]=$this->montos_model->calcular_acumulado();
		$this->datos["montos"]=$this->montos_model->listar();
		redirect("home/home");
		
	}

	public function home(){
        $this->load->view('home',$this->datos);
	}
}