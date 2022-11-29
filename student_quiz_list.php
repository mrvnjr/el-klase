<?php include('header_dashboard.php'); ?>
<!-- <?php include('session.php'); ?>  -->
<!-- <?php $get_id = $_GET['id']; ?> -->

<body>
<div class="dash">  
    <?php include('student_quiz_link.php'); ?>
    <div class="dash-app">
        <header class="dash-toolbar ">
            <?php include('navbar_student.php'); ?>
        </header>
        <main class="dash-content">
            <div class="container-fluid">
                <h1>Quiz</h1>
                <div class="row">
                    <div class="col-sm-12" id=" ">
                        <div class="card easion-card">
                            <div class="card-header">
                                <?php 		$query = mysqli_query($conn,"select * FROM class_quiz 
                                            LEFT JOIN quiz on class_quiz.quiz_id = quiz.quiz_id
                                            where teacher_class_id = '$get_id'  ")or die(mysqli_error());
                                            $count = mysqli_num_rows($query);
                                ?>
                                <div id="" class="muted float-right"><span class="badge badge-info"><?php echo $count; ?></span></div>
                            </div>
                            <div class="card-body table-responsive">
                                <form action="copy_file_student.php" method="post">
                                    <?php include('copy_to_backpack_modal.php'); ?>
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-in-card" id="">
                                        <thead>
                                            <tr>
                                                <th scope="col">Quiz Title</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Quiz Time (In Minutes)</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $query = mysqli_query($conn,"select * FROM class_quiz 
                                            LEFT JOIN quiz on class_quiz.quiz_id = quiz.quiz_id
                                            where teacher_class_id = '$get_id'  order by class_quiz_id DESC ")or die(mysqli_error());
                                            while($row = mysqli_fetch_array($query)){
                                            $id  = $row['class_quiz_id'];
                                            $quiz_id  = $row['quiz_id'];
                                            $quiz_time  = $row['quiz_time'];
                                        
                                            $query1 = mysqli_query($conn,"select * from student_class_quiz where class_quiz_id = '$id' and student_id = '$session_id'")or die(mysqli_error());
                                            $row1 = mysqli_fetch_array($query1);
                                            $grade = $row1['grade'];
								    	?>                              
										<tr>                     
										 <td><?php echo $row['quiz_title']; ?></td>
                                         <td><?php  echo $row['quiz_description']; ?></td>                                     
                                         <td><?php  echo $row['quiz_time'] / 60; ?></td>                                     
                                         <td width="200">
										<?php if ($grade == ""){ ?>
											<a  data-placement="bottom" title="Take This Quiz" id="<?php echo $id; ?>Download" href="take_test.php<?php echo '?id='.$get_id ?>&<?php echo 'class_quiz_id='.$id; ?>&<?php echo 'test=ok' ?>&<?php echo 'quiz_id='.$quiz_id; ?>&<?php echo 'quiz_time='.$quiz_time;	 ?>"><i class="icon-check icon-large"></i> Take This Quiz</a>
										<?php }else{ ?>
										<b>Already Taken Score <?php echo $grade; ?></b>
										<?php } ?>
										</td>              
                                                    <script type="text/javascript">
                                                    $(document).ready(function(){
                                                        $('#<?php echo $id; ?>Take This Quiz').tooltip('show');
                                                        $('#<?php echo $id; ?>Take This Quiz').tooltip('hide');
                                                    });
                                                    </script>										 
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
