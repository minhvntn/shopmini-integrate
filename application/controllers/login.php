<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
 
 public function index()
 {
   // $this->load->helper(array('form'));
 	$this->form_validation->set_rules('username', 'Username', 'trim|required');
 	$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_basisdata_cek');
 	if ($this->form_validation->run() == false) {
   		$this->load->view('login_view');
 	} else {
 		redirect(base_url('index.php/home'), 'refresh');
 	}
 }
 function basisdata_cek($password) {
 	$username = $this->input->post('username');
 	$result = $this->login->login($username, $password);
 	if ($result) {
 		$sess_array = array();
 		foreach ($result as $row) {
 			$sess_array = $arrayName = array('id' => $row->id, 'username' => $row->username, 'password' => $row->password);
 			$this->session->set_userdata('logged_in', $sess_array);
 		}
 		return true;
 	} else {
 		$this->form_validation->set_message('basisdata_cek', 'Invalid username or password');
 		return false;
 	}
 }
}
 
?>