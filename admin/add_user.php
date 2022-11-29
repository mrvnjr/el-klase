<!--add admin user-->
        <div class="card easion-card">
            <div class="card-header">
                <div class="easion-card-title"> Add Users</div>
            </div>
            <div class="card-body ">
                <form method="post">
                    <div class="form-group">
                      <input class="form-control" name="firstname" type="text" placeholder = "Firstname" required>
                    </div>
                    <div class="form-group">
                      <input class="form-control" name="lastname" type="text" placeholder = "Lastname" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="username" name="username" placeholder = "Username" required>
                        <div id="user_msg"></div>
                    </div>
                    <div class="form-group">
                      <input class="form-control" name="password" type="text" placeholder = "Password" required>
                    </div>
                    <div class="form-group text-center">
                    <button name="save" id="save" class="btn btn-success btn-block" ><i class="fas fa-plus"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Script -->
        <script type='text/javascript'>
            $(document).ready(function(){

                $("#username").keyup(function(){

                    var username = $(this).val().trim();
                    //make the ajax request to check is username available or not
                    if(username != ''){

                        $.ajax({
                            url: 'check.php',
                            type: 'post',
                            data: {username:username},
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

        <!---for adding User-->
        <?php
if (isset($_POST['save'])){
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];


$query = mysqli_query($conn,"select username from users where username = '$username'")or die(mysqli_error());
$count = mysqli_num_rows($query);

if ($count >0){ ?>
<script>
alert('Data Already Exist');
</script>
<?php
}else{
mysqli_query($conn,"insert into users (username,password,firstname,lastname) values('$username','$password','$firstname','$lastname')")or die(mysqli_error());

?>
<script>
window.location = "admin_user.php";
</script>
<?php
}
}
?>