<?php include_once ("application/views/master/header.php"); ?>

<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>/Admin/index">Main</a></li>
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>/Company/company_master">Company Master</a></li>
                                    <li class="breadcrumb-item active">Update Bank</li>
                                </ol>
                            </div>
                            <!-- <h4 class="page-title">Tabs</h4> -->
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
               <!--  <?php 
														
														foreach($bank_data as $data){
															$bank_id = $data->id;
															$bank_name = $data->bank_name;
															$branch_name = $data->branch_name;
															$account_number = $data->account_number;
															$ifsc_code = $data->ifsc_code;
															$penalty_charges = $data->penalty_charges;
															$bounce = $data->cheq_bounce_charges;
															}?> -->


                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h3 class="header-title m-t-0 m-b-30">Update Bank Details</h3>

                           <form name="myform" id="myform" action="<?php echo base_url()?>Company/update_company_bankdata" method="post" enctype="multipart/form-data">
														<div class="form-group row">
															<label class="col-4 col-form-label">Bank Name</label>
															<div class="col-8">																
																<input type="hidden" class="form-control" value="<?php echo $bank_id;  ?>" id="id" name="id">																	
																<input type="text" class="form-control" value="<?php echo $bank_name;?>" id="bank_name" name="bank_name">
																<p id="bank_error" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Branch</label>
															<div class="col-8">
																<input type="text" class="form-control" value="<?php echo $branch_name;?>" id="branch_name" name="branch_name" >
																<p id="bank_error1" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Account number</label>
															<div class="col-8">
																<input type="text" class="form-control" value="<?php echo $account_number;?>" id="account_number" name="account_number" >
																<p id="bank_error2" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">IFSC code</label>
															<div class="col-8">
																<input type="text" class="form-control" value="<?php echo $ifsc_code;?>" id="ifsc_code" name="ifsc_code" >
																<p id="bank_error3" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Penalty Charges</label>
															<div class="col-8">
																<input type="text" class="form-control" value="<?php echo $penalty_charges;?>" id="penalty_charges" name="penalty_charges" >
																<p id="bank_error4" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Cheque Bounce Charges</label>
															<div class="col-8">
																<input type="text" class="form-control" value="<?php echo $bounce;?>" id="cheq_bounce_charges" name="cheq_bounce_charges" >
																<p id="bank_error5" style="color:red;"></p>
															</div>
														</div>
														
												</div>
											
										
										<div class="col-md-2">
										</div>
										<div class="col-md-12 text-center">
											<button type="submit"  id="add_bank" name="add_bank" class="btn btn-maroon btn-lg">Submit</button>
										</div>
										
							</form>
                            
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
				
				
				



            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
		 <!-- jQuery  -->
        
<?php include_once ("application/views/master/footer.php"); ?>
<script>
    $(document).ready(function() {
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
            if (!isNaN($('#branch_name').val())){
                 
                 $("#myform").find("#bank_error1").html('Required. Only alphabets are allowed');
                 $('#branch_name').focus();
                 return false;
            }			
            
            if (isNaN($('#account_number').val())){
                 
                 $("#myform").find("#bank_error2").html('Only digits are allowed');
                 $('#account_number').focus();
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
			
			if (isNaN($('#penalty_charges').val())){
                 
                 $("#myform").find("#bank_error4").html('Only digits are allowed');
                 $('#penalty_charges').focus();
                 return false;
            }
			if (isNaN($('#cheq_bounce_charges').val())){
                 
                 $("#myform").find("#bank_error5").html('Only digits are allowed');
                 $('#cheq_bounce_charges').focus();
                 return false;
            }
         });  
    });
</script>