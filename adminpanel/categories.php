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
                                insertCategory();
                            ?>
                           
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                <label for="store">Select Store</label><br>
                                    <select name="store" id="store">
                                    <?php 
                                        global $connection;
                                        $query = "SELECT * from stores";
                                        $result = mysqli_query($connection, $query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $s_id = $row["s_id"];
                                            $s_name = $row["s_name"];
                                    ?>
                                        <option value="<?php echo $s_id; ?>"><?php echo $s_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category"> 
                                </div>
                            </form>

                            <?php 
                                if(isset($_GET['edit']))
                                {
                                    $cat_id = $_GET['edit'];
                                    
                                    include "includes/update_categories.php";
                                }
                            ?>
                            
                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th>Store Title</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <?php
                                    findAllCategories();
                                ?>
                                
                                <?php
                                    deleteCategory();
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