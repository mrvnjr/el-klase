
<?php include('header_dashboard.php'); ?>
<!-- <?php include('session.php'); ?> -->
<?php $get_id = $_GET['id']; ?>
<body>
<div class="dash">  
	<?php include('annoucement_link_student.php'); ?>
    <div class="dash-app">
            <header class="dash-toolbar ">
	            <?php include('navbar_student.php'); ?>             
            </header>
            <main class="dash-content">
				<div class="container-fluid">
					<h1>Announcement</h1>
                    <div class="row">
                        <div class="col-lg-12" id=" ">
							<div class="card">
								<div class="card-body">
								    <?php
								        $query_announcement = mysqli_query($conn,"select * from teacher_class_announcements
																	where  teacher_class_id = '$get_id' order by date DESC
																	")or die(mysqli_error());
								        $count = mysqli_num_rows($query_announcement);
                                        if ($count > 0){
                                        while($row = mysqli_fetch_array($query_announcement)){
                                        $id = $row['teacher_class_announcements_id'];
                                    ?>
									<div class="post"  id="del<?php echo $id; ?>">
										<?php echo $row['content']; ?>
										
										<hr>
											
										
										<strong><i class="icon-calendar"></i> <?php echo $row['date']; ?></strong>
											
									</div>
											
								    <?php }}else{ ?>
								        <div class="alert alert-info"><i class="fas fa-info-circle"></i> No Announcements Found.</div>
								    <?php } ?>
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