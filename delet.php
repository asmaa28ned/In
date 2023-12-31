<?php

    $id=$_GET["id"];

$servername ="localhost";
$username ="root";
$password = "";
$dbname = "tpin";


 $conn = mysqli_connect($servername,$username,$password,$dbname);
 
    echo " <br> delete expert <br> ";
   

   $sql="DELETE FROM expert WHERE id=$id";
  
   echo $id;
 
 if(  $conn->query($sql)== true){
    echo"\nExpert deleted successfuly";
 }else{
    echo"Error deleting record: " . $conn->error;
 }

header("location: /test/index.php");
exit;
?>