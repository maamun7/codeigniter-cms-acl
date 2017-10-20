<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ldashboard {
	public function get_header_view()
	{
		$CI =& get_instance();
		$CI->load->model('front/dashboards');		
		$all_header_data = $CI->dashboards->get_footer_data();
		$header_data = array();
		if (!empty($all_header_data)) {
			$header_data = array(
				'company_name'=>$all_header_data[0]['company_name'],
				'company_moto'=>$all_header_data[0]['company_moto'],
				'contact_address'=>$all_header_data[0]['contact_address'],
				'email_address'=>$all_header_data[0]['email_address'],
				'mobile_no'=>$all_header_data[0]['mobile_no'],
				'phone_no'=>$all_header_data[0]['phone_no'],
				'logo'=>"my-assets/front/images/common_img/".$all_header_data[0]['logo'],
				'height'=>$all_header_data[0]['logo_height'],
				'width'=>$all_header_data[0]['logo_width']
			);	
		}
		
		$main_slider_bar = $CI->parser->parse('front_view/include/header_view',$header_data,true);
		return $main_slider_bar ;
	}

	// Data For Main Home Page
	public function get_home_data()
	{
		$CI =& get_instance();
		$CI->load->model('front/menus');
		$menu_id = "";
		$CI->menus->change_menu_active_sts($menu_id);
		$data = array(
			'latest_article' 	=> $this->get_latest_article(),
			'home_article' 		=> $this->get_home_article()
		);
		$home_view = $CI->parser->parse('front_view/home/home',$data,true);
		return $home_view;
	}
	
	public function get_latest_article()
	{
		$CI =& get_instance();
		$CI->load->model('front/dashboards');
		$data = array(
			'latest_article' => $CI->dashboards->get_latest_articles(),
		);
		$home_view = $CI->parser->parse('front_view/home/latest_article',$data,true);
		return $home_view;
	}

	public function get_home_article()
	{
		$CI =& get_instance();
		$CI->load->model('front/dashboards');
		$data = array(
			'home_article' => $CI->dashboards->get_home_articles(),
		);
		$home_view = $CI->parser->parse('front_view/home/home_article',$data,true);
		return $home_view;
	}
	
	public function get_bottom_article()
	{
		$CI =& get_instance();
		$CI->load->model('front/dashboards');
		$data = array(
			'bottom_article' => $CI->dashboards->get_bottom_articles(),
		);
		$home_view = $CI->parser->parse('front_view/home/bottom_article',$data,true);
		return $home_view;
	}
	
	public function get_home_slider_data()
	{
		$CI =& get_instance();
		$CI->load->model('front/dashboards');
		
		// Main Slider Datas
		
		$home_slider = $CI->dashboards->get_home_slider();
		$main_slider_data = array(
			'home_sliders'=>$home_slider
		);	
		$main_slider_bar = $CI->parser->parse('front_view/home/homepage_slider',$main_slider_data,true);
		return $main_slider_bar ;
	}	

	public function get_footer_view()
	{
		$CI =& get_instance();
		$CI->load->model('front/dashboards');		
		$all_footer_data = $CI->dashboards->get_footer_data();
		$footer_data = array();
		if (!empty($all_footer_data)) {
			$footer_data = array(
				'company_name'=>$all_footer_data[0]['company_name'],
				'contact_address'=>$all_footer_data[0]['contact_address'],
				'email_address'=>$all_footer_data[0]['email_address'],
				'mobile_no'=>$all_footer_data[0]['mobile_no'],
				'phone_no'=>$all_footer_data[0]['phone_no']
			);	
		}
		
		$main_slider_bar = $CI->parser->parse('front_view/include/footer_view',$footer_data,true);
		return $main_slider_bar ;
	}
}
?>