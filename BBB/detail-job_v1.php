
<?php
  
    // include("session.php");

    // date_default_timezone_set("Asia/Kuala_Lumpur");

    // if (!isset($_SESSION['session']) && !isset($_SESSION['job'])) {
    //     header('Location: login.php');
    //     session_destroy();
    // }

    // $job = $_SESSION["job"];
    // $now = date("Y-m-d");
?>
<?php
include('header.php');
include('connection.php');
?>

<?php 
    
	if(isset($_GET["id"]))
	    {
	        $id = $_GET["id"];
	        $sql =  "SELECT * FROM job where job_id = :id";
	        $stmt = $conn->prepare($sql);
	        $stmt->bindParam(":id", $id);
	        $stmt->execute();

	        if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
	        {
	            $job_id = $dt["job_id"];
	            $title = $dt["title"];
	            $type = $dt["type_job"];
	            $salary = $dt["salary"];
	            $location = $dt["location"];
	            $description = $dt["description"];
	            $requirement = $dt["requirement"];
	            $benefit = $dt["benefit"];
	            $company = $dt["company"];
	        }
	    }
	    else
	    {
	        echo "Data is not found!";
	    } 
?>

	<div class="services-dateils-area ptb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="services-details">
					<div class="details-text">
						<h2><?php echo $title; ?></h2>
						<!-- <span style="font-weight: bold;">Location</span> <a><?php echo $location; ?></a><br>  -->
						<span  style="font-weight: bold;">Range Salary</span> <a><?php echo $salary; ?></a><br>
						<span  style="font-weight: bold;"><?php echo $type; ?></span> <br><br>

						<h6>Company Overview</h6>
						<p style="text-align: justify;"><?php echo $company; ?>
						</p>

						<h6>Job Description</h6>
						<br>
							<?php echo $description; ?>
						<br>
						<h6>Job Requirement</h6>
						<br>
							<?php echo $requirement; ?>
						<br>
						<h6>Perks & Benefits</h6>
						<br>
							<ol><?php echo $benefit; ?></ol>
						<!-- <p style="text-align: justify;"><?php echo $benefit; ?> -->
						</p>
					</div>
					
		</div>
	</div>


	<div class="col-lg-4 col-md-12">
		<div class="services-dateils-area bg-color ptb-100">
			<div class="col-lg-4 col-lg-12 col-md-12">
			<div class="appointment-form">
				<h2  style="color: white; text-align: center;">Application Form</h2><br>
							<form method="POST" action="send_career.php"  enctype="multipart/form-data">
							<div class="row">
								<div class="col-lg-12">
									<label style="color: white;">Name</label>
									<div class="form-group"><input type="text" class="form-control" id="name" name="name" placeholder="Enter your name"></div>
								</div>
								<div class="col-lg-12">
									<label style="color: white;">Email</label>
									<div class="form-group"><input type="email" class="form-control" id="email" name="email" placeholder="Enter email"></div>
								</div>
								<div class="col-lg-12">
									<label style="color: white;">Contact Number</label>
									<div class="form-group"><input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Contract number"></div>
								</div>
								<div class="col-lg-12">
									<label style="color: white;">Position Apply</label>
									<div class="form-group"><input type="text" class="form-control" id="position" name="position" value="<?php echo $title; ?>" readonly></div>
									<div class="form-group"><input type="text" class="form-control" id="job_id" name="job_id" value="<?php echo $job_id; ?>" hidden></div>
								</div>
								<div class="col-lg-12">
								<div class="form-group">
									<label style="color: white;">Location</label>
									<select class="form-control" name="location" id="location" required>
										<option>Select your preferred location</option>
										<!-- <option value="Shah Alam">SHAH ALAM</option>
										<option value="Bandar Baru Bangi">BANDAR BARU BANGI</option>
										<option value="Bandar Puteri Bangi">BANDAR PUTERI BANGI</option>
										<option value="Kuala Selangor">KUALA SELANGOR</option>
										<option value="Kota Damansara">KOTA DAMANSARA</option>
										<option value="Wangsa Melawati">WANGSA MELAWATI</option>
										<option value="Johor Bharu">JOHOR BHARU</option>
										<option value="Krubong Melaka">KRUBONG MELAKA</option> -->										
										<?php
                                            $sql = $conn->prepare("SELECT * FROM centers WHERE centers_id = '8'");
                                            $sql->execute();

                                            while($read = $sql->fetch(PDO::FETCH_ASSOC))
                                            {
                                        ?>
                                          <option value="<?php echo $read["centers_id"]; ?>">
                                            <?php echo $read["name"]; ?>
                                          </option>
                                        <?php
                                        }
                                        ?>
									</select>
								</div>
							</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label style="color: white;">Resume</label>
										<div class="form-group"><input type="file" class="form-control" id="resume" name="resume"></div>
									</div>
								</div>							
							</div>
							<div class="appointment-btn"> 
								<button type="submit" name="submit" id="submit" class="default-btn three">
								SEND APPLICATION <span></span>
								</button>
							</div>
						</form>
			</div>
			</div>
		</div>
	</div>


	 </div>
	</div>
	</div>






<?php 
include('footer.php');
?>