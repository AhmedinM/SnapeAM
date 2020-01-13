<?php

function ingredients(){
    //require_once "database.php";
    $host = "127.0.0.1";
    $username = "root";
    $password = "";
    $databasename = "snape";

    $dbConn = new mysqli($host,$username,$password,$databasename);
    
    $sql = "SELECT * FROM ingredients";
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

function ingredient($id){
    require_once "database.php";

    $sql = "SELECT * FROM ingredients WHERE id = $id";
    $res = $dbConn->query($sql);
    if($res===false){
        die($dbConn->error);
    }
    $row = $res->fetch_assoc();
    //die($row["name"]);
    return $row;
}