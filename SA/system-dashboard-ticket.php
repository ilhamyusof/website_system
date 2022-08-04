<?php
//Start session
    session_start();
    include('system-header.php');
    $job = $_SESSION["job"];
    $roles = $_SESSION["roles"];
    $centers = $_SESSION["centers"];
    $session = $_SESSION["session"];

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

            $job = $_SESSION["job"];
            $roles = $_SESSION['roles'];
            $centers = $_SESSION['centers'];
            $now = date("Y-m-d");
        ?>

				<div class="app-content my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Record Statics Ticket</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Ticket</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data Ticket</li>
							</ol>
						</div>
	
						<!--  loop every user -->
	                      <?php 
	                      if($roles == "1")
		                  {
		                  ?>
		                    <div class="row row-cards">
							<div class=" col-lg-12">
								<div class="row">
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'IT') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticket = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
												<h3 class="mb-1 text-primary counter font-30"><?php echo $totalticket; ?></h3>
												<div class="text-muted">Total ticket</div>
											</div>
											<?php
                                            }
                                             ?>
                                           
									</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'IT' AND status IN ('New','Pending')) AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketnew = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-red rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-red font-30"><span class="counter"><?php echo $totalticketnew; ?></span></h3>
												<div class="text-muted">Total Ticket New</div>
											</div>
												<?php
                                            }
                                             ?>
										</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                               <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'IT' AND status ='Close') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketclose = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-orange rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-orange font-30"><span class="counter"><?php echo $totalticketclose; ?></span></h3>
												<div class="text-muted">Total Ticket Close</div>
											</div>
                                             <?php
                                            }
                                             ?>

										</div>
									</div>
								</div>
							</div>
						</div>
		                  	<div class="row row-cards">
								<div class=" col-lg-12">
									<div class="row">
										<div class="col-sm-12 col-lg-12">
											<div class="card">
												<div class="card-body"> 
												<?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Urgent'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>    
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-danger">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'High' ");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-warning">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
												
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Medium' ");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                               
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-primary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Low' ");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-secondary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>

												</div>
												
											</div>
											</div>										
									</div>
								</div>
							</div>
		                    <?php 
		                    }else if ($roles == "2"){ ?>
                            <div class="row row-cards">
							<div class=" col-lg-12">
								<div class="row">
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'BD') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticket = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
												<h3 class="mb-1 text-primary counter font-30"><?php echo $totalticket; ?></h3>
												<div class="text-muted">Total ticket</div>
											</div>
											<?php
                                            }
                                             ?>
                                           
									</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'BD' AND status IN ('New','Pending')) AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketnew = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-red rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-red font-30"><span class="counter"><?php echo $totalticketnew; ?></span></h3>
												<div class="text-muted">Total Ticket New</div>
											</div>
												<?php
                                            }
                                             ?>
										</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                               <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'BD' AND status ='Close') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketclose = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-orange rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-orange font-30"><span class="counter"><?php echo $totalticketclose; ?></span></h3>
												<div class="text-muted">Total Ticket Close</div>
											</div>
                                             <?php
                                            }
                                             ?>

										</div>
									</div>
								</div>
							</div>
						</div>
		                    <div class="row row-cards">
								<div class=" col-lg-12">
									<div class="row">
										<div class="col-sm-12 col-lg-12">
											<div class="card">
												<div class="card-body"> 
												<?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Urgent'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>    
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-danger">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'High' ");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-warning">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
												
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Medium' ");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                               
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-primary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Low' ");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-secondary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>

												</div>
												
											</div>
											</div>										
									</div>
								</div>
							</div>
		                    <?php }
		                    else if($roles == "3"){ ?>
		                   	<div class="row row-cards">
							<div class=" col-lg-12">
								<div class="row">
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'Sale') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticket = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
												<h3 class="mb-1 text-primary counter font-30"><?php echo $totalticket; ?></h3>
												<div class="text-muted">Total ticket</div>
											</div>
											<?php
                                            }
                                             ?>
                                           
									</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'Sale' AND status IN ('New','Pending')) AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketnew = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-red rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-red font-30"><span class="counter"><?php echo $totalticketnew; ?></span></h3>
												<div class="text-muted">Total Ticket New</div>
											</div>
												<?php
                                            }
                                             ?>
										</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                               <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'Sale' AND status ='Close') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketclose = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-orange rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-orange font-30"><span class="counter"><?php echo $totalticketclose; ?></span></h3>
												<div class="text-muted">Total Ticket Close</div>
											</div>
                                             <?php
                                            }
                                             ?>

										</div>
									</div>
								</div>
							</div>
						</div>
		                   	<div class="row row-cards">
								<div class=" col-lg-12">
									<div class="row">
										<div class="col-sm-12 col-lg-12">
											<div class="card">
												<div class="card-body"> 
												<?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Urgent' AND department = 'Sale'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>    
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-danger">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'High' AND department = 'Sale'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-warning">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
												
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Medium' AND department = 'Sale'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                               
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-primary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Low' AND department = 'Sale'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-secondary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>

												</div>
												
											</div>
											</div>										
									</div>
								</div>
							</div>
                            <?php } else if ($roles == "28") { ?>
                            <div class="row row-cards">
							<div class=" col-lg-12">
								<div class="row">
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'Marketing') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticket = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
												<h3 class="mb-1 text-primary counter font-30"><?php echo $totalticket; ?></h3>
												<div class="text-muted">Total ticket</div>
											</div>
											<?php
                                            }
                                             ?>
                                           
									</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'Marketing' AND status IN ('New','Pending')) AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketnew = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-red rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-red font-30"><span class="counter"><?php echo $totalticketnew; ?></span></h3>
												<div class="text-muted">Total Ticket New</div>
											</div>
												<?php
                                            }
                                             ?>
										</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                               <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'Marketing' AND status ='Close') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketclose = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-orange rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-orange font-30"><span class="counter"><?php echo $totalticketclose; ?></span></h3>
												<div class="text-muted">Total Ticket Close</div>
											</div>
                                             <?php
                                            }
                                             ?>

										</div>
									</div>
								</div>
							</div>
						</div>
		                   	<div class="row row-cards">
								<div class=" col-lg-12">
									<div class="row">
										<div class="col-sm-12 col-lg-12">
											<div class="card">
												<div class="card-body"> 
												<?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Urgent' AND department = 'Marketing'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>    
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-danger">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'High' AND department = 'Marketing'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-warning">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
												
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Medium' AND department = 'Marketing'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                               
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-primary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Low' AND department = 'Marketing'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-secondary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>

												</div>
												
											</div>
											</div>										
									</div>
								</div>
							</div>
		                    <?php } else if ($roles == "4"){?>
		                    <div class="row row-cards">
							<div class=" col-lg-12">
								<div class="row">
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'HR') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticket = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
												<h3 class="mb-1 text-primary counter font-30"><?php echo $totalticket; ?></h3>
												<div class="text-muted">Total ticket</div>
											</div>
											<?php
                                            }
                                             ?>
                                           
									</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'HR' AND status IN ('New','Pending')) AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketnew = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-red rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-red font-30"><span class="counter"><?php echo $totalticketnew; ?></span></h3>
												<div class="text-muted">Total Ticket New</div>
											</div>
												<?php
                                            }
                                             ?>
										</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                               <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'HR' AND status ='Close') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketclose = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-orange rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-orange font-30"><span class="counter"><?php echo $totalticketclose; ?></span></h3>
												<div class="text-muted">Total Ticket Close</div>
											</div>
                                             <?php
                                            }
                                             ?>

										</div>
									</div>
								</div>
							</div>
					        </div>
		                    <div class="row row-cards">
								<div class=" col-lg-12">
									<div class="row">
										<div class="col-sm-12 col-lg-12">
											<div class="card">
												<div class="card-body"> 
												<?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Urgent' AND department = 'HR'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>    
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-danger">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'High' AND department = 'HR'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-warning">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
												
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Medium' AND department = 'HR'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                               
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-primary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Low' AND department = 'HR'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-secondary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>

												</div>
												
											</div>
											</div>										
									</div>
								</div>
							</div>
		                    <?php } else if($roles == "6"){?>
                            <div class="row row-cards">
							<div class=" col-lg-12">
								<div class="row">
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'Account') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticket = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
												<h3 class="mb-1 text-primary counter font-30"><?php echo $totalticket; ?></h3>
												<div class="text-muted">Total ticket</div>
											</div>
											<?php
                                            }
                                             ?>
                                           
									</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'Account' AND status IN ('New','Pending')) AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketnew = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-red rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-red font-30"><span class="counter"><?php echo $totalticketnew; ?></span></h3>
												<div class="text-muted">Total Ticket New</div>
											</div>
												<?php
                                            }
                                             ?>
										</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                               <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'Account' AND status ='Close') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketclose = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-orange rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-orange font-30"><span class="counter"><?php echo $totalticketclose; ?></span></h3>
												<div class="text-muted">Total Ticket Close</div>
											</div>
                                             <?php
                                            }
                                             ?>

										</div>
									</div>
								</div>
							</div>
						</div>
		                    <div class="row row-cards">
								<div class=" col-lg-12">
									<div class="row">
										<div class="col-sm-12 col-lg-12">
											<div class="card">
												<div class="card-body"> 
												<?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Urgent' AND department = 'Account'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>    
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-danger">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'High' AND department = 'Account'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-warning">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
												
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Medium' AND department = 'Account'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                               
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-primary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Low' AND department = 'Account'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-secondary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>

												</div>
												
											</div>
											</div>										
									</div>
								</div>
							</div>
		                    <?php } else if($roles == "11"){?>
                            <div class="row row-cards">
							<div class=" col-lg-12">
								<div class="row">
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'Operation') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticket = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
												<h3 class="mb-1 text-primary counter font-30"><?php echo $totalticket; ?></h3>
												<div class="text-muted">Total ticket</div>
											</div>
											<?php
                                            }
                                             ?>
                                           
									</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'Operation' AND status IN ('New','Pending')) AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketnew = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-red rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-red font-30"><span class="counter"><?php echo $totalticketnew; ?></span></h3>
												<div class="text-muted">Total Ticket New</div>
											</div>
												<?php
                                            }
                                             ?>
										</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                               <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'Operation' AND status ='Close') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketclose = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-orange rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-orange font-30"><span class="counter"><?php echo $totalticketclose; ?></span></h3>
												<div class="text-muted">Total Ticket Close</div>
											</div>
                                             <?php
                                            }
                                             ?>

										</div>
									</div>
								</div>
							</div>
						</div>
		                    <div class="row row-cards">
								<div class=" col-lg-12">
									<div class="row">
										<div class="col-sm-12 col-lg-12">
											<div class="card">
												<div class="card-body"> 
												<?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Urgent' AND department = 'Operation'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>    
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-danger">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'High' AND department = 'Operation'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-warning">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
												
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Medium' AND department = 'Operation'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                               
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-primary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Low' AND department = 'Operation'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-secondary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>

												</div>
												
											</div>
											</div>										
									</div>
								</div>
							</div>
		                    <?php } else if($roles == "16") { ?>
		                    <div class="row row-cards">
							<div class=" col-lg-12">
								<div class="row">
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'CS') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticket = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
												<h3 class="mb-1 text-primary counter font-30"><?php echo $totalticket; ?></h3>
												<div class="text-muted">Total ticket</div>
											</div>
											<?php
                                            }
                                             ?>
                                           
									</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'CS' AND status IN ('New','Pending')) AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketnew = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-red rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-red font-30"><span class="counter"><?php echo $totalticketnew; ?></span></h3>
												<div class="text-muted">Total Ticket New</div>
											</div>
												<?php
                                            }
                                             ?>
										</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                               <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'CS' AND status ='Close') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketclose = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-orange rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-orange font-30"><span class="counter"><?php echo $totalticketclose; ?></span></h3>
												<div class="text-muted">Total Ticket Close</div>
											</div>
                                             <?php
                                            }
                                             ?>

										</div>
									</div>
								</div>
							</div>
						</div>
		                    <div class="row row-cards">
								<div class=" col-lg-12">
									<div class="row">
										<div class="col-sm-12 col-lg-12">
											<div class="card">
												<div class="card-body"> 
												<?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Urgent' AND department = 'CS'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>    
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-danger">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'High' AND department = 'CS'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-warning">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
												
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Medium' AND department = 'CS'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                               
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-primary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Low' AND department = 'CS'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-secondary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>

												</div>
												
											</div>
											</div>										
									</div>
								</div>
							</div>
		                    <?php } else if($roles == "23"){ ?>
		                    <div class="row row-cards">
							<div class=" col-lg-12">
								<div class="row">
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'Training') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticket = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
												<h3 class="mb-1 text-primary counter font-30"><?php echo $totalticket; ?></h3>
												<div class="text-muted">Total ticket</div>
											</div>
											<?php
                                            }
                                             ?>
                                           
									</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'Training' AND status IN ('New','Pending')) AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketnew = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-red rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-red font-30"><span class="counter"><?php echo $totalticketnew; ?></span></h3>
												<div class="text-muted">Total Ticket New</div>
											</div>
												<?php
                                            }
                                             ?>
										</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                               <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'Training' AND status ='Close') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketclose = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-orange rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-orange font-30"><span class="counter"><?php echo $totalticketclose; ?></span></h3>
												<div class="text-muted">Total Ticket Close</div>
											</div>
                                             <?php
                                            }
                                             ?>

										</div>
									</div>
								</div>
							</div>
						</div>
		                    <div class="row row-cards">
								<div class=" col-lg-12">
									<div class="row">
										<div class="col-sm-12 col-lg-12">
											<div class="card">
												<div class="card-body"> 
												<?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Urgent' AND department = 'Training'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>    
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-danger">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'High' AND department = 'Training'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-warning">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
												
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Medium' AND department = 'Training'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                               
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-primary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Low' AND department = 'Training'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-secondary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>

												</div>
												
											</div>
											</div>										
									</div>
								</div>
							</div>
		                    <?php } else if($roles == "24") { ?>
		                    <div class="row row-cards">
							<div class=" col-lg-12">
								<div class="row">
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'Admin') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticket = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
												<h3 class="mb-1 text-primary counter font-30"><?php echo $totalticket; ?></h3>
												<div class="text-muted">Total ticket</div>
											</div>
											<?php
                                            }
                                             ?>
                                           
									</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'Admin' AND status IN ('New','Pending')) AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketnew = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-red rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-red font-30"><span class="counter"><?php echo $totalticketnew; ?></span></h3>
												<div class="text-muted">Total Ticket New</div>
											</div>
												<?php
                                            }
                                             ?>
										</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                               <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'Admin' AND status ='Close') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketclose = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-orange rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-orange font-30"><span class="counter"><?php echo $totalticketclose; ?></span></h3>
												<div class="text-muted">Total Ticket Close</div>
											</div>
                                             <?php
                                            }
                                             ?>

										</div>
									</div>
								</div>
							</div>
						</div>
		                    <div class="row row-cards">
								<div class=" col-lg-12">
									<div class="row">
										<div class="col-sm-12 col-lg-12">
											<div class="card">
												<div class="card-body"> 
												<?php 
	                                                $statement = $conn->prepare("SELECT ticket.ticket_id, ticket.department, ticket.duedate, ticket.prioritize, ticket.type, ticket.description, ticket.document, 
	                                                ticket.status, ticket.remarks, ticket.document2, ticket.user_id, ticket.created_by, ticket.created_date, user.user_id, user.name, user.centers_id, centers.centers_id, 
	                                                centers.name AS branch
                                                    FROM ticket
                                                    JOIN user
                                                      ON user.user_id = ticket.user_id
                                                    JOIN centers
                                                     ON centers.centers_id = user.centers_id
                                                    where ticket.status = 'New' and ticket.prioritize = 'Urgent' AND ticket.department = 'Admin'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>    
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-danger">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $name; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?><br>
																<span style="color: black;">Apply Date:</span>&nbsp;&nbsp;&nbsp;<?= $created_date; ?><br>
																<span style="color: black;">Branch:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $branch; ?>
															</div>
														</div>
													</div></a>
													<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                             $statement = $conn->prepare("SELECT ticket.ticket_id, ticket.department, ticket.duedate, ticket.prioritize, ticket.type, ticket.description, ticket.document, 
	                                                ticket.status, ticket.remarks, ticket.document2, ticket.user_id, ticket.created_by, ticket.created_date, user.user_id, user.name, user.centers_id, centers.centers_id, 
	                                                centers.name AS branch
                                                    FROM ticket
                                                    JOIN user
                                                      ON user.user_id = ticket.user_id
                                                    JOIN centers
                                                     ON centers.centers_id = user.centers_id
                                                    where ticket.status = 'New' and ticket.prioritize = 'High' AND ticket.department = 'Admin'");
                                                    
	                                                
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-warning">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $name; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?><br>
																<span style="color: black;">Apply Date:</span>&nbsp;&nbsp;&nbsp;<?= $created_date; ?><br>
																<span style="color: black;">Branch:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $branch; ?>
															</div>
														</div>
													</div></a>
												
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                             
	                                              $statement = $conn->prepare("SELECT ticket.ticket_id, ticket.department, ticket.duedate, ticket.prioritize, ticket.type, ticket.description, ticket.document, 
	                                                ticket.status, ticket.remarks, ticket.document2, ticket.user_id, ticket.created_by, ticket.created_date, user.user_id, user.name, user.centers_id, centers.centers_id, 
	                                                centers.name AS branch
                                                    FROM ticket
                                                    JOIN user
                                                      ON user.user_id = ticket.user_id
                                                    JOIN centers
                                                     ON centers.centers_id = user.centers_id
                                                    where ticket.status = 'New' and ticket.prioritize = 'Medium' AND ticket.department = 'Admin'");
                                                    
	                                                
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                               
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-primary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $name; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?><br>
																<span style="color: black;">Apply Date:</span>&nbsp;&nbsp;&nbsp;<?= $created_date; ?><br>
																<span style="color: black;">Branch:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $branch; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                              $statement = $conn->prepare("SELECT ticket.ticket_id, ticket.department, ticket.duedate, ticket.prioritize, ticket.type, ticket.description, ticket.document, 
	                                                ticket.status, ticket.remarks, ticket.document2, ticket.user_id, ticket.created_by, ticket.created_date, user.user_id, user.name, user.centers_id, centers.centers_id, 
	                                                centers.name AS branch
                                                    FROM ticket
                                                    JOIN user
                                                      ON user.user_id = ticket.user_id
                                                    JOIN centers
                                                     ON centers.centers_id = user.centers_id
                                                    where ticket.status = 'New' and ticket.prioritize = 'Low' AND ticket.department = 'Admin'");
                                                    
	                                               
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-secondary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $name; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?><br>
																<span style="color: black;">Apply Date:</span>&nbsp;&nbsp;&nbsp;<?= $created_date; ?><br>
																<span style="color: black;">Branch:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $branch; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>

												</div>
												
											</div>
											</div>										
									</div>
								</div>
							</div>
                            <?php } else if($roles == "25") { ?>
                            <div class="row row-cards">
							<div class=" col-lg-12">
								<div class="row">
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'senior_creative') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticket = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
												<h3 class="mb-1 text-primary counter font-30"><?php echo $totalticket; ?></h3>
												<div class="text-muted">Total ticket</div>
											</div>
											<?php
                                            }
                                             ?>
                                           
									</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'senior_creative' AND status IN ('New','Pending')) AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketnew = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-red rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-red font-30"><span class="counter"><?php echo $totalticketnew; ?></span></h3>
												<div class="text-muted">Total Ticket New</div>
											</div>
												<?php
                                            }
                                             ?>
										</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                               <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'senior_creative' AND status ='Close') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketclose = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-orange rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-orange font-30"><span class="counter"><?php echo $totalticketclose; ?></span></h3>
												<div class="text-muted">Total Ticket Close</div>
											</div>
                                             <?php
                                            }
                                             ?>

										</div>
									</div>
								</div>
							</div>
						</div>
		                    <div class="row row-cards">
								<div class=" col-lg-12">
									<div class="row">
										<div class="col-sm-12 col-lg-12">
											<div class="card">
												<div class="card-body"> 
												<?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Urgent' AND department = 'senior_creative'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>    
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-danger">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'High' AND department = 'senior_creative'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-warning">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
												
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Medium' AND department = 'senior_creative'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                               
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-primary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Low' AND department = 'senior_creative'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-secondary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>

												</div>
												
											</div>
											</div>										
									</div>
								</div>
							</div>
							<?php } else if($roles == "26") { ?>
							<div class="row row-cards">
							<div class=" col-lg-12">
								<div class="row">
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'junior_creative') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticket = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
												<h3 class="mb-1 text-primary counter font-30"><?php echo $totalticket; ?></h3>
												<div class="text-muted">Total ticket</div>
											</div>
											<?php
                                            }
                                             ?>
                                           
									</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'junior_creative' AND status IN ('New','Pending')) AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketnew = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-red rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-red font-30"><span class="counter"><?php echo $totalticketnew; ?></span></h3>
												<div class="text-muted">Total Ticket New</div>
											</div>
												<?php
                                            }
                                             ?>
										</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                               <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'junior_creative' AND status ='Close') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketclose = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-orange rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-orange font-30"><span class="counter"><?php echo $totalticketclose; ?></span></h3>
												<div class="text-muted">Total Ticket Close</div>
											</div>
                                             <?php
                                            }
                                             ?>

										</div>
									</div>
								</div>
							</div>
						</div>
		                    <div class="row row-cards">
								<div class=" col-lg-12">
									<div class="row">
										<div class="col-sm-12 col-lg-12">
											<div class="card">
												<div class="card-body"> 
												<?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Urgent' AND department = 'junior_creative'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>    
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-danger">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'High' AND department = 'junior_creative'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-warning">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
												
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Medium' AND department = 'junior_creative'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                               
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-primary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Low' AND department = 'junior_creative'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-secondary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>

												</div>
												
											</div>
											</div>										
									</div>
								</div>
							</div>
							<?php } else if($roles == "27") { ?>
							<div class="row row-cards">
							<div class=" col-lg-12">
								<div class="row">
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'videographer') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticket = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-primary rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
												<h3 class="mb-1 text-primary counter font-30"><?php echo $totalticket; ?></h3>
												<div class="text-muted">Total ticket</div>
											</div>
											<?php
                                            }
                                             ?>
                                           
									</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                                <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'videographer' AND status IN ('New','Pending')) AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketnew = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-red rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-red font-30"><span class="counter"><?php echo $totalticketnew; ?></span></h3>
												<div class="text-muted">Total Ticket New</div>
											</div>
												<?php
                                            }
                                             ?>
										</div>
									</div>
									<div class="col-sm-12 col-lg-4">
										<div class="card">
											<div class="card-body">
                                               <?php 
                                                 $statement = $conn->prepare("SELECT (SELECT COUNT(*) FROM ticket WHERE department = 'videographer' AND status ='Close') AS cnt");
                                                 $statement->execute();
                                                 while($row = $statement->fetch(PDO::FETCH_ASSOC))
                                                {
                                                     $totalticketclose = $row["cnt"]; 
                                                ?>
												<div class="card-value float-right text-purple">
													<div class="icon icon-shape bg-gradient-orange rounded-circle text-white">
														<i class="fas fa-users text-white"></i>
													</div>
												</div>
                                                <h3 class="mb-1  text-orange font-30"><span class="counter"><?php echo $totalticketclose; ?></span></h3>
												<div class="text-muted">Total Ticket Close</div>
											</div>
                                             <?php
                                            }
                                             ?>

										</div>
									</div>
								</div>
							</div>
						</div>
		                    <div class="row row-cards">
								<div class=" col-lg-12">
									<div class="row">
										<div class="col-sm-12 col-lg-12">
											<div class="card">
												<div class="card-body"> 
												<?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Urgent' AND department = 'videographer'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>    
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-danger">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'High' AND department = 'videographer'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-warning">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
												
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Medium' AND department = 'videographer'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                               
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-gradient-primary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>
	                                             <?php 
	                                                $statement = $conn->prepare("SELECT * FROM ticket WHERE status = 'New' and prioritize = 'Low' AND department = 'videographer'");
						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);
	                                                ?>
	                                                
													<a href="system-view-ticket.php?id=<?php echo $ticket_id; ?>"><div class="col-md-8 col-xl-8">
														<div class="card text-white bg-secondary">
															<div class="card-body">
																<span style="color: black;">Created By:</span>&nbsp;&nbsp;&nbsp;<?= $created_by; ?><br>
																<span style="color: black;">Due date:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $duedate; ?><br>
																<span style="color: black;">Department:</span>&nbsp;&nbsp;<?= $department; ?><br>
																<span style="color: black;">Title:</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= $type; ?>
															</div>
														</div>
													</div></a>
													
												<?php
	                                            }
	                                             ?>

												</div>
												
											</div>
											</div>										
									</div>
								</div>
							</div>
							
		                    <?php 
		                    } else {
		                    ?>
		                	<?php } ?>
                                                 <!--  end loop every user -->
					</div>
				</div>
				
				
<?php 
include('system-footer.php');
?>