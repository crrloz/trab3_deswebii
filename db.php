<?php
require_once 'includes/dbh.inc.php';

$sql = $conn -> prepare("SELECT * FROM planeta");
$sql -> execute();

$fetch = $sql -> fetchAll();
?>

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
    .btnDel, .btnAlt {
        display: none;
        position: absolute;
	    transform: translate(140%,-90%);
    }

    a, a:hover{
        color: #000000;
    }

    input[type="text"], input[type="number"], select{
        padding: 5px 2.5px;
    }

    .wrap-header {
        width: 100%;
        padding: 10px 0;
        background-color: white;
    }

    .search-input {
        text-align: center;
        width: 30%;
        outline: pink
    }
</style>
<body>
    <!-- Navbar -->
    <header>
        <div class="wrap-header t-center">
            <div class="wrap-form-search">
                <form method="get">
                    <input type="number" placeholder="Procure por um ID" name="search" class="search-input">
                    <input type="submit" value="IR">
                </form>
            </div>
        </div>
    </header>


    <!-- Title Page -->
    <section class="section-title-page bg-title-page p-t-100 p-b-80 p-l-15 p-r-15" style="background-image: url(img/bg2.jpg)">
        <h2 class="t-center f-glitten">
            BANCO DE DADOS
        </h2>
	</section>

    <?php
    require_once 'includes/class.inc.php';

    if (isset($_GET["search"])){
        $id = $_GET["search"];
        
        $sql = "SELECT * FROM planeta WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        $rowCount = $stmt->rowCount();

        if ($rowCount > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                foreach ($row as $column => $value) {
                    echo $column . ": " . $value . "<br>";
                }
            }
        } else {
            echo "Nenhuma linha encontrada para o ID especificado.";
        }
    } else {

        foreach ($fetch as $key => $value) {
            $planeta = new Planeta($value['id'], $value['nome'], $value['diametro'], $value['massa'], $value['gravidade'], $value['tipo'], $value['galaxia'], $value['descri']);

            $planeta -> Mostrar();
        }

    }
    
    if($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
        <!-- Over(s)lay -->
        <aside class="section-overlay">
            <div class="overlay">
            </div>
            <div class="popup">
                <div class="popup-content">
                    <div>
                    <?php if(isset($_POST['posicao'])){ 
                        $posicao = $_POST['posicao'];?>
                        <h3>Opa... Calma lá!</h3>
                        <p>Você estará excluindo todo o registro do planeta selecionado. Tem certeza de que deseja prosseguir?</p>
                        <form method="post" action="includes/delete.inc.php">
                            <input type="hidden" name="pos" value="<?php echo $posicao; ?>">
                            <input type="submit" value="Sim, quero deletar" name="deletar">
                        </form>
                    <?php } else if (isset($_POST['nome_posicao'])){ 
                        $posicao = $_POST['nome_posicao'];?>
                        <h3>Deseja alterar o atributo <b>NOME</b>?</h3>
                        <p>Digite abaixo um novo valor para o atributo "nome".</p>
                        <form method="post" action="includes/alter.inc.php">
                            <input type="hidden" name="pos" value="<?php echo $posicao; ?>">
                            <input type="text" name="nome" placeholder="Digite o nome...">
                            <input type="submit" value="Alterar">
                        </form>
                    <?php } else if (isset($_POST['diametro_posicao'])){
                        $posicao = $_POST['diametro_posicao'];?>
                        <h3>Deseja alterar o atributo <b>DIÂMETRO?</b></h3>
                        <p>Digite abaixo um novo valor para o atributo.</p>
                        <form method="post" action="includes/alter.inc.php">
                            <input type="hidden" name="pos" value="<?php echo $posicao; ?>">
                            <input type="number" name="diametro" placeholder="Digite o diâmetro...">
                            <input type="submit" value="Alterar">
                        </form>
                    <?php } else if (isset($_POST['massa_posicao'])){
                        $posicao = $_POST['massa_posicao'];?>
                        <h3>Deseja alterar o atributo <b>MASSA</b>?</h3>
                        <p>Digite abaixo um novo valor para o atributo.</p>
                        <form method="post" action="includes/alter.inc.php">
                            <input type="hidden" name="pos" value="<?php echo $posicao; ?>">
                            <input type="number" name="massa" placeholder="Digite a massa...">
                            <input type="submit" value="Alterar">
                        </form>
                        <?php } else if (isset($_POST['gravidade_posicao'])){
                        $posicao = $_POST['gravidade_posicao'];?>
                        <h3>Deseja alterar o atributo <b>GRAVIDADE</b>?</h3>
                        <p>Digite abaixo um novo valor para o atributo.</p>
                        <form method="post" action="includes/alter.inc.php">
                            <input type="hidden" name="pos" value="<?php echo $posicao; ?>">
                            <input type="number" name="gravidade" placeholder="Digite a gravidade...">
                            <input type="submit" value="Alterar">
                        </form>
                        <?php } else if (isset($_POST['galaxia_posicao'])){
                        $posicao = $_POST['galaxia_posicao'];?>
                        <h3>Deseja alterar o atributo <b>GALÁXIA?</b></h3>
                        <p>Selecione abaixo a galáxia para o planeta.</p>
                        <form method="post" action="includes/alter.inc.php">
                            <input type="hidden" name="pos" value="<?php echo $posicao; ?>">
                            <select name="galaxia">
                                <option value="Via Láctea">Via Láctea</option>
                                <option value="Andrômeda">Andrômeda</option>
                                <option value="Grande Nuvem de Magalhães">Grande Nuvem de Magalhães</option>
                            </select>
                            <input type="submit" value="Alterar">
                        </form>
                        <?php } else if (isset($_POST['descri_posicao'])){
                        $posicao = $_POST['descri_posicao'];?>
                        <h3>Deseja alterar o atributo <b>DESCRIÇÃO</b>?</h3>
                        <p>Digite abaixo uma nova descrição.</p>
                        <form method="post" action="includes/alter.inc.php">
                            <input type="hidden" name="pos" value="<?php echo $posicao; ?>">
                            <input type="text" name="descri" placeholder="Digite a descrição...">
                            <input type="submit" value="Alterar">
                        </form>
                        <?php } ?>
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