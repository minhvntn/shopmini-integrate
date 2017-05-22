<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sanpham_model extends CI_Model {

	public function __construct()
    {
        $this->load->database();
    }


	/**
    * Get product by his is
    * @param int $product_id 
    * @return array
    */
    public function get_product_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('sanpham');
		$this->db->where('ItemID', $id);
		$query = $this->db->get();
		return $query->result_array(); 
    }
    public function get_product_by_category_id($id, $limit_start=null, $limit_end=null) {
    	$this->db->select('*');
    	$this->db->from('sanpham');
    	$this->db->where('ProductID', $id);

    	if($limit_start && $limit_end){
          $this->db->limit($limit_start, $limit_end);	
        }

        if($limit_start != null){
          $this->db->limit($limit_start, $limit_end);    
        }

    	$query = $this->db->get();
		return $query->result_array(); 
    }
    public function get_product_by_category($limit_start=null, $limit_end=null)
    {
		$this->db->select('*');
		$this->db->select('sanpham.Name as sanpham_name');
		$this->db->select('danhmuc.Name as danhmuc_name');
		$this->db->from('sanpham');
		
		$this->db->join('danhmuc', 'sanpham.ProductID = danhmuc.ProductID', 'left');

		// $this->db->where('ProductID', $id);
		if($limit_start && $limit_end){
          $this->db->limit($limit_start, $limit_end);	
        }

        if($limit_start != null){
          $this->db->limit($limit_start, $limit_end);    
        }

		$query = $this->db->get();
		return $query->result_array();
    }

    function count_product_by_category_id($search_string=null, $order=null)
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
    * Fetch products data from the database
    * possibility to mix search, filter and order
    * @param int $manufacuture_id 
    * @param string $search_string 
    * @param strong $order
    * @param string $order_type 
    * @param int $limit_start
    * @param int $limit_end
    * @return array
    */
    public function get_sanpham($manufacture_id=null, $search_string=null, $order=null, $order_type='Asc', $limit_start, $limit_end)
    {
	    
		$this->db->select('sanpham.ItemID');
		$this->db->select('sanpham.Name');
		$this->db->select('sanpham.Description');
		$this->db->select('sanpham.Price');
		$this->db->select('sanpham.SalePercent');
		$this->db->select('sanpham.ProductID');
		$this->db->select('danhmuc.Name as danhmuc_name');
		$this->db->from('sanpham');
		
		if($manufacture_id != null && $manufacture_id != 0){
			$this->db->where('ProductID', $manufacture_id);
		}
		if($search_string){
			$this->db->like('Description', $search_string);
		}

		$this->db->join('danhmuc', 'sanpham.ProductID = danhmuc.ProductID', 'left');

		$this->db->group_by('sanpham.ItemID');

		if($order){
			$this->db->order_by($order, $order_type);
		}else{
		    $this->db->order_by('ProductID', $order_type);
		}

		$this->db->limit($limit_start, $limit_end);
		//$this->db->limit('4', '4');


		$query = $this->db->get();
		
		return $query->result_array(); 	
    }

     /**
    * Count the number of rows
    * @param int $manufacture_id
    * @param int $search_string
    * @param int $order
    * @return int
    */
    function count_sanpham($manufacture_id=null, $search_string=null, $order=null)
    {
		$this->db->select('*');
		$this->db->from('sanpham');
		if($manufacture_id != null && $manufacture_id != 0){
			$this->db->where('ProductID', $manufacture_id);
		}
		if($search_string){
			$this->db->like('Description', $search_string);
		}
		if($order){
			$this->db->order_by($order, 'Asc');
		}else{
		    $this->db->order_by('ItemID', 'Asc');
		}
		$query = $this->db->get();
		return $query->num_rows();        
    }

     /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    function store_product($data)
    {
		$insert = $this->db->insert('sanpham', $data);
	    return $insert;
	}
	 /**
    * Update product
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_product($id, $data)
    {
		$this->db->where('ItemID', $id);
		$this->db->update('sanpham', $data);
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
    * Delete product
    * @param int $id - product id
    * @return boolean
    */
	function delete_product($id){
		$this->db->where('ItemID', $id);
		$this->db->delete('sanpham'); 
	}
}	