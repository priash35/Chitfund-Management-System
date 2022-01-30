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
                                    <li class="breadcrumb-item active">Group Master</li>
                                </ol>
                            </div>
                            <!-- <h4 class="page-title">Tabs</h4> -->
                        </div>
                    </div>
                </div>
               											<?php 
														
															foreach($records as $data){
															$id = $data->id;
															$group_type = $data->group_type;
															$group_duration = $data->group_duration;
															$duration_unit = $data->duration_unit;															
															}?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h3 class="header-title m-t-0 m-b-30">Update Group Master</h3>

                           <form name="myform" id="myform" action="<?php echo base_url()?>Group/update_groupmaster" method="post" enctype="multipart/form-data" class="span8 form-inline">
														<input type="hidden" class="form-control" value="<?php echo $id;  ?>" id="id" name="id">
														<div class="form-group">
														  <label class ="col-5 col-form-label"for="group_type">Select Group Type:</label>
														  <div class="col-7">														  
															  <select class="form-control col-8" id="group_type"  onChange="check();" name="group_type">
															  	<option value="" selected disabled>Please select</option>
															    <option value="DAILY">Daily</option>
															    <option value="WEEKLY">Weekly</option>
															    <option value="MONTHLY">Monthly</option>														    
															  </select>
															  </div>													
														</div>
														<div class="form-group">
															<label class="col-4 col-form-label">Duration</label>
															<div class="col-8">
																<input type="text" class="form-control" value="<?php echo $group_duration;?>" id="group_duration" name="group_duration" >
															</div>
														</div>
														<div class="form-group">
														  <label class ="col-4 col-form-label" for="group_unit">Unit</label>
														  <div class="col-8">
																<input type="text" class="form-control" value="<?php echo $duration_unit;?>" id="duration_unit" name="duration_unit" readonly="readonly">
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
        
<?php include_once "application/views/admin/master/footer.php";  ?>
<script>
$(document).ready(function(){
	var arg ='<?php echo $group_type; ?>';
   	$('#group_type').val(arg);
  
});
</script>
<script>
 function check() {
     var grouptype=document.getElementById("group_type").value;
     switch (grouptype){
     	case "Daily":
     		document.getElementById("duration_unit").value = "DAYS";
     		break;
     	case "Weekly":
     		document.getElementById("duration_unit").value = "WEEKS";
     		break;
     	case "Monthly":
     		document.getElementById("duration_unit").value = "MONTHS";
     		break;
     	default:
     		break;
     }    
    } 
 </script>
