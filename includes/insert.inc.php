<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (isset($_POST['submit'])){
    if(emptyInput($_POST["nome"], $_POST["descri"]) !== false){
        header("location: ../index.php?error=emptyinput");
        exit();
    } 

    if(invalidDouble($_POST["diametro"], $_POST["massa"], $_POST["gravidade"]) !== false){
        header("location: ../index.php?error=invaliddouble");
        exit();
    }

    $sql = $conn -> prepare("insert into planeta (nome, diametro, massa, gravidade, descri) values (?,?,?,?,?)");
    $sql -> execute(array($_POST["nome"], $_POST["diametro"], $_POST["massa"], $_POST["gravidade"], $_POST["descri"]));

    header("location: ../db.php");
    exit();
}