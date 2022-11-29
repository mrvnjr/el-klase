
<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<body>
	<div class="dash">  
		<?php include('quiz_sidebar_teacher.php'); ?>   
		<div class="dash-app">
			<header class="dash-toolbar ">
				<?php include('navbar_student.php'); ?>     
			</header>
			<main class="dash-content">
			<div class="container-fluid">
				<div class="float-right">
					<a href="teacher_quiz.php" class="btn btn-success"><i class="fas fa-arrow-left"></i> Back</a>
				</div>
				<h1>Quiz</h1>
				<div class="row">
				<?php
										$school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
										$school_year_query_row = mysqli_fetch_array($school_year_query);
										$school_year = $school_year_query_row['school_year'];
										?>
					<div class="col-lg-12" id=" ">
						<div class="card">
							<div class="card-body">
								<div class="col-12">
									<form class="form-horizontal" method="post">
										<div class="form-group">
											<label for="inputEmail">Quiz</label>
											<select name="quiz_id" class="form-control">
												<option></option>
													<?php  $query = mysqli_query($conn,"select * from quiz where teacher_id = '$session_id'")or die(mysqli_error());
													while ($row = mysqli_fetch_array($query)){ $id = $row['quiz_id']; ?>
													<option value="<?php echo $id; ?>"><?php echo $row['quiz_title']; ?></option>
													<?php } ?>
											</select>
										</div>
										<div class="form-group">
											<label for="inputPassword">Test Time (in minutes)</label>
											<input type="text" class="form-control" name="time" id="inputPassword" placeholder="Test Time" required>
										</div>
											<table class="table" id="question">
												<th></th>
												<th>Class</th>
												<th>Subject</th>
												<th></th>
												
												<tbody>
													<?php $query = mysqli_query($conn,"select * from teacher_class
																		LEFT JOIN class ON class.class_id = teacher_class.class_id
																		LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
																		where teacher_id = '$session_id' and school_year = '$school_year' ")or die(mysqli_error());
																		$count = mysqli_num_rows($query);
																		

																		while($row = mysqli_fetch_array($query)){
																		$id = $row['teacher_class_id'];
												
																		?>
													<tr>
													<td width="30">
														<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
													</td>
													<td><?php echo $row['class_name']; ?></td>
													<td><?php echo $row['subject_code']; ?></td>
													</tr>
													<?php } ?>
												</tbody>
											</table>
										<div class="form-group">
											<button name="save" type="submit" class="btn btn-primary"><i class="icon-save"></i> Save</button>
										</div>
										</form>
										
									
										
										<?php
										if (isset($_POST['save'])){
											$quiz_id = $_POST['quiz_id'];
											$time = $_POST['time'] * 60;
											$id=$_POST['selector'];
											
													$name_notification  = 'Add Practice Quiz file';
													
											$N = count($id);
											for($i=0; $i < $N; $i++)
											{
												mysqli_query($conn,"insert into class_quiz (teacher_class_id,quiz_time,quiz_id) values('$id[$i]','$time','$quiz_id')")or die(mysqli_error());
												mysqli_query($conn,"insert into notification (teacher_class_id,notification,date_of_notification,link) value('$id[$i]','$name_notification',NOW(),'student_quiz_list.php')")or die(mysqli_error());
											} ?>
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
<?php include('script.php'); ?>
</body>
</html>

<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<body>
		<?php include('navbar_teacher.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('quiz_sidebar_teacher.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->	
									<ul class="breadcrumb">
										<?php
										$school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
										$school_year_query_row = mysqli_fetch_array($school_year_query);
										$school_year = $school_year_query_row['school_year'];
										?>
											<li><a href="#"><b>My Class</b></a><span class="divider">/</span></li>
										<li><a href="#">School Year: <?php echo $school_year_query_row['school_year']; ?></a><span class="divider">/</span></li>
										<li><a href="#"><b>Quiz</b></a></li>
									</ul>
						 <!-- end breadcrumb -->
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-right"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								
								
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>