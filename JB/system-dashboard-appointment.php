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
							<h4 class="page-title">Data</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Tables</a></li>
								<li class="breadcrumb-item active" aria-current="page">Data Tables</li>
							</ol>
						</div>
						
						<div class="row">
							<div class="col-md-12 col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Statistic analysis Appointment </h3>										
									</div>
									<div class="card-body">
										<form id='form-id'>
											<div class="row">
												<div class="col-md-12">
													<div class="col-md-12 col-lg-4">
										            	<input id='kd' name='test' type='radio' checked /> KOTA DAMANSARA
										        	</div>
										        	<div class="col-md-12 col-lg-4">
										            	<input id='kl' name='test' type='radio' /> KUALA SELANGOR
										            </div>
										            <div class="col-md-12 col-lg-4">
										            <input id='sa' name='test' type='radio' /> SHAH ALAM
										            </div>
										            <div class="col-md-12 col-lg-4">
										            	<input id='wm' name='test' type='radio' /> WANGSA MELAWATI
										            </div>
										            <div class="col-md-12 col-lg-4">
										            	<input id='bpb' name='test' type='radio' /> BANDAR PUTERI BANGI
										            </div>
										            <div class="col-md-12 col-lg-4">
										            	<input id='jb' name='test' type='radio' /> ADDA HEIGHTS 
										            </div>
										            <div class="col-md-12 col-lg-4">
										            	<input id='bbb' name='test' type='radio' /> BANDAR BARU BANGI
										            </div>
									            </div>
								            </div>							            
								        </form>
								        <br><br><br>

								        <div id='show1'>
								        	<canvas id="myChart" width="400" height="100"></canvas>
								        </div>
        								<div id='show2' style="display: none;">
        									<canvas id="myChart1" width="400" height="100"></canvas>
        								</div>
        								<div id='show3' style="display: none;">
        									<canvas id="myChart2" width="400" height="100"></canvas>
        								</div>
        								<div id='show4' style="display: none;">
        									<canvas id="myChart3" width="400" height="100"></canvas>
        								</div>
        								<div id='show5' style="display: none;">
        									<canvas id="myChart4" width="400" height="100"></canvas>
        								</div>
        								<div id='show6' style="display: none;">
        									<canvas id="myChart5" width="400" height="100"></canvas>
        								</div>
        								<div id='show7' style="display: none;">
        									<canvas id="myChart6" width="400" height="100"></canvas>
        								</div>
										
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>
				</div>
<?php 
include('system-footer.php');
?>