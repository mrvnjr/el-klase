<div id="<?php echo $id; ?>" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="myModalLabel" class="modal-title">Delete Assignment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
	  	<div class="alert alert-danger">
        	<p>Are you sure you want to delete this Assignment?</p>
		</div>
	</div>
      <div class="modal-footer">
	  	<form method="post" action="delete_assignment.php">
		  	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<input type="hidden" name="get_id" value="<?php echo $get_id; ?>">        
			<button id="<?php echo $id; ?>" class="btn btn-danger remove" name="change">Yes</button>
		</form>
      </div>
    </div>
  </div>
</div>	