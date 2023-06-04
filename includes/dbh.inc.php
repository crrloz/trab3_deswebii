<?php
    $conn = new PDO("mysql:host=localhost;port=3307;dbname=bancoplanetario", "root", "");
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(!$conn){
        die("A tentativa de conexão foi falha.");
    }