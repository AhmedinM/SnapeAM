<?php

require_once "database.php";

session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!isset($_POST["firstName"]) || $_POST["firstName"] =="" || !isset($_POST["lastName"]) || $_POST["lastName"] =="" || !isset($_POST["email"]) || $_POST["email"] =="" || !isset($_POST["password"]) || $_POST["password"] =="" || !isset($_POST["confirm"]) || $_POST["confirm"] =="" || empty($_FILES["photo"]) || $_POST["password"]!==$_POST["confirm"]){
        if(!isset($_POST["firstName"]) || $_POST["firstName"] ==""){
            $_SESSION["firstNameError"] = "Unesite svoje ime.";
        }
        if(!isset($_POST["lastName"]) || $_POST["lastName"] ==""){
            $_SESSION["lastNameError"] = "Unesite svoje prezime.";
        }
        if(!isset($_POST["email"]) || $_POST["email"] ==""){
            $_SESSION["emailError"] = "Unesite svoj email.";
        }
        if(!isset($_POST["password"]) ||  $_POST["password"] ==""){
            $_SESSION["passwordError"] = "Unesite lozinku.";
        }
        if(!isset($_POST["confirm"]) || $_POST["confirm"] ==""){
            $_SESSION["passwordError"] = "Unesite lozinku dva puta.";
        }
        if(empty($_FILES["photo"])){
            $_SESSION["photoError"] = "Ubacite svoju sliku.";
        }
        if(isset($_POST["password"]) && isset($_POST["confrim"]) && $_POST["password"]!==$_POST["confrim"]){
            $_SESSION["passwordError"] = "Lozinke nijesu iste.";
            //$_SESSION["oldPassword"] = $_POST["password"];
        }
        $_SESSION["oldFirstName"] = $_POST["firstName"];
        $_SESSION["oldLastName"] = $_POST["lastName"];
        $_SESSION["oldEmail"] = $_POST["email"];
        $_SESSION["oldPhoto"] = $_FILES["photo"];

        header("Location: register.php");
        exit;
    }
    //die($_POST["photo"]);
    
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    //$confirm = $_POST["confirm"];
    $photo = $_FILES["photo"];
    move_uploaded_file($photo['tmp_name'],"./images/{$photo['name']}");
    $photoN = "./images/{$photo['name']}";
    $password = md5($password);
    $sql = "INSERT INTO users(`id`, `first_name`, `last_name`, `email`, `password`, `permission`, `admin`, `photo`) VALUES(NULL,'$firstName','$lastName','$email','$password',0,0,'$photoN')";
    $res = $dbConn->query($sql);
    if($res===false){
        die("Database error!");
    }else{
        $_SESSION["registration"] = "Uspješno ste se registrovali.";
        header("Location: index.php");
        exit;
    }

}else{
    header("Location: index.php");
    exit;
}