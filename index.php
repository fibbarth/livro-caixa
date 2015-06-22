<?php
session_start();
set_time_limit(0);

include 'config.php';
include 'functions.php';

if (isset($_GET['mes']))
    $mes_hoje = $_GET['mes'];
else
    $mes_hoje = date('m');

if (isset($_GET['ano']))
    $ano_hoje = $_GET['ano'];
else
    $ano_hoje = date('Y');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
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
                        <h1 class="page-header">
                            Livro caixa 
                        </h1>
						<p class="small text-muted"><i class="fa fa-clock-o"></i> 
							<a href="?mes=<?php echo date('m')?>&ano=<?php echo date('Y')?>">
							Hoje:
							<strong> <?php echo date('d')?> de <?php echo mostraMes(date('m'))?> de <?php echo date('Y')?>
							</strong>
							</a>
						</p>
                    </div>
                </div>
				<?php
					$qr=mysql_query("SELECT SUM(valor) as total FROM lc_movimento WHERE tipo=1 && mes='$mes_hoje' && ano='$ano_hoje'");
					$row=mysql_fetch_array($qr);
					$entradas=$row['total'];

					$qr=mysql_query("SELECT SUM(valor) as total FROM lc_movimento WHERE tipo=0 && mes='$mes_hoje' && ano='$ano_hoje'");
					$row=mysql_fetch_array($qr);
					$saidas=$row['total'];

					$resultado_mes=$entradas-$saidas;
				?>
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
											<td class="text-right"><?php echo formata_dinheiro($entradas); ?></td>
										</tr>
										<tr>
											<td>Saídas</td>
											<td class="text-right"><?php echo formata_dinheiro($saidas); ?></td>
										</tr>
									</table>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <span class="pull-left"><strong>Total</strong></span>
                                <span class="pull-right">
									<strong>
										<?php echo formata_dinheiro($resultado_mes); ?>
									</strong>	
								</span>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
					<?php
						$qr=mysql_query("SELECT SUM(valor) as total FROM lc_movimento WHERE tipo=1 ");
						$row=mysql_fetch_array($qr);
						$entradas=$row['total'];

						$qr=mysql_query("SELECT SUM(valor) as total FROM lc_movimento WHERE tipo=0 ");
						$row=mysql_fetch_array($qr);
						$saidas=$row['total'];

						$resultado_geral=$entradas-$saidas;
					?>

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
											<td class="text-right"><?php echo formata_dinheiro($entradas); ?></td>
										</tr>
										<tr>
											<td>Saídas</td>
											<td class="text-right"><?php echo formata_dinheiro($saidas); ?></td>
										</tr>
									</table>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <span class="pull-left"><strong>Total</strong></span>
                                <span class="pull-right">
									<strong>
										<?php echo formata_dinheiro($resultado_geral); ?>
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
						 $active = ($mes_hoje == $x) ? 'btn-success' : 'btn-primary';
						?>
                        <a href="?mes=<?php echo $x?>&ano=<?php echo $ano_hoje?>" class="btn btn-sm <?php echo $active; ?>" type="button"><?php echo mostraMes($x);?></a>
						<?php 
						endfor;
						?>
                    </div>
                </div>
                <!-- /.row -->
<?php
	$query = "SELECT lc_movimento.*, lc_cat.nome 
		FROM lc_movimento INNER JOIN lc_cat 
		ON lc_movimento.cat = lc_cat.id WHERE lc_movimento.mes='{$mes_hoje}' && lc_movimento.ano='{$ano_hoje}' ORDER By dia";
		
	$result = mysql_query($query);
	while( $movimento = mysql_fetch_object($result) ){
		$movimentos[] = $movimento;
	}
	
?>
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
						<?php if($movimentos): ?>
                        <table class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Descrição</th>
									<th>Categoria</th>
									<th>Tipo</th>
									<th>Valor</th>
								</tr>
							</thead>
							<tbody>
							<?php foreach($movimentos as $movimento): ?>
							<tr>
								<td><?php echo $movimento->id; ?></td>
								<td><?php echo $movimento->descricao ?></td>
								<td><?php echo $movimento->nome ?></td>
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
								<td><?php echo formata_dinheiro($movimento->valor); ?></td>
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
