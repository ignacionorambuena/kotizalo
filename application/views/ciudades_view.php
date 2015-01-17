<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

</head>
<body>
<select name="provincia" id="provincia">
<?php
foreach($provincias as $fila)
{
?>
<option value="<?=$fila -> idReg ?>"><?=$fila -> nameReg ?></option>
<?php
}
?>
</select>

<select name="localidad" id="localidad">
<option value="">Selecciona tu provincía</option>
</select>
</body>
</html>
