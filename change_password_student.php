<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>

<body>
<div class="dash">  
	<?php include('change_password_sidebar_student.php'); ?>    
    <div class="dash-app">
            <header class="dash-toolbar ">
				<?php include('navbar_student.php');?>
            </header>
            <main class="dash-content">
				<div class="container-fluid">
					<h1>Change Password</h1>
                    <div class="row">
                        <div class="col-lg-12" id=" ">
							<div class="card">
								<div class="card-header">	
								</div>
								<div class="card-body">
									<div class="alert alert-info"><i class="fas fa-info-circle"></i> Please Fill in required details</div>
									<?php
										$query = mysqli_query($conn,"select * from student where student_id = '$session_id'")or die(mysqli_error());
										$row = mysqli_fetch_array($query);
									?>								
										
								    <form  method="post" id="change_password" class="form-horizontal">
										<div class="form-group">
											<label class="control-label" for="inputEmail">Current Password</label>
											<input type="hidden" id="password" name="password" value="<?php echo $row['password']; ?>"  placeholder="Current Password">
											<input type="password" id="current_password" class="form-control" name="current_password"  placeholder="Current Password">
											
										</div>
										<div class="form-group">
											<label class="control-label" for="inputPassword">New Password</label>
											
											<input type="password" id="new_password"class="form-control" name="new_password" placeholder="New Password">
											
										</div>
										<div class="form-group">
											<label class="control-label" for="inputPassword">Re-type Password</label>
											
											<input type="password" id="retype_password" class="form-control" name="retype_password" placeholder="Re-type Password">
											
										</div>
										<div class="form-group">
											
											<button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Save</button>
											
										</div>
									</form>
									
									<script>
			jQuery(document).ready(function(){
			jQuery("#change_password").submit(function(e){
					e.preventDefault();
						
						var password = jQuery('#password').val();
						var current_password = jQuery('#current_password').val();
						var new_password = jQuery('#new_password').val();
						var retype_password = jQuery('#retype_password').val();
						if (password != current_password)
						{
						$.jGrowl("Password does not match with your current password  ", { header: 'Change Password Failed' });
						}else if  (new_password != retype_password){
						$.jGrowl("Password does not match with your new password  ", { header: 'Change Password Failed' });
						}else if ((password == current_password) && (new_password == retype_password)){
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "update_password_student.php",
						data: formData,
						success: function(html){
					
						$.jGrowl("Your password is successfully change", { header: 'Change Password Success' });
						var delay = 2000;
							setTimeout(function(){ window.location = 'dashboard_student.php'  }, delay);  
						
						}
						
						
					});
			
					}
				});
			});
			</script>
										
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
