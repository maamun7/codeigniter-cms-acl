<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Basic_settings extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->admin_template->current_menu = 'basic_settings';
		$this->admin_template->page_header = 'Basic Settings';
		$this->admin_template->breadcrumb_url = 'basic_settings';
    }
	public function index()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('manage_settings');
		$CI->load->library('admin/lbasic_settings');
		$CI->load->model('admin/basic_setting');		
        $content = $CI->lbasic_settings->generate_list();
        $sub_menu = array(
				array('label'=> 'Manage Settings ', 'url' => 'admin/basic_settings','class' =>'active'),
				array('label'=> 'Add New Settings', 'url' => 'admin/basic_settings/add')
			);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}

	public function add()
	{
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('manage_settings');
		$CI->load->model('admin/basic_setting');
		$CI->load->library('admin/lbasic_settings');
		$ar = array('company_name','company_moto','contact_details', 'email','phone_number', 'mobile_number','logo_height', 'logo_width', 'status');
        $flag=true;
		foreach($ar as $v){
			if(!isset($_POST[$v])){
				$flag=false;
			}else{
			    $data[$v] = $this->input->post($v);
			    ${$v} = $this->input->post($v);
			}
		}	

		if($flag){	
			$key_str = key_generator($length=5);		
			$img_name = $key_str.'-'.time();
			$config['upload_path'] = './my-assets/front/images/common_img/';	
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '5000';
			$config['file_name']= $img_name;
		
			$this->load->library('upload',$config);	
			
			if (!$this->upload->do_upload())
			{
				//$data["error"] = $this->upload->display_errors();
				$error = $this->upload->display_errors();
				$this->session->set_userdata(array('error_message'=>$error));
				redirect(base_url('admin/basic_settings/add'));
			}

			$data = $this->upload->data();		
			$file_name = $data['file_name'];

			$datas['company_name'] = $company_name;
			$datas['company_moto'] = $company_moto;
			$datas['contact_address'] = $contact_details;
			$datas['email_address'] = $email;
			$datas['phone_no'] = $phone_number;
			$datas['mobile_no'] = $mobile_number;
			$datas['logo'] = $file_name;
			$datas['logo_height'] = $logo_height;
			$datas['logo_width'] = $logo_width;
			$datas['created_on'] = date('Y-m-d');
			$datas['status'] = 1;
			$this->basic_setting->insert_basic_info($datas);
			
			$this->session->set_userdata(array('message'=>"Successfully Added !"));
			redirect(base_url('admin/basic_settings'));
			exit;
		}			
		$content = $CI->lbasic_settings->get_add_form();
		$sub_menu = array(
			array('label'=> 'Manage Settings ', 'url' => 'admin/basic_settings'),
			array('label'=> 'Add New Settings', 'url' => 'admin/basic_settings/add','class' =>'active')
		);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}

	public function edit($setting_id =null)
	{
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('manage_settings');
		$CI->load->model('admin/basic_setting');
		$CI->load->library('admin/lbasic_settings');
		$ar = array('setting_id','company_name','company_moto', 'contact_details', 'email','phone_number', 'mobile_number','logo_height', 'logo_width', 'status');
        $flag=true;
		foreach($ar as $v){
			if(!isset($_POST[$v])){
				$flag=false;
			}else{
			    $data[$v] = $this->input->post($v);
			    ${$v} = $this->input->post($v);
			}
		}	

		if($flag){
			$file = $_FILES['userfile']['name'];
			if($file!='')
			{
				$key_str = key_generator($length=5);		
				$img_name = $key_str.'-'.time();
				$config['upload_path'] = './my-assets/front/images/common_img/';	
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']	= '5000';
				$config['file_name']= $img_name;
			
				$this->load->library('upload',$config);	
				
				if (!$this->upload->do_upload())
				{
					//$data["error"] = $this->upload->display_errors();
					$error = $this->upload->display_errors();
					$this->session->set_userdata(array('error_message'=>$error));
					redirect(base_url('admin/basic_settings/add'));
				}

				$data = $this->upload->data();		
				$file_name = $data['file_name'];
			}

			$datas['company_name'] = $company_name;
			$datas['company_moto'] = $company_moto;
			$datas['contact_address'] = $contact_details;
			$datas['email_address'] = $email;
			$datas['phone_no'] = $phone_number;
			$datas['mobile_no'] = $mobile_number;
			if($file!='') { $datas['logo'] = $file_name;}
			$datas['logo_height'] = $logo_height;
			$datas['logo_width'] = $logo_width;
			$datas['created_on'] = date('Y-m-d');
			$datas['status'] = 1;
			$this->basic_setting->update_basic_info($datas,$setting_id);
			
			$this->session->set_userdata(array('message'=>"Successfully Added !"));
			redirect(base_url('admin/basic_settings'));
			exit;
		}
	/*	$setting_id = $this->input->post("setting_id",true);
		if(!isset($setting_id)){
			$this->session->set_userdata(array('message'=>"You didn't select purchase!"));
			redirect(base_url('admin/basic_settings'));
		}	*/		
		$content = $CI->lbasic_settings->get_edit_data($setting_id);
		$sub_menu = array(
			array('label'=> 'Manage Settings ', 'url' => 'admin/basic_settings'),
			array('label'=> 'Add New Settings', 'url' => 'admin/basic_settings'),
			array('label'=> 'Edit Basic Settings', 'url' => 'admin/basic_settings/edit/'.$setting_id,'class' =>'active')
		);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
}