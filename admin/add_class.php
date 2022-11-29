<!--add admin user-->
<div class="card easion-card">
            <div class="card-header">
                <div class="easion-card-title"> Add Section</div>
            </div>
            <div class="card-body ">
                <form method="post">
                  <div class="form-group">
                    <select name="grade_level" class="form-control" required>
                      <option></option>
                        <?php for ($i = 7; $i <= 12; $i++) : ?>
                            <option value=" Grade <?php echo $i; ?>">Grade <?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                  </div>
                    <div class="form-group">
                      <input class="form-control" name="class_name" type="text" placeholder = "Section Name" required>
                    </div>
                    <div class="form-group text-center">
                    <button name="save" id="save" class="btn btn-success btn-block" ><i class="fas fa-plus"></i></button>
                    </div>
                </form>
            </div>
        </div>
<?php
if (isset($_POST['save'])){
$class_name = $_POST['class_name'];
$grade_level = $_POST['grade_level'];

$query = mysqli_query($conn,"select * from class where class_name  =  '$class_name' ")or die(mysqli_error());
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Date Already Exist');
</script>
<?php
}else{
mysqli_query($conn,"insert into class (class_name, grade_level) values('$class_name','$grade_level')")or die(mysqli_error());
?>
<script>
window.location = "class.php";
</script>
<?php
}
}
?>