<?php 
	// include("session.php");
	include("connection.php");
?>
<?php 
	include('header.php');
?>
    <div class="page-banner-area bg-2">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="page-content">
					<h2>Appointment</h2>
						<ul>
							<li><a href="index.php">Home</a></li>
							<li>Appointment</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
    
	if(isset($_GET["id"]))
	    {
	        $id = $_GET["id"];
	        $sql =  "SELECT * FROM promotion where promotion_id = :id";
	        $stmt = $conn->prepare($sql);
	        $stmt->bindParam(":id", $id);
	        $stmt->execute();

	        if($dt = $stmt->fetch(PDO::FETCH_ASSOC))
	        {
	            $promotion_id = $dt["promotion_id"];
	            $title = $dt["title"];
	            $description = $dt["description"];
	            $start_date = $dt["start_date"];
	            $end_date = $dt["end_date"];
	            $image = $dt["image"];
	        }
	    }
	    else
	    {
	        echo "Data is not found!";
	    } 
?>

	<div class="appointment-area bg-color ptb-100">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="appointment-text">
						<div class="section-title-two">
							<span style="color: white;">Appointment</span>
							<h2 style="color: white;">We provide physiotherapy using latest scientific evidence technique and protocol</h2>
							<!-- <p style="color: white;">We are one of the best agency to make appoint you a good doctors into a proper way. This will help us to make a proper way of work and this is one of the of the best way for making this.</p>			 -->				
						</div>
						<div class="appointment-form">
							<form method="POST" action="inquiry1.php"  enctype="multipart/form-data">
							<div class="row">
							<div class="col-lg-12">
								<div class="form-group"><input type="text" class="form-control" id="name" name="name" placeholder="Enter your name / Sila masukan nama" required></div>
							</div>
							<div class="col-lg-12">
								<div class="form-group"><input type="email" class="form-control" id="email" name="email" placeholder="Enter your email / Sila masukan alamat email" required></div>
							</div>
							<div class="col-lg-12">
								<div class="form-group"><input type="text" class="form-control" id="contact" name="contact" placeholder="Enter your contact number / Sila masukan No Tel " required></div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">									
									<select class="form-control" name="services" id="services" required>
										<option>Select your preferred services / Sila pilih jenis rawatan</option>
										<option value="Clinic">Clinic / Rawatan Di Klinik</option>
										<option value="Housecall">Housecall /  Rawatan Ke Rumah</option>
									</select>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<textarea class="form-control" rows="6" cols="6" placeholder="Write your address / Sila masukan alamat" name="address" id="address" required></textarea>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group"><input type="text" class="form-control" id="package" name="package" value="<?php echo $title; ?>" readonly></div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<select class="form-control" name="branch" id="branch" required>
										<option>Select your preferred branch / Sila Pilih klinik berdekatan</option>
										<option value="Shah Alam">SHAH ALAM</option>
										<option value="Bandar Baru Bangi">BANDAR BARU BANGI</option>
										<option value="Bandar Puteri Bangi">BANDAR PUTERI BANGI</option>
										<option value="Kuala Selangor">KUALA SELANGOR</option>
										<option value="Kota Damansara">KOTA DAMANSARA</option>
										<option value="Wangsa Melawati">WANGSA MELAWATI</option>
										<option value="Johor Bharu">JOHOR BHARU</option>
										<option value="Krubong Melaka">KRUBONG MELAKA</option>
									</select>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<textarea class="form-control" rows="6" cols="6" placeholder="Write your message / Sila masukan mesej" name="message" id="message" required></textarea>
								</div>
							</div>							
							</div>
							<div class="appointment-btn">
								<button type="submit" name="submit" id="submit" class="default-btn three">
								Get appointment <span></span>
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


<div class="dedicated-area ptb-100">
		<div class="container">
			<div class="section-title-one">
				<h2>WHAT ARE THE CONDITIONS THAT WE TREAT ??</h2>
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