<?php include('header_dashboard.php'); ?>
<!-- <?php include('session.php'); ?> -->
<?php $get_id = $_GET['id']; ?>
<body>
<div class="dash">  
    <?php include('assignment_link_student.php'); ?>
    <div class="dash-app">
        <header class="dash-toolbar ">
            <?php include('navbar_student.php'); ?>    
            <!-- <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a> -->
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <h1>My Assignment</h1>
                    <div class="row">
                        <div class="col-lg-12" id=" ">
						<div class="card">
                            <div class="card-header">
                                <?php $query = mysqli_query($conn,"select * FROM assignment where class_id = '$get_id'  order by fdatein DESC")or die(mysqli_error()); 
									  $count  = mysqli_num_rows($query);
								?>
                                <div id="" class="muted float-right"><span class="badge badge-info"><?php echo $count; ?></span></div>
                            </div>
								<div class="card-body">
                                    <?php
                                        $query = mysqli_query($conn,"select * FROM assignment where class_id = '$get_id'  order by fdatein DESC")or die(mysqli_error());
                                        $count = mysqli_num_rows($query);
                                        if ($count == '0'){?>
                                        <div class="alert alert-info">No Assignment Currently Uploaded</div>
                                        <?php
                                        }else{
                                    ?>
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
                                                $query = mysqli_query($conn,"select * FROM assignment where class_id = '$get_id'  order by fdatein DESC")or die(mysqli_error());
                                                while($row = mysqli_fetch_array($query)){
                                                $id  = $row['assignment_id'];
                                                $floc = $row['floc'];
                                            ?>                              
										<tr>
										    <td><?php echo $row['fdatein']; ?></td>
                                            <td><?php  echo $row['fname']; ?></td>
                                            <td><?php echo $row['fdesc']; ?></td>                                      
                                            <td width="220">
										        <form id="assign" method="post" action="submit_assignment.php<?php echo '?id='.$get_id ?>&<?php echo 'post_id='.$id ?>">
										            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                    <?php
                                                        if ($floc == ""){
                                                        }else{
                                                    ?>
										  <a data-placement="bottom" title="Download" id="<?php echo $id; ?>download"  class="btn btn-primary" href="<?php echo $row['floc']; ?>"><i class="fas fa-download"></i></a>
										<?php } ?>
										 <button  data-placement="bottom" title="Submit Assignment" id="<?php echo $id; ?>submit" class="btn btn-success" name="btn_assign"><i class="fas fa-file-upload"></i> Submit Assignment</button>
										 </form>
										 </td>                                      
														<script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>submit').tooltip('show');
															$('#<?php echo $id; ?>submit').tooltip('hide');
														});
														</script>
                             							<script type="text/javascript">
														$(document).ready(function(){
															$('#<?php echo $id; ?>download').tooltip('show');
															$('#<?php echo $id; ?>download').tooltip('hide');
														});
														</script>

                               
                                </tr>
                         
						 <?php } ?>
						   
                              
										</tbody>
									</table>
						 <?php } ?>
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

<!-- ________________ -->


