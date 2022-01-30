<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	public function __construct()
	{
		//parent::Controller();
		parent::__construct();
		if (!isset($_SESSION['user_logged'])) {
			
			$this->session->set_flashdata("error", "please login first view of page");
			redirect("login/index","refresh");
			
		}
		$this->load->library('form_validation');
		$this->load->model('Admin_model');		
	}
	
	public function index()
	{		
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);	
		
		$this->load->view('admin/index',$data);
	}
	public function cust_master()
	{
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$this->load->view('admin/page-starter',$data);
	}
	public function create_group()
	{
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$this->load->view('admin/create-group',$data);
	}
	public function daily_collection()
	{
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$this->load->view('admin/collection',$data);
	}
	public function roles()
	{
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$data['records']= $this->Admin_model->get_roles();
		$this->load->view('admin/roles', $data);
	}
	public function add_role()
	{
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$this->load->view('admin/add_role',$data);
	}
	public function add_roledata()
	{
		if(isset($_POST['submit']))
		{
			$role= $_POST['role'];
			
			$pages= implode(',', $this->input->post('checkboxx'));
			
			
			$all_pages =$this->Admin_model->getParentPage($pages);
			$data= array(
				'role' => $role,
				'page' => $all_pages
			);
			$this->Admin_model->add_RoleData($data);
			redirect("Admin/roles","refresh");					
		}
		else
		{
			echo'fail';
		} 
		
		
		//$this->load->view('admin/add_role');
	}
	public function EditRole()
	{
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$role_id = $this->uri->segment('3');
		$data['roles'] = $this->Admin_model->getRole($role_id);
		/* print_r($data);
		die(); */
		$this->load->view("admin/edit_role",$data);
	}
	public function update_roledata()
	{
		if(isset($_POST['submit']))
		{
			$role_id= $_POST['role_id'];
			$role= $_POST['role'];
			
			$pages= implode(',', $this->input->post('checkboxx'));
			
			
			$all_pages =$this->Admin_model->getParentPage($pages);
			$data= array(
				'role_id' => $role_id,
				'role' => $role,
				'page' => $all_pages
			);
			$this->Admin_model->update_RoleData($role_id, $data);
			redirect("Admin/roles","refresh");					
		}
		else
		{
			echo'fail';
		} 
	}
	
	public function DeleteRole()
	{
		//$id = $this->input->post('role_id');
		//$id = $_POST['role_id'];
		$id = $_REQUEST['role_id'];
		/* echo $id ;
		die(); */
		$this->Admin_model->Delete_Role($id);
		redirect("Admin/roles","refresh");	
	}
}

?>