<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Categories extends CI_Controller {
	
	function __construct() {
      parent::__construct();	  
	   $this->admin_template->current_menu = 'categories';
	   $this->admin_template->page_header = 'Category';
	   $this->admin_template->breadcrumb_url = 'categories';
    }
	
	public function index()
	{
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('manage_category');
		$CI->load->library('admin/lcategory');
		$CI->load->model('admin/category');
		
		$config = array();
		$config["base_url"] = base_url()."admin/categories/index";
		$config["total_rows"] = $this->category->count_category_list();	  
		$config["per_page"] = 20;
		$config["uri_segment"] = 4;	
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$limit = $config["per_page"];
	    $links = $this->pagination->create_links();
		
        $content = $CI->lcategory->get_category_list($limit,$page,$links);
        $sub_menu = array(
				array('label'=> 'Manage Category', 'url' => 'admin/categories', 'class' =>'active'),
				array('label'=> 'Add Category', 'url' => 'admin/categories/add_category')
			);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
	
	public function add_category()
	{
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('add_category');
		$data['title'] = "Add new category";
		$content = $this->parser->parse('admin_view/categories/add_category',$data,true);
		$sub_menu = array(
				array('label'=> 'Manage Category', 'url' => 'admin/categories','class' =>'active'),
				array('label'=> 'Add Category', 'url' => 'admin/categories/add_category')
			);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
	
	public function insert_category()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('add_category');
		$CI->load->model('admin/category');		
		$data = array(
			'categories_id' 	=> null,
			'categories_name' 	=> $this->input->post('category_name'), 
			'categories_status' => $this->input->post('status'),
			'created_date' 		=> date('Y-m-d',time())
		);	
		
		$CI->category->insert_category($data);		
 		if(isset($_POST['add-category'])){
			$this->session->set_userdata(array('message'=>"Category Successfully Added !"));
			redirect(base_url('admin/categories'));
		}elseif(isset($_POST['form-cancel'])){
			redirect(base_url('admin/categories'));
		}
	}
	
	public function category_update_form($cat_id = Null)
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('edit_category');
		$CI->load->library('admin/lcategory');
		if(!$cat_id){
			$this->session->set_userdata(array('message'=>"You didn't select Category !"));
			redirect(base_url('admin/categories'));
		}
		$content = $CI->lcategory->category_edit_data($cat_id);
		$sub_menu = array(
			array('label'=> 'Manage Category', 'url' => 'admin/categories'),
			array('label'=> 'Add Category', 'url' => 'admin/categories/add_category'),
			array('label'=> 'Update Category', 'url' => 'admin/categories/category_update_form','class' =>'active')
		);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
	
	//Product Update
	public function category_update()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('edit_category');
		$CI->load->model('admin/category');
		
		$category_id = $this->input->post('category_id');
		$data = array(
			'categories_name' 	=> $this->input->post('category_name'), 
			'categories_status' => $this->input->post('status'),
			'modyfied_date' 		=> date('Y-m-d',time())
		);
		$CI->category->update_category($data,$category_id);	
		$this->session->set_userdata(array('message'=>"Successfully Updated !"));
		redirect(base_url('admin/categories'));
		exit;
	}
		
	//Delate Category
	public function delete_category()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('delete_category');
		$CI->load->model('admin/category');
		$cat_id =  $_POST['cat_id'];	
		$status = $CI->category->remove_category($cat_id);
		echo $status;
	}

	//Status change Home Category
	public function change_category_status()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('manage_category');
		$CI->load->model('admin/category');
		$cat_id =  $_POST['cat_id'];	
		$status = $CI->category->category_status_change($cat_id);
		echo $status;
	}
	
	public function category_search_list()
	{
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('manage_category');
		$CI->load->library('admin/lcategory');
		$key_word = $this->input->post('key_word');
        $content = $CI->lcategory->get_search_result($key_word);
        $sub_menu = array(
				array('label'=> 'Manage Category', 'url' => 'admin/categories', 'class' =>'active'),
				array('label'=> 'Add Category', 'url' => 'admin/categories/add_category')
			);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
}