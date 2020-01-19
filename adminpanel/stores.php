<?php include "includes/admin_header.php"?>
    <div id="wrapper">

        <!-- Navigation -->
       <?php include "includes/admin_navigation.php" ?> 
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin Panel
                            <small><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?></small>
                        </h1>
                        
                        <div class="col-xs-6">
                           
                           <?php
                                addStore();
                            ?>
                           
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="s_name">Add Store</label>
                                    <input type="text" class="form-control" name="s_name">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Store"> 
                                </div>
                            </form>

                            <?php 
                                if(isset($_GET['edit']))
                                {
                                    $s_id = $_GET['edit'];
                                    
                                    include "includes/update_stores.php";
                                }
                            ?>
                            
                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Store Title</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <?php
                                    findAllStores();
                                ?>
                                
                                <?php
                                    deleteStore();
                                ?>
                                
                                
                            </table>
                        </div>
                        
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>