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
                                    <li class="breadcrumb-item active">Add New Staff</li>
                                </ol>
                            </div>
                            <!-- <h4 class="page-title">Tabs</h4> -->
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

				
				<div class="col-md-12">
                        <div class="card-box">
							<h3 class="header-title m-t-0 m-b-30 text-center">Add New Staff Information</h3><br>
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
								<?php 
														
														$roleid="";
														if(isset($refresh)){		

															//foreach($refresh as $data){
																
																$f_name = $refresh['first_name'];
																$m_name = $refresh['middle_name'];
																$l_name = $refresh['last_name'];
																$desig = $refresh['designation'];
																$address = $refresh['address'];
																$j_date = $refresh['joining_date'];
																$landline = $refresh['landline'];	
																$mobile = $refresh['mobile_1'];
																$ref = $refresh['referred_by'];
																$id_proof = $refresh['id_proof'];																
																$adr_proof = $refresh['add_proof'];																
																$term_date = $refresh['designation'];
																$uid = $refresh['used_id'];
																$pwd = $refresh['password'];
																$roleid = $refresh['roles'];														
															//}
											}?>
								<div class="col-md-8">								
									<form name="myform" id="myform" action="<?php echo base_url()?>Admin/add_staff_data" method="post" enctype="multipart/form-data">
										<div class="form-group row">
											<label class="col-3 col-form-label">First Name</label>
											<div class="col-8">
												<input id="f_name" name="f_name" type="text" class="form-control" value="<?php if(isset($f_name)){ echo $f_name;}?>" required>
												<p id="error-message" style="color:red;"></p>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-3 col-form-label">Middle Name</label>
											<div class="col-8">
												<input id="m_name" name="m_name" type="text" class="form-control" value="<?php if(isset($m_name)){ echo $m_name;}?>" >
												<p id="error-message1" style="color:red;"></p>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-3 col-form-label">Last Name</label>
											<div class="col-8">
												<input id="l_name" name="l_name" type="text" class="form-control" value="<?php if(isset($l_name)){ echo $l_name;}?>" onfocusout="check_values()" required>
												<p id="error-message2" style="color:red;"></p>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-3 col-form-label">Designation</label>
											<div class="col-8">
												<input id="desig" name="desig" type="text" class="form-control" value="<?php if(isset($desig)){ echo $desig;}?>" required>
												<p id="error-message3" style="color:red;"></p>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-3 col-form-label">Address</label>
											<div class="col-8">
												<input id="address" name="address" class="form-control" type="text" value="<?php if(isset($address)){ echo $address;}?>" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-3 col-form-label">Joining Date</label>
											<div class="col-8">
												<input id="j_date" name="j_date" class="form-control" type="date" required value ="<?php if(isset($j_date)){ echo $j_date;}?>">
												<!--<div class="input-group">
                                                    <input type="text" class="form-control" placeholder="dd/mm/yyyy" id="datepicker-autoclose" name="j_date">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                    </div>
                                                </div>-->
											</div>
										</div>
										<div class="form-group row">
											<label class="col-3 col-form-label">Contact details:</label>
															
											<div class="col-9 row">
												<label class="col-3 col-form-label">Landline</label>
												<div class="col-8">
													<input id="landline" name="landline" type="text" class="form-control" value="<?php if(isset($landline)){ echo $landline;}?>" maxlength="10" >
													<p id="error-message4" style="color:red;"></p>
												</div>
											<br><br>
												<label class="col-3 col-form-label">Mobile</label>
												<div class="col-8">
													<input id="mobile" name="mobile" type="text" class="form-control" value="<?php if(isset($mobile)){ echo $mobile;}?>" maxlength="10" >
													<p id="error-message5" style="color:red;"></p>
												</div>
											<br><br>
											</div>												
										</div>
										<div class="form-group row">
											<label class="col-3 col-form-label">Reference</label>
											<div class="col-8">
												<input id="ref" name="ref" type="text" class="form-control" value="<?php if(isset($ref)){ echo $ref;}?>" >
												<p id="error-message6" style="color:red;"></p>
											</div>
										</div>										
										<div class="form-group row">
											<label class="col-3 col-form-label">Documents:</label>
															
											<div class="col-9 row">
												<label class="col-3 col-form-label">ID proof</label>
												<div class="col-8">
													<input id="id_proof" name="id_proof" type="file" class="filestyle"  data-btnClass="btn-maroon" required value="<?php if(isset($id_proof)){ echo $id_proof;}?>" >				
												</div>
											<br><br>
												<label class="col-3 col-form-label">Address proof</label>
												<div class="col-8">
													<input id="adr_proof" name="adr_proof" type="file" class="filestyle"  data-btnClass="btn-maroon" required value="<?php if(isset($adr_proof)){ echo $adr_proof;}?>" >
												</div>
											<br><br>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-3 col-form-label">User ID</label>
											<div class="col-8">
												<input id="userid" name="userid" type="text" class="form-control" value="" >
											</div>
										</div>
										<div class="form-group row">
											<label class="col-3 col-form-label">Password</label>
											<div class="col-8">
												<input id="password" name="password" type="password" class="form-control" value="" >
											</div>
										</div>											
										<div class="form-group row">
											<label class="col-3 col-form-label">Role</label>
											<div class="col-8">
												<select required class="form-control" id="role" name="role">
															  	<option value="" selected disabled>Please select</option>
															    <?php
															    foreach($role as $item){ if ($item->role_id == $roleid){?>
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
												<button type="submit" id="add_staff" name="add_staff" class="btn btn-maroon btn-lg">Submit</button>
										</div>										
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

function check_values()
{
	var f_name = $('#f_name').val();
	var m_name = $('#m_name').val();
	var l_name = $('#l_name').val();
	
	$.ajax({
		type: 'post', 
		url: '<?php echo base_url("Admin/check_names");?>',
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
						if (dismiss === 'No!') {
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
		}
	});
}

$(document).ready(function() {
			$("#add_staff").click(function() {
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
