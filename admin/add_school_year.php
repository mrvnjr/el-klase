
<!--add School Year-->
<div class="card easion-card">
            <div class="card-header">
                <div class="easion-card-title"> Add School Year</div>
            </div>
            <div class="card-body ">
                <form method="post">
                    <div class="form-group">
                      <input class="form-control" name="school_year" type="text" placeholder = "School Year" required>
                    </div>
                    
                    <div class="form-group text-center">
                    <button name="save" id="save" class="btn btn-success btn-block" ><i class="fas fa-plus"></i></button>
                    </div>
                </form>
            </div>
        </div>

					
<?php
if (isset($_POST['save'])){
$school_year = $_POST['school_year'];



$query = mysqli_query($conn,"select * from school_year where school_year = '$school_year'")or die(mysqli_error());
$count = mysqli_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Data Already Exist');
</script>
<?php
}else{
mysqli_query($conn,"insert into school_year (school_year) values('$school_year')")or die(mysqli_error());

?>
<script>
window.location = "school_year.php";
</script>
<?php
}
}
?>