<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Cars</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body style="margin: 55px;">
  <div class="contrainer my-5">
    <h1>List of Customer Cars</h1>
    <a class="btn btn-primary" href="/test/createcar.php" role="button">Add New Car</a>
    <br>
    <table class="table">
        <thead>
            <tr>

                        <th> ID Car </th>
                        <th> ID Customer </th>
                        <th> Car number </th>
                        <th> Car name </th>
                        <th> Car color </th>
                        <th> Mileage </th>
                        <th> Insurance number </th>
                        <th> Insurance type </th>
                        <th> Date beging insurance </th>
                        <th> Date end insurance </th>
                       
                        <th> action </th>

            </tr>
        </thead>

        <tbody>

        <?php
        $servername ="localhost";
        $username ="root";
        $password = "";
        $dbname = "tpin";
        $conn = mysqli_connect($servername,$username,$password,$dbname);
       
        
        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }
        $id=$_GET["id"];
       $sql="SELECT * FROM car WHERE id = $id";
        $result=$conn->query($sql);

        //$sql="SELECT c.idcar, c.id, c.carnum, c.carname, c.carcoler, c.mileage, c.insn, c.inst, c.datebins,c.datefins, l.id FROM car AS c  JOIN client AS l ON c.id=l.id";
       
      
        $result=$conn->query($sql);

        if(!$result){
            die("Innvalide query: " . $conn->error);
        }
  

        //read data of each row
        while($row=$result->fetch_assoc() ){
     
            echo" <tr>

            <td> ".$row["idcar"]." </td>
            <td> ".$row["id"]." </td>
            <td> ".$row["carnum"]." </td>
            <td> ".$row["carname"]." </td>
            <td> ".$row["carcoler"]." </td>
            <td> ".$row["mileage"]." </td>
            <td> ".$row["insn"]." </td>
            <td> ".$row["inst"]." </td>
            <td> ".$row["datebins"]." </td>
            <td> ".$row["datefins"]." </td>
           
          
                           
        
                            <td>  
                                <a class='btn btn-primary btn-sm' href='/test/updatecar.php?id=$row[idcar]'>Update</a>
                                <a class='btn btn-danger btn-sm' href='/test/deletcar.php?id=$row[idcar]'>Delete</a>
    
                            </td>

                         
            </tr>";

         } 
         

     
        ?>
        </tbody>
    </table>
  </div>
    
</body>
</html>