<br><br><br><br>
<div class="container">
<div class="row">

<div class="col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6">
<div class="well well-sm row">
<?php
$atributos = array( 'id' => 'form','name'=>'form');
//echo form_open(null, $atributos);
echo form_open(null,$atributos);
?>
<legend><i class="fa fa-briefcase"></i> Actualizar Empresa <br></legend>

<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label for="">Rut Empresa</label>
<?php echo form_error('rutEmp',"<small class='text-danger'>","</small>"); ?>
<input type="text" name="rutEmp" id="input" class="form-control" value="<?php echo set_value('rutEmp');?>">
</div>

<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label for="">Nombre Empresa</label>
<?php echo form_error('nameEmp',"<small class='text-danger'>","</small>"); ?>
<input type="text" name="nameEmp" id="input" class="form-control" value="<?php echo set_value('nameEmp');?>">
</div>

<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
<label for="">Dirección Empresa</label>
<?php echo form_error('direccionEmp',"<small class='text-danger'>","</small>"); ?>
<input type="text" name="direccionEmp" id="input" class="form-control" value="<?php echo set_value('direccionEmp');?>">
</div>

<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
<label for="">Descripción Empresa</label>
<?php echo form_error('descripcionEmp',"<small class='text-danger'>","</small>"); ?>
<textarea name="descripcionEmp" id="" cols="30" class="form-control" rows="5"><?php echo set_value('descripcionEmp');?> </textarea>
</div>

<input type="hidden" name="aceptar" value="1">

<div class="form-group text-right">
<button type="submit" class="btn btn-primary">Actualizar</button>
</div>
<?php form_close(); ?>
</div>
</div><!-- FIN COL  -->

</div>
</div>



