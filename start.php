<?php

session_start();

/*if(!isset($_SESSION["logged"]) || $_SESSION["logged"]!==true){
    header("Location: index.php");
    exit;
}*/

if(!isset($_SESSION["permission"])){
    header("Location: index.php");
    exit;
}

if($_SESSION["permission"]==1){
    $_SESSION["logged"] = true;
    header("Location: home.php");
    exit;
}

?>

<html>
    <head>
        <title>Poruka</title>
        <link rel="icon" href="images/slytherin.png" type="image/icon type">
        <style>
            body{
                background: url("images/office.jpg");
                background-size: 100% 100%;
            }
        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <div class="container d-flex justify-content-center align-items-center">
            <div class="row mt-5 text-secondary" style="border: solid 5px #aaaaaa; background-color: #0d6217">
                <div class="col-12 mr-n5 mt-2 text-center">
                    <span class="text-danger" style="font-size: 32px; font-weight: bold;">Čeka se da Vam Snejp dozvoli pristup.</span><br>
                    <span class="text-danger" style="font-size: 18px;">(Pokušajte kasnije.)</span>
                </div>
                <div class="col-12 mb-3 mt-2 text-center">
                    <hr class="text-danger" style="color: red">
                    <span><a class="btn btn-secondary" href="logout.php">Odjavi se</a></span>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>