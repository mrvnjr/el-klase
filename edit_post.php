<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<body>
	<div class="dash">  
		<?php include('annoucement_link.php'); ?>
    <div class="dash-app">
            <header class="dash-toolbar ">
				<?php include('navbar_teacher.php');?>
            </header>
            <main class="dash-content">
				<h1>Add Announcements</h1>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12" id=" ">
							<div class="card">
								<div class="card-body">
									<a href="announcements.php<?php echo '?id='.$get_id; ?>"><i class="fas fa-arrow-left icon-large"></i> Back</a>
										<br>
										<br>
									<form method="post">
										<?php
											$query_announcement = mysqli_query($conn,"select * from teacher_class_announcements where teacher_id = '$session_id' and teacher_class_announcements_id = '$get_id1'  and  teacher_class_id = '$get_id' order by date DESC")or die(mysqli_error());
											$row = mysqli_fetch_array($query_announcement);
											$id = $row['teacher_class_announcements_id'];
										?>
											<input type="hidden" name="id" value="<?php echo $id; ?>">
											<textarea name="content" class="form-control" id="ckeditor_full">
												<?php echo $row['content']; ?>
											</textarea>
										<br>
										<button name="post" class="btn btn-info"><i class="icon-check icon-large"></i> Post</button>
									</form>
                                </div>
								
								<?php
									if (isset($_POST['post'])){
									$content = $_POST['content'];
									$id = $_POST['id'];
									
									mysqli_query($conn,"update teacher_class_announcements  set content = '$content' where teacher_class_announcements_id = '$id' ")or die(mysqli_error());
									?>
									<script>
									 window.location = 'announcements.php<?php echo '?id='.$get_id; ?>'; 
									</script>
									<?php
									}
								?>
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
