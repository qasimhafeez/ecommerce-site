<?php
    
    if(isset($_POST['cbArray']))
    {
        //here we will store all the values of the checkBox array down bellow to another variable
        
        $getBoxArray = $_POST['cbArray'];
        
        //loop through the array and save the array items into another value as foreach loop does
        foreach($getBoxArray as $getPostId)
        {
            
            //Here we will get the value from the choice ID right down bellow in the div container like published etc
            $choice = $_POST['getChoice'];
            
            switch($choice)
            {
                // case 'published':
                //     $query = "UPDATE posts SET post_status = '{$choice}' WHERE post_id = {$getPostId} ";
                //     $update = mysqli_query($connection, $query);
                //     break;
                // case 'draft':
                //     $query = "UPDATE posts SET post_status = '{$choice}' WHERE post_id = {$getPostId} ";
                //     $update = mysqli_query($connection, $query);
                //     break;
                case 'delete':
                    $query = "DELETE FROM products WHERE p_id = {$getPostId} ";
                    $update = mysqli_query($connection, $query);
                    break;
            }
            
        }
    }
    
?>
   

   
   
<form action="" method="post">    
    <table class="table table-bordered table-hover">
       
        <div class="col-xs-4 zero-padding">
           <select name="getChoice" id="getChoice" class="form-control">
               <option value="">Select Option</option>
               <option value="published">Publish</option>
               <option value="draft">Draft</option>
               <option value="delete">Delete</option>
           </select>
        </div>

        <div class="col-xs-4">
           <input type="submit" name="submit" value="Apply" class="btn btn-success">
           <a href="products.php?source=add_product" class="btn btn-primary">Add New</a>
           <!-- <a href="products.php?source=add_product" class="btn btn-danger">Delete</a> -->
        </div>
        <?php 
            $products_per_page = 21;

            if(isset($_GET['page'])){

                $page = $_GET['page'];

            }
            else {
                $page = "";

            }

            if ($page == "" || $page == 1) {
            
                $page_1 = 0;
            
            } else {
                $page_1 = ($page * $products_per_page + 4) - $products_per_page;
            }


            global $connection;
            $find_rows_numbers = "select * from products";
            $get_count = mysqli_query($connection, $find_rows_numbers);
            $count = mysqli_num_rows($get_count);
            $count = $count / $products_per_page; 
        ?>
        <div class="col-xs-4">
            <ul class="pagination">
                <?php 

                for ($i=1; $i <= $count; $i++) {
                    if ($i == $page) {
                        echo "<li class='pager-item active'><a href='products.php?page={$i}' >{$i}</a></li>";     
                    } else {
                        echo "<li class='pager-item'><a href='products.php?page={$i}' class='pager-item'>{$i}</a></li>";    
                    }
                    
                }


                ?>
            </ul>
        </div>
        <thead>
            <tr>
                <th><input type="checkbox" id="selectAllBoxes"></th>
                <th>Id</th>
                <th>image</th>
                <th>Title</th>
                <!-- <th>Store</th>
                <th>Category</th> -->
                <th>Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php

            // $query = "SELECT products.p_id, products.p_img, products.p_desc, 
            //              stores.s_name, categories.c_cat, products.p_date 
            //              from products 
            //              INNER JOIN stores ON products.p_store_id = stores.s_id 
            //              INNER JOIN categories ON products.p_cat_id = categories.c_id 
            //              ORDER BY products.p_id DESC 
            //              LIMIT $page_1,25";

            $query = "SELECT * FROM products ORDER BY p_id DESC LIMIT $page_1, 25";
            $result = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($result))
            {
                $p_id = $row['p_id'];
                $p_image = $row['p_img'];
                $p_desc = $row['p_desc'];
                //$p_store = $row['s_name'];
                //$p_cat = $row['c_cat'];
                $p_date = $row['p_date'];
                echo "<tr>";
        ?>
        
                <td><input type="checkbox" class="checkBox" name="cbArray[]"
                value="<?php echo $p_id; ?>"></td>
        
        
        <?php
                echo "<td>$p_id</td>";
                echo "<td>$p_image</td>";
                echo "<td>$p_desc</td>";
                //echo "<td>$p_store</td>";
                //echo "<td>$p_cat</td>";
                echo "<td>$p_date</td>";
                echo "<td><a href='products.php?source=edit_product&p_id={$p_id}'>Edit</a></td>";
                echo "<td><a onClick=\" javascript: return confirm('Are you sure, You want to delete?'); \"
                            href='products.php?delete={$p_id}'>Delete</a></td>";
                echo "</tr>";
            }
        ?>
            
        <?php
            if(isset($_GET['delete']))
            {
                $delete_post = $_GET['delete'];

                $query = "DELETE FROM products where p_id = {$delete_post}";
                $delete = mysqli_query($connection, $query);
                redirect("products.php");
            }
        ?>

        </tbody>
    </table>
</form>
                        