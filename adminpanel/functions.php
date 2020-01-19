<?php

// For more Security
function escape($string){
    global $connection;

    return mysqli_real_escape_string($connection, trim($string));
}

function confirmQuery($result)
{
    global $connection;
    
    if(!$result)
    {
        die("There is a problem in a Database ".mysqli_error($connection));
    }
}


function insertCategory()
{
    if(isset($_POST["submit"]))
    {
        global $connection;
        $cat_title = $_POST["cat_title"];
        $s_name = $_POST["store"];
        if($cat_title == "" || empty($cat_title) || $s_name == "" || empty($s_name))
        {
            echo "Please fill these field!";
        }
        else
        {
            $query = "INSERT into categories(c_cat, c_store_id) ";
            $query .= "VALUE('{$cat_title}', '{$s_name}') ";

            $create_category = mysqli_query($connection, $query);

            if(!$create_category)
            {
                die("There is a problem with a database!".mysqli_error($connection));
            }
        }
    }

}

function insertSubCategory()
{
    if(isset($_POST["submit"]))
    {
        global $connection;
        $cat_title = $_POST["sc_title"];
        $s_name = $_POST["pc"];
        if($cat_title == "" || empty($cat_title) || $s_name == "" || empty($s_name))
        {
            echo "Please fill these field!";
        }
        else
        {
            $query = "INSERT into subcategories(sc_title, c_id) ";
            $query .= "VALUE('{$cat_title}', '{$s_name}') ";

            $create_category = mysqli_query($connection, $query);

            if(!$create_category)
            {
                die("There is a problem with a database!".mysqli_error($connection));
            }
        }
    }

}


function addStore()
{
    if(isset($_POST["submit"]))
    {
        global $connection;
        $s_name = $_POST["s_name"];
        if($s_name == "" || empty($s_name))
        {
            echo "Please fill this field!";
        }
        else
        {
            $query = "INSERT into stores(s_name) ";
            $query .= "VALUE('{$s_name}') ";

            $create_store = mysqli_query($connection, $query);

            if(!$create_store)
            {
                die("There is a problem with a database!".mysqli_error($connection));
            }
        }
    }

}


function findAllCategories()
{
    global $connection;
    $query = "SELECT c.c_id, c.c_cat, s.s_name from categories c JOIN stores s ON c_store_id = s_id";
    $result = mysqli_query($connection, $query);
    $i = 1;
    while($row = mysqli_fetch_assoc($result))
    {
        
        $cat_id = $row["c_id"];
        $cat_title = $row["c_cat"];
        $s_name = $row["s_name"];

        echo "<tr>";
        echo "<td>{$i}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td>{$s_name}</td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "</tr>";
        $i++;
    }
}

function findAllSubCategories()
{
    global $connection;
    $query = "SELECT sc.sc_id, sc.sc_title, c.c_cat from subcategories sc JOIN categories c ON sc_cid = c_id";
    $result = mysqli_query($connection, $query);
    $i = 1;
    while($row = mysqli_fetch_assoc($result))
    {
        
        $cat_id = $row["sc_id"];
        $cat_title = $row["sc_title"];
        $s_name = $row["c_cat"];

        echo "<tr>";
        echo "<td>{$i}</td>";
        echo "<td>{$c_cat}</td>";
        echo "<td>{$sc_title}</td>";
        echo "<td><a href='subcategories.php?edit={$cat_id}'>Edit</a></td>";
        echo "<td><a href='subcategories.php?delete={$cat_id}'>Delete</a></td>";
        echo "</tr>";
        $i++;
    }
}



function findAllStores()
{
    global $connection;
    $query = "SELECT * from stores";
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result))
    {
        $s_id = $row["s_id"];
        $s_name = $row["s_name"];

        echo "<tr>";
        echo "<td>{$s_id}</td>";
        echo "<td>{$s_name}</td>";
        echo "<td><a href='stores.php?edit={$s_id}'>Edit</a></td>";
        echo "<td><a href='stores.php?delete={$s_id}'>Delete</a></td>";
        echo "</tr>";
    }
}

function deleteCategory()
{
    global $connection;
    if(isset($_GET['delete']))
    {
        $delete_id = $_GET['delete'];

        $query = "DELETE from categories WHERE c_id = {$delete_id}";

        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("You cannot delete this category because there may be various stores or products attached to it!");
        }

        header("Location: categories.php");
    }
}

function deleteSubCategory()
{
    global $connection;
    if(isset($_GET['delete']))
    {
        $delete_id = $_GET['delete'];

        $query = "DELETE from subcategories WHERE sc_id = {$delete_id}";

        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("You cannot delete this category because there may be various stores or products attached to it!");
        }

        header("Location: categories.php");
    }
}

function deleteStore()
{
    global $connection;
    if(isset($_GET['delete']))
    {
        $delete_id = $_GET['delete'];

        $query = "DELETE from stores WHERE s_id = {$delete_id}";

        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("You cannot delete this store because there may be various categories or products attached to it!");
        }

        header("Location: stores.php");
    }
}

function validate($uname, $uemail)
{
    global $connection;
    $query = " SELECT * FROM users WHERE user_name = $uname OR user_email = $uemail ";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0 ) {
        return false;
    }
    else {
        return true;
    }
}


function redirect($path)
{
    echo "<script>window.location.href='{$path}'</script>";
}



?>