<?php 
//Start session
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

            $job = $_SESSION["job"];
            $roles = $_SESSION['roles'];
            $centers = $_SESSION['centers'];
            $now = date("Y-m-d");
        ?>
				<div class="app-content my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">C3 Pie Charts</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Charts</a></li>
								<li class="breadcrumb-item active" aria-current="page">C3 Pie Charts</li>
							</ol>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Pie Chart</h3>
									</div>
									<div class="card-body">
										<div id="chart-pie" class="chartsh"></div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Pie Chart with Multiple colors</h3>
									</div>
									<div class="card-body">
										<div id="chart-pie2" class="chartsh"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Pie Chart3</h3>
									</div>
									<div class="card-body">
										<div id="chart-pie3" class="chartsh"></div>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Pie Chart4</h3>
									</div>
									<div class="card-body">
										<div id="chart-pie4" class="chartsh"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--footer-->
					<footer class="footer">
						<div class="container">
							<div class="row align-items-center flex-row-reverse">
								<div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
									Copyright © 2018 <a href="#">Ren</a>. Designed by <a href="#">Spruko</a> All rights reserved.
								</div>
							</div>
						</div>
					</footer>
				</div>
			</div>

		</div>

		<!-- Back to top -->
		<a href="#top" id="back-to-top" style="display: inline;"><i class="fas fa-angle-up"></i></a>

		<!-- Dashboard js-->
		<script src="assets/js/vendors/jquery-3.2.1.min.js"></script>
		<script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
		<script src="assets/js/vendors/jquery.sparkline.min.js"></script>
		<script src="assets/js/vendors/selectize.min.js"></script>
		<script src="assets/js/vendors/jquery.tablesorter.min.js"></script>
		<script src="assets/js/vendors/circle-progress.min.js"></script>
		<script src="assets/plugins/rating/jquery.rating-stars.js"></script>
		<!-- Side menu js -->
		<script src="assets/plugins/toggle-sidebar/js/sidemenu.js"></script>

		<!-- Custom scroll bar Js-->
		<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!-- c3.js Charts Plugin -->
		<script src="assets/plugins/charts-c3/d3.v5.min.js"></script>
		<script src="assets/plugins/charts-c3/c3-chart.js"></script>

		<!-- Input Mask Plugin -->
		<script src="assets/plugins/input-mask/jquery.mask.min.js"></script>

        <!-- Index Scripts -->
		<script src="assets/js/charts.js"></script>

		<!-- 3Dlines-animation -->
        <script src="assets/plugins/3Dlines-animation/three.min.js"></script>
        <script src="assets/plugins/3Dlines-animation/projector.js"></script>
        <script src="assets/plugins/3Dlines-animation/canvas-renderer.js"></script>
        <script src="assets/plugins/3Dlines-animation/3d-lines-animation.js"></script>
        <script src="assets/plugins/3Dlines-animation/color.js"></script>

		<!--Counters -->
		<script src="assets/plugins/counters/counterup.min.js"></script>
		<script src="assets/plugins/counters/waypoints.min.js"></script>

		<!-- Custom js -->
		<script src="assets/js/custom.js"></script>
	</body>

<!-- Mirrored from spruko.com/demo/ren/Blue-animated/LeftMenu/chart-pie.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Sep 2018 05:03:04 GMT -->
</html>