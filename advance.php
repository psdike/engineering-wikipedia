<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Engineering Wikipedia | Video Search </title>
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
	<li><a href="#" class="current"> Search Videos here. </a></li>
</ul>

<center><form id="search" action="advance.php" method="post">
	<input type="text" name="video" placeholder="Enter Video Name here..">
    <input type="submit" value="Search" class="btn" name="result">

</form></center>	
<?php
$m= new MongoClient();
$db= $m->search;
$collection=$db->videos;
if (empty($_POST['video']) and isset($_POST['result'])) {
echo "<hr><center><h3>Search Result:</h3></center><hr>";

  echo "<p>No data</p>";
}
elseif (isset($_POST['video'])) 					
{
    $cursor= $collection->find( array("title"=>$_POST['video']))->limit(4);
  echo "<hr><center><h3>Search Result:</h3></center><hr>";
     foreach ($cursor as $doc) {
        echo "<dl class=\"slide-down-box\">";
        echo "<dt><center><h3>". $doc['title']."</h3></center> </dt> ";
		
       echo "<dd><center>".$doc['speaker']."<br>".$doc['duration']."<video  width=\"500\" height=\"360\"controls name=\"media\"><source src=\"".$doc['link']."\"></video></dd> </dl>";
        } 

 
 }
fi;
  ?>


</div>


<div class="container">
<center><a class="btn1" href="advance.php">Click to Advanced Search</a>&nbsp;&nbsp;<a class="btn1" href="./">Go Home</a>&nbsp;&nbsp;<a class="btn1" href="addvid.php">Click to Add video</a></center> 
</div>
<footer style="padding-bottom:0px;">
  <div class="container_24">


  <center style="color:white;">Created by <a href="#"class="normaltip" style="color:white; font-size:16px ;text-shadow:0 0 5px red;" title="Purushottam Dike">Purushottam</a></center>
  <center style="color:white;">&copy; 2015-16 <span class="normaltip" style="color:white; font-size:16px ;text-shadow:0 0 5px red;" title="Engineering Short Notes">  EN&rArr;WIKI</span></center>
  </div>
</footer>
</body>
</html>
