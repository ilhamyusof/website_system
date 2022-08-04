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
											<li class="breadcrumb-item1 active">Lead Tracker</li>
											<li class="breadcrumb-item1 active">Create New Lead Tracker</li>
							</ol>
							
						</div>
                        <?php
                            if(isset($_GET["id"]))
                            {
                                $tracker_id = $_GET["id"];
                                $sql =  "SELECT therapist.therapist_id, tracker.tracker_id,tracker.lead, tracker.phone, tracker.inquiring, tracker.identification, tracker.gender, tracker.ic, tracker.pain_id, tracker.package_id, tracker.engagement_id, tracker.status, tracker.centers_id, tracker.therapist_id, tracker.payment, tracker.mri, tracker.created_date, tracker.user_id, tracker.created_by, user.user_id, user.name, pain.pain_id, pain.type_pain, package.package_id, package.package_name, package.package_display, package.price, engagement.engagement_id, engagement.engagement_name,centers.centers_id, centers.name AS branch
                                    FROM tracker
                                    JOIN user
                                      ON user.user_id = tracker.user_id 
                                    JOIN pain
                                      ON pain.pain_id = tracker.pain_id
                                    JOIN therapist
                                      ON therapist.therapist_id = tracker.therapist_id
                                    JOIN package
                                      ON package.package_id = tracker.package_id
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
                                    $phone = $dt["phone"];
                                    $inquiring = $dt["inquiring"];
                                    $identification = $dt["identification"];
                                    $gender = $dt["gender"];
                                    $ic = $dt["ic"];   
                                    $pain_id = $dt["pain_id"];
                                    $package_id = $dt["package_id"]; 
                                    $engagement_id = $dt["engagement_id"]; 
                                    $status = $dt["status"]; 
                                    $centers_id = $dt["centers_id"];
                                    $therapist_id = $dt["therapist_id"];                                
                                    $payment = $dt["payment"]; 
                                    $mri = $dt["mri"]; 
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
										<h3 class="card-title">Create New Lead Tracker</h3>
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
                                                    <label class="form-label">Contact Number</label>
                                                    <input type="text" class="form-control" name="phone" id="phone" value="<?= $phone; ?>">
                                                </div>
                                            </div>
                                           <div class="col-sm-6 col-md-6">
												<div class="form-group">
													<label class="form-label">Lead Inquiring For</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="inquiring" id="inquiring">
                                                            <option value="" <?php if($inquiring == "NULL"){ echo "selected"; }else{} ?>>-- Choose One--</option>
                                                            <option value="Patient" <?php if($inquiring == "Patient"){ echo "selected"; }else{} ?>>Patient</option>
                                                            <option value="Carer" <?php if($inquiring == "Carer"){ echo "selected"; }else{} ?>>Carer</option>
                                                            <option value="Information Only" <?php if($inquiring == "Information Only"){ echo "selected"; }else{} ?>>Information Only</option>
                                                     </select>
												</div>
											</div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Full Name as Identification</label>
                                                    <input type="text" class="form-control" name="identification" id="identification" value="<?= $identification; ?>">
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
                                                    <label class="form-label">IC Number (Registered Patient)</label>
                                                    <input type="text" class="form-control" name="ic" id="ic" value="<?= $ic; ?>">
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
                                              <label class="form-label">Any supporting document or photo of X-Ray, MRI and etc</label>
                                              <!-- <span>Any supporting document or photo of X-Ray, MRI and etc</span> -->
                                              <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="mri" id="mri" value="<?= $mri; ?>" />
                                                    <label class="custom-file-label">Choose file</label>
                                              </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Package Type</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="package" id="package">
                                                            <option label="Choose one"></option>
                                                            <?php
                                                                $sql = $conn->prepare("SELECT * FROM package");
                                                                $sql->execute();

                                                                while($read = $sql->fetch(PDO::FETCH_ASSOC))
                                                                {
                                                            ?>

                                                            <option value="<?php echo $read["package_id"]; ?>" <?php if($package_id == $read["package_id"]){ echo "selected"; } ?>>
                                                            <?php echo $read["package_display"]; ?>
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
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Status Sales</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="status" id="status">
                                                            <option value="" <?php if($status == "NULL"){ echo "selected"; }else{} ?>>-- Choose One--</option>
                                                            <option value="Close" <?php if($status == "Close"){ echo "selected"; }else{} ?>>Close</option>
                                                            <option value="Not Close" <?php if($status == "Not Close"){ echo "selected"; }else{} ?>>Not Close</option>
                                                            <option value="Pending" <?php if($status == "Pending"){ echo "selected"; }else{} ?>>Pending</option>
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
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
                                            <div class="col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Assign a Therapist</label>
                                                    <select class="form-control select2 custom-select" data-placeholder="Choose one" name="therapist" id="therapist">
                                                            <option label="Choose one"></option>
                                                            <?php
                                                                // $sql = $conn->prepare("SELECT tracker.tracker_id,tracker.lead, tracker.phone, tracker.inquiring, tracker.identification, tracker.gender, tracker.ic, tracker.pain_id, tracker.package_id, tracker.engagement_id, tracker.status, tracker.centers_id, tracker.therapist, tracker.payment, tracker.mri, tracker.created_date, tracker.user_id, tracker.created_by, user.user_id AS physio, user.name
                                                                //         FROM tracker
                                                                //         JOIN user
                                                                //           ON user.user_id = tracker.therapist");
                                                                
                                                                $sql = $conn->prepare("SELECT * FROM therapist");
                                                                
                                                                $sql->execute();

                                                                while($read = $sql->fetch(PDO::FETCH_ASSOC))
                                                                {
                                                            ?>
                                                            <option value="<?php echo $read["therapist_id"]; ?>" <?php if($therapist_id == $read["therapist_id"]){ echo "selected"; } ?>>
                                                            <?php echo $read["name"]; ?>
                                                            </option>
                                                            <?php
                                                            }
                                                            ?>
                                                      </select>
                                                </div>
                                            </div>                                            
                                            <div class="col-sm-6 col-md-6">
                                              <label class="form-label">File Related</label>
                                              <span>Please attach all the file related or others example (Payment Receipt) if applicable</span><br>                                                
                                              <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="payment" id="payment" value="<?= $payment; ?>" />
                                                    <label class="custom-file-label">Choose file</label>
                                              </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6">
                                                <div class="col-sm-3 col-md-3">
                                                    <?php 
                                                    if ($mri == ""){?>
                                                        <div class="form-group">
                                                            <img src="department/no-video.png" alt="Image" style="width: auto; height: auto;">
                                                        </div>
                                                    <?php } else {?>
                                                        <div class="form-group">
                                                            <img src="MRI/<?php echo $mri;?>" alt="Image" style="width: auto; height: auto;">
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-sm-3 col-md-3">
                                                    <?php 
                                                    if ($payment == ""){?>
                                                        <div class="form-group">
                                                            <img src="department/no-video.png" alt="Image" style="width: auto; height: auto;">
                                                        </div>
                                                    <?php } else {?>
                                                        <div class="form-group">
                                                            <img src="payment/<?php echo $payment;?>" alt="Image" style="width: auto; height: auto;">
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>


                                            
										</div>
									</div>
									<div class="card-footer text-right">
										<button type="submit" name="update" id="update" class="btn btn-primary" >Submit Lead Tracker</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					
<?php
    
    include('system-footer.php');
?>

