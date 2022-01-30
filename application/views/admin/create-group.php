<?php include_once "master/header.php";  ?>

<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Main</a></li>
                                    <li class="breadcrumb-item"><a href="#">Manage Groups</a></li>
                                    <li class="breadcrumb-item active">Create Group</li>
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
                            <h4 class="header-title m-t-0 m-b-30 text-center">Create New Group</h4>

                            <ul class="nav nav-pills navtab-bg nav-justified pull-in ">
                                <li class="nav-item">
                                    <a href="#home1" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                        <i class="fi-head mr-2"></i> Basic Information
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#profile1" data-toggle="tab" aria-expanded="false" class="nav-link ">
                                        <i class="fi-monitor mr-2"></i>Advanced Information 
                                    </a>
                                </li>
                                
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="home1">
									 <div class="col-md-12 row">
										<div class="col-md-2">
										</div>
										<div class="col-md-8">
												<div class="card-box">
													<!-- <h4 class="m-t-0 m-b-30 header-title">Horizontal form</h4> -->
													<form class="form-horizontal" role="form">								
														<div class="form-group row">
															<label class="col-4 col-form-label">Group type</label>
															<div class="col-8">
																<select class="form-control">
																	<option>Select Group Type</option>
																	<option>Daily</option>
																	<option>Weekly</option>
																	<option>Monthly</option>
																	
																</select>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Period</label>
															<div class="col-8">
																<select class="form-control">
																	<option>Select Period</option>
																	<option>300 Days</option>
																	<option>400 Days</option>
																	<option>500 Days</option>
																</select>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Group Commencement date </label>
															<div class="col-8">
																<input type="date" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Group Termination date</label>
															<div class="col-8">
																<input type="date" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Chit Amount</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>	
																													
													</form>
												</div>
										</div>
										<div class="col-md-2">
										</div>
										<div class="col-md-12 text-center">
																					
													<form class="form-horizontal" role="form">
														<button type="submit" class="btn btn-maroon btn-lg">Submit</button>
													</form>
												
										</div>
									</div>
                                </div>
                                <div class="tab-pane" id="profile1">
                                    <div class="col-md-12 row">
										<div class="col-md-2">
										</div>
										<div class="col-md-8">
												<div class="card-box">
													<!-- <h4 class="m-t-0 m-b-30 header-title">Horizontal form</h4> -->
													<form class="form-horizontal" role="form">								
														<div class="form-group row">
															<label class="col-4 col-form-label">Group Bye law date</label>
															<div class="col-8">
																<input type="date" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Group registration date</label>
															<div class="col-8">
																<input type="date" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Group registration number</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Group fixed deposit date</label>
															<div class="col-8">
																<input type="date" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Group fixed deposit number</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Group fixed deposit maturity date</label>
															<div class="col-8">
																<input type="date" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Bank name</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Branch name</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Account number selection wise</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
													</form>
												</div>
										</div>
										<div class="col-md-2">
										</div>
										<div class="col-md-12 text-center">
																					
													<form class="form-horizontal" role="form">
														<button type="submit" class="btn btn-maroon btn-lg">Submit</button>
													</form>
												
										</div>
									</div>
                                </div>                                                         
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->



            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->
		
<?php include_once "master/footer.php";  ?>