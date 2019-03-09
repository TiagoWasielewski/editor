<?php

class User {

private $nome;
private $email;
private $senha;

public function __construct($nome = null, $email = null, $senha = null){
	if ($nome != null) 	$this->nome = $nome;
	if ($email != null) $this->email = $email;
	if ($senha != null) $this->senha = $senha;
}

	public function insert(){
		$arquivo = "../user/bd.txt";
    	$fp = fopen($arquivo, "a+");
    	fwrite($fp, $this->nome. "|" .$this->email. "|" .sha1($this->senha). "\r\n");
    	fclose($fp);
    	return true;
	}

	public function login(){
	  	$arquivo = "../user/bd.txt";
	  	$dados = file($arquivo);

	  	foreach ($dados as $linha) {
	  	$linha = trim($linha);
	  	$valor = explode('|', $linha);

	  	$email = $valor[1];
	  	$senha = $valor[2];

	  	if (($email == $this->nome) AND (sha1($this->email) == $senha)){
	  		return true;
	  		break;	
	  		}
	  	}
	  		
	}

 	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getSenha(){
		return $this->senha;
	}

	public function setSenha($senha){
		$this->senha = $senha;
	}
}
?>