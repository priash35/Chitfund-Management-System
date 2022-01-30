<?php include_once "application/views/admin/master/header.php"; ?>

<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Main</a></li>
                                    <!--<li class="breadcrumb-item"><a href="#">Extra Pages</a></li>-->
                                    <li class="breadcrumb-item active">Collection Entry</li>
                                    <li class="breadcrumb-item active">Cheque Clearing</li>
									<li class="breadcrumb-item active">Update Cheque Details</li>
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
							<h3 class="header-title m-t-0 m-b-30 text-center">Update Cheque Details</h3>
                            <?php if($this->session->flashdata('msg')){ ?>
                            <div class="alert alert-info">
                                <?php echo $this->session->flashdata('msg'); ?>
                            </div>
                            <?php }?>
							
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-12 text-sm-center form-inline">
                                        <!-- <div class="form-group mr-2">
                                            <select id="demo-foo-filter-status" class="custom-select">
                                                <option value="">Show all</option>
                                                <option value="active">Active</option>
                                                <option value="disabled">Disabled</option>
                                                <option value="suspended">Suspended</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input id="demo-foo-search" type="text" placeholder="Search" class="form-control" autocomplete="on">
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            
							<div class="row">
								<div class="col-md-2">
								
								</div>
								
								<div class="col-md-8">								
									<form name="myform" id="myform" action="<?php echo base_url()?>Collection/update_cheqdd_details" method="post">
										<?php foreach($cheq_data as $post){?>
										<div class="form-group row">
											<label class="col-3 col-form-label">Cheque Date</label>
											<div class="col-8">
												<input id="bank_id" name="bank_id" type="hidden" class="form-control" value="<?php echo $post->id;?>" >
												
												<input id="chq_date" name="chq_date" type="date" class="form-control" value="<?php echo $post->chqdd_date;?>" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-3 col-form-label">Deposite Date</label>
											<div class="col-8">
												<input id="deposit_date" name="deposit_date" type="date" class="form-control" value="<?php echo $post->deposit_date;?>" required>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-3 col-form-label">Clear Date</label>
											<div class="col-8">
												<input id="clear_date" name="clear_date" type="date" class="form-control" value="<?php echo $post->clear_date;?>" >
											</div>
										</div>
										<div class="form-group row">
											<label class="col-3 col-form-label">Cheque Status</label>
											<div class="col-8">
												<select id="c_status" name="c_status" class="form-control">
													<option value="<?php echo $post->status;?>"><?php echo $post->status;?></option>
													
													<?php foreach($chq_status as $row){
														if($post->status != $row){
													?>													
														<option value="<?php echo $row;?>"><?php echo $row;?></option>
														
														<?php } } ?>
													<!--<option value="DEPOSITED">DEPOSITED</option>
													<option value="ENCASHED">ENCASHED</option>
													<option value="BOUNCED">BOUNCED</option>-->
												</select>
											</div>
										</div>			
										
										<div class="col-md-12 text-center">	
												<button type="submit" id="update_cheque" name="update_cheque" class="btn btn-maroon btn-lg">Submit</button>
										</div>
										<?php } ?>										
									</form>	
							</div>  

							<div class="col-md-2">	
							
							</div>
							
						</div>
                        </div>
                    </div>
                </div>		
				
				
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
		
<?php include_once "application/views/admin/master/footer.php"; ?>

<script>

$(document).ready(function() {
	
	$('#c_status').change(function(){
		
		var status = $(this).val();
		
		if(status == 'DEPOSITED')
		{
			var d_date = $('#deposit_date').val();
			if(d_date == '')
			{
				alert('Please enter deposit date first!!!');
				$(this).val('Select Status');
			}
		}
		if(status == 'ENCASHED')
		{
			var c_date = $('#clear_date').val();
			if(c_date == '')
			{
				alert('Please enter clear date first!!!');
				$(this).val('Select Status');
			}
		}
	});
});

$(document).on("focusout","#chq_date",function(){
	
		var chq_date = $(this).val();
		//alert(chq_date);
		$('#deposit_date').attr('min', chq_date);
});

$(document).on("focusout","#deposit_date",function(){
	
		var chq_date = $(this).val();		
		$('#clear_date').attr('min', chq_date);
});

</script>