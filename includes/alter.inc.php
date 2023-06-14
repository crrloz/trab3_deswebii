<?php
require_once 'dbh.inc.php';

if(!isset($_POST)){
    header("location: ../db.php");
    exit();
} else if($_POST['nome']){
    $id = $_POST['pos'];
    $nome = $_POST['nome'];

    $sql = $conn -> prepare("UPDATE planeta SET nome = ? WHERE id = ?");
    $sql -> execute(array($nome, $id));

} else if ($_POST['diametro']){
    $id = $_POST['pos'];
    $diametro = $_POST['diametro'];

    $sql = $conn -> prepare("UPDATE planeta SET diametro = ? WHERE id = ?");
    $sql -> execute(array($diametro, $id));

} else if ($_POST['massa']){
    $id = $_POST['pos'];
    $massa = $_POST['massa'];

    $sql = $conn -> prepare("UPDATE planeta SET massa = ? WHERE id = ?");
    $sql -> execute(array($massa, $id));

} else if ($_POST['gravidade']){
    $id = $_POST['pos'];
    $gravidade = $_POST['gravidade'];

    $sql = $conn -> prepare("UPDATE planeta SET gravidade = ? WHERE id = ?");
    $sql -> execute(array($gravidade, $id));

} else if($_POST['tipo']){
    $id = $_POST['tipo_posicao'];
    if($_POST['tipo'] == "Rochoso"){
        $tipo = "Gasoso";
    } else {
        $tipo = "Rochoso";
    }

    $sql = $conn -> prepare("UPDATE planeta SET tipo = ? WHERE id = ?");
    $sql -> execute(array($tipo, $id));

} else if($_POST['galaxia']){
    $id = $_POST['pos'];
    $galaxia = $_POST['galaxia'];

    $sql = $conn -> prepare("UPDATE planeta SET galaxia = ? WHERE id = ?");
    $sql -> execute(array($galaxia, $id));

} else if ($_POST['descri']){
    $id = $_POST['pos'];
    $descri = $_POST['descri'];

    $sql = $conn -> prepare("UPDATE planeta SET descri = ? WHERE id = ?");
    $sql -> execute(array($descri, $id));

}
header("location: ../db.php");
exit();