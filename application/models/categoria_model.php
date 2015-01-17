<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categoria_model extends CI_Model {

public function construccion()
{
$this->db->where('idAct','1');
$construccion = $this->db->get('subactividad');
if($construccion->num_rows()>0)
{
return $construccion->result();
}
}

public function remodelacion()
{
$this->db->where('idAct','2');
$remodelacion = $this->db->get('subactividad');
if($remodelacion->num_rows()>0)
{
return $remodelacion->result();
}
}

public function mudanza()
{
$this->db->where('idAct','3');
$mudanza = $this->db->get('subactividad');
if($mudanza->num_rows()>0)
{
return $mudanza->result();
}
}

public function otros()
{
$this->db->where('idAct','4');
$otros = $this->db->get('subactividad');
if($otros->num_rows()>0)
{
return $otros->result();
}
}

}

/* End of file categoria_model.php */
/* Location: ./application/models/categoria_model.php */
