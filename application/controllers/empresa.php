<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Empresa extends CI_Controller {

function __construct()
{
parent::__construct();
$this->load->model(array('contar_miscompras','configurar_empresa','ciudades_model','categoria_model'));
}

function index()
{
if($this->session->userdata('logged_in'))
{
$session_data = $this->session->userdata('logged_in');

$idEmp=$session_data['idEmp'];

$verName=$session_data['nameEmp'];

$data = array(
'idEmp' => $session_data['idEmp'],
'saldoEmp' => $session_data['saldoEmp'],
'nameEmp' => $session_data['nameEmp'],
'cont' => $this->contar_miscompras->contar($idEmp)
);


if(isset($_POST['aceptar']) and $_POST['aceptar'] == 1)
{
$this->form_validation->set_rules('nameEmp','nameEmp','required|trim|xss_clean');
$this->form_validation->set_rules('rutEmp','Rut','trim|required|callback_validaRut|callback_existeRut|xss_clean');
$this->form_validation->set_rules('direccionEmp','direccionEmp','required|trim|xss_clean');
$this->form_validation->set_rules('descripcionEmp','descripcionEmp','required|trim|xss_clean');
$this->form_validation->set_message('validaRut','%s incorrecto');
$this->form_validation->set_message('existeRut','%s ya está registrado');


if($this->form_validation->run())
{
$nameEmp = $this->input->post('nameEmp');
$rutEmp = $this->input->post('rutEmp');
$direccionEmp = $this->input->post('direccionEmp');
$descripcionEmp = $this->input->post('descripcionEmp');

$nuevaempresa = $this->configurar_empresa->nuevaempresa($idEmp,$nameEmp,$rutEmp,$direccionEmp,$descripcionEmp);

if($nuevaempresa)
{
$sess_array = array();
$sess_array = array(
'idEmp' => $session_data['idEmp'],
'mailEnc' => $session_data['mailEnc'],
'nameEmp' => $nameEmp,
'saldoEmp' => $session_data['saldoEmp']
);
$this->session->set_userdata('logged_in', $sess_array);
echo "<script>alert('Acaba de agregar sus datos. Estamos listos para comenzar!');window.location='/empresa';</script>";

}
}


}



if($verName=="<i class='fa fa-warning'></i>" or $verName==""){
$this->load->view('empresa/header', $data);
$this->load->view('empresa/nuevaempresa',$data);
$this->load->view('empresa/footer');
}
else {

$this->load->view('empresa/header', $data);

$this->load->view('empresa/home',$data);
$this->load->view('empresa/footer');
}
}
else
{
//If no session, redirect to login page
redirect('login', 'refresh');
}
}

public function configurar(){
if($this->session->userdata('logged_in'))
{
$session_data = $this->session->userdata('logged_in');
$idEmp=$session_data['idEmp'];
$data = array(
'idEmp' => $session_data['idEmp'],
'saldoEmp' => $session_data['saldoEmp'],
'nameEmp' => $session_data['nameEmp'],
'datosEmpresa' => $this->configurar_empresa->configuracion($idEmp),
'construccion' => $this->categoria_model->construccion(),
'remodelacion' => $this->categoria_model->remodelacion(),
'mudanza' => $this->categoria_model->mudanza(),
'otros' => $this->categoria_model->otros(),
'cont' => $this->contar_miscompras->contar($idEmp)
);

if(isset($_POST['actualizarempresa']) and $_POST['actualizarempresa'] == 1)
{
// FUNCION PARA ACTUALIZAR
$nameEmp = $this->input->post('nameEmp');
$phoneEnc = $this->input->post('phoneEnc');
$direccionEmp= $this->input->post('direccionEmp');
$descripcionEmp = $this->input->post('descripcionEmp');
$nameEnc = $this->input->post('nameEnc');
$mailEnc = $this->input->post('mailEnc');

$rubro = $this->input->post('rubro');
$actividad =  $this->configurar_empresa->get_categoria($rubro);



//-------------------NOMBRE MODELO-------FUNCION DE MODELO ---(REFERENCIAS);
$up = $this->configurar_empresa->actualizar_empresa($idEmp,$nameEmp, $phoneEnc, $direccionEmp, $descripcionEmp, $nameEnc, $mailEnc, $rubro, $actividad);
//si la actualización ha sido correcta creamos una sesión flashdata para decirlo
if($up)
{
echo "<script>alert('Datos actualizados de manera correcta');window.location='/empresa/configurar';</script>";
}
}

$this->load->view('empresa/header',$data);
$this->load->view('empresa/configurar',$data);
$this->load->view('empresa/footer');
}

}

public function ubicacion()
{
if($this->session->userdata('logged_in'))
{
$session_data = $this->session->userdata('logged_in');

$idEmp=$session_data['idEmp'];
$data = array(
'idEmp' => $session_data['idEmp'],
'saldoEmp' => $session_data['saldoEmp'],
'nameEmp' => $session_data['nameEmp'],
'datosEmpresa' => $this->configurar_empresa->configuracion($idEmp),
'provincias' => $this->ciudades_model->provincias(),
'cont' => $this->contar_miscompras->contar($idEmp)
);

$this->load->view('empresa/header',$data);
$this->load->view('empresa/ubicacion',$data);
$this->load->view('empresa/footer');

}
}

public function update_ubicacion()
{
if($this->session->userdata('logged_in'))
{
$session_data = $this->session->userdata('logged_in');

$idEmp=$session_data['idEmp'];
// FUNCION PARA ACTUALIZAR
$provincia = $this->input->post('provincia');//RECIBIDO
$localidad = $this->input->post('localidad');//RECIBIDO

//-------------------NOMBRE MODELO-------FUNCION DE MODELO ---(REFERENCIAS);
$actualizar = $this->configurar_empresa->actualizar_ubicacion($idEmp,$provincia,$localidad);
//si la actualización ha sido correcta creamos una sesión flashdata para decirlo
if($actualizar)
{
echo "<script>alert('Ubicacion actualizada.');window.location='/empresa/configurar';</script>";

}
}
}


public function password()
{
if($this->session->userdata('logged_in'))
{
$session_data = $this->session->userdata('logged_in');

$idEmp=$session_data['idEmp'];
$data = array(
'idEmp' => $session_data['idEmp'],
'saldoEmp' => $session_data['saldoEmp'],
'nameEmp' => $session_data['nameEmp'],
'datosEmpresa' => $this->configurar_empresa->configuracion($idEmp),
'provincias' => $this->ciudades_model->provincias(),
'cont' => $this->contar_miscompras->contar($idEmp)
);


if(isset($_POST['aceptar']) and $_POST['aceptar'] == 1)
{
$this->form_validation->set_rules('antigua', 'Contraseña Antigua', 'trim|required|xss_clean|callback_check_pass');
$this->form_validation->set_rules('nueva', 'Contraseña Nueva', 'trim|required|min_length[4]|xss_clean');

$this->form_validation->set_message('required', 'Por favor ingrese %s.');
$this->form_validation->set_message('min_length', 'La %s debe ser mayor a 4 caracteres.');

if($this->form_validation->run() == FALSE)
{
//Field validation failed.  User redirected to login page
$this->load->view('empresa/header',$data);
$this->load->view('empresa/password',$data);
$this->load->view('empresa/footer');
}
else
{
//Actualiza la contraseña
$actual = $this->input->post('antigua');
$nueva = $this->input->post('nueva');
$actualizar = $this->configurar_empresa->actualizar_contrasena($idEmp,$actual,$nueva);
//si la actualización ha sido correcta creamos una sesión flashdata para decirlo
if($actualizar)
{
echo "<script>alert('Contrasena actualizada.');window.location='/empresa/password';</script>";

}

}
}//FIN IF POST
else{
$this->load->view('empresa/header',$data);
$this->load->view('empresa/password',$data);
$this->load->view('empresa/footer');
}
}
}

function check_pass($password)
{
if($this->session->userdata('logged_in'))
{
$session_data = $this->session->userdata('logged_in');

$idEmp=$session_data['idEmp'];
$data = array(
'idEmp' => $session_data['idEmp'],
'saldoEmp' => $session_data['saldoEmp'],
'nameEmp' => $session_data['nameEmp'],
'datosEmpresa' => $this->configurar_empresa->configuracion($idEmp),
'provincias' => $this->ciudades_model->provincias(),
'cont' => $this->contar_miscompras->contar($idEmp)
);
//Field validation succeeded.  Validate against database
$idEmp= $session_data['idEmp'];
//query the database
$result = $this->configurar_empresa->check_pass($idEmp, $password);
if($result)
{
return TRUE;
}
else
{
$this->form_validation->set_message('check_pass', 'Contraseña actual no coincide con nuestro registro.');
return false;
}
}
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

function logout()
{
$this->session->unset_userdata('logged_in');
session_destroy();
redirect('login', 'refresh');
}



//*********************************************************
//VALIDADORES
//*********************************************************
function validaRut(){
$rut = $this->input->post('rutEmp');
if(strlen($rut) > 10){
return false;
}
if(strpos($rut, '-') === false){
return false;
}
$array_rut_sin_guion = explode('-',$rut); // separamos el la cadena del digito verificador.
$rut_sin_guion = $array_rut_sin_guion[0]; // la primera cadena
$digito_verificador = $array_rut_sin_guion[1];// el digito despues del guion.
if(is_numeric($rut_sin_guion)== false){
return false;
}
if ($digito_verificador != 'k' and $digito_verificador != 'K'){
if(is_numeric($digito_verificador)== false){
return false;
}
}
$cantidad = strlen($rut_sin_guion); //8 o 7 elementos
for ( $i = 0; $i < $cantidad; $i++){//pasamos el rut sin guion a un vector
$rut_array[$i] = $rut_sin_guion{$i};
}
$i = ($cantidad-1);
$x=$i;
for ($ib = 0; $ib < $cantidad; $ib++){// ingresamos los elementos del ventor rut_array en otro vector pero al reves.
$rut_reverse[$ib]= $rut_array[$i];
$rut_reverse[$ib];
$i=$i-1;
}
$i=2;
$ib=0;
$acum=0;
do{
if( $i > 7 ){
$i=2;
}
$acum = $acum + ($rut_reverse[$ib]*$i);
$i++;
$ib++;
}while ( $ib <= $x);
$resto = $acum%11;
$resultado = 11-$resto;
if($resultado == 11) { $resultado=0; }
if($resultado == 10) { $resultado='k'; }
if($digito_verificador == 'k' or $digito_verificador =='K') { $digito_verificador='k';}
if ($resultado == $digito_verificador){ return true; }else{ return false;}
}

function existeRut(){
$rut = $this->input->post('rutEmp');
return $this->configurar_empresa->existeRut($rut);

}

public function recargar()
{
if($this->session->userdata('logged_in'))
{
$session_data = $this->session->userdata('logged_in');

$idEmp=$session_data['idEmp'];

$verName=$session_data['nameEmp'];

$data = array(
'idEmp' => $session_data['idEmp'],
'saldoEmp' => $session_data['saldoEmp'],
'nameEmp' => $session_data['nameEmp'],
'cont' => $this->contar_miscompras->contar($idEmp)
);

$this->load->view('empresa/header', $data);
$this->load->view('empresa/recargar');
$this->load->view('empresa/footer');

}
}


public function compras()
{
if($this->session->userdata('logged_in'))
{
$session_data = $this->session->userdata('logged_in');

$idEmp=$session_data['idEmp'];

$verName=$session_data['nameEmp'];

$data = array(
'idEmp' => $session_data['idEmp'],
'saldoEmp' => $session_data['saldoEmp'],
'nameEmp' => $session_data['nameEmp'],
'cont' => $this->contar_miscompras->contar($idEmp),
'compras' => $this->contar_miscompras->ver_compras($idEmp),
);

$this->load->view('empresa/header', $data);
$this->load->view('empresa/compras', $data);
$this->load->view('empresa/footer');

}
}


}

?>
