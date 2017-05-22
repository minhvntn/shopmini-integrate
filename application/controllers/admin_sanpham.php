<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_sanpham extends CI_Controller {
	/**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sanpham_model');
        $this->load->model('danhmuc_model');
        $this->load->helper('date');

        if(!$this->session->userdata('is_logged_in')){
            redirect('admin/login');
        }
    }

    /**
    * Load the main view with all the current model model's data.
    * @return void
    */
    public function index()
    {

        //all the posts sent by the view
        $manufacture_id = $this->input->post('manufacture_id');        
        $search_string = $this->input->post('search_string');        
        $order = $this->input->post('order'); 
        $order_type = $this->input->post('order_type'); 

        //pagination settings
        $config['per_page'] = 5;
        $config['base_url'] = base_url().'admin/sanpham';
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        //limit end
        $page = $this->uri->segment(3);

        //math to get the initial record to be select in the database
        $limit_end = ($page * $config['per_page']) - $config['per_page'];
        if ($limit_end < 0){
            $limit_end = 0;
        } 

        //if order type was changed
        if($order_type){
            $filter_session_data['order_type'] = $order_type;
        }
        else{
            //we have something stored in the session? 
            if($this->session->userdata('order_type')){
                $order_type = $this->session->userdata('order_type');    
            }else{
                //if we have nothing inside session, so it's the default "Asc"
                $order_type = 'Asc';    
            }
        }
        //make the data type var avaible to our view
        $data['order_type_selected'] = $order_type;        


        //we must avoid a page reload with the previous session data
        //if any filter post was sent, then it's the first time we load the content
        //in this case we clean the session filter data
        //if any filter post was sent but we are in some page, we must load the session data

        //filtered && || paginated
        if($manufacture_id !== false && $search_string !== false && $order !== false || $this->uri->segment(3) == true){ 
           
            /*
            The comments here are the same for line 79 until 99

            if post is not null, we store it in session data array
            if is null, we use the session data already stored
            we save order into the the var to load the view with the param already selected       
            */

            if($manufacture_id !== 0){
                $filter_session_data['manufacture_selected'] = $manufacture_id;
            }else{
                $manufacture_id = $this->session->userdata('manufacture_selected');
            }
            $data['manufacture_selected'] = $manufacture_id;

            if($search_string){
                $filter_session_data['search_string_selected'] = $search_string;
            }else{
                // $search_string = $this->session->userdata('search_string_selected');
                $search_string = null;
            }
            $data['search_string_selected'] = $search_string;

            if($order){
                $filter_session_data['order'] = $order;
            }
            else{
                $order = $this->session->userdata('order');
            }
            $data['order'] = $order;

            //save session data into the session
            $this->session->set_userdata($filter_session_data);

            //fetch manufacturers data into arrays
            $data['manufactures'] = $this->danhmuc_model->get_danhmuc();

            $data['count_products']= $this->sanpham_model->count_sanpham($manufacture_id, $search_string, $order);
            $config['total_rows'] = $data['count_products'];

            //fetch sql data into arrays
            if($search_string){
                if($order){
                    $data['products'] = $this->sanpham_model->get_sanpham($manufacture_id, $search_string, $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['products'] = $this->sanpham_model->get_sanpham($manufacture_id, $search_string, '', $order_type, $config['per_page'],$limit_end);           
                }
            }else{
                if($order){
                    $data['products'] = $this->sanpham_model->get_sanpham($manufacture_id, '', $order, $order_type, $config['per_page'],$limit_end);        
                }else{
                    $data['products'] = $this->sanpham_model->get_sanpham($manufacture_id, '', '', $order_type, $config['per_page'],$limit_end);        
                }
            }

        }else{

            //clean filter data inside section
            $filter_session_data['manufacture_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['search_string_selected'] = '';
            $data['manufacture_selected'] = 0;
            $data['order'] = 'ItemID';

            //fetch sql data into arrays
            $data['manufactures'] = $this->danhmuc_model->get_danhmuc();
            $data['count_products']= $this->sanpham_model->count_sanpham();
            $data['products'] = $this->sanpham_model->get_sanpham('', '', '', $order_type, $config['per_page'],$limit_end);        
            $config['total_rows'] = $data['count_products'];

        }//!isset($manufacture_id) && !isset($search_string) && !isset($order)

        //initializate the panination helper 
        $this->pagination->initialize($config);   

        //load the view
        $data['main_content'] = 'admin/sanpham/danhsach';
        $this->load->view('admin/includes/template', $data);  

    }//index

     public function them()
    {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {

            //form validation
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('desc', 'description', 'required');
            $this->form_validation->set_rules('price', 'price', 'required');
            $this->form_validation->set_rules('priceaftersale', 'priceaftersale', 'required');
            $this->form_validation->set_rules('quantity', 'quantity', 'required');
            $this->form_validation->set_rules('ProductID', 'ProductID', 'required');
            // $this->form_validation->set_rules('image', 'image', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {

                //lay hinh anh
                $this->load->library('upload_library');
                $upload_path = './assets/images/products';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $image_link = '';
                if (isset($upload_data['file_name'])) {
                    $image_link = $upload_data['file_name'];
                }   

                $image_list = array();
                // $upload_path_list = './assets/images/productsthumb';
                $image_list = $this->upload_library->upload_file($upload_path, 'image_list');

                $image_list = json_encode($image_list);

                $slug = $this->input->post('name');
                $letter = '/[^\-\s\pN\pL]+/u';
                $space = '/[\-\s]+/';
                $slug = preg_replace($letter, '', mb_strtolower($slug, 'UTF-8'));
                $slug = preg_replace($space, '-', $slug);
                $this->load->helper('text');
                $slug = convert_accented_characters($slug);

                $data_to_store = array(
                    'Name' => $this->input->post('name'),
                    'Description' => $this->input->post('desc'),
                    'Price' => $this->input->post('price'),
                    'PriceAfterSale' => $this->input->post('priceaftersale'),
                    'Quantity' => $this->input->post('quantity'),          
                    'ProductID' => $this->input->post('ProductID'),
                    'ItemPhoto' => $image_link,
                    'ItemThumbnail' => $image_list,
                    'SalePercent' => 20,
                    'created' => date('Y-m-d H:i:s'),
                    'slug' => $slug,
                );
                //if the insert has returned true then we show the flash message
                if($this->sanpham_model->store_product($data_to_store)){
                    $data['flash_message'] = TRUE; 
                    redirect('admin/sanpham');
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }
        }
        //fetch manufactures data to populate the select field
        $data['manufactures'] = $this->danhmuc_model->get_danhmuc();
        //load the view
        $data['main_content'] = 'admin/sanpham/them';
        $this->load->view('admin/includes/template', $data);  
    }       
    /**
    * Update item by his id
    * @return void
    */
    public function capnhat()
    {
        //product id 
        $id = $this->uri->segment(4);
  
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('name', 'name', 'required');
            $this->form_validation->set_rules('desc', 'description', 'required');
            $this->form_validation->set_rules('price', 'price', 'required');
            $this->form_validation->set_rules('priceaftersale', 'priceaftersale', 'required');
            $this->form_validation->set_rules('quantity', 'quantity', 'required');
            $this->form_validation->set_rules('ProductID', 'ProductID', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                //lay hinh anh
                $this->load->library('upload_library');
                $upload_path = './assets/images/products';
                $upload_data = $this->upload_library->upload($upload_path, 'image');
                $image_link = '';
                if (isset($upload_data['file_name'])) {
                    $image_link = $upload_data['file_name'];
                }   

                $image_list = array();
                // $upload_path_list = './assets/images/productsthumb';
                $image_list = $this->upload_library->upload_file($upload_path, 'image_list');

                $image_list_json = json_encode($image_list);

                $slug = $this->input->post('name');
                $letter = '/[^\-\s\pN\pL]+/u';
                $space = '/[\-\s]+/';
                $slug = preg_replace($letter, '', mb_strtolower($slug, 'UTF-8'));
                $slug = preg_replace($space, '-', $slug);
                $this->load->helper('text');
                $slug = convert_accented_characters($slug);

                $data_to_store = array(
                    'Name' => $this->input->post('name'),
                    'Description' => $this->input->post('desc'),
                    'Price' => $this->input->post('price'),
                    'PriceAfterSale' => $this->input->post('priceaftersale'),
                    'Quantity' => $this->input->post('quantity'),          
                    'ProductID' => $this->input->post('ProductID'),
                    'SalePercent' => 20,
                    'slug' => $slug,
                );
                if ($image_link != '') {
                    $data_to_store['ItemPhoto'] = $image_link;
                }
                if (!empty($image_list)) {
                    $data_to_store['ItemThumbnail'] = $image_list_json;
                }
                //if the insert has returned true then we show the flash message
                if($this->sanpham_model->update_product($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                    redirect('admin/sanpham');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect('admin/products/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['product'] = $this->sanpham_model->get_product_by_id($id);
        //fetch manufactures data to populate the select field
        $data['manufactures'] = $this->danhmuc_model->get_danhmuc();
        //load the view
        $data['main_content'] = 'admin/sanpham/capnhat';
        $this->load->view('admin/includes/template', $data);            

    }//update

    /**
    * Delete product by his id
    * @return void
    */
    public function xoa()
    {
        //product id 
        $id = $this->uri->segment(4);
        $product = $this->sanpham_model->get_product_by_id($id);
        $image_link = './assets/images/products/'.$product[0]['ItemPhoto'];
        if (file_exists($image_link)) {
            unlink($image_link);
        }
        $image_list = json_decode($product[0]['ItemThumbnail']);
        if (is_array($image_list)) {
            foreach ($image_list as $img) {
                $image_link = './assets/images/products/'.$img;
                if (file_exists($image_link)) {
                    unlink($image_link);
                }
            }
        }

        $this->sanpham_model->delete_product($id);
        redirect('admin/sanpham');
    }//edit
}