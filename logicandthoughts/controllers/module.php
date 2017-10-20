<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Module extends CI_Controller {
	function __construct() {
      parent::__construct();
    }
	
	public function did_you_know_details($id)
	{
		$CI =& get_instance();	
		$CI->load->library('front_lib/lmodule');
		$CI->load->model('front/modules');
		if(!$id){
			redirect(base_url());
			exit();
		}
		$content = $CI->lmodule->get_did_you_know_details($id);	
		$this->template->front_main_view($content);
	}
	
	public function did_you_know_list()
	{
		$CI =& get_instance();	
		$CI->load->library('front_lib/lmodule');
		$CI->load->model('front/modules');		
		$content = $CI->lmodule->get_did_you_know_all();	
		$this->template->front_main_view($content);
	}
	
	public function recent_video_list()
	{
		$CI =& get_instance();	
		$CI->load->library('front_lib/lmodule');
		$CI->load->model('front/modules');		
		$content = $CI->lmodule->get_recent_video_list();	
		$this->template->front_main_view($content);
	}
	
	public function submit_poll_vote()
	{
		$CI =& get_instance();	
		$CI->load->model('front/modules');
		if(isset($_POST['poll_id']) && isset($_POST['option_id'])){
			$content = $CI->modules->do_submit_poll_vote($_POST['poll_id'],$_POST['option_id']);	
			echo"Successfully Send Your Vote";
		}else{
			echo"You didn't Select Option";
		}
	}
	
	public function load_poll_result()
	{
		$CI =& get_instance();
		$CI->load->model('front/modules');
		$poll_id =  $_POST['poll_id'];
		$poll_results = $CI->modules->retrieve_poll_result($poll_id);
		if(!empty($poll_results )){
			$total_vote=0;
			foreach($poll_results as $value){
					$total_vote = $total_vote + $value['total_vote'];
			}
			
			foreach($poll_results as $key=>$val){
				if($total_vote!=0){
					$poll_results[$key]['vote_percent'] = round(($val['total_vote']/$total_vote)*100,2);
				}else{$poll_results[$key]['vote_percent'] = "";}
			}
			
			echo "<div class='optionContainer'>";
			foreach($poll_results as $poll_result){
				echo"<span>".$poll_result['option_name']." - ( ".$poll_result['vote_percent']." % votes )</span><br/>";
				echo"<div class='chartDiv'>";
					echo"<div style='float:left;height:12px;background:#555;width:".$poll_result['vote_percent']."%;'></div>";
				echo"</div><br/>";
			}
				echo"<span> Total Vote ".$total_vote."</span><br/>";
				
			echo"</div>";
		}else{echo"<span>No data found </span>";}
	}
	
	public function submit_quize_vote()
	{
		$CI =& get_instance();	
		$CI->load->model('front/modules');	
		if($CI->auth->is_logged())
		{
			if(isset($_POST['quize_id']) && isset($_POST['option_id'])){
				$capable_user = $CI->modules->can_participate_in_quize($_POST['quize_id']);
				
				if($capable_user){
					$content = $CI->modules->do_submit_quize_vote($_POST['quize_id'],$_POST['option_id']);	
					echo"Successfully Send Your Vote";
				}else{
					echo"You can't give vote once again";
				}
			}else{
				echo"You didn't Select Option";
			}
		}else{
			echo"You can't vote without login";
		}
		
	}
	
	public function load_quize_result()
	{
		$CI =& get_instance();
		$CI->load->model('front/modules');
		$quize_id =  $_POST['quize_id'];
		$quize_results = $CI->modules->retrieve_quize_result($quize_id);
		if(!empty($quize_results )){
			$total_vote=0;
			$correct_ans=0;
			foreach($quize_results as $value){
				$total_vote = $total_vote + $value['total_vote'];
				if($value['is_right_answer']==1){
					$correct_ans=$value['total_vote'];
				}
			}
			
			foreach($quize_results as $key=>$val){
				if($total_vote!=0){
					$quize_results[$key]['vote_percent'] = round(($val['total_vote']/$total_vote)*100,2);
				}else{$quize_results[$key]['vote_percent'] = "";}
			}
			
			echo "<div class='optionContainer'>";
			foreach($quize_results as $quize_result){
				echo"<span>".$quize_result['option_details']." - ( ".$quize_result['vote_percent']." % votes )</span><br/>";
				echo"<div class='chartDiv'>";
					echo"<div style='float:left;height:12px;background:#555;width:".$quize_result['vote_percent']."%;'></div>";
				echo"</div><br/>";
			}
				echo"<span> Total Vote :".$total_vote."</span><br/>";
				echo"<span> Correct Answer :".$correct_ans."</span><br/>";
				
			echo"</div>";
		}else{echo"<span>No data found </span>";}
	}
}