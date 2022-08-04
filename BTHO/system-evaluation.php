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
							<h4 class="page-title" style="text-transform: uppercase;">staff evaluation</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Management</a></li>
								<li class="breadcrumb-item active" aria-current="page">operation</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-sm-12 col-md-12">
								<div class="card">									
									<div class="card-header">
										<h3 class="card-title">List Module</h3>
									</div>
									<div class="card-body">
							<!-- Boxes de Acoes -->
								<?php 
	                                $statement = $conn->prepare("SELECT * FROM operation");
	                                $statement->execute();

	                               while($data = $statement->fetch(PDO::FETCH_ASSOC))
	                               {
	                               	extract($data);			                                        
	                            ?>
										<div class="list-group">
											<a href="system-user-operation-evaluation.php?id=<?= $operation_id; ?>" class="list-group-item list-group-item-action flex-column align-items-start disabled">
												<div class="d-flex w-100 justify-content-between">
													<h5 class="mb-1" style="color: #94171b;"><?php echo $subject; ?></h5>
													<!-- <small>3 days ago</small> -->
												</div>
												<p class="mb-1"><?php echo $objective; ?></p>
												<!-- <small>Donec id elit non mi porta.</small> -->
											</a>											
										</div>								
									<?php } ?>
									</div>
								</div>
							</div>
							<!-- /Boxes de Acoes -->
						</div>

					</div>
				</div>
			<?php }
            	else if($roles == "3"){
            ?>
            	<div class="app-content my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title" style="text-transform: uppercase;">staff evaluation</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Management</a></li>
								<li class="breadcrumb-item active" aria-current="page">Sale</li>
							</ol>
						</div>

						<div class="row">
							<div class="col-sm-12 col-md-12">
								<div class="card">									
									<div class="card-header">
										<h3 class="card-title">Evaluation Sale</h3>
									</div>
									<div class="card-body">
							<!-- Boxes de Acoes -->
								<?php 
	                                $statement = $conn->prepare("SELECT * FROM sale");
	                                $statement->execute();

	                               while($data = $statement->fetch(PDO::FETCH_ASSOC))
	                               {
	                               	extract($data);			                                        
	                            ?>
										<div class="list-group">
											<a href="system-user-operation-evaluation.php?id=<?= $sale_id; ?>" class="list-group-item list-group-item-action flex-column align-items-start disabled">
												<div class="d-flex w-100 justify-content-between">
													<h5 class="mb-1" style="color: #94171b;"><?php echo $subject; ?></h5>
													<!-- <small>3 days ago</small> -->
												</div>
												<p class="mb-1"><?php echo $objective; ?></p>
												<!-- <small>Donec id elit non mi porta.</small> -->
											</a>											
										</div>								
									<?php } ?>
									</div>
								</div>
							</div>
							<!-- /Boxes de Acoes -->
						</div>

					</div>
				</div>
			<?php }
            	else if($roles == "24"){
            ?>
            	<div class="app-content my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title" style="text-transform: uppercase;">staff evaluation</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Management</a></li>
								<li class="breadcrumb-item active" aria-current="page">Administration</li>
							</ol>
						</div>

						<div class="row">
							<div class="col-sm-12 col-md-12">
								<div class="card">									
									<div class="card-header">
										<h3 class="card-title">Evaluation</h3>
									</div>
									<div class="card-body">
							<!-- Boxes de Acoes -->
								<?php 
	                                $statement = $conn->prepare("SELECT * FROM administration");
	                                $statement->execute();

	                               while($data = $statement->fetch(PDO::FETCH_ASSOC))
	                               {
	                               	extract($data);			                                        
	                            ?>
										<div class="list-group">
											<a href="system-user-operation-evaluation.php?id=<?= $administration_id; ?>" class="list-group-item list-group-item-action flex-column align-items-start disabled">
												<div class="d-flex w-100 justify-content-between">
													<h5 class="mb-1" style="color: #94171b;"><?php echo $subject; ?></h5>
													<!-- <small>3 days ago</small> -->
												</div>
												<p class="mb-1"><?php echo $objective; ?></p>
												<!-- <small>Donec id elit non mi porta.</small> -->
											</a>											
										</div>								
									<?php } ?>
									</div>
								</div>
							</div>
							<!-- /Boxes de Acoes -->
						</div>

					</div>
				</div>
			<?php } else if($roles =="16"){ ?>
			    <div class="app-content my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title" style="text-transform: uppercase;">staff evaluation</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Management</a></li>
								<li class="breadcrumb-item active" aria-current="page">Customer Services</li>
							</ol>
						</div>

						<div class="row">
							<div class="col-sm-12 col-md-12">
								<div class="card">									
									<div class="card-header">
										<h3 class="card-title">Evaluation</h3>
									</div>
									<div class="card-body">
							<!-- Boxes de Acoes -->
								<?php 
	                                $statement = $conn->prepare("SELECT * FROM customerservices");
	                                $statement->execute();

	                               while($data = $statement->fetch(PDO::FETCH_ASSOC))
	                               {
	                               	extract($data);			                                        
	                            ?>
										<div class="list-group">
											<a href="system-user-operation-evaluation.php?id=<?= $customerservices_id; ?>" class="list-group-item list-group-item-action flex-column align-items-start disabled">
												<div class="d-flex w-100 justify-content-between">
													<h5 class="mb-1" style="color: #94171b;"><?php echo $subject; ?></h5>
													<!-- <small>3 days ago</small> -->
												</div>
												<p class="mb-1"><?php echo $objective; ?></p>
												<!-- <small>Donec id elit non mi porta.</small> -->
											</a>											
										</div>								
									<?php } ?>
									</div>
								</div>
							</div>
							<!-- /Boxes de Acoes -->
						</div>

					</div>
				</div>
			<?php } else if($roles =="9" || $roles =="15" || $roles =="21"){ ?>
			    <div class="app-content my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title" style="text-transform: uppercase;">branch evaluation</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Management</a></li>
								<li class="breadcrumb-item active" aria-current="page">Customer Services</li>
							</ol>
						</div>

						<div class="row">
							<div class="col-sm-12 col-md-12">
								<div class="card">									
									<div class="card-header">
										<h3 class="card-title">Evaluation</h3>
									</div>
									<div class="card-body">
							<!-- Boxes de Acoes -->
								<?php 
	                                $statement = $conn->prepare("SELECT * FROM customerservices");
	                                $statement->execute();

	                               while($data = $statement->fetch(PDO::FETCH_ASSOC))
	                               {
	                               	extract($data);			                                        
	                            ?>
										<div class="list-group">
											<a href="system-operation-evaluation.php?id=<?= $_SESSION['user_id'] ?>&customerservices_id=<?= $customerservices_id ?>&branch=<?= $_SESSION['centers'] ?>" class="list-group-item list-group-item-action flex-column align-items-start disabled">
												<div class="d-flex w-100 justify-content-between">
													<h5 class="mb-1" style="color: #94171b;"><?php echo $subject; ?></h5>
													<!-- <small>3 days ago</small> -->
												</div>
												<p class="mb-1"><?php echo $objective; ?></p>
												<!-- <small>Donec id elit non mi porta.</small> -->
											</a>											
										</div>								
									<?php } ?>
									</div>
								</div>
							</div>
							<!-- /Boxes de Acoes -->
						</div>

					</div>
				</div>
            <?php } 
        		else {}
            ?>
<?php 
include('system-footer.php');
?>