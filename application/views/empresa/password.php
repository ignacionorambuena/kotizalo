<br><br>
<div class="container">
<div class="row">

<div class="col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-key"></i> Actualizar Contraseña</h3>
</div>
<div class="panel-body">
<?php
$atributos = array( 'id' => 'form','name'=>'form');
echo form_open(null,$atributos);
?>

<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label for="">Contraseña Actual</label>

<input type="password" name="antigua" id="input" class="form-control">
</div>

<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label for="">Nueva Contraseña</label>

<input type="password" name="nueva" id="input" class="form-control">
</div>

<input type="hidden" name="aceptar" value="1">

<div class="form-group text-right">
<button type="submit" class="btn btn-primary">Actualizar</button>
</div>

<?php
$msj=validation_errors();
if(!empty($msj)) {
?>
<div class="alert alert-warning"><?php echo $msj; ?></div>
<?php
}
?>

<?php form_close(); ?>


</div>
</div><!-- FIN PANEL -->
</div><!-- FIN COL  -->

</div>
</div>



