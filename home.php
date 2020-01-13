<?php

session_start();

if(!isset($_SESSION["logged"]) || $_SESSION["logged"]!==true){
    header("Location: index.php");
    exit;
}

$search;

if(isset($_SESSION["search"])){
    for($i=0;$i<count($_SESSION["search"][0]);$i++){
        $search[0][$i] = $_SESSION["search"][0][$i];
    }
    for($i=0;$i<count($_SESSION["search"][1]);$i++){
        $search[1][$i] = $_SESSION["search"][1][$i];
    }
    for($i=0;$i<count($_SESSION["search"][2]);$i++){
        $search[2][$i] = $_SESSION["search"][2][$i];
    }
    unset($_SESSION["search"]);
}

?>

<html>
    <head>
        <title>Početna</title>
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
                    <?php

                    if(isset($_SESSION["admin"]) && $_SESSION["admin"]==1){
                        echo '<li class="nav-item dropdown">
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
                            </li>';
                    }
                    ?>
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
                <div class="ml-5 mr-5">
                <br>
                <h3>Rezultati pretrage:</h3>
                <br>
                <?php

                if(!empty($search)){
                    for($i=0;$i<3;$i++){
                        if($i==0){
                            echo "<h6>Napitci:</h6>";
                        }
                        if($i==1){
                            echo "<hr><h6>Sastojci:</h6>";
                        }
                        if($i==2){
                            echo "<hr><h6>Korisnici:</h6>";
                        }
                        echo "<ul>";
                        for($j=0;$j<count($search[$i]);$j++){
                            if($i===0 && $search[$i][$j]!==null){
                                echo "<li>";
                                echo "<a class=\"text-dark\" style=\"text-decoration: none;\" href=\"recipe.php?id=".$search[$i][$j]["id"]."\">";
                                echo "<img src=\"".$search[$i][$j]["picture"]."\" alt=\"Nema\" style=\"width: 100px\">";
                                echo "&nbsp;&nbsp;&nbsp;<span class=\"font-weight-bold\">".$search[$i][$j]["name"]."</span>";
                                echo "</a>";
                                echo "</li><br>";
                            }
                            
                            if($i===1 && $search[$i][$j]!==null){
                                echo "<li>";
                                echo "<img src=\"".$search[$i][$j]["picture"]."\" alt=\"Nema\" style=\"width: 100px\">";
                                echo "&nbsp;&nbsp;&nbsp;<span class=\"font-weight-bold\">".$search[$i][$j]["name"]."</span>";
                                echo "</li><br>";
                            }

                            if($i===2 && $search[$i][$j]!==null){
                                echo "<li>";
                                echo "<img src=\"".$search[$i][$j]["photo"]."\" alt=\"Nema\" style=\"width: 100px\">";
                                echo "&nbsp;&nbsp;&nbsp;<span class=\"font-weight-bold\">".$search[$i][$j]["first_name"]." ".$search[$i][$j]["last_name"]."</span>";
                                echo "</li><br>";
                            }
                        }
                        echo "</ul>";
                    }
                }

                ?>
                </div>
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