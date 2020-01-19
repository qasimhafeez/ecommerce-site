        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
               <li><a href="../index.php">Home</a></li>
                

                     
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php
                        echo $_SESSION['username']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="sales.php"><i class="fa fa-fw fa-money"></i> Sales</a>
                    </li>
                    <!-- Posts Section -->
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#post_dropd"><i class="fa fa-fw fa-arrows-v"></i> Products <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="post_dropd" class="collapse">
                            <li>
                                <a href="products.php">Amazon Products</a>
                            </li>
                            <li>
                                <a href="myproducts.php">LowCostMart Products</a>
                            </li>
                                <hr>
                            <li>
                                <a href="myproducts.php?source=add_myproduct">Add LowCostMart Product</a>
                            </li>
                            <li>
                                <a href="products.php?source=add_product">Add New Amazon Product</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="./stores.php"><i class="fa fa-fw fa-file"></i> Stores</a>
                    </li>
                    <li>
                        <a href="./categories.php"><i class="fa fa-fw fa-file"></i> Categories</a>
                    </li>
                    <!-- <li>
                        <a href="./sub-categories.php"><i class="fa fa-fw fa-file"></i> Sub Categories</a>
                    </li> -->
                    <li>
                        <a href="./messages.php"><i class="fa fa-fw fa-dashboard"></i> Messages</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="users.php">View All Users</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_user">Add New User</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i>Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
