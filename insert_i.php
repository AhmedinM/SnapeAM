<?php

require_once "database.php";

session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!isset($_POST["name"]) || $_POST["name"] =="" || !isset($_POST["description"]) || $_POST["description"] =="" || !isset($_POST["name"]) || $_POST["name"] =="" || !isset($_POST["number"]) || $_POST["number"]<=0 || empty($_FILES["photo"])){
        if(!isset($_POST["name"]) || $_POST["name"] ==""){
            $_SESSION["nameError"] = "Unesite naziv sastojka.";
        }
        if(!isset($_POST["description"]) || $_POST["description"] ==""){
            $_SESSION["descriptionError"] = "Unesite opis sastojka.";
        }
        if(!isset($_POST["number"]) || $_POST["number"] ==""){
            $_SESSION["numberError"] = "Unesite količinu sastojka u gramima.";
        }

        $_SESSION["oldName"] = $_POST["name"];
        $_SESSION["oldDescription"] = $_POST["description"];
        $_SESSION["oldNumber"] = $_POST["number"];

        header("Location: insert_ingredient.php");
        exit;
    }else{
        $name = $_POST["name"];
        $description = $_POST["description"];
        $photo = $_FILES["photo"];
        $number = $_POST["number"];
        $photoN = "./images/{$photo['name']}";

        $sql = "INSERT INTO ingredients(`id`,`name`,`description`,`picture`,`quantity`) VALUES (NULL,'$name','$description','$photoN',$number)";
        $res = $dbConn->query($sql);
        move_uploaded_file($photo['tmp_name'],"./images/{$photo['name']}");

        if($res===false){
            die("Database error!");
        }else{
            $_SESSION["insertI"] = "Sastojak je unijet u bazu.";
            header("Location: insert_ingredient.php");
            exit;
        }
    }
}else{
    header("Location: insert_ingreient.php");
    exit;
}