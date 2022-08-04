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
	<?php 
	  if($roles == "11")
	{
	?>
		<div class="app-content my-3 my-md-5">
			<div class="side-app">
				<div class="page-header">
					<h4 class="page-title">OPERATION MANAGEMENT</h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Module</a></li>
						<li class="breadcrumb-item active" aria-current="page">Operation</li>
					</ol>
				</div>

				<div class="text-wrap mt-6">
					<div class="example">
						<div class="btn-list text-right">
							<a href="system-add-operation.php" class="btn btn-info">Add New Operation</a>
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
				<div class="card">
					<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
					<div class="card-header">
						<h3 class="card-title"> All Record Operation</h3>
					</div>
					<div class="card-body">
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default active">
								<div class="panel-heading " role="tab" id="headingOne">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
											Evaluate New 
										</a>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
									<div class="panel-body">
                                        <div class="row">
                                        	<div class="table-responsive">
												<table id="example" class="table table-striped table-bordered" style="width:100%">
													<thead>
														<tr>
															<th class="wd-15p">Title Performace</th>
															<th class="wd-15p">Detail Performace</th>
															<th class="wd-5p">Action</th>
														</tr>
													</thead>
													<?php 
				                                        $statement = $conn->prepare("SELECT * FROM operation");
				                                        $statement->execute();

				                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
				                                       {
				                                       	extract($data);			                                        
				                                    ?>
													<tbody>
														<tr>
															<td>
																<a href="system-edit-operation.php?id=<?= $operation_id; ?>"><span style="font-weight: 8px; font-weight: bold;"><?php echo $subject; ?></span></a>
															</td>
															<td>
																<span>Objective:</span><br>
																<span><?php echo $objective; ?></span></td>
															<td style="text-align: center;">
																
																<a href="system-edit-operation.php?id=<?= $operation_id; ?>"><button type="button" class="btn btn-info btn-xs tip"><i class="fas fa-pencil-alt" ></i></button></a>

																<!-- <a href="system-user-operation-evaluation.php?id=<?= $operation_id; ?>"><button type="button" class="btn btn-warning btn-xs tip"><i class="fas fa-plus" ></i></button></a> -->

																<a href="system-delete-operation.php?id=<?= $operation_id; ?>"><button type="button" class="btn btn-danger btn-xs tip"><i class="fe fe-trash"></i></button></a>

															</td>
														</tr>
													 <?php
			                                          // $counter++;
			                                            }
			                                          ?>
													</tbody>
												</table>
											</div>
                                        </div>
                                    </div>
                                 </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }
    	else if($roles == "3"){
    ?>
    	<div class="app-content my-3 my-md-5">
			<div class="side-app">
				<div class="page-header">
					<h4 class="page-title" style="text-transform: uppercase;">sale management</h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Evaluation </a></li>
						<li class="breadcrumb-item active" aria-current="page">sale</li>
					</ol>
				</div>

				<div class="text-wrap mt-6">
					<div class="example">
						<div class="btn-list text-right">
							<a href="system-add-operation.php" class="btn btn-info">Add New sale</a>
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
				<div class="card">
					<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
					<div class="card-header">
						<h3 class="card-title"> All Record Sale</h3>
					</div>
					<div class="card-body">
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default active">
								<div class="panel-heading " role="tab" id="headingOne">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
											Sale New 
										</a>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
									<div class="panel-body">
                                        <div class="row">
                                        	<div class="table-responsive">
												<table id="example" class="table table-striped table-bordered" style="width:100%">
													<thead>
														<tr>
															<th class="wd-15p">Title Performace</th>
															<th class="wd-15p">Detail Performace</th>
															<th class="wd-5p">Action</th>
														</tr>
													</thead>
													<?php 
				                                        $statement = $conn->prepare("SELECT * FROM sale");
				                                        $statement->execute();

				                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
				                                       {
				                                       	extract($data);			                                        
				                                    ?>
													<tbody>
														<tr>
															<td>
																<a href="system-edit-operation.php?id=<?= $sale_id; ?>"><span style="font-weight: 8px; font-weight: bold;"><?php echo $subject; ?></span></a>
															</td>
															<td>
																<span>Objective:</span><br>
																<span><?php echo $objective; ?></span></td>
															<td style="text-align: center;">
																
																<a href="system-edit-operation.php?id=<?= $sale_id; ?>"><button type="button" class="btn btn-info btn-xs tip"><i class="fas fa-pencil-alt" ></i></button></a>

																<!-- <a href="system-user-operation-evaluation.php?id=<?= $operation_id; ?>"><button type="button" class="btn btn-warning btn-xs tip"><i class="fas fa-plus" ></i></button></a> -->

																<a href="system-delete-sale.php?id=<?= $sale_id; ?>"><button type="button" class="btn btn-danger btn-xs tip"><i class="fe fe-trash"></i></button></a>

															</td>
														</tr>
													 <?php
			                                          // $counter++;
			                                            }
			                                          ?>
													</tbody>
												</table>
											</div>
                                        </div>
                                    </div>
                                 </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    <?php }
    	else if($roles == "24"){
    ?>
    	<div class="app-content my-3 my-md-5">
			<div class="side-app">
				<div class="page-header">
					<h4 class="page-title" style="text-transform: uppercase;">administration management</h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Evaluation </a></li>
						<li class="breadcrumb-item active" aria-current="page">Administration</li>
					</ol>
				</div>

				<div class="text-wrap mt-6">
					<div class="example">
						<div class="btn-list text-right">
							<a href="system-add-operation.php" class="btn btn-info">Add New Administration</a>
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
				<div class="card">
					<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
					<div class="card-header">
						<h3 class="card-title"> All Record Administration</h3>
					</div>
					<div class="card-body">
						<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<div class="panel panel-default active">
								<div class="panel-heading " role="tab" id="headingOne">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
											Administration New 
										</a>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
									<div class="panel-body">
                                        <div class="row">
                                        	<div class="table-responsive">
												<table id="example" class="table table-striped table-bordered" style="width:100%">
													<thead>
														<tr>
															<th class="wd-15p">Title Performace</th>
															<th class="wd-15p">Detail Performace</th>
															<th class="wd-5p">Action</th>
														</tr>
													</thead>
													<?php 
				                                        $statement = $conn->prepare("SELECT * FROM administration");
				                                        $statement->execute();

				                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
				                                       {
				                                       	extract($data);			                                        
				                                    ?>
													<tbody>
														<tr>
															<td>
																<a href="system-edit-operation.php?id=<?= $administration_id; ?>"><span style="font-weight: 8px; font-weight: bold;"><?php echo $subject; ?></span></a>
															</td>
															<td>
																<span>Objective:</span><br>
																<span><?php echo $objective; ?></span></td>
															<td style="text-align: center;">
																
																<a href="system-edit-operation.php?id=<?= $administration_id; ?>"><button type="button" class="btn btn-info btn-xs tip"><i class="fas fa-pencil-alt" ></i></button></a>

																<!-- <a href="system-user-operation-evaluation.php?id=<?= $operation_id; ?>"><button type="button" class="btn btn-warning btn-xs tip"><i class="fas fa-plus" ></i></button></a> -->

																<a href="system-delete-admin.php?id=<?= $administration_id; ?>"><button type="button" class="btn btn-danger btn-xs tip"><i class="fe fe-trash"></i></button></a>

															</td>
														</tr>
													 <?php
			                                          // $counter++;
			                                            }
			                                          ?>
													</tbody>
												</table>
											</div>
                                        </div>
                                    </div>
                                 </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } else if ($roles == "16"){ ?>
		<div class="app-content my-3 my-md-5">
			<div class="side-app">
				<div class="page-header">
				<h4 class="page-title" style="text-transform: uppercase;">Customer Services Management</h4>
				<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Branch Evaluation</a></li>
				<li class="breadcrumb-item active" aria-current="page">Customer Services</li>
				</ol>
			</div>

			<div class="text-wrap mt-6">
			<div class="example">
			<br>
			<?php
			if(isset($_GET['message'])){
			$message = $_GET['message'];
			echo $message;
			}
			?>
			</div>

			</div>
			<div class="card">
			<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
			<div class="card-header">
				<h3 class="card-title"> Branch Evaluate</h3>
			</div>
			<div class="card-body">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default active">
					<div class="panel-heading " role="tab" id="headingOne">
						<h4 class="panel-title">
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
							evaluate branch
							</a>
						</h4>
					</div>
				<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
					<div class="panel-body">
						<div class="row">
							<div class="table-responsive">
								<table id="example" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th class="wd-15p">Detail Performace Branch</th>
											<th class="wd-5p">Result Performance</th>
											<th class="wd-5p">Grade Performance</th>
										</tr>
									</thead>
									<?php 
	                                $statement = $conn->prepare("SELECT * FROM customerservices");
	                                $statement->execute();

	                               while($data = $statement->fetch(PDO::FETCH_ASSOC))
	                               {
	                               	extract($data);			                                        
	                            ?>
									<tbody>
										<tr>
											<td>
												<a href="system-dashboard-evaluate.php?id=<?= $customerservices_id; ?>"><span style="font-weight: 8px; font-weight: bold;"><?php echo $subject; ?></span></a><br>
												<span style="font-weight: bold;">Objective:</span><br>
												<span><?php echo $objective; ?></span>
											</td>
											<td>
											</td>
											<td style="text-align: center;">
												
												<a href="system-dashboard-evaluate.php?id=<?= $customerservices_id; ?>"><button type="button" class="btn btn-info btn-xs tip"><i class="fas fa-pencil-alt" ></i></button></a>

												<!-- <a href="system-user-operation-evaluation.php?id=<?= $operation_id; ?>"><button type="button" class="btn btn-warning btn-xs tip"><i class="fas fa-plus" ></i></button></a> -->

												<a href="system-delete-sale.php?id=<?= $customerservices_id; ?>"><button type="button" class="btn btn-danger btn-xs tip"><i class="fe fe-trash"></i></button></a>

											</td>
										</tr>
								<?php
								// $counter++;
								}
								?>
									</tbody>
								</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
			</div>
			</div>
		</div>
	<?php } 
		else { }
    ?>
<?php 
include('system-footer.php');
?>