<?php include_once "master/header.php"; ?> 

<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Main</a></li>
                                    <li class="breadcrumb-item"><a href="#">Customer Master</a></li>
                                    <li class="breadcrumb-item active">Add New Customer</li>
                                </ol>
                            </div>
                            <!-- <h4 class="page-title">Tabs</h4> -->
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h3 class="header-title m-t-0 m-b-30">New Customer Details</h3>
							<?php //echo "<pre>"; print_r($data); echo "</pre>";?>
							<?php //if(isset($title)) echo $title;?>
                            <ul class="nav nav-pills navtab-bg nav-justified pull-in ">
                                <li class="nav-item">
                                    <a href="#home1" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                        <i class="fi-head mr-2"></i> Basic
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#profile1" data-toggle="tab" aria-expanded="false" class="nav-link ">
                                        <i class="fi-monitor mr-2"></i>Bank Details 
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#messages1" data-toggle="tab" aria-expanded="false" class="nav-link">
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
                                <div class="tab-pane show active" id="home1">
									<div class="col-md-12 row">
										<div class="col-md-6">
												<div class="card-box">
													<!-- <h4 class="m-t-0 m-b-30 header-title">Horizontal form</h4> -->
													<form name="myform" id="myform" action="<?php echo base_url()?>Admin/add_Custdata" method="post" enctype="multipart/form-data">
														<!--<div class="form-group row">
															<label class="col-3 col-form-label">Name Title</label>
															<div class="col-9">
																<input type="text" id="title" name="title" class="form-control" value="" placeholder="Mr/Mrs">
															</div>
														</div>-->
														<div class="form-group row">
															<label class="col-3 col-form-label">First Name</label>
															<div class="col-9">
																<input type="text" id="f_name" name="f_name"  class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Middle Name</label>
															<div class="col-9">
																<input type="text" id="m_name" name="m_name"  class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Last Name</label>
															<div class="col-9">
																<input type="text" id="l_name" name="l_name"  class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Family</label>
															<div class="col-9">
																<input type="text" id="family" name="family" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Permanent Address</label>
															<div class="col-9">
																<textarea class="form-control" id="p_address" name="p_address"  rows="5"></textarea>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Temporary Address</label>
															<div class="col-9">
																<textarea class="form-control" id="t_address" name="t_address"  rows="5"></textarea>
															</div>
														</div>
																												
														<div class="form-group row">
															<label class="col-3 col-form-label">Contact</label>
															<div class="col-md-9">
																<input class="form-control" type="tel" id="mobile_1" name="mobile_1" placeholder="Mobile Number 1"><br>
																<input class="form-control" type="tel" id="mobile_2" name="mobile_2" placeholder="Mobile Number 2"><br>
																<input class="form-control" type="tel" id="mobile_3" name="mobile_3" placeholder="Mobile Number 3"><br>
																<input class="form-control" type="tel" id="mobile_4" name="mobile_4" placeholder="Mobile Number 4"><br>
																<input class="form-control" type="tel" id="landline" name="landline" placeholder="Landline Number">
															</div>
														</div>
												</div>
										</div>
										<div class="col-md-6">
												<div class="card-box">
														<div class="form-group row">
															<label class="col-3 col-form-label">DOB</label>
															<div class="col-9">
																<input class="form-control" type="date" id="date" name="date">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Gender</label>
															<div class="col-9">
																<div class="radio radio-info form-check-inline">
																	<input type="radio" id="inlineRadio1" value="Male" name="radioInline">
																	<label for="inlineRadio1"> Male </label>
																</div>
																<div class="radio form-check-inline">
																	<input type="radio" id="inlineRadio2" value="Female" name="radioInline">
																	<label for="inlineRadio2"> Female </label>
																</div>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Nominee</label>
															<div class="col-9">
																<input type="text" class="form-control" id="nominee" name="nominee" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Nominee Relation</label>
															<div class="col-9">
																<input type="text" class="form-control" id="n_relation" name="n_relation" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Reffered By</label>
															<div class="col-9">
																<input type="text" class="form-control" id="ref_by" name="ref_by" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Email</label>
															<div class="col-9">
																<input type="email" class="form-control" id="email1" name="email1" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Alternate Email</label>
															<div class="col-9">
																<input type="email" class="form-control" id="email2" name="email2"  placeholder="(optional)">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Business Name</label>
															<div class="col-9">
																<input type="text" class="form-control" id="business" name="business" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Address</label>
															<div class="col-9">
																<textarea class="form-control" id="b_address" name="b_address" rows="5"></textarea>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Nature of Business</label>
															<div class="col-9">
																<input type="text" class="form-control" id="b_type" name="b_type" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Family Members</label>
															<div class="col-9">
																<input type="text" class="form-control" id="family_member" name="family_member" value="" >
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
                                <div class="tab-pane" id="profile1">
                                    <div class="col-md-12 row">
										<div class="col-md-12 text-right">
											<button id="add_form" class="btn btn-gold btn-lg"><a style="color:#ffffff;">Add Bank Details</a></button>														
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
													foreach($bank_data as $post){ $customer= $post->cus_id;?>
												<tr>
													<!--<td><?php //echo $post->first_name;?></td>-->
													<td><?php echo $post->bank_name;?></td>
													<td><?php echo $post->branch_name;?></td>
													<td><?php echo $post->account_number;?></td>
													<td><?php echo $post->ifsc_code;?></td>	
													<td><a  href="<?php echo base_url(); ?>Customer/EditCustomer/<?php echo $post->id;?>"><span class="btn btn-sm btn-default fa fa-edit"></span></a>
													<!--<a href="<?php //echo base_url(); ?>Admin/DeleteRole/<?php //echo $row->role_id;?>"><span class="btn btn-sm btn-default fa fa-trash"></span></a>-->
													<a  href="#" onclick="delete_ins(<?php echo $post->id; ?>)"><span class="btn btn-sm btn-default fa fa-trash"></span></a></td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
										
										
										<div class="col-md-2">
										</div>
										<div class="col-md-8">
											<section id="bank">
												<div class="card-box">
													
													<!-- <h4 class="m-t-0 m-b-30 header-title">Horizontal form</h4> -->
													<form name="myform" id="myform" action="<?php echo base_url();?>Customer/add_bankdata" method="post" enctype="multipart/form-data">
														<div class="form-group row">
															<label class="col-4 col-form-label">Bank Name</label>
															<div class="col-8">
																<?php if(isset($title)){?>
																<input type="hidden" class="form-control" value="<?php echo $title;  ?>" id="cus_id" name="cus_id"><?php }
																else
																{?>
																<input type="hidden" class="form-control" value="<?php echo $customer;  ?>" id="cus_id" name="cus_id">
																<?php
																}
																?>
																<input type="text" class="form-control" value="" id="bank_name" name="bank_name">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Branch</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" id="branch" name="branch" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Account number</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" id="acc_number" name="acc_number" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">IFSC code</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" id="ifsc_code" name="ifsc_code" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Security Cheque</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" id="cheque" name="cheque" >
															</div>
														</div>	
												</div>
													<div class="col-md-12 text-center">
														<button id="add_bank" name="add_bank" class="btn btn-maroon btn-lg">Submit</button>
													</div>
												
												</form>
											</section>
										</div>
										<div class="col-md-2">
										</div>
									</div>
                                </div>
                                <div class="tab-pane" id="messages1">
									<div class="col-md-12 row">
										<div class="col-md-3">
										</div>
										<div class="col-md-6">
											<div class="card-box">											
												<div class="demo-box">
													<form name="myform" id="myform" action="<?php echo base_url()?>Customer/add_documents" method="post" enctype="multipart/form-data">	
														<?php if(isset($title)){?>
														<input type="hidden" class="form-control" value="<?php echo $title;  ?>" id="bank_name" name="cus_id"><?php }?>
														<div class="form-group m-b-0">
															<p class="mb-2 mt-4 font-weight-bold">ID Proof</p>
															<input type="file" class="filestyle" data-btnClass="btn-maroon" id="id_proof" name="id_proof">
														</div>
														<div class="form-group m-b-0">
															<p class="mb-2 mt-4 font-weight-bold">Residence proof</p>
															<input type="file" class="filestyle" data-btnClass="btn-maroon" id="residence" name="cheque">
														</div>
														<div class="form-group m-b-0">
															<p class="mb-2 mt-4 font-weight-bold">Photo</p>
															<input type="file" class="filestyle" data-btnClass="btn-maroon" id="img" name="cheque">
														</div>
														<div class="form-group m-b-0">
															<p class="mb-2 mt-4 font-weight-bold">Income Proof</p>
															<input type="file" class="filestyle" data-btnClass="btn-maroon" id="cheque" name="cheque">
														</div>
														<div class="form-group m-b-0">
															<p class="mb-2 mt-4 font-weight-bold">Bank statement</p>
															<input type="file" class="filestyle" data-btnClass="btn-maroon" id="state" name="cheque">
														</div>
														<div class="form-group m-b-0">
															<p class="mb-2 mt-4 font-weight-bold">Visiting card</p>
															<input type="file" class="filestyle" data-btnClass="btn-maroon" id="cheque" name="cheque">
														</div>
																
												</div>
											</div>
										</div>
										<div class="col-md-3">
										</div>
										<div class="col-md-12 text-center">
												<button class="btn btn-maroon btn-lg">Submit</button>
										</div>
																				
										</form>
										<br>
										<br>
										<br>
										<table id="datatable-buttons" class="table table-striped table-bordered toggle-circle m-b-0" data-page-size="7">
											<thead>
											<tr>
												<th data-toggle="true">ID Proof</th>
												<th>Residence proof</th>
												<th>Photo</th>
												<th>Income proof</th>
												<th>Bank statement</th>
												<th>Visiting card</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>ID1</td>
												<td>Residence</td>
												<td>Photo</td>
												<td>Income</td>
												<td>Bank</td>
												<td>Visiting</td>												
											</tr>				
											
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
									</div>                                 
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->



            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
		
<?php include_once "master/footer.php";  ?>

<script>
$(document).ready(function() {  
	$('#bank').hide();
	
		
	$("#add_form").click(function(){
		/* $("#bank").css("visibility", "");
		$("#bank").css("visibility", "show"); */
		$('#bank').show();
	});
	
	
});

/* $(document).ready(function() { 
	$("#add_bank").click(function(){
		var user_id= $('#cus_id').val();
		var bank_name= $('#bank_name').val();
		var branch= $('#branch').val();
		var acc_number= $('#acc_number').val();
		var ifsc_code= $('#ifsc_code').val();
		var cheque= $('#cheque').val();
		//alert(user_id);
		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>Customer/add_bankdata",			
			data: {user_id:user_id,bank_name:bank_name,branch:branch,acc_number:acc_number,ifsc_code:ifsc_code,cheque:cheque},
			success : function(data){
				alert(data);
				$('#tb').html(data);
			}
		});
		//return false();
	});
}); */
</script>