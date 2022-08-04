<?php 
include('header.php');
include('connection.php');
?>


<div class="page-banner-area bg-2">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="page-content">
					    <img src="assets/img/all-image-website/headline-01-aboutus.png" alt="Image">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="agency-area ptb-100">
		<div class="container">
			<div class="row align-items-center">
				<!--<div class="col-lg-6">-->
				<!--	<div class="agency-img">-->
				<!--	<img src="assets/img/all-image-website/about-01-info.png" alt="Image">-->
				<!--	</div>-->
				<!--	</div>-->
					<div class="col-lg-12">
					<div class="agency-text">
						<div class="section-title-two">
							<h2 style="text-align: justify; text-transform: uppercase;">About Us</h2>
							<p style="text-align: justify;">Our aim has always become the best physiotherapy service provider in Malaysia. We believe with our capability and capacity to focus on our ‘heart and soul’ specialties in Musculoskeletal Disorders such as Back Pain, Neck Pain, Shoulder Pain, Knee Pain, Slipped Disc, and many more.</p>
						    <p style="text-align: justify;">Since 2016, we helped more than 30,000 patients to gain back their confidence, we eliminate those fear with their pain, we restore their happiness to have a healthy and active lifestyle back on track. Physiomobile also provides comprehensive and intensive rehabilitation with Neurological Problem, Sport Injuries, Pediatrics, Geriatrics as well as Post-Surgery patients.</p>
						    <!--<p style="text-align: justify;">Since 2016, we helped more than 30,000 patients to gain back their confidence, we eliminate those fear with their pain, we restore their happiness to have a healthy and active lifestyle back on track. Physiomobile also provides comprehensive and intensive rehabilitation with Neurological Problem, Sport Injuries, Pediatrics, Geriatrics as well as Post-Surgery patients.</p>-->
						    <p style="text-align: justify;">With 12 branches all around Malaysia, we are committed to serve our community with our in-house expert Physiotherapist to give the best treatment. Not only that, Physimobile also provides a modern machine as a supplementary tool to speed up the recovery of our patients.</p>
						    <p style="text-align: justify;">As we believe there are some communities who need our services but can’t afford to come to our center, we can go to their house as well (Less than 25km). As we expand, we always believe everyone deserves to get the best treatment and own a healthy lifestyle.</p>
						    <p style="text-align: justify;">You can go to the  <a href="https://physiomobile.com/location.php" style="color: black;"><u>nearest branch</u></a> to get the best consultation that suits your needs and let us be part of your healing journey!</p>
						</div>
							<div class="agency-btn">
								<a href="https://www.youtube.com/watch?v=DrKqYl5cdJQ" class="popup-youtube">
								 <i class='bx bx-play'></i>
								</a>
								<h3 style="text-align: justify;">Let’s see our intro 2021 CEO opening speech</h3>
								<p> Our mission is to make a good healthy for you. </p>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <div class="information-vision ptb-100">
		<div class="container" style="background-image: url("assets/img/all-image-website/visionmission-01.jpg");">
			<div class="row">
				<div class="col-lg-6">
					<div class="about-text">
						<div class="section-title-two">
							<h2 style="text-align: justify; color : #94171B">VISION</h2>
							<ul>
							    <li><i class='bx bx-street-view' style="text-align: justify; color : #94171B"></i> &nbsp;To Enriching Human kind’s Quality of Life in South East Asia</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="about-text">
						<div class="section-title-two">
							<h2 style="text-align: justify; color : #94171B">MISSION</h2>
							<ul>
								<li><i class='bx bx-street-view' style="text-align: justify; color : #94171B"></i> &nbsp;Inspiring people to live a good life through an excellent customer experience</li>
								<li><i class='bx bx-heart' style="text-align: justify; color : #94171B"></i> &nbsp;Creating healthier community by applying latest evidence based interventions</li>
								<li><i class='bx bx-user-voice' style="text-align: justify; color : #94171B"></i> &nbsp;Connecting quality healthcare to everyone</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="information-area ptb-100">
		<div class="container">
			<div class="row align-items-center">
			<div class="col-lg-8">
				<div class="information-text">
					<div class="section-title-two three">
						<h2 style=" text-transform: uppercase;">Unbearable pain? Talk to us now!</h2>
						<p>Hard to explain? We always here to listen to your problem.</p>
					</div>
					<div class="appointment-form">
							<form method="POST" action="inquiry.php"  enctype="multipart/form-data">
							<div class="row">
							<div class="col-lg-6">
								<div class="form-group"><input type="text" class="form-control" id="name" name="name" placeholder="Enter your name " required></div>
							</div>
							<div class="col-lg-6">
								<div class="form-group"><input type="email" class="form-control" id="email" name="email" placeholder="Enter your email " required></div>
							</div>
							<div class="col-lg-6">
								<div class="form-group"><input type="text" class="form-control" id="contact" name="contact" placeholder="Enter your contact number" required></div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<select class="form-control" name="branch" id="branch" required>
										<option>Select your preferred location</option>
										<?php
                                            $sql = $conn->prepare("SELECT * FROM centers WHERE centers_id !='11' AND centers_id !='8' AND centers_id !='7'");
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
			</div>
		</div>
	</div>
	<div class="about-text">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
				<iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d3984.090145556083!2d101.55322694986229!3d3.0705853544770534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x31cc4d0922b8a59d%3A0x96ee728c375f24e4!2sPHYSIOMOBILE%20SHAH%20ALAM%20(CLINIC)%2C%20No%2027%20Kondominium%20Indah%20Alam%2C%20No%204%20Jalan%20Jubli%20Perak%2022%2F1%2C%20Shah%20Alam%2C%2040300%20Shah%20Alam%2C%20Selangor!3m2!1d3.0705799999999996!2d101.555421!5e0!3m2!1sen!2smy!4v1619771625580!5m2!1sen!2smy" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				</div>
			</div>
		</div>
	</div>
<!-- 
	<div class="contact-map">
<div class="container-fluid">
<iframe width="600" height="450" style="border:0" loading="lazy" allowfullscreen src="https://www.google.com/maps/embed/v1/place?q=physiomobile%20shah&key=AIzaSyAT-FAOW8tMw1VdVWUYVCYYo5NC4Nrt_bU"></iframe>
</div>
</div> -->


<?php 
include('footer.php');
?>