<!DOCTYPE html>

<?php
$con = mysqli_connect('localhost', 'root', '', 'excel-upload');
    if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
    }

    $sql = "SELECT * FROM excel";
    $result = $con->query($sql);

    
    $con->close();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show data</title>
</head>
<body>
    <table style="border:1px solid white; border-radius: 10px; padding: 20px;
     margin-top: 50px;margin-left: 400px; font-weight: 400; 
     background-color: tomato; color: #fff;" border="1">
        <thead>
          <th>ID</th>
          <th>Name</th> 
          <th>Email</th>
          <th>Operation</th>
        </thead>
        <tbody>
            <?php
              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  echo "
                    <tr>
                    <th>".$row['id']."</th>
                    <th>".$row['name']."</th>
                    <th>".$row['email']."</th>
                    <th><a style='text-decoration: none; color: yellow;' href = 'delete.php?rn=$row[id]'>Delete</th>
                    </tr>
                  "; 
                }
              } else {
                echo "No entry found!";
              }
          ?>
        </tbody>
      </table>
      
</body>
</html>