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

    $sql = $conn -> prepare("insert into planeta (nome, diametro, massa, gravidade, tipo, galaxia, descri) values (?,?,?,?,?,?,?)");
    $sql -> execute(array($_POST["nome"], $_POST["diametro"], $_POST["massa"], $_POST["gravidade"], $_POST['tipo'], $_POST['galaxia'], $_POST["descri"]));

    header("location: ../index.php?error=none");
    exit();
}

// CREATE TABLE planeta(nome VARCHAR(128) NOT NULL, diametro DOUBLE, massa DOUBLE, gravidade DOUBLE, tipo VARCHAR(7), galaxia VARCHAR(30) NOT NULL, descri TEXT NOT NULL, id INT PRIMARY KEY AUTO_INCREMENT);