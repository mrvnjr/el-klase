<!-- <header class="dash-toolbar "> -->

    <a href="#!" class="menu-toggle">
        <i class="fas fa-bars"></i>
    </a>
    <?php $teacher_query= mysqli_query($conn,"select * from teacher where teacher_id = '$session_id'")or die(mysqli_error());
	$row = mysqli_fetch_array($teacher_query);
	?>
    <a class="easion-logo text-success" href="#">Welcome <?php echo $row['firstname']; ?> to EL-Klase</a>
<div class="tools">    
    <div class="dropdown tools-item">
    <a href="#" class="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    

	<img id="avatar" src="admin/<?php echo $row['location']; ?>" class="rounded-circle" height="45" width="45">

    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
        <a class="dropdown-item" href="change_password_teacher.php">Change Password</a>
        <a class="dropdown-item" href="#myModal" data-toggle="modal">Change Avatar</a>
        <a class="dropdown-item" href="logout.php">Logout</a>
    </div>
</div>
<!-- </header> -->

<?php include('avatar_modal.php'); ?>
<script>$('#myModal').appendTo("body").modal('show');</script>		
