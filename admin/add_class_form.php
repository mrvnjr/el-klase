
        <div class="card easion-card">
            <div class="card-header">
                <div class="easion-card-title"> Add Class Teachers</div>
            </div>
            <div class="card-body ">
                <form method="post" id="add_class">
                    <div class="form-group">
                    <label>Teacher Name:</label>
                        <select name="session_id" class="form-control" required>
                         	<option></option>
								<?php
                                    $query = mysqli_query($conn,"select * from teacher");
                                    while($row = mysqli_fetch_array($query)){
                                    ?>
                                    <option value="<?php echo $row['teacher_id']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></option>
                                <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                    <label>Class Name:</label>
                            <select name="class_id"  class="form-control" required>
                                <option></option>
                                <?php
                                    $query = mysqli_query($conn,"select * from class order by class_name");
                                    while($row = mysqli_fetch_array($query)){
                                ?>
                                <option value="<?php echo $row['class_id']; ?>"><?php echo $row['class_name']; ?></option>
                                <?php } ?>
                            </select>
                    </div>
                    <div class="form-group">
						<label>Subject:</label>
                        <select name="subject_id"  class="form-control" required>
                            <option></option>
                            <?php
                            $query = mysqli_query($conn,"select * from subject order by subject_code");
                            while($row = mysqli_fetch_array($query)){
                            
                            ?>
                            <option value="<?php echo $row['subject_id']; ?>"><?php echo $row['subject_code']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
						<label>School Year:</label>
                        <?php
                            $query = mysqli_query($conn,"select * from school_year order by school_year DESC");
                            $row = mysqli_fetch_array($query);
                        ?>
                        <input id="" class="col-5 form-control" type="text" class="" name="school_year" value="<?php  echo $row['school_year']; ?>" >
                                         
                    </div>
                    <div class="form-group">
                        <button name="save" class="btn btn-success form-control"><i class="icon-save"></i> Save</button>
                    </div>
                </form>
                <script>
                    jQuery(document).ready(function($){
                        $("#add_class").submit(function(e){
                            e.preventDefault();
                            var _this = $(e.target);
                            var formData = $(this).serialize();
                            $.ajax({
                                type: "POST",   
                                url: "add_class_action.php",
                                data: formData,
                                success: function(html){
                                if(html=="true")
                                {
                                $.jGrowl("Class Already Exist", { header: 'Add Class Failed' });
                                }else{
                                    $.jGrowl("Classs Successfully  Added", { header: 'Class Added' });
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
	