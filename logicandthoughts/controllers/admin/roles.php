<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Roles extends CI_Controller {
	
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
		$this->auth->check_permission('manage_role');	
		$CI->load->library('admin/lrole');	
        $content = $CI->lrole->generate_role_list();
        $sub_menu = array(
				array('label'=> 'Manage User ', 'url' => 'admin/users'),
				array('label'=> 'Add User', 'url' => 'admin/users/add'),
				array('label'=> 'Manage Role ', 'url' => 'admin/roles','class' =>'active'),
				array('label'=> 'Add Role ', 'url' => 'admin/roles/add_role')
			);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
	
	public function add_role()
	{	
		$CI =& get_instance();
		$CI->auth->check_system_auth();
		$this->auth->check_permission('add_role');
		$CI->load->library('admin/lrole');
		$CI->load->model('admin/role');
			$ar = array('role_name','permission_slug');
            $flag=true;
            foreach($ar as $v){
                if(!isset($_POST[$v])){$flag=false;}
            }			
            if($flag){
                $data=array('role'=> $this->input->post('role_name'),'status'=>1);
                $permission_slug = implode(',',$_POST['permission_slug']);
                $permission_slug = ','.$permission_slug.',';
                $role_id = $this->role->insert_role($data);
                if($role_id){
                    $datas = array('role_id'=>$role_id ,'permission'=>$permission_slug);
                    $this->role->insert_role_permission_relation($datas);
                    $this->session->set_userdata(array('message'=>'Role added successfully.'));
                    $this->index();
                    return;
                }
            }
		$content = $CI->lrole->new_role();
		$sub_menu = array(
				array('label'=> 'Manage User ', 'url' => 'admin/users'),
				array('label'=> 'Add User', 'url' => 'admin/users/add'),
				array('label'=> 'Manage Role ', 'url' => 'admin/roles'),
				array('label'=> 'Add Role ', 'url' => 'admin/roles/add_role','class' =>'active')
			);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
	public function edit_role($role_id){
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('edit_role');
		$this->load->library('admin/lrole');
		$CI->load->model('admin/role');
		if(!$role_id){
			$this->session->set_userdata(array('message'=>"You didn't select role."));
			redirect(base_url('roles'));
		}
		$ar=array('role_name');
		$flag=true;
		foreach($ar as $v){
			if(!isset($_POST[$v])){$flag=false;}
		}
		if($flag){
			$data=array('role'=> $this->input->post('role_name'));
			if($this->roles->do_update($data,$role_id)){
				$this->session->set_userdata(array('message'=>'Role updated successfully.'));
				 $this->index();
				return;
			}
		}
		$content = $this->lrole->role_edit_form($role_id);
		$sub_menu = array(
				array('label'=> 'Manage User ', 'url' => 'admin/users'),
				array('label'=> 'Add User', 'url' => 'admin/users/add'),
				array('label'=> 'Manage Role ', 'url' => 'roles'),
				array('label'=> 'Add Role ', 'url' => 'admin/roles/add_role'),
				array('label'=> 'Edit Role ', 'url' => 'admin/roles/edit_role'.$role_id,'class' =>'active')
			);
	   
		$this->admin_template->full_admin_html_view($content,$sub_menu);

	}
	
	public function permission($role_id){ 
		$CI =& get_instance();
        $this->auth->check_system_auth();
		$this->auth->check_permission('manage_permission');
        $CI->load->library('admin/lrole');
		$CI->load->model('admin/role');
        $flag=true;
        if (isset($_POST['permission_alias'])){
            $data = implode(',',$_POST['permission_alias']);
            $data = ','.$data.',';
        } else {
            $flag=false;
        }
		
        if ($flag){
            $data=array('permission'=> $data);
            if($this->role->update_by_role_id($data,$role_id)){
                $this->session->set_userdata(array('message'=>'Permission updated successfully.'));
            }
        }

        $content = $this->lrole->permission_form($role_id);
		$sub_menu = array(
				array('label'=> 'Manage User ', 'url' => 'admin/users'),
				array('label'=> 'Add User', 'url' => 'admin/users/add'),
				array('label'=> 'Manage Role ', 'url' => 'admin/roles'),
				array('label'=> 'Manage Permissions', 'url' => 'admin/roles/permission/'.$role_id, 'class' => 'active'),
				array('label'=> 'Add Role ', 'url' => 'admin/roles/add_role')
			);

        $this->admin_template->full_admin_html_view($content,$sub_menu);
    }
}