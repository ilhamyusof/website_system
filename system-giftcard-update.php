<?php
//Start session
    session_start();
    include('system-header.php');
?>
        <?php
            
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
       
				<div class="my-3 my-md-5 app-content">
					<div class="side-app">
						<div class="page-header">
							<ol class="breadcrumb1">
											<li class="breadcrumb-item1 active">Management</li>
											<li class="breadcrumb-item1 active">Gift Card </li>
							</ol>
							
						</div>
                            
                            <?php
                            if(isset($_SESSION["session"]))
                            {
                                $email = $_SESSION["session"];
                                $sql = "SELECT * FROM user WHERE email = :email";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(":email", $email);
                                $stmt->execute();

                                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                                {
                                    $incharge_id = $dt["user_id"];
                                    $nameincharge = $dt["name"];
                                    $emailincharge = $dt["email"];
                                    $phoneincharge = $dt["phone"];                                           
                                    $centers = $dt["centers_id"]; 
                                }
                            }
                            else
                            {
                                echo "Data is not found!";
                            }   
                        ?>
                            
                            <?php
                            if(isset($_GET["id"]))
                            {
                                $giftcard_id = $_GET["id"];
                                $sql =  "SELECT giftcard.giftcard_id, giftcard.name, giftcard.phone, giftcard.email, giftcard.status, giftcard.voucher, giftcard.created_date, giftcard.created_by, 
                                
                                user.user_id, user.name AS incharge, user.email AS email_incharge FROM giftcard
                                INNER JOIN user 
                                ON giftcard.created_by=user.user_id 
                                WHERE giftcard.giftcard_id = :giftcard_id";
                                
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(":giftcard_id", $giftcard_id);
                                $stmt->execute();

                                if($data = $stmt->fetch(PDO::FETCH_ASSOC))
                                {
                                  $giftcard_id = $data["giftcard_id"];
                                  $name = $data["name"];
                                  $phone = $data["phone"];
                                  $email = $data["email"];
                                  $status = $data["status"];
                                  $voucher = $data["voucher"];
                                  $created_date = $data["created_date"];
                                  $created_by = $data["created_by"];
                                   
                                }
                            }
                            else
                            {
                                echo " Data is not found!";
                            }
                            ?>
							<div class="col-lg-12">
								<form class="card" method="POST" action="system-giftcard-function.php"  enctype="multipart/form-data">
									<div class="card-header">
										<h3 class="card-title">Create Gift Card</h3>
									</div>
									
									<?php
                                         if(isset($_GET['message'])){
                                             $message = $_GET['message'];
                                             echo $message;
                                         }
                                    ?>
									<div class="card-body">
										<div class="row">
                                            <div class="col-sm-12 col-md-6">
												<div class="form-group">
													<label class="form-label">Customer Name</label>
													<input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>" readonly>
													<input type="text" class="form-control" name="incharge" id="incharge" value="<?php echo $incharge_id; ?>" hidden >
													<input type="text" class="form-control" name="giftcard_id" id="giftcard_id" value="<?php echo $giftcard_id; ?>" hidden >
													<input type="text" class="form-control" name="center_id" id="center_id" value="<?php echo $centers; ?>" hidden >
												</div>
											</div>
                                            <div class="col-sm-12 col-md-6">
												<div class="form-group">
													<label class="form-label">Customer Phone Number</label>
                                                    <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $phone; ?>" readonly >
												</div>
											</div>
                                            <div class="col-sm-12 col-md-4">
												<div class="form-group">
													<label class="form-label">Customer Email</label>
													<input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>" readonly>
												</div>
											</div>
											<div class="col-sm-12 col-md-4">
												<div class="form-group">
													<label class="form-label">Voucher Code</label>
                                                    <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $voucher; ?>" readonly>
												</div>
											</div>
											<div class="col-sm-12 col-md-4">
												<div class="form-group">
													<label class="form-label">Status Voucher</label>
                                                    <input type="text" class="form-control" name="status1" id="status1" value="<?php echo $status; ?>" readonly>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer text-right">
										<button type="submit" name="redeem" id="redeem" class="btn btn-primary">Redemption</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					
<?php
    
    include('system-footer.php');
?>

