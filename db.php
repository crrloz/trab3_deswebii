<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ESTILIZAÇÃO PRINCIPAL -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/util.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Planetas Registrados</title>
</head>
<style>
    .btnDel {
        display: none;
        position: absolute;
	    transform: translate(80%,-90%);
    }
</style>
<body>
    <?php
    require_once 'includes/dbh.inc.php';

    $sql = $conn -> prepare("SELECT * FROM planeta");
    $sql -> execute();

    $fetch = $sql -> fetchAll();

    foreach ($fetch as $key => $value) { ?>
        <div class="t-center">
            <hr>
            <div class="id-column">
                ID: <?php echo $value['id']; ?>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="posicao" value="<?php echo $value['id']; ?>">
                    <input type="submit" value="Deletar" class="btnDel" onclick="openFunct()">
                </form>
            </div>
            <hr>
            Nome: <?php echo $value['nome']; ?><hr>
            Diâmetro: <?php echo $value['diametro']; ?>km<hr>
            Massa: <?php echo $value["massa"]; ?> toneladas<hr>
            Gravidade: <?php echo $value["gravidade"]; ?>m/s²<hr>
            Descrição: <?php echo $value["descri"]; ?><hr>
            <br>
        </div>
    <?php }
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $posicao = $_POST['posicao']; ?>
        <!-- Over(s)lay -->
        <aside class="section-overlay">
            <div class="overlay">
            </div>
            <div class="popup">
                <div class="popup-content">
                    <div class="content">
                        <div>
                            <h3>Opa... Calma lá!</h3>
                            <p>Você estará excluindo todo o registro do planeta (nome). Tem certeza de que deseja prosseguir?</p>
                            <form method="post" action="includes/delete.inc.php">
                                <input type="submit" value="Sim, quero deletar"  name="deletar">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    <?php }

    ?>

    <a href="index.php">VLTAR PRO BGLH</a>
</body>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script src="js/main.js"></script>
</html>