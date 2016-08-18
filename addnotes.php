<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Engineering Wikipedia | Add Notes </title>
  	<meta charset="utf-8">
  	<link href="images/favicon.ico" rel="shortcut icon">

    
<link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
<div class="header_box">
<center><h1>Engineering Wikipedia</h1></center>
</div>
<div class="container">
<ul id="breadcrumbs-one">
	<li><a href="./">  EN&rArr;WIKI Home </a></li>
	<li><a href="addnotes.php" class="current"> Add Notes here. </a></li>
</ul>
<br><div class="clear"></div>


<form id="form2" action="addnotes.php" method="post" enctype="multipart/form-data">
	<label><span class="text-form">Title:</span><input type="text" name="title" required placeholder="Enter title here"></label>
	<label>
		<span class="text-form">Description:</span>
		<textarea name="desc" placeholder="Enter Description here.." required></textarea>
	</label>
    <br>
    <label><span class="text-form">Image Link</span>
    <img src="./images/upload.png" style="cursor:pointer;">
    <input type="file" name="imglnk" value="Browse File" style="display:none;"></label>
    <?php 

    $img =$_FILES["imglnk"]["name"];
    $tmp_name =$_FILES['imglnk']['tmp_name'];
    if (isset($img)) {
      if(!empty($img)){
        $location = './images/';
        move_uploaded_file($tmp_name, $location.$img);
        
       $imglnk =$location.$img;
      
        }
    }


    ?>
    <br>
	<input class="btn" type="submit"value="Add notes">
</form>
<?php
$m= new MongoClient();
$db= $m->search;
$collection=$db->notes;
if (isset($_POST['title'])) 
{
  $b = array("title" => $_POST['title'],
    "desc" => $_POST['desc'],
	"imglnk"=>$imglnk);

        $collection->insert($b);

  echo "  <span class=\"success\"><strong>Record inserted.</strong></span>";
}

?>
</div>

<div class="container">
<center><a class="btn1" href="advance.php">Advanced Search</a>&nbsp;&nbsp;<a class="btn1" href="./"> Go Home</a>&nbsp;&nbsp;<a class="btn1" href="./update.del_notes.php">Update / Delete Contents</a></center> 
</div>
<footer style="padding-bottom:0px;">
  <div class="container_24">


  <center style="color:white;">Created by <a href="#"class="normaltip" style="color:white; font-size:16px ;text-shadow:0 0 5px red;" title="Purushottam Dike">Purushottam</a></center>
  <center style="color:white;">&copy; 2015-16 <span class="normaltip" style="color:white; font-size:16px ;text-shadow:0 0 5px red;" title="Engineering Short Notes">  EN&rArr;WIKI</span></center>
  </div>
</footer>

</body>
</html>
