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
         if(isset($_GET["id"]))
            {
                $training_id = $_GET["id"];
                // $sql =  "SELECT * FROM training where training_id = :training_id";
                $sql =  "SELECT user.user_id, user.name, user.roles_id, user.centers_id, training_event.training_event_id,training_event.user_id, training.training_id, training.subject FROM user JOIN training_event ON user.user_id = training_event.user_id JOIN training ON training.training_id = training_event.training_id WHERE training.training_id = :training_id";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":training_id", $training_id);
                $stmt->execute();

                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    $training_id = $dt["training_id"];
                    $name = $dt["name"];
			        $user_id = $dt["user_id"];
			        $trainer = $dt["trainer"];
			        $subject = $dt["subject"];
			        // $startdate = $dt["startdate"];
			        // $enddate = $dt["enddate"];
			        // $starttime = $dt["starttime"];
			        // $endtime = $dt["endtime"];
			        // $objective = $dt["objective"];
			        // $organizer = $dt["organizer"];
			        $training_id = $dt["training_id"];
			        $training_event_id = $dt["training_event_id"];
			       
                }
            }
            else
            {
                echo " Data is not found!";
            }
            ?>
				<div class="app-content my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title" style="color: #94171b;">SUBJECT : <?= $subject; ?></h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Training</a></li>
								<li class="breadcrumb-item active" aria-current="page"><?= $subject; ?></li>
							</ol>
						</div>
						
						<div class="row">
							
								<div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">LIST PHYSIOTHERAPIST JOIN</h3>
									</div>
									<div class="card-body row justify-content-between">
										<div class="col-md-12 bg-muted border p-5">
											<ul class="mb-5">
												
												<div class="btn-list text-right">
													<a href="system-join-training-v2.php?id=<?= $training_id; ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-pencil-alt" ></i></button></a>
												</div>
											
									<?php 
                           			
		                            $id = $_GET["id"];
																			
									 $statement = $conn->prepare("SELECT user.user_id, user.name, user.roles_id, user.centers_id, training_event.training_event_id,training_event.user_id, training.training_id, training.subject FROM user JOIN training_event ON user.user_id = training_event.user_id JOIN training ON training.training_id = training_event.training_id WHERE training.training_id = '$id'");

		                                        $statement->execute();

		                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
		                                       {
		                                       	extract($data);
                            		?>
                            				

											<?php if($status = "complate"){

											?>
												<li><span class="fas fa-check text-success"></span> <?= $name;?></li>	
											<?php } else{ ?>
												<li><span class="fas fa-times text-success"></span> <?= $name;?></li>
												<?php } ?>	
									<?php } ?>
												</ul>
													</div>
									</div>
								</div>
							
						</div>
						<div class="row">
							<div class="card">
							<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
							<div class="card-header">
								<h3 class="card-title"> All Record Physiotherapist</h3>
							</div>
							<div class="card-body">
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									<div class="panel panel-default active">
										<div class="panel-heading " role="tab" id="headingOne">
											<h4 class="panel-title">
												<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true"  aria-controls="collapseOne">
													Physiotherapist
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
																	<th class="wd-15p">Detail</th>
																	<th class="wd-15p">Branch</th>
																	<th class="wd-15p">Action</th>
																</tr>
															</thead>
															<?php 
						                                        $statement = $conn->prepare("SELECT
																	 user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.roles_id, user.centers_id, roles.roles_id, roles.display_name, centers.centers_id, centers.name AS branch
																	FROM user
																	JOIN roles
																	  ON user.roles_id = roles.roles_id
																	JOIN centers
																	  ON centers.centers_id = user.centers_id WHERE user.roles_id = '8'");

						                                        $statement->execute();

						                                       while($data = $statement->fetch(PDO::FETCH_ASSOC))
						                                       {
						                                       	extract($data);			                                        
						                                    ?>
															<tbody>
																<tr>
																	<td>
																		<a><span style="font-weight: 8px; font-weight: bold;"><?php echo $name; ?></span></a><br>
																			<span><?php echo $email; ?></span><br>
																			<span><?php echo $phone; ?></span>
																			
																	</td>
																	<td>
																		<span style="font-weight: bold;"><?php echo $branch; ?></span><br><br>
																		
																	</td>
																	
																	<td style="text-align: center;">
																		<a href="system-join-training-v1.php?id=<?= $user_id ?> &training=<?= $training_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
																		
																		

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
							<!-- /Boxes de Acoes -->
						</div>

					</div>
				</div>
<?php 
include('system-footer.php');
?>