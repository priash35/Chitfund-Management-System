<?php include_once "master/header.php"; ?> 
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
  //width: 400px;
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
  width: 230px;
  height: 200px;
  list-style-type: none;
  padding: 0;
  margin: 0;
  background: #FFF;
  padding: 30px;
  font-size: 13px;
  text-align:left;
 // box-shadow: 1px 1px 0 #DDD, 2px 2px 0 #BBB;
}

.legend li {
  width: 135px;
  height: 1.25em;
  margin-bottom: 0.7em;
  padding-left: 0.5em;
  border-left: 1.25em solid black;
}

.legend em {
  font-style: normal;
  
}

.legend span {
	margin-left:10px;
  float: right;
}
</style> 
<div id="wrapper">
            <div class="content-page">

                <!-- Top Bar Start -->
                <div class="topbar">
					
                    <nav class="navbar-custom">

                        <ul class="list-unstyled topbar-right-menu float-right mb-0">
							<li>
								<ul class="list-unstyled nav-second" aria-expanded="false">
										<li><a href="#">Cheque Clearing</a></li>
										<li><a href="#">Cheque between accounts</a></li>
										<li><a href="#">Adjustments</a></li> 
								</ul>
							</li>
                            <!--<li class="hide-phone app-search">
                                <form>
                                    <input type="text" placeholder="Search..." class="form-control">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </li>

                            <!--<li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="fi-bell noti-icon"></i>
                                    <span class="badge badge-danger badge-pill noti-icon-badge">4</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                                   
                                    <div class="dropdown-item noti-title">
                                        <h5 class="m-0"><span class="float-right"><a href="" class="text-dark"><small>Clear All</small></a> </span>Notification</h5>
                                    </div>

                                    <div class="slimscroll" style="max-height: 230px;">
                                        
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-success"><i class="mdi mdi-comment-account-outline"></i></div>
                                            <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">1 min ago</small></p>
                                        </a>

                                        
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info"><i class="mdi mdi-account-plus"></i></div>
                                            <p class="notify-details">New user registered.<small class="text-muted">5 hours ago</small></p>
                                        </a>

                                        
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-danger"><i class="mdi mdi-heart"></i></div>
                                            <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">3 days ago</small></p>
                                        </a>

                                        
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-warning"><i class="mdi mdi-comment-account-outline"></i></div>
                                            <p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">4 days ago</small></p>
                                        </a>

                                       
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-purple"><i class="mdi mdi-account-plus"></i></div>
                                            <p class="notify-details">New user registered.<small class="text-muted">7 days ago</small></p>
                                        </a>

                                        
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-custom"><i class="mdi mdi-heart"></i></div>
                                            <p class="notify-details">Carlos Crouch liked <b>Admin</b><small class="text-muted">13 days ago</small></p>
                                        </a>
                                    </div>

                                    
                                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                        View all <i class="fi-arrow-right"></i>
                                    </a>

                                </div>
                            </li>-->

                             <!--<li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <i class="fi-speech-bubble noti-icon"></i>
                                    <span class="badge badge-custom badge-pill noti-icon-badge">6</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-lg">

                                    
                                    <div class="dropdown-item noti-title">
                                        <h5 class="m-0"><span class="float-right"><a href="" class="text-dark"><small>Clear All</small></a> </span>Chat</h5>
                                    </div>

                                    <div class="slimscroll" style="max-height: 230px;">
                                        
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon"><img src="assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                            <p class="notify-details">Cristina Pride</p>
                                            <p class="text-muted font-13 mb-0 user-msg">Hi, How are you? What about our next meeting</p>
                                        </a>

                                        
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon"><img src="assets/images/users/avatar-3.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                            <p class="notify-details">Sam Garret</p>
                                            <p class="text-muted font-13 mb-0 user-msg">Yeah everything is fine</p>
                                        </a>

                                        
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon"><img src="assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                            <p class="notify-details">Karen Robinson</p>
                                            <p class="text-muted font-13 mb-0 user-msg">Wow that's great</p>
                                        </a>

                                        
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon"><img src="assets/images/users/avatar-5.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                            <p class="notify-details">Sherry Marshall</p>
                                            <p class="text-muted font-13 mb-0 user-msg">Hi, How are you? What about our next meeting</p>
                                        </a>

                                        
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon"><img src="assets/images/users/avatar-6.jpg" class="img-fluid rounded-circle" alt="" /> </div>
                                            <p class="notify-details">Shawn Millard</p>
                                            <p class="text-muted font-13 mb-0 user-msg">Yeah everything is fine</p>
                                        </a>
                                    </div>

                                    
                                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                        View all <i class="fi-arrow-right"></i>
                                    </a>

                                </div>
                            </li>-->

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle"> <span class="ml-1">Maxine K <i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fi-head"></i> <span>My Account</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fi-cog"></i> <span>Settings</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fi-help"></i> <span>Support</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fi-lock"></i> <span>Lock Screen</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="fi-power"></i> <span>Logout</span>
                                    </a>

                                </div>
                            </li>

                        </ul>

                        <ul class="list-inline menu-left mb-0">
                            <li class="float-left">
                                <button class="button-menu-mobile open-left disable-btn">
                                    <i class="dripicons-menu"></i>
                                </button>
                            </li>
                            <li>
                                <div class="page-title-box">
                                    <h4 class="page-title">Daily Collection</h4>
                                    <ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="#">Collection Entry</a></li>
                                        <li class="breadcrumb-item active">Daily Collection</li>
                                    </ol>
                                </div>
                            </li>

                        </ul>

                    </nav>

                </div>
                <!-- Top Bar End -->
			<div class="content">
                <div class="container-fluid">	
					<div class="row">
					
					<div class="col-md-12">
                        <div class="card-box">
							<h3 class="header-title m-t-0 text-center">Collection Chart</h3>
								<div class="col-lg-12 row">									
									<main>									  
									  <section>
										
										<div class="pieID pie">
										  
										</div>
									  	
										<ul class="pieID legend">
										  <li>
											<em>Daily </em>
											<span>9868</span>
										  </li>
										  <li>
											<em>Weekly </em>
											<span>2018</span>
										  </li>
										  <li>
											<em>Monthly </em>
											<span>5530</span>
										  </li>
										  
										</ul>
										
									  </section>									  
									</main>
									
									
									<!--<div id="morris-donut-example" style="height: 350px;" class="mt-4"></div>
									<!--<div class="my-progress-bar"></div>
									<div class="my-progress-bar1"></div>-->
							</div>   
							
                        </div> <!-- card block end --> 
						
                    </div> <!-- end col -->
					
                    <div class="col-md-12">
                        <div class="card-box">
							<h3 class="header-title m-t-0 m-b-30 text-center">Daily Collection Entry</h3><br>
							<div class="col-md-12">								
													<!--<h4 class="m-t-0 m-b-30 header-title">Daily Data Entry</h4>-->
													<form  role="form">
														<div class="form-group row">
															<label class="col-3 col-form-label">Executive Name</label>
															<div class="col-8">
																<select class="form-control">
																	<option>Select Executive</option>
																	<option>A</option>
																	<option>B</option>
																	<option>C</option>
																	<option>D</option>
																	
																</select>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Group Name</label>
															<div class="col-8">
																<select class="form-control">
																	<option>Select Group</option>
																	<option>A</option>
																	<option>B</option>
																	<option>C</option>
																	<option>D</option>
																</select>
															</div>
														</div>														
														<!--<div class="form-group row">
															<label class="col-3 col-form-label">Customer Name</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Ticket Number</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Auction Numbers</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Balance Numbers</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Current outstanding</label>
															<div class="col-8">
																<input class="form-control" type="text" name="date">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Amount collected</label>
															<div class="col-8">
																<input class="form-control" type="text" name="date">
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Payment Mode</label>
															<div class="col-8">
																<select class="form-control">
																	<option>Select Payment Mode</option>
																	<option>Cash</option>
																	<option>Cheque</option>
																	<option>Transfer</option>
																	<option>DD</option>
																	<option>Adjustment</option>
																	<option>Cash + Cheque</option>
																	<option>Cash + Adjustment</option>
																	<option>Mobile Pay</option>
																</select>
															</div>
														</div>														
														<div class="form-group row">
															<label class="col-3 col-form-label">Cheque Details</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Bank name</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Branch name</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Cheque number</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Amount</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Payment for:</label>
															
															<div class="col-9 row">
																<label class="col-3 col-form-label">Group name</label>
																<div class="col-8">
																	<input type="text" class="form-control" value="" >
																</div>
																<br><br>
																<label class="col-3 col-form-label">Amount</label>
																<div class="col-8">
																	<input type="text" class="form-control" value="" >
																</div>
																<br><br>
																<label class="col-3 col-form-label">New Balance</label>
																<div class="col-8">
																	<input type="text" class="form-control" value="" >
																</div>
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Uncleared Amount</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Cleared amount</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>-->
														<br>
														<div class="table-rep-plugin">
															<div class="table-responsive" data-pattern="priority-columns">
																<table id="tech-companies-1" class="table  table-striped">
																	<thead>
																	<tr>
																		<th>Customer Name</th>
																		<th data-priority="1">Current Outstanding</th>
																		<th data-priority="3">Payment Mode</th>
																		<th data-priority="1">Amount</th>
																		<th data-priority="3">Cleared</th>
																		<th data-priority="3">Uncleared</th>
																		<th data-priority="6"></th>
																	</tr>
																	</thead>
																	<tbody>
																	<tr>
																		<th>GOOG <span class="co-name">Google Inc.</span></th>
																		<td>597.74</td>
																		<td><select class="form-control">
																			<option>Select Payment Mode</option>
																			<option>Cash</option>
																			<option >Cheque</option>
																			<option>Transfer</option>
																			<option>DD</option>
																			<option>Adjustment</option>
																		</select></td>
																		<td><input type="text" class="form-control" value="" ></td>
																		<td><input type="text" class="form-control" value="" ></td>
																		<td><input type="text" class="form-control" value="" ></td>
																		<td><button type="button" class="btn btn-maroon waves-effect waves-light" data-toggle="modal" data-target="#signup-modal">Cheque</button></td>
																	</tr>
																	<tr>
																		<th>AAPL <span class="co-name">Apple Inc.</span></th>
																		<td>378.94</td>
																		<td><select class="form-control">
																			<option>Select Payment Mode</option>
																			<option>Cash</option>
																			<option>Cheque</option>
																			<option>Transfer</option>
																			<option>DD</option>
																			<option>Adjustment</option>
																		</select></td>
																		<td><input type="text" class="form-control" value="" ></td>
																		<td><input type="text" class="form-control" value="" ></td>
																		<td><input type="text" class="form-control" value="" ></td>
																		<td><button type="button" class="btn btn-maroon waves-effect waves-light" data-toggle="modal" data-target="#signup-modal">Cheque</button></td>
																	</tr>
																	<tr>
																		<th>AMZN <span class="co-name">Amazon.com Inc.</span></th>
																		<td>191.55</td>
																		<td><select class="form-control">
																			<option>Select Payment Mode</option>
																			<option>Cash</option>
																			<option>Cheque</option>
																			<option>Transfer</option>
																			<option>DD</option>
																			<option>Adjustment</option>
																		</select></td>
																		<td><input type="text" class="form-control" value="" ></td>
																		<td><input type="text" class="form-control" value="" ></td>
																		<td><input type="text" class="form-control" value="" ></td>
																		<td><button type="button" class="btn btn-maroon waves-effect waves-light" data-toggle="modal" data-target="#signup-modal">Cheque</button></td>
																	</tr>
																	<tr>
																		<th>ORCL <span class="co-name">Oracle Corporation</span></th>
																		<td>31.15</td>
																		<td><select class="form-control">
																			<option>Select Payment Mode</option>
																			<option>Cash</option>
																			<option>Cheque</option>
																			<option>Transfer</option>
																			<option>DD</option>
																			<option>Adjustment</option>
																		</select></td>
																		<td><input type="text" class="form-control" value="" ></td>
																		<td><input type="text" class="form-control" value="" ></td>
																		<td><input type="text" class="form-control" value="" ></td>
																		<td><button type="button" class="btn btn-maroon waves-effect waves-light" data-toggle="modal" data-target="#signup-modal">Cheque</button></td>
																	</tr>
																	<tr>
																		<th>MSFT <span class="co-name">Microsoft Corporation</span></th>
																		<td>25.50</td>
																		<td><select class="form-control">
																			<option>Select Payment Mode</option>
																			<option>Cash</option>
																			<option>Cheque</option>
																			<option>Transfer</option>
																			<option>DD</option>
																			<option>Adjustment</option>
																		</select></td>
																		<td><input type="text" class="form-control" value="" ></td>
																		<td><input type="text" class="form-control" value="" ></td>
																		<td><input type="text" class="form-control" value="" ></td>
																		<td><button type="button" class="btn btn-maroon waves-effect waves-light" data-toggle="modal" data-target="#signup-modal">Cheque</button></td>
																	</tr>
																	<tr>
																		<th>CSCO <span class="co-name">Cisco Systems, Inc.</span></th>
																		<td>18.65</td>
																		<td><select class="form-control">
																			<option>Select Payment Mode</option>
																			<option>Cash</option>
																			<option>Cheque</option>
																			<option>Transfer</option>
																			<option>DD</option>
																			<option>Adjustment</option>
																		</select></td>
																		<td><input type="text" class="form-control" value="" ></td>
																		<td><input type="text" class="form-control" value="" ></td>
																		<td><input type="text" class="form-control" value="" ></td>
																		<td><button type="button" class="btn btn-maroon waves-effect waves-light" data-toggle="modal" data-target="#signup-modal">Cheque</button></td>
																	</tr>
																	<tr>
																		<th>YHOO <span class="co-name">Yahoo! Inc.</span></th>
																		<td>15.81</td>
																		<td><select class="form-control">
																			<option>Select Payment Mode</option>
																			<option>Cash</option>
																			<option>Cheque</option>
																			<option>Transfer</option>
																			<option>DD</option>
																			<option>Adjustment</option>
																		</select></td>
																		<td><input type="text" class="form-control" value="" ></td>
																		<td><input type="text" class="form-control" value="" ></td>
																		<td><input type="text" class="form-control" value="" ></td>
																		<td><button type="button" class="btn btn-maroon waves-effect waves-light" data-toggle="modal" data-target="#signup-modal">Cheque</button></td>
																	</tr>	
																	
																	</tbody>
																</table>
															</div>

														</div>
													</form>												
										
										<div class="col-md-12 text-center">									
											<form class="form-horizontal" role="form">
												<button type="submit" class="btn btn-maroon btn-lg">Save</button>
												<button type="submit" class="btn btn-maroon btn-lg">Submit</button>
											</form>
										</div>
							</div>
                            <!-- Signup modal content -->
                            <div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-body">
                                            <h2 class="text-uppercase text-center m-b-30">
                                                <a href="index.html" class="text-success">
                                                    <span><img src="assets/images/logo.png" alt="" height="28"></span>
                                                </a>
                                            </h2>


                                            <form class="form-horizontal" action="#">

                                                <div class="form-group row">
															<label class="col-3 col-form-label">Bank name</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Branch name</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<div class="form-group row">
															<label class="col-3 col-form-label">Cheque number</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>
														<!--<div class="form-group row">
															<label class="col-3 col-form-label">Amount</label>
															<div class="col-8">
																<input type="text" class="form-control" value="" >
															</div>
														</div>-->
														<div class="form-group row">
															<label class="col-3 col-form-label">Payment for:</label>
															
															<div class="col-9 row">
																<label class="col-3 col-form-label">Group name</label>
																<div class="col-8">
																	<input type="text" class="form-control" value="" >
																</div>
																<br><br>
																<label class="col-3 col-form-label">Amount</label>
																<div class="col-8">
																	<input type="text" class="form-control" value="" >
																</div>
																<br><br>
																<!--<label class="col-3 col-form-label">New Balance</label>
																<div class="col-8">
																	<input type="text" class="form-control" value="" >
																</div>-->
															</div>
														</div>

                                                <div class="form-group account-btn text-center m-t-10">
                                                    <div class="col-12">
                                                        <button class="btn w-lg btn-rounded btn-primary waves-effect waves-light" type="submit">Save</button>								
                                                    </div>
                                                </div>

                                            </form>


                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div> <!-- card block end --> 
                    </div> <!-- end col -->
					
					
					
                </div>
                        <!-- end row -->
			</div>
		</div>
	</div>
</div>


				
<?php include_once "master/footer.php";  ?>

<script>
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