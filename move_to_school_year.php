				<!-- user delete modal -->
						
<div id="user_delete" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="myModalLabel" class="modal-title">Copy File?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
		<center>
			<div class="form-group">
				<label>To what class School Year:</label>
				<div >
					<input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
					<select name="school_year"  class="form-control">
						<option></option>
							<?php
							$query1 = mysqli_query($conn,"select * from teacher_class where class_id ='$class_id' and school_year != '$school_year'")or die(mysqli_error());
							while($row = mysqli_fetch_array($query1)){
							
							?>
						<option><?php echo $row['school_year']; ?></option>
							<input type="hidden" name="teacher_class_id" value="<?php echo $row['teacher_class_id']; ?>">
							<?php } ?>
					</select>
				</div>
			</div>
			<div class="">
				<div class="">
					<button name="delete_user" class="btn btn-danger"><i class="icon-copy"></i> Copy</button>
				</div>
			</div>
		</center>
		<!-- <center>
			<div class="">
				<label>------------Or----------</label>
				<div class="">
					<div class="">
						<button name="copy" class="btn btn-info"><i class="icon-copy"></i> Copy to Backpack</button>
					</div>
				</div>
			</div>
		</center> -->
		<center>
			<div class="">
				<label>------------Or----------</label>
				<div class="">
					<div class="">
						<p>Share To:</p>
						<div class="	">
							<!-- <label>To:</label> -->
							<div >
								<select name="teacher_id1"  class="form-control" required>
									<option></option>
										<?php
											$query = mysqli_query($conn,"select * from teacher order by firstname");
											while($row = mysqli_fetch_array($query)){						
										?>
									<option value="<?php echo $row['teacher_id']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?> </option>
										<?php } ?>
								</select>
							</div>
						</div>
						<button name="share" class="btn btn-success mt-2"><i class="icon-copy"></i> Share</button>
					</div>
				</div>
			</div>
		</center>
	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>	
					