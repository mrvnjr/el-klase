<?php include('header.php');?>
<?php  include('session.php'); ?>
<body>
<div class="dash">  
    <?php include('admin_sidebar.php'); ?>      
    <div class="dash-app">
            <header class="dash-toolbar ">
                <!-- <a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a> -->
                <?php include('navbar.php');?>
            </header>
            <main class="dash-content">
                <div class="container-fluid">
                    <h1 class="dash-title">Admin User</h1>
                    <div class="row">
                        <div class="col-lg-4" id="adduser">
                            <?php include('add_user.php'); ?>
                        </div>
                        <div class="col-lg-8" id="">
                            <!--card-->
                            <div id="block_bg" class="card easion-card">
                                <div class="card-header">
                                    <div class="easion-card-title">Admin Users List</div>
                                </div>
                                    <div class="card-body ">
                                        <div class="">
                                        <form action="delete_users.php" method="post">
                                            <table class="table table-in-card" id="example">
                                                <a data-toggle="modal" href="#user_delete" id="delete"  class="btn btn-danger mb-3" name=""><i class="fas fa-trash-alt"></i></a>
                                                    <?php include('modal_delete.php'); ?>
                                                <thead>
                                                    <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Username</th>
                                                        
                                                            <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <?php
                                                        $user_query = mysqli_query($conn,"select * from users")or die(mysqli_error());
                                                        while($row = mysqli_fetch_array($user_query)){
                                                        $id = $row['user_id'];
                                                        ?>
                                            
                                                            <tr>
                                                            <td width="60">
                                                            <input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
                                                            </td>
                                                            <td><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?></td>
                
                                                            <td><?php echo $row['username']; ?></td>
                                                        
                                                            <td width="40">
                                                            <a href="edit_user.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                                            </td>
                    
                                                
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
