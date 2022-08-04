<?php
 //Start session
    session_start();
    include('system-header.php');
    $job = $_SESSION["job"];
    $roles = $_SESSION["roles"];
    $centers = $_SESSION["centers"];
    $session = $_SESSION["session"];

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

            $job = $_SESSION["job"];
            $roles = $_SESSION['roles'];
            $centers = $_SESSION['centers'];
            $now = date("Y-m-d");
        ?>

				<div class="app-content my-3 my-md-5">
					<div class="side-app">
						<div class="page-header"> 
							<h4 class="page-title">DASHBOARD</h4>
							<!--<ol class="breadcrumb">-->
							<!--	<li class="breadcrumb-item"><a href="#">Tables</a></li>-->
							<!--	<li class="breadcrumb-item active" aria-current="page">Data Tables</li>-->
							<!--</ol>-->
						</div>
					    <?php if( ($roles == "19" && $centers == '1') || $roles == "18" && $centers == '1'){	?>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title" style="text-transform: uppercase;">Statistic analysis Appointment </h3>										
									</div>
									<div class="card-body">
										<form id='form-id'>
											<div class="row">
												<div class="col-md-12">
													<div class="row">
									            			<div class="col-md-12 col-lg-3">
									            				<input id='sa' name='test' type='radio' /> SHAH ALAM
									            			</div>
										            	</div>
									            	</div>
								            	</div>							            
								       	</form>
								        <br><br><br>
        								<div id='show3' style="display: none;">
        									<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="SAJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="SAFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="SAMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="SAAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="SAMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="SAJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="SAJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="SAAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="SASEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="SAOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="SANOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="SADECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
        								</div>
									</div>
								</div>
							</div>
						</div>
						<?php } if( ($roles == "19" && $centers == '2') || $roles == "18" && $centers == '2'){?>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title" style="text-transform: uppercase;">Statistic analysis Appointment </h3>										
									</div>
									<div class="card-body">
										<form id='form-id'>
											<div class="row">
												<div class="col-md-12">
													<div class="row">
										            		<div class="col-md-12 col-lg-3">
										            			<input id='jb' name='test' type='radio' /> ADDA HEIGHTS 
										            		</div>
										            	</div>
									            	</div>
								            	</div>							            
								       	</form>
								        <br><br><br>
        								<div id='show6' style="display: none;">
        									<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="JBJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="JBFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="JBMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="JBAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="JBMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="JBJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="JBJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="JBAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="JBSEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="JBOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="JBNOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="JBDECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
        								</div>
									</div>
								</div>
							</div>
						</div>
						<?php } if( ($roles == "19" && $centers == '3') || $roles == "18" && $centers == '3'){?>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title" style="text-transform: uppercase;">Statistic analysis Appointment </h3>										
									</div>
									<div class="card-body">
										<form id='form-id'>
											<div class="row">
												<div class="col-md-12">
													<div class="row">
										            		<div class="col-md-12 col-lg-3">
										            			<input id='wm' name='test' type='radio' /> WANGSA MELAWATI
										            		</div>
										            	</div>
									            	</div>
								            	</div>							            
								       	</form>
								        <br><br><br>
        								<div id='show4' style="display: none;">
        									<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="WMJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="WMFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="WMMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="WMAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="WMMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="WMJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="WMJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="WMAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="WMSEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="WMOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="WMNOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="WMDECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
        								</div>
									</div>
								</div>
							</div>
						</div>
						<?php } if( ($roles == "19" && $centers == '4') || $roles == "18" && $centers == '4'){?>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title" style="text-transform: uppercase;">Statistic analysis Appointment </h3>										
									</div>
									<div class="card-body">
										<form id='form-id'>
											<div class="row">
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-12 col-lg-3">
										            		<input id='kd' name='test' type='radio' checked /> KOTA DAMANSARA
						        						</div>
										            	</div>
									            	</div>
								            	</div>							            
								       	</form>
								        <br><br><br>

								        <div id='show1'>
								        	<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="KOTAJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="KOTAFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="KOTAMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="KOTAAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="KOTAMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="KOTAJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="KOTAJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="KOTAJAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="KOTASEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="KOTAOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="KOTANOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="KOTADECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
								        </div>
									</div>
								</div>
							</div>
						</div>
						<?php } if( ($roles == "19" && $centers == '5') || $roles == "18" && $centers == '5'){?>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title" style="text-transform: uppercase;">Statistic analysis Appointment </h3>										
									</div>
									<div class="card-body">
										<form id='form-id'>
											<div class="row">
												<div class="col-md-12">
													<div class="row">
										            		<div class="col-md-12 col-lg-3">
										            			<input id='bpb' name='test' type='radio' /> BANDAR PUTERI BANGI
										            		</div>
										            	</div>
									            	</div>
								            	</div>							            
								       	</form>
								        <br><br><br>
        								<div id='show5' style="display: none;">
        									<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="BPBJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="BPBFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="BPBMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="BPBAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="BPBMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="BPBJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="BPBJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="BPBAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="BPBSEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="BPBOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="BPBNOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="BPBDECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
        								</div>
									</div>
								</div>
							</div>
						</div>
						<?php } if( ($roles == "19" && $centers == '6') || $roles == "18" && $centers == '6'){?>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title" style="text-transform: uppercase;">Statistic analysis Appointment </h3>										
									</div>
									<div class="card-body">
										<form id='form-id'>
											<div class="row">
												<div class="col-md-12">
													<div class="row">
										        		<div class="col-md-12 col-lg-3">
										            			<input id='kl' name='test' type='radio' /> KUALA SELANGOR
										           		</div>
										            	</div>
									            	</div>
								            	</div>							            
								       	</form>
								        <br><br><br>
        								<div id='show2' style="display: none;">
        									<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="KSJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="KSFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="KSMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="KSAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="KSMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="KSJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="KSJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="KSJAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="KSSEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="KSOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="KSNOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="KSDECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
								        </div>
									</div>
								</div>
							</div>
						
						</div>
						<?php } if( ($roles == "19" && $centers == '9') || $roles == "18" && $centers == '9'){?>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title" style="text-transform: uppercase;">Statistic analysis Appointment </h3>										
									</div>
									<div class="card-body">
										<form id='form-id'>
											<div class="row">
												<div class="col-md-12">
													<div class="row">
										            		<div class="col-md-12 col-lg-3">
										            			<input id='bbb' name='test' type='radio' /> BANDAR BARU BANGI
										            		</div>
										            	</div>
									            	</div>
								            	</div>							            
								       	</form>
								        <br><br><br>
        								<div id='show7' style="display: none;">
        									<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="BBBJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="BBBFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="BBBMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="BBBAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="BBBMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="BBBJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="BBBJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="BBBAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="BBBSEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="BBBOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="BBBNOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="BBBDECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
        								</div>
									</div>
								</div>
							</div>
							
						</div>
						<?php } if( ($roles == "19" && $centers == '10') || $roles == "18" && $centers == '10'){?>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title" style="text-transform: uppercase;">Statistic analysis Appointment </h3>										
									</div>
									<div class="card-body">
										<form id='form-id'>
											<div class="row">
												<div class="col-md-12">
													<div class="row">
										            		<div class="col-md-12 col-lg-3">
										            			<input id='kerubong' name='test' type='radio' /> KRUBONG MELAKA
										            		</div>
										            	</div>
									            	</div>
								            	</div>							            
								       	</form>
								        <br><br><br>
        								<div id='show8' style="display: none;">
        									<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="KRUBONGJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="KRUBONGFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="KRUBONGMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="KRUBONGAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="KRUBONGMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="KRUBONGJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="KRUBONGJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="KRUBONGAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="KRUBONGSEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="KRUBONGOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="KRUBONGNOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="KRUBONGDECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
        								</div>
									</div>
								</div>
							</div>
							
						</div>
						<?php } if( ($roles == "19" && $centers == '12') || $roles == "18" && $centers == '12'){?>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title" style="text-transform: uppercase;">Statistic analysis Appointment </h3>										
									</div>
									<div class="card-body">
										<form id='form-id'>
											<div class="row">
												<div class="col-md-12">
													<div class="row">
										            		<div class="col-md-12 col-lg-3">
										            			<input id='botanik' name='test' type='radio' /> BANDAR BOTANIK
										            		</div>
										            	</div>
									            	</div>
								            	</div>							            
								       	</form>
								        <br><br><br>
        								<div id='show9' style="display: none;">
        									<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="BOTANIKJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="BOTANIKFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="BOTANIKMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="BOTANIKAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="BOTANIKMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="BOTANIKJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="BOTANIKJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="BOTANIKAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="BOTANIKSEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="BOTANIKOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="BOTANIKNOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="BOTANIKDECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
        								</div>
        								
									</div>
								</div>
							</div>
							
						</div>
						<?php } if( ($roles == "19" && $centers == '13') || $roles == "18" && $centers == '13'){?>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title" style="text-transform: uppercase;">Statistic analysis Appointment </h3>										
									</div>
									<div class="card-body">
										<form id='form-id'>
											<div class="row">
												<div class="col-md-12">
													<div class="row">
										            		<div class="col-md-12 col-lg-3">
										            			<input id='eco' name='test' type='radio' /> ECO ARDENCE
										            		</div>
										            	</div>
									            	</div>
								            	</div>							            
								       	</form>
								        <br><br><br>
        								<div id='show10' style="display: none;">
        									<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="ECOJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="ECOFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="ECOMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="ECOAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="ECOMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="ECOJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="ECOJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="ECOAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="ECOSEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="ECOOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="ECONOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="ECODECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
        								</div>
									</div>
								</div>
							</div>
							
						</div>
						<?php } if( ($roles == "19" && $centers == '14') || $roles == "18" && $centers == '14'){?>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title" style="text-transform: uppercase;">Statistic analysis Appointment </h3>										
									</div>
									<div class="card-body">
										<form id='form-id'>
											<div class="row">
												<div class="col-md-12">
													<div class="row">
										            		<div class="col-md-12 col-lg-3">
										            			<input id='btho' name='test' type='radio' /> BANDAR TUN HUSSEN ONN
										            		</div>
										            	</div>
									            	</div>
								            	</div>							            
								       	</form>
								        <br><br><br>
        								<div id='show11' style="display: none;">
        									<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="BTHOJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="BTHOFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="BTHOMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="BTHOAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="BTHOMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="BTHOJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="BTHOJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="BTHOAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="BTHOSEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="BTHOOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="BTHONOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="BTHODECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
        								</div>
									</div>
								</div>
							</div>
							
						</div>
						<?php } if( ($roles == "19" && $centers == '15') || $roles == "18" && $centers == '15'){?>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title" style="text-transform: uppercase;">Statistic analysis Appointment </h3>										
									</div>
									<div class="card-body">
										<form id='form-id'>
											<div class="row">
												<div class="col-md-12">
										            		<div class="col-md-12 col-lg-3">
										            			<input id='kembangan' name='test' type='radio' /> SERI KEMBANGAN
										            		</div>
										            	</div>
									            	</div>
								            	</div>							            
								       	</form>
								        <br><br><br>

								        
        								<div id='show12' style="display: none;">
        									<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="SERIKEMBANGANJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="SERIKEMBANGANFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="SERIKEMBANGANMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="SERIKEMBANGANAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="SERIKEMBANGANMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="SERIKEMBANGANJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="SERIKEMBANGANJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="SERIKEMBANGANAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="SERIKEMBANGANSEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="SERIKEMBANGANOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="SERIKEMBANGANNOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="SERIKEMBANGANDECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
        								</div>
									</div>
								</div>
							</div>
							
						</div>
						<?php } else if( ($roles == "1") || ($roles == "2") || ($roles == "3") || ($roles == "4")|| ($roles == "6")|| ($roles == "24")|| ($roles == "28")){?>
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title" style="text-transform: uppercase;">Statistic analysis Appointment </h3>										
									</div>
									<div class="card-body">
										<form id='form-id'>
											<div class="row">
												<div class="col-md-12">
													<div class="row">
    														<div class="col-md-12 col-lg-3">
    										            		<input id='kd' name='test' type='radio' checked /> KOTA DAMANSARA
    						        						</div>
    										        		<div class="col-md-12 col-lg-3">
    										            		<input id='kl' name='test' type='radio' /> KUALA SELANGOR
    										           		</div>
									            			<div class="col-md-12 col-lg-3">
									            				<input id='sa' name='test' type='radio' /> SHAH ALAM
									            			</div>
										            		<div class="col-md-12 col-lg-3">
										            			<input id='wm' name='test' type='radio' /> WANGSA MELAWATI
										            		</div>
										            		<div class="col-md-12 col-lg-3">
										            			<input id='bpb' name='test' type='radio' /> BANDAR PUTERI BANGI
										            		</div>
										            		<div class="col-md-12 col-lg-3">
										            			<input id='jb' name='test' type='radio' /> ADDA HEIGHTS 
										            		</div>
										            		<div class="col-md-12 col-lg-3">
										            			<input id='bbb' name='test' type='radio' /> BANDAR BARU BANGI
										            		</div>
										            		<div class="col-md-12 col-lg-3">
										            			<input id='kerubong' name='test' type='radio' /> KRUBONG MELAKA
										            		</div>
										            		<div class="col-md-12 col-lg-3">
										            			<input id='botanik' name='test' type='radio' /> BANDAR BOTANIK
										            		</div>
										            		<div class="col-md-12 col-lg-3">
										            			<input id='eco' name='test' type='radio' /> ECO ARDENCE
										            		</div>
										            		<div class="col-md-12 col-lg-3">
										            			<input id='btho' name='test' type='radio' /> BANDAR TUN HUSSEN ONN
										            		</div>
										            		<div class="col-md-12 col-lg-3">
										            			<input id='kembangan' name='test' type='radio' /> SERI KEMBANGAN
										            		</div>
										            	</div>
									            	</div>
								            	</div>							            
								       	</form>
								        <br><br><br>
        								<div id='show1'>
								        	<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="KOTAJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="KOTAFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="KOTAMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="KOTAAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="KOTAMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="KOTAJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="KOTAJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="KOTAJAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="KOTASEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="KOTAOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="KOTANOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="KOTADECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
								        </div>
								        <div id='show2' style="display: none;">
        									<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="KSJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="KSFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="KSMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="KSAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="KSMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="KSJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="KSJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="KSJAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="KSSEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="KSOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="KSNOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="KSDECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
								        </div>
								     	<div id='show3' style="display: none;">
        									<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="SAJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="SAFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="SAMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="SAAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="SAMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="SAJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="SAJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="SAAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="SASEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="SAOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="SANOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="SADECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
        								</div>
        								<div id='show4' style="display: none;">
        									<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="WMJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="WMFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="WMMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="WMAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="WMMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="WMJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="WMJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="WMAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="WMSEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="WMOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="WMNOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="WMDECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
        								</div>
        								<div id='show5' style="display: none;">
        									<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="BPBJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="BPBFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="BPBMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="BPBAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="BPBMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="BPBJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="BPBJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="BPBAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="BPBSEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="BPBOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="BPBNOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="BPBDECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
        								</div>
        								<div id='show6' style="display: none;">
        									<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="JBJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="JBFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="JBMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="JBAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="JBMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="JBJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="JBJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="JBAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="JBSEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="JBOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="JBNOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="JBDECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
        								</div>
        								<div id='show7' style="display: none;">
        									<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="BBBJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="BBBFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="BBBMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="BBBAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="BBBMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="BBBJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="BBBJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="BBBAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="BBBSEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="BBBOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="BBBNOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="BBBDECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
        								</div>
        								<div id='show8' style="display: none;">
        									<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="KRUBONGJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="KRUBONGFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="KRUBONGMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="KRUBONGAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="KRUBONGMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="KRUBONGJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="KRUBONGJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="KRUBONGAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="KRUBONGSEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="KRUBONGOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="KRUBONGNOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="KRUBONGDECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
        								</div>
        								<div id='show9' style="display: none;">
        									<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="BOTANIKJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="BOTANIKFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="BOTANIKMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="BOTANIKAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="BOTANIKMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="BOTANIKJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="BOTANIKJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="BOTANIKAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="BOTANIKSEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="BOTANIKOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="BOTANIKNOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="BOTANIKDECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
        								</div>
        								<div id='show10' style="display: none;">
        									<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="ECOJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="ECOFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="ECOMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="ECOAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="ECOMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="ECOJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="ECOJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="ECOAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="ECOSEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="ECOOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="ECONOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="ECODECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
        								</div>
        								<div id='show11' style="display: none;">
        									<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="BTHOJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="BTHOFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="BTHOMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="BTHOAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="BTHOMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="BTHOJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="BTHOJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="BTHOAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="BTHOSEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="BTHOOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="BTHONOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="BTHODECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
        								</div>
        								<div id='show12' style="display: none;">
        									<div class="row">
								     		<div class="col-md-6 col-lg-6">
								     			<label>JANUARY</label>
								        			<canvas id="SERIKEMBANGANJANUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>FEBRUARY</label>
								        			<canvas id="SERIKEMBANGANFEBRUARY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MARCH</label>
								        			<canvas id="SERIKEMBANGANMARCH" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>APRIL</label>
								        			<canvas id="SERIKEMBANGANAPRIL" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>MAY</label>
								        			<canvas id="SERIKEMBANGANMAY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>JUNE</label>
								        			<canvas id="SERIKEMBANGANJUNE" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>JULY</label>
								        			<canvas id="SERIKEMBANGANJULY" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>AUGUST</label>
								        			<canvas id="SERIKEMBANGANAUGUST" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>SEPTEMBER</label>
								        			<canvas id="SERIKEMBANGANSEPTEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>OCTOBER</label>
								        			<canvas id="SERIKEMBANGANOCTOBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								     			<label>NOVEMBER</label>
								        			<canvas id="SERIKEMBANGANNOVEMBER" width="400" height="100"></canvas>
								        		</div>
								        		<div class="col-md-6 col-lg-6">
								        			<label>DECEMBER</label>
								        			<canvas id="SERIKEMBANGANDECEMBER" width="400" height="100"></canvas>
								        		</div>
								        	</div>
        								</div>
									</div>
								</div>
							</div>
						</div>
						<?php }else {?>
						
						<?php } ?>
					</div>
				</div>
			</div>
<?php 
include('system-footer.php');
?>