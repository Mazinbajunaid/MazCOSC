<?php require_once '../app/views/templates/header.php' ?>

<div class="container">
    <div class="page-header" id="banner">
        <div class="row">
            <div class="col-lg-12">
                <h1>Hey, <?=$_SESSION['name']?></h1>
                <p class="lead"> <?= date("F jS, Y"); ?></p>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-lg-12">
            <form name="form1" class="form-horizontal" action="/staffhome/updateProfile" method="post">
			    <fieldset>
					
					<div class="form-group">
					  <label for="Name" class="col-lg-2 control-label">Name</label>
					  <div class="col-lg-10">
						<input type="text" class="form-control" name="name" value=<?php echo $data['name'];?> placeholder="Name" required>
					  </div>
					</div>
					
					<div class="form-group">
					  <label for="Name" class="col-lg-2 control-label">Date of Birth</label>
					  <div class="col-lg-10">
						<input type="date" class="form-control" name="dob" value=<?php echo $data['dob'];?> placeholder="DOB" required>
					  </div>
					</div>
					
					
					<div class="form-group">
					  <label for="Name" class="col-lg-2 control-label">Email</label>
					  <div class="col-lg-10">
						<input type="email" class="form-control" name="email" value=<?php echo $data['email'];?> placeholder="Email" required>
					  </div>
					</div>
					
					
					<div class="form-group">
					  <label for="Name" class="col-lg-2 control-label">New Password</label>
					  <div class="col-lg-10">
						<input type="text" class="form-control" name="password" placeholder="Password" required>
					  </div>
					</div>
					
					
					<div class="form-group">
					  <label for="Name" class="col-lg-2 control-label">Phone Number</label>
					  <div class="col-lg-10">
						<input type="tel" class="form-control" name="phone" value=<?php echo $data['phone'];?> placeholder="Phone Number" required>
					  </div>
					</div>
					
					<div class="form-group">
					  <div class="col-lg-10 col-lg-offset-2">
						<input type="submit" class="btn btn-primary" value="submit"/>
					  </div>
					</div>
			    </fieldset>
			</form>
			
        </div>
    </div>

    <?php require_once '../app/views/templates/footer.php' ?>
