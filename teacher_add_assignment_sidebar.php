<div class="dash-nav dash-nav-dark bg-success">
    <header class="">
        <a href="#!" class="menu-toggle">
            <i class="fas fa-bars"></i>
        </a>
    </header>
    <nav class="dash-nav-list bg-success">
    <?php include('teacher_count.php'); ?>
            <div class="text-center">
				<img src="./uploads/logo.png" style="width: 110px;" class="img-fluid" alt="...">
				<h6 class="text-white font-weight-bold">AASMNHS E-LEARNING</h6> 
			</div>
            <div class=""> 
                <a href="dasboard_teacher.php" class="dash-nav-item text-white">
                    <i class="fas fa-home"></i> My Class 
                </a> 
            </div>
            <div class="border-top">
                <a href="notification_teacher.php"class="dash-nav-item text-white">
                    <i class="fas fa-info-circle"></i>Notification
                    <?php if($not_read == '0'){
				        }else{ ?>
					    <span class="badge badge-important"><?php echo $not_read; ?></span>
				    <?php } ?>
                </a>
            </div>
            <div class="border-top ">
                <a href="add_downloadable.php"class="dash-nav-item text-white">
                    <i class="fas fa-plus-circle"></i>Downloadables
                </a>
            </div>
        
            <div class="border-top">
                <a href="add_announcement.php"class="dash-nav-item text-white">
                    <i class="fas fa-plus-circle"></i>Announcement
                </a>
            </div>
            <div class="border-top bg-light">
                <a href="add_assignment.php"class="dash-nav-item text-success">
                    <i class="fas fa-plus-circle"></i>Assignment
                </a>
            </div>
            <div class="border-top">
                <a href="teacher_quiz.php"class="dash-nav-item text-white">
                    <i class="fas fa-clipboard-list"></i> Quiz
                </a>
            </div> 
            <div class="border-top">
                <a href="teacher_share.php"class="dash-nav-item text-white">
                    <i class="fas fa-copy"></i>Shared Files
                </a>
            </div>
    </nav>
</div>
