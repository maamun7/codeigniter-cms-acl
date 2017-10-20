<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_dashboard extends CI_Controller {
	
	function __construct() {
      parent::__construct();
    }
	public function index()
	{
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('manage_home');
		$data = array();
		$content = $this->parser->parse('admin_view/home/dashboard',$data,true);
		$this->admin_template->full_admin_html_view($content);
	}
	
	public function login()
	{	
		if ($this->auth->is_logged() )
		{
			$this->output->set_header("Location: ".base_url().'admin/admin_dashboard', TRUE, 302);
		}
		$data['title'] = "Admin Login Area";
        $content = $this->parser->parse('admin_view/user_access/admin_login_form',$data,true);
		$this->admin_template->full_admin_login_view($content);
	}
	
	// Valid User Check...	
	public function do_login()
	{	
		//$this->load->model('Users');
		$error = '';
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ( $username == '' || $password == '' || $this->auth->admin_login( $username,$password ) === FALSE )
		{
			$error = 'Wrong user name or password';
		}
		if ( $error != '' )
		{
			$this->session->set_userdata(array('error_message'=>$error));
			$this->output->set_header("Location: ".base_url().'admin/admin_dashboard/login', TRUE, 302);
		}else{
			$this->output->set_header("Location: ".base_url().'admin/admin_dashboard', TRUE, 302);
        }
	}
	public function logout()
	{	
		if ($this->auth->logout())
		$this->output->set_header("Location: ".base_url().'admin/admin_dashboard/login', TRUE, 302);
	
	}
}