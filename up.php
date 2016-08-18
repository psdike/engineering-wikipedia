<?php
/*$name=$_FILES['imglnk']['name'];
$tmp_name=$_FILES['imglnk']['tmp_name'];

if (isset($name)){
	if (!empty($name)) {
		echo $name;
	}
}


?>
<form action="up.php" method="post" enctype="multipart/form-data">
<input type="file" name="file">
<input type="submit" name="submit" value="submit">
</form>

<?php 
$nam= $_FILES['file']['name'];
echo $loc=getcwd().$name;
move_uploaded_file($name, $loc);
*/
?>
<html>
    <body>
        <form action="upload_file.php" method="POST" enctype="multipart/form-data">
            <p>
                <label for="file">Choose import.xml</label><br/>
                <input type="file" name="import" id="import" /></p>
            <p><input type="submit" name="submit" value="Submit" /></p>
        </form>
    <body>
</html>
