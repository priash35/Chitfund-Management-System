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
                                    <li class="breadcrumb-item"><a href="#">Manage Group</a></li>
                                    <li class="breadcrumb-item active">Add Group</li>
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
								            <?php 
														//echo $duration['daily'][0];
														$edit = false;
														$group_type1='';
														if(isset($group_data)){
															
															$edit = true;
															foreach($group_data as $data){
																$id = $data->id;
																$group_type1 = $data->group_type;
																$group_duration = $data->group_duration;
																//$duration_unit = $data->duration_unit;	
																$comm_date = $data->comm_date;
																$term_date = $data->term_date;
																$group_name = $data->group_name;
																$chit_amount = $data->chit_amount;
																$byelaw_date = $data->byelaw_date;														
															}
											}?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                        	<?php
								if ($edit){

							?>
                            	<h3 class="header-title m-t-0 m-b-30">Edit Group</h3>
                            <?php  }else{ ?>
                            	<h3 class="header-title m-t-0 m-b-30">Add Group</h3>
                            <?php  } ?>	
                            <?php if($this->session->flashdata('msg')){ ?>
                            <div class="alert alert-info">
                            	<?php echo $this->session->flashdata('msg'); ?>
                            </div>
                            <?php }?>
                            <ul class="nav nav-pills navtab-bg nav-justified pull-in ">
                                <li class="nav-item">
                                    <a href="#home1" data-toggle="tab" aria-expanded="true" class="<?php echo $nav1;?>">
                                        <i class="fi-head mr-2"></i> Basic Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#profile1" data-toggle="tab" aria-expanded="false" class="<?php echo $nav2;?>">
                                        <i class="fi-monitor mr-2"></i>Advanced Details 
                                    </a>
                                </li>
                               
                            </ul>
                            				
                            				



                            <div class="tab-content">
                                <div class="<?php echo $tab_pane1;?>" id="home1">
									<div class="col-md-12 row">
										<div class="col-md-2">
										</div>
										<div class="col-md-8">
												<div class="card-box">
													<!-- <h4 class="m-t-0 m-b-30 header-title">Horizontal form</h4> -->
													<?php
														if ($edit){

													?>
													<form name="myform" id="myform" action="<?php echo base_url()?>Group/edit_Group" method="post" enctype="multipart/form-data" >
													<input type="hidden" class="form-control" value="<?php echo $id ;?>" id="id" name="id">
													<?php  }else{ ?>	
													<form name="myform" id="myform" action="<?php echo base_url()?>Group/add_Group" method="post" enctype="multipart/form-data" >
													<?php  } ?>	
														<!--<div class="form-group row">
															<label class="col-3 col-form-label">Name Title</label>
															<div class="col-9">
																<input type="text" id="title" name="title" class="form-control" value="" placeholder="Mr/Mrs">
															</div>
														</div>-->
														
														<div class="form-group row">
															<label class="col-4 col-form-label">Group Type</label>
															<div class="col-8">														  
															  <select class="form-control" id="group_type"  onChange="check();" name="group_type">
															  	<option value="" selected disabled>Please select</option>
															    <?php
															    foreach($group_type as $item){ if ($item->group_type == $group_type1){?>
															    <option selected="selected" value="<?php echo strtoupper($item->group_type); ?>">
															     <?php echo $item->group_type; ?></option>
															    <?php  }else{ ?>		
															    <option value="<?php echo strtoupper($item->group_type); ?>">
															    <?php echo $item->group_type; ?></option>
															    <?php  }} ?>														    
															  </select>	 
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Duration</label>
															<div class="col-8">
																<select class="form-control" id="group_duration"  name="group_duration" >
																</select>	 
															</div>
														</div>
															<!-- <div class="form-group row">
														  		<label class ="col-3 col-form-label">Unit</label>
														  		<div class="col-9">
																<input type="text" class="form-control" value="" id="duration_unit" name="duration_unit" readonly="readonly">
																</div>
															</div> -->
															<?php
																if ($edit){
															?>
															<div class="form-group row">
																<label class="col-4 col-form-label">Group Name</label>
																<div class="col-8">
																<input class="form-control" type="text" id="group_name" name="group_name" readonly="readonly" value="<?php if(isset($group_name)){ echo $group_name;}?>" >
																</div>
															</div>
															<?php  } ?>
															<div class="form-group row">
																<label class="col-4 col-form-label">Commencement Date</label>
																<div class="col-8">
																<input class="form-control" type="date" id="comm_date" name="comm_date" value="<?php if(isset($comm_date)){ echo $comm_date;}?>" >
																</div>
															</div>
															<?php
																if ($edit){
															?>
															<div class="form-group row">
																<label class="col-4 col-form-label">Termination Date</label>
																<div class="col-8">
																<input class="form-control" readonly="readonly" type="date" id="term_date" name="term_date" value="<?php if(isset($term_date)){ echo $term_date;}?>" >
																</div>
															</div>
															<?php  } ?>
															<div class="form-group row">
																<label class="col-4 col-form-label">Chit Amount</label>
																<div class="col-8">
																	<input type="text" id="chit_amount" name="chit_amount"  class="form-control" value="<?php if(isset($chit_amount)){ echo $chit_amount;}?>" required>
																	<p id="error-message2" style="color:red;"></p>
																</div>
															</div>
															<div class="form-group row">
																<label class="col-4 col-form-label">Bye Law Date</label>
																<div class="col-8">
																<input class="form-control" type="date" id="byelaw_date" name="byelaw_date" value="<?php if(isset($byelaw_date)){ echo $byelaw_date;}?>">
																</div>
															</div>					
														</div>
														
												</div>
																			
										<div class="col-md-2">
										</div>
										<div class="col-md-12 text-center">
													<?php
														if ($edit){
													?>
													<button type="submit" id="add_group" name="add_group" class="btn btn-maroon btn-lg">Update</button>
													<a  class="btn btn-maroon btn-lg" href="<?php echo base_url(); ?>Report/parse_byelaw/<?php echo $id;?>">View Bye Law</a>
													<?php  }else{ ?>	
													<button type="submit" id="add_group" name="add_group" class="btn btn-maroon btn-lg">Submit</button>	
													<?php  } ?>	
																						
										</div>
										</form>
									</div>
                                </div>
                                <div class="<?php echo $tab_pane2;?>" id="profile1">
                                    <div class="col-md-12 row">					
										
										
										<div class="col-md-2">
										</div>
										<div class="col-md-8">
											<section id="bank">
												<div class="card-box">
												<?php 
														$edit_add = false;
														if(isset($group_data)){
															$edit_add = true;
															foreach($group_data as $data){
																$id = $data->id;
																$reg_date = $data->reg_date;
																$reg_number = $data->reg_number;
																//$duration_unit = $data->duration_unit;	
																$fd_date = $data->fd_date;
																$fd_number = $data->fd_number;
																$fd_mat_date = $data->fd_mat_date;
																$chit_amount = $data->chit_amount;
																$bank_id = $data->bank_id;
																/*$bank_name = $data->bank_name;
																$branch_name = $data->branch_name;	
																$account_number = $data->account_number;		*/													
															}
															}?>
													
													
													 <form name="registration" id="myform1" action="<?php echo base_url()?>Group/edit_Group	" method="post" enctype="multipart/form-data">
														<?php
														if ($edit_add){
														?>
														<input type="hidden" class="form-control" value="<?php echo $id ;?>" id="id" name="id">
														<?php  } ?>	
															
															<div class="form-group row">
																<label class="col-4 col-form-label">Fixed Deposit Date</label>
																<div class="col-8">
																<input class="form-control" type="date" id="fd_date" name="fd_date" value="<?php if(isset($fd_date)){ echo $fd_date;}?>">
																</div>
															</div>					
														
															<div class="form-group row">
																<label class="col-4 col-form-label">Fixed Deposit Number</label>
																<div class="col-8">
																	<input type="text" id="fd_number" name="fd_number"  class="form-control" value="<?php if(isset($fd_number)){ echo $fd_number;}?>" required>
																	<p id="error-message2" style="color:red;"></p>
																</div>
															</div>
															<div class="form-group row">
																<label class="col-4 col-form-label">Fixed Deposit Maturity Date</label>
																<div class="col-8">
																<input class="form-control" type="date" id="fd_mat_date" name="fd_mat_date" value="<?php if(isset($fd_mat_date)){ echo $fd_mat_date;}?>">
																</div>
															</div>
															<div class="form-group row">
																<label class="col-4 col-form-label">Fixed Deposit Bank Details</label>
																<div class="col-8">														  
																  <select class="form-control" id="bank_id"  name="bank_id">
																	<option value="" selected disabled>Please select Bank</option>
																	<?php
																	foreach($banks as $item){ if ($item->id == $bank_id){?>
																	<option selected="selected" value="<?php echo ($item->id); ?>">
																	 <?php echo $item->bank_id; ?></option>
																	<?php  }else{ ?>		
																	<option value="<?php echo ($item->id); ?>">
																	<?php echo $item->bank_id; ?></option>
																	<?php  }} ?>														    
																  </select>	 
																  </div>		
															</div>
															<div class="form-group row">
																<label class="col-4 col-form-label">Registration Date</label>
																<div class="col-8">
																<input class="form-control" type="date" id="reg_date" name="reg_date" value="<?php if(isset($reg_date)){ echo $reg_date;}?>" >
																</div>
															</div>															
															<div class="form-group row">
																<label class="col-4 col-form-label">Registration Number</label>
																<div class="col-8">
																	<input type="text" id="reg_number" name="reg_number"  class="form-control" value="<?php if(isset($reg_number)){ echo $reg_number;}?>" required>
																	<p id="error-message2" style="color:red;"></p>
																</div>
															</div>
														
														
														<div class="col-md-12 text-center">														
															<button type="submit" id="add_group_more" name="add_group_more" class="btn btn-maroon btn-lg">Update</button>
															
														</div>
												</div>
											</section>
										</div>
										<div class="col-md-2">
										</div>
										
										</form> 
										
									</div>
								
                                </div>
                               
                                
									
									
									<!-- Document modal content -->
									
									
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->



            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
		
<?php include_once "application/views/admin/master/footer.php";  ?>


<script>
/*$(document).ready(function() {  
	$('#bank').hide();
	$('#documents').hide();
		
	$("#add_form").click(function(){
		$('#bank').show();
	});
	
	$("#add_document_form").click(function(){
		$('#documents').show();
	});
	
});*/

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
			  $('#bank-modal').modal('show');  // show bootstrap modal when complete loaded
		  },
		  error: function (jqXHR, textStatus, errorThrown)
			{
				alert('Error get data from ajax');
			}
		});

}

$("#update_bank").click(function(){
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
			
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert('Error get data from ajax');
		}
	});
});

function delete_bank(ins_id)
			{
			
				if(ins_id!="")
				{
					var conf= confirm("Are you sure you want to delete?");
					
					if(conf)
					{
						window.location.href= "<?php echo site_url('Customer/DeleteBank');?>?id="+ins_id;;
						
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
function onEdit() {
	 var group =  document.getElementById('group_type').value;    
     var group_dur = <?php echo ($group_duration); ?>;     
     document.getElementById('group_duration').options.length = 0;
     switch (group){
     	case "DAILY":     	
     		//document.getElementById("duration_unit").value = "DAYS";

     		var array_val = <?php echo json_encode($duration["daily"][0]); ?>;     		
     		for (var i = 0; i < array_val.length; i++) {
	     		var option = document.createElement("option");
	     		option.value = array_val[i];
	     		option.text = array_val[i] + " DAYS";
	     		document.getElementById("group_duration").appendChild(option);	     	
     		}
     		document.getElementById('group_duration').value = group_dur;   
     		break;
     	case "WEEKLY":
     		//document.getElementById("duration_unit").value = "WEEKS";
     		var array_val = <?php echo json_encode($duration["weekly"][0]); ?>;
     		for (var i = 0; i < array_val.length; i++) {
	     		var option = document.createElement("option");
	     		option.value = array_val[i];
	     		option.text = array_val[i] + " WEEKS";
	     		document.getElementById("group_duration").appendChild(option);
     		}
     		break;
     	case "MONTHLY":
     		//document.getElementById("duration_unit").value = "MONTHS";
     		var array_val = <?php echo json_encode($duration["monthly"][0]); ?>;
     		for (var i = 0; i < array_val.length; i++) {
	     		var option = document.createElement("option");
	     		option.value = array_val[i];
	     		option.text = array_val[i] + " MONTHS";
	     		document.getElementById("group_duration").appendChild(option);
     		}
     		break;
     	default:
     		break;
     }
     
    } 
    $(document).ready(function() {
    	var isEdit = <?php echo $edit; ?>;    	
    	if (isEdit==1){

    		onEdit();
    	}
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
			if ($('#mobile_2').val().length != 10){
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
            }
			
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
 function check() {
     var grouptype=document.getElementById("group_type").value;
     document.getElementById('group_duration').options.length = 0;
     switch (grouptype){
     	case "DAILY":
     		//document.getElementById("duration_unit").value = "DAYS";
     		var array_val = <?php echo json_encode($duration["daily"][0]); ?>;
     		for (var i = 0; i < array_val.length; i++) {
	     		var option = document.createElement("option");
	     		option.value = array_val[i];
	     		option.text = array_val[i] + " DAYS";
	     		document.getElementById("group_duration").appendChild(option);
     		}
     		break;
     	case "WEEKLY":
     		//document.getElementById("duration_unit").value = "WEEKS";
     		var array_val = <?php echo json_encode($duration["weekly"][0]); ?>;
     		for (var i = 0; i < array_val.length; i++) {
	     		var option = document.createElement("option");
	     		option.value = array_val[i];
	     		option.text = array_val[i] + " WEEKS";
	     		document.getElementById("group_duration").appendChild(option);
     		}
     		break;
     	case "MONTHLY":
     		//document.getElementById("duration_unit").value = "MONTHS";
     		var array_val = <?php echo json_encode($duration["monthly"][0]); ?>;
     		for (var i = 0; i < array_val.length; i++) {
	     		var option = document.createElement("option");
	     		option.value = array_val[i];
	     		option.text = array_val[i] + " MONTHS";
	     		document.getElementById("group_duration").appendChild(option);
     		}
     		break;
     	default:
     		break;
     }    
    } 
    
 </script>