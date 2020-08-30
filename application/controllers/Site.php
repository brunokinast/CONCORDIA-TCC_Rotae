<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {
	public function index()
	{
		if (!$this->session->userdata("usuario_logado")) {
			redirect(base_url()."login");
		}
		$this->load->model("Database");
		$preco = $this->Database->precos();
		$data = array('preco' => $preco, 'default' => $this->session->userdata('usuario_logado')['modalidade']);
		$this->load->view('pages/index', $data);
	}
	public function sobre(){
		if (!$this->session->userdata("usuario_logado")) {
			redirect(base_url()."login");
		}
		$this->load->view('pages/sobre');
	}
}
