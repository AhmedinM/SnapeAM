<?php

function recipe($id){
    $host = "127.0.0.1";
    $username = "root";
    $password = "";
    $databasename = "snape";

    $dbConn = new mysqli($host,$username,$password,$databasename);

    $sql = "SELECT * FROM recipes WHERE potion_id = $id";
    $res = $dbConn->query($sql);
    
    if($res===false){
        die($dbConn->error);
    }

    $rec;
    $i = 0;
    while($row = $res->fetch_assoc()){
        $rec = $row;
        $i++;
    }

    if($i===0){
        header("Location: potions.php");
        exit;
    }
    
    return $rec;
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

function ingredients($id){
    $host = "127.0.0.1";
    $username = "root";
    $password = "";
    $databasename = "snape";

    $dbConn = new mysqli($host,$username,$password,$databasename);

    $sql = "SELECT * FROM recipe_ingredient WHERE recipe_id = $id";
    $res = $dbConn->query($sql);
    if($res===false){
        die($dbConn->error);
    }

    $arr;
    $i = 0;
    while($row = $res->fetch_assoc()){
        $sql2 = "SELECT * FROM ingredients WHERE id = {$row["ingredient_id"]}";
        $res2 = $dbConn->query($sql2);
        $row2 = $res2->fetch_assoc();
        $arr[0][] = $row2;
        $arr[1][] = $row["quantity"];
        $i++;
    }
    if($i===0){
        $arr[] = null;
    }

    return $arr;
}