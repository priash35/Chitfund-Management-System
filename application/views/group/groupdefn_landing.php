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
                                    <li class="breadcrumb-item active">Maintain Group</li>
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
							<h3 class="header-title m-t-0 m-b-30 text-center">Maintain Group</h3>
                            <?php if($this->session->flashdata('msg')){ ?>
                            <div class="alert alert-info">
                                <?php echo $this->session->flashdata('msg'); ?>
                            </div>
                            <?php }?>
							<div class="col-md-12 text-right">
								<form class="form-horizontal" role="form">
									<button type="submit" class="btn btn-gold btn-lg"><a style="color:#ffffff;" href="<?php echo base_url();?>Group/add_Group">Add New Group</a></button>
									<!-- <button type="submit" class="btn btn-primary btn-lg">Add New Customer</button> -->
								</form>												
							</div>
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
                            <div style="overflow-x:auto;">
                            <table id="datatable-buttons" class="table table-striped table-bordered toggle-circle m-b-0" data-page-size="7">
                                <thead>
                                <tr>
                                    <th>Group Type</th>
                                    <th data-toggle="true">Group Name</th>
                                    <th >Group Duration</th>
									<th >Commencement Date</th>
									<th >Termination Date</th>
                                    <th >Chit Amount</th>
									<th >Bye Law Date</th>
                                    <th >Registration Date</th>
                                    <th >Registration Number</th>
                                    <th >Fixed Deposit Date</th>
                                    <th >Fixed Deposit Number</th>
                                    <th >Fixed Deposit Maturity Date</th>
                                    <!-- <th >Fixed Deposit Bank Name</th>
                                    <th >Fixed Deposit Branch Name</th>
                                    <th >Fixed Deposit Account Number</th> -->
                                    <th >Action</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php foreach($records as $post){?>
                                <tr>
                                    <td><?php echo $post->group_type;?></td>
                                    <td><?php echo $post->group_name;?></td>
                                    <td><?php echo $post->group_duration;?></td>
									<td><?php echo $post->comm_date;?></td>
									<td><?php echo $post->term_date;?></td>
                                    <td><?php echo $post->chit_amount;?></td>
									<td><?php echo $post->byelaw_date;?></td>
                                    <td><?php echo $post->reg_date;?></td>
                                    <td><?php echo $post->reg_number;?></td>
                                    <td><?php echo $post->fd_date;?></td>
                                    <td><?php echo $post->fd_number;?></td>
                                    <td><?php echo $post->fd_mat_date;?></td>
                                    <!-- <td><?php echo $post->bank_name;?></td>
                                    <td><?php echo $post->branch_name;?></td>
                                    <td><?php echo $post->account_number;?></td> -->
                                    <td><a  href="<?php echo base_url(); ?>Group/EditGroup/<?php echo $post->id;?>"><span class="btn btn-sm btn-default fa fa-edit"></span></a>
									<!--<a href="<?php //echo base_url(); ?>Admin/DeleteRole/<?php //echo $row->role_id;?>"><span class="btn btn-sm btn-default fa fa-trash"></span></a>-->
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
                </div>		
				
				
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
		
<?php include_once "application/views/admin/master/footer.php"; ?>
 <script type="text/javascript">
 
			function delete_ins(ins_id)
			{
			
				if(ins_id!="")
				{
					var conf= confirm("Are you sure you want to delete?");
					
					if(conf)
					{
						window.location.href= "<?php echo site_url('Group/DeleteGroup');?>?id="+ins_id;;
						
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