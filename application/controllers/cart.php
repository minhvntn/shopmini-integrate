<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {
	public function __construct() {
		parent::__construct();
    	$this->load->model('danhmuc_model');
    	$this->load->model('sanpham_model');
    	$this->load->model('order_model');
		$this->load->library('cart');

	}

	public function add() {
		//lay san pham muon them vao gio hang
		$id = $this->uri->segment(3);
		$product = $this->sanpham_model->get_product_by_id($id);
		
		if (!$product) {
			redirect();
		}
		//tong so san pham
		$qty = 1;
		//thong tin them vao gio
		$data = array(
            "id" => $product[0]['ItemID'],
            "name" => $product[0]['Name'],
            "qty" => "1",
            "price" => $product[0]['Price'],
            // "option" => array("author" => "freetuts.net"),
        );
        // Them san pham vao gio hang
		$this->cart->insert($data);
		redirect(base_url('cart'));
	}
	//hien thi gio hang

	function index() {
		// thong tin gio hang
		$carts = $this->cart->contents();
		
		//tong so san pham co trong gio hang

		$total_items = $this->cart->total_items();
		// print_r($total_items);
		// $this->data['carts'] = $carts;

		// $this->data['total_items'] = $total_items;
		$data['total_items'] = $total_items;
		$data['carts'] = $carts;
		$data['main_content'] = 'cart_view';
      	$this->load->view('includes/template', $data);
	}
	// cap nhat gio hang
	function update() {
		$carts = $this->cart->contents();

		foreach($carts as $key => $row) {
			$total_qty = $this->input->post('qty_'.$row['id']);
			$data = array(
				'rowid' => $key,
				'qty' => $total_qty,
			);

			$this->cart->update($data);
		}
		redirect(base_url('cart'));
	}
	//xoa san pham gio hang
	function del() {
		$id = $this->uri->segment(3);
		$id = intval($id);

		if ($id>0) {
			$carts = $this->cart->contents();
			foreach($carts as $key => $row) {
				if ($row['id'] == $id) {
					$data = array(
						'rowid' => $key,
						'qty' => 0,
					);
					$this->cart->update($data);
				}
			}

		} else {
			$this->cart->destroy();
		}
		redirect(base_url('cart'));
	}
	function addorder() {
		$carts = $this->cart->contents();
		$total_items = $this->cart->total_items();
		$total_amount = 0;
		foreach ($carts as $row) {
			$total_amount += $row['subtotal'];
		}
		
		//if save button was clicked, get the data sent via post
        if ($this->input->post())
        {

            //form validation
            $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_rules('address', 'address', 'required');
            $this->form_validation->set_rules('phone', 'phone', 'required');
            $this->form_validation->set_rules('email', 'email', 'required|valid_email');
            // $this->form_validation->set_rules('username', 'username', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            

            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array(
                    'username' => $this->input->post('username'),
                    'address' => $this->input->post('address'),
					'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'note' => $this->input->post('note'),
                    'dateorder' => date('Y-m-d H:i:s'),
                    'status' => 0,
                    'amount' => $total_amount,
                );
                //if the insert has returned true then we show the flash message
                if($this->order_model->insertOrder($data_to_store)){
                    $data['flash_message'] = TRUE;
                    $orderId = $this->db->insert_id();
                    foreach ($carts as $row) {
                    	$data = array(
                    		'orderid' => $orderId,
                    		'name' => $row['name'],
                    		'price' => $row['price'],
                    		'quantity' => $row['qty'],
                    	);
                    	$this->order_model->insertOrderDetail($data);
                    	$this->load->library('email');
		                // Cấu hình
		                $config['protocol']     = 'smtp';
						$config['smtp_host']    = 'ssl://smtp.googlemail.com'; //neu sử dụng gmail
						$config['smtp_user']    = 'minhvntn@gmail.com';
						$config['smtp_pass']    = 'oypwshwbqanlvnwb';
						$config['smtp_port']    = '465'; //nếu sử dụng gmail
		                // $config['charset'] = 'utf-8';
		                // $config['mailtype'] = 'html';
		                // $config['wordwrap'] = TRUE;
		                $this->email->initialize($config);
		                 
		                //cau hinh email va ten nguoi gui
		                $this->email->from('minhvntn@gmail.com', 'Minh');
		                //cau hinh nguoi nhan
		                $this->email->to('minhvntn@gmail.com');
		                 
		                $this->email->subject('Tiêu đề gửi mail');
		                $this->email->message('Nội dung gửi mail.');
		                 
		                //dinh kem file
		                // $this->email->attach('/path/to/photo1.jpg');
		                //thuc hien gui
		                if ( ! $this->email->send())
		                {
		                    // Generate error
		                    echo $this->email->print_debugger();
		                }else{
		                    echo 'Gửi email thành công';
		                }
                    }
                    $this->cart->destroy();
                    //thongbao
                    $this->session->set_flashdata('message', 'valasdasdsaddue');
                    redirect();
                }else{
                    $data['flash_message'] = FALSE; 
                }
            }

        }
        //load the view
        $total_items = $this->cart->total_items();
		// // print_r($total_items);
		// // $this->data['carts'] = $carts;

		// // $this->data['total_items'] = $total_items;
		$data['carts'] = $carts;
		$data['total_items'] = $total_items;
        $data['main_content'] = 'cart_view';
        $this->load->view('includes/template', $data);
	}
}