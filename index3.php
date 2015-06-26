<?php
	ini_set('display_errors', 1);
	require_once 'classes/Movimento.class.php';
	require_once 'classes/Usuario.class.php';
	$username = 'root';
	$password = 'root';
	$dsn = 'mysql:host=localhost;port=3306;dbname=livro_caixa';
	$db = new PDO($dsn, $username, $password);
	$usuario = new Usuario($db);
	$usuario->nome = 'Felipe Barth';
	$usuario->email = 'fibbarth@gmail.com';
	$usuario->password = md5('nicole2904');
	$usuario->save();
	/*
	$movimento = new Movimento($db);
	$movimento->id = 1;
	$movimento->load();
	$movimento->descricao = 'Teste save';
	$movimento->pago = 0;
	$movimento->save();
	$movimento->delete();

	$movimento->id = 0;
	$movimento->load();
	$movimento->descricao = 'Teste de insert';
	$movimento->tipo = 0;
	$movimento->pago = 0;
	$movimento->data_pagamento = '2015-01-01';
	$movimento->data_vencimento = '2015-01-01';
	$movimento->data_criacao = date('Y-m-d H:i:s');
	$movimento->cat_id = 1;
	$movimento->user_id = 1;
	$movimento->valor = 33.50;
	$movimento->save();
	
	$movimento->getSoma();
	*/
	exit;
	