<?php
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
            $user_id = $_SESSION["user_id"];
            $job = $_SESSION["job"];
            $roles = $_SESSION['roles'];
            $centers = $_SESSION['centers'];
            $now = date("Y-m-d");
        ?>
				<div class="app-content my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title" style="text-transform: uppercase;">e-profilling</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Module</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profilling</li>
                            </ol>
						</div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="card">                                  
                                    <div class="card-header">
                                        <!-- <h3 class="card-title">e-Profilling</h3> -->
                                    </div>
                                    <div class="card-body">
                                        <div class="list-group">
                                            <a href="system-profilling-admin-v7.php" class="list-group-item list-group-item-action flex-column align-items-start disabled">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1" style="color: #94171b; text-transform: uppercase;" >Admin</h5>
                                                    <!-- <small>3 days ago</small> -->
                                                </div>
                                            </a>
                                            <a href="system-profilling-sales-v7.php" class="list-group-item list-group-item-action flex-column align-items-start disabled">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1" style="color: #94171b; text-transform: uppercase;" >sales</h5>
                                                    <!-- <small>3 days ago</small> -->
                                                </div>
                                            </a>
                                            <a href="system-profilling-physiotherapist-v7.php" class="list-group-item list-group-item-action flex-column align-items-start disabled">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1" style="color: #94171b; text-transform: uppercase;" >physiotherapist</h5>
                                                    <!-- <small>3 days ago</small> -->
                                                </div>
                                            </a>                                              
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <!-- /Boxes de Acoes -->
                        </div>

                    </div>
                </div>
<?php 
include('system-footer.php');
?>