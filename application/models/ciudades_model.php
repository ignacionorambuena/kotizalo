<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ciudades_model extends CI_Model{

public function __construct()
{
parent::__construct();
}

public function provincias()
{
$this->db->order_by('nameReg','asc');
$provincia = $this->db->get('region');
if($provincia->num_rows()>0)
{
return $provincia->result();
}
}

public function localidades($provincia)
{
$this->db->where('idReg',$provincia);
$this->db->order_by('nameCom','asc');
$localidades = $this->db->get('comuna');
if($localidades->num_rows()>0)
{
return $localidades->result();
}
}
}
