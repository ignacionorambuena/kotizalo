<br><br>
<div class="container">

<div class="row">
<div class="col-lg-offset-2 col-xs-8 col-sm-8 col-md-8 col-lg-8">
<h2 style="padding-top:0;margin-top:0;margin-left:-15px;"><i class="fa fa-shopping-cart"></i> Mis Compras</h2>

<div class="row">
<?php
foreach($cont as $cc)
{
if($cc -> Total != 0){
?>
<?php foreach ($compras as $key) { ?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 well well-sm">
<h4 style="padding-top:0;margin-top:0;padding-bottom:0px;margin-bottom:10px;font-size:20px;color:#f90;"><i><?php echo ucfirst($key -> titlePub); ?></i></h4>
<div class="row">
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
Presupuesto realizado el <b><?php echo $key-> datePub; ?></b> <br>
<a href=""><?php echo $key -> nameCom; ?></a> (<a href=""><?php echo $key -> nameReg; ?></a>)
en <b><?php echo $key -> nameSubAct; ?></b>
<br>
<?php echo $key -> descripcionPub; ?>
<br><br>
<a href="/publicacion/buscar/<?php echo url_title($key -> titlePub,"-",TRUE); ?>-<?php echo $key -> idPub; ?>"><?php echo url_title($key -> titlePub,"-",TRUE); ?></a>
</div>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
<div class="row">
<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
<img src="<?php echo "http://kotizalo.com/cl/".$key -> imgunoPub; ?> " alt="" class="img-thumbnail img-responsive">
</div>
<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
<?php if(!empty($key -> imgdosPub)) {?>
<img src="<?php echo "http://kotizalo.com/cl/".$key -> imgdosPub; ?> " alt="" class="img-thumbnail img-responsive">
<?php } ?>
</div>
<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
<?php if(!empty($key -> imgtresPub)) {?>
<img src="<?php echo "http://kotizalo.com/cl/".$key -> imgtresPub; ?> " alt="" class="img-thumbnail img-responsive">
<?php } ?>
</div>
</div>
<br>
<div class="text-right">
<a href="#" class="btn btn-block btn-warning" style="font-size:16px;">Reportar Incidencia</a>
<br>
<a href="#" class="btn btn-block btn-primary" style="font-size:16px;">enviar KOTIZACIÓN</a>
</div>

</div>
</div>

<br>
</div>

<?php
}
}
else{
?>
<h2 class="alert alert-info">Aún no realiza ninguna compra.</h2>
<?php
}
?>
<?php
}
?>


</div>

</div>
</div>
</div>
