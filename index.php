<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/util.css">
    <link rel="stylesheet" href="css/style.css">

    <title>PLANETAS.... | Cadastro</title>
</head>
<style>
    input[type="text"], input[type="number"], select{
        padding: 5px 2.5px;
    }

    .color0, .color0:hover {
        color: #1d531d;
    }
</style>
<body>
    <!-- Title Page -->
    <section class="section-title-page bg-title-page p-t-100 p-b-80 p-l-15 p-r-15 m-b-50" style="background-image: url(img/bg1.jpg)">
        <h2 class="t-center f-glitten">
            SEÇÃO DE CADASTRO
        </h2>
	</section>


    <!-- Seção de Cadastro -->
    <section class="section-login p-b-30 t-center">
        <h2>CADASTRE AGORA!</h2>
        <p>Insira abaixo as informações necessárias para o cadastro do planeta descoberto</p>
        <form action="includes/insert.inc.php" method="post">
            <input type="text" name="nome" placeholder="Nome" class="input-field">
            <input type="number" name="diametro" placeholder="Diâmetro" class="input-field">
            <input type="number" name="massa" placeholder="Massa" class="input-field">
            <input type="number" name="gravidade" placeholder="Gravidade" class="input-field">
            <input type="text" name="descri" placeholder="Descrição" class="input-field">
            <br><br>


            <h5>SUA GALÁXIA É ...?</h5>
            <select name="galaxia">
                <option value="Via Láctea">Via Láctea</option>
                <option value="Andrômeda">Andrômeda</option>
                <option value="Grande Nuvem de Magalhães">Grande Nuvem de Magalhães</option>
            </select>
            <br><br>


            <h5>O PLANETA É ...?</h5>
            <input type="radio" name="tipo" value="Gasoso">
            <label>Gasoso</label>

            <input type="radio" name="tipo" value="Rochoso">
            <label>Rochoso</label>
            <br><br>


            <h5>O PLANETA POSSUI ...?</h5>
            <input type="checkbox" name="anel">
            <label for="anel">Anéis</label>

            <input type="checkbox" name="atmosfera">
            <label for="atmosfera">Atmosfera</label>

            <input type="checkbox" name="lua">
            <label for="lua">Lua</label>
            <br><br>

            <?php
            if (isset($_GET["error"]) && $_GET["error"] == "none"){
                echo "<p>Dados inseridos com sucesso! Confira o <a href='db.php'>Banco de Dados</a></p>";
            } else if(isset($_GET["error"]) && $_GET["error"] == "invaliddouble"){
                echo "<p>Preencha os campos Diâmetro, Massa e Gravidade com valores numéricos apenas.</p>";
            } else if(isset($_GET["error"]) && $_GET["error"] == "emptyinput"){
                echo "<p>Preencha pelo menos os campos Nome e Descrição.</p>";
            } else {
                echo "<p>... Confira também o <a href='db.php' class='color0'>Banco de Dados</a></p>";
            }
            ?>

            <input type="submit" name="submit" value="Inserir">
        </form>
    </section>
</body>
</html>