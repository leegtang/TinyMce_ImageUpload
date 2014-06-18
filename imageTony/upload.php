<?php

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

//print_r($_FILES["file"]);exit();

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 1024*1024*30)
&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  } else {
//    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
//    echo "Type: " . $_FILES["file"]["type"] . "<br>";
//    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
//    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
//    if (file_exists("upload/" . $_FILES["file"]["name"])) {
//      echo $_FILES["file"]["name"] . " already exists. ";
//    } else { 
$fn= $_POST['path'] . time().'.'.$extension;

$image_info = getimagesize($_FILES["file"]["tmp_name"]);
$image_width = $image_info[0];
$image_height = $image_info[1];

      move_uploaded_file($_FILES["file"]["tmp_name"],
  $_SERVER['CONTEXT_DOCUMENT_ROOT']. $fn);
      
     echo "<image src=\"$fn\" width=\"300\" height=\"200\"/><input type=\"hidden\" id=\"content\" value=\"$fn\"/>
<input type=\"hidden\" id=\"height\" value=\"$image_height\"/>
<input type=\"hidden\" id=\"width\" value=\"$image_width\"/>";
  
//    }
  }
} else {
  echo "Invalid file";
}



?>
