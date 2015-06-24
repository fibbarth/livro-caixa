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

if (isset($_SESSION['logado']))
    $logado = $_SESSION['logado'];
else
    $logado = "";

$senha_ = md5($senha);

if (isset($_POST['login']) && $_POST['login'] != '') {

    if ($_POST['login'] == $usuario && $_POST['senha'] == $senha) {
        $logado = $_SESSION['logado'] = md5($_POST['senha']);
        header("Location: ./");
        exit();
    }
}

if ($logado != $senha_ && !isset($pagina_login)) {

    header("Location: login.php");

    exit();
}
?>
