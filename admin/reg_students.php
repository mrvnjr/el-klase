
<?php include('header.php');?>
<body>
<div class="dash">  
    <?php include('student_sidebar.php'); ?>      
    <div class="dash-app">
            <header class="dash-toolbar ">
                <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <h1 class="dash-title">Students</h1>
                    <div class="row">
                        <div class="col-lg-4" id="adduser">
				            <?php include('add_students.php'); ?>		   			
                        </div>
                       <div class="col-lg-8" id="studentTableDiv">
                            <!--card-->
                            <div id="block_bg" class="card easion-card">
                                <div class="card-header">
                                    <div class="easion-card-title">Student List</div>
                                </div>
                                    <div class="card-body">
                                            <?php include('student_table_reg.php'); ?>
                                        </div>
                                    </div>
                                </div>
				
                           <!--card-->
                        </div>                                  
                    </div>
                </div>
            </main>
    </div>
</div>
<?php include('scripts.php'); ?>
</body>
</html>
