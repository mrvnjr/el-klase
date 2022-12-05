<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<body>
<div class="dash">  
	<?php include('downloadable_link.php'); ?>    
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
                                	<div id="downloadable_table.php" class="col-12">
										<div class="float-right">
											Check All <input type="checkbox"  name="selectAll" id="checkAll" />
												<script>
												$("#checkAll").click(function () {
													$('input:checkbox').not(this).prop('checked', this.checked);
												});
												</script>					
										</div>
										<?php
											$query = mysqli_query($conn,"select * FROM files where class_id = '$get_id'  order by fdatein DESC ")or die(mysqli_error());
											$count = mysqli_fetch_array($query);
											if ($count == '0'){ ?>
												<div class="alert alert-primary"><i class="icon-info-sign"></i> Currently you did not upload any downloadable materials</div>
										<?php	}else{?>   
											<form action="copy_file.php" method="post">
												<a data-toggle="modal" href="#user_delete" id="delete"  class="btn btn-info" name=""><i class="fas fa-copy"></i> Copy Check item</a>
													<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
														<?php include('move_to_school_year.php'); ?>
														
														<thead>
															<tr>
																<th>Date Upload</th>
																<th>File Name</th>
																<th>Description</th>
																<th>Uploaded by</th>
																<th></th>
																<th></th>
															</tr>		
														</thead>
														<tbody>
															<?php
																$query = mysqli_query($conn,"select * FROM files where class_id = '$get_id'  order by fdatein DESC ")or die(mysqli_error());
																while($row = mysqli_fetch_array($query)){
																$id  = $row['file_id'];?>                              
																<tr id="del<?php echo $id; ?>">
																	<td><?php echo $row['fdatein']; ?></td>
																	<td><?php  echo $row['fname']; ?></td>
																	<td><?php echo $row['fdesc']; ?></td>                                      
																	<td><?php echo $row['uploaded_by']; ?></td>                                      
																	<td width="40">
																	<a  data-placement="bottom" title="Download" id="<?php echo $id; ?>download" href="<?php echo $row['floc']; ?>"><i class="fas fa-download fa-large"></i></a>
																	<a  data-placement="bottom" title="Remove" id="<?php echo $id; ?>remove" href="#modal-<?php echo $id; ?>" data-toggle="modal"><i class="far fa-trash-alt fa-large"></i></a>
																	<?php include('delete_download_modal.php'); ?>
																	</td>                                      
																	<td width="30">
																		<input id="" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
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
																</tr>
															<?php } ?>					
														</tbody>
													</table>
											</form>
										<?php } ?>
									</div>
								</div>
                        	</div>
						</div>
						<script type="text/javascript">
							$(document).ready( function() {

								
								$('.remove').click( function() {
								
								var id = $(this).attr("id");
									$.ajax({
									type: "POST",
									url: "delete_file.php",
									data: ({id: id}),
									cache: false,
									success: function(html){
									$("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
									$('#'+id).modal('hide');
									$.jGrowl("Your Post is Successfully Deleted", { header: 'Data Delete' });
								
									}
									}); 
									
									return false;
								});				
							});
						</script>
						
                       	<div class="col-lg-4" id="">
						   <?php include('downloadable_sidebar.php') ?>
						</div>                                  
                    </div>
                </div>
            </main> 	
    </div>
</div>
<?php include('scripts.php'); ?>
</body>

</html>