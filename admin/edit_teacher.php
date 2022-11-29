<?php include('header.php');?>
<?php $get_id = $_GET['id']; ?>
<body>
<div class="dash">  
    <?php include('teacher_sidebar.php'); ?>      
    <div class="dash-app">
            <header class="dash-toolbar">
                <?php include('navbar.php');?>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4" id="adduser">
                            <?php include('edit_teacher_form.php'); ?>
                        </div>
                        <div class="col-lg-8" id="">
                            <!--card-->
                            <div id="block_bg" class="card easion-card">
                                <div class="card-header">
                                    <div class="easion-card-title">Teacher List</div>
                                </div>
                                    <div class="card-body">
                                        <div class="">
                                        <form action="delete_teacher.php" method="post">
                                            <table class="table table-in-card" id="example">
                                                <a data-toggle="modal" href="#teacher_delete" id="delete"  class="btn btn-danger" name=""><i class="fas fa-trash-alt"></i></a>
                                                    <?php include('modal_delete.php'); ?>
                                                <thead>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">Photo</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Username</th>

                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <?php
                                                        $teacher_query = mysqli_query($conn,"select * from teacher")or die(mysqli_error());
                                                        while($row = mysqli_fetch_array($teacher_query)){
                                                        $id = $row['teacher_id'];
                                                        $teacher_stat = $row['teacher_stat'];
                                                        ?>
                                            
                                                            <tr>
                                                            <td width="30">
                                                            <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                            </td>
                                                            <td width="40"><img class="img-rounded" src="<?php echo $row['location']; ?>" height="50" width="50"></td> 
                                                            <td><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                                                            <td><?php echo $row['username']; ?></td>
                                                        
                                                            <td width="50"><a href="edit_teacher.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="fas fa-edit"></i></a></td>
                                                           
                                                
                                                            </tr>
                                                        <?php } ?>
                                                </tbody>
                                            </table>
                                        </form>
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
