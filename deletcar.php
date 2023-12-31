<?php

    $id=$_GET["id"];

$servername ="localhost";
$username ="root";
$password = "";
$dbname = "tpin";


 $conn = mysqli_connect($servername,$username,$password,$dbname);
 
    echo " <br> delete Customer <br> ";
   
$sql="DELETE FROM car WHERE idcar=$id";

  
   
   echo $id;
 
 if(  $conn->query($sql)== true){
    echo"\nCar deleted successfuly";
 }else{
    echo"Error deleting record: " . $conn->error;
 }


 

header("location: /test/indexc.php");
exit;
?>