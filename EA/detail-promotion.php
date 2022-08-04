<?php 
	// include("session.php");
	include("connection.php");
?>
<?php 
include('header.php');
?>
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
		<div class="offers-area ptb-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="offer-img">
							<img src="promotion/<?php echo $image; ?>" alt="Image">
						</div>
					</div>
						<div class="col-lg-6">
							<div class="offer-text">
								<div class="section-title-two">
								<h2><?php echo $title; ?></h2>
								<p style="text-align: justify;"><?php echo $description; ?></p>
								</div>
								<span style="font-weight: bold;">Start Date :<?php echo $start_date; ?></span> - <span style="font-weight: bold;">End Date :<?php echo $end_date; ?><span>
                                <br><br>
								<div class="appointment-btn">
									<a href="contactpromotion.php?id=<?php echo $promotion_id; ?>" class="default-btn">
									Contact Us
									 <span></span>
									</a>
								</div>
								
								<br>
							</div>
						</div>
				</div>
			</div>
		</div>

		

	<?php 
include('footer.php');
	?>