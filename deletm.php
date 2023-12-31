<?php

    $id=$_GET["id"];

$servername ="localhost";
$username ="root";
$password = "";
$dbname = "tpin";


 $conn = mysqli_connect($servername,$username,$password,$dbname);
 
    echo " <br> delete Mecanicien <br> ";
   

   $sql="DELETE FROM mecan WHERE id=$id";
  
   echo $id;
 
 if(  $conn->query($sql)== true){
    echo"\nMecanicien deleted successfuly";
 }else{
    echo"Error deleting record: " . $conn->error;
 }

header("location: /test/indexm.php");
exit;
?>