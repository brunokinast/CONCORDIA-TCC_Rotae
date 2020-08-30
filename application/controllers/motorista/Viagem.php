<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viagem extends CI_Controller {
	public function atender($id){
		if (!$this->session->userdata("motorista_logado")) {
			redirect(base_url()."motorista/login");
		}
		$array = array('id' => $id, 'cpf_moto' => $this->session->userdata("motorista_logado")["cpf"], 'status' => 1);
		$this->load->model("Database");
		$this->Database->atenderviagem($array);
		redirect(base_url()."motorista");
	}
	public function concluir($id){
		if (!$this->session->userdata("motorista_logado")) {
			redirect(base_url()."motorista/login");
		}
		$array = array('id' => $id, 'status' => 2, 'dataconcluida' => date("Y-m-d H:i:s"));
		$this->load->model("Database");
		$this->Database->atenderviagem($array);
		redirect(base_url()."motorista");
	}
}
