<!--update class section-->
<a href="class.php" class="btn btn-success"><i class="fas fa-plus"></i> Add Section</a>
<div class="card easion-card">
            <div class="card-header">
                <div class="easion-card-title"> Update Section</div>
            </div>
            <div class="card-body ">
                <?php
	    			$query = mysqli_query($conn,"select * from class where class_id = '$get_id'")or die(mysqli_error());
					$row = mysqli_fetch_array($query);
        		?>
                <form method="post">
                  <div class="form-group">
                    <select name="grade_level" class="form-control">
                        <option><?php echo $row['grade_level']; ?></option>
                        <?php for ($i = 7; $i <= 12; $i++) : ?>
                            <option value=" Grade <?php echo $i; ?>">Grade <?php echo $i; ?></option>
                        <?php endfor; ?>
                    </select>
                  </div>
                    <div class="form-group">
                      <input class="form-control" value="<?php echo $row['class_name']; ?>" name="class_name" type="text" placeholder = "Section Name" required>
                    </div>
                    <div class="form-group text-center">
                    <button name="update" id="update" class="btn btn-success btn-block" ><i class="fas fa-plus"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <?php
if (isset($_POST['update'])){
$class_name = $_POST['class_name'];
$grade_level = $_POST['grade_level'];
mysqli_query($conn,"update class set class_name = '$class_name', grade_level='$grade_level' where class_id = '$get_id' ")or die(mysqli_error());
?>

<script>
window.location = "class.php";
</script>
<?php

}
?>