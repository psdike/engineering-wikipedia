<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Engineering Wikipedia | EnWiki </title>
  	<meta charset="utf-8">
  	<link href="images/favicon.ico" rel="shortcut icon">

    
<link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-1.7.1.min.js"></script>
    <script src="js/script.js"></script>

</head>
<body>
<div class="header_box">
<center><h1>Engineering Short Notes</h1></center>
</div>
<div class="container">
<ul id="breadcrumbs-one">
	<li><a href="./">  EN&rArr;WIKI Home </a></li>
	<li><a href="#"class="current"> Update Notes here. </a></li>
</ul>
<br><div class="clear"></div>
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


<?php
$m= new MongoClient();
$db= $m->search;
$collection=$db->notes;
if(isset($_GET['id'])){
$note_up =$collection->findOne(array('_id' => new MongoId($_GET['id']) ));		}
	else if(isset($_POST['title'])){
		$collection->update(
		array('_id' => new MongoId($_POST['id'])),
		array(
		"title" => $_POST['title'],
		"desc" => $_POST['desc'],
		"imglnk" => $imglnk
			)
		
		);
		header("Location: ./update.del_notes.php");

		}

if (isset($_POST['title']) and isset($_POST['desc'])) 
{
  $b = array("title" => $_POST['title'],
    "desc" => $_POST['desc'],
			"imglnk" => $imglnk);

        $collection->update($b);

  echo "  <span class=\"success\"><strong>Record Updated Successfully..</strong></span>";
}

?>

<form id="form2" action="update_note.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $note_up['_id'] ?>">
	<label><span class="text-form">Title:</span><input type="text" name="title" value="<?php echo $note_up['title']?>" placeholder="Enter title here"></label>
	<label>
		<span class="text-form">Description:</span>
		<textarea name="desc" value="" ><?php echo $note_up['desc']?></textarea>
	</label>
        <br>
    <label><span class="text-form">Image Link</span><input type="file" name="imglnk" value="<?php echo $note_up['imglnk']?>" placeholder="Enter image link here.."></label>
        
    <br>

	<input class="btn" type="submit"value="Update notes">
</form>
			
</div>

<div class="container">
<center><a class="btn1" href="advance.php">Click to Advanced Search</a>&nbsp;&nbsp;<a class="btn1" href="./">Click to Go Home</a></center> 
</div>
<footer style="padding-bottom:0px;">
  <div class="container_24">


  <center style="color:white;">Created by <a href="#"class="normaltip" style="color:white; font-size:16px ;text-shadow:0 0 5px red;" title="Purushottam Dike">Purushottam</a></center>
  <center style="color:white;">&copy; 2015-16 <span class="normaltip" style="color:white; font-size:16px ;text-shadow:0 0 5px red;" title="Engineering Short Notes">  EN&rArr;WIKI</span></center>

  </div>
</footer>

</body>
</html>
