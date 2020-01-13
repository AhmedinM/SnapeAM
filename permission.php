<?php

require_once "database.php";

if(isset($_GET["user_id"])){
    $id = $_GET["user_id"];

    $sql = "UPDATE `users` SET `permission` = 1 WHERE `id` = $id";
    $res = $dbConn->query($sql);
    //die($id);
    if($res===false){
        die($dbConn->error);
        //die("Database error!");
    }

    header("Location: users.php");
    exit;
}else{
    header("Location: users.php");
    exit;
}