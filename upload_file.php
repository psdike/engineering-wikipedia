
<?php
if (!file_exists("teecom/upload"))
{
    mkdir("teecom/upload", 0777, true);
}
if (file_exists("teecom/upload/" . $_FILES["import"]["name"]))
{
    echo $_FILES["import"]["name"] . " already exists. ";
}
else
{
    move_uploaded_file($_FILES["import"]["tmp_name"],
    "teecom/upload/" . $_FILES["import"]["name"]);
    echo "Stored in: " . "upload/" . $_FILES["import"]["name"];
}
    

?>