<!doctype html>
<html lang="en" dir="ltr">
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
            $email = $_SESSION["session"];
            $user_id = $_SESSION["user_id"];
            $job = $_SESSION["job"];
            $roles = $_SESSION['roles'];
            $centers = $_SESSION['centers'];
            $now = date("Y-m-d");
        ?>
       
				<div class="my-3 my-md-5 app-content">
					<div class="side-app">
						<div class="page-header">
							<ol class="breadcrumb1">
											<li class="breadcrumb-item1 active">Career Management</li>
											<li class="breadcrumb-item1 active">Register Career </li>
							</ol>
							
						</div>
                         <?php
                            if(isset($_GET["id"]))
                            {
                                $contactus_id = $_GET["id"];
                                $sql =  "SELECT * FROM contactus where contactus_id = :contactus_id";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(":contactus_id", $contactus_id);
                                $stmt->execute();

                                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                                {
                                    $contactus_id = $dt['contactus_id'];
                                    $name = $dt["name"];
                                    $email = $dt["email"];
                                    $contact = $dt["contact"];
                                    $message = $dt["message"];
                                    $status = $dt["status"];
                                    $responded_date = $dt["responded_date"];
                                    }
                            }
                            else
                            {
                                echo " Data is not found!";
                            }
                            ?>
							<div class="col-lg-12">
								<form class="card" method="POST" action="system-updatecontactus.php"  enctype="multipart/form-data">
									<div class="card-header">
										<h3 class="card-title">Detail</h3>
									</div>
									<div class="card-body">
										<div class="row">
                                            <div class="col-sm-6 col-md-12">
												<div class="form-group">
													<label class="form-label">Name Detail</label>
													<input type="text" class="form-control" name="name" id="name" value="<?php echo $name;?>" readonly>
                                                    <input type="text" class="form-control" name="contactus_id" id="contactus_id" value="<?php  echo $contactus_id; ?>" hidden="">
												</div>
											</div>
                                            <div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Email</label>
                                                   <input type="text" class="form-control" name="email" id="email" value="<?php echo $email;?>" readonly >
												</div>
											</div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Status Job Offer</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="status" id="status">
                                                            <option value="" <?php if($status == "NULL"){ echo "selected"; }else{} ?>>-- Choose One--</option>
                                                            <option value="New" <?php if($status == "New"){ echo "selected"; }else{} ?>>New</option>
                                                            <option value="Close" <?php if($status == "Close"){ echo "selected"; }else{} ?>>Close</option>
                                                     </select>
                                                </div>
                                            </div>
                                             <div class="col-sm-12 col-md-13">
                                                 <div class="form-group">
                                                    <label class="form-label">Message </label>
                                                   <textarea class="form-control" name="example-textarea-input" rows="6" placeholder="text here.." readonly><?php echo $message;?></textarea>
                                                </div>
                                            </div>
										</div>
									</div>
									<div class="card-footer text-right">
										<button type="submit" name="submit" id="submit" class="btn btn-primary" >Update Contact Us</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					
<?php
    
    include('system-footer.php');
?>
