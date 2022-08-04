<!--footer-->
					<footer class="footer">
						<div class="container">
							<div class="row align-items-center flex-row-reverse">
								<div class="col-lg-12 col-sm-12 mt-3 mt-lg-0 text-center">
									Copyright © 2021 <a href="#">PhysioMobile Malaysia </a>. Designed by <a href="#">PMMY Group</a> All rights reserved.
								</div>
							</div>
						</div>
					</footer>
					<!-- End Footer-->
				</div>
			</div>
		</div>

		<!-- Back to top -->
		<a href="#top" id="back-to-top" style="display: inline;"><i class="fas fa-angle-up"></i></a>
		<!-- Dashboard Css -->
       
		<script src="assets-system/js/vendors/jquery-3.2.1.min.js"></script>
		<script src="assets-system/js/vendors/bootstrap.bundle.min.js"></script>
		<script src="assets-system/js/vendors/jquery.sparkline.min.js"></script>
		<script src="assets-system/js/vendors/selectize.min.js"></script>
		<script src="assets-system/js/vendors/jquery.tablesorter.min.js"></script>
		<script src="assets-system/js/vendors/circle-progress.min.js"></script>
		<script src="assets-system/plugins/rating/jquery.rating-stars.js"></script>
        <script src='assets-system/plugins/fullcalendar/moment.min.js'></script>		
		<script src='assets-system/plugins/fullcalendar/fullcalendar.min.js'></script>
       
		<!--        <script src="sweetalert2.all.min.js"></script>-->
		<!--<script src="sweetalert2/dist/sweetalert2.all.min.js"></script>-->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<!--        <script src="jquery-3.5.1.min.js"></script>-->
		<!-- WYSIWYG Editor js -->
		<script src="assets-system/plugins/wysiwyag/jquery.richtext.js"></script>                
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
        <!-- Input Mask Plugin -->
		<script src="assets-system/plugins/input-mask/jquery.mask.min.js"></script>
      
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
		<script>
			$(function(e) {
				$('.content').richText();
				$('.content2').richText();
				$('.content3').richText();
				$('.content4').richText();
			});
		</script>
        <!-- Accordion Js-->
		<script>
			$(function(e) {
				$(".demo-accordion").accordionjs();
				// Demo text. Let's save some space to make the code readable. ;)
				$('.acc_content').not('.nodemohtml').html('<p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Fusce aliquet neque et accumsan fermentum. Aliquam lobortis neque in nulla  tempus, molestie fermentum purus euismod.</p>');
			});
		</script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

		<script>
            $('#editmodule').on('show.bs.modal', function (e) {
                var id_department = $(e.relatedTarget).data('id_department');
                var job_department = $(e.relatedTarget).data('job_department');
                var category = $(e.relatedTarget).data('category');
                
                //sent data to modal view
                $(e.currentTarget).find('input[name="id_department"]').val(id_department);
                $(e.currentTarget).find('input[name="department"]').val(job_department);
                // $(e.currentTarget).find('input[name="category"]').val(category);
                $(e.currentTarget).find('select[name="category"]').val(category);               
            });
            
            $('#editFUOne').on('show.bs.modal', function (e) {
                var tracker_id = $(e.relatedTarget).data('tracker_id');
                var status = $(e.relatedTarget).data('status');
                var FUOne = $(e.relatedTarget).data('FUOne');
                
                //sent data to modal view
                $(e.currentTarget).find('input[name="tracker_id"]').val(tracker_id);
                $(e.currentTarget).find('select[name="status"]').val(status);
                $(e.currentTarget).find('date[name="FUOne"]').val(FUOne);               
            });
            $('#editFUTwo').on('show.bs.modal', function (e) {
                var tracker_id = $(e.relatedTarget).data('tracker_id');
                var status = $(e.relatedTarget).data('status');
                var FUTwo = $(e.relatedTarget).data('FUTwo');
                
                //sent data to modal view
                $(e.currentTarget).find('input[name="tracker_id"]').val(tracker_id);
                $(e.currentTarget).find('select[name="status"]').val(status);
                $(e.currentTarget).find('date[name="FUTwo"]').val(FUTwo);               
            });
            $('#editFUThree').on('show.bs.modal', function (e) {
                var tracker_id = $(e.relatedTarget).data('tracker_id');
                var status = $(e.relatedTarget).data('status');
                var FUThree = $(e.relatedTarget).data('FUThree');
                
                //sent data to modal view
                $(e.currentTarget).find('input[name="tracker_id"]').val(tracker_id);
                $(e.currentTarget).find('select[name="status"]').val(status);
                $(e.currentTarget).find('date[name="FUThree"]').val(FUThree);               
            });
            $('#edittaskmodule').on('show.bs.modal', function (e) {
                var id_taskdepartment = $(e.relatedTarget).data('id_taskdepartment');
                var module = $(e.relatedTarget).data('module');
                var description = $(e.relatedTarget).data('description');
                var image = $(e.relatedTarget).data('image');
                var document = $(e.relatedTarget).data('document');
                var thumbnail = $(e.relatedTarget).data('thumbnail');
                var video = $(e.relatedTarget).data('video');
                
                //sent data to modal view
                $(e.currentTarget).find('input[name="id_taskdepartment"]').val(id_taskdepartment);
                $(e.currentTarget).find('input[name="module"]').val(module);
               
                // $(e.currentTarget).find('input[name="description"]').val(description);
                $(e.currentTarget).find('textarea[name="description"]').val(description);
                $(e.currentTarget).find('file[name="image"]').val(image);
                $(e.currentTarget).find('file[name="document"]').val(document);
                $(e.currentTarget).find('file[name="thumbnail"]').val(thumbnail);
                $(e.currentTarget).find('file[name="video"]').val(video);               
            });
        </script>


	<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'New' AND branch IN ('Kota Damansara','4')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Pending' AND branch IN ('Kota Damansara','4') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Close' AND branch IN ('Kota Damansara','4')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KOTAJANUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'New' AND branch IN ('Kota Damansara','4')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Pending' AND branch IN ('Kota Damansara','4') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Close' AND branch IN ('Kota Damansara','4')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KOTAFEBRUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'New' AND branch IN ('Kota Damansara','4')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Pending' AND branch IN ('Kota Damansara','4') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Close' AND branch IN ('Kota Damansara','4')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KOTAMARCH').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'New' AND branch IN ('Kota Damansara','4')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Pending' AND branch IN ('Kota Damansara','4') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Close' AND branch IN ('Kota Damansara','4')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KOTAAPRIL').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'New' AND branch IN ('Kota Damansara','4')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Pending' AND branch IN ('Kota Damansara','4') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Close' AND branch IN ('Kota Damansara','4')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KOTAMAY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'New' AND branch IN ('Kota Damansara','4')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Pending' AND branch IN ('Kota Damansara','4') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Close' AND branch IN ('Kota Damansara','4')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KOTAJUNE').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'New' AND branch IN ('Kota Damansara','4')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Pending' AND branch IN ('Kota Damansara','4') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Close' AND branch IN ('Kota Damansara','4')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KOTAJULY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'New' AND branch IN ('Kota Damansara','4')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Pending' AND branch IN ('Kota Damansara','4') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Close' AND branch IN ('Kota Damansara','4')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KOTAJAUGUST').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'New' AND branch IN ('Kota Damansara','4')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Pending' AND branch IN ('Kota Damansara','4') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Close' AND branch IN ('Kota Damansara','4')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KOTASEPTEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'New' AND branch IN ('Kota Damansara','4')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Pending' AND branch IN ('Kota Damansara','4') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Close' AND branch IN ('Kota Damansara','4')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KOTAOCTOBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'New' AND branch IN ('Kota Damansara','4')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Pending' AND branch IN ('Kota Damansara','4') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Close' AND branch IN ('Kota Damansara','4')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KOTANOVEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'New' AND branch IN ('Kota Damansara','4')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Pending' AND branch IN ('Kota Damansara','4') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Close' AND branch IN ('Kota Damansara','4')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KOTADECEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
        <?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'New' AND branch IN ('Kuala Selangor','6')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Pending' AND branch IN ('Kuala Selangor','6') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Close' AND branch IN ('Kuala Selangor','6')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KSJANUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'New' AND branch IN ('Kuala Selangor','6')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Pending' AND branch IN ('Kuala Selangor','6') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Close' AND branch IN ('Kuala Selangor','6')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KSFEBRUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'New' AND branch IN ('Kuala Selangor','6')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Pending' AND branch IN ('Kuala Selangor','6') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Close' AND branch IN ('Kuala Selangor','6')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KSMARCH').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'New' AND branch IN ('Kuala Selangor','6')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Pending' AND branch IN ('Kuala Selangor','6') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Close' AND branch IN ('Kuala Selangor','6')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KSAPRIL').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'New' AND branch IN ('Kuala Selangor','6')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Pending' AND branch IN ('Kuala Selangor','6') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Close' AND branch IN ('Kuala Selangor','6')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KSMAY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'New' AND branch IN ('Kuala Selangor','6')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Pending' AND branch IN ('Kuala Selangor','6') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Close' AND branch IN ('Kuala Selangor','6')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KSJUNE').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'New' AND branch IN ('Kuala Selangor','6')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Pending' AND branch IN ('Kuala Selangor','6') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Close' AND branch IN ('Kuala Selangor','6')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KSJULY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'New' AND branch IN ('Kuala Selangor','6')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Pending' AND branch IN ('Kuala Selangor','6') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Close' AND branch IN ('Kuala Selangor','6')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KSJAUGUST').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'New' AND branch IN ('Kuala Selangor','6')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Pending' AND branch IN ('Kuala Selangor','6') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Close' AND branch IN ('Kuala Selangor','6')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KSSEPTEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'New' AND branch IN ('Kuala Selangor','6')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Pending' AND branch IN ('Kuala Selangor','6') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Close' AND branch IN ('Kuala Selangor','6')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KSOCTOBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'New' AND branch IN ('Kuala Selangor','6')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Pending' AND branch IN ('Kuala Selangor','6') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Close' AND branch IN ('Kuala Selangor','6')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KSNOVEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'New' AND branch IN ('Kuala Selangor','6')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Pending' AND branch IN ('Kuala Selangor','6') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Close' AND branch IN ('Kuala Selangor','6')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KSDECEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'New' AND branch IN ('Shah Alam','1')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Pending' AND branch IN ('Shah Alam','1') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Close' AND branch IN ('Shah Alam','1')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SAJANUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'New' AND branch IN ('Shah Alam','1')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Pending' AND branch IN ('Shah Alam','1') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Close' AND branch IN ('Shah Alam','1')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SAFEBRUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'New' AND branch IN ('Shah Alam','1')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Pending' AND branch IN ('Shah Alam','1') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Close' AND branch IN ('Shah Alam','1')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SAMARCH').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'New' AND branch IN ('Shah Alam','1')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Pending' AND branch IN ('Shah Alam','1') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Close' AND branch IN ('Shah Alam','1')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SAAPRIL').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'New' AND branch IN ('Shah Alam','1')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Pending' AND branch IN ('Shah Alam','1') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Close' AND branch IN ('Shah Alam','1')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SAMAY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'New' AND branch IN ('Shah Alam','1')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Pending' AND branch IN ('Shah Alam','1') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Close' AND branch IN ('Shah Alam','1')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SAJUNE').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'New' AND branch IN ('Shah Alam','1')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Pending' AND branch IN ('Shah Alam','1') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Close' AND branch IN ('Shah Alam','1')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SAJULY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'New' AND branch IN ('Shah Alam','1')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Pending' AND branch IN ('Shah Alam','1') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Close' AND branch IN ('Shah Alam','1')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SAAUGUST').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'New' AND branch IN ('Shah Alam','1')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Pending' AND branch IN ('Shah Alam','1') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Close' AND branch IN ('Shah Alam','1')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SASEPTEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'New' AND branch IN ('Shah Alam','1')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Pending' AND branch IN ('Shah Alam','1') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Close' AND branch IN ('Shah Alam','1')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SAOCTOBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'New' AND branch IN ('Shah Alam','1')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Pending' AND branch IN ('Shah Alam','1') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Close' AND branch IN ('Shah Alam','1')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SANOVEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'New' AND branch IN ('Shah Alam','1')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Pending' AND branch IN ('Shah Alam','1') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Close' AND branch IN ('Shah Alam','1')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SADECEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
        <?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'New' AND branch IN ('Wangsa Melawati','3')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Pending' AND branch IN ('Wangsa Melawati','3') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Close' AND branch IN ('Wangsa Melawati','3')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('WMJANUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'New' AND branch IN ('Wangsa Melawati','3')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Pending' AND branch IN ('Wangsa Melawati','3') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Close' AND branch IN ('Wangsa Melawati','3')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('WMFEBRUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'New' AND branch IN ('Wangsa Melawati','3')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Pending' AND branch IN ('Wangsa Melawati','3') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Close' AND branch IN ('Wangsa Melawati','3')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('WMMARCH').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'New' AND branch IN ('Wangsa Melawati','3')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Pending' AND branch IN ('Wangsa Melawati','3') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Close' AND branch IN ('Wangsa Melawati','3')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('WMAPRIL').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'New' AND branch IN ('Wangsa Melawati','3')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Pending' AND branch IN ('Wangsa Melawati','3') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Close' AND branch IN ('Wangsa Melawati','3')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('WMMAY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'New' AND branch IN ('Wangsa Melawati','3')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Pending' AND branch IN ('Wangsa Melawati','3') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Close' AND branch IN ('Wangsa Melawati','3')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('WMJUNE').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'New' AND branch IN ('Wangsa Melawati','3')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Pending' AND branch IN ('Wangsa Melawati','3') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Close' AND branch IN ('Wangsa Melawati','3')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('WMJULY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'New' AND branch IN ('Wangsa Melawati','3')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Pending' AND branch IN ('Wangsa Melawati','3') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Close' AND branch IN ('Wangsa Melawati','3')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('WMAUGUST').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'New' AND branch IN ('Wangsa Melawati','3')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Pending' AND branch IN ('Wangsa Melawati','3') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Close' AND branch IN ('Wangsa Melawati','3')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('WMSEPTEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'New' AND branch IN ('Wangsa Melawati','3')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Pending' AND branch IN ('Wangsa Melawati','3') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Close' AND branch IN ('Wangsa Melawati','3')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('WMOCTOBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'New' AND branch IN ('Wangsa Melawati','3')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Pending' AND branch IN ('Wangsa Melawati','3') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Close' AND branch IN ('Wangsa Melawati','3')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('WMNOVEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'New' AND branch IN ('Wangsa Melawati','3')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Pending' AND branch IN ('Wangsa Melawati','3') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Close' AND branch IN ('Wangsa Melawati','3')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('WMDECEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'New' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Pending' AND branch IN ('Bandar Puteri Bangi','5') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Close' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BPBJANUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'New' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Pending' AND branch IN ('Bandar Puteri Bangi','5') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Close' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BPBFEBRUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'New' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Pending' AND branch IN ('Bandar Puteri Bangi','5') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Close' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BPBMARCH').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'New' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Pending' AND branch IN ('Bandar Puteri Bangi','5') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Close' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BPBAPRIL').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'New' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Pending' AND branch IN ('Bandar Puteri Bangi','5') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Close' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BPBMAY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'New' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Pending' AND branch IN ('Bandar Puteri Bangi','5') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Close' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BPBJUNE').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'New' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Pending' AND branch IN ('Bandar Puteri Bangi','5') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Close' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BPBJULY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'New' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Pending' AND branch IN ('Bandar Puteri Bangi','5') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Close' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BPBAUGUST').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'New' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Pending' AND branch IN ('Bandar Puteri Bangi','5') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Close' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BPBSEPTEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'New' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Pending' AND branch IN ('Bandar Puteri Bangi','5') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Close' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BPBOCTOBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'New' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Pending' AND branch IN ('Bandar Puteri Bangi','5') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Close' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BPBNOVEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'New' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Pending' AND branch IN ('Bandar Puteri Bangi','5') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Close' AND branch IN ('Bandar Puteri Bangi','5')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BPBDECEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'New' AND branch IN ('Johor Bharu','2')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Pending' AND branch IN ('Johor Bharu','2') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Close' AND branch IN ('Johor Bharu','2')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('JBJANUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'New' AND branch IN ('Johor Bharu','2')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Pending' AND branch IN ('Johor Bharu','2') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Close' AND branch IN ('Johor Bharu','2')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('JBFEBRUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'New' AND branch IN ('Johor Bharu','2')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Pending' AND branch IN ('Johor Bharu','2') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Close' AND branch IN ('Johor Bharu','2')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('JBMARCH').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'New' AND branch IN ('Johor Bharu','2')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Pending' AND branch IN ('Johor Bharu','2') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Close' AND branch IN ('Johor Bharu','2')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('JBAPRIL').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'New' AND branch IN ('Johor Bharu','2')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Pending' AND branch IN ('Johor Bharu','2') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Close' AND branch IN ('Johor Bharu','2')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('JBMAY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'New' AND branch IN ('Johor Bharu','2')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Pending' AND branch IN ('Johor Bharu','2') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Close' AND branch IN ('Johor Bharu','2')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('JBJUNE').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'New' AND branch IN ('Johor Bharu','2')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Pending' AND branch IN ('Johor Bharu','2') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Close' AND branch IN ('Johor Bharu','2')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('JBJULY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'New' AND branch IN ('Johor Bharu','2')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Pending' AND branch IN ('Johor Bharu','2') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Close' AND branch IN ('Johor Bharu','2')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('JBAUGUST').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'New' AND branch IN ('Johor Bharu','2')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Pending' AND branch IN ('Johor Bharu','2') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Close' AND branch IN ('Johor Bharu','2')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('JBSEPTEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'New' AND branch IN ('Johor Bharu','2')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Pending' AND branch IN ('Johor Bharu','2') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Close' AND branch IN ('Johor Bharu','2')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('JBOCTOBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'New' AND branch IN ('Johor Bharu','2')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Pending' AND branch IN ('Johor Bharu','2') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Close' AND branch IN ('Johor Bharu','2')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('JBNOVEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'New' AND branch IN ('Johor Bharu','2')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Pending' AND branch IN ('Johor Bharu','2') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Close' AND branch IN ('Johor Bharu','2')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('JBDECEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'New' AND branch IN ('Bandar Baru Bangi','9')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Pending' AND branch IN ('Bandar Baru Bangi','9') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Close' AND branch IN ('Bandar Baru Bangi','9')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BBBJANUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'New' AND branch IN ('Bandar Baru Bangi','9')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Pending' AND branch IN ('Bandar Baru Bangi','9') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Close' AND branch IN ('Bandar Baru Bangi','9')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BBBFEBRUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'New' AND branch IN ('Bandar Baru Bangi','9')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Pending' AND branch IN ('Bandar Baru Bangi','9') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Close' AND branch IN ('Bandar Baru Bangi','9')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BBBMARCH').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'New' AND branch IN ('Bandar Baru Bangi','9')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Pending' AND branch IN ('Bandar Baru Bangi','9') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Close' AND branch IN ('Bandar Baru Bangi','9')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BBBAPRIL').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'New' AND branch IN ('Bandar Baru Bangi','9')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Pending' AND branch IN ('Bandar Baru Bangi','9') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Close' AND branch IN ('Bandar Baru Bangi','9')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BBBMAY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'New' AND branch IN ('Bandar Baru Bangi','9')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Pending' AND branch IN ('Bandar Baru Bangi','9') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Close' AND branch IN ('Bandar Baru Bangi','9')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BBBJUNE').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'New' AND branch IN ('Bandar Baru Bangi','9')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Pending' AND branch IN ('Bandar Baru Bangi','9') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Close' AND branch IN ('Bandar Baru Bangi','9')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BBBJULY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'New' AND branch IN ('Bandar Baru Bangi','9')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Pending' AND branch IN ('Bandar Baru Bangi','9') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Close' AND branch IN ('Bandar Baru Bangi','9')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BBBAUGUST').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'New' AND branch IN ('Bandar Baru Bangi','9')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Pending' AND branch IN ('Bandar Baru Bangi','9') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Close' AND branch IN ('Bandar Baru Bangi','9')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BBBSEPTEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'New' AND branch IN ('Bandar Baru Bangi','9')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Pending' AND branch IN ('Bandar Baru Bangi','9') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Close' AND branch IN ('Bandar Baru Bangi','9')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BBBOCTOBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'New' AND branch IN ('Bandar Baru Bangi','9')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Pending' AND branch IN ('Bandar Baru Bangi','9') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Close' AND branch IN ('Bandar Baru Bangi','9')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BBBNOVEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'New' AND branch IN ('Bandar Baru Bangi','9')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Pending' AND branch IN ('Bandar Baru Bangi','9') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Close' AND branch IN ('Bandar Baru Bangi','9')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BBBDECEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'New' AND branch IN ('Krubong Melaka','10')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Pending' AND branch IN ('Krubong Melaka','10') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Close' AND branch IN ('Krubong Melaka','10')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KRUBONGJANUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'New' AND branch IN ('Krubong Melaka','10')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Pending' AND branch IN ('Krubong Melaka','10') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Close' AND branch IN ('Krubong Melaka','10')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KRUBONGFEBRUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'New' AND branch IN ('Krubong Melaka','10')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Pending' AND branch IN ('Krubong Melaka','10') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Close' AND branch IN ('Krubong Melaka','10')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KRUBONGMARCH').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'New' AND branch IN ('Krubong Melaka','10')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Pending' AND branch IN ('Krubong Melaka','10') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Close' AND branch IN ('Krubong Melaka','10')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KRUBONGAPRIL').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'New' AND branch IN ('Krubong Melaka','10')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Pending' AND branch IN ('Krubong Melaka','10') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Close' AND branch IN ('Krubong Melaka','10')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KRUBONGMAY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'New' AND branch IN ('Krubong Melaka','10')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Pending' AND branch IN ('Krubong Melaka','10') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Close' AND branch IN ('Krubong Melaka','10')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KRUBONGJUNE').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'New' AND branch IN ('Krubong Melaka','10')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Pending' AND branch IN ('Krubong Melaka','10') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Close' AND branch IN ('Krubong Melaka','10')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KRUBONGJULY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'New' AND branch IN ('Krubong Melaka','10')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Pending' AND branch IN ('Krubong Melaka','10') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Close' AND branch IN ('Krubong Melaka','10')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KRUBONGAUGUST').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'New' AND branch IN ('Krubong Melaka','10')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Pending' AND branch IN ('Krubong Melaka','10') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Close' AND branch IN ('Krubong Melaka','10')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KRUBONGSEPTEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'New' AND branch IN ('Krubong Melaka','10')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Pending' AND branch IN ('Krubong Melaka','10') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Close' AND branch IN ('Krubong Melaka','10')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KRUBONGOCTOBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'New' AND branch IN ('Krubong Melaka','10')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Pending' AND branch IN ('Krubong Melaka','10') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Close' AND branch IN ('Krubong Melaka','10')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KRUBONGNOVEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'New' AND branch IN ('Krubong Melaka','10')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Pending' AND branch IN ('Krubong Melaka','10') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Close' AND branch IN ('Krubong Melaka','10')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('KRUBONGDECEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'New' AND branch IN ('Bandar Botanik','12')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Pending' AND branch IN ('Bandar Botanik','12') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Close' AND branch IN ('Bandar Botanik','12')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BOTANIKJANUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'New' AND branch IN ('Bandar Botanik','12')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Pending' AND branch IN ('Bandar Botanik','12') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Close' AND branch IN ('Bandar Botanik','12')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BOTANIKFEBRUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'New' AND branch IN ('Bandar Botanik','12')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Pending' AND branch IN ('Bandar Botanik','12') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Close' AND branch IN ('Bandar Botanik','12')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BOTANIKMARCH').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'New' AND branch IN ('Bandar Botanik','12')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Pending' AND branch IN ('Bandar Botanik','12') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Close' AND branch IN ('Bandar Botanik','12')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BOTANIKAPRIL').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'New' AND branch IN ('Bandar Botanik','12')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Pending' AND branch IN ('Bandar Botanik','12') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Close' AND branch IN ('Bandar Botanik','12')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BOTANIKMAY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'New' AND branch IN ('Bandar Botanik','12')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Pending' AND branch IN ('Bandar Botanik','12') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Close' AND branch IN ('Bandar Botanik','12')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BOTANIKJUNE').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'New' AND branch IN ('Bandar Botanik','12')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Pending' AND branch IN ('Bandar Botanik','12') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Close' AND branch IN ('Bandar Botanik','12')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BOTANIKJULY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'New' AND branch IN ('Bandar Botanik','12')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Pending' AND branch IN ('Bandar Botanik','12') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Close' AND branch IN ('Bandar Botanik','12')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BOTANIKAUGUST').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'New' AND branch IN ('Bandar Botanik','12')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Pending' AND branch IN ('Bandar Botanik','12') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Close' AND branch IN ('Bandar Botanik','12')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BOTANIKSEPTEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'New' AND branch IN ('Bandar Botanik','12')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Pending' AND branch IN ('Bandar Botanik','12') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Close' AND branch IN ('Bandar Botanik','12')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BOTANIKOCTOBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'New' AND branch IN ('Bandar Botanik','12')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Pending' AND branch IN ('Bandar Botanik','12') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Close' AND branch IN ('Bandar Botanik','12')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BOTANIKNOVEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'New' AND branch IN ('Bandar Botanik','12')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Pending' AND branch IN ('Bandar Botanik','12') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Close' AND branch IN ('Bandar Botanik','12')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BOTANIKDECEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'New' AND branch IN ('Eco Ardence','13')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Pending' AND branch IN ('Eco Ardence','13') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Close' AND branch IN ('Eco Ardence','13')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('ECOJANUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'New' AND branch IN ('Eco Ardence','13')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Pending' AND branch IN ('Eco Ardence','13') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Close' AND branch IN ('Eco Ardence','13')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('ECOFEBRUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'New' AND branch IN ('Eco Ardence','13')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Pending' AND branch IN ('Eco Ardence','13') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Close' AND branch IN ('Eco Ardence','13')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('ECOMARCH').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'New' AND branch IN ('Eco Ardence','13')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Pending' AND branch IN ('Eco Ardence','13') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Close' AND branch IN ('Eco Ardence','13')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('ECOAPRIL').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'New' AND branch IN ('Eco Ardence','13')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Pending' AND branch IN ('Eco Ardence','13') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Close' AND branch IN ('Eco Ardence','13')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('ECOMAY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'New' AND branch IN ('Eco Ardence','13')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Pending' AND branch IN ('Eco Ardence','13') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Close' AND branch IN ('Eco Ardence','13')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('ECOJUNE').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'New' AND branch IN ('Eco Ardence','13')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Pending' AND branch IN ('Eco Ardence','13') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Close' AND branch IN ('Eco Ardence','13')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('ECOJULY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'New' AND branch IN ('Eco Ardence','13')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Pending' AND branch IN ('Eco Ardence','13') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Close' AND branch IN ('Eco Ardence','13')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('ECOAUGUST').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'New' AND branch IN ('Eco Ardence','13')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Pending' AND branch IN ('Eco Ardence','13') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Close' AND branch IN ('Eco Ardence','13')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('ECOSEPTEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'New' AND branch IN ('Eco Ardence','13')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Pending' AND branch IN ('Eco Ardence','13') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Close' AND branch IN ('Eco Ardence','13')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('ECOOCTOBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'New' AND branch IN ('Eco Ardence','13')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Pending' AND branch IN ('Eco Ardence','13')");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Close' AND branch IN ('Eco Ardence','13')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('ECONOVEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'New' AND branch IN ('Eco Ardence','13')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Pending' AND branch IN ('Eco Ardence','13') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Close' AND branch IN ('Eco Ardence','13')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('ECODECEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'New' AND branch IN ('Seri kembangan','15')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Pending' AND branch IN ('Seri kembangan','15') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Close' AND branch IN ('Seri kembangan','15')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SERIKEMBANGANJANUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'New' AND branch IN ('Seri kembangan','15')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Pending' AND branch IN ('Seri kembangan','15') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Close' AND branch IN ('Seri kembangan','15')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SERIKEMBANGANFEBRUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'New' AND branch IN ('Seri kembangan','15')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Pending' AND branch IN ('Seri kembangan','15') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Close' AND branch IN ('Seri kembangan','15')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SERIKEMBANGANMARCH').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'New' AND branch IN ('Seri kembangan','15')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Pending' AND branch IN ('Seri kembangan','15') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Close' AND branch IN ('Seri kembangan','15')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SERIKEMBANGANAPRIL').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'New' AND branch IN ('Seri kembangan','15')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Pending' AND branch IN ('Seri kembangan','15') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Close' AND branch IN ('Seri kembangan','15')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SERIKEMBANGANMAY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'New' AND branch IN ('Seri kembangan','15')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Pending' AND branch IN ('Seri kembangan','15') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Close' AND branch IN ('Seri kembangan','15')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SERIKEMBANGANJUNE').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'New' AND branch IN ('Seri kembangan','15')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Pending' AND branch IN ('Seri kembangan','15') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Close' AND branch IN ('Seri kembangan','15')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SERIKEMBANGANJULY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'New' AND branch IN ('Seri kembangan','15')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Pending' AND branch IN ('Seri kembangan','15') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Close' AND branch IN ('Seri kembangan','15')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SERIKEMBANGANAUGUST').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'New' AND branch IN ('Seri kembangan','15')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Pending' AND branch IN ('Seri kembangan','15') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Close' AND branch IN ('Seri kembangan','15')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SERIKEMBANGANSEPTEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'New' AND branch IN ('Seri kembangan','15')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Pending' AND branch IN ('Seri kembangan','15') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Close' AND branch IN ('Seri kembangan','15')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SERIKEMBANGANOCTOBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'New' AND branch IN ('Seri kembangan','15')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Pending' AND branch IN ('Seri kembangan','15') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Close' AND branch IN ('Seri kembangan','15')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SERIKEMBANGANNOVEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'New' AND branch IN ('Seri kembangan','15')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Pending' AND branch IN ('Seri kembangan','15') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Close' AND branch IN ('Seri kembangan','15')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('SERIKEMBANGANDECEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'New' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Pending' AND branch IN ('Bandar Tun Hussein Onn','14') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2021-12-29' AND '2022-01-28') AND status = 'Close' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BTHOJANUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'New' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Pending' AND branch IN ('Bandar Tun Hussein Onn','14') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-01-29' AND '2022-02-28') AND status = 'Close' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BTHOFEBRUARY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
		<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'New' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Pending' AND branch IN ('Bandar Tun Hussein Onn','14') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-02-29' AND '2022-03-28') AND status = 'Close' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BTHOMARCH').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'New' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Pending' AND branch IN ('Bandar Tun Hussein Onn','14') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-03-29' AND '2022-04-28') AND status = 'Close' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BTHOAPRIL').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'New' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Pending' AND branch IN ('Bandar Tun Hussein Onn','14') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-04-29' AND '2022-05-28') AND status = 'Close' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BTHOMAY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'New' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Pending' AND branch IN ('Bandar Tun Hussein Onn','14') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-05-29' AND '2022-06-28') AND status = 'Close' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BTHOJUNE').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'New' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Pending' AND branch IN ('Bandar Tun Hussein Onn','14') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-06-29' AND '2022-07-28') AND status = 'Close' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BTHOJULY').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'New' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Pending' AND branch IN ('Bandar Tun Hussein Onn','14') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-07-29' AND '2022-08-28') AND status = 'Close' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BTHOAUGUST').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'New' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Pending' AND branch IN ('Bandar Tun Hussein Onn','14') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-08-29' AND '2022-09-28') AND status = 'Close' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BTHOSEPTEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'New' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Pending' AND branch IN ('Bandar Tun Hussein Onn','14') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-09-29' AND '2022-10-28') AND status = 'Close' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BTHOOCTOBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'New' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Pending' AND branch IN ('Bandar Tun Hussein Onn','14') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-10-29' AND '2022-11-28') AND status = 'Close' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BTHONOVEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
<?php 
		// SELECT concat(round((COUNT(status)*100 /(Select COUNT(*) From inquiry)),2)) AS ctn From inquiry WHERE status = 'New' AND branch = 'Kota Damansara'
		$statement = $conn->prepare("SELECT COUNT(*) AS ctn FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'New' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement->execute();

		$statement1 = $conn->prepare("SELECT COUNT(*) AS ctn1 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Pending' AND branch IN ('Bandar Tun Hussein Onn','14') ");
		$statement1->execute();

		$statement2 = $conn->prepare("SELECT COUNT(*) AS ctn2 FROM inquiry WHERE (respond_date BETWEEN '2022-11-29' AND '2022-12-28') AND status = 'Close' AND branch IN ('Bandar Tun Hussein Onn','14')");
		$statement2->execute();

		while($row = $statement->fetch(PDO::FETCH_ASSOC))
		{
		$totalNew = $row["ctn"]; 
			while($row = $statement1->fetch(PDO::FETCH_ASSOC))
			{
				$totalPending = $row["ctn1"]; 
					while($row = $statement2->fetch(PDO::FETCH_ASSOC))
						{
						$totalClose = $row["ctn2"]; 
		?>
		

		<script>
			var ctx = document.getElementById('BTHODECEMBER').getContext('2d');
			var myChart = new Chart(ctx, {
			    type: 'pie',
			    data: {
			        labels: ['New', 'Pending', 'Close'],
			        datasets: [{
			            label: 'Percentuale età',
			            data: [<?php echo $totalNew; ?>,<?php echo $totalPending; ?>,<?php echo $totalClose; ?>],
			            backgroundColor: [
			                'rgba(255, 99, 132)',
			                'rgba(54, 162, 235)',
			                'rgba(255, 206, 86)'
			            ],
			            borderColor: [
			                'rgba(255, 99, 132, 1)',
			                'rgba(54, 162, 235, 1)',
			                'rgba(255, 206, 86, 1)',
			                'rgba(75, 192, 192, 1)',
			                'rgba(153, 102, 255, 1)',
			                'rgba(255, 159, 64, 1)'
			            ],
			            borderWidth: 1
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero: true
			                }
			            }]
			        }
			    }
			});
		</script>
<?php } } } ?>
	


		<script>
			new Chart(document.getElementById("donut-chart"), {
			  type: "doughnut",
			  data: {
			    labels: ["ayam", "itik", "kambing"],
			    datasets: [
			      {
			        data: [300, 50, 100],
			        backgroundColor: [
			          "rgb(255, 99, 132)",
			          "rgb(54, 162, 235)",
			          "rgb(255, 205, 86)"
			        ]
			      }
			    ]
			  }
			});

		</script>



<script> 
			var colors = new Array(
			[0, 0, 0],
			[0, 0, 0],
			[0, 0, 0],
			[0, 0, 0],
			[0, 0, 0],
			[0, 0, 0],
			[0, 0, 0],
			[0, 0, 0],
			[0, 0, 0]
           
			);
		</script>
<script>
            $('.btn-del').on('click', function(e){
                e.preventDefault();
                const href = $(this).attr('href')

                Swal.fire({
                    title: 'Are you sure?',
                    text: "It will be deleted permanently!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',			
                }).then((result) => {
                    if (result.value){
                        document.location.href = href;
                    }
                })
            })
            
            $('#btn').on('click', function(){
                
                swal.fire({
                    type : 'success',
                    title : 'your title',
                    text: 'your text',
                })
            })
    
    const flashdata = $('.flash-data').data('flashdata')
    if (flashdata){
        Swal.fire({
            type : 'success',
            title : 'Success',
            text: 'Record has be deleted',
        })
    } 

            
        	
</script>
        <!-- Data table js -->
		<script>
			$(function(e) {
				$('#example').DataTable();
			} );
		</script>
        <script>
			$(function(e) {
				$('#example1').DataTable();
			} );
		</script>
        <script>
			$(function(e) {
				$('#example2').DataTable();
			} );
		</script>
		<script>
			$(function(e) {
				$('#example3').DataTable();
			} );
		</script>
		<script>
			$(function(e) {
				$('#example4').DataTable();
			} );
		</script>
		<script>
			$(function(e) {
				$('#example5').DataTable();
			} );
		</script>
		<script>
			$(function(e) {
				$('#example6').DataTable();
			} );
		</script>
		<script>
			$(function(e) {
				$('#example7').DataTable();
			} );
		</script>
		<script>
			$(function(e) {
				$('#example8').DataTable();
			} );
		</script>
		<script>
			$(function(e) {
				$('#example9').DataTable();
			} );
		</script>
		<script>
			$(function(e) {
				$('#example10').DataTable();
			} );
		</script>
		<script>
			$(function(e) {
				$('#example11').DataTable();
			} );
		</script>
		<script>
			$(function(e) {
				$('#example12').DataTable();
			} );
		</script>
		<script>
			$(function(e) {
				$('#example13').DataTable();
			} );
		</script>
		<script>
			$(function(e) {
				$('#example14').DataTable();
			} );
		</script>
		<script>
			$(function(e) {
				$('#example15').DataTable();
			} );
		</script>
		<script>
			$(function(e) {
				$('#example16').DataTable();
			} );
		</script>
		<script>
			$(function(e) {
				$('#example17').DataTable();
			} );
		</script>
		<script>
			$(function(e) {
				$('#example18').DataTable();
			} );
		</script>
		<script>
			$(function(e) {
				$('#example19').DataTable();
			} );
		</script>
		<script>
			$(function(e) {
				$('#example20').DataTable();
			} );
		</script>
		<script>
			$(function(e) {
				$('#example21').DataTable();
			} );
		</script>
		<script>
			$(document).ready(function () 
				 { 
				  $("#kd").click(function()
				  {
				   $("#show1:hidden").show('slow');
				   $("#show2").hide();
				   $("#show3").hide();
				   $("#show4").hide();
				   $("#show5").hide();
				   $("#show6").hide();
				   $("#show7").hide();
				   $("#show8").hide();
				   $("#show9").hide();
				   $("#show10").hide();
				   $("#show11").hide();
				   $("#show12").hide();
				   });
				   $("#kd").click(function()
					  {
					    if($('kd').prop('checked')===false)
					   {
					    $('#show1').hide();
					   }
				  });

				  $("#kl").click(function()
				  {
				    $("#show2:hidden").show('slow');
				   $("#show1").hide();
				   $("#show3").hide();
				   $("#show4").hide();
				   $("#show5").hide();
				   $("#show6").hide();
				   $("#show7").hide();
				   $("#show8").hide();
				   $("#show9").hide();
				   $("#show10").hide();
				   $("#show11").hide();
				   $("#show12").hide();
				   });
				   $("#kl").click(function()
				  {
				    if($('show2-two').prop('checked')===false)
				   {
				    $('#show2').hide();
				   }
				  });

				  $("#sa").click(function()
				  {
				    $("#show3:hidden").show('slow');
				   $("#show1").hide();
				   $("#show2").hide();
				   $("#show4").hide();
				   $("#show5").hide();
				   $("#show6").hide();
				   $("#show7").hide();
				   $("#show8").hide();
				   $("#show9").hide();
				   $("#show10").hide();
				   $("#show11").hide();
				   $("#show12").hide();
				   });
				   $("#sa").click(function()
				  {
				    if($('show2-three').prop('checked')===false)
				   {
				    $('#show3').hide();
				   }
				  });

				   $("#wm").click(function()
				  {
				    $("#show4:hidden").show('slow');
				   $("#show1").hide();
				   $("#show2").hide();
				   $("#show3").hide();
				   $("#show5").hide();
				   $("#show6").hide();
				   $("#show7").hide();
				   $("#show8").hide();
				   $("#show9").hide();
				   $("#show10").hide();
				   $("#show11").hide();
				   $("#show12").hide();
				   });
				   $("#wm").click(function()
				  {
				    if($('show4-four').prop('checked')===false)
				   {
				    $('#show4').hide();
				   }
				  });
				   $("#bpb").click(function()
				  {
				    $("#show5:hidden").show('slow');
				   $("#show1").hide();
				   $("#show2").hide();
				   $("#show3").hide();
				   $("#show4").hide();
				   $("#show6").hide();
				   $("#show7").hide();
				   $("#show8").hide();
				   $("#show9").hide();
				   $("#show10").hide();
				   $("#show11").hide();
				   $("#show12").hide();
				   });
				   $("#bpb").click(function()
				  {
				    if($('show5-five').prop('checked')===false)
				   {
				    $('#show5').hide();
				   }
				  });
				   $("#jb").click(function()
				  {
				    $("#show6:hidden").show('slow');
				   $("#show1").hide();
				   $("#show2").hide();
				   $("#show3").hide();
				   $("#show4").hide();
				   $("#show5").hide();
				   $("#show7").hide();
				   $("#show8").hide();
				   $("#show9").hide();
				   $("#show10").hide();
				   $("#show11").hide();
				   $("#show12").hide();
				   });
				   $("#jb").click(function()
				  {
				    if($('show6-six').prop('checked')===false)
				   {
				    $('#show6').hide();
				   }
				  });
				   $("#bbb").click(function()
				  {
				    $("#show7:hidden").show('slow');
				   $("#show1").hide();
				   $("#show2").hide();
				   $("#show3").hide();
				   $("#show4").hide();
				   $("#show5").hide();
				   $("#show6").hide();
				   $("#show8").hide();
				   $("#show9").hide();
				   $("#show10").hide();
				   $("#show11").hide();
				   $("#show12").hide();
				   });
				   $("#bbb").click(function()
				  {
				    if($('show7-seven').prop('checked')===false)
				   {
				    $('#show7').hide();
				   }
				  });
				  
				  $("#kerubong").click(function()
				  {
				    $("#show8:hidden").show('slow');
				   $("#show1").hide();
				   $("#show2").hide();
				   $("#show3").hide();
				   $("#show4").hide();
				   $("#show5").hide();
				   $("#show6").hide();
				   $("#show7").hide();
				   $("#show9").hide();
				   $("#show10").hide();
				   $("#show11").hide();
				   $("#show12").hide();				   
				   });
				   $("#kerubong").click(function()
				  {
				    if($('show8-eight').prop('checked')===false)
				   {
				    $('#show8').hide();
				   }
				  });
				  
				   $("#botanik").click(function()
				  {
				    $("#show9:hidden").show('slow');
				   $("#show1").hide();
				   $("#show2").hide();
				   $("#show3").hide();
				   $("#show4").hide();
				   $("#show5").hide();
				   $("#show6").hide();
				   $("#show7").hide();
				   $("#show8").hide();
				   $("#show10").hide();
				   $("#show11").hide();
				   $("#show12").hide();				   
				   });
				   $("#botanik").click(function()
				  {
				    if($('show9-nine').prop('checked')===false)
				   {
				    $('#show9').hide();
				   }
				  });
				  
				  
				   $("#eco").click(function()
				  {
				    $("#show10:hidden").show('slow');
				   $("#show1").hide();
				   $("#show2").hide();
				   $("#show3").hide();
				   $("#show4").hide();
				   $("#show5").hide();
				   $("#show6").hide();
				   $("#show7").hide();
				   $("#show8").hide();
				   $("#show9").hide();
				   $("#show11").hide();
				   $("#show12").hide();				   
				   });
				   
				   $("#eco").click(function()
				  {
				    if($('show10-ten').prop('checked')===false)
				   {
				    $('#show10').hide();
				   }
				  });
				  
				  
				   $("#btho").click(function()
				  {
				    $("#show11:hidden").show('slow');
				   $("#show1").hide();
				   $("#show2").hide();
				   $("#show3").hide();
				   $("#show4").hide();
				   $("#show5").hide();
				   $("#show6").hide();
				   $("#show7").hide();
				   $("#show8").hide();
				   $("#show9").hide();
				   $("#show10").hide();
				   $("#show12").hide();				   
				   });
				   $("#btho").click(function()
				  {
				    if($('show11-eleven').prop('checked')===false)
				   {
				    $('#show11').hide();
				   }
				  });
				   $("#kembangan").click(function()
				  {
				    $("#show12:hidden").show('slow');
				   $("#show1").hide();
				   $("#show2").hide();
				   $("#show3").hide();
				   $("#show4").hide();
				   $("#show5").hide();
				   $("#show6").hide();
				   $("#show7").hide();
				   $("#show8").hide();
				   $("#show9").hide();
				   $("#show10").hide();
				   $("#show11").hide();				   
				   });
				   $("#kembangan").click(function()
				  {
				    if($('show12-twelve').prop('checked')===false)
				   {
				    $('#show12').hide();
				   }
				  });
				  
				 });

		</script>
		<script>
			// Chart.defaults.global.elements.rectangle.backgroundColor = '#FF0000';

			var bar_ctx = document.getElementById('bar-chart').getContext('2d');

			var purple_orange_gradient = bar_ctx.createLinearGradient(0, 0, 0, 600);
			purple_orange_gradient.addColorStop(0, 'orange');
			purple_orange_gradient.addColorStop(1, 'purple');

			var bar_chart = new Chart(bar_ctx, {
			    type: 'bar',
			    data: {
			        labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
			        datasets: [{
			            label: '# of Votes',
			            data: [12, 19, 3, 8, 14, 5],
			            backgroundColor: purple_orange_gradient,
			            hoverBackgroundColor: purple_orange_gradient,
			            hoverBorderWidth: 2,
			            hoverBorderColor: 'purple'
			        }]
			    },
			    options: {
			        scales: {
			            yAxes: [{
			                ticks: {
			                    beginAtZero:true
			                }
			            }]
			        }
			    }
			});
		</script>

        

	</body>

<!-- Mirrored from spruko.com/demo/ren/Blue-animated/LeftMenu/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Sep 2018 05:54:43 GMT -->
</html>