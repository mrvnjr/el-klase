<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<body>
<div class="dash">  
	<?php include('class_sidebar.php'); ?>
    <div class="dash-app">
            <header class="dash-toolbar ">
                <?php include ("navbar_teacher.php")?>
            </header>
            <main class="dash-content">
					
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12" id=" ">
							<div class="mb-2">
								<a href="add_student.php<?php echo '?id='.$get_id; ?>" class="btn btn-info"><i class="fas fa-plus-circle"></i> Add Student</a>
								<a onclick="window.open('print_student.php<?php echo '?id='.$get_id; ?>')"  class="btn btn-success text-white"><i class="fas fa-list-ul"></i> Student List</a>
							</div>
							<div class="card">
								<div class="card-header">
									<?php 
									$my_student = mysqli_query($conn,"SELECT * FROM teacher_class_student
															LEFT JOIN student ON student.student_id = teacher_class_student.student_id 
															INNER JOIN class ON class.class_id = student.class_id where teacher_class_id = '$get_id' order by lastname ")or die(mysqli_error());
									$count_my_student = mysqli_num_rows($my_student);?>
									Number of Students: <span class="badge badge-info"><?php echo $count_my_student; ?></span>
								</div>
								<div class="card-body">
								<ul	 id="da-thumbs" class="da-thumbs">
										    <?php
												$my_student = mysqli_query($conn,"SELECT * FROM teacher_class_student
												LEFT JOIN student ON student.student_id = teacher_class_student.student_id 
												INNER JOIN class ON class.class_id = student.class_id where teacher_class_id = '$get_id' order by lastname ")or die(mysqli_error());
												while($row = mysqli_fetch_array($my_student)){
												$id = $row['teacher_class_student_id'];
											?>
											<li id="del<?php echo $id; ?>" class="m-1 card	">
													<a href="#">
															<img id="student_avatar_class" src ="admin/<?php echo $row['location'] ?>" width="120" height="140" class="img-thumbnail">
														<div>
														<span>
														<p><?php ?></p>
														
														</span>
														</div>
													</a>
													<p class="class"><?php echo $row['lastname'];?></p>
													<p class="subject"><?php echo $row['firstname']; ?></p>
													<a  href="#<?php echo $id; ?>" data-toggle="modal"><i class="fas fa-trash-alt"></i> Remove</a>	
											</li>
											<?php include("remove_student_modal.php"); ?>
											<?php } ?>
									</ul>
												<script type="text/javascript">
													$(document).ready( function() {
														$('.remove').click( function() {
														var id = $(this).attr("id");
															$.ajax({
															type: "POST",
															url: "remove_student.php",
															data: ({id: id}),
															cache: false,
															success: function(html){
																$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
																$('#'+id).modal('show');
																$.jGrowl("Your Student is Successfully Remove", { header: 'Student Remove' });
															}
															}); 	
															return false;
														});				
													});
												</script>
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
</html>