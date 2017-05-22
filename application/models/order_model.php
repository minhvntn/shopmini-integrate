<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends CI_Model {

	public function __construct()
    {
        $this->load->database();
    }

    function insertOrder($data)
    {
		$insert = $this->db->insert('donhang', $data);
	    return $insert;
	}
	function insertOrderDetail($data)
    {
		$insert = $this->db->insert('donhangchitiet', $data);
	    return $insert;
	}
	function get_order_by_id($id) {
		$this->db->select('*');
		$this->db->from('donhangchitiet');
		$this->db->where('orderid', $id);
		$query = $this->db->get();
		return $query->result_array(); 
	}
}