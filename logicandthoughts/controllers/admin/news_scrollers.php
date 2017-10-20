<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News_scrollers extends CI_Controller {
	
	function __construct() {
      parent::__construct();	  
	   $this->admin_template->current_menu = 'news_scroll';
	   $this->admin_template->page_header = 'News Scroller';
	   $this->admin_template->breadcrumb_url = 'news_scroll';
    }
	
	public function index()
	{
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('manage_article');
		$CI->load->library('admin/lnews_scroller');
		$CI->load->model('admin/news_scroller');
		
		$config = array();
		$config["base_url"] = base_url()."admin/news_scrollers/index";
		$config["total_rows"] = $this->news_scroller->count_article_list();	  
		$config["per_page"] = 25;
		$config["uri_segment"] = 4;	
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$limit = $config["per_page"];
	    $links = $this->pagination->create_links();
        $content = $CI->lnews_scroller->get_article_list($limit,$page,$links);
        $sub_menu = array();
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
}