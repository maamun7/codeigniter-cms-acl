<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Dashboards extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Get Home Slider
	public function get_home_slider(){
		$this->db->select('*');
		$this->db->from("home_slider");
		$this->db->where(array('status'=>1));		
		$this->db->order_by('slider_sorting','asc');
		$this->db->limit(5,0);
		$query = $this->db->get();				
		if ($query->num_rows() > 0) {			
			return $query->result_array();
		}else{
			return false;
		}
	}
	// Get Latest Articles
	public function get_latest_articles(){
		$this->db->select('a.article_id,a.article_name,a.featured_image,b.deatils');
		$this->db->from('articles a');		
		$this->db->join('articles_details b','b.articles_id=a.article_id');
		$this->db->where(array('a.is_latest_news'=>1,'a.status'=>1));
		$this->db->order_by('a.article_id','desc');			
		$this->db->limit(6,0);	
		$query = $this->db->get();				
		if ($query->num_rows() > 0) {			
			return $query->result_array();
		}else{
			return false;
		}
	}	

	public function get_home_articles(){
		$this->db->select('a.article_id,a.article_name,a.featured_image,b.deatils');
		$this->db->from('articles a');		
		$this->db->join('articles_details b','b.articles_id=a.article_id');
		$this->db->where(array('a.is_home_view'=>1,'a.status'=>1));
		$this->db->order_by('a.article_id','desc');			
		$this->db->limit(6,0);	
		$query = $this->db->get();				
		if ($query->num_rows() > 0) {			
			return $query->result_array();
		}else{
			return false;
		}
	}
	
	public function get_bottom_articles(){
		$this->db->select('a.article_id,a.article_name,a.featured_image,a.created_date,b.deatils');
		$this->db->from('articles a');		
		$this->db->join('articles_details b','b.articles_id=a.article_id');
		$this->db->where(array('a.is_news_scroller_view'=>1,'a.status'=>1));
		$this->db->order_by('a.article_id','desc');			
		$this->db->limit(6,0);	
		$query = $this->db->get();				
		if ($query->num_rows() > 0) {			
			return $query->result_array();
		}else{
			return false;
		}
	}
	
	public function retrieve_our_client_list(){
		$this->db->select('company_name,company_logo,web_link');
		$this->db->from('our_clients');
		$this->db->where(array('status'=>1));
		$this->db->order_by('id','desc');			
		$this->db->limit(10,0);		
		$query = $this->db->get();				
		if ($query->num_rows() > 0) {			
			return $query->result_array();
		}else{
			return false;
		}
	}	
	public function get_footer_data(){
		$this->db->select('*');
		$this->db->from('basic_settings');
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
}