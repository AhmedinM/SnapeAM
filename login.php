<?php

require_once "database.php";

session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(!isset($_POST["email"]) || $_POST["email"]=="" || !isset($_POST["password"]) || $_POST["password"]==""){
        if(!isset($_POST["email"]) || $_POST["email"]==""){
            $_SESSION["emailError"] = "Unesite svoj email.";
        }

        if(!isset($_POST["password"]) || $_POST["password"]==""){
            $_SESSION["passwordError"] = "Unesite svoju lozinku.";
        }

        $_SESSION["old"] = $_POST["email"];
        header("Location: index.php");
        exit;
    }

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $res = $dbConn->query($sql);
    $row = $res->fetch_assoc();

    if($row===null){
        $_SESSION["emailError"] = "Unijeli ste nepostojeći email.";
        //$_SESSION["old"] = $_POST["email"];
        header("Location: index.php");
        exit;
    }else if($res===false){
        die("Database error!");
    }else{
        if(md5($password)!==$row["password"]){
            $_SESSION["passwordError"] = "Unijeli ste pogrešnu lozinku.";
            $_SESSION["old"] = $_POST["email"];
            header("Location: index.php");
            exit;
        }else{
            //die("jednake");
            //$_SESSION["logged"] = true;
            $_SESSION["name"] = $row["first_name"];
            $_SESSION["admin"] = $row["admin"];
            $_SESSION["permission"] = $row["permission"];
            $_SESSION["id"] = $row["id"];

            header("Location: start.php");
            exit;
        }
    }
}else{
    header("Location: index.php");
    exit;
}