<div class="dash-nav dash-nav-dark bg-success">
<?php include('count.php'); ?>

    <header class="">
        

        <a href="#!" class="menu-toggle">
            <i class="fas fa-bars"></i>
        </a>      

        <img src="../uploads/el.png" style="width: 180px; margin-bottom: 25px; margin-top: 10px;" class="img-fluid" alt="...">
        
        
    </header>
    <nav class="dash-nav-list bg-success">
         
            <div class="text-center">
				<img src="./uploads/logo.png" style="width: 110px;" class="img-fluid" alt="...">
				<h6 class="text-white font-weight-bold">AASMNHS E-LEARNING</h6> 
			</div>
            <div class="bg-light"> 
			<a class="dash-nav-item text-success" href="dashboard_student.php"><i class="fas fa-users"></i>My Class</a>
            </div>

            <div class="">
                <a class="dash-nav-item text-white" href="student_notification.php"><i class="fas fa-info-circle">
				</i>Notification
                <?php if($not_read == '0'){
				}else{ ?>
					<span class="badge badge-pill badge-danger ml-3"><?php echo $not_read; ?></span>
				<?php } ?>
				
				</a>
            </div>
<!-- 
            <div class="border-top">
                <a class="dash-nav-item text-white"  href="add_downloadable.php">
                    <i class="fas fa-plus-circle"></i>Downloadables
                </a>
            </div>

            <div class="border-top ">
                <a class="dash-nav-item text-white"  href="add_announcement.php">
                    <i class="fas fa-plus-circle"></i>Announcement
                </a>
            </div>
            <div class="border-top">
                <a class="dash-nav-item text-white"  href="add_assignment.php">
                    <i class="fas fa-plus-circle"></i>Assignment
                </a>
            </div>
            <div class="border-top">
                <a class="dash-nav-item text-white"  href="teacher_quiz.php">
                    <i class="fas fa-list"></i>Quiz
                </a>
            </div> 
            <div class="border-top">
                <a class="dash-nav-item text-white"  href="teacher_share.php">
                    <i class="fas fa-file-alt"></i>Shared Files
                </a>
            </div> -->
    </nav>
</div>
