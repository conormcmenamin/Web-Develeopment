<?php

  $conn = mysqli_connect('localhost','root','','mydb');
  if($conn->connect_error){
    echo "There was a problem with your connection. ". $conn->connect_error;
  }
  $id = $_POST['update_id'];
  $creator = $_POST['update_creator'];
  $title = $_POST['update_title'];
  $type = $_POST['update_type'];
  $identifier =$_POST['update_ISBN'];
  $date =  $_POST['update_date'];
  $lang = $_POST['update_lang'];
  $desc = $_POST['update_desc'];

  $stmt = $conn->prepare("UPDATE ebook_metadata SET creator= ?, title=?,type=?,identifier=?,date=?,language=?,description=? WHERE id = ?;");
  $stmt->bind_param("ssssssss", $creator,$title,$type,$identifier,$date,$lang,$desc,$id);

  if(!$stmt->execute()){
    echo "Failed to update. Please review your input fields and try again.";
  }

  $conn->close();
  header("Location: main.php");

?>
