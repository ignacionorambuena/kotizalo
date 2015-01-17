<br><br>
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
<div class="container">
<div class="row">
<div class="col-lg-offset-2 col-xs-8 col-sm-8 col-md-8 col-lg-8">

<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-cogs"></i> Configurar Empresa</h3>
</div>
<div class="panel-body">
<div class="row">
<?php foreach ($datosEmpresa as $key) { ?>
<?php
$atributos = array( 'id' => 'form','name'=>'form');
//echo form_open(null, $atributos);
echo form_open(null,$atributos);
?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h4><i class="fa fa-building"></i> Datos Empresa</h4>
</div>
<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label for="">Nombre Empresa</label>
<input type="text" name="nameEmp" class="form-control input-sm" value="<?php echo $key-> nameEmp; ?>">
</div>
<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label for="">Rut Empresa</label>
<input type="text" name="rutEmp" class="form-control input-sm" value="<?php echo $key-> rutEmp; ?>" disabled>
</div>

<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label for="">Region</label> <small><a href="/empresa/ubicacion">Cambiar Región</a></small>
<input type="text" class="form-control input-sm" value="<?php echo $key-> nameReg; ?>" disabled>
</div>

<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label for="">Comuna</label> <small><a href="/empresa/ubicacion">Cambiar Comuna</a></small>
<input type="text" class="form-control input-sm" value="<?php echo $key-> nameCom; ?>" disabled>
</div>

<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
<label for=""><i class="fa fa-group"></i> Rubro Empresa</label>
<select class="form-control input-sm" id="rubro" name="rubro" value="<?php echo set_value('rubro') ?>">
<option value="">Seleccione un rubro</option>
<optgroup label="Construcci&oacute;n">
<?php
foreach($construccion as $cc)
{
?>
<option value="<?=$cc -> idSub ?>" <?php echo set_select('rubro', $cc->idSub); ?> <?php if($key-> nameSubAct==$cc -> nameSubAct){ echo "selected";} ?>><?=$cc -> nameSubAct ?></option>
<?php
}
?>
</optgroup>
<optgroup label="Remodelaci&oacute;n">
<?php
foreach($remodelacion as $rr)
{
?>
<option value="<?=$rr -> idSub ?>" <?php echo set_select('rubro', $rr->idSub); ?> <?php if($key-> nameSubAct==$rr -> nameSubAct){ echo "selected";} ?>><?=$rr -> nameSubAct ?></option>
<?php
}
?>
</optgroup>
<optgroup label="Mudanza">
<?php
foreach($mudanza as $mm)
{
?>
<option value="<?=$mm -> idSub ?>" <?php echo set_select('rubro', $mm->idSub); ?> <?php if($key-> nameSubAct==$mm -> nameSubAct){ echo "selected";} ?>><?=$mm -> nameSubAct ?></option>
<?php
}
?>
</optgroup>
<optgroup label="Otros">
<?php
foreach($otros as $oo)
{
?>
<option value="<?=$oo -> idSub ?>" <?php echo set_select('rubro', $oo->idSub); ?> <?php if($key-> nameSubAct==$oo -> nameSubAct){ echo "selected";} ?>><?=$oo -> nameSubAct ?></option>
<?php
}
?>
</optgroup>
</select>
</div>

<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label for="">Teléfono de Empresa</label>
<input type="text" name="phoneEnc" id="input" class="form-control input-sm" value="<?php echo $key-> phoneEnc; ?>">
</div>

<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label for="">Direccion Empresa</label>
<input type="text" name="direccionEmp" id="input" class="form-control input-sm" value="<?php echo $key-> direccionEmp; ?>">
</div>

<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
<label for="">Descripción Empresa</label>
<textarea name="descripcionEmp" id="" cols="10" rows="3" class="form-control input-sm"><?php echo $key-> descripcionEmp; ?></textarea>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h4><i class="fa fa-user"></i> Datos Encargado</h4>
</div>


<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label for="">Nombre</label>
<input type="text" name="nameEnc" id="input" class="form-control input-sm" value="<?php echo $key-> nameEnc; ?>">
</div>

<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label for="">Correo Electrónico</label>
<input type="text" name="mailEnc" id="input" class="form-control input-sm" value="<?php echo $key-> mailEnc; ?>">
<input type="hidden" name="actualizarempresa" value="1">
</div>

<div class="form-group text-right col-xs-12 col-sm-12 col-md-12 col-lg-12">
<button type="submit" class="btn btn-primary">Actualizar</button>
</div>

<?php form_close(); ?>
<?php } //fin Foreach ?>
</div>
</div> <!-- FINROW -->
</div><!-- FINPANEL -->
</div><!-- FINCOL7 -->


</div>
</div>


