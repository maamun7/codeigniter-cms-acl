<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class System_settings extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->admin_template->current_menu = 'system_settings';
		$this->admin_template->page_header = 'System Settings';
		$this->admin_template->breadcrumb_url = 'system_settings';
    }
	public function index()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('manage_user');
		$CI->load->library('admin/luser');
		$CI->load->model('admin/user');
		
		$config = array();
		$config["base_url"] = base_url()."admin/users/index";
		$config["total_rows"] = $this->user->count_user();	  
		$config["per_page"] = 50;
		$config["uri_segment"] = 3;	
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$limit = $config["per_page"];
	    $links = $this->pagination->create_links();
		
        $content = $CI->luser->generate_list($limit,$page,$links);
        $sub_menu = array(
				array('label'=> 'Manage User ', 'url' => 'admin/users','class' =>'active'),
				array('label'=> 'Add User', 'url' => 'admin/users/add'),
				array('label'=> 'Manage Role ', 'url' => 'admin/roles'),
				array('label'=> 'Add Role ', 'url' => 'admin/roles/add_role')
			);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
}