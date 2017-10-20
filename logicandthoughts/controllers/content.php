<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Content extends CI_Controller {
	function __construct() {
        parent::__construct();
      }
	public function view_content($content_id)
	{
		$CI =& get_instance();	
		$CI->load->library('front_lib/lcontent');
		if(!$content_id){
			redirect(base_url());
			exit();
		}
		$content = $CI->lcontent->get_content($content_id);
		$this->template->front_main_view($content);
	}
          
	public function view_category($category_id)
	{
		$CI =& get_instance();	
		$CI->load->library('front_lib/lcontent');
		$CI->load->model('front/contents');
		if(!$category_id){
			redirect(base_url());
			exit();
		}	
		$config = array();
		$config["base_url"] = base_url()."content/view_category/".$category_id;
		$config["total_rows"] = $this->contents->count_article_for_this_category($category_id);	  
		$config["per_page"] = 6;
		$config["uri_segment"] = 4;	
		$config['cur_tag_open'] = '<a href="#" class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['prev_link'] = '&lt; Prev';
		$config['next_link'] = 'Next &gt;';
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$limit = $config["per_page"];
	    $links = $this->pagination->create_links();
		
		$content = $CI->lcontent->get_category($limit,$page,$links,$category_id);
        $this->template->front_main_view($content);
	}

	public function contact_us()
	{
		$CI =& get_instance();	
		$CI->load->library('front_lib/lcontent');
		$content = $CI->lcontent->get_contact_us_view();
		$this->template->front_main_view($content);
	}
	
}