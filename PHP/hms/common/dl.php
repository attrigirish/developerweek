<?php

$server='localhost';
$username='root';
$password='';
$database='hmsphp';


$con=mysqli_connect($server,$username,$password,$database);


//------Admin Table------

function AddAdmin($name,$address,$username,$password){

	global $con;

	$stmt = "INSERT INTO LOGIN (username,password,usertype) values('$username','$password',1)";

	$result = mysqli_query($con,$stmt);

	if($result!==false){
		$loginid=mysqli_insert_id($con);

		$stmt = "INSERT INTO ADMIN (loginid,name,address) values($loginid,'$name','$address')";

		$result = mysqli_query($con,$stmt);

		if($result === false){
			return false;
		}
		else{
			return true;
		}
	}

}

function GetAdmins(){
	global $con;

	$stmt="select loginid,username,password,name,address from admin join login on login.id=admin.loginid";
	$result=mysqli_query($con,$stmt);

	if($result===false){
		return false;
	}

	$records=[];
	while($record=mysqli_fetch_assoc($result)){
		$records[]=$record;
	}

	return $records;
}



function GetAdmin($loginid){
	global $con;

	$stmt="select loginid,username,password,name,address from admin join login on login.id=admin.loginid where loginid=$loginid";
	$result=mysqli_query($con,$stmt);

	if($result===false){
		return false;
	}

	$record=mysqli_fetch_assoc($result);
	return $record;
}


function UpdateAdmin($loginid,$name,$address,$username,$password){
	global $con;

	$stmt="update login set username='$username',password='$password' where id=$loginid";

	$result=mysqli_query($con,$stmt);

	if($result!==false){
		$stmt="update admin set name='$name',address='$address' where loginid=$loginid";
		$result=mysqli_query($con,$stmt);

		if($result===false){
			return false;
		}
		else{
			return true;
		}
	}
}


function DeleteAdmin($loginid){
	global $con;

	$stmt="delete from login where id=$loginid";

	$result=mysqli_query($con,$stmt);

	if($result!==false){
		$stmt="delete from admin where loginid=$loginid";
		$result=mysqli_query($con,$stmt);

		if($result===false){
			return false;
		}
		else{
			return true;
		}
	}
}


//Doctor Table

function AddDoctor($name,$address,$phone,$email,$experience,$photo,$qualification,$specialization,$fees,$username,$password){

	global $con;

	$stmt = "INSERT INTO LOGIN (username,password,usertype) values('$username','$password',2)";

	$result = mysqli_query($con,$stmt);

	if($result!==false){
		$loginid=mysqli_insert_id($con);

		$stmt = "INSERT INTO DOCTOR (loginid,name,address,phone,email,experience,photo,qualification,specialization,fees) values($loginid,'$name','$address','$phone','$email','$experience','$photo','$qualification','$specialization','$fees')";


		$result = mysqli_query($con,$stmt);


		if($result === false){
			return false;
		}
		else{
			return true;
		}
	}

}

function GetDoctors(){
	global $con;

	$stmt="select loginid,username,password,name,address,email,phone,experience,photo,qualification,specialization,fees from doctor join login on login.id=doctor.loginid";
	$result=mysqli_query($con,$stmt);

	if($result===false){
		return false;
	}

	$records=[];
	while($record=mysqli_fetch_assoc($result)){
		$records[]=$record;
	}

	return $records;
}



function GetDoctor($loginid){
	global $con;

	$stmt="select loginid,username,password,name,address,email,phone,experience,photo,qualification,specialization,fees from doctor join login on login.id=doctor.loginid where loginid=$loginid";
	$result=mysqli_query($con,$stmt);

	if($result===false){
		return false;
	}

	$record=mysqli_fetch_assoc($result);
	return $record;
}


function UpdateDoctor($loginid,$name,$address,$phone,$email,$experience,$photo,$qualification,$specialization,$fees,$username,$password){
	global $con;

	$stmt="update login set username='$username',password='$password' where id=$loginid";

	$result=mysqli_query($con,$stmt);

	if($result!==false){
		$stmt="update doctor set name='$name',address='$address',phone='$phone',email='$email',experience='$experience',photo='$photo',qualification='$qualification',specialization='$specialization',fees='$fees' where loginid=$loginid";
		$result=mysqli_query($con,$stmt);

		if($result===false){
			return false;
		}
		else{
			return true;
		}
	}
}


function DeleteDoctor($loginid){
	global $con;

	$stmt="delete from login where id=$loginid";

	$result=mysqli_query($con,$stmt);

	if($result!==false){
		$stmt="delete from doctor where loginid=$loginid";
		$result=mysqli_query($con,$stmt);

		if($result===false){
			return false;
		}
		else{
			return true;
		}
	}
}



//------Admin Table------

function AddPatient($name,$address,$gender,$phone,$email){

	global $con;

	$stmt = "INSERT INTO PATIENT (name,address,gender,phone,email) values('$name','$address','$gender','$phone','$email')";

	$result = mysqli_query($con,$stmt);

	if($result === false){
		return false;
	}
	else{
		return true;
	}
}


?>