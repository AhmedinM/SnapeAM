<?php

require_once "database.php";

if(isset($_GET["user_id"])){
    $id = $_GET["user_id"];

    $sql = "DELETE FROM users WHERE id = $id";
    $res = $dbConn->query($sql);
    if($res===false){
        die("Database error!");
    }

    header("Location: users.php");
    exit;
}else{
    header("Location: users.php");
    exit;
}