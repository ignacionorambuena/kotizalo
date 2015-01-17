<br><br><br><br><br>
<div class="container">
<div class="row">
<div class="col-lg-offset-4 col-xs-4 col-sm-4 col-md-4 col-lg-4 well">
<?php echo form_open('verifylogin'); ?>
<legend>Ingreso Usuarios</legend>
<div class="form-group">
<label for="username">Correo Electrónico</label>
<input type="text" size="20" id="username" class="form-control input-sm" name="username" autofocus value="<?php echo set_value('username'); ?>" />
</div>
<div class="form-group">
<label for="password">Contraseña</label>
<input type="password" size="20" id="passowrd" class="form-control input-sm" name="password"/>
</div>
<div class="form-group text-right">
<button type="submit" class="btn btn-primary">Ingresar</button>
</div>
<?php echo validation_errors(); ?>
<center>
¿Aún no estas registrado? <br>No pierdas clientes y <a href="/registrar/empresa">Registrate ahora</a>
</center>
</div>

</div>
</div>
