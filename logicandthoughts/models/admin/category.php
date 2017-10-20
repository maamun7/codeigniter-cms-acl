<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Category extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function count_category_list(){
		$this->db->select('*');
		$this->db->from('categories');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->num_rows();	
		}
		return false;
	}
	public function retrieve_category_list($limit,$page){
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->limit($limit,$page); 
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	
	function insert_category($data)
	{ 
		$this->db->insert('categories',$data);
        return true;
	}
	public function retrieve_category_edit_data($cat_id){
	
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->where('categories_id',$cat_id); 
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();		
		}
		return false;
	}
	
	public function update_category($data,$category_id)
	{	
		$this->db->where('categories_id',$category_id);
		$this->db->update('categories',$data); 
		return true;
	}
		
	// Delete Category 
	public function remove_category($cat_id)
	{		
		$this->db->where('categories_id',$cat_id);
		$this->db->delete('categories');
		return true;
	}
		//Change Course Name Status
	public function category_status_change($cat_id)
	{
		$this->db->select('categories_status');
		$this->db->from('categories');
		$this->db->where('categories_id',$cat_id); 
		
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$status = $row->categories_status;
			}
		}
		if($status==1){
			$status=0;
		}else if($status==0){
			$status=1;
		}
		$data=array(
			'categories_status' =>$status
		);
		$this->db->where('categories_id',$cat_id);
		$this->db->update('categories',$data); 
		return $status ;
	}
	
	public function retrieve_search_list($key_word)
	{
		$this->db->select('*');
		$this->db->from('categories');
		$this->db->like('categories_name',$key_word,'both');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
		


}