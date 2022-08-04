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
		  if($roles == "3" || $roles == "1" || $roles == "2" || $roles == "19")
		{
		?>				
        	<div class="app-content my-3 my-md-5">
					<div class="side-app">
						
						<div class="page-header">
							<h4 class="page-title" style="color: #94171b; text-transform: uppercase;">SALES LEADS TRACKER SUMMARY</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Sale</a></li>
								<li class="breadcrumb-item active" aria-current="page">Lead Tracker</li>
							</ol>
						</div>
						
						<div class="row">
						<?php
                        if(isset($_GET["id"]))
                        {
                            $user_id = $_GET["id"];
                            // $sale_id = $_GET["operation"];
                            $centers_id = $_GET["branch"];
                            // $sql = "SELECT * FROM user WHERE email = :email";
                            $sql = "SELECT user.user_id, user.name, user.roles_id, user.centers_id, centers.centers_id, centers.name as branch
                                FROM user
                                JOIN centers
                                  ON user.centers_id = centers.centers_id
                                where user.user_id = :user_id
                                 ";
                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(":user_id", $user_id);
                            $stmt->execute();

                            if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                            {
                                $user_id = $dt["user_id"];
                                $name = $dt["name"];                                           
                                $branch = $dt["branch"]; 
                                $centers_id = $dt["centers_id"];
                            }
                        }
                        else
                        {
                            echo "Data is not found!";
                        }   
                    ?>
								<div class="card">
									<div class="card-status bg-azure br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<h3 class="card-title">REPORT MONTHLY</h3>
									</div>
									<div class="panel-body">
                                                <div class="row">
                                                	<div class="table-responsive">
														<table class="table table-striped table-bordered" style="width:100%">
															<thead>
																<tr>
																	<th class="wd-15p">MONTHLY</th>
																	<th class="wd-15p">Action</th>
																</tr>
															</thead>
															
															<tbody>
																<tr>
																	<td>
																		<a><span style="font-weight: 8px; font-weight: bold;">JANUARY</span></a><br>
																	</td>
																	<td style="text-align: center;">
																		<a href="system-managelead-v1.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
																	</td>
																</tr>
																<tr>
																	<td>
																		<a><span style="font-weight: 8px; font-weight: bold;">FEBRUARY</span></a><br>
																	</td>
																	<td style="text-align: center;">
																		<a href="system-managelead-v2.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
																	</td>
																</tr>
																<tr>
																	<td>
																		<a><span style="font-weight: 8px; font-weight: bold;">MARCH</span></a><br>
																	</td>
																	<td style="text-align: center;">
																		<a href="system-managelead-v3.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
																	</td>
																</tr>
																<tr>
																	<td>
																		<a><span style="font-weight: 8px; font-weight: bold;">APRIL</span></a><br>
																	</td>
																	<td style="text-align: center;">
																		<a href="system-managelead-v4.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
																	</td>
																</tr>
																<tr>
																	<td>
																		<a><span style="font-weight: 8px; font-weight: bold;">MAY</span></a><br>
																	</td>
																	<td style="text-align: center;">
																		<a href="system-managelead-v5.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
																	</td>
																</tr>
																<tr>
																	<td>
																		<a><span style="font-weight: 8px; font-weight: bold;">JUNE</span></a><br>
																	</td>
																	<td style="text-align: center;">
																		<a href="system-managelead-v6.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
																	</td>
																</tr>
																<tr>
																	<td>
																		<a><span style="font-weight: 8px; font-weight: bold;">JULY</span></a><br>
																	</td>
																	<td style="text-align: center;">
																		<a href="system-managelead-v7.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
																	</td>
																</tr>
																<tr>
																	<td>
																		<a><span style="font-weight: 8px; font-weight: bold;">AUGUST</span></a><br>
																	</td>
																	<td style="text-align: center;">
																		<a href="system-managelead-v8.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
																	</td>
																</tr>
																<tr>
																	<td>
																		<a><span style="font-weight: 8px; font-weight: bold;">SEPTEMBER</span></a><br>
																	</td>
																	<td style="text-align: center;">
																		<a href="system-managelead-v9.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
																	</td>
																</tr>
																<tr>
																	<td>
																		<a><span style="font-weight: 8px; font-weight: bold;">OCTOBER</span></a><br>
																	</td>
																	<td style="text-align: center;">
																		<a href="system-managelead-v10.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
																	</td>
																</tr>
																<tr>
																	<td>
																		<a><span style="font-weight: 8px; font-weight: bold;">NOVEMBER</span></a><br>
																	</td>
																	<td style="text-align: center;">
																		<a href="system-managelead-v11.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
																	</td>
																</tr>
																<tr>
																	<td>
																		<a><span style="font-weight: 8px; font-weight: bold;">DECEMBER</span></a><br>
																	</td>
																	<td style="text-align: center;">
																		<a href="system-managelead-v12.php?id=<?= $user_id ?>&branch=<?= $centers_id ?>"><button type="button" class="btn btn-success btn-xs tip"><i class="fas fa-plus" ></i></button></a>
																	</td>
																</tr>
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
        <?php } 
    		else {}
        ?>
<?php 
include('system-footer.php');
?>