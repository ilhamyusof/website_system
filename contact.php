
<?php
include('header.php');
include('connection.php');
?>

 <!--   <div class="page-banner-area bg-2">-->
	<!--	<div class="d-table">-->
	<!--		<div class="d-table-cell">-->
	<!--			<div class="container">-->
	<!--				<div class="page-content">-->
	<!--				<h2>Contact Us</h2>-->
						<!--<ul>-->
						<!--	<li><a href="index.php">Home</a></li>-->
						<!--	<li>Appointment</li>-->
						<!--</ul>-->
	<!--				</div>-->
	<!--			</div>-->
	<!--		</div>-->
	<!--	</div>-->
	<!--</div>-->


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
 

<div class="dedicated-area pt-100 pb-100">
    		<div class="container">
    			<div class="section-title-three">
    				<h2>OUR SERVICES</h2>
    			</div>
				<div class="dedicated-slider owl-carousel owl-theme">
					<div class="dedicated-card">
						<img src="assets/img/all-image-website/services-01-condition.png" title="MUSCULOSKELETAL DISORDER" alt="MUSCULOSKELETAL DISORDER">
						<div class="d-card-text">
							<h3 style="color: white;">MUSCULOSKELETAL DISORDER</h3>
								<div class="offer-text">
    							    <div class="section-title-one">
    									<ul>
        									<li style="text-align: justify; color :#fff; font-weight: bold;"><a href="neckpain.php"><i class='bx bx-check-circle'></i><u>NECK PAIN </u></li></a>
        									<li style="text-align: justify; color :#fff; font-weight: bold;"><a href="newbackpain.php"><i class='bx bx-check-circle'></i><u>BACK PAIN </u></li></a>
        									<li style="text-align: justify; color :#fff; font-weight: bold;"><a href="kneepain.php"><i class='bx bx-check-circle'></i><u>KNEE PAIN </u></li></a>
        									<li style="text-align: justify; color :#fff; font-weight: bold;"><a href="spondylosis.php"><i class='bx bx-check-circle'></i><u>SPONDYLOSIS </u></li></a>
        									<li style="text-align: justify; color :#fff; font-weight: bold;"><a href="slipdisc.php"><i class='bx bx-check-circle'></i><u>SLIP DISC </u></li></a>
        									<li style="text-align: justify; color :#fff; font-weight: bold;"><a href="osteoarthritis.php"><i class='bx bx-check-circle'></i><u>OSTEOARTHRITIS </u></li></a>
        									<li style="text-align: justify; color :#fff; font-weight: bold;"><a href="frozen_shoulder.php"><i class='bx bx-check-circle'></i><u>FROZEN SHOULDER </u></li></a>
        									<li style="text-align: justify; color :#fff; font-weight: bold;"><a href="trigger_finger.php"><i class='bx bx-check-circle'></i><u>TRIGGER FINGER </u></li></a>
    							        </ul>
    								</div>
                                </div>
								<!--<div class="d-card-btn">-->
								<!--	<a href="newbackpain.php" class="default-btn two" style="color: white;">-->
								<!--	Read more-->
								<!--	<span></span>-->
								<!--	</a>-->
								<!--</div>-->
						</div>
					</div>
					<div class="dedicated-card">
							<img src="assets/img/all-image-website/services-02-condition.png" title="NEUROLOGICAL DISORDER" alt="NEUROLOGICAL DISORDER">
						<div class="d-card-text">
							<h3 style="color: white;">NEUROLOGICAL DISORDER</h3>
    								<div class="section-title-one">
        									<ul>
            									<li style="text-align: justify; color :#fff; font-weight: bold;"><a href="stroke.php"><i class='bx bx-check-circle'></i><u>STROKE </u></li></a>
            									<li style="text-align: justify; color :#fff; font-weight: bold;"><a href="parkinson.php"><i class='bx bx-check-circle'></i><u>PARKINSON DISEASE </u></li></a>
            									<li style="text-align: justify; color :#fff; font-weight: bold;"><a href="spinal_cord_injury.php"><i class='bx bx-check-circle'></i><u>SPINAL CORD INJURY </u></li></a>
            									<li style="text-align: justify; color :#fff; font-weight: bold;"><a href="myasthenia_grevis.php"><i class='bx bx-check-circle'></i><u>MYASTHENIA GREVIS </u></li></a>
            									<li style="text-align: justify; color :#fff; font-weight: bold;"><a href="multiple_sclerosis.php"><i class='bx bx-check-circle'></i><u>MULTIPLE SCLEROSIS </u></li></a>    
        							        </ul>
        							</div>
									<!--<div class="d-card-btn">-->
									<!--	<a href="neckpain.php" class="default-btn two" style="color: white;">-->
									<!--	Read more-->
									<!--	<span></span>-->
									<!--	</a>-->
									<!--</div>-->
									<br><br><br><br>
						</div>
					</div>
					<div class="dedicated-card">
						<img src="assets/img/all-image-website/services-03-condition.png" title="GERIATRIC CONDITION" alt="GERIATRIC CONDITION">
							<div class="d-card-text">
								<h3 style="color: white;">GERIATRIC CONDITION</h3>
								    <div class="section-title-one">
        									<ul>
            									<li style="text-align: justify; color :#fff; font-weight: bold;"><a href="geriatric_condition.php"><i class='bx bx-check-circle'></i><u> CONDITIONING PROGRAM FOR FUNCTIONAL TRAINING </u></li></a>
            									<br><br><br><br><br><br><br>
        							        </ul>
        							</div>
								<!--<div class="d-card-btn">-->
								<!--	<a href="kneepain.php" class="default-btn two" style="color: white;">-->
								<!--	Read more-->
								<!--	<span></span>-->
								<!--	</a>-->
								<!--</div>-->
							</div>
					</div>
					<div class="dedicated-card">
						<img src="assets/img/all-image-website/services-04-condition.png" title="PEDIATRIC CONDITION" alt="PEDIATRIC CONDITION">
							<div class="d-card-text">
								<h3 style="color: white;">PEDIATRIC CONDITION</h3>
								    <div class="section-title-one">
        									<ul>
            									<li style="text-align: justify; color :#fff; font-weight: bold;"><a href="cerebral_palsy.php"><i class='bx bx-check-circle'></i><u>CEREBRAL PALSY </u></li></a>
            									<li style="text-align: justify; color :#fff; font-weight: bold;"><a href="scoliosis.php"><i class='bx bx-check-circle'></i><u>SCOLIOSIS </u></li></a>
            									<li style="text-align: justify; color :#fff; font-weight: bold;"><a href="torticollis.php"><i class='bx bx-check-circle'></i><u>TORTICOLLIS </u></li></a>
            									<li style="text-align: justify; color :#fff; font-weight: bold;"><a href="muscular_dystrophy.php"><i class='bx bx-check-circle'></i><u>MUSCULAR DYSTROPHY </u></li></a>
            									<li style="text-align: justify; color :#fff; font-weight: bold;"><a href="growth_development_delay.php"><i class='bx bx-check-circle'></i><u>GROWTH DEVELOPMENTAL DELAY </u></li></a>
            								
        							        </ul>
        							</div>
								</br>
								</br>
								</br>
								</br>
									
							</div>
					</div>
					<div class="dedicated-card">
						<img src="assets/img/all-image-website/services-05-condition.png" title="SPORT INJURIES" alt="SPORT INJURIES">
							<div class="d-card-text">
								<h3 style="color: white;">SPORT INJURIES</h3>
								    <div class="section-title-one">
        									<ul>
            									<li style="text-align: justify; color :#fff; font-weight: bold;"><a href="sport_injuries.php"><i class='bx bx-check-circle'></i><u>POST LIGAMENTOUS INJURY </u></li></a>
            									<br><br><br><br>
        							        </ul>
        							</div>
								<br></br></br>
								<br>
							</div>
					</div>
					<div class="dedicated-card">
						<img src="assets/img/all-image-website/services-06-condition.png" title="POST ADMISSION" alt="POST ADMISSION">
							<div class="d-card-text">
								<h3 style="color: white;">POST ADMISSION</h3>
								<div class="section-title-one">
        									<ul>
            									<li style="text-align: justify; color :#fff; font-weight: bold;"><a href="cardiorespiratory_rehabilitation.php"><i class='bx bx-check-circle'></i><u>CARDIORESPIRATORY REHABILITATION </u></li></a>
            									<li style="text-align: justify; color :#fff; font-weight: bold;"><a href="post_covid19.php"><i class='bx bx-check-circle'></i><u>POST COVID-19 REHABILITATION </u></li></a>
            									<br><br><br><br></br>
        							        </ul>
        							</div>
								<br>
								
									<!--<div class="d-card-btn">-->
									<!--	<a href="stroke.php" class="default-btn two" style="color: white;">-->
									<!--	Read more-->
									<!--	<span></span>-->
									<!--	</a>-->
									<!--</div>-->
							</div>
					</div>
					
				</div>
			</div>
		</div>
		<div class="team-area  bg-f6f4ff ptb-100">
			<div class="container">
				<div class="section-title-one">
					<span style="font-weight: bold;">OUR BRANCH </span>
					<h2>FIND US </h2>
				</div>
				<div class="team-slider owl-carousel owl-theme">
					<div class="team-card">
						<a href="">
							<img src="assets/img/all-image-website/outlet-kd.jpg" title="PHYSIOMOBILE KOTA DAMANSARA" alt="PHYSIOMOBILE KOTA DAMANSARA">
						</a>
						<div class="caption">
							<h3><a href="https://www.google.com/maps/dir/2.9070062,101.604402/PHYSIOMOBILE+KOTA+DAMANSARA,+Jalan+Cecawi+6%2F33,+Seksyen+6+Kota+Damansara,+Petaling+Jaya,+Selangor/@3.0350115,101.4421285,11z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x31cc4fdc72066f57:0xde2f95452a83dcce!2m2!1d101.5816867!2d3.1621378">KOTA DAMANSARA</a></h3>
							<span>Klinik PhysioMobile Kota Damansara, No 41-G, Jalan Cecawi 6/33, Kota Damansara,Seksyen 6, 47810 Petaling Jaya, Selangor.</span>
								<ul class="social-link">
									<li>
										<a href="https://www.google.com/maps/dir/2.9070062,101.604402/PHYSIOMOBILE+KOTA+DAMANSARA,+Jalan+Cecawi+6%2F33,+Seksyen+6+Kota+Damansara,+Petaling+Jaya,+Selangor/@3.0350115,101.4421285,11z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x31cc4fdc72066f57:0xde2f95452a83dcce!2m2!1d101.5816867!2d3.1621378" target="_blank">
										<i class='bx bx-been-here bg-2'></i>
										</a>
									</li>
									<li>
										<a href="tel:+60192079642" target="_blank">
										<i class='bx bx-phone bg-3'></i>
										</a>
									</li>
									<li>
										<a href="https://www.facebook.com/physiomobileKD" target="_blank">
										<i class='bx bxl-facebook bg-1'></i>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/physiomobile.my_kd/" target="_blank">
										<i class='bx bxl-instagram bg-4'></i>
										</a>
									</li>
								</ul>
						</div>
					</div>
					<div class="team-card">
						<a href="#">
							<img src="assets/img/all-image-website/outlet-kualaselangor.jpg" title="PHYSIOMOBILE KUALA SELANGOR" alt="PHYSIOMOBILE KUALA SELANGOR">
						</a>
							<div class="caption">
								<h3><a href="https://www.google.com/maps/dir/Singapore/PHYSIOMOBILE+KUALA+SELANGOR+(CLINIC),+No.+19,+Ground+Floor+Jalan+Taman,+Jalan+Warisan+1,+Taman+Warisan,+45000+Kuala+Selangor,+Selangor/@2.3185277,101.4352256,8z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x31da11238a8b9375:0x887869cf52abf5c4!2m2!1d103.819836!2d1.352083!1m5!1m1!1s0x31ccf5c1522bb329:0xc07e5e0d5b733851!2m2!1d101.257358!2d3.3307743">KUALA SELANGOR</a></h3>
								<span>Klinik PhysioMobile Kuala Selangor, No 19-G, Jalan Warisan 1, Taman Warisan,
45000 Kuala Selangor, Selangor.</span>
								<ul class="social-link">
									<li>
										<a href="https://www.google.com/maps/dir/Singapore/PHYSIOMOBILE+KUALA+SELANGOR+(CLINIC),+No.+19,+Ground+Floor+Jalan+Taman,+Jalan+Warisan+1,+Taman+Warisan,+45000+Kuala+Selangor,+Selangor/@2.3185277,101.4352256,8z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x31da11238a8b9375:0x887869cf52abf5c4!2m2!1d103.819836!2d1.352083!1m5!1m1!1s0x31ccf5c1522bb329:0xc07e5e0d5b733851!2m2!1d101.257358!2d3.3307743" target="_blank">
										<i class='bx bx-target-lock bg-2'></i>
										</a>
									</li>
									<li>
										<a href="tel:+60332812697" target="_blank">
										<i class='bx bx-phone bg-3'></i>
										</a>
									</li>
									<li>
										<a href="https://www.facebook.com/physiomobileks" target="_blank">
										<i class='bx bxl-facebook bg-1'></i>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/physiomobile.my_ks/" target="_blank">
										<i class='bx bxl-instagram bg-4'></i>
										</a>
									</li>
								</ul>
							</div>
					</div>
					<div class="team-card">
						<a href="#">
							<img src="assets/img/all-image-website/outlet-wm.jpg" title="PHYSIOMOBILE WANGSA MELAWATI" alt="PHYSIOMOBILE WANGSA MELAWATI">
						</a>
							<div class="caption">
							<h3><a href="https://www.google.com/maps/dir/2.9070062,101.604402/PHYSIOMOBILE+WANGSA+MELAWATI,+No+45+Jalan+Dataran+Wangsa+1,+Lor+Dataran+Wangsa,+Wangsa+Melawati,+53100+Kuala+Lumpur/@3.0589805,101.51567,11z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x31cc395e8d08be39:0xf83cb4e1964f17c8!2m2!1d101.7426772!2d3.2097992">WANGSA MELAWATI</a></h3>
							<span>Klinik PhysioMobile Malaysia, No 45. Jalan Dataran Wangsa 1,53100 Wangsa Melawati, Kuala Lumpur</span>
								<ul class="social-link">
									<li>
										<a href="https://www.google.com/maps/dir/2.9070062,101.604402/PHYSIOMOBILE+WANGSA+MELAWATI,+No+45+Jalan+Dataran+Wangsa+1,+Lor+Dataran+Wangsa,+Wangsa+Melawati,+53100+Kuala+Lumpur/@3.0589805,101.51567,11z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x31cc395e8d08be39:0xf83cb4e1964f17c8!2m2!1d101.7426772!2d3.2097992" target="_blank">
										<i class='bx bx-target-lock bg-2'></i>
										</a>
									</li>
									<li>
										<a href="tel:+60199829642" target="_blank">
										<i class='bx bx-phone bg-3'></i>
										</a>
									</li>
									<li>
										<a href="https://www.facebook.com/PhysioMobileKL" target="_blank">
										<i class='bx bxl-facebook bg-1'></i>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/physiomobile.my_kl/" target="_blank">
										<i class='bx bxl-instagram bg-4'></i>
										</a>
									</li>
								</ul>
							</div>
					</div>
					<div class="team-card">
						<a href="#">
							<img src="assets/img/all-image-website/outlet-sa.jpg" title="PHYSIOMOBILE SHAH ALAM" alt="PHYSIOMOBILE SHAH ALAM">
						</a>
							<div class="caption">
							<h3><a href="https://www.google.com/maps/dir/2.9070062,101.604402/physiomobile+shah+alam/@2.9889957,101.5064073,12z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x31cc4d0922b8a59d:0x96ee728c375f24e4!2m2!1d101.555421!2d3.07058">SHAH ALAM</a></h3>
							<span>Klinik PhysioMobile Malaysia, 27-G, Indah Alam Condominium, Jalan Jubli Perak 22/1, 40300 Shah Alam, Selangor</span>
								<ul class="social-link">
									<li>
										<a href="https://www.google.com/maps/dir/2.9070062,101.604402/physiomobile+shah+alam/@2.9889957,101.5064073,12z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x31cc4d0922b8a59d:0x96ee728c375f24e4!2m2!1d101.555421!2d3.07058" target="_blank">
										<i class='bx bx-target-lock bg-2'></i>
										</a>
									</li>
									<li>
										<a href="tel:+601898896422" target="_blank">
										<i class='bx bx-phone bg-3'></i>
										</a>
									</li>
									<li>
										<a href="https://www.facebook.com/physiomobile.my" target="_blank">
										<i class='bx bxl-facebook bg-1'></i>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/physiomobile.my/" target="_blank">
										<i class='bx bxl-instagram bg-4'></i>
										</a>
									</li>
								</ul>
							</div>
					</div>
					<div class="team-card">
						<a href="#">
							<img src="assets/img/all-image-website/outlet-bpb.jpg" title="PHYSIOMOBILE BANDAR PUTERI BANGI" alt="PHYSIOMOBILE BANDAR PUTERI BANGI">
						</a>
							<div class="caption">
							<h3><a href="https://www.google.com/maps/dir/Singapore/PHYSIOMOBILE+BANDAR+PUTERI+BANGI,+Jalan+Puteri+2A%2F2,+Bandar+Bukit+Mahkota,+Kajang,+Selangor/@2.1764251,101.6620659,8z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x31da11238a8b9375:0x887869cf52abf5c4!2m2!1d103.819836!2d1.352083!1m5!1m1!1s0x31cdc937453e8551:0x3ca57d69785876a9!2m2!1d101.7931299!2d2.8821343">BANDAR PUTERI BANGI</a></h3>
							<span>Klinik PhysioMobile Bandar Puteri, No.18-G, Jalan Puteri 2A/2, Bandar Bukit Mahkota, 43000 Kajang, Selangor</span>
								<ul class="social-link">
									<li>
										<a href="https://www.google.com/maps/dir/Singapore/PHYSIOMOBILE+BANDAR+PUTERI+BANGI,+Jalan+Puteri+2A%2F2,+Bandar+Bukit+Mahkota,+Kajang,+Selangor/@2.1764251,101.6620659,8z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x31da11238a8b9375:0x887869cf52abf5c4!2m2!1d103.819836!2d1.352083!1m5!1m1!1s0x31cdc937453e8551:0x3ca57d69785876a9!2m2!1d101.7931299!2d2.8821343" target="_blank">
										<i class='bx bx-target-lock bg-2'></i>
										</a>
									</li>
									<li>
										<a href="tel:+60389221838" target="_blank">
										<i class='bx bx-phone bg-3'></i>
										</a>
									</li>
									<li>
										<a href="https://www.facebook.com/PhysioMobilebandarputeribangi" target="_blank">
										<i class='bx bxl-facebook bg-1'></i>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/physiomobile.bandarputeribangi/" target="_blank">
										<i class='bx bxl-instagram bg-4'></i>
										</a>
									</li>
								</ul>
							</div>
					</div>
					<div class="team-card">
						<a href="#">
							<img src="assets/img/all-image-website/outlet-jb.jpg" title="PHYSIOMOBILE ADDA HEIGHT" alt="PHYSIOMOBILE ADDA HEIGHT">
						</a>
							<div class="caption">
							<h3><a href="https://www.google.com/maps/dir/2.9070062,101.604402/PHYSIOMOBILE+ADDA+HEIGHTS,+Jalan+Adda+7,+Taman+Adda+Heights,+Johor+Bahru,+Johor/@2.2271345,102.1145886,9z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x31da6da353268669:0xb61707c3794414e8!2m2!1d103.7450027!2d1.5475429">ADDA HEIGHTS</a></h3>
							<span>Klinik PhysioMobile Malaysia, No 46. Jalan Perjiranan 2, 81100 Bandar Dato Onn, Johor Bahru</span>
								<ul class="social-link">
									<li>
										<a href="https://www.google.com/maps/dir/2.9070062,101.604402/PHYSIOMOBILE+ADDA+HEIGHTS,+Jalan+Adda+7,+Taman+Adda+Heights,+Johor+Bahru,+Johor/@2.2271345,102.1145886,9z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x31da6da353268669:0xb61707c3794414e8!2m2!1d103.7450027!2d1.5475429" target="_blank">
										<i class='bx bx-target-lock bg-2'></i>
										</a>
									</li>
									<li>
										<a href="tel:+60199869642" target="_blank">
										<i class='bx bx-phone bg-3'></i>
										</a>
									</li>
									<li>
										<a href="https://www.facebook.com/physiomobilejohor" target="_blank">
										<i class='bx bxl-facebook bg-1'></i>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/physiomobile.my_jb/" target="_blank">
										<i class='bx bxl-instagram bg-4'></i>
										</a>
									</li>
								</ul>
							</div>
					</div>
					<div class="team-card">
						<a href="https://www.google.com.my/maps/place/PHYSIOMOBILE+BANDAR+BARU+BANGI/@2.9612284,101.7518877,17z/data=!3m1!4b1!4m5!3m4!1s0x31cdcb88bf28c5c1:0xd4570668fe250e77!8m2!3d2.9614149!4d101.7541814">
							<img src="assets/img/all-image-website/outlet-bbb.jpg" title="PHYSIOMOBILE BANDAR BARU BANGI" alt="PHYSIOMOBILE BANDAR BARU BANGI">
						</a>
							<div class="caption">
							<h3><a href="#">BANDAR BARU BANGI</a></h3>
							<span>Klinik PhysioMobile Malaysia, Plaza Paragon Point, D-08-G, Jln Medan Pusat 2d, Bandar Seksyen 9, 43650 Bandar Baru Bangi, Selangor</span>
								<ul class="social-link">
									<li>
										<a href="https://www.google.com.my/maps/place/PHYSIOMOBILE+BANDAR+BARU+BANGI/@2.9612284,101.7518877,17z/data=!3m1!4b1!4m5!3m4!1s0x31cdcb88bf28c5c1:0xd4570668fe250e77!8m2!3d2.9614149!4d101.7541814" target="_blank">
										<i class='bx bx-target-lock bg-2'></i>
										</a>
									</li>
									<li>
										<a href="tel:+60192449642" target="_blank">
										<i class='bx bx-phone bg-3'></i>
										</a>
									</li>
									<li>
										<a href="https://www.facebook.com/physiomobile.bandarbarubangi" target="_blank">
										<i class='bx bxl-facebook bg-1'></i>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/physiomobile.bandarbarubangi/" target="_blank">
										<i class='bx bxl-instagram bg-4'></i>
										</a>
									</li>
								</ul>
							</div>
					</div>
					<div class="team-card">
						<a href="https://www.google.com.my/maps/place/PHYSIOMOBILE+KRUBONG+MELAKA/@2.3047635,102.2503577,17z/data=!3m1!4b1!4m5!3m4!1s0x31d1fb0cbe1550e1:0xa3c276cb897d4662!8m2!3d2.3047581!4d102.2525464">
							<img src="assets/img/all-image-website/outlet-krubong.jpg" title="PHYSIOMOBILE KRUBONG MELAKA" alt="PHYSIOMOBILE KRUBONG MELAKA">
						</a>
							<div class="caption">
							<h3><a href="#">KRUBONG MELAKA</a></h3>
							<span>Klinik PhysioMobile Malaysia, No 115-1 Jalan Satu Krubong, Taman Satu krubong 75260 Melaka</span>
								<ul class="social-link">
									<li>
										<a href="https://www.google.com.my/maps/place/PHYSIOMOBILE+KRUBONG+MELAKA/@2.3047635,102.2503577,17z/data=!3m1!4b1!4m5!3m4!1s0x31d1fb0cbe1550e1:0xa3c276cb897d4662!8m2!3d2.3047581!4d102.2525464" target="_blank">
										<i class='bx bx-target-lock bg-2'></i>
										</a>
									</li>
									<li>
										<a href="tel:+60172414140" target="_blank">
										<i class='bx bx-phone bg-3'></i>
										</a>
									</li>
									<li>
										<a href="https://www.facebook.com/PhysiomobileMelaka" target="_blank">
										<i class='bx bxl-facebook bg-1'></i>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/physiomobile.krubongmelaka/" target="_blank">
										<i class='bx bxl-instagram bg-4'></i>
										</a>
									</li>
								</ul>
							</div>
					</div>
					<div class="team-card">
						<a href="https://www.google.com.my/maps/place/PHYSIOMOBILE+ECO+ARDENCE/@3.0866056,101.4738455,17z/data=!3m1!4b1!4m5!3m4!1s0x31cc538f3125fadf:0x34092e2311fb732b!8m2!3d3.0866056!4d101.4760342">
							<img src="assets/img/all-image-website/outlet-ecoardence.jpg" title="PHYSIOMOBILE ECO ARDENCE" alt="PHYSIOMOBILE ECO ARDENCE">
						</a>
							<div class="caption">
							<h3><a href="#">ECO ARDENCE</a></h3>
							<span>Klinik PhysioMobile Malaysia, NO.69-G, Jalan Eco Ardance C U12/36C, Setia Alam, 40170 Shah Alam</span>
								<ul class="social-link">
									<li>
										<a href="https://www.google.com.my/maps/place/PHYSIOMOBILE+ECO+ARDENCE/@3.0866056,101.4738455,17z/data=!3m1!4b1!4m5!3m4!1s0x31cc538f3125fadf:0x34092e2311fb732b!8m2!3d3.0866056!4d101.4760342" target="_blank">
										<i class='bx bx-target-lock bg-2'></i>
										</a>
									</li>
									<li>
										<a href="tel:+60195590262" target="_blank">
										<i class='bx bx-phone bg-3'></i>
										</a>
									</li>
									<li>
										<a href="https://www.facebook.com/physiomobileecoardence" target="_blank">
										<i class='bx bxl-facebook bg-1'></i>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/physiomobile.ecoardence/" target="_blank">
										<i class='bx bxl-instagram bg-4'></i>
										</a>
									</li>
								</ul>
							</div>
					</div>
					<div class="team-card">
						<a href="https://www.google.com.my/maps/place/PHYSIOMOBILE+BANDAR+BOTANIK/@2.9995359,101.4426674,17z/data=!3m1!4b1!4m5!3m4!1s0x31cdad594208223b:0x616a938fd65d9c09!8m2!3d2.9995394!4d101.4448545">
							<img src="assets/img/all-image-website/outlet-bandarbotanik.jpg" title="PHYSIOMOBILE BANDAR BOTANIK KLANG" alt="PHYSIOMOBILE BANDAR BOTANIK KLANG">
						</a>
							<div class="caption">
							<h3><a href="https://www.google.com.my/maps/place/PHYSIOMOBILE+BANDAR+BOTANIK/@2.9995359,101.4426674,17z/data=!3m1!4b1!4m5!3m4!1s0x31cdad594208223b:0x616a938fd65d9c09!8m2!3d2.9995394!4d101.4448545">BANDAR BOTANIK KLANG</a></h3>
							<span>Klinik PhysioMobile Malaysia, No 5, Jalan Remia 2, Bandar Botanik, 41200 Klang, Selangor</span>
								<ul class="social-link">
									<li>
										<a href="https://www.google.com.my/maps/place/PHYSIOMOBILE+BANDAR+BOTANIK/@2.9995359,101.4426674,17z/data=!3m1!4b1!4m5!3m4!1s0x31cdad594208223b:0x616a938fd65d9c09!8m2!3d2.9995394!4d101.4448545" target="_blank">
										<i class='bx bx-target-lock bg-2'></i>
										</a>
									</li>
									<li>
										<a href="tel:+60137175212" target="_blank">
										<i class='bx bx-phone bg-3'></i>
										</a>
									</li>
									<li>
										<a href="https://www.facebook.com/physiomobilebandarbotanik" target="_blank">
										<i class='bx bxl-facebook bg-1'></i>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/physiomobile.bandarbotanik/" target="_blank">
										<i class='bx bxl-instagram bg-4'></i>
										</a>
									</li>
								</ul>
							</div>
					</div>
					<div class="team-card">
						<a href="https://www.google.com.my/maps/search/PHYSIOMOBILE+SERI+KEMBANGAN/@2.9833288,101.6621743,12z/data=!3m1!4b1">
							<img src="assets/img/all-image-website/outlet-serikembangan.jpg" title="PHYSIOMOBILE SERI KEMBANGAN" alt="PHYSIOMOBILE SERI KEMBANGAN">
						</a>
							<div class="caption">
							<h3><a href="https://www.google.com.my/maps/search/PHYSIOMOBILE+SERI+KEMBANGAN/@2.9833288,101.6621743,12z/data=!3m1!4b1">SERI KEMBANGAN</a></h3>
							<span>Klinik PhysioMobile Malaysia, D-35-G, BLOK D, Jalan Atmosphere 7, Pusat Bandar Putra Permai, 43300 Seri Kembangan, Selangor</span>
								<ul class="social-link">
									<li>
										<a href="https://www.google.com.my/maps/search/PHYSIOMOBILE+SERI+KEMBANGAN/@2.9833288,101.6621743,12z/data=!3m1!4b1" target="_blank">
										<i class='bx bx-target-lock bg-2'></i>
										</a>
									</li>
									<li>
										<a href="tel:+60123353562" target="_blank">
										<i class='bx bx-phone bg-3'></i>
										</a>
									</li>
									<li>
										<a href="https://www.facebook.com/physiomobilebandarbotanik" target="_blank">
										<i class='bx bxl-facebook bg-1'></i>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/physiomobile.bandarbotanik/" target="_blank">
										<i class='bx bxl-instagram bg-4'></i>
										</a>
									</li>
								</ul>
							</div>
					</div>
					<div class="team-card">
						<a href="https://www.google.com.my/maps/search/PHYSIOMOBILE+SERI+KEMBANGAN/@2.9833288,101.6621743,12z/data=!3m1!4b1">
							<img src="assets/img/all-image-website/outlet-btho.jpg"  title="PHYSIOMOBILE BTHO" alt="PHYSIOMOBILE BTHO">
						</a>
							<div class="caption">
							<h3><a href="https://www.google.com.my/maps/search/PHYSIOMOBILE+SERI+KEMBANGAN/@2.9833288,101.6621743,12z/data=!3m1!4b1">BTHO, CHERAS</a></h3>
							<span>Klinik PhysioMobile Malaysia, NO-41-A, Jalan Suarasa 8/3, Bandar Tun Hussein Onn 43200 Cheras, Selangor</span>
								<ul class="social-link">
									<li>
										<a href="https://www.google.com.my/maps/search/PHYSIOMOBILE+SERI+KEMBANGAN/@2.9833288,101.6621743,12z/data=!3m1!4b1" target="_blank">
										<i class='bx bx-target-lock bg-2'></i>
										</a>
									</li>
									<li>
										<a href="tel:+60137175212" target="_blank">
										<i class='bx bx-phone bg-3'></i>
										</a>
									</li>
									<li>
										<a href="https://www.facebook.com/Physiomobile-BTHO-Cheras-108815318299927" target="_blank">
										<i class='bx bxl-facebook bg-1'></i>
										</a>
									</li>
									<li>
										<a href="https://www.instagram.com/physiomobile.btho/" target="_blank">
										<i class='bx bxl-instagram bg-4'></i>
										</a>
									</li>
								</ul>
							</div>
					</div>
				</div>
			</div>
		</div>



<?php
	include('footer.php');
 ?>