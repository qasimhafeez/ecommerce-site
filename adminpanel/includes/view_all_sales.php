<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Item</th>
            <th>Quantity</th>
            <th>Item Price</th>
            <th>Total Price</th>
            <th>Purchased By</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
<?php
    global $connection;
    $allPurchases = "SELECT * from purchases";
    $query = mysqli_query($connection, $allPurchases);
    $i = 1;
    while($result = mysqli_fetch_assoc($query))
    {
        $items = json_decode($result['p_items'], true);
        $status = $result["p_status"];
        $purchasedBy = $result["pu_id"];
        $date = $result["p_date"];
        
        foreach ($items as $item) {
            // Get Products
            $product_id = $item["id"];
            $getProduct = "SELECT * FROM myproducts WHERE mp_id = $product_id";
            $productQ = mysqli_query($connection, $getProduct);
            $product = mysqli_fetch_assoc($productQ);

            //Get Users
            $getUser = "SELECT * FROM users WHERE user_id = $purchasedBy";
            $userQ = mysqli_query($connection, $getUser);
            $user = mysqli_fetch_assoc($userQ);            
            ?>
            <tr>
                <td><?=$i;?></td>
                <td><?=$product['mp_title'];?></td>
                <td><?=$item['quantity'];?></td>
                <td><?=$product['mp_new_price'];?></td>
                <td><?=money($item['quantity'] * $product['mp_new_price']);?></td>
                <td><?=$user['user_name'];?></td>
                <td><?=$date;?></td>
                <td><?=$status;?></td>
            </tr>
            <?php
            $i++;    
        }
    }
?>   
    </tbody>
</table>

                        