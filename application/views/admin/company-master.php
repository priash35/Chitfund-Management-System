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
                                    <li class="breadcrumb-item active">Edit Company Details</li>
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
                }
                else{
                	$tab_pane1="tab-pane";
                	$nav1="nav-link";
                    $tab_pane2="tab-pane show active";
                    $nav2="nav-link active";
                    };
                            ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h3 class="header-title m-t-0 m-b-30">Edit Company Details</h3>
                            <?php if($this->session->flashdata('msg')){ ?>
                            <div class="alert alert-info">
                            	<?php echo $this->session->flashdata('msg'); ?>
                            </div>
                            <?php }?>

                            <ul class="nav nav-pills navtab-bg nav-justified pull-in ">
                                <li class="nav-item">
                                    <a href="#home1" data-toggle="tab" aria-expanded="true" class="<?php echo $nav1;?>">
                                        <i class="fi-head mr-2"></i> Name and Address
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#profile1" data-toggle="tab" aria-expanded="false" class="<?php echo $nav2;?>">
                                        <i class="fi-monitor mr-2"></i>Bank Details 
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
										<div class="col-md-2">
										</div>
										<div class="col-md-8">
												<div class="card-box">
													<!-- <h4 class="m-t-0 m-b-30 header-title">Horizontal form</h4> -->
													<form name="myform1" id="myform1" action="<?php echo base_url()?>Company/edit_companydata" method="post" enctype="multipart/form-data">
														<!--<div class="form-group row">
															<label class="col-3 col-form-label">Name Title</label>
															<div class="col-9">
																<input type="text" id="title" name="title" class="form-control" value="" placeholder="Mr/Mrs">
															</div>
														</div>-->
														<?php 
														$name='';
														$reg_office='';
														$corp_office='';
														$sales_office='';
														$reg_mobile_1='';
														$reg_mobile_2='';
														$reg_mobile_3='';
														$reg_ll='';
														$corp_mobile_1='';
														$corp_mobile_2='';
														$corp_mobile_3='';
														$corp_ll='';
														$sales_mobile_1='';
														$sales_mobile_2='';
														$sales_mobile_3='';
														$sales_ll='';
														$comission='';
														foreach($records as $company){
															$name = $company->company_name;
															$reg_office = $company->reg_office;
															$corp_office = $company->corp_office;
															$sales_office = $company->sales_office;
															$reg_mobile_1=$company->reg_mobile_1;
															$reg_mobile_2=$company->reg_mobile_2;
															$reg_mobile_3=$company->reg_mobile_3;
															$reg_ll=$company->reg_ll;
															$corp_mobile_1=$company->corp_mobile_1;
															$corp_mobile_2=$company->corp_mobile_2;
															$corp_mobile_3=$company->corp_mobile_3;
															$corp_ll=$company->corp_ll;
															$sales_mobile_1=$company->sales_mobile_1;
															$sales_mobile_2=$company->sales_mobile_2;
															$sales_mobile_3=$company->sales_mobile_3;
															$sales_ll=$company->sales_ll;
															$comission=$company->comission;
															}?>

														
														<div class="form-group row">
															<label class="col-3 col-form-label">Company Name</label>
															<div class="col-9">																
																<input type="text" id="company_name" name="company_name"  class="form-control" value="<?php echo $name;?>" >
																<p id="error-message" style="color:red;"></p>
															</div>
														</div>
														
														<div class="form-group row">
															<label class="col-3 col-form-label">Registered Office</label>
															<div class="col-9">
																<textarea class="form-control" id="reg_office" name="reg_office"  rows="5" ><?php echo $reg_office;?></textarea>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Registered Office Contact Details:</label>
																			
															<div class="col-9 row">
																<label class="col-4 col-form-label">Mobile-1</label>
																<div class="col-8">
																	<input class="form-control" type="tel" id="reg_mobile_1" name="reg_mobile_1" maxlength="10"placeholder="Mobile Number 1" value="<?php echo $reg_mobile_1;?>"><p id="error-message4" style="color:red;"></p>
																</div>
																<br><br>
																<label class="col-4 col-form-label">Mobile-2</label>
																<div class="col-8">
																	<input class="form-control" type="tel" id="reg_mobile_2" name="reg_mobile_2" maxlength="10" placeholder="Mobile Number 2" value="<?php echo $reg_mobile_2;?>">
																	
																</div>
																<br><br>
																<label class="col-4 col-form-label">Mobile-3</label>
																<div class="col-8">
																	<input class="form-control" type="tel" id="reg_mobile_3" name="reg_mobile_3" maxlength="10" placeholder="Mobile Number 3" value="<?php echo $reg_mobile_3;?>">
																</div>
																<br><br>	
																<label class="col-4 col-form-label">Landline</label>
																<div class="col-8">
																	<input class="form-control" type="tel" id="reg_ll" name="reg_ll" maxlength="10" placeholder="Landline Number" value="<?php echo $reg_ll;?>">
																	
																</div>
															<br><br>
															</div>												
														</div>
														
														<div class="form-group row">
															<label class="col-3 col-form-label">Corporate Office</label>
															<div class="col-9">
																<textarea class="form-control" id="corp_office" name="corp_office"  rows="5"><?php echo $corp_office;?></textarea>
															</div>
														</div>
														
														<div class="form-group row">
															<label class="col-3 col-form-label">Corporate Office Contact Details:</label>
																			
															<div class="col-9 row">
																<label class="col-4 col-form-label">Mobile-1</label>
																<div class="col-8">
																	<input class="form-control" type="tel" id="corp_mobile_1" name="corp_mobile_1" maxlength="10"placeholder="Mobile Number 1" value="<?php echo $corp_mobile_1;?>"><p id="error-message4" style="color:red;"></p>
																</div>
																<br><br>
																<label class="col-4 col-form-label">Mobile-2</label>
																<div class="col-8">
																	<input class="form-control" type="tel" id="corp_mobile_2" name="corp_mobile_2" maxlength="10" placeholder="Mobile Number 2" value="<?php echo $corp_mobile_2;?>">
																	
																</div>
																<br><br>
																<label class="col-4 col-form-label">Mobile-3</label>
																<div class="col-8">
																	<input class="form-control" type="tel" id="corp_mobile_3" name="corp_mobile_3" maxlength="10" placeholder="Mobile Number 3" value="<?php echo $corp_mobile_3;?>">
																</div>
																<br><br>	
																<label class="col-4 col-form-label">Landline</label>
																<div class="col-8">
																	<input class="form-control" type="tel" id="corp_ll" name="corp_ll" maxlength="10" placeholder="Landline Number" value="<?php echo $corp_ll;?>">
																	
																</div>
															<br><br>
															</div>												
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Sales Office</label>
															<div class="col-9">
																<textarea class="form-control" id="sales_office" name="sales_office"  rows="5"><?php echo $sales_office;?></textarea>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Sales Office Contact Details:</label>
																			
															<div class="col-9 row">
																<label class="col-4 col-form-label">Mobile-1</label>
																<div class="col-8">
																	<input class="form-control" type="tel" id="sales_mobile_1" name="sales_mobile_1" maxlength="10"placeholder="Mobile Number 1" value="<?php echo $sales_mobile_1;?>"><p id="error-message4" style="color:red;"></p>
																</div>
																<br><br>
																<label class="col-4 col-form-label">Mobile-2</label>
																<div class="col-8">
																	<input class="form-control" type="tel" id="sales_mobile_2" name="sales_mobile_2" maxlength="10" placeholder="Mobile Number 2" value="<?php echo $sales_mobile_2;?>">
																	
																</div>
																<br><br>
																<label class="col-4 col-form-label">Mobile-3</label>
																<div class="col-8">
																	<input class="form-control" type="tel" id="sales_mobile_3" name="sales_mobile_3" maxlength="10" placeholder="Mobile Number 3" value="<?php echo $sales_mobile_3;?>">
																</div>
																<br><br>	
																<label class="col-4 col-form-label">Landline</label>
																<div class="col-8">
																	<input class="form-control" type="tel" id="sales_ll" name="sales_ll" maxlength="10" placeholder="Landline Number" value="<?php echo $sales_ll;?>">
																	
																</div>
															<br><br>
															</div>												
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Commission</label>
															<div class="col-9">
																
																<input type="text" id="comission" name="comission"  class="form-control" value="<?php echo $comission;?>" >
																<p id="error-message7" style="color:red;"></p>
															</div>
														</div>
														<div class="col-md-12 text-center">
															<button type="submit" id="add_company" name="add_company" class="btn btn-maroon btn-lg">Submit</button>
														</div>
													</form>
												</div>
										</div>
										<div class="col-md-2">
										</div>
										
										
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
												
													<!-- <h4 class="m-t-0 m-b-30 header-title">Horizontal form</h4> -->
													<form name="myform" id="myform" action="<?php echo base_url()?>Company/add_company_bankdata" method="post" enctype="multipart/form-data">
														<div class="form-group row">
															<label class="col-4 col-form-label">Bank Name</label>
															<div class="col-8">
																<?php if(isset($title)){?>
																<input type="hidden" class="form-control" value="<?php echo $title;  ?>" id="cus_id" name="cus_id"><?php }
																else if(isset($cust_id)) //echo $cust_id;
																{?>
																	
																<input type="hidden" class="form-control" value="<?php echo $id;  ?>" id="cus_id" name="cus_id">	
																<?php }
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
														<div class="form-group row">
															<label class="col-4 col-form-label">Penalty Charges</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" id="penalty" name="penalty" >
																<p id="bank_error4" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Cheque Bounce Charges</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" id="bounce" name="bounce" >
																<p id="bank_error5" style="color:red;"></p>
															</div>
														</div>
														<div class="col-md-12 text-center">
															<button type="submit"  id="add_bank" name="add_bank" class="btn btn-maroon btn-lg">Submit</button>
														</div>
														
													</form>
												</div>
											</section>
										</div>
										
										<div class="col-md-2">
										</div>
										
										<div class="col-md-12">
										<h3 class="header-title m-t-0 m-b-30 text-center">Already added Bank Details</h3>										
										<br>
										<table id="datatable-buttons" class="table table-striped table-bordered toggle-circle m-b-0" data-page-size="7">
											<thead>
											<tr>
												<!--<th>Customer Name</th>-->
												<th data-toggle="true">Bank Name</th>
												<th>Branch</th>
												<th>Account number</th>
												<th>IFSC code</th>
												<th>Penalty Charge</th>
												<th>Cheque Bounce Charge</th>
												<!--<th>Security Cheque</th>-->
												<th>Action</th>
											</tr>
											</thead>
											<tbody>
												<?php 
													if(isset($bank_data)){
													foreach($bank_data as $post){ ?>
												<tr>
													<!--<td><?php //echo $post->first_name;?></td>-->
													<td><?php echo $post->bank_name;?></td>
													<td><?php echo $post->branch_name;?></td>
													<td><?php echo $post->account_number;?></td>
													<td><?php echo $post->ifsc_code;?></td>	
													<td><?php echo $post->penalty_charges;?></td>
													<td><?php echo $post->cheq_bounce_charges;?></td>
													<td><a  href="<?php echo base_url(); ?>Company/EditBank/<?php echo $post->id;?>"><span class="btn btn-sm btn-default fa fa-edit"></span></a>
													<!--<a href="<?php //echo base_url(); ?>Admin/DeleteRole/<?php //echo $row->role_id;?>"><span class="btn btn-sm btn-default fa fa-trash"></span></a>-->
													<a  href="<?php echo base_url(); ?>Company/DeleteBank/<?php echo $post->id; ?>"><span class="btn btn-sm btn-default fa fa-trash"></span></a></td>
												</tr>
													<?php } }?>
											</tbody>
										</table>
										</div>
										
										
									</div>
                                </div>

                                <!-- <div class="tab-pane" id="settings1">
                                    <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                </div> -->
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->



            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
		
<?php include_once ("master/footer.php"); ?>

<script>
$(document).ready(function() {  
	$('#bank').hide();
	
		
	$("#add_form").click(function(){
		$('#bank').show();
	});
	
	
});

</script>
<script>
    $(document).ready(function() {
			$("#add_company").click(function() {
            $("#myform1").find("#error-message").html('');
			$("#myform1").find("#error-message1").html('');
			$("#myform1").find("#error-message2").html('');
			$("#myform1").find("#error-message3").html('');
			$("#myform1").find("#error-message4").html('');
			$("#myform1").find("#error-message5").html('');
			$("#myform1").find("#error-message6").html('');
			$("#myform1").find("#error-message7").html('');
			$("#myform1").find("#error-message8").html('');
			
			
            if (!isNaN($('#company_name').val())){
                 
                 $("#myform1").find("#error-message").html('Required. Only alphabets are allowed');
                 $('#company_name').focus();
                 return false;
            }            
			if ($('#reg_mobile_1').val().length != 10){
                 $("#myform1").find("#error-message1").html('Enter a valid 10 digit mobile number');
                 $('#reg_mobile_1').focus();
                 return false;
            }
            if ($('#reg_mobile_1').val() < 0){
                 
                 $("#myform1").find("#error-message1").html('Enter a valid 10 digit mobile number');
                 $('#reg_mobile_1').focus();
                 return false;
            }
            if (isNaN($('#reg_mobile_1').val())){
                 
                 $("#myform1").find("#error-message1").html('Enter a valid 10 digit mobile number');
                 $('#reg_mobile_1').focus();
                 return false;
            }
			if ($('#reg_mobile_2').val().length != 10){
                 $("#myform1").find("#error-message2").html('Enter a valid 10 digit mobile number');
                 $('#reg_mobile_2').focus();
                 return false;
            }
            if ($('#reg_mobile_2').val() < 0){
                 
                 $("#myform1").find("#error-message2").html('Enter a valid 10 digit mobile number');
                 $('#reg_mobile_2').focus();
                 return false;
            }
            if (isNaN($('#reg_mobile_2').val())){
                 
                 $("#myform1").find("#error-message2").html('Enter a valid 10 digit mobile number');
                 $('#reg_mobile_2').focus();
                 return false;
            }
			
			if ($('#corp_mobile_1').val().length != 10){
                 $("#myform1").find("#error-message3").html('Enter a valid 10 digit mobile number');
                 $('#corp_mobile_1').focus();
                 return false;
            }
            if ($('#corp_mobile_1').val() < 0){
                 
                 $("#myform1").find("#error-message3").html('Enter a valid 10 digit mobile number');
                 $('#corp_mobile_1').focus();
                 return false;
            }
            if (isNaN($('#corp_mobile_1').val())){
                 
                 $("#myform1").find("#error-message3").html('Enter a valid 10 digit mobile number');
                 $('#corp_mobile_1').focus();
                 return false;
            }
			if ($('#corp_mobile_2').val().length != 10){
                 $("#myform1").find("#error-message4").html('Enter a valid 10 digit mobile number');
                 $('#corp_mobile_2').focus();
                 return false;
            }
            if ($('#corp_mobile_2').val() < 0){
                 
                 $("#myform1").find("#error-message4").html('Enter a valid 10 digit mobile number');
                 $('#corp_mobile_2').focus();
                 return false;
            }
            if (isNaN($('#corp_mobile_2').val())){
                 
                 $("#myform1").find("#error-message4").html('Enter a valid 10 digit mobile number');
                 $('#corp_mobile_2').focus();
                 return false;
            }
			
			if ($('#sales_mobile_1').val().length != 10){
                 $("#myform1").find("#error-message5").html('Enter a valid 10 digit mobile number');
                 $('#sales_mobile_1').focus();
                 return false;
            }
            if ($('#sales_mobile_1').val() < 0){
                 
                 $("#myform1").find("#error-message5").html('Enter a valid 10 digit mobile number');
                 $('#sales_mobile_1').focus();
                 return false;
            }
            if (isNaN($('#sales_mobile_1').val())){
                 
                 $("#myform1").find("#error-message5").html('Enter a valid 10 digit mobile number');
                 $('#sales_mobile_1').focus();
                 return false;
            }
			if ($('#sales_mobile_2').val().length != 10){
                 $("#myform1").find("#error-message6").html('Enter a valid 10 digit mobile number');
                 $('#sales_mobile_2').focus();
                 return false;
            }
            if ($('#sales_mobile_2').val() < 0){
                 
                 $("#myform1").find("#error-message6").html('Enter a valid 10 digit mobile number');
                 $('#sales_mobile_2').focus();
                 return false;
            }
            if (isNaN($('#sales_mobile_2').val())){
                 
                 $("#myform1").find("#error-message6").html('Enter a valid 10 digit mobile number');
                 $('#sales_mobile_2').focus();
                 return false;
            }
			if (isNaN($('#comission').val())){
                 
                 $("#myform1").find("#error-message7").html('Only alphabets are allowed');
                 $('#comission').focus();
                 return false;
            }
			
			
         }); 
		 
		 $("#add_bank").click(function() {
            $("#myform").find("#bank_error").html('');
			$("#myform").find("#bank_error1").html('');
			$("#myform").find("#bank_error2").html('');
			$("#myform").find("#bank_error3").html('');
			$("#myform").find("#bank_error4").html('');
			$("#myform").find("#bank_error5").html('');
			
            if (!isNaN($('#bank_name').val())){
                 
                 $("#myform").find("#bank_error").html('Required. Only alphabets are allowed');
                 $('#bank_name').focus();
                 return false;
            }
            if (!isNaN($('#branch').val())){
                 
                 $("#myform").find("#bank_error1").html('Required. Only alphabets are allowed');
                 $('#branch').focus();
                 return false;
            }			
            
            if (isNaN($('#acc_number').val())){
                 
                 $("#myform").find("#bank_error2").html('Only digits are allowed');
                 $('#acc_number').focus();
                 return false;
            }
			var ifsc= $("#ifsc_code").val();
			var expr = /[A-Z|a-z]{4}[0][\d]{6}$/;
			
			if(!expr.test(ifsc))
			{			
				 $("#myform").find("#bank_error3").html('Enter a valid IFSC code');
                 $('#ifsc_code').focus();
                 return false;
            }
            else return true;
			
			if (isNaN($('#penalty').val())){
                 
                 $("#myform").find("#bank_error4").html('Only digits are allowed');
                 $('#penalty').focus();
                 return false;
            }
			if (isNaN($('#bounce').val())){
                 
                 $("#myform").find("#bank_error5").html('Only digits are allowed');
                 $('#bounce').focus();
                 return false;
            }
         });  
    });
</script>