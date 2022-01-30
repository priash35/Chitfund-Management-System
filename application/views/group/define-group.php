

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
                <!-- end page title end breadcrumb -->
 				
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h3 class="header-title m-t-0 m-b-30">Group Master</h3>
                            <?php if($this->session->flashdata('msg')){ ?>
                            <div class="alert alert-info">
                            	<?php echo $this->session->flashdata('msg'); ?>
                            </div>
                            <?php }?>                         
                            
                           
                                
                                    <div class="col-md-12 row">	
                                    <div class="col-md-12 text-right">
											<button id="add_form" class="btn btn-gold btn-lg"><a style="color:#ffffff;">Add Group Master</a></button>														
										</div>								
										
										<div class="col-md-12">
											<section id="group">
												<div class="card-box">
												
													<!-- <h4 class="m-t-0 m-b-30 header-title">Horizontal form</h4> -->
													<form name="myform" id="myform" action="<?php echo base_url()?>Group/add_groupdefn" method="post" enctype="multipart/form-data" class="span8 form-inline">
														<div class="form-group">
														  <label class ="col-5 col-form-label"for="group_type">Select Group Type:</label>
														  <div class="col-7">														  
															  <select class="form-control col-8" id="group_type"  onChange="check();" name="group_type">
															  	<option value="" selected disabled>Please select</option>
															    <option>Daily</option>
															    <option>Weekly</option>
															    <option>Monthly</option>														    
															  </select>
															</div>													
														</div>
														<div class="form-group">
															<label class="col-4 col-form-label">Duration</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" id="group_duration" name="group_duration" >
															</div>
														</div>
														<div class="form-group">
														  <label class ="col-4 col-form-label" for="group_unit">Unit</label>
														  <div class="col-8">
																<input type="text" class="form-control" value="" id="duration_unit" name="duration_unit" readonly="readonly">
														  </div>
														</div>											
														
												</div>
											
										
										<div class="col-md-2">
										</div>
										<div class="col-md-12 text-center">
											<button type="submit"  id="add_bank" name="add_bank" class="btn btn-maroon btn-lg">Submit</button>
										</div>
										</form>
										</section>
										</div>
										<div class="col-md-12">
										<h3 class="header-title m-t-0 m-b-30 text-center">Created Group Masters</h3>										
										<br>
										<table id="datatable-buttons" class="table table-striped table-bordered toggle-circle m-b-0" data-page-size="7">
											<thead>
											<tr>
												<!--<th>Customer Name</th>-->
												<th data-toggle="true">Group Type</th>
												<th>Duration</th>
												<th>Unit</th>												
												<!--<th>Security Cheque</th>-->
												<th>Action</th>
											</tr>
											</thead>
											<tbody>
												<?php 
													if(isset($records)){
													foreach($records as $post){ ?>
												<tr>
													<!--<td><?php //echo $post->first_name;?></td>-->
													<td><?php echo $post->group_type;?></td>
													<td><?php echo $post->group_duration;?></td>
													<td><?php echo $post->duration_unit;?></td>													
													<td><a  href="<?php echo base_url(); ?>Group/EditGroupMaster/<?php echo $post->id;?>"><span class="btn btn-sm btn-default fa fa-edit"></span></a>
													<!--<a href="<?php //echo base_url(); ?>Admin/DeleteRole/<?php //echo $row->role_id;?>"><span class="btn btn-sm btn-default fa fa-trash"></span></a>-->
													<a  href="<?php echo base_url(); ?>Group/DeleteGroupMaster/<?php echo $post->id; ?>"><span class="btn btn-sm btn-default fa fa-trash"></span></a></td>
												</tr>
													<?php } }?>
											</tbody>
										</table>
										</div>
										
										
										<div class="col-md-2">
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
		
<?php include_once "application/views/admin/master/footer.php";  ?>

<script>
$(document).ready(function() {  
	$('#group').hide();
	
		
	$("#add_form").click(function(){
		$('#group').show();
	});
	
	
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