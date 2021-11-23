<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	protected $datos=array();

	public function __construct()
	{
		parent::__construct();
		
		if(!$this->session->userdata("uid")){
			redirect("auth");
		}


		$this->datos["usuario_logueado"]=$this->session->userdata("usuario");
		$this->load->model("montos_model");
	}

	public function index()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules('monto', 'Monto', 'trim|required|numeric');

		if ($this->form_validation->run() == TRUE) {
			$this->montos_model->agregar(set_value("monto"));
			redirect("app");
		}

		$this->datos["aculmulado"]=$this->montos_model->calcular_acumulado();
		$this->datos["montos"]=$this->montos_model->listar();
		$this->load->view('interfaz',$this->datos);
	}

    public function borrar($monto_id=""){
        $this->load->model("montos_model");
		$this->montos_model->borrar($monto_id);
		redirect("App/inversiones");
	}
	public function borrarinv($inversion_id=""){
        $this->load->model("inversiones_model");
		$this->inversiones_model->borrar($inversion_id);
		redirect("App/inversiones/".$inversion_id);
	}

public function calculadora1(){

	if(!$this->session->userdata("uid")){
		redirect("auth");
	}
	$this->datos["usuario_logueado"]=$this->session->userdata("usuario");

	$this->load->view('calculadora',$this->datos);}

	public function porqueinvertir(){
		if(!$this->session->userdata("uid")){
			redirect("auth");
		}
		$this->datos["usuario_logueado"]=$this->session->userdata("usuario");
	
		$this->load->view('porqueinvertir',$this->datos);
	}

public function inversiones($inv_id=""){

	if(!$this->session->userdata("uid")){
		redirect("auth");
	}

	
	$this->datos["usuario_logueado"]=$this->session->userdata("usuario");
	$this->datos["usuario_id"]=$this->session->userdata("uid");

	$this->load->model("montos_model");
	$this->load->model("inversiones_model");

	$this->load->library("form_validation");
	$this->form_validation->set_rules('monto', 'Monto', 'trim|required|numeric');

	if ($this->form_validation->run() == TRUE) {
		$this->montos_model->agregar(set_value("monto"),$inv_id,$this->datos["usuario_id"]);
		$this->inversiones_model->cambiarbalance($inv_id,$this->montos_model->calcular_acumulado($inv_id));

	}

	
	
	$this->datos["montos"]=$this->montos_model->listarporusuario($this->datos["usuario_id"]);
	$this->datos["inversiones"]=$this->inversiones_model->listarporusuario($this->datos["usuario_id"]);
	
	$this->load->view('inversiones',$this->datos);
}

public function nuevainversion()
{
	if(!$this->session->userdata("uid")){
		redirect("auth");
	}
	$this->datos["usuario_logueado"]=$this->session->userdata("usuario");
	$this->datos["usuario_id"]=$this->session->userdata("uid");
	
	$this->load->model("montos_model");
	$this->load->model("inversiones_model");

	$this->load->library("form_validation");
	$this->form_validation->set_rules('monto', 'Monto', 'trim|required|numeric');
	$this->form_validation->set_rules('concepto', 'Monto', 'trim|required');

	if ($this->form_validation->run() == TRUE) {
		$this->inversiones_model->agregar(set_value("monto"),$this->datos["usuario_id"],set_value("concepto"));

		$this->montos_model->agregar(set_value("monto"), $this->inversiones_model->traerultima($this->datos["usuario_id"])["inversion_id"], $this->datos["usuario_id"]); 
		redirect("App/inversiones"); 

	}

	$this->load->view('nuevainversion',$this->datos);


}





}



