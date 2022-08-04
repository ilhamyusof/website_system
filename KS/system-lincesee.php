<?php
 session_start();
    include('system-header.php');
?>
 <?php
            // Connection database
            //include("connection.php");
            // Check, for session 'user_session'
            // include("session.php");
            include("session.php");

            // Set Default Time Zone for Asia/Kuala_Lumpur
            date_default_timezone_set("Asia/Kuala_Lumpur");

            // Check, if username session is NOT set then this page will jump to login page
            if (!isset($_SESSION['session']) && !isset($_SESSION['job'])) {
                header('Location: system-login.php');
                exit();
                session_destroy();
            }
            $user_id = $_SESSION["user_id"];
            $job = $_SESSION["job"];
            $roles = $_SESSION['roles'];
            $centers = $_SESSION['centers'];
            $now = date("Y-m-d");
        ?>

				<div class="app-content my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title" style="text-transform: uppercase;">e-profilling</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Module</a></li>
								<li class="breadcrumb-item active" aria-current="page">profilling</li>
							</ol>
						</div>

						<div class="text-wrap mt-6">
							<div class="example">
								<div class="btn-list text-right">
									<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal3">Add New Module</button>
								</div>
								
								<br>
								<?php
                             if(isset($_GET['message'])){
                                 $message = $_GET['message'];
                                 echo $message;
                             }
                            ?>
							</div>

						</div>
						
						<div class="row">
                            <div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title" style="text-transform: uppercase;">hq - management</h3>
									</div>
									<div class="card-body">
										<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
											<div class="panel panel-default active">
												<div class="panel-heading " role="tab" id="headingOne">
													<h4 class="panel-title">
														<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne" style="text-transform: uppercase;">
															branch selangor
														</a>
													</h4>
												</div>
												<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
													<div class="panel-body">
                                                        <div class="row">
                                                        	
															<div class="col-md-4 col-sm-4 col-xs-12">
																<div class="card card-primary text-center">
																	<div class="card-body">
																		<!-- servicehospitality.php -->
																		<a href="system-management-v6.php"><img class="img-responsive img-effect" src="images/branch/branch-bpb.png"></a>
																	</div>
																	<div class="card-footer">
																		<a><span class="label label-success float-left mb-0"></span></a>
																	</div>
																</div>
															</div>
															<div class="col-md-4 col-sm-4 col-xs-12">
																<div class="card card-primary text-center">
																	<div class="card-body">
																		<!-- servicehospitality.php -->
																		<a href="system-management-v7.php"><img class="img-responsive img-effect" src="images/branch/branch-ks.png"></a>
																	</div>
																	<div class="card-footer">
																		<a><span class="label label-success float-left mb-0"></span></a>
																	</div>
																</div>
															</div>
                                                        </div>
                                                    </div>
                                                 </div>
											</div>
										</div>
										<div class="panel panel-default mt-2">
											<div class="panel-heading" role="tab" id="headingTwo">
												<h4 class="panel-title">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="text-transform: uppercase;"> branch melaka
													</a>
												</h4>
											</div>
											<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
												<div class="panel-body">
													<div class="row">
															<div class="col-md-4 col-sm-4 col-xs-12">
																<div class="card card-primary text-center">
																	<div class="card-body">
																		<!-- servicehospitality.php -->
																		<a href="system-management-v8.php"><img class="img-responsive img-effect" src="images/branch/branch-krubong.png"></a>
																	</div>
																	<div class="card-footer">
																		<a><span class="label label-success float-left mb-0"></span></a>
																	</div>
																</div>
															</div>															
                                                        </div>
												</div>
											</div>
										</div>
										<!-- <div class="panel panel-default mt-2">
											<div class="panel-heading" role="tab" id="headingThree">
												<h4 class="panel-title">
													<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="text-transform: uppercase;">
														branch johor
													</a>
												</h4>
											</div>
											<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
												<div class="panel-body">
													<div class="row">
															<div class="col-md-4 col-sm-4 col-xs-12">
																<div class="card card-primary text-center">
																	<div class="card-body">
																		
																		<a><img class="img-responsive img-effect" src="images/branch/branch-jb.png"></a>
																	</div>
																	<div class="card-footer">
																		<a><span class="label label-success float-left mb-0"></span></a>
																	</div>
																</div>
															</div>															
                                                        </div>
												</div>
											</div>
										</div>	 -->									
									</div>
							</div>
						</div>
					</div>
				</div>
<?php 
include('system-footer.php');
?>