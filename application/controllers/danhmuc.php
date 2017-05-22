<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Danhmuc extends CI_Controller {
	//show danh muc controler
	public function index(){
		$this->load->model("danhmuc_model");
		$data["fetch_data"] = $this->danhmuc_model->fetch_data();
		$this->load->view("danhmuc_view", $data);
		echo  $this->uri->segment(1);
		print $this->uri->segment(2);
	}

	public function form_validation() {
		// echo 'OK';
		$this->load->library('form_validation');
		$this->form_validation->set_rules("tendanhmuc", "Tendanhmuc", 'required');

		if ($this->form_validation->run()) {
			// true
			$this->load->model("danhmuc_model");
			$data = array(
				"Name" => $this->input->post("tendanhmuc"),
				"Status" => "0"
				);
			$this->danhmuc_model->insert_data($data);

			redirect(base_url(). "danhmuc/inserted");
		} else {
			// false
			$this->index();
		}
	}

	//form validation libary

	public function inserted() {
		$this->index();
	}

	public function delete(){
		$this->load->model('danhmuc_model');
		// $this->danhmuc_model->delete_data($id);
		$id = $this->input->get('ProductID');
		// $this->danhmuc_model->delete_data(5);
		if ($this->danhmuc_model->delete_data($id)) {
			$this->index();
		}
	}
	public function getDanhMucTheoID() {
		$id = $this->input->get('ProductID');
		$this->load->model('danhmuc_model');
		$data["fetch_data"] = $this->danhmuc_model->fetch_data();
		$data["result"] = $this->danhmuc_model->getDanhMucId($id);
		$this->load->view("danhmuc_view", $data);
	}
	public function edit() {
		$id = $this->input->get('ProductID');
		$this->load->model('danhmuc_model');
		echo $id;
		print $id;
		$data['fetch_data'] = $this->danhmuc_model->getDanhMucId($id);
		$this->load->view("edit_danhmuc", $data);
	}
}

?>