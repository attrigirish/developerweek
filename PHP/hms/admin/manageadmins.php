<?php
include '../common/dl.php';

$admins=GetAdmins();
?>

<?php include '../common/admin-header.php' ?>

<!-- Side Bar -->
<div class="col-md-3">
	<?php include 'sidebar.php'; ?>	
</div>
<!-- Main Content -->
<div class="col-md-9">
	<h1>All Admission</h1>
	<table class="table">
		<tr>
			<td>
				<h6><a href="addadmin.php">Add New Admin</a></h6>
			</td>
		</tr>
		<tr>
			<td>User Name</td>
			<td>Password</td>
			<td>Name</td>
			<td>Address</td>
			<td>Action</td>
		</tr>
		<?php foreach($admins as $admin) { ?>
		<tr>
			<td><?php echo $admin['username']; ?></td>
			<td><?php echo $admin['password']; ?>
			<td><?php echo $admin['name']; ?></td>
			<td><?php echo $admin['address']; ?></td>
			<td>
				<a href="deleteadmin.php?id=<?php echo $admin['loginid'] ?>"><img src="../assets/images/delete-icon.png" width="24px"></a>
				<a href="updateadmin.php?id=<?php echo $admin['loginid'] ?>"><img src="../assets/images/edit-icon.png" width="24px"></a>
			</td>			
		</tr>
		<?php } ?>
	</table>
</div>

<?php include '../common/admin-footer.php' ?>
