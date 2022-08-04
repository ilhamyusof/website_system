<?php
//Start session
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

            $job = $_SESSION["job"];
            $roles = $_SESSION['roles'];
            $centers = $_SESSION['centers'];
            $now = date("Y-m-d");
        ?>

				<div class="app-content my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Voucher Gift Card</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Management</a></li>
								<li class="breadcrumb-item active" aria-current="page">Gift Card</li>
							</ol>
						</div>
						
                        
                        <?php 
                            if($roles == "9" || $roles == "15" || $roles == "21" || $roles == "13" || $roles == "20"){
                         ?>
                        
						
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-status bg-yellow br-tr-3 br-tl-3"></div>
									<div class="card-header">
										<div class="card-title">Gift Card</div>
									</div>
									
									<?php 
									    $giftcard_id = "";
									    $name = "";
									    $phone = "";
									    $email = "";
									    $status = "";
									    $voucher = "";
									    $created_date = "";
									    $created_by = "";
									    $redeem_date = "";
									    $center_id = "";
									    $incharge = "";
									    
									    if(isset($_POST['search']))
									    {
    									        $servername ="physiomobile.my";
                                                $database = "physiomo_pmmy";
                                                $username = "physiomo_pmmy";
                                                $password = "Pmmy_8816@clinic";
                                                
                                                $conn = new PDO('mysql:host='.$host_name.';dbname='.$database, $username, $password);
                                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                
                                                $voucher = $_POST['key'];
                                                $sql = "select * from giftcard where voucher = :voucher AND status = 'New'";
                                                $result = $conn->prepare($sql);
                                                $executedrecord = $result->execute(array(":voucher"=>$voucher));
                                                if($executedrecord)
                                                {
                                                    if($result->rowCount()>0)
                                                    {
                                                        foreach($result as $row)
                                                        {
                                                            $giftcard_id = $row['giftcard_id'];
                    									    $name = $row['name'];
                    									    $phone = $row['phone'];
                    									    $email = $row['email'];
                    									    $status = $row['status'];
                    									    $voucher = $row['voucher'];
                    									    $created_date = $row['created_date'];
                    									    $created_by = $row['created_by'];
                    									    $redeem_date = $row['redeem_date'];
                    									    $center_id = $row['center_id'];
                    									    $incharge = $row['incharge'];
                                                        }
                                                    } else
                                                    {
                                                        echo '<h4 class="text-danger" style="text-align: center;">Sorry ! Your record are already redemption</h4>';
                                                    }
                                                }
                                               
                                            
									    }
									?>
									
    								    <form class="card" method="POST" action="system-giftcard-search.php"  enctype="multipart/form-data">
    								        <div class="card-body">
										        <div class="row">
										            <div class="col-md-12 col-lg-12">
                    									<div class="form-group">
                    										<!--<label class="form-label">Search Voucher Code</label>-->
                    										<div class="row gutters-xs">
                    											<div class="col">
                    												<input type="text" class="form-control" placeholder="Search for voucher code..." name="key" id="key">
                    											</div>
                    											<span class="col-auto">
                    												<button class="btn btn-primary" type="submit" name="search" id="search" ><i class="fe fe-search"></i></button>
                    											</span>
                    										</div>
                    									</div>
                    								</div>
                								</div>
                							</div>
                						</form>
								
									
									<div class="card-body">
										<div class="table-responsive">
											<table id="example" class="table table-striped table-bordered" style="width:100%">
												<thead>
													<tr>
														<th class="wd-15p">Detail Receive Gift Card</th>
														<th class="wd-20p">Voucher Code</th>
														<th class="wd-20p">Status</th>
														<th class="wd-15p">Action</th>														
													</tr>
												</thead>
			                                    
												<tbody>
													<tr>
														<td>
															<span style="color: black; font-weight:bold;" >Name : <?php echo $name; ?></span><br>
															<span>Phone: <?php  echo $phone; ?></span><br>
															<span>Email: <?php echo $email; ?></span><br>
															<span>Created date: <?php  echo $created_date; ?></span>
														</td>
														<td><span style="font-weight:bold; color: black; text-align: center;"><?php echo $voucher; ?></span></td>
														<td><span><?php  echo $status; ?></span></td>
														<td style="text-align: center;">
															<a href="system-giftcard-update.php?id=<?php echo $giftcard_id; ?>"><button type="button" class="btn btn-icon btn-primary btn-info" ><i class="mdi mdi-wrench"></i></button></a>															
														</td>														
													</tr>
												 
												</tbody>
											</table>
										</div>
									</div>
									<!-- table-wrapper -->
								</div>
								<!-- section-wrapper -->

							</div>
						</div>
						<?php } else { }?>
					
					</div>
				</div>
<?php 
include('system-footer.php');
?>