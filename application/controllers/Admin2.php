<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin2 extends CI_Controller {
	
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
		$data['records'] = $this->Admin_model->get_custdata();
		$this->load->view('admin/page-starter',$data);
	}
	public function cust_data()
	{
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$this->load->view('admin/customer-master',$data);
	}
	public function add_Custdata()
	{
		$uname = $_SESSION['username'];
		if(isset($_POST['add_cust']))
		{
			/* $title= $_POST['title'];
			$f_name= $_POST['f_name'];
			$m_name= $_POST['m_name'];
			$l_name= $_POST['l_name'];
			$family= $_POST['family'];
			$p_address= $_POST['p_address'];
			$t_address= $_POST['t_address'];
			$mobile_1= $_POST['mobile_1'];
			$mobile_2= $_POST['mobile_2'];
			$mobile_3= $_POST['mobile_3'];
			$mobile_4= $_POST['mobile_4'];
			$landline= $_POST['landline'];
			$date= $_POST['date'];
			$gender= $_POST['radioInline'];
			$nominee= $_POST['nominee'];
			$n_relation= $_POST['n_relation'];
			$ref_by= $_POST['ref_by'];
			$email1= $_POST['email1'];
			$email2= $_POST['email2'];
			$business= $_POST['business'];
			$b_address= $_POST['b_address'];
			$b_type= $_POST['b_type'];
			$family_member= $_POST['family_member']; */
			$timestamp = time();			
			$created_date= date("Y-m-d", $timestamp);
			
			$updated_date= date("Y-m-d h:i:s");
			
			
			$data= array(
				
				'first_name' => $_POST['f_name'],
				'middle_name' => $_POST['m_name'],
				'last_name' => $_POST['l_name'],
				'family' => $_POST['family'],
				'perm_add' => $_POST['p_address'],
				'temp_add' => $_POST['t_address'],
				'mobile_1' => $_POST['mobile_1'],
				'mobile_2' => $_POST['mobile_2'],
				'mobile_3' => $_POST['mobile_3'],
				'mobile_4' => $_POST['mobile_4'],
				'land_line' => $_POST['landline'],
				'dob' => $_POST['date'],
				'gender' => $_POST['radioInline'],
				'nominee' => $_POST['nominee'],
				'nominee_relation' => $_POST['n_relation'],
				'referred_by' => $_POST['ref_by'],
				'email_1' => $_POST['email1'],
				'email_2' => $_POST['email2'],
				'buss_name' => $_POST['business'],
				'buss_address' => $_POST['b_address'],
				'buss_type' => $_POST['b_type'],
				'family_member' => $_POST['family_member'],
				'created_date' => $created_date,
				'created_by' => $uname,
				'updated_date' => $updated_date,
				'updated_by' => $uname,
				'status' => 'ACTIVE'
			);
			
			$result= $this->Admin_model->addCustomer($data);
			redirect("Admin/cust_data","refresh");
		}		
		else
		{
			echo "Fail";
		}
		$this->load->view('admin/customer-master');
	}
	public function EditCustomer()
	{
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$id = $this->uri->segment('3');
		$data['basic'] = $this->Admin_model->getCustomer($id);		
		$this->load->view("admin/edit_cust",$data);
	}	
	public function update_Custdata()
	{
		$uname = $_SESSION['username'];
		if(isset($_POST['update_cust']))
		{				
			$updated_date= date("Y-m-d h:i:s");			
			$id= $_POST['cid'];
			$data= array(
				'id' => $_POST['cid'],
				'first_name' => $_POST['f_name'],
				'middle_name' => $_POST['m_name'],
				'last_name' => $_POST['l_name'],
				'family' => $_POST['family'],
				'perm_add' => $_POST['p_address'],
				'temp_add' => $_POST['t_address'],
				'mobile_1' => $_POST['mobile_1'],
				'mobile_2' => $_POST['mobile_2'],
				'mobile_3' => $_POST['mobile_3'],
				'mobile_4' => $_POST['mobile_4'],
				'land_line' => $_POST['landline'],
				'dob' => $_POST['date'],
				'gender' => $_POST['radioInline'],
				'nominee' => $_POST['nominee'],
				'nominee_relation' => $_POST['n_relation'],
				'referred_by' => $_POST['ref_by'],
				'email_1' => $_POST['email1'],
				'email_2' => $_POST['email2'],
				'buss_name' => $_POST['business'],
				'buss_address' => $_POST['b_address'],
				'buss_type' => $_POST['b_type'],
				'family_member' => $_POST['family_member'],				
				'updated_date' => $updated_date,
				'updated_by' => $uname,
				'status' => 'ACTIVE'
			);
			
			$result= $this->Admin_model->editCustomer($id,$data);
			redirect("Admin/cust_master","refresh");
		}
		else
		{
			echo "Fail";
		}
		$this->load->view('admin/customer-master');
	}
	public function DeleteCustomer()
	{
		$id = $_REQUEST['id'];
		$this->Admin_model->Delete_Customer($id);
		redirect("Admin/cust_master","refresh");	
	}
	public function add_bankdata()
	{
		$last_id = $this->db->select('id')->order_by('id',"desc")->limit(1)->get('customers')->row();
		
		if(isset($_POST['add_bank']))
		{
			 $data= array(
				'cus_id' => $last_id,
				'bank_name' => $_POST['bank_name'],
				'bank_name' => $_POST['bank_name'],
				'branch_name' => $_POST['branch'],
				'account_number' => $_POST['acc_number'],
				'ifsc_code' => $_POST['ifsc_code']
				/*'cheque' => $_POST['cheque'],*/				
			);
			
			$result= $this->Admin_model->addBank($data);
			redirect("Admin/cust_data","refresh");
		}
		else
		{
			echo "Fail";
		}
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
	//........................new functions
	public function company_master()
	{
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);

		//$data['records'] = $this->Admin_model->get_custdata();
		$this->load->view('admin/company-master',$data);
	}
}

?>