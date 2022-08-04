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
						<h2>PROMOTION</h2>
					<ul>
						<li><a href="index.html">Home</a></li>
						<li>Promotion</li>
					</ul>
					</div>
				</div>
			</div>
		</div>	
	</div>

<div id="gallery" class="gallery-area pt-100 pb-70">
	<div class="container">
		<div class="row" id="Container">
			 <?php 
                                    
                $stmt = $conn->prepare('SELECT * FROM promotion WHERE status = "Open"');
                $stmt->execute();
                
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                
                 extract($row);      
            ?>
			<div class="col-lg-4 col-sm-6">
				<div class="doctors-card">
					<a href="detail-promotion.php?id=<?php echo $promotion_id; ?>">
						<img src="promotion/<?php echo $image; ?>" alt="Image">
					</a>
						<div class="d-table">
							<div class="d-table-cell">
								<div class="caption">
									<div class="caption-text">
										<h3><a href="detail-promotion.php?id=<?php echo $promotion_id; ?>"><?php echo $title; ?></a></h3>
										<span><?php echo $start_date; ?></span> - <span><?php echo $end_date; ?></span>
										<br>
										<a href="detail-promotion.php?id=<?php echo $promotion_id; ?>"><span style="color: red;">See More</span></a>
									</div>
								</div>
							</div>
						</div>
				</div>
				
			</div>
			<?php
                   }
                   ?>
		</div>
	</div>
</div>


<?php 
include('footer.php');
?>