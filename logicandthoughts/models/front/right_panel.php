<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Right_panel extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get_official_merchandise(){
		
		$this->db->select('id,heading,image,target_window,links');
		$this->db->from("official_marchandise");
		$this->db->where(array('status'=>1));		
		$this->db->order_by('id','desc');
		$this->db->limit(1,0); 
		$query = $this->db->get();				
		if ($query->num_rows() > 0) {			
			return $query->result_array();
		}else{
			return false;
		}
	}
	
	public function get_did_you_know(){
		
		$this->db->select('id,question_heading,feat_image,created_on');
		$this->db->from("did_you_know");
		$this->db->where(array('status'=>1));		
		$this->db->order_by('id','desc');
		$this->db->limit(1,0); 
		$query = $this->db->get();				
		if ($query->num_rows() > 0) {			
			return $query->result_array();
		}else{
			return false;
		}
	}	
	
	public function get_recent_video(){
		
		$this->db->select('id,titles,youtube_video_id');
		$this->db->from("recent_video");
		$this->db->where(array('status'=>1));		
		$this->db->order_by('id','desc');
		$this->db->limit(1,0); 
		$query = $this->db->get();				
		if ($query->num_rows() > 0) {			
			return $query->result_array();
		}else{
			return false;
		}
	}
	
	public function get_home_poll(){
		
		$this->db->select('id,poll_heading');
		$this->db->from("polls");
		$this->db->where(array('status'=>1));		
		$this->db->order_by('id','desc');
		$this->db->limit(1,0); 
		$query = $this->db->get();				
		if ($query->num_rows() > 0) {			
			return $query->result_array();
		}else{
			return false;
		}
	}
	
	public function get_poll_options($poll_id){
		
		$this->db->select('option_id,option_name');
		$this->db->from("poll_options");
		$this->db->where(array('status'=>1,'poll_id'=>$poll_id));	
		$query = $this->db->get();				
		if ($query->num_rows() > 0) {			
			return $query->result_array();
		}else{
			return false;
		}
	}
	
	public function get_home_quize(){
		
		$this->db->select('quize_id,quize_heading');
		$this->db->from("quizes");
		$this->db->where(array('status'=>1));		
		$this->db->order_by('quize_id','desc');
		$this->db->limit(1,0); 
		$query = $this->db->get();				
		if ($query->num_rows() > 0) {			
			return $query->result_array();
		}else{
			return false;
		}
	}
	
	public function get_quize_options($quize_id){
		
		$this->db->select('option_id,option_details');
		$this->db->from("quize_options");
		$this->db->where(array('status'=>1,'quize_id'=>$quize_id));	
		$query = $this->db->get();				
		if ($query->num_rows() > 0) {			
			return $query->result_array();
		}else{
			return false;
		}
	}
}