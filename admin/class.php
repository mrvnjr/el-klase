<?php include('header.php');?>
<?php  include('session.php'); ?>
<body>
<div class="dash">  
    <?php include('section_sidebar.php'); ?>      
    <div class="dash-app">
        <header class="dash-toolbar ">
                <!-- <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a> -->
            <?php include('navbar.php');?>
        </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <h1>Section</h1>
                    <div class="row">
                        <div class="col-lg-4" id="adduser">
                            <?php include('add_class.php'); ?>
                        </div>
                       <div class="col-lg-8" id="">
                            <!--card-->
                            <div id="block_bg" class="card easion-card">
                                <div class="card-header">
                                    <div class="easion-card-title">Admin Users List</div>
                                </div>
                                    <div class="card-body">
                                        <div class="">
                                        <form action="delete_class.php" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
										<a data-toggle="modal" href="#class_delete" id="delete"  class="btn btn-danger" name=""><i class="fas fa-trash-alt"></i></a>
													<?php include('modal_delete.php'); ?>
									<thead>
										  <tr>
													<th></th>
													<th>Grade Level</th>
                                                    <th>Section</th>
													<th></th>
										   </tr>
										</thead>
										<tbody>
										<?php
										$class_query = mysqli_query($conn,"select * from class")or die(mysqli_error());
										while($class_row = mysqli_fetch_array($class_query)){
										$id = $class_row['class_id'];
										?>
												
										<tr>
											<td width="30">
											<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											</td>
											<td><?php echo $class_row['grade_level']; ?></td>
                                            <td><?php echo $class_row['class_name']; ?></td>
											<td width="40"><a href="edit_class.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="fas fa-edit"></i> </a></td>
                                     
                               
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
