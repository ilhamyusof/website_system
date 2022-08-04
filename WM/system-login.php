<?php
ob_start();

    include('session.php');
//   $job = $_SESSION["job"];
//$session = $_SESSION['session'];


    // if(isset($_SESSION['session'])  && isset($_SESSION['roles'])  ){
       

    //     if($job == "Admin" || $roles == "2" || $roles == "3" || $roles == "4" || $roles == "6" || $roles == "7" || $roles == "11" || $roles == "16" )

    if(isset($_SESSION['session']) && isset($_SESSION['roles']) ){
        
        $job = $_SESSION["job"];
        $roles = $_SESSION["roles"];
        $centers = $_SESSION["centers"];
        $session = $_SESSION["session"];
        
      

        if($roles == "1" || $roles == "2" || $roles == "3" || $roles == "4")
        { 
            // echo $roles;
            // redirect_to("https://physiomobile.com.my/system-dashboard.php");
            header("Location: system-dashboard.php");
            exit();
        }else {
            header("Location: system-lmsmanagement.php");
        }
    } 
else {
   
?>
<!doctype html>
<html lang="en" dir="ltr">
  
<!-- Mirrored from spruko.com/demo/ren/Blue-animated/LeftMenu/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Sep 2018 05:00:14 GMT -->
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="msapplication-TileColor" content="#0061da">
		<meta name="theme-color" content="#1643a3">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<link rel="icon" href="icon.png" type="image/x-icon"/>
        <link rel="shortcut icon" type="image/x-icon" href="icon.png" />
        <link href="https://vjs.zencdn.net/7.10.2/video-js.css" rel="stylesheet" />

		<!-- Title -->
		<title>PhysioMobile Malaysia - Pusat Fisioterapi Panel PM Care</title>

        <!--Font Awesome-->
		<link href="assets-system/plugins/fontawesome-free/css/all.css" rel="stylesheet">
    <!--css plan bulding
        <link href="assets/css/plan.css" rel="stylesheet"> -->

		<!-- Font Family -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet">

		<!-- Dashboard Css -->
		<link href="assets-system/css/dashboard.css" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="assets-system/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

		<!-- Sidemenu Css -->
		<link href="assets-system/plugins/toggle-sidebar/css/sidemenu.css" rel="stylesheet">

		<!-- c3.js Charts Plugin -->
		<link href="assets-system/plugins/charts-c3/c3-chart.css" rel="stylesheet" />

		<!-- select2 Plugin -->
		<link href="assets-system/plugins/select2/select2.min.css" rel="stylesheet" />
    <!-- c3.js Charts Plugin -->
		 <link href="assets-system/plugins/gallery/gallery.css" rel="stylesheet">

		<!-- Time picker Plugin -->
		<link href="assets-system/plugins/time-picker/jquery.timepicker.css" rel="stylesheet" />

		<!-- Date Picker Plugin -->
		<link href="assets-system/plugins/date-picker/spectrum.css" rel="stylesheet" />
    
        <!-- forn-wizard css-->
		<link href="assets-system/plugins/forn-wizard/css/material-bootstrap-wizard.css" rel="stylesheet" />
		<link href="assets-system/plugins/forn-wizard/css/demo.css" rel="stylesheet" />
        <!-- forn-full calendar -->
        <link href='assets-system/plugins/fullcalendar/fullcalendar.min.css' rel='stylesheet' />
        <link href='assets-system/plugins/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />

		<!---Font icons-->
		<link href="assets-system/plugins/iconfonts/plugin.css" rel="stylesheet" />
    
        <!-- Data table css -->
		<link href="assets-system/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
    
    <!-- Accordion Css -->
		<link href="assets-system/plugins/accordion/accordion.css" rel="stylesheet" />
        <link href="assets-system/plugins/sweet-alert/sweetalert.css" rel="stylesheet" />
<!--        <link rel="stylesheet" href="sweetalert2/dist/sweetalert2.min.css">-->
	</head>
	<body class="login-img">
		<!-- Header Background Animation-->
		<div id="canvas" class="gradient"></div>
		<div id="global-loader" ><div class="showbox"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div></div>
		<div class="page">
			<div class="page-single">
				<div class="container">
					<div class="row">
						<div class="col col-login mx-auto">
							<div class="text-center mb-6">
								<img src="assets/img/all-image-website/logo-white.png" width="200%" height="100%" >
                                
							</div>
                            
							<form class="card" method="POST">
								<div class="card-body p-6">
									<div class="card-title text-center">Login to your Account</div>
									<div class="form-group">
										<label class="form-label">Email address</label>
										<input type="email" class="form-control" id="email" name="email"  placeholder="Enter email" required>
									</div>
									<div class="form-group">
										<label class="form-label">Password
											<a href="system-forgot-password.php" class="float-right small">I forgot password</a>
										</label>
										<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
									</div>
									<div class="form-footer">
										<button type="submit" id="submit" class="btn btn-primary btn-block">Login</button>
									</div>
                                    <!-- <div class="text-center text-muted mt-3">
										Don't have account yet? <a href="system-signup.php">Sign up</a>
									</div> -->
								</div>
							</form>
                            
						</div>
                        <?php if(isset($_GET['m'])): ?>
                                    <div class="flash-data" data-flashdata="<?= $_GET['m'];?>"></div>
                        <?php endif; ?>
					</div>
				</div>
			</div>
		</div>

       

		<script src="assets-system/js/vendors/jquery-3.2.1.min.js"></script>
		<script src="assets-system/js/vendors/bootstrap.bundle.min.js"></script>
		<script src="assets-system/js/vendors/jquery.sparkline.min.js"></script>
		<script src="assets-system/js/vendors/selectize.min.js"></script>
		<script src="assets-system/js/vendors/jquery.tablesorter.min.js"></script>
		<script src="assets-system/js/vendors/circle-progress.min.js"></script>
		<script src="assets-system/plugins/rating/jquery.rating-stars.js"></script>
        <script src='assets-system/plugins/fullcalendar/moment.min.js'></script>		
		<script src='assets-system/plugins/fullcalendar/fullcalendar.min.js'></script>
        <script src="assets-system/js/vendors/selectize.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!--        <script src="jquery-3.5.1.min.js"></script>-->
      
		<!-- Side menu js -->
		<script src="assets-system/plugins/toggle-sidebar/js/sidemenu.js"></script>

		<!-- Custom scroll bar Js-->
		<script src="assets-system/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

         <script src="https://vjs.zencdn.net/7.10.2/video.min.js"></script>

		<!--Select2 js -->
		<script src="assets-system/plugins/select2/select2.full.min.js"></script>

		<!-- Timepicker js -->
		<script src="assets-system/plugins/time-picker/jquery.timepicker.js"></script>
		<script src="assets-system/plugins/time-picker/toggles.min.js"></script>

		<!-- Datepicker js -->
		<script src="assets-system/plugins/date-picker/spectrum.js"></script>
		<script src="assets-system/plugins/date-picker/jquery-ui.js"></script>
		<script src="assets-system/plugins/input-mask/jquery.maskedinput.js"></script>

		<!-- 3Dlines-animation -->
        <script src="assets-system/plugins/3Dlines-animation/three.min.js"></script>
        <script src="assets-system/plugins/3Dlines-animation/projector.js"></script>
        <script src="assets-system/plugins/3Dlines-animation/canvas-renderer.js"></script>
        <script src="assets-system/plugins/3Dlines-animation/3d-lines-animation.js"></script>
        <script src="assets-system/plugins/3Dlines-animation/color.js"></script>
        <!-- Sweet alert Plugin -->
<!--		<script src="assets/plugins/sweet-alert/sweetalert.min.js"></script>-->
<!--		<script src="assets/js/sweet-alert.js"></script>-->

		<!-- Inline js -->
		<script src="assets-system/js/select2.js"></script>
        <!-- Gallery js -->
		<script src="assets-system/plugins/gallery/picturefill.js"></script>
        <script src="assets-system/plugins/gallery/lightgallery.js"></script>
        <script src="assets-system/plugins/gallery/lg-pager.js"></script>
        <script src="assets-system/plugins/gallery/lg-autoplay.js"></script>
        <script src="assets-system/plugins/gallery/lg-fullscreen.js"></script>
        <script src="assets-system/plugins/gallery/lg-zoom.js"></script>
        <script src="assets-system/plugins/gallery/lg-hash.js"></script>
        <script src="assets-system/plugins/gallery/lg-share.js"></script>

		<!--Counters -->
		<script src="assets-system/plugins/counters/counterup.min.js"></script>
		<script src="assets-system/plugins/counters/waypoints.min.js"></script>

		<!-- Custom js -->
        <script src="assets-system/js/fullcalendar.js"></script>
		<script src="assets-system/js/custom.js"></script>
        <!---Accordion Js-->
		<script src="assets-system/plugins/accordion/accordion.min.js"></script>

        <!-- Data tables -->
		<script src="assets-system/plugins/datatable/jquery.dataTables.min.js"></script>
		<script src="assets-system/plugins/datatable/dataTables.bootstrap4.min.js"></script>

		<!-- forn-wizard js-->
		<script src="assets-system/plugins/forn-wizard/js/material-bootstrap-wizard.js"></script>
		<script src="assets-system/plugins/forn-wizard/js/jquery.validate.min.js"></script>
		<script src="assets-system/plugins/forn-wizard/js/jquery.bootstrap.js"></script>

        <!-- Accordion Js-->
		<script>
			$(function(e) {
				$(".demo-accordion").accordionjs();
				// Demo text. Let's save some space to make the code readable. ;)
				$('.acc_content').not('.nodemohtml').html('<p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Fusce aliquet neque et accumsan fermentum. Aliquam lobortis neque in nulla  tempus, molestie fermentum purus euismod.</p>');
			});
		</script><script>
    const flashdata = $('.flash-data').data('flashdata')
    if (flashdata){
        Swal.fire({
            type : 'success',
            title : 'Warning',
            text: 'Your Account Successful registration and please waiting to admin approver',
        })
    } 
</script>  
<script> 
			var colors = new Array(
			[148,23,35],
			[148,23,35],
			[148,23,35],
			[148,23,35],
			[148,23,35],
			[148,23,35],
			[148,23,35],
			[148,23,35]);			
		</script>

        
	</body>

<!-- Mirrored from spruko.com/demo/ren/Blue-animated/LeftMenu/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Sep 2018 05:00:14 GMT -->
</html>
<?php

    }
	?>