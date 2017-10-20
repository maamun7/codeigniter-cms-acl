<?php
class Admin_template{

	var $current_menu = 'home';
	var $sub_menu = '';
	var $page_header = 'Dashboard';
	var $breadcrumb_url = 'admin_dashboard';
	
	public function flash_message()
	{
		$CI =& get_instance();
		
		$message = '';
		$message_class = '';
		$html_msg = '';
		
		if ( $CI->session->userdata('message') != '' )
		{
			$message = $CI->session->userdata('message');
			$message_class = 'alert_success';
		}
		
		if ( $CI->session->userdata('error_message') != '' )
		{
			$message = $CI->session->userdata('error_message');
			$message_class = 'alert_error';
		}else if ( $CI->session->userdata('warning_message') != '')
		{
			$message = $CI->session->userdata('warning_message');
		}

		$data = array(
				'message' => $message,
				'message_class' => $message_class
			);
		if ( $message != '' )
			$html_msg = $CI->parser->parse('admin_view/include/message',$data,true);

		$CI->session->unset_userdata('message');
		$CI->session->unset_userdata('error_message');
		$CI->session->unset_userdata('warning_message');
		return $html_msg;
	}
	
	// Admin html View template
	public function full_admin_html_view($content,$super_sub_menu ='')
	{
		$CI =& get_instance(); 
		$message = $this->flash_message();
		$logged_info='';
		$top_menu='';
		$page_header='';
		$left_menu='';
		
		if ($CI->auth->is_logged())
		{
			$top_menu_template = 'admin_view/include/top_menu';
			$left_menu_template = 'admin_view/include/left_menu';
			$logged_data = 'admin_view/include/admin_loggedin_info';
			$page_header_templ = 'admin_view/include/page_header_info';
			//$full_name = $CI->auth->get_full_name();
		
			// parse menu
			$menu_data = array(
					'active' => $this->current_menu,
					'sub_menu' => $this->sub_menu
			);
			$top_menu = $CI->parser->parse($top_menu_template,$menu_data,true);
			$left_menu = $CI->parser->parse($left_menu_template,$menu_data,true);
				
			// Page Header
			$page_header_data = array(
					'page_header' => $this->page_header,
					'breadcrumb_url' => $this->breadcrumb_url
				);
			$page_header = $CI->parser->parse($page_header_templ,$page_header_data,true);
			
			//Logged Info
			$log_info = array(
					'full_name' => $CI->session->userdata('full_name'),
					'logout' => base_url().'admin/admin_dashboard/logout'
				); 
			$logged_info = $CI->parser->parse($logged_data,$log_info,true);
		}
		
		//Sub Menu
		if ($super_sub_menu != '')
		{
			// insert empty text to non assigned elments
			foreach($super_sub_menu as $k=>$sub){
				if(!isset($sub['title']))$super_sub_menu[$k]['title']='';
				if(!isset($sub['class']))$super_sub_menu[$k]['class']='';
			}
			$super_sub_menu = $CI->parser->parse('admin_view/include/super_sub_menu', array('sup_sub_menu'=>$super_sub_menu),true);
		}
		
		$data = array (
			'top_menu' 	=> $top_menu,
			'logindata' => $logged_info,
			'super_sub_menu' => $super_sub_menu,
			'page_header' 	=> $page_header,
			'left_menu' => $left_menu,
			'content' 	=> $content,
			'msg_content' => $message
		);
		$CI->parser->parse('admin_view/admin_html_template',$data);
	}
	
	// Admin html View template
	public function full_admin_login_view($content)
	{
		$CI =& get_instance(); 
		$message = $this->flash_message();
		$data = array ('msg_content' => $message,'content' => $content);
		$CI->parser->parse('admin_view/user_access/admin_login_template',$data);
	}
}