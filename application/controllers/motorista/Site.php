<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {
	public function index()
	{
		if (!$this->session->userdata("motorista_logado")) {
			redirect(base_url()."motorista/login");
		}
		$this->load->model("Database");
		$result = $this->Database->listarviagem();
		$array = array('tabela' => $result);
		$this->load->view('pages/motorista/index', $array);
	}
}
