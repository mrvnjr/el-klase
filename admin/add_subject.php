<?php include('header.php');?>
<body>
<div class="dash">  
    <?php include('subject_sidebar.php'); ?>      
    <div class="dash-app">
            <header class="dash-toolbar">
                <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>

            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <div class="row">
                       <div class="col-lg-12	" id="">
                            <!--card-->
                            <div id="block_bg" class="card easion-card">
                                <div class="card-header">
                                    <div class="easion-card-title">Add Subject</div>
                                </div>
                                    <div class="card-body">
                                        <div class="">
                                        <a href="subjects.php"><i class="fas fa-arrow-left"></i> Back</a>
									    <form method="post">
											<div class="form-group mt-3">
												<label for="inputEmail">Subject Code</label>
												<input type="text" class="form-control"name="subject_code" id="inputEmail" placeholder="Subject Code">
											</div>
											<div class="form-group">
												<label class="control-label" for="inputPassword">Subject Title</label>
													<input type="text" class="form-control" name="title" id="inputPassword" placeholder="Subject Title" required>
											</div>
											<div class="form-group">
												<label class="control-label" for="inputPassword">Description</label>
													<textarea name="description" class="form-control"></textarea>
											</div>
											<div class="form-group">
												<button name="save" type="submit" class="btn btn-success"><i class="icon-save"></i> Save</button>
											</div>
											</form>
                                        </div>
                                    </div>
                            </div>
                           <!--card-->
                        </div>                                  
                    </div>
                </div>
            </main>
    </div>
</div>
<?php include('scripts.php'); ?>
</body>
					
										<?php
										if (isset($_POST['save'])){
										$subject_code = $_POST['subject_code'];
										$title = $_POST['title'];
										$description = $_POST['description'];
										
										
										
										$query = mysqli_query($conn,"select * from subject where subject_code = '$subject_code' and subject_title= '$title'")or die(mysqli_error());
										$count = mysqli_num_rows($query);

										if ($count > 0){ ?>
										<script>
										alert('Data Already Exist');
										</script>
										<?php
										}else{
										mysqli_query($conn,"insert into subject (subject_code,subject_title,description) values('$subject_code','$title','$description')")or die(mysqli_error());
										
										?>
										<script>
										window.location = "subjects.php";
										</script>
										<?php
										}
										}
										
										?>
									
								
		                            </div>
		                        </div>
		                        <!-- /block -->
		                    </div>
		                </div>
            </div>
	
        </div>
		<?php include('scripts.php'); ?>
    </body>

</html>