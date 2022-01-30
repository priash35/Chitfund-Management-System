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
                                    <li class="breadcrumb-item active">Add New Role</li>
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
							<h3 class="header-title m-t-0 m-b-30 text-center">Add New Role</h3>
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
									
										<div class="col-md-6">
												<div class="card-box">
													<!-- <h4 class="m-t-0 m-b-30 header-title">Horizontal form</h4> -->
													<form class="form-horizontal" name="myform" id="myform" action="<?php echo base_url()?>Admin/add_roledata" method="post" enctype="multipart/form-data">
														<div class="form-group row">
															<label class="col-3 col-form-label">Role Name</label>
															<div class="col-9">
																<input type="text" id="role" name="role" class="form-control" value="<?php if (isset($role)){echo $role;}?>" required>
															</div>
														</div>					
													
												</div>
										</div>
										
										<div class="col-md-6">
												<div class="card-box row">												
													<div class="col-md-6">
														<h4 class="m-t-0 header-title"><b>Select Pages</b></h4>
														<br>
														<div class="checkbox checkbox-primary">
															<input id="checkbox0" type="checkbox" name="checkboxx[]" value="Masters">
															<label for="checkbox0">Master</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox1" type="checkbox" name="checkboxx[]" value="Company Master">
															<label for="checkbox1">Company Master</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox2" type="checkbox" name="checkboxx[]" value="Staff Master">
															<label for="checkbox2">Staff Master</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox3" type="checkbox" name="checkboxx[]" value="Roles">
															<label for="checkbox3">
																Roles
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox4" type="checkbox" name="checkboxx[]" value="Charges">
															<label for="checkbox4">
																Charges
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox5" type="checkbox" name="checkboxx[]" value="Customer Master">
															<label for="checkbox5">
																Customer Master
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox6" type="checkbox" name="checkboxx[]" value="Manage Group">
															<label for="checkbox6">
																Manage Groups
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox7" type="checkbox" name="checkboxx[]" value="Group Master">
															<label for="checkbox7">
																Group Master
															</label>
														</div>

														<div class="checkbox checkbox-primary">
															<input id="checkbox8" type="checkbox" name="checkboxx[]" value="Create Group">
															<label for="checkbox8">
																Create Group
															</label>
														</div>

														<div class="checkbox checkbox-primary">
															<input id="checkbox9" type="checkbox" name="checkboxx[]" value="Chit Set-up">
															<label for="checkbox9">
																Chit Set-up
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox10" type="checkbox" name="checkboxx[]" value="Customer Selection">
															<label for="checkbox10">
																Customer Selection
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox11" type="checkbox" name="checkboxx[]" value="Transfer Tickets">
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
															<input id="checkbox12" type="checkbox" name="checkboxx[]" value="Collection Entry">
															<label for="checkbox12">Collection Entry</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox13" type="checkbox" name="checkboxx[]" value="Daily Collection">
															<label for="checkbox13">Daily Collection</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox14" type="checkbox" name="checkboxx[]" value="Cheque Clearing">
															<label for="checkbox14">Cheque Clearing</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox15" type="checkbox" name="checkboxx[]" value="Cheque between accounts">
															<label for="checkbox15">Cheque between accounts</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox16" type="checkbox" name="checkboxx[]" value="Adjustments">
															<label for="checkbox16">
																Adjustments
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox17" type="checkbox" name="checkboxx[]" value="Auction List">
															<label for="checkbox17">
																Auction List
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox18" type="checkbox" name="checkboxx[]" value="Auction">
															<label for="checkbox18">
																Auction
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox19" type="checkbox" name="checkboxx[]" value="Outstanding">
															<label for="checkbox19">
																Outstanding
															</label>
														</div>

														<div class="checkbox checkbox-primary">
															<input id="checkbox20" type="checkbox" name="checkboxx[]" value="FD Release">
															<label for="checkbox20">
																FD Release
															</label>
														</div>

														<div class="checkbox checkbox-primary">
															<input id="checkbox21" type="checkbox" name="checkboxx[]" value="View details">
															<label for="checkbox21">
																View details
															</label>
															
														</div>
														
														<!--<div class="checkbox checkbox-primary">
															<input id="checkbox22" type="checkbox" name="checkbox22" value="Customer Selection">
															<label for="checkbox22">
																Customer Selection
															</label>
														</div>
														<div class="checkbox checkbox-primary">
															<input id="checkbox23" type="checkbox" name="checkbox23" value="Transfer Tickets">
															<label for="checkbox23">
																Transfer Tickets
															</label>
														</div>-->
													</div>
												</div>
										</div>
										
										<div class="col-md-12 text-center">
																					
													<!-- <form class="form-horizontal" role="form"> -->
														<button type="submit" name="submit" class="btn btn-maroon btn-lg">Submit</button>
													<!-- </form> -->
												
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