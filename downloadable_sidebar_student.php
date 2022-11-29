<div class="card easion-card">
    <div class="card-header">
        <div class="easion-card-title">Add downloadable</div>
    </div>
    <div class="card-body ">
        <form class="" id="add_downloadble" method="post"action="upload_save.php" enctype="multipart/form-data" name="upload" >
            <div class="form-group">
                <label class="form-label" for="inputEmail">File</label>            
                    <input name="uploaded_file"  class=" form-control-file " id="fileInput" type="file" required>
                    <input type="hidden"  name="MAX_FILE_SIZE" value="1000000" />
                    <input type="hidden" name="id" value="<?php echo $session_id ?>"/>
                    <input type="hidden" name="id_class" value="<?php echo $get_id; ?>">
            </div>
            <div class="form-group">
                <input type="text" name="name" Placeholder="File Name"  class="input form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="desc" Placeholder="Description"  class="input form-control" required>    
            </div>
            <div class="form-group">
                <button name="Upload" type="submit" value="Upload" class="btn btn-primary" /><i class="fas fa-file-upload"></i>&nbsp;Upload</button>
            </div>
        </form>
    </div>
    <script>
        jQuery(document).ready(function($){
            $("#add_downloadble").submit(function(e){
                $.jGrowl("Uploading File Please Wait......", { sticky: true });
                e.preventDefault();
                var _this = $(e.target);
                var formData = new FormData($(this)[0]);
                $.ajax({
                    type: "POST",
                    url: "upload_save_student.php",
                    data: formData,
                    success: function(html){
                        $.jGrowl("Student Successfully  Added", { header: 'Student Added' });
                        window.location = 'downloadable_student.php<?php echo '?id='.$get_id; ?>';
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            });
        });
	</script>		
</div>
