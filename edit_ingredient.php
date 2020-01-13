<?php

require_once "database.php";

if(isset($_POST["ing_id"])){
    $id = $_POST["ing_id"];
    if(!isset($_POST["quantity"]) || $_POST["quantity"]<0){
        die("Pogrešna vrijednost za količinu!");
    }
    $quantity = $_POST["quantity"];
    $sql = "UPDATE `ingredients` SET `quantity` = $quantity WHERE `id` = $id";
    $res = $dbConn->query($sql);
    if($res===false){
        die("Database error!");
    }
    if(!isset($_POST["ret"]) || $_POST["ret"]===null){
        header("Location: ingredients.php");
        exit;
    }else{
        $ret = $_POST["ret"];
        header("Location: recipe.php?id=$ret");
        exit;
    }
}else{
    header("Location: ingredients.php");
    exit;
}