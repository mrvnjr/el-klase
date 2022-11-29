<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<body>
<div class="dash">  				
	<?php include('my_classmates_link.php'); ?>
    <div class="dash-app">
            <header class="dash-toolbar ">
				<?php include('navbar_student.php');?>
            </header>
            <main class="dash-content">
				<div class="container-fluid">
					<h1>My Classmates</h1>
                    <div class="row">
                        <div class="col-lg-12" id=" ">
							<div class="card">
								<div class="card-body">
								<ul	 id="da-thumbs" class="da-thumbs">
										    <?php
										 
										 
														$my_student = mysqli_query($conn,"SELECT *
														FROM teacher_class_student
														LEFT JOIN student ON student.student_id = teacher_class_student.student_id
														INNER JOIN class ON class.class_id = student.class_id where teacher_class_id = '$get_id' order by lastname ")or die(mysqli_error());
														
														while($row = mysqli_fetch_array($my_student)){
														$id = $row['teacher_class_student_id'];
														?>
														
											<li id="del<?php echo $id; ?>">
												<a  class="classmate_cursor" href="#">
														<img id="student_avatar_class" src ="admin/<?php echo $row['location'] ?>" width="124" height="140" class="img-polaroid">
													<div><span></span></div>
												</a>
												<p class="class"><?php echo $row['lastname'];?></p>
												<p class="subject"><?php echo $row['firstname']; ?></p>
											</li>
									<?php } ?>
									</ul>
								</div>
							</div>
                        </div>
                       	<div class="col-lg-4" id="">
						
	</div>                                  
                    </div>
                </div>
            </main> 	
    </div>
</div>
<?php include('scripts.php'); ?>
</body>
