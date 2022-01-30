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
                                    <li class="breadcrumb-item"><a href="#">Customer Master</a></li>
                                    <li class="breadcrumb-item active">Add New Customer</li>
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
                            <h3 class="header-title m-t-0 m-b-30">New Customer Details</h3>

                            <ul class="nav nav-pills navtab-bg nav-justified pull-in ">
                                <li class="nav-item">
                                    <a href="#home1" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                        <i class="fi-head mr-2"></i> Basic
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#profile1" data-toggle="tab" aria-expanded="false" class="nav-link ">
                                        <i class="fi-monitor mr-2"></i>Bank Details 
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#messages1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                        <i class="fi-mail mr-2"></i> Documents
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="#settings1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                        <i class="fi-cog mr-2"></i> Settings
                                    </a>
                                </li> -->
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="home1">
									<div class="col-md-12 row">
										<div class="col-md-6">
												<div class="card-box">
													<!-- <h4 class="m-t-0 m-b-30 header-title">Horizontal form</h4> -->
													<form class="form-horizontal" role="form">
														<div class="form-group row">
															<label class="col-3 col-form-label">Name Title</label>
															<div class="col-9">
																<input type="text" class="form-control" value="" placeholder="Mr/Mrs">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">First Name</label>
															<div class="col-9">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Middle Name</label>
															<div class="col-9">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Last Name</label>
															<div class="col-9">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Family</label>
															<div class="col-9">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Permanent Address</label>
															<div class="col-9">
																<textarea class="form-control" rows="5"></textarea>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Temporary Address</label>
															<div class="col-9">
																<textarea class="form-control" rows="5"></textarea>
															</div>
														</div>
																												
														<div class="form-group row">
															<label class="col-3 col-form-label">Contact</label>
															<div class="col-md-9">
																<input class="form-control" type="tel" name="tel" placeholder="Mobile Number 1"><br>
																<input class="form-control" type="tel" name="tel" placeholder="Mobile Number 2"><br>
																<input class="form-control" type="tel" name="tel" placeholder="Mobile Number 3"><br>
																<input class="form-control" type="tel" name="tel" placeholder="Mobile Number 4"><br>
																<input class="form-control" type="tel" name="tel" placeholder="Landline Number">
															</div>
														</div>
													</form>
												</div>
										</div>
										<div class="col-md-6">
												<div class="card-box">												
													<form class="form-horizontal" role="form">
														<div class="form-group row">
															<label class="col-3 col-form-label">DOB</label>
															<div class="col-9">
																<input class="form-control" type="date" name="date">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Gender</label>
															<div class="col-9">
																<div class="radio radio-info form-check-inline">
																	<input type="radio" id="inlineRadio1" value="option1" name="radioInline">
																	<label for="inlineRadio1"> Male </label>
																</div>
																<div class="radio form-check-inline">
																	<input type="radio" id="inlineRadio2" value="option2" name="radioInline">
																	<label for="inlineRadio2"> Female </label>
																</div>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Nominee</label>
															<div class="col-9">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Nominee Relation</label>
															<div class="col-9">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Reffered By</label>
															<div class="col-9">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Email</label>
															<div class="col-9">
																<input type="email" class="form-control" id="inputEmail3">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Alternate Email</label>
															<div class="col-9">
																<input type="email" class="form-control" id="inputEmail3" placeholder="(optional)">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Business Name</label>
															<div class="col-9">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Address</label>
															<div class="col-9">
																<textarea class="form-control" rows="5"></textarea>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Nature of Business</label>
															<div class="col-9">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Family Members</label>
															<div class="col-9">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Auction preference</label>
															<div class="col-9">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<!-- <div class="form-group row">
															<label for="inputPassword3" class="col-3 col-form-label">Password</label>
															<div class="col-9">
																<input type="password" class="form-control" id="inputPassword3" placeholder="Password">
															</div>
														</div>
														<div class="form-group row">
															<label for="inputPassword5" class="col-3 col-form-label">Re Password</label>
															<div class="col-9">
																<input type="password" class="form-control" id="inputPassword5" placeholder="Retype Password">
															</div>
														</div>														
														<div class="form-group row justify-content-end">
															<div class=" col-9">
																<div class="checkbox checkbox-primary">
																	<input id="checkbox2" type="checkbox">
																	<label for="checkbox2">
																		Check me out !
																	</label>
																</div>
															</div>
														</div> 
														<div class="form-group mb-0 justify-content-end row">
															<div class="col-9">
																<button type="submit" class="btn btn-info waves-effect waves-light">Sign in</button>
															</div>
														</div>-->
													</form>
												</div>
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
															<label class="col-4 col-form-label">Bank Name</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Branch</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Account number</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">IFSC code</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-4 col-form-label">Security Cheque</label>
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
										<br>
										<br>
										<br>
										<h3 class="header-title m-t-0 m-b-30 text-center">Already added Bank Delails</h3>										
										<br>
										<table id="datatable-buttons" class="table table-striped table-bordered toggle-circle m-b-0" data-page-size="7">
											<thead>
											<tr>
												<th data-toggle="true">Bank Name</th>
												<th>Branch</th>
												<th>Account number</th>
												<th>IFSC code</th>
												<th>Security Cheque</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>Isidra</td>
												<td>Boudreaux</td>
												<td>1234567890</td>
												<td>1234567890</td>
												<td>1234567890</td>												
											</tr>											
											<tr>
												<td>Maxine</td>
												<td>Woldt</td>
												<td>1234567890</td>
												<td>1234567890</td>
												<td>1234567890</td>												
											</tr>
											<tr>
												<td>Lorraine</td>
												<td>Mcgaughy</td>
												<td>1234567890</td>
												<td>1234567890</td>
												<td>1234567890</td>												
											</tr>
											<tr>
												<td>Lauri</td>
												<td>Hyland</td>
												<td>1234567890</td>
												<td>1234567890</td>
												<td>1234567890</td>												
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
                                <div class="tab-pane" id="messages1">
									<div class="col-md-12 row">
										<div class="col-md-3">
										</div>
										<div class="col-md-6">
											<div class="card-box">											
												<div class="demo-box">
													<form class="form-horizontal" role="form">		
														<div class="form-group col-12">
															<p class="mb-2 mt-4 font-weight-bold">ID Proof</p>
															<div class="bootstrap-filestyle input-group"><div name="filedrag" style="position: absolute; width: 100%; height: 38px; z-index: -1;"></div><input type="text" class="form-control" placeholder="" disabled="" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;"> <span class="group-span-filestyle input-group-btn" tabindex="0"><label for="filestyle-3" style="margin-bottom: 0;" class="btn btn-maroon "><span class="buttonText">Choose file</span></label></span></div>
														</div>
														<div class="form-group col-12">
															<p class="mb-2 mt-4 font-weight-bold">Residence proof</p>
															<div class="bootstrap-filestyle input-group"><div name="filedrag" style="position: absolute; width: 100%; height: 38px; z-index: -1;"></div><input type="text" class="form-control" placeholder="" disabled="" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;"> <span class="group-span-filestyle input-group-btn" tabindex="0"><label for="filestyle-3" style="margin-bottom: 0;" class="btn btn-maroon "><span class="buttonText">Choose file</span></label></span></div>
														</div>
														<div class="form-group col-12">
															<p class="mb-2 mt-4 font-weight-bold">Photo</p>
															<div class="bootstrap-filestyle input-group"><div name="filedrag" style="position: absolute; width: 100%; height: 38px; z-index: -1;"></div><input type="text" class="form-control" placeholder="" disabled="" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;"> <span class="group-span-filestyle input-group-btn" tabindex="0"><label for="filestyle-3" style="margin-bottom: 0;" class="btn btn-maroon "><span class="buttonText">Choose file</span></label></span></div>
														</div>
														<div class="form-group col-12">
															<p class="mb-2 mt-4 font-weight-bold">Income proof</p>
															<div class="bootstrap-filestyle input-group"><div name="filedrag" style="position: absolute; width: 100%; height: 38px; z-index: -1;"></div><input type="text" class="form-control" placeholder="" disabled="" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;"> <span class="group-span-filestyle input-group-btn" tabindex="0"><label for="filestyle-3" style="margin-bottom: 0;" class="btn btn-maroon "><span class="buttonText">Choose file</span></label></span></div>
														</div>	
														<div class="form-group col-12">
															<p class="mb-2 mt-4 font-weight-bold">Bank statement</p>
															<div class="bootstrap-filestyle input-group"><div name="filedrag" style="position: absolute; width: 100%; height: 38px; z-index: -1;"></div><input type="text" class="form-control" placeholder="" disabled="" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;"> <span class="group-span-filestyle input-group-btn" tabindex="0"><label for="filestyle-3" style="margin-bottom: 0;" class="btn btn-maroon "><span class="buttonText">Choose file</span></label></span></div>
														</div>
														<div class="form-group col-12">
															<p class="mb-2 mt-4 font-weight-bold">Visiting card</p>
															<div class="bootstrap-filestyle input-group"><div name="filedrag" style="position: absolute; width: 100%; height: 38px; z-index: -1;"></div><input type="text" class="form-control" placeholder="" disabled="" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;"> <span class="group-span-filestyle input-group-btn" tabindex="0"><label for="filestyle-3" style="margin-bottom: 0;" class="btn btn-maroon "><span class="buttonText">Choose file</span></label></span></div>
														</div>														
													</form>
												</div>
											</div>
										</div>
										<div class="col-md-3">
										</div>
										<div class="col-md-12 text-center">
											<form class="form-horizontal" role="form">
												<button type="submit" class="btn btn-maroon btn-lg">Submit</button>
											</form>
													
										</div>
										<br>
										<br>
										<br>
										<table id="datatable-buttons" class="table table-striped table-bordered toggle-circle m-b-0" data-page-size="7">
											<thead>
											<tr>
												<th data-toggle="true">ID Proof</th>
												<th>Residence proof</th>
												<th>Photo</th>
												<th>Income proof</th>
												<th>Bank statement</th>
												<th>Visiting card</th>
											</tr>
											</thead>
											<tbody>
											<tr>
												<td>ID1</td>
												<td>Residence</td>
												<td>Photo</td>
												<td>Income</td>
												<td>Bank</td>
												<td>Visiting</td>												
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
		
<?php include_once "master/footer.php";  ?>