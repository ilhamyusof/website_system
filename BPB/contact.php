
<?php
include('header.php');
include('connection.php');
?>

    <div class="page-banner-area bg-2">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="page-content">
					<h2>Contact Us</h2>
						<!--<ul>-->
						<!--	<li><a href="index.php">Home</a></li>-->
						<!--	<li>Appointment</li>-->
						<!--</ul>-->
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="appointment-area bg-color ptb-100">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="appointment-text">
						<div class="section-title-two">
							<span style="color: white;">Contact Us</span>
							<h2 style="color: white; ">Best Physiotherapy Center In Malaysia</h2>	
						</div>
						<div class="appointment-form">
							<form method="POST" action="inquiry.php"  enctype="multipart/form-data">
							<div class="row">
							<div class="col-lg-12">
								<div class="form-group"><input type="text" class="form-control" id="name" name="name" placeholder="Enter your name " required></div>
							</div>
							<div class="col-lg-12">
								<div class="form-group"><input type="email" class="form-control" id="email" name="email" placeholder="Enter your email " required></div>
							</div>
							<div class="col-lg-12">
								<div class="form-group"><input type="text" class="form-control" id="contact" name="contact" placeholder="Enter your contact number" required></div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<select class="form-control" name="branch" id="branch" required>
										<option>Select your preferred location</option>
										<?php
                                            $sql = $conn->prepare("SELECT * FROM centers WHERE centers_id !='11' AND centers_id !='8'");
                                            $sql->execute();
                    
                                            while($read = $sql->fetch(PDO::FETCH_ASSOC))
                                            {
                                        ?>
                                          <option value="<?php echo $read["centers_id"] ."-".$read["name"];; ?>">
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
									<textarea class="form-control" rows="6" cols="6" placeholder="Describe your problem" name="message" id="message" required></textarea>
								</div>
							</div>							
							</div>
							<div class="appointment-btn">
								<button type="submit" name="save-8" id="save-8" class="default-btn three">
								Contact Us <span></span>
								</button>
							</div>
						</form>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
				<div class="appointment-img">
				<div class="img-one">
				<img src="assets/img/all-image-website/cust1.jpeg" alt="Image">
				</div>
				<div class="img-two">
				<img src="assets/img/all-image-website/cust2.jpeg" alt="Image">
				</div>
				<div class="img-three">
				<img src="assets/img/all-image-website/cust3.jpeg" alt="Image">
				</div>
				</div>
				</div>
			</div>
		</div>
	</div>
<!-- 
	<div class="information-area ptb-100">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="information-img">
					<img src="assets/img/appointment/appointment-4.jpg" alt="Image">
					</div>
				</div>
			<div class="col-lg-6">
				<div class="information-text">
					<div class="section-title-two ">
						<span>CONTACT US</span>
						
						<p style="text-align: justify;">You can easily make an contact us with your detail information & that will help you to connect with us all time. This will help you onto a virtual connection with all facility. You will be updated by all of our service any time and you will be benefited.</p>
					</div>
					<div class="appointment-form">
						<form>
							<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
								<input type="text" class="form-control" id="name" placeholder="Enter your name">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
								<input type="email" class="form-control" id="email" placeholder="Enter email">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
								<input type="text" class="form-control" id="contact" placeholder="Enter subject">
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<textarea class="form-control" cols="5" placeholder="Write your message"></textarea>
								</div>
							</div>
							
							</div>
							<div class="appointment-btn">
								<button type="submit" class="default-btn three">
								SEND MESSAGE <span></span>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div> -->

<div class="dedicated-area ptb-100">
		<div class="container">
			<div class="section-title-one">
				<h2>OUR SERVICES</h2>
			</div>
				<div class="dedicated-slider owl-carousel owl-theme">
					<div class="dedicated-card">
						<img src="assets/img/all-image-website/condition-04.jpg" alt="Image">
						<div class="d-card-text">
							<h3 style="color: white;">BACK PAIN</h3>
								<p1 style="font-weight: bold; color: white; text-align: justify;">Back pain is one of the great human afflictions. Strong muscles and bones, flexible tendons and ligaments are sensitive nerves that bring you a healthy spine and back</p1>
								<br><br><br>
								<div class="d-card-btn">
									<a href="newbackpain.php" class="default-btn two" style="color: white;">
									Read more
									<span></span>
									</a>
								</div>
						</div>
					</div>
					<div class="dedicated-card">
							<img src="assets/img/all-image-website/condition-01.jpg" alt="Image">
						<div class="d-card-text">
							<h3 style="color: white;">NECK PAIN</h3>
								<p1 style="font-weight: bold; color: white; text-align: justify;">Neck pain is a common complaint we get nowadays and most of us will have it at some point in our lives. Examples of common conditions are degenerative disc disease, neck strain, cervical spondylosis, poor posture and herniated disc</p1>
								<br>
								<br>
									<div class="d-card-btn">
										<a href="neckpain.php" class="default-btn two" style="color: white;">
										Read more
										<span></span>
										</a>
									</div>
						</div>
					</div>
					<div class="dedicated-card">
						<img src="assets/img/all-image-website/condition-02.jpg" alt="Image">
							<div class="d-card-text">
								<h3 style="color: white;">KNEE PAIN</h3>
								<p1 style="font-weight: bold; color: white; text-align: justify;">Movements of the knee joint are essential to many daily activities like walking, running, sitting and standing. Knee pain is a problem that affects people at all ages including osteoarthritis, ACL tear, meniscus injuries, bursitis, patella tendinitis and fracture</p1>
								<div class="d-card-btn">
									<a href="kneepain.php" class="default-btn two" style="color: white;">
									Read more
									<span></span>
									</a>
								</div>
							</div>
					</div>
					<div class="dedicated-card">
						<img src="assets/img/all-image-website/condition-03.jpg" alt="Image">
							<div class="d-card-text">
								<h3 style="color: white;">SHOULDER PAIN</h3>
								<p1 style="font-weight: bold; color: white;">Shoulder is one of the largest and most complex joint of our body. Shoulder joint is more flexible and mobile compared to other joints. However, it also makes it vulnerable and susceptible to injuries
								</p1>
								</br>
								</br>
								</br>

									<div class="d-card-btn">
										<a href="shoulderpain.php" class="default-btn two" style="color: white;">
										Read more
										<span></span>
										</a>
									</div>
							</div>
					</div>
					<div class="dedicated-card">
						<img src="assets/img/all-image-website/condition-05.jpeg" alt="Image">
							<div class="d-card-text">
								<h3 style="color: white;">PEDIATRIC DISEASES</h3>
								<p1 style="font-weight: bold; color: white;">Paediatric diseases is your child having with their movement and experiences slow...
								</p1>
								<br>
								<br>
								<br>
								<br>
								<br>
									<div class="d-card-btn">
										<a href="pediatrics.php" class="default-btn two" style="color: white;">
										Read more
										<span></span>
										</a>
									</div>
							</div>
					</div>
					<!--<div class="dedicated-card">-->
					<!--	<img src="assets/img/all-image-website/condition-06.jpeg" alt="Image">-->
					<!--		<div class="d-card-text">-->
					<!--			<h3 style="color: white;">STROKE RECOVERY</h3>-->
					<!--			<p1 style="font-weight: bold; color: white;">Stroke is one of the most common causes of disability among its sufferers. Every year, more than 17 million people in the worldwide experience stroke. From that total.-->
					<!--			</p1>-->
					<!--			<br>-->
					<!--			<br>-->
					<!--			<br>-->
								
					<!--				<div class="d-card-btn">-->
					<!--					<a href="stroke.php" class="default-btn two" style="color: white;">-->
					<!--					Read more-->
					<!--					<span></span>-->
					<!--					</a>-->
					<!--				</div>-->
					<!--		</div>-->
					<!--</div>-->
				</div>
			</div>
			</div>



<?php
	include('footer.php');
 ?>