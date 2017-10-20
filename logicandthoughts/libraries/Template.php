<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
class Template{

	public function flash_message()
	{
		$CI =& get_instance();
		
		$message = '';
		$message_class = '';
		$html = '';
		
		if ( $CI->session->userdata('message') != '' )
		{
			$message = $CI->session->userdata('message');
			$message_class = 'success';
		}
		
		if ( $CI->session->userdata('error_message') != '' )
		{
			$message = $CI->session->userdata('error_message');
			$message_class = 'warning';
			
		}else if ($CI->session->userdata('info_message') != '')
		{
			$message = $CI->session->userdata('info_message');
			$message_class = 'info';
		}

		$data = array(
				'message' => $message,
				'message_class' => $message_class
			);

		if ( $message != '' )
			$html = $CI->parser->parse('front_view/include/message',$data,true);

		$CI->session->unset_userdata('message');
		$CI->session->unset_userdata('error_message');
		$CI->session->unset_userdata('info_message');

		return $html;
	}
	
	//fornt-home-page-view
	public function front_home_view($content)
	{
		$CI =& get_instance(); 
		$CI->load->library('front_lib/lmenus');	
		$CI->load->library('front_lib/ldashboard');	
		$CI->load->library('front_lib/lclient_list');	
		
		$top_menu_template = 'front_view/include/top_menu';
		$main_menu_template = 'front_view/include/main_menu_template';				
		$footer_template = 'front_view/include/footer_template';			

		/* Loged in info */
		$logged_info = "";
		if ($CI->auth->is_logged())
		{
			$loggedin_info = 'front_view/include/user_loggedin_info';
			$log_info = array(
					'full_name' => $CI->session->userdata('full_name'),
					'logout_link' =>base_url()."users/logout"
				); 
			$logged_info = $CI->parser->parse($loggedin_info,$log_info,true);
		}

		/* Header Data*/
		$header_view = $CI->ldashboard->get_header_view();

		/*... Main menu bar... */
		$main_menu_data_from_db = $CI->lmenus->main_menu_data();
		$main_menu_data = array('main_menu_info'=>$main_menu_data_from_db);
		$main_menu_bar = $CI->parser->parse($main_menu_template,$main_menu_data,true);	
		
		/* ...Main Slider... */
		$main_home_slider = $CI->ldashboard->get_home_slider_data();
		
		/* .. Client List Slider... */
		$our_client = $CI->lclient_list->get_our_client_list();

		/* Footer Data*/
		$footer_view = $CI->ldashboard->get_footer_view();

		$data = array (
		 	'header' 		  	  => $header_view,
		 	'logindata' 		  => '',
			'message' 			  => $this->flash_message(),
			'logged_info' 		  => $logged_info,
			'main_navigation_bar' => $main_menu_bar,
			'header_contents' 	  => $main_home_slider,
			'our_clients' 	  	  => $our_client,
			'content'   		  => $content,
			'footer'   		 	  => $footer_view
		);
		$CI->parser->parse('front_view/front_template.php',$data);
	}	
	
	//fornt-all-page-view
	public function front_main_view($content)
	{
		$CI =& get_instance(); 
		$CI->load->library('front_lib/lmenus');	
		$CI->load->library('front_lib/ldashboard');	
		$CI->load->library('front_lib/lclient_list');	
		
		$top_menu_template = 'front_view/include/top_menu';
		$main_menu_template = 'front_view/include/main_menu_template';		
		$main_slider = 'front_view/home/homepage_slider';		

		/* Loged in info */
		$logged_info = "";
		if ($CI->auth->is_logged())
		{
			$loggedin_info = 'front_view/include/user_loggedin_info';
			$log_info = array(
					'full_name' => $CI->session->userdata('full_name'),
					'logout_link' =>base_url()."users/logout"
				); 
			$logged_info = $CI->parser->parse($loggedin_info,$log_info,true);
		}
		/* Header Data*/
		$header_view = $CI->ldashboard->get_header_view();

		/*... Main menu bar... */
		$main_menu_data_from_db = $CI->lmenus->main_menu_data();
		$main_menu_data = array('main_menu_info'=>$main_menu_data_from_db);
		$main_menu_bar = $CI->parser->parse($main_menu_template,$main_menu_data,true);		
		
		/* .. Client List Slider... */
		$our_client = $CI->lclient_list->get_our_client_list();

		/* Footer Data*/
		$footer_view = $CI->ldashboard->get_footer_view();

		$data = array (
			'header' 		  	  => $header_view,
		 	'logindata' 		  => '',
			'message' 			  => $this->flash_message(),
			'logged_info' 		  => $logged_info,
			'main_navigation_bar' => $main_menu_bar,
			'our_clients' 	  	  => $our_client,
			'content'   		  => $content,
			'footer'   		 	  => $footer_view
		);
		$CI->parser->parse('front_view/front_template.php',$data);	
	}
}