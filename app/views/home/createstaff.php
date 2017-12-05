<?php require_once '../app/views/templates/header.php' ?>
<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
			</br>
			    <h1>Create New Staff Member</h1>
                <p class="lead"> <?= date("F jS, Y"); ?></p>
            </div>
        </div>
    </div>
	
    <div class="row">
        <div class="col-lg-12">
            <form class="form-horizontal" action="/home/addStaff" method="post">
			    <fieldset>				
				
					<div class="form-group">
					  <label for="Name" class="col-lg-2 control-label">Select Manager</label>
					  <div class="col-lg-10">
					   
						<select class="form-control" name="mid">			
						
	<?php 
	
	require_once '../app/controllers/home.php';
	$_index = new Home();
	$result = $_index -> getAllManagers();
	
	foreach($result as $row)
	{
		echo "<option value={$row['managerID']}>{$row['name']}</option>";
	}
	?>
						</select>
					  </div>
					</div>
				
					<div class="form-group">
					  <label for="Name" class="col-lg-2 control-label">Name</label>
					  <div class="col-lg-10">
						<input type="text" class="form-control" name="name" placeholder="Name" required>
					  </div>
					</div>
					
					<div class="form-group">
					  <label for="Name" class="col-lg-2 control-label">Date of Birth</label>
					  <div class="col-lg-10">
						<input type="date" class="form-control" name="dob" placeholder="DOB" required>
					  </div>
					</div>
					
					
					<div class="form-group">
					  <label for="Name" class="col-lg-2 control-label">Email</label>
					  <div class="col-lg-10">
						<input type="email" class="form-control" name="email" placeholder="Email" required>
					  </div>
					</div>
					
					
					<div class="form-group">
					  <label for="Name" class="col-lg-2 control-label">Temprary Password</label>
					  <div class="col-lg-10">
						<input type="text" class="form-control" name="password" placeholder="Password" required>
					  </div>
					</div>
					
					
					<div class="form-group">
					  <label for="Name" class="col-lg-2 control-label">Phone Number</label>
					  <div class="col-lg-10">
						<input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
					  </div>
					</div>
					
					<div class="form-group">
					  <label for="Name" class="col-lg-2 control-label">Select Province</label>
					  <div class="col-lg-10">
						<select class="form-control" name="province" id="province"> 
						<?php 
						$result = $data['province'];
						foreach($result as $row)
							{
								echo "<option value='{$row['pid']}'>{$row['provincename']}</option>";
							}
						?>
						</select>
					  </div>
					</div>
					
					<div class="form-group">
					  <label for="Name" class="col-lg-2 control-label">Select City</label>
					  <div class="col-lg-10">
						<select class="form-control" name="city" id="city"> 
						
						</select>
					  </div>
					</div>
					
					<div class="form-group">
					  <div class="col-lg-10 col-lg-offset-2">
						<button type="submit" class="btn btn-primary">Submit</button>
					  </div>
					</div>
			    </fieldset>
			</form>
			
        </div>
    </div>

    <?php require_once '../app/views/templates/footer.php' ?>
