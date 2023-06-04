<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/util.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Planetas Registrados</title>
</head>
<body>
    <?php
    require_once 'includes/dbh.inc.php';

    $sql = $conn -> prepare("SELECT * FROM planeta");
    $sql -> execute();

    $fetchaluno = $sql -> fetchAll();

    foreach ($fetchaluno as $key => $value){ ?>
    <div class="t-center"> <?php
        echo '<br><hr>';
        echo 'ID: '. $value['id']. '<hr>Nome: '. $value['nome']. '<hr>Diâmetro: '. $value['diametro']. '<hr>Massa: '. $value["massa"]. '<hr>Gravidade: '. $value["gravidade"]. '<hr>Descrição: '. $value["descri"];
        echo '<hr><br>';
    ?> </div> <?php
    } ?>
</body>
</html>