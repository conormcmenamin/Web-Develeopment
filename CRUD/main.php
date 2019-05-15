
<!DOCTYPE html>
<html>
  <head>
    <title>My SQL Database</title>
    <link rel = "stylesheet" type = "text/css" href = "styling.css">
    <script type = "text/javascript" src = "scripting.js"></script>
  </head>
  <body>

    <p>

        <strong>Create an Entry</strong>

        <form action ="create.php"  method = "post" enctype="multipart/form-data" >
          Creator:                          <input type = "text" name="create_creator"><br>
          Title:                            <input type = "text" name="create_title"><br>
          Type:                             <input type = "text" name= "create_type"><br>
          Identifier(ISBN):                 <input type = "text" name= "create_ISBN"><br>
          Date of publication (yyyy:mm:dd): <input type = "text" name="create_date"><br>
          Language:                         <input type = "text" name="create_lang"><br>
          Description:                      <input type = "text" name="create_desc"><br>
          <input type = "submit" formaction="create.php">

        </form>
      </p>


      <p>
        <strong>Delete an Entry</strong>
        <form id = "deleteForm"  action ="delete.php" method = "post" enctype="multipart/form-data" >
          ID: <input type = "text" name = "delete_id">
          <input type="submit" formaction= "delete.php">
        </form>
      </p>
      <p>
        <strong>Update an Existing Entry</strong>
        <form id = "updateForm" action = "update.php" method = "post" enctype="multipart/form-data">
          ID*:                               <input type = "text" name="update_id"><br>
          Creator:                          <input type = "text" name="update_creator"><br>
          Title:                            <input type = "text" name="update_title"><br>
          Type:                             <input type = "text" name= "update_type"><br>
          Identifier(ISBN):                 <input type = "text" name= "update_ISBN"><br>
          Date of publication (yyyy:mm:dd): <input type = "text" name="update_date"><br>
          Language:                         <input type = "text" name="update_lang"><br>
          Description:                      <input type = "text" name="update_desc"><br>
          <input type = "submit" formaction="update.php">
        </form>

    </p>



    <table id = "mainTable">
      <tr id = "header">
        <th>ID</th>
        <th>Creator</th>
        <th>Title</td>
        <th>Type</th>
        <th>Identifier</th>
        <th>Date</th>
        <th>Language</th>
        <th>Description</th>
      </tr>
      <?php
      $conn = mysqli_connect("localhost","root","","mydb");
      if($conn->connect_error){
        die("Failed to connect: " . $conn->connect_error);
      }
        $stmt = "SELECT * FROM ebook_metadata;";

        $resultSet = $conn->query($stmt);
        
        if($resultSet->num_rows>0){
          while($row = $resultSet->fetch_assoc()){
            echo "<tr>";
            echo"<td>".$row['id']."</td><td>".$row['creator']."</td><td>".$row['title']."</td><td>".$row['type']."</td><td>".$row['identifier']."</td><td>".$row['date']."</td><td>".$row['language']."</td><td>".$row['description']."</td>";
            echo "</tr>";
          }
        }else{
          echo " 0 rows returned by this sql statement.";
        }
       ?>
    </table>


  </body>
</html>
