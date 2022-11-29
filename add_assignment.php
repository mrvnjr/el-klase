<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<body id="class_div">
<div class="dash">  
	<?php include('teacher_add_assignment_sidebar.php'); ?>    
    <div class="dash-app">
            <header class="dash-toolbar ">
                <?php include('navbar_teacher.php'); ?>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
				    <h1>Add Assignment</h1>
                    <div class=" row">
                    <?php
                        $school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
                        $school_year_query_row = mysqli_fetch_array($school_year_query);
                        $school_year = $school_year_query_row['school_year'];
                        ?>
                        <div class="col-lg-4" id=" ">
                            <div class="card">
                                <div class="card-body">
                                    <form class="" id="add_downloadble" method="post" enctype="multipart/form-data" name="upload" >
                                        <div class="form-group">
                                            <label class="control-label" for="inputEmail">File:</label>
                                                <input name="uploaded_file"  class="input-file form-control-file uniform_on" id="fileInput" type="file" required>
                                                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                                                <input type="hidden" name="id" value="<?php echo $session_id ?>"/>        
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="name" Placeholder="File Name"  class="input form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea id="assigntextare" placeholder="Description" name="desc" class="form-control" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button name="Upload" type="submit" value="Upload" class="btn btn-success" /><i class="fas fa-file-upload"></i>&nbsp;Upload</button>
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
                                                        url: "add_assignment_save.php",
                                                        data: formData,
                                                        success: function(html){
                                                            $.jGrowl("Assignment Successfully Added", { header: 'Assignment Added' });
                                                            window.location = 'add_assignment.php';
                                                        },
                                                        cache: false,
                                                        contentType: false,
                                                        processData: false
                                                    });
                                                });
                                            });
                                        </script>	
                                    </div>
                                </div>
                            </div>
                       	<div class="col-lg-8" id="">
                            <div class="card">
                                <div class="card-body">
                                <div class="alert alert-primary">Check The Class you want to put this file.</div>
                                    
                                    <div class="float-left">
                                        Check All <input type="checkbox"  name="selectAll" id="checkAll" />
                                        <script>
                                            $("#checkAll").click(function () {
                                                $('input:checkbox').not(this).prop('checked', this.checked);
                                            });
                                        </script>	
                                    </div>
                                <table cellpadding="0" cellspacing="0" border="0" class="table" id="">

                                    <thead>
                                            <tr>
                                            <th></th>
                                            <th>Class Name</th>
                                            <th>Subject Code</th>
                                            </tr>
                                            
                                    </thead>
                                    <tbody>
                                                    
                                        <?php $query = mysqli_query($conn,"select * from teacher_class
                                                LEFT JOIN class ON class.class_id = teacher_class.class_id
                                                LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                                                where teacher_id = '$session_id' and school_year = '$school_year' ")or die(mysqli_error());
                                                $count = mysqli_num_rows($query);
                                                
                                            
                                                while($row = mysqli_fetch_array($query)){
                                                $id = $row['teacher_class_id'];
                        
                                            ?>                             
                                            <tr id="del<?php echo $id; ?>">
                                                <td width="30">
                                                    <input id="" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                </td>
                                                <td><?php echo $row['class_name']; ?></td>
                                                <td><?php echo $row['subject_code']; ?></td>                                                                   
                                            </tr>
                
                                        <?php } ?>
                                    </tbody>
                                </table>
						            </form>		
                                </div>
                            </div>
	                    </div>                                  
                    </div>
                </div>
            </main> 	
    </div>
</div>
<?php include('scripts.php'); ?>
</body>

