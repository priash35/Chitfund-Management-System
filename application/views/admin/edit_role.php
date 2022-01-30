<?php include_once "master/header.php"; ?>

<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                   <li class="breadcrumb-item"><a href="<?php echo base_url();?>/Admin/index">Main</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>/Admin/roles">Roles</a></li>
                                    <li class="breadcrumb-item active">Edit Role</li>
                                </ol>
                            </div>
                            <!-- <h4 class="page-title">Starter</h4> -->
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
				
				<div class="row">
                    <div class="col-12">
                        <div class="card-box">
							<h3 class="header-title m-t-0 m-b-30 text-center">Edit Role</h3>
							<?php if($this->session->flashdata('msg1')){ ?>
								<div class="alert alert-danger">
									<?php echo $this->session->flashdata('msg1'); ?>
								</div>
							<?php }else if($this->session->flashdata('msg')){ ?>
								<div class="alert alert-success">
									<?php echo $this->session->flashdata('msg'); ?>
								</div>
							<?php }?>
							<div class="col-md-12">
										<?php $data=array();
											foreach($roles as $row){
											 $data= explode(",",$row->page);
											// print_r($data);	
											?>
										<div class="col-md-6">
												<div class="card-box">
													<!-- <h4 class="m-t-0 m-b-30 header-title">Horizontal form</h4> -->
													<form class="form-horizontal" name="myform" id="myform" action="<?php echo base_url()?>Admin/update_roledata" method="post" enctype="multipart/form-data">
														<div class="form-group row">
															<label class="col-3 col-form-label">Role Name</label>
															<div class="col-9">
																<input type="hidden" id="role_id" name="role_id" value="<?php echo $row->role_id; ?>">
																<input type="text" id="role" name="role" class="form-control" value="<?php echo $row->role; ?>" required>
															</div>
														</div>	
												</div>
										</div>
											<?php } ?>
										<div class="col-md-6">
											<?php 												
											?>
												<div class="card-box row">												
													<div class="col-md-6">
														<h4 class="m-t-0 header-title"><b>Select Pages</b></h4>
														<br>
														<div class="checkbox checkbox-primary">
															<input id="checkbox0" type="checkbox" name="checkboxx[]" value="Masters" <?php if(in_array("Masters", $data)){ echo " checked=\"checked\""; } ?>>
															<label for="checkbox0">Master</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox1" type="checkbox" name="checkboxx[]" value="Company Master" <?php if(in_array("Company Master", $data)){ echo " checked=\"checked\""; } ?>>
															<label for="checkbox1">Company Master</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox2" type="checkbox" name="checkboxx[]" value="Staff Master" <?php if(in_array("Staff Master", $data)){ echo " checked=\"checked\""; } ?>>
															<label for="checkbox2">Staff Master</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox3" type="checkbox" name="checkboxx[]" value="Roles" <?php if(in_array("Roles", $data)){ echo " checked=\"checked\""; } ?>>
															<label for="checkbox3">
																Roles
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox4" type="checkbox" name="checkboxx[]" value="Charges" <?php if(in_array("Charges", $data)){ echo " checked=\"checked\""; } ?>>
															<label for="checkbox4">
																Charges
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox5" type="checkbox" name="checkboxx[]" value="Customer Master" <?php if(in_array("Customer Master", $data)){ echo " checked=\"checked\""; } ?>>
															<label for="checkbox5">
																Customer Master
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox6" type="checkbox" name="checkboxx[]" value="Manage Group" <?php if(in_array("Manage Group", $data)){ echo " checked=\"checked\""; } ?>>
															<label for="checkbox6">
																Manage Groups
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox7" type="checkbox" name="checkboxx[]" value="Group Master" <?php if(in_array("Group Master", $data)){ echo " checked=\"checked\""; } ?>>
															<label for="checkbox7">
																Group Master
															</label>
														</div>

														<div class="checkbox checkbox-primary">
															<input id="checkbox8" type="checkbox" name="checkboxx[]" value="Create Group" <?php if(in_array("Create Group", $data)){ echo " checked=\"checked\""; } ?>>
															<label for="checkbox8">
																Create Group
															</label>
														</div>

														<div class="checkbox checkbox-primary">
															<input id="checkbox9" type="checkbox" name="checkboxx[]" value="Chit Set-up" <?php if(in_array("Chit Set-up", $data)){ echo " checked=\"checked\""; } ?>>
															<label for="checkbox9">
																Chit Set-up
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox10" type="checkbox" name="checkboxx[]" value="Customer Selection" <?php if(in_array("Customer Selection", $data)){ echo " checked=\"checked\""; } ?>>
															<label for="checkbox10">
																Customer Selection
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox11" type="checkbox" name="checkboxx[]" value="Transfer Tickets" <?php if(in_array("Transfer Tickets", $data)){ echo " checked=\"checked\""; } ?>>
															<label for="checkbox11">
																Transfer Tickets
															</label>
														</div>
													</div>
													
													<div class="col-md-6">
														<h4 class="m-t-0 header-title"><b></b></h4>
														<br>
														<br>
														<div class="checkbox checkbox-primary">
															<input id="checkbox12" type="checkbox" name="checkboxx[]" value="Collection Entry" <?php if(in_array("Collection Entry", $data)){ echo " checked=\"checked\""; } ?>>
															<label for="checkbox12">Collection Entry</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox13" type="checkbox" name="checkboxx[]" value="Daily Collection" <?php if(in_array("Daily Collection", $data)){ echo " checked=\"checked\""; } ?>>
															<label for="checkbox13">Daily Collection</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox14" type="checkbox" name="checkboxx[]" value="Cheque Clearing" <?php if(in_array("Cheque Clearing", $data)){ echo " checked=\"checked\""; } ?>>
															<label for="checkbox14">Cheque Clearing</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox15" type="checkbox" name="checkboxx[]" value="Cheque between accounts" <?php if(in_array("Cheque between accounts", $data)){ echo " checked=\"checked\""; } ?>>
															<label for="checkbox15">Cheque between accounts</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox16" type="checkbox" name="checkboxx[]" value="Adjustments" <?php if(in_array("Adjustments", $data)){ echo " checked=\"checked\""; } ?>>
															<label for="checkbox16">
																Adjustments
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox17" type="checkbox" name="checkboxx[]" value="Auction List" <?php if(in_array("Auction List", $data)){ echo " checked=\"checked\""; } ?>>
															<label for="checkbox17">
																Auction List
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox18" type="checkbox" name="checkboxx[]" value="Auction" <?php if(in_array("Auction", $data)){ echo " checked=\"checked\""; } ?>>
															<label for="checkbox18">
																Auction
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox19" type="checkbox" name="checkboxx[]" value="Outstanding" <?php if(in_array("Outstanding", $data)){ echo " checked=\"checked\""; } ?>>
															<label for="checkbox19">
																Outstanding
															</label>
														</div>

														<div class="checkbox checkbox-primary">
															<input id="checkbox20" type="checkbox" name="checkboxx[]" value="FD Release" <?php if(in_array("FD Release", $data)){ echo " checked=\"checked\""; } ?>>
															<label for="checkbox20">
																FD Release
															</label>
														</div>

														<div class="checkbox checkbox-primary">
															<input id="checkbox21" type="checkbox" name="checkboxx[]" value="View details" <?php if(in_array("View details", $data)){ echo " checked=\"checked\""; } ?>>
															<label for="checkbox21">
																View details
															</label>
														</div>														
													</div>
												</div>
										</div>
										
										<div class="col-md-12 text-center">
																					
													<form class="form-horizontal" role="form">
														<button type="submit" name="submit" class="btn btn-maroon btn-lg">Submit</button>
													</form>
												
										</div>
								</form>
							</div>

                            
                        </div>
                    </div>
                </div>		
				
				
            </div> <!-- end container -->
</div>
<!-- end wrapper -->
<?php include_once "master/footer.php"; ?>
<script>
	$("#myform").submit(function(){
		$("#myform").find("#error1").html('');  	
		var length = $("[name='checkboxx[]']:checked").length;  	
    	if (length == 0){
    		alert("Please check atleast one checkbox");
        	
       	 	return false;
    	}
});
</script>