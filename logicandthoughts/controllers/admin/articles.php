<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Articles extends CI_Controller {
	
	function __construct() {
      parent::__construct();	  
	   $this->admin_template->current_menu = 'articles';
	   $this->admin_template->page_header = 'Articles';
	   $this->admin_template->breadcrumb_url = 'articles';
    }
	
	public function index()
	{
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('manage_article');
		$CI->load->library('admin/larticle');
		$CI->load->model('admin/article');
		
		$config = array();
		$config["base_url"] = base_url()."admin/articles/index";
		$config["total_rows"] = $this->article->count_article_list();	  
		$config["per_page"] = 25;
		$config["uri_segment"] = 4;	
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$limit = $config["per_page"];
	    $links = $this->pagination->create_links();
        $content = $CI->larticle->get_article_list($limit,$page,$links);
        $sub_menu = array(
				array('label'=> 'Manage Article', 'url' => 'admin/articles','class' =>'active'),
				array('label'=> 'Add Article', 'url' => 'admin/articles/add_article')
			);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
	
	public function add_article()
	{
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('add_article');
		$CI->load->library('admin/larticle');
		$data['title'] = "Add new Article";
		$content = $CI->larticle->new_article_form();	
		$sub_menu = array(
				array('label'=> 'Manage Article', 'url' => 'admin/articles'),
				array('label'=> 'Add Article', 'url' => 'admin/articles/add_article','class' =>'active')
			);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}	
	
	public function insert_article()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('add_article');
		$CI->load->model('admin/article');	

		$file = $_FILES['userfile']['name'];
		if($file!='')
		{
			$key_str = key_generator($length=5);		
			$img_name = $key_str.'-'.time();
			$config['upload_path'] = './uploads/articles/article_fet_img/orginal_img';	
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '5000';
			$config['file_name']= $img_name;
		
			$this->load->library('upload',$config);	
			
			if (!$this->upload->do_upload())
			{
				//$data["error"] = $this->upload->display_errors();
				$error = $this->upload->display_errors();
				$this->session->set_userdata(array('error_message'=>$error));
				redirect(base_url('admin/articles/add_article'));
			}	
			else
			{
				$data = $this->upload->data();		
				$file_name = $data['file_name'];
				$this->create_image_thumb($file_name);
				$image_path = $data['file_path'];
				
				$data = array(
					'article_id' 	=> null,
					'article_name' 	=> $this->input->post('article_name'),
					'featured_image' => $file_name,
					'image_path' 	=> $image_path,
					'category_id' 	=> $this->input->post('category_id'),
					'is_latest_news' 		=> $this->input->post('is_latest_news'),  
					'is_news_scroller_view' => $this->input->post('in_scroller_view'), 
					'is_home_view' 		=> $this->input->post('is_home_view'),  
					'status' 		=> $this->input->post('status'),
					'created_date' 	=> date('Y-m-d',time())
				);
				
			}
		}else{

			$data = array(
				'article_id' 	=> null,
				'article_name' 	=> $this->input->post('article_name'),
				'category_id' 	=> $this->input->post('category_id'),
				'is_latest_news' 		=> $this->input->post('is_latest_news'),  
				'is_news_scroller_view' => $this->input->post('in_scroller_view'), 
				'is_home_view' 		=> $this->input->post('is_home_view'),  
				'status' 		=> $this->input->post('status'),
				'created_date' 	=> date('Y-m-d',time())
			);	
		}
		$CI->article->insert_article_to_db($data);			
		$this->session->set_userdata(array('message'=>"Successfully Articles Added !"));
		redirect(base_url('admin/articles'));
		exit;
	}
	
	public function article_update_form($article_id = Null)
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('edit_article');
		$CI->load->library('admin/larticle');
		if(!$article_id){
			$this->session->set_userdata(array('message'=>"You didn't select article !"));
			redirect(base_url('admin/articles'));
		}
		$content = $CI->larticle->article_edit_data($article_id);
		$sub_menu = array(
			array('label'=> 'Manage article', 'url' => 'admin/articles'),
			array('label'=> 'Add article', 'url' => 'admin/articles/add_article'),
			array('label'=> 'Update article', 'url' => 'admin/articles/article_update_form','class' =>'active')
		);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
	
	//Product Update
	public function article_update()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('edit_article');
		$CI->load->model('admin/article');	
		
		$article_id = $this->input->post('article_id');	
		$file = $_FILES['userfile']['name'];
		if($file!='')
		{
			$key_str = key_generator($length=5);		
			$img_name = $key_str.'-'.time();
			$config['upload_path'] = './uploads/articles/article_fet_img/orginal_img';	
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '5000';
			$config['file_name']= $img_name;
		
			$this->load->library('upload',$config);	
			
			if (!$this->upload->do_upload())
			{
				//$data["error"] = $this->upload->display_errors();
				$error = $this->upload->display_errors();
				$this->session->set_userdata(array('error_message'=>$error));
				redirect(base_url('admin/articles/add_article'));
			}	
			else
			{
				$data = $this->upload->data();		
				$file_name = $data['file_name'];
				$this->create_image_thumb($file_name);
				$image_path = $data['file_path'];
				
				$data = array(
					'article_name' 			=> $this->input->post('article_name'),
					'featured_image' 		=> $file_name,
					'image_path' 			=> $image_path,
					'category_id' 			=> $this->input->post('category_id'),
					'is_latest_news' 		=> $this->input->post('is_latest_news'), 
					'is_news_scroller_view' => $this->input->post('in_scroller_view'), 
					'is_home_view' 			=> $this->input->post('is_home_view'),
					'status' 				=> $this->input->post('status'),
					'modyfied_date' 		=> date('Y-m-d',time())
				);
			}
			$CI->article->delete_article_featured_img($article_id);
			$CI->article->submit_update_article($data,$article_id);			
			$this->session->set_userdata(array('message'=>"Successfully Updated !"));
			redirect(base_url('admin/articles'));
			exit;
		}else{
			$data = array(
				'article_name' 			=> $this->input->post('article_name'),
				'category_id' 			=> $this->input->post('category_id'),
				'is_latest_news' 		=> $this->input->post('is_latest_news'), 
				'is_news_scroller_view' => $this->input->post('in_scroller_view'),  
				'is_home_view' 			=> $this->input->post('is_home_view'), 
				'status' 				=> $this->input->post('status'),
				'created_date' 			=> date('Y-m-d',time())
			);
			$CI->article->submit_update_article($data,$article_id);			
			$this->session->set_userdata(array('message'=>"Successfully Updated !"));
			redirect(base_url('admin/articles'));
		}
	}
		
	//Delate article
	public function delete()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('delete_article');
		$CI->load->model('admin/article');
		$article_id =  $_POST['article_id'];	
		$CI->article->delete_article_featured_img($article_id);
		$status = $CI->article->do_delete($article_id);
		echo $status;
	}

	//Status change Home article
	public function change_status()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('change_article_status');
		$CI->load->model('admin/article');
		$article_id =  $_POST['article_id'];	
		$status = $CI->article->do_status_change($article_id);
		echo $status;
	}
	
	public function news_scroller_status()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('change_article_status');
		$CI->load->model('admin/article');
		$article_id =  $_POST['article_id'];	
		$status = $CI->article->do_news_scroll_view_sts_chng($article_id);
		echo $status;
	}	
	
	public function home_page_view_status()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('change_article_status');
		$CI->load->model('admin/article');
		$article_id =  $_POST['article_id'];	
		$status = $CI->article->do_change_home_page_view_sts($article_id);
		echo $status;
	}
	
	public function latest_article_status()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('change_article_status');
		$CI->load->model('admin/article');
		$article_id =  $_POST['article_id'];	
		$status = $CI->article->do_change_latest_article_status($article_id);
		echo $status;
	}
	
	public function search_list()
	{
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('manage_article');
		$CI->load->library('admin/larticle');
		$key_word = $this->input->post('key_word');
        $content = $CI->larticle->get_search_result($key_word);
        $sub_menu = array(
				array('label'=> 'Manage article', 'url' => 'admin/articles', 'class' =>'active'),
				array('label'=> 'Add article', 'url' => 'admin/articles/add_article')
			);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
	
	//Create Product Thumb
	private function create_image_thumb($file_name)
	{
		$original_path = base_url().'uploads/articles/article_fet_img/orginal_img';
		$thumbs_path = $_SERVER['DOCUMENT_ROOT'].'/uploads/articles/article_fet_img/thumb_img/';
	
		$this->load->library('image_lib');
		// CONFIGURE IMAGE LIBRARY
		$thumbs =array(
			array("img_folder"=>"high_img","height"=>350,"width"=>640),
			array("img_folder"=>"latest_img","height"=>200,"width"=>300),
			array("img_folder"=>"bottom_slider","height"=>80,"width"=>220)
		);
		
		foreach($thumbs as $thumb){
			$config['image_library']    = 'gd2';
			$config['source_image']     = './uploads/articles/article_fet_img/orginal_img/'."$file_name";
			$config['new_image']        = $thumbs_path.$thumb['img_folder']."/";
			$config['maintain_ratio']   = FALSE;
			$config['height']           = $thumb['height'];
			$config['width']            = $thumb['width'];
			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$this->image_lib->clear();
		}
	}
		
	public function upload_image_path_change()
	{	
		$CI =& get_instance();
		$CI->auth->check_admin_auth();		
		if (file_exists("uploads/articles/images/" . $_FILES["upload"]["name"]))
		{
		 echo $_FILES["upload"]["name"] . " already exists please choose another image. ";
		}
		else
		{
		 move_uploaded_file($_FILES["upload"]["tmp_name"],
		 "uploads/articles/images/" . $_FILES["upload"]["name"]);
		 echo "Stored in: " . "uploads/articles/images" . $_FILES["upload"]["name"];
		}
	}
		
	public function browse_article_image()
	{	
		$CI =& get_instance();
		$CI->auth->check_admin_auth();
		$data = array();
		$this->load->view('admin_view/articles/ckfinder',$data);
	}
}