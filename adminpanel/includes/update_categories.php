                            
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Edit Category</label>
                                    
                                    <?php
                                        
                                        if(isset($_GET['edit']))
                                        {
                                            $edit_id = $_GET["edit"];
                                            
                                            $query = "SELECT * from categories WHERE c_id = $edit_id";
                                            $result = mysqli_query($connection, $query);
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                                $cat_id = $row["c_id"];
                                                $cat_title = $row["c_cat"];
                                                $store_title = $row["c_store_id"];
                                            ?>
                                            
                                            <input value="<?php if (isset($cat_title)){echo "$cat_title";} ?>" type="text" class="form-control" name="cat_title">
                                            <label for="store">Select Store</label><br>
                                            <select name="store" id="">
                                                <?php 
                                                    $query = "SELECT * from stores";
                                                    $result = mysqli_query($connection, $query);
                                                    while($row = mysqli_fetch_assoc($result))
                                                    {
                                                        $s_id = $row["s_id"];
                                                        $s_name = $row["s_name"];
                                                ?>
                                                <option value="<?php echo $s_id; ?>"><?php echo $s_name; ?></option>
                                                    <?php } ?>
                                            </select>
                                            
                                    <?php    }    
                                        }
                                          
                                    ?>
                                    
                                    <?php
                                        // ------------- Update Query --------//
                                    
                                        if(isset($_POST['update_category']))
                                        {
                                            $update_title = $_POST['cat_title'];
                                            $update_store = $_POST['store'];

                                            $query = "UPDATE categories set c_cat = '{$update_title}', c_store_id = '{$update_store}'
                                                         WHERE c_id = {$cat_id}";

                                            $result = mysqli_query($connection, $query);
                                            if(!$result)
                                            {
                                                die("Problem in Database".mysqli_error($connection));
                                            }
                                        }
                                    ?>
                                    
                                    
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_category" 
                                    value="Update Category"> 
                                </div>
                            </form>