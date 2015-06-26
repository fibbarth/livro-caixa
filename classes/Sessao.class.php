<?php
class Sessao
{
	private $usuario;
	
	public function __construct( Usuario $usuario )
	{
		$this->usuario = $usuario;
	}
	
	public function validaSessao()
	{
		if( isset($_COOKIE[NAME_COOKIE]) ){
			return true;
		}
		return false;
	}
	
	public function autentica()
	{
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		if( !$this->usuario->setUserLogin($email, $password) ){
			return false;
		}
		$this->setCookie();
	}
	
	public function setCookie()
	{
		$value = base64_encode($this->usuario->id);
		setrawcookie(NAME_COOKIE, $value, EXPIRE_COOKIE, PATH_COOKIE, 
			DOMAIN_COOKIE, SECURE_COOKIE, HTTPONLY_COOKIE);
	}
	
	public function getUser()
	{
		$this->usuario->id = base64_decode($_COOKIE[NAME_COOKIE]);
		$this->usuario->load();
		return $this->usuario;
	}
}