<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<body>
	<div class="dash">  
		<?php include('annoucement_link.php'); ?>
    <div class="dash-app">
            <header class="dash-toolbar ">
			<?php include('navbar_teacher.php'); ?>
            </header>
            <main class="dash-content">
				<div class="container-fluid">
					<h1>Add Announcements</h1>
                    <div class="row">
                        <div class="col-lg-8" id=" ">
							<div class="card">
								<div class="card-body">
									<form method="post">
										<textarea name="content" class="form-control"id="ckeditor_full"></textarea>
										<br>
										<button name="post" class="btn btn-primary"><i class="fas fa-check"></i> Post</button>
									</form>
								</div>
									
									<?php
										if (isset($_POST['post'])){
										$content = $_POST['content'];
										mysqli_query($conn,"insert into teacher_class_announcements (teacher_class_id,teacher_id,content,date) values('$get_id','$session_id','$content',NOW())")or die(mysqli_error());
										mysqli_query($conn,"insert into notification (teacher_class_id,notification,date_of_notification,link) value('$get_id','Add Annoucements',NOW(),'announcements_student.php')")or die(mysqli_error());
										?>
										<script>
										window.location = 'announcements.php<?php echo '?id='.$get_id; ?>';
										</script>
										<?php
										}
									?>
							</div>
                        </div>
                       	<div class="col-lg-4" id="">
							<div class="card">
								<div class="card-body">
									<?php
									$query_announcement = mysqli_query($conn,"select * from teacher_class_announcements
																		where teacher_id = '$session_id'  and  teacher_class_id = '$get_id' order by date DESC
																		")or die(mysqli_error());
									while($row = mysqli_fetch_array($query_announcement)){
									$id = $row['teacher_class_announcements_id'];
									?>
										<div class="post form-group"  id="del<?php echo $id; ?>">
											<?php echo $row['content']; ?>		
											<br>
											<strong><i class="fas fa-calendar-alt mt-2"></i> <?php echo $row['date']; ?></strong>
											
											<div class="float-right">
												<a class="btn btn-link"  href="#" data-toggle="modal" data-target="#modal-<?php echo $id; ?>"><i class="fas fa-trash-alt"></i> </a>
											</div>
											
											<div class="float-right">
												<form method="post" action="edit_post.php<?php echo'?id='.$get_id; ?>">
													<input type="hidden" name="id" value="<?php echo $id; ?>">
													<button class="btn btn-link" name="edit"><i class="fas fa-pen"></i> </button> 
												</form>
											</div>	
											<hr>			
											
										</div>
									<?php include("remove_sent_message_modal.php"); ?>
									<?php } ?>
								</div>
							</div>
							
							<script type="text/javascript">
								$(document).ready( function() {

									
									$('.remove').click( function() {
									
									var id = $(this).attr("id");
										$.ajax({
										type: "POST",
										url: "remove_announcements.php",
										data: ({id: id}),
										cache: false,
										success: function(html){
										$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
										$('#'+id).modal('hide');
										$.jGrowl("Your Post is Successfully Deleted", { header: 'Data Delete' });
									
										}
										}); 
										
										return false;
									});				
								});

							</script>
						</div>                                  
                    </div>
                </div>
            </main> 	
    </div>
</div>
<?php include('scripts.php'); ?>
</body>
