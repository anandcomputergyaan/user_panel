<?php
defined('BASEPATH') OR exit(' No direct script access allowed');

class HomeController extends CI_Controller
{
	
	function __construct()
	{
		 parent::__construct();
		$this->load->model('UserModel');

	 	$result=$this->session->userdata('id');
		if(empty($result))
		{
		  redirect(base_url('LoginController'));
	    }

	}




	public function index()
		{

	       $this->load->view('home_page');

		}


	public function view_profile($id)
		{   
			$data = $this->UserModel->get_data_by_id($id);
	    	$this->load->view('view_profile',  array('data'=>$data,));
		}

	public function edit_profile($id)
		{
			$data = $this->UserModel->get_data_by_id($id);
			$this->load->view('edit_profile',array('data'=>$data,));
		}


  	public function user_list()
	  	{
		 	$users=$this->UserModel->all_user();
		 	$this->load->view('user_list',array('users' =>$users , ));

		}


	public function update_profile($id)
		{

		    $this->form_validation->set_rules('f_name','First Name','required');
		    $this->form_validation->set_rules('l_name', 'Last Name', 'required');
		    $this->form_validation->set_rules('mobile','Mobile No.','required');
		    
	 
	     
	      if($this->form_validation->run()==true)
	       {
	              $data = array(
	                'f_name'=> $this->input->post('f_name'),
	                'l_name'=> $this->input->post('l_name'),
	                'mobile'=> $this->input->post('mobile'),
	                ); 

	                   
	                  ;
	                  $update = $this->UserModel->update($data,$id);

	                  if($update)
	                  {
	
	                   $this->session->set_flashdata('message', 'Profile updated successfully');
	                    redirect(base_url('profile/'.$id));
	                  }
	        }
	        else
	        {
	          $this->form_validation->set_error_delimiters('<p style="color:red;">', '</p>');
	          $this->edit_profile($id);
	         
	        }

		 }
	 public function delete_user($id)
		 {

			$result= $this->UserModel->delete_user_info($id);                     
			if ($result)
			{

			   $this->session->set_flashdata('message','successfully deleted user');
				redirect(base_url('users-list'));

		    }

	     }


}