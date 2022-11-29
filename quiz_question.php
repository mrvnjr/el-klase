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
                    <div class="row">
                        <div class="col-lg-12" id=" ">
							<div class="col-12">
								<div class="card">
									<div class="card-body">
										<div class="float-right">
											<a href="teacher_quiz.php" class="btn btn-success mb-2"><i class="fas fa-arrow-left"></i> Back</a>
											<a href="add_question.php<?php echo '?id='.$get_id; ?>" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Add Question</a>
										</div>
										<form action="delete_quiz_question.php" method="post">
											<input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
												<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
													<a data-toggle="modal" href="#backup_delete" id="delete"  class="btn btn-danger mb-3" name=""><i class="fas fa-trash-alt fa-large"></i></a>
													<?php include('modal_delete_quiz_question.php'); ?>
													<thead>
														<tr>
															<th></th>
															<th>Question Text</th>
															<!-- <th>Points</th> -->
															<th>Question Type</th>
															<th>Answer</th>
															<th>Date Added</th>
															<th></th>
														</tr>
													</thead>
													<tbody>
													<?php
														$query = mysqli_query($conn,"select * FROM quiz_question
														LEFT JOIN question_type on quiz_question.question_type_id = question_type.question_type_id
														where quiz_id = '$get_id'  order by date_added DESC ")or die(mysqli_error());
														while($row = mysqli_fetch_array($query)){
														$id  = $row['quiz_question_id'];
													?>                              
													<tr id="del<?php echo $id; ?>">
													<td width="30">
														<input id="optionsCheckbox" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
													</td>
														<td><?php echo $row['question_text']; ?></td>
														<td><?php  echo $row['question_type']; ?></td>
														<td><?php  echo $row['answer']; ?></td>
														<td><?php echo $row['date_added']; ?></td>                                                                          
														<td width="30"><a href="edit_question.php<?php echo '?id='.$get_id; ?>&<?php echo 'quiz_question_id='.$id; ?>" class="btn btn-success"><i class="fas fa-pen"></i></a></td>                                      
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
                </div>
            </main> 	
    </div>
</div>
<?php include('scripts.php'); ?>
</body>
