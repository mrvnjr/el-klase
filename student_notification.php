<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<body>
<div class="dash">  
	<?php include('student_notification_sidebar.php'); ?>    
    <div class="dash-app">
            <header class="dash-toolbar ">
                <?php include('navbar_student.php'); ?>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <h1>My Notification</h1>
                    <div class="row">
					<?php
						$school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
						$school_year_query_row = mysqli_fetch_array($school_year_query);
						$school_year = $school_year_query_row['school_year'];
						?>
                        <div class="col-lg-12" id=" ">
							<div class="card">
								<div class="card-body">
                                <form action="read.php" method="post">
						<?php if($not_read =='0'){
								}else{ ?>
						<button id="delete"  class="btn btn-info" name="read"><i class="icon-check"></i> Read</button>
							<div class="float-right">
                                Check All <input type="checkbox" name="selectAll" id="checkAll" />
                                    <script>
                                    $("#checkAll").click(function () {
                                        $('input:checkbox').not(this).prop('checked', this.checked);
                                    });
                                    </script>					
							</div>
	
								<?php } ?>
				
                                        <?php $query = mysqli_query($conn,"select * from teacher_class_student
                                        LEFT JOIN teacher_class ON teacher_class.teacher_class_id = teacher_class_student.teacher_class_id 
                                        LEFT JOIN class ON class.class_id = teacher_class.class_id 
                                        LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
                                        LEFT JOIN teacher ON teacher.teacher_id = teacher_class_student.teacher_id 
                                        JOIN notification ON notification.teacher_class_id = teacher_class.teacher_class_id 	
                                        where teacher_class_student.student_id = '$session_id' and school_year = '$school_year'  order by notification.date_of_notification DESC
                                        ")or die(mysqli_error());
                                        $count = mysqli_num_rows($query);
                                        if ($count  > 0){
                                        while($row = mysqli_fetch_array($query)){
                                        $get_id = $row['teacher_class_id'];
                                        $id = $row['notification_id'];
                                        
                                        
                                        $query_yes_read = mysqli_query($conn,"select * from notification_read where notification_id = '$id' and student_id = '$session_id'")or die(mysqli_error());
                                        $read_row = mysqli_fetch_array($query_yes_read);
                                        
                                        $yes = $read_row['student_read'];
                                    
                                        ?>
									<div class="post"  id="del<?php echo $id; ?>">
										<?php if ($yes == 'yes'){
										}else{
										?>
										    <input id="" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">	
										<?php } ?>	
											<strong><?php echo $row['firstname']." ".$row['lastname'];  ?></strong>
											<?php echo $row['notification']; ?> In 
											<a href="<?php echo $row['link']; ?><?php echo '?id='.$get_id; ?>">
											<?php echo $row['class_name']; ?> 
											<?php echo $row['subject_code']; ?> 
									 
											</a>
                                            <div class="float-right">
                                                <i class="fas fa-calendar-alt"></i>&nbsp;<?php echo $row['date_of_notification']; ?> 
                                            </div>
                                            <hr>
                                        </div>
                                    <?php
                                    } }else{
                                    ?>
                                    <div class="alert alert-info"><strong><i class="icon-info-sign"></i> No Notifications Found</strong></div>
                                    <?php
                                    }
                                    ?>
                                    
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