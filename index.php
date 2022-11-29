<?php include("header.php")?>
<body class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">

	  <div class="card mt-2" style="border-radius: 1rem;">
          <div class="card-body text-center">
			<div>
				<img src="./uploads/logo.png"  class="w-25 vh-25 mb-2" alt="">
				<h5>El-KLase</h5><h5> Anselmo A. Sandoval Memorial National High School</h5>

			</div>
			<form id="login_form1" class="form-signin" method="post">
				<h4 class="float-left"><i class="fas fa-lock m-2"></i>Sign in </h4>
				<div class="form-group">
					<input type="text" class="form-control" id="username" name="username" placeholder="Username" required>

				</div>

				<div class="form-group ">
					<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
				</div>

            <!-- Checkbox -->
            <!-- <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
              <label class="form-check-label" for="form1Example3"> Remember password </label>
            </div> -->

            <button data-placement="right" title="Click Here to Sign In" id="signin" name="login" class="btn btn-success btn-block" type="submit"> Sign in</button>
														<script type="text/javascript">
														$(document).ready(function(){
															$('#signin').tooltip('show');
															$('#signin').tooltip('hide');
														});
														</script>	
			</form>
			<script>
				jQuery(document).ready(function(){
				jQuery("#login_form1").submit(function(e){
						e.preventDefault();
						var formData = jQuery(this).serialize();
						$.ajax({
							type: "POST",
							url: "login.php",
							data: formData,
							success: function(html){
							if(html=='true')
							{
							$.jGrowl("Loading File Please Wait......", { sticky: true });
							$.jGrowl("Welcome to AASMNHS Learning Management System", { header: 'Access Granted' });
							var delay = 1000;
								setTimeout(function(){ window.location = 'dasboard_teacher.php'  }, delay);  
							}else if (html == 'true_student'){
								$.jGrowl("Welcome to AASMNHS Learning Management System", { header: 'Access Granted' });
							var delay = 1000;
								setTimeout(function(){ window.location = 'student_notification.php'  }, delay);  
							}else
							{
							$.jGrowl("Please Check your username and Password", { header: 'Login Failed' });
							}
							}
						});
						return false;
					});
				});
			</script>


            <hr class="my-3">
			<span>New to El-Klase?</span>
			<span>Please Sign-Up</span>
			<hr>	
			<button data-placement="top" title="Sign In as Student" id="signin_student" onclick="window.location='signup_student.php'" id="btn_student" name="login" class="btn btn-success m-1" type="submit">I`m a Student</button>
			
			<button data-placement="top" title="Sign In as Teacher" id="signin_teacher" onclick="window.location='signup_teacher.php'" name="login" class="btn btn-success m-1" type="submit">I`m a Teacher</button>
			
				
				<script type="text/javascript">
				$(document).ready(function(){
					$('#signin_student').tooltip('show'); $('#signin_student').tooltip('hide');
				});
				</script>	
				<script type="text/javascript">
				$(document).ready(function(){
					$('#signin_teacher').tooltip('show'); $('#signin_teacher').tooltip('hide');
				});
				</script>

          </div>
        </div>
      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="./uploads/bg.jpg"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
</div>
<?php include ('scripts.php')?>
			</body>