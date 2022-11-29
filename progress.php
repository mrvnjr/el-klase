<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<body>
<div class="dash">  
	<?php include('progress_link_student.php'); ?>    
    <div class="dash-app">
            <header class="dash-toolbar ">
				<?php include('navbar_student.php');?>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-7" id=" ">
							<div class="card">
								<div class="card-header">
									<div id="" class="muted float-right"><h4> Assignment Grade Progress</h4></div>
								</div>
								<div class="card-body table-responsive">
									<table cellpadding="0" cellspacing="0" border="0" class="table " id="">
						
										<thead>
												<tr>
												<th>Date Upload</th>
												<th>Assignment</th>
											
												<th>Grade</th>
												</tr>
												
										</thead>
										<tbody>
							
													<?php
														$query = mysqli_query($conn,"select * FROM student_assignment 
														LEFT JOIN student on student.student_id  = student_assignment.student_id
														RIGHT JOIN assignment on student_assignment.assignment_id  = assignment.assignment_id
														WHERE student_assignment.student_id = '$session_id'
														order by fdatein DESC")or die(mysqli_error());
														while($row = mysqli_fetch_array($query)){
														$id  = $row['student_assignment_id'];
														$student_id = $row['student_id'];
													?>                              
												<tr>
													<td><?php echo $row['fdatein']; ?></td>
													<td><?php  echo $row['fname']; ?></td>
									
													<?php if ($session_id == $student_id){ ?>
													<td>
													<span class="badge badge-success"><?php echo $row['grade']; ?></span>
													</td>
													<?php }else{ ?>
													<td></td>
													<?php } ?>										 
												</tr>
						
													<?php } ?>	
										</tbody>
									</table>
								</div>
							</div>
                        </div>
                       	<div class="col-lg-5" id="">
							<div class="card">
								<div class="card-header">
									<div id="" class="muted float-right"><h4> Practice Quiz Progress</h4></div>
								</div>
								<div class="card-body table-responsive">
									<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
										<thead>
										        <tr>
												<th>Quiz Title</th>
												<th>Description</th>
												<th>Quiz Time (In Minutes)</th>
												<th></th>
												</tr>
										</thead>
										<tbody>
											<?php
												$query = mysqli_query($conn,"select * FROM class_quiz 
												LEFT JOIN quiz on class_quiz.quiz_id = quiz.quiz_id
												where teacher_class_id = '$get_id' order by class_quiz_id DESC ")or die(mysqli_error());
												while($row = mysqli_fetch_array($query)){
												$id  = $row['class_quiz_id'];
												$quiz_id  = $row['quiz_id'];
												$quiz_time  = $row['quiz_time'];
											
												$query1 = mysqli_query($conn,"select * from student_class_quiz where class_quiz_id = '$id' and student_id = '$session_id'")or die(mysqli_error());
												$row1 = mysqli_fetch_array($query1);
												$grade = $row1['grade'];

											?>          
												<?php if ($grade ==""){
												
												}else{ ?>	
											<tr>                     
											<td><?php echo $row['quiz_title']; ?></td>
											<td><?php  echo $row['quiz_description']; ?></td>                                     
											<td><?php  echo $row['quiz_time'] / 60; ?></td>                                     
											<td width="200">
										
											<b>Already Taken Score <?php echo $grade; ?></b>
							
											</td>            
														<script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>Take This Quiz').tooltip('show');
															$('#<?php echo $id; ?>Take This Quiz').tooltip('hide');
														});
														</script>										 
											</tr>
												<?php } ?>
											<?php } ?>
										</tbody>
									</table>
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