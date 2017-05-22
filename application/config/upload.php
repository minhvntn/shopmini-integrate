<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload {
	var $CI = '';

	function __construct() {
		$this->CI =& get_instance();
	}

	//upload file

	function upload($upload_path = '', $file_name = '') {
		$config = $this->config($upload_path);
		$this->CI->load->library('upload', $config);

		//thuc hien upload
         if($this->CI->upload->do_upload($file_name))
         {
             //chua mang thong tin upload thanh con
             $data = $this->CI->upload->data();
             //in cau truc du lieu cua file da upload
             print_r($data);
         }
         else
         {
            //hien thi lỗi nếu có
            $error = $this->CI->upload->display_errors();
            echo $error;
         }
         return $data;
	}

	function config($upload_path= '') {
		 $config = array();
         //thuc mục chứa file
         $config['upload_path']   = $upload_path;
         //Định dạng file được phép tải
         $config['allowed_types'] = 'jpg|png|gif|jpeg|JPG';
         //Dung lượng tối đa
         $config['max_size']      = '5500';
         //Chiều rộng tối đa
         $config['max_width']     = '51028';
         //Chiều cao tối đa
         $config['max_height']    = '51028';
	}
}