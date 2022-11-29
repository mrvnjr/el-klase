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
						
						<form id="signin_teacher" class="form-signin" method="post">
							<div class="form-group">
								<h8 class="float-left"><i class="fas fa-lock m-2"></i> <b>Sign up as Teacher</b> </h8>
								<input type="text" class="form-control input-sm"  name="firstname" placeholder="Firstname" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control input-sm"  name="lastname" placeholder="Lastname" required>
							</div>
							<div class="form-group">
					 			<input type="text" class="form-control input-sm" id="username" name="username" placeholder="Username" required>
							</div>
							<div class="form-group">
								<input type="password" class="form-control input-sm" id="password" name="password" placeholder="Password" required>
							</div>
							<div class="form-group">
								<input type="password" class="form-control input-sm" id="cpassword" name="cpassword" placeholder="Re-type Password" required>
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
			jQuery("#signin_teacher").submit(function(e){
					e.preventDefault();
						var password = jQuery('#password').val();
						var cpassword = jQuery('#cpassword').val();
					if (password == cpassword){
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "teacher_signup.php",
						data: formData,
						success: function(html){
						if(html=='true')
						{
						$.jGrowl("Welcome to CHMSC Learning Management System", { header: 'Sign up Success' });
						var delay = 1000;
							setTimeout(function(){ window.location = 'dasboard_teacher.php'  }, delay);  
						}else{
							$.jGrowl("Your data is not found in the database", { header: 'Sign Up Failed' });
						}
						}
					});
			
					}else
						{
						$.jGrowl("Your data is not found in the database", { header: 'Sign Up Failed' });
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