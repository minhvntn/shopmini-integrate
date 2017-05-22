<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {
	function index() {
		if($this->input->post('submit'))
      {
        $this->load->library('upload_library');
        $upload_path ='./assets/img';
        $data = $this->upload_library->upload($upload_path, 'image');

      }
		$data['main_content'] = 'admin/sanpham/upload';
		$this->load->view('admin/includes/template', $data);
	}
	function upload_file() {

		if($this->input->post('submit'))
      {
         $this->load->library('upload_library');
         $upload_path ='./assets/imgthumb';
        $data = $this->upload_library->upload_file($upload_path, 'image_list');
        print_r($data);
      }

		$data['main_content'] = 'admin/sanpham/upload/upload_file';
		$this->load->view('admin/includes/template', $data);
	}
}