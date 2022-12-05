<!-- Modal -->
<div id="modal-<?php echo $id; ?>" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="myModalLabel" class="modal-title">Remove Student?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
	  	<div class="alert alert-danger">
        	<p>Are you sure you want to Remove this student on your class?</p>
		</div>
	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button name="remove" id="<?php echo $id; ?>" data-dismiss="modal" class="btn btn-danger">Yes</button>
      </div>
    </div>
  </div>
</div>