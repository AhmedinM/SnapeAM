<?php

require_once "database.php";

session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["search"])){
        $src = $_POST["search"];
        $sql1 = "SELECT * FROM potions WHERE `name` = '$src'";
        $sql2 = "SELECT * FROM ingredients WHERE `name` = '$src'";
        $sql3 = "SELECT * FROM users WHERE first_name = '$src' OR last_name = '$src'";

        $res1 = $dbConn->query($sql1);
        $res2 = $dbConn->query($sql2);
        $res3 = $dbConn->query($sql3);
        
        $i = 0;
        while($rows1 = $res1->fetch_assoc()){
            $_SESSION["search"][0][$i] = $rows1;
            $i++;
        }
        if($i===0){
            $_SESSION["search"][0][$i] = null;
        }
        $_SESSION["search"][0][$i] = null;
        $i = 0;
        while($rows2 = $res2->fetch_assoc()){
            $_SESSION["search"][1][$i] = $rows2;
            $i++;
        }
        if($i===0){
            $_SESSION["search"][1][$i] = null;
        }
        $_SESSION["search"][1][$i] = null;
        $i = 0;
        while($rows3 = $res3->fetch_assoc()){
            $_SESSION["search"][2][$i] = $rows3;
            $i++;
        }
        if($i===0){
            $_SESSION["search"][2][$i] = null;
        }
        $_SESSION["search"][2][$i] = null;

        header("Location: home.php");
        exit;
    }else{
        header("Location: home.php");
        exit;
    }
}else{
    if(!isset($_SESSION["logged"]) || $_SESSION["logged"]!==true){
        header("Location: index.php");
        exit;
    }else{
        header("Location: home.php");
        exit;
    }
}