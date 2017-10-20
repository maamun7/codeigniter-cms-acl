<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Dashboard extends CI_Controller {
	
	function __construct() {
      parent::__construct();
    }
	public function index()
	{
		$CI =& get_instance();	
		$CI->load->library('front_lib/ldashboard');		
		$content = $CI->ldashboard->get_home_data();
		$this->template->front_home_view($content);
	}
}