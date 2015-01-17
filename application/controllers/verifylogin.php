<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

function __construct()
{
parent::__construct();
$this->load->model('login_model','',TRUE);
$this->load->helper('url');
}

function index()
{
//This method will have the credentials validation
$this->load->library('form_validation');

$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

if($this->form_validation->run() == FALSE)
{
//Field validation failed.  User redirected to login page
$this->load->view('header');
$this->load->view('login/inicio');
$this->load->view('footer');
}
else
{
//Go to private area
redirect('empresa', 'refresh');
}

}

function check_database($password)
{
//Field validation succeeded.  Validate against database
$username = $this->input->post('username');

//query the database
$result = $this->login_model->login($username, $password);

if($result)
{
$sess_array = array();
foreach($result as $row)
{
$sess_array = array(
'idEmp' => $row->idEmp,
'mailEnc' => $row->mailEnc,
'nameEmp' => $row->nameEmp,
'saldoEmp' => $row->saldoEmp
);
$this->session->set_userdata('logged_in', $sess_array);
}
return TRUE;
}
else
{
$this->load->view('header');
$this->form_validation->set_message('check_database', '<div class="alert alert-warning">El correo o la contraseña son incorrectos.</div>');
return false;
}
}
}
?>
