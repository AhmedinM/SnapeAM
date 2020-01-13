<?php

require_once "database.php";

if(isset($_GET["ing_id"])){
    $id = $_GET["ing_id"];

    $sql = "DELETE FROM ingredients WHERE id = $id";
    $res = $dbConn->query($sql);
    if($res===false){
        die("Database error!");
    }

    header("Location: ingredients.php");
    exit;
}else{
    header("Location: ingredients.php");
    exit;
}