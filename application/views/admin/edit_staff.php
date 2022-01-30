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
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>/Admin/staff_master">Staff Master</a></li>
                                    <li class="breadcrumb-item active">Update Staff</li>
                                </ol>
                            </div>
                            <!-- <h4 class="page-title">Tabs</h4> -->
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

				
				<div class="col-md-12">
                        <div class="card-box">
							<h3 class="header-title m-t-0 m-b-30 text-center">Update Staff Information</h3><br>
							<?php if($this->session->flashdata('msg1')){ ?>
								<div class="alert alert-danger">
									<?php echo $this->session->flashdata('msg1'); ?>
								</div>
							<?php }else if($this->session->flashdata('msg')){ ?>
								<div class="alert alert-success">
									<?php echo $this->session->flashdata('msg'); ?>
								</div>
							<?php }?>
							<div class="row">
								<div class="col-md-2">
								
								</div>
								
								<div class="col-md-8">								
									<form name="myform" id="myform" action="<?php echo base_url()?>Admin/update_staff_data" method="post" enctype="multipart/form-data">
										<div class="form-group row">
										<?php foreach($staff as $value){?>
											<label class="col-3 col-form-label">First Name</label>
											<div class="col-8">
												<input id="sid" name="sid" type="hidden" class="form-control" value="<?php echo $value->id;?>">
												<input id="f_name" name="f_name" type="text" class="form-control" value="<?php echo $value->first_name;?>" required>
												<p id="error-message" style="color:red;"></p>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-3 col-form-label">Middle Name</label>
											<div class="col-8">
												<input id="m_name" name="m_name" type="text" class="form-control" value="<?php echo $value->middle_name;?>" >
												<p id="error-message1" style="color:red;"></p>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-3 col-form-label">Last Name</label>
											<div class="col-8">
												<input id="l_name" name="l_name" type="text" class="form-control" value="<?php echo $value->last_name;?>" required>
												<p id="error-message2" style="color:red;"></p>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-3 col-form-label">Designation</label>
											<div class="col-8">
												<input id="desig" name="desig" type="text" class="form-control" value="<?php echo $value->designation;?>" required>
												<p id="error-message3" style="color:red;"></p>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-3 col-form-label">Address</label>
											<div class="col-8">
												<input id="address" name="address" class="form-control" type="text" value="<?php echo $value->address;?>" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-3 col-form-label">Joining Date</label>
											<div class="col-8">
												<div class="input-group">
                                                    <input type="date" class="form-control" id="j_date" name="j_date" value="<?php echo $value->joining_date;?>">
                                                    <!-- <div class="input-group-append">
                                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                    </div> -->

                                                   </div>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-3 col-form-label">Contact details:</label>
															
											<div class="col-9 row">
												<label class="col-3 col-form-label">Landline</label>
												<div class="col-8">
													<input id="landline" name="landline" type="text" class="form-control" maxlength="10" value="<?php echo $value->landline;?>" >
													<p id="error-message4" style="color:red;"></p>
												</div>
											<br><br>
												<label class="col-3 col-form-label">Mobile</label>
												<div class="col-8">
													<input id="mobile" name="mobile" type="text" class="form-control" maxlength="10" value="<?php echo $value->mobile_1;?>" >
													<p id="error-message5" style="color:red;"></p>
												</div>
											<br><br>
											</div>												
										</div>
										<div class="form-group row">
											<label class="col-3 col-form-label">Reference</label>
											<div class="col-8">
												<input id="ref" name="ref" type="text" class="form-control" value="<?php echo $value->referred_by;?>" >
												<p id="error-message6" style="color:red;"></p>
											</div>
										</div>										
										<div class="form-group row">
											<label class="col-3 col-form-label">Documents:</label>
															
											<div class="col-9 row">
												<label class="col-3 col-form-label">ID proof</label>
												<div class="col-8">
													<input id="id_proof" name="id_proof" type="file" class="filestyle"  data-btnClass="btn-maroon">
													<input type="hidden" name="c_id_name" value="<?php echo $value->id_proof;?>" />
													<input type="hidden" name="c_id_proof" value="<?php echo $value->id_proof_link;?>" /><br>													
													<label class="col-8 col-form-label"><a href="<?php echo $value->id_proof_link;?>" target="_blank">View ID Proof</a></label>
													<br><br>			
												</div>
											
												<label class="col-3 col-form-label">Address proof</label>
												<div class="col-8">
													<input id="adr_proof" name="adr_proof" type="file" class="filestyle"  data-btnClass="btn-maroon">
													<input type="hidden" name="c_add_name" value="<?php echo $value->add_proof;?>" />
													<input type="hidden" name="c_add_proof" value="<?php echo $value->add_proof_link;?>" /><br>
													<!--<img src="<?php //echo $value->add_proof_link;?>" style="width:200px; height:200px;"/>-->
													<label class="col-8 col-form-label"><a href="<?php echo $value->add_proof_link;?>" target="_blank">View Address Proof</a></label>
												</div>

											<br><br>	
											</div>
										</div>
										<div class="form-group row">
											<label class="col-3 col-form-label">User ID</label>
											<div class="col-8">
												<input id="userid" name="userid" type="text" class="form-control" value="<?php echo $value->used_id;?>" >
											</div>
										</div>
										<div class="form-group row">
											<label class="col-3 col-form-label">Password</label>
											<div class="col-8">
												<input id="password" name="password" type="password" class="form-control" value="<?php echo $value->password;?>" >
											</div>
										</div>											
										<div class="form-group row">
											<label class="col-3 col-form-label">Role</label>
											<div class="col-8">
												 <select class="form-control" id="role" name="role">
															  	<option value="" selected disabled>Please select</option>
															    <?php
															    foreach($role as $item){ if ($item->role_id == $value->roles){?>
															    <option selected="selected" value="<?php echo ($item->role_id); ?>">
															     <?php echo $item->role; ?></option>
															    <?php  }else{ ?>		
															    <option value="<?php echo ($item->role_id); ?>">
															    <?php echo $item->role; ?></option>
															    <?php  }} ?>														    
															  </select>	 
											</div>
										</div>					
										
										<div class="col-md-12 text-center">	
												<button type="submit" id="update_staff" name="update_staff" class="btn btn-maroon btn-lg">Update</button>
										</div>
										<?php } ?>
									</form>	
							</div>  

							<div class="col-md-2">	
							
							</div>
							
						</div>
                        </div> <!-- card block end --> 
                    </div> <!-- end col -->
            </div><!-- end container -->
        </div><!-- end wrapper -->
		
				
<?php include_once ("master/footer.php"); ?>
<script>
$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
 
    //alert(maxDate);
    $('#j_date').attr('max', maxDate);
}); 

$(document).ready(function() {
			$("#update_staff").click(function() {
            $("#myform").find("#error-message").html('');
			$("#myform").find("#error-message1").html('');
			$("#myform").find("#error-message2").html('');
			$("#myform").find("#error-message3").html('');
			$("#myform").find("#error-message4").html('');
			$("#myform").find("#error-message5").html('');
			$("#myform").find("#error-message6").html('');
			$("#myform").find("#error-message7").html('');
			
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
			if (!isNaN($('#desig').val())){
                 
                 $("#myform").find("#error-message3").html('Required. Only alphabets are allowed');
                 $('#design').focus();
                 return false;
            }
			if (!isNaN($('#ref').val())){
                 
                 $("#myform").find("#error-message6").html('Only alphabets are allowed');
                 $('#ref').focus();
                 return false;
            }
			
            if ($('#landline').val().length != 10){
                 $("#myform").find("#error-message4").html('Enter a valid 10 digit mobile number');
                 $('#landline').focus();
                 return false;
            }
            if ($('#landline').val() < 0){
                 
                 $("#myform").find("#error-message4").html('Enter a valid 10 digit mobile number');
                 $('#landline').focus();
                 return false;
            }
            if (isNaN($('#landline').val())){
                 
                 $("#myform").find("#error-message4").html('Enter a valid 10 digit mobile number');
                 $('#landline').focus();
                 return false;
            }
			if ($('#mobile').val().length != 10){
                 $("#myform").find("#error-message5").html('Enter a valid 10 digit mobile number');
                 $('#mobile').focus();
                 return false;
            }
            if ($('#mobile').val() < 0){
                 
                 $("#myform").find("#error-message5").html('Enter a valid 10 digit mobile number');
                 $('#mobile').focus();
                 return false;
            }
            if (isNaN($('#mobile').val())){
                 
                 $("#myform").find("#error-message5").html('Enter a valid 10 digit mobile number');
                 $('#mobile').focus();
                 return false;
            } 
			
         });
});
</script>
