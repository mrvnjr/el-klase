<?php include("header.php")?>
<body class="vh-100">
  	<div class="container-fluid">
    	<div class="row">
      		<div class="col-sm-6 text-black">
      			<div class="card mt-2" style="border-radius: 1rem;">
          			<div class="card-body text-center">
						<div>
							<img src="./uploads/logo.png"  class="w-25 vh-25 mb-2" alt="">
							<div class="float-right">
								<h4 class=" m-2"><b>El-KLase</b></h4><br>
								<h7 class=" mb-2"> <p>Anselmo A. Sandoval Memorial National High School</p> </h7>
							</div>
						</div>
						
						<form id="signin_student" class="form-signin" method="post">
							<div class="form-group">
								<h8 class="float-left"><i class="fas fa-lock m-2"></i> <b>Sign up as Student</b> </h8>
								
								<input type="text" class="form-control" id="username" name="username" placeholder="ID Number" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname" required>
							</div>
							<div class="form-group">
								<label>Class</label>
								<select name="class_id" class="form-control">
									<option></option>
									<?php
									$query = mysqli_query($conn,"select * from class order by class_name ")or die(mysqli_error());
									while($row = mysqli_fetch_array($query)){
									?>
									<option value="<?php  echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
									<?php
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Re-type Password" required>
							</div>	
							<div class="form-group">
							<a onclick="window.location='index.php'" id="btn_login" name="login" class="btn" type="submit"><i class="icon-signin icon-large"></i> Click here to Login</a>
								<button data-placement="right" title="Click Here to Sign In" id="signin" name="login" class="btn btn-success" type="submit"><i class="icon-signin icon-large"></i> Sign in</button>
									<script type="text/javascript">
										$(document).ready(function(){
											$('#signin').tooltip('show');
											$('#signin').tooltip('hide');
										});
									</script>
							</div>
						</form>
						<script>
							jQuery(document).ready(function(){
							jQuery("#signin_student").submit(function(e){
									e.preventDefault();
										
										var password = jQuery('#password').val();
										var cpassword = jQuery('#cpassword').val();
									
									
									if (password == cpassword){
									var formData = jQuery(this).serialize();
									$.ajax({
										type: "POST",
										url: "student_signup.php",
										data: formData,
										success: function(html){
										if(html=='true')
										{
										$.jGrowl("Welcome to CHMSC Learning Management System", { header: 'Sign up Success' });
										var delay = 2000;
											setTimeout(function(){ window.location = 'dashboard_student.php'  }, delay);  
										}else if(html=='false'){
											$.jGrowl("student does not found in the database Please Sure to Check Your ID Number or Firstname, Lastname and the Section You Belong. ", { header: 'Sign Up Failed' });
										}
										}
										
										
									});
							
									}else
										{
										$.jGrowl("student does not found in the database", { header: 'Sign Up Failed' });
										}
								});
							});
						</script>
					</div>
		  		</div>
			</div>

      		<div class="col-sm-6 px-0 d-none d-sm-block">
        		<img src="./uploads/bg.jpg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      		</div>
    	</div>
	</div>
	<?php include ('scripts.php')?>
</body>