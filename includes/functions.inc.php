<?php
// Achei que não faria sentido registrarem um planeta sem nome ou descrição, mas
// sem massa ou diâmetro sim (já que não parecem ser tão fáceis de se medir), portanto só irei verificar se 
// esses dois primeiros estão vazios, não resto.
function emptyInput($nome, $descri){ 
    $result;
    if(empty($nome) || empty($descri)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

function invalidDouble($diametro, $massa, $gravidade){
    $result;
    if(!is_double($diametro) || !is_double($massa) || !is_double($gravidade)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}