<?php

require_once "database.php";

session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $t = true;
    if(!isset($_POST["description"]) || $_POST["description"]==""){
        $t = false;
        $_SESSION["descriptionError"] = "Unesite tekst recepta.";
    }
    for($i=0;$i<count($_POST["ingredients"]);$i++){
        $id = $_POST["ingredients"][$i];
        $val = $_POST[$id];
        if(!isset($val) || $val=="" || $val<0){
            $t = false;
            $_SESSION["ingredientError"] = "Odaberite sastojke i pravilno unesite njihovu količinu.";
        }
    }
    if($t===false){
        header("Location: insert_recipe.php");
        exit;
    }else{
        $potion = $_POST["potion"];
        $description = $_POST["description"];

        $sql = "INSERT INTO recipes(`id`,`potion_id`,`description`) VALUES (NULL,'$potion','$description')";
        $res = $dbConn->query($sql);

        if($res===false){
            die($dbConn->error);
        }

        $recId = $dbConn->insert_id;

        for($i=0;$i<count($_POST["ingredients"]);$i++){
            $id = $_POST["ingredients"][$i];
            $val = $_POST[$id];
            
            $sql = "INSERT INTO recipe_ingredient(`recipe_id`,`ingredient_id`,`quantity`) VALUES ($recId,$id,$val)";
            $res = $dbConn->query($sql);
            if($res===false){
                die($dbConn->error);
            }
        }

        $_SESSION["insertR"] = "Recept je unijet u bazu.";
        header("Location: insert_recipe.php");
        exit;
    }
}else{
    header("Location: insert_recipe.php");
    exit;
}