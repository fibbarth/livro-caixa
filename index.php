<?php
ini_set('display_errors', 1);
include 'config.php';
include 'functions.php';
require_once 'classes/Movimento.class.php';
require_once 'classes/Categoria.class.php';
require_once 'classes/Usuario.class.php';
require_once 'classes/Sessao.class.php';

$usuario = new Usuario($db);
$sessao = new Sessao($usuario);

if( !$sessao->validaSessao() ){
	header('Location: login.php');
	exit;
}
$userLogado = $sessao->getUser();

$dataParam = new DateTime(date('Y-m-d'));
$dataAtual = new Datetime('now');

if( isset($_GET['data']) ){
	$dataParam= new DateTime($_GET['data']);
}
$categoriaObj = new Categoria($db);

$movimentoObj = new Movimento($db);
$totalReceitas = sprintf('%.2f', $movimentoObj->getTotal('receita'));
$totalDespesas = sprintf('%.2f',$movimentoObj->getTotal('despesa'));
$totalReceitasMes = sprintf('%.2f', $movimentoObj->getTotal('receita', $dataParam->format('Y-m')));
$totalDespesasMes = sprintf('%.2f', $movimentoObj->getTotal('despesa', $dataParam->format('Y-m')));
$movimentos = $movimentoObj->getMovimentos($dataParam->format('Y-m'));
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo TITLE ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="template/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="template/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="template/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="template/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.template/js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong><?php echo $userLogado->nome; ?></strong>
                                        </h5>
										
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa-user"></i> <?php echo $userLogado->nome; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="margin-top:5px;">
                            <?php echo TITLE; ?> 
                        </h1>
						<p class="small text-muted"><i class="fa fa-clock-o"></i> 
							<a href="?data=<?php echo $dataAtual->format('Y-m-d'); ?>">
							Hoje:
							<strong> <?php echo $dataAtual->format('d'); ?> de <?php echo mostraMes($dataAtual->format('m')); ?> de <?php echo $dataAtual->format('Y');?>
							</strong>
							</a>
						</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row" style="padding:0px 10px 0px 10px;">
									<h2 style="margin-top:0px;">
										<i class="fa fa-money"></i>
										Movimentações no mês
									</h2>
									<table class="table" style="margin-bottom:0px;">
										<tr>
											<td>Entradas</td>
											<td class="text-right"><?php printf(MONEY.' %.2f', $totalReceitasMes); ?></td>
										</tr>
										<tr>
											<td>Saídas</td>
											<td class="text-right"><?php printf(MONEY.' %.2f', $totalDespesasMes); ?></td>
										</tr>
									</table>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <span class="pull-left"><strong>Total</strong></span>
                                <span class="pull-right">
									<strong>
										<?php printf(MONEY.' %.2f', $totalReceitasMes-$totalDespesasMes); ?>
									</strong>	
								</span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row" style="padding:0px 10px 0px 10px;">
									<h2 style="margin-top:0px;">
										<i class="fa fa-money"></i>
										Balanço geral
									</h2>
									<table class="table" style="margin-bottom:0px;">
										<tr>
											<td>Entradas</td>
											<td class="text-right"><?php printf(MONEY.' %.2f', $totalReceitas); ?></td>
										</tr>
										<tr>
											<td>Saídas</td>
											<td class="text-right"><?php printf(MONEY.' %.2f', $totalDespesas); ?></td>
										</tr>
									</table>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <span class="pull-left"><strong>Total</strong></span>
                                <span class="pull-right">
									<strong>
										<?php printf(MONEY.' %.2f', $totalReceitas-$totalDespesas); ?>
									</strong>
								</span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
						<?php
						for($x=1; $x<=12; $x++):
						 $active = ($dataParam->format('m') == $x) ? 'btn-success' : 'btn-primary';
						?>
                        <a href="?data=2015-<?php echo $x; ?>-01" class="btn btn-sm <?php echo $active; ?>" type="button"><?php echo mostraMes($x);?></a>
						<?php 
						endfor;
						?>
                    </div>
                </div>
                <!-- /.row -->
				<br>
                <div class="row">
				    <div class="table-responsive panel panel-default">
						 <div class="panel-heading">
							<h3 class="panel-title">
								<i class="fa fa-table"></i> 
								&nbsp;
								Movimentações no mês
							</h3>
						</div>
						<?php if(is_array($movimentos)): ?>
                        <table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Descrição</th>
									<th>Categoria</th>
									<th>Tipo</th>
									<th>Valor</th>
									<th>Data vencimento</th>
									<th>Pago</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								foreach($movimentos as $movimento): 
								$categoriaObj->id = $movimento->cat_id; 
								$categoriaObj->load();
							?>
							<tr>
								<td><?php echo $movimento->id; ?></td>
								<td><?php echo $movimento->descricao ?></td>
								<td><span class="badge"><?php echo $categoriaObj->nome; ?></span></td>
								<td>
									<?php
										$text = 'Despesa';
										$classMov = 'label-danger';
										if( $movimento->tipo ){
											$text = 'Receita';
											$classMov = 'label-success';
										}
									?>
									<span class="label <?php echo $classMov; ?>">
										<?php echo $text; ?>
									</span>	
								</td>
								<td><?php printf(MONEY.' %.2f', $movimento->valor); ?></td>
								<td>
								<?php 
									$dataVencimento = new Datetime($movimento->data_vencimento);
									echo $dataVencimento->format('d/m/Y');
								?>
								</td>
								<td>
								<?php 
								
									$checked = $movimento->pago ? 'checked' : '';
								?>
								    <input type="checkbox" name="pago" <?php echo $checked ?>>
                                </td>
							</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
						<?php else: ?>
						<div class="panel-body">
							Sem movimentos neste mês 
						</div>
						<?php endif; ?>
					</div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

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
