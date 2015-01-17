<br><br>
<div class="container">

<div class="row">
<div class="col-lg-offset-2 col-xs-8 col-sm-8 col-md-8 col-lg-8">
<h2 style="padding-top:0;margin-top:0;margin-left:-15px;"><i class="fa fa-shopping-cart"></i> Mis Compras</h2>

<div class="row">
<?php
foreach($cont as $cc)
{
if($cc->Total != 0){
?>
<?php foreach ($compras as $key) {

$date = new DateTime($key->datePub);
$titulo=url_title($key->titlePub);
?>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="well">
<div class="row">
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
<b style="font-size:19px;"><a href="<?php echo base_url('/publicacion/'.$key->idPub.'/'.$titulo);?>" style="color:#f90;"> <?php echo substr(ucfirst($key->titlePub),0,50); ?></a></b><br>
Presupuesto realizado el <b><?php echo $date->format('d-m-Y'); ?></b><br>
<a href=""><?php echo $key -> nameCom; ?></a> (<a href=""><?php echo $key -> nameReg; ?></a>)<br>
en <b><?php echo $key -> nameSubAct; ?></b><br><br>
<p class="text-justify"><?php echo $key -> descripcionPub; ?></p>



</div>

<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center">
<center>
<img src="<?php echo "http://kotizalo.com/cl/".$key->imgunoPub; ?> " alt="" class="img-thumbnail">
</center>
<div class="btn-group btn-group-sm" role="group" aria-label="...">
<button href="#" class="btn btn-warning" style="font-size:16px;"><i class="fa fa-comment"></i> Reportar Incidencia</button>
<button href="#" class="btn btn-primary" style="font-size:16px;"><i class="fa fa-thumbs-o-up"></i> Kotizalo</button>

</div>
</div>


</div>
</div>
</div>
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
