<?php include('header.php');?>
<?php  include('session.php'); ?>

<body>
<div class="dash">  
    <?php include('dashboard_sidebar.php'); ?>      
    <div class="dash-app">
        <header class="dash-toolbar ">
                <!-- <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a> -->
            <?php include('navbar.php');?>
        </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <h1>Dashboard</h1>
                    <div class="row dash-row">
                        <div class="col-xl-4">
                            <div class="stats stats-primary">
                                <?php 
								$query_student = mysqli_query($conn,"select * from student")or die(mysqli_error());
								$count_student = mysqli_num_rows($query_student);
								?>
                                <h3 class="stats-title"> Students </h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="stats-data">
                                    <div class="stats-change">
                                            <span class="stats-timeframe">Total</span>
                                        </div>
                                        <div class="stats-number"><?php echo $count_student ?></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="stats stats-success ">
                                <?php 
								$query_teacher = mysqli_query($conn,"select * from teacher")or die(mysqli_error());
								$count_teacher = mysqli_num_rows($query_teacher);
								?>
                                <h3 class="stats-title"> Teachers </h3>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="stats-data">
                                        <div class="stats-change">
                                            <span class="stats-timeframe">Total</span>
                                        </div>
                                        <div class="stats-number"><?php echo $count_teacher ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="stats stats-info">
                                <h3 class="stats-title"> School Year </h3>
                                    <?php
                                    $query_sy= mysqli_query($conn,"select * from school_year order by school_year DESC");
                                    $school_year = mysqli_fetch_array($query_sy);
                                    ?>
                                <div class="stats-content">
                                    <div class="stats-icon">
                                        <i class="fas fas fa-calendar-alt"></i>
                                    </div>
                                    <div class="stats-data">
                                        <div class="stats-number"><?php  echo $school_year['school_year']; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><div class="row">
                        <div class="col-xl-6">
                            <div class="card easion-card">
                                <div class="card-header">
                                    <div class="easion-card-icon">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <div class="easion-card-title">Registered & Unregistered Students & Teachers</div>
                                </div>
                                <div class="card-body easion-card-body-chart">
                                    <canvas id="easionChartjsTwoBars"></canvas>
                                    <script>
                                        <?php 
                                        $query_student = mysqli_query($conn,"select * from student where status='Registered'")or die(mysqli_error());
                                        $count_student = mysqli_num_rows($query_student);
                                        ?>
                                        <?php 
                                        $query1_student = mysqli_query($conn,"select * from student where status='Unregistered'")or die(mysqli_error());
                                        $count1_student = mysqli_num_rows($query1_student);
                                        ?>
                                        <?php 
                                        $query_reg_teacher = mysqli_query($conn,"select * from teacher where teacher_status = 'Registered' ")or die(mysqli_error());
                                        $count_reg_teacher = mysqli_num_rows($query_reg_teacher);
                                        ?>
                                        <?php 
                                        $query_teacher = mysqli_query($conn,"select * from teacher")or die(mysqli_error());
                                        $count_teacher = mysqli_num_rows($query_teacher);
                                        ?>
                                        var ctx = document.getElementById("easionChartjsTwoBars").getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'bar',
                                            data: {
                                                labels: ["Students", "Teachers",],
                                                datasets: [{
                                                    label: 'Registered',
                                                    data: [<?php echo $count_student ?>,<?php echo $count_reg_teacher; ?>],
                                                    backgroundColor: window.chartColors.primary,
                                                    borderColor: 'transparent'
                                                }, {
                                                    label: 'Unregistered',
                                                    data: [<?php echo $count1_student ?>,<?php echo $count_teacher ?>],
                                                    backgroundColor: window.chartColors.danger,
                                                    borderColor: 'transparent'
                                                }]
                                            },
                                            options: {
                                                legend: {
                                                    display: false
                                                },
                                                scales: {
                                                    yAxes: [{
                                                        ticks: {
                                                            beginAtZero: true
                                                        }
                                                    }]
                                                }
                                            }
                                        });
                                    </script>
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

