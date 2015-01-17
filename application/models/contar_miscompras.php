<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contar_miscompras extends CI_Model {

public function contar($idEmp)
{
$this->db->select('count(*) as Total');
$this->db->where('idEmp',$idEmp);
$construccion = $this->db->get('unlock');
if($construccion->num_rows()>0)
{
return $construccion->result();
}
}

public function ver_compras($idEmp)
{
$this->db->where('unlock.idEmp',$idEmp);
$this->db->from('empresa');
$this->db->join('unlock', 'empresa.idEmp = unlock.idEmp');
$this->db->join('publicacion','unlock.idPub = publicacion.idPub');
$this->db->join('region','region.idReg = publicacion.regionPub');
$this->db->join('comuna','comuna.idCom = publicacion.comunaPub');
$this->db->join('actividad','actividad.idAct = publicacion.actividadPub');
$this->db->join('subactividad','subactividad.idSub = publicacion.subactividadPub');


$this->db->order_by('unlock.idPub','DESC');

$ver_compras = $this->db->get();
if($ver_compras->num_rows()>0)
{
return $ver_compras->result();
}
}

}

/* End of file contar_miscompras.php */
/* Location: ./application/models/contar_miscompras.php */
