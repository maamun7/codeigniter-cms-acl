<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {
	public $message;
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$CI =& get_instance();		
		if($CI->auth->is_logged())
		{
			$CI->session->set_userdata(array('warning_message'=>"You have already logged in,To do new registration please first log out"));
			redirect(base_url());exit();
		}
		  
		$html_page = "front_view/users/signup";
		$content = $CI->parser->parse($html_page,$data = array('title'=>"Sign Up",'signup'=>"signup"),true);	
		$CI->template->front_main_view($content);	
	}

	function email_existency_check()
	{
	 	$CI =& get_instance();
		$CI->load->model('front/sign_up');
		$enter_email =  $_POST['username'];
		if( $CI->sign_up->do_email_existancy_check( $enter_email )== TRUE ){
		  echo json_encode(false);
		}else{
		  echo json_encode(true);
		}
	}

	public function do_registered()
	{
		$CI =& get_instance();
		$CI->load->model('front/user');
		
		$email  	=   $CI->input->post('username');
		$password  	=   md5("tiger_cricket".$CI->input->post('password'));
		$activation_code = md5(mt_rand(10000,99999).time()."$email");
		$basic_data = array(
			'first_name' 	=> $this->input->post('first_name'),
			'last_name' 	=> $this->input->post('last_name'),
			'status' 		=> 1
		);
		$user_id = $CI->user->insert_basic_info($basic_data);
		
		$login_data = array(
			'user_id' 			=> $user_id,
			'username' 			=> $this->input->post('username'),
			'password' 			=> md5("tiger_cricket".$this->input->post('password')),
			'user_type' 		=> 1,
			'is_active' 		=> 0,
			'can_login' 		=> 0,
			'activation_code' 	=> $activation_code
		);
		$CI->user->insert_login_info($login_data);	
		$CI->session->set_userdata(array('message'=>"You have successfully created an account.<br/>Allow few moments and check your email <b>inbox</b> for confirmation email.<br/>Also, check <b> spam/junk </b>folder, if you don’t see any email in inbox.<br/>Otherwise write to us <u style='color:blue;'>support@examntest.com</u> or call 9665952"));
		redirect(base_url());exit();
	}

	//Do login
	public function do_login()
	{	
		$error = '';
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ( $username == '' || $password == '' || $this->auth->login($username,$password) === FALSE )
		{
			$error = 'Wrong user name or password';
		}
		if ($error != '')
		{
			$this->session->set_userdata(array('error_message'=>$error));
			$this->output->set_header("Location: ".base_url().'users/signin', TRUE, 302);
		}else{
			$this->output->set_header("Location: ".base_url(), TRUE, 302);
        }
	}
	public function send_activation_code($email,$password,$activation_code)
	{	
		//$url = "http://examntest.com/front/signup/account_activation/";
		//$email_link = 'Dear User Please here<a href="'.$activation_code."'>Click here</a>' to activate your account. <br>Thanks<br/> Examntest.com Team ";
		
		$url = "http://examntest.com/front/signup/account_activation/";
		//$email_link ="Dear User, please click here ".$url."".$activation_code."to activate your account. Thanks, Examntest.com Team ";
		$email_link ="Dear User please click here <a href=".$url.$activation_code."></a>' to activate your account. Thanks, Examntest.com Team ";
		
		// send e-mail verification
		
		$this->load->library('email');
		$this->email->from('admin@examntest.com','Examntest.com Team');
		$this->email->to($email);
		$this->email->subject('Registration Confirmation');
		$this->email->message($email_link);
		$this->email->send();	
	}
	public function account_activation()
	{	
		$CI =& get_instance();
		$CI->load->model('front/sign_up');
	    $register_code = $this->uri->segment(4);
		if ($register_code == ''){
			
			$CI->session->set_userdata(array('warning_message'=>"Error!! No registration code in URL"));
			redirect(base_url());exit();
		}
		$reg_confirm = $CI->sign_up->confirm_registration($register_code);
		//$this->output->enable_profiler(1);
		if($reg_confirm){
			$CI->session->set_userdata(array('message'=>"Your account successfully activated "));
			redirect(base_url());exit();
		}
		else {
			$CI->session->set_userdata(array('warning_message'=>"You have failed to registered"));
			redirect(base_url());exit();
		}  
	}
	
	public function signin()
	{
		$CI =& get_instance();
		if ($CI->auth->is_logged() )
		{
			$CI->session->set_userdata(array('warning_message'=>"You have already logged in"));
			redirect(base_url());exit();
		}
		$html_page = "front_view/users/signin";
		$content = $CI->parser->parse($html_page,$data = array('title'=>"Sign In",'signin'=>"signin"),true);	
		$CI->template->front_main_view($content);
	}
	
	public function logout()
	{	
		if ($this->auth->logout())
		$this->output->set_header("Location: ".base_url().'users/signin', TRUE, 302);
	
	}
	public function forgot_password()
	{
		$data['title']= 'Forgot Password';
		$data['msg']= $this->message;
		$this->load->view('front_view/forgot_password',$data);
	}
	public function checkNew_emailFor_forgotPass()
	{
		$email =  $_POST['email'];
		$result= $this->login_model->forgot_pass($email);
		if($result){
			foreach($result as $row)
			{
				echo json_encode($row);
			}
		}	
	}
	public function check_valid_NewPass()
	{
		$this->form_validation->set_rules('new_pass', 'New Password', 'trim|required|alpha_numeric|min_length[6]|xss_clean');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->forgot_password();
		}else{
			$email = $this->input->post('hideEmail',TRUE);
			$password=md5('gefera'.$this->input->post('new_pass',TRUE));
			
			$encrypt_pass = $email.'-'.$password;
			$encrypt_pass = base64_encode($encrypt_pass);
			
			$this->sendNewto_userEmail($email,$encrypt_pass);
		}
	
	}
	//Send new Pass To User Email
	public function sendNewto_userEmail($email,$encrypt_pass)
    {
		$email_link = '<a href="http://www.quize.gefedu.com/frontview_control/login/replace_pasword/'.$encrypt_pass.'">Reset Password</a>';
		$this->load->library('email');
		$this->email->from('maamun7@gmail.com', 'Mamun');
		$this->email->to($email);
		$this->email->subject('Registration Confirmation');
		$this->email->message("$email_link");
		$this->email->send();
		//echo 'Click the below link to reset your password <br/>'.anchor('http://localhost/gefera/mamun/frontview_control/login/replace_pasword/'.$encrypt_pass,'Reset Password');
    }
	
	//Replace Pasword
	public function replace_pasword()
    {  
		$register_code = $this->uri->segment(4);
		$register_code = base64_decode($register_code);
		list($email,$password) = explode("-",$register_code);
		$this->login_model->replace_pasword($email,$password);
		redirect('home');
    } 

}
