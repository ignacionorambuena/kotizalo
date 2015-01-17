<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="<? echo base_url('css/bootstrap.min.css');?>">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<? echo base_url('css/kotizalo.css');?>">
<meta charset="utf-8">
<title>Kotizalo.com</title>

</head>
<body>

<div class="navbar navbar-fixed-top navbar-default">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#"><img src="<? echo base_url('img/logo.png');?>" class="img-responsive" style="max-width:120px;margin-top:-10px;"></a>
</div>
<div class="navbar-collapse collapse navbar-responsive-collapse">


<ul class="nav navbar-nav navbar-right">

<li><a class="disabled"><i class="fa fa-briefcase"></i> <?php echo $nameEmp; ?> | Saldo: <?php if($saldoEmp>3000){ echo "<b class='text-success'>".number_format($saldoEmp)."</b>";}else{echo "<b class='text-warning'>".number_format($saldoEmp)."</b>";}?></a></li>
<li><a href="/empresa"><i class="fa fa-home"></i> Inicio</a></li>
<li><a href="/empresa/recargar"><i class="fa fa-money"></i> Recargar Saldo</a></li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cogs"></i> Configuración</a>
<ul class="dropdown-menu">
<li><a href="/empresa/configurar" class=""><i class="fa fa-cogs"></i> Configurar Empresa</a></li>
<li><a href="/empresa/password" class=""><i class="fa fa-lock"></i> Actualizar Contraseña</a></li>
<li><a href="/publicaciones" class=""><i class="fa fa-search"></i> Buscar Trabajos</a></li>
<li><a href="/empresa/compras" class=""><i class="fa fa-shopping-cart"></i> Mis Compras <span class="badge pull-right"><?php
foreach($cont as $cc)
{
?>
<?=$cc -> Total ?>
<?php
}
?></span></a></li>
<li><a href="/empresa/rubros" class=""><i class="fa fa-globe"></i> Seleccionar Rubros</a></li>
</ul>
</li>
<li><a href="/empresa/logout" style="color:red;"><i class="fa fa-sign-out"></i> Cerrar Sesión</a></li>

<li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
</ul>
</div>
</div>

<div class="list-group">

</div>
