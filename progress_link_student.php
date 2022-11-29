<div class="dash-nav dash-nav-light bg-success">
	    <header class="">
        <a href="#!" class="menu-toggle">
            <i class="fas fa-bars"></i>
        </a>
    </header>
    <nav class="dash-nav-list bg-success">
        
            <div class="border-top"> 
			<a class="dash-nav-item text-white" href="dashboard_student.php"><i class="fas fa-arrow-alt-circle-left">
				</i>Back
				</a>
            </div>

            <div class="border-top">
                <a class="dash-nav-item text-white" href="my_classmates.php <?php echo '?id='.$get_id; ?>"><i class="fas fa-users">
				</i>My Classmates		
				</a>
            </div>

			<div class="bg-light">
                <a class="dash-nav-item text-success" href="progress.php <?php echo '?id='.$get_id; ?>"><i class="fas fa-sort-amount-up">
				</i>My progress	
				</a>
            </div>

			<!-- <div class="border-top">
                <a class="dash-nav-item text-white" href="subject_overview_student.php<?php echo '?id='.$get_id; ?>"><i class="far fa-address-book">
				</i>Subject Overview
				</a>
            </div> -->

			<div class="border-top">
                <a class="dash-nav-item text-white" href="downloadable_student.php<?php echo '?id='.$get_id; ?>"><i class="fas fa-cloud-download-alt">
				</i>Downloadable
				</a>
            </div>

			<div class="border-top">
                <a class="dash-nav-item text-white" href="assignment_student.php <?php echo '?id='.$get_id; ?>"><i class="fas fa-plus-circle">
				</i>Assignment
				</a>
            </div>

			<div class="border-top">
                <a class="dash-nav-item text-white" href="announcements_student.php <?php echo '?id='.$get_id; ?>"><i class="fas fa-user-cog">
				</i>Annoucement
				</a>
            </div>

			<div class="border-top">
                <a class="dash-nav-item text-white" href="student_quiz_list.php <?php echo '?id='.$get_id; ?>"><i class="fas fa-plus-circle">
				</i>Quiz
				</a>
            </div>
    </nav>
</div>



