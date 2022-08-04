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
            $email = $_SESSION["session"];
            $user_id = $_SESSION["user_id"];
            $job = $_SESSION["job"];
            $roles = $_SESSION['roles'];
            $centers = $_SESSION['centers'];
            $now = date("Y-m-d");
        ?>
    <div class="app-content my-3 my-md-5">
		<div class="side-app">
			<div class="page-header">
				<h4 class="page-title">Profile</h4>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Pages</a></li>
					<li class="breadcrumb-item active" aria-current="page">Profile</li>
				</ol>
			</div>
			<?php 
                if(isset($_SESSION["user_id"]))
                {
                    $user_id = $_SESSION["user_id"];
                    $sql = "SELECT user.user_id, user.name, user.maritial, user.bod, user.email, user.phone, user.address, user.status, user.roles_id, user.centers_id, user.department, user.salary, user.resignation, user.image, roles.roles_id, roles.name AS position, roles.display_name, roles.description, centers.centers_id, centers.name AS branch FROM user JOIN roles ON user.roles_id = roles.roles_id JOIN centers ON centers.centers_id = user.centers_id WHERE user_id = :user_id";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(":user_id", $user_id);
                    $stmt->execute();

                    if($data = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        
                       $user_id = $data["user_id"];
                       $name = $data["name"];
                       $email = $data["email"];
                       $phone = $data["phone"];
                       $address = $data["address"];
                       $bod = $data["bod"];
                       $status = $data["status"];
                       $maritial = $data["maritial"];
                       $roles_id = $data["roles_id"];
                       $centers_id = $data["centers_id"];
                       $image = $data["image"];
                       $salary = $data["salary"];
                       $department = $data["department"];
                       $position = $data["display_name"];
                       $branch = $data["branch"];
                    }
                }
                else
                {
                    echo "Data is not found!";
                }   
            ?>
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-status bg-teal br-tr-3 br-tl-3"></div>
						<div class="card-header">
							<h3 class="card-title">My Profile</h3>
						</div>
						<div class="card-body">
							<form>
								<div class="row mb-2">
									<div class="col-auto">
										<span class="avatar brround avatar-xl" style="background-image: url(img/<?php echo $image; ?>)"></span>
									</div>
									<div class="col">
										<h4 class="mb-1 "><?= $name; ?></h4>
										<p class="mb-4 "><?= $position; ?> <br>
										<span style="font-size: 12px;"><?= $branch; ?></span></p>
									</div>
								</div>
								<div class="form-group">
									<label class="form-label">Email-Address</label>
									<input type="text" class="form-control" value="<?= $email; ?>" readonly >
								</div>
								<div class="form-group">
									<label class="form-label">Status</label>
									<input type="text" class="form-control" value="<?= $status; ?>" readonly >
								</div>
								<div class="form-group">
									<label class="form-label">Salary</label>
									<input type="text" class="form-control" value="<?= $salary; ?>" readonly >
								</div>
								<!--<div class="form-footer">-->
								<!--	<button class="btn btn-primary btn-block">Save</button>-->
								<!--</div>-->
							</form>
						</div>
					</div>
					
				</div>
				<div class="col-lg-8">
					<form class="card" method="POST" action="system-updateprofile.php"  enctype="multipart/form-data">
						<div class="card-status bg-gray br-tr-3 br-tl-3"></div>
						<div class="card-header">
							<h3 class="card-title">Edit Profile</h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Full Name</label>
										<input type="text" class="form-control" value="<?= $name; ?>" name="name" id="name">
										<input type="text" class="form-control" value="<?= $user_id; ?>" name="user_id" id="user_id" hidden="">
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Contact Number</label>
										<input type="text" class="form-control" value="<?= $phone; ?>" name="phone" id="phone">
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label class="form-label">Maritial</label>
										<select class="form-control select2 custom-select" data-placeholder="Choose one" name="maritial" id="maritial">
                                            <option value="" <?php if($maritial == "NULL"){ echo "selected"; }else{} ?>>-- Choose One--</option>
                                            <option value="Single" <?php if($maritial == "Single"){ echo "selected"; }else{} ?>>Single</option>
                                            <option value="Married" <?php if($maritial == "Married"){ echo "selected"; }else{} ?>>Married</option>
                                            <option value="Widowed" <?php if($maritial == "Widowed"){ echo "selected"; }else{} ?>>Widowed</option>
                                            <option value="Divorced" <?php if($maritial == "Divorced"){ echo "selected"; }else{} ?>>Divorced</option>
                                        </select>
									</div>
								</div>
								<div class="col-sm-6 col-md-6">
									<div class="form-group">
										<label class="form-label">BirthDay Date</label>
										<input type="date" class="form-control" value="<?= $bod; ?>" name="bod" id="bod">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label class="form-label">Address</label>
										
										<textarea rows="5" class="form-control" name="address" id="address" ><?= $address; ?></textarea>
									</div>
								</div>
								<!--<div class="col-sm-6 col-md-4">-->
								<!--	<div class="form-group">-->
								<!--		<label class="form-label">City</label>-->
								<!--		<input type="text" class="form-control" placeholder="City" >-->
								<!--	</div>-->
								<!--</div>-->
								<!--<div class="col-sm-6 col-md-3">-->
								<!--	<div class="form-group">-->
								<!--		<label class="form-label">Postal Code</label>-->
								<!--		<input type="number" class="form-control" placeholder="ZIP Code">-->
								<!--	</div>-->
								<!--</div>-->
								<!--<div class="col-md-5">-->
								<!--	<div class="form-group">-->
								<!--		<label class="form-label">Country</label>-->
								<!--		<select class="form-control custom-select">-->
								<!--			<option value="0">--Select--</option>-->
								<!--			<option value="1">Germany</option>-->
								<!--			<option value="2">Canada</option>-->
								<!--			<option value="3">Usa</option>-->
								<!--			<option value="4">Aus</option>-->
								<!--		</select>-->
								<!--	</div>-->
								<!--</div>-->
								<!--<div class="col-md-12">-->
								<!--	<div class="form-group mb-0">-->
								<!--		<label class="form-label">About Me</label>-->
								<!--		<textarea rows="5" class="form-control" placeholder="Enter About your description"></textarea>-->
								<!--	</div>-->
								<!--</div>-->
								<div class="col-md-12">
                                    <label class="form-label">Image Employee</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image" id="image">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
							</div>
						</div>
						<div class="card-footer text-right">
							<button type="submit" class="btn btn-primary">Update Profile</button>
						</div>
					</form>
					<!--<div class="card">-->
					<!--	<div class="card-status bg-indigo br-tr-3 br-tl-3"></div>-->
					<!--	<div class="card-header">-->
					<!--		<h3 class="card-title">Add  projects And Upload</h3>-->
					<!--	</div>-->
					<!--	<div class="table-responsive">-->
					<!--		<table class="table card-table table-vcenter text-nowrap">-->
					<!--			<thead>-->
					<!--				<tr>-->
					<!--					<th>Project Name</th>-->
					<!--					<th>Date</th>-->
					<!--					<th>Status</th>-->
					<!--					<th>Price</th>-->
					<!--					<th></th>-->
					<!--				</tr>-->
					<!--			</thead>-->
					<!--			<tbody>-->

					<!--				<tr>-->
					<!--					<td><a href="store.html" class="text-inherit">Untrammelled prevents </a></td>-->
					<!--					<td>28 May 2018</td>-->
					<!--					<td><span class="status-icon bg-success"></span> Completed</td>-->
					<!--					<td>$56,908</td>-->
					<!--					<td class="text-right">-->
					<!--						<a class="icon" href="javascript:void(0)"></a>-->
					<!--						<a href="javascript:void(0)" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>-->

					<!--						<a class="icon" href="javascript:void(0)"></a>-->
					<!--						<a href="javascript:void(0)" class="btn btn-green btn-sm"><i class="fas fa-link"></i> Update</a>-->

					<!--						<a class="icon" href="javascript:void(0)"></a>-->
					<!--						<a href="javascript:void(0)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>-->
					<!--					</td>-->
					<!--				</tr>-->
					<!--				<tr>-->
					<!--					<td><a href="store.html" class="text-inherit">Untrammelled prevents</a></td>-->
					<!--					<td>12 June 2018</td>-->
					<!--					<td><span class="status-icon bg-danger"></span> On going</td>-->
					<!--					<td>$45,087</td>-->
					<!--					<td class="text-right">-->
					<!--						<a class="icon" href="javascript:void(0)"></a>-->
					<!--						<a href="javascript:void(0)" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>-->

					<!--						<a class="icon" href="javascript:void(0)"></a>-->
					<!--						<a href="javascript:void(0)" class="btn btn-green btn-sm"><i class="fas fa-link"></i> Update</a>-->

					<!--						<a class="icon" href="javascript:void(0)"></a>-->
					<!--						<a href="javascript:void(0)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>-->
					<!--					</td>-->
					<!--				</tr>-->
					<!--				<tr>-->
					<!--					<td><a href="store.html" class="text-inherit">Untrammelled prevents</a></td>-->
					<!--					<td>12 July 2018</td>-->
					<!--					<td><span class="status-icon bg-warning"></span> Pending</td>-->
					<!--					<td>$60,123</td>-->
					<!--					<td class="text-right">-->
					<!--						<a class="icon" href="javascript:void(0)"></a>-->
					<!--						<a href="javascript:void(0)" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>-->

					<!--						<a class="icon" href="javascript:void(0)"></a>-->
					<!--						<a href="javascript:void(0)" class="btn btn-green btn-sm"><i class="fas fa-link"></i> Update</a>-->

					<!--						<a class="icon" href="javascript:void(0)"></a>-->
					<!--						<a href="javascript:void(0)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>-->
					<!--					</td>-->
					<!--				</tr>-->
					<!--				<tr>-->
					<!--					<td><a href="store.html" class="text-inherit">Untrammelled prevents</a></td>-->
					<!--					<td>14 June 2018</td>-->
					<!--					<td><span class="status-icon bg-warning"></span> Pending</td>-->
					<!--					<td>$70,435</td>-->
					<!--					<td class="text-right">-->
					<!--						<a class="icon" href="javascript:void(0)"></a>-->
					<!--						<a href="javascript:void(0)" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>-->

					<!--						<a class="icon" href="javascript:void(0)"></a>-->
					<!--						<a href="javascript:void(0)" class="btn btn-green btn-sm"><i class="fas fa-link"></i> Update</a>-->

					<!--						<a class="icon" href="javascript:void(0)"></a>-->
					<!--						<a href="javascript:void(0)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>-->
					<!--					</td>-->
					<!--				</tr>-->
					<!--				<tr>-->
					<!--					<td><a href="store.html" class="text-inherit">Untrammelled prevents</a></td>-->
					<!--					<td>25 June 2018</td>-->
					<!--					<td><span class="status-icon bg-success"></span> Completed</td>-->
					<!--					<td>$15,987</td>-->
					<!--					<td class="text-right">-->
					<!--						<a class="icon" href="javascript:void(0)"></a>-->
					<!--						<a href="javascript:void(0)" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i> Edit</a>-->

					<!--						<a class="icon" href="javascript:void(0)"></a>-->
					<!--						<a href="javascript:void(0)" class="btn btn-green btn-sm"><i class="fas fa-link"></i> Update</a>-->

					<!--						<a class="icon" href="javascript:void(0)"></a>-->
					<!--						<a href="javascript:void(0)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>-->
					<!--					</td>-->
					<!--				</tr>-->
					<!--			</tbody>-->
					<!--		</table>-->
					<!--	</div>-->
					<!--</div>-->
				</div>
			</div>
		</div>
		<!--footer-->
		
		<!-- End Footer-->
	</div>

<?php 
include('system-footer.php');
?>