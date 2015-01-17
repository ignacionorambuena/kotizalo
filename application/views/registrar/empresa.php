<br><br><br><br>
<style>
body{
background:url('<?php echo base_url('img/slide/img3.jpg'); ?>') no-repeat;
background-size: cover;


}

</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
$("#provincia").change(function() {
$("#provincia option:selected").each(function() {
provincia = $('#provincia').val();
$.post("llena_localidades", {
provincia : provincia
}, function(data) {
$("#localidad").html(data);
});
});
})
});
</script>
<div class="container" >
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 text-center">
<h1 style="text-shadow:0px 2px 2px #000; color:#fff;padding-top:0;margin-top:0;font-size:70px;">¿Te gustaría generar mas ingresos en tu negocio o empresa?<br><br> <i class="fa fa-line-chart fa-3x"></i></h1>

</div><!--col 8-->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
<div class="well">
<!-- <legend>¡Registra tu empresa ahora!</legend> -->
<?php
$atributos = array( 'id' => 'form','name'=>'form');
//echo form_open(null, $atributos);
echo form_open(null,$atributos);
?>
<div class="form-group">
<label for=""><i class="fa fa-user"></i> Nombre de Encargado</label>
<?php echo form_error('encargado',"<small class='text-danger'>","</small>"); ?>
<input type="text" name="encargado" id="input" class="form-control input-sm"  title="Por favor ingrese el nombre del encargado de la empresa." value="<?php echo set_value('encargado') ?>">
</div>
<div class="form-group">
<label for=""><i class="fa fa-envelope"></i> Correo Electrónico</label>
<?php echo form_error('mail',"<small class='text-danger'>","</small>"); ?>
<input type="email" name="mail" id="input" class="form-control input-sm"  title="Debe ingresar un correo electrónico válido." value="<?php echo set_value('mail') ?>">
</div>
<div class="form-group">
<label for=""><i class="fa fa-phone"></i> Teléfono de Contacto</label>
<?php echo form_error('phone',"<small class='text-danger'>","</small>"); ?>
<input type="text" name="phone" id="input" class="form-control input-sm"  pattern="[0-9]+" title="Solo ingresa numeros" value="<?php echo set_value('phone') ?>">
</div>
<div class="row">
<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label for=""><i class="fa fa-map-marker"></i> Región</label>
<?php echo form_error('provincia',"<small class='text-danger'>","</small>"); ?>
<select name="provincia" id="provincia" class="form-control input-sm">
<option value="">Seleccione una región</option>
<?php
foreach($provincias as $fila)
{
?>
<option value="<?=$fila -> idReg ?>"><?=$fila -> nameReg ?></option>
<?php
}
?>
</select>
</div>

<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label for="">Comuna</label>
<?php echo form_error('localidad',"<small class='text-danger'>","</small>"); ?>
<select name="localidad" id="localidad" class="form-control input-sm">
<?php echo form_error('localidad',"<small class='text-danger'>","</small>"); ?>
<option value=""><< Debe seleccionar una región</option>
</select>
</div>
</div>
<div class="form-group">
<label for=""><i class="fa fa-group"></i> ¿Cuál es el rubro de tu empresa?</label>
<?php echo form_error('rubro',"<small class='text-danger'>","</small>"); ?>
<select class="form-control input-sm" id="rubro" name="rubro" value="<?php echo set_value('rubro') ?>">
<option value="">Seleccione un rubro</option>
<optgroup label="Construcci&oacute;n">
<?php
foreach($construccion as $cc)
{
?>
<option value="<?=$cc -> idSub ?>" <?php echo set_select('rubro', $cc->idSub); ?>><?=$cc -> nameSubAct ?></option>
<?php
}
?>
</optgroup>
<optgroup label="Remodelaci&oacute;n">
<?php
foreach($remodelacion as $rr)
{
?>
<option value="<?=$rr -> idSub ?>" <?php echo set_select('rubro', $rr->idSub); ?>><?=$rr -> nameSubAct ?></option>
<?php
}
?>
</optgroup>
<optgroup label="Mudanza">
<?php
foreach($mudanza as $mm)
{
?>
<option value="<?=$mm -> idSub ?>" <?php echo set_select('rubro', $mm->idSub); ?>><?=$mm -> nameSubAct ?></option>
<?php
}
?>
</optgroup>
<optgroup label="Otros">
<?php
foreach($otros as $oo)
{
?>
<option value="<?=$oo -> idSub ?>" <?php echo set_select('rubro', $oo->idSub); ?>><?=$oo -> nameSubAct ?></option>
<?php
}
?>
</optgroup>
</select>
</div>
<div class="form-group">
<label for=""><i class="fa fa-key"></i> Escribe una contraseña</label>
<?php echo form_error('pass',"<small class='text-danger'>","</small>"); ?>
<input type="password" name="pass" id="input" class="form-control input-sm" value="" >
</div>
<div class="checkbox">
<label>
<input type="checkbox" name="aceptar" value="1" required >
Aceptar condiciones de uso. (<a href="documento/terminos_y_condiciones.pdf" target="_blank">Leer Terminos y Consiciones</a>) </label>
</div>

<div class="form-gropu text-right">
<button type="submit" class="btn btn-danger">¡Comenzar Ahora!</button>

</div>
<?php form_close(); ?>
</div>
</div><!--col4-->


</div><!--Row-->
</div><!--Container-->
