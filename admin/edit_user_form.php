<a href="admin_user.php" class="btn btn-success mb-2"><i class="fas fa-plus"></i> Add user</a>

<div class="card easion-card">
            <div class="card-header">
                <div class="easion-card-title"> Edit</div>
            </div>
            <div class="card-body ">
              <?php
								$query = mysqli_query($conn,"select * from users where user_id = '$get_id'")or die(mysqli_error());
								$row = mysqli_fetch_array($query);
							?>
                <form method="post">
                    <div class="form-group">
                      <input class="form-control" value="<?php echo $row['firstname']; ?>" name="firstname" type="text" placeholder = "Firstname" required>
                    </div>
                    <div class="form-group">
                      <input class="form-control" value="<?php echo $row['lastname']; ?>"  name="lastname"  type="text" placeholder = "Lastname" required>
                    </div>
                    <div class="form-group">
                      <input class="form-control" value="<?php echo $row['username']; ?>"  name="usrname" id="usrname" type="text" placeholder = "Username" required>
                      <div id="user_msg"></div>
                    </div>
                    <div class="form-group text-center">
                      <button name="update" id="update" class="btn btn-success" ><i class="fas fa-edit"></i></button>
                      <a name="" id="" class="btn btn-success" href="admin_user.php" role="button">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
        <script type='text/javascript'>
            $(document).ready(function(){

                $("#usrname").keyup(function(){

                    var usrname = $(this).val().trim();

                    if(usrname != ''){

                        $.ajax({
                            url: 'check.php',
                            type: 'post',
                            data: {usrname:usrname},
                            success: function(response){
                                
                                // Show response
                                $("#user_msg").html(response);
                                
                            }
                        });
                    }else{
                        $("#user_msg").html("");
                    }

                });
            });
        </script>
			<?php		
if (isset($_POST['update'])){

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['usrname'];


mysqli_query($conn,"update users set username = '$username'  , firstname = '$firstname' , lastname = '$lastname' where user_id = '$get_id' ")or die(mysqli_error());

?>
<script>
  window.location = "admin_user.php"; 
</script>
<?php
}
?>