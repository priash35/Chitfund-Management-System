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
									<!--<li class="breadcrumb-item"><a href="#">Master</a></li>-->
                                    <li class="breadcrumb-item active">Roles</li>
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
							<h3 class="header-title m-t-0 m-b-30 text-center">Roles</h3>
							<!-- Signup modal content -->
                            
							<div class="col-md-12 text-right">
								<form class="form-horizontal" role="form">
									
									<!--<button type="button" class="btn btn-gold btn-lg waves-effect waves-light" data-toggle="modal" data-target="#signup-modal">Add New Role</button>-->									 
									 <a href="<?php echo base_url();?>Admin/add_role"><button id="submit" name="submit" type="button" class="btn btn-gold btn-lg">Add New Role</button></a>
								</form>												
							</div>
							<br>
                            <!-- <h4 class="m-t-0 header-title">Filtering</h4> -->
                            <!-- <p class="text-muted m-b-30 font-13">
                                include filtering in your FooTable.
                            </p> -->
							
                            <table id="datatable-buttons" class="table table-striped table-bordered table-responsive" data-page-size="7">
                                <thead>
                                <tr>
                                    <th data-toggle="true">Role Id</th>
                                    <th>Role</th>
                                    <th>Accessible Pages</th>                                    
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php foreach ($records as $row) { ?>
                                <tr>
                                    <td><?php echo $row->role_id; ?></td>
                                    <td><?php echo $row->role; ?></td>
                                    <td><?php echo $row->page; ?></td>                                   
                                    <td><a  href="<?php echo base_url(); ?>Admin/EditRole/<?php echo $row->role_id;?>"><span class="btn btn-sm btn-default fa fa-edit"></span></a>
									<!--<a href="<?php //echo base_url(); ?>Admin/DeleteRole/<?php echo $row->role_id;?>"><span class="btn btn-sm btn-default fa fa-trash"></span></a>-->
									<a  href="#" onclick="delete_ins(<?php echo $row->role_id; ?>)"><span class="btn btn-sm btn-default fa fa-trash"></span></a>									
                                </tr>     
								<?php } ?>
                            </table>						
							
                        </div>
                    </div>
                </div>		
				
				
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
	
<?php include_once "master/footer.php"; ?>

<script>

	function delete_ins(ins_id)
		{
		
			if(ins_id!="")
			{
				var conf= confirm("Are you sure you want to delete?");
				
				if(conf)
				{
					window.location.href= "<?php echo site_url('Admin/DeleteRole');?>?role_id="+ins_id;;
					
				}
			}
		}
   /* function delete_ins(id) {
	   
	   swal({
          title: "Are you sure?", 
          text: "Are you sure that you want to cancel this order?", 
          type: "warning",
          showCancelButton: true,
          closeOnConfirm: false,
          confirmButtonText: "Yes, cancel it!",
          confirmButtonColor: "#ec6c62"
        }, 
		function(isconfirm) {
			if(isconfirm){
				swal({
                    title: 'Deleted !',
                    text: "Your file has been deleted",
                    type: 'success',
                    confirmButtonClass: 'btn btn-confirm mt-2'
                });
				$.ajax({
						
						url: '<?php echo base_url("Admin/DeleteRole");?>',
						type: "POST",
						data: {id:id},
						success: function(data){
							alert(data);
						},
						error: function(jqXHR, textStatus, errorThrown)
						{
							alert('Error Deletin data');
						}
						
				});
						
			}
			else
			{
				swal({
                        title: 'Cancelled',
                        text: "Your imaginary file is safe :)",
                        type: 'error',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    }
                    );
			}
		});
   } */
	
</script>