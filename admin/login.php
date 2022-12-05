<?php
		include('dbcon.php');
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];
		$recaptcha = $_POST['g-recaptcha-response'];
		$secret_key = '6LckPVMjAAAAAFkgev64jh_Iqsr_7TpQp2b5-q8N';
		  // Hitting request to the URL, Google will
    // respond with success or error scenario
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret='
          . $secret_key . '&response=' . $recaptcha;
  
    // Making request to verify captcha
    $response = file_get_contents($url);
  
    // Response return by google is in
    // JSON format, so we have to parse
    // that json
    $response = json_decode($response);
  
    // Checking, if response is true or not
    if ($response->success) {
        $query = mysqli_query($conn,"SELECT * FROM users WHERE username='$username' AND password='$password'")or die(mysqli_error());
		$count = mysqli_num_rows($query);
		$row = mysqli_fetch_array($query);


			if ($count > 0){
			
			$_SESSION['id']=$row['user_id'];
			
			echo 'true';
			
			
			}else{ 
			echo 'false';
			}
		} else {
			echo '<script>alert("Error in Google reCAPTACHA")</script>';
		}

			
				
		?>