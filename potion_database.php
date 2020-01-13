<?php

function potions(){
    require_once "database.php";

    $sql = "SELECT * FROM potions";
    $res = $dbConn->query($sql);

    $arr;
    $i = 0;
    while($row = $res->fetch_assoc()){
        $arr[] = $row;
        $i++;
    }
    if($i===0){
        $arr[] = null;
    }

    return $arr;
}

function potion($id){
    require_once "database.php";

    $sql = "SELECT * FROM potions WHERE id = $id";
    $res = $dbConn->query($sql);
    if($res===false){
        die($dbConn->error);
    }
    $row = $res->fetch_assoc();
    
    return $row;
}