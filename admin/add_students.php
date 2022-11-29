 <!--add teacher user-->
<div class="card easion-card">
            <div class="card-header">
                <div class="easion-card-title"> Add Students</div>
            </div>
            <div class="card-body ">
                <form id="add_student" method="post">
                    <div class="form-group">
						<select name="class_id" class="form-control" required>
						<option></option>
							<?php
								$cys_query = mysqli_query($conn,"select * from class order by class_name");
								while($cys_row = mysqli_fetch_array($cys_query)){
							
							?>
							<option value="<?php echo $cys_row['class_id']; ?>"><?php echo $cys_row['class_name']; ?></option>
							<?php } ?>
							</select>
					</div>
                    <div class="form-group">
                      <input class="form-control" name="un" type="text" placeholder = "Id Number" required>
                    </div>
                    <div class="form-group">
                      <input class="form-control" name="fn" type="text" placeholder = "First Name" required>
                    </div>
                    <div class="form-group">
                      <input class="form-control" name="ln" type="text" placeholder = "Last Name" required>
                    </div>
                    <div class="form-group text-center">
                    	<button name="save" id="save" class="btn btn-success btn-block" ><i class="fas fa-plus"></i></button>
                    </div>
                </form>
            </div>
        </div>
					
			<script type='text/javascript'>
				jQuery(document).ready(function($){
					$("#add_student").submit(function(e){
						e.preventDefault();
						var _this = $(e.target);
						var formData = $(this).serialize();
						$.ajax({
							type: "POST",
							url: "save_student.php",
							data: formData,
							success: function(html){
								$.jGrowl("Student Successfully  Added", { header: 'Student Added' });
								$('#studentTableDiv').load('student_table.php', function(response){
									$('#studentTableDiv').html(response);
									$('#example').DataTable({
               						 lengthMenu: [[5,10,25,50, -1], [5,10,25,50, "All"]],
                
           							 });
									$(_this).find(":input").val('');
									$(_this).find('select option').attr('selected',true);
									$(_this).find('select option:first').attr('selected',true);
								});
							}
						});
					});
				});
			</script>		
