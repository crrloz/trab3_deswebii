<?php
require_once 'dbh.inc.php';
$pos =  $_POST['pos'];

$sql = $conn->prepare("DELETE FROM planeta WHERE id = :pos");
$sql->bindParam(':pos', $pos);
$sql->execute();

header("location: ../db.php");
exit();