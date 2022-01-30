<?php include_once "application/views/admin/master/header.php"; ?> 
<style>
@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
@keyframes bake-pie {
  from {
    transform: rotate(0deg) translate3d(0, 0, 0);
  }
}
body {
  font-family: "Open Sans", Arial;
  background: #EEE;
}

main {
  width: 400px;
  margin: 0px auto;
  text-align: center;
}

section {
  margin-top: 30px;
}

.pieID {
  display: inline-block;
  vertical-align: top;
}

.pie {
  height: 200px;
  width: 200px;
  position: relative;
  margin: 0 30px 30px 0;
}

.pie::before {
  content: "";
  display: block;
  position: absolute;
  z-index: 1;
  width: 100px;
  height: 100px;
  background: #EEE;
  border-radius: 50%;
  top: 50px;
  left: 50px;
}

.pie::after {
  content: "";
  display: block;
  width: 120px;
  height: 2px;
  background: rgba(0, 0, 0, 0.1);
  border-radius: 50%;
  box-shadow: 0 0 3px 4px rgba(0, 0, 0, 0.1);
  margin: 220px auto;
}

.slice {
  position: absolute;
  width: 200px;
  height: 200px;
  clip: rect(0px, 200px, 200px, 100px);
  animation: bake-pie 1s;
}

.slice span {
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  background-color: black;
  width: 200px;
  height: 200px;
  border-radius: 50%;
  clip: rect(0px, 200px, 200px, 100px);
}

.legend {
  list-style-type: none;
  padding: 0;
  margin: 0;
  background: #FFF;
  padding: 15px;
  font-size: 13px;
  box-shadow: 1px 1px 0 #DDD, 2px 2px 0 #BBB;
}

.legend li {
  width: 110px;
  height: 1.25em;
  margin-bottom: 0.7em;
  padding-left: 0.5em;
  border-left: 1.25em solid black;
}

.legend em {
  font-style: normal;
}

.legend span {
  float: right;
}
</style> 

<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Main</a></li>
                                    <li class="breadcrumb-item"><a href="#">Collection Entry</a></li>
                                    <li class="breadcrumb-item active">Daily Collection</li>
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
							
							<?php if($this->session->flashdata('msg1')){ ?>
								<div class="alert alert-danger">
									<?php echo $this->session->flashdata('msg1'); ?>
								</div>
							<?php }else if($this->session->flashdata('msg')){ ?>
								<div class="alert alert-success">
									<?php echo $this->session->flashdata('msg'); ?>
								</div>
							<?php }?>
							<div class="col-md-12">								
													<!--<h4 class="m-t-0 m-b-30 header-title">Daily Data Entry</h4>-->
											<form name="myform" id="myform" action="<?php echo base_url()?>/Collection/add_collection" method="post">
												<div class="col-md-12 row">	
													<div class="col-md-8">
														<h3 class="header-title m-t-0 m-b-30 text-center">Daily Collection Entry</h3><br>
														<div class="form-group row">
															<label class="col-3 col-form-label">Executive Name</label>
															<div class="col-8">
																<select id="executive" name="executive" class="form-control" required>
																	<option value="">Select Executive</option>
																	<?php foreach($cstaff as $row){ ?>
																	
																	<option value="<?php echo $row->id;?>"><?php echo $row->first_name." ".$row->last_name;?></option>
																	
																	<?php } ?>
																</select>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Group Name</label>
															<div class="col-8">
																<select id="group" name="group" class="form-control" required>
																	<option>Select Group</option>
																	<?php //foreach($groups as $row1){ ?>
																	
																	<!--<option value="<?php //echo $row1->id;?>"><?php //echo $row1->group_name;?></option>-->
																	
																	<?php //} ?>
																</select>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Collection Date</label>
															<div class="col-8">
																<input id="date" name="date" class="form-control" type="date" value="<?php echo date('Y-m-d');?>">
															</div>
															
														</div>	
														<div class="form-group account-btn text-center m-t-10">
                                                    		<div class="col-12">
																<button type="button" id="sel" name="sel" class="btn btn-maroon btn-lg">Select</button>
															</div>
														</div>
														
														<div class="form-group row">
															<label class="col-3 col-form-label">Payment Mode</label>
															<div class="col-8">
																<select id="payment" name="payment" class="form-control" required>
																	<option>Select Payment Mode</option>
																	<option value="Cash">Cash</option>
																	<option value="Others">Others</option>
																</select>
															</div>
														</div>	
													</div>
													
													<div class="col-md-4">
															<h3 class="header-title m-t-0 text-center">Collection Chart</h3>
																<div class="col-lg-12 row">									
																	<main>									  
																	  <section>
																		<div class="pieID pie">
																		  
																		</div>
																		<ul class="pieID legend">
																		  <li>
																			<em>Daily</em>
																			<span>2018</span>
																		  </li>
																		  <li>
																			<em>Weekly</em>
																			<span>5531</span>
																		  </li>
																		  <li>
																			<em>Monthly</em>
																			<span>9868</span>
																		  </li>
																		  
																		</ul>
																	  </section>									  
																	</main>
																</div>  
													</div>
													</div>
													
														<br>
														<div class="table-rep-plugin">
															<div class="table-responsive" data-pattern="priority-columns">
																<table id="tech-companies-1" class="table  table-striped">
																	<thead>
																	<tr>
																		<th>Customer Name</th>
																		<th data-priority="1">Current Outstanding</th>
																		<th data-priority="3" class="mode">Payment Mode</th>
																		<th data-priority="3">Collected Amount</th>
																		<th data-priority="3">Add Amount</th>
																		<th data-priority="3" class="mode">Cleared</th>
																		<th data-priority="3" class="mode">Uncleared</th>
																		<th data-priority="6" class="mode"></th>
																	</tr>
																	</thead>
																	<tbody>
																	<?php //foreach($cust as $value) {?>
																	
																	<?php //} ?>
																	</tbody>
																</table>
															</div>

														</div>
														<div id="add_fields">
															
														</div>
														
														<div class="col-md-12 text-center">	
															<button type="submit" id="save" name="save" class="btn btn-maroon btn-lg">Save</button>
															<button type="submit" id="add_collection" name="add_collection" class="btn btn-maroon btn-lg">Submit</button>
														</div>
														
												 </form>								
										
							</div>
                            <!-- Signup modal content -->
                            <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-body">
                                            <h3 class="text-uppercase text-center m-b-30">Amount Details</h3>
                                                <!--<a href="index.html" class="text-success">
                                                    <span><img src="assets/images/logo.png" alt="" height="28"></span>
                                                </a>
                                            </h2>-->


                                             <form id="bank_form" name="bank_form" class="form-horizontal"> <!--action="<?php //echo base_url()?>/Collection/add_group_amt" method="post"-->
													<input type="hidden" name="c_id" id="c_id" value="">
														<div class="form-group row">
															<label class="col-3 col-form-label">Bank name</label>
															<div class="col-8">
																<input id="bank_name" name="bank_name" type="text" class="form-control" value="" required>
																<p id="bank_error" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Branch name</label>
															<div class="col-8">
																<input id="branch_name" name="branch_name"  type="text" class="form-control" value="" required>
																<p id="bank_error1" style="color:red;"></p>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Cheque/DD/Transfer/Adjustment Number</label>
															<div class="col-8">
																<input id="cheque" name="cheque"  type="text" class="form-control" value="" onfocusout="check_values()" required>
																<p id="bank_error2" style="color:red;"></p>
															</div>
														</div>
														<!-- <div class="form-group row">
															<label class="col-3 col-form-label">Cheque/DD/Transfer/Adjustment Amount</label>
															<div class="col-8">
																<input id="c_amount" name="c_amount"  type="text" class="form-control" value="" >
															</div>
														</div> -->
														
														<div class="form-group row">
															<label class="col-3 col-form-label">Total Amount</label>
															<div class="col-8">
																<input id="t_amount" name="t_amount" type="text" class="form-control" value="" required>
															</div>
														</div>
														<div class="form-group row ">
															<label class="col-3 col-form-label">Payment for:</label>
															
															<div class="col-9 row">
																
																<label class="col-3 col-form-label">Group name</label>
																<div class="col-8 group_name">
																	<!--<input id="group_name" name="gr_amount[0][]"  type="text" class="form-control" value="" >-->
																	<!--<select id="group_name" name="group_name[][]" class="form-control group">
																		<option>Select Group</option>
																		
																	</select>-->
																</div>
																<br><br>
																
																<label class="col-3 col-form-label">Add Amount</label>
																<div class="col-8 group_amount">
																	<!--<input id="gr_amount" name="gr_amount[][]" type="text" class="form-control amount" value="" >-->
																</div>
																<br><br><br>
															</div>
															<div class="col-9 row field_wrapper">
															
															</div>
															<label class="col-3 col-form-label"></label>
															<div class="form-group col-9 row">
																<label class="col-3 col-form-label"></label>
																	<div class="col-8 more">
																		<a href="javascript:void(0);" class="add_button" name="add_field" title="Add field"><button type="button" class="btn btn-default btn-sm"> Add More Groups</button></a>
																	</div>
															</div>
														</div>
														
														
                                                <div class="form-group account-btn text-center m-t-10">
                                                    <div class="col-12">
                                                        <button id="add_bank" name="add_bank" class="btn w-lg btn-rounded btn-primary waves-effect waves-light" type="button">Save</button>	
														<button type="button" class="btn w-lg btn-rounded btn-danger waves-effect waves-light" data-dismiss="modal" aria-hidden="true">Close</button>
                                                    </div>
                                                </div>

                                            </form>


                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div> <!-- card block end --> 
                    </div> <!-- end col -->
					
					<!-- <div class="col-md-3">
                        <div class="card-box">
							<h3 class="header-title m-t-0 text-center">Collection Chart</h3>
								<div class="col-lg-12 row">									
									<main>									  
									  <section>
										<div class="pieID pie">
										  
										</div>
										<ul class="pieID legend">
										  <li>
											<em>Daily</em>
											<span>2018</span>
										  </li>
										  <li>
											<em>Weekly</em>
											<span>5531</span>
										  </li>
										  <li>
											<em>Monthly</em>
											<span>9868</span>
										  </li>
										  
										</ul>
									  </section>									  
									</main>
									
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
	$('.mode').hide();
	
	$("#executive").change(function(){ 
		var exec = $(this).val();
		//alert(exec);
		
		$.ajax({
			type: 'post', 
			url: '<?php echo base_url("Collection/get_groups");?>',
			data: {exec:exec},
			success: function(data)
			{	
				//alert(data);
				$('#group').html(data);
			}
		});
	});
	
	$("#sel").click(function(){ 
		var group_id = $('#group').val();
		var exec_id = $("#executive").val();
		var datex = new Date($("#date").val());
		var d = datex.getDate();
		var m =  datex.getMonth();
		m += 1;  // JavaScript months are 0-11
		var y = datex.getFullYear();
		 if(m < 10)
        m = '0' + m.toString();
		if(d < 10)
        d = '0' + d.toString();
		var phpdate = y+"-"+m+"-"+d;	
		
		$.ajax({
			type: 'post', 
			url: '<?php echo base_url("Collection/get_cust");?>',
			data: {group_id:group_id,exec_id:exec_id,date:phpdate},
			success: function(data)
			{	
				//alert(data);
				
				$('tbody').html(data);
				$('tbody .mode').hide();
				
				/* var $response = $(data);
				//Query the jQuery object for the values
				var oneval = $response.filter('#new_row').html();
				var subval = $response.filter('#cust_id').val();
				
				$('tbody').html(data);
				$('#c_id').val(subval); */
			}
		});
	});
	
	
	$("#payment").change(function(){ 
		var p_mode = $(this).val();
		//alert(p_mode);
		if(p_mode=="Cash")
		{
			$('.mode').hide();
		}
		else
		{
			$('.mode').show();
		}
	});
	$(document).on("click", ".cheque", function(event){    
		
		document.getElementById("bank_form").reset();
		var pmode = $("#p_mode").val();
		var amnt = $('#amount').val();
		//alert(pmode);
		//alert(amnt);
			$('#group_name').remove();
			$('#gr_amount').remove();
			$('.field_wrapper').html('');
					
			var gid= $('#group').val();
			//var id= $('#cust_id').val();
			var id = $(this).attr('id');
			var payment_mode = $('#p_mode').val();
			var amt= $('#amount').val();
			//alert(id);
			$('#c_id').val(id);
			$(".add_button").attr("id", id);
			var gr_amt = '<input id="gr_amount" name="gr_amount['+id+'][]" type="text" class="form-control amount" value="" >';
			$('.group_amount').append(gr_amt); 
			
			$.ajax({
				type: 'post', 
				url: '<?php echo base_url("Collection/get_cust_group");?>',
				data: {id:id},
				success: function(data)
				{	
					//alert(data);
					
					var mydata = JSON.parse(data);
					
					var gr_name = '<select id="group_name" name="group_name['+id+'][]" class="form-control group"></select>';
					$('.group_name').append(gr_name);
					
					 for(i=0; i< mydata.length; i++)
					{
						var g_id =  mydata[i].id;
						var group = mydata[i].group_name;
						
						var res= '';
						if (g_id == gid){
							res ='<option value="'+g_id+'" selected>'+group+'</option>';
						}else{
							res ='<option value="'+g_id+'">'+group+'</option>';
						}
						$('#group_name').append(res);	
					} 
				}
				
			});//ajax request end
		
	});	//click function end
	
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
    $('#date').attr('max', maxDate);
}); 


/* $(document).on("focusout","#amount",function(){
    
	//var id = $(this).attr('title');
	var id = $('.cheque').attr('id');
	var pmode = $("#p_mode").val();
	var amnt = $('#amount').val();
       /*  if(amnt != '' && pmode != '') {
		   $($(this).attr('title')).removeAttr("disabled");
        } 
	alert(id);
  }); */
 $(document).on("focusout","#amount",function(){
	
		
		var pmode = $(this).closest("tr")   // Finds the closest row <tr> 
                       .find("#p_mode").val();
		var amnt = $(this).closest("tr")   // Finds the closest row <tr> 
                       .find("#amount").val();	

        if(amnt != '' && pmode != '') {	
		    $(this).closest("tr").find(".cheque").removeAttr("disabled");
        }
		//});
	}); 
 }); 

 


/* $(document).ready(function() {
     //$('.cheque').prop('disabled', true);
	 //$('.cheque').attr("disabled","disabled");
	 var pmode = $("#p_mode").val();
	 var amnt = $('#amount').val();
    // $('#amount').keyup(function() {
        if(amnt != '' && pmode != '') {
           //$('.cheque').prop('disabled', false);
		   $(".cheque").removeAttr("disabled");
        }
     //});
 }); */
 
$(document).ready(function(){
		var maxField = 20; //Input fields increment limitation
		var addButton = $('.add_button'); //Add button selector
		var wrapper = $('.field_wrapper'); 
		
		//alert(res);
		var x = 1;
		
		$(addButton).click(function(){ //Once add button is clicked
		
			//var id = $('#c_id').val();// cus id
			var id = $(this).attr('id');
			$.ajax({
					type: 'post', 
					url: '<?php echo base_url("Collection/get_cust_group");?>',
					data: {id:id},
					success: function(data)
					{	
						var mydata = JSON.parse(data);
						var res= '';
					
					 for(i=0; i< mydata.length; i++)
					{
						var g_id =  mydata[i].id;
						var group = mydata[i].group_name;
						res +='<option value="'+g_id+'">'+group+'</option>';
					}
						
						if(x < maxField){ //Check maximum number of input fields
						
						var fieldHTML = '<label class="col-3 col-form-label">Group name</label><div class="col-8"><select id="group_name" name="group_name['+id+'][]" class="form-control group"><option>Select Group</option>'+res+'</select></div><br><br><label class="col-3 col-form-label">Amount</label><div class="col-8"><input id="gr_amount" name="gr_amount['+id+'][]" type="text" class="form-control amount" value="" ></div><a href="javascript:void(0);" class="remove_button" title="Remove field"><i class="fa fa-trash" aria-hidden="true"></i></a><br><br><br>'; //New input field html 
						
							x++; //Increment field counter
							$(wrapper).append(fieldHTML); // Add field html
						} 
						
						$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
							e.preventDefault();
							$(this).parent('div').remove(); //Remove field html
							x--; //Decrement field counter
						});
					 
					 
					
					}
				});
		});
		
	});
	
	$("#add_bank").click(function(){
		
		
		var b_name = $('#bank_name').val();
		var br_name = $('#branch_name').val();
		var a_num = $('#cheque').val();
		var t_date = $('#date').val();
		var t_amount = $('#t_amount').val();
		var id = $('#c_id').val();
		
		/* $('#add_fields').append('<input type="text" name="b_name['+id+']" id="b_name" value="'+b_name+'">');
		$('#add_fields').append('<input type="text" name="br_name['+id+']" id="br_name" value="'+br_name+'">');
		$('#add_fields').append('<input type="text" name="cheq['+id+']" id="cheq" value="'+a_num+'">');
		$('#add_fields').append('<input type="text" name="t_date['+id+']" id="t_date" value="'+t_date+'">'); */
		 
		 
		 var elem = document.getElementsByName("group_name["+id+"][]");
		// alert(elem);
		 var amount = document.getElementsByName("gr_amount["+id+"][]");
		 var total = 0;
		 for (index = 0, len = elem.length; index < len; ++index) 
		 {
			 //amounts += amount[index].value;
			 total = total +  parseInt(amount[index].value);
			//$('#new_amount').val(elem[index].value+' '+amount[index].value);	
			//var result = elem[index].value+','+amount[index].value;
			
			//$('#add_fields').append('<input type="text" name="new_amount['+id+']['+index+']" id="new_amount" value="'+result+'">');		       

		 }
		 if(t_amount != total)
		 {
			//document.getElementById("bank_form").reset();
			alert("The amount you have enterd for groups doesn't match with your total amount. Please check and re-enter the values!!!");
						
		 }
		 else
		 {
			 $('#add_fields').append('<input type="text" name="b_name['+id+']" id="b_name" value="'+b_name+'">');
			$('#add_fields').append('<input type="text" name="br_name['+id+']" id="br_name" value="'+br_name+'">');
			$('#add_fields').append('<input type="text" name="cheq['+id+']" id="cheq" value="'+a_num+'">');
			$('#add_fields').append('<input type="text" name="t_date['+id+']" id="t_date" value="'+t_date+'">');
			
			for (index = 0, len = elem.length; index < len; ++index) 
			 {
				 //amounts += amount[index].value;
				 //total = total +  parseInt(amount[index].value);
				//$('#new_amount').val(elem[index].value+' '+amount[index].value);	
				var result = elem[index].value+','+amount[index].value;
				
				$('#add_fields').append('<input type="text" name="new_amount['+id+']['+index+']" id="new_amount" value="'+result+'">');		       

			 }
			document.getElementById("bank_form").reset();
		 }
		 
		//document.getElementById("bank_form").reset();
				
		/* $('#bank_name').val("");
		$('#branch_name').val("");
		$('#cheque').val("");
		$('#group_name').val("");
		$('#gr_amount').val(""); */
		
	});

function check_values()
{
	var bank = $('#bank_name').val();
	var cheq = $('#cheque').val();
		
	$.ajax({
		type: 'post', 
		url: '<?php echo base_url("Collection/check_names");?>',
		data: {bank:bank,cheq:cheq},
		success: function(data)
		{	if(data == 1)
			{
				 
					swal({
						title: 'Already exist',
						text: "This bank name is already exist. Please enter another name.",
						type: 'warning',
						showCancelButton: true,
						confirmButtonClass: 'btn btn-confirm mt-2',
						cancelButtonClass: 'btn btn-cancel ml-2 mt-2',
						confirmButtonText: 'Okay!'
					}) /*.then(function () {
                swal({
                    title: 'Deleted !',
                    text: "Your file has been deleted",
                    type: 'success',
                    confirmButtonClass: 'btn btn-confirm mt-2'
                }
                ) 
				 
					}, function (dismiss) {
					// dismiss can be 'cancel', 'overlay',
					// 'close', and 'timer'
						if (dismiss === 'cancel') {
							/* swal({
								title: 'Cancelled',
								text: "Your imaginary file is safe :)",
								type: 'error',
								confirmButtonClass: 'btn btn-confirm mt-2'
							}
							)
							 location.reload();
						}
					})*/
			}
			
		
		}/* ,
		error: function (jqXHR, textStatus, errorThrown)
		{
			alert('Error get data from ajax');
		} */
	});
}
</script>

<script>
// validations
$(document).ready(function() {
	$("#add_bank").click(function() {
            $("#bank_form").find("#bank_error").html('');
			$("#bank_form").find("#bank_error1").html('');
			$("#bank_form").find("#bank_error2").html('');
			$("#bank_form").find("#bank_error3").html('');
			
			
            if (!isNaN($('#bank_name').val())){
                 
                 $("#bank_form").find("#bank_error").html('Required. Only alphabets are allowed');
                 $('#bank_name').focus();
                 return false;
            }
            if (!isNaN($('#branch_name').val())){
                 
                 $("#bank_form").find("#bank_error1").html('Required. Only alphabets are allowed');
                 $('#branch_name').focus();
                 return false;
            }			
            
            if (isNaN($('#cheque').val())){
                 
                 $("#bank_form").find("#bank_error2").html('Only digits are allowed');
                 $('#cheque').focus();
                 return false;
            }
			
			
         });
});
</script>

<script>
// donut chart
function sliceSize(dataNum, dataTotal) {
  return (dataNum / dataTotal) * 360;
}
function addSlice(sliceSize, pieElement, offset, sliceID, color) {
  $(pieElement).append("<div class='slice "+sliceID+"'><span></span></div>");
  var offset = offset - 1;
  var sizeRotation = -179 + sliceSize;
  $("."+sliceID).css({
    "transform": "rotate("+offset+"deg) translate3d(0,0,0)"
  });
  $("."+sliceID+" span").css({
    "transform"       : "rotate("+sizeRotation+"deg) translate3d(0,0,0)",
    "background-color": color
  });
}
function iterateSlices(sliceSize, pieElement, offset, dataCount, sliceCount, color) {
  var sliceID = "s"+dataCount+"-"+sliceCount;
  var maxSize = 179;
  if(sliceSize<=maxSize) {
    addSlice(sliceSize, pieElement, offset, sliceID, color);
  } else {
    addSlice(maxSize, pieElement, offset, sliceID, color);
    iterateSlices(sliceSize-maxSize, pieElement, offset+maxSize, dataCount, sliceCount+1, color);
  }
}
function createPie(dataElement, pieElement) {
  var listData = [];
  $(dataElement+" span").each(function() {
    listData.push(Number($(this).html()));
  });
  var listTotal = 0;
  for(var i=0; i<listData.length; i++) {
    listTotal += listData[i];
  }
  var offset = 0;
  var color = [
    "cornflowerblue", 
    "olivedrab", 
    "orange", 
    "tomato", 
    "crimson", 
    "purple", 
    "turquoise", 
    "forestgreen", 
    "navy", 
    "gray"
  ];
  for(var i=0; i<listData.length; i++) {
    var size = sliceSize(listData[i], listTotal);
    iterateSlices(size, pieElement, offset, i, 0, color[i]);
    $(dataElement+" li:nth-child("+(i+1)+")").css("border-color", color[i]);
    offset += size;
  }
}

createPie(".pieID.legend", ".pieID.pie");


</script>

