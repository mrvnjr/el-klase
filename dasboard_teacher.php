<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<body>
    <div class="dash">  
        <?php include('teacher_sidebar.php'); ?>    
        <div class="dash-app">
                <header class="dash-toolbar ">
                    <?php include('navbar_teacher.php');?>
                </header>
                <main class="dash-content">
                    <div class="container-fluid">
                        <h1>My Class</h1>
                        <div class="row">
                            <div class="col-lg-12" id=" ">
                                <?php
                                    $school_year_query = mysqli_query($conn,"select * from school_year order by school_year DESC")or die(mysqli_error());
                                    $school_year_query_row = mysqli_fetch_array($school_year_query);
                                    $school_year = $school_year_query_row['school_year'];
                                ?>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="col-12 row text-center py-7">
                                                <?php include('teacher_class.php'); ?>
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $(document).ready( function() {
                                                $('.remove').click( function() {
                                                var id = $(this).attr("id");
                                                    $.ajax({
                                                    type: "POST",
                                                    url: "delete_class.php",
                                                    data: ({id: id}),
                                                    cache: false,
                                                    success: function(html){
                                                    $("#del"+id).fadeOut('slow', function(){ $(this).remove();}); 
                                                    $('#'+id).modal('show');
                                                    $.jGrowl("Your Class is Successfully Deleted", { header: 'Class Delete' });
                                                    }
                                                    }); 	
                                                    return false;
                                                });				
                                            });
                                        </script>
                                    </div>
                            </div>
                            <!-- <div class="col-lg-4" id=""></div>-->
                        
                        </div>
                    </div>
                        
                </main> 	
        </div>
    </div>
    <?php include('scripts.php'); ?>
</body>