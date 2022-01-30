<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {
		
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
		$this->load->model('Company_model');		
	}	
	
	public function company_master()
	{
		$role_id= $_SESSION['role'];
		$data = array();
		$data['records'] = array();
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$data['records'] = $this->Company_model->get_companydata();
		$data['bank_data']= $this->Company_model->get_company_bank();
		$data['tab']=1;
		$this->load->view('admin/company-master',$data);
	}
	
	public function edit_companydata()
	{			
		//print_r($_POST);
		$name = $_SESSION['userid'];
		if(isset($_POST['add_company']))
		{			
			$timestamp = time();			
			$created_date= date("Y-m-d", $timestamp);
			
			$updated_date= date("Y-m-d h:i:s");			
			
			$data= array(				
				'company_name' => $_POST['company_name'],				
				'reg_office' => $_POST['reg_office'],
				'corp_office' => $_POST['corp_office'],
				'sales_office' => $_POST['sales_office'],
				'reg_mobile_1' => $_POST['reg_mobile_1'],
				'reg_mobile_2' => $_POST['reg_mobile_2'],
				'reg_mobile_3' => $_POST['reg_mobile_3'],
				'reg_ll' => $_POST['reg_ll'],
				'corp_mobile_1' => $_POST['corp_mobile_1'],
				'corp_mobile_2' => $_POST['corp_mobile_2'],
				'corp_mobile_3' => $_POST['corp_mobile_3'],
				'corp_ll' => $_POST['corp_ll'],
				'sales_mobile_1' => $_POST['sales_mobile_1'],
				'sales_mobile_2' => $_POST['sales_mobile_2'],
				'sales_mobile_3' => $_POST['sales_mobile_3'],
				'sales_ll' => $_POST['sales_ll'],
				'comission' => $_POST['comission'],	
				'created_date' => $created_date,
				'updated_date' => $updated_date,
				'updated_by' => $name
				
			);
			
			
			$this->Company_model->edit_company_basic($data);	
			$role_id= $_SESSION['role'];		
			//redirect("Company/add_companydata");
			$data['uname'] = $_SESSION['username'];	
			$data['menus']= $this->Admin_model->get_menus($role_id);
			$data['records'] = $this->Company_model->get_companydata();
			$data['bank_data']= $this->Company_model->get_company_bank();
			$data['tab']=1;
			$this->session->set_flashdata('msg', 'Company data updated.');
			$this->load->view('admin/company-master',$data);
		}		
		else 
		{
			/*if(!empty($this->uri->segment(3)))
			{
				$id = $this->uri->segment(3);	
				$data['title']= $id;
				$role_id= $_SESSION['role'];
				$data['uname'] = $_SESSION['username'];			
				$data['menus']= $this->Admin_model->get_menus($role_id);
				$data['bank_data']= $this->Company_model->get_company_bank();
				$this->load->view('admin/company-master',$data);				
			}
			else
			{
				$role_id= $_SESSION['role'];
				$data['uname'] = $_SESSION['username'];	
				$cust_id = 0;
				$data['menus']= $this->Admin_model->get_menus($role_id);
				$data['bank_data']= $this->Company_model->get_company_bank();
				$this->load->view('admin/company-master',$data);
			}*/
		}
	}
	public function EditCompany()
	{
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);
		//$id = $this->uri->segment('3');
		$data['basic'] = $this->Company_model->get_company_basic();		
		$this->load->view("admin/edit_company",$data);
	}	
	public function EditBank($id)
	{
			
		$role_id= $_SESSION['role'];
		$data = array();
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);		
		$data['bank_data'] = $this->Company_model->get_company_one_bank($id);		
		$this->load->view('admin/edit_company_bank',$data);
	}	
	
	public function DeleteBank($id)
	{
		//$id = $_REQUEST['id'];
		$this->Company_model->delete_company_bank($id);
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];			
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$data['records'] = $this->Company_model->get_companydata();
		$data['bank_data']= $this->Company_model->get_company_bank();
		$data['tab']=2;
		$this->session->set_flashdata('msg', 'Bank record deleted.');
		redirect("Company/add_company_bankdata",$data);
		
	}
	public function add_company_bankdata()
	{
		//$last_id = $this->db->select('id')->order_by('id',"desc")->limit(1)->get('customers')->row();
		$name = $_SESSION['userid'];
		$timestamp = time();			
		$created_date= date("Y-m-d", $timestamp);			
		$updated_date= date("Y-m-d h:i:s");	
		
		if(isset($_POST['add_bank']))
		{
			 $data= array(				
				'bank_name' => $_POST['bank_name'],
				'bank_name' => $_POST['bank_name'],
				'branch_name' => $_POST['branch'],
				'account_number' => $_POST['acc_number'],
				'ifsc_code' => $_POST['ifsc_code'],
				'penalty_charges' => $_POST['penalty'],
				'cheq_bounce_charges' => $_POST['bounce'],
				'created_date' => $created_date,
				'updated_date' => $updated_date,
				'updated_by' => $name		
			);
			
			$result= $this->Company_model->add_company_bank($data);
			//redirect("Customer/add_Custdata/".$result);
			$role_id= $_SESSION['role'];
			$data['uname'] = $_SESSION['username'];			
			$data['menus']= $this->Admin_model->get_menus($role_id);
			$data['records'] = $this->Company_model->get_companydata();
			$data['bank_data']= $this->Company_model->get_company_bank();
			$data['tab']=2;
			$this->session->set_flashdata('msg', 'Bank record added.');
			redirect("Company/add_company_bankdata",$data);
		}
		else 
		{
			
				$role_id= $_SESSION['role'];
				$data['uname'] = $_SESSION['username'];		
				$cust_id =0;
				$data['menus']= $this->Admin_model->get_menus($role_id);
				$data['records'] = $this->Company_model->get_companydata();
				$data['bank_data']= $this->Company_model->get_company_bank();	
				$data['tab']=2;			
				$this->load->view('admin/company-master',$data);
			
		}
			
			/*$bank_id = $this->uri->segment(3);	
			$id= $this->Customer_model->get_cust_id($bank_id);
			
			$cust_id = $id[0]->cus_id;
			
			$role_id= $_SESSION['role'];
			$data['uname'] = $_SESSION['username'];			
			$data['menus']= $this->Admin_model->get_menus($role_id);
			$data['bank_data']= $this->Customer_model->get_cust_bank($cust_id);
			$this->load->view('admin/customer-master',$data); 
		*/
	}
	public function update_company_bankdata()
	{
		//$last_id = $this->db->select('id')->order_by('id',"desc")->limit(1)->get('customers')->row();
		$name = $_SESSION['userid'];
		$timestamp = time();			
		$created_date= date("Y-m-d", $timestamp);			
		$updated_date= date("Y-m-d h:i:s");	

		
		if(isset($_POST['add_bank']))
		{
			 $data= array(				
				'bank_name' => $_POST['bank_name'],
				'branch_name' => $_POST['branch_name'],
				'account_number' => $_POST['account_number'],
				'ifsc_code' => $_POST['ifsc_code'],
				'penalty_charges' => $_POST['penalty_charges'],
				'cheq_bounce_charges' => $_POST['cheq_bounce_charges'],				
				'updated_by' => $name
						
			);
			
			$result= $this->Company_model->update_company_bank($_POST['id'],$data);
			//redirect("Customer/add_Custdata/".$result);
			$role_id= $_SESSION['role'];
			$data['uname'] = $_SESSION['username'];			
			$data['menus']= $this->Admin_model->get_menus($role_id);
			$data['records'] = $this->Company_model->get_companydata();
			$data['bank_data']= $this->Company_model->get_company_bank();
			$data['tab']=2;
			$this->session->set_flashdata('msg', 'Bank record updated.');
			//redirect("Company/company_master",$data);
			$this->load->view('admin/company-master',$data);
		}
		else 
		{
			
				/*$role_id= $_SESSION['role'];
				$data['uname'] = $_SESSION['username'];		
				$cust_id =0;
				$data['menus']= $this->Admin_model->get_menus($role_id);
				$data['records'] = $this->Company_model->get_companydata();
				$data['bank_data']= $this->Company_model->get_company_bank();				
				$this->load->view('admin/company-master',$data);
			*/
		}
			
			/*$bank_id = $this->uri->segment(3);	
			$id= $this->Customer_model->get_cust_id($bank_id);
			
			$cust_id = $id[0]->cus_id;
			
			$role_id= $_SESSION['role'];
			$data['uname'] = $_SESSION['username'];			
			$data['menus']= $this->Admin_model->get_menus($role_id);
			$data['bank_data']= $this->Customer_model->get_cust_bank($cust_id);
			$this->load->view('admin/customer-master',$data); 
		*/
	}
	public function get_bankdata()
	{
		$cus_id=$this->input->post('user_id');
		$data['res'] = $this->Customer_model->get_company_bank;
		$output = null;
		foreach($data['res'] as $row){
			$output.="<tr><td>".$row->bank_name."</td></tr>";
			}
		echo $output;
		
	}
	
	public function getdiff()
	{
		$this->load->model("Customer_model");
		$key = 'id';
		$cus_id = 1;
		$data=array("first_name"=>"Chetan", "middle_name"=>"Chetan", "last_name"=>"Joshi");
		$table = 'Customers';
		$diff = array();
		$diff = $this->Customer_model->get_update_fields($key,$cus_id,$data,$table);
		print_r($diff); 

	}
	
}

?>