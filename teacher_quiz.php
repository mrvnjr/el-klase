<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<body>
<div class="dash">  
	<?php include('quiz_sidebar_teacher.php'); ?>    
    <div class="dash-app">
            <header class="dash-toolbar ">
                <!-- <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a> -->
                <?php include('navbar_teacher.php');?>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
				<h1>Quiz</h1>
                    <div class="row">
                        <div class="col-lg-12" id=" ">
							<div class="card">
                                <div class="card-body">
                                    <div class="col-12">
                                        <div class="float-right mb-2">
                                            <a href="add_quiz.php" class="btn btn-info"><i class="fas fa-plus-circle"></i> Add Quiz</a>
                                            <td width="30"><a href="add_quiz_to_class.php" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add Quiz to Class</a></td>   
                                        </div>
                                        <form action="delete_quiz.php" method="post">
                                            <table cellpadding="0" cellspacing="0" border="0" class="table" id="">
                                                <a data-toggle="modal" href="#backup_delete" id="delete"  class="btn btn-danger mb-3" name=""><i class="fas fa-trash-alt fa-large"></i></a>
                                                <?php include('modal_delete_quiz.php'); ?>
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th>Quiz title</th>
                                                        <th>Description</th>
                                                        <th>Date Added</th>
                                                        <th>Questions</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $query = mysqli_query($conn,"select * FROM quiz where teacher_id = '$session_id'  order by date_added DESC ")or die(mysqli_error());
                                                        while($row = mysqli_fetch_array($query)){
                                                        $id  = $row['quiz_id'];
                                                    ?>                              
                                                    <tr id="del<?php echo $id; ?>">
                                                        <td width="30">
                                                            <input id="optionsCheckbox" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                        </td>
                                                        <td><?php echo $row['quiz_title']; ?></td>
                                                        <td><?php  echo $row['quiz_description']; ?></td>
                                                        <td><?php echo $row['date_added']; ?></td>                                      
                                                        <td><a href="quiz_question.php<?php echo '?id='.$id; ?>">Questions</a></td>                                      
                                                        <td width="30"><a href="edit_quiz.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="fas fa-pen"></i></a></td>                                                                         
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </form>                                        
                                    </div>
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
</html>