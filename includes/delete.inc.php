<?php
require_once 'dbh.inc.php';

if($_POST['deletar']){
    $sql = $conn->prepare("DELETE FROM planeta WHERE id = ?");
    $sql->execute([$posicao]);
    
    header("location: ../db.php");
    exit();
}