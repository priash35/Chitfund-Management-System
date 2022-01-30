
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
                                    <li class="breadcrumb-item active">Add Customer to Group</li>
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
                            <h3 class="header-title m-t-0 m-b-30">Add Customer to Group</h3>
                            <?php if($this->session->flashdata('msg')){ ?>
                            <div class="alert alert-info">
                            	<?php echo $this->session->flashdata('msg'); ?>
                            </div>
                            <?php }?>                         
                            
                           
                                
                                    <div class="col-md-12 row">	
                                    <div class="col-md-12 text-right">
											<button id="add_form" class="btn btn-gold btn-lg"><a style="color:#ffffff;">Add Customer</a></button>														
										</div>
																		
									
										<div style="overflow-x:auto;">
											<section id="group">
											<div>
												<div class="card-box">
												
													<!-- <h4 class="m-t-0 m-b-30 header-title">Horizontal form</h4> -->
													<form name="myform" id="myform" action="<?php echo base_url()?>Group/add_custtogroup" method="post" enctype="multipart/form-data" class="span8 form-inline">
														 <input type="hidden" id="gid" name="gid"  class="form-control" value="<?php echo $id;?>" >
														 <table id="myTable" class=" table order-list">
														    <thead>
														        <tr>
														            <td>Customer</td>
														            <td>Number of Tickets</td>
														            <td>Commitment</td>
														            <td>Executive</td>
														            <td>Collection Exec</td>
														            <td>Agreement</td>
														            
														        </tr>
														    </thead>
														    <tbody>
														        <tr>
														        	<td class="col-sm-4">
														                <select class="form-control col-8" id="cust_id"  name="cust_id[]">
																		  	<option value="" selected disabled>Please select</option>
																		    <?php
																		    foreach($cust as $item){ ?>		
																		    <option value="<?php echo $item->id; ?>">
																		    <?php echo strtoupper($item->first_name.' '.$item->middle_name.' '.$item->last_name); ?></option>
																		    <?php  } ?>												    
																		</select>
														            </td>
														            <td class="col-sm-3">
														                <input type="text" name="ticket_num[]" class="form-control" />
														            </td>
														            <td class="col-sm-4">
														                <select class="form-control col-4" id="comm"  name="comm[]">
																		  	<option value="" selected disabled>Please select</option>																		    		
																		    <option value="YES">Y</option>
																		    <option value="NO">N</option>
																		    											    
																		</select>
														            </td>
														            <td class="col-sm-4">
														                <select class="form-control col-8" id="exec"  name="exec[]">
																		  	<option value="" selected disabled>Please select</option>
																		    <?php
																		    foreach($staff as $item){ ?>		
																		    <option value="<?php echo $item->id; ?>">
																		    <?php echo strtoupper($item->first_name.' '.$item->middle_name.' '.$item->last_name); ?></option>
																		    <?php  } ?>												    
																		</select>
														            </td>
														            <td class="col-sm-4">
														                <select class="form-control col-8" id="cexec"  name="cexec[]">
																		  	<option value="" selected disabled>Please select</option>
																		    <?php
																		    foreach($cstaff as $item){ ?>		
																		    <option value="<?php echo $item->id; ?>">
																		    <?php echo strtoupper($item->first_name.' '.$item->middle_name.' '.$item->last_name); ?></option>
																		    <?php  } ?>												    
																		</select>
														            </td>
														            <td class="col-sm-4">
														                <select class="form-control col-4" id="agreement"  name="agreement[]">
																		  	<option value="" selected disabled>Please select</option>																		    		
																		    <option value="YES">Y</option>
																		    <option value="NO">N</option>
																		    											    
																		</select>
														            </td>
														            
														            <td class="col-sm-2"><a class="deleteRow"></a>

														            </td>
														        </tr>
														    </tbody>
														    <tfoot>
														        <tr>
														            <td colspan="5" style="text-align: left;">
														                <input type="button" class="btn btn-lg btn-block " id="addrow" value="Add Row" />
														            </td>
														        </tr>
														        <tr>
														        </tr>
														    </tfoot>
														</table>									
														
												</div>
											
										
										<div class="col-md-2">
										</div>
										<div class="col-md-12 text-center">
											<button type="submit"  id="add_cust" name="add_cust" class="btn btn-maroon btn-lg">Submit</button>
										</div>
										</div>
										</section>
										</div>
										<div class="col-md-12">
										<h3 class="header-title m-t-0 m-b-30 text-center">Customer List in <?php print_r($groupname[0]['group_name']);?></h3> 									
										<br>

										<table id="datatable-buttons" class="table table-striped table-bordered toggle-circle m-b-0" data-page-size="7">
											<thead>
											<tr>
												<!--<th>Customer Name</th>-->
												<th data-toggle="true">Customer</th>
												<th>Number of Tickets</th>																							
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

													<td><?php echo $post->cust_name;?></td>
													<td><?php echo $post->ticket_num;?></td>
													
													<td><a  href="<?php echo base_url(); ?>Group/EditCustogroup/<?php echo $post->id;?>/<?php echo $post->cust_id;?>"><span class="btn btn-sm btn-default fa fa-edit"></span></a>
													<!--<a href="<?php //echo base_url(); ?>Admin/DeleteRole/<?php //echo $row->role_id;?>"><span class="btn btn-sm btn-default fa fa-trash"></span></a>-->
													<a  href="<?php echo base_url(); ?>Group/DeleteCustogroup/<?php echo $post->id; ?>"><span class="btn btn-sm btn-default fa fa-trash"></span></a></td>
												</tr>
													<?php }}?>
											</tbody>
										</table>
										</div>
										
										
										<div class="col-md-2">
										</div>

										</form>
										
									
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
	var counter = 1;

    $("#addrow").on("click", function () {
    	
        var newRow = $("<tr>");
        var cols = "";
        var availableTags = [
		      "ActionScript",
		      "AppleScript",
		      "Asp",
		      "BASIC",
		      "C",
		      "C++",
		      "Clojure",
		      "COBOL",
		      "ColdFusion",
		      "Erlang",
		      "Fortran",
		      "Groovy",
		      "Haskell",
		      "Java",
		      "JavaScript",
		      "Lisp",
		      "Perl",
		      "PHP",
		      "Python",
		      "Ruby",
		      "Scala",
		      "Scheme"
		    ];
		   
 
        cols += '<td><select class="form-control" data-live-search="true" name="cust_id[]"><option value="" selected disabled>Please select</option><?php foreach($cust as $item){ ?><option value="<?php echo $item->id; ?>"><?php echo strtoupper($item->first_name.' '.$item->middle_name.' '.$item->last_name); ?></option><?php  } ?></select></td>';				
        cols += '<td><input type="text" class="form-control" name="ticket_num[]"/></td>';
        cols += '<td><select class="form-control"  name="comm[]"><option value="" selected disabled>Please select</option><option value="Y">Y</option><option value="N">N</option></select></td>';        
        cols += '<td><select class="form-control"  name="exec[]"><option value="" selected disabled>Please select</option><?php foreach($staff as $item){ ?><option value="<?php echo $item->id; ?>"><?php echo strtoupper($item->first_name.' '.$item->middle_name.' '.$item->last_name); ?></option><?php  } ?></select></td>';
        cols += '<td><select class="form-control"  name="cexec[]"><option value="" selected disabled>Please select</option><?php foreach($cstaff as $item){ ?><option value="<?php echo $item->id; ?>"><?php echo strtoupper($item->first_name.' '.$item->middle_name.' '.$item->last_name); ?></option><?php  } ?></select></td>';       
        cols += '<td><select class="form-control"  name="agreement[]"><option value="" selected disabled>Please select</option><option value="Y">Y</option><option value="N">N</option></select></td>';        
        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Delete"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        
        counter++;
  
    });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();       
        counter -= 1
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
 
 
 