<?php

class Login extends CI_Controller
{

	public function index()
	{
		$this->load->view('login');
		
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		if ($this->form_validation->run()== TRUE) {
			
			$username = $_POST['username'];
			$password = $_POST['password'];

			//check data in database
			$this->db->select('*');
			$this->db->from('staffs');
			$this->db->where(array('used_id' => $username, 'password' => $password));
			$query = $this->db->get();

			$user = $query->result();
			
			if(!empty($user)){
			
			foreach($user as $row)
			{
				$role=$row->roles;
				$uname= $row->used_id;
				$uid = $row->id;
			}
				//echo $uid;
				//die();
											
				//if ($user_array==1) {
				//if ($role==1) {
						//temparny msg
						$this->session->set_flashdata("success","You Login success");
						//set session variables 
						$_SESSION['user_logged'] = TRUE;
						$_SESSION['username'] = $uname;
						$_SESSION['userid'] = $uid;
						$_SESSION['role'] = $role;
						//redirect to dashboard page
				
				
						redirect("Admin/index","refresh");				
				/*  }

				else
				{ 
					$this->session->set_flashdata("error","Invaled user");
					redirect("login/index","refresh");
				} */
			
			}//empty if end
			else
			{
				$this->session->set_flashdata("error","Invaled user");
				redirect("login/index","refresh");
			}
		}
		
	
	}

	/* public function register()

	{
	} */


	

	public function logout()
	{
		//$this->session->sess_destroy();
		$this->session->unset_userdata('user_logged');
		session_destroy();
		redirect("Login/index","refresh");
	}
}

?>