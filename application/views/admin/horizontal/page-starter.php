<?php include_once "master/header.php"; ?>

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
                                    <li class="breadcrumb-item active">Customer Master</li>
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
							<h3 class="header-title m-t-0 m-b-30 text-center">Customer Details</h3>
							<div class="col-md-12 text-right">
								<form class="form-horizontal" role="form">
									<button type="submit" class="btn btn-gold btn-lg"><a style="color:#ffffff;" href="customer-master.php">Add New Customer</a></button>
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
                            <table id="datatable-buttons" class="table table-striped table-bordered toggle-circle m-b-0" data-page-size="7">
                                <thead>
                                <tr>
                                    <th data-toggle="true">First Name</th>
                                    <th>Last Name</th>
                                    <th >Email Id</th>
                                    <th >DOB</th>
									<th >Business Name</th>
                                    <th >Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Isidra</td>
                                    <td>Boudreaux</td>
                                    <td>abcd@mail.com</td>
                                    <td>22 Jun 1972</td>
									<td>XYZ</td>
                                    <td><span class="badge label-table badge-success">Edit</span>                <span class="badge label-table badge-danger">Delete</span></td>
                                </tr>
                                
                                <tr>
                                    <td>Maxine</td>
                                    <td>Woldt</td>
                                     <td>abcd@mail.com</td>
                                    <td>22 Jun 1972</td>
									<td>XYZ</td>
                                    <td><span class="badge label-table badge-success">Edit</span>                <span class="badge label-table badge-danger">Delete</span></td>
                                </tr>
                                <tr>
                                    <td>Lorraine</td>
                                    <td>Mcgaughy</td>
                                     <td>abcd@mail.com</td>
                                    <td>22 Jun 1972</td>
									<td>XYZ</td>
                                    <td><span class="badge label-table badge-success">Edit</span>                <span class="badge label-table badge-danger">Delete</span></td>
                                </tr>
                                <tr>
                                    <td>Lizzee</td>
                                    <td>Goodlow</td>
                                     <td>abcd@mail.com</td>
                                    <td>22 Jun 1972</td>
									<td>XYZ</td>
                                    <td><span class="badge label-table badge-success">Edit</span>                <span class="badge label-table badge-danger">Delete</span></td>
                                </tr>
                               
                                <tr>
                                    <td>Judi</td>
                                    <td>Badgett</td>
                                    <td>abcd@mail.com</td>
                                    <td>22 Jun 1972</td>
									<td>XYZ</td>
                                    <td><span class="badge label-table badge-success">Edit</span>                <span class="badge label-table badge-danger">Delete</span></td>
                                </tr>
                                <tr>
                                    <td>Lauri</td>
                                    <td>Hyland</td>
                                     <td>abcd@mail.com</td>
                                    <td>22 Jun 1972</td>
									<td>XYZ</td>
                                    <td><span class="badge label-table badge-success">Edit</span>                <span class="badge label-table badge-danger">Delete</span></td>
                                </tr>
                                <tr>
                                    <td>Isidra</td>
                                    <td>Boudreaux</td>
                                     <td>abcd@mail.com</td>
                                    <td>22 Jun 1972</td>
									<td>XYZ</td>
                                    <td><span class="badge label-table badge-success">Edit</span>                <span class="badge label-table badge-danger">Delete</span></td>
                                </tr>
                                <tr>
                                    <td>Shona</td>
                                    <td>Woldt</td>
                                     <td>abcd@mail.com</td>
                                    <td>22 Jun 1972</td>
									<td>XYZ</td>
                                    <td><span class="badge label-table badge-success">Edit</span>                <span class="badge label-table badge-danger">Delete</span></td>
                                </tr>
                                <tr>
                                    <td>Granville</td>
                                    <td>Leonardo</td>
                                     <td>abcd@mail.com</td>
                                    <td>22 Jun 1972</td>
									<td>XYZ</td>
                                    <td><span class="badge label-table badge-success">Edit</span>                <span class="badge label-table badge-danger">Delete</span></td>
                                </tr>
                                <tr>
                                    <td>Easer</td>
                                    <td>Dragoo</td>
                                     <td>abcd@mail.com</td>
                                    <td>22 Jun 1972</td>
									<td>XYZ</td>
                                    <td><span class="badge label-table badge-success">Edit</span>                <span class="badge label-table badge-danger">Delete</span></td>
                                </tr>
                                <tr>
                                    <td>Maple</td>
                                    <td>Halladay</td>
                                     <td>abcd@mail.com</td>
                                    <td>22 Jun 1972</td>
									<td>XYZ</td>
                                    <td><span class="badge label-table badge-success">Edit</span>                <span class="badge label-table badge-danger">Delete</span></td>
                                </tr>
                                <tr>
                                    <td>Maxine</td>
                                    <td>Woldt</td>
                                     <td>abcd@mail.com</td>
                                    <td>22 Jun 1972</td>
									<td>XYZ</td>
                                    <td><span class="badge label-table badge-success">Edit</span>                <span class="badge label-table badge-danger">Delete</span></td>
                                </tr>
                                <tr>
                                    <td>Lorraine</td>
                                    <td>Mcgaughy</td>
                                     <td>abcd@mail.com</td>
                                    <td>22 Jun 1972</td>
									<td>XYZ</td>
                                    <td><span class="badge label-table badge-success">Edit</span>                <span class="badge label-table badge-danger">Delete</span></td>
                                </tr>
                                <tr>
                                    <td>Lizzee</td>
                                    <td><a href="#">Goodlow</a></td>
                                     <td>abcd@mail.com</td>
                                    <td>22 Jun 1972</td>
									<td>XYZ</td>
                                    <td><span class="badge label-table badge-success">Edit</span>                <span class="badge label-table badge-danger">Delete</span></td>
                                </tr>
                                <tr>
                                    <td>Judi</td>
                                    <td>Badgett</td>
                                     <td>abcd@mail.com</td>
                                    <td>22 Jun 1972</td>
									<td>XYZ</td>
									<td><span class="badge label-table badge-success">Edit</span>                <span class="badge label-table badge-danger">Delete</span></td>
                                </tr>
                                <tr>
                                    <td>Lauri</td>
                                    <td>Hyland</td>
                                    <td>abcd@mail.com</td>
                                    <td>22 Jun 1972</td>
									<td>XYZ</td>
									<td><span class="badge label-table badge-success">Edit</span>                <span class="badge label-table badge-danger">Delete</span></td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr class="active">
                                    <td colspan="6">
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