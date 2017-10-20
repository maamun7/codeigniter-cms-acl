<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Modules extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function retrieve_did_you_know_all(){
		
		$this->db->select('*');
		$this->db->from("did_you_know");
		$this->db->where(array('status'=>1));
		$this->db->order_by('id','desc');			
		$query = $this->db->get();				
		if ($query->num_rows() > 0) {	
			return $query->result_array();
		}else{
			return false;
		}
	}
	
	public function retrieve_did_you_know_details($id){
		
		$this->db->select('*');
		$this->db->from("did_you_know");
		$this->db->where(array('status'=>1,'id'=>$id));		
		$query = $this->db->get();				
		if ($query->num_rows() > 0) {	
			return $query->result_array();
		}else{
			return false;
		}
	}
	
	public function retrieve_did_you_know_others($id){
		
		$this->db->select('id,question_heading,feat_image,created_on');
		$this->db->from("did_you_know");
		$this->db->where(array('status'=>1,'id !='=>$id));		
		$this->db->order_by('id','desc');		
		$this->db->limit(4,0);		
		$query = $this->db->get();	
		if ($query->num_rows() > 0) {	
			return $query->result_array();
		}else{
			return false;
		}
	}
	
	public function retrieve_recent_video_list(){
		
		$this->db->select('*');
		$this->db->from("recent_video");
		$this->db->where(array('status'=>1));		
		$this->db->order_by('id','desc');		
		$this->db->limit(5,0);		
		$query = $this->db->get();	
		if ($query->num_rows() > 0) {	
			return $query->result_array();
		}else{
			return false;
		}
	}

	public function do_submit_poll_vote($poll_id,$option_id){
	
		$access_ip = $_SERVER['REMOTE_ADDR']; 
		$this->db->select('*');
		$this->db->from('poll_results');
		$this->db->where(array('option_id'=>$option_id,'poll_id'=>$poll_id));		
		$query = $this->db->get();				
		if ($query->num_rows() > 0) {	
			$result = $query->result_array();
			$edit_data = array('total_vote' => $result[0]['total_vote']+1,'votted_ip' => $access_ip);			
			$this->db->where(array('option_id'=>$option_id,'poll_id'=>$poll_id));
			$this->db->update('poll_results',$edit_data); 
		}else{
			$data = array(
				'result_id' 	=> null,
				'poll_id' 		=> $poll_id,
				'option_id' 	=> $option_id,
				'total_vote'    => 1,
				'votted_ip' 	=> $access_ip
			);
			$this->db->insert('poll_results',$data);	
		}
		return true;
	}	
	
	public function retrieve_poll_result($poll_id){
		
		$this->db->select('a.option_id,a.option_name,b.total_vote');
		$this->db->from("poll_options a");
		$this->db->join("poll_results b","b.option_id=a.option_id","left");
		$this->db->where(array('a.status'=>1,'a.poll_id'=>$poll_id));	
		$query = $this->db->get();	
		if ($query->num_rows() > 0) {	
			return $query->result_array();
		}else{
			return false;
		}
	}
	
	///---------------------Quize------------------------//
		
	
	public function can_participate_in_quize($quize_id){
		$user_id = $this->auth->get_user_id();
		$this->db->select('user_id');
		$this->db->from("quize_votes");	
		$this->db->where("quize_id",$quize_id);	
		$query = $this->db->get();	
		if ($query->num_rows() > 0) {	
			$results = $query->result_array();
			foreach($results as $result){
				$ars[] = json_decode($result['user_id'],true);
			}
			$new_ar=array();
			if(!empty($ars)){
				foreach($ars as $ar){
					$new_ar = array_merge($new_ar,$ar);
				}
			}
			if(in_array($user_id,$new_ar)){
				return false;
			}else{ return true; }
		}else{
			return true;
		}
	}
	
	public function get_voted_users($quize_id,$option_id){
		$this->db->select('user_id');
		$this->db->from("quize_votes");	
		$this->db->where(array("quize_id"=>$quize_id,"voted_option_id"=>$option_id));	
		$query = $this->db->get();	
		if ($query->num_rows() > 0){
			$result = $query->result_array();
			$result=json_decode($result[0]['user_id'],true);
			return $result;
		}else{
			return false;
		}
	}
	
	public function do_submit_quize_vote($quize_id,$option_id){
		
		$exist_users_id = $this->get_voted_users($quize_id,$option_id);
		if(!$exist_users_id){
			$exist_users_id = array();
		}
		$user_id = $this->auth->get_user_id();
		array_push($exist_users_id,$user_id);
		$new_users_id = json_encode($exist_users_id,JSON_FORCE_OBJECT);
		$this->db->select('*');
		$this->db->from('quize_votes');
		$this->db->where(array('voted_option_id'=>$option_id,'quize_id'=>$quize_id));		
		$query = $this->db->get();				
		if ($query->num_rows() > 0) {	
			$result = $query->result_array();
			$edit_data = array('total_vote' => $result[0]['total_vote']+1,'user_id' => $new_users_id);			
			$this->db->where(array('voted_option_id'=>$option_id,'quize_id'=>$quize_id));
			$this->db->update('quize_votes',$edit_data); 
		}else{
			$data = array(
				'vote_id' 			=> null,
				'quize_id' 			=> $quize_id,
				'voted_option_id' 	=> $option_id,
				'total_vote'    	=> 1,
				'user_id' 			=> $new_users_id,
				'voted_on' 	=> date('Y-m-d',time())
			);
			$this->db->insert('quize_votes',$data);	
		}
		return true;
	}	
	
	public function retrieve_quize_result($quize_id){
		$this->db->select('a.option_id,a.option_details,a.is_right_answer,b.total_vote');
		$this->db->from("quize_options a");
		$this->db->join("quize_votes b","b.voted_option_id=a.option_id","left");
		$this->db->where(array('a.status'=>1,'a.quize_id'=>$quize_id));	
		$query = $this->db->get();	
		if ($query->num_rows() > 0) {	
			return $query->result_array();
		}else{
			return false;
		}
	}
}