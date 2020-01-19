<?php include "includes/header.php" ?>
<?php 

if(isset($_POST["submit"]))
{
	$uploads_dir = 'images/';

	$imageArr = array();

	foreach ($_FILES["image"]["error"] as $key => $error) {

		if ($error == UPLOAD_ERR_OK) {
		    $tmp_name = $_FILES["image"]["tmp_name"][$key];
		    $name = $_FILES["image"]["name"][$key];
		    move_uploaded_file($tmp_name, "$uploads_dir/$name");
		    array_push($imageArr,$name);
		}

	}

	$imageArr=serialize($imageArr);
	global $connection;
	$sql=mysqli_query($connection, "INSERT INTO images SET img='".$imageArr."'");
	//After that use unserialize() function,this will show the array of that multiple image. user the bellow code:

	$sql1=mysqli_query($connection, "Select * from images");

	$result=mysqli_fetch_assoc($sql1);

	$imageArr = (unserialize($result['img']));
	foreach ($imageArr as $key => $value) {
	 	echo $imageArr[$key];
	 	break;
	 } 
}


 ?>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image[]" multiple="multiple">
    	</div>
    	<input type="submit" name="submit" value="post">
	</form>
</body>
</html>

<?php 
							global $connection;
							$query = "SELECT * from images where id = 10";
							$result = mysqli_query($connection, $query);
							while ($row = mysqli_fetch_assoc($result)) {
								$imageArr = array();
								$imageArr = unserialize($row["img"]);

								foreach ($imageArr as $key => $value) {}}
						 ?>