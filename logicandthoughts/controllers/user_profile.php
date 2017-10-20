<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_profile extends CI_Controller {

	function __construct() {
      parent::__construct();
    }
	public function index()
	{
		$CI =& get_instance();
		$CI->auth->is_not_logged_in();
		$CI->load->library('front_lib/lprofile');
		
		$content = $CI->lprofile->get_user_all_info();		
		$this->template->full_html_view($content);
	}
		
	public function edit_full_name()
	{
		$CI =& get_instance();
		$CI->auth->is_not_logged_in();
		$CI->load->library('front_lib/lprofile');
		$content = $CI->lprofile->get_edit_full_name_view();	
		$this->template->full_html_view($content);
	}
	public function do_user_full_name_edit()
	{	
		$CI =& get_instance();
		$CI->auth->is_not_logged_in();
		$CI->load->model('front/profiles');

		$password = md5("tiger_cricket".$CI->input->post('password'));
		
		$is_exist = $CI->profiles->check_old_password( $password );
		

		if($is_exist)
		{
			$data =array(
				"user_name"	=> $this->input->post('full_name')
				);
			$CI->profiles->user_info_update( $data );
			
			$CI->session->set_userdata(array('message'=>"Successfully Changed"));
			redirect(base_url('front/user_profile'));exit();
			
		}else{
		
			$CI->session->set_userdata(array('warning_message'=>"Sorry Password Doesn't Match"));
			redirect(base_url('front/user_profile/edit_user_info'));exit();
		}
		
	}
	
	public function edit_user_cellno()
	{
		$CI =& get_instance();
		$CI->auth->is_not_logged_in();
		$CI->load->library('front_lib/lprofile');
		$content = $CI->lprofile->get_edit_user_cellno_view();	
		$this->template->full_html_view($content);
	}
		
	public function do_user_cellno_edit()
	{	
		$CI =& get_instance();
		$CI->auth->is_not_logged_in();
		$CI->load->model('front/profiles');
		
		
		$password = md5("tiger_cricket".$CI->input->post('password'));
		
		$is_exist = $CI->profiles->check_old_password( $password );
		

		if($is_exist)
		{
			$data =array(
				"mobile_no"	=> $this->input->post('mobile_no')
				);
			$CI->profiles->user_info_update( $data );
			
			$CI->session->set_userdata(array('message'=>"Successfully Changed"));
			redirect(base_url('front/user_profile'));exit();
			
		}else{
		
			$CI->session->set_userdata(array('warning_message'=>"Sorry Password Doesn't Match"));
			redirect(base_url('front/user_profile/edit_user_info'));exit();
		}
	}
	
	public function change_user_password()
	{
		$CI =& get_instance();
		$CI->auth->is_not_logged_in();
		$CI->load->library('front_lib/lprofile');
		$content = $CI->lprofile->get_change_password_view();	
		$this->template->full_html_view($content);
	}
	
	public function do_password_change()
	{	
		$CI =& get_instance();
		$CI->auth->is_not_logged_in();
		$CI->load->model('front/profiles');
		
		
		$old_pass = md5("tiger_cricket".$CI->input->post('old_pass'));
		$new_pass = md5("tiger_cricket".$CI->input->post('new_pass'));
		
		$is_exist = $CI->profiles->check_old_password( $old_pass );
		

		if($is_exist)
		{
			$data =array("password"=>$new_pass);
			$CI->profiles->change_password( $old_pass,$data );
			
			$CI->session->set_userdata(array('message'=>"Successfully Password Changed"));
			redirect(base_url('front/user_profile'));exit();
			
		}else{
		
			$CI->session->set_userdata(array('warning_message'=>"Sorry Old Password Doesn't Match"));
			redirect(base_url('front/user_profile/change_user_password'));exit();
		}
	}
}