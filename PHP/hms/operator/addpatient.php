<?php

include '../common/dl.php';

$isposted=false;
if(count($_POST)!=0){
	$isposted=true;
	$isvalid=true;
	extract($_POST);

	//Validations
	if(empty($name)){
		$nameerror="Name is Required";
		$isvalid=false;
	}

	if(!isset($gender)){
		$gendererror="Gender is Required";
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

	$result=false;
	if($isvalid==true){
		$result=AddPatient($name,$address,$gender,$phone,$email);
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
	<h1>Create Patient Details</h1>
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
		<form method="post">

		  <div class="form-group">
		    <label for="name">Name</label>
		    <input type="text" class="form-control" name="name" placeholder="Name">
		    <small class="form-text text-muted">
		    	<?php echo @$nameerror; ?>
		    </small>
		  </div>

		  <div class="form-group">
		    <label for="gender">Gender</label>
		    <input type="radio" name="gender" value="Male"> Male
		    <input type="radio"  name="gender" value="Female"> Female
		    <small class="form-text text-muted">
		    	<?php echo @$gendererror; ?>
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



		  <button type="submit" class="btn btn-primary">Create Admin</button>
		</form>
	</div>		
</div>

<?php include '../common/admin-footer.php' ?>
