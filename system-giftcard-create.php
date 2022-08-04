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
                                    $user_id = $dt["user_id"];
                                    $name = $dt["name"];
                                    $email = $dt["email"];
                                    $phone = $dt["phone"];                                           
                                    // $centers = $dt["centers_id"]; 
                                }
                            }
                            else
                            {
                                echo "Data is not found!";
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
                                            <div class="col-sm-6 col-md-12">
												<div class="form-group">
													<label class="form-label">Customer Name</label>
													<input type="text" class="form-control" name="name" id="name" >
													<input type="text" class="form-control" name="created_by" id="created_by" value="<?php echo $user_id; ?>" hidden >
													<input type="text" class="form-control" name="created_name" id="created_name" value="<?php echo $name; ?>" hidden >
												</div>
											</div>
                                            <div class="col-sm-12 col-md-6">
												<div class="form-group">
													<label class="form-label">Customer Phone Number</label>
                                                    <input type="text" class="form-control" name="phone" id="phone" >
												</div>
											</div>
                                            <div class="col-sm-12 col-md-6">
												<div class="form-group">
													<label class="form-label">Customer Email</label>
													<input type="email" class="form-control" name="email" id="email" >
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer text-right">
										<button type="submit" name="submit" id="submit" class="btn btn-primary" >Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					
<?php
    
    include('system-footer.php');
?>

