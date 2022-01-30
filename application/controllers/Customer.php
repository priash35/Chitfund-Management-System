<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
		
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
		$this->load->model('Customer_model');		
	}	
	
	public function cust_master()
	{
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$data['records'] = $this->Customer_model->get_custdata();
		$this->load->view('admin/page-starter',$data);
	}
	
	public function add_Custdata()
	{			
		$name = $_SESSION['userid'];
		//$name = $_SESSION['username'];
		//$h = $_SESSION['userid'];
		$role_id= $_SESSION['role'];
		
		//$name = $this->session->userid;
		
		
		
		if(isset($_POST['add_cust']))
		{			
			$timestamp = time();			
			$created_date= date("Y-m-d", $timestamp);
			
			$updated_date= date("Y-m-d h:i:s");			
			$mobile = $_POST['mobile_1'];
			$email = $_POST['email1'];
			$data['refresh']= array(
				
				'first_name' => trim($_POST['f_name']),
				'middle_name' => trim($_POST['m_name']),
				'last_name' => trim($_POST['l_name']),
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
				'nominee' => trim($_POST['nominee']),
				'nominee_relation' => trim($_POST['n_relation']),
				'referred_by' => trim($_POST['ref_by']),
				'email_1' => trim($_POST['email1']),
				'email_2' => trim($_POST['email2']),
				'buss_name' => trim($_POST['business']),
				'buss_address' => trim($_POST['b_address']),
				'buss_type' => trim($_POST['b_type']),
				'family_member' => trim($_POST['family_member']),
				'created_date' => $created_date,
				'created_by' => $name,
				'updated_date' => $updated_date,
				'updated_by' => $name,
				'status' => 'ACTIVE'
			);
			$exists = $this->Customer_model->customer_exists($email,$mobile);
			//$count = count($exists);
			  if(!$exists)
			  {
				  $cust_id = $this->Customer_model->add_cust_basic($data['refresh']);	
				  $data['tab']=1;	
				  redirect("Customer/add_Custdata/".$cust_id);				
			  }
			  else
			  {
				 //$msg = "Email id or Mobile Number already exist.";
				//return false;
				$this->session->set_flashdata('msg1', 'Email id or Mobile Number already exist.');
				$role_id= $_SESSION['role'];
				$data['uname'] = $_SESSION['username'];
				$data['menus']= $this->Admin_model->get_menus($role_id);
				$data['tab']=1;
				$this->load->view('admin/customer-master',$data);
			  }
			
		}		
		else 
		{
			if($this->uri->segment(3))
			{
				$id = $this->uri->segment(3);	
				$data['title']= $id;
				$role_id= $_SESSION['role'];
				$data['uname'] = $_SESSION['username'];
				$data['menus']= $this->Admin_model->get_menus($role_id);
				//$id = $this->uri->segment('3');
				$data['basic'] = $this->Customer_model->get_cust_basic($id);
				$data['bank'] = $this->Customer_model->get_cust_bank($id);
				$data['doc_data']= $this->Customer_model->get_cust_docs($id);
				$data['family'] = $this->Customer_model->get_family();
				$data['tab']=1;		
				$this->session->set_flashdata('msg', 'Customer added');
				$this->load->view("admin/edit_cust",$data);
				/*$data['uname'] = $_SESSION['username'];			
				$data['menus']= $this->Admin_model->get_menus($role_id);
				$data['bank_data']= $this->Customer_model->get_cust_bank($id);
				$this->session->set_flashdata('msg', 'Customer added sucessfully');
				$this->load->view('admin/customer-master',$data);	*/			
			}
			else
			{
				$role_id= $_SESSION['role'];				
				$data['tab']=1;			
				$data['uname'] = $_SESSION['username'];	
				$cust_id = 0;
				$data['menus']= $this->Admin_model->get_menus($role_id);
				$data['bank_data']= $this->Customer_model->get_cust_bank($cust_id);
				$data['family'] = $this->Customer_model->get_family();						
				$this->load->view('admin/customer-master',$data);
			}
		}
	}
	public function EditCustomer($id)
	{
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];
		$data['menus']= $this->Admin_model->get_menus($role_id);
		//$id = $this->uri->segment('3');
		$data['basic'] = $this->Customer_model->get_cust_basic($id);
		$data['bank'] = $this->Customer_model->get_cust_bank($id);
		$data['doc_data']= $this->Customer_model->get_cust_docs($id);
		$data['family'] = $this->Customer_model->get_family();
		$data['tab']=1;		
		$this->load->view("admin/edit_cust",$data);
	}	
	public function update_Custdata()
	{
		$name = $_SESSION['userid'];
		if(isset($_POST['update_cust']))
		{				
			$updated_date= date("Y-m-d h:i:s");			
			$id= $_POST['cid'];
			$data= array(
				'id' => $_POST['cid'],
				'first_name' => trim($_POST['f_name']),
				'middle_name' => trim($_POST['m_name']),
				'last_name' => trim($_POST['l_name']),
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
				'nominee' => trim($_POST['nominee']),
				'nominee_relation' => trim($_POST['n_relation']),
				'referred_by' => trim($_POST['ref_by']),
				'email_1' => trim($_POST['email1']),
				'email_2' => trim($_POST['email2']),
				'buss_name' => trim($_POST['business']),
				'buss_address' => trim($_POST['b_address']),
				'buss_type' => trim($_POST['b_type']),
				'family_member' => trim($_POST['family_member']),				
				'updated_date' => $updated_date,
				'updated_by' => $name,
				'status' => 'ACTIVE'
			);
			
			$result= $this->Customer_model->update_cust_basic($id,$data);
			
			//redirect("Customer/cust_master");
			$role_id= $_SESSION['role'];
			$this->session->set_flashdata('msg', 'Customer Updated Successfully.');
			$data['uname'] = $_SESSION['username'];	
			$data['menus']= $this->Admin_model->get_menus($role_id);
			$data['records'] = $this->Customer_model->get_custdata();
			$data['basic'] = $this->Customer_model->get_cust_basic($_POST['cid']);
	   	  	$data['bank'] = $this->Customer_model->get_cust_bank($_POST['cid']);
			$data['doc_data']= $this->Customer_model->get_cust_docs($_POST['cid']);
			$data['family'] = $this->Customer_model->get_family();
			$data['tab']=1;		
			$this->load->view("admin/edit_cust",$data);			
			//$this->load->view('admin/customer-master',$data);
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
		$this->Customer_model->delete_cus_basic($id);
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];			
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$data['records'] = $this->Customer_model->get_custdata();
		$this->session->set_flashdata('msg', 'Customer record deleted.');
		redirect("Customer/cust_master",$data);
		//redirect("Customer/cust_master","refresh");	
	}
	public function add_bankdata()
	{
		//$last_id = $this->db->select('id')->order_by('id',"desc")->limit(1)->get('customers')->row();
		$name = $_SESSION['userid'];
		$timestamp = time();			
		$created_date= date("Y-m-d", $timestamp);			
		$updated_date= date("Y-m-d h:i:s");	

		
		if(isset($_POST['add_bank']))
		{
			$bank = $_POST['bank_name'];
			$account = $_POST['acc_number'];
			 $data= array(
				'cus_id' => $_POST['cus_id'],
				'bank_name' => trim($_POST['bank_name']),
				'branch_name' => trim($_POST['branch']),
				'account_number' => trim($_POST['acc_number']),
				'ifsc_code' => trim($_POST['ifsc_code']),
				'created_date' => $created_date,
				'updated_date' => $updated_date,
				'updated_by' => $name,
				'created_by' => $name		
			);
			
			$exists = $this->Customer_model->bank_exists($bank,$account,$_POST['cus_id']);
			//$count = count($exists);
			  if(!$exists)
			  {
				  $result= $this->Customer_model->add_cust_bank($data);
				  $role_id= $_SESSION['role'];
				  $data['uname'] = $_SESSION['username'];
				  $data['menus']= $this->Admin_model->get_menus($role_id);
				  $data['records'] = $this->Customer_model->get_custdata();	
				  $data['basic'] = $this->Customer_model->get_cust_basic($_POST['cus_id']);
				  $data['bank'] = $this->Customer_model->get_cust_bank($_POST['cus_id']);
				  $data['doc_data']= $this->Customer_model->get_cust_docs($_POST['cus_id']);
				  $data['family'] = $this->Customer_model->get_family();
				  $data['tab']=2;	
				  $this->session->set_flashdata('msg', 'Bank Record Added');	
				  $this->load->view("admin/edit_cust",$data);
					//redirect("Customer/add_Custdata/".$result);
					//redirect("Customer/add_bankdata/".$result);				
			  }
			  else
			  {
				 //$msg = "Email id or Mobile Number already exist.";
				//return false;
				$this->session->set_flashdata('msg1', 'Bank details already exist.');
				$role_id= $_SESSION['role'];
				$data['uname'] = $_SESSION['username'];
				$data['menus']= $this->Admin_model->get_menus($role_id);
				$data['basic'] = $this->Customer_model->get_cust_basic($_POST['cus_id']);
				$data['bank'] = $this->Customer_model->get_cust_bank($_POST['cus_id']);
				$data['doc_data']= $this->Customer_model->get_cust_docs($_POST['cus_id']);
				$data['family'] = $this->Customer_model->get_family();
				$data['tab']=2;		
				$this->load->view("admin/edit_cust",$data);
				//$this->load->view('admin/customer-master',$data);
			  }
			
			/* $result= $this->Customer_model->add_cust_bank($data);
			//redirect("Customer/add_Custdata/".$result);
			redirect("Customer/add_bankdata/".$result); */
			
		}
		else 
		{				
			if($this->uri->segment(3))
			{
				$bank_id = $this->uri->segment(3);	
				$id= $this->Customer_model->get_cust_id($bank_id);
				
				$cust_id = $id[0]->cus_id;
				
				$role_id= $_SESSION['role'];
				$this->session->set_flashdata('msg', 'Bank added sucessfully');
				$role_id= $_SESSION['role'];
				$data['uname'] = $_SESSION['username'];
				$data['menus']= $this->Admin_model->get_menus($role_id);
				$data['basic'] = $this->Customer_model->get_cust_basic($_POST['cus_id']);
				$data['bank'] = $this->Customer_model->get_cust_bank($_POST['cus_id']);
				$data['doc_data']= $this->Customer_model->get_cust_docs($_POST['cus_id']);
				$data['family'] = $this->Customer_model->get_family();
				$data['tab']=2;		
				$this->load->view("admin/edit_cust",$data);
				/*$data['uname'] = $_SESSION['username'];			
				$data['menus']= $this->Admin_model->get_menus($role_id);
				$data['bank_data']= $this->Customer_model->get_cust_bank($cust_id);
				$data['cust_id'] = $data['bank_data'][0]->cus_id;
				
				$this->load->view('admin/customer-master',$data);		*/
			}
			else
			{
				$role_id= $_SESSION['role'];
				$data['uname'] = $_SESSION['username'];
				$data['menus']= $this->Admin_model->get_menus($role_id);
				$data['basic'] = $this->Customer_model->get_cust_basic($_POST['cus_id']);
				$data['bank'] = $this->Customer_model->get_cust_bank($_POST['cus_id']);
				$data['doc_data']= $this->Customer_model->get_cust_docs($_POST['cus_id']);
				$data['family'] = $this->Customer_model->get_family();
				$data['tab']=2;		
				$this->load->view("admin/edit_cust",$data);
				//$this->load->view('admin/customer-master',$data);
				/*$data['uname'] = $_SESSION['username'];		
				//$cust_id =0;
				$data['menus']= $this->Admin_model->get_menus($role_id);
				//$data['bank_data']= $this->Customer_model->get_cust_bank($cust_id);				
				$this->load->view('admin/customer-master',$data);*/
			}
		}
			
	}
	public function EditBank()
	{
		//$role_id= $_SESSION['role'];
		$id = $this->input->post('bank_id');
		
		$data = $this->Customer_model->get_cust_bank_details($id);
		
		echo json_encode($data);
	}
	public function update_bankdata()
	{
		$name = $_SESSION['userid'];
						
			$updated_date= date("Y-m-d h:i:s");			
			$id= $_POST['b_id'];
			$data= array(
				'cus_id' => $_POST['c_id'],
				'bank_name' => trim($_POST['b_name']),
				'branch_name' => trim($_POST['br_name']),
				'account_number' => trim($_POST['a_num']),
				'ifsc_code' => trim($_POST['if_code']),
				'updated_date' => $updated_date,
				'updated_by' => $name		
			);
			
			
			$result= $this->Customer_model->update_cust_bank($id,$data);
			//redirect("Customer/cust_master");
			$role_id= $_SESSION['role'];
			$data['uname'] = $_SESSION['username'];
			$data['menus']= $this->Admin_model->get_menus($role_id);
			$data['basic'] = $this->Customer_model->get_cust_basic($_POST['c_id']);
			$data['bank'] = $this->Customer_model->get_cust_bank($_POST['c_id']);
			$data['doc_data']= $this->Customer_model->get_cust_docs($_POST['c_id']);
			$data['family'] = $this->Customer_model->get_family();
			$data['tab']=2;		
			$this->load->view("admin/edit_cust",$data);
			//$this->load->view('admin/customer-master',$data);
			//redirect("Customer/add_bankdata",$data);
		//$this->load->view('admin/customer-master');
	}
	public function DeleteBank()
	{
		$id = $_REQUEST['id'];
		$bank_id= $this->Customer_model->get_cust_id($id);
		$cust_id = $bank_id[0]->cus_id;
		
		$this->Customer_model->delete_cus_bank($id);
		
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];			
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$data['basic'] = $this->Customer_model->get_cust_basic($cust_id);
		$data['bank'] = $this->Customer_model->get_cust_bank($cust_id);
		$data['doc_data']= $this->Customer_model->get_cust_docs($cust_id);
		$data['family'] = $this->Customer_model->get_family();
		$data['tab']=2;	
		/*$data['records'] = $this->Customer_model->get_cust_basic($cust_id);
		$data['bank_data']= $this->Customer_model->get_cust_bank($cust_id); */
		$data['cust_id'] = $cust_id;
	
		//$data['tab']=2;
		$this->session->set_flashdata('msg', 'Bank record deleted.');
		//redirect("Company/add_company_bankdata",$data);
		$this->load->view("admin/edit_cust",$data);
	}
	public function get_bankdata()
	{
		$cus_id=$this->input->post('user_id');
		$data['res'] = $this->Customer_model->get_cust_bank($cus_id);
		$output = null;
		foreach($data['res'] as $row){
			$output.="<tr><td>".$row->bank_name."</td></tr>";
			}
		echo $output;
		
	}
	public function add_documents()
	{
		$name = $_SESSION['userid'];
		$timestamp = time();			
		$created_date= date("Y-m-d", $timestamp);
		
		
		if(isset($_POST['add_docs']) && !empty($_FILES['documents']['name']))
		{
			$cus_id= $_POST['cus_id'];
            $filesCount = count($_FILES['documents']['name']);
            for($i = 0; $i < $filesCount; $i++){
               // $_FILES['userFile']['name'] = $_FILES['documents']['name'][$i];
            	$ext = pathinfo($_FILES['documents']['name'][$i], PATHINFO_EXTENSION);
            	$_FILES['userFile']['name'] = $cus_id."_".str_replace(' ', '', $_POST['doc_name'][$i])."_".$created_date."_".time().".".$ext;
                $_FILES['userFile']['type'] = $_FILES['documents']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['documents']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['documents']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['documents']['size'][$i];
				$doc_name = $_POST['doc_name'][$i];
                $uploadPath = 'assets/uploads/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'gif|jpg|png';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
					//$uploadData[$i]['document_type'] = ;
					$uploadData[$i]['cus_id'] = $cus_id;
					$uploadData[$i]['document_type'] = $doc_name;
                    $uploadData[$i]['document_name'] = base_url().$uploadPath.$fileData['file_name'];
                    $uploadData[$i]['created_date'] = $created_date;
					$uploadData[$i]['created_by'] = $name;
					$uploadData[$i]['updated_by'] = $name;
					
                }
            }
			
            if(!empty($uploadData)){
                //Insert file information into the database
                $result = $this->Customer_model->add_cust_docs($uploadData);
            }
			$role_id= $_SESSION['role'];
			$data['uname'] = $_SESSION['username'];
			$data['menus']= $this->Admin_model->get_menus($role_id);
			$data['basic'] = $this->Customer_model->get_cust_basic($_POST['cus_id']);
			$data['bank'] = $this->Customer_model->get_cust_bank($_POST['cus_id']);
			$data['doc_data']= $this->Customer_model->get_cust_docs($_POST['cus_id']);
			$data['family'] = $this->Customer_model->get_family();
			$data['tab']=3;		
			$this->load->view("admin/edit_cust",$data);
			//redirect("Customer/add_documents/".$result);
			
        }
		else 
		{
			if($this->uri->segment(3))
			{
				$doc_id = $this->uri->segment(3);	
				$id= $this->Customer_model->get_custdoc_id($doc_id);
				
				$cust_id = $id[0]->cus_id;
				
				$role_id= $_SESSION['role'];
				$data['uname'] = $_SESSION['username'];
				$data['menus']= $this->Admin_model->get_menus($role_id);
				$data['basic'] = $this->Customer_model->get_cust_basic($_POST['cus_id']);
				$data['bank'] = $this->Customer_model->get_cust_bank($_POST['cus_id']);
				$data['doc_data']= $this->Customer_model->get_cust_docs($_POST['cus_id']);
				$data['family'] = $this->Customer_model->get_family();
				$data['tab']=3;		
				$data['cust_id'] = $data['doc_data'][0]->cus_id; 
				$this->session->set_flashdata('msg', 'Documents added sucessfully');
				$this->load->view("admin/edit_cust",$data);
				//$this->load->view('admin/customer-master',$data);		
			}
			else
			{
				$role_id= $_SESSION['role'];
				$data['uname'] = $_SESSION['username'];
				$data['menus']= $this->Admin_model->get_menus($role_id);
				$data['basic'] = $this->Customer_model->get_cust_basic($_POST['cus_id']);
				$data['bank'] = $this->Customer_model->get_cust_bank($_POST['cus_id']);
				$data['doc_data']= $this->Customer_model->get_cust_docs($_POST['cus_id']);
				$data['family'] = $this->Customer_model->get_family();
				$data['tab']=3;		
				$data['cust_id'] = $data['doc_data'][0]->cus_id; 
				//$this->session->set_flashdata('msg', 'Documents added sucessfully');
				$this->load->view("admin/edit_cust",$data);				
				//$this->load->view('admin/customer-master',$data);
			}
		}
			
	}	
	/* public function EditDocument()
	{
		//$role_id= $_SESSION['role'];
		$id = $this->input->post('doc_id');
		
		$data = $this->Customer_model->get_cust_doc_details($id);
		
		echo json_encode($data,JSON_UNESCAPED_SLASHES);
	} */
	/* public function update_documents()
	{
		$uname = $_SESSION['username'];		
		$id= $_POST['id'];
		$cus_id= $_POST['customer_id'];
		$doc_type= $_POST['doc_name'];
		
		
		 if($_FILES['id_proof1']['tmp_name']!="")
			{
		
				$file_name = $_FILES['id_proof1']['name'];			 
				$file_tmp =$_FILES['id_proof1']['tmp_name'];
				$dest= "./assets/uploads/".$file_name;
				$img="assets/uploads/".$file_name;
				$img_url=base_url().$img;
				move_uploaded_file($file_tmp, $dest);
			}	
			else
			{
				//$file_name = $_POST['doc_name'];
				$img_url = $_POST['c_id_proof'];
			}
			
			$data= array(
				'cus_id' => $cus_id,
				'document_type' => $doc_type,
				'document_name' => $img_url,
				'updated_by' => $uname		
			); 
			//print_r($data);
			$result= $this->Customer_model->update_cust_docs($id,$data);
	
		//$this->load->view('admin/customer-master');
	} */
	public function DeleteDocument()
	{
		$id = $_REQUEST['id'];
		$doc_id= $this->Customer_model->get_custdoc_id($id);
		$cust_id = $doc_id[0]->cus_id;
		$this->Customer_model->delete_cus_docs($id);
		
		$role_id= $_SESSION['role'];
		$data['uname'] = $_SESSION['username'];			
		$data['menus']= $this->Admin_model->get_menus($role_id);
		$data['doc_data']= $this->Customer_model->get_cust_docs($cust_id); 
		$data['basic'] = $this->Customer_model->get_cust_basic($cust_id);
		$data['bank'] = $this->Customer_model->get_cust_bank($cust_id);
		$data['family'] = $this->Customer_model->get_family();
		$data['cust_id'] = $cust_id;
		$data['tab']=3;	
		$this->session->set_flashdata('msg', 'Document deleted Successfully.');
		$this->load->view("admin/edit_cust",$data);		
		//$this->load->view('admin/customer-master',$data);
	}
	public function check_names()
	{	
		$f_name = trim($this->input->post('f_name'));
		$m_name = trim($this->input->post('m_name'));
		$l_name = trim($this->input->post('l_name'));
		
		$result = $this->Customer_model->check_name_values($f_name,$m_name,$l_name);
		if($result)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
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
	public function test()
	{
		echo "Working";
	}
}

?>