<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	

	public function index(){
		
		redirect("auth/login");
		
	}


	public function login(){
		$datos=array();

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('usuario', 'Usuario', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			if($this->input->post()){
				$datos["OP"]="MAL";
			}
		}
		else
		{	
				$this->load->model("usuarios_model");
				//recuperar del form
				$usuario=set_value("usuario");
				$password=$this->input->post("password");
				
				if($usuario_id=$this->usuarios_model->verificar($usuario,$password)){
					$u=$this->usuarios_model->obtener($usuario_id);
					$this->session->set_userdata("uid",$u["usuario_id"]);
					$this->session->set_userdata("usuario",$u["usuario"]);

					redirect("home");
				}else{
					//USUARIO INCORRECTO
					$datos["OP"]="INCORRECTO";
				}
		}
		$this->load->view('login',$datos);


	}

	public function salir(){
		$this->session->sess_destroy();
		redirect("auth");
	}

	public function usuarionuevo(){
		$datos=array();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('nombre','Nombre','trim|required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('confirmacion', 'Confirmacion', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE){
            if($this->input->post()){
				$datos["OP"]="MAL";
			}
        }else{
			$this->load->model("usuarios_model");
			
			//recuperar del form
			$usuario=set_value("nombre"); //metodo form_validation (preferido)
			$password=set_value("password");
			$email=set_value("email");


			if($this->usuarios_model->nombrenuevo($usuario)==false and $this->usuarios_model->emailnuevo($email)==false){
				$this->usuarios_model->agregarnuevo($usuario,$password,$email);
				redirect("auth/login"); 
			}else{
				$datos["OP"]="REPETIDO";
			}
                       
        }
		$this->load->view('crearusuario',$datos);
	}

	public function cambiarpass(){
		if(!$this->session->userdata("uid")){
			redirect("auth");
			
		}
		
		$this->load->library('form_validation');

		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirmacion', 'Confirmacion', 'required|matches[password]');
		$this->load->model("usuarios_model");
		if ($this->form_validation->run() == FALSE){
            if($this->input->post()){
				$datos["OP"]="MAL";
			}
        }else{
			
			
			//recuperar del form
			$password=set_value("password");
			$this->usuarios_model->cambiarpass($this->session->userdata["uid"],$password) ;
                       
        }
		$usuario_logueado=$this->session->userdata["usuario"];
		$this->datos["usuario_logueado"]=$this->session->userdata["usuario"];
		//echo $usuario_logueado;
		//redirect('principal/cambiarpass',$datos);
	
		//$this->datos["tema"]=$this->usuarios_model->obtener($this->session->userdata("uid"))["tema"];
		$this->load->view('cambiarpass',$this->datos);
	}


}
