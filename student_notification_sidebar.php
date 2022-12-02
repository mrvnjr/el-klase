<div class="dash-nav dash-nav-dark bg-success">
    
    <?php include('count.php'); ?>
    <header class="">
        <a href="#!" class="menu-toggle">
            <i class="fas fa-bars"></i>
        </a>
    </header>
    <nav class="dash-nav-list bg-success">
            <div class="text-center">
                <img src="./uploads/logo.png" style="width: 110px;" class="img-fluid" alt="...">
                <h6 class="text-white font-weight-bold">AASMNHS E-LEARNING</h6> 
            </div>
            <div class="">
                <a class="dash-nav-item text-white" href="dashboard_student.php"><i class="fas fa-users">
				</i>My Class
				
				</a>
            </div>
        
            <div class="bg-light"> 
			<a class="dash-nav-item text-success" href="student_notification.php"><i class="fas fa-info-circle">
				</i>My Notification
                <?php if($not_read == '0'){
				}else{ ?>
					<span class="badge badge-important"><?php echo $not_read; ?></span>
				<?php } ?>
				</a>
            </div>
            
           
          </nav>
</div>



