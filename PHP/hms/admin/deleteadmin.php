<?php

include '../common/dl.php';

$loginid=$_GET['id'];
DeleteAdmin($loginid);
header('location:manageadmins.php');

?>