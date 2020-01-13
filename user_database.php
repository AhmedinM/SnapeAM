<?php

function users(){
    require_once "database.php";

    $sql1 = "SELECT * FROM users WHERE `permission` = 0";
    $sql2 = "SELECT * FROM users WHERE `permission` = 1";
    $res1 = $dbConn->query($sql1);
    $res2 = $dbConn->query($sql2);

    $arr;
    $i = 0;
    while($row1 = $res1->fetch_assoc()){
        $arr[0][] = $row1;
        //die($arr[0][0]["id"]);
        $i++;
    }
    if($i===0){
        $arr[0][] = null;
    }
    //die($arr[0][0]["id"]);

    $i = 0;
    while($row2 = $res2->fetch_assoc()){
        $arr[1][] = $row2;
        $i++;
    }
    if($i===0){
        $arr[1][] = null;
    }

    return $arr;
}