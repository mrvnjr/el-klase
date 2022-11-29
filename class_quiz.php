<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<body>
<div class="dash">  
	<?php include('quiz_link.php'); ?>    
    <div class="dash-app">
            <header class="dash-toolbar ">
				<?php include('navbar_teacher.php');?>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
				<h1>Quiz</h1>
                    <div class="row">
                        <div class="col-lg-12" id=" ">
							<div class="card">
								<div class="card-body">
								<form action="delete_class_quiz.php<?php echo '?id='.$get_id; ?>" method="post">
  									<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
									<a data-toggle="modal" href="#backup_delete" id="delete"  class="btn btn-danger mb-1" name=""><i class="fas fa-trash-alt"></i></a>
									<?php include('modal_delete_class_quiz.php'); ?>
										<thead>
										        <tr>
												<th></th>
												<th>Quiz title</th>
												<th>Description</th>
												<th>QUIZ TIME (IN MINUTES)</th>
												<th>Quiz Type</th>
												</tr>
										</thead>
										<tbody>
                              		<?php
										$query = mysqli_query($conn,"select * FROM class_quiz 
										LEFT JOIN quiz ON quiz.quiz_id  = class_quiz.quiz_id
										where teacher_class_id = '$get_id' 
										order by date_added DESC ")or die(mysqli_error());
										while($row = mysqli_fetch_array($query)){
										$id  = $row['class_quiz_id'];
									?>                              
										<tr id="del<?php echo $id; ?>">
										<td width="30">
											<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
										</td>
										 <td><?php echo $row['quiz_title']; ?></td>
                                         <td><?php  echo $row['quiz_description']; ?></td>
                                         <td><?php  echo $row['quiz_time'] / 60; ?></td>
                                         <td><?php echo $row['date_added']; ?></td>                                      
                                      
                                                                      
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
</html>