<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ciudades extends CI_Controller
{
public function __construct()
{
parent::__construct();
$this->load->model('ciudades_model');
}

public function index()
{
$data['provincias'] = $this->ciudades_model->provincias();
$this->load->view('ciudades_view',$data);
}

public function llena_localidades()
{
$options = "";
if($this->input->post('provincia'))
{
$provincia = $this->input->post('provincia');
$localidades = $this->ciudades_model->localidades($provincia);
foreach($localidades as $fila)
{
?>
<option value="<?=$fila -> idCom ?>"><?=$fila -> nameCom ?></option>
<?php
}
}
}
}
