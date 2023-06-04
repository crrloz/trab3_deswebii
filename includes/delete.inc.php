<?php
require_once 'dbh.inc.php';
$posicao = $_POST['posicao'];

$sql = $conn->prepare("DELETE FROM planeta WHERE id = ?");
$sql->execute([$posicao]);

header("location: ../db.php");
exit();