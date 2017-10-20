<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_sliders extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function count_slider_list(){
	
		$this->db->select('*');
		$this->db->from('home_slider');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->num_rows();	
		}
		return false;
	}
	public function retrieve_slider_list($limit,$page){
	
		$this->db->select('*');
		$this->db->from('home_slider');
		$this->db->limit($limit,$page); 
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	
	function do_entry($data)
	{ 
		$this->db->insert('home_slider',$data);
        return true;
	}
	public function retrieve_edit_data($slider_id){
	
		$this->db->select('*');
		$this->db->from('home_slider');
		$this->db->where('slider_id',$slider_id); 
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();		
		}
		return false;
	}
	
	public function do_update($data,$slider_id)
	{	
		$this->db->where('slider_id',$slider_id);
		$this->db->update('home_slider',$data); 
		return true;
	}
	// Delete Existing Image 
	public function delete_exist_slider_img($slider_id)
	{
		$thumbs_path = $_SERVER['DOCUMENT_ROOT'].'/uploads/home_slider/thumb_img/';
		$this->db->select('slider_image,image_path');
		$this->db->from('home_slider');
		$this->db->where('slider_id',$slider_id);
		$query = $this->db->get();
	
		if ($query->num_rows() > 0) {
			foreach($query->result() as $rows){
				$orgn_image =$rows->image_path.$rows->slider_image ;
				$thum_image =$thumbs_path.$rows->slider_image ;
				if (file_exists($orgn_image)) {
					unlink($orgn_image);
				}
				if (file_exists($thum_image)) {
					unlink($thum_image);
				}
			}
		}
		return true;
	}
	
	// Delete Slider 
	public function do_delete($slider_id)
	{
		$this->delete_exist_slider_img($slider_id);
		
		$this->db->where('slider_id', $slider_id);
		$this->db->delete('home_slider');
		return true;
	}
	//Change Course Name Status
	public function do_change_status($slider_id)
	{
		$this->db->select('status');
		$this->db->from('home_slider');
		$this->db->where('slider_id',$slider_id); 
		
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$status = $row->status ;
			}
		}
		if($status==1){
			$status=0;
		}else if($status==0){
			$status=1;
		}
		$data=array(
			'status' 		=>$status
		);
		$this->db->where('slider_id',$slider_id);
		$this->db->update('home_slider',$data); 
		return $status ;
	}
	
	public function retrieve_search_list($key_word)
	{
		$this->db->select('*');
		$this->db->from('home_slider');
		$this->db->like('slider_heading',$key_word,'both');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
		


}