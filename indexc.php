<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body style="margin: 55px;">
  <div class="contrainer my-5">
    <h1>List of Customer</h1>
    <a class="btn btn-primary" href="/test/createc.php" role="button">New Customer</a>
    <br>
    <table class="table">
        <thead>
            <tr>

                        <th> ID Customer </th>
                        <th> User name </th>
                        <th> Password </th>
                        <th> FisrtName </th>
                        <th> FamilyName </th>
                        <th> Birthday </th>
                        <th> Email </th>
                        <th> Phone</th>
                        <th> City </th>
                        <th> Region </th>
                        <th> Street </th>
                        <th> Code postal </th>
                        <th> ssn </th>
                        <th> icn </th>
                        <th> Car </th>
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

        $sql="SELECT * FROM client";
        $result=$conn->query($sql);

        if(!$result){
            die("Innvalide query: " . $conn->error);
        }

        //read data of each row
        while($row=$result->fetch_assoc()){
            echo" <tr>

            <td> ".$row["id"]." </td>
            <td> ".$row["fullname"]." </td>
            <td> ".$row["passw"]." </td>
            <td> ".$row["firstname"]." </td>
            <td> ".$row["familyname"]." </td>
            <td> ".$row["birth"]." </td>
            <td> ".$row["eemail"]." </td>
            <td> ".$row["ephone"]." </td>
            <td> ".$row["ecity"]." </td>
            <td> ".$row["ereg"]." </td>
            <td> ".$row["estr"]." </td>
            <td> ".$row["codep"]." </td>
            <td> ".$row["ssn"]." </td>
            <td> ".$row["icn"]." </td>
          
                           
            <td>  
            <a class='btn btn-primary btn-sm' href='/test/car.php?id=$row[id]'>His Cars</a>
           
        </td>

                            <td>  
                                <a class='btn btn-primary btn-sm' href='/test/updatec.php?id=$row[id]'>Update</a>
                                <a class='btn btn-danger btn-sm' href='/test/deletc.php?id=$row[id]'>Delete</a>
    
                            </td>

                         
            </tr>";

        }

     
        ?>
        </tbody>
    </table>
  </div>
    
</body>
</html>