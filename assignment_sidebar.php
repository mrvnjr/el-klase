
<div class="card easion-card">
    <div class="card-header">
        <div class="easion-card-title"> Add Assigment</div>
    </div>
    <div class="card-body ">
    <form class="" action="assign_save.php<?php echo '?id='.$get_id; ?>" method="post" enctype="multipart/form-data" name="upload" >
        <div class="form-group">
            <label for="inputEmail">File</label>
            <div class="controls">

                    
                <input name="uploaded_file"  class="input-file form-control-file uniform_on" id="fileInput" type="file" >
            
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                <input type="hidden" name="id" value="<?php echo $session_id ?>"/>
                <input type="hidden" name="id_class" value="<?php echo $get_id; ?>">
            </div>
        </div>
        <div class="form-group">
            <input type="text" name="name" Placeholder="File Name"  class="input form-control">
        </div>
        <div class="form-group">
            <textarea id="assigntextare" placeholder="Description" name="desc" class="form-control" required></textarea>
                <!--   <input type="text" name="desc" Placeholder="Description"  class="input" required> -->
        </div>
        <div class="form-group">
            <button name="Upload" type="submit" value="Upload" class="btn btn-success form-control" /><i class="fas fa-upload"></i>&nbsp;Upload</button>

        </div>
    </form>
    </div>
</div>