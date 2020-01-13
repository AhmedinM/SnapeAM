<?php

session_start();

$firstNameErr = null;
$oldFirstName = null;
$lastNameErr = null;
$oldLastName = null;
$emailErr = null;
$oldEmail = null;
$passwordErr = null;
$photoErr = null;
$oldPhoto = null;

if(isset($_SESSION["firstNameError"])){
    $firstNameErr = $_SESSION["firstNameError"];
}
if(isset($_SESSION["oldFirstName"])){
    $oldFirstName = $_SESSION["oldFirstName"];
}

if(isset($_SESSION["lastNameError"])){
    $lastNameErr = $_SESSION["lastNameError"];
}
if(isset($_SESSION["oldLastName"])){
    $oldLastName = $_SESSION["oldLastName"];
}

if(isset($_SESSION["emailError"])){
    $emailErr = $_SESSION["emailError"];
}
if(isset($_SESSION["oldEmail"])){
    $oldEmail = $_SESSION["oldEmail"];
}

if(isset($_SESSION["photoError"])){
    $photoErr = $_SESSION["photoError"];
}

if(isset($_SESSION["passwordError"])){
    $passwordErr = $_SESSION["passwordError"];
}

unset($_SESSION["firstNameError"]);
unset($_SESSION["oldFirstName"]);
unset($_SESSION["lastNameError"]);
unset($_SESSION["oldLastName"]);
unset($_SESSION["emailError"]);
unset($_SESSION["oldEmail"]);
unset($_SESSION["photoError"]);
unset($_SESSION["oldPhoto"]);
unset( $_SESSION["passwordError"]);

?>

<html>
    <head>
        <title>Registracija</title>
        <link rel="icon" href="images/slytherin.png" type="image/icon type">
        <style>
            body{
                background: url("images/office.jpg");
                background-size: 100% 100%;
            }
        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <div class="container d-flex justify-content-center align-items-center">
            <div class="row mt-5 text-secondary mb-5" style="border: solid 5px #aaaaaa; background-color: #0d6217">
                <div class="col-12 ml-5 mr-n5 mt-2">
                    <span class="display-4">Registracija</span>
                </div>
                <form action="reg.php" method="post" enctype="multipart/form-data">
                    <div class="col-12 ml-5 mr-n5 mt-3 mb-2">
                        <label for="firstNameInput">Ime:</label> <br>
                        <input class="bg-secondary text-success" type="text" name="firstName" id="firstNameInput" <?php if($oldFirstName!==null){echo "value=\"".$oldFirstName."\"";} ?>>
                        <?php if($firstNameErr!==null){
                            echo "<div><span class=\"bg-white text-danger mt-3\">".$firstNameErr."</span></div>";
                        } ?>
                    </div>
                    <div class="col-12 ml-5 mr-n5">
                        <label for="lastNameInput">Prezime:</label> <br>
                        <input class="bg-secondary text-success" type="text" name="lastName" id="lastNameInput" <?php if($oldLastName!==null){echo "value=\"".$oldLastName."\"";} ?>>
                        <?php if($lastNameErr!==null){
                            echo "<div><span class=\"bg-white text-danger mt-3\">".$lastNameErr."</span></div>";
                        } ?>
                    </div>
                    <div class="col-12 ml-5 mr-n5 mb-2">
                        <label for="emailInput">Email:</label> <br>
                        <input class="bg-secondary text-success" type="email" name="email" id="emailInput" <?php if($oldEmail!==null){echo "value=\"".$oldEmail."\"";} ?>>
                        <?php if($emailErr!==null){
                            echo "<div><span class=\"bg-white text-danger mt-3\">".$emailErr."</span></div>";
                        } ?>
                    </div>
                    <div class="col-12 ml-5 mr-n5 mb-2">
                        <label for="passwordInput">Lozinka:</label> <br>
                        <input class="bg-secondary text-success" type="password" name="password" id="passwordInput">
                        <?php if($passwordErr!==null){
                            echo "<div><span class=\"bg-white text-danger mt-3\">".$passwordErr."</span></div>";
                        } ?>
                    </div>
                    <div class="col-12 ml-5 mr-n5 mb-2">
                        <label for="confirmInput">Ponovi lozinku:</label> <br>
                        <input class="bg-secondary text-success" type="password" name="confirm" id="confirmInput">
                    </div>
                    <div class="col-12 ml-5 mr-n5 mb-2">
                        <label for="photoInput">Slika:</label> <br>
                        <input class="bg-secondary text-success" type="file" name="photo" id="photoInput">
                        <?php if($photoErr!==null){
                            echo "<div><span class=\"bg-white text-danger mt-3\">".$photoErr."dhfkjdf</span></div>";
                        } ?>
                    </div>
                    <div class="col-12 ml-5 mr-n5 mt-4">
                        <button class="btn btn-dark text-success">Registruj se</button>
                    </div>
                </form>
                <div class="col-12 ml-5 mr-n5 mb-4 mt-2">
                    <span><a class="text-secondary" href="index.php">Prijavi se</a></span>
                </div
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>