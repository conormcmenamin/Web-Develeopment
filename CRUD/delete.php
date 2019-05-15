<?php
  $conn = mysqli_connect("localhost","root","","mydb");

  if($conn->connect_error)
  {
    echo "Connection to database failed.";
  }
  else
  {
    $idman = $_POST['delete_id'];
    $stmt =$conn->prepare("DELETE FROM ebook_metadata WHERE(id = ?);");
    $stmt->bind_param("s", $idman);

    if(!$stmt->execute()){
      echo "failure";
    }
  }
  $conn->close();
  header("Location: main.php");
 ?>
