<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lmodule {
	// Data For Main Home Page
	public function get_did_you_know_details($id)
	{
		$CI =& get_instance();
		$CI->load->model('front/modules');
		
		$data =array();
		$content = $CI->modules->retrieve_did_you_know_details($id);
		$others_content = $CI->modules->retrieve_did_you_know_others($id);
		if(!empty($others_content)){
			$data['others_contents'] = $others_content;
		}

		if(!empty($content)){
			$data['title'] = $content[0]['question_heading'];
			$data['id']	= $content[0]['id'];
			$data['picture'] = $content[0]['feat_image'];
			$data['details'] = $content[0]['answer_details'];
			$data['created_date'] = $content[0]['created_on'];
			$data['contents'] = $content;
		}
		$view_module = $CI->parser->parse('front_view/module/did_you_know_details',$data,true);
		return $view_module;
	}
	
	public function get_did_you_know_all()
	{
		$CI =& get_instance();
		$CI->load->model('front/modules');
		
		$data =array();
		$content_list = $CI->modules->retrieve_did_you_know_all();
		if(!empty($content_list)){
			$data['title'] = "Did You Know List";
			$data['content_lists'] = $content_list;
		}
		$view_module = $CI->parser->parse('front_view/module/did_you_know_all',$data,true);
		return $view_module;
	}
	
	public function get_recent_video_list()
	{
		$CI =& get_instance();
		$CI->load->model('front/modules');
		
		$data =array();
		$content_list = $CI->modules->retrieve_recent_video_list();
		if(!empty($content_list)){
			$data['title'] = "Recent Video List";
			$data['content_lists'] = $content_list;
		}
		$view_module = $CI->parser->parse('front_view/module/recent_video_list',$data,true);
		return $view_module;
	}
}
?>