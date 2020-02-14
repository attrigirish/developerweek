<?php

include '../common/dl.php';

$isposted=false;
if(count($_POST)!=0){
	$isposted=true;
	$isvalid=true;
	extract($_POST);
	extract($_FILES);

	//Validations
	if(empty($name)){
		$nameerror="Name is Required";
		$isvalid=false;
	}

	if(empty($address)){
		$addresserror="Address is Required";
		$isvalid=false;
	}

	if(empty($phone)){
		$phoneerror="Phone is Required";
		$isvalid=false;
	}

	if(empty($email)){
		$emailerror="Email is Required";
		$isvalid=false;
	}

	if(empty($photo['name'])){
		$photoerror="Photo is Required";
	}

	if(empty($experience)){
		$experienceerror="Experience is Required";
		$isvalid=false;
	}

	if(empty($qualification)){
		$qualificationerror="Qualification is Required";
		$isvalid=false;
	}

	if(empty($specialization)){
		$specializationerror="Specialization is Required";
		$isvalid=false;
	}


	if(empty($fees)){
		$feeserror="Fees is Required";
		$isvalid=false;
	}

	if(empty($username)){
		$usernameerror="User Name is Required";
		$isvalid=false;
	}

	if(empty($password)){
		$passworderror="Password is Required";
		$isvalid=false;
	}

	$result=false;
	if($isvalid==true){
		$photoname=$photo['name'];
		$temppath=$photo['tmp_name'];
		move_uploaded_file($temppath,'../uploads/'.$photoname);
		$result=AddDoctor($name,$address,$phone,$email,$experience,$photoname,$qualification,$specialization,$fees,$username,$password);
	}
}


?>

<?php include '../common/admin-header.php' ?>

<!-- Side Bar -->
<div class="col-md-3">
	<?php include 'sidebar.php'; ?>		
</div>
<!-- Main Content -->
<div class="col-md-9">
	<h1>Create Admin User</h1>
	<div class="col-md-6">
		<?php if($isposted==true) { ?>
		<?php if($result==true) { ?>
		<div class="alert alert-success" role="alert">
  			Admin Account Created Successfully!
		</div>
		<?php } else { ?>
		<div class="alert alert-danger" role="alert">
  			Account Creation Failed
		</div>
		<?php } ?>
		<?php } ?>
		<form method="post" enctype="multipart/form-data">

		  <div class="form-group">
		    <label for="name">Name</label>
		    <input type="text" class="form-control" name="name" placeholder="Name">
		    <small class="form-text text-muted">
		    	<?php echo @$nameerror; ?>
		    </small>
		  </div>

		  <div class="form-group">
		    <label for="address">Address</label>
		    <textarea class="form-control" name="address" placeholder="Address"></textarea>
		    <small class="form-text text-muted">
		    	<?php echo @$addresserror; ?>
		    </small>
		  </div>

		  <div class="form-group">
		    <label for="phone">Phone</label>
		    <input type="number" class="form-control" name="phone" placeholder="Phone">
		    <small class="form-text text-muted">
		    	<?php echo @$phoneerror; ?>
		    </small>
		  </div>


		  <div class="form-group">
		    <label for="email">Email</label>
		    <input type="email" class="form-control" name="email" placeholder="Email">
		    <small class="form-text text-muted">
		    	<?php echo @$emailerror; ?>
		    </small>
		  </div>



		  <div class="form-group">
		    <label for="experience">Experience</label>
		    <input type="text" class="form-control" name="experience" placeholder="Experience">
		    <small class="form-text text-muted">
		    	<?php echo @$experienceerror; ?>
		    </small>
		  </div>

		  <div class="form-group">
		    <label for="photo">Photo</label>
		    <input type="file" class="form-control" name="photo" placeholder="Photo">
		    <small class="form-text text-muted">
		    	<?php echo @$photoerror; ?>
		    </small>
		  </div>


		  <div class="form-group">
		    <label for="qualification">Qualification</label>
		    <input type="text" class="form-control" name="qualification" placeholder="Qualification">
		    <small class="form-text text-muted">
		    	<?php echo @$qualificationerror; ?>
		    </small>
		  </div>

		  <div class="form-group">
		    <label for="specialization">Specialization</label>
		    <input type="text" class="form-control" name="specialization" placeholder="Specialization">
		    <small class="form-text text-muted">
		    	<?php echo @$specializationerror; ?>
		    </small>
		  </div>


		  <div class="form-group">
		    <label for="fees">Fees</label>
		    <input type="text" class="form-control" name="fees" placeholder="Fees">
		    <small class="form-text text-muted">
		    	<?php echo @$feeserror; ?>
		    </small>
		  </div>

		  <div class="form-group">
		    <label for="username">User Name</label>
		    <input type="text" class="form-control" name="username" placeholder="User Name">
		    <small class="form-text text-muted">
		    	<?php echo @$usernameerror; ?>
		    </small>
		  </div>

		  <div class="form-group">
		    <label for="password">Password</label>
		    <input type="password" class="form-control" name="password" placeholder="Password">
		    <small class="form-text text-muted">
		    	<?php echo @$passworderror; ?>
		    </small>
		  </div>

		  <button type="submit" class="btn btn-primary">Create Admin</button>
		</form>
	</div>		
</div>

<?php include '../common/admin-footer.php' ?>
