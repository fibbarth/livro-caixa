<?php
ini_set('display_errors', 1);
require_once 'config.php';
require_once 'classes/Usuario.class.php';
require_once 'classes/Sessao.class.php';
$usuario = new Usuario($db);
$sessao = new Sessao($usuario);

if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
	var_dump($sessao->autentica());
	exit;
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo TITLE; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="template/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="template/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="template/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="template/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<link href="css/login.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.template/js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <div class="container-fluid">    
		<div class="row">
			<form class="form-signin" action="login.php" method="post">
				<h2 class="form-signin-heading">Login</h2>
				<label for="inputEmail" class="sr-only">Email</label>
				<input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
				<label for="inputPassword" class="sr-only">Password</label>
				<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
				<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
			 </form>
		</div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="template/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="template/js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="template/js/plugins/morris/raphael.min.js"></script>
    <script src="template/js/plugins/morris/morris.min.js"></script>
    <script src="template/js/plugins/morris/morris-data.js"></script>
</body>
</html>
