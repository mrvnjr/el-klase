<?php include('header.php');?>
<?php $get_id = $_GET['id']; ?>
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
                       <div class="col-lg-12" id="">
                            <!--card-->
                            <div id="block_bg" class="card easion-card">
                                <div class="card-header">
                                    <div class="easion-card-title">Add Subject</div>
                                </div>
                                    <div class="card-body">
                                        <div class="">
                                        <a href="subjects.php"><i class="fas fa-arrow-left"></i> Back</a>
										<?php
											$query = mysqli_query($conn,"select * from subject where subject_id = '$get_id'")or die(mysqli_error());
											$row = mysqli_fetch_array($query);
										?>
									    <form method="post">
											<div class="form-group mt-3">
												<label for="inputEmail">Subject Code</label>
												<input type="text" value="<?php echo $row['subject_code']; ?>" class="form-control"name="subject_code" id="inputEmail" placeholder="Subject Code">
											</div>
											<div class="form-group">
												<label class="control-label" for="inputPassword">Subject Title</label>
													<input type="text" value="<?php echo $row['subject_title']; ?>" class="form-control" name="title" id="inputPassword" placeholder="Subject Title" required>
											</div>
											<div class="form-group">
												<label class="control-label" for="inputPassword">Description</label>
													<textarea name="description" class="form-control"><?php echo $row['description']; ?></textarea>
											</div>
											<div class="form-group">
												<button name="update" type="submit" class="btn btn-success"><i class="icon-save"></i> Update</button>
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
										if (isset($_POST['update'])){
										$subject_code = $_POST['subject_code'];
										$title = $_POST['title'];
										$unit = $_POST['unit'];
										$description = $_POST['description'];
										
										
									
										mysqli_query($conn,"update subject set subject_code = '$subject_code' ,
																		subject_title = '$title',
																		description = '$description'
																		where subject_id = '$get_id' ")or die(mysqli_error());
										
										?>
										<script>
										window.location = "subjects.php";
										</script>
										<?php
										}
										
										
										?>
									
	