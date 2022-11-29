<a href="teachers.php" class="btn btn-success mb-3"><i class="fas fa-plus"></i> Add Teacher</a>

<div class="card easion-card">
            <div class="card-header">
                <div class="easion-card-title"> Edit Teachers</div>
            </div>
            <div class="card-body ">
				<?php
					$query = mysqli_query($conn,"select * from teacher where teacher_id = '$get_id' ")or die(mysqli_error());
					$row = mysqli_fetch_array($query);
				?>
                <form method="post">
                    <div class="form-group">
                      <input class="form-control" value="<?php echo $row['firstname']; ?>" name="firstname" type="text" placeholder = "Firstname" required>
                    </div>
                    <div class="form-group">
                      <input class="form-control" value="<?php echo $row['lastname']; ?>"  name="lastname"  type="text" placeholder = "Lastname" required>
                    </div>
                    <div class="form-group">
                      <input class="form-control" value="<?php echo $row['username']; ?>"  name="username" id="username" type="text" placeholder = "Username" required>
                      <div id="user_msg"></div>
                    </div>
                    <div class="form-group">
					<div class="text-center">
                      <button name="update" id="update" class="btn btn-success" ><i class="fas fa-edit"></i></button>
					  
                      <a name="" id="" class="btn btn-success" href="teachers.php" role="button">Cancel</a>

					  </div>
                    </div>
                </form>
            </div>
        </div>
	<?php
		if (isset($_POST['update'])) {

			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			
			$query = mysqli_query($conn,"select * from teacher where firstname = '$firstname' and lastname = '$lastname' ")or die(mysqli_error());
			$count = mysqli_num_rows($query);
			
			if ($count > 1){ ?>
			<script>
			alert('Data Already Exist');
			</script>
			<?php
			}else{
			
			mysqli_query($conn,"update teacher set firstname = '$firstname' , lastname = '$lastname' , username = '$username' where teacher_id = '$get_id' ")or die(mysqli_error());	
			?>
			<script>
			window.location = "teachers.php"; 
			</script>
	<?php   }} ?>
		
		