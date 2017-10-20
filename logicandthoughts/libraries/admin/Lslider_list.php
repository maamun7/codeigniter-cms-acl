<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lslider_list {
	
	public function get_slider_list($limit,$page,$links)
	{
		$CI =& get_instance();
		$CI->load->model('admin/home_sliders');
		$all_slider = $CI->home_sliders->retrieve_slider_list($limit,$page);
		
		if(!empty($all_slider)){
			$i = $page;
			foreach($all_slider as $k=>$val){
				$i++;
				$all_slider[$k]['sl']= $i;
				if($val['status']==1){
					$all_slider[$k]['sts_class']="icon-ok";
				}else{
					$all_slider[$k]['sts_class']="icon-remove-sign";
				}
				
			}
		}
		$data = array(
				'title' => 'Slider List',
				'slider_list' => $all_slider,
				'links' => $links
			);
		$all_sliders =  $CI->parser->parse('admin_view/home_slider/index',$data,true);
		return $all_sliders;
	}

	//Search Product
	public function get_edit_data($slider_id)
	{
		$CI =& get_instance();
		$CI->load->model('admin/home_sliders');
		$slider_detail = $CI->home_sliders->retrieve_edit_data($slider_id);

		$data = array(
			'slider_id' 	=> $slider_detail[0]['slider_id'],
			'slider_heading' 	=> $slider_detail[0]['slider_heading'],
			'url_path' => $slider_detail[0]['url_path'],
			'slider_details' =>  $slider_detail[0]['slider_details'],
			'slider_image' => $slider_detail[0]['slider_image'],
			'status' => $slider_detail[0]['status'],
			'slider_sorting' 	=> $slider_detail[0]['slider_sorting']
		);
		$chapterList = $CI->parser->parse('admin_view/home_slider/edit',$data,true);
		return $chapterList;
	}
	
	//Search Product
	public function get_search_result($key_word)
	{
		$CI =& get_instance();
		$CI->load->model('admin/home_sliders');
		$all_slider = $CI->home_sliders->retrieve_search_list($key_word);
		
		if(!empty($all_slider)){
			$i = 0;
			foreach($all_slider as $k=>$val){
				$i++;
				$all_slider[$k]['sl']= $i;
				if($val['status']==1){
					$all_slider[$k]['sts_class']="icon-ok";
				}else{
					$all_slider[$k]['sts_class']="icon-remove-sign";
				}
				
			}
		}
		
		$data = array(
				'title' => 'Slider List',
				'slider_list' => $all_slider
			);
		$all_sliders =  $CI->parser->parse('admin_view/home_slider/index',$data,true);
		return $all_sliders;
	}

}
?>