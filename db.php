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
    <!-- Title Page -->
    <section class="section-title-page p-t-100 p-b-80 p-l-15 p-r-15">
        <h2 class="t-center f-glitten">
            BANCO DE DADOS
        </h2>
	</section>

    <?php
    require_once 'includes/dbh.inc.php';

    $sql = $conn -> prepare("SELECT * FROM planeta");
    $sql -> execute();

    $fetch = $sql -> fetchAll();

    foreach ($fetch as $key => $value) { ?>
        <div class="t-center">
            <hr style="padding-top: 0; margin-top: 0;">
            <div class="id-column">
                <b>ID:</b> <?php echo $value['id']; ?>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="posicao" value="<?php echo $value['id']; ?>">
                    <input type="submit" value="Deletar" class="btnDel">
                </form>
            </div>
            <hr>
            <b>Nome:</b> <?php echo $value['nome']; ?><hr>
            <b>Diâmetro:</b> <?php echo $value['diametro']; ?>km<hr>
            <b>Massa:</b> <?php echo $value["massa"]; ?> tonelada(s)<hr>
            <b>Gravidade:</b> <?php echo $value["gravidade"]; ?>m/s²<hr>
            <b>Descrição:</b> <?php echo $value["descri"]; ?><hr>
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
                    <div>
                        <h3>Opa... Calma lá!</h3>
                        <p>Você estará excluindo todo o registro do planeta (nome). Tem certeza de que deseja prosseguir?</p>
                        <form method="post" action="includes/delete.inc.php">
                            <input type="hidden" name="pos" value="<?php echo $posicao; ?>">
                            <input type="submit" value="Sim, quero deletar"  name="deletar">
                        </form>
                    </div>
                </div>
            </div>
        </aside>
    <?php }

    ?>

    <section class="t-center p-b-40">
        <a href="index.php">Voltar para a página de cadastro</a>
    </section>
</body>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script src="js/main.js"></script>
</html>