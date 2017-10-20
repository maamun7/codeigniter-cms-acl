<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Larticle {
	
	public function new_article_form()
	{
		$CI =& get_instance();
		$CI->load->model('admin/article');
		$category = $CI->article->retrieve_category_list();
		$data = array(
				'title' => 'Add Sub Category',
				'category_list' => $category
			);
		$add_article_view =  $CI->parser->parse('admin_view/articles/add_articles',$data,true);
		return $add_article_view;
	}
	
	public function get_article_list($limit,$page,$links)
	{
		$CI =& get_instance();
		$CI->load->model('admin/article');
		$all_article = $CI->article->retrieve_article_list($limit,$page);
		if(!empty($all_article)){
			$i = $page;
			foreach($all_article as $k=>$val){ $i++;
				$all_article[$k]['sl']= $i;
				$all_article[$k]['sts_class'] 		 	= ($val['status'] ==1) ? "icon-ok" : "icon-remove-sign";
				$all_article[$k]['sts_news_scroller']  	= ($val['is_news_scroller_view'] ==1) ? "icon-ok" : "icon-remove-sign";
				$all_article[$k]['is_home_view'] 		= ($val['is_home_view'] ==1) ? "icon-ok" : "icon-remove-sign";
				$all_article[$k]['is_latest_news'] 		= ($val['is_latest_news'] ==1) ? "icon-ok" : "icon-remove-sign";
			}
		}
		$data = array(
				'title' => 'Article List',
				'article_list' => $all_article,
				'links' => $links
			);
		$all_categories =  $CI->parser->parse('admin_view/articles/articles',$data,true);
		return $all_categories;
	}
	
	//article Edit Data
	public function article_edit_data($article_id)
	{
		$CI =& get_instance();
		$CI->load->model('admin/article');
		$article_detail = $CI->article->retrieve_article_edit_data($article_id);
		$cat_id = $article_detail[0]['category_id'];
			
		$category_list = $CI->article->retrieve_category_list();
		

		foreach($category_list as $indx=>$v){
			if($cat_id == $v['categories_id']){
				$category_list[$indx]['selected']='selected="selected"';
			}
			else{
                $category_list[$indx]['selected']='';
            }
		}	
		
		$data = array(
			'article_id' 			=> $article_detail[0]['article_id'],
			'article_name' 			=> $article_detail[0]['article_name'],
			'deatils' 				=> $article_detail[0]['deatils'],
			'is_latest_news' 		=> $article_detail[0]['is_latest_news'],
			'news_scroller_view' 	=> $article_detail[0]['is_news_scroller_view'],
			'is_home_view' 			=> $article_detail[0]['is_home_view'],
			'status' 			=> $article_detail[0]['status'],			
			'featured_image' 	=> $article_detail[0]['featured_image'],
			'category_list' 	=> $category_list
		);
		$article_data = $CI->parser->parse('admin_view/articles/edit_articles',$data,true);		
		return $article_data;
	}
	//Search Product
	public function get_search_result($key_word)
	{
		$CI =& get_instance();
		$CI->load->model('admin/article');
		$all_article = $CI->article->retrieve_search_list($key_word);
		
		if(!empty($all_article)){
			$i = 0;
			foreach($all_article as $k=>$val){ $i++;
				$all_article[$k]['sl']= $i;
				$all_article[$k]['sts_class'] 		 	= ($val['status'] ==1) ? "icon-ok" : "icon-remove-sign";
				$all_article[$k]['sts_news_scroller']  	= ($val['is_news_scroller_view'] ==1) ? "icon-ok" : "icon-remove-sign";
				$all_article[$k]['is_home_view'] 		= ($val['is_home_view'] ==1) ? "icon-ok" : "icon-remove-sign";
				$all_article[$k]['is_latest_news'] 		= ($val['is_latest_news'] ==1) ? "icon-ok" : "icon-remove-sign";
			}
		}
		
		$data = array(
				'title' => 'article Search List',
				'article_list' => $all_article
			);
		$all_categories =   $CI->parser->parse('admin_view/articles/articles',$data,true);
		return $all_categories;
	}
}
?>