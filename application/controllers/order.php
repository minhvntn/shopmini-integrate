<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller {
	public function __construct() {
		parent::__construct();
    	$this->load->model('danhmuc_model');
    	$this->load->model('sanpham_model');
    	$this->load->model('order_model');
	}

	public function index() {
        $data['main_content'] = 'order_view';
        $this->load->view('includes/template', $data);
	}
    public function get_order() {
       $id = $_POST['id'];
       $data["results"] = $this->order_model->get_order_by_id($id);
       echo json_encode($data["results"]);
    }
}
	
