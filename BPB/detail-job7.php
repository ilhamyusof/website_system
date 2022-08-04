
<?php
include('header.php');
include('connection.php');
?>


	


<div class="appointment-area  ptb-100">	
	<div class="container">
		<div class="section-title-one">
			<h2>CAREER AT PHYSIOMOBILE</h2>
		</div>
			<div class="row align-items-center">
				<div class="col-lg-12">
					<div class="appointment-text">
						<div class="section-title-two">
							<div class="row">
								 <?php 
                                    
                                    $stmt = $conn->prepare('SELECT * FROM job WHERE status = "Open" AND Category = "Other"');
                                    $stmt->execute();
                                    
                                    while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                                     extract($row);      
                                ?>
								<div class="col-lg-4 col-sm-6">
									<div class="service-card">
										<i class='bx bx-briefcase main-icon'></i>
										<h3><?php echo $title; ?></h3>
										<div class="view-more">
												<i class='bx bx-location-plus'></i>&nbsp;<a><?php echo $location; ?></a>
										</div>	
											<div style="text-align: right;" class="view-more">
												<a href="detail-job.php?id=<?php echo $job_id; ?>">Apply Now<i class='bx bx-right-arrow-alt'></i></a>
											</div>
									</div>
								</div>
								 <?php
                                   }
                                   ?>
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