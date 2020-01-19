                            
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="s_name">Edit Store</label>
                                    
                                    <?php
                                        
                                        if(isset($_GET['edit']))
                                        {
                                            $edit_id = $_GET["edit"];
                                            
                                            $query = "SELECT * from stores WHERE s_id = $edit_id";
                                            $result = mysqli_query($connection, $query);
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                                $s_id = $row["s_id"];
                                                $s_name = $row["s_name"];
                                            ?>
                                            
                                            <input value="<?php if (isset($s_name)){echo "$s_name";} ?>" type="text" class="form-control" name="s_name">
                                            
                                            
                                    <?php    }    
                                        }
                                          
                                    ?>
                                    
                                    <?php
                                        // ------------- Update Query --------//
                                    
                                        if(isset($_POST['update_store']))
                                        {
                                            $update_title = $_POST['s_name'];

                                            $query = "UPDATE stores set s_name = '{$update_title}' WHERE s_id = {$s_id}";

                                            $result = mysqli_query($connection, $query);
                                            if (!$result) {
                                                die("You cannot update this store because there may be various categories or products attached to it!");
                                            }
                                        }
                                    ?>
                                    
                                    
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_store" 
                                    value="Update Category"> 
                                </div>
                            </form>