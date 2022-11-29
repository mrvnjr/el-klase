<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<body>
<div class="dash">  
	<?php include('class_sidebar.php'); ?>    
    <div class="dash-app">
            <header class="dash-toolbar ">
                <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12" id=" ">
							<div class="float-right">
								<a id="print" onclick="window.print()"  class="btn btn-success"><i class="icon-print"></i> Print Student List</a>
							</div>
							<?php include('my_students_breadcrums.php'); ?>
							<div class="card">
								<div class="card-header">
									<!-- <div id="" class="muted pull-right">
		
									</div> -->
									
								</div>
								<div class="card-body">
									<div class=col-12>
										<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
											<thead>
												<tr>
													<th>Firstname</th>
													<th>Lastname</th>
												</tr>
											</thead>
											<tbody>
									
												<?php
													$my_student = mysqli_query($conn,"SELECT * FROM teacher_class_student
													LEFT JOIN student ON student.student_id = teacher_class_student.student_id 
													INNER JOIN class ON class.class_id = student.class_id where teacher_class_id = '$get_id' order by lastname ")or die(mysqli_error());
													while($row = mysqli_fetch_array($my_student)){
													$id = $row['teacher_class_student_id'];
												?>                          
													<tr id="del<?php echo $id; ?>">
							
													<td><?php echo $row['firstname']; ?></td>
													<td><?php  echo $row['lastname']; ?></td>
												</tr>
				
												<?php } ?>
				
					
											</tbody>
										</table>
									</div>
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
