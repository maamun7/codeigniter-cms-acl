<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main_menus extends CI_Controller {
	
	function __construct() {
      parent::__construct();	  
	   $this->admin_template->current_menu = 'main_menu';
	   $this->admin_template->page_header = 'Main Menu';
	   $this->admin_template->breadcrumb_url = 'main_menu';
    }
	
	public function index()
	{
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('manage_main_menu');
		$CI->load->library('admin/lmain_menu');
		$CI->load->model('admin/main_menu');
		
		$config = array();
		$config["base_url"] = base_url()."admin/main_menus/index";
		$config["total_rows"] = $this->main_menu->count_menu_list();	  
		$config["per_page"] = 50;
		$config["uri_segment"] = 4;	
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$limit = $config["per_page"];
	    $links = $this->pagination->create_links();
		
        $content = $CI->lmain_menu->get_list($limit,$page,$links);
        $sub_menu = array(
				array('label'=> 'Manage Main Menu', 'url' => 'admin/main_menus','class' =>'active'),
				array('label'=> 'Add Main Menu', 'url' => 'admin/main_menus/add')
			);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
	
	public function add()
	{
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('add_main_menu');
		$CI->load->library('admin/lmain_menu');
		$data['title'] = "Add new menu";
		$content = $CI->lmain_menu->add_form();	
		$sub_menu = array(
			array('label'=> 'Manage Main Menu', 'url' => 'admin/main_menus'),
			array('label'=> 'Add Main Menu', 'url' => 'admin/main_menus/add','class' =>'active')
		);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
	
	public function menu_selection_type()
	{
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('manage_main_menu');
		$CI->load->view("admin_view/main_menus/menu_type_modal");
	}
	
	public function all_single_article()
	{
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('manage_main_menu');
		$CI->load->model('admin/main_menu');
		$datas = array("article_list" =>$this->main_menu->get_all_single_article());
		$CI->load->view("admin_view/main_menus/single_article_modal",$datas);
	}
	
	public function all_category()
	{
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('manage_main_menu');
		$CI->load->model('admin/main_menu');
		$datas = array("category_list" =>$this->main_menu->get_all_category());
		$CI->load->view("admin_view/main_menus/category_list_modal",$datas);
	}
	
	public function insert()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('add_main_menu');
		$CI->load->model('admin/main_menu');
		
		$content_id = $this->input->post('content_id');
		$menu_links = $this->input->post('menu_links');
		$menu_item_type = $this->input->post('menu_item_type');
		if(isset($menu_item_type) && ($menu_item_type=="External Link")) {
			$menu_links = "http://".$menu_links;
		}else{
			$menu_links = base_url().$menu_links;			
		}
		$menu_title = $this->input->post('menu_title');
		$menu_alias = $this->input->post('menu_alias');
		if($menu_alias =="" ){
			$menu_alias = strtolower($this->input->post('menu_title'));
		}else{
			$menu_alias = strtolower($this->input->post('menu_alias'));
		}
		$data = array(
			'id' 	=> null,
			'menutype' 			=> $this->input->post('menu_type'),
			'name' 				=> $this->input->post('menu_title'), 
			'alias' 			=> $menu_alias , 
			'link' 				=> $menu_links, 
			'published' 		=> $this->input->post('status'),
			'parent' 			=> $this->input->post('parent_id'),
			'contentid' 		=> $this->input->post('content_id'),
			'meta_description'	=> $this->input->post('meta_description'),
			'meta_keyword' 		=> $this->input->post('meta_keyword'),
			'created_date' 		=> date('Y-m-d',time()),
			'menu_icon' 		=> $this->input->post('menu_icon'),
			'bottom_text' 		=> $this->input->post('menu_bottom_txt')
		);	
		
		$CI->main_menu->do_entry($data);		
		$this->session->set_userdata(array('message'=>"Successfully Added !"));
		redirect(base_url('admin/main_menus'));
		exit;
	}
	
	public function edit($menu_id = Null)
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('edit_main_menu');
		$CI->load->library('admin/lmain_menu');
		if(!$menu_id){
			$this->session->set_userdata(array('message'=>"You didn't select menu !"));
			redirect(base_url('admin/sub_categories'));
		}
		$content = $CI->lmain_menu->get_edit_data($menu_id);
		$sub_menu = array(
			array('label'=> 'Manage Menu', 'url' => 'admin/main_menus'),
			array('label'=> 'Add Menu', 'url' => 'admin/main_menus/add'),
			array('label'=> 'Edit Menu', 'url' => 'admin/main_menus','class' =>'active')
		);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
	
	//Product Update
	public function update()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('edit_main_menu');
		$CI->load->model('admin/main_menu');
		
		$menu_title = $this->input->post('menu_title');
		$menu_alias = $this->input->post('menu_alias');
		if($menu_alias =="" ){
			$menu_alias = strtolower($this->input->post('menu_title'));
		}else{
			$menu_alias = strtolower($this->input->post('menu_alias'));
		}
		
		$menu_id = $this->input->post('menu_id');
		$menu_links = $this->input->post('menu_links');
		$menu_item_type = $this->input->post('menu_item_type');

		if(isset($menu_item_type) && ($menu_item_type=="External Link")) {
			$menu_links = "http://".$menu_links;
		}else{
			$menu_links = base_url().$menu_links;			
		}
		$data = array(
			'menutype' 			=> $this->input->post('menu_type'),
			'name' 				=> $this->input->post('menu_title'), 
			'alias' 			=> $menu_alias , 
			'link' 				=> $menu_links, 
			'published' 		=> $this->input->post('status'),
			'parent' 			=> $this->input->post('parent_id'),
			'contentid' 		=> $this->input->post('content_id'),
			'meta_description'	=> $this->input->post('meta_description'),
			'meta_keyword' 		=> $this->input->post('meta_keyword'),
			'modified_date' 		=> date('Y-m-d',time()),
			'menu_icon' 		=> $this->input->post('menu_icon'),
			'bottom_text' 		=> $this->input->post('menu_bottom_txt')
		);	
		
		$CI->main_menu->do_update($data,$menu_id);	
		$this->session->set_userdata(array('message'=>"Successfully Updated !"));
		redirect(base_url('admin/main_menus'));
		exit;
	}
		
	//Delate menu
	public function delete()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('delete_main_menu');
		$CI->load->model('admin/main_menu');
		$menu_id =  $_POST['menu_id'];	
		$status = $CI->main_menu->do_delete($menu_id);
		echo $status;
	}

	//Status change Home menu
	public function change_status()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('change_main_menu_status');
		$CI->load->model('admin/main_menu');
		$menu_id =  $_POST['menu_id'];	
		$status = $CI->main_menu->do_change_status($menu_id);
		echo $status;
	}
	
	public function search_list()
	{
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('manage_main_menu');
		$CI->load->library('admin/lmain_menu');
		$key_word = $this->input->post('key_word');
        $content = $CI->lmain_menu->get_search_result($key_word);
        $sub_menu = array(
			array('label'=> 'Manage Main Menu', 'url' => 'admin/main_menus','class' =>'active'),
			array('label'=> 'Add Main Menu', 'url' => 'admin/main_menus/add')
		);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
		
	//Status change Home menu
	public function update_ordering()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('manage_main_menu');
		$CI->load->model('admin/main_menu');
		$status = $CI->main_menu->do_update_ordering();
		echo $status;
	}
}