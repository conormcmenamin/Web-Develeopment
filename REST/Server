<?php
  $conn = mysqli_connect("localhost","root","","mydb");
  if(!$conn){
    echo "Connection failed";
  }else{
    //echo "Connection successful";
  }



  $json = file_get_contents('php://input');
  $data = json_decode($json);
  $action = $data->action;
  $sql="";
  switch($action){
    case 'insert':
      $sql =$conn->prepare("INSERT INTO books (name, date, url, thedesc ) VALUES(?,?,?,?);");
      $sql->bind_param("ssss",$data->name,$data->date, $data->url,$data->desc);
      $sql->execute();
      echo "insert";
    case 'retrieve':
      $jsonArray = Array();
      $query = "SELECT * FROM books;";
      $statement = $conn->prepare($query);
      if($result=$conn->query($query))
      {
        while($row = $result->fetch_assoc())
        {
          $jsonArray[] = $row;
        }
        echo json_encode($jsonArray);
      }else{
        echo "failed";
      }
    case 'delete':
      $query = "DELETE FROM books WHERE(id=?);";
      $stmt = $conn->prepare($query);
      $stmt->bind_param("s",$data->id);
      $stmt->execute();
    case 'update':
      $field = $data->choice;
      echo $field;
      switch($field){
        case 'thedesc':
          $query = 'UPDATE books SET thedesc=? where(id=?);';
          $stmt = $conn->prepare($query);
          $stmt->bind_param("ss",$data->overwrite,$data->id);
          $stmt->execute();
          break;
        case 'name':
          $query = "UPDATE books SET name=? where(id=?);";
          $stmt = $conn->prepare($query);
          $stmt->bind_param("ss",$data->overwrite,$data->id);
          $stmt->execute();
          break;
        case 'url':
          $query = 'UPDATE books SET url=? where(id=?);';
          $stmt = $conn->prepare($query);
          $stmt->bind_param("ss",$data->overwrite,$data->id);
          $stmt->execute();
          break;
      }



  }



  $conn->close();
 ?>
