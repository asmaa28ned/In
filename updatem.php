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
 $license = "";
 $ccp = "";
 $holiday="";

 $errorMessage="";
 $successMessage="";

if($_SERVER['REQUEST_METHOD']=='GET'){
    //Get method: show the data of the client
    if(!isset($_GET["id"])){
        header("location: /test/index.php");
        exit;
    }
    $id=$_GET["id"];

    //resd the row of the selected expert from database table
    $sql="SELECT * FROM mecan WHERE id = $id";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();

    if(!$row){
        header("location: /test/indexm.php");
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
    $license = $row['license'];
    $ccp = $row['ccp'];
    $holiday = $row['holiday'];
}
else{
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
    $license = $_POST['license'];
    $ccp = $_POST['ccp'];
    $holiday = $_POST['holiday'];

    do{
        if(empty($id)||empty($fullname)||empty($passw)||empty($firstname)||empty($familyname)||empty($birth)|| empty($eemail)||empty($ephone)||empty($ecity)||empty($ereg)||empty($estr)||empty($codep)||empty($ssn)||empty($icn)||empty($license)||empty($ccp)||empty($holiday)){
            $errorMessage= "All the fieldes are required";
            break;
        }

        $sql = "UPDATE mecan ".
               "SET id = '$id',fullname = '$fullname', passw = '$passw', firstname = '$firstname', familyname = '$familyname', birth = '$birth', eemail = '$eemail', ephone = '$ephone', ecity = '$ecity', ereg = '$ereg', estr = '$estr', codep = '$codep', ssn = '$ssn', icn = '$icn', license = '$license', ccp = '$ccp', holiday = '$holiday' ".
               "WHERE id = '$id'";

        $result=$conn->query($sql);
        if(!$result){
            $errorMessage="Invalide query: " . $conn->error;
            break;
        }

        $successMessage="Mecanicien update correctly";

        header("location: /test/indexm.php");
        exit;
  

    }while(false);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mecanicien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"> </script>
</head>
<body>
    <div class="container my-5">

    <h2>New Mecanicien</h2>

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

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="email" class="form-control" name="eemail" pattern="[a-z0-9._%+\-]+@gmail.com"  value="<?php echo $eemail; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Phone</label>
            <div class="col-sm-6">
                <input type="tel" class="form-control" name="ephone"  placeholder="----------" pattern="[0,5-7]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" value="<?php echo $ephone; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">City</label>
            <div class="col-sm-6">
            <select style="width:550px;" id="W" name="ecity"  >
        <option name="ecity" ><?php echo $ecity; ?> </option> 
         </select>
                <!--<input type="text" class="form-control" name="ecity" value="<?php echo $ecity; ?>">-->
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Region</label>
            <div class="col-sm-6">
                  <!--<input type="text" class="form-control" name="ereg" value="<?php echo $ereg; ?>">-->
                  <select style="width:550px;" id="D" name="ereg">
        <option name="ereg"> <?php echo $ereg; ?> </option> 
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
                <input type="number" class="form-control" name="icn" value="<?php echo $icn; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Num License</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="license" value="<?php echo $license; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">CCP</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" name="ccp" value="<?php echo $ccp; ?>">
            </div>
        </div>


        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Holiday</label>
            <div class="col-sm-6">
                <!--<input type="text" class="form-control" name="ereg" value="<?php echo $holiday; ?>">-->
                <select style="width:550px;" id="h" name="holiday" >
        <option name="holiday"><?php echo $holiday; ?></option> 
         </select>
            </div>
        </div>

        <script>
                        let holiday = ["Yes", "No"];
                        let h = document.getElementById("h");
                        holiday.forEach(function addSpecies(item) {
                            let option = document.createElement("option");
                            option.text = item;
                            option.value = item;
                            h.appendChild(option);
                        });
                        </script>


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
                <a class="btn btn-outline-primary" href="/test/indexm.php" role="button">Cancel</a>
              </div>
        </div>



    </form>
    </div>
    
</body>
</html>