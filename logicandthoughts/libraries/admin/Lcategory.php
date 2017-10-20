<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lcategory {
	
	public function get_category_list($limit,$page,$links)
	{
		$CI =& get_instance();
		$CI->load->model('admin/category');
		$all_category = $CI->category->retrieve_category_list($limit,$page);
		
		if(!empty($all_category)){
			$i = $page;
			foreach($all_category as $k=>$val){
				$i++;
				$all_category[$k]['sl']= $i;
				if($val['categories_status']==1){
					$all_category[$k]['sts_class']="icon-ok";
				}else{
					$all_category[$k]['sts_class']="icon-remove-sign";
				}
			}
		}
		
		$data = array(
				'title' => 'Category List',
				'category_list' => $all_category,
				'links' => $links
			);
		$all_categories =  $CI->parser->parse('admin_view/categories/category',$data,true);
		return $all_categories;
	}	
	//Category Edit Data
	public function category_edit_data($cat_id)
	{
		$CI =& get_instance();
		$CI->load->model('admin/category');
		$category_detail = $CI->category->retrieve_category_edit_data($cat_id);
		
		$data = array(
			'cat_id' 		=> $category_detail[0]['categories_id'],
			'category_name' => $category_detail[0]['categories_name'],
			'status' 		=> $category_detail[0]['categories_status']
		);
		$category_data = $CI->parser->parse('admin_view/categories/edit_category',$data,true);
		return $category_data;
	}
	//Search Product
	public function get_search_result($key_word)
	{
		$CI =& get_instance();
		$CI->load->model('admin/category');
		$all_category = $CI->category->retrieve_search_list($key_word);
		
		if(!empty($all_category)){
			$i = 0;
			foreach($all_category as $k=>$val){
				$i++;
				$all_category[$k]['sl']= $i;
				if($val['categories_status']==1){
					$all_category[$k]['sts_class']="icon-ok";
				}else{
					$all_category[$k]['sts_class']="icon-remove-sign";
				}
			}
		}
		
		$data = array(
				'title' => 'Category Search List',
				'category_list' => $all_category
			);
		$all_categories =  $CI->parser->parse('admin_view/categories/category',$data,true);
		return $all_categories;
	}
}
?>