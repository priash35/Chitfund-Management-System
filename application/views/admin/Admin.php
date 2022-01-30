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
			if (!$this->Admin_model->role_exists($role)){			
				$pages= implode(',', $this->input->post('checkboxx'));		
				$all_pages =$this->Admin_model->getParentPage($pages);
				$data= array(
					'role' => $role,
					'page' => $all_pages
				);
				$this->Admin_model->add_RoleData($data);
				redirect("Admin/roles","refresh");
			}
			else{
				$role_id= $_SESSION['role'];
				$data['uname'] = $_SESSION['username'];
				$data['menus']= $this->Admin_model->get_menus($role_id);
				$data['role']= $role;	
				$this->session->set_flashdata('msg1', 'Role already exist.');		
				$this->load->view('admin/add_role',$data);
			}					
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
			if (!$this->Admin_model->role_exists($role)){	
				$pages= implode(',', $this->input->post('checkboxx'));
				
				$all_pages =$this->Admin_model->getParentPage($pages);
				$data= array(
					'role_id' => $role_id,
					'role' => $role,
					'page' => $all_pages
			);
			$this->Admin_model->update_RoleData($role_id, $data);
			redirect("Admin/roles","refresh");
			}else{
				$role_id1= $_SESSION['role'];
				$data['uname'] = $_SESSION['username'];
				$data['menus']= $this->Admin_model->get_menus($role_id1);
				$data['roles'] = $this->Admin_model->getRole($role_id);	
				$this->session->set_flashdata('msg1', 'Role already exist.');		
				$this->load->view('admin/add_role',$data);
			}							
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
	public function staff_master()
	{
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$data['records']= $this->Admin_model->get_staff();
		$this->load->view('admin/staff_master', $data);
	}
	public function add_staff_data()
	{	
			$name = $_SESSION['userid'];
				
		//$uname = $_SESSION['userid'];
		$timestamp = time();			
		$created_date= date("Y-m-d", $timestamp);
		$file_name="";
		$file_name1="";
		$img_url="";
		$img_url1="";
		if(isset($_POST['add_staff'])){
			
			if($_FILES['id_proof']['tmp_name']!="")
			{
		
				$file_name = $_FILES['id_proof']['name'];
				$ext = pathinfo($file_name, PATHINFO_EXTENSION);	
				$file_name = $_POST['f_name'].$_POST['l_name']."_IDProof_".$created_date."_".time().".".$ext;			 
				$file_tmp =$_FILES['id_proof']['tmp_name'];
				$dest= "./assets/uploads/".$file_name;
				$img="assets/uploads/".$file_name;
				$img_url=base_url().$img;
				move_uploaded_file($file_tmp, $dest);
			}	
			if($_FILES['adr_proof']['tmp_name']!="")
			{
		
				$file_name1 = $_FILES['adr_proof']['name'];					
				$ext = pathinfo($file_name1, PATHINFO_EXTENSION);	
				$file_name1 = $_POST['f_name'].$_POST['l_name']."_AddProof_".$created_date."_".time().".".$ext;			 
				$file_tmp1 =$_FILES['adr_proof']['tmp_name'];
				$dest1= "./assets/uploads/".$file_name1;
				$img1="assets/uploads/".$file_name1;
				$img_url1=base_url().$img1;
				move_uploaded_file($file_tmp1, $dest1);
			}
			$mobile = $_POST['mobile'];
			$data= array(
				'first_name' => $_POST['f_name'],
				'middle_name' => $_POST['m_name'],
				'last_name' => $_POST['l_name'],
				'designation' => $_POST['desig'],
				'address' => $_POST['address'],
				'joining_date' => $_POST['j_date'],
				'landline' => $_POST['landline'],
				'mobile_1' => $_POST['mobile'],
				'referred_by' => $_POST['ref'],
				'id_proof' => $file_name,
				'id_proof_link' => $img_url,
				'add_proof' => $file_name1,
				'add_proof_link' => $img_url1,
				'designation' => $_POST['desig'],
				'used_id' => $_POST['userid'],
				'password' => $_POST['password'],
				'roles' => $_POST['role'],
				'created_date' => $created_date,
				'created_by' => $name,
				'updated_by' => $name	
			);
			$exists = $this->Admin_model->staff_exists($mobile);
			
			  if(!$exists){
				$id = $this->Admin_model->add_StaffData($data,$mobile);
				$this->session->set_flashdata('msg', 'Staff Details Added Successfully.');
				$role_id= $_SESSION['role'];
				$data['uname'] = $_SESSION['username'];
				$data['menus']= $this->Admin_model->get_menus($role_id);
				$data['staff'] = $this->Admin_model->getStaff($id);	
				$data['role'] = $this->Admin_model->get_roles();
				$this->load->view("admin/edit_staff",$data);
			  }
			  else
			  {
				$this->session->set_flashdata('msg1', 'Mobile Number already exist.');
				$role_id= $_SESSION['role'];
				$data['uname'] = $_SESSION['username'];
				$data['menus']= $this->Admin_model->get_menus($role_id);
				$data['role'] = $this->Admin_model->get_roles();
				//$data['records']= $this->Admin_model->get_staff();
				$this->load->view('admin/add_staff', $data);
			  }	
			//$res = $this->Admin_model->add_StaffData($data,$mobile);
			
		}
		else
		{
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$data['role'] = $this->Admin_model->get_roles();		
		//$this->session->set_flashdata('msg', 'Staff Details Added Successfully.');
		//$data['records']= $this->Admin_model->get_staff();
		$this->load->view('admin/add_staff', $data);
		}
	}
	public function EditStaff()
	{
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$id = $this->uri->segment('3');
		$data['staff'] = $this->Admin_model->getStaff($id);
		$data['role'] = $this->Admin_model->get_roles();			
		$this->load->view("admin/edit_staff",$data);
	}	
	public function update_staff_data()
	{
		$name = $_SESSION['userid'];
		$file_name="";
		$file_name1="";
		$img_url="";
		$img_url1="";
		$timestamp = time();			
		$created_date= date("Y-m-d", $timestamp);
		
		if(isset($_POST['update_staff'])){
			
			if($_FILES['id_proof']['tmp_name']!="")
			{
		
				$file_name = $_FILES['id_proof']['name'];
				$ext = pathinfo($file_name, PATHINFO_EXTENSION);					
				$file_name = $_POST['f_name'].$_POST['l_name']."_IDProof_".$created_date."_".time().".".$ext;			 
				$file_tmp =$_FILES['id_proof']['tmp_name'];
				$dest= "./assets/uploads/".$file_name;
				$img="assets/uploads/".$file_name;
				$img_url=base_url().$img;
				move_uploaded_file($file_tmp, $dest);
			}	
			else
			{
				$file_name = $_POST['c_id_name'];
				$img_url = $_POST['c_id_proof'];
			}
			if($_FILES['adr_proof']['tmp_name']!="")
			{
		
				$file_name1 = $_FILES['adr_proof']['name'];	
				$ext = pathinfo($file_name1, PATHINFO_EXTENSION);	
				$file_name1 = $_POST['f_name'].$_POST['l_name']."_AddProof_".$created_date."_".time().".".$ext;		 
				$file_tmp1 =$_FILES['adr_proof']['tmp_name'];
				$dest1= "./assets/uploads/".$file_name1;
				$img1="assets/uploads/".$file_name1;
				$img_url1=base_url().$img1;
				move_uploaded_file($file_tmp1, $dest1);
			}
			else
			{
				$file_name1 = $_POST['c_add_name'];
				$img_url1 = $_POST['c_add_proof'];
			}
			$data= array(
				'first_name' => $_POST['f_name'],
				'middle_name' => $_POST['m_name'],
				'last_name' => $_POST['l_name'],
				'designation' => $_POST['desig'],
				'address' => $_POST['address'],
				'joining_date' => $_POST['j_date'],				
				'landline' => $_POST['landline'],
				'mobile_1' => $_POST['mobile'],
				'referred_by' => $_POST['ref'],
				'id_proof' => $file_name,
				'id_proof_link' => $img_url,
				'add_proof' => $file_name1,
				'add_proof_link' => $img_url1,
				'designation' => $_POST['desig'],
				'used_id' => $_POST['userid'],
				'password' => $_POST['password'],
				'roles' => $_POST['role'],
				'updated_by' => $name	
			);
			$id= $_POST['sid'];			
			$this->Admin_model->update_StaffData($id,$data);
			//redirect("Admin/staff_master","refresh");	
			$role_id= $_SESSION['role'];
			$data['uname'] = $_SESSION['username'];
			$data['menus']= $this->Admin_model->get_menus($role_id);
			//$id = $this->uri->segment('3');
			$data['staff'] = $this->Admin_model->getStaff($id);
			$data['role'] = $this->Admin_model->get_roles();	
			$this->session->set_flashdata('msg', 'Staff information saved successfully.');		
			$this->load->view("admin/edit_staff",$data);
		}
		
	}
	public function DeleteStaff()
	{		
		$id = $_REQUEST['id'];
		$this->Admin_model->Delete_Staff($id);
		redirect("Admin/staff_master","refresh");	
	}	
	public function check_names()
	{	
		$f_name = $this->input->post('f_name');
		$m_name = $this->input->post('m_name');
		$l_name = $this->input->post('l_name');
		
		$result = $this->Admin_model->check_name_values($f_name,$m_name,$l_name);
		if($result)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
}

?>