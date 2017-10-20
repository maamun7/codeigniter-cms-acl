<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Permissions extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->admin_template->current_menu = 'users';
		$this->admin_template->page_header = 'Users';
		$this->admin_template->breadcrumb_url = 'users';
    }
	public function index()
	{	
		$CI =& get_instance();
		$CI->load->model('admin/permission');
		$this->auth->check_system_auth();
		$permission = $CI->permission->get_permission_list();	
		$i=0;
		if(!empty($permission)){		
			foreach($permission as $k=>$v){$i++;
			   $permission[$k]['sl']=$i;
			}
		}
		$data = array(
				'title' => 'Permission List',
				'permissions' => $permission
			);
		$content = $CI->parser->parse('admin_view/roles/permission_list',$data,true);
        $sub_menu = array(
				array('label'=> 'Manage Permission ', 'url' => 'admin/permissions','class' =>'active'),
				array('label'=> 'Add Permission', 'url' => 'admin/permissions/add')
			);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
	
	public function add()
	{	
		$CI =& get_instance();
		$CI->auth->check_system_auth();
		$CI->load->model('admin/permission');
		
		$ar = array('group_id','permission','permission_alias');
		$flag=true;
		foreach($ar as $v){
			if(!isset($_POST[$v])){$flag=false;}
		}			
		if($flag){
			$data = array(
					'permission'		=>$this->input->post('permission'),
					'permission_alias'	=>$this->input->post('permission_alias'),
					'created_on'		=>date('Y-m-d',time()),
					'group_id'			=>$this->input->post('group_id')
				);
			$this->permission->insert_permission($data);
			$this->session->set_userdata(array('message'=>'Role added successfully.'));
			$this->index();
			return;	
		}
		$datas = array('groups'=>$CI->permission->get_permission_group_list());
		$content = $CI->parser->parse('admin_view/roles/add_permission',$datas,true);
		$sub_menu = array(
			array('label'=> 'Manage Permission ', 'url' => 'admin/permissions'),
			array('label'=> 'Add Permission', 'url' => 'admin/permissions/add','class' =>'active')
		);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
}