<?php

  $conn = mysqli_connect("localhost","root","","mydb");

  if(!$conn){
    echo "mysql failed.";
  }else{
  
    $creator = $_POST['create_creator'];
    $title = $_POST['create_title'];
    $type = $_POST['create_type'];
    $identifier =$_POST['create_ISBN'];
    $date =  $_POST['create_date'];
    $lang = $_POST['create_lang'];
    $desc = $_POST['create_desc'];
    
    $stmt = $conn->prepare("INSERT INTO ebook_metadata (creator,title,type,identifier,date,language,description) values(?,?,?,?,?,?,?);");
    $stmt->bind_param("sssssss", $creator  ,$title,$type,$identifier,$date,$lang,$desc);
    $sql = "INSERT INTO ebook_metadata (creator,title,type,identifier,date,language,description) values( '$creator'  ,'$title','$type','$identifier','$date','$lang','$desc')";

    if(!$stmt->execute()){
      echo "failed.";
    }

    $stmt->close();
    $conn->close();
    header('Location: main.php');

}
