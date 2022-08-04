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
											<li class="breadcrumb-item1 active">Appointment Management</li>
											<li class="breadcrumb-item1 active">Appointment </li>
							</ol>
						</div>
                         <?php
                            if(isset($_GET["id"]))
                            {
                                $inquiry_id = $_GET["id"];
                                $sql =  "SELECT * FROM inquiry where inquiry_id = :inquiry_id";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(":inquiry_id", $inquiry_id);
                                $stmt->execute();

                                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                                {
                                    $inquiry_id = $dt["inquiry_id"];
                                    $name = $dt["name"];
                                    $email = $dt["email"];
                                    $contact = $dt["contact"];
                                    $branch = $dt["branch"];
                                    $message = $dt["message"];
                                    $status = $dt["status"];
                                    $remark =  $dt["remark"];
                                    $package =  $dt["package"]; 
                                    $respond_date = $dt["respond_date"];                                   
                                }
                            }
                            else
                            {
                                echo " Data is not found!";
                            }
                            ?>
							<div class="col-lg-12">
								<form class="card" method="POST" action="system-updateappointment1.php"  enctype="multipart/form-data">
									<div class="card-header">
										<h3 class="card-title">Appointment </h3>
									</div>
									<div class="card-body">
										<div class="row">
                                            <div class="col-sm-6 col-md-12">
												<div class="form-group">
													<label class="form-label">Name</label>
													<input type="text" class="form-control" name="name" id="name" value="<?php echo $name;?>" readonly>
                                                    <input type="text" class="form-control" name="inquiry_id" id="inquiry_id" value="<?php  echo $inquiry_id; ?>" hidden="">
												</div>
											</div>
                                            <div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $email;?>" readonly>
												</div>
											</div>
                                            <div class="col-sm-6 col-md-6">
                                               <div class="form-group">
                                                    <label class="form-label">Contact</label>
                                                    <input type="text" class="form-control" name="contact" id="contact" value="<?php echo $contact;?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                               <div class="form-group">
                                                    <label class="form-label">Package</label>
                                                    <input type="text" class="form-control" name="peackage" id="package" value="<?php echo $package;?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
												 <div class="form-group">
                                                    <label class="form-label">Branch Physiomobile</label>
                                                    <input type="text" class="form-control" name="branch" id="branch" value="<?php echo $branch;?>" readonly>
                                                </div>
											</div>
                                            <div class="col-sm-12 col-md-12">
                                                 <div class="form-group">
                                                    <label class="form-label">Message </label>
                                                   <textarea class="form-control" name="message" id="message" rows="6" placeholder="text here.." readonly><?php echo $message;?></textarea>
                                                </div>
                                            </div>                                           
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Status Inquiry</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="status" id="status">
                                                            <option value="" <?php if($status == "NULL"){ echo "selected"; }else{} ?>>-- Choose One--</option>
                                                            <option value="New" <?php if($status == "New"){ echo "selected"; }else{} ?>>New</option>
                                                            <option value="Pending" <?php if($status == "Pending"){ echo "selected"; }else{} ?>>Pending</option>
                                                            <option value="Close" <?php if($status == "Close"){ echo "selected"; }else{} ?>>Close</option>                                                            
                                                     </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-6 col-md-6">
                                                <label class="form-label">Remark </label>                                                   
                                                <textarea class="form-control" rows="6" name="remark" id="remark"></textarea>
                                            </div> 
										</div>
									</div>
									<div class="card-footer text-right">
                                        <button type="submit" class="btn btn-grey" >Cancel</button>
										<button type="submit" name="update" id="update" class="btn btn-primary">Update </button>
									</div>
								</form>
							</div>
						</div>
					</div>
					
<?php
    
    include('system-footer.php');
?>

