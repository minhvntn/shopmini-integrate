<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_controller {
	function index() {
		if ($this->session->userdata('is_logged_in')) {
			redirect('admin/danhmuc');
		} else {
			$this->load->view('admin/login');
		}
	}
	function __encrip_password($password) {
        return md5($password);
    }
    function validate_credentials() {
    	$this->load->model('Users_model');

    	$username = $this->input->post('username');
    	$password = $this->__encrip_password($this->input->post('password'));
    	
    	$is_valid = $this->Users_model->validate($username, $password);

    	if ($is_valid) {

    		$data = array(
    			'username' => $username,
    			'is_logged_in' => true
    		);

    		$this->session->set_userdata($data);
    		redirect('admin/danhmuc');
    	} else {
    		$data['message_error'] = true;
    		$this->load->view('admin/login', $data);
    	}
    }
    function logout() {
		$this->session->sess_destroy();
		redirect('admin');
	}
}
?>