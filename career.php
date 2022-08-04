<?php 
	// include("session.php");
	include("connection.php");
?>
<?php include('header.php');?>


    <div class="page-banner-area bg-2">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="page-content">
					<h2>Career</h2>
						<ul>
							<li><a href="index.php">Home</a></li>
							<li>Career</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="appointment-area  ptb-100">
		<div class="container">
			<div class="section-title-one">
				<h2>WHY PHYSIOMOBILE ?</h2>
				</div>
			<div class="row align-items-center">
				<div class="col-lg-12">
					<div class="appointment-text">
						<div class="section-title-two">
							<div class="row">
								<div class="col-lg-4 col-sm-6">
									<div class="service-card">
										<i class='bx bx-history main-icon'></i>&nbsp;&nbsp;&nbsp;&nbsp;<a style="font-size:15px; font-weight: bold;">Flexible Working Hours</a>
									</div>
								</div>
								<div class="col-lg-4 col-sm-6">
									<div class="service-card">
										<i class='bx bx-strikethrough main-icon'></i>&nbsp;&nbsp;&nbsp;&nbsp;<a style="font-size:15px;font-weight: bold;">Latest Devices/Equipment</a>
									</div>
								</div>
								<div class="col-lg-4 col-sm-6">
									<div class="service-card">
										<i class='bx bx-coffee-togo main-icon'></i>&nbsp;&nbsp;&nbsp;&nbsp;<a style="font-size:15px; font-weight: bold;">Free Snack & Drink</a>
									</div>
								</div>
								<div class="col-lg-4 col-sm-6">
									<div class="service-card">
										<i class='bx bx-user-voice main-icon'></i>&nbsp;&nbsp;&nbsp;&nbsp;<a style="font-size:15px; font-weight: bold;">E-HR System</a>
									</div>
								</div>
								<div class="col-lg-4 col-sm-6">
									<div class="service-card">
										<i class='bx bx-briefcase main-icon'></i>&nbsp;&nbsp;&nbsp;&nbsp;<a style="font-size:15px; font-weight: bold;">Lenient Dress Code</a>
									</div>
								</div>
								<div class="col-lg-4 col-sm-6">
									<div class="service-card">
										<i class='bx bx-radio main-icon'></i>&nbsp;&nbsp;&nbsp;&nbsp;<a style="font-size:15px; font-weight: bold;">Young & Vibrant Culture</a>
									</div>
								</div>
							
						</div>
						
					</div>
				</div>
			
			</div>
		</div>
	</div>
</div>

		<div class="container">
			<div class="section-title-one">
				<h2>CAREER AT PHYSIOMOBILE</h2>
				</div>
			<div class="row align-items-center">
				<div class="col-lg-12">
					<div class="appointment-text">
						<div class="section-title-two">
							<div class="row">
								<div class="col-lg-4 col-sm-6">
									<div class="service-card">
										<i class='bx bx-briefcase main-icon'></i>
										<h3 style="text-transform: uppercase;">corporate executives</h3>
										<?php 
										$statement = $conn->prepare("SELECT
				                              (SELECT COUNT(*) FROM job where status = 'Open' AND Category IN ('Corporate','IT'))
				                              AS cnt");
				                             $statement->execute();
				                             while($row = $statement->fetch(PDO::FETCH_ASSOC))
				                            {
				                                 $corporate = $row["cnt"]; 
                                                
										?>
										<?php if ($corporate != "0") {?>
										<!--<p style="font-weight: bold; color: #94171B;"><?php //echo $corporate; ?>  Position</p>-->
											<div style="text-align: right;" class="view-more">
												<a href="detail-job3.php" id="submit">View More<i class='bx bx-right-arrow-alt'></i></a>
											</div>
										<?php } else {} }?>	
									</div>
								</div>
							
								<div class="col-lg-4 col-sm-6">
									<div class="service-card">
										<i class='bx bx-briefcase main-icon'></i>
										<h3 style="text-transform: uppercase;">Physiotherapist</h3>
										<?php 
										$statement = $conn->prepare("SELECT
				                              (SELECT COUNT(*) FROM job where status = 'Open' AND Category = 'Physio')
				                              AS cnt");
				                             $statement->execute();
				                             while($row = $statement->fetch(PDO::FETCH_ASSOC))
				                            {
				                                 $Operation = $row["cnt"]; 
                                                
										?>
										<?php if ($Operation != "0") {?>
										<!--<p style="font-weight: bold; color: #94171B;"><?php // echo $Operation; ?> Position</p>-->
											<div style="text-align: right;" class="view-more">
												<a href="detail-job5.php" id="submit">View More<i class='bx bx-right-arrow-alt'></i></a>
											</div>
										<?php } else {} }?>
									</div>
								</div>
								<div class="col-lg-4 col-sm-6">
									<div class="service-card">
										<i class='bx bx-briefcase main-icon'></i>
										<h3 style="text-transform: uppercase;">Clinic Assistant </h3>
										<?php 
										$statement = $conn->prepare("SELECT
				                              (SELECT COUNT(*) FROM job where status = 'Open' AND Category = 'CA')
				                              AS cnt");
				                             $statement->execute();
				                             while($row = $statement->fetch(PDO::FETCH_ASSOC))
				                            {
				                                 $Creatives = $row["cnt"]; 
                                                
										?>
										<?php if ($Creatives != "0") {?>
										<!--<p style="font-weight: bold; color: #94171B;"><?php // echo $Creatives; ?> Position</p>-->
											<div style="text-align: right;" class="view-more">
												<a href="detail-job6.php" id="submit">View More<i class='bx bx-right-arrow-alt'></i></a>
											</div>
										<?php } else {} }?>
									</div>
								</div>
								<div class="col-lg-4 col-sm-6">
									<div class="service-card">
										<i class='bx bx-briefcase main-icon'></i>
										<h3 style="text-transform: uppercase;">others </h3>
										<?php 
										$statement = $conn->prepare("SELECT
				                              (SELECT COUNT(*) FROM job where status = 'Open' AND Category = 'Other')
				                              AS cnt");
				                             $statement->execute();
				                             while($row = $statement->fetch(PDO::FETCH_ASSOC))
				                            {
				                                 $others = $row["cnt"]; 
                                                
										?>
										<?php if ($others != "0") {?>
										<!--<p style="font-weight: bold; color: #94171B;"><?php //echo $others; ?>  Position</p>-->
											<div style="text-align: right;" class="view-more">
												<a href="detail-job7.php" id="submit">View More<i class='bx bx-right-arrow-alt'></i></a>
											</div>
										<?php } else {} }?>
									</div>
								</div>
								<div class="col-lg-4 col-sm-6">
									<div class="service-card">
										<i class='bx bx-briefcase main-icon'></i>
										<h3 style="text-transform: uppercase;">Industrial Training</h3>
										<?php 
										$statement = $conn->prepare("SELECT
				                              (SELECT COUNT(*) FROM job where status = 'Open' AND Category = 'Intern')
				                              AS cnt");
				                             $statement->execute();
				                             while($row = $statement->fetch(PDO::FETCH_ASSOC))
				                            {
				                                 $Interns = $row["cnt"]; 
                                                
										?>
										<?php if ($Interns != "0") {?>
										<!--<p style="font-weight: bold; color: #94171B;"><?php // echo $Interns; ?> Position</p>-->
											<div style="text-align: right;" class="view-more">
												<a href="detail-job2.php" id="submit">View More<i class='bx bx-right-arrow-alt'></i></a>
											</div>
										<?php } else {} }?>							
									</div>
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