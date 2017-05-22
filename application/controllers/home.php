<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
 
  /**
    * name of the folder responsible for the views 
    * which are manipulated by this controller
    * @constant string
    */
    const VIEW_FOLDER = 'home';

     public function __construct()
    {
        parent::__construct();
        $this->load->model('danhmuc_model');
        $this->load->model('sanpham_model');
        // if(!$this->session->userdata('is_logged_in')){
        //     redirect('admin/login');
        // }
    }
    public function index() {
      $data['danhmuc'] = $this->danhmuc_model->getAll_danhmuc();
      $data['main_content'] = 'home_view';
      $this->load->view('includes/template', $data);
    }
}
 
?>