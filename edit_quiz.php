
<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<body>
<div class="dash">  
	<?php include('quiz_sidebar_teacher.php'); ?>   
    <div class="dash-app">
		<header class="dash-toolbar ">
			<?php include('navbar_teacher.php'); ?>     
		</header>
		<main class="dash-content">
			<div class="container-fluid">
				<div class="float-right">
					<a href="teacher_quiz.php" class="btn btn-success"><i class="fas fa-arrow-left"></i> Back</a>
				</div>
				<?php
								$query = mysqli_query($conn,"select * from quiz where quiz_id = '$get_id'")or die(mysqli_error());
								$row  = mysqli_fetch_array($query);
								
								?>
				<h1>Quiz</h1>
				<div class="row">
					<div class="col-lg-12" id=" ">
						<div class="card">
							<div class="card-body">
								<div class="col-12">
									    <form class="" method="post">
											<div class="form-group">
												<label class="control-label" for="inputEmail">Quiz Title</label>
											<div class="col-sm-10">
											<input type="hidden" name="quiz_id" value="<?php echo $row['quiz_id']; ?>" id="inputEmail" placeholder="Quiz Title">
											
												<input type="text" name="quiz_title" class="form-control" id="inputEmail"value="<?php echo $row['quiz_title']; ?>" placeholder="Quiz Title">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label" for="inputPassword">Quiz Description</label>
											<div class="col-sm-10">
												<input type="text" class="form-control"value="<?php echo $row['quiz_description']; ?>" name="description" id="inputPassword" placeholder="Quiz Description" required>
											</div>
										</div>										
										<div class="form-group row">
										<div class="col-sm-10">										
											<button name="save" type="submit" class="btn btn-success"><i class="icon-save"></i> Save</button>
										</div>
										</div>
										</form>									
										<?php
										if (isset($_POST['save'])){
										$quiz_id = $_POST['quiz_id'];
										$quiz_title = $_POST['quiz_title'];
										$description = $_POST['description'];
										mysqli_query($conn,"update quiz set quiz_title = '$quiz_title',quiz_description = '$description' where quiz_id = '$quiz_id'")or die(mysqli_error());
										?>
										<script>
										window.location = 'teacher_quiz.php';
										</script>
										<?php
										}
										?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main> 	
    </div>
</div>
<?php include('scripts.php'); ?>
</body>
</html>