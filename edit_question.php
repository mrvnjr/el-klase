<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<?php $quiz_question_id = $_GET['quiz_question_id']; ?>
<body>
<div class="dash">  
	<?php include('quiz_sidebar_teacher.php'); ?>    
    <div class="dash-app">
            <header class="dash-toolbar ">
				<?php include('navbar_teacher.php');?>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12" id=" ">
							<div class="card">
								<div class="card-header">
									<div id="" class="muted pull-right">
										<a href="quiz_question.php<?php echo '?id='.$get_id; ?>" class="btn btn-success"><i class="fas fa-arrow-left"></i> Back</a>
									</div>
								</div>
								<div class="card-body">
								<form class="form-horizontal" method="post">
								<?php
										$query = mysqli_query($conn,"select * FROM quiz_question
										LEFT JOIN question_type on quiz_question.question_type_id = question_type.question_type_id
										where quiz_id = '$get_id' and quiz_question_id = '$quiz_question_id'  order by date_added DESC ")or die(mysqli_error());
										$row = mysqli_fetch_array($query);
								?>
								        <div class="form-group">
											<label  for="inputPassword">Question</label>
											<textarea name="question" class="form-control" id="ckeditor_full" required><?php echo $row['question_text']; ?></textarea>
										</div>
										<!-- <div class="control-group">
											<label class="control-label" for="inputEmail">Points</label>
											<div class="controls">
											
											<input type="number" class="span1" name="points" min=1 max=5 required> 
											</div>
										</div> -->
										<div class="form-group">
											<label  for="inputEmail">Question Type:</label>
													
											<select id="qtype" name="question_type" class="form-control" required>

												<option value="<?php echo $row['question_type_id']; ?>"><?php echo $row['question_type']; ?></option>
												<?php
												$query_question = mysqli_query($conn,"select * from question_type")or die(mysqli_error());
												while($query_question_row = mysqli_fetch_array($query_question)){
												?>
												<option value="<?php echo $query_question_row['question_type_id']; ?>"><?php echo $query_question_row['question_type'];  ?></option>
												<?php } ?>

											</select>
											
										</div>
										<div class="form-group">
											<label  for="inputEmail"></label>
											<div class="">			
											<div id="opt11">
											<?php
												$sqlz = mysqli_query($conn,"SELECT * FROM answer WHERE quiz_question_id = '$quiz_question_id'");
												while($rowz = mysqli_fetch_array($sqlz)){
													if($rowz['choices']=='A'){
														$a = $rowz['answer_text'];
													} else if($rowz['choices'] == 'B'){
														$b = $rowz['answer_text'];
													} else if($rowz['choices'] == 'C'){
														$c = $rowz['answer_text'];
													} else if($rowz['choices'] == 'D'){
														$d = $rowz['answer_text'];
													}
												}
											?>
													A.) <input type="text" name="ans1" size="60" value="<?php echo $a;?>"> <input name="answer" value="A" <?php if($row['answer'] == 'A'){ echo 'checked'; }?> type="radio"><br /><br />
													B.) <input type="text" name="ans2" size="60" value="<?php echo $b;?>"> <input name="answer" value="B" <?php if($row['answer'] == 'B'){ echo 'checked'; }?> type="radio"><br /><br />
													C.) <input type="text" name="ans3" size="60" value="<?php echo $c;?>"> <input name="answer" value="C" <?php if($row['answer'] == 'C'){ echo 'checked'; }?> type="radio"><br /><br />
													D.) <input type="text" name="ans4" size="60" value="<?php echo $d;?>"> <input name="answer" value="D" <?php if($row['answer'] == 'D'){ echo 'checked'; }?> type="radio"><br /><br />
												</div>
												<div id="opt12">
													<input name="correctt" <?php if($row['answer'] == 'True'){ echo 'checked'; }?> value="True" type="radio">True<br /><br />
													<input name="correctt" <?php if($row['answer'] == 'False'){ echo 'checked'; }?> value="FALSE" type="radio">False<br /><br />
												</div>
											</div>
										</div>
										<div class="form-group">
											<button name="save" type="submit" class="btn btn-success form-control"><i class="icon-save"></i> Save</button>
										</div>									
								</form>							
						
						<?php
						if (isset($_POST['save'])){
						$question = $_POST['question'];
						// $points = $_POST['points'];
						$type = $_POST['question_type'];
						$answer = $_POST['answer']; 
						
						$ans1 = $_POST['ans1'];
						$ans2 = $_POST['ans2'];
						$ans3 = $_POST['ans3'];
						$ans4 = $_POST['ans4'];
						
						if ($type=='2'){
							mysqli_query($conn,"update quiz_question set quiz_id='$get_id',question_text='$question',date_added=NOW(),answer='".$_POST['correctt']."',question_type_id='$type' where quiz_question_id='$quiz_question_id'")or die(mysqli_error());
						}else{
							mysqli_query($conn,"update quiz_question set quiz_id='$get_id',question_text='$question',date_added=NOW(),answer='$answer',question_type_id='$type' where quiz_question_id='$quiz_question_id'")or die(mysqli_error());
						
						mysqli_query($conn,"update answer set quiz_question_id='$quiz_question_id',answer_text='$ans1',choices='A' where quiz_question_id='$quiz_question_id'")or die(mysqli_error());
						mysqli_query($conn,"update answer set quiz_question_id='$quiz_question_id',answer_text='$ans2',choices='B' where quiz_question_id='$quiz_question_id'")or die(mysqli_error());
						mysqli_query($conn,"update answer set quiz_question_id='$quiz_question_id',answer_text='$ans3',choices='C' where quiz_question_id='$quiz_question_id'")or die(mysqli_error());
						mysqli_query($conn,"update answer set quiz_question_id='$quiz_question_id',answer_text='$ans4',choices='D' where quiz_question_id='$quiz_question_id'")or die(mysqli_error());
						
						}
						
					?>
						<script>
						window.location = 'quiz_question.php<?php echo '?id='.$get_id; ?>' 
						</script>
						<?php
						}
						?>
								</div>
							</div>
                        </div>               	                    
                    </div>
                </div>
            </main> 	
    </div>
</div>
<script>
	jQuery(document).ready(function(){
		jQuery("#opt11").hide();
		jQuery("#opt12").hide();
		jQuery("#opt13").hide();		

		jQuery("#qtype").change(function(){	
			var x = jQuery(this).val();			
			if(x == '1') {
				jQuery("#opt11").show();
				jQuery("#opt12").hide();
				jQuery("#opt13").hide();
			} else if(x == '2') {
				jQuery("#opt11").hide();
				jQuery("#opt12").show();
				jQuery("#opt13").hide();
			} else {
				jQuery("#opt11").hide();
				jQuery("#opt12").hide();
				jQuery("#opt13").hide();
			}
		});
		
	});
</script>
<?php include('scripts.php'); ?>
</body>

