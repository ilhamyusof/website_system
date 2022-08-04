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
       
				<div class="my-3 my-md-5 app-content">
					<div class="side-app">
						<div class="page-header">
							<ol class="breadcrumb1">
											<li class="breadcrumb-item1 active">Management</li>
											<li class="breadcrumb-item1 active">Create New Lead</li>
							</ol>
							
						</div>
                        <?php
                            if(isset($_GET["id"]))
                            {
                                $tracker_id = $_GET["id"];
                                $sql =  "SELECT tracker.tracker_id,tracker.lead, tracker.gender, tracker.pain_id, tracker.engagement_id, tracker.status, tracker.centers_id, tracker.payment, tracker.notes, tracker.created_date, tracker.user_id, tracker.created_by, user.user_id, user.name, pain.pain_id, pain.type_pain, engagement.engagement_id, engagement.engagement_name,centers.centers_id, centers.name AS branch
                                    FROM tracker
                                    JOIN user
                                      ON user.user_id = tracker.user_id 
                                    JOIN pain
                                      ON pain.pain_id = tracker.pain_id
                                    JOIN centers
                                      ON centers.centers_id = tracker.centers_id
                                    JOIN engagement
                                      ON engagement.engagement_id = tracker.engagement_id where tracker.tracker_id = :tracker_id";
                                $stmt = $conn->prepare($sql);
                                $stmt->bindParam(":tracker_id", $tracker_id);
                                $stmt->execute();

                                if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
                                {
                                    $tracker_id = $dt["tracker_id"];
                                    $user_id = $dt["user_id"];
                                    $lead = $dt["lead"];
                                    $gender = $dt["gender"];
                                    $pain_id = $dt["pain_id"];
                                    $engagement_id = $dt["engagement_id"]; 
                                    $status = $dt["status"]; 
                                    $centers_id = $dt["centers_id"];
                                    $payment = $dt["payment"]; 
                                    $notes = $dt["notes"];
                                }
                            }
                            else
                            {
                                echo " Data is not found!";
                            }
                            ?>
							<div class="col-lg-12">
								<form class="card" method="POST" action="system-addlead.php"  enctype="multipart/form-data">
									<div class="card-header">
										<h3 class="card-title">Create New Lead</h3>
									</div>
									<div class="card-body">
										<div class="row">
                                            <div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Name Creater</label>
													<input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>" readonly >
                                                    <input type="text" class="form-control" name="user_id" id="user_id" value="<?php echo $user_id; ?>" hidden >
                                                    <input type="text" class="form-control" name="tracker_id" id="tracker_id" value="<?php echo $tracker_id; ?>" hidden >
												</div>
											</div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>" readonly >
                                                    <input type="text" class="form-control" name="created_by" id="created_by" value="<?php echo $email; ?>" hidden >
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Lead/Name</label>
                                                    <input type="text" class="form-control" name="lead" id="lead" value="<?= $lead; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Gender</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="gender" id="gender">
                                                             <option value="" <?php if($gender == "NULL"){ echo "selected"; }else{} ?>>-- Choose One--</option>
                                                            <option value="M" <?php if($gender == "M"){ echo "selected"; }else{} ?>>Male</option>
                                                            <option value="F" <?php if($gender == "F"){ echo "selected"; }else{} ?>>Female</option>
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Type of Pain</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="pain" id="pain">
                                                            <option label="Choose one"></option>
                                                            <?php
                                                                $sql = $conn->prepare("SELECT * FROM pain");
                                                                $sql->execute();

                                                                while($read = $sql->fetch(PDO::FETCH_ASSOC))
                                                                {
                                                            ?>
                                                             
                                                              <option value="<?php echo $read["pain_id"]; ?>" <?php if($pain_id == $read["pain_id"]){ echo "selected"; } ?>>
                                                            <?php echo $read["type_pain"]; ?>
                                                            </option>


                                                            <?php
                                                            }
                                                            ?>
                                                      </select>
                                                </div>
                                            </div>
                                           
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Source on Inquiry or Engagement</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="engagement" id="engagement">
                                                            <option label="Choose one"></option>
                                                            <?php
                                                                $sql = $conn->prepare("SELECT * FROM engagement");
                                                                $sql->execute();

                                                                while($read = $sql->fetch(PDO::FETCH_ASSOC))
                                                                {
                                                            ?>
                                                            <option value="<?php echo $read["engagement_id"]; ?>" <?php if($engagement_id == $read["engagement_id"]){ echo "selected"; } ?>>
                                                            <?php echo $read["engagement_name"]; ?>
                                                            </option>

                                                            <?php
                                                            }
                                                            ?>



                                                      </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Lead Status</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="status" id="status">
                                                            <option value="" <?php if($status == "NULL"){ echo "selected"; }else{} ?>>-- Choose One--</option>
                                                            <option value="Close" <?php if($status == "Close"){ echo "selected"; }else{} ?>>Close</option>
                                                            <option value="Not Close" <?php if($status == "Not Close"){ echo "selected"; }else{} ?>>Not Close</option>
                                                            <option value="Not Interested" <?php if($status == "Not Interested"){ echo "selected"; }else{} ?>>Not Interested</option>
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Branch</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="branch" id="branch">
                                                            <option label="Choose one"></option>
                                                            <?php
                                                                $sql = $conn->prepare("SELECT * FROM centers");
                                                                $sql->execute();

                                                                while($read = $sql->fetch(PDO::FETCH_ASSOC))
                                                                {
                                                            ?>
                                                            <option value="<?php echo $read["centers_id"]; ?>" <?php if($centers_id == $read["centers_id"]){ echo "selected"; } ?>>
                                                            <?php echo $read["name"]; ?>
                                                            </option>
                                                            <?php
                                                            }
                                                            ?>
                                                      </select>
                                                </div>
                                            </div>                             
                                            <div class="col-sm-6 col-md-4">
                                              <label class="form-label">Payment Receipt</label>
                                              <!--<span>Please attach all the file related or others example (Payment Receipt) if applicable</span><br>                                                -->
                                              <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="payment" id="payment" value="<?= $payment; ?>" />
                                                    <label class="custom-file-label">Choose file</label>
                                              </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12">
                                                <div class="form-group">
    													<label for="recipient-name" class="form-control-label">Notes:</label>
    													<!--<span>Please</span><br> -->
    													<textarea class="form-control" rows="1" name="notes" id="notes" ><?= $notes; ?></textarea>
    											</div>
    										</div>
                                            <div class="col-sm-6 col-md-6">
                                                    <?php 
                                                    if ($payment == ""){?>
                                                        <!--<div class="form-group">-->
                                                        <!--    <img src="department/no-video.png" alt="Image" style="width: auto; height: auto;">-->
                                                        <!--</div>-->
                                                    <?php } else {?>
                                                        <div class="form-group">
                                                            <img src="payment/<?php echo $payment;?>" alt="Image" style="width: auto; height: auto;">
                                                        </div>
                                                    <?php } ?>
                                            </div>


                                            
										</div>
									</div>
									<div class="card-footer text-right">
										<button type="submit" name="update" id="update" class="btn btn-primary" >Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					
<?php
    
    include('system-footer.php');
?>

