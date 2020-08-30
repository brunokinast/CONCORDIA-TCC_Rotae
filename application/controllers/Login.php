<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index(){
		//Usa o flashdata para capturar possíveis mensagens.
		if ($this->session->userdata("usuario_logado")) {
			redirect(base_url());
		}
		$array = array('msg' => $this->session->flashdata('msg'));
		$this->load->view('pages/login', $array);
	}

	public function submit(){
		$input = $this->input->post();
		$input["senha"] = md5($input["senha"]);

		$this->load->model('Database');
		$usuario = $this->Database->logar($input);
		if ($usuario) {
			$this->session->set_userdata("usuario_logado", $usuario);
			if ($this->session->userdata("motorista_logado")) {
				$this->session->unset_userdata("motorista_logado");
			}
			redirect(base_url());
		}else{
			//Erro no login
			$this->session->set_flashdata('erro', 'Usuário ou senha incorretos!');
			redirect(base_url()."login");
		}
	}

	public function logout(){
		$this->session->unset_userdata("usuario_logado");
		$this->session->set_flashdata('msg', 'Usuário desconectado!');
		redirect(base_url()."login");
	}
}
