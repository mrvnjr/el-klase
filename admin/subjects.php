<?php include('header.php');?>
<?php  include('session.php'); ?>
<body>
<div class="dash">  
    <?php include('subject_sidebar.php'); ?>      
    <div class="dash-app">
			<header class="dash-toolbar ">
                <!-- <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a> -->
                <?php include('navbar.php');?>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
					<h1>Subjects</h1>
						<div class="text-right">
							<a href="add_subject.php" class="btn btn-success"><i class="icon-plus-sign icon-large"></i> Add Subject</a>
						</div>
                    <div class="row">
					
                        <div class="col-lg-12" id="">
							
								<!--card-->
                            <div id="block_bg" class="card easion-card mt-3">
                                <div class="card-header">
                                    <div class="easion-card-title">Subject List</div>
                                </div>
                                    <div class="card-body">
                                        <div class="">
                                        <form action="delete_subject.php" method="post">
											<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
											<a data-toggle="modal" href="#subject_delete" id="delete"  class="btn btn-danger mb-3" name=""><i class="fas fa-trash-alt"></i></a>
											<?php include('modal_delete.php'); ?>
												<thead class>
												<tr>
														<th></th>
														<th>Subject Code</th>
														<th>Subject Title</th>
														<th></th>
												</tr>
												</thead>
												<tbody>
													
														<?php
													$subject_query = mysqli_query($conn,"select * from subject")or die(mysqli_error());
													while($row = mysqli_fetch_array($subject_query)){
													$id = $row['subject_id'];
													?>
												
													<tr>
															<td width="30">
															<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
															</td>
															<td><?php echo $row['subject_code']; ?></td>
															<td><?php echo $row['subject_title']; ?></td>
														
															<td width="30"><a href="edit_subject.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="fas fa-edit"></i> </a></td>
												</tr>
													
													<?php } ?>   
									
												</tbody>
											</table>
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
