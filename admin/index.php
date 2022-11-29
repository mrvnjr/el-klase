<?php include('header.php'); ?>

  <body id="login">
  <div class="form-screen">
        <div class="card account-dialog">
            <div class="card-header bg-success text-white"> Please sign in </div>
            <div class="card-body">
      			<form id="login_form" class="form-signin" method="post">
                    <div class="form-group">
       			 		<input type="text" class="form-control" id="usernmae" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
						<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="account-dialog-actions">
                        <button name="login" class="btn btn-success" type="submit">Sign in</button>
                    </div>
                </form>
				<script>
					jQuery(document).ready(function(){
					jQuery("#login_form").submit(function(e){
							e.preventDefault();
							var formData = jQuery(this).serialize();
							$.ajax({
								type: "POST",
								url: "login.php",
								data: formData,
								success: function(html){
								if(html=='true')
								{
								$.jGrowl("Welcome to AASMNHS Learning Management System", { header: 'Access Granted' });
								var delay = 2000;
									setTimeout(function(){ window.location = 'dashboard.php'  }, delay);  
								}
								else
								{
								$.jGrowl("Please Check your username and Password", { header: 'Login Failed' });
								}
								}
								
							});
							return false;
						});
					});
				</script>
            </div>
        </div>
    </div>
<?php include('scripts.php'); ?>
  </body>
</html>