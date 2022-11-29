<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<body>
<div class="dash">  
	<?php include('assignment_link.php'); ?>    
    <div class="dash-app">
            <header class="dash-toolbar ">
			<?php include('navbar_teacher.php'); ?>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8" id=" ">
							<div class="card">
								<div class="card-body">
								<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
										<thead>
										        <tr>
												<th>Date Upload</th>
												<th>File Name</th>
												<th>Description</th>
												<th></th>
												</tr>
										</thead>
										<tbody>
											
                              		<?php
										$query = mysqli_query($conn,"select * FROM assignment where class_id = '$get_id' and teacher_id = '$session_id' order by fdatein DESC ")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
										$id  = $row['assignment_id'];
										$floc  = $row['floc'];
									?>                              
								<tr>
										 <td><?php echo $row['fdatein']; ?></td>
                                         <td><?php  echo $row['fname']; ?></td>
                                         <td><?php echo $row['fdesc']; ?></td>                                      
                                         <td width="170">
										<form method="post" action="view_submit_assignment.php<?php echo '?id='.$get_id ?>&<?php echo 'post_id='.$id ?>">
										
										 <button data-placement="bottom" title="View Student who submit Assignment" id="<?php echo $id; ?>view" class="btn btn-success float-left"><i class="fas fa-folder-open icon-large"></i></button>

										</form>
										<?php 
										if ($floc == ""){
										}else{
										?>
											<a data-placement="bottom" title="Download" id="<?php echo $id; ?>download"  class="btn btn-info  float-left" href="<?php echo $row['floc']; ?>"><i class="fas fa-file-download icon-large"></i></a>
										<?php } ?>
											<button data-placement="bottom" title="Remove" id="<?php echo $id; ?>remove"  class="btn btn-danger float-right"  data-target="#<?php echo $id; ?>" data-toggle="modal"><i class="fas fa-window-close icon-large"></i></button>
											<?php include('delete_assigment_modal.php'); ?>									
									</td>                                      
														<script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>download').tooltip('show');
															$('#<?php echo $id; ?>download').tooltip('hide');
														});
														</script>
														<script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>remove').tooltip('show');
															$('#<?php echo $id; ?>remove').tooltip('hide');
														});
														</script>
														<script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>view').tooltip('show');
															$('#<?php echo $id; ?>view').tooltip('hide');
														});
														</script>
										</tr>
								<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
                        </div>
                       	<div class="col-lg-4" id="">
							<?php include('assignment_sidebar.php') ?>
						</div>                                  
                    </div>
                </div>
            </main> 	
    </div>
</div>
<?php include('scripts.php'); ?>
</body>
</html>