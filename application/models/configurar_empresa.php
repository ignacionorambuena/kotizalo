<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// MODELO CONFIGURAR EMPRESA

class Configurar_empresa extends CI_Model {

public function configuracion($idEmp)
{
$this->db->where('idEmp',$idEmp);
$this->db->from('empresa');
$this->db->join('region', 'empresa.regionEmp = region.idReg');
$this->db->join('comuna', 'empresa.comunaEmp = comuna.idCom');
$this->db->join('subactividad', 'empresa.subactividadEmp = subactividad.idSub');


$empresa = $this->db->get();
if($empresa->num_rows()>0)
{
return $empresa->result();
}
}

function check_pass($idEmp, $password)
{
$this -> db -> select('*');
$this -> db -> from('empresa');
$this -> db -> where('idEmp', $idEmp);
$this -> db -> where('passEmp', MD5($password));
$this -> db -> limit(1);

$query = $this -> db -> get();

if($query -> num_rows() == 1)
{
return $query->result();
}
else
{
return false;
}
}


public function actualizar_contrasena($idEmp,$actual,$nueva)
{
$data = array(
'passEmp'=>md5($nueva)
);

$this->db->where('idEmp', $idEmp);
return $this->db->update('empresa', $data);

}



public function actualizar_empresa($idEmp,$nameEmp, $phoneEnc, $direccionEmp, $descripcionEmp, $nameEnc, $mailEnc, $rubro, $actividad)
{
$data = array(
'nameEmp'=>$nameEmp,
'phoneEnc'=>$phoneEnc,
'direccionEmp'=>$direccionEmp,
'descripcionEmp'=>$descripcionEmp,
'nameEnc'=>$nameEnc,
'mailEnc'=>$mailEnc,
'subactividadEmp' => $rubro,
'actividadEmp' => $actividad
);
$this->db->where('idEmp', $idEmp);
return $this->db->update('empresa', $data);
}

public function nuevaempresa($idEmp,$nameEmp,$rutEmp,$direccionEmp,$descripcionEmp)
{
$data = array(
'nameEmp' => $nameEmp,
'rutEmp' => $rutEmp,
'direccionEmp' => $direccionEmp,
'descripcionEmp' => $descripcionEmp
);
$this->db->where('idEmp', $idEmp);
return $this->db->update('empresa', $data);
}

public function registra_epresa($encargado,$mail,$phone,$pass,$rubro,$provincia,$localidad,$actividad)
{

$data = array(
'idEmp'=>'NULL',
'nameEnc' => $encargado,
'mailEnc' => $mail,
'phoneEnc' => $phone,
'nameEmp' => "",
'rutEmp' => "",
'direccionEmp' => "",
'regionEmp' => $provincia,
'comunaEmp' => $localidad,
'actividadEmp' => $actividad,
'subactividadEmp' => $rubro,
'tipoEmp'=>"",
'statEmp'=>"0",
'descripcionEmp' => "",
'passEmp' => $pass,
'saldoEmp' => "0"
);
return $this->db->insert('empresa', $data);

}

public function get_categoria($rubro)
{
$this->db->where('idSub',$rubro);
$actividad = $this->db->get('subactividad');
if($actividad->num_rows()>0)
{
foreach ($actividad->result() as $row)
{
return $row->idAct;
}
}
}

public function verficar_pass($idEmp,$actual)
{
if(isset($_POST['aceptar']) and $_POST['aceptar'] == 1)
{
$this->db->where('idEmp',$idEmp);
$this->db->where('passEmp', $actual);
$existe = $this->db->get('empresa');

$query = $this->db->where('rutEmp',$rut)->limit(1)->get('empresa');
if($query->num_rows() == 1){
return false;
}else{
return true;
}
}//FIN POST
}

public function actualizar_ubicacion($idEmp,$provincia,$localidad)
{
$data = array(
'regionEmp'=>$provincia,
'comunaEmp'=>$localidad,
);
$this->db->where('idEmp', $idEmp);
return $this->db->update('empresa', $data);
}

public function existeRut($rut)
{
$query = $this->db->where('rutEmp',$rut)->limit(1)->get('empresa');
if($query->num_rows() == 1){
return false;
}else{
return true;
}
}


}

/* End of file contar_miscompras.php */
/* Location: ./application/models/contar_miscompras.php */
