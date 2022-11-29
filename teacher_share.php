<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>

<body>
<div class="dash">  
	<?php include('share_sidebar_teacher.php'); ?>    
    <div class="dash-app">
            <header class="dash-toolbar ">
				<?php include('navbar_teacher.php');?>
            </header>
            <main class="dash-content">
				<div class="container-fluid">
					<h1>Shared Files</h1>
                    <div class="row">
                        <div class="col-lg-12" id=" ">
							<div class="card">
								<div class="card-body">
								<div class="float-right">
												Check All <input type="checkbox"  name="selectAll" id="checkAll" />
												<script>
												$("#checkAll").click(function () {
													$('input:checkbox').not(this).prop('checked', this.checked);
												});
												</script>					
									</div>
									<form action="delete_shared.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
								<a data-toggle="modal" href="#backup_delete" id="delete"  class="btn btn-success mb-2" name=""><i class="fas fa-arrows-alt"></i> Move</a>
									<?php include('modal_share_delete.php');  ?>
										<thead>
										        <tr>
												<th></th>
												<th>Date Upload</th>
												<th>File Name</th>
												<th>Description</th>
												<th>Shared By</th>
												<th></th>
												</tr>
										</thead>
										<tbody>
                              		<?php
										$query = mysqli_query($conn,"select * FROM teacher_shared
										LEFT JOIN teacher on teacher_shared.teacher_id = teacher.teacher_id
										where shared_teacher_id = '$session_id' 
										order by fdatein DESC")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
										$id  = $row['teacher_shared_id'];
									?>                              
										<tr id="del<?php echo $id; ?>">
										<td width="30">
											<input id="" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
										</td>
										 <td><?php echo $row['fdatein']; ?></td>
                                         <td><?php  echo $row['fname']; ?></td>
                                         <td><?php echo $row['fdesc']; ?></td>                                      
                                         <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>                                      
                                         <td width="30"><a href="<?php echo $row['floc']; ?>"><i class="icon-download icon-large"></i></a></td>                                      
										</tr>
									<?php } ?>
										</tbody>
									</table>
									</form>
								</div>
							</div>
                        </div>
                       	<div class="col-lg-4" id="">
						
	</div>                                  
                    </div>
                </div>
            </main> 	
    </div>
</div>
<?php include('scripts.php'); ?>
</body>