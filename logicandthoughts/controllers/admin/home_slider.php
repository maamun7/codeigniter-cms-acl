<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_slider extends CI_Controller {
	
	function __construct() {
      parent::__construct();	  
	   $this->admin_template->current_menu = 'slider';
	   $this->admin_template->page_header = 'Home Slider';
	   $this->admin_template->breadcrumb_url = 'home_slider';
    }
	
	public function index()
	{
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('manage_home_slider');
		$CI->load->library('admin/lslider_list');
		$CI->load->model('admin/home_sliders');
		
		$config = array();
		$config["base_url"] = base_url()."admin/home_slider/index";
		$config["total_rows"] = $this->home_sliders->count_slider_list();	  
		$config["per_page"] = 20;
		$config["uri_segment"] = 4;	
		$config['full_tag_open'] = '<div id="pagination">';
		$config['full_tag_close'] = '</div>';
		$this->pagination->initialize($config);
		
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		$limit = $config["per_page"];
	    $links = $this->pagination->create_links();
		
        $content = $CI->lslider_list->get_slider_list($limit,$page,$links);
        $sub_menu = array(
				array('label'=> 'Manage Slider', 'url' => 'admin/home_slider', 'class' =>'active'),
				array('label'=> 'Add Slider', 'url' => 'admin/home_slider/add')
			);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
	
	public function add()
	{
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('add_home_slider');
		$data['title'] = "Add new home slider";
		$content = $this->parser->parse('admin_view/home_slider/add',$data,true);
		$sup_sub_menu = array(
			array('label'=> 'Manage Slider', 'url' => 'admin/home_slider'),
			array('label'=> 'Add Slider', 'url' => 'admin/home_slider/add','class' =>'active')
		);
		$this->admin_template->full_admin_html_view($content,$sup_sub_menu);
	}
	
	public function insert()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('add_home_slider');
		$CI->load->model('admin/home_sliders');
		
		$key_str = key_generator($length=5);		
		$img_name = $key_str.'-'.time();
		$config['upload_path'] = './uploads/home_slider/orginal_img';	
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '5000';
		$config['file_name']= $img_name;
	
		$this->load->library('upload',$config);	
		if (!$this->upload->do_upload())
		{
			//$data["error"] = $this->upload->display_errors();
			$error = $this->upload->display_errors();
			$this->session->set_userdata(array('error_message'=>$error));
			redirect(base_url('admin/home_slider/add'));
		}	
		else
		{
			$data = $this->upload->data();		
			$file_name = $data['file_name'];
			$this->create_image_thumb($file_name);
			$image_path = $data['file_path'];
			
			$data=array(
				'slider_id' 		=> null,
				'slider_heading' 	=> $this->input->post('slider_heading'),
				'url_path' 			=> $this->input->post('url_path'),
				'slider_details' 	=> $this->input->post('slider_details'),
				'slider_image' 		=> $file_name,
				'image_path' 		=> $image_path,
				'status' 			=> $this->input->post('status'),
				'slider_sorting' 	=> $this->input->post('slider_sorting')
			);
		}
		$CI->home_sliders->do_entry($data);
		
 		if(isset($_POST['add-slider'])){
			$this->session->set_userdata(array('message'=>"Slider Successfully Added !"));
			redirect(base_url('admin/home_slider'));
		}elseif(isset($_POST['form-cancel'])){
			redirect(base_url('admin/home_slider'));
		}
	}
	
	//Create Product Thumb
	private function create_image_thumb($file_name)
	{
		$original_path = base_url().'uploads/home_slider/orginal_img';
		$thumbs_path = $_SERVER['DOCUMENT_ROOT'].'/uploads/home_slider/thumb_img/';
	
		$this->load->library('image_lib');
		// CONFIGURE IMAGE LIBRARY
		$config['image_library']    = 'gd2';
		$config['source_image']     = './uploads/home_slider/orginal_img/'."$file_name";
		$config['new_image']        = $thumbs_path;
		$config['maintain_ratio']   = FALSE;
		$config['height']           = 260;
		$config['width']            = 940;
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
	}
	
	public function edit($slider_id)
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('edit_home_slider');
		$CI->load->library('admin/lslider_list');
		$content = $CI->lslider_list->get_edit_data($slider_id);
		$sub_menu = array(
			array('label'=> 'Manage Slider', 'url' => 'admin/home_slider'),
			array('label'=> 'Add Slider', 'url' => 'admin/home_slider/add'),
			array('label'=> 'Update Slider', 'url' => 'admin/home_slider','class' =>'active')
		);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
	
	//Product Update
	public function update()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('edit_home_slider');
		$CI->load->model('admin/home_sliders');
		
		$slider_id = $this->input->post('slider_id');
		$file = $_FILES['userfile']['name'];
		if($file!='')
		{
			$key_str = key_generator($length=5);		
			$img_name = $key_str.'-'.time();
			$config['upload_path'] = './uploads/home_slider/orginal_img';	
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '5000';
			$config['file_name']= $img_name;
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload())
			{
				//$data["error"] = $this->upload->display_errors();
				$error = $this->upload->display_errors();
				$this->session->set_userdata(array('error_message'=>$error));
				redirect(base_url('admin/home_slider'));
			}	
			else
			{	
				$data = $this->upload->data();		
				$file_name = $data['file_name'];
				$this->create_image_thumb($file_name);
				$image_path = $data['file_path'];
				
				$data=array(
					'slider_heading' 	=> $this->input->post('slider_heading'),
					'url_path' 			=> $this->input->post('url_path'),
					'slider_details' 	=> $this->input->post('slider_details'),
					'slider_image' 		=> $file_name,
					'image_path' 		=> $image_path,
					'status' 			=> $this->input->post('status'),
					'slider_sorting' 	=> $this->input->post('slider_sorting')
				);
				
				$CI->home_sliders->delete_exist_slider_img($slider_id);
				$CI->home_sliders->do_update($data,$slider_id);
				$this->session->set_userdata(array('message'=>"Successfully Updated !"));
				redirect(base_url('admin/home_slider'));
				exit;
			}
		}else{
			$data=array(
				'slider_heading' 	=> $this->input->post('slider_heading'),
				'url_path' 			=> $this->input->post('url_path'),
				'slider_details' 	=> $this->input->post('slider_details'),
				'status' 			=> $this->input->post('status'),
				'slider_sorting' 	=> $this->input->post('slider_sorting')
			);
			$CI->home_sliders->do_update($data,$slider_id);
			$this->session->set_userdata(array('message'=>"Successfully Updated !"));
			redirect(base_url('admin/home_slider'));
			exit;
		}
	}
		
	//Delate Home Slider
	public function delete()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('delete_home_slider');
		$CI->load->model('admin/home_sliders');
		$slider_id =  $_POST['slider_id'];	
		$status = $CI->home_sliders->do_delete($slider_id);
		echo $status;
	}

	//Status change Home Slider
	public function change_status()
	{	
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('home_slider_change_sts');
		$CI->load->model('admin/home_sliders');
		$slider_id =  $_POST['slider_id'];	
		$status = $CI->home_sliders->do_change_status($slider_id);
		echo $status;
	}
	
	public function search_list()
	{
		$CI =& get_instance();
		$this->auth->check_system_auth();
		$this->auth->check_permission('manage_home_slider');
		$CI->load->library('admin/lslider_list');
		$key_word = $this->input->post('key_word');
        $content = $CI->lslider_list->get_search_result($key_word);
        $sub_menu = array(
				array('label'=> 'Manage Slider', 'url' => 'admin/home_slider', 'class' =>'active'),
				array('label'=> 'Add Slider', 'url' => 'admin/home_slider/add')
			);
		$this->admin_template->full_admin_html_view($content,$sub_menu);
	}
}