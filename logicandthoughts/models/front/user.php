<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	// VALID USER MATCH WITH DATABASE
	function check_valid_user($username,$password)
	{ 	
		$password = md5("tiger_cricket".$password);
        $this->db->where(array('username'=>$username,'password'=>$password,'is_active'=>'1','can_login'=>'1'));
        $this->db->where('activation_code IS NOT null');
		$query = $this->db->get('user_login');	
		$result =  $query->result_array();	
		if (count($result) == '1')
		{
			$user_id = $result[0]['user_id'];
			$this->db->select('a.*,b.*');
			$this->db->from('user_login a');
			$this->db->join('users b','b.user_id = a.user_id');
			$this->db->where('a.user_id',$user_id);
			$query = $this->db->get();
			return $query->result_array();
		}
		return false;
	}

	public function insert_basic_info($basic_data)
	{
		$this->db->insert('users',$basic_data);
        return $this->db->insert_id();
	}
	
	public function insert_login_info($login_data)
	{
		$this->db->insert('user_login',$login_data);
        return true;
	}
	//
	public function email_existancy_check($email)
	{
	  $this->db->where('email', $email);
	  $query = $this->db->get('client_user_login');
	  if( $query->num_rows() > 0 ){ return TRUE; } else { return FALSE; }
	}
	
	public function confirm_registration( $register_code )
	{
		$this->db->where('activation_code', $register_code);
		$query = $this->db->get('client_user_login');
		
		if( $query->num_rows() > 0 )
		{
			$data = array('activation_code'=>"",'status'=>1);
		
			$this->db->where('activation_code',$register_code);
			$this->db->update('client_user_login',$data); 
			return true ;
		}else{
			return FALSE; 
		}
	}

}