<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lnews_scroller {
	
	public function get_article_list($limit,$page,$links)
	{
		$CI =& get_instance();
		$CI->load->model('admin/news_scroller');
		$all_article = $CI->news_scroller->retrieve_article_list($limit,$page);
		if(!empty($all_article)){
			$i = $page;
			foreach($all_article as $k=>$val){ $i++;
				$all_article[$k]['sl']= $i;
				$all_article[$k]['sts_class'] 		 	= ($val['status'] ==1) ? "icon-ok" : "icon-remove-sign";
				$all_article[$k]['sts_news_scroller']  	= ($val['is_news_scroller_view'] ==1) ? "icon-ok" : "icon-remove-sign";
			}
		}
		$data = array(
			'title' => 'News Scroller List',
			'article_list' => $all_article,
			'links' => $links
		);
		$all_categories =  $CI->parser->parse('admin_view/news_scroller/index',$data,true);
		return $all_categories;
	}
}
?>