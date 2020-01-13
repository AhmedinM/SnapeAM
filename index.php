<?php

session_start();

$emailErr = null;
$emailOld = null;
$passwordErr = null;
$register = null;

if(isset($_SESSION["emailError"])){
    $emailErr = $_SESSION["emailError"];
    unset($_SESSION["emailError"]);
}

if(isset($_SESSION["passwordError"])){
    $passwordErr = $_SESSION["passwordError"];
    unset($_SESSION["passwordError"]);
}

if(isset($_SESSION["old"])){
    $emailOld = $_SESSION["old"];
    unset($_SESSION["old"]);
}

if(isset($_SESSION["registration"])){
    $register = $_SESSION["registration"];
    unset($_SESSION["registration"]);
}

?>

<html>
    <head>
        <title>Prijavljivanje</title>
        <link rel="icon" href="images/slytherin.png" type="image/icon type">
        <style>
            body{
                background: url("images/office.jpg");
                background-size: 100% 100%;
            }
        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    </head>
    <body>
        <div class="container d-flex justify-content-center align-items-center">
            <div class="row mt-5 text-secondary" style="border: solid 5px #aaaaaa; background-color: #0d6217">
                <div class="col-12 ml-5 mr-n5 mt-2">
                    <span class="display-4">Prijava</span>
                </div>
                <form method="post" action="login.php"> 
                    <?php if($register!==null){
                        echo "<div><span class=\"ml-5 bg-white text-success mt-3\">".$register."</span></div>";
                    } ?>
                    <div class="col-12 ml-5 mr-n5">
                        <label for="emailInput" class="mt-3">Email:</label> <br>
                        
                        <input class="bg-secondary text-success" type="email" name="email" id="emailInput" <?php if($emailOld!==null){echo "value=\"".$emailOld."\"";} ?>>
                        
                        <?php
                            if($emailErr!==null){
                                echo "<div><span class=\"bg-white text-danger mt-3\">".$emailErr."</span></div>";
                            }
                        ?>
                    </div>
                    <div class="col-12 ml-5 mr-n5">
                        <label for="passwordInput" class="mt-3">Lozinka:</label> <br>
                        <input class="bg-secondary text-success" type="password" name="password" id="passwordInput">
                        <?php
                            if($passwordErr!==null){
                                echo "<div><span class=\"bg-white text-danger mt-3\">".$passwordErr."</span></div>";
                            }
                        ?>
                    </div>
                    <div class="col-12 ml-5 mr-n5 mt-3">
                        <button class="mt-3 btn btn-dark text-success">Prijavi se</button>
                    </div>
                </form>
                <div class="col-12 ml-5 mr-n5 mb-3 mt-2">
                    <span><a class="text-secondary" href="register.php">Registruj se</a></span>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>