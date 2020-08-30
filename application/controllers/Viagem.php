<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Viagem extends CI_Controller {
	public function confirmar()
	{
		if (!$this->session->userdata("usuario_logado")) {
			redirect(base_url()."motorista/login");
		}
		$info = $_POST['data'];
		$this->load->model('Database');
		$this->Database->viagem($info);
	}
}
