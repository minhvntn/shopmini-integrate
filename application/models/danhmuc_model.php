<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Danhmuc_model extends CI_Model {
	/**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }

    /**
    * Get product by his is
    * @param int $product_id 
    * @return array
    */
    public function count_name_category($name) {
    	$this->db->select('*');
		$this->db->from('danhmuc');
		$this->db->where('slug', $name);
		$query = $this->db->get();
		return $query->num_rows(); 
    }
    public function get_danhmuc_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('danhmuc');
		$this->db->where('ProductID', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
    public function get_id_category_by_slug($slug) {
    	$this->db->select('ProductID');
		$this->db->from('danhmuc');
		$this->db->where('slug', $slug);
		$query = $this->db->get();
		return $query->row();
    }
    public function get_product_by_category($id, $limit_start=null, $limit_end=null)
    {
		$this->db->select('*');
		$this->db->select('sanpham.Name as sanpham_name');
		$this->db->select('danhmuc.Name as danhmuc_name');
		$this->db->from('danhmuc');
		$this->db->where('danhmuc.ProductID', $id);
		$this->db->join('sanpham', 'sanpham.ProductID = danhmuc.ProductID');
		
		if($limit_start && $limit_end){
          $this->db->limit($limit_start, $limit_end);	
        }

        if($limit_start != null){
          $this->db->limit($limit_start, $limit_end);    
        }

		$query = $this->db->get();
		return $query->result_array();
    }
    function count_product_by_category($id)
    {
		$this->db->select('*');
		$this->db->select('sanpham.Name as sanpham_name');
		$this->db->select('danhmuc.Name as danhmuc_name');
		$this->db->from('danhmuc');
		$this->db->where('danhmuc.ProductID', $id);
		$this->db->join('sanpham', 'sanpham.ProductID = danhmuc.ProductID');

		// if($search_string){
		// 	$this->db->like('Name', $search_string);
		// }
		// if($order){
		// 	$this->db->order_by($order, 'Asc');
		// }else{
		//     $this->db->order_by('ProductID', 'Asc');
		// }
		$query = $this->db->get();
		return $query->num_rows();        
    }
    /**
    * Fetch manufacturers data from the database
    * possibility to mix search, filter and order
    * @param string $search_string 
    * @param strong $order
    * @param string $order_type 
    * @param int $limit_start
    * @param int $limit_end
    * @return array
    */
    public function get_danhmuc($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
    {
	    
		$this->db->select('*');
		$this->db->from('danhmuc');

		if($search_string){
			$this->db->like('Name', $search_string);
		}
		$this->db->group_by('ProductID');

		if($order){
			$this->db->order_by($order, $order_type);
		}else{
		    $this->db->order_by('ProductID', $order_type);
		}

        if($limit_start && $limit_end){
          $this->db->limit($limit_start, $limit_end);	
        }

        if($limit_start != null){
          $this->db->limit($limit_start, $limit_end);    
        }
        
		$query = $this->db->get();
		
		return $query->result_array(); 	
    }

    public function getAll_danhmuc()
    {
	    
		$this->db->select('*');
		$this->db->from('danhmuc');

		$query = $this->db->get();
		
		return $query->result_array(); 	
    }

    /**
    * Count the number of rows
    * @param int $search_string
    * @param int $order
    * @return int
    */
    function count_danhmuc($search_string=null, $order=null)
    {
		$this->db->select('*');
		$this->db->from('danhmuc');
		if($search_string){
			$this->db->like('Name', $search_string);
		}
		if($order){
			$this->db->order_by($order, 'Asc');
		}else{
		    $this->db->order_by('ProductID', 'Asc');
		}
		$query = $this->db->get();
		return $query->num_rows();        
    }

    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    function them_danhmuc($data)
    {
		$insert = $this->db->insert('danhmuc', $data);
	    return $insert;
	}


	/**
    * Update manufacture
    * @param array $data - associative array with data to store
    * @return boolean
    */

    function capnhat_danhmuc($id, $data)
    {
		$this->db->where('ProductID', $id);
		$this->db->update('danhmuc', $data);
		$report = array();
		// $report['error'] = $this->db->_error_number();
		// $report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}

    /**
    * Delete manufacturer
    * @param int $id - manufacture id
    * @return boolean
    */
	function xoa_danhmuc($id){
		$this->db->where('ProductID', $id);
		$this->db->delete('danhmuc'); 
	}
}
// class Danhmuc_model extends CI_Model {
// 	public function insert_data($data){
// 		$this->db->insert('danhmuc', $data);
// 	}
// 	public function delete_data($id) {
// 		// $this->db->where('ProductID', $id);
// 		// $this->db->delete('danhmuc');
// 		$this->load->database();
// 		$this->db->where('ProductID', $id);
// 		$this->db->delete('danhmuc');
// 		return true;
// 	}
// 	public function fetch_data() {
// 		// $query = $this->db->get('danhmuc');
// 		$query = $this->db->query('SELECT * FROM danhmuc ORDER BY ProductID ASC');
// 		return $query;
// 	}
// 	public function getDanhMucId($id) {
// 		$this->load->database();
// 		$this->db->where('ProductID', $id);
// 		$data = $this->db->get('danhmuc');
// 		return $data->result();
// 	}

