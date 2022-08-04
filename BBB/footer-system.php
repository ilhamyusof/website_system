<!--footer-->
					<footer class="footer">
						<div class="container">
							<div class="row align-items-center flex-row-reverse">
								<div class="col-lg-12 col-sm-12 mt-3 mt-lg-0 text-center">
									Copyright © 2021 <a href="#">Designing Labs </a>. Designed by <a href="#">MUHAMMAD EKMAL</a> All rights reserved.
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
        <script src="assets-system/js/vendors/selectize.min.js"></script>
<!--        <script src="sweetalert2.all.min.js"></script>-->
<!--<script src="sweetalert2/dist/sweetalert2.all.min.js"></script>-->
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
		</script>



<!--
<script>
	$(document).ready(function(){
		
		readProducts(); /* it will load products when document loads */
		
		$(document).on('click', '#delete_product', function(e){
			
			var productId = $(this).data('id');
			SwalDelete(productId);
			e.preventDefault();
		});
		
	});
	
	function SwalDelete(productId){
		
		swal({
			title: 'Are you sure?',
			text: "It will be deleted permanently!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!',
			showLoaderOnConfirm: true,
			  
			preConfirm: function() {
			  return new Promise(function(resolve) {
			       
			     $.ajax({
			   		url: 'deleteRegisterclient.php',
			    	type: 'POST',
			       	data: 'delete='+productId,
			       	dataType: 'json'
			     })
			     .done(function(response){
			     	swal('Deleted!', response.message, response.status);
					readProducts();
			     })
			     .fail(function(){
			     	swal('Oops...', 'Something went wrong with ajax !', 'error');
			     });
			  });
		    },
			allowOutsideClick: false			  
		});	
		
	}
	
	function readProducts(){
		$('#load-products').load('read.php');	
	}
	
</script>
-->
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
<!--
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
-->
<!-- endscript sweetalert -->

        

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

        

	</body>

<!-- Mirrored from spruko.com/demo/ren/Blue-animated/LeftMenu/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Sep 2018 05:54:43 GMT -->
</html>