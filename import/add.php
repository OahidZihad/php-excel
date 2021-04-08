<!DOCTYPE html>

<?php
$con = mysqli_connect('localhost', 'root', '', 'excel-upload');
    if (isset($_POST['submit'])) {
        require('PHPExcel/PHPExcel.php');
        require('PHPExcel/PHPExcel/IOFactory.php');

        $file=$_FILES['doc']['tmp_name'];

        $obj=PHPExcel_IOFactory::load($file);
        foreach ($obj->getWorksheetIterator() as $sheet) {
           $getHighestRow = $sheet->getHighestRow();
           for($i=2; $i<=$getHighestRow; $i++){
              $name=$sheet->getCellByColumnAndRow(0, $i)->getValue();
              $email=$sheet->getCellByColumnAndRow(1, $i)->getValue();
                if($name!=''){
                    mysqli_query($con, "insert into excel (name, email) values('$name', '$email')");
                }
           }
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>successful</title>
</head>
<body>
    <div style="padding:20px; border:1px solid tomato; margin-top:200px; margin-left:500px; width: 17%;
                border-radius:10px; background-color: tomato; color:white;font-weight:600;">
        <?php
            echo 'The excel file added successfully.';
        ?>
    </div>
</body>
</html>