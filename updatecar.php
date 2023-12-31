<?php
//connexion a la base de donnees 
$servername ="localhost";
$username ="root";
$password = "";
$dbname = "tpin";


 $conn = mysqli_connect($servername,$username,$password,$dbname);

 if(!$conn){
echo " DATEBASE  NOT Connected ";
} else{
echo " DATEBASE  Connected ";
}  


$idcar = "";
$id="";
$carnum="";
$carname="";
$carcoler="";
$mileage="";
$insn="";
$inst="";
$datebins="";
$datefins="";



$errorMessage="";
$successMessage="";


if($_SERVER['REQUEST_METHOD']=='GET'){
    //Get method: show the data of the client
    
    $idcar=$_GET["id"];

    //resd the row of the selected expert from database table
    $sql="SELECT * FROM car WHERE idcar = $idcar";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();


   
$idcar=$row['idcar'];
$id = $row['id'];
$carnum=$row['carnum'];
$carname=$row['carname'];
$carcoler=$row['carcoler'];
$mileage=$row['mileage'];
$insn=$row['insn'];
$inst=$row['inst'];
$datebins=$row['datebins'];
$datefins=$row['datefins'];

}else{
    
    $idcar=$_POST['idcar'];
    $id = $_POST['id'];
    $carnum=$_POST['carnum'];
    $carname=$_POST['carname'];
    $carcoler=$_POST['carcoler'];
    $mileage=$_POST['mileage'];
    $insn=$_POST['insn'];
    $inst=$_POST['inst'];
    $datebins=$_POST['datebins'];
    $datefins=$_POST['datefins'];

    do{
        if(empty($id)||empty($idcar)||empty($carnum)||empty($carname)||empty($carcoler)||empty($mileage)||empty($insn)||empty($inst)||empty($datebins)||empty($datefins)){
            $errorMessage= "All the fieldes are required";
            break;
        }
        if ($datebins > $datefins){
            echo '<script type ="text/JavaScript">';  
            echo 'alert("the date of isurance car is wrong")'; 
            echo '</script>'; 
           
          }else{
      
        $sqll = "UPDATE car ".
        "SET idcar = '$idcar',id = '$id', carnum = '$carnum', carname = '$carname', carcoler = '$carcoler', mileage = '$mileage', insn = '$insn', inst = '$inst', datebins = '$datebins', datefins = '$datefins' ".
        "WHERE idcar = '$id'";

 $res=$conn->query($sqll);
 if(!$res){
     $errorMessage="Invalide query: " . $conn->error;
     break;
 }

        $successMessage="Car update correctly";

        header("location: /test/indexc.php");
        exit;
  
          }
    }while(false);
}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"> </script>
</head>
<body>
    <div class="container my-5">

    <h2>New Customer</h2>

    <?php
    if(!empty($errorMessage)){
        echo"
        <div class ='alert alert-warning alert-dismissible fade show' role='alert'>
           <strong>$errorMessage</strong>
           <button type='button' class='btn-close' data-bs-dismoss='alert' aria-label='close'></button>
        </div> 
        ";
    }

    ?>

    <form method="post">
    <input type="hidden" value="<?php echo $id; ?>">

    <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Id Car </label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="idcar" value="<?php echo $idcar; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Id</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="id" value="<?php echo $id; ?>">
            </div>
        </div>

      

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"> Car Number </label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="carnum" value="<?php echo $carnum; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"> Car Name </label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="carname" value="<?php echo $carname; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Car Color </label>
            <div class="col-sm-6">
                <!--<input type="text" class="form-control" name="ereg" value="<?php echo $carcoler; ?>">-->
                <select style="width:550px;" id="C" name="carcoler" >
        <option name="carcoler"><?php echo $carcoler; ?></option> 
         </select>
            </div>
        </div>

        <script>
                        let carcoler = ["Red", "Blue", "Black", "Yellow", "Pink", "Grey", "Green","White"];
                        let C = document.getElementById("C");
                        carcoler.forEach(function addSpecies(item) {
                            let option = document.createElement("option");
                            option.text = item;
                            option.value = item;
                            C.appendChild(option);
                        });
                        </script>

                        
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"> Car Mileage </label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="mileage" value="<?php echo $mileage; ?>">
            </div>
        </div>

        
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"> Insurance Number </label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="insn" value="<?php echo $insn; ?>">
            </div>
        </div>

        
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label"> Insurance Type </label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="inst" value="<?php echo $inst; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Date of beging Insurance</label>
            <div class="col-sm-6">
                <input type="date" class="form-control" name="datebins" value="<?php echo $datebins; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Date of end Insurance</label>
            <div class="col-sm-6">
                <input type="date" class="form-control" name="datefins" value="<?php echo $datefins; ?>">
            </div>
        </div>


        <?php
        if(!empty($successMessage)){
            echo"
            <div class='row mb-3'>
             <div class='offset-sm-3 col-sm-6'>
               <div class='alert alert-succes alert-dismissible fade show' role='alert'>
                 <strong>$successMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-lable='close'></button>
                </div>
              </div>
            </div>
            ";
        }

        ?>



        <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-primary" href="/test/car.php" role="button">Cancel</a>
              </div>
        </div>




    </form>
    </div>
    
</body>
</html>