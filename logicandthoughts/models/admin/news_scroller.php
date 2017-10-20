<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News_scroller extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function count_article_list(){
		$this->db->select('*');
		$this->db->from('articles');
		$this->db->where('is_news_scroller_view',1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->num_rows();	
		}
		return false;
	}
	
	public function retrieve_article_list($limit,$page){
		$this->db->select('a.*,b.sub_cat_name,c.categories_name');
		$this->db->from('articles a');		
		$this->db->join('sub_categories b','b.sub_cat_id = a.sub_cat_id');
		$this->db->join('categories c','c.categories_id = b.parent_id');
		$this->db->where('a.is_news_scroller_view',1);
		$this->db->order_by('a.article_id','desc');	
		$this->db->limit($limit,$page); 
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}

}