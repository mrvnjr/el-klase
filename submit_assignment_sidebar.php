<div class="card easion-card">
    <div class="card-header">
        <div class="easion-card-title">Add downloadable</div>
    </div>
    <div class="card-body ">
        <form id="add_assignment"   method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label class="" for="inputEmail">File</label>								
                    <input name="uploaded_file"  class="form-control-file uniform_on" id="fileInput" type="file" required>
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                    <input type="hidden" name="id" value="<?php echo $post_id; ?>"/>
                    <input type="hidden" name="get_id" value="<?php echo $get_id; ?>"/>        
            </div>
            <div class="form-group">
                <input type="text" name="name" Placeholder="File Name"  class="input form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="desc" Placeholder="Description"  class="input form-control" required>
            </div>
            <div class="form-group">
                <button name="Upload" type="submit" value="Upload" class="btn btn-success"><i class="icon-upload-alt"></i>&nbsp;Upload</button>
            </div>
        </form>
    </div>
    <script>
			jQuery(document).ready(function($){
				$("#add_assignment").submit(function(e){
					e.preventDefault();
					var _this = $(e.target);
					var formData = new FormData($(this)[0]);
					$.ajax({
						type: "POST",
						url: "upload_assignment.php",
						data: formData,
						success: function(html){
							$.jGrowl("Student Successfully  Added", { header: 'Student Added' });
							window.location = 'submit_assignment.php<?php echo '?id='.$get_id.'&'.'post_id='.$post_id; ?>';
						},
						cache: false,
						contentType: false,
						processData: false
					});
				});
			});
			</script>		
</div>
