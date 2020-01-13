<?php

session_start();

if(!isset($_SESSION["logged"]) || $_SESSION["logged"]!==true){
    header("Location: index.php");
    exit;
}

if(!isset($_SESSION["admin"]) || $_SESSION["admin"]==0){
    header("Location: home.php");
    exit;
}

$nameErr = null;
$descriptionErr = null;
$numberErr = null;
$oldName = null;
$oldDescription = null;
$oldNumber = null;

if(isset($_SESSION["nameError"])){
    $nameErr = $_SESSION["nameError"];
}
if(isset($_SESSION["oldName"])){
    $oldName = $_SESSION["oldName"];
}

if(isset($_SESSION["descriptionError"])){
    $descriptionErr = $_SESSION["descriptionError"];
}
if(isset($_SESSION["oldDescription"])){
    $oldDescription = $_SESSION["oldDescription"];
}

if(isset($_SESSION["numberError"])){
    $numberErr = $_SESSION["numberError"];
}
if(isset($_SESSION["oldNumber"])){
    $oldNumber = $_SESSION["oldNumber"];
}

$insert = null;
if(isset($_SESSION["insertP"])){
    $insert = $_SESSION["insertP"];
}

unset($_SESSION["nameError"]);
unset($_SESSION["descriptionError"]);
unset($_SESSION["numberError"]);
unset($_SESSION["oldName"]);
unset($_SESSION["oldDescription"]);
unset($_SESSION["oldNumber"]);

unset($_SESSION["insertP"]);

?>

<html>
    <head>
        <title>Unos napitka</title>
        <link rel="icon" href="images/slytherin.png" type="image/icon type">
        <style>
            body{
                background: url("images/office.jpg");
                background-size: 100% 100%;
            }
        </style>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    </head>
    <body>
        <div class="container">
        <nav class="navbar navbar-expand-lg navbar-success bg-success">
                <a class="navbar-brand text-light bg-secondary pl-2 pr-2 font-weight-bold" href="#">Magacin napitaka</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="home.php">Početna <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Baza
                        </a>
                        <div class="dropdown-menu bg-secondary" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-success" href="potions.php">Napitci</a>
                        <a class="dropdown-item text-success" href="ingredients.php">Sastojci</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Admin
                        </a>
                        <div class="dropdown-menu bg-secondary" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-success" href="insert_potion.php">Unos napitaka</a>
                        <a class="dropdown-item text-success" href="insert_ingredient.php">Unos sastojaka</a>
                        <a class="dropdown-item text-success" href="insert_recipe.php">Unos recepata</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-success" href="users.php">Korisnici</a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="logout.php">Odjavi se <i class="fa fa-user"></i></a>
                    </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
                    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Pretraga..." aria-label="Search">
                    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit"><i class="fa fa-search"></i> Pretraži</button>
                    </form>
                </div>
            </nav>

            <div style="background-color: white; width: 100%; min-height: 86%">
                <br>
                <h3 class="ml-5">Unos napitka:</h3>
                <?php if($insert!==null){
                    echo "<div><span class=\"ml-5 bg-white text-success mt-3\">".$insert."</span></div>";
                } ?>
                <form method="post" action="insert_p.php" enctype="multipart/form-data"> 
                    <div class="col-12 ml-5 mr-n5">
                        <label for="nameInput" class="mt-3">Naziv:</label> <br>
                        <input class="bg-secondary text-success" type="text" name="name" id="nameInput" <?php if($oldName!==null){echo "value=\"".$oldName."\"";} ?>>
                        <?php if($nameErr!==null){
                            echo "<div><span class=\"bg-white text-danger mt-3\">".$nameErr."</span></div>";
                        } ?>
                    </div>
                    <div class="col-12 ml-5 mr-n5">
                        <label for="descriptionInput" class="mt-3">Opis:</label> <br>
                        <textarea class="bg-secondary text-success" name="description" id="descriptionInput" cols="30" rows="5"><?php if($oldDescription!==null){echo $oldDescription;} ?></textarea>
                        <?php if($descriptionErr!==null){
                            echo "<div><span class=\"bg-white text-danger mt-3\">".$descriptionErr."</span></div>";
                        } ?>
                    </div>
                    <div class="col-12 ml-5 mr-n5">
                        <label for="photoInput" class="mt-3">Slika:</label> <br>
                        <input class="bg-secondary text-success" type="file" name="photo" id="photoInput">
                    </div>
                    <div class="col-12 ml-5 mr-n5">
                        <label for="categoryInput" class="mt-3">Kategorija:</label> <br>
                        <select class="bg-secondary text-success" name="category" id="categoryInput">
                            <option value="cat1">Kategorija 1</option>
                            <option value="cat2">Kategorija 2</option>
                            <option value="cat3">Kategorija 3</option>
                        </select>
                    </div>
                    <div class="col-12 ml-5 mr-n5">
                        <label for="numberInput" class="mt-3">Broj bočica:</label> <br>
                        <input class="bg-secondary text-success" style="width:100px;" type="number" name="number" id="numberInput" <?php if($oldNumber!==null){echo "value=\"".$oldNumber."\"";} ?>>
                        <?php if($numberErr!==null){
                            echo "<div><span class=\"bg-white text-danger mt-3\">".$numberErr."</span></div>";
                        } ?>
                    </div>
                    <div class="col-12 ml-5 mr-n5 mt-3">
                        <button class="mt-3 btn btn-dark text-success"><i class="fa fa-save"></i> Sačuvaj</button>
                    </div>
                </form>
                <br><br>
            </div>

            <nav class="navbar bottom navbar-success bg-success text-center">
                <span class="text-dark" style="margin-left: 40%">© 2020 Copyright: Ahmedin Muratović</span>
            </nav>
        </div>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>