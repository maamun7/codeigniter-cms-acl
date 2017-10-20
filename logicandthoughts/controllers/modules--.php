<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Modules extends CI_Controller {
	function __construct() {
      parent::__construct();
    }
	
	public function did_you_know_details($id)
	{
		$CI =& get_instance();	
		$CI->load->library('front_lib/lmodule');
		$CI->load->model('front/module');
		if(!$id){
			redirect(base_url());
			exit();
		}
		$content = $CI->lmodule->get_did_you_know_details($id);	
		$this->template->front_main_view($content);
	}
	
	public function view_category($category_id)
	{
		$CI =& get_instance();	
		$CI->load->library('front_lib/lcontent');
		if(!$category_id){
			redirect(base_url());
			exit();
		}		
		$content = $CI->lcontent->get_category($category_id);	
		$this->template->front_main_view($content);
	}
}