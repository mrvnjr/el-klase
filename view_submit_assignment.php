<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<?php 
	  $post_id = $_GET['post_id'];
	  if($post_id == ''){
	  ?>
		<script>
		window.location = "assignment_student.php<?php echo '?id='.$get_id; ?>";
		</script>
	  <?php
	  }
	
 ?>

<body class="studentTableDiv">
<div class="dash">  
	<?php include('assignment_link.php'); ?>    
    <div class="dash-app">
            <header class="dash-toolbar ">
				<?php include('navbar_teacher.php');?>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12" id=" ">
							<div class="card">
								<div class="card-header">
									<div id="" class="muted float-right"><a href="assignment.php<?php echo '?id='.$get_id; ?>"><i class="fas fa-arrow-left"></i> Back</a></div>
								</div>
								<div class="card-body">
								<?php
										$query1 = mysqli_query($conn,"select * FROM assignment where assignment_id = '$post_id'")or die(mysqli_error());
										$row1 = mysqli_fetch_array($query1);
									
									?>
									<div class="alert alert-info">Submit Assignment in : <?php echo $row1['fname']; ?></div>
									
									<div id="">
									<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
											
															<thead>
																	<tr>
																	<th>Date Upload</th>
																	<th>File Name</th>
																	<th>Description</th>
																	<th>Submitted by:</th>
																	<th></th>
																	<th></th>
																	</tr>
																	
															</thead>
															<tbody>
																
														<?php
															$query = mysqli_query($conn,"select * FROM student_assignment 
															LEFT JOIN student on student.student_id  = student_assignment.student_id
															where assignment_id = '$post_id'  order by assignment_fdatein DESC")or die(mysqli_error());
															while($row = mysqli_fetch_array($query)){
															$id  = $row['student_assignment_id'];
														?>                              
															<tr>
															<td><?php echo $row['assignment_fdatein']; ?></td>
															<td><?php  echo $row['fname']; ?></td>
															<td><?php echo $row['fdesc']; ?></td>                                                                        
															<td><?php echo $row['firstname']." ".$row['lastname']; ?></td>                                                                        
															<td><a href="<?php echo $row['floc']; ?>"><i class="fas fa-download"></i></a></td>                                                                        
															<td width="180">
															<form method="post" action="save_grade.php">
															<input type="hidden" class="col-3" name="id" value="<?php echo $id; ?>">
															<input type="hidden" class="col-3" name="post_id" value="<?php echo $post_id; ?>">
															<input type="hidden" class="col-3" name="get_id" value="<?php echo $get_id; ?>">
															<input type="text" class="col-5" name="grade" value="<?php echo $row['grade']; ?>">
															<button name="save" class="btn btn-success" id="btn_s"><i class="icon-save"></i> Save</button>
															</form>
															</td>                                                                        
													</tr>
											
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