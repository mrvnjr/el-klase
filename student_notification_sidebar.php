<div class="dash-nav dash-nav-dark bg-success">
    
    <?php include('count.php'); ?>
    <header class="">
        <a href="#!" class="menu-toggle">
            <i class="fas fa-bars"></i>
        </a>

        <img src="../uploads/Logo.png" style="width: 180px; margin-bottom: 25px; margin-top: 10px;" class="img-fluid" alt="...">
        
    </header>
    <nav class="dash-nav-list bg-success">

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



