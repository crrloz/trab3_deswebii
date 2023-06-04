<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/util.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Inserir</title>
</head>
<body>
    <!-- Seção de Inserimento -->
    <section class="section-login p-b-30 t-center">
        <h2>AJSJJDJK</h2>
        <form action="includes/insert.inc.php" method="post">
            <input type="text" name="nome" placeholder="Nome" class="input-field">
            <input type="text" name="diametro" placeholder="Diâmetro" class="input-field">
            <input type="text" name="massa" placeholder="Massa" class="input-field">
            <input type="text" name="gravidade" placeholder="Gravidade" class="input-field">
            <input type="text" name="descri" placeholder="Descrição" class="input-field">
            <br><br>

            <input type="submit" name="submit" value="Inserir">

            <?php
            if (isset($_POST['submit'])){
                echo "Dados inseridos com sucesso!";
            }
            if(isset($_GET["error"]) && $_GET["error"] == "invaliddouble"){
                echo "<p>Preencha os campos Diâmetro, Massa e Gravidade com valores numéricos apenas.</p>";
            } else if(isset($_GET["error"]) && $_GET["error"] == "emptyinput"){
                echo "<p>Preencha pelo menos os campos Nome e Descrição.</p>";
            }
            ?>
        </form>
    </section>
</body>
</html>