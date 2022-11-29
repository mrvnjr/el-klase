
        <div class="card easion-card">
            <div class="card-header">
                <div class="easion-card-title"> Add Class Teachers</div>
            </div>
            <div class="card-body ">
                <?php
                                $school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
                                $school_year_query_row = mysqli_fetch_array($school_year_query);
                                $school_year = $school_year_query_row['school_year'];
                            ?>
           
            <?php $teacher_query = mysqli_query($conn,"select * from teacher_class
                LEFT JOIN class ON class.class_id = teacher_class.class_id
                LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                LEFT JOIN teacher ON teacher.teacher_id = teacher_class.teacher_id
                where school_year = '$school_year' and teacher_class_id = '$get_id'")
                or die(mysqli_error());
                $row = mysqli_fetch_array($teacher_query)
            ?>
                <form method="post" id="edit_class">
                    <div class="form-group">
                    <label>Teacher Name:</label>
                        <input type="hidden" name="teacher_class_id" value="<?php  echo $get_id; ?>" >
                  
                        <select name="session_id" class="form-control" required>
                        <option value="<?php echo $row['teacher_id']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></option>

								<?php
                                    $t_query = mysqli_query($conn,"select * from teacher");
                                    while($t_row = mysqli_fetch_array($t_query)){
                                    ?>
                                    <option value="<?php echo $t_row['teacher_id']; ?>"><?php echo $t_row['firstname']; ?> <?php echo $row['lastname']; ?></option>
                                <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                    <label>Class Name:</label>
							<input type="hidden" name="teacher_class_id" value="<?php echo $get_id; ?>">          
                            <select name="class_id"  class="form-control" required>
                            <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>

                                <?php
                                    $cquery = mysqli_query($conn,"select * from class order by class_name");
                                    while($crow = mysqli_fetch_array($cquery)){
                                ?>
                                <option value="<?php echo $crow['class_id']; ?>"><?php echo $crow['class_name']; ?></option>
                                <?php } ?>
                            </select>
                    </div>
                    <div class="form-group">
						<label>Subject:</label>
                        <select name="subject_id"  class="form-control" required>
                        <option value="<?php echo $row['subject_id']; ?>"><?php echo $row['subject_code']; ?></option>
                            <?php
                            $squery = mysqli_query($conn,"select * from subject order by subject_code");
                            while($srow = mysqli_fetch_array($squery)){
                            
                            ?>
                            <option value="<?php echo $srow['subject_id']; ?>"><?php echo $srow['subject_title']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
						<label>School Year:</label>
                        <?php
                            $syquery = mysqli_query($conn,"select * from school_year order by school_year DESC");
                            $syrow = mysqli_fetch_array($syquery);
                        ?>
                        <input id="" class="col-5 form-control" type="text" class="" name="school_year" value="<?php  echo $syrow['school_year']; ?>" >
                                         
                    </div>
                    <div class="form-group">
                        <button name="update" id="update"class="btn btn-success form-control"><i class="icon-save"></i> Save</button>
                    </div>
                </form>
                <script>
			jQuery(document).ready(function($){
				$("#edit_class").submit(function(e){
					e.preventDefault();
					var _this = $(e.target);
					var formData = $(this).serialize();
					$.ajax({
						type: "POST",
						url: "edit_class_action.php",
						data: formData,
						success: function(html){
						if(html=="true")
						{
						$.jGrowl("Class Already Exist", { header: 'edit Class Failed' });
						}else{
							$.jGrowl("Classs Successfully  Update", { header: 'Class Added' });
							var delay = 500;
							setTimeout(function(){ window.location = 'add_class_teacher.php'  }, delay);  
						}
						}
					});
				});
			});
			</script>		
            </div>
        </div>
        
      