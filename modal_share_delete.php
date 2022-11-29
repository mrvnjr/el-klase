				<!-- user delete modal -->
<div id="backup_delete" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="myModalLabel" class="modal-title">Copy File?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
	  	<div class="form-group">
		  	<div class="form-group">
                <p>Move To:</p>		 
				<div class="form-group">
                    <select name="teacher_class_id"  class="form-control" required>
                        <option></option>
							<?php $query = mysqli_query($conn,"select * from teacher_class
								LEFT JOIN class ON class.class_id = teacher_class.class_id
								LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
								where teacher_id = '$session_id' and school_year = '$school_year' ")or die(mysqli_error());	
								while($row = mysqli_fetch_array($query)){
								$id = $row['teacher_class_id'];
							?>						
						<option value="<?php echo $row['teacher_class_id']; ?>">

							<?php echo $row['class_name']; ?> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['subject_code']; ?></option>
									
							<?php } ?>
										
                    </select>
																	
									<div class="form-group m-2">
										<button name="share" class="btn btn-success form-control"><i class="icon-copy"></i> Share</button>
									</div>
										
                    
                </div>
            </div>
		</div>
	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>	
