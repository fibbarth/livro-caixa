<?php

//Autenticação simples
$usuario="admin";
$senha="123";

$username = 'root';
$password = 'root';
$dsn = 'mysql:host=localhost;port=3306;dbname=livro_caixa';
$db = new PDO($dsn, $username, $password);

define('MONEY', 'R$');
define('TITLE', 'Livro caixa - Demo');
define('SECRET_KEY', 'SEGREDO');

##########Definições de cookie
define('NAME_COOKIE', 'livro_caixa');
define('EXPIRE_COOKIE', 0);
define('PATH_COOKIE', '/');
define('DOMAIN_COOKIE', '.caixa.dev');
define('SECURE_COOKIE', 0);
define('HTTPONLY_COOKIE', 1);

define('LIVE_SITE', 'caixa.dev');
?>
