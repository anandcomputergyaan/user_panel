<?php
defined('BASEPATH') OR exit(' NO direct script access allowed');


class LoginController extends CI_Controller
{
	
	function __construct()
	{
		 parent::__construct();
		$this->load->model('UserModel');

	}



	public function index()
		{
			$this->load->view('user_login');
		}


	public function registration()
		{
			$this->load->view('user_reg');
		}


	public function reg_save()
	{

		$this->form_validation->set_rules('f_name','First Name','trim|required|alpha|min_length[2]');
		$this->form_validation->set_rules('l_name','Last name','trim|required|alpha|min_length[2]');
		$this->form_validation->set_rules('email','Eamil','trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('mobile','Mobile','trim|required|integer|exact_length[10]|is_unique[user.mobile]');
		$this->form_validation->set_rules('password','Password','trim|required|matches[re_password]');
		$this->form_validation->set_rules('re_password','Password','trim|required');
			
			if($this->form_validation->run()==true) 
			{

				date_default_timezone_set('Asia/kolkata');
	            $date=date('y-m-d H:i:s');

	          $data = array(

					'f_name' =>$this->input->post('f_name') , 
					'l_name' =>$this->input->post('l_name') , 
					'mobile' =>$this->input->post('mobile') , 
					'email' =>$this->input->post('email') , 
					'password' =>SHA1($this->input->post('password')), 
					'created_at'=>$date,
				   );
	          if($this->UserModel->save($data))
	          {
	          	$this->session->set_flashdata('message','Registered successfully.You can login');
	          	 redirect(base_url('login'));

	          }


			}

	 else {
	    	$this->form_validation->set_error_delimiters('<p style="color:red;">', '</p>');
			$this->load->view('user_reg');
		  }
	}



	 public function login()
	 {
	  
	   $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
	   $this->form_validation->set_rules('password', 'Password', 'required');
	 
		  if($this->form_validation->run()==true)
		  {

             $this->load->model('LoginModel');
		  	 $email=$this->input->post('email');
		  	$pass=SHA1($this->input->post('password'));
	          

			   $result = $this->LoginModel->can_login($email,$pass);

			   if($info = $result)
			   {
			   	
			   	 $this->session->set_userdata($info);
			     redirect(base_url('dashboard'));
			   }

			   else
			   {
                   $error='Oops !! Email and Password are not correct';
			     $this->load->view('user_login',  array('error' => $error,));
			   }
		  }
	  	 else
		    {
		     $this->form_validation->set_error_delimiters('<p style="color:red;">', '</p>');
		     $this->load->view('user_login');
		    }


	   }
    
     public function logout()
	   {
	   	$this->session->sess_destroy();
	   	redirect(base_url('login'));
       }
  


	  


}