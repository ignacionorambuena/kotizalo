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
<div class="col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg6">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-map-marker"></i> Ubicación Empresa</h3>
</div>
<div class="panel-body">
<div class="row">

<form action="/empresa/update_ubicacion" method="post">
<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label for="">Región</label>
<select name="provincia" id="provincia" class="form-control" required>
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
<select name="localidad" id="localidad" class="form-control" required>
<option value="">Selecciona una región</option>
</select>
</div>

<div class="form-group text-right col-lg-12">
<button type="submit" class="btn btn-primary">Actualizar</button>
</div>
<?php
//si se hace la actualización mostramos el mensaje que contiene
//la sesión flashdata actualizado que hemos creado en el controlado
$actualizar = $this->session->flashdata('actualizado');
if ($actualizar) {
?>
<tr>
<td colspan="5" id="actualizadoCorrectamente"><?= $actualizar ?></td>
</tr>
<?php
}
?>
</form>

</div>
</div> <!-- FINROW -->
</div><!-- FINPANEL -->
</div><!-- FINCOL8 -->


</div>
</div>


