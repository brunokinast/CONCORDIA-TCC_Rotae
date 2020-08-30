<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index(){
		//Usa o flashdata para capturar possíveis mensagens.
		if ($this->session->userdata("motorista_logado")) {
			redirect(base_url()."motorista");
		}
		$array = array('msg' => $this->session->flashdata('msg'));
		$this->load->view('pages/motorista/login', $array);
	}

	public function submit(){
		$input = $this->input->post();
		$input["senha"] = md5($input["senha"]);

		$this->load->model('Database');
		$motorista = $this->Database->logarmoto($input);
		if ($motorista) {
			if ($this->session->userdata("usuario_logado")) {
				$this->session->unset_userdata("usuario_logado");
			}
			$this->session->set_userdata("motorista_logado", $motorista);
			redirect(base_url()."motorista");
		}else{
			//Erro no login
			$this->session->set_flashdata('erro', 'E-mail ou senha incorretos!');
			redirect(base_url()."motorista/login");
		}
	}

	public function logout(){
		$this->session->unset_userdata("motorista_logado");
		$this->session->set_flashdata('msg', 'Motorista desconectado!');
		redirect(base_url()."motorista/login");
	}
}
