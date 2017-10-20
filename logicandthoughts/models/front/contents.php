<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Contents extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	

	public function count_article_for_this_category($category_id){
		$this->db->select('a.article_id');
		$this->db->from('articles a');
		$this->db->where(array('a.status'=>1,'a.category_id'=>$category_id));
		$query = $this->db->get();				
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		}else{
			return false;
		}
	}	

	public function retrieve_content($content_id){
		$this->db->select('a.article_id,a.article_name,a.featured_image,a.created_date,b.deatils,c.categories_id,c.categories_name');
		$this->db->from('articles a');
		$this->db->join('articles_details b','b.articles_id=a.article_id');
		$this->db->join('categories c','c.categories_id=a.category_id');
		$this->db->where(array('a.status'=>1,'a.article_id'=>$content_id));	
		$query = $this->db->get();				
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}else{
			return false;
		}
	}	
	
	public function retrieve_related_category($category_id){
         $this->db->select('b.featured_image,b.article_id');
         $this->db->where('a.categories_id',$category_id);
         $this->db->join('categories a','a.categories_id = b.category_id');
         $query = $this->db->get('articles b');
         if ($query->num_rows() > 0) {
               return $query->result_array();
         }else{
               return false;
         }
	}
    public function get_single_category($limit,$page,$category_id){
		$this->db->select('a.categories_id,a.categories_name,b.article_id,b.article_name,b.featured_image,b.created_date,c.deatils');
		$this->db->from('categories a');
		$this->db->join('articles b','b.category_id=a.categories_id');
		$this->db->join('articles_details c','c.articles_id=b.article_id');
		$this->db->where(array('a.categories_status'=>1,'b.status'=>1,'a.categories_id'=>$category_id));
		$this->db->order_by('b.article_id','desc');
		//$this->db->limit(4,0);
		$this->db->limit($limit,$page);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}else{
			return false;
		}
	}
	
	public function get_contact_us_data(){
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