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


$id = "";
$fullname = "";
$passw = "";
$firstname = "";
$familyname = "";
$birth = "";
$eemail ="";
$ephone = "";
$ecity ="";
$ereg ="";
$estr= "";
$codep = "";
$ssn ="";
$icn = "";
$idcar="";
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
    if(!isset($_GET["id"])){
        header("location: /test/indexc.php");
        exit;
    }
    $id=$_GET["id"];

    //resd the row of the selected expert from database table
    $sql="SELECT * FROM client WHERE id = $id";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();

    $sqll="SELECT * FROM car WHERE id = $id";
    $res=$conn->query($sqll);
    $rows=$res->fetch_assoc();

    if(!$row){
        header("location: /test/indexc.php");
        exit;
    }

    $id = $row['id'];
    $fullname = $row['fullname'];
    $passw = $row['passw'];
    $firstname = $row['firstname'];
    $familyname = $row['familyname'];
    $birth = $row['birth'];
    $eemail = $row['eemail'];
    $ephone = $row['ephone'];
    $ecity = $row['ecity'];
    $ereg = $row['ereg'];
    $estr= $row['estr'];
    $codep = $row['codep'];
    $ssn = $row['ssn'];
    $icn = $row['icn'];
  


$idcar=$rows['idcar'];
$carnum=$rows['carnum'];
$carname=$rows['carname'];
$carcoler=$rows['carcoler'];
$mileage=$rows['mileage'];
$insn=$rows['insn'];
$inst=$rows['inst'];
$datebins=$rows['datebins'];
$datefins=$rows['datefins'];

}else{
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $passw = $_POST['passw'];
    $firstname = $_POST['firstname'];
    $familyname = $_POST['familyname'];
    $birth = $_POST['birth'];
    $eemail = $_POST['eemail'];
    $ephone = $_POST['ephone'];
    $ecity = $_POST['ecity'];
    $ereg = $_POST['ereg'];
    $estr= $_POST['estr'];
    $codep = $_POST['codep'];
    $ssn = $_POST['ssn'];
    $icn = $_POST['icn'];
    $idcar=$_POST['idcar'];
    $carnum=$_POST['carnum'];
    $carname=$_POST['carname'];
    $carcoler=$_POST['carcoler'];
    $mileage=$_POST['mileage'];
    $insn=$_POST['insn'];
    $inst=$_POST['inst'];
    $datebins=$_POST['datebins'];
    $datefins=$_POST['datefins'];

    do{
        if(empty($id)||empty($fullname)||empty($passw)||empty($firstname)||empty($familyname)||empty($birth)|| empty($eemail)||empty($ephone)||empty($ecity)||empty($ereg)||empty($estr)||empty($codep)||empty($ssn)||empty($icn)||empty($idcar)||empty($carnum)||empty($carname)||empty($carcoler)||empty($mileage)||empty($insn)||empty($inst)||empty($datebins)||empty($datefins)){
            $errorMessage= "All the fieldes are required";
            break;
        }
        if ($datebins > $datefins){
            echo '<script type ="text/JavaScript">';  
            echo 'alert("the date of isurance car is wrong")'; 
            echo '</script>'; 
           
          }else{
        $sql = "UPDATE client ".
               "SET id = '$id',fullname = '$fullname', passw = '$passw', firstname = '$firstname', familyname = '$familyname', birth = '$birth', eemail = '$eemail', ephone = '$ephone', ecity = '$ecity', ereg = '$ereg', estr = '$estr', codep = '$codep', ssn = '$ssn', icn = '$icn' ".
               "WHERE id = '$id'";

        $result=$conn->query($sql);
        if(!$result){
            $errorMessage="Invalide query: " . $conn->error;
            break;
        }

        $sqll = "UPDATE car ".
        "SET idcar = '$idcar',id = '$id', carnum = '$carnum', carname = '$carname', carcoler = '$carcoler', mileage = '$mileage', insn = '$insn', inst = '$inst', datebins = '$datebins', datefins = '$datefins' ".
        "WHERE idcar = '$idcar'";

 $res=$conn->query($sqll);
 if(!$res){
     $errorMessage="Invalide query: " . $conn->error;
     break;
 }

        $successMessage="Expert update correctly";

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
            <label class="col-sm-3 col-form-label">Id</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="id" value="<?php echo $id; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">User Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="fullname" value="<?php echo $fullname; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" name="passw" value="<?php echo $passw; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">First Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>">
            </div>
        </div>

            <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Family Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="familyname" value="<?php echo $familyname; ?>">
               </div>
            </div>

            <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Birthday</label>
            <div class="col-sm-6">
                <input type="date" class="form-control" name="birth" value="<?php echo $birth; ?>">
            </div>
        </div>

       <!-- <script>
function test() {
     var q = new Date();
     var date = new Date(q.getFullYear(),q.getMonth(),q.getDate());
     var mydate = new Date(document.getElementById('birth').value);

     if(date > mydate) {
        alert("Current Date is Greater THan the User Date");
     } else {
        alert("Current Date is Less than the User Date");
     }
  }


        </script>-->

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="email" class="form-control" name="eemail" pattern="[a-z0-9._%+\-]+@gmail.com"  value="<?php echo $eemail; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Phone</label>
            <div class="col-sm-6">
                <input type="tel" class="form-control" name="ephone"  placeholder="----------" pattern="[0,5-7]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}"  value="<?php echo $ephone; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">City</label>
            <div class="col-sm-6">
            <select style="width:550px;" id="W" name="ecity">
        <option name="ecity" > <?php echo $ecity; ?> </option> 
         </select>
             <!--   <input type="text" class="form-control" name="ecity" value="<?php echo $ecity; ?>">-->
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Region</label>
            <div class="col-sm-6">
                <!--<input type="text" class="form-control" name="ereg" value="<?php echo $ereg; ?>">-->
                <select style="width:550px;" id="D" name="ereg">
        <option name="ereg" ><?php echo $ereg; ?></option> 
         </select>
            </div>
        </div>


        <script>
                        let wilaya = ["Adrar", "Chlef", "Laghouat"];
                        let dairalagh = ["khnag", "SidiMakhlouf", "Assafia", "AinMadi", "BenNaserBenChouhra"];
                        let dairaadrar = ["a1", "a2", "a3", "a4"];
                        let dairachlef = ["c1", "c2", "c3 ", "c4"];

                        let W = document.getElementById("W");
                        let D = document.getElementById("D");

                        wilaya.forEach(function addSpecies(item) {
                            let option = document.createElement("option");
                            option.text = item;
                            option.value = item;
                            W.appendChild(option);
                        });

                        W.onchange = function() {
                            D.innerHTML = "<option></option>";
                            if (this.value == "Adrar") {
                                addToSlct2(dairaadrar);
                            }
                            if (this.value == "Chlef") {
                                addToSlct2(dairachlef);
                            }
                            if (this.value == "Laghouat") {
                                addToSlct2(dairalagh);
                            }
                        }

                        function addToSlct2(arr) {
                            arr.forEach(function(item) {
                                let option = document.createElement("option");
                                option.text = item;
                                option.value = item;
                                D.appendChild(option);
                            });
                        }
                    </script>



        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Street</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="estr" value="<?php echo $estr; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Code Postal</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="codep" value="<?php echo $codep; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">SSN</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="ssn" value="<?php echo $ssn; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">ICN</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="icn" value="<?php echo $icn;?>">
            </div>
        </div>

      


      
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Id Car </label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="idcar" value="<?php echo $idcar; ?>">
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
                <a class="btn btn-outline-primary" href="/test/indexc.php" role="button">Cancel</a>
              </div>
        </div>




    </form>
    </div>
    
</body>
</html>