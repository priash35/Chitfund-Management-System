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
                                    <li class="breadcrumb-item active">Update Customer</li>
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
                            <h3 class="header-title m-t-0 m-b-30">Update Details</h3>
							<?php if($this->session->flashdata('msg')){ ?>
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
                            <div class="tab-content">
                                <div class="<?php echo $tab_pane1;?>" id="home1">
									<div class="col-md-12 row">
										<div class="col-md-6">
											<?php foreach($basic as $row) {?>
												<div class="card-box">
													<!-- <h4 class="m-t-0 m-b-30 header-title">Horizontal form</h4> -->
													<form name="myform" id="myform" action="<?php echo base_url()?>Customer/update_Custdata" method="post" enctype="multipart/form-data">
														<div class="form-group row">
															<label class="col-3 col-form-label">First Name</label>
															<div class="col-9">
																<input type="hidden" id="cid" name="cid"  class="form-control" value="<?php echo $row->id;?>" >
																<input type="text" id="f_name" name="f_name"  class="form-control" value="<?php echo $row->first_name;?>" >
																<p id="error-message" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Middle Name</label>
															<div class="col-9">
																<input type="text" id="m_name" name="m_name"  class="form-control" value="<?php echo $row->middle_name;?>" >
																<p id="error-message1" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Last Name</label>
															<div class="col-9">
																<input type="text" id="l_name" name="l_name"  class="form-control" value="<?php echo $row->last_name;?>" >
																<p id="error-message2" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Family</label>
															<div class="col-9">
																<input type="text" id="family" name="family" class="form-control" value="<?php echo $row->family;?>" >
																<p id="error-message3" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Permanent Address</label>
															<div class="col-9">
																<textarea class="form-control" id="p_address" name="p_address"  rows="5"><?php echo $row->perm_add;?></textarea>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Temporary Address</label>
															<div class="col-9">
																<textarea class="form-control" id="t_address" name="t_address"  rows="5"><?php echo $row->temp_add;?></textarea>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Contact:</label>
																			
															<div class="col-9 row">
																<label class="col-4 col-form-label">Mobile-1</label>
																<div class="col-8">
																	<input class="form-control" type="tel" id="mobile_1" name="mobile_1" maxlength="10" value="<?php echo $row->mobile_1;?>"><p id="error-message4" style="color:red;"></p>
																</div>
																<br><br>
																<label class="col-4 col-form-label">Mobile-2</label>
																<div class="col-8">
																	<input class="form-control" type="tel" id="mobile_2" name="mobile_2" maxlength="10" placeholder="Mobile Number 2" value="<?php echo $row->mobile_2;?>">
																	
																</div>
																<br><br>
																<label class="col-4 col-form-label">Mobile-3</label>
																<div class="col-8">
																	<input class="form-control" type="tel" id="mobile_3" name="mobile_3" maxlength="10" placeholder="Mobile Number 3" value="<?php echo $row->mobile_3;?>">
																</div>
																<br><br>
																<label class="col-4 col-form-label">Mobile-4</label>
																<div class="col-8">
																	<input class="form-control" type="tel" id="mobile_4" name="mobile_4" maxlength="10" placeholder="Mobile Number 4" value="<?php echo $row->mobile_4;?>">
																</div>
																<br><br>
																<label class="col-4 col-form-label">Landline</label>
																<div class="col-8">
																	<input class="form-control" type="tel" id="landline" name="landline" maxlength="10" placeholder="Landline Number" value="<?php echo $row->land_line;?>">
																	
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
																<input id="date" name="date" class="form-control" type="date" value="<?php echo $row->dob;?>" required>
																<!--<div class="input-group">
																	<input type="text" class="form-control" id="datepicker-autoclose" id="date" name="date" value="<?php //echo $row->dob;?>">
																	<div class="input-group-append">
																		<span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
																	</div>
																</div>--->
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Gender</label>
															<div class="col-9">
																<div class="radio radio-info form-check-inline">
																	<input type="radio" id="inlineRadio1" value="Male" name="radioInline" <?php if ($row->gender == 'Male') echo 'checked="checked"'; ?>>
																	<label for="inlineRadio1"> Male </label>
																</div>
																<div class="radio form-check-inline">
																	<input type="radio" id="inlineRadio2" value="Female" name="radioInline" <?php if ($row->gender == 'Female') echo 'checked="checked"'; ?>>
																	<label for="inlineRadio2"> Female </label>
																</div>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Nominee</label>
															<div class="col-9">
																<input type="text" class="form-control" id="nominee" name="nominee" value="<?php echo $row->nominee;?>" >
																<p id="error-message6" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Nominee Relation</label>
															<div class="col-9">
																<input type="text" class="form-control" id="n_relation" name="n_relation" value="<?php echo $row->nominee_relation;?>" >
																<p id="error-message7" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Reffered By</label>
															<div class="col-9">
																<input type="text" class="form-control" id="ref_by" name="ref_by" value="<?php echo $row->referred_by;?>" >
																<p id="error-message8" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Email</label>
															<div class="col-9">
																<input type="email" class="form-control" id="email1" name="email1" value="<?php echo $row->email_1;?>">
																
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Alternate Email</label>
															<div class="col-9">
																<input type="email" class="form-control" id="email2" name="email2"  value="<?php echo $row->email_2;?>">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Business Name</label>
															<div class="col-9">
																<input type="text" class="form-control" id="business" name="business" value="<?php echo $row->buss_name;?>" >
																<p id="error-message9" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Address</label>
															<div class="col-9">
																<textarea class="form-control" id="b_address" name="b_address" rows="5"><?php echo $row->buss_address;?></textarea>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Nature of Business</label>
															<div class="col-9">
																<input type="text" class="form-control" id="b_type" name="b_type" value="<?php echo $row->buss_type;?>" >
																<p id="error-message10" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Family Members</label>
															<div class="col-9">
																<input type="text" class="form-control" id="family_member" name="family_member" value="<?php echo $row->family_member;?>" >
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
												<button type="submit" id="update_cust" name="update_cust" class="btn btn-maroon btn-lg">Submit</button>											
										</div>
										</form>	
									</div>
											<?php } // end of basic foreach ?>
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
													<form name="myform1" id="myform1" action="<?php echo base_url();?>Customer/add_bankdata" method="post" enctype="multipart/form-data">
														<div class="form-group row">
															<label class="col-4 col-form-label">Bank Name</label>
															<div class="col-8">
																<?php if(!empty($bank)){			
																	foreach($bank as $post1){ ?>
																<input type="hidden" class="form-control" value="<?php echo $post1->cus_id;?>" id="cus_id" name="cus_id">	
																<?php } }
																else{
																	foreach($basic as $value){ ?>
																	<input type="hidden" class="form-control" value="<?php echo $value->id;?>" id="cus_id" name="cus_id">	
																<?php } }
																?>
																<input type="text" class="form-control" value="" id="bank_name" name="bank_name">
																<p id="bank_error" style="color:red;"></p>
															
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Branch</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" id="branch" name="branch" >
																<p id="bank_error1" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Account number</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" id="acc_number" name="acc_number" >
																<p id="bank_error2" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">IFSC code</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" id="ifsc_code" name="ifsc_code" >
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
													<button type="submit"  id="add_bank" name="add_bank" class="btn btn-maroon btn-lg">Submit</button>
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
											<tbody>
												<?php 													
													foreach($bank as $post){ ?>
												<tr>
													<!--<td><?php //echo $post->first_name;?></td>-->
													<td><?php echo $post->bank_name;?></td>
													<td><?php echo $post->branch_name;?></td>
													<td><?php echo $post->account_number;?></td>
													<td><?php echo $post->ifsc_code;?></td>	
													<td><a href="#" onclick="edit_bank(<?php echo $post->id; ?>)"><span class="btn btn-sm btn-default fa fa-edit"></span></a>
													<a href="#" onclick="delete_ins(<?php echo $post->id; ?>)"><span class="btn btn-sm btn-default fa fa-trash"></span></a>
													</td>
												</tr>
													<?php } ?>
											</tbody>
										</table>
										
										
									</div>
									
									<!-- Bank modal content -->
									
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
															<?php if(!empty($doc_data)){			
																	foreach($doc_data as $docs){ ?>
																<input type="hidden" class="form-control" value="<?php echo $docs->cus_id;?>" id="cus_id" name="cus_id">	
																<?php } }
																else{
																	foreach($basic as $values){ ?>
																	<input type="hidden" class="form-control" value="<?php echo $values->id;?>" id="cus_id" name="cus_id">	
																<?php } }
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
										<h3 class="header-title m-t-0 m-b-30 text-center">Already added documents</h3>										
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
													foreach($doc_data as $row){ ?>
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

									<!-- Document modal content -->
									<div id="doc-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
										<div class="modal-dialog">
											<div class="modal-content">

												<div class="modal-body">
													<div class="card-box">
													<form id="doc_form" action="#" enctype="multipart/form-data">				
														<div class="form-group m-b-0">
															<p class="mb-2 mt-4 font-weight-bold">Document Type</p>
															<input type="hidden" class="form-control" value="" id="id" name="id"/>
															<input type="hidden" class="form-control" value="" id="customer_id" name="customer_id"/>
															<input type="text" class="form-control" value="" id="doc_name" name="doc_name" readonly>
															
														</div>
														<div class="form-group m-b-0">
															<p class="mb-2 mt-4 font-weight-bold">Document</p>
															
															<input type="file" id="id_proof1" name="id_proof1" class="filestyle" data-btnClass="btn-maroon">
															
															<input type="hidden" name="c_id_proof" id="c_id_proof" value="" /><br>													
															<a id="proof_lable" class="col-8 col-form-label" href="" target="_blank">View Document</a>
														</div>
														<div class="col-md-12 text-center">
															<button type="submit" id="update_docs" name="update_docs" class="btn btn-maroon btn-lg">Submit</button>
															
															<button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancel</button>
														</div>												
													</form>
												</div>
											</div><!-- /.modal-content -->
										</div><!-- /.modal-dialog -->
									</div><!-- /.modal -->
									
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
				
				
				



            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
		 <!-- jQuery  -->
        
<?php include_once ("master/footer.php"); ?>
<script>
$(document).ready(function() {  
	$('#bank').hide();
	$('#bank_update').hide();
	$('#documents').hide();
		
	$("#add_form").click(function(){
		$('#bank').show();
	});
	
	$("#add_document_form").click(function(){
		$('#documents').show();
	});
});

function delete_ins(ins_id)
{	 if(ins_id!="")
	{
		var conf= confirm("Are you sure you want to delete?");
					
		if(conf)
		{
			window.location.href= "<?php echo site_url('Customer/DeleteBank');?>?id="+ins_id;;
						
		}
	} 
	
}

 
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
			  $('#bank_update').show();// show bootstrap modal when complete loaded
		  },
		  error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});

}

</script>
<script>
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

function delete_doc(ins_id)
			{
			
				if(ins_id!="")
				{
					var conf= confirm("Are you sure you want to delete?");
					
					if(conf)
					{
						window.location.href= "<?php echo site_url('Customer/DeleteDocument');?>?id="+ins_id;;
						
					}
				}
			}

</script>
<script>
    $(document).ready(function() {
			$("#update_cust").click(function() {
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
