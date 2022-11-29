
<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
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
												<input type="text" name="quiz_title" class="form-control" id="inputEmail" placeholder="Quiz Title">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label" for="inputPassword">Quiz Description</label>
											<div class="col-sm-10">
												<input type="text" class="form-control" name="description" id="inputPassword" placeholder="Quiz Description" required>
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
										$quiz_title = $_POST['quiz_title'];
										$description = $_POST['description'];
										mysqli_query($conn,"insert into quiz (quiz_title,quiz_description,date_added,teacher_id) values('$quiz_title','$description',NOW(),'$session_id')")or die(mysqli_error());
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