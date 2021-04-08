<?php
    $con = mysqli_connect('localhost', 'root', '', 'excel-upload');
    if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
    }

    $id=$_GET['rn'];
    $query = "DELETE FROM EXCEL WHERE ID = '$id'";

    $data=mysqli_query($con, $query);

    if ($data) {
        echo "<font color='red'> Record Deleted from Database.";
    }
    else{
        echo "Failed to Delete Record From Database.";
    }
?>