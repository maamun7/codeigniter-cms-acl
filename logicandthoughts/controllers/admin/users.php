<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->admin_template->current_menu = 'users';
		$this->admin_template->page_header = 'Users';
		$this->admin_template->breadcrumb_url = 'users';
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
	//user Add Form
	public function add()
	{	
		$CI =& get_instance();
		$CI->auth->check_system_auth();
		$this->auth->check_permission('add_user');
		$CI->load->library('admin/luser');
		$content = $CI->luser->new_user();
		$sub_menu = array(
				array('label'=> 'Manage User ', 'url' => 'admin/users'),
				array('label'=> 'Add User', 'url' => 'admin/users/add','class' =>'active'),
				array('label'=> 'Manage Role ', 'url' => 'admin/roles'),
				array('label'=> 'Add Role ', 'url' => 'admin/roles/add_role')
			);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
	//Insert user and uload
	public function insert_user()
	{
		$CI =& get_instance();
		$CI->auth->check_system_auth();
		$this->auth->check_permission('add_user');
		$CI->load->model('admin/user');
		$basic_data = array(
			'user_id' 		=> Null,
			'first_name' 	=> $this->input->post('first_name'),
			'last_name' 	=> $this->input->post('last_name'),
			'designition' 	=> $this->input->post('designation'),
			'address' 		=> $this->input->post('address'),
			'status' 		=> 1
		);
		$user_id = $CI->user->insert_basic_info($basic_data);
		$login_data = array(
			'user_id' 		=> $user_id,
			'username' 		=> $this->input->post('email'),
			'password' 		=> md5("tiger_cricket".$this->input->post('password')),
			'user_type' 	=> 2,
			'is_active' 	=> $this->input->post('is_active'),
			'can_login' 	=> $this->input->post('can_login')
		);
		$CI->user->insert_login_info($login_data);
		
		$role_relation = array(
			'id' 		=> null,
			'user_id' 	=> $user_id,
			'role_id' 	=> $this->input->post('role_id')
		);
		$CI->user->insert_user_role_relation($role_relation);
		
		$this->session->set_userdata(array('message'=>"New User Added Successfully!"));
		redirect(base_url('admin/users'));
		exit;
	}
	//user Update Form
	public function edit($user_id = Null)
	{	
		$CI =& get_instance();
		$CI->auth->check_system_auth();
		$this->auth->check_permission('edit_user');
		$CI->load->library('admin/luser');
		if(!$user_id){
			$this->session->set_userdata(array('message'=>"You didn't Select User !"));
			redirect(base_url('admin/users'));
		}
		$content = $CI->luser->get_edit_data($user_id);
		$sub_menu = array(
				array('label'=> 'Manage User ', 'url' => 'admin/users'),
				array('label'=> 'Add User', 'url' => 'admin/users/add'),
				array('label'=> 'Edit User', 'url' => 'admin/users/edit/'.$user_id,'class' =>'active'),
				array('label'=> 'Manage Role ', 'url' => 'admin/roles'),
				array('label'=> 'Add Role ', 'url' => 'admin/roles/add_role')
			);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
	// user Update
	public function user_update()
	{
		$CI =& get_instance();
		$CI->auth->check_system_auth();
		$this->auth->check_permission('edit_user');
		$CI->load->model('admin/user');
		$user_id  = $this->input->post('user_id');
		$basic_data = array(
			'first_name' 	=> $this->input->post('first_name'),
			'last_name' 	=> $this->input->post('last_name'),
			'designition' 	=> $this->input->post('designation'),
			'address' 		=> $this->input->post('address'),
			'status' 		=> 1
		);
		$CI->user->update_basic_info($basic_data,$user_id);
		$login_data = array(
			'username' 		=> $this->input->post('email'),
			'password' 		=> md5("matroak".$this->input->post('password')),
			'user_type' 	=> 2,
			'is_active' 	=> $this->input->post('is_active'),
			'can_login' 	=> $this->input->post('can_login')
		);
		$CI->user->update_login_info($login_data,$user_id);
		
		$role_relation=array(
			'user_id' 	=> $user_id,
			'role_id' 	=> $this->input->post('role_id')
		);
		$CI->user->update_user_role_relation($role_relation,$user_id);
		$this->session->set_userdata(array('message'=>"User Successfully Edited!"));
		redirect(base_url('admin/users'));
		exit;
	}
	// user_delete
	public function user_delete()
	{	
		$CI =& get_instance();
		$this->auth->check_admin_auth();
		$CI->load->model('admin/user');
		$user_id =  $_POST['user_id'];
		$CI->user->delete_user($user_id);
		return true;
			
	}
}