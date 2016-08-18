<!DOCTYPE html>
<html lang="en">
<head>
  	<title> Update /Delete Contents Engineering Wikipedia | EnWiki </title>
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
<div class="header_box"  onClick="alert('Welcome to  EN&rArr;WIKI here you get all short notes for various subjects of engineering Education')">
<center><h1 class="normaltip" title="Welcome to  EN&rArr;WIKI here you get all short notes for various subjects of engineering Education">Engineering Short Notes</h1></center>
</div>
<div class="container">
<ul id="breadcrumbs-one">
	<li><a href="./">  EN&rArr;WIKI Home </a></li>
	<li><a href="./update.del_notes.php" class="current"> Search Notes here. </a></li>
</ul>
<center><form id="search"  method="post">
	<input name="question" type="text" placeholder="Enter any text here.."  required> &nbsp;
    <input type="submit" value="search" class="btn" name="result">

</form></center>	
<?php
$m= new MongoClient();
$db= $m->search;
$collection=$db->notes;
if (empty($_POST['question']) and isset($_POST['result'])) {
echo "<hr><center><h3>Search Result:</h3></center><hr>";

  echo "<p>No data</p>";
}
elseif (isset($_POST['question'])) 					
{
    $cursor= $collection->find( array("title"=>$_POST['question']))->limit(4);
     echo "<hr><center><h3>Search Result:</h3></center><hr>";
     foreach ($cursor as $doc) {
        echo "<dl class=\"slide-down-box\">";
        echo "<dt>". $doc['title']." </dt> ";
        echo "<dd>".  $doc['desc'] ."</dd> </dl>";
echo "<a href=./update_note.php?id=".$doc['_id']." class=\"info info_warning\">Update</a> &nbsp; &nbsp; &nbsp;" ;
echo "<a href=./delete_note.php?id=".$doc['_id']." class=\"info info_important\">Delete</a>";
        } 

 
 }
fi;
  ?>


</div>

<div class="container">
<!-- {
    foreach ($cursor as $doc)
    
          }
 -->
<center><a class="btn1" href="advance.php">Advanced Search</a>&nbsp;&nbsp;<a class="btn1" href="./">Go Home</a></center> 
</div>
<footer style="padding-bottom:0px;">
  <div class="container_24">


  <center style="color:white;">Created by <a href="#"class="normaltip" style="color:white; font-size:16px ;text-shadow:0 0 5px red;" title="Purushottam Dike">Purushottam</a></center>
  <center style="color:white;">&copy; 2015-16 <span class="normaltip" style="color:white; font-size:16px ;text-shadow:0 0 5px red;" title="Engineering Short Notes">  EN&rArr;WIKI</span></center>

  </div>
</footer>
</body>
</html>
