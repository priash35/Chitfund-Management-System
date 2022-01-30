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
							<h3 class="header-title m-t-0 m-b-30 text-center">Cheque Clearing</h3>
                            <?php if($this->session->flashdata('msg')){ ?>
                            <div class="alert alert-info">
                                <?php echo $this->session->flashdata('msg'); ?>
                            </div>
                            <?php }?>
							<!--<div class="col-md-12 text-right">
								<form class="form-horizontal" role="form">
									<button type="submit" class="btn btn-gold btn-lg"><a style="color:#ffffff;" href="<?php echo base_url();?>Group/add_Customer">Add New Group</a></button>
									 <button type="submit" class="btn btn-primary btn-lg">Add New Customer</button> 
								</form>												
							</div>-->
                            <!-- <h4 class="m-t-0 header-title">Filtering</h4> -->
                            <!-- <p class="text-muted m-b-30 font-13">
                                include filtering in your FooTable.
                            </p> -->

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
                            <div>
							
                            <table id="datatable-buttons" class="table table-striped table-responsive">
                                <thead>
                                <tr>
                                    <th>Bank Name</th>
									<th>Branch Name</th>
									<th >Cheque/DD Number </th>
									<th >Amount </th>
                                    <th >Type</th>
									<!--<th >Cheque Date</th>
									<th >Deposite Date</th>
									<th >Clear Date</th>-->
                                    <th >Status</th>
									<th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
								
								<?php foreach($banks as $post){?>
								
                                <tr>
                                    <td><input id="bank_name" name="bank_name" type="text" class="form-control" value="<?php echo $post->bank_name;?>" readonly><input id="bank_id" name="bank_id[]" type="hidden" class="form-control" value="<?php echo $post->id;?>" ></td>
									
                                    <td><input id="branch_name" name="branch_name" type="text" class="form-control" value="<?php echo $post->branch_name;?>" readonly></td>                                  
                                    <td><input id="chqdd_num" name="chqdd_num" type="text" class="form-control" value="<?php echo $post->chqdd_num;?>" readonly></td>
									
									<td><input id="chqdd_amount" name="chqdd_amount" type="text" class="form-control" value="<?php echo $post->chqdd_amount;?>" readonly></td>
									
									<td><input id="type" name="type" type="text" class="form-control" value="<?php echo $post->type;?>" readonly></td>
									
                                    <td><input id="c_status" name="c_status" type="text" class="form-control" value="<?php echo $post->status;?>" readonly></td>
									
                                    <!--<td><input id="deposit_date" name="deposit_date[]" type="date" class="form-control" value="" ></td>
									
                                    <td><input id="clear_date" name="clear_date[]" type="date" class="form-control" value="" ></td>
									
                                    <td><select id="c_status" name="c_status[]" class="form-control" onchange="check_status(this.value);"><option value="">Payment Status</option><option value="RECIEVED">RECIEVED</option><option value="DEPOSITED">DEPOSITED</option><option value="ENCASHED">ENCASHED</option><option value="BOUNCED">BOUNCED</option></select></td>-->
									
									<td><a href="<?php echo base_url("Collection/update_cheqdd/"); ?><?php echo $post->id ?>" "><span class="btn btn-sm btn-default fa fa-edit"></span></a></td>
									<!--<td><a href="#" onclick="edit_cheque(<?php echo $post->id; ?>)"><span class="btn btn-sm btn-default fa fa-edit"></span></a></td>-->
                                </tr>
                                <?php } ?>
                               
                                </tbody>
                                <tfoot>
                                <tr class="active">
                                    <td colspan="9">
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
				
				
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
		
<?php include_once "application/views/admin/master/footer.php"; ?>
 <script type="text/javascript">

function edit_cheque(bank_id)
{
	window.location.href= "<?php echo base_url("Collection/update_cheqdd"); ?>?bank_id="+bank_id;
	 /* $.ajax({
            type:'POST',
            url:'<?php echo base_url("Collection/update_cheqdd"); ?>',
            data:{'bank_id':bank_id},
            success:function(data){
                $('#resultdiv').html(data);
				alert(data);
            }
        }); */
} 



	
$(document).ready(function() {

	// Default Datatable
	$('#datatable').DataTable();

	//Buttons examples
	var table = $('#datatable-buttons').DataTable({
		lengthChange: false,
		buttons: ['excel', 'print']
	});

   // Key Tables

	/*$('#key-table').DataTable({
		keys: true
	});

	// Responsive Datatable
	$('#responsive-datatable').DataTable();

	// Multi Selection Datatable
	$('#selection-datatable').DataTable({
		select: {
			style: 'multi'
		}
	}); */

	table.buttons().container()
			.appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
});

        </script>