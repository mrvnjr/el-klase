<?php include('header.php');?>
<?php  include('session.php'); ?>
<body>
<div class="dash">  
    <?php include('student_sidebar.php'); ?>      
    <div class="dash-app">
        <header class="dash-toolbar ">
                <!-- <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a> -->
            <?php include('navbar.php');?>
        </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <h1>Students</h1> 
                    <div class="row">
                        <div class="col-lg-4" id="adduser">
				            <?php include('add_students.php'); ?>		   			
                        </div>
                       <div class="col-lg-8" id="studentTableDiv">
                            <!--card-->
                            <?php include('student_table.php'); ?>
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
