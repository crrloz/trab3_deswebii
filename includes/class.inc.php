<?php

class Planeta {
    public function __construct($id, $nome, $diametro, $massa, $gravidade, $tipo, $galaxia, $descri){
        $this->id = $id;
        $this->nome = $nome;
        $this->diametro = $diametro;
        $this->massa = $massa;
        $this->gravidade = $gravidade;
        $this->tipo = $tipo;
        $this->galaxia = $galaxia;
        $this->descri = $descri;
    }

    public $id;
    public $nome;
    public $diametro;
    public $massa;
    public $gravidade;
    public $tipo;
    public $galaxia;
    public $descri;

    // métodos da classe
    public function Mostrar (){ ?>
        <div class="t-center">
            <hr style="padding-top: 0; margin-top: 0;">
            <div class="id-column">
                <b>ID:</b> <?php echo $this->id; ?>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="posicao" value="<?php echo $this->id; ?>">
                    <input type="submit" value="Deletar" class="btnDel">
                </form>
            </div>
            <hr>

            <div class="id-column">
                <b>Nome:</b> <?php echo $this->nome; ?>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="nome_posicao" value="<?php echo $this->id; ?>">
                    <input type="submit" value="Alterar" class="btnDel">
                </form>
            </div>
            <hr>

            <div class="id-column">
                <b>Diâmetro:</b> <?php echo $this->diametro; ?>km
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="diametro_posicao" value="<?php echo $this->id; ?>">
                    <input type="submit" value="Alterar" class="btnDel">
                </form>
            </div>
            <hr>

            <div class="id-column">
                <b>Massa:</b> <?php echo $this->massa; ?> tonelada(s)
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="massa_posicao" value="<?php echo $this->id; ?>">
                    <input type="submit" value="Alterar" class="btnDel">
                </form>
            </div>
            <hr>
            
            <div class="id-column">
                <b>Gravidade:</b> <?php echo $this->gravidade; ?>m/s²
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="gravidade_posicao" value="<?php echo $this->id; ?>">
                    <input type="submit" value="Alterar" class="btnDel">
                </form>
            </div>
            <hr>

            <div class="id-column">
                <b>Tipo:</b> <?php echo $this->tipo; ?>
                <form method="post" action="includes/alter.inc.php">
                    <input type="hidden" name="tipo_posicao" value="<?php echo $this->id; ?>">
                    <input type="hidden" name="tipo" value="<?php echo $this->tipo; ?>">
                    <input type="submit" value="Alterar" class="btnDel">
                </form>
            </div>
            <hr>

            <div class="id-column">
                <b>Galáxia:</b> <?php echo $this->galaxia; ?>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="galaxia_posicao" value="<?php echo $this->id; ?>">
                    <input type="submit" value="Alterar" class="btnDel">
                </form>
            </div>
            <hr>

            <div class="id-column">
                <b>Descrição:</b> <?php echo $this->descri; ?>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" name="descri_posicao" value="<?php echo $this->id; ?>">
                    <input type="submit" value="Alterar" class="btnDel">
                </form>
            </div>
            <hr>

            <br>
        </div>
    <?php } 

}