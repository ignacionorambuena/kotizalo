<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Registrar extends CI_Controller {


public function __construct()
{
parent::__construct();
$this->load->model(array('categoria_model','configurar_empresa','ciudades_model'));
}

public function index()
{
redirect('registrar/empresa');
}

public function empresa(){
if(isset($_POST['aceptar']) and $_POST['aceptar'] == 1)
{
//SI EXISTE EL CAMPO OCULTO LLAMADO GRABAR CREAMOS LAS VALIDACIONES
$this->form_validation->set_rules('encargado','Nombre del Encargado','required|trim|xss_clean');
$this->form_validation->set_rules('mail','Correo Electrónico','required|valid_email|trim|xss_clean|is_unique[empresa.mailEnc]');
$this->form_validation->set_rules('phone','Teléfono','required|trim|xss_clean');
$this->form_validation->set_rules('pass','Contraseña','required|trim|xss_clean|md5');
$this->form_validation->set_rules('rubro','Rubro','required|trim|xss_clean');
$this->form_validation->set_rules('provincia','Provincia','required|trim|xss_clean');
$this->form_validation->set_rules('localidad','Localidad','required|trim|xss_clean');

$this->form_validation->set_message('required', 'Campo requerido');
$this->form_validation->set_message('valid_email', '%s no es válido');

$rubro = $this->input->post('rubro');
$actividad =  $this->configurar_empresa->get_categoria($rubro);


if($this->form_validation->run())
{
//EN CASO CONTRARIO PROCESAMOS LOS DATOS
$encargado = $this->input->post('encargado');
$mail = $this->input->post('mail');
$phone = $this->input->post('phone');
$pass = $this->input->post('pass');
$rubro = $this->input->post('rubro');
$provincia = $this->input->post('provincia');
$localidad = $this->input->post('localidad');



//ENVÍAMOS LOS DATOS AL MODELO CON LA SIGUIENTE LÍNEA
$insert = $this->configurar_empresa->registra_epresa($encargado,$mail,$phone,$pass,$rubro,$provincia,$localidad,$actividad);
//si el modelo nos responde afirmando que todo ha ido bien, envíamos un mail
//al usuario y lo redirigimos al index, en verdad deberíamos redirigirlo al home de
//nuestra web para que puediera iniciar sesión
$this->email->from($mail, 'Kotizalo');
$this->email->to($mail);
//super importante, para poder envíar html en nuestros correos debemos ir a la carpeta
//system/libraries/Email.php y en la línea 42 modificar el valor, en vez de text debemos poner html
$this->email->subject('Bienvenido a Kotizalo');
$codigohtml='
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>[SUBJECT]</title>
<style type="text/css">

#outlook a {padding:0;}
body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
.ExternalClass {width:100%;}
.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;}
#backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;}
a img {border:none;}
.image_fix {display:block;}
p {margin: 1em 0;}
h1, h2, h3, h4, h5, h6 {color: black !important;}

h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color: blue !important;}

h1 a:active, h2 a:active,  h3 a:active, h4 a:active, h5 a:active, h6 a:active {
color: red !important;
}

h1 a:visited, h2 a:visited,  h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited {
color: purple !important;
}

table td {border-collapse: collapse;}

table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }

a {color: #000;}

@media only screen and (max-device-width: 480px) {

a[href^="tel"], a[href^="sms"] {
text-decoration: none;
color: black; /* or whatever your want */
pointer-events: none;
cursor: default;
}

.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
text-decoration: default;
color: orange !important; /* or whatever your want */
pointer-events: auto;
cursor: default;
}
}


@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
a[href^="tel"], a[href^="sms"] {
text-decoration: none;
color: blue; /* or whatever your want */
pointer-events: none;
cursor: default;
}

.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
text-decoration: default;
color: orange !important;
pointer-events: auto;
cursor: default;
}
}

@media only screen and (-webkit-min-device-pixel-ratio: 2) {
/* Put your iPhone 4g styles in here */
}

@media only screen and (-webkit-device-pixel-ratio:.75){
/* Put CSS for low density (ldpi) Android layouts in here */
}
@media only screen and (-webkit-device-pixel-ratio:1){
/* Put CSS for medium density (mdpi) Android layouts in here */
}
@media only screen and (-webkit-device-pixel-ratio:1.5){
/* Put CSS for high density (hdpi) Android layouts in here */
}
/* end Android targeting */
</style>

</head>
<body>
<!-- Wrapper/Container Table: Use a wrapper table to control the width and the background color consistently of your email. Use this approach instead of setting attributes on the body tag. -->
<table cellpadding="0" width="100%" cellspacing="0" border="0" id="backgroundTable" bgcolor="#ffffff">
<tr>
<td>

<!-- Tables are the most common way to format your email consistently. Set your table widths inside cells and in most cases reset cellpadding, cellspacing, and border to zero. Use nested tables as a way to space effectively in your message. -->
<table cellpadding="0" cellspacing="0" border="0" align="center" width="600">
<tr height="40">
<td width="200">&nbsp;</td>
</tr>
<tr>
<td width="200" valign="top">&nbsp;</td>
<td width="200" valign="top" align="center">
<div class="contentEditableContainer contentTextEditable">
<div class="contentEditable" >
<img src="http://www.kotizalo.com/new/img/logo.png" width="160" height="auto" alt="Logo"  data-default="placeholder" />
</div>
</div>
</td>
<td width="200" valign="top">&nbsp;</td>
</tr>
<tr height="10">
<td width="200">&nbsp;</td>
</tr>
</table>

<table cellpadding="0" cellspacing="0" border="0" align="center" width="600">
<tr>
<td width="100%" colspan="3" align="center" style="padding-bottom:10px;padding-top:15px;">
<div class="contentEditableContainer contentTextEditable">
<div class="contentEditable" style="color:#181818;font-family:Helvetica, Arial, sans-serif;font-size:22px;">
<span>Bienvenid@ '.ucwords(strtolower($encargado)).'</span>
</div>
</div>
</td>
</tr>
<tr>
<td width="100">&nbsp;</td>
<td width="400" align="center" style="padding-bottom:0px;">
<div class="contentEditableContainer contentTextEditable">
<div class="contentEditable" style="color:#555;font-family:Helvetica, Arial, sans-serif;font-size:16px;line-height:160%;">
<p >Gracias por registrarse en nuestro sitio web, esperamos resolver sus necesidades de manera Rápida, Simple y Confiable.</p><br>
<p >Su registro esta siendo revisado por nuestro equipo de trabajo, si esta todo correcto, quedará aprobado en menos de 5min. de lo contrario sera contactado para actualizar sus datos a la brevedad.</p>
<p> Le recordamos que debe ingresar los datos de su empresa en el panel que aparecerá al momento de iniciar la sesión, para que sus futuros clientes tengan confianza en ud.</p>
</div>
</div>
</td>
<td width="100">&nbsp;</td>
</tr>
</table>

<table cellpadding="0" cellspacing="0" border="0" align="center" width="600">
<tr>
<td width="400" align="center" style="padding-top:15px;padding-bottom:30px;">
<table cellpadding="0" cellspacing="0" border="0" align="center" width="200" height="50">
<tr>
<td bgcolor="#f90" align="center" style="border-radius:4px;" width="200" height="50">
<div class="contentEditableContainer contentTextEditable">
<div class="contentEditable" >
<a href="http://www.kotizalo.com/cl/login_e.php" style="color:#fff;text-decoration:none;font-family:Helvetica, Arial, sans-serif;font-size:16px;color:#fff;border-radius:4px;">Ir a mi Panel</a>
</div>
</div>

</td>
</tr>
</table>
</td>
</tr>
</table>

<table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="border-collapse:collapse;">
<tr>
<td class="movableContentContainer">

<div class="movableContent">
<table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="border-collapse:collapse;">
<tr>
<td style="background:#333;color:#fff;">
<table cellpadding="0" style="border-collapse:collapse;" cellspacing="0" border="0" align="center" width="600">
<tr>
<td width="200" style="vertical-align:bottom;">
<div class="contentEditableContainer contentImageEditable">
<div class="contentEditable" >
<div style="padding-top:20px;text-align:center;">
	<img src="http://www.kotizalo.com/images/6@2x.png" width="148" data-default="placeholder" data-max-width="200" style="margin-bottom:-3px;" />
</div>
</div>
</div>

</td>
<td width="400" valign="top" style="padding-top:20px;padding-bottom:10px;">
<br/>
<div class="contentEditableContainer contentTextEditable">
<div class="contentEditable" >
<div style="font-size:23px;font-family:Heveltica, Arial, sans-serif;color:#fff;">¿Necesita Ayuda?</div>
</div>
</div>

<div class="contentEditableContainer contentTextEditable">
<div class="contentEditable"  style="padding:20px 10px 0 0;margin:0;font-family:Helvetica, Arial, sans-serif;font-size:15px;color:#FFEECE;line-height:150%;text-align:justify;">
<p >Por favor envienos un correo a <a style="color:#f90;" href="mailto:info@kotizalo.com">info@kotizalo.com</a> explicandonos sus dudas, y un ejecutivo de nuestro equipo se pondrá en contacto con usted.</p>
</div>
</div>

</td>
</tr>
</table>
</td>
</tr>
</table>
</div>

</td>
</tr>
</table>
<!-- END BODY -->

<table cellpadding="0" cellspacing="0" border="0" align="center" width="600">
<tr>
<td width="100%" colspan="2" style="padding-top:10px;">
<hr style="height:1px;border:none;color:#333;background-color:#ddd;" />
</td>
</tr>
<tr>
<td width="60%" height="70" valign="middle" style="padding-bottom:20px;">
<div class="contentEditableContainer contentTextEditable">
<div class="contentEditable" >
<span style="font-size:13px;color:#181818;font-family:Helvetica, Arial, sans-serif;line-height:200%;">Enviado desde no-reply@kotizalo.com by Kotizalo Chile</span>
<br/>
<span style="font-size:11px;color:#555;font-family:Helvetica, Arial, sans-serif;line-height:200%;"> Avenida República 371 of 4, Santiago  | (+56 2) 2 689 3261</span>
<br/>

</div>
</div>
</td>
<td width="40%" height="70" align="right" valign="top" align="right" style="padding-bottom:20px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="right">
<tr>
<td width="57%"></td>
<td valign="top" width="34">
<div class="contentEditableContainer contentFacebookEditable" style="display:inline;">
<div class="contentEditable" >
<img src="http://www.kotizalo.com/images/facebook.png" data-default="placeholder" data-max-width="30" width="30" height="30" alt="facebook" style="margin-right:40x;">
</div>
</div>
</td>
<td valign="top" width="34">
<div class="contentEditableContainer contentTwitterEditable" style="display:inline;">
<div class="contentEditable" >
<img src="http://www.kotizalo.com/images/twitter.png" data-default="placeholder" data-max-width="30" width="30" height="30" alt="twitter" style="margin-right:40x;">
</div>
</div>
</td>
</tr>
</table>
</td>
</tr>
</table>

</td>
</tr>
</table>
<!-- End of wrapper table -->
</body>
';
$this->email->message($codigohtml);
$this->email->send();

$sess_array = array(
'idEmp' => mysql_insert_id(),
'mailEnc' => $mail,
'nameEmp' => "<i class='fa fa-warning'></i>",
'saldoEmp' => "0"
);
$this->session->set_userdata('logged_in', $sess_array);

redirect('/empresa');

}//IF VALIDATION_RUN == TRUE



}//IF VALIDANDO POST

$this->load->view('header');
$data = array(
'construccion' => $this->categoria_model->construccion(),
'remodelacion' => $this->categoria_model->remodelacion(),
'mudanza' => $this->categoria_model->mudanza(),
'otros' => $this->categoria_model->otros(),
'provincias' => $this->ciudades_model->provincias()
);
$this->load->view('registrar/empresa',$data);
$this->load->view('footer');
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

public function usuario(){
$this->load->view('header');
$this->load->view('registrar/usuario');
$this->load->view('footer');
}

}

/* End of file registrar.php */
/* Location: ./application/controllers/registrar.php */
