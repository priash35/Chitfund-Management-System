<?php include_once ("master/header.php"); ?>

<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>/Admin/index">Main</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>/Customer/cust_master">Customer Master</a></li>
                                    <li class="breadcrumb-item active">Add New Customer</li>
                                </ol>
                            </div>
                            <!-- <h4 class="page-title">Tabs</h4> -->
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
											<?php 
								 				if($tab == 1){
								 					$tab_pane1="tab-pane show active";
								 					$nav1="nav-link active";
								                    $tab_pane2="tab-pane";
								                	$nav2="nav-link";
								                	$tab_pane3="tab-pane";
								                	$nav3="nav-link";
								                }
								                elseif ($tab == 2){
								                	$tab_pane1="tab-pane";
								                	$nav1="nav-link";
								                    $tab_pane2="tab-pane show active";
								                    $nav2="nav-link active";
								                    $tab_pane3="tab-pane";
								                	$nav3="nav-link";
								                    }
								                else{
								                	$tab_pane1="tab-pane";
								                	$nav1="nav-link";
								                    $tab_pane3="tab-pane show active";
								                    $nav3="nav-link active";
								                    $tab_pane2="tab-pane";
								                	$nav2="nav-link";
								                }
								            ?>
											
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h3 class="header-title m-t-0 m-b-30">New Customer Details</h3>
							<?php if($this->session->flashdata('msg1')){ ?>
								<div class="alert alert-danger">
									<?php echo $this->session->flashdata('msg1'); ?>
								</div>
							<?php }else if($this->session->flashdata('msg')){ ?>
								<div class="alert alert-success">
									<?php echo $this->session->flashdata('msg'); ?>
								</div>
							<?php }?>
                            <ul class="nav nav-pills navtab-bg nav-justified pull-in ">
                                <li class="nav-item">
                                    <a href="#home1" data-toggle="tab" aria-expanded="true" class="<?php echo $nav1;?>">
                                        <i class="fi-head mr-2"></i> Basic
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#profile1" data-toggle="tab" aria-expanded="false" class="<?php echo $nav2;?>">
                                        <i class="fi-monitor mr-2"></i>Bank Details 
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#messages1" data-toggle="tab" aria-expanded="false" class="<?php echo $nav3;?>">
                                        <i class="fi-mail mr-2"></i> Documents
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="#settings1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                        <i class="fi-cog mr-2"></i> Settings
                                    </a>
                                </li> -->
                            </ul>
                             <?php 
														
														$roleid="";
														if(isset($refresh)){		

															//foreach($refresh as $data){
																
																$f_name = $refresh['first_name'];
																//$first_name = $refresh['first_name'];
																$m_name = $refresh['middle_name'];
																$l_name= $refresh['last_name'];
																$family = $refresh['family'];
																$perm_add = $refresh['perm_add'];
																$temp_add = $refresh['temp_add'];
																$mobile_1 = $refresh['mobile_1'];
																$mobile_2 =$refresh['mobile_2'];
																$mobile_3 = $refresh['mobile_3'];
																$mobile_4 = $refresh['mobile_4'];
																$land_line = $refresh['land_line'];
																$dob = $refresh['dob'];
																$gender = $refresh['gender'];
																$nominee = $refresh['nominee'];
																$nominee_relation = $refresh['nominee_relation'];
																$referred_by = $refresh['referred_by'];
																$email_1 = $refresh['email_1'];
																$email_2 = $refresh['email_2'];
																$buss_name = $refresh['buss_name'];
																$buss_address = $refresh['buss_address'];
																$buss_type = $refresh['buss_type'];
																$family_member = $refresh['family_member'];
															

															//}
											}?>
                            <div class="tab-content">
                                 <div class="<?php echo $tab_pane1;?>" id="home1">
									<div class="col-md-12 row">
										
										<div class="col-md-6">
											
												<div class="card-box">
													
													<!-- <h4 class="m-t-0 m-b-30 header-title">Horizontal form</h4> -->
													<form name="myform" id="myform" action="<?php echo base_url()?>Customer/add_Custdata" method="post" enctype="multipart/form-data">
														<!--<div class="form-group row">
															<label class="col-3 col-form-label">Name Title</label>
															<div class="col-9">
																<input type="text" id="title" name="title" class="form-control" value="" placeholder="Mr/Mrs">
															</div>
														</div>-->
														<div class="form-group row">
															<label class="col-3 col-form-label">First Name</label>
															<div class="col-9">
																<input type="text" id="f_name" name="f_name"  class="form-control" value="<?php if(isset($f_name)){ echo $f_name;} ?>" required>
																<p id="error-message" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Middle Name</label>
															<div class="col-9">
																<input type="text" id="m_name" name="m_name"  class="form-control" value="<?php if(isset($m_name)){ echo $m_name;} ?>" required>
																<p id="error-message1" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Last Name</label>
															<div class="col-9">
																<input type="text" id="l_name" name="l_name" class="form-control" value="<?php if(isset($l_name)){ echo $l_name;} ?>" onfocusout="check_values()" required>
																<p id="error-message2" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Family</label>
															<div class="col-9">
																<input type="text" id="family" name="family" class="form-control" value="" required>
																<p id="error-message3" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Permanent Address</label>
															<div class="col-9">
																<textarea class="form-control" id="p_address" name="p_address"  rows="5" required><?php if(isset($perm_add)){ echo $perm_add;} ?></textarea>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Temporary Address</label>
															<div class="col-9">
																<textarea class="form-control" id="t_address" name="t_address"  rows="5"><?php if(isset($temp_add)){ echo $temp_add;} ?></textarea>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Contact:</label>
																			
															<div class="col-9 row">
																<label class="col-4 col-form-label">Mobile-1</label>
																<div class="col-8">
																	<input class="form-control" type="tel" id="mobile_1" name="mobile_1" placeholder="Mobile Number 1"  value="<?php if(isset($mobile_1)){ echo $mobile_1;} ?>" maxlength="10" required><p id="error-message4" style="color:red;"></p>
																</div>
																<br><br>
																<label class="col-4 col-form-label">Mobile-2</label>
																<div class="col-8">
																	<input class="form-control" type="tel" id="mobile_2" name="mobile_2"  value="<?php if(isset($mobile_2)){ echo $mobile_2;} ?>"  maxlength="10" placeholder="Mobile Number 2">
																</div>
																<br><br>
																<label class="col-4 col-form-label">Mobile-3</label>
																<div class="col-8">
																	<input class="form-control" type="tel" id="mobile_3" name="mobile_3"  value="<?php if(isset($mobile_3)){ echo $mobile_3;} ?>" maxlength="10" placeholder="Mobile Number 3">
																</div>
																<br><br>
																<label class="col-4 col-form-label">Mobile-4</label>
																<div class="col-8">
																	<input class="form-control" type="tel" id="mobile_4" name="mobile_4"  value="<?php if(isset($mobile_4)){ echo $mobile_4;} ?>" maxlength="10" placeholder="Mobile Number 4">
																</div>
																<br><br>
																<label class="col-4 col-form-label">Landline</label>
																<div class="col-8">
																	<input class="form-control" type="tel" id="landline" name="landline" value="<?php if(isset($land_line)){ echo $land_line;} ?>" maxlength="10" placeholder="Landline Number" >
																</div>
															<br><br>
															</div>												
														</div>														
														
												</div>
										</div>
										<div class="col-md-6">
												<div class="card-box">
														<div class="form-group row">
															<label class="col-3 col-form-label">DOB</label>
															<div class="col-9">
																<input id="date" name="date" class="form-control" type="date" value="<?php if(isset($dob)){ echo $dob;} ?>" required>
																<!--<div class="input-group">
																<input type="text" class="form-control" placeholder="dd/mm/yyyy" id="datepicker-autoclose" id="date" name="date">
																<div class="input-group-append">
																	<span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
																</div>
																</div>-->
																
															</div>
															
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Gender</label>
															<div class="col-9">
																<div class="radio radio-info form-check-inline">
																	<input type="radio" id="inlineRadio1" value="Male" <?php if(isset($gender)) echo ($gender== 'Male') ?  "checked" : "" ;  ?> name="radioInline" required>
																	<label for="inlineRadio1"> Male </label>
																</div>
																<div class="radio radio-info form-check-inline">
																	<input type="radio" id="inlineRadio2" value="Female" <?php if(isset($gender)) echo ($gender== 'Female') ?  "checked" : "" ;  ?> name="radioInline" required>
																	<label for="inlineRadio2"> Female </label>
																</div>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Nominee</label>
															<div class="col-9">
																<input type="text" class="form-control" id="nominee" name="nominee" value="<?php if(isset($nominee)){ echo $nominee;} ?>" >
																<p id="error-message6" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Nominee Relation</label>
															<div class="col-9">
																<input type="text" class="form-control" id="n_relation" name="n_relation" value="<?php if(isset($nominee_relation)){ echo $nominee_relation;} ?>" >
																<p id="error-message7" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Reffered By</label>
															<div class="col-9">
																<input type="text" class="form-control" id="ref_by" name="ref_by" value="<?php if(isset($referred_by)){ echo $referred_by;} ?>" >
																<p id="error-message8" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Email</label>
															<div class="col-9">
																<input type="email" class="form-control" id="email1" name="email1" value="<?php if(isset($email_1)){ echo $email_1;} ?>" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Alternate Email</label>
															<div class="col-9">
																<input type="email" class="form-control" id="email2" name="email2" value="<?php if(isset($email_2)){ echo $email_2;} ?>"  placeholder="(optional)">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Business Name</label>
															<div class="col-9">
																<input type="text" class="form-control" id="business" name="business" value="<?php if(isset($buss_name)){ echo $buss_name;} ?>" >
																<p id="error-message9" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Address</label>
															<div class="col-9">
																<textarea class="form-control" id="b_address" name="b_address" rows="5"><?php if(isset($buss_address)){ echo $buss_address;} ?></textarea>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Nature of Business</label>
															<div class="col-9">
																<input type="text" class="form-control" id="b_type" name="b_type" value="<?php if(isset($buss_type)){ echo $buss_type;} ?>" >
																<p id="error-message10" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Family Members</label>
															<div class="col-9">
																<input type="text" class="form-control" id="family_member" name="family_member" value="<?php if(isset($family_member)){ echo $family_member;} ?>" >
																<p id="error-message11" style="color:red;"></p>
															</div>
														</div>
														<!--<div class="form-group row">
															<label class="col-3 col-form-label">Auction preference</label>
															<div class="col-9">
																<input type="text" class="form-control" value="" >
															</div>
														</div>-->														
													
												</div>
										</div>
										
										<div class="col-md-12 text-center">
												<button type="submit" id="add_cust" name="add_cust" class="btn btn-maroon btn-lg">Submit</button>				
										</div>
										</form>
									</div>
                                </div>
                                <div class="<?php echo $tab_pane2;?>" id="profile1">
                                    <div class="col-md-12 row">
									
										<div class="col-md-12 text-right">
											<button id="add_form" class="btn btn-gold btn-lg"><a style="color:#ffffff;">Add Bank Details</a></button>														
										</div>		
										
										<div class="col-md-2">
										</div>
										<div class="col-md-8">
											<section id="bank">
												<div class="card-box">
													<form name="registration" id="myform1" action="<?php echo base_url()?>Customer/add_bankdata" method="post" enctype="multipart/form-data">
														<div class="form-group row">
															<label class="col-4 col-form-label">Bank Name</label>
															<div class="col-8">
																<?php if(isset($title)){?>
																<input type="hidden" class="form-control" value="<?php echo $title;  ?>" id="cus_id" name="cus_id"><?php }
																else if(isset($cust_id)) //echo $cust_id;
																{?>
																	
																<input type="hidden" class="form-control" value="<?php echo $cust_id;  ?>" id="cus_id" name="cus_id">	
																<?php }
																?>
																<input type="text" class="form-control" value="" id="bank_name" name="bank_name" >
																<p id="bank_error" style="color:red;" required></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Branch</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" id="branch" name="branch" >
																<p id="bank_error1" style="color:red;" required></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Account number</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" id="acc_number" name="acc_number" >
																<p id="bank_error2" style="color:red;" required></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">IFSC code</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" id="ifsc_code" name="ifsc_code" required>
																<p id="bank_error3" style="color:red;"></p>
															</div>
														</div>
														<!--<div class="form-group row">
															<label class="col-4 col-form-label">Security Cheque</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" id="cheque" name="cheque" >
															</div>
														</div>-->
														<div class="col-md-12 text-center">
															<button type="submit" id="add_bank" name="add_bank" class="btn btn-maroon btn-lg">Submit</button>

														</div>
													</form>
												</div>
											</section>
										</div>
										<div class="col-md-8">
											<section id="bank_update">
												<div class="card-box">
													<form id="bank_form" action="<?php echo base_url()?>Customer/update_bankdata" method="post">
														<div class="form-group row">
																<label class="col-4 col-form-label">Bank Name</label>
															<div class="col-8">
																
																<input type="hidden" class="form-control" id="b_id" name="b_id">	
																<input type="hidden" class="form-control" id="c_id" name="c_id">	
																<input type="text" class="form-control" id="b_name" name="b_name">
																<p id="error" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Branch</label>
															<div class="col-8">
																<input type="text" class="form-control"id="br_name" name="br_name" >
																<p id="error1" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Account number</label>
															<div class="col-8">
																<input type="text" class="form-control"  id="a_num" name="a_num" >
																<p id="error2" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">IFSC code</label>
															<div class="col-8">
																<input type="text" class="form-control"  id="if_code" name="if_code" >
																<p id="error3" style="color:red;"></p>
															</div>
														</div>	
														<div class="col-md-12 text-center">
															<button id="update_bank" name="update_bank" class="btn btn-maroon btn-lg">Submit</button>
														</div>
													</form>
												</div>
											</section>
										</div>
										<div class="col-md-2">
										</div>
										
										
										<br>
										<h3 class="header-title m-t-0 m-b-30 text-center">Already added Bank Delails</h3>										
										<br>
										<table id="datatable-buttons" class="table table-striped table-bordered toggle-circle m-b-0" data-page-size="7">
											<thead>
											<tr>
												<!--<th>Customer Name</th>-->
												<th data-toggle="true">Bank Name</th>
												<th>Branch</th>
												<th>Account number</th>
												<th>IFSC code</th>
												<!--<th>Security Cheque</th>-->
												<th>Action</th>
											</tr>
											</thead>
											<tbody id="bank_table">
												<?php 
													if(isset($bank_data)){
													foreach($bank_data as $post){ $customer= $post->cus_id;?>
												<tr>
													<!--<td><?php //echo $post->first_name;?></td>-->
													<td><?php echo $post->bank_name;?></td>
													<td><?php echo $post->branch_name;?></td>
													<td><?php echo $post->account_number;?></td>
													<td><?php echo $post->ifsc_code;?></td>	
													<td><a href="#" onclick="edit_bank(<?php echo $post->id; ?>)"><span class="btn btn-sm btn-default fa fa-edit"></span></a>
													<a href="#" onclick="delete_bank(<?php echo $post->id; ?>)"><span class="btn btn-sm btn-default fa fa-trash"></span></a></td>
												</tr>
													<?php } }?>
											</tbody>
										</table>
									</div>
								
                                </div>
                                <div class="<?php echo $tab_pane3;?>" id="messages1">
									<div class="col-md-12 row">
										<div class="col-md-12 text-right">
											<button id="add_document_form" class="btn btn-gold btn-lg"><a style="color:#ffffff;">Add Documents</a></button>														
										</div>
										<br>
										
										<div class="col-md-3">
										</div>
										<div class="col-md-6">
											<section id="documents">
											<div class="card-box">											
												<div class="demo-box">
													<form name="myform2" id="myform2" action="<?php echo base_url()?>Customer/add_documents" method="post" enctype="multipart/form-data">				
														<div class="form-group m-b-0">
															<p class="mb-2 mt-4 font-weight-bold">ID Proof</p>
															<?php if(isset($title)){?>
																<input type="hidden" class="form-control" value="<?php echo $title;  ?>" id="cus_id" name="cus_id"><?php }
																else if(isset($cust_id))
																{?>
																	
																<input type="hidden" class="form-control" value="<?php echo $cust_id;  ?>" id="cus_id" name="cus_id">	
																<?php }
																?>
															<input type="hidden" class="form-control" value="Id proof" id="id_name" name="doc_name[]">
															<input type="file" id="id_proof" name="documents[]" class="filestyle" data-btnClass="btn-maroon">
														</div>
														<div class="form-group m-b-0">
															<p class="mb-2 mt-4 font-weight-bold">Residence proof</p>
															<input type="hidden" class="form-control" value="Residence proof" id="res_name" name="doc_name[]">
															<input type="file" id="res_proof" name="documents[]" class="filestyle" data-btnClass="btn-maroon">
														</div>
														<div class="form-group m-b-0">
															<p class="mb-2 mt-4 font-weight-bold">Photo</p>
															<input type="hidden" class="form-control" value="Photo" id="photo_name" name="doc_name[]">
															<input type="file" id="photo" name="documents[]" class="filestyle" data-btnClass="btn-maroon">
														</div>
														<div class="form-group m-b-0">
															<p class="mb-2 mt-4 font-weight-bold">Income Proof</p>
															<input type="hidden" class="form-control" value="Income Proof" id="income_name" name="doc_name[]">
															<input type="file" id="income_proof" name="documents[]" class="filestyle" data-btnClass="btn-maroon">
														</div>
														<div class="form-group m-b-0">
															<p class="mb-2 mt-4 font-weight-bold">Bank statement</p>
															<input type="hidden" class="form-control" value="Bank statement" id="b_state_name" name="doc_name[]">
															<input type="file" id="bank_statement" name="documents[]" class="filestyle" data-btnClass="btn-maroon">
														</div>
														<div class="form-group m-b-0">
															<p class="mb-2 mt-4 font-weight-bold">Visiting card</p>
															<input type="hidden" class="form-control" value="Visiting card" id="card_name" name="doc_name[]">
															<input type="file" id="visit_card" name="documents[]" class="filestyle" data-btnClass="btn-maroon">
														</div>
														<div class="col-md-12 text-center">
															<button type="submit" id="add_docs" name="add_docs" class="btn btn-maroon btn-lg">Submit</button>
															
														</div>												
													</form>
												</div>
											</div>
											</section>
										</div>
										<div class="col-md-3">
										</div>
										<h3 class="header-title m-t-0 m-b-30 text-center">Already added Bank Delails</h3>										
										<br>
										<table id="datatable-buttons" class="table table-striped table-bordered toggle-circle m-b-0" data-page-size="7">
											<thead>
											<tr>
												<th data-toggle="true">Sr. No.</th>
												<th>Document Type</th>
												<th>Document</th>
												<th>Action</th>
											</tr>
											</thead>
											<tbody>
											<?php 
													if(isset($doc_data)){
													$i=1;
													foreach($doc_data as $row){  ?>
												<tr>
													<td><?php echo $row->id;?></td>
													<td><?php echo $row->document_type;?></td>
													<td><a href="<?php echo $row->document_name;?>" target="_blank"><?php echo $row->document_name;?></a></td>
													<td>
													<a href="#" onclick="delete_doc(<?php echo $row->id; ?>)"><span class="btn btn-sm btn-default fa fa-trash"></span></a></td>
												</tr>
											<?php $i++;} }?>			
											
											</tbody>
											<tfoot>
											<tr class="active">
												<td colspan="6">
													<div class="text-right">
														<ul class="pagination pagination-split justify-content-end footable-pagination m-t-10 m-b-0"></ul>
													</div>
												</td>
											</tr>
											</tfoot>
										</table>
										<br>
										
									</div>                                 
                                </div>
                                <!-- Bank modal content -->
									
								
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->



            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
		
<?php include_once ("master/footer.php"); ?>

</script>
<script>
function check_values()
{
	var f_name = $('#f_name').val();
	var m_name = $('#m_name').val();
	var l_name = $('#l_name').val();
	
	$.ajax({
		type: 'post', 
		url: '<?php echo base_url("Customer/check_names");?>',
		data: {f_name:f_name,m_name:m_name,l_name:l_name},
		success: function(data)
		{	if(data == 1)
			{
				 
					swal({
						title: 'Are you sure?',
						text: "This name is already exist. Do you still want to continue ?",
						type: 'warning',
						showCancelButton: true,
						confirmButtonClass: 'btn btn-confirm mt-2',
						cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
						confirmButtonText: 'Yes!'
					}).then(function () {
                /* swal({
                    title: 'Deleted !',
                    text: "Your file has been deleted",
                    type: 'success',
                    confirmButtonClass: 'btn btn-confirm mt-2'
                }
                ) */
				 
					}, function (dismiss) {
					// dismiss can be 'cancel', 'overlay',
					// 'close', and 'timer'
						if (dismiss === 'cancel') {
							/* swal({
								title: 'Cancelled',
								text: "Your imaginary file is safe :)",
								type: 'error',
								confirmButtonClass: 'btn btn-confirm mt-2'
							}
							) */
							 location.reload();
						}
					})
			}
			
		
		}/* ,
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert('Error get data from ajax');
		} */
	});
}

$(document).ready(function() {  
	$('#bank').hide();
	$('#bank_update').hide();
	$('#documents').hide();
		
	$("#add_form").click(function(){
		$('#bank').show();
		$('#bank_update').hide();
	});
	
	$("#add_document_form").click(function(){
		$('#documents').show();
	});
	
	
	$(function(){
	
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear()-18;
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
 
    //alert(maxDate);
    $('#date').attr('max', maxDate);
}); 

});

	
</script>
<script>
function edit_bank(bank_id)
{
 
  //Ajax Load data from ajax
	
	   $.ajax({
		  type: 'post',
		  url: '<?php echo base_url("Customer/EditBank");?>',
		  data: {bank_id:bank_id},
		  success: function(data){
			  var obj = $.parseJSON(data);
			  
			  $('#b_id').val(obj.id);
			  $('#c_id').val(obj.cus_id);
			  $('#b_name').val(obj.bank_name);
			  $('#a_num').val(obj.account_number);
			  $('#if_code').val(obj.ifsc_code);
			  $('#br_name').val(obj.branch_name); 
			  $('#bank_update').show();  
		  	  $('#bank').hide();
		  },
		  error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});

}

	/*$("#update_bank").click(function(){
    var b_id = $('#b_id').val();
	var c_id = $('#c_id').val();
	var b_name = $('#b_name').val();
	var a_num = $('#a_num').val();
	var if_code = $('#if_code').val();
	var br_name = $('#br_name').val();
	 $.ajax({
		type: 'post', 
		url: '<?php echo base_url("Customer/update_bankdata");?>',
		data: {b_id:b_id,c_id:c_id,b_name:b_name,a_num:a_num,if_code:if_code,br_name:br_name},
		success: function(data)
		{	
			
		}
	});
	});*/

function delete_bank(ins_id)
			{
			
				if(ins_id!="")
				{
					var conf= confirm("Are you sure you want to delete?");
					
					if(conf)
					{
						window.location.href= "<?php echo site_url('Customer/DeleteBank');?>?id="+ins_id;
						
					}
				}
			}
/* function delete_bank(bank_id)
{
	if(bank_id!="")
	{
		var conf= confirm("Are you sure you want to delete?");
					
		if(conf)
		{
			$('#bank_table').hide();
			$.ajax({
			  type: 'post',
			  url: '<?php echo base_url("Customer/DeleteBank");?>',
			  data: {bank_id:bank_id},
			  success: function(data){
				  alert(data);
				  $('#bank_table').html(data);
			  },
			  error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error get data from ajax');
				}
			});	
		}
	} 
	

} */
</script>
<script>
/* function edit_doc(doc_id)
{
 
  //Ajax Load data from ajax
	
	   $.ajax({
		  type: 'post',
		  url: '<?php echo base_url("Customer/EditDocument");?>',
		  data: {doc_id:doc_id},
		  success: function(data){
			  var obj = $.parseJSON(data);
			  $('#id').val(obj.id);
			  $('#customer_id').val(obj.cus_id);
			  $('#doc_name').val(obj.document_type);
			  $('#c_id_proof').val(obj.document_name);
			  $("#proof_lable").attr("href", obj.document_name)
			  $('#doc-modal').modal('show');  // show bootstrap modal when complete loaded
		  },
		  error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});

} */
</script>
<script>
/* $("#doc_form").on('submit',(function(e) {
e.preventDefault();
	$.ajax({
		url: '<?php echo base_url("Customer/update_documents");?>',
		type: "POST",
		data:  new FormData(this),
		contentType: false,
		cache: false,
		processData:false,
		success: function(data){
			//alert(data);
		//$("#gallery").html(data);
		//$('#doc-modal').modal('hide');
		},
		error: function(){} 	        
	});
})); */
/* 	//file type validation
 $("#id_proof1").change(function() {
	var file = this.files[0];
	var imagefile = file.type;
	var match= ["image/jpeg","image/png","image/jpg"];
	if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
		alert('Please select a valid image file (JPEG/JPG/PNG).');
		$("#file").val('');
		return false;
	}
});
$("#update_docs").click(function(e){
	alert('hi');
    var d_id = $('#id').val();
	var c_id = $('#customer_id').val();
	var d_type = $('#doc_name').val();
	var d_name = $('#c_id_proof').val();
	
    var file_name = $('#id_proof1')[0].files[0].name;
	
	var fd = new FormData();
	var files = $('#id_proof1')[0].files[0];
	fd.append('file',files);

		 $.ajax({
            url: '<?php echo base_url("Customer/update_documents");?>',
            type: 'post',
           // data: fd,
			data: {file_name:file_name},
           // contentType: false,
           // processData: false,
            success: function(response){
              
                   // $("#img").attr("src",response);
				   alert(response);
               
            },
        });
		 
}); */
	
/*  $.ajax({
		type: 'post', 
		url: '<?php echo base_url("Customer/update_documents");?>',
		data: {b_id:b_id,c_id:c_id,d_type:d_type,d_name:d_name,file_name:file_name},
		success: function(data)
		{	
			
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert('Error get data from ajax');
		}

	});  
});
*/
function delete_doc(ins_id)
			{
			
				if(ins_id!="")
				{
					var conf= confirm("Are you sure you want to delete?");
					
					if(conf)
					{
						window.location.href= "<?php echo site_url('Customer/DeleteDocument');?>?id="+ins_id;
						 /* $.ajax({
							type: 'post', 
							url: '<?php echo base_url("Customer/update_documents");?>',
							data: {b_id:b_id,c_id:c_id,d_type:d_type,d_name:d_name,prev_doc:prev_doc},
							success: function(data)
							{	
								
							},
							error: function (jqXHR, textStatus, errorThrown)
							{
								alert('Error get data from ajax');
							}
						});  */
					}
				}
			}

</script>
<script>
    $(document).ready(function() {
			$("#add_cust").click(function() {
            $("#myform").find("#error-message").html('');
			$("#myform").find("#error-message1").html('');
			$("#myform").find("#error-message2").html('');
			$("#myform").find("#error-message3").html('');
			$("#myform").find("#error-message4").html('');
			$("#myform").find("#error-message5").html('');
			$("#myform").find("#error-message6").html('');
			$("#myform").find("#error-message7").html('');
			$("#myform").find("#error-message8").html('');
			$("#myform").find("#error-message9").html('');
			$("#myform").find("#error-message10").html('');
			$("#myform").find("#error-message11").html('');
			$("#myform").find("#error-message12").html('');
			
            if (!isNaN($('#f_name').val())){
                 
                 $("#myform").find("#error-message").html('Required. Only alphabets are allowed');
                 $('#f_name').focus();
                 return false;
            }
            if (!isNaN($('#l_name').val())){
                 
                 $("#myform").find("#error-message2").html('Required. Only alphabets are allowed');
                 $('#l_name').focus();
                 return false;
            }
			if (!isNaN($('#m_name').val())){
                 
                 $("#myform").find("#error-message1").html('Required. Only alphabets are allowed');
                 $('#m_name').focus();
                 return false;
            }
			if (!isNaN($('#family').val())){
                 
                 $("#myform").find("#error-message3").html('Required. Only alphabets are allowed');
                 $('#family').focus();
                 return false;
            }
			if (!isNaN($('#nominee').val())){
                 
                 $("#myform").find("#error-message6").html('Only alphabets are allowed');
                 $('#nominee').focus();
                 return false;
            }
			if (!isNaN($('#n_relation').val())){
                 
                 $("#myform").find("#error-message7").html('Only alphabets are allowed');
                 $('#n_relation').focus();
                 return false;
            }
			if (!isNaN($('#ref_by').val())){
                 
                 $("#myform").find("#error-message8").html('Only alphabets are allowed');
                 $('#ref_by').focus();
                 return false;
            }
			if (!isNaN($('#business').val())){
                 
                 $("#myform").find("#error-message9").html('Only alphabets are allowed');
                 $('#business').focus();
                 return false;
            }			
			if (!isNaN($('#b_type').val())){
                 
                 $("#myform").find("#error-message10").html('Only alphabets are allowed');
                 $('#b_type').focus();
                 return false;
            }
			if (!isNaN($('#family_member').val())){
                 
                 $("#myform").find("#error-message11").html('Only alphabets are allowed');
                 $('#family_member').focus();
                 return false;
            }
            if ($('#mobile_1').val().length != 10){
                 $("#myform").find("#error-message4").html('Enter a valid 10 digit mobile number');
                 $('#mobile_1').focus();
                 return false;
            }
            if ($('#mobile_1').val() < 0){
                 
                 $("#myform").find("#error-message4").html('Enter a valid 10 digit mobile number');
                 $('#mobile_1').focus();
                 return false;
            }
            if (isNaN($('#mobile_1').val())){
                 
                 $("#myform").find("#error-message4").html('Enter a valid 10 digit mobile number');
                 $('#mobile_1').focus();
                 return false;
            }
			/* if ($('#mobile_2').val().length != 10){
                 $("#myform").find("#error-message5").html('Enter a valid 10 digit mobile number');
                 $('#mobile_2').focus();
                 return false;
            }
            if ($('#mobile_2').val() < 0){
                 
                 $("#myform").find("#error-message5").html('Enter a valid 10 digit mobile number');
                 $('#mobile_2').focus();
                 return false;
            }
            if (isNaN($('#mobile_2').val())){
                 
                 $("#myform").find("#error-message5").html('Enter a valid 10 digit mobile number');
                 $('#mobile_2').focus();
                 return false;
            } */
			
         }); 


		$("#add_bank").click(function() {
            $("#myform1").find("#bank_error").html('');
			$("#myform1").find("#bank_error1").html('');
			$("#myform1").find("#bank_error2").html('');
			$("#myform1").find("#bank_error3").html('');
			
			
            if (!isNaN($('#bank_name').val())){
                 
                 $("#myform1").find("#bank_error").html('Required. Only alphabets are allowed');
                 $('#bank_name').focus();
                 return false;
            }
            if (!isNaN($('#branch').val())){
                 
                 $("#myform1").find("#bank_error1").html('Required. Only alphabets are allowed');
                 $('#branch').focus();
                 return false;
            }			
            
            if (isNaN($('#acc_number').val())){
                 
                 $("#myform1").find("#bank_error2").html('Only digits are allowed');
                 $('#acc_number').focus();
                 return false;
            }
			var ifsc= $("#ifsc_code").val();
			var expr = /[A-Z|a-z]{4}[0][\d]{6}$/;
			
			if(!expr.test(ifsc))
			{			
				 $("#myform1").find("#bank_error3").html('Enter a valid IFSC code');
                 $('#ifsc_code').focus();
                 return false;
            }
            else return true;
			
         });  

		$("#update_bank").click(function() {
            $("#bank_form").find("#error").html('');
			$("#bank_form").find("#error1").html('');
			$("#bank_form").find("#error2").html('');
			$("#bank_form").find("#error3").html('');
			
			
            if (!isNaN($('#b_name').val())){
                 
                 $("#bank_form").find("#error").html('Required. Only alphabets are allowed');
                 $('#b_name').focus();
                 return false;
            }
            if (!isNaN($('#br_name').val())){
                 
                 $("#bank_form").find("#error1").html('Required. Only alphabets are allowed');
                 $('#br_name').focus();
                 return false;
            }			
            
            if (isNaN($('#a_num').val())){
                 
                 $("#bank_form").find("#error2").html('Only digits are allowed');
                 $('#a_num').focus();
                 return false;
            }
			var ifsc= $("#if_code").val();
			var expr = /[A-Z|a-z]{4}[0][\d]{6}$/;
			
			if(!expr.test(ifsc))
			{			
				 $("#bank_form").find("#error3").html('Enter a valid IFSC code');
                 $('#if_code').focus();
                 return false;
            }
            else return true;
			
         }); 
    });
</script>
<script>
  $( function() {
    var availableTags = <?php echo json_encode($family); ?>;
    $( "#family" ).autocomplete({
      source: availableTags
    });
  } );
  </script>
