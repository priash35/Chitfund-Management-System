<?php include_once "master/header.php"; ?>

<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>/Admin/index">Main</a></li>
                                    <!--<li class="breadcrumb-item"><a href="#">Extra Pages</a></li>-->
                                    <li class="breadcrumb-item active">Staff Master</li>
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
							<h3 class="header-title m-t-0 m-b-30 text-center">Staff Details</h3>
							<div class="col-md-12 text-right">
								<form class="form-horizontal" role="form">
									<button type="submit" class="btn btn-gold btn-lg"><a style="color:#ffffff;" href="<?php echo base_url();?>Admin/add_staff_data">Add New Staff</a></button>
									<!-- <button type="submit" class="btn btn-primary btn-lg">Add New Customer</button> -->
								</form>												
							</div>
                           
                            <table id="datatable-buttons" class="table table-striped table-bordered toggle-circle m-b-0" data-page-size="7">
                                <thead>
                                <tr>
                                    <th data-toggle="true">First Name</th>
                                    <th>Last Name</th>
                                    <th>Designation</th>
									<th>Mobile</th>
									<th>Landline</th>
									<th>Joining Date</th>
									<th>Role</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php foreach($records as $post){?>
                                <tr>
                                    <td><?php echo $post->first_name;?></td>
                                    <td><?php echo $post->last_name;?></td>
                                    <td><?php echo $post->designation;?></td>
									<td><?php echo $post->mobile_1;?></td>
									<td><?php echo $post->landline;?></td>
                                    <td><?php echo $post->joining_date;?></td>
									<td><?php echo $post->role;?></td>
                                    <td><a  href="<?php echo base_url(); ?>Admin/EditStaff/<?php echo $post->id;?>"><span class="btn btn-sm btn-default fa fa-edit"></span></a>
									<a  href="#" onclick="delete_ins(<?php echo $post->id; ?>)"><span class="btn btn-sm btn-default fa fa-trash"></span></a></td>
                                </tr>
                                <?php } ?>
                               
                                </tbody>
                                <tfoot>
                                <tr class="active">
                                    <td colspan="8">
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
				
				
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
		
<?php include_once "master/footer.php"; ?>
 <script type="text/javascript">
 
			function delete_ins(ins_id)
			{
			
				if(ins_id!="")
				{
					var conf= confirm("Are you sure you want to delete?");
					
					if(conf)
					{
						window.location.href= "<?php echo site_url('Admin/DeleteStaff');?>?id="+ins_id;;
						
					}
				}
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
            } );

</script>