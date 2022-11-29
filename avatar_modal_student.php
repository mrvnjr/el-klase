				<!-- user delete modal -->
				<div id="myModal_student" class="modal fade" tabindex="-1" aria-labelledby="dropdownMenu1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="myModalLabel" class="modal-title">Change Avatar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
      <form method="post" action="student_avatar.php" enctype="multipart/form-data">
        <center>	
          <div class="form-group">          
            <input name="image" class="form-control-file" id="fileInput" type="file" required>
          </div>
        </center>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-info" name="change"><i class="icon-save icon-large"></i> Save</button>
			</form>
      </div>
    </div>
  </div>
</div>			