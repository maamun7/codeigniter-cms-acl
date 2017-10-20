<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lclient_list {
	// Data For Top Menu
	public function get_our_client_list()
	{
		$CI =& get_instance();
		$CI->load->model('front/dashboards');
		$data = array('client_list_data' => $CI->dashboards->retrieve_our_client_list());
		$client_list_view = $CI->parser->parse('front_view/include/our_clients',$data,true);
		return $client_list_view;
	}
}
?>