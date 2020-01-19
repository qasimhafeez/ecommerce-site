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
                            
                            <!--This username is comming form the login.php page-->
                            <small><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?></small>
                        </h1>
                </div>
                <!-- /.row -->

                       
                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    
                                    <?php 
                                        $query = "SELECT * from myproducts";
                                        $get_all_products = mysqli_query($connection, $query);
                                        $post_count = mysqli_num_rows($get_all_products);
                                        
                                    ?>
                                    
                                  <div class='huge'><?php echo $post_count; ?></div>
                                        <div>LowCostMart Products</div>
                                    </div>
                                </div>
                            </div>
                            <a href="myproducts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    
                                    <?php 
                                        $query = "SELECT * from products";
                                        $get_all_products = mysqli_query($connection, $query);
                                        $post_count = mysqli_num_rows($get_all_products);
                                        
                                    ?>
                                    
                                  <div class='huge'><?php echo $post_count; ?></div>
                                        <div>Amazon Affiliated Products</div>
                                    </div>
                                </div>
                            </div>
                            <a href="products.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-money fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    
                                    <?php
                                        $query = "SELECT * from purchases";
                                        $get_all_categories = mysqli_query($connection, $query);
                                        
                                        $cmts_count = mysqli_num_rows($get_all_categories);
                                    ?>
                                    
                                     <div class='huge'><?php echo $cmts_count; ?></div>
                                      <div>Total Sales</div>
                                    </div>
                                </div>
                            </div>
                            <a href="sales.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                    
                                    <?php
                                        $query = "SELECT * from messages WHERE m_status='unseen'";
                                        $get_all_messages = mysqli_query($connection, $query);
                                        
                                        $users_count = mysqli_num_rows($get_all_messages);
                                    ?>
                                    
                                    <div class='huge'><?php echo $users_count; ?></div>
                                        <div> New Messages</div>
                                    </div>
                                </div>
                            </div>
                            <a href="messages.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div> -->
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                       
                                       <?php
                                            $query = "SELECT * from users";
                                            $get_all_users = mysqli_query($connection, $query);

                                            $cat_count = mysqli_num_rows($get_all_users);
                                        ?>
                                        <div class='huge'><?php echo $cat_count; ?></div>
                                         <div>Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                                <!-- /.row -->
               
                  
                    <?php

                        // for lowcostmart products
                        $query = "SELECT * from myproducts";
                        $get_all_products = mysqli_query($connection, $query);
                        $lowcostmart_count = mysqli_num_rows($get_all_products);

                        // for products
                        $query = "SELECT * from products";
                        $get_all_products = mysqli_query($connection, $query);
                        $published_count = mysqli_num_rows($get_all_products);
                        
                        // for categories
                        $query = "SELECT * from categories";
                        $get_all_products = mysqli_query($connection, $query);
                        $categories_count = mysqli_num_rows($get_all_products);

                        // for Admin User
                        $query = "SELECT * from users WHERE user_role = 'admin' ";
                        $get_all_drafts = mysqli_query($connection, $query);
                        $admin = mysqli_num_rows($get_all_drafts);
                    
                        // Inbox
                        // $query = "SELECT * from messages WHERE m_status = 'seen' ";
                        // $get_approved_cmts = mysqli_query($connection, $query);
                        // $inbox = mysqli_num_rows($get_approved_cmts);
                    
                        // for unseen messages
                        // $query = "SELECT * from messages WHERE m_status = 'unseen' ";
                        // $get_unapproved_cmts = mysqli_query($connection, $query);
                        // $unseen_messages = mysqli_num_rows($get_unapproved_cmts);
                    
                        // for Subscribers
                        $query = "SELECT * from users";
                        $get_all_subscriber = mysqli_query($connection, $query);
                        $users = mysqli_num_rows($get_all_subscriber);
                    ?>   
                    
                 <div class="row">
                    
                    <!-- Now we are using google charts so that we can display charts on dashboard
                         to check that how many posts, comments and other stuff we have and what we
                         need to perform or check, this chart would definitly help us ... and we got 
                         this code snippet from the google charts 
                     -->
                    
                    <script type="text/javascript">
                      google.charts.load('current', {'packages':['bar']});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Date', 'Count'],
                            
                          <?php
                            
                                // Now we would make it identical to -A- down bellow so that we can 
                                // display data dynamically with google charts that how many posts etc etc we have
                                
                                $texts = ["LowCostMart Products", "Amazon Affiliated Products", "Categories", "Admin", "Registered Users"];
                                $counts = [$lowcostmart_count, $published_count, $categories_count, $admin, $users];
                                
                            
                                //We would loop through it to make it identical to -A- down bellow
                            
                                for($i = 0; $i < 5; $i++)
                                {
                                    echo "['{$texts[$i]}'" . ", " . "{$counts[$i]}],";
                                }
                            
                                //['posts', 5], --------- A ---------
                                
                           ?>
                        ]);

                        var options = {
                          chart: {
                            title: '',
                            subtitle: '',
                          }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                      }
                    </script>
                    
                    <div class="col-md-6 col-lg-12" id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                    
                </div>
           
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>