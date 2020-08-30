<?php
class Database extends CI_Model {
  public function registrar($dbarray) {
  	$insert = $this->db->insert('usuario', $dbarray);
  	if (!$insert) {
  		$dberror = $this->db->error();
  		if ($dberror['code'] == 1062) {
  			$out = array('status' => false, 'mensagem' => 'Erro: Usuário já cadastrado!');
  			return $out;
  		}else{
  			$out = array('status' => false, 'mensagem' => 'Um erro ocorreu no cadastro!');
  			return $out;
  		}
  	}
    $out = array('status' => true, 'mensagem' => 'Usuário cadastrado com sucesso!');
  	return $out;
  }

  public function registrarmoto($dbarray) {
    $insert = $this->db->insert('motorista', $dbarray);
    if (!$insert) {
      $dberror = $this->db->error();
      if ($dberror['code'] == 1062) {
        $out = array('status' => false, 'mensagem' => 'Erro: Motorista já cadastrado!');
        return $out;
      }else{
        $out = array('status' => false, 'mensagem' => 'Um erro ocorreu no cadastro!');
        return $out;
      }
    }
    $out = array('status' => true, 'mensagem' => 'Motorista cadastrado com sucesso!');
    return $out;
  }

  public function logar($dbarray){
    $this->db->where("email", $dbarray["email"]);
    $this->db->where("senha", $dbarray["senha"]);
    $usuario = $this->db->get("usuario")->row_array();
    unset($usuario["senha"]);
    return $usuario;
  }

  public function logarmoto($dbarray){
    $this->db->where("email", $dbarray["email"]);
    $this->db->where("senha", $dbarray["senha"]);
    $usuario = $this->db->get("motorista")->row_array();
    unset($usuario["senha"]);
    return $usuario;
  }

  public function atualizar($dbarray){
    $this->db->where("cpf", $dbarray["cpf"]);
    $this->db->where("senha", $dbarray["senha"]);
    $usuario = $this->db->get("usuario")->row_array();
    if (!$usuario) {
      $out = array('status' => false, 'mensagem' => 'Erro: Senha incorreta!');
      return $out;
    }else{
      $this->db->where("cpf", $dbarray["cpf"]);
      $cpf = $dbarray["cpf"];
      unset($dbarray["cpf"]);
      $this->db->update("usuario", $dbarray);
      if ($this->db->affected_rows() == 0) {
        $out = array('status' => false, 'mensagem' => 'Erro: Verifique as informações digitadas!');
        return $out;
      }elseif ($this->db->affected_rows() > 0) {
        $this->db->where("cpf", $cpf);
        $usuario = $this->db->get("usuario")->row_array();
        unset($usuario["senha"]);
        $out = array('status' => true, 'usuario' => $usuario);
        return $out;
      }
    }
  }

  public function atenderviagem($dbarray){
    $this->db->where('id', $dbarray['id']);
    $this->db->update('viagem', $dbarray);
  }

  public function precos(){
    $modalidades = $this->db->get("modalidade")->result_array();
    return $modalidades;
  }
  
  public function viagem($dbarray){
    $array = array('cpf_user' => $this->session->userdata("usuario_logado")["cpf"], 'modalidade' => $dbarray["modalidade"], 'origem' => $dbarray["origem"], 'origem_latlng' => $dbarray["origem_latlng"], 'destino' => $dbarray["destino"], 'destino_latlng' => $dbarray["destino_latlng"], 'valor' => $dbarray['valortotal'], 'status' => 0, 'data' => date("Y-m-d H:i:s"));
    $this->db->insert('viagem', $array);
  }

  public function listarviagem(){
    $query = $this->db->query("SELECT viagem.id, usuario.nome, viagem.modalidade, viagem.origem, viagem.origem_latlng, viagem.destino, viagem.destino_latlng, viagem.status, viagem.data, viagem.dataconcluida, viagem.valor, viagem.cpf_moto FROM usuario, viagem WHERE viagem.cpf_user = usuario.cpf ORDER BY viagem.id;");
    return $query->result();
  }
}

