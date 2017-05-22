<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Productdetail extends CI_Controller {
 
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
        
    }
    public function index() {
      $id = $this->uri->segment(2);
      // $data['sanphamlo'] = $this->danhmuc_model->get_product_by_category($id);
      $data['danhmuc'] = $this->danhmuc_model->getAll_danhmuc();
      $data['productDetail'] = $this->sanpham_model->get_product_by_id($id);
      $data['danhmucid'] = $this->danhmuc_model->get_danhmuc_by_id(12);
      // print_r($data['sanphamchitiet']);

      // print_r($data['danhmucid']);
      $data['main_content'] = 'productdetail_view';
      $this->load->view('includes/template', $data);
    }

    // public function sanpham() {
    //   $id = $this->uri->segment(3);
    //   $data['sanphamlo'] = $this->danhmuc_model->get_product_by_category($id);
    //   // echo 'pre';
    //   // print_r($asd);
    //   $data['sanpham'] = $this->sanpham_model->get_product_by_category($id);
    //   //load the view
    //   $data['main_content'] = 'sanpham_view';
    //   $this->load->view('includes/template', $data);
    // }
}
 
?>