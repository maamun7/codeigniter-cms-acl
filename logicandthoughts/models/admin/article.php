<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Article extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function count_article_list(){
		$this->db->select('*');
		$this->db->from('articles');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->num_rows();	
		}
		return false;
	}
	
	public function retrieve_article_list($limit,$page){
		$this->db->select('a.*,b.categories_name');
		$this->db->from('articles a');		
		$this->db->join('categories b','b.categories_id = a.category_id');
		$this->db->order_by('a.article_id','desc');	
		$this->db->limit($limit,$page); 
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	
	public function retrieve_category_list(){
		$this->db->select('categories_id,categories_name');
		$this->db->from('categories');
		$this->db->where('categories_status',1);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	
	function insert_article_to_db($data)
	{ 	
		$this->db->insert('articles',$data);		
        $article_id =  $this->db->insert_id();
		
		$data1 = array(
			'articles_details_id' 	=> null,
			'articles_id' 			=> $article_id,
			'deatils' 				=> htmlspecialchars($this->input->post('article_details')),
			'image' 				=> ""
		);	
		$this->db->insert('articles_details',$data1);
        return true;
	}
	
	public function retrieve_article_edit_data($article_id){
	
		$this->db->select('a.*,b.*');
		$this->db->from('articles a');		
		$this->db->join('articles_details b','b.articles_id = a.article_id');
		$this->db->where('a.article_id',$article_id);
		$query = $this->db->get();		
		if ($query->num_rows() > 0) {
			return $query->result_array();		
		}
		return false;
	}
	
	public function submit_update_article($data,$article_id)
	{	
		$this->db->where('article_id',$article_id);
		$this->db->update('articles',$data); 			
		
		$data1 = array(
			'deatils' 				=> htmlspecialchars($this->input->post('article_details')),
			'image' 				=> ""
		);	
		
		$this->db->where('articles_id',$article_id);
		$this->db->update('articles_details',$data1); 
        return true;
	}
	
	public function delete_article_featured_img($article_id)
	{
		$thumbs_path = $_SERVER['DOCUMENT_ROOT'].'/uploads/articles/article_fet_img/thumb_img/';
		$this->db->select('featured_image,image_path');
		$this->db->from('articles');
		$this->db->where('article_id',$article_id);
		$query = $this->db->get();
	
		if ($query->num_rows() > 0) {
			foreach($query->result() as $rows){			
				$orgn_image =$rows->image_path.$rows->featured_image;
				if (file_exists($orgn_image)) {
					unlink($orgn_image);
				}
				$thumbs =array(
					array("img_folder"=>"high_img"),
					array("img_folder"=>"latest_img"),
					array("img_folder"=>"bottom_slider")
				);
				foreach($thumbs as $thumb){
					$thum_image = $thumbs_path.$thumb['img_folder']."/".$rows->featured_image;
					if (file_exists($thum_image)) {
						unlink($thum_image);
					}


				}	
			}
		}
		return true;
	}
	
	// Delete Category 
	public function do_delete($article_id)
	{	
		$this->db->where('article_id',$article_id);
		$this->db->delete('articles');
		
		$this->db->where('article_id',$article_id);
		$this->db->delete('articles_details');
		return true;
	}
		//Change Course Name Status
	public function do_status_change($article_id)
	{
		$this->db->select('status');
		$this->db->from('articles');
		$this->db->where('article_id',$article_id); 
		
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$status = $row->status;
			}
		}
		$status = ($status ==1) ? 0 : 1;
		$data=array('status' =>$status);
		$this->db->where('article_id',$article_id);
		$this->db->update('articles',$data); 
		return $status ;
	}
	
	public function do_news_scroll_view_sts_chng($article_id)
	{
		$this->db->select('is_news_scroller_view');
		$this->db->from('articles');
		$this->db->where('article_id',$article_id); 
		
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$status = $row->is_news_scroller_view;
			}
		}
		$status = ($status ==1) ? 0 : 1;
		$data=array('is_news_scroller_view' =>$status);
		$this->db->where('article_id',$article_id);
		$this->db->update('articles',$data); 
		return $status ;
	}
	
	public function do_change_home_page_view_sts($article_id)
	{
		$this->db->select('is_home_view');
		$this->db->from('articles');
		$this->db->where('article_id',$article_id); 
		
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$status = $row->is_home_view;
			}
		}
		$status = ($status ==1) ? 0 : 1;
		$data=array('is_home_view' =>$status);
		$this->db->where('article_id',$article_id);
		$this->db->update('articles',$data); 
		return $status ;
	}	
	public function do_change_latest_article_status($article_id)
	{
		$this->db->select('is_latest_news');
		$this->db->from('articles');
		$this->db->where('article_id',$article_id); 
		
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$status = $row->is_latest_news;
			}
		}
		$status = ($status ==1) ? 0 : 1;
		$data=array('is_latest_news' =>$status);
		$this->db->where('article_id',$article_id);
		$this->db->update('articles',$data); 
		return $status ;
	}
	
	public function retrieve_search_list($key_word)
	{
		$this->db->select('a.*,b.categories_name');
		$this->db->from('articles a');		
		$this->db->join('categories b','b.categories_id = a.category_id');
		$this->db->like('a.article_name',$key_word,'both');
		$this->db->order_by('a.article_id','desc');	
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
}