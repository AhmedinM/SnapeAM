<?php

require_once "database.php";

if(isset($_GET["pot_id"])){
    $id = $_GET["pot_id"];

    $sql = "DELETE FROM potions WHERE id = $id";
    $res = $dbConn->query($sql);
    if($res===false){
        die("Database error!");
    }

    header("Location: potions.php");
    exit;
}else{
    header("Location: potions.php");
    exit;
}