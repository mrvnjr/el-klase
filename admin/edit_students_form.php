 <!--update class section-->
<a href="students.php" class="btn btn-success mb-2"><i class="fas fa-plus"></i> Add Student</a>
<div class="card easion-card">
            <div class="card-header">
                <div class="easion-card-title"> Update Section</div>
            </div>
            <div class="card-body ">
            <?php
							$query = mysqli_query($conn,"select * from student LEFT JOIN class ON class.class_id = student.class_id where student_id = '$get_id'")or die(mysqli_error());
							$row = mysqli_fetch_array($query);
							?>
                <form method="post">
                  <div class="form-group">
                  <select  name="cys" class="form-control" required>
                    <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
											<?php
											$cys_query = mysqli_query($conn,"select * from class order by class_name");
											while($cys_row = mysqli_fetch_array($cys_query)){
											
											?>
											<option value="<?php echo $cys_row['class_id']; ?>"><?php echo $cys_row['class_name']; ?></option>
											<?php } ?>
                    </select>
                  </div>
                    <div class="form-group">
                      <input class="form-control" value="<?php echo $row['username']; ?>" name="un" type="text" placeholder = "Id Number" required>
                    </div>
                    <div class="form-group">
                      <input class="form-control" value="<?php echo $row['firstname']; ?>" name="fn" type="text" placeholder = "FirstName" required>
                    </div>
                    <div class="form-group">
                      <input class="form-control" value="<?php echo $row['lastname']; ?>" name="ln" type="text" placeholder = "LastName" required>
                    </div>
                    <div class="form-group text-center">
                    <button name="update" id="update" class="btn btn-success btn-block" ><i class="fas fa-plus"></i></button>
                    </div>
                </form>
            </div>
        </div>

	      <?php
                            if (isset($_POST['update'])) {
                               
                                $un = $_POST['un'];
                                $fn = $_POST['fn'];
                                $ln = $_POST['ln'];
                                $cys = $_POST['cys'];
                      

								mysqli_query($conn,"update student set username = '$un' , firstname ='$fn' , lastname = '$ln' , class_id = '$cys' where student_id = '$get_id' ")or die(mysqli_error());

								?>
 
								<script>
								window.location = "students.php"; 
								</script>

                       <?php     }  ?>
	