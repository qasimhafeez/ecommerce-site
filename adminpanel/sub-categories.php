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
                                insertSubCategory();
                            ?>
                           
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="sc_title">Add Sub-Category</label>
                                    <input type="text" class="form-control" name="sc_title">
                                </div>
                                <div class="form-group">
                                <label for="pc">Select Parent Category</label><br>
                                    <select name="pc" id="pc">
                                    <?php 
                                        global $connection;
                                        $query = "SELECT * from categories";
                                        $result = mysqli_query($connection, $query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $s_id = $row["c_id"];
                                            $s_name = $row["c_cat"];
                                    ?>
                                        <option value="<?php echo $s_id; ?>"><?php echo $s_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Sub-Category"> 
                                </div>
                            </form>

                            <?php 
                                if(isset($_GET['edit']))
                                {
                                    $cat_id = $_GET['edit'];
                                    
                                    include "includes/update_subcategories.php";
                                }
                            ?>
                            
                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Parent Category</th>
                                        <th>Sub-Category</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <?php
                                    findAllSubCategories();
                                ?>
                                
                                <?php
                                    deleteSubCategory();
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