<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Engineering Wikipedia | Add Video </title>
  	<meta charset="utf-8">
  	<link href="images/favicon.ico" rel="shortcut icon">

    
<link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/script.js"></script>
<!--[if lt IE 8]>
   <div style=' clear: both; text-align:center; position: relative;'>
     <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
       <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
    </a>
  </div>
<![endif]-->
<!--[if lt IE 9]>
	<script src="js/html5.js"></script>
	<link rel="stylesheet" href="css/ie.css"> 
<![endif]-->
</head>
<body>
<div class="header_box">
<center><h1>Engineering Wikipedia</h1></center>
</div>
<div class="container">
<ul id="breadcrumbs-one">
	<li><a href="./">  EN&rArr;WIKI Home </a></li>
	<li><a href="./addvid.php" class="current"> Add Video here. </a></li>
</ul>
<br><div class="clear"></div>

    
<form id="form2" action="addvid.php" method="post" enctype="multipart/form-data">
	<label><span class="text-form">Title:</span><input type="text" name="title" required placeholder="Enter Video title "></label>
<br>
	<label><span class="text-form">Speaker:</span><input type="text" name="speaker" required placeholder="Enter Speaker Name "></label>
<br>
	<label><span class="text-form">Duration:</span><input type="text" name="duration" required placeholder="Enter Video Duration "></label>
    <label>
    <span class="text-form">Link:</span>
    <input type="file" name="link" placeholder="Enter Video Link here.." required>

  </label>
  <br>

  <?php 
    $vid =$_FILES["link"]["name"];
    $tmp_link =$_FILES['link']['tmp_link'];
    $location = './videos/';
    
    if(move_uploaded_file($_FILES["link"]["tmp_name"],$location.$vid)){
        $lnk= $location.$_FILES["link"]["name"]; 
    }
    
   ?>


<br>
	<input class="btn" type="submit"value="Add Video">
</form>
<?php
$m= new MongoClient();
$db= $m->search;
$collection=$db->videos;

      
if (isset($_POST['title'])) 
{
  $b = array("title" => $_POST['title'],
"speaker"=>$_POST['speaker'],
"duration"=>$_POST['duration'],
"link" => $lnk );

        $collection->insert($b);

  echo "  <span class=\"success\"><strong>Video inserted.</strong></span>";
}

?>
</div>

<div class="container">
<center><a class="btn1" href="advance.php">Advanced Search</a>&nbsp;&nbsp;<a class="btn1" href="./">Go Home</a>&nbsp;&nbsp;<a class="btn1" href="./update.del_vid.php">Update / Delete Contents</a></center> 
</div>
<footer style="padding-bottom:0px;">
  <div class="container_24">


  <center style="color:white;">Created by <a href="#"class="normaltip" style="color:white; font-size:16px ;text-shadow:0 0 5px red;" title="Purushottam Dike">Purushottam</a></center>
  <center style="color:white;">&copy; 2015-16 <span class="normaltip" style="color:white; font-size:16px ;text-shadow:0 0 5px red;" title="Engineering Short Notes">  EN&rArr;WIKI</span></center>
  </div>
</footer>

</body>
</html>
