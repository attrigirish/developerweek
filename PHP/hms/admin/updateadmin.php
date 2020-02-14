<?php

include '../common/dl.php';
$loginid=$_GET['id'];

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

	if(empty($address)){
		$addresserror="Address is Required";
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
		$result=UpdateAdmin($loginid,$name,$address,$username,$password);
	}	
}


$admin = GetAdmin($loginid);

?>

<?php include '../common/admin-header.php' ?>

<!-- Side Bar -->
<div class="col-md-3">
	<?php include 'sidebar.php'; ?>		
</div>
<!-- Main Content -->
<div class="col-md-9">
	<h1>Update Admin User</h1>
	<div class="col-md-6">
		<?php if($isposted==true) { ?>
		<?php if($result==true) { ?>
		<div class="alert alert-success" role="alert">
  			Admin Account Update Successfully!
		</div>
		<?php } else { ?>
		<div class="alert alert-danger" role="alert">
  			Account Updation Failed
		</div>
		<?php } ?>
		<?php } ?>
		<form method="post">

		  <div class="form-group">
		    <label for="name">Name</label>
		    <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $admin['name']; ?>">
		    <small class="form-text text-muted">
		    	<?php echo @$nameerror; ?>
		    </small>
		  </div>

		  <div class="form-group">
		    <label for="address">Address</label>
		    <textarea class="form-control" name="address" placeholder="Address">
		    	<?php echo $admin['address']; ?>
		    </textarea>
		    <small class="form-text text-muted">
		    	<?php echo @$addresserror; ?>
		    </small>
		  </div>

		  <div class="form-group">
		    <label for="username">User Name</label>
		    <input type="text" class="form-control" name="username" placeholder="User Name" value="<?php echo $admin['username']; ?>">
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
