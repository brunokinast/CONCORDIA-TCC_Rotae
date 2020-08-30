<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastro extends CI_Controller {
	public function index(){
		//Usa o flashdata para capturar possíveis erros no cadastro do banco.
		$array = array('erro' => $this->session->flashdata('erro'));

		$this->load->view('pages/motorista/cadastro', $array);
	}

	public function submit(){
		//Tratamento das variáveis
		$input = $this->input->post();
		$input["telefone"] = preg_replace('/[^0-9]+/', '', $input["telefone"]);
		$input["telefone"] = (int)$input["telefone"];
		$input["cpf"] = preg_replace('/[^0-9]+/', '', $input["cpf"]);
		//Verifica o tamanho do CPF
		if (strlen($input["cpf"]) != 11) {
			//Erro em caso de tamanho inválido
			$this->session->set_flashdata('erro','Erro: CPF inválido!');
			redirect(base_url()."motorista/cadastro");
		}
		if (strlen($input["placa"]) != 7) {
			//Erro em caso de tamanho inválido
			$this->session->set_flashdata('erro','Erro: Placa inválida!');
			redirect(base_url()."motorista/cadastro");
		}
		$input["cnh"] = preg_replace('/[^0-9]+/', '', $input["cnh"]);
		if (strlen($input["cnh"]) != 11) {
			//Erro em caso de tamanho inválido
			$this->session->set_flashdata('erro','Erro: CNH inválido!');
			redirect(base_url()."motorista/cadastro");
		}
		$verificardata = explode("/", $input["nascimento"]);
		if (!checkdate($verificardata[1], $verificardata[0], $verificardata[2])) {
			$this->session->set_flashdata('erro', 'Erro: Nascimento inválido!');
			redirect(base_url()."motorista/cadastro");
		}
		$input["nascimento"] = str_replace("/", "-", $input["nascimento"]);
		$input["nascimento"] = strtotime($input["nascimento"]);
		$input["nascimento"] = date('Y/m/d',$input["nascimento"]);
		$input["senha"] = md5($input["senha"]);
		
		//Carregar model
		$this->load->model('Database');

		//Cadastrar
		$cadastro = $this->Database->registrarmoto($input);
		if ($cadastro['status'] != true) {
			//Erro no cadastro
			$this->session->set_flashdata('erro', $cadastro['mensagem']);
			redirect(base_url()."motorista/cadastro");
		}elseif ($cadastro['status'] == true) {
			//Cadastrado com sucesso
			$this->session->set_flashdata('msg', $cadastro['mensagem']);
			redirect(base_url()."motorista/login");
		}
	}
}
