
<div class="dash-nav dash-nav-dark bg-success">
    <header class="">
        <a href="#!" class="menu-toggle">
            <i class="fas fa-bars"></i>
        </a>
    </header>
    <nav class="dash-nav-list bg-success">
            <div class=""> 
                <a href="dasboard_teacher.php" class="dash-nav-item text-white">
                    <i class="fas fa-arrow-left"></i> Back
                </a> 
            </div>
			<div class="border-top"> 
                <a href="my_students.php<?php echo '?id='.$get_id; ?>" class="dash-nav-item text-white">
                    <i class="fas fa-home"></i> My Students
                </a> 
            </div>
            <!-- <div class="border-top">
                <a href="subject_overview.php<?php echo '?id='.$get_id; ?>"class="dash-nav-item text-white">
                    <i class="fas fa-users"></i>Subject Overview
                </a>
            </div> -->
            <div class="border-top ">
                <a href="downloadable.php<?php echo '?id='.$get_id; ?>"class="dash-nav-item text-white">
                    <i class="fas fa-file-alt"></i>Downloadables
                </a>
            </div>
        
            <div class="border-top ">
                <a href="assignment.php<?php echo '?id='.$get_id; ?>"class="dash-nav-item text-white">
                    <i class="fas fa-file-alt"></i>Assignments
                </a>
            </div>
            <div class="border-top ">
                <a href="announcements.php<?php echo '?id='.$get_id; ?>"class="dash-nav-item text-white">
                    <i class="fas fa-plus-circle"></i>Announcements
                </a>
            </div>
            <div class="border-top bg-light">
                <a href="class_quiz.php<?php echo '?id='.$get_id; ?>"class="dash-nav-item text-success">
                    <i class="fas fa-clipboard-list"></i> Quiz
                </a>
            </div> 
			<!--?php include('search_other_class.php'); ?-->	
            <!-- <div class="border-top">
                <a href="teacher_share.php"class="dash-nav-item text-white">
                    <i class="fas fas fa-calendar-alt"></i>Shared Files
                </a>
            </div> -->
    </nav>
</div>

