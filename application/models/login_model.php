<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
function login($username, $password)
{
$this -> db -> select('idEmp, mailEnc, nameEmp, passEmp, saldoEmp');
$this -> db -> from('empresa');
$this -> db -> where('mailEnc', $username);
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




}
