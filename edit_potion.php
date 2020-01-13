<?php

require_once "database.php";

if(isset($_POST["pot_id"])){
    $id = $_POST["pot_id"];
    if(!isset($_POST["quantity"]) || $_POST["quantity"]<0){
        die("Pogrešna vrijednost za količinu!");
    }
    $quantity = $_POST["quantity"];
    $sql = "UPDATE `potions` SET `quantity` = $quantity WHERE `id` = $id";
    $res = $dbConn->query($sql);
    if($res===false){
        die("Database error!");
    }
    if(!isset($_POST["ret"]) || $_POST["ret"]===null){
        header("Location: potions.php");
        exit;
    }else{
        header("Location: recipe.php?id=$id");
        exit;
    }
}else{
    header("Location: potions.php");
    exit;
}