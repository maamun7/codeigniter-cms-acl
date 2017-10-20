<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lcontent {
	// Data For Main Home Page
	public function get_content($content_id)
	{
		$CI =& get_instance();
		$CI->load->model('front/contents');
		
		// Get Content
		$data =array();
		$reltd_content =array();
		$content_data = $CI->contents->retrieve_content($content_id);

		if(!empty($content_data)){
			$category_id = $content_data[0]['categories_id'];
			$reltd_content = $CI->contents->retrieve_related_category($category_id);
		}
            
           if(!empty($content_data)){
			$data =array(
				'title'				=> $content_data[0]['article_name'],
				'header_contents'	=> "<h3 style='color:#fff'>".$content_data[0]['article_name']."</h3>",
				'categoriy'			=> $content_data[0]['categories_name'],
				'id' 				=> $content_data[0]['article_id'],
				'picture'			=> $content_data[0]['featured_image'],
				'date'				=> $content_data[0]['created_date'],
				'detail'			=> $content_data[0]['deatils'],
				'reltded_contents'  => $reltd_content
			);
			}
		$view_content = $CI->parser->parse('front_view/content/content',$data,true);
		return $view_content;
	}
	
	public function get_category($limit,$page,$links,$category_id)
	{
		$CI =& get_instance();
		$CI->load->model('front/contents');
		
		// Get Content
		$data =array(
                  'title'=> "",
                  'contents'=> "",
                  'links'=> ""
            );
		$category = $CI->contents->get_single_category($limit,$page,$category_id);
		if(!empty($category)){
			$data =array(
				'title'=> $category[0]['categories_name'],
				'contents'=> $category,
				'links'=> $links
			);
		}
		$view_content = $CI->parser->parse('front_view/content/category',$data,true);
		return $view_content;
	}

	public function get_contact_us_view()
	{
		$CI =& get_instance();
		$CI->load->model('front/contents');		
		$contact_us_data = $CI->contents->get_contact_us_data();
		$contact_data = array();
		if (!empty($contact_us_data)) {
			$contact_data = array(
				'company_name'=>$contact_us_data[0]['company_name'],
				'contact_address'=>$contact_us_data[0]['contact_address'],
				'email_address'=>$contact_us_data[0]['email_address'],
				'mobile_no'=>$contact_us_data[0]['mobile_no'],
				'phone_no'=>$contact_us_data[0]['phone_no']
			);	
		}
		
		$contact_us_view = $CI->parser->parse('front_view/contact/contact_us',$contact_data,true);
		return $contact_us_view ;
	}
}
?>