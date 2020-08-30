<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conta extends CI_Controller {
	public function index()
	{
		if (!$this->session->userdata("motorista_logado")) {
			redirect(base_url()."motorista/login");
		}
		$this->load->view('pages/motorista/conta');
	}

	/*public function editar(){
		if (!$this->session->userdata("usuario_logado")) {
			redirect(base_url()."login");
		}
		$this->load->view('pages/editar');
	}
	public function submit(){
		if (!$this->session->userdata("usuario_logado")) {
			redirect(base_url()."login");
		}
		//Tratamento das variáveis
		$input = $this->input->post();
		$input["telefone"] = preg_replace('/[^0-9]+/', '', $input["telefone"]);
		$input["telefone"] = (int)$input["telefone"];
		$input["modalidade"] = (int)$input["modalidade"];
		$input["cpf"] = preg_replace('/[^0-9]+/', '', $input["cpf"]);
		//Verifica o tamanho do CPF
		if (strlen($input["cpf"]) != 11) {
			//Erro em caso de tamanho inválido
			$this->session->set_flashdata('erro','Erro: CPF inválido!');
			redirect(base_url()."conta/editar");
		}
		$verificardata = explode("/", $input["nascimento"]);
		if (!checkdate($verificardata[1], $verificardata[0], $verificardata[2])) {
			$this->session->set_flashdata('erro', 'Erro: Nascimento inválido!');
			redirect(base_url()."conta/editar");
		}
		$input["nascimento"] = str_replace("/", "-", $input["nascimento"]);
		$input["nascimento"] = strtotime($input["nascimento"]);
		$input["nascimento"] = date('Y/m/d',$input["nascimento"]);
		$input["senha"] = md5($input["senha"]);

		//Carregar model
		$this->load->model('Database');

		//Atualizar
		$editar = $this->Database->atualizar($input);
		if ($editar['status'] != true) {
			//Erro no atualização
			$this->session->set_flashdata('erro', $editar['mensagem']);
			redirect(base_url()."conta/editar");
		}elseif ($editar['status'] == true) {
			//Atualizado com sucesso
			$this->session->set_flashdata('msg', 'Usuário atualizado!');
			$this->session->unset_userdata("usuario_logado");
			$this->session->set_userdata("usuario_logado", $editar['usuario']);
			redirect(base_url()."conta");
		}
	}*/
}
