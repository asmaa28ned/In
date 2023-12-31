<?php

    $id=$_GET["id"];

$servername ="localhost";
$username ="root";
$password = "";
$dbname = "tpin";


 $conn = mysqli_connect($servername,$username,$password,$dbname);
 
    echo " <br> delete Customer <br> ";
   
$sqll="DELETE FROM car WHERE id=$id";
   $sql="DELETE FROM client WHERE id=$id";
  
   
   echo $id;
 
 if(  $conn->query($sql)== true){
    echo"\nCostumer deleted successfuly";
 }else{
    echo"Error deleting record: " . $conn->error;
 }


 if(  $conn->query($sqll)== true){
    echo"\nCar deleted successfuly";
 }else{
    echo"Error deleting record: " . $conn->error;
 }

header("location: /test/indexc.php");
exit;
?>