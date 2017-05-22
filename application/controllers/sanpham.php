<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sanpham extends CI_Controller {
 
  /**
  * name of the folder responsible for the views 
  * which are manipulated by this controller
  * @constant string
  */
  const VIEW_FOLDER = 'home';

   public function __construct() {
      parent::__construct();
      $this->load->model('danhmuc_model');
      $this->load->model('sanpham_model');
  }
  function catalog($slug) {
    $id = $this->danhmuc_model->get_id_category_by_slug($slug);
    $id = $id->ProductID;

    // $catalog = $this->danhmuc_model->get_product_by_category($id);
    // return product page when no item
    // if (!$catalog) {
    //   redirect();
    // }
    // print_r($catalog);
    $data['count_products_by_category'] = $this->danhmuc_model->count_product_by_category($id);
    //lay ra danh sach san pham thuoc danh muc đó
    $config['per_page'] = 2;

    $config['base_url'] = base_url('sanpham/catalog/'.$slug);
    $config['use_page_numbers'] = TRUE;
    $config['num_links'] = 20;
    // $config['uri_segment'] = 5;
    $config['full_tag_open'] = '<ul>';
    $config['full_tag_close'] = '</ul>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a>';
    $config['cur_tag_close'] = '</a></li>';
    

    $segment = $this->uri->segment(4);
    $segment = intval($segment);
    // print_r($segment);
    $limit_end = ($segment * $config['per_page']) - $config['per_page'];
    if ($limit_end < 0){
        $limit_end = 0;
    }
    // $input = array();
    // $input['limit'] = array($config['per_page'], $segment);

    //lay danh sach san pham
    
    $data['sanpham'] = $this->sanpham_model->get_product_by_category_id($id, $config['per_page'],$limit_end);
    $config['total_rows'] = $data['count_products_by_category'];

    $data['danhmuc'] = $this->danhmuc_model->getAll_danhmuc();
    $data['danhmucid'] = $this->danhmuc_model->get_danhmuc_by_id($id);
    
    $this->pagination->initialize($config);
    
    $data['main_content'] = 'sanpham_view';
    $this->load->view('includes/template', $data);
  }
}
 
?>