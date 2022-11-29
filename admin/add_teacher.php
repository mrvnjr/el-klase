
<!--add teacher user-->
<div class="card easion-card">
            <div class="card-header">
                <div class="easion-card-title"> Add teacher</div>
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
                      <input class="form-control" name="username" type="text" placeholder = "Username" required>
                    </div>
                    <div class="form-group text-center">
                    <button name="save" id="save" class="btn btn-success btn-block" ><i class="fas fa-plus"></i></button>
                    </div>
                </form>
            </div>
        </div>

        <?php
            if (isset($_POST['save'])) {
            
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $username = $_POST['username'];
           
                
                $query = mysqli_query($conn,"select * from teacher where firstname = '$firstname' and lastname = '$lastname' ")or die(mysqli_error());
                $count = mysqli_num_rows($query);
                
                if ($count > 0){ ?>
                    <script>
                    alert('Data Already Exist');
                    </script>
                    <?php
                }else{

                mysqli_query($conn,"insert into teacher (firstname,lastname,username,location)
                values ('$firstname','$lastname','$username','uploads/NO-IMAGE-AVAILABLE.jpg')         
                ") or die(mysqli_error()); ?>
            <script>
                window.location = "teachers.php"; 
            </script>

        <?php   }} ?>
        
        